<?php

namespace App\Filament\Admin\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent()
                    ->maxLength(100)
                    ->regex('/^[\p{L}\p{M}\s\-\.\']+$/u')
                    ->validationMessages([
                        'regex' => 'Nama hanya boleh mengandung huruf dan karakter umum.',
                    ]),
                $this->getEmailFormComponent()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('current_password')
                    ->label('Kata Sandi Saat Ini')
                    ->password()
                    ->required()
                    ->currentPassword()
                    ->revealable()
                    ->dehydrated(false)
                    ->validationMessages([
                        'current_password' => 'Kata sandi saat ini tidak cocok.',
                    ]),
                $this->getPasswordFormComponent()
                    ->label('Kata Sandi Baru')
                    ->live()
                    ->required(fn() => \Illuminate\Support\Facades\Auth::user()?->force_password_change)
                    ->helperText(view('filament.admin.password-strength', ['statePath' => 'data.password']))
                     ->rules([
                        Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols(),
                    ]),
                $this->getPasswordConfirmationFormComponent()
                    ->label('Konfirmasi Kata Sandi Baru'),
            ]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        /** @var \App\Models\User|null $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        // 1. Reset flag force_password_change jika user mengganti passwordnya.
        if ($user && $user->force_password_change && array_key_exists('password', $data)) {
            $user->force_password_change = false;
            $user->save();
        }

        // 2. Keamanan Ketat: Hanya izinkan atribut dasar yang boleh diubah lewat profil.
        // Ini mencegah manipulasi atribut kontrol akses (role, user_type) via injection request.
        return array_intersect_key($data, array_flip(['name', 'email', 'password']));
    }
}
