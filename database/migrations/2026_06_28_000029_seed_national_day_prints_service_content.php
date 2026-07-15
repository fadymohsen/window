<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'national-day-prints';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/national-day-prints.webp',
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
            'title' => 'National Day Prints',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'National Day Prints in Riyadh | Saudi National Day Advertising Print | Window Advertising',
            'meta_description' => 'National Day prints, flags, banners, and advertising materials in Riyadh. Window Advertising produces all Saudi National Day printed materials — stickers, flags, banners, backdrops, and branded gift prints for companies across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'national day prints Riyadh, Saudi national day advertising, national day banners Riyadh, national day flags Saudi Arabia, national day stickers Riyadh, دعاية واعلان الرياض, مطبوعات اليوم الوطني, هدايا دعائية, دعاية واعلان السعودية, استيكرات اليوم الوطني',
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
            'title' => 'مطبوعات اليوم الوطني',
            'content' => $this->getArabicContent(),
            'meta_title' => 'مطبوعات اليوم الوطني في الرياض | طباعة إعلانات اليوم الوطني السعودي | ويندو للإعلان',
            'meta_description' => 'مطبوعات وإعلانات اليوم الوطني السعودي في الرياض — ويندو للإعلان ينتج استيكرات وأعلام ولافتات وخلفيات تصوير وهدايا مطبوعة مميزة لاحتفالات اليوم الوطني. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'مطبوعات اليوم الوطني الرياض, دعاية واعلان الرياض, هدايا دعائية اليوم الوطني, دعاية واعلان السعودية, استيكرات اليوم الوطني, لافتات اليوم الوطني الرياض',
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
        $service = DB::table('services')->where('slug', 'national-day-prints')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Saudi National Day on September 23rd generates one of the highest concentrations of advertising print production in Riyadh's annual calendar. Every company, government entity, and public-facing brand in the Kingdom needs flags, banners, stickers, decorations, and branded gift materials designed and printed before the celebration. Window Advertising produces the complete range of <a href="/en/services/national-day-celebrations">national day celebrations</a> advertising prints for organizations across Riyadh and Saudi Arabia.</p>

<h2>The National Day Print Production Need</h2>
<p>National Day is not a single print item — it is a coordinated visual campaign that covers the building exterior, the lobby, the office environment, the event photography station, and the employee gift. Each of these touchpoints requires a different print medium, and every item needs to be visually coordinated to create a unified celebration identity.</p>
<p>Window Advertising manages National Day print production as a single coordinated project — not separate orders for flags, banners, and stickers from different suppliers. Every printed item for the same client shares the same design language, color accuracy, and brand alignment.</p>

<h2>National Day Flags and Banners</h2>
<p><a href="/en/services/flags">Flags</a> and banners are the most visible National Day advertising materials — they communicate the celebration publicly and signal to employees, clients, and visitors that the organization is marking the occasion.</p>
<p>Window Advertising produces Saudi national flags in standard sizes from 60x90cm to large 200x300cm formats, teardrop and feather flags for building entrances and outdoor spaces, pole-mounted rectangular banners for internal and external use, fabric pull-up banners for lobby and reception displays, and vinyl outdoor banners for building facades and event sites.</p>
<p>All flag and banner production uses colorfast printing to maintain accurate Saudi national green with full-sun exposure — critical for outdoor installations during September in Riyadh.</p>

<h2>National Day Stickers and Decorative Prints</h2>
<p>Stickers and decorative prints create the celebration environment across office walls, windows, floors, and furniture. Window Advertising produces National Day stickers in a full range of formats:</p>
<p><a href="/en/services/wall-stickers">Wall stickers</a> and window vinyl in Saudi national designs and patterns transform office and reception spaces for the celebration period. Stickers are produced in removable vinyl — easily applied before the celebration and removed cleanly afterward without surface damage.</p>
<p>Floor stickers in national day graphics create a celebration experience through the full space, guiding visitors and creating photographic moments throughout the office.</p>
<p>Custom-cut stickers in national day motifs — falcons, palm trees, Arabic calligraphy, and Saudi geometric patterns — are popular for employee welcome gifts and desk decorations.</p>

<h2>Event Backdrops and Photography Stations</h2>
<p>For corporate National Day <a href="/en/services/event-festival">event and festival</a> celebrations in Riyadh, a professionally produced step-and-repeat backdrop creates the focal point for photography and creates lasting documentation of the celebration. Window Advertising designs and produces National Day event backdrops with the company logo, the occasion year, and national branding elements — in the correct format for photography and social media documentation.</p>
<p>Backdrop sizes typically range from 2x2 meters for smaller celebrations to 3x6 meters for large corporate events. Pop-up X-frame and retractable stand options are available for portable installations at events across multiple locations.</p>

<h2>Gift Packaging and Branded Gift Prints</h2>
<p>National Day gift packaging is as important as the gift itself in Saudi Arabia's corporate gift culture. Window Advertising produces National Day-branded gift box packaging, tissue paper, gift bags, and wrapping materials that coordinate with the gift set inside.</p>
<p>Branded gift prints for employee gifting include custom-printed gift boxes in Saudi national colors with the company logo and occasion message, printed gift tags, certificates of appreciation in formal Arabic and English bilingual design, and occasion greeting cards. Our <a href="/en/services/employee-gift-boxes">employee gift boxes</a> are designed to match National Day themes while maintaining your corporate identity.</p>

<h2>National Day Prints Portfolio — Riyadh</h2>
<p>Browse the portfolio to see National Day flags, banners, stickers, backdrops, and gift packaging produced for clients across Riyadh and Saudi Arabia in previous National Day campaigns.</p>

<h2>Frequently Asked Questions About National Day Prints</h2>

<h3>What types of National Day prints does Window Advertising produce?</h3>
<p>Window Advertising produces the full range of National Day printed advertising materials: Saudi national flags in standard and custom sizes, vinyl banners and outdoor banners in Saudi green and white, step-and-repeat photo backdrops with National Day branding, wall and window stickers in national motifs, branded gift prints including gift boxes and packaging, event programs and certificates of appreciation, and T-shirt and scarf prints for employee celebrations.</p>

<h3>How early should we order National Day prints?</h3>
<p>Window Advertising recommends placing National Day print orders at least 4 to 6 weeks before September 23rd. Riyadh's printing market experiences extremely high demand in the 3 weeks leading up to National Day — orders placed in this window may face longer lead times or limited availability for certain materials. Early booking guarantees production priority and more time for design revisions.</p>

<h3>Can you design the National Day prints or do we supply artwork?</h3>
<p>Window Advertising provides both design and print. Our design team creates National Day advertising artwork incorporating the company logo and brand alongside Saudi national occasion motifs, colors, and typography. If you have existing artwork, we prepare and verify print-ready files before production. All designs are presented as digital proofs for approval before printing begins.</p>

<h3>Do you deliver National Day prints across Riyadh?</h3>
<p>Yes. Window Advertising delivers all National Day print orders across Riyadh. For large corporate accounts with multiple delivery locations, we coordinate delivery scheduling to ensure all materials arrive at each location ahead of the celebration date.</p>

<h2>Order National Day Prints in Riyadh</h2>
<p>Tell us the materials you need, quantities, and your celebration date. Our team provides a complete print package proposal and pricing within 24 hours. Book early to secure your production slot.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of National Day prints does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces the full range of National Day printed advertising materials: Saudi national flags in standard and custom sizes, vinyl banners and outdoor banners in Saudi green and white, step-and-repeat photo backdrops with National Day branding, wall and window stickers in national motifs, branded gift prints including gift boxes and packaging, event programs and certificates of appreciation, and T-shirt and scarf prints for employee celebrations."
      }
    },
    {
      "@type": "Question",
      "name": "How early should we order National Day prints?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising recommends placing National Day print orders at least 4 to 6 weeks before September 23rd. Riyadh's printing market experiences extremely high demand in the 3 weeks leading up to National Day — orders placed in this window may face longer lead times or limited availability for certain materials. Early booking guarantees production priority and more time for design revisions."
      }
    },
    {
      "@type": "Question",
      "name": "Can you design the National Day prints or do we supply artwork?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising provides both design and print. Our design team creates National Day advertising artwork incorporating the company logo and brand alongside Saudi national occasion motifs, colors, and typography. If you have existing artwork, we prepare and verify print-ready files before production. All designs are presented as digital proofs for approval before printing begins."
      }
    },
    {
      "@type": "Question",
      "name": "Do you deliver National Day prints across Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising delivers all National Day print orders across Riyadh. For large corporate accounts with multiple delivery locations, we coordinate delivery scheduling to ensure all materials arrive at each location ahead of the celebration date."
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
<p>يُولّد اليوم الوطني السعودي في 23 سبتمبر واحداً من أعلى تركيزات إنتاج الطباعة الإعلانية في التقويم السنوي للرياض. تحتاج كل شركة وجهة حكومية وعلامة تجارية في المملكة إلى أعلام ولافتات واستيكرات وزينة ومواد هدايا مؤسسية مصممة ومطبوعة قبل الاحتفال. تنتج ويندو للإعلان المجموعة الكاملة من مطبوعات <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> الإعلانية للمؤسسات في الرياض والمملكة العربية السعودية.</p>

<h2>احتياجات الطباعة لليوم الوطني</h2>
<p>اليوم الوطني ليس مطبوعة واحدة — إنه حملة بصرية منسقة تغطي واجهة المبنى والردهة وبيئة المكتب ومحطة التصوير وهدية الموظف. يتطلب كل نقطة اتصال وسيطاً مطبوعاً مختلفاً، ويجب أن يكون كل عنصر منسقاً بصرياً لإنشاء هوية احتفالية موحدة.</p>
<p>تدير ويندو للإعلان إنتاج مطبوعات اليوم الوطني كمشروع منسق واحد — وليس طلبات منفصلة للأعلام واللافتات والاستيكرات من موردين مختلفين. كل عنصر مطبوع لنفس العميل يشترك في نفس اللغة التصميمية ودقة الألوان وتوافق العلامة التجارية.</p>

<h2>أعلام ولافتات اليوم الوطني</h2>
<p><a href="/ar/services/flags">الأعلام</a> واللافتات هي أكثر مواد اليوم الوطني الإعلانية وضوحاً — فهي تنقل الاحتفال علنياً وتشير للموظفين والعملاء والزوار بأن المؤسسة تحتفل بالمناسبة.</p>
<p>تنتج ويندو للإعلان الأعلام الوطنية السعودية بأحجام قياسية من 60×90 سم إلى أحجام كبيرة 200×300 سم، وأعلام القطرة والريشة لمداخل المباني والمساحات الخارجية، ولافتات مستطيلة مثبتة على أعمدة للاستخدام الداخلي والخارجي، ولافتات قماشية رول أب لعروض الردهة والاستقبال، ولافتات فينيل خارجية لواجهات المباني ومواقع الفعاليات.</p>
<p>يستخدم إنتاج جميع الأعلام واللافتات طباعة ثابتة الألوان للحفاظ على اللون الأخضر الوطني السعودي الدقيق مع التعرض الكامل لأشعة الشمس — وهو أمر حاسم للتركيبات الخارجية خلال شهر سبتمبر في الرياض.</p>

<h2>استيكرات ومطبوعات زخرفية لليوم الوطني</h2>
<p>تخلق الاستيكرات والمطبوعات الزخرفية بيئة الاحتفال عبر جدران المكتب والنوافذ والأرضيات والأثاث. تنتج ويندو للإعلان استيكرات اليوم الوطني بمجموعة كاملة من الأشكال:</p>
<p><a href="/ar/services/wall-stickers">استيكرات الجدران</a> وفينيل النوافذ بتصاميم وأنماط وطنية سعودية تحوّل مساحات المكتب والاستقبال لفترة الاحتفال. تُنتج الاستيكرات من فينيل قابل للإزالة — يُطبق بسهولة قبل الاحتفال ويُزال بنظافة بعده دون إتلاف الأسطح.</p>
<p>استيكرات الأرضيات برسومات اليوم الوطني تخلق تجربة احتفالية عبر المساحة الكاملة، وتوجه الزوار وتخلق لحظات تصويرية في جميع أنحاء المكتب.</p>
<p>الاستيكرات المقصوصة بزخارف اليوم الوطني — الصقور وأشجار النخيل والخط العربي والأنماط الهندسية السعودية — مشهورة لهدايا الترحيب بالموظفين وزينة المكاتب.</p>

<h2>خلفيات الفعاليات ومحطات التصوير</h2>
<p>لاحتفالات اليوم الوطني المؤسسية و<a href="/ar/services/event-festival">الفعاليات والمهرجانات</a> في الرياض، تخلق خلفية ستيب أند ريبيت المنتجة احترافياً نقطة محورية للتصوير وتوثيقاً دائماً للاحتفال. تصمم وتنتج ويندو للإعلان خلفيات فعاليات اليوم الوطني مع شعار الشركة وسنة المناسبة وعناصر العلامة الوطنية — بالتنسيق الصحيح للتصوير وتوثيق وسائل التواصل الاجتماعي.</p>
<p>تتراوح أحجام الخلفيات عادةً من 2×2 متر للاحتفالات الصغيرة إلى 3×6 أمتار للفعاليات المؤسسية الكبيرة. تتوفر خيارات إطارات X المنبثقة والحوامل القابلة للسحب للتركيبات المتنقلة في الفعاليات عبر مواقع متعددة.</p>

<h2>تغليف الهدايا ومطبوعات الهدايا</h2>
<p>تغليف هدايا اليوم الوطني بنفس أهمية الهدية نفسها في ثقافة الهدايا المؤسسية في المملكة العربية السعودية. تنتج ويندو للإعلان تغليف صناديق هدايا بعلامة اليوم الوطني، وورق المناديل، وأكياس الهدايا، ومواد التغليف المنسقة مع محتويات الهدية.</p>
<p>تشمل مطبوعات الهدايا المؤسسية لإهداء الموظفين صناديق هدايا مطبوعة بألوان وطنية سعودية مع شعار الشركة ورسالة المناسبة، وبطاقات هدايا مطبوعة، وشهادات تقدير بتصميم رسمي ثنائي اللغة عربي وإنجليزي، وبطاقات تهنئة بالمناسبة. <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> لدينا مصممة لتتوافق مع أجواء اليوم الوطني مع الحفاظ على هويتكم المؤسسية.</p>

<h2>أعمالنا في مطبوعات اليوم الوطني بالرياض</h2>
<p>تصفح معرض أعمالنا لمشاهدة أعلام ولافتات واستيكرات وخلفيات وتغليف هدايا اليوم الوطني المنتجة لعملائنا في الرياض والمملكة العربية السعودية في حملات اليوم الوطني السابقة.</p>

<h2>الأسئلة الشائعة حول مطبوعات اليوم الوطني</h2>

<h3>ما أنواع مطبوعات اليوم الوطني التي تنتجها ويندو للإعلان؟</h3>
<p>تنتج ويندو للإعلان المجموعة الكاملة من المواد الإعلانية المطبوعة لليوم الوطني: الأعلام الوطنية السعودية بأحجام قياسية ومخصصة، ولافتات الفينيل واللافتات الخارجية باللونين الأخضر والأبيض السعودي، وخلفيات تصوير ستيب أند ريبيت بعلامة اليوم الوطني، واستيكرات الجدران والنوافذ بزخارف وطنية، ومطبوعات هدايا مؤسسية تشمل صناديق هدايا وتغليف، وبرامج فعاليات وشهادات تقدير، ومطبوعات تيشيرتات وأوشحة لاحتفالات الموظفين.</p>

<h3>ما هو الوقت المناسب لطلب مطبوعات اليوم الوطني؟</h3>
<p>توصي ويندو للإعلان بتقديم طلبات مطبوعات اليوم الوطني قبل 4 إلى 6 أسابيع على الأقل من 23 سبتمبر. يشهد سوق الطباعة في الرياض طلباً مرتفعاً للغاية في الأسابيع الثلاثة التي تسبق اليوم الوطني — قد تواجه الطلبات المقدمة في هذه الفترة أوقات تسليم أطول أو توفر محدود لبعض المواد. الحجز المبكر يضمن أولوية الإنتاج ووقتاً أكثر لمراجعة التصاميم.</p>

<h3>هل يمكنكم تصميم مطبوعات اليوم الوطني أم نقدم التصاميم؟</h3>
<p>توفر ويندو للإعلان خدمتي التصميم والطباعة معاً. يصمم فريق التصميم لدينا أعمالاً إعلانية لليوم الوطني تدمج شعار الشركة والعلامة التجارية مع زخارف المناسبة الوطنية السعودية وألوانها وخطوطها. إذا كانت لديكم تصاميم جاهزة، نعدّ ونتحقق من ملفات الطباعة قبل الإنتاج. تُعرض جميع التصاميم كبروفات رقمية للموافقة قبل بدء الطباعة.</p>

<h3>هل توصلون مطبوعات اليوم الوطني في جميع أنحاء الرياض؟</h3>
<p>نعم. توصل ويندو للإعلان جميع طلبات مطبوعات اليوم الوطني في جميع أنحاء الرياض. للحسابات المؤسسية الكبيرة ذات مواقع التسليم المتعددة، ننسق جدولة التوصيل لضمان وصول جميع المواد إلى كل موقع قبل تاريخ الاحتفال.</p>

<h2>اطلب مطبوعات اليوم الوطني في الرياض</h2>
<p>أخبرنا بالمواد التي تحتاجها والكميات وتاريخ احتفالكم. يقدم فريقنا عرضاً كاملاً لحزمة الطباعة والتسعير خلال 24 ساعة. احجز مبكراً لتأمين فترة الإنتاج الخاصة بك.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع مطبوعات اليوم الوطني التي تنتجها ويندو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج ويندو للإعلان المجموعة الكاملة من المواد الإعلانية المطبوعة لليوم الوطني: الأعلام الوطنية السعودية بأحجام قياسية ومخصصة، ولافتات الفينيل واللافتات الخارجية باللونين الأخضر والأبيض السعودي، وخلفيات تصوير ستيب أند ريبيت بعلامة اليوم الوطني، واستيكرات الجدران والنوافذ بزخارف وطنية، ومطبوعات هدايا مؤسسية تشمل صناديق هدايا وتغليف، وبرامج فعاليات وشهادات تقدير، ومطبوعات تيشيرتات وأوشحة لاحتفالات الموظفين."
      }
    },
    {
      "@type": "Question",
      "name": "ما هو الوقت المناسب لطلب مطبوعات اليوم الوطني؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "توصي ويندو للإعلان بتقديم طلبات مطبوعات اليوم الوطني قبل 4 إلى 6 أسابيع على الأقل من 23 سبتمبر. يشهد سوق الطباعة في الرياض طلباً مرتفعاً للغاية في الأسابيع الثلاثة التي تسبق اليوم الوطني — قد تواجه الطلبات المقدمة في هذه الفترة أوقات تسليم أطول أو توفر محدود لبعض المواد. الحجز المبكر يضمن أولوية الإنتاج ووقتاً أكثر لمراجعة التصاميم."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم تصميم مطبوعات اليوم الوطني أم نقدم التصاميم؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "توفر ويندو للإعلان خدمتي التصميم والطباعة معاً. يصمم فريق التصميم لدينا أعمالاً إعلانية لليوم الوطني تدمج شعار الشركة والعلامة التجارية مع زخارف المناسبة الوطنية السعودية وألوانها وخطوطها. إذا كانت لديكم تصاميم جاهزة، نعدّ ونتحقق من ملفات الطباعة قبل الإنتاج. تُعرض جميع التصاميم كبروفات رقمية للموافقة قبل بدء الطباعة."
      }
    },
    {
      "@type": "Question",
      "name": "هل توصلون مطبوعات اليوم الوطني في جميع أنحاء الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توصل ويندو للإعلان جميع طلبات مطبوعات اليوم الوطني في جميع أنحاء الرياض. للحسابات المؤسسية الكبيرة ذات مواقع التسليم المتعددة، ننسق جدولة التوصيل لضمان وصول جميع المواد إلى كل موقع قبل تاريخ الاحتفال."
      }
    }
  ]
}
</script>
HTML;
    }
};
