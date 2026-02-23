<?php

namespace App\Filament\Admin\Resources\Collabs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class CollabForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Logo Kolaborasi')
                    ->disk('public')
                    ->directory('collabs')
                    ->image()
                    ->required(),
            ]);
    }
}
