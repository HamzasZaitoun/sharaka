<?php

use App\Settings\GeneralSettings;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$settings = app(GeneralSettings::class);

$settings->navbar_links = [
    [
        'label_en' => 'HOME',
        'label_ar' => 'الرئيسية',
        'type' => 'external',
        'url' => '/',
        'page_id' => null,
    ],
    [
        'label_en' => 'ABOUT CDR',
        'label_ar' => 'عن المجموعة',
        'type' => 'external',
        'url' => '#about',
        'page_id' => null,
    ],
    [
        'label_en' => 'AL QUBTAN',
        'label_ar' => 'القبطان',
        'type' => 'external',
        'url' => '#alqubtan',
        'page_id' => null,
    ],
    [
        'label_en' => 'CINEMA REELS',
        'label_ar' => 'سينما ريلز',
        'type' => 'external',
        'url' => '#cinema',
        'page_id' => null,
    ],
    [
        'label_en' => 'SHARAKA++',
        'label_ar' => 'شراكة++',
        'type' => 'external',
        'url' => '#sharaka',
        'page_id' => null,
    ],
    [
        'label_en' => 'EVENTS',
        'label_ar' => 'الفعاليات',
        'type' => 'external',
        'url' => '#events',
        'page_id' => null,
    ],
];

// Initialize other settings to avoid null errors if they are used elsewhere
$settings->header_phone = '+962 7 9808 180';
$settings->header_locations_text = 'Locations';
$settings->header_welcome_text = 'Welcome';
$settings->header_search_placeholder = ['en' => 'What are you looking for...', 'ar' => 'عن ماذا تبحث...'];

$settings->footer_phone = '+962 7 9808 180';
$settings->footer_email = 'info@commandergroup.com';
$settings->footer_copyright = 'Commander Group © 2025';
$settings->footer_about_title = ['en' => 'About Us', 'ar' => 'من نحن'];
$settings->footer_about_links = [];
$settings->footer_contact_title = ['en' => 'Contact', 'ar' => 'التواصل'];
$settings->footer_newsletter_title = ['en' => 'Newsletter', 'ar' => 'النشرة البريدية'];
$settings->footer_newsletter_button = ['en' => 'Subscribe', 'ar' => 'إشتراك'];
$settings->footer_newsletter_placeholder = ['en' => 'Your Email', 'ar' => 'بريدك الإلكتروني'];
$settings->social_media_links = [];
$settings->logo_text = 'COMMANDER';
$settings->logo_subtext = 'GROUP';

$settings->save();

echo "Settings seeded successfully.\n";
