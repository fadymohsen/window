<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'social-media';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/social-media.webp',
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
            'title' => 'Social Media Marketing',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Social Media Management in Riyadh | Social Media Marketing Saudi Arabia | Window Advertising',
            'meta_description' => 'Social media management and marketing in Riyadh. Window Advertising creates content, manages accounts, and runs paid campaigns on Instagram, Snapchat, TikTok, and Twitter for companies across Saudi Arabia. Get a free consultation.',
            'meta_keywords' => 'social media management Riyadh, social media marketing Saudi Arabia, Instagram marketing Riyadh, Snapchat advertising Saudi Arabia, دعاية واعلان الرياض, سوشيال ميديا الرياض, تصميم فيديو, تصميم هوية, دعاية واعلان السعودية',
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
            'title' => 'تسويق السوشيال ميديا',
            'content' => $this->getArabicContent(),
            'meta_title' => 'إدارة سوشيال ميديا في الرياض | تسويق منصات التواصل السعودية | ويندو للإعلان',
            'meta_description' => 'إدارة وتسويق منصات التواصل الاجتماعي في الرياض — ويندو للإعلان يصمم المحتوى ويدير الحسابات ويشغّل الحملات المدفوعة على إنستغرام وسناب تشات وتيك توك وتويتر. دعاية واعلان الرياض. احصل على استشارة مجانية.',
            'meta_keywords' => 'سوشيال ميديا الرياض, إدارة منصات التواصل السعودية, دعاية واعلان الرياض, تصميم فيديو, تصميم هوية, دعاية واعلان السعودية, إنستغرام الرياض',
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
        $service = DB::table('services')->where('slug', 'social-media')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Saudi Arabia has one of the highest social media engagement rates in the world. Riyadh's consumer and business audiences are active daily on Snapchat, Instagram, TikTok, and Twitter — and they expect the brands they engage with to maintain a consistent, high-quality presence. Window Advertising manages social media accounts for businesses in Riyadh and across Saudi Arabia, handling content creation, account management, and paid advertising as part of a complete <a href="/en/services/digital-marketing">digital marketing</a> and communications solution.</p>

<h2>Social Media in the Saudi Market</h2>
<p>Understanding how social media works in Saudi Arabia is different from applying generic digital marketing advice. Saudi audiences use Snapchat at a level rarely seen in other markets — the Kingdom has consistently ranked among the world's top countries by per-capita Snapchat usage, and the platform is essential for any consumer brand in Riyadh trying to reach a Saudi audience.</p>
<p>Instagram is the second most important platform for visual brands, retail, hospitality, and lifestyle businesses. TikTok's growth among younger Saudi audiences makes it increasingly important for brands targeting the 18 to 35 demographic. Twitter remains significant for corporate communications and public discourse.</p>
<p>Window Advertising recommends the right platform combination for each client based on the specific audience profile, business type, and campaign objectives — not a template applied uniformly.</p>

<h2>Content Creation for Saudi Social Media</h2>
<p>Effective social media content in Saudi Arabia needs to work in two languages — Arabic primary, English secondary — and must reflect the cultural context of the Saudi market. Window Advertising produces all social media content in-house:</p>
<p>Static graphic posts are designed with your brand's <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> as the foundation — color palette, typography, logo placement, and photography style applied consistently across every post. The design team produces a monthly set of post graphics in all required platform formats.</p>
<p>Video content for Reels, TikTok, and Snapchat is produced by our video design team. Short-form social media videos follow platform-specific creative best practices — hook within the first second, message hierarchy calibrated for mobile viewing, and a clear call-to-action.</p>
<p>Arabic copywriting for social media requires cultural sensitivity and familiarity with the colloquial Arabic used in the Saudi market. Our content team writes captions, stories, and ad copy in Gulf Arabic where appropriate — not formal Modern Standard Arabic that can feel disconnected from the Saudi social media audience.</p>

<h2>Paid Social Media Advertising in Riyadh</h2>
<p>Organic content management builds a presence over time — paid advertising accelerates reach immediately. Window Advertising manages paid social media campaigns alongside organic content management, ensuring the two work together rather than operating independently.</p>
<p>Paid Snapchat campaigns deliver video and image ads to precisely targeted Saudi audiences based on demographics, interests, and location. Snapchat's ad tools are sophisticated for the Saudi market and deliver strong results for local businesses.</p>
<p>Instagram and Facebook paid campaigns use Meta's advertising platform to reach Saudi audiences with single-image ads, carousel formats, stories, and video. Meta's targeting capabilities in Saudi Arabia allow precise audience definition by city, age, interest category, and behavior.</p>
<p>TikTok paid campaigns reach younger Saudi audiences with short-form video ads that appear within the native content feed. Window Advertising produces TikTok-native video creative rather than repurposing content from other platforms.</p>

<h2>Arabic and English Bilingual Content</h2>
<p>Every piece of content Window Advertising produces for social media management in Saudi Arabia is available in both Arabic and English. Arabic captions are the standard for consumer-facing posts targeting Saudi audiences. English is used for corporate communications, B2B content, and brands with an international dimension to their audience.</p>
<p>For brands operating in both languages, we produce parallel Arabic and English versions of each post and advise on the optimal posting strategy — whether to maintain separate Arabic and English accounts or post bilingual content on a single account.</p>

<h2>Integration with Physical Advertising Campaigns</h2>
<p>Window Advertising's positioning in Riyadh's advertising market is the integration of digital and physical advertising into a single coordinated campaign. Social media content for a product launch is designed using the same creative direction as the <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> graphics, the <a href="/en/services/banner-printing-installation">banner printing</a>, and the printed catalog — ensuring that your brand presents consistently across every channel.</p>
<p>This matters for brand recognition. When a potential client encounters your brand at an exhibition, then sees your content on Instagram, then visits your <a href="/en/services/websites">websites</a>, the experience should feel like a single coherent brand rather than three separate advertising efforts produced by different teams.</p>

<h2>Reporting and Performance Tracking</h2>
<p>Window Advertising provides monthly social media performance reports covering reach, impressions, engagement rate, follower growth, story views, and video performance across each platform. Reports are presented in Arabic or English per the client's preference and include a clear summary of what the data means and what we recommend adjusting.</p>
<p>For paid campaign elements, we provide ad spend efficiency metrics including cost per reach, cost per click, and cost per conversion where tracking is in place — allowing marketing budgets to be optimized based on actual platform performance data.</p>

<h2>Frequently Asked Questions About Social Media Management</h2>

<h3>Which social media platforms does Window Advertising manage for Saudi clients?</h3>
<p>Window Advertising manages Instagram, Snapchat, TikTok, Twitter, and LinkedIn for clients in Saudi Arabia. Snapchat is the highest-reach platform in Saudi Arabia and is often our primary recommendation for consumer-facing brands in Riyadh. Instagram is essential for visual brands and product companies. LinkedIn is recommended for B2B and corporate services. We advise on the right platform mix based on your audience and business type.</p>

<h3>Do you create the content or does the client supply it?</h3>
<p>Window Advertising creates all content in-house — design, copywriting in Arabic and English, and video production. Clients review and approve a monthly content calendar before anything is published. If the client has their own photography or video footage they want to use, we can incorporate it into the content production alongside original material we create.</p>

<h3>What is included in a social media management package?</h3>
<p>A Window Advertising social media management package includes monthly content calendar planning, graphic design and copywriting for all posts, story and reel production, scheduling and publishing, community management with response to comments and messages, and a monthly performance report. Paid advertising campaign management is available as an addition to organic content management.</p>

<h3>How many posts per month do you publish?</h3>
<p>Post frequency is agreed in the management package based on the platform and the client's content needs. Typical packages for Saudi businesses include 12 to 20 posts per month on Instagram plus daily or near-daily Stories, 5 to 10 Snapchat stories per week, and 8 to 15 Twitter posts per month. Higher-frequency packages are available for brands that require a more intensive posting schedule.</p>

<h2>Start Your Social Media Management in Riyadh</h2>
<p>Tell us your business type, current social media situation, and which platforms matter most to your audience. Our team provides a management package recommendation and content sample within 48 hours. Free consultation included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Which social media platforms does Window Advertising manage for Saudi clients?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising manages Instagram, Snapchat, TikTok, Twitter, and LinkedIn for clients in Saudi Arabia. Snapchat is the highest-reach platform in Saudi Arabia and is often our primary recommendation for consumer-facing brands in Riyadh. Instagram is essential for visual brands and product companies. LinkedIn is recommended for B2B and corporate services. We advise on the right platform mix based on your audience and business type."
      }
    },
    {
      "@type": "Question",
      "name": "Do you create the content or does the client supply it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising creates all content in-house — design, copywriting in Arabic and English, and video production. Clients review and approve a monthly content calendar before anything is published. If the client has their own photography or video footage they want to use, we can incorporate it into the content production alongside original material we create."
      }
    },
    {
      "@type": "Question",
      "name": "What is included in a social media management package?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A Window Advertising social media management package includes monthly content calendar planning, graphic design and copywriting for all posts, story and reel production, scheduling and publishing, community management with response to comments and messages, and a monthly performance report. Paid advertising campaign management is available as an addition to organic content management."
      }
    },
    {
      "@type": "Question",
      "name": "How many posts per month do you publish?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Post frequency is agreed in the management package based on the platform and the client's content needs. Typical packages for Saudi businesses include 12 to 20 posts per month on Instagram plus daily or near-daily Stories, 5 to 10 Snapchat stories per week, and 8 to 15 Twitter posts per month. Higher-frequency packages are available for brands that require a more intensive posting schedule."
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
<p>تمتلك المملكة العربية السعودية واحداً من أعلى معدلات التفاعل على وسائل التواصل الاجتماعي في العالم. جمهور المستهلكين والأعمال في الرياض نشط يومياً على سناب تشات وإنستغرام وتيك توك وتويتر — ويتوقعون من العلامات التجارية التي يتفاعلون معها الحفاظ على حضور متسق وعالي الجودة. تدير ويندو للإعلان حسابات التواصل الاجتماعي للشركات في الرياض وجميع أنحاء المملكة العربية السعودية، وتتولى إنتاج المحتوى وإدارة الحسابات والإعلانات المدفوعة كجزء من حل <a href="/ar/services/digital-marketing">تسويق رقمي</a> واتصالات متكامل.</p>

<h2>السوشيال ميديا في السوق السعودية</h2>
<p>فهم كيفية عمل وسائل التواصل الاجتماعي في المملكة العربية السعودية يختلف عن تطبيق نصائح التسويق الرقمي العامة. يستخدم الجمهور السعودي سناب تشات بمستوى نادراً ما يُشاهد في أسواق أخرى — حيث صنّفت المملكة باستمرار ضمن أعلى دول العالم في استخدام سناب تشات للفرد، والمنصة ضرورية لأي علامة تجارية استهلاكية في الرياض تسعى للوصول إلى الجمهور السعودي.</p>
<p>إنستغرام هو ثاني أهم منصة للعلامات التجارية البصرية والتجزئة والضيافة ونمط الحياة. نمو تيك توك بين الجمهور السعودي الأصغر سناً يجعله مهماً بشكل متزايد للعلامات التجارية التي تستهدف الفئة العمرية من 18 إلى 35 عاماً. يظل تويتر مهماً للاتصالات المؤسسية والنقاش العام.</p>
<p>توصي ويندو للإعلان بالمزيج المناسب من المنصات لكل عميل بناءً على ملف الجمهور المحدد ونوع العمل وأهداف الحملة — وليس قالباً يُطبق بشكل موحد.</p>

<h2>إنتاج محتوى السوشيال ميديا للسوق السعودي</h2>
<p>يحتاج محتوى وسائل التواصل الاجتماعي الفعال في المملكة العربية السعودية إلى العمل بلغتين — العربية أساسية والإنجليزية ثانوية — ويجب أن يعكس السياق الثقافي للسوق السعودي. تنتج ويندو للإعلان كل محتوى وسائل التواصل الاجتماعي داخلياً:</p>
<p>تُصمم المنشورات الثابتة مع <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> لعلامتك التجارية كأساس — لوحة الألوان والطباعة ووضع الشعار وأسلوب التصوير مطبق بشكل متسق في كل منشور. ينتج فريق التصميم مجموعة شهرية من تصاميم المنشورات بجميع أحجام المنصات المطلوبة.</p>
<p>يُنتج محتوى الفيديو للريلز وتيك توك وسناب تشات بواسطة فريق تصميم الفيديو لدينا. تتبع فيديوهات التواصل الاجتماعي القصيرة أفضل الممارسات الإبداعية الخاصة بكل منصة — جذب الانتباه خلال الثانية الأولى، وترتيب الرسالة المعاير للمشاهدة على الهاتف المحمول، ودعوة واضحة لاتخاذ إجراء.</p>
<p>تتطلب كتابة المحتوى العربي لوسائل التواصل الاجتماعي حساسية ثقافية وإلماماً بالعربية العامية المستخدمة في السوق السعودي. يكتب فريق المحتوى لدينا التعليقات والقصص ونصوص الإعلانات بالعربية الخليجية عند الاقتضاء — وليس العربية الفصحى الحديثة الرسمية التي قد تبدو منفصلة عن جمهور وسائل التواصل الاجتماعي السعودي.</p>

<h2>إعلانات السوشيال ميديا المدفوعة في الرياض</h2>
<p>تبني إدارة المحتوى العضوي حضوراً مع مرور الوقت — بينما تسرّع الإعلانات المدفوعة الوصول فوراً. تدير ويندو للإعلان حملات وسائل التواصل الاجتماعي المدفوعة إلى جانب إدارة المحتوى العضوي، مما يضمن عمل الاثنين معاً بدلاً من العمل بشكل مستقل.</p>
<p>تقدم حملات سناب تشات المدفوعة إعلانات فيديو وصور لجمهور سعودي مستهدف بدقة بناءً على الخصائص الديموغرافية والاهتمامات والموقع. أدوات إعلانات سناب تشات متطورة للسوق السعودي وتحقق نتائج قوية للشركات المحلية.</p>
<p>تستخدم حملات إنستغرام وفيسبوك المدفوعة منصة ميتا الإعلانية للوصول إلى الجمهور السعودي بإعلانات الصورة الواحدة وصيغ الكاروسيل والقصص والفيديو. تتيح إمكانيات استهداف ميتا في المملكة العربية السعودية تحديداً دقيقاً للجمهور حسب المدينة والعمر وفئة الاهتمام والسلوك.</p>
<p>تصل حملات تيك توك المدفوعة إلى الجمهور السعودي الأصغر سناً بإعلانات فيديو قصيرة تظهر ضمن تدفق المحتوى الأصلي. تنتج ويندو للإعلان محتوى فيديو أصلي لتيك توك بدلاً من إعادة استخدام محتوى من منصات أخرى.</p>

<h2>محتوى ثنائي اللغة عربي وإنجليزي</h2>
<p>كل قطعة محتوى تنتجها ويندو للإعلان لإدارة وسائل التواصل الاجتماعي في المملكة العربية السعودية متوفرة بالعربية والإنجليزية. التعليقات العربية هي المعيار للمنشورات الموجهة للمستهلكين التي تستهدف الجمهور السعودي. تُستخدم الإنجليزية للاتصالات المؤسسية ومحتوى B2B والعلامات التجارية ذات البعد الدولي في جمهورها.</p>
<p>للعلامات التجارية التي تعمل بكلتا اللغتين، ننتج نسخاً متوازية بالعربية والإنجليزية لكل منشور وننصح بأفضل استراتيجية نشر — سواء الحفاظ على حسابات منفصلة بالعربية والإنجليزية أو نشر محتوى ثنائي اللغة على حساب واحد.</p>

<h2>التكامل مع حملات الإعلان المادية</h2>
<p>موقع ويندو للإعلان في سوق الإعلان بالرياض هو دمج الإعلان الرقمي والمادي في حملة واحدة منسقة. يُصمم محتوى وسائل التواصل الاجتماعي لإطلاق منتج باستخدام نفس التوجه الإبداعي لتصاميم <a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a> و<a href="/ar/services/banner-printing-installation">طباعة البانرات</a> والكتالوج المطبوع — مما يضمن تقديم علامتك التجارية بشكل متسق عبر كل قناة.</p>
<p>هذا مهم للتعرف على العلامة التجارية. عندما يصادف عميل محتمل علامتك التجارية في معرض، ثم يرى محتواك على إنستغرام، ثم يزور <a href="/ar/services/websites">موقعك الإلكتروني</a>، يجب أن تبدو التجربة كعلامة تجارية واحدة متماسكة وليس ثلاثة جهود إعلانية منفصلة أنتجتها فرق مختلفة.</p>

<h2>التقارير ومتابعة الأداء</h2>
<p>تقدم ويندو للإعلان تقارير أداء شهرية لوسائل التواصل الاجتماعي تغطي الوصول والانطباعات ومعدل التفاعل ونمو المتابعين ومشاهدات القصص وأداء الفيديو عبر كل منصة. تُقدم التقارير بالعربية أو الإنجليزية حسب تفضيل العميل وتتضمن ملخصاً واضحاً لما تعنيه البيانات وما نوصي بتعديله.</p>
<p>لعناصر الحملات المدفوعة، نقدم مقاييس كفاءة الإنفاق الإعلاني بما في ذلك تكلفة الوصول وتكلفة النقرة وتكلفة التحويل حيث يتوفر التتبع — مما يسمح بتحسين ميزانيات التسويق بناءً على بيانات أداء المنصة الفعلية.</p>

<h2>الأسئلة الشائعة حول إدارة السوشيال ميديا</h2>

<h3>ما المنصات التي تديرها ويندو للإعلان للعملاء السعوديين؟</h3>
<p>تدير ويندو للإعلان إنستغرام وسناب تشات وتيك توك وتويتر ولينكد إن للعملاء في المملكة العربية السعودية. سناب تشات هو المنصة الأعلى وصولاً في المملكة وغالباً ما يكون توصيتنا الأساسية للعلامات التجارية الموجهة للمستهلكين في الرياض. إنستغرام ضروري للعلامات التجارية البصرية وشركات المنتجات. لينكد إن موصى به لخدمات B2B والشركات. ننصح بالمزيج المناسب من المنصات بناءً على جمهورك ونوع عملك.</p>

<h3>هل تنتجون المحتوى أم يقدمه العميل؟</h3>
<p>تنتج ويندو للإعلان كل المحتوى داخلياً — التصميم وكتابة النصوص بالعربية والإنجليزية وإنتاج الفيديو. يراجع العملاء ويعتمدون تقويم المحتوى الشهري قبل نشر أي شيء. إذا كان لدى العميل صور أو مقاطع فيديو خاصة يريد استخدامها، يمكننا دمجها في إنتاج المحتوى إلى جانب المواد الأصلية التي ننتجها.</p>

<h3>ما الذي تتضمنه باقة إدارة السوشيال ميديا؟</h3>
<p>تتضمن باقة إدارة السوشيال ميديا من ويندو للإعلان تخطيط تقويم المحتوى الشهري والتصميم الجرافيكي وكتابة النصوص لجميع المنشورات وإنتاج القصص والريلز والجدولة والنشر وإدارة المجتمع مع الرد على التعليقات والرسائل وتقرير أداء شهري. إدارة حملات الإعلانات المدفوعة متاحة كإضافة لإدارة المحتوى العضوي.</p>

<h3>كم عدد المنشورات التي تنشرونها شهرياً؟</h3>
<p>يُتفق على تكرار النشر في باقة الإدارة بناءً على المنصة واحتياجات محتوى العميل. تتضمن الباقات النموذجية للشركات السعودية من 12 إلى 20 منشوراً شهرياً على إنستغرام بالإضافة إلى قصص يومية أو شبه يومية، ومن 5 إلى 10 قصص سناب تشات أسبوعياً، ومن 8 إلى 15 تغريدة شهرياً. تتوفر باقات عالية التكرار للعلامات التجارية التي تتطلب جدول نشر أكثر كثافة.</p>

<h2>ابدأ إدارة سوشيال ميدياك في الرياض</h2>
<p>أخبرنا بنوع عملك ووضع وسائل التواصل الاجتماعي الحالي وأي المنصات الأهم لجمهورك. يقدم فريقنا توصية بباقة الإدارة ونموذج محتوى خلال 48 ساعة. استشارة مجانية مشمولة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما المنصات التي تديرها ويندو للإعلان للعملاء السعوديين؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تدير ويندو للإعلان إنستغرام وسناب تشات وتيك توك وتويتر ولينكد إن للعملاء في المملكة العربية السعودية. سناب تشات هو المنصة الأعلى وصولاً في المملكة وغالباً ما يكون توصيتنا الأساسية للعلامات التجارية الموجهة للمستهلكين في الرياض. إنستغرام ضروري للعلامات التجارية البصرية وشركات المنتجات. لينكد إن موصى به لخدمات B2B والشركات. ننصح بالمزيج المناسب من المنصات بناءً على جمهورك ونوع عملك."
      }
    },
    {
      "@type": "Question",
      "name": "هل تنتجون المحتوى أم يقدمه العميل؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج ويندو للإعلان كل المحتوى داخلياً — التصميم وكتابة النصوص بالعربية والإنجليزية وإنتاج الفيديو. يراجع العملاء ويعتمدون تقويم المحتوى الشهري قبل نشر أي شيء. إذا كان لدى العميل صور أو مقاطع فيديو خاصة يريد استخدامها، يمكننا دمجها في إنتاج المحتوى إلى جانب المواد الأصلية التي ننتجها."
      }
    },
    {
      "@type": "Question",
      "name": "ما الذي تتضمنه باقة إدارة السوشيال ميديا؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تتضمن باقة إدارة السوشيال ميديا من ويندو للإعلان تخطيط تقويم المحتوى الشهري والتصميم الجرافيكي وكتابة النصوص لجميع المنشورات وإنتاج القصص والريلز والجدولة والنشر وإدارة المجتمع مع الرد على التعليقات والرسائل وتقرير أداء شهري. إدارة حملات الإعلانات المدفوعة متاحة كإضافة لإدارة المحتوى العضوي."
      }
    },
    {
      "@type": "Question",
      "name": "كم عدد المنشورات التي تنشرونها شهرياً؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يُتفق على تكرار النشر في باقة الإدارة بناءً على المنصة واحتياجات محتوى العميل. تتضمن الباقات النموذجية للشركات السعودية من 12 إلى 20 منشوراً شهرياً على إنستغرام بالإضافة إلى قصص يومية أو شبه يومية، ومن 5 إلى 10 قصص سناب تشات أسبوعياً، ومن 8 إلى 15 تغريدة شهرياً. تتوفر باقات عالية التكرار للعلامات التجارية التي تتطلب جدول نشر أكثر كثافة."
      }
    }
  ]
}
</script>
HTML;
    }
};
