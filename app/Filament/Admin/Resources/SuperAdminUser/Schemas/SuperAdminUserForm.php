<?php

namespace App\Filament\Admin\Resources\SuperAdminUser\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SuperAdminUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi User')
                    ->description('Lengkapi data user admin/super admin')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(
                                table: 'users',
                                column: 'email',
                                ignoreRecord: true,
                            ),

                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->confirmed()
                            ->required(fn ($livewire) => $livewire->data['id'] === null)
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                            ->dehydrated(fn ($state) => filled($state)),

                        TextInput::make('password_confirmation')
                            ->label('Konfirmasi Password')
                            ->password()
                            ->required(fn ($livewire) => $livewire->data['id'] === null),

                        Select::make('role')
                            ->label('Role')
                            ->options([
                                'admin' => 'Admin',
                                'super_admin' => 'Super Admin',
                            ])
                            ->required()
                            ->native(false),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }
}
