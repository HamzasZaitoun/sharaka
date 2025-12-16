<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\BusinessUnit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 3 News items
        $newsItems = [
            [
                'title' => [
                    'en' => 'Yellow Ghmas is now open',
                    'ar' => 'غماس الأصفر مفتوح الآن'
                ],
                'excerpt' => [
                    'en' => 'Experience the authentic flavors of our latest restaurant opening. Offering exceptional coffee and a warm, welcoming atmosphere.',
                    'ar' => 'استمتع بالنكهات الأصيلة في افتتاح مطعمنا الجديد. نقدم قهوة استثنائية وجو دافئ ومرحب.'
                ],
                'content' => [
                    'en' => '<p>We are excited to announce the opening of Yellow Ghmas, our newest addition to the Al Qubtan family. This traditional Jordanian restaurant brings authentic flavors and warm hospitality to our guests.</p>',
                    'ar' => '<p>نحن متحمسون للإعلان عن افتتاح غماس الأصفر، أحدث إضافة إلى عائلة القبطان. يجلب هذا المطعم الأردني التقليدي النكهات الأصيلة والضيافة الدافئة لضيوفنا.</p>'
                ],
                'slug' => 'yellow-ghmas-is-now-open',
                'image' => 'news/yellow-ghmas.jpg',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => [
                    'en' => 'Exclusive collaborations with leading Syrian artists',
                    'ar' => 'تعاونات حصرية مع فنانين سوريين بارزين'
                ],
                'excerpt' => [
                    'en' => 'CDR Group partners with renowned Syrian artists to create unique cultural experiences and artistic collaborations.',
                    'ar' => 'تتعاون مجموعة CDR مع فنانين سوريين مشهورين لخلق تجارب ثقافية فريدة وتعاونات فنية.'
                ],
                'content' => [
                    'en' => '<p>We are proud to announce exclusive collaborations with leading Syrian artists. These partnerships will bring unique cultural experiences and artistic excellence to our community.</p>',
                    'ar' => '<p>نفخر بالإعلان عن تعاونات حصرية مع فنانين سوريين بارزين. ستجلب هذه الشراكات تجارب ثقافية فريدة والتميز الفني إلى مجتمعنا.</p>'
                ],
                'slug' => 'exclusive-collaborations-syrian-artists',
                'image' => 'news/collaborations.jpg',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => [
                    'en' => 'Sharaka++ launches new youth innovation center',
                    'ar' => 'شراكة++ تطلق مركز الابتكار الشبابي الجديد'
                ],
                'excerpt' => [
                    'en' => 'Sharaka++ opens a new innovation hub to empower young entrepreneurs and support creative startups in Jordan.',
                    'ar' => 'تفتتح شراكة++ مركز ابتكار جديد لتمكين رواد الأعمال الشباب ودعم الشركات الناشئة الإبداعية في الأردن.'
                ],
                'content' => [
                    'en' => '<p>Sharaka++ is excited to launch our new youth innovation center. This state-of-the-art facility will provide mentorship, funding, and resources to help young innovators transform their ideas into successful businesses.</p>',
                    'ar' => '<p>شراكة++ متحمسة لإطلاق مركز الابتكار الشبابي الجديد. ستوفر هذه المنشأة الحديثة الإرشاد والتمويل والموارد لمساعدة المبتكرين الشباب على تحويل أفكارهم إلى أعمال ناجحة.</p>'
                ],
                'slug' => 'sharaka-innovation-center-launch',
                'image' => 'news/innovation-center.jpg',
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($newsItems as $item) {
            News::create($item);
        }

        // Create Al Qubtan Business Unit
        BusinessUnit::create([
            'name' => [
                'en' => 'Al Qubtan',
                'ar' => 'القبطان'
            ],
            'overview_title' => [
                'en' => 'Al Qubtan Overview',
                'ar' => 'نظرة عامة على القبطان'
            ],
            'description' => [
                'en' => '<p>Al Qubtan is a distinguished hospitality and F&B management company that brings authentic culinary experiences to life. With our portfolio of specialty restaurants including Ghammass Baladi and Tallet Al-Quds, we celebrate the rich culinary heritage of the region while creating innovative dining experiences.</p><p>Our commitment to excellence extends beyond food service to creating memorable moments that bring people together around the table. Every dish tells a story, every meal creates memories, and every visit becomes a cherished experience.</p>',
                'ar' => '<p>القبطان هي شركة ضيافة وإدارة طعام وشراب متميزة تجلب تجارب الطهي الأصيلة إلى الحياة. مع محفظتنا من المطاعم المتخصصة بما في ذلك غماس البلدي وطلعة القدس، نحتفل بالتراث الطهي الغني للمنطقة مع خلق تجارب طعام مبتكرة.</p>'
            ],
            'logo' => 'logos/al-qubtan-logo.jpg',
            'gallery' => [
                'units_gallery/tallet-al-quds.jpg',
                'units_gallery/ghmas-baladi.jpg',
                'units_gallery/ghmas-sweets.jpg',
            ],
            'sort_order' => 1,
        ]);

        // Create Cinema Reels Business Unit
        BusinessUnit::create([
            'name' => [
                'en' => 'Cinema Reels',
                'ar' => 'سينما ريلز'
            ],
            'overview_title' => [
                'en' => 'Cinema Reels Overview',
                'ar' => 'نظرة عامة على سينما ريلز'
            ],
            'description' => [
                'en' => '<p>Cinema Reels is a dynamic media and production powerhouse that specializes in creating compelling visual narratives for the digital age. Our expertise spans social media content, commercial productions, and brand storytelling that resonates with contemporary audiences.</p><p>With a focus on vertical video content and social media optimization, we help brands tell their stories through engaging visual mediums that capture attention and drive engagement across all digital platforms.</p>',
                'ar' => '<p>سينما ريلز هي قوة ديناميكية في الإعلام والإنتاج متخصصة في إنشاء سرديات بصرية مقنعة للعصر الرقمي. تمتد خبرتنا عبر محتوى وسائل التواصل الاجتماعي والإنتاجات التجارية وسرد العلامات التجارية التي تتردد صداها مع الجماهير المعاصرة.</p>'
            ],
            'logo' => 'logos/cinema-reels-logo.jpg',
            'gallery' => [
                'units_gallery/tekka.jpg',
                'units_gallery/om-nasser.jpg',
                'units_gallery/ghmas-baladi-reel.jpg',
            ],
            'sort_order' => 2,
        ]);

        // Create Sharaka++ Business Unit
        BusinessUnit::create([
            'name' => [
                'en' => 'Sharaka++',
                'ar' => 'شراكة++'
            ],
            'overview_title' => [
                'en' => 'Sharaka++ Overview',
                'ar' => 'نظرة عامة على شراكة++'
            ],
            'description' => [
                'en' => '<p>Sharaka is a forward-thinking Jordanian initiative that invests in young innovators and empowers youth to transform concepts into real-world projects. We believe in the power of collaboration and partnership to create meaningful change in our communities.</p><p>Through mentorship, funding, and strategic guidance, we nurture the next generation of entrepreneurs and innovators who will shape the future of business and technology in Jordan and the broader region.</p>',
                'ar' => '<p>شراكة هي مبادرة أردنية ذات رؤية مستقبلية تستثمر في المبتكرين الشباب وتمكن الشباب من تحويل المفاهيم إلى مشاريع حقيقية. نؤمن بقوة التعاون والشراكة لخلق تغيير ذي معنى في مجتمعاتنا.</p>'
            ],
            'logo' => 'logos/sharaka-logo.jpg',
            'gallery' => [],
            'sort_order' => 3,
        ]);
    }
}
