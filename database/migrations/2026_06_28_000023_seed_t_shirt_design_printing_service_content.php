<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 't-shirt-design-printing';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/t-shirt-design-printing.webp',
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
            'title' => 'T-shirt Design and Printing',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'T-shirt Design and Printing in Riyadh | Custom T-shirts Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom T-shirt design and printing in Riyadh. Window Advertising designs and prints branded T-shirts for corporate events, promotions, employee gifts, and team apparel across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 't-shirt printing Riyadh, custom t-shirts Saudi Arabia, branded t-shirts Riyadh, event t-shirts Saudi Arabia, هدايا دعائية الرياض, دعاية واعلان الرياض, تصميم هوية, طباعة تيشيرتات السعودية',
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
            'title' => 'تصميم وطباعة تيشيرت',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تصميم وطباعة تيشيرت في الرياض | تيشيرتات مخصصة السعودية | وينوو للإعلان',
            'meta_description' => 'تصميم وطباعة تيشيرتات مخصصة في الرياض — وينوو للإعلان يصمم ويطبع تيشيرتات مميزة للفعاليات الشركاتية والهدايا الترويجية وزي الفريق. دعاية واعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'طباعة تيشيرتات الرياض, تيشيرتات مخصصة السعودية, هدايا دعائية الرياض, دعاية واعلان الرياض, تصميم هوية, دعاية واعلان السعودية, تيشيرتات فعاليات',
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
        $service = DB::table('services')->where('slug', 't-shirt-design-printing')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A branded T-shirt is one of the most effective and widely used promotional advertising tools in Saudi Arabia. Worn at events, distributed as corporate gifts, used as team <a href="/en/services/uniforms">uniforms</a>, and given to event participants, printed T-shirts carry your company's logo and message in front of an audience that extends well beyond the event or campaign where they were first distributed. Window Advertising designs and prints custom T-shirts for companies across Riyadh and Saudi Arabia — from small promotional runs to large-scale event apparel campaigns.</p>

<h2>Why Branded T-shirts Work as Advertising</h2>
<p>T-shirts are advertising tools that the recipient voluntarily wears — unlike a flyer or a banner, a T-shirt continues to generate brand impressions long after it is given. When a Saudi employee wears a company T-shirt during exercise, travel, or leisure, the logo generates impressions in environments and social circles that no outdoor advertising budget can reach.</p>
<p>For events, branded T-shirts serve multiple advertising functions simultaneously. Event staff wearing branded T-shirts identify the organizing company at every interaction with attendees. Participant T-shirts distributed at the event create a community of brand ambassadors who leave wearing and sharing the brand. Gift T-shirts extend the advertising impact of the event into the recipient's daily life.</p>

<h2>T-shirt Printing Methods</h2>
<p>Window Advertising uses the printing method best suited to each order's quantity, design, and quality requirements:</p>
<p><strong>Screen Printing:</strong> Screen printing applies ink through a mesh stencil onto the garment surface. Each color in the design requires a separate screen. Screen printing produces vivid, durable results that withstand washing and daily wear — it is the standard method for orders of 50 or more units where the per-unit cost benefit of the screen setup is realized.</p>
<p><strong>Heat Transfer Vinyl:</strong> Heat transfer vinyl cuts the design from colored vinyl film and heat-presses it onto the garment. This method is cost-effective for smaller quantities and produces a slightly raised, tactile finish on the garment surface. Ideal for 12 to 50 unit orders with designs of up to 3 colors.</p>
<p><strong>Direct-to-Garment (DTG):</strong> DTG printing applies ink directly to the fabric using a specialized inkjet printer. This allows full-color photographic quality printing with no minimum order. DTG is the right choice for detailed multi-color designs, photographic prints, and sample production before a larger screen-print run.</p>

<h2>Design for T-shirt Printing</h2>
<p>An effective T-shirt design balances visual impact with printability — the design must look as good on fabric as it does on a screen. Window Advertising's design team has extensive experience producing T-shirt graphics that translate correctly from digital file to printed garment.</p>
<p>Common design work for T-shirt campaigns includes logo placement with sizing optimized for the garment, event-specific graphic designs that combine the company brand with the event theme, motivational slogans and Arabic-English typography for team apparel, and photographic or illustrated designs for promotional and lifestyle T-shirts.</p>
<p>Digital mockups showing your design on the selected garment color and style are provided for approval before any printing begins.</p>

<h2>Corporate T-shirts as Promotional Gifts</h2>
<p>T-shirts are among the most popular items included in corporate <a href="/en/services/promotional-gifts">promotional gifts</a> packages in Saudi Arabia. Branded T-shirts in quality cotton or performance fabric communicate that the company invested thought and budget in the gift, rather than selecting the cheapest available promotional item.</p>
<p>Window Advertising coordinates T-shirt production with the wider promotional gift campaign — ensuring the T-shirt design is consistent with the <a href="/en/services/employee-gift-boxes">employee gift boxes</a> packaging, the other items in the set, and the overall brand identity. For National Day and Founding Day gift campaigns, T-shirts with themed designs are a standard element of the complete gift set. <a href="/en/services/scarf-printing">Scarf printing</a> is another popular apparel item frequently paired with T-shirts in premium gift packages.</p>

<h2>Event and Activation T-shirts in Riyadh</h2>
<p>Corporate events, team building days, sports tournaments, brand activations, and public <a href="/en/services/event-festival">event and festival</a> gatherings all use branded T-shirts as the primary team identification and participant gift mechanism. Window Advertising coordinates T-shirt production as part of the wider event advertising package — alongside banners, backdrop systems, directional signage, and all other branded event materials.</p>
<p>For large events requiring hundreds or thousands of T-shirts in multiple sizes, we manage the size breakdown, production, quality control, and delivery to the event venue with a named inventory for distribution management.</p>

<h2>Frequently Asked Questions About T-shirt Printing</h2>

<h3>What printing methods do you use for T-shirts?</h3>
<p>Window Advertising uses screen printing for large quantities of 50 units or more with 1 to 4 colors, heat transfer vinyl for smaller quantities and multi-color designs, and direct-to-garment (DTG) printing for photographic full-color designs and very small quantities. We recommend the best method for each order based on the quantity, design complexity, and fabric type.</p>

<h3>What is the minimum order for printed T-shirts?</h3>
<p>Window Advertising accepts T-shirt orders from a minimum of 12 units for heat transfer and DTG printing. Screen printing has a minimum of 50 units due to the setup cost of the screen. For single-unit or sample production before a larger order, DTG printing is available for single garments.</p>

<h3>Can you design the T-shirt graphic as well as print it?</h3>
<p>Yes. Window Advertising offers full T-shirt design services in addition to printing. Our design team creates graphics from your brief — whether it is a simple logo placement, an event-specific illustration, a motivational slogan, or a full front-and-back printed design. A digital mockup on the garment color of your choice is provided for approval before printing.</p>

<h3>How long does T-shirt printing take?</h3>
<p>Standard T-shirt orders with approved designs are completed in 5 to 10 business days. For event deadlines requiring faster turnaround, express production in 2 to 3 days is available for most quantities. Screen print setups require 5 business days minimum from design approval.</p>

<h2>Order Custom T-shirts in Riyadh</h2>
<p>Tell us the quantity, design brief, fabric preference, and delivery date. Our team provides a design mockup and full pricing within 24 hours. Event deadline production and full Saudi Arabia delivery available.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What printing methods do you use for T-shirts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising uses screen printing for large quantities of 50 units or more with 1 to 4 colors, heat transfer vinyl for smaller quantities and multi-color designs, and direct-to-garment (DTG) printing for photographic full-color designs and very small quantities. We recommend the best method for each order based on the quantity, design complexity, and fabric type."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for printed T-shirts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising accepts T-shirt orders from a minimum of 12 units for heat transfer and DTG printing. Screen printing has a minimum of 50 units due to the setup cost of the screen. For single-unit or sample production before a larger order, DTG printing is available for single garments."
      }
    },
    {
      "@type": "Question",
      "name": "Can you design the T-shirt graphic as well as print it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising offers full T-shirt design services in addition to printing. Our design team creates graphics from your brief — whether it is a simple logo placement, an event-specific illustration, a motivational slogan, or a full front-and-back printed design. A digital mockup on the garment color of your choice is provided for approval before printing."
      }
    },
    {
      "@type": "Question",
      "name": "How long does T-shirt printing take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard T-shirt orders with approved designs are completed in 5 to 10 business days. For event deadlines requiring faster turnaround, express production in 2 to 3 days is available for most quantities. Screen print setups require 5 business days minimum from design approval."
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
<p>التيشيرت المميز بالعلامة التجارية هو واحد من أكثر أدوات الدعاية والإعلان فعالية واستخداماً في السعودية. يُلبس في الفعاليات، ويُوزع كهدايا دعائية شركاتية، ويُستخدم كزي فريق <a href="/ar/services/uniforms">يونيفورم</a>، ويُقدم للمشاركين في الفعاليات — التيشيرتات المطبوعة تحمل شعار شركتك ورسالتها أمام جمهور يمتد إلى أبعد بكثير من الفعالية أو الحملة التي وُزعت فيها لأول مرة. وينوو للإعلان يصمم ويطبع تيشيرتات مخصصة للشركات في جميع أنحاء الرياض والمملكة العربية السعودية — من الكميات الترويجية الصغيرة إلى حملات ملابس الفعاليات الكبيرة.</p>

<h2>لماذا التيشيرتات المميزة تعمل كأداة إعلانية فعّالة؟</h2>
<p>التيشيرتات أدوات إعلانية يرتديها المتلقي طوعاً — على عكس المنشور أو البانر، يستمر التيشيرت في توليد انطباعات للعلامة التجارية لفترة طويلة بعد تقديمه. عندما يرتدي موظف سعودي تيشيرت الشركة أثناء الرياضة أو السفر أو الترفيه، يولّد الشعار انطباعات في بيئات ودوائر اجتماعية لا يمكن لأي ميزانية إعلانات خارجية الوصول إليها.</p>
<p>بالنسبة للفعاليات، تؤدي التيشيرتات المميزة وظائف إعلانية متعددة في آنٍ واحد. طاقم الفعالية الذي يرتدي تيشيرتات مميزة يُعرّف الشركة المنظمة في كل تفاعل مع الحضور. تيشيرتات المشاركين الموزعة في الفعالية تخلق مجتمعاً من سفراء العلامة التجارية الذين يغادرون وهم يرتدون العلامة ويشاركونها. تيشيرتات الهدايا تمد التأثير الإعلاني للفعالية إلى الحياة اليومية للمتلقي.</p>

<h2>طرق طباعة التيشيرت</h2>
<p>تستخدم وينوو للإعلان طريقة الطباعة الأنسب لكمية كل طلب وتصميمه ومتطلبات جودته:</p>
<p><strong>الطباعة بالشاشة الحريرية:</strong> تطبق الحبر عبر قالب شبكي على سطح الملابس. كل لون في التصميم يتطلب شاشة منفصلة. تنتج الطباعة بالشاشة نتائج زاهية ومتينة تتحمل الغسيل والارتداء اليومي — وهي الطريقة القياسية للطلبات من 50 وحدة فأكثر حيث تتحقق فائدة تكلفة الوحدة من إعداد الشاشة.</p>
<p><strong>الفينيل الحراري:</strong> يقطع التصميم من فيلم فينيل ملون ويُكبس حرارياً على الملابس. هذه الطريقة فعالة من حيث التكلفة للكميات الصغيرة وتنتج لمسة نهائية بارزة قليلاً وملموسة على سطح الملابس. مثالية لطلبات من 12 إلى 50 وحدة بتصاميم تصل إلى 3 ألوان.</p>
<p><strong>الطباعة المباشرة على الملابس (DTG):</strong> تطبق الحبر مباشرة على القماش باستخدام طابعة نفث حبر متخصصة. يتيح ذلك طباعة بجودة فوتوغرافية كاملة الألوان بدون حد أدنى للطلب. DTG هو الخيار الصحيح للتصاميم متعددة الألوان المفصلة والطباعة الفوتوغرافية وإنتاج العينات قبل تشغيل طباعة شاشة أكبر.</p>

<h2>التصميم لطباعة التيشيرت</h2>
<p>تصميم التيشيرت الفعال يوازن بين التأثير البصري وقابلية الطباعة — يجب أن يبدو التصميم على القماش بنفس جودة مظهره على الشاشة. فريق التصميم في وينوو للإعلان لديه خبرة واسعة في إنتاج رسومات تيشيرتات تُترجم بشكل صحيح من الملف الرقمي إلى الملابس المطبوعة.</p>
<p>تشمل أعمال التصميم الشائعة لحملات التيشيرت وضع الشعار بحجم محسّن للملابس، وتصاميم رسومية خاصة بالفعاليات تجمع بين علامة الشركة وموضوع الفعالية، وشعارات تحفيزية وطباعة عربية-إنجليزية لملابس الفريق، وتصاميم فوتوغرافية أو مصورة للتيشيرتات الترويجية وتيشيرتات أسلوب الحياة.</p>
<p>يتم تقديم نماذج رقمية تُظهر تصميمك على لون ونمط الملابس المختار للموافقة عليها قبل بدء أي طباعة.</p>

<h2>التيشيرتات الشركاتية كهدايا دعائية</h2>
<p>التيشيرتات من أكثر العناصر شعبية المدرجة في حزم <a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> الشركاتية في السعودية. التيشيرتات المميزة من القطن عالي الجودة أو القماش الرياضي توصل رسالة أن الشركة استثمرت فكراً وميزانية في الهدية، بدلاً من اختيار أرخص عنصر ترويجي متاح.</p>
<p>تنسق وينوو للإعلان إنتاج التيشيرتات مع حملة الهدايا الترويجية الأوسع — لضمان توافق تصميم التيشيرت مع تغليف <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a>، والعناصر الأخرى في المجموعة، والهوية العامة للعلامة التجارية. لحملات هدايا اليوم الوطني ويوم التأسيس، التيشيرتات بتصاميم ذات طابع مناسباتي هي عنصر أساسي في مجموعة الهدايا الكاملة. <a href="/ar/services/scarf-printing">طباعة الأوشحة</a> هي عنصر ملابس شائع آخر يُقرن كثيراً مع التيشيرتات في حزم الهدايا المميزة.</p>

<h2>تيشيرتات الفعاليات والتنشيطات في الرياض</h2>
<p>الفعاليات الشركاتية وأيام بناء الفريق والبطولات الرياضية وتنشيطات العلامة التجارية و<a href="/ar/services/event-festival">المهرجانات والفعاليات</a> العامة جميعها تستخدم التيشيرتات المميزة كآلية أساسية لتعريف الفريق وهدايا المشاركين. تنسق وينوو للإعلان إنتاج التيشيرتات كجزء من حزمة إعلانات الفعالية الأوسع — إلى جانب البانرات وأنظمة الخلفيات واللافتات الإرشادية وجميع مواد الفعالية المؤسسية الأخرى.</p>
<p>للفعاليات الكبيرة التي تتطلب مئات أو آلاف التيشيرتات بأحجام متعددة، ندير توزيع الأحجام والإنتاج ومراقبة الجودة والتسليم إلى مكان الفعالية مع جرد مسمى لإدارة التوزيع.</p>

<h2>الأسئلة الشائعة حول طباعة التيشيرت</h2>

<h3>ما طرق الطباعة التي تستخدمونها للتيشيرتات؟</h3>
<p>تستخدم وينوو للإعلان الطباعة بالشاشة الحريرية للكميات الكبيرة من 50 وحدة فأكثر بـ 1 إلى 4 ألوان، والفينيل الحراري للكميات الأصغر والتصاميم متعددة الألوان، والطباعة المباشرة على الملابس (DTG) للتصاميم الفوتوغرافية كاملة الألوان والكميات الصغيرة جداً. نوصي بأفضل طريقة لكل طلب بناءً على الكمية وتعقيد التصميم ونوع القماش.</p>

<h3>ما الحد الأدنى لطلب التيشيرتات المطبوعة؟</h3>
<p>تقبل وينوو للإعلان طلبات التيشيرتات من حد أدنى 12 وحدة للفينيل الحراري والطباعة المباشرة. الطباعة بالشاشة لها حد أدنى 50 وحدة بسبب تكلفة إعداد الشاشة. لإنتاج وحدة واحدة أو عينة قبل طلب أكبر، الطباعة المباشرة متاحة للقطع الفردية.</p>

<h3>هل يمكنكم تصميم رسومات التيشيرت بالإضافة إلى طباعتها؟</h3>
<p>نعم. تقدم وينوو للإعلان خدمات تصميم تيشيرت كاملة بالإضافة إلى الطباعة. فريق التصميم لدينا يبتكر رسومات من ملخصك — سواء كان وضع شعار بسيط أو رسم توضيحي خاص بفعالية أو شعار تحفيزي أو تصميم مطبوع كامل للأمام والخلف. يتم تقديم نموذج رقمي على لون الملابس الذي تختاره للموافقة عليه قبل الطباعة.</p>

<h3>كم يستغرق طباعة التيشيرتات؟</h3>
<p>تُنجز طلبات التيشيرتات القياسية بتصاميم معتمدة في 5 إلى 10 أيام عمل. للمواعيد النهائية للفعاليات التي تتطلب سرعة أكبر، الإنتاج السريع في 2 إلى 3 أيام متاح لمعظم الكميات. إعدادات الطباعة بالشاشة تتطلب 5 أيام عمل كحد أدنى من اعتماد التصميم.</p>

<h2>اطلب تيشيرتاتك المخصصة في الرياض</h2>
<p>أخبرنا بالكمية وملخص التصميم وتفضيل القماش وتاريخ التسليم. فريقنا يقدم نموذج تصميم وتسعير كامل خلال 24 ساعة. إنتاج بمواعيد الفعاليات وتوصيل لجميع أنحاء المملكة العربية السعودية متاح.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما طرق الطباعة التي تستخدمونها للتيشيرتات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تستخدم وينوو للإعلان الطباعة بالشاشة الحريرية للكميات الكبيرة من 50 وحدة فأكثر بـ 1 إلى 4 ألوان، والفينيل الحراري للكميات الأصغر والتصاميم متعددة الألوان، والطباعة المباشرة على الملابس (DTG) للتصاميم الفوتوغرافية كاملة الألوان والكميات الصغيرة جداً. نوصي بأفضل طريقة لكل طلب بناءً على الكمية وتعقيد التصميم ونوع القماش."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لطلب التيشيرتات المطبوعة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تقبل وينوو للإعلان طلبات التيشيرتات من حد أدنى 12 وحدة للفينيل الحراري والطباعة المباشرة. الطباعة بالشاشة لها حد أدنى 50 وحدة بسبب تكلفة إعداد الشاشة. لإنتاج وحدة واحدة أو عينة قبل طلب أكبر، الطباعة المباشرة متاحة للقطع الفردية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم تصميم رسومات التيشيرت بالإضافة إلى طباعتها؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تقدم وينوو للإعلان خدمات تصميم تيشيرت كاملة بالإضافة إلى الطباعة. فريق التصميم لدينا يبتكر رسومات من ملخصك — سواء كان وضع شعار بسيط أو رسم توضيحي خاص بفعالية أو شعار تحفيزي أو تصميم مطبوع كامل للأمام والخلف. يتم تقديم نموذج رقمي على لون الملابس الذي تختاره للموافقة عليه قبل الطباعة."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق طباعة التيشيرتات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُنجز طلبات التيشيرتات القياسية بتصاميم معتمدة في 5 إلى 10 أيام عمل. للمواعيد النهائية للفعاليات التي تتطلب سرعة أكبر، الإنتاج السريع في 2 إلى 3 أيام متاح لمعظم الكميات. إعدادات الطباعة بالشاشة تتطلب 5 أيام عمل كحد أدنى من اعتماد التصميم."
      }
    }
  ]
}
</script>
HTML;
    }
};
