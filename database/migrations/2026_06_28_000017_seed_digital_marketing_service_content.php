<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'digital-marketing';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/digital-marketing.webp',
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
            'title' => 'Digital Marketing',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Digital Marketing in Riyadh | Online Advertising Saudi Arabia | Window Advertising',
            'meta_description' => 'Digital marketing services in Riyadh. Window Advertising runs paid advertising campaigns, social media marketing, and content production for companies across Saudi Arabia. Full-service digital advertising and branding solutions. Get a free consultation.',
            'meta_keywords' => 'digital marketing Riyadh, online advertising Saudi Arabia, digital advertising Riyadh, paid social media Riyadh, دعاية واعلان الرياض, تسويق رقمي الرياض, تصميم فيديو, تصميم هوية, دعاية واعلان السعودية',
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
            'title' => 'التسويق الرقمي',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تسويق رقمي في الرياض | إعلانات الكترونية السعودية | وينوو للإعلان',
            'meta_description' => 'خدمات التسويق الرقمي في الرياض — وينوو للإعلان يدير حملات الإعلان المدفوع وتسويق السوشيال ميديا وإنتاج المحتوى للشركات في السعودية. حلول دعاية واعلان الرياض الرقمية والتقليدية. احصل على استشارة مجانية.',
            'meta_keywords' => 'تسويق رقمي الرياض, إعلانات الكترونية السعودية, دعاية واعلان الرياض, تصميم فيديو, تصميم هوية, دعاية واعلان السعودية, إعلانات سوشيال ميديا الرياض',
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
        $service = DB::table('services')->where('slug', 'digital-marketing')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Window Advertising delivers digital marketing services as part of an integrated advertising offer that connects online campaigns with physical brand presence. While most digital agencies operate independently from the print and signage world, our team manages paid social campaigns, video content production, and digital brand identity alongside the banners, exhibition systems, and promotional materials that carry your brand in the physical world. This integration is what makes our advertising work in Riyadh more coherent and more effective.</p>

<h2>Paid Advertising Campaigns in Saudi Arabia</h2>
<p>Paid digital advertising is the fastest way to put your brand in front of a targeted audience in Riyadh and across Saudi Arabia. Window Advertising plans, builds, and manages paid campaigns on the platforms where Saudi audiences are most active.</p>
<p>Snapchat is Saudi Arabia's highest-reach social advertising platform — Riyadh has one of the highest Snapchat user densities in the world, and the platform delivers exceptional reach for local businesses targeting Saudi consumers.</p>
<p>Instagram and Facebook campaigns reach a broad Saudi demographic and deliver strong results for brand awareness, product promotions, and event announcements.</p>
<p>TikTok advertising reaches younger Saudi audiences through short-form video. Window Advertising produces the video content alongside managing the campaign, ensuring the creative quality matches the platform's standards.</p>
<p>Google Search campaigns capture Saudi audiences at the moment they are searching for a product or service — critical for businesses that want to appear when a potential client in Riyadh is actively looking for what they offer.</p>

<h2>Video and Motion Graphics Production</h2>
<p>Video is the dominant content format across every digital advertising platform in Saudi Arabia. Window Advertising produces promotional videos and motion graphics for digital campaigns — from short 15-second Snapchat and Instagram story ads to longer YouTube and website explainer videos.</p>
<p>Our video production work for advertising is designed for performance rather than just aesthetics. We produce videos with the hook, message hierarchy, and call-to-action structure required to generate results on each platform. Video content for digital campaigns is coordinated with the visual identity system we create for the brand — ensuring the videos look consistent with your physical advertising materials.</p>

<h2>Digital Brand Identity and Visual Design</h2>
<p>Effective digital advertising requires a coherent visual identity that travels across every format — social media profiles, advertising banners, story formats, and <a href="/en/services/websites">websites</a>. Window Advertising designs digital brand identity systems as part of a complete <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> project that spans both physical and digital advertising channels.</p>
<p>Our digital design work includes social media profile and cover imagery, advertising creative in all standard platform formats, motion graphic templates for reusable social media content, and email marketing visual design. For companies that need a new corporate identity design, we build the digital identity components as an integral part of the wider branding project.</p>

<h2>Social Media Content and Community Management</h2>
<p>Maintaining an active, consistent presence on <a href="/en/services/social-media">social media</a> in Saudi Arabia requires a sustained content production effort. Window Advertising produces social media content on a monthly retainer basis — designing and scheduling posts, stories, and reels for Instagram, Snapchat, and Twitter in both Arabic and English.</p>
<p>Our content production for social media is informed by the performance data we track from paid campaign management — we know which content formats, topics, and visual styles generate engagement with your specific audience on each platform, and we apply those insights to the organic content calendar.</p>

<h2>Integrating Digital and Physical Advertising in Riyadh</h2>
<p>The most effective advertising campaigns in Riyadh combine digital and physical channels into a unified campaign. A product launch might begin with outdoor <a href="/en/services/banner-printing-installation">banner printing</a> that builds familiarity with a new brand, then use Snapchat and Instagram paid campaigns to drive direct action from audiences who have already encountered the brand physically.</p>
<p>Window Advertising is uniquely positioned to manage this integration because we operate both the physical production and the digital campaign management. A single client brief generates coordinated output across exhibition systems, printed materials, outdoor advertising, and digital campaigns — all sharing the same creative direction and visual identity. This extends to <a href="/en/services/event-management">event management</a>, where digital campaigns drive attendance and on-site branding reinforces the digital message.</p>

<h2>Reporting and Campaign Performance</h2>
<p>Every digital marketing campaign managed by Window Advertising is supported by regular performance reporting. We provide monthly reports covering key metrics by platform — impressions, reach, clicks, cost per result, and conversion tracking where applicable — with clear explanation of what the data means for your campaign objectives.</p>
<p>Our reporting is designed to be understood by business owners and marketing managers, not just digital specialists. We explain what is working, what needs adjustment, and what we recommend for the next period — in plain language, in Arabic or English.</p>

<h2>Frequently Asked Questions About Digital Marketing</h2>

<h3>What digital marketing platforms does Window Advertising manage?</h3>
<p>Window Advertising manages digital advertising campaigns across Google Search and Display Network, Snapchat, Instagram, Facebook, TikTok, Twitter, and YouTube. We recommend the platform mix based on the specific audience profile and objectives of each campaign — Saudi audiences are particularly active on Snapchat and Instagram, and these platforms deliver strong results for local advertising campaigns in Riyadh.</p>

<h3>What does digital marketing cost in Riyadh?</h3>
<p>Digital marketing costs in Riyadh depend on the campaign objectives, platforms, ad spend, and content production requirements. Window Advertising provides a transparent breakdown of management fees and recommended advertising budget. A focused local campaign for a Riyadh business can be effective starting from 3,000 SAR per month in ad spend, with management fees quoted separately based on campaign scope.</p>

<h3>Can Window Advertising produce the videos and graphics needed for digital campaigns?</h3>
<p>Yes. Window Advertising produces all digital content in-house — motion graphics, promotional videos, social media stories, carousel posts, animated banner ads, and product photography. This integration between campaign management and content production means your digital advertising visuals are designed specifically for performance rather than adapted from print materials.</p>

<h3>How does Window Advertising integrate digital and physical advertising?</h3>
<p>Window Advertising's advantage in the Saudi market is the ability to manage both digital and physical advertising from a single team. A product launch campaign might include outdoor banners and exhibition booth presence managed alongside a Snapchat and Instagram paid campaign using the same design language. This integration creates consistent brand exposure across every channel where the target audience encounters your brand.</p>

<h2>Start Your Digital Marketing Campaign in Riyadh</h2>
<p>Tell us your business objectives, your target audience in Saudi Arabia, and your current advertising situation. Our team provides a platform recommendation and campaign structure proposal within 48 hours. Free consultation included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What digital marketing platforms does Window Advertising manage?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising manages digital advertising campaigns across Google Search and Display Network, Snapchat, Instagram, Facebook, TikTok, Twitter, and YouTube. We recommend the platform mix based on the specific audience profile and objectives of each campaign — Saudi audiences are particularly active on Snapchat and Instagram, and these platforms deliver strong results for local advertising campaigns in Riyadh."
      }
    },
    {
      "@type": "Question",
      "name": "What does digital marketing cost in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Digital marketing costs in Riyadh depend on the campaign objectives, platforms, ad spend, and content production requirements. Window Advertising provides a transparent breakdown of management fees and recommended advertising budget. A focused local campaign for a Riyadh business can be effective starting from 3,000 SAR per month in ad spend, with management fees quoted separately based on campaign scope."
      }
    },
    {
      "@type": "Question",
      "name": "Can Window Advertising produce the videos and graphics needed for digital campaigns?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising produces all digital content in-house — motion graphics, promotional videos, social media stories, carousel posts, animated banner ads, and product photography. This integration between campaign management and content production means your digital advertising visuals are designed specifically for performance rather than adapted from print materials."
      }
    },
    {
      "@type": "Question",
      "name": "How does Window Advertising integrate digital and physical advertising?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising's advantage in the Saudi market is the ability to manage both digital and physical advertising from a single team. A product launch campaign might include outdoor banners and exhibition booth presence managed alongside a Snapchat and Instagram paid campaign using the same design language. This integration creates consistent brand exposure across every channel where the target audience encounters your brand."
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
<p>تقدم وينوو للإعلان خدمات التسويق الرقمي كجزء من عرض إعلاني متكامل يربط الحملات الإلكترونية بالحضور المادي للعلامة التجارية. بينما تعمل معظم الوكالات الرقمية بمعزل عن عالم الطباعة واللافتات، يدير فريقنا حملات السوشيال ميديا المدفوعة وإنتاج محتوى الفيديو وهوية العلامة الرقمية إلى جانب البانرات وأنظمة المعارض والمواد الترويجية التي تحمل علامتك التجارية في العالم الواقعي. هذا التكامل هو ما يجعل عملنا الإعلاني في الرياض أكثر تماسكاً وفعالية.</p>

<h2>حملات الإعلانات المدفوعة في السعودية</h2>
<p>الإعلان الرقمي المدفوع هو أسرع طريقة لوضع علامتك التجارية أمام جمهور مستهدف في الرياض وعبر المملكة العربية السعودية. تخطط وينوو للإعلان وتبني وتدير الحملات المدفوعة على المنصات التي يكون فيها الجمهور السعودي أكثر نشاطاً.</p>
<p>سناب شات هو منصة الإعلان الاجتماعي الأعلى وصولاً في السعودية — الرياض لديها واحدة من أعلى كثافات مستخدمي سناب شات في العالم، والمنصة تحقق وصولاً استثنائياً للشركات المحلية التي تستهدف المستهلكين السعوديين.</p>
<p>حملات إنستقرام وفيسبوك تصل إلى شريحة سعودية واسعة وتحقق نتائج قوية في الوعي بالعلامة التجارية والعروض الترويجية وإعلانات الفعاليات.</p>
<p>إعلانات تيك توك تصل إلى الجمهور السعودي الأصغر سناً عبر الفيديو القصير. تنتج وينوو للإعلان محتوى الفيديو إلى جانب إدارة الحملة، مما يضمن أن الجودة الإبداعية تتوافق مع معايير المنصة.</p>
<p>حملات بحث جوجل تلتقط الجمهور السعودي في لحظة بحثه عن منتج أو خدمة — أمر حاسم للشركات التي تريد الظهور عندما يبحث عميل محتمل في الرياض بنشاط عما تقدمه.</p>

<h2>إنتاج الفيديو والموشن جرافيك</h2>
<p>الفيديو هو تنسيق المحتوى المهيمن عبر كل منصة إعلان رقمي في السعودية. تنتج وينوو للإعلان فيديوهات ترويجية وموشن جرافيك للحملات الرقمية — من إعلانات القصص القصيرة 15 ثانية على سناب شات وإنستقرام إلى فيديوهات يوتيوب والموقع التوضيحية الأطول.</p>
<p>عملنا في إنتاج الفيديو الإعلاني مصمم للأداء وليس فقط الجماليات. ننتج فيديوهات بالجذب والتسلسل الرسائلي وبنية الدعوة للعمل المطلوبة لتحقيق نتائج على كل منصة. محتوى الفيديو للحملات الرقمية منسق مع نظام الهوية البصرية الذي نصممه للعلامة — مما يضمن أن الفيديوهات تبدو متسقة مع موادك الإعلانية المادية.</p>

<h2>هوية العلامة الرقمية والتصميم البصري</h2>
<p>يتطلب الإعلان الرقمي الفعال هوية بصرية متماسكة تنتقل عبر كل تنسيق — ملفات السوشيال ميديا وبانرات الإعلان وتنسيقات القصص و<a href="/ar/services/websites">المواقع الإلكترونية</a>. تصمم وينوو للإعلان أنظمة هوية العلامة الرقمية كجزء من مشروع <a href="/ar/services/corporate-visual-identity-design">تصميم هوية بصرية مؤسسية</a> متكامل يشمل قنوات الإعلان المادية والرقمية.</p>
<p>يشمل عملنا في التصميم الرقمي صور الملفات الشخصية والأغلفة للسوشيال ميديا، والإبداع الإعلاني بجميع تنسيقات المنصات القياسية، وقوالب الموشن جرافيك لمحتوى السوشيال ميديا القابل لإعادة الاستخدام، وتصميم التسويق عبر البريد الإلكتروني. للشركات التي تحتاج تصميم هوية مؤسسية جديدة، نبني مكونات الهوية الرقمية كجزء لا يتجزأ من مشروع العلامة التجارية الأوسع.</p>

<h2>محتوى السوشيال ميديا وإدارة المجتمع</h2>
<p>يتطلب الحفاظ على حضور نشط ومتسق على <a href="/ar/services/social-media">السوشيال ميديا</a> في السعودية جهداً مستمراً في إنتاج المحتوى. تنتج وينوو للإعلان محتوى السوشيال ميديا على أساس عقد شهري — تصميم وجدولة المنشورات والقصص والريلز لإنستقرام وسناب شات وتويتر بالعربية والإنجليزية.</p>
<p>إنتاج المحتوى للسوشيال ميديا مبني على بيانات الأداء التي نتتبعها من إدارة الحملات المدفوعة — نعرف أي تنسيقات المحتوى والمواضيع والأنماط البصرية تولّد تفاعلاً مع جمهورك المحدد على كل منصة، ونطبق هذه الرؤى على تقويم المحتوى العضوي.</p>

<h2>دمج الإعلان الرقمي والمادي في الرياض</h2>
<p>أكثر الحملات الإعلانية فعالية في الرياض تجمع بين القنوات الرقمية والمادية في حملة موحدة. قد يبدأ إطلاق منتج بإعلانات <a href="/ar/services/banner-printing-installation">طباعة بانرات</a> خارجية تبني الألفة مع علامة تجارية جديدة، ثم تستخدم حملات سناب شات وإنستقرام المدفوعة لدفع الجمهور الذي صادف العلامة مادياً إلى اتخاذ إجراء مباشر.</p>
<p>وينوو للإعلان في وضع فريد لإدارة هذا التكامل لأننا نشغّل كلاً من الإنتاج المادي وإدارة الحملات الرقمية. ملخص عميل واحد يولّد مخرجات منسقة عبر أنظمة المعارض والمواد المطبوعة والإعلان الخارجي والحملات الرقمية — جميعها تتشارك نفس التوجه الإبداعي والهوية البصرية. يمتد هذا إلى <a href="/ar/services/event-management">إدارة الفعاليات</a>، حيث تدفع الحملات الرقمية الحضور وتعزز العلامة التجارية في الموقع الرسالة الرقمية.</p>

<h2>التقارير وأداء الحملات</h2>
<p>كل حملة تسويق رقمي تديرها وينوو للإعلان مدعومة بتقارير أداء منتظمة. نقدم تقارير شهرية تغطي المقاييس الرئيسية حسب المنصة — مرات الظهور والوصول والنقرات وتكلفة النتيجة وتتبع التحويلات حيثما أمكن — مع شرح واضح لما تعنيه البيانات لأهداف حملتك.</p>
<p>تقاريرنا مصممة لتكون مفهومة من قبل أصحاب الأعمال ومديري التسويق، وليس فقط المتخصصين الرقميين. نوضح ما ينجح وما يحتاج تعديلاً وما نوصي به للفترة القادمة — بلغة واضحة، بالعربية أو الإنجليزية.</p>

<h2>الأسئلة الشائعة حول التسويق الرقمي</h2>

<h3>ما منصات التسويق الرقمي التي تديرها وينوو للإعلان؟</h3>
<p>تدير وينوو للإعلان حملات الإعلان الرقمي عبر بحث جوجل وشبكة العرض وسناب شات وإنستقرام وفيسبوك وتيك توك وتويتر ويوتيوب. نوصي بمزيج المنصات بناءً على ملف الجمهور المحدد وأهداف كل حملة — الجمهور السعودي نشط بشكل خاص على سناب شات وإنستقرام، وهذه المنصات تحقق نتائج قوية لحملات الإعلان المحلية في الرياض.</p>

<h3>كم تكلفة التسويق الرقمي في الرياض؟</h3>
<p>تعتمد تكاليف التسويق الرقمي في الرياض على أهداف الحملة والمنصات والإنفاق الإعلاني ومتطلبات إنتاج المحتوى. تقدم وينوو للإعلان تفصيلاً شفافاً لرسوم الإدارة والميزانية الإعلانية الموصى بها. حملة محلية مركزة لشركة في الرياض يمكن أن تكون فعالة بدءاً من 3,000 ريال سعودي شهرياً في الإنفاق الإعلاني، مع تسعير رسوم الإدارة بشكل منفصل بناءً على نطاق الحملة.</p>

<h3>هل تستطيع وينوو للإعلان إنتاج الفيديوهات والتصاميم اللازمة للحملات الرقمية؟</h3>
<p>نعم. تنتج وينوو للإعلان جميع المحتوى الرقمي داخلياً — الموشن جرافيك والفيديوهات الترويجية وقصص السوشيال ميديا والمنشورات الدوّارة وإعلانات البانر المتحركة وتصوير المنتجات. هذا التكامل بين إدارة الحملات وإنتاج المحتوى يعني أن مرئيات إعلاناتك الرقمية مصممة خصيصاً للأداء بدلاً من تكييفها من مواد مطبوعة.</p>

<h3>كيف تدمج وينوو للإعلان الإعلان الرقمي والمادي؟</h3>
<p>ميزة وينوو للإعلان في السوق السعودي هي القدرة على إدارة الإعلان الرقمي والمادي من فريق واحد. حملة إطلاق منتج قد تشمل بانرات خارجية وحضور في أجنحة المعارض تُدار جنباً إلى جنب مع حملة مدفوعة على سناب شات وإنستقرام باستخدام نفس لغة التصميم. هذا التكامل يخلق تعرضاً متسقاً للعلامة التجارية عبر كل قناة يصادف فيها الجمهور المستهدف علامتك التجارية.</p>

<h2>ابدأ حملتك التسويقية الرقمية في الرياض</h2>
<p>أخبرنا بأهداف عملك وجمهورك المستهدف في السعودية ووضعك الإعلاني الحالي. يقدم فريقنا توصية بالمنصات واقتراح هيكل الحملة خلال 48 ساعة. الاستشارة المجانية مشمولة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما منصات التسويق الرقمي التي تديرها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تدير وينوو للإعلان حملات الإعلان الرقمي عبر بحث جوجل وشبكة العرض وسناب شات وإنستقرام وفيسبوك وتيك توك وتويتر ويوتيوب. نوصي بمزيج المنصات بناءً على ملف الجمهور المحدد وأهداف كل حملة — الجمهور السعودي نشط بشكل خاص على سناب شات وإنستقرام، وهذه المنصات تحقق نتائج قوية لحملات الإعلان المحلية في الرياض."
      }
    },
    {
      "@type": "Question",
      "name": "كم تكلفة التسويق الرقمي في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تعتمد تكاليف التسويق الرقمي في الرياض على أهداف الحملة والمنصات والإنفاق الإعلاني ومتطلبات إنتاج المحتوى. تقدم وينوو للإعلان تفصيلاً شفافاً لرسوم الإدارة والميزانية الإعلانية الموصى بها. حملة محلية مركزة لشركة في الرياض يمكن أن تكون فعالة بدءاً من 3,000 ريال سعودي شهرياً في الإنفاق الإعلاني، مع تسعير رسوم الإدارة بشكل منفصل بناءً على نطاق الحملة."
      }
    },
    {
      "@type": "Question",
      "name": "هل تستطيع وينوو للإعلان إنتاج الفيديوهات والتصاميم اللازمة للحملات الرقمية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تنتج وينوو للإعلان جميع المحتوى الرقمي داخلياً — الموشن جرافيك والفيديوهات الترويجية وقصص السوشيال ميديا والمنشورات الدوّارة وإعلانات البانر المتحركة وتصوير المنتجات. هذا التكامل بين إدارة الحملات وإنتاج المحتوى يعني أن مرئيات إعلاناتك الرقمية مصممة خصيصاً للأداء بدلاً من تكييفها من مواد مطبوعة."
      }
    },
    {
      "@type": "Question",
      "name": "كيف تدمج وينوو للإعلان الإعلان الرقمي والمادي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ميزة وينوو للإعلان في السوق السعودي هي القدرة على إدارة الإعلان الرقمي والمادي من فريق واحد. حملة إطلاق منتج قد تشمل بانرات خارجية وحضور في أجنحة المعارض تُدار جنباً إلى جنب مع حملة مدفوعة على سناب شات وإنستقرام باستخدام نفس لغة التصميم. هذا التكامل يخلق تعرضاً متسقاً للعلامة التجارية عبر كل قناة يصادف فيها الجمهور المستهدف علامتك التجارية."
      }
    }
  ]
}
</script>
HTML;
    }
};
