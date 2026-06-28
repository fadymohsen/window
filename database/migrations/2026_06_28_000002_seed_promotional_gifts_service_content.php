<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'promotional-gifts';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/promotional-gifts.webp',
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
            'title' => 'Promotional Gifts',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Promotional Gifts in Riyadh | Advertising Gifts Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom promotional gifts and branded advertising gifts in Riyadh. Window Advertising supplies corporate promotional items, branded giveaways, and trade show gifts for businesses across Saudi Arabia. Get a free quote today.',
            'meta_keywords' => 'promotional gifts Riyadh, advertising gifts Saudi Arabia, corporate gifts Riyadh, branded promotional items, هدايا دعائية الرياض, دعاية وإعلان الرياض',
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
            'title' => 'الهدايا الدعائية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'هدايا دعائية في الرياض | دعاية وإعلان السعودية | وينوو للإعلان',
            'meta_description' => 'هدايا دعائية مخصصة وهدايا إعلانية للشركات في الرياض — وينوو للإعلان توفر هدايا ترويجية وقطع دعائية مميزة للمؤتمرات والمعارض والفعاليات في المملكة العربية السعودية. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'هدايا دعائية الرياض, دعاية وإعلان السعودية, هدايا شركات الرياض, هدايا ترويجية مخصصة, دعاية وإعلان الرياض, هدايا إعلانية السعودية',
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
        $service = DB::table('services')->where('slug', 'promotional-gifts')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Promotional gifts are one of the most cost-effective advertising tools available to businesses in Saudi Arabia. A well-chosen branded gift stays with your client or prospect for months, keeping your brand in sight long after any event or meeting ends. Window Advertising supplies custom promotional gifts for exhibitions, conferences, national day events, and corporate campaigns across Riyadh and the Kingdom.</p>

<h2>Why Promotional Gifts Matter in Saudi Arabia</h2>
<p>In Saudi business culture, gift-giving carries significant weight. A thoughtfully branded promotional gift communicates respect, professionalism, and attention to detail. For companies operating in the Saudi market, promotional gifts are not just advertising accessories — they are relationship-building tools.</p>
<p>Whether you are exhibiting at a Riyadh trade show, hosting a corporate event, celebrating National Day, or rewarding a loyal client, a premium branded gift reinforces your company's identity in a way that digital advertising cannot. Window Advertising helps companies across Saudi Arabia select, customize, and deliver promotional gifts that leave a lasting impression.</p>

<h2>Our Range of Promotional Gifts</h2>
<p>Window Advertising supplies promotional and advertising gifts across every category and budget:</p>
<p><strong>Office and Desk Items:</strong> Branded notebooks, pens, planners, letter openers, desk organizers, and sticky note sets. These are daily-use items that keep your brand visible in the office environment.</p>
<p><strong>Technology Gifts:</strong> USB drives, power banks, phone holders, wireless chargers, and Bluetooth speakers. High-perceived-value items that are popular at exhibitions and corporate events.</p>
<p><strong>Bags and Totes:</strong> Custom-printed tote bags, backpacks, drawstring bags, and foldable shopping bags. Practical gifts that travel through the city with your brand on display. See our full range of <a href="/en/services/promotional-bags">promotional bags</a> for more options.</p>
<p><strong>Drinkware:</strong> Branded mugs, thermos flasks, reusable water bottles, and travel cups. Long-lasting items used daily at home and in the office. We also offer specialized <a href="/en/services/cup-printing">cup printing</a> services for custom drinkware.</p>
<p><strong>Apparel and Accessories:</strong> Custom caps, lanyards, keychains, and branded uniforms for events and promotional campaigns.</p>
<p><strong>Seasonal and Occasion Gifts:</strong> National Day gift sets, Ramadan gift collections, Founding Day branded items, and new-year corporate gift boxes assembled with carefully selected branded products. Our <a href="/en/services/employee-gift-boxes">employee gift boxes</a> are a popular choice for internal celebrations. For recognition events, consider pairing gifts with custom <a href="/en/services/honor-shields">honor shields</a>.</p>

<h2>Customization — Your Brand on Every Gift</h2>
<p>Every promotional gift from Window Advertising is customized to carry your brand. Customization options include screen printing, embroidery, laser engraving, digital printing, debossing, and UV coating — each technique suited to a different material and aesthetic requirement.</p>
<p>Our design team works with your logo files and brand guidelines to ensure colors, sizing, and placement are consistent across every item in your promotional gift order. You receive a digital proof of each product before production begins, so there are no surprises when the order arrives.</p>

<h2>Promotional Gifts for Exhibitions and Events</h2>
<p>Trade shows and exhibitions in Riyadh generate hundreds of prospect interactions in a single day. Promotional gifts are what make your booth memorable. The right giveaway — practical, branded, and quality-made — is picked up, kept, and used. Your brand stays visible on the desk, in the bag, or on the person of every visitor who received it.</p>
<p>Window Advertising coordinates promotional gifts alongside <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a>, ensuring your gifts arrive at the venue with your booth materials and are ready for distribution from day one of the exhibition.</p>

<h2>Bulk Corporate Gift Orders in Riyadh</h2>
<p>For large corporate orders, Window Advertising offers volume pricing and consolidated delivery. We handle orders ranging from 50 units for a single event to tens of thousands of units for Kingdom-wide campaigns.</p>
<p>Our procurement team sources products from a verified supplier network and maintains quality control throughout production. Every bulk order is checked before dispatch, and we coordinate delivery to your office, event venue, or directly to your recipients.</p>

<h2>Promotional Gifts Portfolio — Riyadh</h2>
<p>Our promotional gifts portfolio covers hundreds of projects for corporate clients, government agencies, retail brands, and event organizers across Riyadh. Browse the gallery below to explore the range of branded gifts produced and delivered by Window Advertising.</p>

<h2>Frequently Asked Questions About Promotional Gifts</h2>

<h3>What promotional gifts does Window Advertising supply in Riyadh?</h3>
<p>Window Advertising supplies a wide range of promotional gifts including branded pens, notebooks, USB drives, power banks, mugs, tote bags, lanyards, keychains, phone accessories, calendars, and premium executive gift items. All products are fully customized with your brand logo and colors.</p>

<h3>What is the minimum order quantity for promotional gifts?</h3>
<p>Minimum order quantities vary by product type. Most promotional gifts have a minimum order of 50 to 100 units. For large corporate orders and events, we handle orders of thousands of units with competitive bulk pricing. Contact us for a quantity-specific quote.</p>

<h3>Can promotional gifts be delivered across Saudi Arabia?</h3>
<p>Yes. Window Advertising delivers promotional gifts to clients across Saudi Arabia including Riyadh, Jeddah, Dammam, Khobar, and other cities. We coordinate bulk delivery to event venues, offices, and distribution points anywhere in the Kingdom.</p>

<h3>How long does it take to produce custom promotional gifts?</h3>
<p>Production timelines vary by product. Printed items such as bags and notebooks typically take 5 to 10 business days. Items requiring engraving or specialized manufacturing may take 10 to 20 business days. We always confirm your delivery timeline at the time of order.</p>

<h3>Do you supply promotional gifts for exhibitions and trade shows?</h3>
<p>Yes. Promotional gifts for exhibitions are one of our most popular categories. Window Advertising supplies exhibition giveaways that are practical, branded, and memorable — helping your booth visitors remember your company long after the event ends. We coordinate with your exhibition booth order for seamless delivery.</p>

<h2>Request a Promotional Gifts Quote</h2>
<p>Tell us what you need — the type of gift, your target quantity, event date, and any branding files you have available. Our team responds within 24 hours with product options and pricing. We work with every budget and timeline.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What promotional gifts does Window Advertising supply in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising supplies a wide range of promotional gifts including branded pens, notebooks, USB drives, power banks, mugs, tote bags, lanyards, keychains, phone accessories, calendars, and premium executive gift items. All products are fully customized with your brand logo and colors."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order quantity for promotional gifts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum order quantities vary by product type. Most promotional gifts have a minimum order of 50 to 100 units. For large corporate orders and events, we handle orders of thousands of units with competitive bulk pricing. Contact us for a quantity-specific quote."
      }
    },
    {
      "@type": "Question",
      "name": "Can promotional gifts be delivered across Saudi Arabia?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising delivers promotional gifts to clients across Saudi Arabia including Riyadh, Jeddah, Dammam, Khobar, and other cities. We coordinate bulk delivery to event venues, offices, and distribution points anywhere in the Kingdom."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to produce custom promotional gifts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Production timelines vary by product. Printed items such as bags and notebooks typically take 5 to 10 business days. Items requiring engraving or specialized manufacturing may take 10 to 20 business days. We always confirm your delivery timeline at the time of order."
      }
    },
    {
      "@type": "Question",
      "name": "Do you supply promotional gifts for exhibitions and trade shows?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Promotional gifts for exhibitions are one of our most popular categories. Window Advertising supplies exhibition giveaways that are practical, branded, and memorable — helping your booth visitors remember your company long after the event ends. We coordinate with your exhibition booth order for seamless delivery."
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
<p>تعد الهدايا الدعائية من أكثر أدوات الإعلان فعالية من حيث التكلفة المتاحة للشركات في المملكة العربية السعودية. هدية مؤسسية مختارة بعناية تبقى مع عميلك أو عميلك المحتمل لأشهر، وتبقي علامتك التجارية أمام أعينهم بعد فترة طويلة من انتهاء أي فعالية أو اجتماع. وينوو للإعلان توفر هدايا دعائية مخصصة للمعارض والمؤتمرات وفعاليات اليوم الوطني والحملات المؤسسية في جميع أنحاء الرياض والمملكة.</p>

<h2>لماذا تهم الهدايا الدعائية في السعودية؟</h2>
<p>في ثقافة الأعمال السعودية، يحمل تقديم الهدايا ثقلاً كبيراً. هدية دعائية مصممة بعناية تنقل الاحترام والاحترافية والاهتمام بالتفاصيل. بالنسبة للشركات العاملة في السوق السعودي، الهدايا الدعائية ليست مجرد إكسسوارات إعلانية — بل هي أدوات لبناء العلاقات.</p>
<p>سواء كنت تعرض في معرض تجاري في الرياض، أو تستضيف فعالية مؤسسية، أو تحتفل باليوم الوطني، أو تكافئ عميلاً وفياً، فإن هدية مؤسسية متميزة تعزز هوية شركتك بطريقة لا يستطيع الإعلان الرقمي تحقيقها. تساعد وينوو للإعلان الشركات في جميع أنحاء المملكة العربية السعودية على اختيار وتخصيص وتوصيل هدايا دعائية تترك انطباعاً دائماً.</p>

<h2>تشكيلة هدايانا الدعائية</h2>
<p>توفر وينوو للإعلان هدايا دعائية وإعلانية تغطي كل فئة وميزانية:</p>
<p><strong>أدوات المكتب:</strong> دفاتر وأقلام ومخططات وفتاحات رسائل ومنظمات مكتب ومجموعات ملاحظات لاصقة تحمل علامتك التجارية. هذه أدوات يومية تبقي علامتك التجارية مرئية في بيئة المكتب.</p>
<p><strong>هدايا تكنولوجية:</strong> أقراص USB وبنوك طاقة وحوامل هواتف وشواحن لاسلكية ومكبرات صوت بلوتوث. قطع عالية القيمة المدركة تحظى بشعبية في المعارض والفعاليات المؤسسية.</p>
<p><strong>الحقائب:</strong> حقائب توت وحقائب ظهر وحقائب برباط وحقائب تسوق قابلة للطي مطبوعة بتصميم مخصص. هدايا عملية تتنقل في المدينة وعلامتك التجارية معروضة عليها. اطلع على تشكيلتنا الكاملة من <a href="/ar/services/promotional-bags">الحقائب الدعائية</a> لمزيد من الخيارات.</p>
<p><strong>أدوات الشرب:</strong> أكواب وقوارير حرارية وزجاجات مياه قابلة لإعادة الاستخدام وأكواب سفر تحمل علامتك التجارية. قطع طويلة الأمد تُستخدم يومياً في المنزل والمكتب. نقدم أيضاً خدمات <a href="/ar/services/cup-printing">طباعة الأكواب</a> المتخصصة لأدوات الشرب المخصصة.</p>
<p><strong>الملابس والإكسسوارات:</strong> قبعات وحبال وسلاسل مفاتيح وأزياء موحدة مخصصة للفعاليات والحملات الدعائية.</p>
<p><strong>هدايا المواسم والمناسبات:</strong> مجموعات هدايا اليوم الوطني، ومجموعات هدايا رمضان، وقطع يوم التأسيس، وصناديق هدايا الشركات للعام الجديد المجمعة بمنتجات مؤسسية مختارة بعناية. تعد <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> خياراً شائعاً للاحتفالات الداخلية. لمناسبات التكريم، يمكنك إقران الهدايا مع <a href="/ar/services/honor-shields">دروع التكريم</a> المخصصة.</p>

<h2>التخصيص — علامتك التجارية على كل هدية</h2>
<p>كل هدية دعائية من وينوو للإعلان مخصصة لتحمل علامتك التجارية. تشمل خيارات التخصيص الطباعة الحريرية والتطريز والحفر بالليزر والطباعة الرقمية والنقش البارز وطلاء UV — كل تقنية مناسبة لمادة ومتطلب جمالي مختلف.</p>
<p>يعمل فريق التصميم لدينا مع ملفات شعارك وإرشادات علامتك التجارية لضمان تناسق الألوان والأحجام والمواضع عبر كل قطعة في طلب هداياك الدعائية. تحصل على نموذج رقمي لكل منتج قبل بدء الإنتاج، فلا مفاجآت عند وصول الطلب.</p>

<h2>هدايا دعائية للمعارض والفعاليات</h2>
<p>تولّد المعارض التجارية في الرياض مئات التفاعلات مع العملاء المحتملين في يوم واحد. الهدايا الدعائية هي ما يجعل جناحك لا يُنسى. الهدية المناسبة — العملية والمؤسسية وعالية الجودة — تُؤخذ وتُحفظ وتُستخدم. تبقى علامتك التجارية مرئية على المكتب أو في الحقيبة أو مع كل زائر حصل عليها.</p>
<p>تنسق وينوو للإعلان الهدايا الدعائية جنباً إلى جنب مع <a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a>، لضمان وصول هداياك إلى مكان المعرض مع مواد جناحك وجاهزيتها للتوزيع من اليوم الأول للمعرض.</p>

<h2>طلبات الهدايا الشركاتية بالجملة في الرياض</h2>
<p>للطلبات المؤسسية الكبيرة، تقدم وينوو للإعلان أسعار الكميات والتوصيل الموحد. نتعامل مع طلبات تتراوح من 50 وحدة لفعالية واحدة إلى عشرات الآلاف من الوحدات لحملات على مستوى المملكة.</p>
<p>يقوم فريق المشتريات لدينا بتوفير المنتجات من شبكة موردين معتمدين ويحافظ على مراقبة الجودة طوال الإنتاج. يتم فحص كل طلب بالجملة قبل الشحن، وننسق التوصيل إلى مكتبك أو مكان الفعالية أو مباشرة إلى المستلمين.</p>

<h2>أعمالنا في الهدايا الدعائية بالرياض</h2>
<p>تغطي محفظة أعمالنا في الهدايا الدعائية مئات المشاريع لعملاء من الشركات والجهات الحكومية والعلامات التجارية والمنظمين في جميع أنحاء الرياض. تصفح المعرض أدناه لاستكشاف مجموعة الهدايا المؤسسية التي أنتجتها وسلمتها وينوو للإعلان.</p>

<h2>الأسئلة الشائعة حول الهدايا الدعائية</h2>

<h3>ما الهدايا الدعائية التي توفرها وينوو للإعلان في الرياض؟</h3>
<p>توفر وينوو للإعلان مجموعة واسعة من الهدايا الدعائية تشمل أقلام ودفاتر وأقراص USB وبنوك طاقة وأكواب وحقائب توت وحبال وسلاسل مفاتيح وإكسسوارات هواتف وتقاويم وهدايا تنفيذية فاخرة. جميع المنتجات مخصصة بالكامل بشعار وألوان علامتك التجارية.</p>

<h3>ما الحد الأدنى لكمية طلب الهدايا الدعائية؟</h3>
<p>تختلف الكميات الدنيا حسب نوع المنتج. معظم الهدايا الدعائية لها حد أدنى من 50 إلى 100 وحدة. للطلبات المؤسسية الكبيرة والفعاليات، نتعامل مع طلبات بآلاف الوحدات بأسعار جملة تنافسية. تواصل معنا للحصول على عرض سعر حسب الكمية.</p>

<h3>هل يمكن توصيل الهدايا الدعائية في جميع أنحاء السعودية؟</h3>
<p>نعم. توصل وينوو للإعلان الهدايا الدعائية للعملاء في جميع أنحاء المملكة العربية السعودية بما في ذلك الرياض وجدة والدمام والخبر ومدن أخرى. ننسق التوصيل بالجملة إلى أماكن الفعاليات والمكاتب ونقاط التوزيع في أي مكان في المملكة.</p>

<h3>كم يستغرق إنتاج الهدايا الدعائية المخصصة؟</h3>
<p>تختلف مدد الإنتاج حسب المنتج. القطع المطبوعة مثل الحقائب والدفاتر تستغرق عادة من 5 إلى 10 أيام عمل. القطع التي تتطلب حفراً أو تصنيعاً متخصصاً قد تستغرق من 10 إلى 20 يوم عمل. نؤكد دائماً الجدول الزمني للتسليم عند الطلب.</p>

<h3>هل توفرون هدايا دعائية للمعارض والمعارض التجارية؟</h3>
<p>نعم. الهدايا الدعائية للمعارض من أكثر فئاتنا شعبية. توفر وينوو للإعلان هدايا معارض عملية ومؤسسية ولا تُنسى — تساعد زوار جناحك على تذكر شركتك بعد فترة طويلة من انتهاء الفعالية. ننسق مع طلب جناح المعرض الخاص بك لتوصيل سلس.</p>

<h2>احصل على عرض سعر للهدايا الدعائية</h2>
<p>أخبرنا بما تحتاجه — نوع الهدية والكمية المستهدفة وتاريخ الفعالية وأي ملفات علامة تجارية متوفرة لديك. يرد فريقنا خلال 24 ساعة بخيارات المنتجات والأسعار. نعمل مع كل ميزانية وجدول زمني.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما الهدايا الدعائية التي توفرها وينوو للإعلان في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "توفر وينوو للإعلان مجموعة واسعة من الهدايا الدعائية تشمل أقلام ودفاتر وأقراص USB وبنوك طاقة وأكواب وحقائب توت وحبال وسلاسل مفاتيح وإكسسوارات هواتف وتقاويم وهدايا تنفيذية فاخرة. جميع المنتجات مخصصة بالكامل بشعار وألوان علامتك التجارية."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لكمية طلب الهدايا الدعائية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تختلف الكميات الدنيا حسب نوع المنتج. معظم الهدايا الدعائية لها حد أدنى من 50 إلى 100 وحدة. للطلبات المؤسسية الكبيرة والفعاليات، نتعامل مع طلبات بآلاف الوحدات بأسعار جملة تنافسية. تواصل معنا للحصول على عرض سعر حسب الكمية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن توصيل الهدايا الدعائية في جميع أنحاء السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توصل وينوو للإعلان الهدايا الدعائية للعملاء في جميع أنحاء المملكة العربية السعودية بما في ذلك الرياض وجدة والدمام والخبر ومدن أخرى. ننسق التوصيل بالجملة إلى أماكن الفعاليات والمكاتب ونقاط التوزيع في أي مكان في المملكة."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق إنتاج الهدايا الدعائية المخصصة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تختلف مدد الإنتاج حسب المنتج. القطع المطبوعة مثل الحقائب والدفاتر تستغرق عادة من 5 إلى 10 أيام عمل. القطع التي تتطلب حفراً أو تصنيعاً متخصصاً قد تستغرق من 10 إلى 20 يوم عمل. نؤكد دائماً الجدول الزمني للتسليم عند الطلب."
      }
    },
    {
      "@type": "Question",
      "name": "هل توفرون هدايا دعائية للمعارض والمعارض التجارية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. الهدايا الدعائية للمعارض من أكثر فئاتنا شعبية. توفر وينوو للإعلان هدايا معارض عملية ومؤسسية ولا تُنسى — تساعد زوار جناحك على تذكر شركتك بعد فترة طويلة من انتهاء الفعالية. ننسق مع طلب جناح المعرض الخاص بك لتوصيل سلس."
      }
    }
  ]
}
</script>
HTML;
    }
};
