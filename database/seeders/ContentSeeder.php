<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\HeroSlide;
use App\Models\NewsItem;
use App\Models\BrandSection;
use App\Models\BrandItem;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate tables to start fresh
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        HeroSlide::truncate();
        NewsItem::truncate();
        BrandItem::truncate();
        BrandSection::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Hero Slides
        HeroSlide::create([
            'title' => [
                'en' => 'Who we are',
                'ar' => 'من نحن',
            ],
            'description' => [
                'en' => 'CDR Group is a leading Jordanian holding and business incubator group, specialized in creative development, strategic production, and brand growth across multiple sectors. With a forward-thinking vision and a dynamic team, CDR Group delivers innovative solutions, builds powerful partnerships, and transforms ideas into measurable success stories empowering local talents and sustainable businesses across Jordan and beyond.',
                'ar' => 'مجموعة سي دي آر هي مجموعة قابضة وحاضنة أعمال أردنية رائدة، متخصصة في التطوير الإبداعي والإنتاج الاستراتيجي ونمو العلامات التجارية في قطاعات متعددة. برؤية مستقبلية وفريق ديناميكي، تقدم مجموعة سي دي آر حلولاً مبتكرة، وتبني شراكات قوية، وتحول الأفكار إلى قصص نجاح قابلة للقياس تمكّن المواهب المحلية والأعمال المستدامة في الأردن وخارجه.',
            ],
            'image_path' => 'images/hero1.png',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // 2. News Items - using images from public/images/
        $newsData = [
            [
                'title_en' => 'Yellow Ghmas is now open',
                'title_ar' => 'غماس الأصفر مفتوح الآن',
                'desc_en' => 'Offering exceptional coffee and a warm atmosphere for our guests.',
                'desc_ar' => 'نقدم قهوة استثنائية وجو دافئ لضيوفنا.',
                'image' => 'images/news1.png',
            ],
            [
                'title_en' => 'Exclusive collaborations',
                'title_ar' => 'تعاونات حصرية',
                'desc_en' => 'Exclusive collaborations with leading Syrian artists for premium content.',
                'desc_ar' => 'تعاونات حصرية مع فنانين سوريين رائدين لمحتوى متميز.',
                'image' => 'images/news2.png',
            ],
            [
                'title_en' => 'Exclusive collaborations',
                'title_ar' => 'تعاونات حصرية',
                'desc_en' => 'Exclusive collaborations with leading Syrian artists for premium content.',
                'desc_ar' => 'تعاونات حصرية مع فنانين سوريين رائدين لمحتوى متميز.',
                'image' => 'images/news3.png',
            ],
            [
                'title_en' => 'Exclusive collaborations',
                'title_ar' => 'تعاونات حصرية',
                'desc_en' => 'Exclusive collaborations with leading Syrian artists for premium content.',
                'desc_ar' => 'تعاونات حصرية مع فنانين سوريين رائدين لمحتوى متميز.',
                'image' => 'images/news4.png',
            ],
            [
                'title_en' => 'Exclusive collaborations',
                'title_ar' => 'تعاونات حصرية',
                'desc_en' => 'Exclusive collaborations with leading Syrian artists for premium content.',
                'desc_ar' => 'تعاونات حصرية مع فنانين سوريين رائدين لمحتوى متميز.',
                'image' => 'images/news5.png',
            ],
            [
                'title_en' => 'Exclusive collaborations',
                'title_ar' => 'تعاونات حصرية',
                'desc_en' => 'Exclusive collaborations with leading Syrian artists for premium content.',
                'desc_ar' => 'تعاونات حصرية مع فنانين سوريين رائدين لمحتوى متميز.',
                'image' => 'images/news6.png',
            ],
        ];

        foreach ($newsData as $index => $news) {
            NewsItem::create([
                'title' => ['en' => $news['title_en'], 'ar' => $news['title_ar']],
                'description' => ['en' => $news['desc_en'], 'ar' => $news['desc_ar']],
                'image_path' => $news['image'],
                'published_at' => now()->subDays($index),
            ]);
        }

        // 3. Brand Sections
        
        // Al Qubtan
        $qubtan = BrandSection::create([
            'key' => 'qubtan',
            'title' => ['en' => 'AL QUBTAN', 'ar' => 'القبطان'],
            'subtitle' => ['en' => 'Al Qubtan Overview', 'ar' => 'نظرة عامة على القبطان'],
            'description' => [
                'en' => [
                    ['text' => 'A hospitality and F&B management company that owns and operates some of Jordan\'s most authentic dining experiences:'],
                    ['type' => 'bullet', 'text' => 'Ghammas Baladi – a traditional Jordanian restaurant with two operating branches at Al Daoud Complex and Madina Street, and a third coming soon in Tabarbour.'],
                    ['type' => 'bullet', 'text' => 'Tallet Al-Quds – located in Al-Salt, offering a cultural dining experience that celebrates authentic Palestinian and Jordanian cuisine.'],
                ],
                'ar' => [
                    ['text' => 'شركة ضيافة وإدارة أغذية ومشروبات تمتلك وتدير بعض تجارب الطعام الأكثر أصالة في الأردن:'],
                    ['type' => 'bullet', 'text' => 'غماس بلدي - مطعم أردني تقليدي بفرعين عاملين في مجمع الداود وشارع المدينة، وثالث قريباً في طبربور.'],
                    ['type' => 'bullet', 'text' => 'تلة القدس - تقع في السلط، وتقدم تجربة طعام ثقافية تحتفي بالمطبخ الفلسطيني والأردني الأصيل.'],
                ]
            ],
            'logo_text' => 'القبطان',
            'is_active' => true,
        ]);

        BrandItem::create(['brand_section_id' => $qubtan->id, 'image_path' => 'images/tallatquds.png', 'title' => ['en' => 'Tallet al Quds', 'ar' => 'تلة القدس'], 'sort_order' => 1]);
        BrandItem::create(['brand_section_id' => $qubtan->id, 'image_path' => 'images/ghmasbaladi.png', 'title' => ['en' => 'Ghmas baladi', 'ar' => 'غماس بلدي'], 'sort_order' => 2]);
        BrandItem::create(['brand_section_id' => $qubtan->id, 'image_path' => 'images/ghmassweets.png', 'title' => ['en' => 'Ghmas Sweets', 'ar' => 'حلويات غماس'], 'sort_order' => 3]);

        // Cinema Reels
        $cinema = BrandSection::create([
            'key' => 'cinema',
            'title' => ['en' => 'CINEMA REELS', 'ar' => 'سينما ريلز'],
            'subtitle' => ['en' => 'Cinema Reels Overview', 'ar' => 'نظرة عامة على سينما ريلز'],
            'description' => [
                'en' => [
                    ['text' => 'A media and production powerhouse that brings stories to life through cinematic visuals, high-quality reels, and digital campaigns.'],
                    ['text' => 'Cinema Reels specializes in impactful storytelling and brand films that inspire audiences and strengthen brand identity across all platforms.'],
                    ['text' => 'Cinema Reels specializes in impactful storytelling and brand films that inspire audiences and strengthen brand identity across all platforms.'],
                ],
                'ar' => [
                    ['text' => 'قوة إعلامية وإنتاجية تعيد الحياة للقصص من خلال صور سينمائية، وريلز عالية الجودة، وحملات رقمية.'],
                    ['text' => 'تتخصص سينما ريلز في السرد القصصي المؤثر وأفلام العلامات التجارية التي تلهم الجماهير وتعزز هوية العلامة التجارية عبر جميع المنصات.'],
                ]
            ],
            'logo_text' => 'Cinema Reels',
            'is_active' => true,
        ]);

        BrandItem::create(['brand_section_id' => $cinema->id, 'image_path' => 'images/tekka.png', 'title' => ['en' => 'Tekka', 'ar' => 'تكا'], 'sort_order' => 1]);
        BrandItem::create(['brand_section_id' => $cinema->id, 'image_path' => 'images/omnaser.png', 'title' => ['en' => 'Om Nasser', 'ar' => 'أم ناصر'], 'sort_order' => 2]);
        BrandItem::create(['brand_section_id' => $cinema->id, 'image_path' => 'images/ghmasbaladi2.png', 'title' => ['en' => 'Ghmas Baladi', 'ar' => 'غماس بلدي'], 'sort_order' => 3]);


        // Sharaka++
        $sharaka = BrandSection::create([
            'key' => 'sharaka',
            'title' => ['en' => 'SHARAKA ++', 'ar' => 'شراكة ++'],
            'subtitle' => ['en' => 'Sharaka++ Overview', 'ar' => 'نظرة عامة على شراكة++'],
            'description' => [
                'en' => [
                    ['text' => 'Sharakah is a forward-thinking Jordanian initiative that invests in the minds, creativity, and potential of young innovators.'],
                    ['text' => 'Our mission is to empower youth with great ideas by transforming their concepts into successful, real-world projects.'],
                    ['text' => 'At Sharakah, we believe that every idea has the power to change lives – all it needs is the right support, strategy, and belief.'],
                ],
                'ar' => [
                    ['text' => 'شراكة هي مبادرة أردنية ذات رؤية مستقبلية تستثمر في عقول الشباب المبتكرين وإبداعهم وإمكاناتهم.'],
                    ['text' => 'مهمتنا هي تمكين الشباب ذوي الأفكار العظيمة من خلال تحويل مفاهيمهم إلى مشاريع ناجحة في العالم الحقيقي.'],
                    ['text' => 'في شراكة، نؤمن بأن كل فكرة لديها القوة لتغيير الحياة - كل ما تحتاجه هو الدعم والاستراتيجية والإيمان المناسب.'],
                ]
            ],
            'logo_text' => 'شراكة++',
            'is_active' => true,
        ]);
        
        // No items for Sharaka++ based on the design mockup
    }
}
