<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'honor-shields';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/honor-shields.webp',
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
            'title' => 'Honor Shields',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Honor Shields & Trophies in Riyadh | Corporate Awards Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom honor shields and corporate trophies in Riyadh. Window Advertising designs and manufactures commemorative shields, award plaques, and recognition trophies for events and employee appreciation across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'honor shields Riyadh, corporate trophies Saudi Arabia, award plaques Riyadh, commemorative shields, هدايا دعائية الرياض, دعاية واعلان الرياض, تنظيم حفلات, دروع تذكارية السعودية',
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
            'title' => 'دروع التكريم',
            'content' => $this->getArabicContent(),
            'meta_title' => 'دروع تذكارية وجوائز في الرياض | هدايا شركاتية السعودية | ويندو للإعلان',
            'meta_description' => 'دروع تذكارية وجوائز مخصصة للشركات في الرياض — ويندو للإعلان يصمم وينتج دروع التميز والألواح التكريمية لفعاليات التنظيم وتقدير الموظفين. دعاية واعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'دروع تذكارية الرياض, هدايا دعائية السعودية, دعاية واعلان الرياض, تنظيم حفلات التكريم, جوائز شركات الرياض, دروع تميز السعودية',
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
        $service = DB::table('services')->where('slug', 'honor-shields')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>An honor shield is more than a trophy — it is a lasting symbol of recognition that the recipient displays, photographs, and remembers long after the ceremony ends. Window Advertising designs and manufactures custom honor shields and corporate awards for employee recognition events, government ceremonies, educational institutions, and corporate appreciation occasions across Riyadh and Saudi Arabia.</p>

<h2>The Role of Honor Shields in Saudi Corporate Culture</h2>
<p>Recognition ceremonies hold significant cultural weight in Saudi Arabia. Presenting an employee, partner, or official with a quality crafted honor shield communicates respect, appreciation, and organizational prestige in a way that a verbal acknowledgment or certificate alone cannot.</p>
<p>As part of a full advertising and event solution, Window Advertising produces honor shields that are coordinated with the visual identity of the ceremony — matching the event branding, stage design, and printed materials to create a unified recognition experience. Whether you are organizing a small team appreciation event or a large-scale national awards ceremony, the shield itself must reflect the standard of the occasion. Our shields are a natural complement to our broader range of <a href="/en/services/promotional-gifts">promotional gifts</a> for corporate clients.</p>

<h2>Materials and Finishes</h2>
<p>Window Advertising works with premium materials to produce shields appropriate for every occasion and budget:</p>
<p><strong>Acrylic shields</strong> are the most versatile option — available in clear, colored, and gradient finishes, with laser engraving or full-color UV printing. Clean, modern in appearance, and popular across corporate and educational recognition events.</p>
<p><strong>Crystal glass shields</strong> are the premium standard for executive recognition, government awards, and prestigious annual ceremonies. The optical clarity of crystal combined with precision engraving produces a product that communicates exceptional quality.</p>
<p><strong>Metal shields</strong> in stainless steel, aluminum, or brass carry a traditional, authoritative aesthetic. Preferred by government bodies, security organizations, and institutions where formality is paramount.</p>
<p><strong>Wood base shields</strong> combine a natural wood plaque with a metal or acrylic engraving plate. The combination of materials creates a warm, substantial look well suited to long-service awards and senior employee recognition.</p>

<h2>Customization and Engraving</h2>
<p>Every honor shield produced by Window Advertising is individually customized for its recipient and occasion. Customization includes the organization's logo, the recipient's full name and title, the award category, the date of presentation, and any custom citation text or Arabic calligraphy requested by the client.</p>
<p>Our design team prepares a digital proof of each shield before production, showing the exact layout, typography, and content. For large award ceremonies where multiple shields are required, we manage the individual customization of each unit from a single recipient list you provide, ensuring every shield is accurate before it is placed in the presenter's hands.</p>

<h2>Honor Shields for Events and Ceremony Organizing</h2>
<p>Honor shields are a central element of formal recognition ceremonies, annual galas, and employee appreciation events across Riyadh. Window Advertising coordinates shield production alongside the broader <a href="/en/services/event-management">event management</a> — ensuring the awards are ready before the ceremony date, presented in premium packaging, and delivered to the venue on time.</p>
<p>For companies that hold regular recognition events, we maintain design templates that can be updated with new recipient names each cycle, reducing production time and ensuring design consistency year after year. Our shields are regularly used at <a href="/en/services/national-day-celebrations">national day celebrations</a>, founding day events, corporate end-of-year galas, and executive departures. We also supply shields for <a href="/en/services/events-conferences">events and conferences</a> where speaker recognition and partner awards are part of the program.</p>

<h2>Packaging and Presentation</h2>
<p>A premium honor shield deserves premium packaging. Window Advertising supplies honor shields with velvet-lined presentation boxes, custom-printed boxes carrying the event or organization branding, and protective foam inserts that hold the shield securely during transport and gifting.</p>
<p>For large ceremonies, we coordinate the labeling, sequencing, and delivery of multiple individually packaged shields to the event venue — ensuring the presentation is as polished as the shield itself. This service pairs seamlessly with our <a href="/en/services/employee-gift-boxes">employee gift boxes</a> for organizations that combine awards with curated gift sets.</p>

<h2>Honor Shields Portfolio — Riyadh</h2>
<p>Browse our portfolio of honor shields and corporate awards produced for clients across Riyadh and Saudi Arabia. Our gallery includes crystal awards, acrylic recognition shields, metal plaques, and complete ceremony award sets.</p>

<h2>Frequently Asked Questions About Honor Shields</h2>

<h3>What materials are honor shields made from?</h3>
<p>Window Advertising manufactures honor shields in acrylic, crystal glass, stainless steel, aluminum, solid wood, and combined wood-metal materials. The material choice reflects the occasion's prestige level and the organization's brand aesthetic. Crystal and metal shields are the most popular choice for senior executive and government recognition awards.</p>

<h3>Can the shield be engraved with a custom message?</h3>
<p>Yes. Every honor shield from Window Advertising includes custom engraving or printing with the recipient's name, title, organization, achievement, and date. Arabic and English text are both supported. We provide a digital proof of the engraving layout for your approval before production begins.</p>

<h3>How quickly can honor shields be produced for an event?</h3>
<p>Standard honor shields are produced within 3 to 7 business days. For urgent ceremony deadlines, expedited production is available depending on quantity and material. We recommend ordering at least two weeks before a large award ceremony to allow time for proof review and any adjustments.</p>

<h3>Do you supply honor shields for government and corporate events in Riyadh?</h3>
<p>Yes. Window Advertising supplies honor shields and commemorative awards for government institutions, private corporations, educational organizations, and NGOs across Riyadh and Saudi Arabia. Our designs accommodate Arabic calligraphy, organizational emblems, and the formal presentation standards expected at official Saudi ceremonies.</p>

<h2>Order Custom Honor Shields in Riyadh</h2>
<p>Share the occasion, quantity, material preference, and recipient details. Our team provides a design proof and pricing within 24 hours. Full engraving, packaging, and delivery coordination included across Riyadh.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What materials are honor shields made from?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising manufactures honor shields in acrylic, crystal glass, stainless steel, aluminum, solid wood, and combined wood-metal materials. The material choice reflects the occasion's prestige level and the organization's brand aesthetic. Crystal and metal shields are the most popular choice for senior executive and government recognition awards."
      }
    },
    {
      "@type": "Question",
      "name": "Can the shield be engraved with a custom message?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Every honor shield from Window Advertising includes custom engraving or printing with the recipient's name, title, organization, achievement, and date. Arabic and English text are both supported. We provide a digital proof of the engraving layout for your approval before production begins."
      }
    },
    {
      "@type": "Question",
      "name": "How quickly can honor shields be produced for an event?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard honor shields are produced within 3 to 7 business days. For urgent ceremony deadlines, expedited production is available depending on quantity and material. We recommend ordering at least two weeks before a large award ceremony to allow time for proof review and any adjustments."
      }
    },
    {
      "@type": "Question",
      "name": "Do you supply honor shields for government and corporate events in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising supplies honor shields and commemorative awards for government institutions, private corporations, educational organizations, and NGOs across Riyadh and Saudi Arabia. Our designs accommodate Arabic calligraphy, organizational emblems, and the formal presentation standards expected at official Saudi ceremonies."
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
<p>الدرع التذكاري أكثر من مجرد جائزة — إنه رمز دائم للتقدير يعرضه المُكرَّم ويصوره ويتذكره طويلاً بعد انتهاء الحفل. تصمم ويندو للإعلان وتصنع دروعاً تذكارية وجوائز شركاتية مخصصة لفعاليات تكريم الموظفين والمناسبات الحكومية والمؤسسات التعليمية وحفلات التقدير المؤسسية في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<h2>دور الدروع التذكارية في بيئة الأعمال السعودية</h2>
<p>تحمل حفلات التكريم ثقلاً ثقافياً كبيراً في المملكة العربية السعودية. تقديم درع تذكاري عالي الجودة لموظف أو شريك أو مسؤول يعبّر عن الاحترام والتقدير والمكانة المؤسسية بطريقة لا يمكن للاعتراف الشفهي أو الشهادة وحدها تحقيقها.</p>
<p>كجزء من حل إعلاني وفعالياتي متكامل، تنتج ويندو للإعلان دروعاً تذكارية منسقة مع الهوية البصرية للحفل — تتوافق مع علامة الفعالية وتصميم المسرح والمواد المطبوعة لخلق تجربة تكريم موحدة. سواء كنت تنظم فعالية تقدير فريق صغير أو حفل جوائز وطني واسع النطاق، يجب أن يعكس الدرع نفسه مستوى المناسبة. دروعنا مكمّل طبيعي لمجموعتنا الأوسع من <a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> للعملاء من الشركات.</p>

<h2>المواد والتشطيبات</h2>
<p>تعمل ويندو للإعلان بمواد فاخرة لإنتاج دروع مناسبة لكل مناسبة وميزانية:</p>
<p><strong>دروع الأكريليك</strong> هي الخيار الأكثر تنوعاً — متوفرة بتشطيبات شفافة وملونة ومتدرجة، مع نقش بالليزر أو طباعة UV بالألوان الكاملة. أنيقة وعصرية المظهر، وشائعة في فعاليات التكريم المؤسسية والتعليمية.</p>
<p><strong>دروع الكريستال</strong> هي المعيار الفاخر للتكريم التنفيذي والجوائز الحكومية والحفلات السنوية المرموقة. صفاء الكريستال البصري مع النقش الدقيق ينتج منتجاً يعبّر عن جودة استثنائية.</p>
<p><strong>الدروع المعدنية</strong> من الفولاذ المقاوم للصدأ أو الألمنيوم أو النحاس تحمل طابعاً تقليدياً ورسمياً. مفضلة لدى الجهات الحكومية والمنظمات الأمنية والمؤسسات التي تتطلب الرسمية.</p>
<p><strong>دروع القاعدة الخشبية</strong> تجمع بين لوح خشبي طبيعي ولوحة نقش معدنية أو أكريليك. مزيج المواد يخلق مظهراً دافئاً وجوهرياً مناسباً لجوائز الخدمة الطويلة وتكريم كبار الموظفين.</p>

<h2>التخصيص والنقش</h2>
<p>كل درع تذكاري تنتجه ويندو للإعلان مخصص بشكل فردي للمُكرَّم والمناسبة. يشمل التخصيص شعار المؤسسة، والاسم الكامل واللقب للمُكرَّم، وفئة الجائزة، وتاريخ التقديم، وأي نص استشهاد مخصص أو خط عربي يطلبه العميل.</p>
<p>يُعدّ فريق التصميم لدينا نموذجاً رقمياً لكل درع قبل الإنتاج، يُظهر التخطيط الدقيق والطباعة والمحتوى. لحفلات التكريم الكبيرة التي تتطلب دروعاً متعددة، ندير التخصيص الفردي لكل وحدة من قائمة مُكرَّمين واحدة تقدمها، لضمان دقة كل درع قبل وضعه في يد مقدّم الجائزة.</p>

<h2>الدروع التذكارية للفعاليات وتنظيم الحفلات</h2>
<p>الدروع التذكارية عنصر محوري في حفلات التكريم الرسمية والحفلات السنوية وفعاليات تقدير الموظفين في جميع أنحاء الرياض. تنسق ويندو للإعلان إنتاج الدروع جنباً إلى جنب مع <a href="/ar/services/event-management">إدارة الفعاليات</a> الأوسع — لضمان جاهزية الجوائز قبل موعد الحفل، وتقديمها في تغليف فاخر، وتسليمها للمكان في الوقت المحدد.</p>
<p>للشركات التي تقيم فعاليات تكريم منتظمة، نحتفظ بقوالب تصميم يمكن تحديثها بأسماء مُكرَّمين جدد في كل دورة، مما يقلل وقت الإنتاج ويضمن اتساق التصميم عاماً بعد عام. تُستخدم دروعنا بانتظام في <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> وفعاليات يوم التأسيس وحفلات نهاية العام المؤسسية وتوديع المدراء التنفيذيين. كما نوفر دروعاً لـ<a href="/ar/services/events-conferences">الفعاليات والمؤتمرات</a> التي يكون فيها تكريم المتحدثين وجوائز الشركاء جزءاً من البرنامج.</p>

<h2>التعبئة والتغليف وطريقة التسليم</h2>
<p>الدرع التذكاري الفاخر يستحق تغليفاً فاخراً. توفر ويندو للإعلان الدروع التذكارية مع صناديق عرض مبطنة بالمخمل، وصناديق مطبوعة مخصصة تحمل علامة الفعالية أو المؤسسة، وحشوات إسفنجية واقية تثبت الدرع بأمان أثناء النقل والإهداء.</p>
<p>للحفلات الكبيرة، ننسق وضع العلامات والتسلسل والتوصيل للدروع المعبأة بشكل فردي إلى مكان الفعالية — لضمان أن يكون التقديم مصقولاً كالدرع نفسه. تتكامل هذه الخدمة بسلاسة مع <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> للمؤسسات التي تجمع بين الجوائز ومجموعات الهدايا المنسقة.</p>

<h2>أعمالنا في الدروع التذكارية بالرياض</h2>
<p>تصفح معرض أعمالنا من الدروع التذكارية والجوائز الشركاتية المنتجة لعملاء في جميع أنحاء الرياض والمملكة العربية السعودية. يشمل معرضنا جوائز الكريستال ودروع التقدير الأكريليك واللوحات المعدنية ومجموعات جوائز الحفلات الكاملة.</p>

<h2>الأسئلة الشائعة حول الدروع التذكارية</h2>

<h3>ما المواد المستخدمة في تصنيع الدروع التذكارية؟</h3>
<p>تصنع ويندو للإعلان الدروع التذكارية من الأكريليك والكريستال والفولاذ المقاوم للصدأ والألمنيوم والخشب الصلب والمواد المركبة من الخشب والمعدن. يعكس اختيار المادة مستوى فخامة المناسبة والجمالية المؤسسية للعلامة التجارية. الدروع الكريستالية والمعدنية هي الخيار الأكثر شيوعاً لجوائز تكريم كبار المدراء التنفيذيين والجوائز الحكومية.</p>

<h3>هل يمكن نقش رسالة مخصصة على الدرع؟</h3>
<p>نعم. كل درع تذكاري من ويندو للإعلان يتضمن نقشاً أو طباعة مخصصة باسم المُكرَّم ولقبه ومؤسسته وإنجازه وتاريخه. النصوص العربية والإنجليزية مدعومة. نقدم نموذجاً رقمياً لتخطيط النقش لموافقتك قبل بدء الإنتاج.</p>

<h3>ما سرعة إنتاج الدروع التذكارية لفعالية؟</h3>
<p>تُنتج الدروع التذكارية القياسية خلال 3 إلى 7 أيام عمل. للمواعيد النهائية العاجلة للحفلات، يتوفر إنتاج سريع حسب الكمية والمادة. ننصح بالطلب قبل أسبوعين على الأقل من حفل تكريم كبير لإتاحة وقت لمراجعة النموذج وأي تعديلات.</p>

<h3>هل توفرون دروعاً تذكارية للفعاليات الحكومية والشركاتية في الرياض؟</h3>
<p>نعم. توفر ويندو للإعلان دروعاً تذكارية وجوائز تكريمية للمؤسسات الحكومية والشركات الخاصة والمنظمات التعليمية والمنظمات غير الربحية في جميع أنحاء الرياض والمملكة العربية السعودية. تستوعب تصاميمنا الخط العربي والشعارات المؤسسية ومعايير التقديم الرسمية المتوقعة في الحفلات السعودية الرسمية.</p>

<h2>اطلب دروعك التذكارية المخصصة في الرياض</h2>
<p>شاركنا المناسبة والكمية وتفضيل المادة وتفاصيل المُكرَّمين. يقدم فريقنا نموذج تصميم وتسعير خلال 24 ساعة. النقش والتغليف وتنسيق التوصيل مشمول في جميع أنحاء الرياض.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما المواد المستخدمة في تصنيع الدروع التذكارية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تصنع ويندو للإعلان الدروع التذكارية من الأكريليك والكريستال والفولاذ المقاوم للصدأ والألمنيوم والخشب الصلب والمواد المركبة من الخشب والمعدن. يعكس اختيار المادة مستوى فخامة المناسبة والجمالية المؤسسية للعلامة التجارية. الدروع الكريستالية والمعدنية هي الخيار الأكثر شيوعاً لجوائز تكريم كبار المدراء التنفيذيين والجوائز الحكومية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن نقش رسالة مخصصة على الدرع؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. كل درع تذكاري من ويندو للإعلان يتضمن نقشاً أو طباعة مخصصة باسم المُكرَّم ولقبه ومؤسسته وإنجازه وتاريخه. النصوص العربية والإنجليزية مدعومة. نقدم نموذجاً رقمياً لتخطيط النقش لموافقتك قبل بدء الإنتاج."
      }
    },
    {
      "@type": "Question",
      "name": "ما سرعة إنتاج الدروع التذكارية لفعالية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُنتج الدروع التذكارية القياسية خلال 3 إلى 7 أيام عمل. للمواعيد النهائية العاجلة للحفلات، يتوفر إنتاج سريع حسب الكمية والمادة. ننصح بالطلب قبل أسبوعين على الأقل من حفل تكريم كبير لإتاحة وقت لمراجعة النموذج وأي تعديلات."
      }
    },
    {
      "@type": "Question",
      "name": "هل توفرون دروعاً تذكارية للفعاليات الحكومية والشركاتية في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توفر ويندو للإعلان دروعاً تذكارية وجوائز تكريمية للمؤسسات الحكومية والشركات الخاصة والمنظمات التعليمية والمنظمات غير الربحية في جميع أنحاء الرياض والمملكة العربية السعودية. تستوعب تصاميمنا الخط العربي والشعارات المؤسسية ومعايير التقديم الرسمية المتوقعة في الحفلات السعودية الرسمية."
      }
    }
  ]
}
</script>
HTML;
    }
};
