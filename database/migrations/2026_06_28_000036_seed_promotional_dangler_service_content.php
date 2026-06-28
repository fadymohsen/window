<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'promotional-dangler';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/promotional-dangler.webp',
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
            'title' => 'Promotional Danglers',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Promotional Danglers in Riyadh | Custom Hanging Advertising Saudi Arabia | Window Advertising',
            'meta_description' => 'Promotional danglers and hanging advertising in Riyadh. Window Advertising designs and produces custom danglers for retail stores, exhibitions, cars, and events across Saudi Arabia. Hanging advertising, mirror danglers, rearview mirror promotions, and ceiling display units. Get a free quote.',
            'meta_keywords' => 'promotional danglers Riyadh, hanging advertising Saudi Arabia, car danglers Riyadh, retail danglers Saudi Arabia, ceiling hanging display Riyadh, دعاية واعلان الرياض, دانقلر دعائي الرياض, استيكرات, هدايا دعائية, دعاية واعلان السعودية',
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
            'title' => 'دانقلرات دعائية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'دانقلر دعائي في الرياض | إعلانات معلقة مخصصة السعودية | وينوو للإعلان',
            'meta_description' => 'دانقلرات دعائية وإعلانات معلقة في الرياض — وينوو للإعلان يصمم وينتج دانقلرات للمحلات التجارية والمعارض والسيارات والفعاليات في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'دانقلر دعائي الرياض, إعلانات معلقة السعودية, دعاية واعلان الرياض, استيكرات, هدايا دعائية, دعاية واعلان السعودية, دانقلر سيارة الرياض',
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
        $service = DB::table('services')->where('slug', 'promotional-dangler')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Promotional danglers use vertical space to deliver advertising messages — suspended from ceilings, shelf rails, rearview mirrors, and display structures to reach audiences who are actively browsing, driving, or engaged with a retail environment. Window Advertising designs and produces promotional danglers for retail stores, events, vehicle promotions, and hospitality environments across Riyadh and Saudi Arabia. Danglers complement other branded items such as <a href="/en/services/promotional-bags">promotional bags</a> and <a href="/en/services/promotional-gifts">promotional gifts</a> as part of a complete promotional strategy.</p>

<h2>Danglers as Retail Advertising Tools</h2>
<p>In Saudi Arabia's retail environment, the vertical space above product displays and along aisle ceilings represents underused advertising real estate. Ceiling-hung danglers, shelf-edge danglers, and product display danglers direct shopper attention to specific products, promotions, and brand campaigns without occupying floor or shelf space.</p>
<p>Window Advertising designs retail danglers that are bold enough to be seen from aisle distance, clear enough to communicate the message in a quick read, and produced in a quality that reflects the brand. Danglers printed on both sides communicate the same message to shoppers approaching from either direction. Paired with <a href="/en/services/wall-stickers">wall stickers</a>, danglers create a fully branded in-store environment.</p>

<h2>Car and Rearview Mirror Danglers</h2>
<p>Rearview mirror danglers are the most personal category of promotional dangler — a branded item that stays in a vehicle and is seen by the driver and every passenger on every journey. In Saudi Arabia's car-dependent culture, a quality rearview mirror dangler generates exceptional brand impression frequency.</p>
<p>Window Advertising produces rearview mirror danglers in standard card, scented card (functioning as a branded air freshener), and rigid die-cut formats in custom brand shapes. Danglers are produced with the company logo and branding on both sides and come with hanging strings, ribbons, or custom-printed cords.</p>
<p>For new car purchases and automotive dealership promotions, hospitality welcome gifts, and corporate gift sets, the car dangler is a practical branded item that recipients use rather than discard.</p>

<h2>Event and Exhibition Danglers</h2>
<p>For exhibitions, trade shows, and corporate events across Riyadh, ceiling-hung danglers above booth spaces and entrance areas are visible from a distance and serve as the first visual element that draws visitors toward a specific booth or area. Window Advertising produces large-format ceiling danglers, branded hanging mobiles with multiple elements, and entrance arch hanging displays as part of the wider <a href="/en/services/event-festival">event and festival</a> material set.</p>
<p>At corporate events and <a href="/en/services/national-day-celebrations">national day celebrations</a>, branded danglers in themed designs — National Day or Founding Day motifs alongside the company logo — create an immersive celebration atmosphere throughout the event venue.</p>

<h2>Custom Die-Cut Danglers</h2>
<p>Standard rectangular danglers communicate a message. Custom die-cut danglers in a brand-relevant shape communicate identity. A dangler cut in the exact silhouette of the company's logo, a product shape, or a national occasion motif creates instant brand recognition and a distinctive advertising impression.</p>
<p>Window Advertising develops custom die-cut templates for promotional danglers, enabling production in any shape that serves the brand's visual communication objectives. Die-cut danglers in unique shapes are consistently more effective at attracting attention than standard rectangular formats.</p>

<h2>Frequently Asked Questions About Promotional Danglers</h2>

<h3>What is a promotional dangler and where is it used?</h3>
<p>A promotional dangler is a hanging advertising display — typically a double-sided printed card, board, or shaped piece suspended from a thread, ribbon, or cord. Danglers are used in retail stores (hanging from ceiling rails, shelf edges, or product displays), in vehicle windows (rearview mirror danglers as branded air fresheners or promotional tags), at events and exhibitions (hanging from ceiling structures or booth frames), and in hospitality environments (door handle danglers, room display pieces).</p>

<h3>What materials are promotional danglers printed on?</h3>
<p>Window Advertising produces promotional danglers on coated card stock (the most common material for retail and event danglers), thick foam board for large-format ceiling hanging displays, clear acetate for transparent danglers with a premium effect, rigid PVC for outdoor and vehicle danglers, and specialty materials including wood veneer and acrylic for premium branded danglers used in luxury gifting and hospitality.</p>

<h3>Can danglers be produced in custom shapes?</h3>
<p>Yes. Custom die-cut danglers in any shape — the company logo, a product silhouette, a national occasion motif, or any custom outline — are a signature application. Die-cut danglers in brand-relevant shapes are more distinctive and memorable than standard rectangular cards. Window Advertising handles the die-cutting template design and production for custom-shaped danglers.</p>

<h3>What is the minimum order for promotional danglers?</h3>
<p>Minimum order for standard printed danglers is typically 100 units. For custom die-cut shapes, the minimum is 200 to 500 units depending on the die complexity. Large retail chain orders and event distribution requirements are accommodated at significantly higher quantities with bulk pricing.</p>

<h2>Order Promotional Danglers in Riyadh</h2>
<p>Tell us the application, material preference, shape, quantity, and your brand files. Our team provides design concepts and pricing within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is a promotional dangler and where is it used?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A promotional dangler is a hanging advertising display — typically a double-sided printed card, board, or shaped piece suspended from a thread, ribbon, or cord. Danglers are used in retail stores (hanging from ceiling rails, shelf edges, or product displays), in vehicle windows (rearview mirror danglers as branded air fresheners or promotional tags), at events and exhibitions (hanging from ceiling structures or booth frames), and in hospitality environments (door handle danglers, room display pieces)."
      }
    },
    {
      "@type": "Question",
      "name": "What materials are promotional danglers printed on?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces promotional danglers on coated card stock (the most common material for retail and event danglers), thick foam board for large-format ceiling hanging displays, clear acetate for transparent danglers with a premium effect, rigid PVC for outdoor and vehicle danglers, and specialty materials including wood veneer and acrylic for premium branded danglers used in luxury gifting and hospitality."
      }
    },
    {
      "@type": "Question",
      "name": "Can danglers be produced in custom shapes?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Custom die-cut danglers in any shape — the company logo, a product silhouette, a national occasion motif, or any custom outline — are a signature application. Die-cut danglers in brand-relevant shapes are more distinctive and memorable than standard rectangular cards. Window Advertising handles the die-cutting template design and production for custom-shaped danglers."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for promotional danglers?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum order for standard printed danglers is typically 100 units. For custom die-cut shapes, the minimum is 200 to 500 units depending on the die complexity. Large retail chain orders and event distribution requirements are accommodated at significantly higher quantities with bulk pricing."
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
<p>تستخدم الدانقلرات الدعائية المساحة العمودية لإيصال الرسائل الإعلانية — معلقة من الأسقف وقضبان الأرفف ومرايا السيارات وهياكل العرض للوصول إلى الجماهير التي تتصفح أو تقود أو تتفاعل مع بيئة البيع بالتجزئة. تصمم وتنتج وينوو للإعلان دانقلرات دعائية للمحلات التجارية والفعاليات والعروض الترويجية للسيارات وبيئات الضيافة في جميع أنحاء الرياض والمملكة العربية السعودية. تكمل الدانقلرات المواد الدعائية الأخرى مثل <a href="/ar/services/promotional-bags">الأكياس الدعائية</a> و<a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> كجزء من استراتيجية ترويجية متكاملة.</p>

<h2>الدانقلرات كأدوات إعلان في المحلات التجارية</h2>
<p>في بيئة البيع بالتجزئة في المملكة العربية السعودية، تمثل المساحة العمودية فوق عروض المنتجات وعلى طول أسقف الممرات مساحة إعلانية غير مستغلة. تجذب دانقلرات الأسقف ودانقلرات حواف الأرفف ودانقلرات عروض المنتجات انتباه المتسوقين نحو منتجات وعروض ترويجية وحملات تجارية محددة دون شغل مساحة الأرضية أو الأرفف.</p>
<p>تصمم وينوو للإعلان دانقلرات تجزئة جريئة بما يكفي لرؤيتها من مسافة الممر، وواضحة بما يكفي لإيصال الرسالة بقراءة سريعة، ومنتجة بجودة تعكس العلامة التجارية. الدانقلرات المطبوعة على الوجهين تنقل نفس الرسالة للمتسوقين القادمين من أي اتجاه. مع <a href="/ar/services/wall-stickers">ستيكرات الحوائط</a>، تخلق الدانقلرات بيئة متجر متكاملة العلامة التجارية.</p>

<h2>دانقلرات السيارات والمرايا</h2>
<p>دانقلرات المرايا الخلفية هي الفئة الأكثر شخصية من الدانقلرات الدعائية — قطعة مؤسسية تبقى في السيارة ويراها السائق وكل راكب في كل رحلة. في ثقافة السيارات السائدة في المملكة العربية السعودية، يولد دانقلر المرآة الخلفية عالي الجودة تكراراً استثنائياً للانطباع بالعلامة التجارية.</p>
<p>تنتج وينوو للإعلان دانقلرات المرايا الخلفية بالورق المقوى العادي والورق المعطر (كمعطر جو مؤسسي) والأشكال الصلبة المقصوصة حسب الطلب بأشكال العلامة التجارية. تُنتج الدانقلرات بشعار الشركة والعلامة التجارية على الوجهين وتأتي مع خيوط تعليق أو أشرطة أو حبال مطبوعة حسب الطلب.</p>
<p>لشراء السيارات الجديدة وعروض وكالات السيارات الترويجية وهدايا الترحيب في الضيافة وأطقم الهدايا المؤسسية، يعد دانقلر السيارة قطعة مؤسسية عملية يستخدمها المستلمون بدلاً من التخلص منها.</p>

<h2>دانقلرات الفعاليات والمعارض</h2>
<p>للمعارض والمعارض التجارية والفعاليات المؤسسية في الرياض، تكون الدانقلرات المعلقة من الأسقف فوق مساحات الأجنحة ومناطق المداخل مرئية من مسافة بعيدة وتعمل كأول عنصر بصري يجذب الزوار نحو جناح أو منطقة محددة. تنتج وينوو للإعلان دانقلرات أسقف كبيرة الحجم وموبايلات معلقة مؤسسية متعددة العناصر وعروض معلقة في أقواس المداخل كجزء من مجموعة مواد <a href="/ar/services/event-festival">الفعاليات والمهرجانات</a> الأوسع.</p>
<p>في الفعاليات المؤسسية و<a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a>، تخلق الدانقلرات المؤسسية بتصاميم موضوعية — زخارف اليوم الوطني أو يوم التأسيس إلى جانب شعار الشركة — أجواء احتفالية غامرة في جميع أنحاء مكان الفعالية.</p>

<h2>دانقلرات بأشكال مخصصة</h2>
<p>الدانقلرات المستطيلة العادية تنقل رسالة. الدانقلرات المقصوصة بأشكال مخصصة ذات صلة بالعلامة التجارية تنقل الهوية. دانقلر مقصوص بالشكل الدقيق لشعار الشركة أو شكل منتج أو زخرفة مناسبة وطنية يخلق تعرفاً فورياً بالعلامة التجارية وانطباعاً إعلانياً مميزاً.</p>
<p>تطور وينوو للإعلان قوالب قص مخصصة للدانقلرات الدعائية، مما يتيح الإنتاج بأي شكل يخدم أهداف التواصل البصري للعلامة التجارية. الدانقلرات المقصوصة بأشكال فريدة أكثر فعالية في جذب الانتباه من الأشكال المستطيلة العادية.</p>

<h2>الأسئلة الشائعة حول الدانقلرات الدعائية</h2>

<h3>ما هو الدانقلر الدعائي وأين يُستخدم؟</h3>
<p>الدانقلر الدعائي هو عرض إعلاني معلق — عادةً بطاقة أو لوحة أو قطعة مشكّلة مطبوعة على الوجهين ومعلقة بخيط أو شريط أو حبل. تُستخدم الدانقلرات في المحلات التجارية (معلقة من قضبان الأسقف أو حواف الأرفف أو عروض المنتجات)، وفي نوافذ السيارات (دانقلرات المرايا الخلفية كمعطرات جو مؤسسية أو بطاقات ترويجية)، وفي الفعاليات والمعارض (معلقة من هياكل الأسقف أو إطارات الأجنحة)، وفي بيئات الضيافة (دانقلرات مقابض الأبواب وقطع عرض الغرف).</p>

<h3>ما المواد المستخدمة في طباعة الدانقلرات الدعائية؟</h3>
<p>تنتج وينوو للإعلان الدانقلرات الدعائية على الورق المقوى المطلي (المادة الأكثر شيوعاً لدانقلرات التجزئة والفعاليات)، والفوم بورد السميك لعروض الأسقف المعلقة كبيرة الحجم، والأسيتات الشفاف لدانقلرات شفافة بتأثير فاخر، والـ PVC الصلب لدانقلرات الهواء الطلق والسيارات، ومواد متخصصة تشمل قشرة الخشب والأكريليك للدانقلرات المؤسسية الفاخرة المستخدمة في الهدايا الراقية والضيافة.</p>

<h3>هل يمكن إنتاج الدانقلرات بأشكال مخصصة؟</h3>
<p>نعم. الدانقلرات المقصوصة بأي شكل مخصص — شعار الشركة، صورة منتج ظلية، زخرفة مناسبة وطنية، أو أي تصميم مخصص — هي تطبيق مميز. الدانقلرات المقصوصة بأشكال ذات صلة بالعلامة التجارية أكثر تميزاً وتذكراً من البطاقات المستطيلة العادية. تتولى وينوو للإعلان تصميم قالب القص والإنتاج للدانقلرات ذات الأشكال المخصصة.</p>

<h3>ما الحد الأدنى لطلب الدانقلرات الدعائية؟</h3>
<p>الحد الأدنى لطلب الدانقلرات المطبوعة العادية عادة 100 وحدة. للأشكال المقصوصة المخصصة، الحد الأدنى 200 إلى 500 وحدة حسب تعقيد القالب. يتم استيعاب طلبات سلاسل التجزئة الكبيرة ومتطلبات التوزيع للفعاليات بكميات أعلى بكثير مع أسعار الجملة.</p>

<h2>اطلب دانقلراتك الدعائية في الرياض</h2>
<p>أخبرنا بالتطبيق وتفضيل المادة والشكل والكمية وملفات علامتك التجارية. يقدم فريقنا مفاهيم التصميم والتسعير خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما هو الدانقلر الدعائي وأين يُستخدم؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الدانقلر الدعائي هو عرض إعلاني معلق — عادةً بطاقة أو لوحة أو قطعة مشكّلة مطبوعة على الوجهين ومعلقة بخيط أو شريط أو حبل. تُستخدم الدانقلرات في المحلات التجارية (معلقة من قضبان الأسقف أو حواف الأرفف أو عروض المنتجات)، وفي نوافذ السيارات (دانقلرات المرايا الخلفية كمعطرات جو مؤسسية أو بطاقات ترويجية)، وفي الفعاليات والمعارض (معلقة من هياكل الأسقف أو إطارات الأجنحة)، وفي بيئات الضيافة (دانقلرات مقابض الأبواب وقطع عرض الغرف)."
      }
    },
    {
      "@type": "Question",
      "name": "ما المواد المستخدمة في طباعة الدانقلرات الدعائية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج وينوو للإعلان الدانقلرات الدعائية على الورق المقوى المطلي (المادة الأكثر شيوعاً لدانقلرات التجزئة والفعاليات)، والفوم بورد السميك لعروض الأسقف المعلقة كبيرة الحجم، والأسيتات الشفاف لدانقلرات شفافة بتأثير فاخر، والـ PVC الصلب لدانقلرات الهواء الطلق والسيارات، ومواد متخصصة تشمل قشرة الخشب والأكريليك للدانقلرات المؤسسية الفاخرة المستخدمة في الهدايا الراقية والضيافة."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن إنتاج الدانقلرات بأشكال مخصصة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. الدانقلرات المقصوصة بأي شكل مخصص — شعار الشركة، صورة منتج ظلية، زخرفة مناسبة وطنية، أو أي تصميم مخصص — هي تطبيق مميز. الدانقلرات المقصوصة بأشكال ذات صلة بالعلامة التجارية أكثر تميزاً وتذكراً من البطاقات المستطيلة العادية. تتولى وينوو للإعلان تصميم قالب القص والإنتاج للدانقلرات ذات الأشكال المخصصة."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لطلب الدانقلرات الدعائية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الحد الأدنى لطلب الدانقلرات المطبوعة العادية عادة 100 وحدة. للأشكال المقصوصة المخصصة، الحد الأدنى 200 إلى 500 وحدة حسب تعقيد القالب. يتم استيعاب طلبات سلاسل التجزئة الكبيرة ومتطلبات التوزيع للفعاليات بكميات أعلى بكثير مع أسعار الجملة."
      }
    }
  ]
}
</script>
HTML;
    }
};
