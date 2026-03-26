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
use Illuminate\Support\Facades\DB;
use App\Traits\LogActivity;
use Illuminate\Support\Str;

class Login extends BaseAuth
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent(),

                // Memanggil tombol/input Password standar bawaan Filament
                $this->getPasswordFormComponent()
                    ->helperText('Persyaratan password: Minimal 8 karakter, kombinasi huruf besar, kecil, angka, dan simbol.'),

                $this->getRememberFormComponent(),

                // reCAPTCHA
                ViewField::make('captcha')
                    ->label('')
                    ->view('forms.components.recaptcha'),

                ViewField::make('change_password_link')
                    ->view('auth.partials.change-password-link'),
            ]);
    }

    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5); // Increased from 3 to 5 to match maxAttempts logic
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title('Terlalu banyak percobaan.')
                ->body("Silakan tunggu {$exception->secondsUntilAvailable} detik sebelum mencoba lagi.")
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        // =========================
        // VALIDASI RECAPTCHA
        // =========================
        // Skip reCAPTCHA di environment local
        if (config('app.env') !== 'local') {
            if (blank($data['captcha'] ?? null)) {
                // Record log kegagalan validasi captcha (kosong)
                \App\Models\LogAktivitas::create([
                    'user_id' => null,
                    'aktivitas' => 'Gagal Login: Captcha tidak diisi',
                ]);

                throw ValidationException::withMessages([
                    'data.captcha' => 'Mohon centang Captcha terlebih dahulu.',
                ]);
            }
        }

        // =========================
        // AUTHENTIKASI & SECURITY
        // =========================
        $authGuard = Filament::auth();
        $credentials = $this->getCredentialsFromFormData($data);

        // Cek apakah user ada dulu sebelum auth attempt
        $email = $data['email'] ?? null;
        $userModel = null;

        if ($email) {
            $userModel = \App\Models\User::where('email', $email)->first();

            // Cek jika user tidak aktif
            if ($userModel && !$userModel->is_active) {
                \App\Models\LogAktivitas::create([
                    'user_id' => null,
                    'aktivitas' => 'Gagal Login: Akun tidak aktif - ' . $email,
                ]);

                throw ValidationException::withMessages([
                    'data.email' => 'Akun Anda tidak aktif. Silakan hubungi administrator.'
                ]);
            }

            // Cek role user
            if ($userModel && !in_array($userModel->role, ['admin', 'super_admin'])) {
                \App\Models\LogAktivitas::create([
                    'user_id' => $userModel->id ?? null,
                    'aktivitas' => 'Gagal Login: Tidak memiliki akses admin - ' . $email,
                ]);

                throw ValidationException::withMessages([
                    'data.email' => 'Anda tidak memiliki akses ke panel admin.'
                ]);
            }
        }

        // Fitur percobaan login maksimal 5x, blokir 3 menit
        $maxAttempts = 5;
        $blockMinutes = 3;
        $key = 'login_attempts_' . request()->ip();
        $blockKey = 'login_blocked_' . request()->ip();
        $attempts = cache()->get($key, 0);
        $blockedUntil = cache()->get($blockKey);

        if ($blockedUntil && now()->lt($blockedUntil)) {
            $wait = now()->diffInSeconds($blockedUntil);
            Notification::make()
                ->title('Login diblokir')
                ->body("Terlalu banyak percobaan login. Silakan coba lagi dalam $wait detik.")
                ->danger()
                ->send();
            throw ValidationException::withMessages([
                'data.email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam $wait detik."
            ]);
        }

        if (! $authGuard->attempt($credentials, $data['remember'] ?? false)) {
            $attempts++;
            cache()->put($key, $attempts, now()->addMinutes($blockMinutes + 1));
            $sisa = $maxAttempts - $attempts;

            // Log failed login attempt
            \App\Models\LogAktivitas::create([
                'user_id' => null, // We don't have user yet on failed auth
                'aktivitas' => "Gagal Login: Kata sandi salah (Percobaan ke-$attempts) - " . ($data['email'] ?? 'unknown'),
            ]);

            if ($sisa <= 0) {
                $blockedUntil = now()->addMinutes($blockMinutes);
                cache()->put($blockKey, $blockedUntil, $blockedUntil);
                Notification::make()
                    ->title('Login diblokir')
                    ->body("Terlalu banyak percobaan login. Silakan coba lagi dalam {$blockMinutes} menit.")
                    ->danger()
                    ->send();
                throw ValidationException::withMessages([
                    'data.email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam {$blockMinutes} menit."
                ]);
            }
            if ($sisa <= 3) {
                Notification::make()
                    ->title('Peringatan Login')
                    ->body("Sisa percobaan login Anda tinggal $sisa kali.")
                    ->warning()
                    ->send();
            }
            throw ValidationException::withMessages([
                'data.email' => "Email atau kata sandi yang Anda masukkan salah."
            ]);
        }

        // Reset percobaan jika berhasil login
        cache()->forget($key);
        cache()->forget($blockKey);

        /** @var \App\Models\User $user */
        $user = $authGuard->user();

        // Log successful login
        \App\Models\LogAktivitas::create([
            'user_id' => $user->id,
            'aktivitas' => 'Berhasil Masuk Sistem',
        ]);

        // Set default password_changed_at jika null (user lama)
        // Dan reset force_password_change jika sudah ada password_changed_at
        if (is_null($user->password_changed_at)) {
            $user->password_changed_at = now();
            $user->save();
        }

        // Reset force_password_change jika user sudah mengganti password
        if ($user->force_password_change && !is_null($user->password_changed_at)) {
            $user->force_password_change = false;
            $user->save();
        }

        // Cek masa berlaku password (1 tahun)
        if ($user->password_changed_at->diffInYears(now()) >= 1) {
            Notification::make()
                ->title('Password Kadaluarsa')
                ->body('Masa berlaku kata sandi Anda telah habis. Silakan ubah kata sandi untuk melanjutkan.')
                ->danger()
                ->send();

            $authGuard->logout();

            throw ValidationException::withMessages([
                'data.email' => 'Masa berlaku kata sandi telah habis. Silakan ubah kata sandi.'
            ]);
        }

        // AUTO LOGOUT SESSION LAMA (hanya 1 session aktif per user)
        DB::table('sessions')
            ->where('user_id', $user->getAuthIdentifier())
            ->where('id', '!=', session()->getId())
            ->delete();

        // Update session sekarang agar user_id terisi
        DB::table('sessions')
            ->where('id', session()->getId())
            ->update(['user_id' => $user->getAuthIdentifier()]);

        // Cek akses panel
        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            // Record log penolakan kontrol akses panel admin
            \App\Models\LogAktivitas::create([
                'user_id' => $user->id,
                'aktivitas' => 'Gagal Login: Akses Panel Admin ditolak (Bukan Admin)',
            ]);

            $authGuard->logout();
            $this->throwFailureValidationException();
        }

        session()->regenerate();

        // Bersihkan cache device agar middleware SingleDeviceLogin mengambil session_id yang baru
        \Illuminate\Support\Facades\Cache::forget("user_device_{$user->id}");

        // Mark this tab as the current active one
        $tabId = (string) Str::uuid();
        session()->put('active_tab', $tabId);

        return app(LoginResponse::class);
    }
}
