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

class Login extends BaseAuth
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
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
            $this->rateLimit(3);
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
        if (blank($data['captcha'] ?? null)) {
            throw ValidationException::withMessages([
                'data.captcha' => __('Mohon centang Captcha.'),
            ]);
        }

        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $data['captcha'],
            ]
        );

        if (! $response->json('success')) {
            throw ValidationException::withMessages([
                'data.captcha' => __('Verifikasi Captcha gagal.'),
            ]);
        }

        // =========================
        // AUTHENTIKASI
        // =========================


        $authGuard = Filament::auth();
        $credentials = $this->getCredentialsFromFormData($data);

        // Fitur percobaan login maksimal 5x, blokir 10 menit
        $maxAttempts = 5;
        $blockMinutes = 10;
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
                'email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam $wait detik."
            ]);
        }

        if (! $authGuard->attempt($credentials, $data['remember'] ?? false)) {
            $attempts++;
            cache()->put($key, $attempts, now()->addMinutes($blockMinutes + 1));
            $sisa = $maxAttempts - $attempts;
            if ($sisa <= 0) {
                $blockedUntil = now()->addMinutes($blockMinutes);
                cache()->put($blockKey, $blockedUntil, $blockedUntil);
                Notification::make()
                    ->title('Login diblokir')
                    ->body("Terlalu banyak percobaan login. Silakan coba lagi dalam {$blockMinutes} menit.")
                    ->danger()
                    ->send();
                throw ValidationException::withMessages([
                    'email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam {$blockMinutes} menit."
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
                'email' => "Kredensial yang diberikan tidak dapat ditemukan."
            ]);
        } else {
            // Reset percobaan jika berhasil login
            cache()->forget($key);
            cache()->forget($blockKey);
        }

        $user = $authGuard->user();
        // Set default password_changed_at jika null (user lama)
        if (is_null($user->password_changed_at)) {
            $user->password_changed_at = now();
            $user->save();
        }

        // Cek masa berlaku password (1 tahun)
if ($user->password_changed_at->diffInYear(now()) >= 1) {
    Notification::make()
        ->title('Password Kadaluarsa')
        ->body('Masa berlaku kata sandi Anda telah habis. Silakan ubah kata sandi untuk melanjutkan.')
        ->danger()
        ->send();

    $authGuard->logout();

    throw ValidationException::withMessages([
        'email' => 'Masa berlaku kata sandi telah habis. Silakan ubah kata sandi.'
    ]);
}

        // =========================
        // AUTO LOGOUT SESSION LAMA (hanya 1 session aktif per user)
        // Pastikan field user_id pada tabel sessions terisi saat login
        DB::table('sessions')
            ->where('user_id', $user->getAuthIdentifier())
            ->where('id', '!=', session()->getId())
            ->delete();
        // Update session sekarang agar user_id terisi (untuk Laravel <10.8)
        DB::table('sessions')
            ->where('id', session()->getId())
            ->update(['user_id' => $user->getAuthIdentifier()]);

        // Cek akses panel
        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            $authGuard->logout();
            $this->throwFailureValidationException();
        }

        session()->regenerate();

        // mark this tab as the current active one so that any previously-open
        // tabs become stale. we no longer rely on a client-provided identifier
        // (the JS stopped appending a hidden field), so just generate a fresh
        // UUID each time.
        $tabId = (string) \Illuminate\Support\Str::uuid();
        session()->put('active_tab', $tabId);

        return app(LoginResponse::class);
    }
}