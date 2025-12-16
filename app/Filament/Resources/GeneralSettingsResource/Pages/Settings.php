<?php

namespace App\Filament\Resources\GeneralSettingsResource\Pages;

use App\Filament\Resources\GeneralSettingsResource;
use Filament\Resources\Pages\Page;

class Settings extends Page
{
    protected static string $resource = GeneralSettingsResource::class;

    protected static string $view = 'filament.resources.general-settings-resource.pages.settings';
}
