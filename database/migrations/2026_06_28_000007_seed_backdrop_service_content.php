<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'backdrop';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/backdrop.webp',
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
            'title' => 'Backdrop',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Backdrop Printing in Riyadh | Event Backdrop Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom backdrop printing for events, conferences, and photoshoots in Riyadh. Window Advertising prints step-and-repeat backdrops, stage backdrops, and branded photo walls for corporate events across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'backdrop printing Riyadh, event backdrop Saudi Arabia, step and repeat backdrop Riyadh, stage backdrop printing, دعاية وإعلان الرياض, باك دروب الرياض, خلفيات تصوير الرياض',
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
            'title' => 'باك دروب',
            'content' => $this->getArabicContent(),
            'meta_title' => 'طباعة باك دروب في الرياض | خلفيات فعاليات السعودية | وينوو للإعلان',
            'meta_description' => 'طباعة باك دروب مخصصة للفعاليات والمؤتمرات والتصوير في الرياض — باك دروب ستيب آند ريبيت وخلفيات المسارح والجدران الإعلانية للشركات. دعاية وإعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'باك دروب الرياض, طباعة خلفيات فعاليات, دعاية وإعلان الرياض, باك دروب مؤتمرات, تصميم باك دروب السعودية, خلفية تصوير مطبوعة الرياض',
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
        $service = DB::table('services')->where('slug', 'backdrop')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Every photo taken at your event is a piece of branded content. A professionally printed backdrop ensures that every image shared from your conference, award ceremony, or corporate gathering carries your brand in the background. Window Advertising designs and prints event backdrops for organizations across Riyadh and Saudi Arabia — producing the full backdrop including frame system, from order to delivery.</p>

<h2>What Is an Event Backdrop?</h2>
<p>An event backdrop is a large printed panel placed behind a stage, podium, photo opportunity, or reception area at a corporate or public event. It transforms an ordinary wall or open space into a branded visual environment. When guests photograph themselves in front of the backdrop, every image produced at the event becomes branded content.</p>
<p>Backdrops are used at press conferences, award ceremonies, product launches, corporate galas, exhibition booths, networking events, and government functions. In Riyadh's active corporate event market, a high-quality backdrop is a standard expectation at any professional gathering. Whether you are organizing full-scale <a href="/en/services/events-conferences">events and conferences</a> or a focused media appearance, the backdrop anchors your visual branding.</p>

<h2>Types of Backdrops We Print</h2>
<p>Window Advertising produces every type of event backdrop used in the Saudi advertising and events market:</p>
<p><strong>Step-and-Repeat Backdrops</strong> repeat a logo or brand pattern across the entire surface — ensuring brand visibility in photographs regardless of where subjects are positioned. This is the standard backdrop format for media events, award nights, and branded photo opportunities.</p>
<p><strong>Full-Design Stage Backdrops</strong> cover the entire stage or presentation wall with a single custom design. Used for keynote stages, conference rooms, and award ceremony setups where the backdrop serves as the primary visual element behind a speaker or presenter.</p>
<p><strong>Branded Photo Wall Backdrops</strong> are designed specifically for photo opportunities at events — often featuring a mix of brand logos, event names, and decorative design elements.</p>
<p><strong>Fabric Tension Backdrops</strong> use a pillowcase-style fabric that stretches over an aluminum frame, producing a wrinkle-free, backlit-capable surface with a professional exhibition-quality finish.</p>
<p><strong>Pop-up Backdrop Systems</strong> combine the printed graphic with a portable curved frame that expands for setup and collapses for transport — popular for exhibitions, shopping mall activations, and portable event branding. For standalone portable solutions, see our <a href="/en/services/pop-up">pop-up display</a> options.</p>

<h2>Backdrops for Conferences and Corporate Events</h2>
<p>In Riyadh's corporate event environment, the backdrop behind the conference stage sets the tone for the entire event. It is the most photographed element of any conference, appearing in every keynote photograph, every speaker portrait, and every social media post from the event floor.</p>
<p>Window Advertising produces conference stage backdrops that are built to perform at this level of visibility. Our designs align with your event identity, incorporate sponsor logos correctly, and are produced at the resolution required for sharp appearance on large stage formats. We coordinate with your events team on dimensions, frame requirements, and delivery timeline to fit your event production schedule. For complete event environments including booth construction, explore our <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> service.</p>

<h2>Material and Print Quality</h2>
<p>The quality of a printed backdrop is determined by the material and the resolution at which it is printed. Window Advertising uses premium materials selected for their flatness, color accuracy, and photographic performance:</p>
<p>Fabric backdrops are produced on dye-sublimation printed fabric that is vibrant, wrinkle-resistant, and machine washable for reuse across multiple events. The material is lightweight, which simplifies transport and installation. PVC flex backdrops are printed using large-format UV ink systems at resolutions suited to close viewing distances. These are particularly sharp when used for photo walls and close-proximity photographic backgrounds. All materials are finished without visible seams in standard sizes, and multi-panel joins are precision-matched for larger installations. For large-format outdoor applications, our <a href="/en/services/banner-printing-installation">banner printing</a> service covers extended dimensions and weather-resistant substrates.</p>

<h2>Frame Systems and Installation</h2>
<p>Window Advertising supplies backdrops with the frame system included. Our frame options cover straight and curved aluminum extrusion systems, freestanding tension fabric frames, portable <a href="/en/services/roll-up">roll-up</a> backdrop stands for smaller applications, and custom-welded steel frames for permanent or semi-permanent stage backdrops.</p>
<p>Delivery and installation across Riyadh is available as part of the backdrop service. Our team arrives at your venue, assembles the frame, fits the graphic, and ensures the backdrop is tensioned, level, and ready for your event.</p>

<h2>Backdrop Portfolio — Riyadh</h2>
<p>Browse our event backdrop portfolio including conference stage backdrops, step-and-repeat photo walls, exhibition booth backdrops, and award ceremony displays produced for corporate clients across Riyadh and Saudi Arabia.</p>

<h2>Frequently Asked Questions About Backdrops</h2>

<h3>What is a step-and-repeat backdrop?</h3>
<p>A step-and-repeat backdrop is a large printed panel featuring a repeating pattern of logos and branding — commonly used as a photo background at press events, award ceremonies, and corporate receptions. The pattern ensures that every photograph taken in front of the backdrop includes the brand's logo, regardless of where the subject stands.</p>

<h3>What materials are used for event backdrops?</h3>
<p>Window Advertising produces backdrops on fabric (tension fabric or pillowcase fabric), PVC flex, and matte vinyl depending on the application. Fabric backdrops produce a wrinkle-free, professional finish and are lightweight and portable. PVC backdrops offer sharp print quality for close-up photography. Both options are available with or without frame systems.</p>

<h3>Do you supply the backdrop frame as well as the print?</h3>
<p>Yes. Window Advertising provides complete backdrop packages including the printed graphic and the aluminum frame system. Frame options include straight frames, curved frames, and freestanding portable systems. We also supply backdrop stands for smaller photo wall applications.</p>

<h3>How fast can a backdrop be printed for an event?</h3>
<p>Standard backdrop orders with approved designs are produced within 1 to 3 business days. For urgent event needs, same-day production is available for standard sizes. Contact us with your event date and we will confirm the fastest available turnaround.</p>

<h2>Order Your Event Backdrop in Riyadh</h2>
<p>Share your event date, backdrop dimensions, and design files or brief. Our team will confirm material recommendations and pricing within 24 hours. Rush production is available for urgent event deadlines.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is a step-and-repeat backdrop?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A step-and-repeat backdrop is a large printed panel featuring a repeating pattern of logos and branding — commonly used as a photo background at press events, award ceremonies, and corporate receptions. The pattern ensures that every photograph taken in front of the backdrop includes the brand's logo, regardless of where the subject stands."
      }
    },
    {
      "@type": "Question",
      "name": "What materials are used for event backdrops?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces backdrops on fabric (tension fabric or pillowcase fabric), PVC flex, and matte vinyl depending on the application. Fabric backdrops produce a wrinkle-free, professional finish and are lightweight and portable. PVC backdrops offer sharp print quality for close-up photography. Both options are available with or without frame systems."
      }
    },
    {
      "@type": "Question",
      "name": "Do you supply the backdrop frame as well as the print?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising provides complete backdrop packages including the printed graphic and the aluminum frame system. Frame options include straight frames, curved frames, and freestanding portable systems. We also supply backdrop stands for smaller photo wall applications."
      }
    },
    {
      "@type": "Question",
      "name": "How fast can a backdrop be printed for an event?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard backdrop orders with approved designs are produced within 1 to 3 business days. For urgent event needs, same-day production is available for standard sizes. Contact us with your event date and we will confirm the fastest available turnaround."
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
<p>كل صورة تُلتقط في فعاليتك هي محتوى يحمل علامتك التجارية. الباك دروب المطبوع باحترافية يضمن أن كل صورة تُشارَك من مؤتمرك أو حفل التكريم أو تجمعك المؤسسي تحمل علامتك التجارية في الخلفية. وينوو للإعلان تصمم وتطبع باك دروب الفعاليات للمؤسسات في جميع أنحاء الرياض والمملكة العربية السعودية — بإنتاج كامل يشمل نظام الإطار، من الطلب حتى التسليم.</p>

<h2>ما هو باك دروب الفعاليات؟</h2>
<p>باك دروب الفعاليات هو لوحة مطبوعة كبيرة توضع خلف المسرح أو المنصة أو منطقة التصوير أو منطقة الاستقبال في فعالية مؤسسية أو عامة. يحوّل جداراً عادياً أو مساحة مفتوحة إلى بيئة بصرية تحمل العلامة التجارية. عندما يلتقط الضيوف صوراً أمام الباك دروب، تصبح كل صورة منتجة في الفعالية محتوى يحمل العلامة التجارية.</p>
<p>يُستخدم الباك دروب في المؤتمرات الصحفية وحفلات التكريم وإطلاق المنتجات والحفلات المؤسسية وأجنحة المعارض وفعاليات التواصل والمناسبات الحكومية. في سوق الفعاليات المؤسسية النشط في الرياض، يُعد الباك دروب عالي الجودة توقعاً أساسياً في أي تجمع مهني. سواء كنت تنظم <a href="/ar/services/events-conferences">فعاليات ومؤتمرات</a> واسعة النطاق أو ظهوراً إعلامياً مركزاً، فإن الباك دروب يرسّخ هويتك البصرية.</p>

<h2>أنواع الباك دروب التي نطبعها</h2>
<p>تنتج وينوو للإعلان جميع أنواع باك دروب الفعاليات المستخدمة في سوق الإعلان والفعاليات السعودي:</p>
<p><strong>باك دروب ستيب آند ريبيت</strong> يكرر شعاراً أو نمطاً للعلامة التجارية عبر السطح بالكامل — مما يضمن ظهور العلامة التجارية في الصور بغض النظر عن موقع الأشخاص. هذا هو التنسيق القياسي للباك دروب في الفعاليات الإعلامية وحفلات التكريم وفرص التصوير المؤسسية.</p>
<p><strong>باك دروب المسرح بتصميم كامل</strong> يغطي المسرح بالكامل أو جدار العرض بتصميم مخصص واحد. يُستخدم لمسارح الكلمات الرئيسية وقاعات المؤتمرات وإعدادات حفلات التكريم حيث يكون الباك دروب العنصر البصري الأساسي خلف المتحدث أو مقدم العرض.</p>
<p><strong>باك دروب جدار التصوير</strong> مصمم خصيصاً لفرص التصوير في الفعاليات — وغالباً ما يتضمن مزيجاً من شعارات العلامة التجارية وأسماء الفعاليات وعناصر التصميم الزخرفية.</p>
<p><strong>باك دروب القماش المشدود</strong> يستخدم قماشاً بأسلوب الوسادة يُشد على إطار ألمنيوم، مما ينتج سطحاً خالياً من التجاعيد وقابلاً للإضاءة الخلفية بجودة معارض احترافية.</p>
<p><strong>أنظمة باك دروب البوب أب</strong> تجمع بين الرسم المطبوع وإطار منحنٍ قابل للنقل يتمدد للتركيب وينطوي للنقل — شائعة في المعارض وفعاليات المراكز التجارية والعلامة التجارية المتنقلة للفعاليات. للحلول المتنقلة المستقلة، اطلع على خيارات <a href="/ar/services/pop-up">شاشات البوب أب</a> لدينا.</p>

<h2>باك دروب المؤتمرات والفعاليات الشركاتية</h2>
<p>في بيئة الفعاليات المؤسسية بالرياض، يحدد الباك دروب خلف مسرح المؤتمر نبرة الفعالية بأكملها. إنه العنصر الأكثر تصويراً في أي مؤتمر، ويظهر في كل صورة كلمة رئيسية وكل بورتريه متحدث وكل منشور على وسائل التواصل الاجتماعي من أرضية الفعالية.</p>
<p>تنتج وينوو للإعلان باك دروب مسارح المؤتمرات المصمم ليؤدي بهذا المستوى من الظهور. تتوافق تصاميمنا مع هوية فعاليتك، وتدمج شعارات الرعاة بشكل صحيح، وتُنتج بالدقة المطلوبة للظهور الحاد على تنسيقات المسارح الكبيرة. ننسق مع فريق فعالياتك بشأن الأبعاد ومتطلبات الإطار والجدول الزمني للتسليم ليتناسب مع جدول إنتاج فعاليتك. لبيئات فعاليات متكاملة تشمل بناء الأجنحة، استكشف خدمة <a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a> لدينا.</p>

<h2>المواد وجودة الطباعة</h2>
<p>تتحدد جودة الباك دروب المطبوع بالمادة ودقة الطباعة المستخدمة. تستخدم وينوو للإعلان مواد ممتازة مختارة لاستوائها ودقة ألوانها وأدائها الفوتوغرافي:</p>
<p>باك دروب القماش يُنتج على قماش مطبوع بالتسامي الحراري يتميز بألوان زاهية ومقاومة للتجاعيد وقابلية للغسل لإعادة الاستخدام في فعاليات متعددة. المادة خفيفة الوزن مما يبسط النقل والتركيب. باك دروب PVC فلكس يُطبع باستخدام أنظمة حبر UV كبيرة الحجم بدقة تناسب مسافات المشاهدة القريبة. هذه حادة بشكل خاص عند استخدامها لجدران التصوير والخلفيات الفوتوغرافية القريبة. جميع المواد تُنهى بدون لحامات مرئية في الأحجام القياسية، وتُطابق الوصلات متعددة الألواح بدقة للتركيبات الأكبر. للتطبيقات الخارجية كبيرة الحجم، تغطي خدمة <a href="/ar/services/banner-printing-installation">طباعة البانرات</a> لدينا الأبعاد الممتدة والركائز المقاومة للعوامل الجوية.</p>

<h2>أنظمة الإطارات والتركيب</h2>
<p>توفر وينوو للإعلان الباك دروب مع نظام الإطار مشمولاً. تغطي خيارات الإطارات لدينا أنظمة قضبان الألمنيوم المستقيمة والمنحنية، وإطارات القماش المشدود القائمة بذاتها، وحوامل باك دروب <a href="/ar/services/roll-up">الرول أب</a> المتنقلة للتطبيقات الأصغر، وإطارات الفولاذ الملحومة حسب الطلب للباك دروب الدائم أو شبه الدائم للمسارح.</p>
<p>التوصيل والتركيب في جميع أنحاء الرياض متاح كجزء من خدمة الباك دروب. يصل فريقنا إلى موقعك، ويجمّع الإطار، ويركّب الرسم، ويضمن أن الباك دروب مشدود ومستوٍ وجاهز لفعاليتك.</p>

<h2>أعمالنا في الباك دروب بالرياض</h2>
<p>تصفح معرض أعمالنا في باك دروب الفعاليات بما في ذلك باك دروب مسارح المؤتمرات وجدران تصوير ستيب آند ريبيت وباك دروب أجنحة المعارض وشاشات حفلات التكريم المنتجة لعملاء الشركات في الرياض والمملكة العربية السعودية.</p>

<h2>الأسئلة الشائعة حول الباك دروب</h2>

<h3>ما هو باك دروب ستيب آند ريبيت؟</h3>
<p>باك دروب ستيب آند ريبيت هو لوحة مطبوعة كبيرة تتضمن نمطاً متكرراً من الشعارات والعلامة التجارية — يُستخدم عادةً كخلفية تصوير في الفعاليات الصحفية وحفلات التكريم والاستقبالات المؤسسية. يضمن النمط أن كل صورة تُلتقط أمام الباك دروب تتضمن شعار العلامة التجارية، بغض النظر عن مكان وقوف الشخص.</p>

<h3>ما المواد المستخدمة في باك دروب الفعاليات؟</h3>
<p>تنتج وينوو للإعلان الباك دروب على القماش (قماش مشدود أو قماش بأسلوب الوسادة) وPVC فلكس والفينيل المطفي حسب التطبيق. باك دروب القماش ينتج لمسة نهائية احترافية خالية من التجاعيد وخفيف الوزن وقابل للنقل. باك دروب PVC يوفر جودة طباعة حادة للتصوير القريب. كلا الخيارين متاحان مع أو بدون أنظمة إطارات.</p>

<h3>هل توفرون إطار الباك دروب بالإضافة إلى الطباعة؟</h3>
<p>نعم. توفر وينوو للإعلان حزم باك دروب كاملة تشمل الرسم المطبوع ونظام إطار الألمنيوم. تشمل خيارات الإطارات الإطارات المستقيمة والإطارات المنحنية والأنظمة القائمة بذاتها القابلة للنقل. كما نوفر حوامل باك دروب لتطبيقات جدران التصوير الأصغر.</p>

<h3>ما سرعة طباعة باك دروب لفعالية؟</h3>
<p>تُنتج طلبات الباك دروب القياسية بتصاميم معتمدة خلال 1 إلى 3 أيام عمل. للاحتياجات العاجلة للفعاليات، يتوفر الإنتاج في نفس اليوم للأحجام القياسية. تواصل معنا بتاريخ فعاليتك وسنؤكد أسرع وقت تسليم متاح.</p>

<h2>اطلب باك دروب فعاليتك في الرياض</h2>
<p>شارك تاريخ فعاليتك وأبعاد الباك دروب وملفات التصميم أو الموجز. سيؤكد فريقنا توصيات المواد والتسعير خلال 24 ساعة. الإنتاج السريع متاح للمواعيد النهائية العاجلة للفعاليات.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما هو باك دروب ستيب آند ريبيت؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "باك دروب ستيب آند ريبيت هو لوحة مطبوعة كبيرة تتضمن نمطاً متكرراً من الشعارات والعلامة التجارية — يُستخدم عادةً كخلفية تصوير في الفعاليات الصحفية وحفلات التكريم والاستقبالات المؤسسية. يضمن النمط أن كل صورة تُلتقط أمام الباك دروب تتضمن شعار العلامة التجارية، بغض النظر عن مكان وقوف الشخص."
      }
    },
    {
      "@type": "Question",
      "name": "ما المواد المستخدمة في باك دروب الفعاليات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج وينوو للإعلان الباك دروب على القماش (قماش مشدود أو قماش بأسلوب الوسادة) وPVC فلكس والفينيل المطفي حسب التطبيق. باك دروب القماش ينتج لمسة نهائية احترافية خالية من التجاعيد وخفيف الوزن وقابل للنقل. باك دروب PVC يوفر جودة طباعة حادة للتصوير القريب. كلا الخيارين متاحان مع أو بدون أنظمة إطارات."
      }
    },
    {
      "@type": "Question",
      "name": "هل توفرون إطار الباك دروب بالإضافة إلى الطباعة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توفر وينوو للإعلان حزم باك دروب كاملة تشمل الرسم المطبوع ونظام إطار الألمنيوم. تشمل خيارات الإطارات الإطارات المستقيمة والإطارات المنحنية والأنظمة القائمة بذاتها القابلة للنقل. كما نوفر حوامل باك دروب لتطبيقات جدران التصوير الأصغر."
      }
    },
    {
      "@type": "Question",
      "name": "ما سرعة طباعة باك دروب لفعالية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُنتج طلبات الباك دروب القياسية بتصاميم معتمدة خلال 1 إلى 3 أيام عمل. للاحتياجات العاجلة للفعاليات، يتوفر الإنتاج في نفس اليوم للأحجام القياسية. تواصل معنا بتاريخ فعاليتك وسنؤكد أسرع وقت تسليم متاح."
      }
    }
  ]
}
</script>
HTML;
    }
};
