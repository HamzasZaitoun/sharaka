<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    // Header Settings
    public string $header_phone;
    public string $header_locations_text;
    public string $header_welcome_text;
    public array $header_search_placeholder; // ['en' => '', 'ar' => '']
    
    // Navigation Links
    public array $navbar_links; // [['label_en' => '', 'label_ar' => '', 'href' => '']]
    
    // Footer Settings
    public string $footer_phone;
    public string $footer_email;
    public string $footer_copyright;
    public array $footer_about_title; // ['en' => '', 'ar' => '']
    public array $footer_about_links; // [['label_en' => '', 'label_ar' => '', 'href' => '']]
    public array $footer_contact_title; // ['en' => '', 'ar' => '']
    public array $footer_newsletter_title; // ['en' => '', 'ar' => '']
    public array $footer_newsletter_button; // ['en' => '', 'ar' => '']
    public array $footer_newsletter_placeholder; // ['en' => '', 'ar' => '']
    
    // Social Media Links
    public array $social_media_links; // [['platform' => '', 'url' => '']]
    
    // Logo Settings
    public string $logo_text;
    public string $logo_subtext;

    public static function group(): string
    {
        return 'general';
    }
}
