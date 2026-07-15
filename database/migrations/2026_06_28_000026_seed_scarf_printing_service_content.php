<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'scarf-printing';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/scarf-printing.webp',
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
            'title' => 'Scarf Printing',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Scarf Printing in Riyadh | Custom Branded Scarves Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom scarf printing and branded scarves in Riyadh. Window Advertising designs and prints promotional scarves, corporate gift scarves, and event scarves for companies across Saudi Arabia. Premium advertising gifts with full-color custom printing. Get a free quote.',
            'meta_keywords' => 'scarf printing Riyadh, branded scarves Saudi Arabia, promotional scarves Riyadh, corporate gift scarves Saudi Arabia, هدايا دعائية الرياض, دعاية واعلان الرياض, دعاية واعلان السعودية, تصميم هوية, طباعة أوشحة الرياض',
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
            'title' => 'طباعة الأوشحة',
            'content' => $this->getArabicContent(),
            'meta_title' => 'طباعة أوشحة في الرياض | أوشحة مميزة هدايا دعائية السعودية | ويندو للإعلان',
            'meta_description' => 'طباعة وتصميم أوشحة مخصصة في الرياض — ويندو للإعلان يصمم ويطبع أوشحة ترويجية وهدايا دعائية وأوشحة فعاليات للشركات في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'طباعة أوشحة الرياض, هدايا دعائية السعودية, دعاية واعلان الرياض, دعاية واعلان السعودية, تصميم هوية, أوشحة شركاتية الرياض',
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
        $service = DB::table('services')->where('slug', 'scarf-printing')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Branded scarves occupy a unique position in Saudi Arabia's corporate gift market — they are practical, elegant, and culturally appropriate for a wide range of recipients. Window Advertising designs and prints custom scarves for corporate gift campaigns, event distribution, national occasion gifting, and team apparel including <a href="/en/services/uniforms">uniforms</a> in Riyadh and across Saudi Arabia.</p>

<h2>Scarves as Premium Advertising Gifts</h2>
<p>Among <a href="/en/services/promotional-gifts">promotional gifts</a> for the Saudi corporate market, a custom-printed scarf communicates a higher level of care and investment than most standard advertising items. A quality scarf with a well-designed print is something recipients keep and use — generating repeated brand impressions over months or years.</p>
<p>For companies that want their promotional gifts to reflect the organization's standards, a printed scarf in quality polyester satin or silk is a step above the typical advertising gift categories. Window Advertising produces scarf gifts that are coordinated with the full promotional gift set — packaging, ribbon, tissue, and brand messaging all aligned to create a complete gift experience.</p>

<h2>Fabric and Print Options</h2>
<p>The quality of a branded scarf is determined by both the fabric and the printing method used. Window Advertising works with three main fabric types:</p>
<p>Polyester satin is the most widely used fabric for promotional scarves. It produces vibrant, high-resolution prints through dye-sublimation and has a smooth, slightly lustrous surface that reads as premium at a low cost per unit. Ideal for large promotional gift campaigns.</p>
<p>Natural silk produces a softer, more luxurious feel and carries color slightly differently from polyester — the result is a rich, elegant product suited to executive gifting and high-value corporate relationships.</p>
<p>Light cotton and viscose blends offer a more casual, everyday wearable option — appropriate for team events, festival merchandise, and outdoor occasion gifting. For other fabric-based branding, see our <a href="/en/services/t-shirt-design-printing">t-shirt design and printing</a> services.</p>

<h2>Scarf Design for Saudi Corporate and National Occasions</h2>
<p>Custom scarf design for the Saudi market requires cultural awareness alongside brand identity expertise. Window Advertising designs scarves that incorporate the client's brand colors and logo alongside design elements appropriate to the occasion — whether that is a clean corporate pattern, a Saudi national occasion motif in green and white, or a custom illustration that tells the company's story.</p>
<p>For <a href="/en/services/national-day-celebrations">national day celebrations</a> and Founding Day events, scarves with Saudi-inspired design elements and the company logo are among the most popular premium promotional gift options. Our design team develops the full scarf artwork and presents a digital proof on the scarf dimensions before production.</p>

<h2>Scarves for Events and Conferences</h2>
<p>For events, conferences, and hospitality occasions across Riyadh, branded scarves serve as both a recognition gift for attendees and an ongoing advertising tool that travels with them after the event ends. A well-designed scarf distributed at a corporate event becomes a wearable ambassador for the organizing company's brand.</p>
<p>Window Advertising coordinates scarf production as part of a complete event gift package — alongside branded gift boxes, cups, notebooks, and other promotional items that form a unified event gift set.</p>

<h2>Packaging and Presentation</h2>
<p>The packaging of a branded scarf is as important as the scarf itself for the gift experience. Window Advertising supplies scarves in individual organza bags, ribbon-tied tissue packaging, custom-printed gift boxes, and presentation tubes. For corporate gifts, the packaging carries the company logo and occasion branding — ensuring that the gift impression begins at the moment of presentation rather than when the packaging is opened. For complete corporate gift solutions, explore our <a href="/en/services/employee-gift-boxes">employee gift boxes</a> service.</p>

<h2>Scarf Printing Portfolio — Riyadh</h2>
<p>Browse the portfolio to see custom printed scarf campaigns and corporate gift scarf sets produced for clients across Riyadh and Saudi Arabia.</p>

<h2>Frequently Asked Questions About Scarf Printing</h2>

<h3>What fabric options are available for custom printed scarves?</h3>
<p>Window Advertising prints custom scarves on polyester satin (the most popular option for full-color promotional scarves), natural silk (for premium corporate gifts), and light cotton or viscose blends. Polyester satin dye-sublimation printing delivers the most vivid, detailed results and is the most cost-effective option for marketing and promotional applications.</p>

<h3>Are custom scarves suitable as corporate gifts in Saudi Arabia?</h3>
<p>Yes. Branded scarves are well-received as corporate gifts in Saudi Arabia — particularly for events with female attendees, national occasion celebrations, and international business relationships. Window Advertising designs scarves with the company logo and brand colors, and can incorporate Saudi cultural patterns and colors for national day themed gifting.</p>

<h3>What is the minimum order for custom printed scarves?</h3>
<p>Minimum order for dye-sublimation printed scarves is typically 50 units. For screen printed scarves, the minimum is 100 units. Smaller trial quantities may be available depending on fabric and design complexity. Contact Window Advertising for a specific quantity quote.</p>

<h3>How long does scarf printing production take?</h3>
<p>Standard production for custom printed scarves takes 7 to 14 business days from design approval. For National Day or Founding Day events in Saudi Arabia, we recommend ordering at least 3 to 4 weeks in advance due to high seasonal demand.</p>

<h2>Order Custom Printed Scarves in Riyadh</h2>
<p>Tell us the fabric preference, quantity, occasion, and your branding files. Our team provides a design concept and pricing within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What fabric options are available for custom printed scarves?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising prints custom scarves on polyester satin (the most popular option for full-color promotional scarves), natural silk (for premium corporate gifts), and light cotton or viscose blends. Polyester satin dye-sublimation printing delivers the most vivid, detailed results and is the most cost-effective option for marketing and promotional applications."
      }
    },
    {
      "@type": "Question",
      "name": "Are custom scarves suitable as corporate gifts in Saudi Arabia?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Branded scarves are well-received as corporate gifts in Saudi Arabia — particularly for events with female attendees, national occasion celebrations, and international business relationships. Window Advertising designs scarves with the company logo and brand colors, and can incorporate Saudi cultural patterns and colors for national day themed gifting."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for custom printed scarves?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum order for dye-sublimation printed scarves is typically 50 units. For screen printed scarves, the minimum is 100 units. Smaller trial quantities may be available depending on fabric and design complexity. Contact Window Advertising for a specific quantity quote."
      }
    },
    {
      "@type": "Question",
      "name": "How long does scarf printing production take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard production for custom printed scarves takes 7 to 14 business days from design approval. For National Day or Founding Day events in Saudi Arabia, we recommend ordering at least 3 to 4 weeks in advance due to high seasonal demand."
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
<p>تحتل الأوشحة ذات العلامة التجارية مكانة فريدة في سوق الهدايا المؤسسية في المملكة العربية السعودية — فهي عملية وأنيقة ومناسبة ثقافياً لشريحة واسعة من المتلقين. تصمم وتطبع ويندو للإعلان أوشحة مخصصة لحملات الهدايا المؤسسية وتوزيعات الفعاليات وهدايا المناسبات الوطنية والملابس الفريقية بما في ذلك <a href="/ar/services/uniforms">الأزياء الموحدة</a> في الرياض وجميع أنحاء المملكة العربية السعودية.</p>

<h2>الأوشحة كهدايا دعائية فاخرة</h2>
<p>من بين <a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> لسوق الشركات السعودي، يعكس الوشاح المطبوع حسب الطلب مستوى أعلى من العناية والاستثمار مقارنة بمعظم المواد الإعلانية القياسية. الوشاح عالي الجودة بتصميم مميز هو شيء يحتفظ به المتلقون ويستخدمونه — مما يولّد انطباعات متكررة للعلامة التجارية على مدى أشهر أو سنوات.</p>
<p>للشركات التي ترغب في أن تعكس هداياها الترويجية معايير المؤسسة، فإن الوشاح المطبوع من البوليستر الساتان عالي الجودة أو الحرير يمثل خطوة أعلى من فئات الهدايا الإعلانية النموذجية. تنتج ويندو للإعلان أوشحة هدايا منسقة مع مجموعة الهدايا الترويجية الكاملة — التغليف والشريط والمناديل الورقية ورسائل العلامة التجارية كلها متناسقة لخلق تجربة هدية متكاملة.</p>

<h2>خيارات القماش والطباعة</h2>
<p>تتحدد جودة الوشاح ذي العلامة التجارية بنوع القماش وطريقة الطباعة المستخدمة. تعمل ويندو للإعلان مع ثلاثة أنواع رئيسية من الأقمشة:</p>
<p>البوليستر الساتان هو القماش الأكثر استخداماً للأوشحة الترويجية. ينتج طبعات نابضة بالحياة وعالية الدقة من خلال الطباعة الحرارية بالتسامي، وله سطح ناعم ولامع قليلاً يبدو فاخراً بتكلفة منخفضة للوحدة. مثالي لحملات الهدايا الترويجية الكبيرة.</p>
<p>الحرير الطبيعي ينتج ملمساً أنعم وأكثر فخامة ويحمل الألوان بطريقة مختلفة قليلاً عن البوليستر — والنتيجة منتج غني وأنيق مناسب للهدايا التنفيذية والعلاقات المؤسسية عالية القيمة.</p>
<p>مزيج القطن الخفيف والفيسكوز يوفر خياراً عملياً يومياً أكثر — مناسب لفعاليات الفريق وبضائع المهرجانات وهدايا المناسبات الخارجية. لمزيد من العلامات التجارية القائمة على الأقمشة، اطلع على خدمات <a href="/ar/services/t-shirt-design-printing">تصميم وطباعة التيشيرتات</a>.</p>

<h2>تصميم الأوشحة للمناسبات الشركاتية والوطنية السعودية</h2>
<p>يتطلب تصميم الأوشحة المخصصة للسوق السعودي وعياً ثقافياً إلى جانب خبرة في هوية العلامة التجارية. تصمم ويندو للإعلان أوشحة تدمج ألوان وشعار العميل مع عناصر تصميم مناسبة للمناسبة — سواء كان ذلك نمطاً مؤسسياً أنيقاً أو زخرفة مناسبة وطنية سعودية بالأخضر والأبيض أو رسماً توضيحياً مخصصاً يروي قصة الشركة.</p>
<p>في فعاليات <a href="/ar/services/national-day-celebrations">اليوم الوطني</a> ويوم التأسيس، تعد الأوشحة ذات التصاميم المستوحاة من السعودية وشعار الشركة من أكثر خيارات الهدايا الترويجية الفاخرة شعبية. يطور فريق التصميم لدينا العمل الفني الكامل للوشاح ويقدم نموذجاً رقمياً بأبعاد الوشاح قبل الإنتاج.</p>

<h2>الأوشحة للفعاليات والمؤتمرات</h2>
<p>للفعاليات والمؤتمرات ومناسبات الضيافة في الرياض، تعمل الأوشحة ذات العلامة التجارية كهدية تقدير للحضور وأداة إعلانية مستمرة ترافقهم بعد انتهاء الفعالية. الوشاح المصمم بعناية والموزع في فعالية مؤسسية يصبح سفيراً يرتديه الحامل لعلامة الشركة المنظمة.</p>
<p>تنسق ويندو للإعلان إنتاج الأوشحة كجزء من حزمة هدايا فعاليات متكاملة — إلى جانب صناديق الهدايا والأكواب والدفاتر وغيرها من المواد الترويجية التي تشكل مجموعة هدايا فعالية موحدة.</p>

<h2>التغليف وطريقة التقديم</h2>
<p>تغليف الوشاح ذي العلامة التجارية لا يقل أهمية عن الوشاح نفسه في تجربة الإهداء. توفر ويندو للإعلان الأوشحة في أكياس أورجانزا فردية وتغليف مناديل ورقية مربوطة بشريط وصناديق هدايا مطبوعة حسب الطلب وأنابيب تقديم. للهدايا المؤسسية، يحمل التغليف شعار الشركة وعلامة المناسبة — لضمان أن انطباع الهدية يبدأ من لحظة التقديم وليس عند فتح العبوة. لحلول الهدايا المؤسسية المتكاملة، استكشف خدمة <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a>.</p>

<h2>أعمالنا في طباعة الأوشحة بالرياض</h2>
<p>تصفح معرض أعمالنا لمشاهدة حملات طباعة الأوشحة المخصصة ومجموعات هدايا الأوشحة المؤسسية التي أنتجناها لعملائنا في الرياض والمملكة العربية السعودية.</p>

<h2>الأسئلة الشائعة حول طباعة الأوشحة</h2>

<h3>ما خيارات الأقمشة المتاحة للأوشحة المطبوعة حسب الطلب؟</h3>
<p>تطبع ويندو للإعلان الأوشحة المخصصة على البوليستر الساتان (الخيار الأكثر شعبية للأوشحة الترويجية كاملة الألوان) والحرير الطبيعي (للهدايا المؤسسية الفاخرة) ومزيج القطن الخفيف أو الفيسكوز. طباعة البوليستر الساتان بالتسامي الحراري تقدم أكثر النتائج حيوية وتفصيلاً وهي الخيار الأكثر فعالية من حيث التكلفة للتطبيقات التسويقية والترويجية.</p>

<h3>هل الأوشحة المخصصة مناسبة كهدايا مؤسسية في السعودية؟</h3>
<p>نعم. الأوشحة ذات العلامة التجارية مقبولة بشكل كبير كهدايا مؤسسية في المملكة العربية السعودية — خاصة للفعاليات ذات الحضور النسائي واحتفالات المناسبات الوطنية والعلاقات التجارية الدولية. تصمم ويندو للإعلان الأوشحة بشعار الشركة وألوان العلامة التجارية، ويمكنها دمج الأنماط والألوان الثقافية السعودية لهدايا اليوم الوطني.</p>

<h3>ما الحد الأدنى لطلب الأوشحة المطبوعة حسب الطلب؟</h3>
<p>الحد الأدنى للأوشحة المطبوعة بالتسامي الحراري عادة 50 وحدة. للأوشحة المطبوعة بالشاشة الحريرية، الحد الأدنى 100 وحدة. قد تتوفر كميات تجريبية أصغر حسب القماش وتعقيد التصميم. تواصل مع ويندو للإعلان للحصول على عرض سعر لكمية محددة.</p>

<h3>كم تستغرق مدة إنتاج طباعة الأوشحة؟</h3>
<p>الإنتاج القياسي للأوشحة المطبوعة حسب الطلب يستغرق من 7 إلى 14 يوم عمل من اعتماد التصميم. لفعاليات اليوم الوطني أو يوم التأسيس في المملكة العربية السعودية، ننصح بالطلب قبل 3 إلى 4 أسابيع على الأقل بسبب الطلب الموسمي المرتفع.</p>

<h2>اطلب أوشحتك المطبوعة في الرياض</h2>
<p>أخبرنا بتفضيل القماش والكمية والمناسبة وملفات علامتك التجارية. يقدم فريقنا مفهوم التصميم والتسعير خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما خيارات الأقمشة المتاحة للأوشحة المطبوعة حسب الطلب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تطبع ويندو للإعلان الأوشحة المخصصة على البوليستر الساتان (الخيار الأكثر شعبية للأوشحة الترويجية كاملة الألوان) والحرير الطبيعي (للهدايا المؤسسية الفاخرة) ومزيج القطن الخفيف أو الفيسكوز. طباعة البوليستر الساتان بالتسامي الحراري تقدم أكثر النتائج حيوية وتفصيلاً وهي الخيار الأكثر فعالية من حيث التكلفة للتطبيقات التسويقية والترويجية."
      }
    },
    {
      "@type": "Question",
      "name": "هل الأوشحة المخصصة مناسبة كهدايا مؤسسية في السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. الأوشحة ذات العلامة التجارية مقبولة بشكل كبير كهدايا مؤسسية في المملكة العربية السعودية — خاصة للفعاليات ذات الحضور النسائي واحتفالات المناسبات الوطنية والعلاقات التجارية الدولية. تصمم ويندو للإعلان الأوشحة بشعار الشركة وألوان العلامة التجارية، ويمكنها دمج الأنماط والألوان الثقافية السعودية لهدايا اليوم الوطني."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لطلب الأوشحة المطبوعة حسب الطلب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الحد الأدنى للأوشحة المطبوعة بالتسامي الحراري عادة 50 وحدة. للأوشحة المطبوعة بالشاشة الحريرية، الحد الأدنى 100 وحدة. قد تتوفر كميات تجريبية أصغر حسب القماش وتعقيد التصميم. تواصل مع ويندو للإعلان للحصول على عرض سعر لكمية محددة."
      }
    },
    {
      "@type": "Question",
      "name": "كم تستغرق مدة إنتاج طباعة الأوشحة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الإنتاج القياسي للأوشحة المطبوعة حسب الطلب يستغرق من 7 إلى 14 يوم عمل من اعتماد التصميم. لفعاليات اليوم الوطني أو يوم التأسيس في المملكة العربية السعودية، ننصح بالطلب قبل 3 إلى 4 أسابيع على الأقل بسبب الطلب الموسمي المرتفع."
      }
    }
  ]
}
</script>
HTML;
    }
};
