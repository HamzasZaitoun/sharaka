<?php

namespace App\Filament\Resources\BrandSectionResource\Pages;

use App\Filament\Resources\BrandSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrandSections extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = BrandSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
