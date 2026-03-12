<?php

namespace App\Filament\Admin\Pages\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Filament\Notifications\Notification;
use Filament\Auth\Pages\Login as BaseAuth;
use Illuminate\Validation\ValidationException;
use Filament\Schemas\Schema;
use Filament\Forms\Components\ViewField;
use Illuminate\Support\Facades\Http;


class Login extends BaseAuth
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Memanggil tombol/input Email standar bawaan Filament
                $this->getEmailFormComponent(),

                // Memanggil tombol/input Password standar bawaan Filament
                $this->getPasswordFormComponent()
                    ->helperText('Persyaratan password: Minimal 8 karakter, kombinasi huruf besar, kecil, angka, dan simbol.'),

                // Memanggil kotak tombol centang "Remember me" (Ingat saya) bawaan Filament
                $this->getRememberFormComponent(),

                // Komponen tambahan khusus (ViewField) bernama 'captcha'.
                // Menugaskan Filament untuk memanggil sebuah file tampilan kustom milik kita 
                // Yaitu dari 'resources/views/forms/components/recaptcha.blade.php'
                ViewField::make('captcha')
                    ->label('') // Label sengaja dikosongi agar teksnya tidak dobel dan merusak desain
                    ->view('forms.components.recaptcha'),
            ]);
    }

    /**
     * FUNGSI 2: Mengatur Aksi inti ketika tombol "Sign In" (Masuk) ditekan oleh pengguna.
     */
    public function authenticate(): ?LoginResponse
    {
        try {
            // ---------------------------------------------------------------- //
            // FITUR: ANTI BRUTE-FORCE (Penebak sandi berkali-kali)
            // ---------------------------------------------------------------- //
            // Sistem Livewire akan mencatat IP mana yang mencoba masuk. Jika melebihi 3 kali gagal...
            $this->rateLimit(3);
        } catch (TooManyRequestsException $exception) {
            // ...maka sistem melempar kegagalan (Exception) dan memunculkan pop-up pemberitahuan di kanan atas
            Notification::make()
                ->title('Terlalu banyak percobaan.')
                // Memberitahu sisa waktu sebelum blokir dibuka kembali
                ->body("Anda telah gagal login 3 kali berturut-turut. Demi keamanan, silakan tunggu {$exception->secondsUntilAvailable} detik sebelum mencoba login kembali.")
                ->danger() // Warna notifikasi merah
                ->send();

            // Batalkan eksekusi sisa kode ke bawah, agar tidak terjadi aksi apapun
            return null;
        }

        // Mengambil semua data isian/masukan form (Email, Password, Captcha, dll) ke dalam wadah variabel $data
        $data = $this->form->getState();


        // ---------------------------------------------------------------- //
        // FITUR: VALIDASI RECAPTCHA (Pencegah Bot Otomatis)             
        // ---------------------------------------------------------------- //

        // 1. Cek: Apakah user/pengunjung belum mencentang captchanya sama sekali (kosong / null)?
        if (blank($data['captcha'] ?? null)) {
            // Record log kegagalan validasi captcha (kosong)
            \App\Models\LogAktivitas::create([
                'user_id' => null,
                'aktivitas' => 'Gagal Login: Captcha tidak diisi',
            ]);

            // Bila belum, tolak loginnya! Lemparkan error kembali ke form bagian input 'captcha'
            throw ValidationException::withMessages([
                'data.captcha' => __('Mohon centang kotak Captcha "I\'m not a robot".'),
            ]);
        }

        // 2. Mengecek kebenaran kode token dari form ke Server Pusat Google ReCaptcha
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'), // Kunci RAHASIA dari file .env kita
            'response' => $data['captcha'], // Kode Captcha bawaan unik dari formulir pengguna
        ]);

        // 3. Jika Server Google merespon (menjawab) bahwa captchanya tidak cocok (gagal verifikasi)
        if (! $response->json('success')) {
            // Record log kegagalan verifikasi captcha ke server google
            \App\Models\LogAktivitas::create([
                'user_id' => null,
                'aktivitas' => 'Gagal Login: Verifikasi Captcha ditolak server Google',
            ]);

            // Tolak lagi masuknya, tampilkan error bahwa verifikasi ditolak
            throw ValidationException::withMessages([
                'data.captcha' => __('Verifikasi Captcha gagal. Silakan coba lagi.'),
            ]);
        }


        // ---------------------------------------------------------------- //
        // FITUR: SINGLE SESSION (1 AKUN HANYA UNTUK 1 PENGGUNA SAJA)       
        // ---------------------------------------------------------------- //

        // Memanggil mekanisme otentikasi bawaan dari Filament
        $authGuard = Filament::auth();
        /** @var \Illuminate\Auth\SessionGuard $authGuard */
        $authProvider = $authGuard->getProvider();

        // Mengekstrak khusus data Email dan Password dari form pengisian saja (Tanpa token dll)
        $credentials = $this->getCredentialsFromFormData($data);

        // Cek secara kasar di database apakah email user ditemukan?
        /** @var \App\Models\User|null $user */
        $user = $authProvider->retrieveByCredentials($credentials);

        // Pertanyaan lanjutan: "Apakah usernya benar-benar ada" DAN "apakah passwordnya cocok?"
        if ($user && $authProvider->validateCredentials($user, $credentials)) {

            // Cek di tabel log `sessions` pada database, apakah sudah ada sesi online atas nama ID User ini?
            $hasActiveSession = \Illuminate\Support\Facades\DB::table('sessions')
                ->where('user_id', $user->getAuthIdentifier())
                ->where('id', '!=', session()->getId())
                ->where('last_activity', '>=', time() - (config('session.lifetime') * 60))
                ->exists();

            // Jika terbaca (True) masih aktif login di perangkat lain...
            // DAN user tersebut ternyata belum menverifikasi emailnya...
            if ($hasActiveSession && $user->hasVerifiedEmail() === false) {

                // Kirim ulang link verifikasi ke email
                $user->sendEmailVerificationNotification();

                // Record log penolakan akses karena sesi ganda
                \App\Models\LogAktivitas::create([
                    'user_id' => $user->getAuthIdentifier(),
                    'aktivitas' => 'Gagal Login: Sesi ganda terdeteksi (Butuh Verifikasi Email)',
                ]);

                throw ValidationException::withMessages([
                    'data.email' => __('Keamanan: Akun ini sedang aktif di perangkat lain. Karena ada dua perangkat yang mencoba masuk, Anda wajib melakukan verifikasi email terlebih dahulu. Silakan klik link verifikasi yang baru saja kami kirim ulang ke email Anda, lalu coba login kembali.'),
                ]);
            }
        }


        // ---------------------------------------------------------------- //
        // PROSES PERINTAH LOGIN FINAL DARI FILAMENT                      
        // ---------------------------------------------------------------- //

        // Melakukan upaya terakhir Login konfirmasi. Jika data salah karena memang password yang diinput typo (salah eja)...
        if (! $authGuard->attempt($credentials, $data['remember'] ?? false)) {
            // Record log kegagalan autentikasi (Sandi salah)
            \App\Models\LogAktivitas::create([
                'user_id' => $user instanceof \App\Models\User ? $user->id : null,
                'aktivitas' => 'Gagal Login: Kata sandi salah atau akun tidak ditemukan',
            ]);

            // ...lemparkan pesan standar "Sandi yang dimasukkan salah"
            $this->throwFailureValidationException();
        }

        // Bila sampai titik baris ini, berarti 100% SUKSES LOGIN. Ambil profil penuh dari User tersebut
        $user = $authGuard->user();

        // Mengecek tambahan untuk fitur berlapis: "Apakah user tipe akun ini diizinkan masuk panel Admin?"
        // (contoh: bila bukan berstatus "Owner", tolak)
        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            // Record log penolakan kontrol akses panel admin
            \App\Models\LogAktivitas::create([
                'user_id' => $user->id,
                'aktivitas' => 'Gagal Login: Akses Panel Admin ditolak (Bukan Admin)',
            ]);

            // Kalau tidak punya akses, usir paksa (logout diam-diam) dan lemparkan status gagal
            $authGuard->logout();
            $this->throwFailureValidationException();
        }

        // Ubah Ulang Identitas Sesi pada Browser. Berguna untuk mendobrak keamanan jaringan 
        // sehingga akun Anda terhindar dari serangan bajak ("Session Fixation Attack" oleh Hackers)
        session()->regenerate();

        // ---------------------------------------------------------------- //
        // FITUR: SISTEM TENDANG (Force Logout Other Devices)
        // ---------------------------------------------------------------- //
        // Begitu kita masuk di sini, kita hapus semua sesi login akun ini di tempat lain.
        // Hasilnya: Orang yang tadinya login di device lain akan otomatis terpental (Logout) 
        // saat mereka klik menu apa pun.
        \Illuminate\Support\Facades\DB::table('sessions')
            ->where('user_id', $user->getAuthIdentifier())
            ->where('id', '!=', session()->getId())
            ->delete();

        // Record log login
        \App\Models\LogAktivitas::record('Berhasil Masuk Sistem');

        return app(LoginResponse::class);
    }

    public function getSubheading(): \Illuminate\Contracts\Support\Htmlable | string | null
    {
        return null;
    }

    public function getFormContentComponent(): \Filament\Schemas\Components\Component
    {
        return \Filament\Schemas\Components\Form::make([\Filament\Schemas\Components\EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('authenticate')
            ->footer([
                \Filament\Schemas\Components\Actions::make($this->getFormActions())
                    ->alignment($this->getFormActionsAlignment())
                    ->fullWidth($this->hasFullWidthFormActions())
                    ->key('form-actions'),

                \Filament\Schemas\Components\Group::make([
                    \Filament\Schemas\Components\Html::make(
                        fn() =>
                        '<div class="text-center mt-4" style="font-size: 0.875rem;">' .
                            'Belum punya akun? ' .
                            $this->registerAction->toHtml() .
                            '</div>'
                    ),
                ])->visible(fn() => filament()->hasRegistration()),
            ])
            ->visible(fn(): bool => blank($this->userUndertakingMultiFactorAuthentication));
    }
}
