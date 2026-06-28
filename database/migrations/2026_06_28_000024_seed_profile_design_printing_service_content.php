<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'profile-design-printing';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/profile-design-printing.webp',
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
            'title' => 'Profile Design and Printing',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Profile Design and Printing in Riyadh | Company Profile Saudi Arabia | Window Advertising',
            'meta_description' => 'Company profile design and printing in Riyadh. Window Advertising designs and prints professional company profiles, catalogs, and annual reports for businesses across Saudi Arabia. Brand identity and advertising print solutions. Get a free quote.',
            'meta_keywords' => 'company profile design Riyadh, profile printing Saudi Arabia, catalog design Riyadh, annual report design Saudi Arabia, تصميم بروفيل الرياض, تصميم كتالوج, تصميم تقرير, تصميم هوية, دعاية واعلان الرياض, دعاية واعلان السعودية',
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
            'title' => 'تصميم وطباعة بروفيل الشركات',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تصميم بروفيل وطباعته في الرياض | بروفيل شركات السعودية | وينوو للإعلان',
            'meta_description' => 'تصميم وطباعة بروفيل شركات في الرياض — وينوو للإعلان يصمم ويطبع بروفيلات شركاتية احترافية وكتالوجات وتقارير سنوية للشركات في السعودية. دعاية واعلان الرياض وتصميم هوية متكامل. احصل على عرض سعر.',
            'meta_keywords' => 'تصميم بروفيل الرياض, طباعة بروفيل السعودية, دعاية واعلان الرياض, تصميم كتالوج, تصميم تقرير, تصميم هوية, دعاية واعلان السعودية, بروفيل شركة الرياض',
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
        $service = DB::table('services')->where('slug', 'profile-design-printing')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A company profile is the single most important printed advertising document your business produces in Saudi Arabia. It is the document that closes the gap between a first impression and a formal proposal — presenting your company's identity, capabilities, and track record to potential clients, government entities, and business partners in a format designed to communicate credibility and professionalism. Window Advertising designs and prints company profiles for businesses across Riyadh and Saudi Arabia, integrating this work with the wider <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> and advertising system.</p>

<h2>The Role of a Company Profile in Saudi Business</h2>
<p>In Saudi Arabia's corporate culture, meetings and business relationships are built on trust established before the first conversation. The company profile is the document that either builds or undermines that trust — a professionally designed, well-written profile communicates organizational maturity and investment in the company's presentation, while a poor-quality or outdated profile communicates the opposite.</p>
<p>Company profiles are presented at initial client meetings, distributed at exhibitions and trade shows, submitted alongside government tender applications, and sent digitally ahead of introductory calls. Window Advertising produces company profiles as part of a complete advertising and brand identity package — ensuring the profile is consistent with <a href="/en/services/websites">websites</a>, <a href="/en/services/business-cards">business cards</a>, presentation slides, and all other branded materials.</p>

<h2>What a Company Profile Should Include</h2>
<p>An effective Saudi company profile for Riyadh's corporate market includes a structured set of sections, each serving a specific purpose in building the reader's confidence:</p>
<p>The company overview provides the organization's founding story, mission, and key facts — establishing who the company is and what it stands for in concise, clear language.</p>
<p>Services and capabilities outline what the company does in enough detail for the reader to assess relevance to their own requirements, without overwhelming with technical detail.</p>
<p>Portfolio and past projects demonstrate that the company has delivered on its promises before — specific projects, client names (where permission is given), and outcomes are more persuasive than general claims.</p>
<p>Team and leadership introduce the people behind the organization — key executives and department heads with photographs and brief professional summaries.</p>
<p>Certifications and credentials list relevant industry certifications, government registrations, and quality management systems that validate the company's compliance and capability level.</p>
<p>Contact information closes the profile with complete contact details, location map, and website.</p>

<h2>Catalog and Report Design</h2>
<p>Beyond company profiles, Window Advertising designs and prints the full range of corporate <a href="/en/services/business-prints">business prints</a>:</p>
<p>Product catalogs present a company's product range in a structured, visually rich format. Catalog design requires careful organization of product information, pricing, specifications, and photography into a layout that is both easy to navigate and visually compelling. Window Advertising designs catalogs that work as advertising tools — not just product lists, but documents that sell.</p>
<p>Annual reports and sustainability reports are formal documents required by listed companies, government entities, and organizations that report to stakeholders. Our design team produces annual reports that present financial and operational information in a professional format that reflects the organization's stature.</p>
<p>Technical brochures and service documents present specific service offerings in a concise, professional format for distribution at meetings and events.</p>

<h2>Bilingual Profile Design for Saudi Companies</h2>
<p>A company profile for the Saudi market must work effectively in both Arabic and English. Window Advertising designs bilingual company profiles with a unified visual language that works correctly in both reading directions — Arabic pages read right-to-left, English pages read left-to-right, and the visual system accommodates both without compromise.</p>
<p>Our Arabic typesetting for profile design uses appropriately selected Arabic typefaces at the correct weight and size for the body text, headings, and infographic elements. The Arabic version is designed as a genuine Arabic-language document, not a translated version of an English layout.</p>

<h2>Print Quality and Finishing</h2>
<p>The physical quality of a printed company profile communicates as much as its content. Window Advertising prints company profiles on high-quality coated stock with precise color reproduction that honors the brand's identity standards. Cover finishing options include soft-touch matte lamination, gloss lamination, spot UV coating on logos and key design elements, and foil stamping for premium brand presentations.</p>
<p>Binding options include saddle-stitching for profiles up to 48 pages, perfect binding for catalogs and annual reports of 50 pages or more, and hardcover binding for flagship brand books and prestige documents. For projects requiring visual prototyping before print, we also offer <a href="/en/services/3d-designs">3D designs</a> to preview the finished product.</p>

<h2>Frequently Asked Questions About Profile Design and Printing</h2>

<h3>What is a company profile and why does my business need one?</h3>
<p>A company profile is a printed or digital document that presents your business to potential clients, partners, and government entities — covering your company's history, services, team, portfolio, certifications, and contact information in a professionally designed format. In Saudi Arabia's corporate market, a company profile is often the first detailed document a potential client reviews before a meeting, and its quality reflects directly on the company's professionalism.</p>

<h3>Do you design the profile or only print it?</h3>
<p>Window Advertising provides both design and printing. Our design team handles the full profile design from content structure and layout to typography, imagery, and infographics. We work with your content or can help you develop the written content for the profile. Once the design is approved, we manage printing to the specification required.</p>

<h3>Can the profile be produced in both Arabic and English?</h3>
<p>Yes. Window Advertising produces company profiles in bilingual Arabic-English format — either as a single document with both languages, or as separate Arabic and English versions of the same design. Arabic typesetting and layout are handled in-house. Both versions share the same visual identity, imagery, and brand standards.</p>

<h3>What finish options are available for printed profiles?</h3>
<p>Window Advertising offers company profiles in a range of finishing options: softcover with gloss or matte lamination, hardcover with spot UV coating, perfect binding for thick catalogs, saddle-stitched binding for shorter documents, and spiral or wire-o binding for technical documents and reports. Spot UV on the cover logo is a popular premium finish for Saudi corporate profiles.</p>

<h2>Order Company Profile Design in Riyadh</h2>
<p>Tell us the number of pages required, your content status, and your target print quantity and deadline. Our team provides a design proposal and pricing within 48 hours. Full design, print, and delivery coordination included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is a company profile and why does my business need one?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A company profile is a printed or digital document that presents your business to potential clients, partners, and government entities — covering your company's history, services, team, portfolio, certifications, and contact information in a professionally designed format. In Saudi Arabia's corporate market, a company profile is often the first detailed document a potential client reviews before a meeting, and its quality reflects directly on the company's professionalism."
      }
    },
    {
      "@type": "Question",
      "name": "Do you design the profile or only print it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising provides both design and printing. Our design team handles the full profile design from content structure and layout to typography, imagery, and infographics. We work with your content or can help you develop the written content for the profile. Once the design is approved, we manage printing to the specification required."
      }
    },
    {
      "@type": "Question",
      "name": "Can the profile be produced in both Arabic and English?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising produces company profiles in bilingual Arabic-English format — either as a single document with both languages, or as separate Arabic and English versions of the same design. Arabic typesetting and layout are handled in-house. Both versions share the same visual identity, imagery, and brand standards."
      }
    },
    {
      "@type": "Question",
      "name": "What finish options are available for printed profiles?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising offers company profiles in a range of finishing options: softcover with gloss or matte lamination, hardcover with spot UV coating, perfect binding for thick catalogs, saddle-stitched binding for shorter documents, and spiral or wire-o binding for technical documents and reports. Spot UV on the cover logo is a popular premium finish for Saudi corporate profiles."
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
<p>البروفيل الشركاتي هو أهم وثيقة إعلانية مطبوعة تنتجها شركتك في المملكة العربية السعودية. إنه المستند الذي يسد الفجوة بين الانطباع الأول والعرض الرسمي — يقدم هوية شركتك وقدراتها وسجلها للعملاء المحتملين والجهات الحكومية وشركاء الأعمال بتنسيق مصمم لتوصيل المصداقية والاحترافية. وينوو للإعلان يصمم ويطبع بروفيلات الشركات للأعمال في جميع أنحاء الرياض والمملكة العربية السعودية، مع دمج هذا العمل ضمن منظومة <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> والدعاية والإعلان الشاملة.</p>

<h2>دور البروفيل الشركاتي في بيئة الأعمال السعودية</h2>
<p>في الثقافة المؤسسية السعودية، تُبنى الاجتماعات والعلاقات التجارية على ثقة تُؤسَّس قبل المحادثة الأولى. البروفيل الشركاتي هو المستند الذي إما يبني هذه الثقة أو يقوّضها — بروفيل مصمم باحترافية ومكتوب بعناية يعكس نضج المنظمة واستثمارها في تقديم نفسها، بينما بروفيل رديء الجودة أو قديم يوصل الرسالة العكسية.</p>
<p>تُقدَّم البروفيلات في الاجتماعات الأولى مع العملاء، وتُوزَّع في المعارض والفعاليات التجارية، وتُرفق مع طلبات المناقصات الحكومية، وتُرسل رقمياً قبل المكالمات التعريفية. وينوو للإعلان ينتج بروفيلات الشركات كجزء من حزمة دعاية وإعلان وهوية تجارية متكاملة — لضمان اتساق البروفيل مع <a href="/ar/services/websites">الموقع الإلكتروني</a> و<a href="/ar/services/business-cards">بطاقات الأعمال</a> وشرائح العروض التقديمية وجميع المواد المؤسسية الأخرى.</p>

<h2>ما الذي يجب أن يتضمنه البروفيل الشركاتي؟</h2>
<p>البروفيل الشركاتي الفعّال لسوق الرياض المؤسسي يتضمن مجموعة منظمة من الأقسام، كل منها يخدم غرضاً محدداً في بناء ثقة القارئ:</p>
<p>نبذة عن الشركة تقدم قصة تأسيس المنظمة ورسالتها وحقائقها الرئيسية — تحدد من هي الشركة وما تمثله بلغة موجزة وواضحة.</p>
<p>الخدمات والقدرات توضح ما تقوم به الشركة بتفصيل كافٍ ليقيّم القارئ مدى ملاءمتها لاحتياجاته، دون إغراقه بالتفاصيل التقنية.</p>
<p>المحفظة والمشاريع السابقة تُثبت أن الشركة قد أوفت بوعودها سابقاً — المشاريع المحددة وأسماء العملاء (بإذنهم) والنتائج أكثر إقناعاً من الادعاءات العامة.</p>
<p>الفريق والقيادة يعرّفان بالأشخاص خلف المنظمة — المدراء التنفيذيون ورؤساء الأقسام بصورهم وملخصاتهم المهنية المختصرة.</p>
<p>الشهادات والاعتمادات تسرد شهادات الصناعة ذات الصلة والتسجيلات الحكومية وأنظمة إدارة الجودة التي تؤكد مستوى امتثال الشركة وقدراتها.</p>
<p>معلومات الاتصال تختتم البروفيل ببيانات الاتصال الكاملة وخريطة الموقع والموقع الإلكتروني.</p>

<h2>تصميم الكتالوجات والتقارير</h2>
<p>إلى جانب بروفيلات الشركات، يصمم ويطبع وينوو للإعلان النطاق الكامل من <a href="/ar/services/business-prints">المطبوعات التجارية</a> المؤسسية:</p>
<p>كتالوجات المنتجات تعرض مجموعة منتجات الشركة بتنسيق منظم وغني بصرياً. تصميم الكتالوج يتطلب تنظيماً دقيقاً لمعلومات المنتجات والأسعار والمواصفات والتصوير في تخطيط سهل التصفح وجذاب بصرياً. وينوو للإعلان يصمم كتالوجات تعمل كأدوات إعلانية — ليست مجرد قوائم منتجات، بل وثائق تبيع.</p>
<p>التقارير السنوية وتقارير الاستدامة هي وثائق رسمية مطلوبة من الشركات المدرجة والجهات الحكومية والمنظمات التي تقدم تقاريرها لأصحاب المصلحة. فريق التصميم لدينا ينتج تقارير سنوية تقدم المعلومات المالية والتشغيلية بتنسيق احترافي يعكس مكانة المنظمة.</p>
<p>الكتيبات التقنية ووثائق الخدمات تقدم عروض خدمات محددة بتنسيق موجز واحترافي للتوزيع في الاجتماعات والفعاليات.</p>

<h2>تصميم بروفيل ثنائي اللغة للشركات السعودية</h2>
<p>بروفيل الشركة للسوق السعودي يجب أن يعمل بفعالية باللغتين العربية والإنجليزية. وينوو للإعلان يصمم بروفيلات شركات ثنائية اللغة بلغة بصرية موحدة تعمل بشكل صحيح في كلا اتجاهي القراءة — الصفحات العربية تُقرأ من اليمين إلى اليسار، والصفحات الإنجليزية تُقرأ من اليسار إلى اليمين، والنظام البصري يستوعب كليهما دون تنازل.</p>
<p>التنضيد العربي لدينا في تصميم البروفيلات يستخدم خطوطاً عربية مختارة بعناية بالوزن والحجم المناسبين للنص الأساسي والعناوين وعناصر الإنفوجرافيك. النسخة العربية مصممة كوثيقة عربية أصيلة، وليست نسخة مترجمة من تخطيط إنجليزي.</p>

<h2>جودة الطباعة والتشطيب</h2>
<p>الجودة المادية للبروفيل المطبوع تتحدث بقدر ما يتحدث محتواه. وينوو للإعلان يطبع بروفيلات الشركات على ورق مطلي عالي الجودة مع استنساخ دقيق للألوان يحترم معايير هوية العلامة التجارية. خيارات تشطيب الغلاف تشمل التغليف المطفأ اللمسي الناعم، والتغليف اللامع، وطلاء UV الموضعي على الشعارات وعناصر التصميم الرئيسية، والطبع بالرقائق المعدنية للعروض التقديمية الفاخرة.</p>
<p>خيارات التجليد تشمل الدبوس المعدني للبروفيلات حتى 48 صفحة، والتجليد المثالي للكتالوجات والتقارير السنوية من 50 صفحة فأكثر، والتجليد الصلب لكتب العلامة التجارية الرائدة والوثائق الفاخرة. للمشاريع التي تتطلب نماذج بصرية قبل الطباعة، نقدم أيضاً <a href="/ar/services/3d-designs">تصاميم ثلاثية الأبعاد</a> لمعاينة المنتج النهائي.</p>

<h2>الأسئلة الشائعة حول تصميم وطباعة البروفيل</h2>

<h3>ما هو البروفيل الشركاتي ولماذا تحتاج شركتي إلى واحد؟</h3>
<p>البروفيل الشركاتي هو وثيقة مطبوعة أو رقمية تقدم أعمالك للعملاء المحتملين والشركاء والجهات الحكومية — تغطي تاريخ شركتك وخدماتها وفريقها ومحفظة أعمالها وشهاداتها ومعلومات الاتصال بتنسيق مصمم باحترافية. في السوق المؤسسي السعودي، غالباً ما يكون البروفيل الشركاتي أول وثيقة تفصيلية يراجعها العميل المحتمل قبل الاجتماع، وجودته تنعكس مباشرة على احترافية الشركة.</p>

<h3>هل تصممون البروفيل فقط أم تطبعونه أيضاً؟</h3>
<p>وينوو للإعلان يقدم التصميم والطباعة معاً. فريق التصميم لدينا يتولى تصميم البروفيل الكامل من هيكلة المحتوى والتخطيط إلى الطباعة والصور والإنفوجرافيك. نعمل مع محتواك أو يمكننا مساعدتك في تطوير المحتوى المكتوب للبروفيل. بمجرد اعتماد التصميم، نتولى الطباعة وفق المواصفات المطلوبة.</p>

<h3>هل يمكن إنتاج البروفيل باللغتين العربية والإنجليزية؟</h3>
<p>نعم. وينوو للإعلان ينتج بروفيلات الشركات بتنسيق ثنائي اللغة عربي-إنجليزي — إما كوثيقة واحدة بكلتا اللغتين، أو كنسختين عربية وإنجليزية منفصلتين من نفس التصميم. التنضيد والتخطيط العربي يُنفَّذ داخلياً. كلتا النسختين تتشاركان نفس الهوية البصرية والصور ومعايير العلامة التجارية.</p>

<h3>ما خيارات التشطيب المتاحة للبروفيلات المطبوعة؟</h3>
<p>وينوو للإعلان يقدم بروفيلات الشركات بمجموعة من خيارات التشطيب: غلاف ناعم مع تغليف لامع أو مطفأ، غلاف صلب مع طلاء UV موضعي، تجليد مثالي للكتالوجات السميكة، تجليد بالدبوس المعدني للوثائق القصيرة، وتجليد حلزوني أو سلكي للوثائق التقنية والتقارير. طلاء UV الموضعي على شعار الغلاف هو تشطيب فاخر شائع للبروفيلات المؤسسية السعودية.</p>

<h2>اطلب تصميم بروفيل شركتك في الرياض</h2>
<p>أخبرنا بعدد الصفحات المطلوب وحالة المحتوى لديك وكمية الطباعة والموعد المستهدف. فريقنا يقدم عرض تصميم وتسعير خلال 48 ساعة. التصميم والطباعة والتنسيق الكامل للتوصيل مشمول.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما هو البروفيل الشركاتي ولماذا تحتاج شركتي إلى واحد؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "البروفيل الشركاتي هو وثيقة مطبوعة أو رقمية تقدم أعمالك للعملاء المحتملين والشركاء والجهات الحكومية — تغطي تاريخ شركتك وخدماتها وفريقها ومحفظة أعمالها وشهاداتها ومعلومات الاتصال بتنسيق مصمم باحترافية. في السوق المؤسسي السعودي، غالباً ما يكون البروفيل الشركاتي أول وثيقة تفصيلية يراجعها العميل المحتمل قبل الاجتماع، وجودته تنعكس مباشرة على احترافية الشركة."
      }
    },
    {
      "@type": "Question",
      "name": "هل تصممون البروفيل فقط أم تطبعونه أيضاً؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "وينوو للإعلان يقدم التصميم والطباعة معاً. فريق التصميم لدينا يتولى تصميم البروفيل الكامل من هيكلة المحتوى والتخطيط إلى الطباعة والصور والإنفوجرافيك. نعمل مع محتواك أو يمكننا مساعدتك في تطوير المحتوى المكتوب للبروفيل. بمجرد اعتماد التصميم، نتولى الطباعة وفق المواصفات المطلوبة."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن إنتاج البروفيل باللغتين العربية والإنجليزية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. وينوو للإعلان ينتج بروفيلات الشركات بتنسيق ثنائي اللغة عربي-إنجليزي — إما كوثيقة واحدة بكلتا اللغتين، أو كنسختين عربية وإنجليزية منفصلتين من نفس التصميم. التنضيد والتخطيط العربي يُنفَّذ داخلياً. كلتا النسختين تتشاركان نفس الهوية البصرية والصور ومعايير العلامة التجارية."
      }
    },
    {
      "@type": "Question",
      "name": "ما خيارات التشطيب المتاحة للبروفيلات المطبوعة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "وينوو للإعلان يقدم بروفيلات الشركات بمجموعة من خيارات التشطيب: غلاف ناعم مع تغليف لامع أو مطفأ، غلاف صلب مع طلاء UV موضعي، تجليد مثالي للكتالوجات السميكة، تجليد بالدبوس المعدني للوثائق القصيرة، وتجليد حلزوني أو سلكي للوثائق التقنية والتقارير. طلاء UV الموضعي على شعار الغلاف هو تشطيب فاخر شائع للبروفيلات المؤسسية السعودية."
      }
    }
  ]
}
</script>
HTML;
    }
};
