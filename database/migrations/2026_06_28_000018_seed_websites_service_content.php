<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'websites';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/websites.webp',
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
            'title' => 'Website Design and Development',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Website Design in Riyadh | Web Development Saudi Arabia | Window Advertising',
            'meta_description' => 'Professional website design and development in Riyadh. Window Advertising builds corporate websites, landing pages, and e-commerce sites for businesses across Saudi Arabia. Bilingual Arabic-English websites aligned with your brand identity. Get a free consultation.',
            'meta_keywords' => 'website design Riyadh, web development Saudi Arabia, corporate website Riyadh, bilingual website Saudi Arabia, دعاية واعلان الرياض, تصميم مواقع الرياض, تصميم هوية, دعاية واعلان السعودية, تصميم بروفيل',
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
            'title' => 'تصميم وتطوير المواقع الإلكترونية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تصميم مواقع في الرياض | تطوير مواقع السعودية | ويندو للإعلان',
            'meta_description' => 'تصميم وتطوير مواقع احترافية في الرياض — ويندو للإعلان يبني مواقع شركاتية وصفحات هبوط ومتاجر الكترونية للشركات في السعودية. مواقع ثنائية اللغة تعكس هويتك التجارية. دعاية واعلان الرياض. احصل على استشارة.',
            'meta_keywords' => 'تصميم مواقع الرياض, تطوير مواقع السعودية, دعاية واعلان الرياض, تصميم هوية, تصميم بروفيل, دعاية واعلان السعودية, مواقع الكترونية الرياض',
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
        $service = DB::table('services')->where('slug', 'websites')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A company website is the central digital advertising asset for any business operating in Riyadh and Saudi Arabia. It is where potential clients verify your credibility, review your portfolio, understand your services, and decide whether to contact you. Window Advertising designs and develops websites for Saudi businesses as an integrated extension of the broader brand identity and advertising work we manage — ensuring that your website looks, feels, and communicates with the same precision as your physical advertising materials.</p>

<h2>Website Design That Reflects Your Brand Identity</h2>
<p>A website is not simply a collection of pages — it is a digital expression of your corporate identity. The color palette, typography, visual hierarchy, photography style, and copywriting voice all communicate who your company is and what standard it operates to.</p>
<p>Window Advertising builds websites that are extensions of the <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> systems we create. For clients whose brand identity we have developed, the website inherits the design language of the full identity system — including the logo, typography, color specifications, and layout principles. For clients with an existing identity, we apply and adapt their brand guidelines to the web environment, ensuring that the digital presence is consistent with the physical advertising materials.</p>

<h2>Bilingual Arabic and English Websites</h2>
<p>Every website built by Window Advertising for the Saudi market is bilingual Arabic and English. Both language versions are designed properly — not translated text dropped into an otherwise identical layout, but genuinely adapted content and design that works correctly in each language direction.</p>
<p>Arabic content uses right-to-left layout, appropriate Arabic typefaces at correctly specified weights and sizes, and Arabic-language user interface elements. English content uses left-to-right layout with English typography specified for screen legibility.</p>
<p>The technical structure — separate URL paths for each language, hreflang tags in the head, and a language toggle visible to users — is built correctly from the start. This ensures that Saudi Arabic-speaking users find the Arabic version of the site and that Google indexes and serves the correct language to each audience.</p>

<h2>Types of Websites We Build</h2>
<p>Window Advertising builds four main website types for clients in Riyadh:</p>
<p><strong>Corporate presentation websites</strong> are the most common project type — a professional website presenting the company's services, history, team, portfolio, and contact information. These are typically 5 to 15 pages in size and are the primary digital presence for businesses across the Saudi market.</p>
<p><strong>Campaign landing pages</strong> are single-page or short-form sites built to support a specific advertising campaign — a product launch, a seasonal promotion, or an event registration. These are designed for a single user action and are often connected to paid <a href="/en/services/digital-marketing">digital marketing</a> campaigns we manage.</p>
<p><strong>Portfolio and showcase websites</strong> are built for advertising agencies, design studios, architecture firms, and event companies who need to present a visual body of work in a structured, high-quality gallery format.</p>
<p><strong>E-commerce websites</strong> enable Saudi businesses to sell products directly online, with Arabic-language checkout, Saudi payment gateway integration, and product catalog management.</p>

<h2>Mobile-First for Saudi Audiences</h2>
<p>Saudi Arabia is a mobile-first market. More than 80 percent of internet usage in the Kingdom originates from smartphone devices, and this proportion is even higher for the social media platforms and search engines that drive traffic to websites. Every website we build is designed and tested on mobile screens first — desktop layout is an extension of the mobile foundation, not the other way around.</p>
<p>Fast load times on mobile connections are essential in the Saudi market. Window Advertising optimizes images, scripts, and code to ensure sites load quickly on the mobile network speeds typical in Riyadh — slow-loading pages lose visitors before the content is even seen.</p>

<h2>Website and Profile Design Integration</h2>
<p>For many clients in Riyadh, the website project is one element of a broader brand communication package that includes a <a href="/en/services/profile-design-printing">profile design and printing</a>, <a href="/en/services/business-prints">catalog design</a>, and <a href="/en/services/social-media">social media</a> visual identity. Window Advertising coordinates these elements together — ensuring your website, company profile, and printed catalog all share the same visual identity and content structure.</p>
<p>This integrated approach means that a new client who encounters your brand at an exhibition, through a printed company profile, and through your website experiences the same professional standard and consistent messaging across every touchpoint.</p>

<h2>Frequently Asked Questions About Website Design</h2>

<h3>Does Window Advertising build bilingual Arabic-English websites?</h3>
<p>Yes. Every website we build for Saudi clients is bilingual Arabic and English by default. We handle both the Arabic content layout — including right-to-left typography, proper font selection, and Arabic user interface design — and the English content layout. The site is structured with separate URLs for each language, with hreflang tags in place to ensure Google indexes both language versions correctly.</p>

<h3>What type of websites does Window Advertising build?</h3>
<p>Window Advertising builds corporate presentation websites, portfolio and services websites, landing pages for campaigns, e-commerce sites for product sales, and booking or inquiry forms for service businesses. Most clients in Riyadh need a corporate website that presents the company's services, team, portfolio, and contact information clearly and professionally.</p>

<h3>How long does it take to build a website?</h3>
<p>A standard corporate website with 5 to 10 pages in bilingual Arabic and English takes 3 to 6 weeks from brief sign-off to launch. Timeline varies based on content readiness, number of pages and sections, e-commerce or custom functionality requirements, and revision rounds. We agree on a project timeline at the start and track milestones transparently.</p>

<h3>Is the website mobile-optimized for Saudi smartphone users?</h3>
<p>Yes. All websites built by Window Advertising are mobile-first — designed for smartphone screens before desktop, reflecting the reality that the majority of internet traffic in Saudi Arabia originates from mobile devices. We test every site across the most widely used device and browser combinations in the Saudi market before launch.</p>

<h2>Start Your Website Project in Riyadh</h2>
<p>Tell us your business type, the main purpose of the website, and whether you have existing brand guidelines. Our team provides a scope proposal and timeline estimate within 48 hours. Free consultation included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Does Window Advertising build bilingual Arabic-English websites?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Every website we build for Saudi clients is bilingual Arabic and English by default. We handle both the Arabic content layout — including right-to-left typography, proper font selection, and Arabic user interface design — and the English content layout. The site is structured with separate URLs for each language, with hreflang tags in place to ensure Google indexes both language versions correctly."
      }
    },
    {
      "@type": "Question",
      "name": "What type of websites does Window Advertising build?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising builds corporate presentation websites, portfolio and services websites, landing pages for campaigns, e-commerce sites for product sales, and booking or inquiry forms for service businesses. Most clients in Riyadh need a corporate website that presents the company's services, team, portfolio, and contact information clearly and professionally."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to build a website?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A standard corporate website with 5 to 10 pages in bilingual Arabic and English takes 3 to 6 weeks from brief sign-off to launch. Timeline varies based on content readiness, number of pages and sections, e-commerce or custom functionality requirements, and revision rounds. We agree on a project timeline at the start and track milestones transparently."
      }
    },
    {
      "@type": "Question",
      "name": "Is the website mobile-optimized for Saudi smartphone users?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. All websites built by Window Advertising are mobile-first — designed for smartphone screens before desktop, reflecting the reality that the majority of internet traffic in Saudi Arabia originates from mobile devices. We test every site across the most widely used device and browser combinations in the Saudi market before launch."
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
<p>الموقع الإلكتروني للشركة هو الأصل الإعلاني الرقمي المركزي لأي عمل تجاري في الرياض والمملكة العربية السعودية. هو المكان الذي يتحقق فيه العملاء المحتملون من مصداقيتك، ويستعرضون أعمالك، ويفهمون خدماتك، ويقررون ما إذا كانوا سيتواصلون معك. تصمم وتطور ويندو للإعلان مواقع إلكترونية للشركات السعودية كامتداد متكامل لأعمال الهوية التجارية والإعلان الأوسع التي نديرها — لضمان أن موقعك يبدو ويشعر ويتواصل بنفس الدقة التي تتمتع بها موادك الإعلانية المادية.</p>

<h2>تصميم يعكس هوية علامتك التجارية</h2>
<p>الموقع الإلكتروني ليس مجرد مجموعة من الصفحات — إنه تعبير رقمي عن هويتك المؤسسية. لوحة الألوان والخطوط والتسلسل البصري وأسلوب التصوير ونبرة الكتابة كلها تعبّر عن هوية شركتك ومستوى عملها.</p>
<p>تبني ويندو للإعلان مواقع إلكترونية تمثل امتداداً لأنظمة <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> التي نبتكرها. للعملاء الذين طورنا هويتهم التجارية، يرث الموقع لغة التصميم لنظام الهوية الكامل — بما في ذلك الشعار والخطوط ومواصفات الألوان ومبادئ التخطيط. للعملاء الذين لديهم هوية حالية، نطبق ونكيّف إرشادات علامتهم التجارية لبيئة الويب، مع ضمان أن الحضور الرقمي متسق مع المواد الإعلانية المادية.</p>

<h2>مواقع ثنائية اللغة عربي وإنجليزي</h2>
<p>كل موقع تبنيه ويندو للإعلان للسوق السعودي ثنائي اللغة عربي وإنجليزي. كلتا النسختين اللغويتين مصممتان بشكل صحيح — ليس نصاً مترجماً يُوضع في تصميم مطابق، بل محتوى وتصميم مكيّفان حقيقياً يعملان بشكل صحيح في كل اتجاه لغوي.</p>
<p>يستخدم المحتوى العربي تخطيطاً من اليمين لليسار، وخطوطاً عربية مناسبة بأوزان وأحجام محددة بدقة، وعناصر واجهة مستخدم باللغة العربية. يستخدم المحتوى الإنجليزي تخطيطاً من اليسار لليمين مع خطوط إنجليزية محددة لوضوح القراءة على الشاشة.</p>
<p>البنية التقنية — مسارات URL منفصلة لكل لغة، وعلامات hreflang في الرأس، ومبدّل لغة مرئي للمستخدمين — مبنية بشكل صحيح من البداية. هذا يضمن أن المستخدمين السعوديين الناطقين بالعربية يجدون النسخة العربية من الموقع وأن جوجل يفهرس ويقدم اللغة الصحيحة لكل جمهور.</p>

<h2>أنواع المواقع التي نصممها</h2>
<p>تبني ويندو للإعلان أربعة أنواع رئيسية من المواقع لعملاء الرياض:</p>
<p><strong>مواقع العرض المؤسسي</strong> هي أكثر أنواع المشاريع شيوعاً — موقع احترافي يعرض خدمات الشركة وتاريخها وفريقها وأعمالها ومعلومات الاتصال. تتكون عادةً من 5 إلى 15 صفحة وهي الحضور الرقمي الأساسي للشركات في السوق السعودي.</p>
<p><strong>صفحات الهبوط للحملات</strong> هي مواقع من صفحة واحدة أو قصيرة مبنية لدعم حملة إعلانية محددة — إطلاق منتج أو عرض موسمي أو تسجيل لفعالية. مصممة لإجراء واحد من المستخدم وغالباً ما تكون مرتبطة بحملات <a href="/ar/services/digital-marketing">التسويق الرقمي</a> المدفوعة التي نديرها.</p>
<p><strong>مواقع المعرض والأعمال</strong> مبنية لوكالات الإعلان واستوديوهات التصميم وشركات الهندسة المعمارية وشركات الفعاليات التي تحتاج لعرض مجموعة أعمال بصرية بتنسيق معرض منظم وعالي الجودة.</p>
<p><strong>مواقع التجارة الإلكترونية</strong> تمكّن الشركات السعودية من بيع المنتجات مباشرة عبر الإنترنت، مع سلة دفع باللغة العربية وتكامل بوابات الدفع السعودية وإدارة كتالوج المنتجات.</p>

<h2>تصميم يبدأ بالجوال للجمهور السعودي</h2>
<p>المملكة العربية السعودية سوق يبدأ بالجوال. أكثر من 80 بالمئة من استخدام الإنترنت في المملكة ينشأ من أجهزة الهواتف الذكية، وهذه النسبة أعلى حتى لمنصات التواصل الاجتماعي ومحركات البحث التي تجلب الزوار للمواقع. كل موقع نبنيه مصمم ومختبر على شاشات الجوال أولاً — تخطيط سطح المكتب امتداد لأساس الجوال وليس العكس.</p>
<p>سرعة التحميل على اتصالات الجوال ضرورية في السوق السعودي. تحسّن ويندو للإعلان الصور والنصوص البرمجية والكود لضمان تحميل المواقع بسرعة على سرعات شبكات الجوال المعتادة في الرياض — الصفحات البطيئة التحميل تفقد الزوار قبل حتى رؤية المحتوى.</p>

<h2>تكامل تصميم الموقع والبروفيل</h2>
<p>لكثير من العملاء في الرياض، مشروع الموقع عنصر واحد من حزمة تواصل تجاري أوسع تشمل <a href="/ar/services/profile-design-printing">تصميم وطباعة البروفيل</a> و<a href="/ar/services/business-prints">تصميم الكتالوج</a> والهوية البصرية لـ<a href="/ar/services/social-media">وسائل التواصل الاجتماعي</a>. تنسق ويندو للإعلان هذه العناصر معاً — لضمان أن موقعك وبروفيل شركتك والكتالوج المطبوع يتشاركون جميعاً نفس الهوية البصرية وبنية المحتوى.</p>
<p>هذا النهج المتكامل يعني أن العميل الجديد الذي يواجه علامتك التجارية في معرض أو من خلال بروفيل شركة مطبوع أو عبر موقعك يختبر نفس المعيار الاحترافي والرسائل المتسقة عبر كل نقطة تواصل.</p>

<h2>الأسئلة الشائعة حول تصميم المواقع</h2>

<h3>هل تبني ويندو للإعلان مواقع ثنائية اللغة عربي-إنجليزي؟</h3>
<p>نعم. كل موقع نبنيه لعملاء السعودية ثنائي اللغة عربي وإنجليزي بشكل افتراضي. نتولى تخطيط المحتوى العربي — بما في ذلك الطباعة من اليمين لليسار واختيار الخطوط المناسبة وتصميم واجهة المستخدم بالعربية — وتخطيط المحتوى الإنجليزي. الموقع مبني بعناوين URL منفصلة لكل لغة مع علامات hreflang لضمان فهرسة جوجل لكلتا النسختين بشكل صحيح.</p>

<h3>ما أنواع المواقع التي تبنيها ويندو للإعلان؟</h3>
<p>تبني ويندو للإعلان مواقع عرض مؤسسي ومواقع معرض أعمال وخدمات وصفحات هبوط للحملات ومتاجر إلكترونية لبيع المنتجات ونماذج حجز واستفسار لشركات الخدمات. معظم العملاء في الرياض يحتاجون موقعاً مؤسسياً يعرض خدمات الشركة وفريقها وأعمالها ومعلومات الاتصال بوضوح واحترافية.</p>

<h3>كم يستغرق بناء موقع إلكتروني؟</h3>
<p>الموقع المؤسسي القياسي من 5 إلى 10 صفحات ثنائي اللغة عربي وإنجليزي يستغرق من 3 إلى 6 أسابيع من اعتماد الملخص حتى الإطلاق. يختلف الجدول الزمني بناءً على جاهزية المحتوى وعدد الصفحات والأقسام ومتطلبات التجارة الإلكترونية أو الوظائف المخصصة وجولات المراجعة. نتفق على جدول زمني للمشروع من البداية ونتابع المراحل بشفافية.</p>

<h3>هل الموقع محسّن للجوال لمستخدمي الهواتف الذكية في السعودية؟</h3>
<p>نعم. جميع المواقع التي تبنيها ويندو للإعلان مصممة بأولوية الجوال — مصممة لشاشات الهواتف الذكية قبل سطح المكتب، عاكسةً حقيقة أن غالبية حركة الإنترنت في السعودية تأتي من الأجهزة المحمولة. نختبر كل موقع على أكثر تركيبات الأجهزة والمتصفحات استخداماً في السوق السعودي قبل الإطلاق.</p>

<h2>ابدأ مشروع موقعك في الرياض</h2>
<p>أخبرنا عن نوع عملك والغرض الرئيسي من الموقع وما إذا كانت لديك إرشادات هوية تجارية حالية. يقدم فريقنا مقترح نطاق العمل وتقدير الجدول الزمني خلال 48 ساعة. استشارة مجانية مشمولة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "هل تبني ويندو للإعلان مواقع ثنائية اللغة عربي-إنجليزي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. كل موقع نبنيه لعملاء السعودية ثنائي اللغة عربي وإنجليزي بشكل افتراضي. نتولى تخطيط المحتوى العربي — بما في ذلك الطباعة من اليمين لليسار واختيار الخطوط المناسبة وتصميم واجهة المستخدم بالعربية — وتخطيط المحتوى الإنجليزي. الموقع مبني بعناوين URL منفصلة لكل لغة مع علامات hreflang لضمان فهرسة جوجل لكلتا النسختين بشكل صحيح."
      }
    },
    {
      "@type": "Question",
      "name": "ما أنواع المواقع التي تبنيها ويندو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تبني ويندو للإعلان مواقع عرض مؤسسي ومواقع معرض أعمال وخدمات وصفحات هبوط للحملات ومتاجر إلكترونية لبيع المنتجات ونماذج حجز واستفسار لشركات الخدمات. معظم العملاء في الرياض يحتاجون موقعاً مؤسسياً يعرض خدمات الشركة وفريقها وأعمالها ومعلومات الاتصال بوضوح واحترافية."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق بناء موقع إلكتروني؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الموقع المؤسسي القياسي من 5 إلى 10 صفحات ثنائي اللغة عربي وإنجليزي يستغرق من 3 إلى 6 أسابيع من اعتماد الملخص حتى الإطلاق. يختلف الجدول الزمني بناءً على جاهزية المحتوى وعدد الصفحات والأقسام ومتطلبات التجارة الإلكترونية أو الوظائف المخصصة وجولات المراجعة. نتفق على جدول زمني للمشروع من البداية ونتابع المراحل بشفافية."
      }
    },
    {
      "@type": "Question",
      "name": "هل الموقع محسّن للجوال لمستخدمي الهواتف الذكية في السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. جميع المواقع التي تبنيها ويندو للإعلان مصممة بأولوية الجوال — مصممة لشاشات الهواتف الذكية قبل سطح المكتب، عاكسةً حقيقة أن غالبية حركة الإنترنت في السعودية تأتي من الأجهزة المحمولة. نختبر كل موقع على أكثر تركيبات الأجهزة والمتصفحات استخداماً في السوق السعودي قبل الإطلاق."
      }
    }
  ]
}
</script>
HTML;
    }
};
