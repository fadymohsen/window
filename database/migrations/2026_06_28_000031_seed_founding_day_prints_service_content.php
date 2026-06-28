<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'founding-day-prints';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/founding-day-prints.webp',
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $serviceId = $service->id;
        }

        // English translation
        $enExists = DB::table('service_translations')
            ->where('service_id', $serviceId)
            ->where('locale', 'en')
            ->exists();

        $enData = [
            'title' => 'Founding Day Prints',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Founding Day Prints in Riyadh | Saudi Founding Day Advertising Materials | Window Advertising',
            'meta_description' => 'Founding Day prints, flags, banners, and advertising materials in Riyadh. Window Advertising produces all Saudi Founding Day printed materials — stickers, flags, banners, backdrops, and branded gift prints for companies across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'founding day prints Riyadh, Saudi founding day advertising, founding day banners Riyadh, founding day flags Saudi Arabia, founding day stickers Riyadh, دعاية واعلان الرياض, مطبوعات يوم التأسيس, هدايا دعائية, دعاية واعلان السعودية, استيكرات يوم التأسيس',
        ];

        if ($enExists) {
            DB::table('service_translations')
                ->where('service_id', $serviceId)
                ->where('locale', 'en')
                ->update($enData);
        } else {
            DB::table('service_translations')->insert(array_merge($enData, [
                'service_id' => $serviceId,
                'locale' => 'en',
            ]));
        }

        // Arabic translation
        $arExists = DB::table('service_translations')
            ->where('service_id', $serviceId)
            ->where('locale', 'ar')
            ->exists();

        $arData = [
            'title' => 'مطبوعات يوم التأسيس',
            'content' => $this->getArabicContent(),
            'meta_title' => 'مطبوعات يوم التأسيس في الرياض | طباعة إعلانات يوم التأسيس السعودي | وينوو للإعلان',
            'meta_description' => 'مطبوعات وإعلانات يوم التأسيس السعودي في الرياض — وينوو للإعلان ينتج استيكرات وأعلام ولافتات وخلفيات تصوير وهدايا مطبوعة مميزة ليوم التأسيس. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'مطبوعات يوم التأسيس الرياض, دعاية واعلان الرياض, هدايا دعائية يوم التأسيس, دعاية واعلان السعودية, استيكرات يوم التأسيس, لافتات يوم التأسيس الرياض',
        ];

        if ($arExists) {
            DB::table('service_translations')
                ->where('service_id', $serviceId)
                ->where('locale', 'ar')
                ->update($arData);
        } else {
            DB::table('service_translations')->insert(array_merge($arData, [
                'service_id' => $serviceId,
                'locale' => 'ar',
            ]));
        }
    }

    public function down(): void
    {
        $service = DB::table('services')->where('slug', 'founding-day-prints')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Saudi Founding Day on February 22nd commemorates the establishment of the first Saudi state — and for organizations across Riyadh, it calls for a coordinated set of printed advertising materials that honor the occasion with the appropriate heritage-informed visual identity. Window Advertising produces the full range of <a href="/en/services/founding-day-celebrations">founding day celebrations</a> printed materials for companies and government entities: flags, banners, stickers, event backdrops, and branded gift prints in the Founding Day visual language.</p>

<h2>Founding Day — A Distinct Print Identity</h2>
<p>Founding Day has a visual identity that is distinct from National Day — and print materials for the two occasions should be designed accordingly. Where <a href="/en/services/national-day-prints">national day prints</a> tend toward bright greens, whites, and a contemporary festive energy, Founding Day advertising draws on Saudi heritage aesthetics: richer color palettes referencing gold and earthy tones, Arabic calligraphy in traditional styles, and design motifs that reference the Kingdom's 18th-century founding.</p>
<p>Window Advertising designs Founding Day advertising materials with the appropriate visual language — not simply recolored National Day materials, but a distinct design approach that reflects the heritage significance of the occasion. Every printed material is produced in the client's brand identity alongside the Founding Day occasion design.</p>

<h2>Founding Day Flags and Banners</h2>
<p><a href="/en/services/flags">Flags</a> and banners for Founding Day create the visual atmosphere of the occasion across building entrances, lobbies, offices, and outdoor spaces. Window Advertising produces Founding Day flags in standard and custom sizes, indoor and outdoor banners in Founding Day design, teardrop and feather flags for entrance installations, and hanging banner sets for atrium and corridor displays.</p>
<p>All Founding Day flag and banner production uses durable materials and UV-resistant inks appropriate for both indoor display and outdoor installation in Riyadh's February climate.</p>

<h2>Founding Day Stickers and Decorative Prints</h2>
<p>Decorative stickers and prints for Founding Day transform office walls, reception areas, windows, and communal spaces for the occasion period. Window Advertising produces Founding Day <a href="/en/services/wall-stickers">wall stickers</a> in removable vinyl that can be applied before the celebration and removed cleanly afterward, window displays in heritage Founding Day motifs, floor stickers for reception and entrance areas, and custom-cut stickers in Founding Day graphic elements for desk decorations and employee gifts.</p>
<p>The heritage design vocabulary of Founding Day — Arabic calligraphy, traditional geometric patterns, and founding-era motifs — is applied consistently across all decorative print materials.</p>

<h2>Gift Packaging and Event Prints</h2>
<p>For corporate Founding Day gift sets, Window Advertising produces custom-printed gift boxes, gift bags, tissue paper, and gift tags in Founding Day branding. Gift packaging design incorporates the company logo alongside the Founding Day occasion design — communicating both organizational identity and celebration of the occasion. <a href="/en/services/employee-gift-boxes">Employee gift boxes</a> are among the most popular Founding Day print orders we fulfill each year.</p>
<p>For formal Founding Day events, Window Advertising produces event programs in bilingual Arabic and English, certificates of appreciation in heritage-inspired formal design, step-and-repeat event backdrops, and table setting materials for celebration dinners and appreciation ceremonies.</p>

<h2>Founding Day Prints Portfolio — Riyadh</h2>
<p>Browse the portfolio to see Founding Day flags, banners, stickers, and gift packaging produced for clients across Riyadh in previous Founding Day campaigns.</p>

<h2>Frequently Asked Questions About Founding Day Prints</h2>

<h3>What Founding Day printed materials does Window Advertising produce?</h3>
<p>Window Advertising produces the full range of Founding Day printed advertising materials: Founding Day flags in standard and custom sizes, vinyl banners and indoor banners in Founding Day visual identity, step-and-repeat photo backdrops, wall and window stickers in heritage-inspired Founding Day motifs, branded gift packaging including gift boxes and tissue paper, event programs, certificates of appreciation, and T-shirt and scarf prints for employee celebrations.</p>

<h3>What visual style do Founding Day prints use?</h3>
<p>Founding Day has its own distinct visual identity that differs from National Day. The Founding Day aesthetic draws on Saudi heritage — incorporating elements that reference the 1727 founding period, Arabic calligraphy traditions, and the historical roots of the Saudi state. The color palette is more golden and earthy than the bright green and white of National Day. Window Advertising's design team creates Founding Day materials in the appropriate visual language for each client's brand.</p>

<h3>How early should Founding Day print orders be placed?</h3>
<p>Window Advertising recommends placing Founding Day print orders at least 3 to 4 weeks before February 22nd. Production demand around Founding Day has grown significantly as the occasion has become more established in the corporate calendar. Orders placed in January allow maximum design flexibility and sufficient production and delivery time.</p>

<h3>Do you deliver Founding Day prints across Riyadh?</h3>
<p>Yes. Window Advertising delivers all Founding Day print orders across Riyadh. For organizations with multiple locations, we coordinate delivery scheduling to ensure all materials arrive at each location before the February 22nd celebration.</p>

<h2>Order Founding Day Prints in Riyadh</h2>
<p>Tell us the materials needed, quantities, and your celebration date. Our team provides a complete Founding Day print package and pricing within 24 hours. Early booking recommended.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What Founding Day printed materials does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces the full range of Founding Day printed advertising materials: Founding Day flags in standard and custom sizes, vinyl banners and indoor banners in Founding Day visual identity, step-and-repeat photo backdrops, wall and window stickers in heritage-inspired Founding Day motifs, branded gift packaging including gift boxes and tissue paper, event programs, certificates of appreciation, and T-shirt and scarf prints for employee celebrations."
      }
    },
    {
      "@type": "Question",
      "name": "What visual style do Founding Day prints use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Founding Day has its own distinct visual identity that differs from National Day. The Founding Day aesthetic draws on Saudi heritage — incorporating elements that reference the 1727 founding period, Arabic calligraphy traditions, and the historical roots of the Saudi state. The color palette is more golden and earthy than the bright green and white of National Day. Window Advertising's design team creates Founding Day materials in the appropriate visual language for each client's brand."
      }
    },
    {
      "@type": "Question",
      "name": "How early should Founding Day print orders be placed?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising recommends placing Founding Day print orders at least 3 to 4 weeks before February 22nd. Production demand around Founding Day has grown significantly as the occasion has become more established in the corporate calendar. Orders placed in January allow maximum design flexibility and sufficient production and delivery time."
      }
    },
    {
      "@type": "Question",
      "name": "Do you deliver Founding Day prints across Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising delivers all Founding Day print orders across Riyadh. For organizations with multiple locations, we coordinate delivery scheduling to ensure all materials arrive at each location before the February 22nd celebration."
      }
    }
  ]
}
</script>
HTML;
    }

    private function getArabicContent(): string
    {
        return <<<'HTML'
<p>يوم التأسيس السعودي في 22 فبراير يحتفي بتأسيس الدولة السعودية الأولى — وللمؤسسات في جميع أنحاء الرياض، يتطلب ذلك مجموعة منسقة من المطبوعات والمواد الإعلانية التي تحترم المناسبة بهويتها البصرية التراثية المميزة. وينوو للإعلان ينتج كامل مطبوعات <a href="/ar/services/founding-day-celebrations">احتفالات يوم التأسيس</a> للشركات والجهات الحكومية: أعلام ولافتات واستيكرات وخلفيات فعاليات وهدايا مطبوعة بالهوية البصرية ليوم التأسيس.</p>

<h2>يوم التأسيس — هوية طباعية مميزة</h2>
<p>ليوم التأسيس هوية بصرية مميزة تختلف عن اليوم الوطني — ويجب أن تُصمم المطبوعات لكل مناسبة وفقاً لذلك. بينما تميل <a href="/ar/services/national-day-prints">مطبوعات اليوم الوطني</a> إلى الأخضر الزاهي والأبيض والطابع الاحتفالي المعاصر، تستلهم إعلانات يوم التأسيس من جماليات التراث السعودي: لوحات ألوان أكثر ثراءً تستحضر الذهبي والدرجات الترابية، والخط العربي بأساليبه التقليدية، وزخارف تصميمية تشير إلى تأسيس المملكة في القرن الثامن عشر.</p>
<p>يصمم وينوو للإعلان مواد يوم التأسيس الإعلانية بالهوية البصرية المناسبة — ليست مجرد مطبوعات يوم وطني مُعاد تلوينها، بل نهج تصميمي مستقل يعكس الأهمية التراثية للمناسبة. كل مطبوعة تُنتج بهوية العميل التجارية إلى جانب تصميم مناسبة يوم التأسيس.</p>

<h2>أعلام ولافتات يوم التأسيس</h2>
<p>تخلق <a href="/ar/services/flags">الأعلام</a> واللافتات ليوم التأسيس الأجواء البصرية للمناسبة عبر مداخل المباني والردهات والمكاتب والمساحات الخارجية. ينتج وينوو للإعلان أعلام يوم التأسيس بأحجام قياسية ومخصصة، ولافتات داخلية وخارجية بتصميم يوم التأسيس، وأعلام على شكل قطرة وريشة لتركيبات المداخل، ومجموعات لافتات معلقة لعرض الأتريوم والممرات.</p>
<p>يستخدم إنتاج جميع أعلام ولافتات يوم التأسيس مواد متينة وأحبار مقاومة للأشعة فوق البنفسجية مناسبة للعرض الداخلي والتركيب الخارجي في مناخ الرياض خلال فبراير.</p>

<h2>استيكرات ومطبوعات زخرفية ليوم التأسيس</h2>
<p>تحوّل الاستيكرات والمطبوعات الزخرفية ليوم التأسيس جدران المكاتب ومناطق الاستقبال والنوافذ والمساحات المشتركة خلال فترة المناسبة. ينتج وينوو للإعلان <a href="/ar/services/wall-stickers">استيكرات جدارية</a> ليوم التأسيس من الفينيل القابل للإزالة يمكن تطبيقها قبل الاحتفال وإزالتها بنظافة بعده، وعروض نوافذ بزخارف يوم التأسيس التراثية، واستيكرات أرضية لمناطق الاستقبال والمداخل، واستيكرات مقصوصة بعناصر يوم التأسيس الرسومية لزينة المكاتب وهدايا الموظفين.</p>
<p>يُطبَّق المفردات التصميمية التراثية ليوم التأسيس — الخط العربي والأنماط الهندسية التقليدية وزخارف عصر التأسيس — بشكل متسق على جميع المطبوعات الزخرفية.</p>

<h2>تغليف الهدايا ومطبوعات الفعاليات</h2>
<p>لمجموعات هدايا يوم التأسيس المؤسسية، ينتج وينوو للإعلان صناديق هدايا وأكياس وورق تغليف وبطاقات هدايا مطبوعة بهوية يوم التأسيس. يدمج تصميم تغليف الهدايا شعار الشركة مع تصميم مناسبة يوم التأسيس — للتعبير عن هوية المؤسسة والاحتفاء بالمناسبة معاً. تعد <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> من أكثر طلبات مطبوعات يوم التأسيس شيوعاً التي ننفذها كل عام.</p>
<p>للفعاليات الرسمية ليوم التأسيس، ينتج وينوو للإعلان برامج فعاليات ثنائية اللغة بالعربية والإنجليزية، وشهادات تقدير بتصميم رسمي مستوحى من التراث، وخلفيات تصوير للفعاليات، ومواد ترتيب الطاولات لحفلات العشاء وحفلات التكريم.</p>

<h2>أعمالنا في مطبوعات يوم التأسيس بالرياض</h2>
<p>تصفح معرض الأعمال لمشاهدة أعلام ولافتات واستيكرات وتغليف هدايا يوم التأسيس التي أنتجناها لعملائنا في الرياض في حملات يوم التأسيس السابقة.</p>

<h2>الأسئلة الشائعة حول مطبوعات يوم التأسيس</h2>

<h3>ما المطبوعات التي ينتجها وينوو للإعلان ليوم التأسيس؟</h3>
<p>ينتج وينوو للإعلان كامل مطبوعات يوم التأسيس الإعلانية: أعلام يوم التأسيس بأحجام قياسية ومخصصة، ولافتات فينيل ولافتات داخلية بالهوية البصرية ليوم التأسيس، وخلفيات تصوير، واستيكرات جدارية ونوافذ بزخارف يوم التأسيس التراثية، وتغليف هدايا مؤسسية تشمل صناديق وورق تغليف، وبرامج فعاليات، وشهادات تقدير، وطباعة تيشيرتات وأوشحة لاحتفالات الموظفين.</p>

<h3>ما الأسلوب البصري المستخدم في مطبوعات يوم التأسيس؟</h3>
<p>ليوم التأسيس هوية بصرية مميزة تختلف عن اليوم الوطني. تستلهم جماليات يوم التأسيس من التراث السعودي — بدمج عناصر تشير إلى فترة التأسيس عام 1727، وتقاليد الخط العربي، والجذور التاريخية للدولة السعودية. لوحة الألوان أكثر ذهبية وترابية مقارنة بالأخضر والأبيض الزاهي لليوم الوطني. يصمم فريق وينوو للإعلان مواد يوم التأسيس بالهوية البصرية المناسبة لعلامة كل عميل.</p>

<h3>متى يجب تقديم طلبات مطبوعات يوم التأسيس؟</h3>
<p>يوصي وينوو للإعلان بتقديم طلبات مطبوعات يوم التأسيس قبل 3 إلى 4 أسابيع على الأقل من 22 فبراير. نما الطلب على الإنتاج حول يوم التأسيس بشكل ملحوظ مع ترسخ المناسبة في الأجندة المؤسسية. الطلبات المقدمة في يناير تتيح أقصى مرونة في التصميم ووقت إنتاج وتسليم كافٍ.</p>

<h3>هل تقومون بتوصيل مطبوعات يوم التأسيس في جميع أنحاء الرياض؟</h3>
<p>نعم. يوصل وينوو للإعلان جميع طلبات مطبوعات يوم التأسيس في جميع أنحاء الرياض. للمؤسسات ذات الفروع المتعددة، ننسق جدولة التوصيل لضمان وصول جميع المواد لكل موقع قبل احتفال 22 فبراير.</p>

<h2>اطلب مطبوعات يوم التأسيس في الرياض</h2>
<p>أخبرنا بالمواد المطلوبة والكميات وموعد احتفالكم. يقدم فريقنا باقة مطبوعات يوم التأسيس الكاملة والتسعير خلال 24 ساعة. يُنصح بالحجز المبكر.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما المطبوعات التي ينتجها وينوو للإعلان ليوم التأسيس؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ينتج وينوو للإعلان كامل مطبوعات يوم التأسيس الإعلانية: أعلام يوم التأسيس بأحجام قياسية ومخصصة، ولافتات فينيل ولافتات داخلية بالهوية البصرية ليوم التأسيس، وخلفيات تصوير، واستيكرات جدارية ونوافذ بزخارف يوم التأسيس التراثية، وتغليف هدايا مؤسسية تشمل صناديق وورق تغليف، وبرامج فعاليات، وشهادات تقدير، وطباعة تيشيرتات وأوشحة لاحتفالات الموظفين."
      }
    },
    {
      "@type": "Question",
      "name": "ما الأسلوب البصري المستخدم في مطبوعات يوم التأسيس؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ليوم التأسيس هوية بصرية مميزة تختلف عن اليوم الوطني. تستلهم جماليات يوم التأسيس من التراث السعودي — بدمج عناصر تشير إلى فترة التأسيس عام 1727، وتقاليد الخط العربي، والجذور التاريخية للدولة السعودية. لوحة الألوان أكثر ذهبية وترابية مقارنة بالأخضر والأبيض الزاهي لليوم الوطني. يصمم فريق وينوو للإعلان مواد يوم التأسيس بالهوية البصرية المناسبة لعلامة كل عميل."
      }
    },
    {
      "@type": "Question",
      "name": "متى يجب تقديم طلبات مطبوعات يوم التأسيس؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يوصي وينوو للإعلان بتقديم طلبات مطبوعات يوم التأسيس قبل 3 إلى 4 أسابيع على الأقل من 22 فبراير. نما الطلب على الإنتاج حول يوم التأسيس بشكل ملحوظ مع ترسخ المناسبة في الأجندة المؤسسية. الطلبات المقدمة في يناير تتيح أقصى مرونة في التصميم ووقت إنتاج وتسليم كافٍ."
      }
    },
    {
      "@type": "Question",
      "name": "هل تقومون بتوصيل مطبوعات يوم التأسيس في جميع أنحاء الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. يوصل وينوو للإعلان جميع طلبات مطبوعات يوم التأسيس في جميع أنحاء الرياض. للمؤسسات ذات الفروع المتعددة، ننسق جدولة التوصيل لضمان وصول جميع المواد لكل موقع قبل احتفال 22 فبراير."
      }
    }
  ]
}
</script>
HTML;
    }
};
