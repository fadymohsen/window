<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'embossed-letters';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/embossed-letters.webp',
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
            'title' => 'Embossed Letters',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Embossed Letters & 3D Signage in Riyadh | Window Advertising',
            'meta_description' => 'Custom embossed letters and 3D raised signage in Riyadh. Window Advertising manufactures stainless steel, acrylic, and aluminum embossed letters for storefronts, office facades, and commercial buildings. Request a free quote.',
            'meta_keywords' => 'embossed letters Riyadh, 3D letters signage Saudi Arabia, raised letters signage Riyadh, stainless steel letters Riyadh, acrylic letters business sign Riyadh',
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
            'title' => 'الأحرف البارزة',
            'content' => $this->getArabicContent(),
            'meta_title' => 'أحرف بارزة ولافتات ثلاثية الأبعاد في الرياض | وينوو للإعلان',
            'meta_description' => 'تصنيع أحرف بارزة مخصصة ولافتات ثلاثية الأبعاد في الرياض — ستانلس ستيل، أكريليك، وألمنيوم لواجهات المحلات والمكاتب والمباني التجارية. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'أحرف بارزة الرياض, لافتات ثلاثية الأبعاد السعودية, أحرف ستانلس ستيل الرياض, أحرف بارزة للمحلات, أحرف مضيئة الرياض',
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
        $service = DB::table('services')->where('slug', 'embossed-letters')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Your signage is the first thing customers see. Window Advertising manufactures premium embossed letters and 3D raised signs for businesses across Riyadh — crafted from stainless steel, acrylic, aluminum, and brass, with illuminated options available for maximum visibility day and night.</p>

<h2>What Are Embossed Letters?</h2>
<p>Embossed letters — also called raised letters or 3D letters — are individually cut, shaped, and mounted characters that stand out physically from a wall, panel, or surface. Unlike flat printed signs, embossed letters create a three-dimensional effect that adds prestige, depth, and professionalism to any environment.</p>
<p>They are used extensively on storefront facades, office reception walls, building exteriors, hotel lobbies, retail spaces, and corporate headquarters. The result is a sign that communicates permanence and quality from the first glance.</p>

<h2>Materials We Use for Embossed Letters</h2>
<p>We work with a range of premium materials to match every brand aesthetic and environment:</p>
<p><strong>Stainless Steel Letters:</strong> The most popular choice for outdoor facades and high-end commercial properties. Available in brushed, mirror-polished, or painted finishes. Highly durable in Riyadh's outdoor climate.</p>
<p><strong>Acrylic Letters:</strong> Lightweight and versatile, available in any color, translucent, or mirrored finish. Ideal for indoor reception walls and retail environments.</p>
<p><strong>Aluminum Letters:</strong> Lightweight, rust-resistant, and suitable for both indoor and outdoor applications. Popular for large-format building signage.</p>
<p><strong>Brass Letters:</strong> A classic, premium option for law firms, financial institutions, hotels, and upscale retail — communicates heritage and authority.</p>
<p><strong>PVC Foam Letters:</strong> Cost-effective solution for indoor environments where durability is less critical, such as temporary displays and event branding.</p>
<p>Our team also works with <a href="/en/services/3d-fabrication">3D fabrication</a> techniques for complex shapes and custom logos beyond standard letterforms.</p>

<h2>Illuminated Embossed Letters</h2>
<p>Standard embossed letters work well in brightly lit environments. For storefronts, building exteriors, and hospitality venues that need 24-hour visibility, we offer fully illuminated options:</p>
<p><strong>Front-Lit Letters:</strong> LED modules inside the letter face project light forward, making the lettering highly visible at night.</p>
<p><strong>Backlit Letters (Halo Effect):</strong> LEDs behind the letter cast a glow against the mounting surface, creating an elegant halo of light. A preferred choice for luxury brands and hotels.</p>
<p><strong>Edge-Lit Letters:</strong> Subtle illumination from the letter edges for a modern, minimalist aesthetic.</p>
<p>All LED systems are energy-efficient and rated for continuous outdoor use in Saudi Arabia's climate.</p>

<h2>Applications — Where We Install Embossed Letters</h2>
<p>Window Advertising installs embossed letters across a wide range of commercial and institutional settings in Riyadh:</p>
<ul>
<li>Retail storefront facades and shop fronts</li>
<li>Office building exteriors and main entrances</li>
<li>Corporate reception and lobby walls</li>
<li>Hotel and hospitality signage</li>
<li>Medical clinics and hospital branding</li>
<li>Shopping mall store signs</li>
<li>School and university signage</li>
<li>Government and institutional buildings</li>
<li>Industrial facility identification signage</li>
</ul>
<p>We also provide <a href="/en/services/directional-signage">directional signage</a>, <a href="/en/services/project-signboards-walls">project signboards</a>, and <a href="/en/services/wall-stickers">wall stickers</a> for complete interior and exterior branding solutions.</p>

<h2>Why Choose Window Advertising for Embossed Letters?</h2>
<p>We manufacture every letter in our own production facility in Riyadh. Unlike resellers, we control the cutting, forming, painting, and LED installation ourselves — which means higher quality, faster turnaround, and competitive pricing because there is no middleman.</p>
<p>Our design team works with your existing brand guidelines to ensure the letterforms, sizing, and finish match your corporate identity exactly. We provide a digital proof for your approval before any material is cut.</p>
<p>After manufacturing, our installation crew handles mounting across Riyadh and nationwide — arriving on time and leaving your premises clean.</p>

<h2>Frequently Asked Questions About Embossed Letters</h2>

<h3>What materials are used for embossed letters in Riyadh?</h3>
<p>Window Advertising manufactures embossed letters from stainless steel (brushed or mirror finish), acrylic (clear, colored, or mirrored), aluminum, brass, and PVC foam. Material choice depends on your environment, budget, and aesthetic requirements.</p>

<h3>Can embossed letters be illuminated or backlit?</h3>
<p>Yes. We manufacture front-lit, backlit (halo effect), and edge-lit embossed letters using LED modules. Illuminated letters are ideal for storefronts, hotels, and building facades that need visibility after dark.</p>

<h3>How long does it take to manufacture embossed letters?</h3>
<p>Standard embossed letter orders are manufactured within 5–10 business days depending on size and material. Complex or large-format installations may require 2–3 weeks. Rush orders are available upon request.</p>

<h3>Do you install embossed letters or just manufacture them?</h3>
<p>Window Advertising offers a complete supply-and-install service throughout Riyadh and Saudi Arabia. Our installation team handles mounting, wiring for illuminated letters, leveling, and finishing — delivering a ready-to-use sign.</p>

<h3>Are embossed letters suitable for outdoor use in Saudi Arabia's climate?</h3>
<p>Yes. Our outdoor embossed letters are manufactured with weather-resistant materials and UV-stable coatings that withstand Saudi Arabia's high temperatures, humidity, and direct sunlight. Stainless steel and aluminum are particularly suited to harsh outdoor conditions.</p>

<h2>Request a Quote for Your Embossed Letters</h2>
<p>Share your project details — the text, size requirements, material preference, and whether you need illumination. Our team will prepare a detailed quote within 24 hours. Supply-and-install packages available across Riyadh and Saudi Arabia.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What materials are used for embossed letters in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising manufactures embossed letters from stainless steel (brushed or mirror finish), acrylic (clear, colored, or mirrored), aluminum, brass, and PVC foam. Material choice depends on your environment, budget, and aesthetic requirements."
      }
    },
    {
      "@type": "Question",
      "name": "Can embossed letters be illuminated or backlit?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. We manufacture front-lit, backlit (halo effect), and edge-lit embossed letters using LED modules. Illuminated letters are ideal for storefronts, hotels, and building facades that need visibility after dark."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to manufacture embossed letters?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard embossed letter orders are manufactured within 5–10 business days depending on size and material. Complex or large-format installations may require 2–3 weeks. Rush orders are available upon request."
      }
    },
    {
      "@type": "Question",
      "name": "Do you install embossed letters or just manufacture them?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising offers a complete supply-and-install service throughout Riyadh and Saudi Arabia. Our installation team handles mounting, wiring for illuminated letters, leveling, and finishing — delivering a ready-to-use sign."
      }
    },
    {
      "@type": "Question",
      "name": "Are embossed letters suitable for outdoor use in Saudi Arabia's climate?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Our outdoor embossed letters are manufactured with weather-resistant materials and UV-stable coatings that withstand Saudi Arabia's high temperatures, humidity, and direct sunlight. Stainless steel and aluminum are particularly suited to harsh outdoor conditions."
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
<p>لافتتك هي أول ما يراه العملاء. تصنّع وينوو للإعلان أحرفاً بارزة ولافتات ثلاثية الأبعاد للشركات في جميع أنحاء الرياض — مصنوعة من الستانلس ستيل والأكريليك والألمنيوم والنحاس، مع خيارات إضاءة متاحة لأقصى رؤية نهاراً وليلاً.</p>

<h2>ما هي الأحرف البارزة؟</h2>
<p>الأحرف البارزة — وتُسمى أيضاً الأحرف المجسمة أو الأحرف ثلاثية الأبعاد — هي حروف مقطوعة ومشكّلة ومثبتة بشكل فردي تبرز فعلياً من الجدار أو اللوحة أو السطح. على عكس اللافتات المطبوعة المسطحة، تخلق الأحرف البارزة تأثيراً ثلاثي الأبعاد يضيف هيبة وعمقاً واحترافية لأي بيئة.</p>
<p>تُستخدم على نطاق واسع في واجهات المحلات، وجدران استقبال المكاتب، والواجهات الخارجية للمباني، وبهو الفنادق، ومساحات البيع بالتجزئة، والمقرات الرئيسية للشركات. والنتيجة هي لافتة تعبر عن الديمومة والجودة من النظرة الأولى.</p>

<h2>المواد التي نستخدمها في الأحرف البارزة</h2>
<p>نعمل مع مجموعة من المواد الفاخرة لتتناسب مع كل هوية تجارية وبيئة:</p>
<p><strong>أحرف ستانلس ستيل:</strong> الخيار الأكثر شعبية للواجهات الخارجية والعقارات التجارية الراقية. متوفرة بتشطيب مصقول أو مرآوي أو مطلي. متينة للغاية في مناخ الرياض الخارجي.</p>
<p><strong>أحرف أكريليك:</strong> خفيفة الوزن ومتعددة الاستخدامات، متوفرة بأي لون أو شفافة أو بتشطيب مرآوي. مثالية لجدران الاستقبال الداخلية وبيئات البيع بالتجزئة.</p>
<p><strong>أحرف ألمنيوم:</strong> خفيفة الوزن ومقاومة للصدأ ومناسبة للتطبيقات الداخلية والخارجية. شائعة للافتات المباني الكبيرة.</p>
<p><strong>أحرف نحاسية:</strong> خيار كلاسيكي وفاخر لمكاتب المحاماة والمؤسسات المالية والفنادق ومتاجر التجزئة الراقية — تعبر عن التراث والسلطة.</p>
<p><strong>أحرف فوم PVC:</strong> حل اقتصادي للبيئات الداخلية حيث تكون المتانة أقل أهمية، مثل العروض المؤقتة والعلامات التجارية للفعاليات.</p>
<p>يعمل فريقنا أيضاً مع تقنيات <a href="/ar/services/3d-fabrication">التصنيع ثلاثي الأبعاد</a> للأشكال المعقدة والشعارات المخصصة التي تتجاوز الحروف القياسية.</p>

<h2>الأحرف البارزة المضيئة</h2>
<p>تعمل الأحرف البارزة العادية بشكل جيد في البيئات المضاءة جيداً. لواجهات المحلات والواجهات الخارجية للمباني وأماكن الضيافة التي تحتاج رؤية على مدار 24 ساعة، نقدم خيارات مضيئة بالكامل:</p>
<p><strong>أحرف مضاءة أمامياً:</strong> وحدات LED داخل وجه الحرف تُسقط الضوء للأمام، مما يجعل الأحرف مرئية بوضوح في الليل.</p>
<p><strong>أحرف مضاءة خلفياً (تأثير الهالة):</strong> إضاءة LED خلف الحرف تلقي توهجاً على سطح التركيب، مما يخلق هالة ضوئية أنيقة. خيار مفضل للعلامات التجارية الفاخرة والفنادق.</p>
<p><strong>أحرف مضاءة من الحواف:</strong> إضاءة دقيقة من حواف الحرف لمظهر عصري وبسيط.</p>
<p>جميع أنظمة LED موفرة للطاقة ومصنفة للاستخدام الخارجي المستمر في مناخ المملكة العربية السعودية.</p>

<h2>تطبيقات الأحرف البارزة — أين نركبها؟</h2>
<p>تركب وينوو للإعلان الأحرف البارزة في مجموعة واسعة من البيئات التجارية والمؤسسية في الرياض:</p>
<ul>
<li>واجهات محلات البيع بالتجزئة والمتاجر</li>
<li>الواجهات الخارجية للمباني المكتبية والمداخل الرئيسية</li>
<li>جدران استقبال وبهو الشركات</li>
<li>لافتات الفنادق والضيافة</li>
<li>العلامات التجارية للعيادات الطبية والمستشفيات</li>
<li>لافتات متاجر مراكز التسوق</li>
<li>لافتات المدارس والجامعات</li>
<li>المباني الحكومية والمؤسسية</li>
<li>لافتات تعريف المنشآت الصناعية</li>
</ul>
<p>نقدم أيضاً <a href="/ar/services/directional-signage">اللافتات الإرشادية</a> و<a href="/ar/services/project-signboards-walls">لوحات المشاريع</a> و<a href="/ar/services/wall-stickers">ملصقات الجدران</a> لحلول العلامة التجارية الداخلية والخارجية الشاملة.</p>

<h2>لماذا تختار وينوو للإعلان؟</h2>
<p>نصنع كل حرف في منشأة الإنتاج الخاصة بنا في الرياض. على عكس الموزعين، نتحكم في القطع والتشكيل والطلاء وتركيب LED بأنفسنا — مما يعني جودة أعلى وسرعة أكبر في التسليم وأسعار تنافسية لعدم وجود وسيط.</p>
<p>يعمل فريق التصميم لدينا مع إرشادات علامتك التجارية الحالية لضمان تطابق أشكال الحروف والأحجام والتشطيب مع هويتك المؤسسية بدقة. نقدم نموذجاً رقمياً لموافقتك قبل قطع أي مادة.</p>
<p>بعد التصنيع، يتولى فريق التركيب لدينا التثبيت في جميع أنحاء الرياض وعلى مستوى المملكة — يصلون في الوقت المحدد ويتركون مقرك نظيفاً.</p>

<h2>الأسئلة الشائعة حول الأحرف البارزة</h2>

<h3>ما المواد المستخدمة في الأحرف البارزة في الرياض؟</h3>
<p>تصنع وينوو للإعلان الأحرف البارزة من الستانلس ستيل (مصقول أو مرآوي)، والأكريليك (شفاف أو ملون أو مرآوي)، والألمنيوم، والنحاس، وفوم PVC. يعتمد اختيار المادة على بيئتك وميزانيتك ومتطلباتك الجمالية.</p>

<h3>هل يمكن إضاءة الأحرف البارزة أو إضاءتها خلفياً؟</h3>
<p>نعم. نصنع أحرفاً بارزة مضاءة أمامياً وخلفياً (تأثير الهالة) ومن الحواف باستخدام وحدات LED. الأحرف المضيئة مثالية لواجهات المحلات والفنادق وواجهات المباني التي تحتاج رؤية بعد حلول الظلام.</p>

<h3>كم يستغرق تصنيع الأحرف البارزة؟</h3>
<p>تُصنع طلبات الأحرف البارزة القياسية خلال 5-10 أيام عمل حسب الحجم والمادة. قد تتطلب التركيبات المعقدة أو الكبيرة 2-3 أسابيع. الطلبات العاجلة متاحة عند الطلب.</p>

<h3>هل تركبون الأحرف البارزة أم تصنعونها فقط؟</h3>
<p>تقدم وينوو للإعلان خدمة توريد وتركيب كاملة في جميع أنحاء الرياض والمملكة العربية السعودية. يتولى فريق التركيب لدينا التثبيت والتوصيل الكهربائي للأحرف المضيئة والتسوية والتشطيب — لتسليم لافتة جاهزة للاستخدام.</p>

<h3>هل الأحرف البارزة مناسبة للاستخدام الخارجي في مناخ السعودية؟</h3>
<p>نعم. أحرفنا البارزة الخارجية مصنعة بمواد مقاومة للطقس وطلاءات مستقرة ضد الأشعة فوق البنفسجية تتحمل درجات الحرارة العالية والرطوبة وأشعة الشمس المباشرة في المملكة العربية السعودية. الستانلس ستيل والألمنيوم مناسبان بشكل خاص للظروف الخارجية القاسية.</p>

<h2>احصل على عرض سعر لأحرفك البارزة</h2>
<p>شاركنا تفاصيل مشروعك — النص ومتطلبات الحجم وتفضيل المادة وما إذا كنت بحاجة إلى إضاءة. سيُعد فريقنا عرض سعر مفصلاً خلال 24 ساعة. باقات التوريد والتركيب متاحة في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما المواد المستخدمة في الأحرف البارزة في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تصنع وينوو للإعلان الأحرف البارزة من الستانلس ستيل (مصقول أو مرآوي)، والأكريليك (شفاف أو ملون أو مرآوي)، والألمنيوم، والنحاس، وفوم PVC. يعتمد اختيار المادة على بيئتك وميزانيتك ومتطلباتك الجمالية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن إضاءة الأحرف البارزة أو إضاءتها خلفياً؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. نصنع أحرفاً بارزة مضاءة أمامياً وخلفياً (تأثير الهالة) ومن الحواف باستخدام وحدات LED. الأحرف المضيئة مثالية لواجهات المحلات والفنادق وواجهات المباني التي تحتاج رؤية بعد حلول الظلام."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق تصنيع الأحرف البارزة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُصنع طلبات الأحرف البارزة القياسية خلال 5-10 أيام عمل حسب الحجم والمادة. قد تتطلب التركيبات المعقدة أو الكبيرة 2-3 أسابيع. الطلبات العاجلة متاحة عند الطلب."
      }
    },
    {
      "@type": "Question",
      "name": "هل تركبون الأحرف البارزة أم تصنعونها فقط؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تقدم وينوو للإعلان خدمة توريد وتركيب كاملة في جميع أنحاء الرياض والمملكة العربية السعودية. يتولى فريق التركيب لدينا التثبيت والتوصيل الكهربائي للأحرف المضيئة والتسوية والتشطيب — لتسليم لافتة جاهزة للاستخدام."
      }
    },
    {
      "@type": "Question",
      "name": "هل الأحرف البارزة مناسبة للاستخدام الخارجي في مناخ السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. أحرفنا البارزة الخارجية مصنعة بمواد مقاومة للطقس وطلاءات مستقرة ضد الأشعة فوق البنفسجية تتحمل درجات الحرارة العالية والرطوبة وأشعة الشمس المباشرة في المملكة العربية السعودية. الستانلس ستيل والألمنيوم مناسبان بشكل خاص للظروف الخارجية القاسية."
      }
    }
  ]
}
</script>
HTML;
    }
};
