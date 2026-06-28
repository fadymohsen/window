<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'display-screens';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/display-screens.webp',
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
            'title' => 'Display Screens',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Display Screens in Riyadh | Digital Advertising Screens Saudi Arabia | Window Advertising',
            'meta_description' => 'Display screens and digital advertising screens in Riyadh. Window Advertising supplies, installs, and manages digital display screens for retail stores, offices, exhibitions, and events across Saudi Arabia. Advertising display solutions with content management. Get a free quote.',
            'meta_keywords' => 'display screens Riyadh, digital advertising screens Saudi Arabia, LED screens Riyadh, retail digital display Saudi Arabia, دعاية واعلان الرياض, شاشات عرض الرياض, استندات دعائية, تصميم فيديو, دعاية واعلان السعودية',
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
            'title' => 'شاشات العرض',
            'content' => $this->getArabicContent(),
            'meta_title' => 'شاشات عرض في الرياض | شاشات إعلانية رقمية السعودية | وينوو للإعلان',
            'meta_description' => 'شاشات عرض وشاشات إعلانية رقمية في الرياض — وينوو للإعلان يوفر ويثبت ويدير شاشات عرض رقمية للمتاجر والمكاتب والمعارض والفعاليات. دعاية واعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'شاشات عرض الرياض, شاشات إعلانية السعودية, دعاية واعلان الرياض, استندات دعائية, تصميم فيديو, دعاية واعلان السعودية, شاشات LED الرياض',
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
        $service = DB::table('services')->where('slug', 'display-screens')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Digital display screens have become the standard advertising and information medium in retail stores, corporate offices, hotels, restaurants, and exhibition environments across Riyadh. A display screen communicates dynamically — rotating promotions, playing brand videos, showing real-time information, and updating remotely without reprinting or reinstalling physical materials. Window Advertising supplies, installs, and manages digital display screens as part of a complete advertising and <a href="/en/services/display-stands">display system</a> for businesses across Saudi Arabia.</p>

<h2>Why Display Screens Are an Advertising Investment</h2>
<p>The advertising advantage of digital display screens over static signage is their ability to show multiple messages in sequence. A retail screen at the point of sale can cycle through a promotional offer, a product feature, a brand video, and a seasonal campaign in a continuous loop — delivering more advertising content in the same physical footprint as a single static sign.</p>
<p>For exhibition booths in Riyadh, a display screen showing a product demonstration video or a brand story creates engagement that a printed poster cannot generate. For corporate offices, a lobby display screen communicating company achievements, news, and values makes an impression on every visitor. For restaurants and hospitality environments, menu boards on display screens can be updated instantly when items change or prices adjust.</p>
<p>Window Advertising supplies display screens as standalone advertising display elements or as integrated parts of a larger advertising system — coordinated with physical signage, promotional stands, and branded materials.</p>

<h2>Types of Display Screens We Supply</h2>
<p>Window Advertising supplies commercial-grade display screen solutions for the Saudi market:</p>
<p><strong>Single Commercial LCD and LED Screens:</strong> Available in sizes from 32 inches to 98 inches for wall-mounted, desktop, and free-standing display applications. Commercial-grade screens are designed for extended daily operation — often 16 to 18 hours per day — unlike consumer televisions that are rated for a few hours of typical home use.</p>
<p><strong>LED Video Wall Panels:</strong> Modular screen tiles that join together to create seamless large-format displays of any size and aspect ratio. Video walls are used for flagship retail environments, hotel lobbies, conference center focal points, and large exhibition booth displays.</p>
<p><strong>Outdoor High-Brightness Screens:</strong> Weather-sealed and rated for direct sunlight visibility with brightness levels 5 to 10 times higher than indoor commercial screens. Used for outdoor advertising installations, building exteriors, and events in Saudi Arabia's climate.</p>
<p><strong>Interactive Touchscreen Displays:</strong> Enable visitor or customer interaction — product configurators, <a href="/en/services/directional-signage">wayfinding directories</a>, self-service kiosks, and interactive brand experiences in retail and hospitality environments.</p>
<p><strong>Free-Standing Screen Stands and Kiosks:</strong> House display screens in self-contained structures that function as portable advertising display units — used at exhibitions, events, and retail floor installations without requiring wall mounting.</p>

<h2>Content Production for Display Screens</h2>
<p>A display screen is only as effective as the content it shows. Window Advertising produces digital advertising content for display screens as an integrated part of the screen supply and installation service — ensuring that the screens arrive ready to display professionally designed, brand-consistent content.</p>
<p>Our <a href="/en/services/digital-marketing">digital content production</a> team creates promotional graphics, animated sequences, product videos, and brand films specifically formatted for the screen sizes and orientations installed. Content is designed for the viewing distances and ambient lighting conditions of each specific installation.</p>
<p>For clients who want to update their screen content regularly, Window Advertising provides a content management service with scheduled updates, seasonal campaign changes, and on-request content revisions managed remotely.</p>

<h2>Display Screens for Exhibitions and Events</h2>
<p>Exhibition booths and events represent some of the highest-impact applications for display screens. In an exhibition hall environment in Riyadh, a screen showing a product video or brand story draws attention from further away and holds it longer than any printed display — giving your booth team more time and opportunity to engage with visitors.</p>
<p>Window Advertising coordinates display screen installation with the wider <a href="/en/services/exhibition-booth-execution">exhibition booth build</a> — ensuring screens are positioned correctly within the booth structure, that cables are concealed within the design, and that the content displayed is aligned with the exhibition campaign and brand identity. Screen stands that complement the <a href="/en/services/lama-stand">Lama stand</a>, roll-up, and promotional display systems are available as part of a complete exhibition package.</p>

<h2>Installation and Technical Specifications</h2>
<p>Window Advertising manages the full installation of display screens at client locations across Riyadh. Our installation service covers site survey, bracket or stand selection, cable routing and concealment, network connectivity for remote content management, initial content setup, and commissioning testing before handover.</p>
<p>For large installations — retail chains, office buildings, hotels — we manage project-based rollouts with a phased installation schedule and full documentation of the installed system. Technical support is available after installation for software and connectivity issues.</p>

<h2>Frequently Asked Questions About Display Screens</h2>

<h3>What types of display screens does Window Advertising supply?</h3>
<p>Window Advertising supplies commercial-grade LCD and LED display screens in sizes from 32 inches to large-format 98-inch panels, LED video wall panels for seamless multi-screen installations, outdoor-rated high-brightness screens for direct sunlight environments, and interactive touchscreen displays for retail and hospitality applications.</p>

<h3>Can you manage the content shown on the screens?</h3>
<p>Yes. Window Advertising provides digital signage content management as part of the display screen service. We can design and update the content displayed on your screens on a regular schedule — including static graphics, promotional videos, event information, and scheduled content rotation. Remote content management means your screens can be updated without on-site visits.</p>

<h3>Are display screens suitable for outdoor advertising in Saudi Arabia?</h3>
<p>Yes, with the right screen specification. Standard commercial screens are designed for indoor use. Outdoor display screens for Saudi Arabia's climate require high-brightness panels (2,000 nits or more for direct sunlight visibility), weatherproof enclosures rated for the temperature range in Riyadh, and UV-resistant screen surfaces. Window Advertising specifies outdoor screens appropriate for the specific installation environment.</p>

<h3>Do you install the screens or only supply them?</h3>
<p>Window Advertising provides full supply and installation. Our installation team handles wall mounting, ceiling suspension, free-standing screen stand assembly, cable management, network connection, and initial software setup. We coordinate electrical requirements with the client's contractor and perform commissioning and testing before handover.</p>

<h2>Get a Display Screen Quote in Riyadh</h2>
<p>Tell us the installation type, screen sizes required, quantity, and whether you need content management. Our team provides a hardware recommendation and full system pricing within 48 hours. Installation and content production included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of display screens does Window Advertising supply?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising supplies commercial-grade LCD and LED display screens in sizes from 32 inches to large-format 98-inch panels, LED video wall panels for seamless multi-screen installations, outdoor-rated high-brightness screens for direct sunlight environments, and interactive touchscreen displays for retail and hospitality applications."
      }
    },
    {
      "@type": "Question",
      "name": "Can you manage the content shown on the screens?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising provides digital signage content management as part of the display screen service. We can design and update the content displayed on your screens on a regular schedule — including static graphics, promotional videos, event information, and scheduled content rotation. Remote content management means your screens can be updated without on-site visits."
      }
    },
    {
      "@type": "Question",
      "name": "Are display screens suitable for outdoor advertising in Saudi Arabia?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, with the right screen specification. Standard commercial screens are designed for indoor use. Outdoor display screens for Saudi Arabia's climate require high-brightness panels (2,000 nits or more for direct sunlight visibility), weatherproof enclosures rated for the temperature range in Riyadh, and UV-resistant screen surfaces. Window Advertising specifies outdoor screens appropriate for the specific installation environment."
      }
    },
    {
      "@type": "Question",
      "name": "Do you install the screens or only supply them?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising provides full supply and installation. Our installation team handles wall mounting, ceiling suspension, free-standing screen stand assembly, cable management, network connection, and initial software setup. We coordinate electrical requirements with the client's contractor and perform commissioning and testing before handover."
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
<p>أصبحت شاشات العرض الرقمية الوسيلة الإعلانية والمعلوماتية المعتمدة في المتاجر والمكاتب المؤسسية والفنادق والمطاعم وبيئات المعارض في جميع أنحاء الرياض. تتواصل شاشة العرض بشكل ديناميكي — تدوير العروض الترويجية وتشغيل فيديوهات العلامة التجارية وعرض المعلومات الفورية والتحديث عن بُعد دون إعادة طباعة أو تركيب مواد مادية. توفر وينوو للإعلان وتركب وتدير شاشات العرض الرقمية كجزء من نظام <a href="/ar/services/display-stands">عرض إعلاني</a> متكامل للأعمال في جميع أنحاء المملكة العربية السعودية.</p>

<h2>لماذا شاشات العرض استثمار إعلاني مثمر؟</h2>
<p>الميزة الإعلانية لشاشات العرض الرقمية مقارنة باللافتات الثابتة هي قدرتها على عرض رسائل متعددة بالتتابع. يمكن لشاشة تجزئة عند نقطة البيع أن تعرض دورياً عرضاً ترويجياً وميزة منتج وفيديو علامة تجارية وحملة موسمية في حلقة مستمرة — مما يقدم محتوى إعلانياً أكثر في نفس المساحة المادية للافتة ثابتة واحدة.</p>
<p>في أجنحة المعارض بالرياض، تولّد شاشة العرض التي تعرض فيديو توضيحي للمنتج أو قصة العلامة التجارية تفاعلاً لا يمكن لملصق مطبوع تحقيقه. في المكاتب المؤسسية، تترك شاشة عرض اللوبي التي تعرض إنجازات الشركة وأخبارها وقيمها انطباعاً على كل زائر. في المطاعم وبيئات الضيافة، يمكن تحديث لوحات القوائم على شاشات العرض فوراً عند تغيير الأصناف أو تعديل الأسعار.</p>
<p>توفر وينوو للإعلان شاشات العرض كعناصر عرض إعلانية مستقلة أو كأجزاء متكاملة من نظام إعلاني أكبر — منسقة مع اللافتات المادية والستاندات الترويجية والمواد ذات العلامة التجارية.</p>

<h2>أنواع شاشات العرض التي نوفرها</h2>
<p>توفر وينوو للإعلان حلول شاشات عرض تجارية للسوق السعودي:</p>
<p><strong>شاشات LCD و LED التجارية المفردة:</strong> متوفرة بأحجام من 32 بوصة إلى 98 بوصة للتطبيقات المثبتة على الحائط والمكتبية والقائمة بذاتها. الشاشات التجارية مصممة للتشغيل اليومي الممتد — غالباً من 16 إلى 18 ساعة يومياً — على عكس أجهزة التلفزيون الاستهلاكية المصممة لساعات قليلة من الاستخدام المنزلي.</p>
<p><strong>ألواح جدران الفيديو LED:</strong> بلاطات شاشات وحدوية تتصل ببعضها لإنشاء شاشات عرض كبيرة بأي حجم ونسبة عرض. تُستخدم جدران الفيديو لبيئات التجزئة الرائدة ولوبيات الفنادق ونقاط التركيز في مراكز المؤتمرات وشاشات أجنحة المعارض الكبيرة.</p>
<p><strong>شاشات خارجية عالية السطوع:</strong> محكمة الإغلاق ضد الطقس ومصنفة للرؤية تحت أشعة الشمس المباشرة بمستويات سطوع أعلى من 5 إلى 10 مرات من الشاشات التجارية الداخلية. تُستخدم لتركيبات الإعلان الخارجي وواجهات المباني والفعاليات في مناخ المملكة العربية السعودية.</p>
<p><strong>شاشات لمس تفاعلية:</strong> تتيح تفاعل الزوار أو العملاء — مُكوِّنات المنتجات و<a href="/ar/services/directional-signage">أدلة الاتجاهات</a> وأكشاك الخدمة الذاتية والتجارب التفاعلية للعلامة التجارية في بيئات التجزئة والضيافة.</p>
<p><strong>ستاندات وأكشاك الشاشات القائمة بذاتها:</strong> تحتضن شاشات العرض في هياكل قائمة بذاتها تعمل كوحدات عرض إعلانية متنقلة — تُستخدم في المعارض والفعاليات وتركيبات أرضيات التجزئة دون الحاجة للتثبيت على الحائط.</p>

<h2>إنتاج المحتوى لشاشات العرض</h2>
<p>فعالية شاشة العرض تعتمد على جودة المحتوى المعروض عليها. تنتج وينوو للإعلان المحتوى الإعلاني الرقمي لشاشات العرض كجزء متكامل من خدمة توفير وتركيب الشاشات — لضمان وصول الشاشات جاهزة لعرض محتوى مصمم باحترافية ومتوافق مع العلامة التجارية.</p>
<p>يصمم فريق <a href="/ar/services/digital-marketing">إنتاج المحتوى الرقمي</a> لدينا رسومات ترويجية ومتسلسلات متحركة وفيديوهات منتجات وأفلام علامة تجارية مهيأة خصيصاً لأحجام واتجاهات الشاشات المركبة. يُصمم المحتوى وفقاً لمسافات المشاهدة وظروف الإضاءة المحيطة لكل تركيب محدد.</p>
<p>للعملاء الذين يرغبون في تحديث محتوى شاشاتهم بانتظام، توفر وينوو للإعلان خدمة إدارة المحتوى مع تحديثات مجدولة وتغييرات الحملات الموسمية ومراجعات المحتوى عند الطلب تُدار عن بُعد.</p>

<h2>شاشات العرض للمعارض والفعاليات</h2>
<p>تمثل أجنحة المعارض والفعاليات بعضاً من أكثر التطبيقات تأثيراً لشاشات العرض. في بيئة قاعة معارض بالرياض، تجذب الشاشة التي تعرض فيديو منتج أو قصة علامة تجارية الانتباه من مسافة أبعد وتحتفظ به لفترة أطول من أي عرض مطبوع — مما يمنح فريق جناحك مزيداً من الوقت والفرصة للتفاعل مع الزوار.</p>
<p>تنسق وينوو للإعلان تركيب شاشات العرض مع بناء <a href="/ar/services/exhibition-booth-execution">جناح المعرض</a> الأوسع — لضمان وضع الشاشات بشكل صحيح ضمن هيكل الجناح وإخفاء الكابلات ضمن التصميم ومواءمة المحتوى المعروض مع حملة المعرض وهوية العلامة التجارية. تتوفر ستاندات الشاشات التي تكمل أنظمة <a href="/ar/services/lama-stand">ستاند لاما</a> والرول أب والعرض الترويجي كجزء من باقة معارض متكاملة.</p>

<h2>التركيب والمواصفات التقنية</h2>
<p>تدير وينوو للإعلان التركيب الكامل لشاشات العرض في مواقع العملاء في جميع أنحاء الرياض. تشمل خدمة التركيب لدينا المسح الميداني واختيار الحوامل أو الستاندات وتوجيه الكابلات وإخفاءها والاتصال بالشبكة لإدارة المحتوى عن بُعد وإعداد المحتوى الأولي واختبار التشغيل قبل التسليم.</p>
<p>للتركيبات الكبيرة — سلاسل التجزئة والمباني المكتبية والفنادق — ندير عمليات تنفيذ مشاريع بجدول تركيب مرحلي وتوثيق كامل للنظام المركب. يتوفر الدعم التقني بعد التركيب لمشكلات البرمجيات والاتصال.</p>

<h2>الأسئلة الشائعة حول شاشات العرض</h2>

<h3>ما أنواع شاشات العرض التي توفرها وينوو للإعلان؟</h3>
<p>توفر وينوو للإعلان شاشات عرض LCD و LED تجارية بأحجام من 32 بوصة إلى ألواح 98 بوصة كبيرة، وألواح جدران فيديو LED للتركيبات السلسة متعددة الشاشات، وشاشات خارجية عالية السطوع لبيئات أشعة الشمس المباشرة، وشاشات لمس تفاعلية لتطبيقات التجزئة والضيافة.</p>

<h3>هل يمكنكم إدارة المحتوى المعروض على الشاشات؟</h3>
<p>نعم. توفر وينوو للإعلان إدارة محتوى اللافتات الرقمية كجزء من خدمة شاشات العرض. يمكننا تصميم وتحديث المحتوى المعروض على شاشاتكم وفق جدول منتظم — بما في ذلك الرسومات الثابتة والفيديوهات الترويجية ومعلومات الفعاليات وتدوير المحتوى المجدول. إدارة المحتوى عن بُعد تعني إمكانية تحديث شاشاتكم دون زيارات ميدانية.</p>

<h3>هل شاشات العرض مناسبة للإعلان الخارجي في السعودية؟</h3>
<p>نعم، مع المواصفات المناسبة للشاشة. الشاشات التجارية العادية مصممة للاستخدام الداخلي. شاشات العرض الخارجية لمناخ المملكة العربية السعودية تتطلب ألواح عالية السطوع (2,000 شمعة أو أكثر للرؤية تحت أشعة الشمس المباشرة) وحاويات مقاومة للطقس مصنفة لنطاق درجات الحرارة في الرياض وأسطح شاشات مقاومة للأشعة فوق البنفسجية. تحدد وينوو للإعلان الشاشات الخارجية المناسبة لبيئة التركيب المحددة.</p>

<h3>هل تركبون الشاشات أم توفرونها فقط؟</h3>
<p>توفر وينوو للإعلان التوفير والتركيب الكامل. يتولى فريق التركيب لدينا التثبيت على الحائط والتعليق من السقف وتجميع ستاندات الشاشات القائمة بذاتها وإدارة الكابلات والاتصال بالشبكة وإعداد البرمجيات الأولي. ننسق المتطلبات الكهربائية مع مقاول العميل ونجري التشغيل والاختبار قبل التسليم.</p>

<h2>احصل على عرض سعر لشاشات العرض في الرياض</h2>
<p>أخبرنا بنوع التركيب وأحجام الشاشات المطلوبة والكمية وما إذا كنت بحاجة لإدارة المحتوى. يقدم فريقنا توصية بالأجهزة وتسعير النظام الكامل خلال 48 ساعة. التركيب وإنتاج المحتوى مشمولان.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع شاشات العرض التي توفرها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "توفر وينوو للإعلان شاشات عرض LCD و LED تجارية بأحجام من 32 بوصة إلى ألواح 98 بوصة كبيرة، وألواح جدران فيديو LED للتركيبات السلسة متعددة الشاشات، وشاشات خارجية عالية السطوع لبيئات أشعة الشمس المباشرة، وشاشات لمس تفاعلية لتطبيقات التجزئة والضيافة."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم إدارة المحتوى المعروض على الشاشات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توفر وينوو للإعلان إدارة محتوى اللافتات الرقمية كجزء من خدمة شاشات العرض. يمكننا تصميم وتحديث المحتوى المعروض على شاشاتكم وفق جدول منتظم — بما في ذلك الرسومات الثابتة والفيديوهات الترويجية ومعلومات الفعاليات وتدوير المحتوى المجدول. إدارة المحتوى عن بُعد تعني إمكانية تحديث شاشاتكم دون زيارات ميدانية."
      }
    },
    {
      "@type": "Question",
      "name": "هل شاشات العرض مناسبة للإعلان الخارجي في السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم، مع المواصفات المناسبة للشاشة. الشاشات التجارية العادية مصممة للاستخدام الداخلي. شاشات العرض الخارجية لمناخ المملكة العربية السعودية تتطلب ألواح عالية السطوع (2,000 شمعة أو أكثر للرؤية تحت أشعة الشمس المباشرة) وحاويات مقاومة للطقس مصنفة لنطاق درجات الحرارة في الرياض وأسطح شاشات مقاومة للأشعة فوق البنفسجية. تحدد وينوو للإعلان الشاشات الخارجية المناسبة لبيئة التركيب المحددة."
      }
    },
    {
      "@type": "Question",
      "name": "هل تركبون الشاشات أم توفرونها فقط؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "توفر وينوو للإعلان التوفير والتركيب الكامل. يتولى فريق التركيب لدينا التثبيت على الحائط والتعليق من السقف وتجميع ستاندات الشاشات القائمة بذاتها وإدارة الكابلات والاتصال بالشبكة وإعداد البرمجيات الأولي. ننسق المتطلبات الكهربائية مع مقاول العميل ونجري التشغيل والاختبار قبل التسليم."
      }
    }
  ]
}
</script>
HTML;
    }
};
