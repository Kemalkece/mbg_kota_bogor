<?php

namespace App\Filament\Admin\Pages\Auth;

use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;

class Register extends BaseRegister
{
    protected function handleRegistration(array $data): \Illuminate\Database\Eloquent\Model
    {
        $user = parent::handleRegistration($data);

        // Record log pendaftaran
        \App\Models\LogAktivitas::create([
            'user_id' => $user->id,
            'aktivitas' => 'Mendaftar akun baru',
        ]);

        // Pastikan email verifikasi terkirim saat pendaftaran
        if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail) {
            $user->sendEmailVerificationNotification();
        }

        return $user;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent()
                    ->maxLength(100)
                    ->regex('/^[\p{L}\p{M}\s\-\.\']+$/u') // Hanya huruf, spasi, dash, titik, petik (mencegah script)
                    ->validationMessages([
                        'regex' => 'Nama hanya boleh mengandung huruf dan karakter umum.',
                    ]),
                \Filament\Forms\Components\TextInput::make('instansi')
                    ->label('Asal Instansi / OPD')
                    ->placeholder('Misal: Dinas Kesehatan atau Nama Organisasi')
                    ->required()
                    ->maxLength(255)
                    ->regex('/^[^<>]*$/') // Mencegah karakter < dan > yang umum untuk XSS
                    ->afterStateUpdated(fn($state, $set) => $set('instansi', strip_tags($state)))
                    ->validationMessages([
                        'regex' => 'Nama instansi tidak boleh mengandung karakter script HTML.',
                    ]),
                $this->getEmailFormComponent()
                    ->maxLength(255),
                $this->getPasswordFormComponent()
                    ->live()
                    ->helperText(view('filament.admin.password-strength', ['statePath' => 'data.password']))
                    ->rules([
                        Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols(),
                    ]),
                $this->getPasswordConfirmationFormComponent(),
                \Filament\Forms\Components\Checkbox::make('agreement')
                    ->label(fn() => new \Illuminate\Support\HtmlString('<span class="text-sm font-medium text-gray-700 dark:text-gray-300">Saya menyatakan bahwa data yang saya berikan adalah <span class="text-primary-600 dark:text-primary-400 font-bold">benar</span> dan <span class="text-primary-600 dark:text-primary-400 font-bold">dapat dipertanggung jawabkan</span>.</span>'))
                    ->required()
                    ->dehydrated(false)
                    ->extraInputAttributes([
                        'class' => 'h-5 w-5 !rounded !appearance-checkbox !border-gray-300',
                        'style' => '-webkit-appearance: checkbox !important; appearance: checkbox !important; width: 20px !important; height: 20px !important;',
                    ])
                    ->extraAttributes([
                        'class' => 'p-4 bg-white/50 dark:bg-white/5 rounded-2xl border border-gray-200 dark:border-white/10 shadow-sm',
                    ])
                    ->validationMessages([
                        'required' => 'Anda harus menyetujui pernyataan ini untuk melanjutkan.',
                    ]),
            ]);
    }
}
