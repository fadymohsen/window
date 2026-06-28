<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'promotional-cubes';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/promotional-cubes.webp',
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
            'title' => 'Promotional Cubes',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Promotional Cubes in Riyadh | Branded Display Cubes | Window Advertising',
            'meta_description' => 'Custom promotional cubes and branded display cubes in Riyadh. Window Advertising manufactures fabric-covered and printed promotional cubes for exhibition booths, retail displays, and corporate events across Saudi Arabia. Advertising stands delivered fast. Get a free quote.',
            'meta_keywords' => 'promotional cubes Riyadh, display cubes Saudi Arabia, branded cubes exhibition Riyadh, fabric display cubes Saudi Arabia, استندات دعائية الرياض, دعاية واعلان الرياض, بوثات معارض, دعاية واعلان السعودية',
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
            'title' => 'مكعبات دعائية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'مكعبات دعائية في الرياض | مكعبات عرض مميزة | وينوو للإعلان',
            'meta_description' => 'مكعبات دعائية مخصصة في الرياض — وينوو للإعلان ينتج مكعبات عرض بالقماش والطباعة لبوثات المعارض والمتاجر والفعاليات الشركاتية في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'مكعبات دعائية الرياض, استندات دعائية السعودية, دعاية واعلان الرياض, بوثات معارض, دعاية واعلان السعودية, مكعبات عرض الرياض',
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
        $service = DB::table('services')->where('slug', 'promotional-cubes')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Promotional cubes are among the most versatile advertising <a href="/en/services/display-stands">display stands</a> available for exhibitions, retail environments, and corporate events. A branded cube functions simultaneously as a product display plinth, a seating element, a visual brand installation, and a portable counter — all within the footprint of a single stackable unit. Window Advertising manufactures custom promotional cubes for clients across Riyadh and Saudi Arabia, coordinated with exhibition booth systems and wider advertising campaigns.</p>

<h2>How Promotional Cubes Work as Advertising Tools</h2>
<p>Unlike flat display systems such as banners and backdrops, promotional cubes present branded surfaces in three dimensions — visible from the front, sides, and top simultaneously. This 360-degree branding exposure makes them exceptionally effective in exhibition booths and retail environments where visitors approach from multiple directions.</p>
<p>In an exhibition booth, a set of promotional cubes creates a functional, branded environment. Product samples can be displayed on top of cubes at comfortable viewing heights. Visitors can sit on cube seating while conversing with your team. Stacked cube arrangements create visual height in a booth without the structural complexity of custom-built display furniture. Window Advertising coordinates promotional cube production with the full exhibition booth advertising display system for clients in Riyadh.</p>

<h2>Materials and Finish Options</h2>
<p>Window Advertising produces promotional cubes in three material configurations depending on the intended use:</p>
<p>Fabric-covered aluminum frame cubes use a lightweight aluminum extrusion frame covered with a dye-sublimation printed fabric skin. These are the lightest and most portable option, easy to transport and reassemble on-site. The fabric surface is replaced independently when branding changes.</p>
<p>Foam-core covered cubes use a dense foam block with a fabric or vinyl outer surface. These are appropriate for applications where the cube surface will bear light weight — product display and occasional leaning — and where a soft, seamless surface feel is preferred.</p>
<p>Rigid panel cubes use a structural MDF or composite panel construction with printed vinyl or fabric surfaces applied to each face. These are the most robust option, suitable for permanent or semi-permanent installations and for cubes that will serve as seating throughout a long event.</p>

<h2>Sizes and Stacking Configurations</h2>
<p>Standard promotional cube sizes produced by Window Advertising are 40cm, 50cm, and 60cm per side — covering the range from small product display plinths to comfortable seat-height cubes. Custom sizes are available for projects requiring non-standard heights or specific proportional relationships between multiple cubes in a set.</p>
<p>Stacking systems allow cubes to be built into tiered display structures without requiring additional framing. A three-tier arrangement creates a display column approximately 150cm tall — useful for high-visibility product display within an exhibition booth. Stacking brackets and guide pins ensure stability in configurations of two or more units.</p>

<h2>Promotional Cubes in Exhibition Booth Design</h2>
<p>For companies building <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> in Riyadh's trade show venues, promotional cubes serve as functional, branded furniture that replaces the cost of rented exhibition furniture with a fully branded display element that travels with your display system.</p>
<p>Window Advertising designs cube sets to coordinate with the color palette and visual identity of the wider booth — <a href="/en/services/lama-stand">lama stands</a>, <a href="/en/services/roll-up">roll-up banners</a>, and promotional cubes all share the same design language. The result is an exhibition environment that looks intentionally designed rather than assembled from unrelated elements.</p>

<h2>Promotional Cubes for Retail and Event Environments</h2>
<p>Outside of exhibitions, promotional cubes are used by retailers to create branded display zones within store environments, by hospitality brands at outdoor events and festivals, and by corporate teams to create branded lounge areas at conferences and product launches.</p>
<p>In Saudi Arabia, promotional cubes are increasingly used at <a href="/en/services/national-day-celebrations">national day celebrations</a> and Founding Day activation events — with patriotic color schemes and event-specific branding applied to cube sets that create immersive branded photo zones and lounge environments.</p>

<h2>Portfolio — Promotional Cubes in Riyadh</h2>
<p>Browse the portfolio to see promotional cube sets produced for clients across Riyadh and Saudi Arabia. The gallery includes exhibition booth cube environments, retail display setups, event lounge configurations, and stacked display installations.</p>

<h2>Frequently Asked Questions About Promotional Cubes</h2>

<h3>What are promotional cubes used for?</h3>
<p>Promotional cubes are versatile branded display elements used as product display plinths, seating elements in lounge areas within exhibition booths, branded counters, and stacked display structures at events and retail environments. Their flat, printable surfaces allow a company's branding to be visible from all sides simultaneously.</p>

<h3>What materials are promotional cubes made from?</h3>
<p>Window Advertising produces promotional cubes from lightweight aluminum frame structures covered with dye-sublimation printed fabric, solid foam covered with fabric or vinyl, and rigid printed panel construction. The choice of material depends on whether the cube will be used as seating, a product plinth, or a pure display element.</p>

<h3>Can promotional cubes be used as seating?</h3>
<p>Yes. Promotional cubes with a foam or padded top surface and load-bearing frame construction are suitable for use as seating in exhibition booth lounge areas. Window Advertising specifies the frame and material grade based on the intended use — display-only cubes use lightweight materials, while seating cubes use reinforced frames rated for continuous occupancy.</p>

<h3>Are promotional cubes stackable?</h3>
<p>Yes. Window Advertising produces stackable promotional cube sets in standard sizes that nest together to create tiered product display structures or visual brand installations. Stacking brackets are included to prevent instability in configurations of three or more cubes high.</p>

<h2>Order Promotional Cubes in Riyadh</h2>
<p>Tell us your cube size requirements, quantity, intended use, and branding materials. Our team provides a design preview and full pricing within 24 hours. Delivery across Riyadh included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What are promotional cubes used for?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Promotional cubes are versatile branded display elements used as product display plinths, seating elements in lounge areas within exhibition booths, branded counters, and stacked display structures at events and retail environments. Their flat, printable surfaces allow a company's branding to be visible from all sides simultaneously."
      }
    },
    {
      "@type": "Question",
      "name": "What materials are promotional cubes made from?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces promotional cubes from lightweight aluminum frame structures covered with dye-sublimation printed fabric, solid foam covered with fabric or vinyl, and rigid printed panel construction. The choice of material depends on whether the cube will be used as seating, a product plinth, or a pure display element."
      }
    },
    {
      "@type": "Question",
      "name": "Can promotional cubes be used as seating?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Promotional cubes with a foam or padded top surface and load-bearing frame construction are suitable for use as seating in exhibition booth lounge areas. Window Advertising specifies the frame and material grade based on the intended use — display-only cubes use lightweight materials, while seating cubes use reinforced frames rated for continuous occupancy."
      }
    },
    {
      "@type": "Question",
      "name": "Are promotional cubes stackable?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising produces stackable promotional cube sets in standard sizes that nest together to create tiered product display structures or visual brand installations. Stacking brackets are included to prevent instability in configurations of three or more cubes high."
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
<p>تُعد المكعبات الدعائية من أكثر <a href="/ar/services/display-stands">استندات العرض</a> الإعلانية تنوعاً للمعارض وبيئات التجزئة والفعاليات المؤسسية. يعمل المكعب المميز بعلامتك التجارية كمنصة عرض منتجات، وعنصر جلوس، وتركيب بصري للعلامة التجارية، وكاونتر محمول — كل ذلك في مساحة وحدة واحدة قابلة للتكديس. تصنع وينوو للإعلان مكعبات دعائية مخصصة للعملاء في الرياض والمملكة العربية السعودية، بالتنسيق مع أنظمة بوثات المعارض والحملات الإعلانية الشاملة.</p>

<h2>كيف تعمل المكعبات الدعائية كأداة إعلانية</h2>
<p>على عكس أنظمة العرض المسطحة مثل البانرات والخلفيات، تعرض المكعبات الدعائية أسطحاً تحمل العلامة التجارية بثلاثة أبعاد — مرئية من الأمام والجوانب والأعلى في وقت واحد. هذا التعرض الإعلاني بزاوية 360 درجة يجعلها فعالة بشكل استثنائي في بوثات المعارض وبيئات التجزئة حيث يقترب الزوار من اتجاهات متعددة.</p>
<p>في بوث المعرض، تُنشئ مجموعة من المكعبات الدعائية بيئة وظيفية تحمل العلامة التجارية. يمكن عرض عينات المنتجات فوق المكعبات بارتفاعات مريحة للمشاهدة. يمكن للزوار الجلوس على مكعبات الجلوس أثناء التحدث مع فريقك. ترتيبات المكعبات المكدسة تخلق ارتفاعاً بصرياً في البوث دون التعقيد الإنشائي لأثاث العرض المصنع خصيصاً. تنسق وينوو للإعلان إنتاج المكعبات الدعائية مع نظام العرض الإعلاني الكامل لبوث المعرض للعملاء في الرياض.</p>

<h2>المواد وخيارات التشطيب</h2>
<p>تنتج وينوو للإعلان مكعبات دعائية بثلاثة تكوينات مادية حسب الاستخدام المقصود:</p>
<p>مكعبات الإطار الألمنيوم المغطاة بالقماش تستخدم إطاراً من قطاعات الألمنيوم الخفيفة مغطى بقماش مطبوع بتقنية التسامي الحراري. هذه هي الخيار الأخف والأكثر قابلية للنقل، سهلة النقل وإعادة التجميع في الموقع. يتم استبدال سطح القماش بشكل مستقل عند تغيير العلامة التجارية.</p>
<p>المكعبات ذات قلب الفوم تستخدم كتلة فوم كثيفة مع سطح خارجي من القماش أو الفينيل. وهي مناسبة للتطبيقات التي يتحمل فيها سطح المكعب وزناً خفيفاً — عرض المنتجات والاتكاء العرضي — وحيث يُفضل ملمس سطح ناعم وسلس.</p>
<p>مكعبات الألواح الصلبة تستخدم بناء ألواح MDF أو ألواح مركبة مع أسطح فينيل أو قماش مطبوعة مطبقة على كل وجه. هذه هي الخيار الأكثر متانة، مناسبة للتركيبات الدائمة أو شبه الدائمة وللمكعبات التي ستعمل كمقاعد طوال فعالية طويلة.</p>

<h2>الأحجام وأنظمة التكديس</h2>
<p>الأحجام القياسية للمكعبات الدعائية التي تنتجها وينوو للإعلان هي 40 سم و50 سم و60 سم لكل ضلع — وتغطي النطاق من منصات عرض المنتجات الصغيرة إلى مكعبات بارتفاع مقعد مريح. تتوفر أحجام مخصصة للمشاريع التي تتطلب ارتفاعات غير قياسية أو علاقات تناسبية محددة بين عدة مكعبات في المجموعة.</p>
<p>تتيح أنظمة التكديس بناء المكعبات في هياكل عرض متدرجة دون الحاجة إلى إطارات إضافية. ترتيب من ثلاث طبقات يُنشئ عمود عرض بارتفاع حوالي 150 سم — مفيد لعرض المنتجات عالي الرؤية داخل بوث المعرض. تضمن أقواس التكديس ودبابيس التوجيه الاستقرار في التكوينات المكونة من وحدتين أو أكثر.</p>

<h2>المكعبات الدعائية في تصميم بوثات المعارض</h2>
<p>للشركات التي تبني <a href="/ar/services/exhibition-booth-execution">بوثات معارض</a> في أماكن المعارض التجارية بالرياض، تعمل المكعبات الدعائية كأثاث وظيفي يحمل العلامة التجارية يحل محل تكلفة أثاث المعارض المستأجر بعنصر عرض يحمل علامتك التجارية بالكامل وينتقل مع نظام العرض الخاص بك.</p>
<p>تصمم وينوو للإعلان مجموعات المكعبات لتتناسق مع لوحة الألوان والهوية البصرية للبوث الأوسع — <a href="/ar/services/lama-stand">ستاندات لاما</a> و<a href="/ar/services/roll-up">بانرات رول أب</a> والمكعبات الدعائية تشترك جميعها في نفس لغة التصميم. والنتيجة هي بيئة معرض تبدو مصممة بشكل متعمد وليست مجمعة من عناصر غير مترابطة.</p>

<h2>مكعبات دعائية للتجزئة والفعاليات</h2>
<p>خارج المعارض، يستخدم تجار التجزئة المكعبات الدعائية لإنشاء مناطق عرض تحمل العلامة التجارية داخل بيئات المتاجر، وتستخدمها علامات الضيافة في الفعاليات والمهرجانات الخارجية، وتستخدمها الفرق المؤسسية لإنشاء مناطق استراحة تحمل العلامة التجارية في المؤتمرات وإطلاق المنتجات.</p>
<p>في المملكة العربية السعودية، تُستخدم المكعبات الدعائية بشكل متزايد في فعاليات <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> ويوم التأسيس — مع تطبيق أنظمة ألوان وطنية وعلامات تجارية خاصة بالفعالية على مجموعات المكعبات التي تُنشئ مناطق تصوير وبيئات استراحة غامرة تحمل العلامة التجارية.</p>

<h2>أعمالنا في المكعبات الدعائية بالرياض</h2>
<p>تصفح معرض أعمالنا لمشاهدة مجموعات المكعبات الدعائية المنتجة للعملاء في الرياض والمملكة العربية السعودية. يشمل المعرض بيئات مكعبات بوثات المعارض وإعدادات عرض التجزئة وتكوينات استراحات الفعاليات وتركيبات العرض المكدسة.</p>

<h2>الأسئلة الشائعة حول المكعبات الدعائية</h2>

<h3>ما هي استخدامات المكعبات الدعائية؟</h3>
<p>المكعبات الدعائية هي عناصر عرض متعددة الاستخدامات تحمل العلامة التجارية وتُستخدم كمنصات عرض منتجات، وعناصر جلوس في مناطق الاستراحة داخل بوثات المعارض، وكاونترات تحمل العلامة التجارية، وهياكل عرض مكدسة في الفعاليات وبيئات التجزئة. أسطحها المسطحة القابلة للطباعة تسمح بظهور العلامة التجارية للشركة من جميع الجوانب في وقت واحد.</p>

<h3>من أي مواد تُصنع المكعبات الدعائية؟</h3>
<p>تنتج وينوو للإعلان مكعبات دعائية من هياكل إطارات ألمنيوم خفيفة مغطاة بقماش مطبوع بتقنية التسامي الحراري، وفوم صلب مغطى بالقماش أو الفينيل، وبناء ألواح صلبة مطبوعة. يعتمد اختيار المادة على ما إذا كان المكعب سيُستخدم كمقعد أو منصة عرض منتجات أو عنصر عرض بحت.</p>

<h3>هل يمكن استخدام المكعبات الدعائية كمقاعد؟</h3>
<p>نعم. المكعبات الدعائية ذات السطح العلوي المبطن أو الفوم وبناء الإطار المتين مناسبة للاستخدام كمقاعد في مناطق استراحة بوثات المعارض. تحدد وينوو للإعلان درجة الإطار والمواد بناءً على الاستخدام المقصود — المكعبات المخصصة للعرض فقط تستخدم مواد خفيفة، بينما مكعبات الجلوس تستخدم إطارات معززة مصنفة للاستخدام المستمر.</p>

<h3>هل المكعبات الدعائية قابلة للتكديس؟</h3>
<p>نعم. تنتج وينوو للإعلان مجموعات مكعبات دعائية قابلة للتكديس بأحجام قياسية تتداخل معاً لإنشاء هياكل عرض منتجات متدرجة أو تركيبات بصرية للعلامة التجارية. تتضمن أقواس تكديس لمنع عدم الاستقرار في التكوينات المكونة من ثلاثة مكعبات أو أكثر ارتفاعاً.</p>

<h2>اطلب مكعباتك الدعائية في الرياض</h2>
<p>أخبرنا بمتطلبات حجم المكعبات والكمية والاستخدام المقصود ومواد العلامة التجارية. يقدم فريقنا معاينة تصميمية وتسعيراً كاملاً خلال 24 ساعة. التوصيل في جميع أنحاء الرياض مشمول.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما هي استخدامات المكعبات الدعائية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "المكعبات الدعائية هي عناصر عرض متعددة الاستخدامات تحمل العلامة التجارية وتُستخدم كمنصات عرض منتجات، وعناصر جلوس في مناطق الاستراحة داخل بوثات المعارض، وكاونترات تحمل العلامة التجارية، وهياكل عرض مكدسة في الفعاليات وبيئات التجزئة. أسطحها المسطحة القابلة للطباعة تسمح بظهور العلامة التجارية للشركة من جميع الجوانب في وقت واحد."
      }
    },
    {
      "@type": "Question",
      "name": "من أي مواد تُصنع المكعبات الدعائية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج وينوو للإعلان مكعبات دعائية من هياكل إطارات ألمنيوم خفيفة مغطاة بقماش مطبوع بتقنية التسامي الحراري، وفوم صلب مغطى بالقماش أو الفينيل، وبناء ألواح صلبة مطبوعة. يعتمد اختيار المادة على ما إذا كان المكعب سيُستخدم كمقعد أو منصة عرض منتجات أو عنصر عرض بحت."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن استخدام المكعبات الدعائية كمقاعد؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. المكعبات الدعائية ذات السطح العلوي المبطن أو الفوم وبناء الإطار المتين مناسبة للاستخدام كمقاعد في مناطق استراحة بوثات المعارض. تحدد وينوو للإعلان درجة الإطار والمواد بناءً على الاستخدام المقصود — المكعبات المخصصة للعرض فقط تستخدم مواد خفيفة، بينما مكعبات الجلوس تستخدم إطارات معززة مصنفة للاستخدام المستمر."
      }
    },
    {
      "@type": "Question",
      "name": "هل المكعبات الدعائية قابلة للتكديس؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تنتج وينوو للإعلان مجموعات مكعبات دعائية قابلة للتكديس بأحجام قياسية تتداخل معاً لإنشاء هياكل عرض منتجات متدرجة أو تركيبات بصرية للعلامة التجارية. تتضمن أقواس تكديس لمنع عدم الاستقرار في التكوينات المكونة من ثلاثة مكعبات أو أكثر ارتفاعاً."
      }
    }
  ]
}
</script>
HTML;
    }
};
