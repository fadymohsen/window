<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'cup-printing';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/cup-printing.webp',
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
            'title' => 'Cup Printing',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Cup Printing in Riyadh | Branded Mugs & Promotional Cups | Window Advertising',
            'meta_description' => 'Custom cup printing and branded mugs in Riyadh. Window Advertising prints promotional cups, ceramic mugs, travel tumblers, and paper cups with your company logo for corporate gifts and events across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'cup printing Riyadh, branded mugs Saudi Arabia, promotional cups Riyadh, custom mugs corporate gifts, هدايا دعائية الرياض, طباعة أكواب الرياض, دعاية وإعلان الرياض',
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
            'title' => 'طباعة الأكواب',
            'content' => $this->getArabicContent(),
            'meta_title' => 'طباعة أكواب في الرياض | أكواب مميزة وهدايا دعائية | ويندو للإعلان',
            'meta_description' => 'طباعة أكواب مخصصة وأكواب مميزة بشعار شركتك في الرياض — ويندو للإعلان يطبع أكواب ترويجية وأكواب سيراميك وأكواب سفر للهدايا الشركاتية والفعاليات. دعاية وإعلان السعودية. احصل على عرض سعر.',
            'meta_keywords' => 'طباعة أكواب الرياض, أكواب مميزة السعودية, هدايا دعائية الرياض, أكواب ترويجية, دعاية وإعلان الرياض, أكواب شعار شركة',
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
        $service = DB::table('services')->where('slug', 'cup-printing')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A branded cup sits on a desk, travels in a bag, and appears in photographs — keeping your company's name and logo visible day after day. Window Advertising prints custom cups and mugs for corporate gifts, employee recognition, <a href="/en/services/promotional-gifts">promotional gifts</a>, and event giveaways across Riyadh and Saudi Arabia.</p>

<h2>Why Branded Cups Are Effective Advertising Gifts</h2>
<p>Among all promotional gifts, drinkware consistently ranks among the highest in retention rates. A quality branded mug or travel tumbler is kept and used for months or years after it is received — generating repeated brand impressions every time the recipient uses it.</p>
<p>In the Saudi corporate environment, branded cups are presented as part of employee gift boxes, distributed at conference tables, used as client appreciation gifts, and given at trade shows. Unlike a flyer or brochure that is quickly discarded, a branded cup stays in use. Window Advertising helps companies across Riyadh turn an everyday object into a long-running advertising asset.</p>

<h2>Types of Cups We Print</h2>
<p>Window Advertising prints custom designs on a comprehensive range of cup and drinkware formats:</p>
<p><strong>Ceramic Mugs</strong> are the most widely recognized corporate gift cup format. Available in standard 325ml and large 450ml sizes, ceramic mugs are printed using dye-sublimation for a full-color, permanent finish that survives repeated dishwasher cycles.</p>
<p><strong>Stainless Steel Travel Tumblers</strong> are high-perceived-value gifts that communicate quality. Double-walled and vacuum-insulated, these tumblers are popular for executive gift boxes and premium promotional campaigns.</p>
<p><strong>Double-Wall Glass Mugs</strong> combine elegance with practicality. Used in premium corporate settings and as high-end conference gifts, glass mugs are available with custom etching or UV-print branding.</p>
<p><strong>Sublimation Plastic Cups and Tumblers</strong> are cost-effective options for larger quantity orders — popular at events, conferences, and seasonal gift campaigns.</p>
<p><strong>Paper Cups</strong> with custom printing are used for brand presence at events, hospitality settings, and temporary campaigns where disposable branded drinkware serves the promotional purpose.</p>

<h2>Printing Methods We Use</h2>
<p>Different cup materials require different printing techniques. Window Advertising uses the appropriate method for each:</p>
<p><strong>Dye-Sublimation</strong> is used for ceramic and sublimation-coated cups. The design is thermally transferred into the surface coating, producing a permanent, full-color result that resists washing, scratching, and fading. This is the most durable printing method available for ceramic drinkware.</p>
<p><strong>Laser Engraving</strong> produces a precise, permanent mark by removing material from the cup surface. Used for stainless steel and glass cups where a premium, tactile finish is preferred over full-color printing.</p>
<p><strong>UV Printing</strong> applies UV-cured ink directly onto the cup surface, allowing full-color printing on materials that cannot be sublimated. Used for specialty cups and non-standard substrates.</p>
<p><strong>Screen Printing</strong> is used for large quantity, single or limited color applications on plastic cups and bottles — cost-effective at high volumes.</p>

<h2>Branded Cups for Corporate Events in Riyadh</h2>
<p>Corporate events in Riyadh create natural distribution opportunities for branded cups. Window Advertising supplies cups coordinated with the event's visual identity — colors, logos, and event messaging printed on drinkware that guests and attendees take home.</p>
<p>For conferences, branded cups are placed at tables or distributed at registration. For award ceremonies and galas, premium travel tumblers form part of the branded event gift. For trade shows, cups become giveaway items — alongside <a href="/en/services/scarf-printing">scarf printing</a> and <a href="/en/services/honor-shields">honor shields</a> — that keep your booth memorable after the event ends.</p>
<p>Window Advertising coordinates cup printing with the wider promotional gift order, ensuring all items arrive at your event in time for distribution.</p>

<h2>Cups as Part of Employee Gift Boxes</h2>
<p>Branded cups are one of the most popular inclusions in <a href="/en/services/employee-gift-boxes">employee gift boxes</a> assembled by Window Advertising. A quality mug or travel tumbler paired with branded stationery, chocolates, and custom packaging creates a complete gift set that employees genuinely value.</p>
<p>For National Day and Founding Day gift boxes, cups are often printed with patriotic design elements alongside the company logo — combining the occasion's theme with the company brand. Window Advertising handles the design, printing, and assembly of every element in the gift box, including coordination with <a href="/en/services/national-day-celebrations">national day celebrations</a> campaigns.</p>

<h2>Cup Printing Portfolio — Riyadh</h2>
<p>Browse our cup printing portfolio to see the range of branded drinkware produced for corporate clients across Riyadh. Our gallery includes ceramic mug campaigns, executive tumbler gift sets, event cup collections, and seasonal branded drinkware.</p>

<h2>Frequently Asked Questions About Cup Printing</h2>

<h3>What types of cups can be printed with a company logo?</h3>
<p>Window Advertising prints company logos and custom designs on ceramic mugs, stainless steel travel tumblers, double-wall insulated cups, glass mugs, sublimation-coated plastic cups, and paper coffee cups. Each material uses a different printing process suited to its surface and durability requirements.</p>

<h3>Is cup printing suitable for corporate gifts?</h3>
<p>Yes. Branded cups and mugs are among the most popular corporate gifts in Saudi Arabia because they are practical, daily-use items that keep your brand visible at the recipient's desk, in their home, or during their commute. Window Advertising supplies branded cups as standalone gifts and as components of employee gift boxes.</p>

<h3>What is the minimum order quantity for custom printed cups?</h3>
<p>Minimum order quantities vary by cup type. Ceramic mugs and sublimation cups typically have a minimum of 24 to 50 units. Stainless steel travel tumblers may have a minimum of 50 units. For large corporate or event orders, we handle quantities from 100 to several thousand units.</p>

<h3>How is the logo printed on cups — will it wash off?</h3>
<p>Window Advertising uses dye-sublimation printing for ceramic and sublimation-coated cups, which infuses the design permanently into the surface coating. The result is a print that does not peel, scratch, or wash off in dishwashers. Stainless steel cups use laser engraving or UV printing depending on the design requirements.</p>

<h2>Order Branded Cups in Riyadh</h2>
<p>Tell us the cup type, quantity, and your branding requirements. Attach your logo file if available. Our team will recommend the most suitable cup format and printing method for your application and provide a quote within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of cups can be printed with a company logo?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising prints company logos and custom designs on ceramic mugs, stainless steel travel tumblers, double-wall insulated cups, glass mugs, sublimation-coated plastic cups, and paper coffee cups. Each material uses a different printing process suited to its surface and durability requirements."
      }
    },
    {
      "@type": "Question",
      "name": "Is cup printing suitable for corporate gifts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Branded cups and mugs are among the most popular corporate gifts in Saudi Arabia because they are practical, daily-use items that keep your brand visible at the recipient's desk, in their home, or during their commute. Window Advertising supplies branded cups as standalone gifts and as components of employee gift boxes."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order quantity for custom printed cups?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum order quantities vary by cup type. Ceramic mugs and sublimation cups typically have a minimum of 24 to 50 units. Stainless steel travel tumblers may have a minimum of 50 units. For large corporate or event orders, we handle quantities from 100 to several thousand units."
      }
    },
    {
      "@type": "Question",
      "name": "How is the logo printed on cups — will it wash off?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising uses dye-sublimation printing for ceramic and sublimation-coated cups, which infuses the design permanently into the surface coating. The result is a print that does not peel, scratch, or wash off in dishwashers. Stainless steel cups use laser engraving or UV printing depending on the design requirements."
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
<p>الكوب المميز بشعار شركتك يجلس على المكتب، ويرافق صاحبه في حقيبته، ويظهر في الصور — مما يبقي اسم شركتك وشعارها مرئياً يوماً بعد يوم. ويندو للإعلان يطبع أكواباً وماغات مخصصة لـ<a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> والتقدير الوظيفي والحملات الترويجية وهدايا الفعاليات في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<h2>لماذا الأكواب المميزة هدايا دعائية فعّالة؟</h2>
<p>من بين جميع الهدايا الترويجية، تحتل أدوات الشرب باستمرار مرتبة من أعلى المعدلات في الاحتفاظ بها. الماغ أو كوب السفر المميز بجودة عالية يُحتفظ به ويُستخدم لأشهر أو سنوات بعد استلامه — مما يولّد انطباعات متكررة للعلامة التجارية في كل مرة يستخدمه المتلقي.</p>
<p>في بيئة الشركات السعودية، تُقدَّم الأكواب المميزة كجزء من بوكسات هدايا الموظفين، وتُوزَّع على طاولات المؤتمرات، وتُستخدم كهدايا تقدير للعملاء، وتُوزَّع في المعارض التجارية. على عكس النشرة الإعلانية أو الكتيب الذي يُتخلص منه سريعاً، يبقى الكوب المميز قيد الاستخدام. ويندو للإعلان يساعد الشركات في الرياض على تحويل غرض يومي إلى أصل إعلاني طويل الأمد.</p>

<h2>أنواع الأكواب التي نطبعها</h2>
<p>يطبع ويندو للإعلان تصاميم مخصصة على مجموعة شاملة من أنواع الأكواب وأدوات الشرب:</p>
<p><strong>أكواب السيراميك</strong> هي الأكثر شهرة كهدايا شركاتية. متوفرة بأحجام 325 مل و450 مل، تُطبع باستخدام تقنية التسامي الحراري للحصول على ألوان كاملة ولمسة نهائية دائمة تتحمل غسيل الأطباق المتكرر.</p>
<p><strong>أكواب السفر من الستانلس ستيل</strong> هي هدايا ذات قيمة عالية تعكس الجودة. مزدوجة الجدار ومعزولة بالتفريغ، وتحظى بشعبية كبيرة في بوكسات الهدايا التنفيذية والحملات الترويجية المميزة.</p>
<p><strong>أكواب الزجاج مزدوجة الجدار</strong> تجمع بين الأناقة والعملية. تُستخدم في البيئات المؤسسية الراقية وكهدايا مؤتمرات فاخرة، ومتوفرة بنقش مخصص أو طباعة بالأشعة فوق البنفسجية.</p>
<p><strong>الأكواب والتمبلرات البلاستيكية المطلية للتسامي</strong> خيارات اقتصادية للطلبيات بكميات كبيرة — شائعة في الفعاليات والمؤتمرات والحملات الموسمية.</p>
<p><strong>الأكواب الورقية</strong> المطبوعة بتصاميم مخصصة تُستخدم لتعزيز حضور العلامة التجارية في الفعاليات وأماكن الضيافة والحملات المؤقتة حيث تخدم أدوات الشرب المؤسسية القابلة للتخلص الغرض الترويجي.</p>

<h2>طرق الطباعة التي نستخدمها</h2>
<p>تتطلب مواد الأكواب المختلفة تقنيات طباعة مختلفة. يستخدم ويندو للإعلان الطريقة المناسبة لكل نوع:</p>
<p><strong>التسامي الحراري (Dye-Sublimation)</strong> يُستخدم لأكواب السيراميك والأكواب المطلية بمادة التسامي. يُنقل التصميم حرارياً إلى الطبقة السطحية، مما ينتج نتيجة دائمة بألوان كاملة تقاوم الغسيل والخدش والبهتان. هذه أكثر طريقة طباعة متانة متاحة لأكواب السيراميك.</p>
<p><strong>النقش بالليزر</strong> ينتج علامة دقيقة ودائمة عن طريق إزالة المادة من سطح الكوب. يُستخدم لأكواب الستانلس ستيل والزجاج حيث يُفضَّل التشطيب الملموس الفاخر على الطباعة بالألوان الكاملة.</p>
<p><strong>الطباعة بالأشعة فوق البنفسجية (UV)</strong> تُطبق حبراً معالجاً بالأشعة فوق البنفسجية مباشرة على سطح الكوب، مما يسمح بطباعة بالألوان الكاملة على المواد التي لا يمكن معالجتها بالتسامي. تُستخدم للأكواب الخاصة والأسطح غير التقليدية.</p>
<p><strong>الطباعة الحريرية (Screen Printing)</strong> تُستخدم للطلبيات بكميات كبيرة بلون واحد أو ألوان محدودة على الأكواب والزجاجات البلاستيكية — اقتصادية في الأحجام الكبيرة.</p>

<h2>أكواب مميزة لفعاليات الشركات في الرياض</h2>
<p>تخلق فعاليات الشركات في الرياض فرصاً طبيعية لتوزيع الأكواب المميزة. يوفر ويندو للإعلان أكواباً منسقة مع الهوية البصرية للفعالية — الألوان والشعارات ورسائل الفعالية مطبوعة على أدوات شرب يأخذها الضيوف والحضور معهم إلى المنزل.</p>
<p>في المؤتمرات، تُوضع الأكواب المميزة على الطاولات أو تُوزع عند التسجيل. في حفلات التكريم والسهرات، تشكل تمبلرات السفر الفاخرة جزءاً من هدية الفعالية المميزة. في المعارض التجارية، تصبح الأكواب هدايا توزيعية — إلى جانب <a href="/ar/services/scarf-printing">طباعة الأوشحة</a> و<a href="/ar/services/honor-shields">الدروع التكريمية</a> — تبقي جناحك في الذاكرة بعد انتهاء الفعالية.</p>
<p>ينسق ويندو للإعلان طباعة الأكواب مع طلب الهدايا الترويجية الأوسع، مما يضمن وصول جميع العناصر إلى فعاليتك في الوقت المناسب للتوزيع.</p>

<h2>الأكواب كجزء من بوكس هدايا الموظفين</h2>
<p>الأكواب المميزة هي من أكثر العناصر شعبية في <a href="/ar/services/employee-gift-boxes">بوكسات هدايا الموظفين</a> التي يجمّعها ويندو للإعلان. ماغ أو تمبلر سفر عالي الجودة مقترناً بقرطاسية مميزة وشوكولاتة وتغليف مخصص يخلق طقم هدايا متكاملاً يقدّره الموظفون حقاً.</p>
<p>في بوكسات هدايا اليوم الوطني ويوم التأسيس، غالباً ما تُطبع الأكواب بعناصر تصميم وطنية إلى جانب شعار الشركة — مما يجمع بين موضوع المناسبة والعلامة التجارية للشركة. يتولى ويندو للإعلان التصميم والطباعة والتجميع لكل عنصر في بوكس الهدايا، بما في ذلك التنسيق مع حملات <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a>.</p>

<h2>أعمالنا في طباعة الأكواب بالرياض</h2>
<p>تصفح معرض أعمالنا في طباعة الأكواب لمشاهدة تشكيلة أدوات الشرب المميزة المنتجة لعملاء الشركات في الرياض. يتضمن معرضنا حملات أكواب سيراميك وأطقم هدايا تمبلرات تنفيذية ومجموعات أكواب فعاليات وأدوات شرب مميزة موسمية.</p>

<h2>الأسئلة الشائعة حول طباعة الأكواب</h2>

<h3>ما أنواع الأكواب التي يمكن طباعة شعار الشركة عليها؟</h3>
<p>يطبع ويندو للإعلان شعارات الشركات وتصاميم مخصصة على أكواب السيراميك وتمبلرات السفر من الستانلس ستيل والأكواب المعزولة مزدوجة الجدار وأكواب الزجاج والأكواب البلاستيكية المطلية للتسامي والأكواب الورقية للقهوة. يستخدم كل نوع من المواد عملية طباعة مختلفة تناسب سطحه ومتطلبات متانته.</p>

<h3>هل طباعة الأكواب مناسبة للهدايا الشركاتية؟</h3>
<p>نعم. الأكواب والماغات المميزة من أكثر الهدايا الشركاتية شعبية في المملكة العربية السعودية لأنها أغراض عملية يومية الاستخدام تبقي علامتك التجارية مرئية على مكتب المتلقي، في منزله، أو أثناء تنقله. يوفر ويندو للإعلان أكواباً مميزة كهدايا مستقلة وكمكونات في بوكسات هدايا الموظفين.</p>

<h3>ما الحد الأدنى لكمية الطلب للأكواب المطبوعة المخصصة؟</h3>
<p>تختلف الحدود الدنيا لكمية الطلب حسب نوع الكوب. أكواب السيراميك وأكواب التسامي عادةً ما يكون حدها الأدنى من 24 إلى 50 وحدة. تمبلرات السفر من الستانلس ستيل قد يكون حدها الأدنى 50 وحدة. للطلبيات الشركاتية الكبيرة أو طلبيات الفعاليات، نتعامل مع كميات من 100 إلى عدة آلاف وحدة.</p>

<h3>كيف يُطبع الشعار على الأكواب — هل سيزول بالغسيل؟</h3>
<p>يستخدم ويندو للإعلان طباعة التسامي الحراري لأكواب السيراميك والأكواب المطلية بمادة التسامي، مما يدمج التصميم بشكل دائم في الطبقة السطحية. والنتيجة طباعة لا تتقشر أو تُخدش أو تزول في غسالات الأطباق. أكواب الستانلس ستيل تستخدم النقش بالليزر أو الطباعة بالأشعة فوق البنفسجية حسب متطلبات التصميم.</p>

<h2>اطلب أكواباً مميزة في الرياض</h2>
<p>أخبرنا بنوع الكوب والكمية ومتطلبات علامتك التجارية. أرفق ملف شعارك إن توفر. سيوصي فريقنا بأنسب نوع كوب وطريقة طباعة لتطبيقك ويقدم عرض سعر خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الأكواب التي يمكن طباعة شعار الشركة عليها؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يطبع ويندو للإعلان شعارات الشركات وتصاميم مخصصة على أكواب السيراميك وتمبلرات السفر من الستانلس ستيل والأكواب المعزولة مزدوجة الجدار وأكواب الزجاج والأكواب البلاستيكية المطلية للتسامي والأكواب الورقية للقهوة. يستخدم كل نوع من المواد عملية طباعة مختلفة تناسب سطحه ومتطلبات متانته."
      }
    },
    {
      "@type": "Question",
      "name": "هل طباعة الأكواب مناسبة للهدايا الشركاتية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. الأكواب والماغات المميزة من أكثر الهدايا الشركاتية شعبية في المملكة العربية السعودية لأنها أغراض عملية يومية الاستخدام تبقي علامتك التجارية مرئية على مكتب المتلقي، في منزله، أو أثناء تنقله. يوفر ويندو للإعلان أكواباً مميزة كهدايا مستقلة وكمكونات في بوكسات هدايا الموظفين."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لكمية الطلب للأكواب المطبوعة المخصصة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تختلف الحدود الدنيا لكمية الطلب حسب نوع الكوب. أكواب السيراميك وأكواب التسامي عادةً ما يكون حدها الأدنى من 24 إلى 50 وحدة. تمبلرات السفر من الستانلس ستيل قد يكون حدها الأدنى 50 وحدة. للطلبيات الشركاتية الكبيرة أو طلبيات الفعاليات، نتعامل مع كميات من 100 إلى عدة آلاف وحدة."
      }
    },
    {
      "@type": "Question",
      "name": "كيف يُطبع الشعار على الأكواب — هل سيزول بالغسيل؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يستخدم ويندو للإعلان طباعة التسامي الحراري لأكواب السيراميك والأكواب المطلية بمادة التسامي، مما يدمج التصميم بشكل دائم في الطبقة السطحية. والنتيجة طباعة لا تتقشر أو تُخدش أو تزول في غسالات الأطباق. أكواب الستانلس ستيل تستخدم النقش بالليزر أو الطباعة بالأشعة فوق البنفسجية حسب متطلبات التصميم."
      }
    }
  ]
}
</script>
HTML;
    }
};
