<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = '3d-designs';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/3d-designs.webp',
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
            'title' => '3D Designs',
            'content' => $this->getEnglishContent(),
            'meta_title' => '3D Design in Riyadh | 3D Visualization and Rendering Saudi Arabia | Window Advertising',
            'meta_description' => '3D design and visualization in Riyadh. Window Advertising creates 3D renders, 3D visualizations, architectural 3D, product 3D, and animated 3D content for companies across Saudi Arabia. Photorealistic 3D design for advertising, exhibitions, and brand identity. Get a free quote.',
            'meta_keywords' => '3D design Riyadh, 3D visualization Saudi Arabia, 3D rendering Riyadh, 3D product design Saudi Arabia, 3D architectural visualization Riyadh, تصميم هوية الرياض, تصميم ثلاثي الأبعاد, دعاية واعلان الرياض, تصميم فيديو, دعاية واعلان السعودية',
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
            'title' => 'التصميم ثلاثي الأبعاد',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تصميم ثلاثي الأبعاد في الرياض | تصور وتصميم 3D السعودية | وينوو للإعلان',
            'meta_description' => 'تصميم وتصور ثلاثي الأبعاد في الرياض — وينوو للإعلان يصمم تصورات ثلاثية الأبعاد وتصاميم منتجات وتصاميم معمارية ومحتوى رقمي ثلاثي الأبعاد للشركات في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'تصميم ثلاثي الأبعاد الرياض, تصور 3D السعودية, تصميم هوية, دعاية واعلان الرياض, تصميم فيديو, دعاية واعلان السعودية, رندر ثلاثي الأبعاد الرياض',
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
        $service = DB::table('services')->where('slug', '3d-designs')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Three-dimensional design unlocks advertising and communication possibilities that flat graphic design cannot achieve. A photorealistic 3D render of a product shows it from any angle, in any material, in any environment — without manufacturing a prototype. A 3D visualization of an exhibition booth shows the client exactly how their presence will look at the event — before a single panel is fabricated. Window Advertising produces 3D design and visualization for companies across Riyadh and Saudi Arabia across the full range of commercial applications.</p>

<h2>3D Product Visualization</h2>
<p>Product 3D visualization enables companies to market products before they are manufactured, produce consistent advertising imagery across all markets, and present product variants — colors, materials, configurations — without photographing each separately.</p>
<p>Window Advertising creates photorealistic 3D product renders from technical drawings, physical product samples, or reference images. The resulting images are production-ready for use in advertising materials, company profiles, catalogs, e-commerce product pages, and social media content.</p>
<p>For consumer goods companies, industrial equipment suppliers, and real estate developers in Riyadh, 3D product visualization eliminates the cost and logistics of product photography for every variant and allows the marketing calendar to proceed even before production inventory is available. Our 3D renders integrate seamlessly into <a href="/en/services/profile-design-printing">profile design and printing</a> projects.</p>

<h2>Exhibition Booth 3D Visualization</h2>
<p>Before fabricating an exhibition booth, a 3D visualization gives the client a photorealistic preview of exactly how the finished booth will appear in the exhibition hall — from the entrance view to the interior experience. Window Advertising creates exhibition booth 3D visualizations as part of the booth design process, allowing clients to assess the design, request modifications, and approve the concept before production begins.</p>
<p>This eliminates the risk of discovering a design problem after fabrication — a correction that is expensive in materials and impossible if the event deadline is imminent. The 3D visualization also serves as a marketing asset for the company's exhibition presence, shared with the team and stakeholders ahead of the event. This process is a core part of our <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> workflow.</p>

<h2>Architectural and Environmental 3D</h2>
<p>For real estate developers, interior designers, and organizations planning new office or retail environments in Riyadh, architectural 3D visualization communicates the design vision before construction begins. Window Advertising produces architectural 3D renders in the style appropriate to the project — from concept massing renders for developer presentations to photorealistic interior renders for retail and hospitality marketing.</p>
<p>Environmental 3D visualization is also used to plan and present office branding installations — showing how reception wall signage, branded environmental graphics, and interior wayfinding will appear in the finished space.</p>

<h2>3D for Brand Identity and Signage</h2>
<p>3D modeling is an integral part of the design process for corporate identity applications that will be fabricated in three dimensions — reception wall letters, building signage, signage totems, and exhibition structural elements. Window Advertising produces detailed 3D models of all fabricated signage elements, enabling accurate visualization for client approval and precise fabrication specifications for the production team.</p>
<p>For clients developing a new <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a>, 3D mockup renders show how the brand will appear across key physical applications — the reception wall, the building facade, the exhibition booth, the vehicle livery. This gives the identity design team and the client a comprehensive view of the brand in its real-world contexts before finalizing the design. Our 3D models feed directly into <a href="/en/services/3d-fabrication">3D fabrication</a> production.</p>

<h2>Animated 3D Content</h2>
<p>3D animation produces motion content that static renders cannot — rotating product presentations, exploded views showing internal structure, architectural walkthroughs, and brand motion graphics. Window Advertising produces 3D animation for <a href="/en/services/digital-marketing">digital marketing</a>, trade show screen content, corporate video, and social media content.</p>
<p>For products with complex features or internal components — medical devices, industrial equipment, consumer electronics — 3D animation communicates how the product works in a way that photography and video of the finished product cannot.</p>

<h2>Frequently Asked Questions About 3D Designs</h2>

<h3>What types of 3D design does Window Advertising produce?</h3>
<p>Window Advertising produces 3D product visualization (photorealistic renders of physical products for advertising and e-commerce), 3D exhibition booth visualization (pre-production renders showing how an exhibition booth will look before fabrication), architectural and interior 3D visualization (showing real estate, office, or retail spaces in photorealistic format), 3D logo and brand element design for signage and fabrication specifications, and animated 3D content for digital advertising and presentations.</p>

<h3>Why use 3D visualization instead of photography?</h3>
<p>3D visualization offers advantages that photography cannot: products can be shown before they are manufactured, spaces can be visualized before they are built, materials and colors can be changed instantly without reshooting, and the resulting images are completely consistent across any use. For exhibition booth design, 3D visualization shows the client exactly how the finished booth will look — enabling informed decisions about design, materials, and layout before fabrication begins.</p>

<h3>Can 3D designs be used for signage fabrication specifications?</h3>
<p>Yes. Window Advertising uses 3D modeling as a design tool before fabrication — creating detailed 3D models of signage, letters, or structural elements that serve both as client visualization and as fabrication reference. The 3D model communicates exact dimensions, material selections, and assembly requirements to the fabrication team. This is standard practice for complex 3D fabrication projects.</p>

<h3>How long does a 3D design project take?</h3>
<p>A standard 3D product render or booth visualization takes 3 to 7 business days from briefing to final delivery. Complex multi-scene visualization projects with multiple camera angles, material variations, and animated camera moves take 1 to 3 weeks. Rush delivery is available for exhibition season deadlines.</p>

<h2>Start Your 3D Design Project in Riyadh</h2>
<p>Tell us the application, your reference materials, and your deadline. Our team provides a scope confirmation and pricing within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of 3D design does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces 3D product visualization (photorealistic renders of physical products for advertising and e-commerce), 3D exhibition booth visualization (pre-production renders showing how an exhibition booth will look before fabrication), architectural and interior 3D visualization (showing real estate, office, or retail spaces in photorealistic format), 3D logo and brand element design for signage and fabrication specifications, and animated 3D content for digital advertising and presentations."
      }
    },
    {
      "@type": "Question",
      "name": "Why use 3D visualization instead of photography?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "3D visualization offers advantages that photography cannot: products can be shown before they are manufactured, spaces can be visualized before they are built, materials and colors can be changed instantly without reshooting, and the resulting images are completely consistent across any use. For exhibition booth design, 3D visualization shows the client exactly how the finished booth will look — enabling informed decisions about design, materials, and layout before fabrication begins."
      }
    },
    {
      "@type": "Question",
      "name": "Can 3D designs be used for signage fabrication specifications?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising uses 3D modeling as a design tool before fabrication — creating detailed 3D models of signage, letters, or structural elements that serve both as client visualization and as fabrication reference. The 3D model communicates exact dimensions, material selections, and assembly requirements to the fabrication team. This is standard practice for complex 3D fabrication projects."
      }
    },
    {
      "@type": "Question",
      "name": "How long does a 3D design project take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A standard 3D product render or booth visualization takes 3 to 7 business days from briefing to final delivery. Complex multi-scene visualization projects with multiple camera angles, material variations, and animated camera moves take 1 to 3 weeks. Rush delivery is available for exhibition season deadlines."
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
<p>يفتح التصميم ثلاثي الأبعاد إمكانيات إعلانية وتواصلية لا يستطيع التصميم الجرافيكي المسطح تحقيقها. تصيير ثلاثي الأبعاد واقعي لمنتج يعرضه من أي زاوية، بأي خامة، في أي بيئة — دون تصنيع نموذج أولي. تصور ثلاثي الأبعاد لبوث معرضي يُظهر للعميل بالضبط كيف سيبدو حضوره في الفعالية — قبل تصنيع لوحة واحدة. وينوو للإعلان ينتج التصميم والتصور ثلاثي الأبعاد للشركات في جميع أنحاء الرياض والمملكة العربية السعودية عبر النطاق الكامل للتطبيقات التجارية.</p>

<h2>تصور المنتج ثلاثي الأبعاد</h2>
<p>يتيح تصور المنتج ثلاثي الأبعاد للشركات تسويق المنتجات قبل تصنيعها، وإنتاج صور إعلانية متسقة عبر جميع الأسواق، وعرض متغيرات المنتج — الألوان والخامات والتكوينات — دون تصوير كل منها على حدة.</p>
<p>تصمم وينوو للإعلان تصييرات منتجات ثلاثية الأبعاد واقعية من الرسومات التقنية أو عينات المنتج الفعلية أو الصور المرجعية. الصور الناتجة جاهزة للاستخدام في المواد الإعلانية وملفات الشركات والكتالوجات وصفحات المنتجات الإلكترونية ومحتوى وسائل التواصل الاجتماعي.</p>
<p>لشركات السلع الاستهلاكية وموردي المعدات الصناعية ومطوري العقارات في الرياض، يلغي تصور المنتج ثلاثي الأبعاد تكلفة ولوجستيات التصوير الفوتوغرافي لكل متغير ويسمح لجدول التسويق بالمضي قدماً حتى قبل توفر مخزون الإنتاج. تندمج تصييراتنا ثلاثية الأبعاد بسلاسة في مشاريع <a href="/ar/services/profile-design-printing">تصميم وطباعة البروفايل</a>.</p>

<h2>تصور البوث المعرضي ثلاثي الأبعاد</h2>
<p>قبل تصنيع بوث معرضي، يمنح التصور ثلاثي الأبعاد العميل معاينة واقعية لكيفية ظهور البوث النهائي في قاعة المعرض — من منظر المدخل إلى التجربة الداخلية. تصمم وينوو للإعلان تصورات ثلاثية الأبعاد للأجنحة المعرضية كجزء من عملية تصميم البوث، مما يتيح للعملاء تقييم التصميم وطلب التعديلات والموافقة على المفهوم قبل بدء الإنتاج.</p>
<p>هذا يلغي خطر اكتشاف مشكلة تصميمية بعد التصنيع — تصحيح مكلف في المواد ومستحيل إذا كان موعد الفعالية وشيكاً. يعمل التصور ثلاثي الأبعاد أيضاً كأصل تسويقي لحضور الشركة في المعرض، يُشارك مع الفريق وأصحاب المصلحة قبل الفعالية. هذه العملية جزء أساسي من سير عمل <a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a> لدينا.</p>

<h2>التصميم ثلاثي الأبعاد المعماري والبيئي</h2>
<p>لمطوري العقارات ومصممي الديكور الداخلي والمؤسسات التي تخطط لبيئات مكتبية أو تجارية جديدة في الرياض، ينقل التصور المعماري ثلاثي الأبعاد رؤية التصميم قبل بدء البناء. تنتج وينوو للإعلان تصييرات معمارية ثلاثية الأبعاد بالأسلوب المناسب للمشروع — من تصييرات الكتل المفاهيمية لعروض المطورين إلى تصييرات داخلية واقعية لتسويق التجزئة والضيافة.</p>
<p>يُستخدم التصور البيئي ثلاثي الأبعاد أيضاً لتخطيط وعرض تركيبات العلامة التجارية في المكاتب — لإظهار كيف ستبدو لافتات جدار الاستقبال والرسوميات البيئية المؤسسية وأنظمة التوجيه الداخلية في المساحة المكتملة.</p>

<h2>التصميم ثلاثي الأبعاد للهوية والعلامات</h2>
<p>النمذجة ثلاثية الأبعاد جزء لا يتجزأ من عملية التصميم لتطبيقات الهوية المؤسسية التي ستُصنع بأبعاد ثلاثية — حروف جدار الاستقبال ولافتات المباني وأعمدة اللافتات والعناصر الهيكلية للمعارض. تنتج وينوو للإعلان نماذج ثلاثية الأبعاد مفصلة لجميع عناصر اللافتات المصنعة، مما يتيح تصوراً دقيقاً لموافقة العميل ومواصفات تصنيع دقيقة لفريق الإنتاج.</p>
<p>للعملاء الذين يطورون <a href="/ar/services/corporate-visual-identity-design">تصميم هوية بصرية مؤسسية</a> جديدة، تُظهر تصييرات الماكيت ثلاثية الأبعاد كيف ستبدو العلامة التجارية عبر التطبيقات الفعلية الرئيسية — جدار الاستقبال وواجهة المبنى والبوث المعرضي وتغليف المركبات. يمنح هذا فريق تصميم الهوية والعميل رؤية شاملة للعلامة التجارية في سياقاتها الواقعية قبل اعتماد التصميم النهائي. نماذجنا ثلاثية الأبعاد تغذي مباشرة إنتاج <a href="/ar/services/3d-fabrication">التصنيع ثلاثي الأبعاد</a>.</p>

<h2>المحتوى ثلاثي الأبعاد المتحرك</h2>
<p>ينتج الرسوم المتحركة ثلاثية الأبعاد محتوى حركي لا تستطيع التصييرات الثابتة تحقيقه — عروض منتجات دوارة ومناظر مفككة تُظهر البنية الداخلية وجولات معمارية ورسوميات حركية للعلامة التجارية. تنتج وينوو للإعلان رسوماً متحركة ثلاثية الأبعاد لـ<a href="/ar/services/digital-marketing">التسويق الرقمي</a> ومحتوى شاشات المعارض والفيديو المؤسسي ومحتوى وسائل التواصل الاجتماعي.</p>
<p>للمنتجات ذات الميزات المعقدة أو المكونات الداخلية — الأجهزة الطبية والمعدات الصناعية والإلكترونيات الاستهلاكية — توصل الرسوم المتحركة ثلاثية الأبعاد كيف يعمل المنتج بطريقة لا يستطيع التصوير الفوتوغرافي والفيديو للمنتج النهائي تحقيقها.</p>

<h2>الأسئلة الشائعة حول التصميم ثلاثي الأبعاد</h2>

<h3>ما أنواع التصميم ثلاثي الأبعاد التي تنتجها وينوو للإعلان؟</h3>
<p>تنتج وينوو للإعلان تصور المنتج ثلاثي الأبعاد (تصييرات واقعية للمنتجات المادية للإعلان والتجارة الإلكترونية)، وتصور البوث المعرضي ثلاثي الأبعاد (تصييرات ما قبل الإنتاج تُظهر كيف سيبدو البوث قبل التصنيع)، والتصور المعماري والداخلي ثلاثي الأبعاد (عرض العقارات والمكاتب والمساحات التجارية بتنسيق واقعي)، وتصميم الشعار وعناصر العلامة التجارية ثلاثية الأبعاد لمواصفات اللافتات والتصنيع، والمحتوى المتحرك ثلاثي الأبعاد للإعلان الرقمي والعروض التقديمية.</p>

<h3>لماذا استخدام التصور ثلاثي الأبعاد بدلاً من التصوير الفوتوغرافي؟</h3>
<p>يوفر التصور ثلاثي الأبعاد مزايا لا يستطيع التصوير الفوتوغرافي تحقيقها: يمكن عرض المنتجات قبل تصنيعها، ويمكن تصور المساحات قبل بنائها، ويمكن تغيير الخامات والألوان فوراً دون إعادة التصوير، والصور الناتجة متسقة تماماً عبر أي استخدام. لتصميم الأجنحة المعرضية، يُظهر التصور ثلاثي الأبعاد للعميل بالضبط كيف سيبدو البوث النهائي — مما يتيح اتخاذ قرارات مدروسة حول التصميم والخامات والتخطيط قبل بدء التصنيع.</p>

<h3>هل يمكن استخدام التصاميم ثلاثية الأبعاد لمواصفات تصنيع اللافتات؟</h3>
<p>نعم. تستخدم وينوو للإعلان النمذجة ثلاثية الأبعاد كأداة تصميم قبل التصنيع — بإنشاء نماذج ثلاثية الأبعاد مفصلة للافتات أو الحروف أو العناصر الهيكلية التي تعمل كتصور للعميل ومرجع للتصنيع. ينقل النموذج ثلاثي الأبعاد الأبعاد الدقيقة واختيارات الخامات ومتطلبات التجميع لفريق التصنيع. هذه ممارسة معيارية لمشاريع التصنيع ثلاثي الأبعاد المعقدة.</p>

<h3>كم يستغرق مشروع التصميم ثلاثي الأبعاد؟</h3>
<p>يستغرق تصيير منتج قياسي أو تصور بوث معرضي من 3 إلى 7 أيام عمل من الإيجاز إلى التسليم النهائي. مشاريع التصور المعقدة متعددة المشاهد بزوايا كاميرا متعددة ومتغيرات خامات وحركات كاميرا متحركة تستغرق من أسبوع إلى 3 أسابيع. التسليم السريع متاح لمواعيد موسم المعارض.</p>

<h2>ابدأ مشروع التصميم ثلاثي الأبعاد في الرياض</h2>
<p>أخبرنا بالتطبيق والمواد المرجعية والموعد النهائي. يقدم فريقنا تأكيد النطاق والتسعير خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع التصميم ثلاثي الأبعاد التي تنتجها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج وينوو للإعلان تصور المنتج ثلاثي الأبعاد (تصييرات واقعية للمنتجات المادية للإعلان والتجارة الإلكترونية)، وتصور البوث المعرضي ثلاثي الأبعاد (تصييرات ما قبل الإنتاج تُظهر كيف سيبدو البوث قبل التصنيع)، والتصور المعماري والداخلي ثلاثي الأبعاد (عرض العقارات والمكاتب والمساحات التجارية بتنسيق واقعي)، وتصميم الشعار وعناصر العلامة التجارية ثلاثية الأبعاد لمواصفات اللافتات والتصنيع، والمحتوى المتحرك ثلاثي الأبعاد للإعلان الرقمي والعروض التقديمية."
      }
    },
    {
      "@type": "Question",
      "name": "لماذا استخدام التصور ثلاثي الأبعاد بدلاً من التصوير الفوتوغرافي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يوفر التصور ثلاثي الأبعاد مزايا لا يستطيع التصوير الفوتوغرافي تحقيقها: يمكن عرض المنتجات قبل تصنيعها، ويمكن تصور المساحات قبل بنائها، ويمكن تغيير الخامات والألوان فوراً دون إعادة التصوير، والصور الناتجة متسقة تماماً عبر أي استخدام. لتصميم الأجنحة المعرضية، يُظهر التصور ثلاثي الأبعاد للعميل بالضبط كيف سيبدو البوث النهائي — مما يتيح اتخاذ قرارات مدروسة حول التصميم والخامات والتخطيط قبل بدء التصنيع."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن استخدام التصاميم ثلاثية الأبعاد لمواصفات تصنيع اللافتات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تستخدم وينوو للإعلان النمذجة ثلاثية الأبعاد كأداة تصميم قبل التصنيع — بإنشاء نماذج ثلاثية الأبعاد مفصلة للافتات أو الحروف أو العناصر الهيكلية التي تعمل كتصور للعميل ومرجع للتصنيع. ينقل النموذج ثلاثي الأبعاد الأبعاد الدقيقة واختيارات الخامات ومتطلبات التجميع لفريق التصنيع. هذه ممارسة معيارية لمشاريع التصنيع ثلاثي الأبعاد المعقدة."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق مشروع التصميم ثلاثي الأبعاد؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يستغرق تصيير منتج قياسي أو تصور بوث معرضي من 3 إلى 7 أيام عمل من الإيجاز إلى التسليم النهائي. مشاريع التصور المعقدة متعددة المشاهد بزوايا كاميرا متعددة ومتغيرات خامات وحركات كاميرا متحركة تستغرق من أسبوع إلى 3 أسابيع. التسليم السريع متاح لمواعيد موسم المعارض."
      }
    }
  ]
}
</script>
HTML;
    }
};
