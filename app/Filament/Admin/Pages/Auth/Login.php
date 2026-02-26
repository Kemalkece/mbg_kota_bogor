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
                $this->getPasswordFormComponent(),

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
        $authProvider = $authGuard->getProvider();

        // Mengekstrak khusus data Email dan Password dari form pengisian saja (Tanpa token dll)
        $credentials = $this->getCredentialsFromFormData($data);

        // Cek secara kasar di database apakah email user ditemukan?
        $user = $authProvider->retrieveByCredentials($credentials);

        // Pertanyaan lanjutan: "Apakah usernya benar-benar ada" DAN "apakah passwordnya cocok?"
        if ($user && $authProvider->validateCredentials($user, $credentials)) {

            // Bila password cocok, JANGAN izinkan masuk dulu!
            // Cek di tabel log `sessions` pada database, apakah sudah ada sesi online atas nama ID User ini?
            // "!= session()->getId()" artinya mengecualikan ID Sesi alat komputer yang sedang kita gunakan sekarang, 
            // "last_activity" mengecek apakah umur loginnya di device lain itu sebenarnya belum expired (masih berlaku)
            $hasActiveSession = \Illuminate\Support\Facades\DB::table('sessions')
                ->where('user_id', $user->getAuthIdentifier())
                ->where('id', '!=', session()->getId())
                ->where('last_activity', '>=', time() - (config('session.lifetime') * 60))
                ->exists(); // Hasilkan jawaban akhir True/False

            // Jika terbaca (True) masih aktif login di tempat atau HP (perangkat) lain...
            if ($hasActiveSession) {
                // ...gagalkan proses masuknya! munculkan teks error berwarna merah di sekitar kotak input email
                throw ValidationException::withMessages([
                    'data.email' => __('Akun ini sedang digunakan di perangkat/browser lain. 1 akun hanya boleh dipakai 1 pengguna secara bersamaan.'),
                ]);
            }
        }


        // ---------------------------------------------------------------- //
        // PROSES PERINTAH LOGIN FINAL DARI FILAMENT                      
        // ---------------------------------------------------------------- //

        // Melakukan upaya terakhir Login konfirmasi. Jika data salah karena memang password yang diinput typo (salah eja)...
        if (! $authGuard->attempt($credentials, $data['remember'] ?? false)) {
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
            // Kalau tidak punya akses, usir paksa (logout diam-diam) dan lemparkan status gagal
            $authGuard->logout();
            $this->throwFailureValidationException();
        }

        // Ubah Ulang Identitas Sesi pada Browser. Berguna untuk mendobrak keamanan jaringan 
        // sehingga akun Anda terhindar dari serangan bajak ("Session Fixation Attack" oleh Hackers)
        session()->regenerate();

        // Operasi Selesai Sempurna! Buka Gerbang Halaman Dashboard Utama Filament
        return app(LoginResponse::class);
    }
}
