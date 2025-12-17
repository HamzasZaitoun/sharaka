<?php

namespace App\Filament\Resources\BrandSectionResource\Pages;

use App\Filament\Resources\BrandSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBrandSection extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = BrandSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
