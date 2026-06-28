<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'employee-gift-boxes';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/employee-gift-boxes.webp',
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
            'title' => 'Employee Gift Boxes',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Employee Gift Boxes in Riyadh | Corporate Gifts Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom employee gift boxes and corporate gift sets in Riyadh. Window Advertising designs and supplies branded employee gifts for National Day, Ramadan, Founding Day, and corporate milestones across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'employee gift boxes Riyadh, corporate gift sets Saudi Arabia, branded employee gifts Riyadh, National Day gift boxes, هدايا دعائية الرياض, دعاية وإعلان الرياض',
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
            'title' => 'بوكس هدايا الموظفين',
            'content' => $this->getArabicContent(),
            'meta_title' => 'بوكس هدايا للموظفين في الرياض | هدايا شركاتية السعودية | وينوو للإعلان',
            'meta_description' => 'بوكس هدايا مخصصة للموظفين وهدايا شركاتية في الرياض — وينوو للإعلان يصمم ويوفر هدايا دعائية للموظفين في اليوم الوطني ورمضان ويوم التأسيس والمناسبات الشركاتية. احصل على عرض سعر.',
            'meta_keywords' => 'بوكس هدايا موظفين الرياض, هدايا شركاتية السعودية, هدايا دعائية للموظفين, هدايا يوم وطني الرياض, دعاية وإعلان الرياض, هدايا رمضان شركات',
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
        $service = DB::table('services')->where('slug', 'employee-gift-boxes')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Recognizing your employees through thoughtful, branded gifts communicates that your company values its people. Window Advertising designs and assembles custom employee gift boxes for companies across Riyadh and Saudi Arabia — curated for every occasion, customized with your brand, and delivered on time. Whether it's <a href="/en/services/promotional-gifts">promotional gifts</a> for a campaign or a full gifting program, we handle everything from sourcing to delivery.</p>

<h2>What Are Employee Gift Boxes?</h2>
<p>Employee gift boxes are curated, branded gift sets assembled in custom packaging and distributed to staff for specific occasions or as general recognition. Unlike a single promotional gift, a gift box creates a more complete gifting experience — the unboxing moment itself becomes part of the message.</p>
<p>In the Saudi corporate environment, employee gift boxes have become a standard expression of organizational culture. Companies in Riyadh use them to celebrate national occasions, reward performance, welcome new employees, and mark significant corporate milestones. Window Advertising handles the design, sourcing, assembly, and delivery of every element in the box.</p>

<h2>Occasions for Employee Gift Boxes in Saudi Arabia</h2>
<p>Every Saudi calendar occasion presents an opportunity to strengthen employee morale through a well-timed, branded gift:</p>
<p><strong>Saudi National Day (September 23):</strong> The most popular occasion for employee gift boxes in the Kingdom. We offer patriotic-themed packaging, green and white color schemes, and Saudi-themed contents including dates, traditional items, and branded merchandise. Our <a href="/en/services/national-day-celebrations">national day celebrations</a> service covers full event and gifting coordination.</p>
<p><strong>Founding Day (February 22):</strong> A growing occasion in the corporate gifting calendar. Window Advertising supplies Founding Day branded gift boxes with themed packaging and culturally relevant content. Explore our <a href="/en/services/founding-day-celebrations">founding day celebrations</a> for complete event packages.</p>
<p><strong>Ramadan and Eid:</strong> Premium gift boxes containing dates, traditional sweets, branded drinkware, and luxury packaging. These are often distributed to employees and VIP clients simultaneously.</p>
<p><strong>Employee Recognition and Milestones:</strong> Year-end gifts, new hire welcome kits, long-service awards, and performance recognition boxes — all designed to make the recipient feel genuinely valued. Pair them with <a href="/en/services/honor-shields">honor shields</a> for a lasting impression.</p>

<h2>What Goes Inside a Gift Box</h2>
<p>Window Advertising sources and assembles every item in the gift box. Common inclusions, selected based on occasion and budget:</p>
<p>Stationery items including branded notebooks, pens, and planners are a staple in corporate gift boxes and ensure daily brand visibility. Technology items such as USB drives, power banks, and wireless earphones add premium value to a gift set. Food items including premium dates, chocolates, and local sweets make gift boxes feel generous and culturally appropriate in the Saudi context. Branded apparel such as caps, scarves, and lanyards extend brand reach beyond the occasion itself. Branded drinkware including items from our <a href="/en/services/cup-printing">cup printing</a> service adds a practical, daily-use element to any gift box. The outer packaging — a rigid branded box, magnetic closure, printed tissue, and ribbon — transforms the entire set into a gift that is presented, not just delivered.</p>

<h2>Fully Branded Packaging</h2>
<p>The box itself is part of the gift. Window Advertising produces custom gift box packaging with your brand's logo, color palette, and messaging. Options include rigid printed gift boxes with magnetic closures, foldable kraft paper boxes with ribbon ties, slide-drawer boxes for a premium unboxing experience, and custom printed tissue paper and branded stickers for interior finishing.</p>
<p>Every packaging option is designed with the Saudi market in mind — appropriate for formal corporate distribution and visually impactful enough to be photographed and shared on social media.</p>

<h2>Bulk Orders and Delivery Across Saudi Arabia</h2>
<p>Window Advertising manages employee gift box orders for teams of any size. Whether you need 100 boxes for a single Riyadh office or 5,000 boxes distributed across multiple branches in Saudi Arabia, our logistics team coordinates production and delivery to your timeline.</p>
<p>We consolidate the sourcing, assembly, quality checking, and dispatch of every box under one order. You deal with one point of contact and receive one invoice — eliminating the coordination overhead of managing multiple suppliers for a large employee gift campaign.</p>

<h2>Employee Gift Boxes Portfolio — Riyadh</h2>
<p>Browse our portfolio of employee and corporate gift boxes produced for companies across Riyadh. Our gallery showcases National Day boxes, Ramadan gift sets, premium corporate boxes, and occasion-specific collections — each one an example of how branding and generosity combine.</p>

<h2>Frequently Asked Questions About Employee Gift Boxes</h2>

<h3>What goes inside an employee gift box from Window Advertising?</h3>
<p>Employee gift boxes are fully customizable. Common contents include branded notebooks, pens, USB drives, power banks, mugs, chocolates, dates, scarves, caps, lanyards, and custom-branded packaging tissue. Window Advertising curates the contents based on your occasion, budget, and brand identity.</p>

<h3>Can the gift box packaging be branded with our logo?</h3>
<p>Yes. The outer box, tissue paper, ribbon, and any inserts can all be custom-printed with your company logo and brand colors. We offer rigid gift boxes, foldable magnetic boxes, and kraft-style boxes — all available with full branding.</p>

<h3>How many gift boxes can Window Advertising produce?</h3>
<p>Window Advertising handles employee gift box orders from 50 units up to several thousand units. We have supplied gift boxes for companies with small teams as well as large corporations distributing gifts to thousands of employees across multiple locations in Saudi Arabia.</p>

<h3>Which occasions are employee gift boxes commonly ordered for?</h3>
<p>The most popular occasions for employee gift boxes in Saudi Arabia are National Day (September 23), Founding Day (February 22), Ramadan, Eid, end-of-year appreciation, employee of the month recognition, and company anniversary milestones. Window Advertising has ready themes for every occasion.</p>

<h2>Order Employee Gift Boxes in Riyadh</h2>
<p>Share your occasion, quantity, budget per box, and any existing brand files. Our gifting team responds within 24 hours with a curated selection of box contents and packaging options. We handle everything from there — sourcing, assembly, branding, and delivery.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What goes inside an employee gift box from Window Advertising?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Employee gift boxes are fully customizable. Common contents include branded notebooks, pens, USB drives, power banks, mugs, chocolates, dates, scarves, caps, lanyards, and custom-branded packaging tissue. Window Advertising curates the contents based on your occasion, budget, and brand identity."
      }
    },
    {
      "@type": "Question",
      "name": "Can the gift box packaging be branded with our logo?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The outer box, tissue paper, ribbon, and any inserts can all be custom-printed with your company logo and brand colors. We offer rigid gift boxes, foldable magnetic boxes, and kraft-style boxes — all available with full branding."
      }
    },
    {
      "@type": "Question",
      "name": "How many gift boxes can Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising handles employee gift box orders from 50 units up to several thousand units. We have supplied gift boxes for companies with small teams as well as large corporations distributing gifts to thousands of employees across multiple locations in Saudi Arabia."
      }
    },
    {
      "@type": "Question",
      "name": "Which occasions are employee gift boxes commonly ordered for?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The most popular occasions for employee gift boxes in Saudi Arabia are National Day (September 23), Founding Day (February 22), Ramadan, Eid, end-of-year appreciation, employee of the month recognition, and company anniversary milestones. Window Advertising has ready themes for every occasion."
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
<p>تقدير موظفيك من خلال هدايا مدروسة تحمل علامتك التجارية يعكس اهتمام شركتك بأفرادها. وينوو للإعلان يصمم ويجمّع بوكسات هدايا مخصصة للموظفين للشركات في جميع أنحاء الرياض والمملكة العربية السعودية — مختارة بعناية لكل مناسبة، ومخصصة بعلامتك التجارية، ومسلّمة في الوقت المحدد. سواء كانت <a href="/ar/services/promotional-gifts">هدايا دعائية</a> لحملة ترويجية أو برنامج إهداء متكامل، نتولى كل شيء من التوريد إلى التسليم.</p>

<h2>ما هو بوكس هدايا الموظفين؟</h2>
<p>بوكس هدايا الموظفين هو مجموعة هدايا منسقة تحمل العلامة التجارية، يتم تجميعها في تغليف مخصص وتوزيعها على الموظفين في مناسبات محددة أو كتقدير عام. على عكس الهدية الترويجية المفردة، يخلق بوكس الهدايا تجربة إهداء أكثر اكتمالاً — لحظة فتح العلبة نفسها تصبح جزءاً من الرسالة.</p>
<p>في بيئة الشركات السعودية، أصبح بوكس هدايا الموظفين تعبيراً معيارياً عن الثقافة المؤسسية. تستخدمه الشركات في الرياض للاحتفال بالمناسبات الوطنية، ومكافأة الأداء، والترحيب بالموظفين الجدد، وتخليد المعالم المؤسسية المهمة. يتولى وينوو للإعلان التصميم والتوريد والتجميع والتسليم لكل عنصر في البوكس.</p>

<h2>مناسبات بوكس هدايا الموظفين في السعودية</h2>
<p>كل مناسبة في التقويم السعودي تمثل فرصة لتعزيز معنويات الموظفين من خلال هدية مؤسسية في الوقت المناسب:</p>
<p><strong>اليوم الوطني السعودي (23 سبتمبر):</strong> المناسبة الأكثر شعبية لبوكسات هدايا الموظفين في المملكة. نقدم تغليفاً بطابع وطني، وألوان خضراء وبيضاء، ومحتويات سعودية تشمل التمور والعناصر التقليدية والمنتجات المؤسسية. خدمة <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> لدينا تغطي التنسيق الكامل للفعاليات والهدايا.</p>
<p><strong>يوم التأسيس (22 فبراير):</strong> مناسبة متنامية في تقويم الهدايا المؤسسية. يوفر وينوو للإعلان بوكسات هدايا بعلامة يوم التأسيس مع تغليف مواضيعي ومحتوى ثقافي مناسب. اكتشف خدمة <a href="/ar/services/founding-day-celebrations">احتفالات يوم التأسيس</a> للباقات الكاملة.</p>
<p><strong>رمضان والعيد:</strong> بوكسات هدايا فاخرة تحتوي على تمور وحلويات تقليدية وأدوات شرب مؤسسية وتغليف فاخر. غالباً ما يتم توزيعها على الموظفين وعملاء VIP في وقت واحد.</p>
<p><strong>تقدير الموظفين والمعالم:</strong> هدايا نهاية العام، وحقائب ترحيب الموظفين الجدد، وجوائز الخدمة الطويلة، وبوكسات تقدير الأداء — كلها مصممة لتشعر المتلقي بالتقدير الحقيقي. قم بإقرانها مع <a href="/ar/services/honor-shields">دروع التكريم</a> لانطباع دائم.</p>

<h2>ماذا يوجد داخل بوكس الهدايا؟</h2>
<p>يتولى وينوو للإعلان توريد وتجميع كل عنصر في بوكس الهدايا. المحتويات الشائعة، المختارة حسب المناسبة والميزانية:</p>
<p>القرطاسية بما في ذلك الدفاتر والأقلام والمخططات المؤسسية هي عنصر أساسي في بوكسات الهدايا وتضمن ظهور العلامة التجارية يومياً. المنتجات التقنية مثل وحدات USB وبنوك الطاقة والسماعات اللاسلكية تضيف قيمة متميزة لمجموعة الهدايا. المواد الغذائية بما في ذلك التمور الفاخرة والشوكولاتة والحلويات المحلية تجعل بوكسات الهدايا سخية وملائمة ثقافياً في السياق السعودي. الملابس المؤسسية مثل القبعات والأوشحة والحبال تمد نطاق العلامة التجارية إلى ما بعد المناسبة. أدوات الشرب المؤسسية من خدمة <a href="/ar/services/cup-printing">طباعة الأكواب</a> تضيف عنصراً عملياً للاستخدام اليومي. التغليف الخارجي — علبة مؤسسية صلبة، إغلاق مغناطيسي، مناديل مطبوعة، وشريط — يحوّل المجموعة بأكملها إلى هدية تُقدَّم، لا تُسلَّم فحسب.</p>

<h2>تغليف مميز يحمل علامتك التجارية</h2>
<p>العلبة نفسها جزء من الهدية. ينتج وينوو للإعلان تغليف بوكسات هدايا مخصص بشعار علامتك التجارية ولوحة ألوانك ورسائلك. تشمل الخيارات علب هدايا صلبة مطبوعة بإغلاق مغناطيسي، وعلب ورق كرافت قابلة للطي بربطات شريط، وعلب بدرج منزلق لتجربة فتح فاخرة، ومناديل مطبوعة مخصصة وملصقات مؤسسية للتشطيب الداخلي.</p>
<p>كل خيار تغليف مصمم مع مراعاة السوق السعودي — مناسب للتوزيع المؤسسي الرسمي ومؤثر بصرياً بما يكفي ليتم تصويره ومشاركته على وسائل التواصل الاجتماعي.</p>

<h2>الطلبات بالجملة والتوصيل في السعودية</h2>
<p>يدير وينوو للإعلان طلبات بوكسات هدايا الموظفين لفرق بأي حجم. سواء كنت بحاجة إلى 100 بوكس لمكتب واحد في الرياض أو 5,000 بوكس موزعة على فروع متعددة في المملكة العربية السعودية، ينسق فريقنا اللوجستي الإنتاج والتسليم وفق جدولك الزمني.</p>
<p>نجمع التوريد والتجميع وفحص الجودة والإرسال لكل بوكس تحت طلب واحد. تتعامل مع نقطة اتصال واحدة وتستلم فاتورة واحدة — مما يلغي عبء التنسيق بين موردين متعددين لحملة هدايا موظفين كبيرة.</p>

<h2>أعمالنا في بوكس هدايا الموظفين بالرياض</h2>
<p>تصفح معرض أعمالنا من بوكسات هدايا الموظفين والهدايا الشركاتية المنتجة لشركات في الرياض. يعرض معرضنا بوكسات اليوم الوطني ومجموعات هدايا رمضان والبوكسات الشركاتية الفاخرة والمجموعات الخاصة بالمناسبات — كل واحدة منها مثال على كيفية الجمع بين العلامة التجارية والكرم.</p>

<h2>الأسئلة الشائعة حول بوكس هدايا الموظفين</h2>

<h3>ما الذي يوجد داخل بوكس هدايا الموظفين من وينوو للإعلان؟</h3>
<p>بوكسات هدايا الموظفين قابلة للتخصيص بالكامل. تشمل المحتويات الشائعة الدفاتر والأقلام ووحدات USB وبنوك الطاقة والأكواب والشوكولاتة والتمور والأوشحة والقبعات والحبال ومناديل التغليف المؤسسية. يختار وينوو للإعلان المحتويات بناءً على مناسبتك وميزانيتك وهوية علامتك التجارية.</p>

<h3>هل يمكن وضع شعارنا على تغليف بوكس الهدايا؟</h3>
<p>نعم. يمكن طباعة شعار شركتك وألوان علامتك التجارية على العلبة الخارجية ومناديل التغليف والشريط وأي مدخلات. نقدم علب هدايا صلبة وعلب مغناطيسية قابلة للطي وعلب بنمط كرافت — جميعها متاحة مع علامة تجارية كاملة.</p>

<h3>كم عدد بوكسات الهدايا التي يمكن لوينوو للإعلان إنتاجها؟</h3>
<p>يتولى وينوو للإعلان طلبات بوكسات هدايا الموظفين من 50 وحدة إلى عدة آلاف. قمنا بتوريد بوكسات هدايا لشركات ذات فرق صغيرة وكذلك شركات كبرى توزع هدايا على آلاف الموظفين في مواقع متعددة في المملكة العربية السعودية.</p>

<h3>ما هي المناسبات التي يُطلب فيها بوكس هدايا الموظفين عادةً؟</h3>
<p>أكثر المناسبات شعبية لبوكسات هدايا الموظفين في السعودية هي اليوم الوطني (23 سبتمبر)، ويوم التأسيس (22 فبراير)، ورمضان، والعيد، وتقدير نهاية العام، وتكريم موظف الشهر، ومعالم ذكرى تأسيس الشركة. لدى وينوو للإعلان قوالب جاهزة لكل مناسبة.</p>

<h2>اطلب بوكس هدايا موظفيك في الرياض</h2>
<p>شاركنا مناسبتك والكمية والميزانية لكل بوكس وأي ملفات علامة تجارية موجودة. يرد فريق الهدايا لدينا خلال 24 ساعة بتشكيلة منسقة من محتويات البوكس وخيارات التغليف. نتولى كل شيء من هناك — التوريد والتجميع والعلامة التجارية والتسليم.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما الذي يوجد داخل بوكس هدايا الموظفين من وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "بوكسات هدايا الموظفين قابلة للتخصيص بالكامل. تشمل المحتويات الشائعة الدفاتر والأقلام ووحدات USB وبنوك الطاقة والأكواب والشوكولاتة والتمور والأوشحة والقبعات والحبال ومناديل التغليف المؤسسية. يختار وينوو للإعلان المحتويات بناءً على مناسبتك وميزانيتك وهوية علامتك التجارية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن وضع شعارنا على تغليف بوكس الهدايا؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. يمكن طباعة شعار شركتك وألوان علامتك التجارية على العلبة الخارجية ومناديل التغليف والشريط وأي مدخلات. نقدم علب هدايا صلبة وعلب مغناطيسية قابلة للطي وعلب بنمط كرافت — جميعها متاحة مع علامة تجارية كاملة."
      }
    },
    {
      "@type": "Question",
      "name": "كم عدد بوكسات الهدايا التي يمكن لوينوو للإعلان إنتاجها؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يتولى وينوو للإعلان طلبات بوكسات هدايا الموظفين من 50 وحدة إلى عدة آلاف. قمنا بتوريد بوكسات هدايا لشركات ذات فرق صغيرة وكذلك شركات كبرى توزع هدايا على آلاف الموظفين في مواقع متعددة في المملكة العربية السعودية."
      }
    },
    {
      "@type": "Question",
      "name": "ما هي المناسبات التي يُطلب فيها بوكس هدايا الموظفين عادةً؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "أكثر المناسبات شعبية لبوكسات هدايا الموظفين في السعودية هي اليوم الوطني (23 سبتمبر)، ويوم التأسيس (22 فبراير)، ورمضان، والعيد، وتقدير نهاية العام، وتكريم موظف الشهر، ومعالم ذكرى تأسيس الشركة. لدى وينوو للإعلان قوالب جاهزة لكل مناسبة."
      }
    }
  ]
}
</script>
HTML;
    }
};
