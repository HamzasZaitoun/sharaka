<?php

namespace App\Filament\Resources\BrandSectionResource\Pages;

use App\Filament\Resources\BrandSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrandSection extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = BrandSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
