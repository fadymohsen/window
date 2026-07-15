<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'business-prints';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/business-prints.webp',
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
            'title' => 'Business Prints',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Business Prints in Riyadh | Profile, Catalog & Report Design | Window Advertising',
            'meta_description' => 'Professional business prints in Riyadh — company profiles, catalogs, brochures, annual reports, and marketing materials. Window Advertising designs and prints corporate documents for businesses across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'business prints Riyadh, company profile design Saudi Arabia, catalog design Riyadh, brochure printing Riyadh, تصميم بروفيل, تصميم كتالوج, تصميم تقرير, دعاية وإعلان الرياض',
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
            'title' => 'المطبوعات التجارية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'مطبوعات تجارية في الرياض | تصميم بروفيل وكتالوج وتقرير | ويندو للإعلان',
            'meta_description' => 'مطبوعات تجارية احترافية في الرياض — تصميم بروفيل الشركة، تصميم كتالوج، تصميم تقرير سنوي، وتصميم مواد تسويقية. ويندو للإعلان للدعاية والإعلان في السعودية. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'مطبوعات تجارية الرياض, تصميم بروفيل الرياض, تصميم كتالوج السعودية, تصميم تقرير سنوي, دعاية وإعلان الرياض, تصميم بروشور, طباعة شركات الرياض',
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
        $service = DB::table('services')->where('slug', 'business-prints')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Your printed corporate documents are representatives of your brand in every meeting room, proposal folder, and client presentation they enter. Window Advertising designs and produces the full range of business prints for companies across Riyadh and Saudi Arabia — from company profiles and product catalogs to annual reports and marketing brochures. Combined with <a href="/en/services/digital-marketing">digital marketing</a>, professionally printed materials ensure your brand communicates credibility across every channel.</p>

<h2>What Are Business Prints?</h2>
<p>Business prints encompass every printed document that a company produces to communicate with clients, partners, and stakeholders. These include company profiles, product and service catalogs, annual reports, brochures, flyers, presentation folders, and any other branded printed material used in day-to-day business operations.</p>
<p>In Saudi Arabia's corporate environment, high-quality business prints remain a critical trust signal. A professionally designed and printed company profile submitted in a tender package or left after a client meeting communicates seriousness, capability, and attention to detail. Window Advertising helps companies across Riyadh present themselves at the highest standard in every printed document they produce.</p>

<h2>Company Profile Design and Printing</h2>
<p>The company profile is the most important printed document most businesses produce. It introduces the organization, communicates its values and capabilities, and presents its track record — all in a format that is designed to be persuasive, readable, and visually aligned with the brand.</p>
<p>Window Advertising designs company profiles for businesses in Riyadh covering all sectors. Our design process begins with a detailed brief, proceeds through structured content layout, and delivers a polished bilingual Arabic-English document ready for print. Print finishes including soft-touch lamination, spot UV, and gold foil are available to create a premium impression. Our <a href="/en/services/profile-design-printing">profile design and printing</a> service covers every step from concept to delivery. Every company profile we produce is aligned with your <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> to ensure brand consistency across all materials.</p>

<h2>Catalog Design and Printing</h2>
<p>Product and service catalogs are essential for any business that presents a range of offerings to clients or resellers. A well-organized, visually compelling catalog makes the buying decision easier and positions your brand as a professional, reliable supplier.</p>
<p>Window Advertising designs and prints product catalogs for retail businesses, manufacturers, construction companies, and service providers across Saudi Arabia. Our catalog design service includes product photography layout, price list integration, category structure, and bilingual text — delivered in print-ready format and printed to your required quantity.</p>

<h2>Annual Report and Corporate Report Design</h2>
<p>Annual reports and corporate reports communicate performance, transparency, and organizational credibility to shareholders, clients, and government stakeholders. These documents demand the highest standard of design — clear data visualization, structured narrative flow, and a print finish that conveys professionalism.</p>
<p>Window Advertising designs annual reports and corporate reports for companies in Riyadh, handling everything from infographic design and data visualization to final print production. Both Arabic and English versions are produced to the same design standard, with bilingual layouts available where required.</p>

<h2>Brochures, Flyers, and Marketing Collateral</h2>
<p>Beyond the major corporate documents, businesses in Riyadh rely on a continuous supply of printed marketing collateral for campaigns, events, and client communications. Window Advertising produces the full range:</p>
<p>Brochures present a specific service, product line, or company division in a focused, leave-behind format. Tri-fold, bi-fold, and multi-page brochures are all available with premium lamination finishes. Flyers are the workhorse of event and retail marketing — fast to produce, cost-effective at volume, and effective when distributed at exhibitions, conferences, and branch locations. Complement your printed collateral with professional <a href="/en/services/business-cards">business cards</a> and large-format <a href="/en/services/banner-printing-installation">banner printing</a> for a complete brand presence at every touchpoint. Presentation folders keep proposals and documents organized and branded, ensuring everything the client receives arrives in packaging that reinforces your professionalism.</p>

<h2>Premium Print Finishes Available in Riyadh</h2>
<p>The finishing of a printed document is what separates a standard print from a premium brand asset. Window Advertising offers a full menu of print finishes through our in-house and partner production:</p>
<p>Gloss lamination produces a high-shine surface that makes colors pop and protects the document. Matte lamination creates an understated, elegant finish preferred for premium corporate documents. Soft-touch coating adds a velvet-like tactile quality that makes a document feel luxurious to handle. Spot UV applies a clear gloss coating to selected design elements, creating a contrast between matte and gloss surfaces. Embossing and foil stamping add physical texture and metallic accents to covers and logos, communicating premium quality at the moment of first contact.</p>

<h2>Frequently Asked Questions About Business Prints</h2>

<h3>What business print services does Window Advertising offer?</h3>
<p>Window Advertising designs and prints a full range of corporate documents: company profiles, product and service catalogs, annual reports, brochures, flyers, presentation folders, business cards, letterheads, and marketing collateral. Both design-only and design-plus-print services are available.</p>

<h3>Can Window Advertising design our company profile from scratch?</h3>
<p>Yes. Our design team creates company profiles from scratch based on your brand guidelines, service descriptions, and photography. We handle layout, typography, infographics, and bilingual Arabic-English versions. A complete company profile design and print service is available for businesses in Riyadh.</p>

<h3>Do you offer bilingual Arabic and English business prints?</h3>
<p>Yes. All business print documents from Window Advertising are available in bilingual Arabic-English format, Arabic-only, or English-only versions. Our design team is experienced in handling right-to-left Arabic typography alongside left-to-right English in the same document.</p>

<h3>What print finishes are available for business documents?</h3>
<p>Window Advertising offers premium print finishes including gloss lamination, matte lamination, soft-touch coating, spot UV, embossing, debossing, and foil stamping. These finishes elevate the quality and perceived value of corporate documents such as company profiles and annual reports.</p>

<h3>How long does it take to design and print a company profile in Riyadh?</h3>
<p>The typical timeline for a company profile design and print is 7 to 14 business days depending on the number of pages, revision rounds, and finishing requirements. Rush production is available. We confirm your delivery date at the time of order.</p>

<h2>Request a Business Print Quote</h2>
<p>Tell us the document type, page count, print quantity, and any finishing requirements. Our design and print team will respond within 24 hours with a detailed quote. Design-only, print-only, and full design-plus-print packages are all available.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What business print services does Window Advertising offer?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising designs and prints a full range of corporate documents: company profiles, product and service catalogs, annual reports, brochures, flyers, presentation folders, business cards, letterheads, and marketing collateral. Both design-only and design-plus-print services are available."
      }
    },
    {
      "@type": "Question",
      "name": "Can Window Advertising design our company profile from scratch?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Our design team creates company profiles from scratch based on your brand guidelines, service descriptions, and photography. We handle layout, typography, infographics, and bilingual Arabic-English versions. A complete company profile design and print service is available for businesses in Riyadh."
      }
    },
    {
      "@type": "Question",
      "name": "Do you offer bilingual Arabic and English business prints?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. All business print documents from Window Advertising are available in bilingual Arabic-English format, Arabic-only, or English-only versions. Our design team is experienced in handling right-to-left Arabic typography alongside left-to-right English in the same document."
      }
    },
    {
      "@type": "Question",
      "name": "What print finishes are available for business documents?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising offers premium print finishes including gloss lamination, matte lamination, soft-touch coating, spot UV, embossing, debossing, and foil stamping. These finishes elevate the quality and perceived value of corporate documents such as company profiles and annual reports."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to design and print a company profile in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The typical timeline for a company profile design and print is 7 to 14 business days depending on the number of pages, revision rounds, and finishing requirements. Rush production is available. We confirm your delivery date at the time of order."
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
<p>وثائقك المؤسسية المطبوعة هي ممثلو علامتك التجارية في كل قاعة اجتماعات وملف عروض وعرض تقديمي للعملاء. تصمم ويندو للإعلان وتنتج المجموعة الكاملة من المطبوعات التجارية للشركات في جميع أنحاء الرياض والمملكة العربية السعودية — من بروفيلات الشركات وكتالوجات المنتجات إلى التقارير السنوية والبروشورات التسويقية. بالتكامل مع <a href="/ar/services/digital-marketing">التسويق الرقمي</a>، تضمن المواد المطبوعة الاحترافية أن علامتك التجارية تنقل المصداقية عبر كل قناة.</p>

<h2>ما هي المطبوعات التجارية؟</h2>
<p>تشمل المطبوعات التجارية كل وثيقة مطبوعة تنتجها الشركة للتواصل مع العملاء والشركاء وأصحاب المصلحة. تتضمن بروفيلات الشركات، وكتالوجات المنتجات والخدمات، والتقارير السنوية، والبروشورات، والفلايرات، ومجلدات العروض التقديمية، وأي مواد مطبوعة أخرى تحمل العلامة التجارية وتُستخدم في العمليات اليومية.</p>
<p>في بيئة الأعمال السعودية، تظل المطبوعات التجارية عالية الجودة إشارة ثقة حاسمة. بروفيل شركة مصمم ومطبوع باحترافية يُقدَّم في حزمة مناقصة أو يُترك بعد اجتماع مع العميل ينقل الجدية والقدرة والاهتمام بالتفاصيل. تساعد ويندو للإعلان الشركات في جميع أنحاء الرياض على تقديم نفسها بأعلى مستوى في كل وثيقة مطبوعة تنتجها.</p>

<h2>تصميم وطباعة بروفيل الشركة</h2>
<p>بروفيل الشركة هو أهم وثيقة مطبوعة تنتجها معظم الشركات. يقدم المؤسسة، وينقل قيمها وقدراتها، ويعرض سجلها — كل ذلك بتنسيق مصمم ليكون مقنعاً وقابلاً للقراءة ومتوافقاً بصرياً مع العلامة التجارية.</p>
<p>تصمم ويندو للإعلان بروفيلات الشركات للأعمال في الرياض بجميع القطاعات. تبدأ عملية التصميم لدينا بملخص تفصيلي، وتمر عبر تخطيط محتوى منظم، وتقدم وثيقة ثنائية اللغة عربية-إنجليزية مصقولة جاهزة للطباعة. تتوفر تشطيبات الطباعة بما في ذلك التغليف الناعم والأشعة فوق البنفسجية الموضعية والرقائق الذهبية لخلق انطباع فاخر. تغطي خدمة <a href="/ar/services/profile-design-printing">تصميم وطباعة البروفيل</a> لدينا كل خطوة من المفهوم إلى التسليم. كل بروفيل شركة ننتجه متوافق مع <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> لضمان اتساق العلامة التجارية عبر جميع المواد.</p>

<h2>تصميم وطباعة الكتالوج</h2>
<p>كتالوجات المنتجات والخدمات ضرورية لأي عمل يقدم مجموعة من العروض للعملاء أو الموزعين. كتالوج منظم جيداً وجذاب بصرياً يسهّل قرار الشراء ويضع علامتك التجارية كمورد محترف وموثوق.</p>
<p>تصمم ويندو للإعلان وتطبع كتالوجات المنتجات للشركات التجارية والمصنعين وشركات البناء ومقدمي الخدمات في جميع أنحاء المملكة العربية السعودية. تشمل خدمة تصميم الكتالوج لدينا تخطيط تصوير المنتجات، وتكامل قوائم الأسعار، وهيكل الفئات، والنص ثنائي اللغة — يُسلَّم بتنسيق جاهز للطباعة ويُطبع بالكمية المطلوبة.</p>

<h2>تصميم التقرير السنوي والتقارير الشركاتية</h2>
<p>التقارير السنوية والتقارير الشركاتية تنقل الأداء والشفافية والمصداقية المؤسسية للمساهمين والعملاء وأصحاب المصلحة الحكوميين. تتطلب هذه الوثائق أعلى معايير التصميم — تصور بيانات واضح، وتدفق سردي منظم، وتشطيب طباعة ينقل الاحترافية.</p>
<p>تصمم ويندو للإعلان التقارير السنوية والتقارير الشركاتية للشركات في الرياض، وتتولى كل شيء من تصميم الإنفوجرافيك وتصور البيانات إلى الإنتاج النهائي للطباعة. تُنتج النسختان العربية والإنجليزية بنفس معيار التصميم، مع توفر تخطيطات ثنائية اللغة حسب الحاجة.</p>

<h2>البروشورات والفلايرز والمواد التسويقية</h2>
<p>إلى جانب الوثائق المؤسسية الرئيسية، تعتمد الشركات في الرياض على إمداد مستمر من المواد التسويقية المطبوعة للحملات والفعاليات والتواصل مع العملاء. تنتج ويندو للإعلان المجموعة الكاملة:</p>
<p>البروشورات تقدم خدمة محددة أو خط منتجات أو قسم شركة بتنسيق مركز يُترك مع العميل. تتوفر البروشورات ثلاثية الطي وثنائية الطي ومتعددة الصفحات بتشطيبات تغليف فاخرة. الفلايرات هي العمود الفقري لتسويق الفعاليات والتجزئة — سريعة الإنتاج واقتصادية بالكميات وفعالة عند توزيعها في المعارض والمؤتمرات والفروع. أكمل موادك المطبوعة بـ<a href="/ar/services/business-cards">بطاقات الأعمال</a> الاحترافية و<a href="/ar/services/banner-printing-installation">طباعة البانرات</a> بالأحجام الكبيرة لحضور متكامل للعلامة التجارية في كل نقطة تواصل. مجلدات العروض التقديمية تحافظ على تنظيم المقترحات والوثائق وعلامتها التجارية، مما يضمن أن كل ما يتلقاه العميل يصل في تغليف يعزز احترافيتك.</p>

<h2>تشطيبات الطباعة الفاخرة المتوفرة في الرياض</h2>
<p>تشطيب الوثيقة المطبوعة هو ما يفصل الطباعة العادية عن الأصول المؤسسية الفاخرة. تقدم ويندو للإعلان قائمة كاملة من تشطيبات الطباعة عبر إنتاجنا الداخلي وشركائنا:</p>
<p>التغليف اللامع ينتج سطحاً عالي اللمعان يجعل الألوان تبرز ويحمي الوثيقة. التغليف غير اللامع يخلق تشطيباً أنيقاً ومتواضعاً مفضلاً للوثائق المؤسسية الفاخرة. الطلاء الناعم يضيف جودة لمسية شبيهة بالمخمل تجعل الوثيقة فاخرة عند التعامل معها. الأشعة فوق البنفسجية الموضعية تطبق طلاءً لامعاً شفافاً على عناصر تصميم محددة، مما يخلق تبايناً بين الأسطح غير اللامعة واللامعة. النقش البارز وختم الرقائق يضيفان ملمساً مادياً ولمسات معدنية للأغلفة والشعارات، مما ينقل الجودة الفاخرة من لحظة أول تواصل.</p>

<h2>الأسئلة الشائعة حول المطبوعات التجارية</h2>

<h3>ما خدمات المطبوعات التجارية التي تقدمها ويندو للإعلان؟</h3>
<p>تصمم ويندو للإعلان وتطبع مجموعة كاملة من الوثائق المؤسسية: بروفيلات الشركات، وكتالوجات المنتجات والخدمات، والتقارير السنوية، والبروشورات، والفلايرات، ومجلدات العروض التقديمية، وبطاقات الأعمال، والأوراق الرسمية، والمواد التسويقية. تتوفر خدمات التصميم فقط أو التصميم والطباعة معاً.</p>

<h3>هل تستطيع ويندو للإعلان تصميم بروفيل شركتنا من الصفر؟</h3>
<p>نعم. يقوم فريق التصميم لدينا بإنشاء بروفيلات الشركات من الصفر بناءً على إرشادات علامتك التجارية ووصف الخدمات والتصوير الفوتوغرافي. نتولى التخطيط والطباعة والإنفوجرافيك والنسخ ثنائية اللغة عربية-إنجليزية. تتوفر خدمة تصميم وطباعة بروفيل شركة كاملة للأعمال في الرياض.</p>

<h3>هل تقدمون مطبوعات تجارية ثنائية اللغة عربية وإنجليزية؟</h3>
<p>نعم. جميع وثائق المطبوعات التجارية من ويندو للإعلان متوفرة بتنسيق ثنائي اللغة عربية-إنجليزية، أو عربية فقط، أو إنجليزية فقط. فريق التصميم لدينا متمرس في التعامل مع الطباعة العربية من اليمين إلى اليسار جنباً إلى جنب مع الإنجليزية من اليسار إلى اليمين في نفس الوثيقة.</p>

<h3>ما تشطيبات الطباعة المتوفرة للوثائق التجارية؟</h3>
<p>تقدم ويندو للإعلان تشطيبات طباعة فاخرة تشمل التغليف اللامع، والتغليف غير اللامع، والطلاء الناعم، والأشعة فوق البنفسجية الموضعية، والنقش البارز، والنقش الغائر، وختم الرقائق. ترتقي هذه التشطيبات بجودة وقيمة الوثائق المؤسسية مثل بروفيلات الشركات والتقارير السنوية.</p>

<h3>كم يستغرق تصميم وطباعة بروفيل شركة في الرياض؟</h3>
<p>الجدول الزمني النموذجي لتصميم وطباعة بروفيل شركة هو 7 إلى 14 يوم عمل حسب عدد الصفحات وجولات المراجعة ومتطلبات التشطيب. الإنتاج السريع متوفر. نؤكد تاريخ التسليم وقت الطلب.</p>

<h2>احصل على عرض سعر للمطبوعات التجارية</h2>
<p>أخبرنا بنوع الوثيقة وعدد الصفحات وكمية الطباعة وأي متطلبات تشطيب. سيرد فريق التصميم والطباعة لدينا خلال 24 ساعة بعرض سعر مفصل. تتوفر باقات التصميم فقط والطباعة فقط والتصميم والطباعة الكاملة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما خدمات المطبوعات التجارية التي تقدمها ويندو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تصمم ويندو للإعلان وتطبع مجموعة كاملة من الوثائق المؤسسية: بروفيلات الشركات، وكتالوجات المنتجات والخدمات، والتقارير السنوية، والبروشورات، والفلايرات، ومجلدات العروض التقديمية، وبطاقات الأعمال، والأوراق الرسمية، والمواد التسويقية. تتوفر خدمات التصميم فقط أو التصميم والطباعة معاً."
      }
    },
    {
      "@type": "Question",
      "name": "هل تستطيع ويندو للإعلان تصميم بروفيل شركتنا من الصفر؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. يقوم فريق التصميم لدينا بإنشاء بروفيلات الشركات من الصفر بناءً على إرشادات علامتك التجارية ووصف الخدمات والتصوير الفوتوغرافي. نتولى التخطيط والطباعة والإنفوجرافيك والنسخ ثنائية اللغة عربية-إنجليزية. تتوفر خدمة تصميم وطباعة بروفيل شركة كاملة للأعمال في الرياض."
      }
    },
    {
      "@type": "Question",
      "name": "هل تقدمون مطبوعات تجارية ثنائية اللغة عربية وإنجليزية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. جميع وثائق المطبوعات التجارية من ويندو للإعلان متوفرة بتنسيق ثنائي اللغة عربية-إنجليزية، أو عربية فقط، أو إنجليزية فقط. فريق التصميم لدينا متمرس في التعامل مع الطباعة العربية من اليمين إلى اليسار جنباً إلى جنب مع الإنجليزية من اليسار إلى اليمين في نفس الوثيقة."
      }
    },
    {
      "@type": "Question",
      "name": "ما تشطيبات الطباعة المتوفرة للوثائق التجارية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تقدم ويندو للإعلان تشطيبات طباعة فاخرة تشمل التغليف اللامع، والتغليف غير اللامع، والطلاء الناعم، والأشعة فوق البنفسجية الموضعية، والنقش البارز، والنقش الغائر، وختم الرقائق. ترتقي هذه التشطيبات بجودة وقيمة الوثائق المؤسسية مثل بروفيلات الشركات والتقارير السنوية."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق تصميم وطباعة بروفيل شركة في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الجدول الزمني النموذجي لتصميم وطباعة بروفيل شركة هو 7 إلى 14 يوم عمل حسب عدد الصفحات وجولات المراجعة ومتطلبات التشطيب. الإنتاج السريع متوفر. نؤكد تاريخ التسليم وقت الطلب."
      }
    }
  ]
}
</script>
HTML;
    }
};
