<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'business-cards';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/business-cards.webp',
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
            'title' => 'Business Cards',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Business Cards in Riyadh | Custom Business Card Printing Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom business card design and printing in Riyadh. Window Advertising designs and prints professional business cards, luxury cards, and branded stationery for companies across Saudi Arabia. Corporate identity printing with premium finishes. Get a free quote.',
            'meta_keywords' => 'business cards Riyadh, business card printing Saudi Arabia, custom business cards Riyadh, luxury business cards Saudi Arabia, تصميم هوية الرياض, دعاية واعلان الرياض, بطاقات أعمال الرياض, دعاية واعلان السعودية, تصميم بروفيل',
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
            'title' => 'بطاقات الأعمال',
            'content' => $this->getArabicContent(),
            'meta_title' => 'بطاقات أعمال في الرياض | طباعة كروت الشركة السعودية | وينوو للإعلان',
            'meta_description' => 'تصميم وطباعة بطاقات أعمال احترافية في الرياض — وينوو للإعلان يصمم ويطبع بطاقات أعمال مخصصة وفاخرة لشركات في السعودية. تصميم هوية وطباعة شركاتية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'بطاقات أعمال الرياض, كروت شخصية السعودية, دعاية واعلان الرياض, تصميم هوية, دعاية واعلان السعودية, طباعة بطاقات الرياض',
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
        $service = DB::table('services')->where('slug', 'business-cards')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A business card is the smallest and most personal piece of branded communication a company produces — and in Saudi Arabia's relationship-driven business culture, it is often the first physical impression a new contact has of your organization. Window Advertising designs and prints business cards for companies across Riyadh and Saudi Arabia as part of a complete corporate identity and advertising print solution.</p>

<h2>Business Cards and Corporate Identity</h2>
<p>The design of a business card should be a precise expression of the corporate identity system — the same typography, color palette, logo placement, and graphic language that appears across the company's letterhead, profile, website, and signage. A business card that is inconsistent with the rest of the brand communicates a lack of attention to the details that matter in professional relationships.</p>
<p>Window Advertising designs business cards as part of the full <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> system we develop for clients, ensuring that the card is not designed in isolation but as one element of a coordinated branded stationery set — alongside <a href="/en/services/profile-design-printing">profile design and printing</a> and other corporate materials.</p>

<h2>Paper Stocks and Printing Options</h2>
<p>The quality of a business card is communicated through the weight and finish of the paper as much as through the design itself. Window Advertising prints business cards on a comprehensive range of stocks as part of our full <a href="/en/services/business-prints">business prints</a> offering:</p>
<p>Standard coated stock at 350gsm with matte or gloss lamination is the most widely used business card specification in Riyadh's corporate market. It produces sharp, accurate color reproduction and a professional, durable card that handles daily use without marking.</p>
<p>Thick premium stock at 400gsm and 600gsm with soft-touch matte lamination produces a noticeably weightier card that communicates a higher standard of quality through its physical feel. This is the preferred specification for senior management and executive cards.</p>
<p>Uncoated natural stock produces a textured, matte surface that is particularly effective for letterpress and deboss finishing — and gives the card a distinctive tactile quality that separates it from standard smooth cards.</p>
<p>Kraft and recycled stocks are available for brands that want to communicate environmental responsibility through their stationery choices.</p>

<h2>Premium Finishes for Saudi Business Cards</h2>
<p>Premium finishing elevates a business card from standard print to a tangible brand statement. Window Advertising offers:</p>
<p>Spot UV coating applies a high-gloss, raised varnish to selected design elements — typically the logo, a graphic pattern, or the cardholder's name — creating a contrast between the matte laminated base and the glossy UV element that is visually striking and physically distinctive.</p>
<p>Foil stamping applies a metallic foil — gold, silver, copper, rose gold, or colored foil — to selected elements using a heated die. Gold foil on a matte navy or black card is among the most popular premium business card specifications in Riyadh.</p>
<p>Soft-touch matte lamination produces a surface that feels like velvet to the touch — the most distinctive tactile finish available for business cards and consistently popular as a premium specification across Saudi Arabia's corporate market.</p>
<p>Edge painting applies a solid color to the card's edge, revealing a colored stripe when the card is viewed from the side. This finish is unique, visually unexpected, and creates a memorable impression when the card is picked up.</p>

<h2>Bilingual Arabic and English Business Cards</h2>
<p>In Saudi Arabia's bilingual business environment, many professionals require business cards in both Arabic and English. Window Advertising designs bilingual business cards with both languages on the same card (Arabic on one side, English on the other), or as bilingual cards with both languages presented on the front face.</p>
<p>Our Arabic typesetting for business cards uses the correct typeface, size, and layout for the Arabic text to read clearly and correctly at business card scale. Arabic name romanization is handled according to the cardholder's preference. We also produce complementary branded items such as <a href="/en/services/assorted-stamps">assorted stamps</a> to complete the corporate stationery set.</p>

<h2>Business Card Sets for Companies</h2>
<p>For companies ordering business cards for a team, Window Advertising manages the full production workflow — collecting name and title information, applying the approved template to each card, producing a digital proof set for approval, and delivering individual card boxes labeled for each team member. Corporate account pricing is available for companies ordering 500 or more business cards across multiple names.</p>

<h2>Frequently Asked Questions About Business Cards</h2>

<h3>What premium finishes are available for business cards in Riyadh?</h3>
<p>Window Advertising offers business cards with soft-touch matte lamination, high-gloss lamination, spot UV coating on logos and design elements, foil stamping in gold, silver, and rose gold, raised UV (3D) coating, letterpress debossing, and edge painting. Premium finishes are available on standard and thick card stocks including 400gsm and 600gsm options.</p>

<h3>Can you design the business card as well as print it?</h3>
<p>Yes. Window Advertising provides full design services for business cards. Our design team creates business card layouts that adhere to your corporate identity guidelines — or develops a new business card design from scratch as part of a broader corporate identity project. Bilingual Arabic-English business cards are available with both language versions on the same card or on separate sides.</p>

<h3>What is the standard business card size in Saudi Arabia?</h3>
<p>The standard business card size in Saudi Arabia is 85mm by 55mm — the same international standard used across most of the world. Window Advertising also produces square cards, folded cards, and custom-size cards for clients who want a distinctive format that stands out from the standard.</p>

<h3>How quickly can business cards be printed?</h3>
<p>Standard business cards on coated stock with matte or gloss lamination can be produced in 2 to 3 business days. Premium finishes including spot UV, foil, and soft-touch lamination require 4 to 7 business days. Specialty stocks and custom sizes may require additional time. Same-day production is available for simple standard cards in urgent situations.</p>

<h2>Order Business Cards in Riyadh</h2>
<p>Tell us the quantity, your design files or brief, and your preferred finish. Our team provides a digital proof and pricing within 24 hours. Delivery across Riyadh included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What premium finishes are available for business cards in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising offers business cards with soft-touch matte lamination, high-gloss lamination, spot UV coating on logos and design elements, foil stamping in gold, silver, and rose gold, raised UV (3D) coating, letterpress debossing, and edge painting. Premium finishes are available on standard and thick card stocks including 400gsm and 600gsm options."
      }
    },
    {
      "@type": "Question",
      "name": "Can you design the business card as well as print it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising provides full design services for business cards. Our design team creates business card layouts that adhere to your corporate identity guidelines — or develops a new business card design from scratch as part of a broader corporate identity project. Bilingual Arabic-English business cards are available with both language versions on the same card or on separate sides."
      }
    },
    {
      "@type": "Question",
      "name": "What is the standard business card size in Saudi Arabia?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The standard business card size in Saudi Arabia is 85mm by 55mm — the same international standard used across most of the world. Window Advertising also produces square cards, folded cards, and custom-size cards for clients who want a distinctive format that stands out from the standard."
      }
    },
    {
      "@type": "Question",
      "name": "How quickly can business cards be printed?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard business cards on coated stock with matte or gloss lamination can be produced in 2 to 3 business days. Premium finishes including spot UV, foil, and soft-touch lamination require 4 to 7 business days. Specialty stocks and custom sizes may require additional time. Same-day production is available for simple standard cards in urgent situations."
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
<p>بطاقة الأعمال هي أصغر وأكثر قطعة تواصل مؤسسي شخصية تنتجها الشركة — وفي بيئة الأعمال السعودية القائمة على العلاقات، غالباً ما تكون أول انطباع مادي يحصل عليه جهة اتصال جديدة عن مؤسستك. تصمم وينوو للإعلان وتطبع بطاقات أعمال للشركات في جميع أنحاء الرياض والمملكة العربية السعودية كجزء من حل متكامل للهوية المؤسسية والطباعة الإعلانية.</p>

<h2>بطاقات الأعمال والهوية الشركاتية</h2>
<p>يجب أن يكون تصميم بطاقة الأعمال تعبيراً دقيقاً عن نظام الهوية المؤسسية — نفس الخطوط ولوحة الألوان وموضع الشعار واللغة البصرية التي تظهر في ترويسة الشركة وبروفايلها وموقعها الإلكتروني ولافتاتها. بطاقة أعمال غير متسقة مع بقية العلامة التجارية تعكس عدم الاهتمام بالتفاصيل المهمة في العلاقات المهنية.</p>
<p>تصمم وينوو للإعلان بطاقات الأعمال كجزء من نظام <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> الكامل الذي نطوره للعملاء، مما يضمن أن البطاقة لا تُصمم بمعزل بل كعنصر واحد من مجموعة قرطاسية مؤسسية منسقة — إلى جانب <a href="/ar/services/profile-design-printing">تصميم وطباعة البروفايل</a> والمواد المؤسسية الأخرى.</p>

<h2>أنواع الورق وخيارات الطباعة</h2>
<p>تُنقل جودة بطاقة الأعمال من خلال وزن الورق وتشطيبه بقدر ما تُنقل من خلال التصميم نفسه. تطبع وينوو للإعلان بطاقات الأعمال على مجموعة شاملة من أنواع الورق كجزء من عروض <a href="/ar/services/business-prints">المطبوعات التجارية</a> الكاملة:</p>
<p>الورق المطلي القياسي بوزن 350 جرام مع تغليف مطفي أو لامع هو المواصفة الأكثر استخداماً لبطاقات الأعمال في سوق الشركات بالرياض. ينتج ألواناً حادة ودقيقة وبطاقة احترافية متينة تتحمل الاستخدام اليومي دون خدش.</p>
<p>الورق الفاخر السميك بوزن 400 و600 جرام مع تغليف مطفي ناعم الملمس ينتج بطاقة أثقل بشكل ملحوظ تنقل معياراً أعلى من الجودة من خلال ملمسها المادي. هذه هي المواصفة المفضلة لبطاقات الإدارة العليا والتنفيذيين.</p>
<p>الورق الطبيعي غير المطلي ينتج سطحاً محبباً ومطفياً فعالاً بشكل خاص لتشطيبات الطباعة البارزة والحفر — ويمنح البطاقة جودة لمسية مميزة تفصلها عن البطاقات الملساء القياسية.</p>
<p>أوراق الكرافت والمعاد تدويرها متوفرة للعلامات التجارية التي تريد التعبير عن المسؤولية البيئية من خلال خيارات قرطاسيتها.</p>

<h2>تشطيبات فاخرة لبطاقات الأعمال السعودية</h2>
<p>التشطيب الفاخر يرتقي ببطاقة الأعمال من طباعة قياسية إلى بيان ملموس للعلامة التجارية. تقدم وينوو للإعلان:</p>
<p>طلاء UV الموضعي يضع ورنيشاً لامعاً بارزاً على عناصر تصميم محددة — عادةً الشعار أو نمط بصري أو اسم حامل البطاقة — مما يخلق تبايناً بين القاعدة المطفية المغلفة والعنصر اللامع بطريقة لافتة بصرياً ومميزة لمسياً.</p>
<p>الطباعة بالرقائق المعدنية تضع رقائق معدنية — ذهبية أو فضية أو نحاسية أو وردية ذهبية أو ملونة — على عناصر محددة باستخدام قالب ساخن. الرقائق الذهبية على بطاقة كحلية أو سوداء مطفية من بين أكثر مواصفات بطاقات الأعمال الفاخرة شعبية في الرياض.</p>
<p>التغليف المطفي الناعم الملمس ينتج سطحاً يبدو كالمخمل عند اللمس — أكثر تشطيب لمسي تميزاً متاح لبطاقات الأعمال ويحظى بشعبية مستمرة كمواصفة فاخرة في سوق الشركات السعودي.</p>
<p>طلاء الحواف يضع لوناً صلباً على حافة البطاقة، مما يكشف عن شريط ملون عند النظر إلى البطاقة من الجانب. هذا التشطيب فريد وغير متوقع بصرياً ويخلق انطباعاً لا يُنسى عند التقاط البطاقة.</p>

<h2>بطاقات أعمال ثنائية اللغة</h2>
<p>في بيئة الأعمال السعودية ثنائية اللغة، يحتاج كثير من المحترفين إلى بطاقات أعمال بالعربية والإنجليزية. تصمم وينوو للإعلان بطاقات أعمال ثنائية اللغة بكلتا اللغتين على نفس البطاقة (العربية على جهة والإنجليزية على الأخرى)، أو كبطاقات ثنائية اللغة بكلتا اللغتين على الوجه الأمامي.</p>
<p>يستخدم التنضيد العربي لبطاقات الأعمال لدينا الخط والحجم والتخطيط الصحيح للنص العربي ليُقرأ بوضوح وصحة بمقياس بطاقة الأعمال. تتم معالجة الترجمة الصوتية للأسماء العربية وفقاً لتفضيل حامل البطاقة. كما ننتج عناصر مؤسسية مكملة مثل <a href="/ar/services/assorted-stamps">الأختام المتنوعة</a> لإكمال مجموعة القرطاسية المؤسسية.</p>

<h2>مجموعات بطاقات الأعمال للشركات</h2>
<p>للشركات التي تطلب بطاقات أعمال لفريق عمل، تدير وينوو للإعلان سير العمل الإنتاجي الكامل — جمع معلومات الأسماء والمسميات الوظيفية، وتطبيق القالب المعتمد على كل بطاقة، وإنتاج مجموعة بروفات رقمية للموافقة، وتسليم علب بطاقات فردية مُعنونة لكل عضو في الفريق. تتوفر أسعار حسابات الشركات للشركات التي تطلب 500 بطاقة أعمال أو أكثر عبر أسماء متعددة.</p>

<h2>الأسئلة الشائعة حول بطاقات الأعمال</h2>

<h3>ما التشطيبات الفاخرة المتوفرة لبطاقات الأعمال في الرياض؟</h3>
<p>تقدم وينوو للإعلان بطاقات أعمال بتغليف مطفي ناعم الملمس، وتغليف لامع عالي اللمعان، وطلاء UV موضعي على الشعارات وعناصر التصميم، وطباعة بالرقائق المعدنية بالذهبي والفضي والوردي الذهبي، وطلاء UV بارز (ثلاثي الأبعاد)، وحفر بالطباعة البارزة، وطلاء الحواف. التشطيبات الفاخرة متوفرة على أوراق البطاقات القياسية والسميكة بما في ذلك خيارات 400 و600 جرام.</p>

<h3>هل يمكنكم تصميم بطاقة الأعمال بالإضافة إلى طباعتها؟</h3>
<p>نعم. تقدم وينوو للإعلان خدمات تصميم كاملة لبطاقات الأعمال. يبتكر فريق التصميم لدينا تخطيطات بطاقات أعمال تلتزم بإرشادات هويتك المؤسسية — أو يطور تصميم بطاقة أعمال جديداً من الصفر كجزء من مشروع هوية مؤسسية أوسع. بطاقات أعمال ثنائية اللغة عربي-إنجليزي متوفرة بكلتا اللغتين على نفس البطاقة أو على وجهين منفصلين.</p>

<h3>ما المقاس القياسي لبطاقة الأعمال في السعودية؟</h3>
<p>المقاس القياسي لبطاقة الأعمال في المملكة العربية السعودية هو 85 مم في 55 مم — نفس المعيار الدولي المستخدم في معظم أنحاء العالم. تنتج وينوو للإعلان أيضاً بطاقات مربعة وبطاقات مطوية وبطاقات بمقاسات مخصصة للعملاء الذين يريدون شكلاً مميزاً يبرز عن المقاس القياسي.</p>

<h3>ما مدى سرعة طباعة بطاقات الأعمال؟</h3>
<p>يمكن إنتاج بطاقات الأعمال القياسية على ورق مطلي مع تغليف مطفي أو لامع خلال يومين إلى ثلاثة أيام عمل. التشطيبات الفاخرة بما في ذلك UV الموضعي والرقائق المعدنية والتغليف الناعم الملمس تتطلب من 4 إلى 7 أيام عمل. الأوراق الخاصة والمقاسات المخصصة قد تتطلب وقتاً إضافياً. الإنتاج في نفس اليوم متاح للبطاقات القياسية البسيطة في الحالات العاجلة.</p>

<h2>اطلب بطاقات أعمالك في الرياض</h2>
<p>أخبرنا بالكمية وملفات التصميم أو الملخص والتشطيب المفضل لديك. يقدم فريقنا بروفة رقمية وتسعيراً خلال 24 ساعة. التوصيل في جميع أنحاء الرياض مشمول.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما التشطيبات الفاخرة المتوفرة لبطاقات الأعمال في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تقدم وينوو للإعلان بطاقات أعمال بتغليف مطفي ناعم الملمس، وتغليف لامع عالي اللمعان، وطلاء UV موضعي على الشعارات وعناصر التصميم، وطباعة بالرقائق المعدنية بالذهبي والفضي والوردي الذهبي، وطلاء UV بارز (ثلاثي الأبعاد)، وحفر بالطباعة البارزة، وطلاء الحواف. التشطيبات الفاخرة متوفرة على أوراق البطاقات القياسية والسميكة بما في ذلك خيارات 400 و600 جرام."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم تصميم بطاقة الأعمال بالإضافة إلى طباعتها؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تقدم وينوو للإعلان خدمات تصميم كاملة لبطاقات الأعمال. يبتكر فريق التصميم لدينا تخطيطات بطاقات أعمال تلتزم بإرشادات هويتك المؤسسية — أو يطور تصميم بطاقة أعمال جديداً من الصفر كجزء من مشروع هوية مؤسسية أوسع. بطاقات أعمال ثنائية اللغة عربي-إنجليزي متوفرة بكلتا اللغتين على نفس البطاقة أو على وجهين منفصلين."
      }
    },
    {
      "@type": "Question",
      "name": "ما المقاس القياسي لبطاقة الأعمال في السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "المقاس القياسي لبطاقة الأعمال في المملكة العربية السعودية هو 85 مم في 55 مم — نفس المعيار الدولي المستخدم في معظم أنحاء العالم. تنتج وينوو للإعلان أيضاً بطاقات مربعة وبطاقات مطوية وبطاقات بمقاسات مخصصة للعملاء الذين يريدون شكلاً مميزاً يبرز عن المقاس القياسي."
      }
    },
    {
      "@type": "Question",
      "name": "ما مدى سرعة طباعة بطاقات الأعمال؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يمكن إنتاج بطاقات الأعمال القياسية على ورق مطلي مع تغليف مطفي أو لامع خلال يومين إلى ثلاثة أيام عمل. التشطيبات الفاخرة بما في ذلك UV الموضعي والرقائق المعدنية والتغليف الناعم الملمس تتطلب من 4 إلى 7 أيام عمل. الأوراق الخاصة والمقاسات المخصصة قد تتطلب وقتاً إضافياً. الإنتاج في نفس اليوم متاح للبطاقات القياسية البسيطة في الحالات العاجلة."
      }
    }
  ]
}
</script>
HTML;
    }
};
