<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'uniforms';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/uniforms.webp',
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
            'title' => 'Uniforms',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Uniforms & Corporate Workwear in Riyadh | Window Advertising',
            'meta_description' => 'Custom uniforms and branded corporate workwear in Riyadh. Window Advertising designs and supplies embroidered uniforms, branded shirts, and staff apparel for companies across Saudi Arabia. Part of a full advertising and branding solution. Get a free quote.',
            'meta_keywords' => 'uniforms Riyadh, corporate workwear Saudi Arabia, branded uniforms Riyadh, embroidered staff uniforms, يونيفورم الرياض, دعاية واعلان الرياض, هدايا دعائية, تصميم هوية, زي موحد السعودية',
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
            'title' => 'يونيفورم',
            'content' => $this->getArabicContent(),
            'meta_title' => 'يونيفورم وزي موحد في الرياض | وينوو للإعلان',
            'meta_description' => 'تصميم وتوريد يونيفورم وزي موحد مخصص للشركات في الرياض — وينوو للإعلان يوفر حلول دعاية واعلان متكاملة تشمل تصميم هوية الموظفين والزي الموحد للشركات السعودية. احصل على عرض سعر.',
            'meta_keywords' => 'يونيفورم الرياض, زي موحد السعودية, دعاية واعلان الرياض, تصميم هوية الموظفين, هدايا دعائية, دعاية واعلان السعودية, ملابس شركات الرياض',
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
        $service = DB::table('services')->where('slug', 'uniforms')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A consistent, professionally branded uniform is one of the most visible expressions of your company identity. Window Advertising designs and supplies corporate uniforms for businesses across Riyadh and Saudi Arabia — as part of a complete advertising and brand identity solution that extends from your print materials and signage to your staff's daily appearance.</p>

<h2>Why Uniforms Are Part of Your Brand Identity</h2>
<p>Corporate advertising and brand identity extend beyond logos and printed materials. Every member of your team who interacts with a client or appears in public is a walking representation of your company's standards. A well-designed, consistently applied uniform communicates professionalism, builds trust, and strengthens brand recognition in a way that no single advertisement can replicate over time.</p>
<p>In Saudi Arabia's competitive business environment, companies across retail, hospitality, healthcare, logistics, and corporate sectors invest in high-quality staff uniforms as a foundational advertising element. Window Advertising integrates uniform design into the broader <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> work we deliver — ensuring your team looks as professional as your signage, prints, and promotional materials.</p>

<h2>Types of Uniforms We Supply</h2>
<p>Window Advertising supplies branded uniforms across every corporate and industrial category:</p>
<p>Corporate shirts and polo shirts for office teams, front-of-house staff, and sales teams are our highest-volume uniform product. Available in a full range of colors, fabrics, and collar styles, with embroidered logos as standard.</p>
<p>Event and promotional staff uniforms are produced for company events, trade shows, exhibitions, and outdoor activations. These are often produced as part of a wider advertising campaign package, coordinated with promotional stands, backdrops, and branded gifts. We also offer full <a href="/en/services/t-shirt-design-printing">t-shirt design and printing</a> services for event apparel.</p>
<p>Hospitality uniforms for restaurant, hotel, and catering teams prioritize both professionalism and practicality. We supply chef jackets, front-of-house server uniforms, and management attire tailored to the hospitality environment.</p>
<p>Safety and security uniforms for industrial, construction, and facility management teams are produced to applicable safety standards, with high-visibility options available.</p>
<p>Medical and healthcare uniforms including scrubs, lab coats, and clinical tunics for clinics, hospitals, and healthcare facilities operating across Saudi Arabia.</p>

<h2>Logo Application Methods</h2>
<p>The technique used to apply your logo to a uniform determines how it looks and how long it lasts through washing and daily wear. Window Advertising uses three primary methods:</p>
<p><strong>Embroidery</strong> stitches your logo directly into the fabric using thread. It produces a premium, textured finish that withstands thousands of washes without fading or peeling. It is the preferred method for polo shirts, formal shirts, caps, and jackets.</p>
<p><strong>Screen printing</strong> applies ink through a stencil onto the fabric surface. Best suited to flat surfaces on T-shirts and casual apparel where a larger, more colorful logo or graphic is required.</p>
<p><strong>Heat transfer printing</strong> applies a pre-printed vinyl graphic using heat and pressure. Used for complex multi-color designs, photographic prints, and applications where embroidery is not practical.</p>

<h2>Uniforms as Advertising and Promotional Gifts</h2>
<p>Branded uniforms double as advertising tools when they are worn in public. A delivery driver in a branded shirt, a technician at a client site, or a hospitality worker in a logoed apron each creates a brand impression in the environment where they work.</p>
<p>For events and corporate occasions, branded T-shirts and polo shirts are also distributed as <a href="/en/services/promotional-gifts">promotional gifts</a> and team appreciation items. Window Advertising coordinates uniform production alongside our broader promotional gift and advertising campaigns — including <a href="/en/services/scarf-printing">scarf printing</a> and <a href="/en/services/employee-gift-boxes">employee gift boxes</a> — for companies that want a unified look across every branded touchpoint.</p>

<h2>Size and Fit Options for Saudi Corporate Clients</h2>
<p>Window Advertising supplies uniforms in a full range of sizes to accommodate diverse Saudi workforces. We offer standard international sizing as well as custom tailoring for senior management and VIP event staff where a precisely fitted appearance is required.</p>
<p>For large organizations, we manage the sizing collection process and produce a size breakdown report before production begins. This eliminates common problems with mismatched quantities and ensures every team member receives the correct fit on delivery.</p>

<h2>Uniforms Portfolio — Riyadh</h2>
<p>Our uniform portfolio spans hospitality groups, corporate teams, event staff, retail chains, and healthcare providers across Riyadh. Browse the gallery to see the range of branded workwear produced and delivered by Window Advertising.</p>

<h2>Frequently Asked Questions About Corporate Uniforms</h2>

<h3>What types of uniforms does Window Advertising supply in Riyadh?</h3>
<p>Window Advertising supplies a full range of corporate and staff uniforms including polo shirts, button-down shirts, T-shirts, safety vests, hospitality uniforms, chef jackets, medical scrubs, security uniforms, and event staff apparel. All garments are available with embroidery, screen printing, or heat transfer branding.</p>

<h3>Can you add our company logo to the uniforms?</h3>
<p>Yes. Every uniform supplied by Window Advertising is branded with your company logo using the most appropriate technique for the fabric and garment type. Embroidery is the preferred finish for polo shirts and formal shirts. Screen printing is standard for T-shirts and event apparel. Heat transfer is used for complex multi-color designs.</p>

<h3>What is the minimum order for corporate uniforms?</h3>
<p>Minimum order quantities vary by garment type, typically starting from 12 to 50 units per style. Window Advertising handles small team uniform orders as well as large corporate rollouts requiring hundreds or thousands of garments across multiple Saudi cities.</p>

<h3>How long does it take to produce and deliver custom uniforms?</h3>
<p>Standard uniform orders with approved designs are produced and delivered within 10 to 20 business days depending on quantity and garment type. Rush production is available for event or opening deadlines. We confirm delivery timelines at the time of order.</p>

<h2>Request a Corporate Uniform Quote</h2>
<p>Tell us the garment types needed, your team size, logo files, and any color preferences. Our team will provide fabric samples and a detailed quote within 48 hours. Full design, production, and delivery coordination included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of uniforms does Window Advertising supply in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising supplies a full range of corporate and staff uniforms including polo shirts, button-down shirts, T-shirts, safety vests, hospitality uniforms, chef jackets, medical scrubs, security uniforms, and event staff apparel. All garments are available with embroidery, screen printing, or heat transfer branding."
      }
    },
    {
      "@type": "Question",
      "name": "Can you add our company logo to the uniforms?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Every uniform supplied by Window Advertising is branded with your company logo using the most appropriate technique for the fabric and garment type. Embroidery is the preferred finish for polo shirts and formal shirts. Screen printing is standard for T-shirts and event apparel. Heat transfer is used for complex multi-color designs."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for corporate uniforms?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum order quantities vary by garment type, typically starting from 12 to 50 units per style. Window Advertising handles small team uniform orders as well as large corporate rollouts requiring hundreds or thousands of garments across multiple Saudi cities."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to produce and deliver custom uniforms?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard uniform orders with approved designs are produced and delivered within 10 to 20 business days depending on quantity and garment type. Rush production is available for event or opening deadlines. We confirm delivery timelines at the time of order."
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
<p>الزي الموحد الاحترافي هو أحد أبرز التعبيرات المرئية عن هوية شركتك. تقوم وينوو للإعلان بتصميم وتوريد يونيفورم مخصص للشركات في جميع أنحاء الرياض والمملكة العربية السعودية — كجزء من حل متكامل للدعاية والإعلان وتصميم الهوية يمتد من المطبوعات واللافتات إلى المظهر اليومي لموظفيك.</p>

<h2>لماذا الزي الموحد جزء من هويتك التجارية؟</h2>
<p>تمتد الدعاية والإعلان والهوية التجارية إلى ما هو أبعد من الشعارات والمطبوعات. كل فرد في فريقك يتعامل مع عميل أو يظهر في الأماكن العامة هو تمثيل حي لمعايير شركتك. الزي الموحد المصمم بعناية والمطبق بشكل متسق يعكس الاحترافية ويبني الثقة ويعزز التعرف على العلامة التجارية بطريقة لا يمكن لأي إعلان منفرد تكرارها بمرور الوقت.</p>
<p>في بيئة الأعمال التنافسية في المملكة العربية السعودية، تستثمر الشركات في قطاعات التجزئة والضيافة والرعاية الصحية واللوجستيات والقطاع المؤسسي في زي موحد عالي الجودة كعنصر أساسي من عناصر الدعاية والإعلان. تدمج وينوو للإعلان تصميم الزي الموحد ضمن أعمال <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية للشركات</a> الشاملة التي نقدمها — لضمان أن يبدو فريقك بنفس احترافية لافتاتك ومطبوعاتك وموادك الترويجية.</p>

<h2>أنواع الزي الموحد الذي نوفره</h2>
<p>توفر وينوو للإعلان زي موحد يحمل العلامة التجارية عبر جميع الفئات المؤسسية والصناعية:</p>
<p>القمصان المؤسسية وقمصان البولو لفرق المكاتب وموظفي الاستقبال وفرق المبيعات هي المنتج الأكثر طلباً لدينا. متوفرة بمجموعة كاملة من الألوان والأقمشة وأنماط الياقات، مع شعارات مطرزة كمعيار أساسي.</p>
<p>يونيفورم الفعاليات والموظفين الترويجيين يُنتج لفعاليات الشركات والمعارض التجارية والمعارض والفعاليات الخارجية. غالباً ما يُنتج كجزء من حملة دعاية وإعلان أوسع، بالتنسيق مع الستاندات الترويجية والخلفيات والهدايا الدعائية. كما نقدم خدمات <a href="/ar/services/t-shirt-design-printing">تصميم وطباعة التيشيرتات</a> الكاملة لملابس الفعاليات.</p>
<p>يونيفورم الضيافة لفرق المطاعم والفنادق والتموين يركز على الاحترافية والعملية معاً. نوفر سترات الطهاة ويونيفورم النادلين وملابس الإدارة المصممة لبيئة الضيافة.</p>
<p>يونيفورم السلامة والأمن للفرق الصناعية والإنشائية وإدارة المرافق يُنتج وفقاً لمعايير السلامة المعمول بها، مع خيارات عالية الوضوح.</p>
<p>يونيفورم الرعاية الصحية والطبية بما في ذلك الأزياء الطبية ومعاطف المختبر والسترات السريرية للعيادات والمستشفيات ومرافق الرعاية الصحية العاملة في المملكة العربية السعودية.</p>

<h2>طرق تطبيق الشعار على الزي</h2>
<p>تحدد التقنية المستخدمة لتطبيق شعارك على الزي الموحد مظهره ومدة بقائه عبر الغسيل والارتداء اليومي. تستخدم وينوو للإعلان ثلاث طرق رئيسية:</p>
<p><strong>التطريز</strong> يخيط شعارك مباشرة في القماش باستخدام الخيوط. ينتج لمسة نهائية فاخرة وملموسة تتحمل آلاف الغسلات دون بهتان أو تقشر. وهو الأسلوب المفضل لقمصان البولو والقمصان الرسمية والقبعات والسترات.</p>
<p><strong>الطباعة بالشاشة الحريرية</strong> تطبق الحبر من خلال قالب على سطح القماش. الأنسب للأسطح المستوية على التيشيرتات والملابس غير الرسمية حيث يُطلب شعار أو رسم أكبر وأكثر ألواناً.</p>
<p><strong>الطباعة بالنقل الحراري</strong> تطبق رسماً فينيلياً مطبوعاً مسبقاً باستخدام الحرارة والضغط. تُستخدم للتصميمات المعقدة متعددة الألوان والطبعات الفوتوغرافية والتطبيقات التي لا يكون فيها التطريز عملياً.</p>

<h2>الزي الموحد كأداة دعاية وهدية ترويجية</h2>
<p>الزي الموحد الذي يحمل العلامة التجارية يعمل كأداة دعاية عندما يُرتدى في الأماكن العامة. سائق التوصيل بقميص يحمل الشعار، أو الفني في موقع العميل، أو عامل الضيافة بمريلة تحمل الشعار — كل منهم يخلق انطباعاً عن العلامة التجارية في البيئة التي يعمل فيها.</p>
<p>للفعاليات والمناسبات المؤسسية، توزع التيشيرتات وقمصان البولو التي تحمل العلامة التجارية أيضاً كـ<a href="/ar/services/promotional-gifts">هدايا دعائية</a> وعناصر تقدير للفريق. تنسق وينوو للإعلان إنتاج الزي الموحد إلى جانب حملات الهدايا الترويجية والدعاية والإعلان الأوسع — بما في ذلك <a href="/ar/services/scarf-printing">طباعة الأوشحة</a> و<a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> — للشركات التي تريد مظهراً موحداً عبر كل نقطة اتصال تحمل العلامة التجارية.</p>

<h2>خيارات المقاسات للعملاء الشركاتيين السعوديين</h2>
<p>توفر وينوو للإعلان الزي الموحد بمجموعة كاملة من المقاسات لاستيعاب القوى العاملة السعودية المتنوعة. نقدم مقاسات دولية قياسية بالإضافة إلى تفصيل مخصص للإدارة العليا وموظفي الفعاليات المهمين حيث يُطلب مظهر مضبوط بدقة.</p>
<p>للمنظمات الكبيرة، ندير عملية جمع المقاسات وننتج تقرير توزيع المقاسات قبل بدء الإنتاج. هذا يزيل المشكلات الشائعة المتعلقة بعدم تطابق الكميات ويضمن حصول كل عضو في الفريق على المقاس الصحيح عند التسليم.</p>

<h2>أعمالنا في الزي الموحد بالرياض</h2>
<p>تمتد محفظة أعمالنا في الزي الموحد عبر مجموعات الضيافة والفرق المؤسسية وموظفي الفعاليات وسلاسل التجزئة ومقدمي الرعاية الصحية في جميع أنحاء الرياض. تصفح المعرض لرؤية مجموعة ملابس العمل التي تحمل العلامة التجارية والمنتجة والمسلمة من وينوو للإعلان.</p>

<h2>الأسئلة الشائعة حول الزي الموحد للشركات</h2>

<h3>ما أنواع الزي الموحد الذي توفره وينوو للإعلان في الرياض؟</h3>
<p>توفر وينوو للإعلان مجموعة كاملة من الزي الموحد للشركات والموظفين تشمل قمصان البولو والقمصان الرسمية والتيشيرتات وسترات السلامة ويونيفورم الضيافة وسترات الطهاة والأزياء الطبية ويونيفورم الأمن وملابس موظفي الفعاليات. جميع الملابس متوفرة مع التطريز أو الطباعة بالشاشة الحريرية أو النقل الحراري للعلامة التجارية.</p>

<h3>هل يمكنكم إضافة شعار شركتنا على الزي الموحد؟</h3>
<p>نعم. كل زي موحد توفره وينوو للإعلان يحمل شعار شركتك باستخدام التقنية الأنسب لنوع القماش والملابس. التطريز هو اللمسة النهائية المفضلة لقمصان البولو والقمصان الرسمية. الطباعة بالشاشة الحريرية هي المعيار للتيشيرتات وملابس الفعاليات. النقل الحراري يُستخدم للتصميمات المعقدة متعددة الألوان.</p>

<h3>ما الحد الأدنى لطلب الزي الموحد للشركات؟</h3>
<p>تختلف الحدود الدنيا للطلب حسب نوع الملابس، وتبدأ عادةً من 12 إلى 50 قطعة لكل نمط. تتولى وينوو للإعلان طلبات الزي الموحد للفرق الصغيرة وكذلك عمليات التوزيع المؤسسية الكبيرة التي تتطلب مئات أو آلاف القطع عبر مدن سعودية متعددة.</p>

<h3>كم يستغرق إنتاج وتسليم الزي الموحد المخصص؟</h3>
<p>تُنتج وتُسلم طلبات الزي الموحد القياسية بتصميمات معتمدة خلال 10 إلى 20 يوم عمل حسب الكمية ونوع الملابس. الإنتاج السريع متاح لمواعيد الفعاليات أو الافتتاحات. نؤكد مواعيد التسليم وقت تقديم الطلب.</p>

<h2>احصل على عرض سعر للزي الموحد</h2>
<p>أخبرنا بأنواع الملابس المطلوبة وحجم فريقك وملفات الشعار وأي تفضيلات للألوان. سيقدم فريقنا عينات الأقمشة وعرض سعر مفصل خلال 48 ساعة. يشمل ذلك التصميم الكامل والإنتاج وتنسيق التسليم.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الزي الموحد الذي توفره وينوو للإعلان في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "توفر وينوو للإعلان مجموعة كاملة من الزي الموحد للشركات والموظفين تشمل قمصان البولو والقمصان الرسمية والتيشيرتات وسترات السلامة ويونيفورم الضيافة وسترات الطهاة والأزياء الطبية ويونيفورم الأمن وملابس موظفي الفعاليات. جميع الملابس متوفرة مع التطريز أو الطباعة بالشاشة الحريرية أو النقل الحراري للعلامة التجارية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم إضافة شعار شركتنا على الزي الموحد؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. كل زي موحد توفره وينوو للإعلان يحمل شعار شركتك باستخدام التقنية الأنسب لنوع القماش والملابس. التطريز هو اللمسة النهائية المفضلة لقمصان البولو والقمصان الرسمية. الطباعة بالشاشة الحريرية هي المعيار للتيشيرتات وملابس الفعاليات. النقل الحراري يُستخدم للتصميمات المعقدة متعددة الألوان."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لطلب الزي الموحد للشركات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تختلف الحدود الدنيا للطلب حسب نوع الملابس، وتبدأ عادةً من 12 إلى 50 قطعة لكل نمط. تتولى وينوو للإعلان طلبات الزي الموحد للفرق الصغيرة وكذلك عمليات التوزيع المؤسسية الكبيرة التي تتطلب مئات أو آلاف القطع عبر مدن سعودية متعددة."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق إنتاج وتسليم الزي الموحد المخصص؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُنتج وتُسلم طلبات الزي الموحد القياسية بتصميمات معتمدة خلال 10 إلى 20 يوم عمل حسب الكمية ونوع الملابس. الإنتاج السريع متاح لمواعيد الفعاليات أو الافتتاحات. نؤكد مواعيد التسليم وقت تقديم الطلب."
      }
    }
  ]
}
</script>
HTML;
    }
};
