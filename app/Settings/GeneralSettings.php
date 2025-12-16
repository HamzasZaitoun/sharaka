<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public array $navbar_links;
    public string $footer_phone;
    public string $footer_email;
    public string $footer_copyright;
    public array $social_media_links;

    public static function group(): string
    {
        return 'general';
    }
}

