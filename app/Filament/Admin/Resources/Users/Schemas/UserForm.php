<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(100)
                    ->regex('/^[\p{L}\p{M}\s\-\.\']+$/u')
                    ->validationMessages([
                        'regex' => 'Nama hanya boleh mengandung huruf, spasi, dan karakter umum.',
                    ]),
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\Select::make('user_type')
                    ->label('Tipe Pengguna')
                    ->options([
                        'Perangkat Daerah' => 'Perangkat Daerah',
                        'Publik' => 'Publik',
                    ])
                    ->required()
                    ->default('Publik')
                    ->disabled(function() {
                        /** @var \App\Models\User|null $user */
                        $user = \Illuminate\Support\Facades\Auth::user();
                        return ! ($user?->isSuperAdmin() ?? false);
                    }),
                \Filament\Forms\Components\Select::make('role')
                    ->label('Peran (Role)')
                    ->options([
                        'admin' => 'Admin Biasa',
                        'super_admin' => 'Super Admin',
                        'user' => 'User Biasa',
                    ])
                    ->required()
                    ->default('admin')
                    ->disabled(function() {
                        /** @var \App\Models\User|null $user */
                        $user = \Illuminate\Support\Facades\Auth::user();
                        return ! ($user?->isSuperAdmin() ?? false);
                    }),
                TextInput::make('instansi')
                    ->label('Instansi / OPD')
                    ->maxLength(100)
                    ->regex('/^[^<>]*$/')
                    ->disabled(function() {
                        /** @var \App\Models\User|null $user */
                        $user = \Illuminate\Support\Facades\Auth::user();
                        return ! ($user?->isSuperAdmin() ?? false);
                    }),
                TextInput::make('password')
                    ->label('Kata Sandi')
                    ->password()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create')
                    ->rules([
                        \Illuminate\Validation\Rules\Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols(),
                    ]),
                \Filament\Forms\Components\Checkbox::make('force_password_change')
                    ->label('Wajib Ganti Sandi di Login Berikutnya')
                    ->default(true)
                    ->helperText('Jika dicentang, pengguna akan diminta untuk merubah kata sandinya segera setelah login.')
                    ->visible(fn(string $context): bool => $context === 'edit'),
            ]);
    }
}
