<?php

namespace App\Filament\Admin\Pages\Auth;

use Filament\Auth\Pages\PasswordReset\ResetPassword as BaseResetPassword;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;

class ResetPassword extends BaseResetPassword
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent(),
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
            ]);
    }
}
