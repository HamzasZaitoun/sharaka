<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'logo_text' => 'CR',
            'logo_subtext' => 'COMMANDER GROUP',
            'header_phone' => '+962 7 9808 180',
            'header_locations_text' => 'Locations',
            'header_welcome_text' => 'Welcome Amall',
            'header_search_placeholder' => [
                'en' => 'What are you looking for...',
                'ar' => 'ماذا تبحث عن...'
            ],
            'navbar_links' => [
                [
                    'label_en' => 'HOME',
                    'label_ar' => 'الرئيسية',
                    'type' => 'external',
                    'url' => '/'
                ],
                [
                    'label_en' => 'ABOUT CDR',
                    'label_ar' => 'عن CDR',
                    'type' => 'external',
                    'url' => '#about'
                ],
                [
                    'label_en' => 'AL QUBTAN',
                    'label_ar' => 'القبطان',
                    'type' => 'external',
                    'url' => '#qubtan'
                ],
                [
                    'label_en' => 'CINEMA REELS',
                    'label_ar' => 'سينما ريلز',
                    'type' => 'external',
                    'url' => '#cinema'
                ],
                [
                    'label_en' => 'SHARAKA++',
                    'label_ar' => 'شراكة++',
                    'type' => 'external',
                    'url' => '#sharaka'
                ],
                [
                    'label_en' => 'EVENTS',
                    'label_ar' => 'الفعاليات',
                    'type' => 'external',
                    'url' => '#events'
                ],
                [
                    'label_en' => 'NEWSLETTERS',
                    'label_ar' => 'النشرات الإخبارية',
                    'type' => 'external',
                    'url' => '#newsletters'
                ],
                [
                    'label_en' => 'CONTACT US',
                    'label_ar' => 'اتصل بنا',
                    'type' => 'external',
                    'url' => '#contact'
                ],
            ],
            'footer_phone' => '+962 7 7554 1450',
            'footer_email' => 'support@CDR.com',
            'footer_copyright' => 'All the content is Owned by CDR',
            'footer_about_title' => [
                'en' => 'ABOUT US',
                'ar' => 'من نحن'
            ],
            'footer_about_links' => [
                [
                    'label_en' => 'Our Team',
                    'label_ar' => 'فريقنا',
                    'href' => '#'
                ],
                [
                    'label_en' => 'Terms of Service',
                    'label_ar' => 'شروط الخدمة',
                    'href' => '#'
                ],
                [
                    'label_en' => 'Careers',
                    'label_ar' => 'الوظائف',
                    'href' => '#'
                ],
                [
                    'label_en' => 'Locations',
                    'label_ar' => 'المواقع',
                    'href' => '#'
                ],
            ],
            'footer_contact_title' => [
                'en' => 'CONTACT US',
                'ar' => 'اتصل بنا'
            ],
            'footer_newsletter_title' => [
                'en' => 'Subscribe to our News Letter to Know About our Best Deals!',
                'ar' => 'اشترك في نشرتنا الإخبارية لمعرفة أفضل العروض!'
            ],
            'footer_newsletter_button' => [
                'en' => 'SUBMIT',
                'ar' => 'إرسال'
            ],
            'footer_newsletter_placeholder' => [
                'en' => 'Email Address',
                'ar' => 'عنوان البريد الإلكتروني'
            ],
            'social_media_links' => [
                [
                    'platform' => 'facebook',
                    'url' => '#'
                ],
                [
                    'platform' => 'instagram',
                    'url' => '#'
                ],
                [
                    'platform' => 'twitter',
                    'url' => '#'
                ],
                [
                    'platform' => 'youtube',
                    'url' => '#'
                ],
            ],
        ];
        
        foreach ($settings as $name => $value) {
            DB::table('settings')->updateOrInsert(
                [
                    'group' => 'general',
                    'name' => $name,
                ],
                [
                    'payload' => json_encode($value),
                    'locked' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
