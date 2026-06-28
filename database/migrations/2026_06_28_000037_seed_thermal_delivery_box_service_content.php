<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'thermal-delivery-box';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/thermal-delivery-box.webp',
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
            'title' => 'Thermal Delivery Boxes',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Thermal Delivery Boxes in Riyadh | Branded Insulated Boxes Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom thermal delivery boxes and branded insulated boxes in Riyadh. Window Advertising designs and produces thermal delivery boxes with full-color custom branding for food delivery companies, catering businesses, and corporate gift delivery across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'thermal delivery box Riyadh, insulated delivery boxes Saudi Arabia, branded thermal box Riyadh, food delivery boxes Saudi Arabia, custom thermal box Riyadh, هدايا دعائية الرياض, صندوق توصيل حراري الرياض, دعاية واعلان الرياض, دعاية واعلان السعودية',
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
            'title' => 'صناديق التوصيل الحرارية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'صناديق توصيل حرارية في الرياض | صناديق معزولة مخصصة السعودية | وينوو للإعلان',
            'meta_description' => 'صناديق توصيل حرارية مخصصة في الرياض — وينوو للإعلان يصمم وينتج صناديق توصيل معزولة مع طباعة مخصصة كاملة لشركات التوصيل والتموين والهدايا الشركاتية في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'صناديق توصيل حرارية الرياض, صناديق معزولة السعودية, هدايا دعائية, دعاية واعلان الرياض, دعاية واعلان السعودية, صندوق توصيل مخصص الرياض',
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
        $service = DB::table('services')->where('slug', 'thermal-delivery-box')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>In Saudi Arabia's food delivery and corporate gift market, the packaging is part of the product — a hot meal that arrives cold or a chocolate gift that arrives melted is a failed delivery regardless of the quality inside. Thermal delivery boxes solve a fundamental operational challenge while simultaneously functioning as a brand advertisement on every delivery. Window Advertising designs and produces branded thermal delivery boxes for food delivery companies, catering businesses, hotels, and corporate <a href="/en/services/promotional-gifts">promotional gifts</a> programs across Riyadh and Saudi Arabia.</p>

<h2>The Advertising Value of Branded Delivery Packaging</h2>
<p>Every thermal box that leaves a commercial kitchen or corporate gift dispatch center carries the company's brand into the homes and offices of its customers. In Riyadh's dense urban environment, a branded thermal box traveling with a delivery rider is seen by dozens of people before it reaches its destination.</p>
<p>The quality of the thermal box communicates the quality of what is inside — and of the brand that sent it. A well-designed, quality-printed branded thermal box suggests that the company values both its product and its customers' experience. Window Advertising designs thermal delivery boxes that function as advertising assets, not just operational packaging.</p>

<h2>Thermal Box Specifications for Saudi Arabia</h2>
<p>The insulation requirement for food delivery in Riyadh is significantly higher than in cooler climates. In summer conditions, the difference between the inside of a delivery box and the outdoor temperature can exceed 40 degrees Celsius. Window Advertising specifies thermal boxes for the Saudi market with insulation appropriate to the delivery distance and time required.</p>
<p>EPS foam-insulated boxes provide excellent cold retention for short-distance deliveries of up to 2 hours, at a low per-unit cost. These boxes are ideal for high-volume food delivery operations.</p>
<p>Rigid polyurethane foam boxes provide superior thermal performance for longer delivery times or more temperature-sensitive contents — medical supplies, premium perishables, and cold gifting applications.</p>
<p>Corrugated cardboard boxes with foil insulation liners are the most commonly branded thermal box in Riyadh's restaurant delivery market — they enable full-color printing directly on the corrugated exterior and provide moderate thermal performance for standard delivery times. For additional branded accessories, consider pairing with <a href="/en/services/promotional-bags">promotional bags</a> or a <a href="/en/services/pvc-file-with-clip-manufacturing">PVC file with clip</a> for documentation inserts.</p>
<p>Reusable insulated fabric bags provide a sustainable option with excellent branding surface area — dye-sublimation printing enables full-color photographic quality branding on the full bag surface, including handles and side panels.</p>

<h2>Thermal Boxes for Food Delivery Companies</h2>
<p>For restaurant and food delivery businesses across Riyadh, thermal delivery box branding is a high-visibility advertising channel that is active every time a delivery is made. Window Advertising designs thermal box branding that works at the scale of the box exterior — bold logo placement, brand colors, and messaging that reads clearly at the doorstep and from across the street.</p>
<p>For food delivery companies managing high delivery volumes, consistent brand presentation across every thermal box in the fleet creates a coordinated brand presence in Riyadh's neighborhoods. Window Advertising produces thermal delivery boxes at scale — from starter quantities of 100 units to large fleet orders.</p>

<h2>Thermal Boxes for Corporate Gift Programs</h2>
<p>For corporate gift programs involving temperature-sensitive items — chocolate gift sets, date selections, fresh pastry gifts — a branded thermal box ensures the gift arrives in the condition intended. In Saudi Arabia's corporate culture, the condition in which a gift is received reflects directly on the company that sent it.</p>
<p>Window Advertising coordinates the thermal box design with the wider gift presentation — the box exterior branding, the interior packing, the gift message card, and the seal or ribbon that completes the gift experience. Pair thermal boxes with <a href="/en/services/employee-gift-boxes">employee gift boxes</a> for internal distribution or add a branded <a href="/en/services/scarf-printing">printed scarf</a> as a premium gift accessory.</p>

<h2>Frequently Asked Questions About Thermal Delivery Boxes</h2>

<h3>What types of thermal delivery boxes does Window Advertising produce?</h3>
<p>Window Advertising produces insulated delivery boxes in expanded polystyrene (EPS foam) with branded outer sleeves or printed exteriors, rigid corrugated cardboard with foil insulation liners for food delivery, polyurethane foam-insulated boxes for high-performance temperature maintenance, and reusable insulated nylon and polyester delivery bags with full-color printed branding.</p>

<h3>How is the brand applied to thermal delivery boxes?</h3>
<p>Branding on thermal delivery boxes can be applied in several ways depending on the box material: direct full-color printing on corrugated cardboard thermal boxes, printed cardboard sleeves that wrap around EPS foam boxes, heat-applied branded labels for rigid insulated boxes, and full dye-sublimation printing on insulated fabric delivery bags. The method is selected based on the box material, quantity, and the level of visual quality required.</p>

<h3>Are thermal delivery boxes suitable for Riyadh's climate?</h3>
<p>Yes. Window Advertising specifies thermal delivery boxes with insulation appropriate for Saudi Arabia's high ambient temperature environment. In Riyadh's summer conditions, a standard insulated box maintains cold temperatures for 2 to 4 hours depending on the insulation grade and how often it is opened. Higher-grade insulation specifications are available for longer delivery times or particularly temperature-sensitive contents.</p>

<h3>Can thermal boxes be used for corporate gift delivery as well as food delivery?</h3>
<p>Yes. Branded thermal boxes are used for corporate gift delivery as well as food delivery — particularly for gifts containing perishables such as chocolates, dates, fresh products, or cold items. A branded thermal box communicates that the sender has considered the condition in which the gift arrives, and it creates a premium unboxing experience appropriate for VIP gifting in Saudi Arabia's corporate market.</p>

<h2>Order Thermal Delivery Boxes in Riyadh</h2>
<p>Tell us the delivery application, required temperature performance, quantity, and your brand files. Our team provides material recommendations and pricing within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of thermal delivery boxes does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces insulated delivery boxes in expanded polystyrene (EPS foam) with branded outer sleeves or printed exteriors, rigid corrugated cardboard with foil insulation liners for food delivery, polyurethane foam-insulated boxes for high-performance temperature maintenance, and reusable insulated nylon and polyester delivery bags with full-color printed branding."
      }
    },
    {
      "@type": "Question",
      "name": "How is the brand applied to thermal delivery boxes?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Branding on thermal delivery boxes can be applied in several ways depending on the box material: direct full-color printing on corrugated cardboard thermal boxes, printed cardboard sleeves that wrap around EPS foam boxes, heat-applied branded labels for rigid insulated boxes, and full dye-sublimation printing on insulated fabric delivery bags. The method is selected based on the box material, quantity, and the level of visual quality required."
      }
    },
    {
      "@type": "Question",
      "name": "Are thermal delivery boxes suitable for Riyadh's climate?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising specifies thermal delivery boxes with insulation appropriate for Saudi Arabia's high ambient temperature environment. In Riyadh's summer conditions, a standard insulated box maintains cold temperatures for 2 to 4 hours depending on the insulation grade and how often it is opened. Higher-grade insulation specifications are available for longer delivery times or particularly temperature-sensitive contents."
      }
    },
    {
      "@type": "Question",
      "name": "Can thermal boxes be used for corporate gift delivery as well as food delivery?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Branded thermal boxes are used for corporate gift delivery as well as food delivery — particularly for gifts containing perishables such as chocolates, dates, fresh products, or cold items. A branded thermal box communicates that the sender has considered the condition in which the gift arrives, and it creates a premium unboxing experience appropriate for VIP gifting in Saudi Arabia's corporate market."
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
<p>في سوق التوصيل الغذائي والهدايا الشركاتية في المملكة العربية السعودية، التغليف جزء من المنتج — وجبة ساخنة تصل باردة أو هدية شوكولاتة تصل ذائبة هي توصيل فاشل بغض النظر عن الجودة بالداخل. صناديق التوصيل الحرارية تحل تحدياً تشغيلياً جوهرياً وتعمل في الوقت ذاته كإعلان للعلامة التجارية مع كل عملية توصيل. وينوو للإعلان يصمم وينتج صناديق توصيل حرارية مميزة لشركات التوصيل الغذائي وشركات التموين والفنادق وبرامج <a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> الشركاتية في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<h2>القيمة الإعلانية لتغليف التوصيل المميز</h2>
<p>كل صندوق حراري يغادر مطبخاً تجارياً أو مركز إرسال هدايا شركاتية يحمل علامة الشركة التجارية إلى منازل ومكاتب عملائها. في بيئة الرياض الحضرية الكثيفة، يُشاهد الصندوق الحراري المميز الذي يتنقل مع سائق التوصيل من قبل عشرات الأشخاص قبل أن يصل إلى وجهته.</p>
<p>جودة الصندوق الحراري تعكس جودة ما بداخله — وجودة العلامة التجارية التي أرسلته. صندوق حراري مميز ومصمم بعناية ومطبوع بجودة عالية يوحي بأن الشركة تقدر منتجها وتجربة عملائها. وينوو للإعلان يصمم صناديق توصيل حرارية تعمل كأصول إعلانية وليس مجرد تغليف تشغيلي.</p>

<h2>مواصفات الصناديق الحرارية للسوق السعودية</h2>
<p>متطلبات العزل لتوصيل الطعام في الرياض أعلى بكثير مما هي عليه في المناخات الأبرد. في ظروف الصيف، يمكن أن يتجاوز الفرق بين داخل صندوق التوصيل ودرجة الحرارة الخارجية 40 درجة مئوية. وينوو للإعلان يحدد مواصفات الصناديق الحرارية للسوق السعودي بعزل مناسب لمسافة ووقت التوصيل المطلوب.</p>
<p>الصناديق المعزولة بالفوم (EPS) توفر احتفاظاً ممتازاً بالبرودة للتوصيلات القصيرة حتى ساعتين، بتكلفة منخفضة للوحدة. هذه الصناديق مثالية لعمليات التوصيل الغذائي ذات الحجم العالي.</p>
<p>صناديق البولي يوريثين الصلبة توفر أداءً حرارياً متفوقاً لأوقات توصيل أطول أو محتويات أكثر حساسية للحرارة — المستلزمات الطبية والمواد القابلة للتلف الفاخرة وتطبيقات الهدايا المبردة.</p>
<p>صناديق الكرتون المموج مع بطانات عزل الرقائق هي الصندوق الحراري الأكثر شيوعاً في سوق توصيل المطاعم بالرياض — تتيح الطباعة بالألوان الكاملة مباشرة على السطح الخارجي المموج وتوفر أداءً حرارياً معتدلاً لأوقات التوصيل القياسية. لإكسسوارات مميزة إضافية، يمكن دمجها مع <a href="/ar/services/promotional-bags">الحقائب الدعائية</a> أو <a href="/ar/services/pvc-file-with-clip-manufacturing">ملف PVC بمشبك</a> لإدراج المستندات.</p>
<p>الحقائب القماشية المعزولة القابلة لإعادة الاستخدام توفر خياراً مستداماً مع مساحة ممتازة للعلامة التجارية — طباعة التسامي الحراري تتيح علامة تجارية بجودة فوتوغرافية بالألوان الكاملة على كامل سطح الحقيبة، بما في ذلك المقابض والألواح الجانبية.</p>

<h2>صناديق حرارية لشركات التوصيل الغذائي</h2>
<p>لشركات المطاعم والتوصيل الغذائي في جميع أنحاء الرياض، العلامة التجارية على صناديق التوصيل الحرارية هي قناة إعلانية عالية الظهور تنشط مع كل عملية توصيل. وينوو للإعلان يصمم علامات تجارية للصناديق الحرارية تعمل على نطاق السطح الخارجي للصندوق — وضع شعار جريء، وألوان العلامة التجارية، ورسائل تُقرأ بوضوح عند عتبة الباب ومن الجهة المقابلة للشارع.</p>
<p>لشركات التوصيل الغذائي التي تدير حجماً عالياً من التوصيلات، العرض المتسق للعلامة التجارية عبر كل صندوق حراري في الأسطول يخلق حضوراً منسقاً للعلامة التجارية في أحياء الرياض. وينوو للإعلان ينتج صناديق التوصيل الحرارية بكميات كبيرة — من كميات بداية تبلغ 100 وحدة إلى طلبات الأساطيل الكبيرة.</p>

<h2>صناديق حرارية لبرامج الهدايا الشركاتية</h2>
<p>لبرامج الهدايا الشركاتية التي تتضمن عناصر حساسة للحرارة — مجموعات هدايا الشوكولاتة، وتشكيلات التمور، وهدايا المعجنات الطازجة — يضمن الصندوق الحراري المميز وصول الهدية بالحالة المقصودة. في ثقافة الشركات السعودية، حالة وصول الهدية تنعكس مباشرة على الشركة المرسلة.</p>
<p>وينوو للإعلان ينسق تصميم الصندوق الحراري مع العرض الأوسع للهدية — العلامة التجارية على السطح الخارجي للصندوق، والتغليف الداخلي، وبطاقة رسالة الهدية، والختم أو الشريط الذي يكمل تجربة الهدية. ادمج الصناديق الحرارية مع <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> للتوزيع الداخلي أو أضف <a href="/ar/services/scarf-printing">وشاحاً مطبوعاً</a> مميزاً كإكسسوار هدية فاخر.</p>

<h2>الأسئلة الشائعة حول صناديق التوصيل الحرارية</h2>

<h3>ما أنواع صناديق التوصيل الحرارية التي ينتجها وينوو للإعلان؟</h3>
<p>ينتج وينوو للإعلان صناديق توصيل معزولة من البوليسترين الممدد (فوم EPS) مع أغلفة خارجية مميزة أو سطوح مطبوعة، وكرتون مموج صلب مع بطانات عزل رقائقية لتوصيل الطعام، وصناديق معزولة بفوم البولي يوريثين للحفاظ على الحرارة عالي الأداء، وحقائب توصيل معزولة قابلة لإعادة الاستخدام من النايلون والبوليستر مع طباعة مميزة بالألوان الكاملة.</p>

<h3>كيف تُطبق العلامة التجارية على صناديق التوصيل الحرارية؟</h3>
<p>يمكن تطبيق العلامة التجارية على صناديق التوصيل الحرارية بعدة طرق حسب مادة الصندوق: الطباعة المباشرة بالألوان الكاملة على صناديق الكرتون المموج الحرارية، والأغلفة الكرتونية المطبوعة التي تلتف حول صناديق فوم EPS، والملصقات المميزة المطبقة بالحرارة للصناديق المعزولة الصلبة، وطباعة التسامي الحراري الكاملة على حقائب التوصيل القماشية المعزولة. تُختار الطريقة بناءً على مادة الصندوق والكمية ومستوى الجودة البصرية المطلوب.</p>

<h3>هل صناديق التوصيل الحرارية مناسبة لمناخ الرياض؟</h3>
<p>نعم. وينوو للإعلان يحدد مواصفات صناديق التوصيل الحرارية بعزل مناسب لبيئة درجات الحرارة المحيطة العالية في المملكة العربية السعودية. في ظروف صيف الرياض، يحافظ الصندوق المعزول القياسي على درجات حرارة باردة لمدة 2 إلى 4 ساعات حسب درجة العزل وعدد مرات فتحه. تتوفر مواصفات عزل أعلى لأوقات التوصيل الأطول أو المحتويات الحساسة للحرارة بشكل خاص.</p>

<h3>هل يمكن استخدام الصناديق الحرارية لتوصيل الهدايا الشركاتية وكذلك توصيل الطعام؟</h3>
<p>نعم. تُستخدم الصناديق الحرارية المميزة لتوصيل الهدايا الشركاتية وكذلك توصيل الطعام — خاصة للهدايا التي تحتوي على مواد قابلة للتلف مثل الشوكولاتة والتمور والمنتجات الطازجة أو العناصر المبردة. الصندوق الحراري المميز يوصل رسالة بأن المرسل قد أخذ بعين الاعتبار الحالة التي ستصل بها الهدية، ويخلق تجربة فتح فاخرة مناسبة لهدايا كبار العملاء في سوق الشركات السعودي.</p>

<h2>اطلب صناديق التوصيل الحرارية في الرياض</h2>
<p>أخبرنا عن تطبيق التوصيل والأداء الحراري المطلوب والكمية وملفات علامتك التجارية. يقدم فريقنا توصيات المواد والتسعير خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع صناديق التوصيل الحرارية التي ينتجها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ينتج وينوو للإعلان صناديق توصيل معزولة من البوليسترين الممدد (فوم EPS) مع أغلفة خارجية مميزة أو سطوح مطبوعة، وكرتون مموج صلب مع بطانات عزل رقائقية لتوصيل الطعام، وصناديق معزولة بفوم البولي يوريثين للحفاظ على الحرارة عالي الأداء، وحقائب توصيل معزولة قابلة لإعادة الاستخدام من النايلون والبوليستر مع طباعة مميزة بالألوان الكاملة."
      }
    },
    {
      "@type": "Question",
      "name": "كيف تُطبق العلامة التجارية على صناديق التوصيل الحرارية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يمكن تطبيق العلامة التجارية على صناديق التوصيل الحرارية بعدة طرق حسب مادة الصندوق: الطباعة المباشرة بالألوان الكاملة على صناديق الكرتون المموج الحرارية، والأغلفة الكرتونية المطبوعة التي تلتف حول صناديق فوم EPS، والملصقات المميزة المطبقة بالحرارة للصناديق المعزولة الصلبة، وطباعة التسامي الحراري الكاملة على حقائب التوصيل القماشية المعزولة. تُختار الطريقة بناءً على مادة الصندوق والكمية ومستوى الجودة البصرية المطلوب."
      }
    },
    {
      "@type": "Question",
      "name": "هل صناديق التوصيل الحرارية مناسبة لمناخ الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. وينوو للإعلان يحدد مواصفات صناديق التوصيل الحرارية بعزل مناسب لبيئة درجات الحرارة المحيطة العالية في المملكة العربية السعودية. في ظروف صيف الرياض، يحافظ الصندوق المعزول القياسي على درجات حرارة باردة لمدة 2 إلى 4 ساعات حسب درجة العزل وعدد مرات فتحه. تتوفر مواصفات عزل أعلى لأوقات التوصيل الأطول أو المحتويات الحساسة للحرارة بشكل خاص."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن استخدام الصناديق الحرارية لتوصيل الهدايا الشركاتية وكذلك توصيل الطعام؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تُستخدم الصناديق الحرارية المميزة لتوصيل الهدايا الشركاتية وكذلك توصيل الطعام — خاصة للهدايا التي تحتوي على مواد قابلة للتلف مثل الشوكولاتة والتمور والمنتجات الطازجة أو العناصر المبردة. الصندوق الحراري المميز يوصل رسالة بأن المرسل قد أخذ بعين الاعتبار الحالة التي ستصل بها الهدية، ويخلق تجربة فتح فاخرة مناسبة لهدايا كبار العملاء في سوق الشركات السعودي."
      }
    }
  ]
}
</script>
HTML;
    }
};
