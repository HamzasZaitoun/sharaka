<?php

namespace App\Filament\Resources\NewsItemResource\Pages;

use App\Filament\Resources\NewsItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsItem extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = NewsItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
