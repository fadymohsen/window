<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'promotional-bags';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/promotional-bags.webp',
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
            'title' => 'Promotional Bags',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Promotional Bags in Riyadh | Branded Bags and Corporate Gifts Saudi Arabia | Window Advertising',
            'meta_description' => 'Promotional bags and branded bags in Riyadh. Window Advertising designs and produces custom promotional bags, tote bags, gift bags, and corporate branded bags for companies across Saudi Arabia. Advertising gifts and branded packaging for events and campaigns. Get a free quote.',
            'meta_keywords' => 'promotional bags Riyadh, branded bags Saudi Arabia, corporate gift bags Riyadh, tote bags Saudi Arabia, custom bags Riyadh, هدايا دعائية الرياض, شنط دعائية الرياض, دعاية واعلان الرياض, دعاية واعلان السعودية, شنط مخصصة السعودية',
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
            'title' => 'شنط دعائية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'شنط دعائية في الرياض | حقائب مخصصة وهدايا شركاتية السعودية | ويندو للإعلان',
            'meta_description' => 'شنط دعائية وحقائب مخصصة في الرياض — ويندو للإعلان يصمم وينتج شنط ترويجية وحقائب مخصصة وهدايا دعائية للشركات في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'شنط دعائية الرياض, حقائب مخصصة السعودية, هدايا دعائية, دعاية واعلان الرياض, دعاية واعلان السعودية, حقائب شركاتية الرياض',
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
        $service = DB::table('services')->where('slug', 'promotional-bags')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A promotional bag is one of the most effective advertising gifts in the Saudi corporate market — it travels with the recipient, is seen by everyone around them, and advertises the brand on every use for months or years. Window Advertising designs and produces custom <a href="/en/services/promotional-gifts">promotional gifts</a> and promotional bags for companies across Riyadh and Saudi Arabia: for conference and event distribution, national occasion gifting, corporate gift campaigns, and retail promotional packaging.</p>

<h2>Why Promotional Bags Are High-Return Advertising Gifts</h2>
<p>Among promotional gift categories, bags consistently generate the highest number of brand impressions per unit — because they are used repeatedly in public, not kept in a drawer or displayed on a desk. Every time a recipient uses a branded tote bag at the supermarket, shopping mall, or office, the brand logo is visible to all those around them.</p>
<p>In Saudi Arabia's active conference, exhibition, and event market, branded bags are the standard item distributed to attendees — giving the organizing brand extended advertising reach through every person who uses the bag after the event. Window Advertising designs promotional bags that people actually want to use, not bags that end up discarded because the quality is too low.</p>

<h2>Bag Types for Every Application</h2>
<p>Window Advertising supplies promotional bags across a full range of styles and materials for different campaign applications:</p>
<p><strong>Non-woven polypropylene bags</strong> are the most widely distributed promotional bag type in Saudi Arabia and across the region. Lightweight, cost-effective, and available in any color, they are ideal for large-quantity event distribution, conference gift bags, and retail packaging applications. Printed with screen or full-color heat-transfer printing.</p>
<p><strong>Canvas tote bags</strong> produce a more premium promotional item — heavier, more durable, and perceived as a quality product rather than a throwaway item. Canvas bags are appropriate for professional conferences, corporate gifts for clients, and brand campaigns where the quality of the promotional item reflects the quality of the brand.</p>
<p><strong>Paper gift bags</strong> in various sizes from small boutique bags to large event bags are used as packaging for corporate gifts and retail purchases. Printed in full color with premium finishes including gloss lamination, soft-touch coating, and foil stamping.</p>
<p><strong>Drawstring and backpack-style bags</strong> in polyester are appropriate for sports events, corporate team activities, and youth-oriented promotional campaigns.</p>
<p><strong>Luxury branded bags</strong> in leatherette or premium fabric carry embossed or printed branding for high-value corporate gift applications — such as <a href="/en/services/honor-shields">honor shields</a> and executive gifts — where the bag itself is the gift.</p>

<h2>Promotional Bags for Events and Conferences</h2>
<p>For conferences, trade shows, and corporate <a href="/en/services/event-festival">event and festival</a> activations across Riyadh, the event bag is the first impression — distributed at registration, it sets the standard for every other item in the bag and in the event itself. Window Advertising coordinates event bag production with the wider event material set: the bag design connects to the banners, the programs, and the roll-up displays at registration.</p>
<p>For large events, bags are produced with individual compartments, inserts, and materials — programs, pens, notebooks, and branded items — assembled into ready-to-distribute event bags. Window Advertising manages the full assembly and delivery of event bag sets for conferences and corporate gatherings across Riyadh.</p>

<h2>National Occasion and Gift Campaign Bags</h2>
<p>For <a href="/en/services/national-day-celebrations">national day celebrations</a> and Founding Day gift campaigns, branded bags serve as both packaging and gift item — a Saudi-branded tote containing a curated selection of national occasion gifts creates a premium presentation that employees and clients remember.</p>
<p>Window Advertising designs national occasion bags in Saudi national colors with the company logo and occasion branding — coordinated with <a href="/en/services/employee-gift-boxes">employee gift boxes</a> and the gift set inside to create a unified gift experience. Production is available for large corporate gift orders across Riyadh.</p>

<h2>Promotional Bags Portfolio — Riyadh</h2>
<p>Browse the portfolio to see promotional bag designs, event bag sets, and branded bag campaigns produced for clients across Riyadh and Saudi Arabia.</p>

<h2>Frequently Asked Questions About Promotional Bags</h2>

<h3>What types of promotional bags does Window Advertising produce?</h3>
<p>Window Advertising produces non-woven polypropylene bags (the most widely used promotional bag in Saudi Arabia), canvas tote bags, paper gift bags in various sizes and styles, jute and natural fiber bags, polyester drawstring bags for events and sports, and luxury branded bags in leatherette and fabric for premium corporate gifting.</p>

<h3>How is the brand printed or applied to promotional bags?</h3>
<p>The branding application method depends on the bag material and the design complexity. Screen printing is the standard for non-woven and canvas bags — one to four spot colors applied directly to the bag surface. Full-color digital printing is available for photo-quality or complex designs. Embroidery produces a premium, raised-texture brand application on canvas and fabric bags. Heat transfer printing is used for photographic and gradient designs on fabric bags.</p>

<h3>What is the minimum order for promotional bags?</h3>
<p>Minimum order quantities depend on the bag type and print method. Non-woven bags with screen printing start at 100 units. Canvas bags with screen printing start at 50 units. Full-color digital printing is available on smaller quantities, from 20 to 50 units depending on bag size. Contact Window Advertising for minimum order details for specific bag types.</p>

<h3>Are promotional bags used as gift packaging as well as standalone gifts?</h3>
<p>Yes. Promotional bags serve both as standalone advertising items and as gift packaging containing other promotional items. For events, conferences, and corporate gift campaigns in Riyadh, a branded bag filled with a curated selection of promotional items creates a gift experience where the bag itself continues to advertise the brand after the event ends — every time the recipient uses the bag in daily life.</p>

<h2>Order Promotional Bags in Riyadh</h2>
<p>Tell us the bag type, quantity, your brand files, and the intended use. Our team provides a design concept and pricing within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of promotional bags does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces non-woven polypropylene bags (the most widely used promotional bag in Saudi Arabia), canvas tote bags, paper gift bags in various sizes and styles, jute and natural fiber bags, polyester drawstring bags for events and sports, and luxury branded bags in leatherette and fabric for premium corporate gifting."
      }
    },
    {
      "@type": "Question",
      "name": "How is the brand printed or applied to promotional bags?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The branding application method depends on the bag material and the design complexity. Screen printing is the standard for non-woven and canvas bags — one to four spot colors applied directly to the bag surface. Full-color digital printing is available for photo-quality or complex designs. Embroidery produces a premium, raised-texture brand application on canvas and fabric bags. Heat transfer printing is used for photographic and gradient designs on fabric bags."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for promotional bags?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum order quantities depend on the bag type and print method. Non-woven bags with screen printing start at 100 units. Canvas bags with screen printing start at 50 units. Full-color digital printing is available on smaller quantities, from 20 to 50 units depending on bag size. Contact Window Advertising for minimum order details for specific bag types."
      }
    },
    {
      "@type": "Question",
      "name": "Are promotional bags used as gift packaging as well as standalone gifts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Promotional bags serve both as standalone advertising items and as gift packaging containing other promotional items. For events, conferences, and corporate gift campaigns in Riyadh, a branded bag filled with a curated selection of promotional items creates a gift experience where the bag itself continues to advertise the brand after the event ends — every time the recipient uses the bag in daily life."
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
<p>الشنطة الدعائية هي واحدة من أكثر الهدايا الإعلانية فعالية في السوق السعودي — تنتقل مع المستلم، ويراها كل من حوله، وتعلن عن العلامة التجارية مع كل استخدام لأشهر أو سنوات. ويندو للإعلان يصمم وينتج <a href="/ar/services/promotional-gifts">هدايا دعائية</a> وشنط ترويجية مخصصة للشركات في جميع أنحاء الرياض والمملكة العربية السعودية: للتوزيع في المؤتمرات والفعاليات، وهدايا المناسبات الوطنية، وحملات الهدايا المؤسسية، والتغليف الترويجي.</p>

<h2>لماذا الشنط الدعائية هدايا إعلانية عالية العائد</h2>
<p>من بين فئات الهدايا الترويجية، تحقق الشنط باستمرار أعلى عدد من مرات ظهور العلامة التجارية لكل وحدة — لأنها تُستخدم بشكل متكرر في الأماكن العامة، ولا تُحفظ في درج أو تُعرض على مكتب. في كل مرة يستخدم فيها المستلم حقيبة تحمل علامة تجارية في السوبرماركت أو المول أو المكتب، يكون شعار العلامة التجارية مرئياً لكل من حوله.</p>
<p>في سوق المؤتمرات والمعارض والفعاليات النشط في المملكة العربية السعودية، تعتبر الشنط ذات العلامة التجارية العنصر المعياري الذي يوزع على الحضور — مما يمنح العلامة التجارية المنظمة وصولاً إعلانياً ممتداً من خلال كل شخص يستخدم الشنطة بعد الفعالية. ويندو للإعلان يصمم شنطاً دعائية يرغب الناس فعلاً في استخدامها، وليس شنطاً ينتهي بها المطاف مهملة بسبب انخفاض جودتها.</p>

<h2>أنواع الشنط لكل استخدام</h2>
<p>يوفر ويندو للإعلان شنطاً دعائية بمجموعة كاملة من الأنماط والخامات لتطبيقات الحملات المختلفة:</p>
<p><strong>شنط البولي بروبيلين غير المنسوجة</strong> هي أكثر أنواع الشنط الدعائية توزيعاً في المملكة العربية السعودية والمنطقة. خفيفة الوزن واقتصادية ومتوفرة بأي لون، وهي مثالية للتوزيع بكميات كبيرة في الفعاليات وشنط هدايا المؤتمرات وتطبيقات التغليف. تُطبع بالشاشة الحريرية أو الطباعة الحرارية بالألوان الكاملة.</p>
<p><strong>حقائب التوت القماشية</strong> تنتج عنصراً ترويجياً أكثر فخامة — أثقل وأكثر متانة ويُنظر إليها كمنتج عالي الجودة وليس عنصراً يُستخدم مرة واحدة. الحقائب القماشية مناسبة للمؤتمرات المهنية وهدايا العملاء المؤسسية وحملات العلامة التجارية حيث تعكس جودة العنصر الترويجي جودة العلامة التجارية.</p>
<p><strong>أكياس الهدايا الورقية</strong> بأحجام متنوعة من الأكياس الصغيرة إلى أكياس الفعاليات الكبيرة تُستخدم كتغليف للهدايا المؤسسية والمشتريات. تُطبع بالألوان الكاملة مع تشطيبات فاخرة تشمل التلميع والطلاء الناعم والختم بالرقائق المعدنية.</p>
<p><strong>شنط الأربطة وشنط الظهر</strong> من البوليستر مناسبة للفعاليات الرياضية وأنشطة الفرق المؤسسية والحملات الترويجية الموجهة للشباب.</p>
<p><strong>الشنط الفاخرة ذات العلامة التجارية</strong> من الجلد الصناعي أو القماش الفاخر تحمل علامة تجارية مطبوعة أو محفورة لتطبيقات الهدايا المؤسسية عالية القيمة — مثل <a href="/ar/services/honor-shields">دروع التكريم</a> والهدايا التنفيذية — حيث تكون الشنطة نفسها هي الهدية.</p>

<h2>شنط دعائية للفعاليات والمؤتمرات</h2>
<p>للمؤتمرات والمعارض التجارية و<a href="/ar/services/event-festival">الفعاليات والمهرجانات</a> المؤسسية في جميع أنحاء الرياض، تكون شنطة الفعالية هي الانطباع الأول — توزع عند التسجيل وتحدد المعيار لكل عنصر آخر في الشنطة وفي الفعالية نفسها. ينسق ويندو للإعلان إنتاج شنط الفعاليات مع مجموعة مواد الفعالية الأوسع: تصميم الشنطة يتصل بالبانرات والبرامج وشاشات الرول أب عند التسجيل.</p>
<p>للفعاليات الكبيرة، تُنتج الشنط بأقسام فردية وإدراجات ومواد — برامج وأقلام ودفاتر وعناصر ذات علامة تجارية — مجمعة في شنط فعاليات جاهزة للتوزيع. يدير ويندو للإعلان التجميع الكامل وتسليم مجموعات شنط الفعاليات للمؤتمرات والتجمعات المؤسسية في جميع أنحاء الرياض.</p>

<h2>شنط المناسبات الوطنية وحملات الهدايا</h2>
<p>لحملات هدايا <a href="/ar/services/national-day-celebrations">اليوم الوطني</a> ويوم التأسيس، تعمل الشنط ذات العلامة التجارية كتغليف وهدية في آن واحد — حقيبة توت سعودية تحتوي على مجموعة مختارة من هدايا المناسبات الوطنية تخلق عرضاً فاخراً يتذكره الموظفون والعملاء.</p>
<p>يصمم ويندو للإعلان شنط المناسبات الوطنية بالألوان الوطنية السعودية مع شعار الشركة وعلامة المناسبة — منسقة مع <a href="/ar/services/employee-gift-boxes">علب هدايا الموظفين</a> ومجموعة الهدايا بالداخل لخلق تجربة هدايا موحدة. الإنتاج متاح لطلبات الهدايا المؤسسية الكبيرة في جميع أنحاء الرياض.</p>

<h2>أعمالنا في الشنط الدعائية بالرياض</h2>
<p>تصفح معرض أعمالنا لمشاهدة تصاميم الشنط الدعائية ومجموعات شنط الفعاليات وحملات الشنط ذات العلامة التجارية المنتجة لعملائنا في الرياض والمملكة العربية السعودية.</p>

<h2>الأسئلة الشائعة حول الشنط الدعائية</h2>

<h3>ما أنواع الشنط الدعائية التي ينتجها ويندو للإعلان؟</h3>
<p>ينتج ويندو للإعلان شنط البولي بروبيلين غير المنسوجة (الأكثر استخداماً في المملكة العربية السعودية)، وحقائب التوت القماشية، وأكياس الهدايا الورقية بأحجام وأنماط متنوعة، وشنط الجوت والألياف الطبيعية، وشنط البوليستر ذات الأربطة للفعاليات والرياضة، والشنط الفاخرة من الجلد الصناعي والقماش للهدايا المؤسسية الراقية.</p>

<h3>كيف تُطبع أو تُطبق العلامة التجارية على الشنط الدعائية؟</h3>
<p>تعتمد طريقة تطبيق العلامة التجارية على خامة الشنطة وتعقيد التصميم. الطباعة بالشاشة الحريرية هي المعيار للشنط غير المنسوجة والقماشية — من لون إلى أربعة ألوان تُطبق مباشرة على سطح الشنطة. الطباعة الرقمية بالألوان الكاملة متاحة للتصاميم عالية الجودة أو المعقدة. التطريز ينتج تطبيقاً فاخراً بارز الملمس على الشنط القماشية. الطباعة الحرارية تُستخدم للتصاميم الفوتوغرافية والتدريجية على الشنط القماشية.</p>

<h3>ما الحد الأدنى لطلب الشنط الدعائية؟</h3>
<p>تعتمد الكميات الدنيا للطلب على نوع الشنطة وطريقة الطباعة. شنط البولي بروبيلين غير المنسوجة بالطباعة الحريرية تبدأ من 100 وحدة. الشنط القماشية بالطباعة الحريرية تبدأ من 50 وحدة. الطباعة الرقمية بالألوان الكاملة متاحة بكميات أصغر، من 20 إلى 50 وحدة حسب حجم الشنطة. تواصل مع ويندو للإعلان لتفاصيل الحد الأدنى لأنواع الشنط المحددة.</p>

<h3>هل تُستخدم الشنط الدعائية كتغليف هدايا وكذلك كهدايا مستقلة؟</h3>
<p>نعم. تعمل الشنط الدعائية كعناصر إعلانية مستقلة وكتغليف هدايا يحتوي على عناصر ترويجية أخرى. للفعاليات والمؤتمرات وحملات الهدايا المؤسسية في الرياض، شنطة تحمل علامة تجارية مليئة بمجموعة مختارة من العناصر الترويجية تخلق تجربة هدية حيث تستمر الشنطة نفسها في الإعلان عن العلامة التجارية بعد انتهاء الفعالية — في كل مرة يستخدم فيها المستلم الشنطة في حياته اليومية.</p>

<h2>اطلب شنطك الدعائية في الرياض</h2>
<p>أخبرنا بنوع الشنطة والكمية وملفات علامتك التجارية والاستخدام المقصود. يقدم فريقنا مفهوم التصميم والتسعير خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الشنط الدعائية التي ينتجها ويندو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ينتج ويندو للإعلان شنط البولي بروبيلين غير المنسوجة (الأكثر استخداماً في المملكة العربية السعودية)، وحقائب التوت القماشية، وأكياس الهدايا الورقية بأحجام وأنماط متنوعة، وشنط الجوت والألياف الطبيعية، وشنط البوليستر ذات الأربطة للفعاليات والرياضة، والشنط الفاخرة من الجلد الصناعي والقماش للهدايا المؤسسية الراقية."
      }
    },
    {
      "@type": "Question",
      "name": "كيف تُطبع أو تُطبق العلامة التجارية على الشنط الدعائية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تعتمد طريقة تطبيق العلامة التجارية على خامة الشنطة وتعقيد التصميم. الطباعة بالشاشة الحريرية هي المعيار للشنط غير المنسوجة والقماشية — من لون إلى أربعة ألوان تُطبق مباشرة على سطح الشنطة. الطباعة الرقمية بالألوان الكاملة متاحة للتصاميم عالية الجودة أو المعقدة. التطريز ينتج تطبيقاً فاخراً بارز الملمس على الشنط القماشية. الطباعة الحرارية تُستخدم للتصاميم الفوتوغرافية والتدريجية على الشنط القماشية."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لطلب الشنط الدعائية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تعتمد الكميات الدنيا للطلب على نوع الشنطة وطريقة الطباعة. شنط البولي بروبيلين غير المنسوجة بالطباعة الحريرية تبدأ من 100 وحدة. الشنط القماشية بالطباعة الحريرية تبدأ من 50 وحدة. الطباعة الرقمية بالألوان الكاملة متاحة بكميات أصغر، من 20 إلى 50 وحدة حسب حجم الشنطة. تواصل مع ويندو للإعلان لتفاصيل الحد الأدنى لأنواع الشنط المحددة."
      }
    },
    {
      "@type": "Question",
      "name": "هل تُستخدم الشنط الدعائية كتغليف هدايا وكذلك كهدايا مستقلة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تعمل الشنط الدعائية كعناصر إعلانية مستقلة وكتغليف هدايا يحتوي على عناصر ترويجية أخرى. للفعاليات والمؤتمرات وحملات الهدايا المؤسسية في الرياض، شنطة تحمل علامة تجارية مليئة بمجموعة مختارة من العناصر الترويجية تخلق تجربة هدية حيث تستمر الشنطة نفسها في الإعلان عن العلامة التجارية بعد انتهاء الفعالية — في كل مرة يستخدم فيها المستلم الشنطة في حياته اليومية."
      }
    }
  ]
}
</script>
HTML;
    }
};
