<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'corporate-visual-identity-design';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/corporate-visual-identity-design.webp',
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
            'title' => 'Corporate Visual Identity Design',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Corporate Visual Identity Design in Riyadh | Brand Identity Saudi Arabia | Window Advertising',
            'meta_description' => 'Corporate visual identity design in Riyadh. Window Advertising designs complete brand identity systems for companies across Saudi Arabia — logo, brand guidelines, typography, color palette, stationery, profile, and all branded materials. Full brand identity from brief to implementation. Get a free quote.',
            'meta_keywords' => 'corporate identity design Riyadh, brand identity Saudi Arabia, logo design Riyadh, brand guidelines Saudi Arabia, visual identity Riyadh, تصميم هوية الرياض, تصميم هوية بصرية, دعاية واعلان الرياض, تصميم بروفيل, تصميم كتالوج, تصميم تقرير, تصميم فيديو, دعاية واعلان السعودية',
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
            'title' => 'تصميم الهوية البصرية الشركاتية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تصميم الهوية البصرية الشركاتية في الرياض | هوية تجارية السعودية | وينوو للإعلان',
            'meta_description' => 'تصميم هوية بصرية شركاتية متكاملة في الرياض — وينوو للإعلان يصمم أنظمة هوية بصرية متكاملة تشمل الشعار والألوان والخطوط والأدلة والقرطاسية والبروفيل لشركات السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'تصميم هوية الرياض, تصميم هوية بصرية السعودية, دعاية واعلان الرياض, تصميم شعار الرياض, تصميم بروفيل, تصميم كتالوج, تصميم تقرير, تصميم فيديو, دعاية واعلان السعودية',
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
        $service = DB::table('services')->where('slug', 'corporate-visual-identity-design')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Every organization that operates publicly in Saudi Arabia's market is, whether by intention or default, communicating a visual identity through every touchpoint — from <a href="/en/services/business-cards">business cards</a> to building signage, from <a href="/en/services/websites">websites</a> to vehicle livery, from <a href="/en/services/profile-design-printing">profile design</a> to social media. Window Advertising designs corporate visual identity systems for companies across Riyadh and Saudi Arabia that make these communications coherent, intentional, and built to serve the organization's business goals.</p>

<h2>What Corporate Visual Identity Means</h2>
<p>Corporate visual identity is the complete system of visual elements that represent an organization — the logo and its usage rules, the color palette and its application logic, the typography and its hierarchy, the graphic elements and their patterns of use. Together, these elements form a visual language that identifies the organization instantly and consistently across every medium.</p>
<p>A well-designed visual identity does not just look good — it works as an organizational asset. It enables any designer, printer, or signage fabricator working with the company's materials to reproduce the brand correctly without deviation. It ensures that a new employee's business card looks identical to the CEO's, that the exhibition booth matches the website, and that the national day gift packaging is unmistakably connected to the company that distributed it.</p>

<h2>The Visual Identity Design Process</h2>
<p>Window Advertising approaches corporate visual identity as a strategic design project — not a purely aesthetic exercise. The process begins with understanding the organization:</p>
<p>The discovery phase explores the company's positioning in its market, its target audiences, its competitive context, and the values and personality it needs to communicate. For companies in Riyadh's competitive market, understanding what differentiates the organization and what it aspires to become guides every design decision.</p>
<p>The concept development phase produces multiple distinct design directions — typically three logo concepts developed to a sufficient level of detail to evaluate their character, their scalability, and their appropriateness to the brief. These are presented with rationale, not just visuals.</p>
<p>The refinement phase develops the selected concept into a complete identity system — all logo variations, color specifications, typography, supporting graphic elements, and application demonstrations on the key materials the client uses.</p>
<p>The delivery phase provides all production-ready files in the correct formats for digital, print, and large-format use, alongside a brand guidelines document that enables correct application by any party working with the identity in the future.</p>

<h2>Identity System Components for Saudi Companies</h2>
<p>A complete corporate visual identity system for the Saudi market includes:</p>
<p><strong>Logo Design:</strong> The primary logo, alternate configurations for different contexts (horizontal, stacked, icon-only), and correct versions for dark and light backgrounds. For bilingual Saudi companies, separate Arabic and English logo lockups are developed, along with a unified bilingual version for materials where both appear together.</p>
<p><strong>Brand Color Palette:</strong> The primary brand color, secondary colors, and neutral tones with specifications in all relevant color models (HEX for digital, RGB for screen, CMYK for print, Pantone for premium print and fabrication).</p>
<p><strong>Typography System:</strong> Typefaces specified for all headings, body text, captions, and accent applications — with bilingual typeface selection that ensures Arabic text has the same quality as Latin text.</p>
<p><strong>Brand Guidelines Document:</strong> All identity elements and their correct application codified — including what not to do with each element. A clear, well-written brand guidelines document is as valuable as the design itself.</p>
<p>For clients requiring spatial and environmental brand visualization, we also develop <a href="/en/services/3d-designs">3D designs</a> that demonstrate how the identity works on signage, interiors, and physical environments.</p>

<h2>Identity Applied — Print, Digital, and Environmental</h2>
<p>The true test of a corporate identity is how it performs across the full range of media where the company appears. Window Advertising designs identities with application in mind — and implements those identities across the full media spectrum as a natural extension of the design work.</p>
<p>Print applications include <a href="/en/services/profile-design-printing">company profiles</a>, catalogs, annual reports, <a href="/en/services/business-cards">business cards</a>, stationery, and marketing materials. Digital applications include social media profile systems, email signature templates, presentation templates, <a href="/en/services/websites">website</a> visual direction, and <a href="/en/services/digital-marketing">video design</a> assets. Environmental applications include signage systems, exhibition booth design, vehicle livery, and office interior branding.</p>
<p>The advantage of working with Window Advertising on both the identity design and its implementation is that every application is produced by the team that designed the system — ensuring accurate color, correct typography, and faithful execution of the identity across every medium.</p>

<h2>Identity for Specific Saudi Market Contexts</h2>
<p>Saudi Arabia's market has specific visual communication contexts that a corporate identity system must address: national occasion branding (National Day and Founding Day materials must work coherently with the brand), government and institutional communications (formal documents and official correspondence), and Arabic-language primary communications (where the identity system must work as well in Arabic as in English).</p>
<p>Window Advertising has designed identity systems for companies across Riyadh's major sectors — construction, real estate, professional services, retail, hospitality, and government-related organizations — and understands the requirements of each context.</p>

<h2>Frequently Asked Questions About Corporate Identity Design</h2>

<h3>What does a corporate visual identity design project include?</h3>
<p>A full corporate visual identity project from Window Advertising includes: logo design (primary, secondary, and monochrome versions), brand color palette with primary and secondary colors and their specifications (HEX, RGB, CMYK, Pantone), typography system (primary and secondary typefaces for headings and body text), brand usage guidelines document, business card and stationery design, email signature template, social media profile templates, and a company profile design. Additional deliverables including signage specifications, vehicle livery, and video motion graphics are available as part of extended identity packages.</p>

<h3>How long does a corporate identity design project take?</h3>
<p>A standard corporate visual identity project takes 4 to 8 weeks from briefing to final delivery, depending on scope and the number of revision rounds. The process includes a discovery and strategy phase, initial concept presentation (typically 3 logo concepts), refinement of the selected concept, full identity system development, and final delivery of all files and guidelines. Larger identity projects with extensive deliverables may take 8 to 12 weeks.</p>

<h3>Does the identity system work for Arabic as well as English?</h3>
<p>Yes. Window Advertising designs corporate identity systems that work in both Arabic and English — this is essential for the Saudi market. Arabic type in the Saudi business environment must be carefully selected and typeset to match the quality and character of the Latin typefaces in the same system. We develop bilingual logo lockups, bilingual stationery, and guidelines that cover Arabic typography application.</p>

<h3>Can Window Advertising redesign an existing identity rather than creating a new one?</h3>
<p>Yes. Identity refresh and evolution projects are common — the goal is typically to modernize an existing identity while preserving brand equity accumulated over years. Window Advertising conducts a brand audit before beginning a redesign project to understand which elements have recognition value and should be evolved rather than discarded.</p>

<h2>Start Your Brand Identity Project in Riyadh</h2>
<p>Tell us about your organization, your market, and what you want your identity to communicate. We schedule a discovery meeting and provide a project proposal and timeline within 48 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What does a corporate visual identity design project include?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A full corporate visual identity project from Window Advertising includes: logo design (primary, secondary, and monochrome versions), brand color palette with primary and secondary colors and their specifications (HEX, RGB, CMYK, Pantone), typography system (primary and secondary typefaces for headings and body text), brand usage guidelines document, business card and stationery design, email signature template, social media profile templates, and a company profile design. Additional deliverables including signage specifications, vehicle livery, and video motion graphics are available as part of extended identity packages."
      }
    },
    {
      "@type": "Question",
      "name": "How long does a corporate identity design project take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A standard corporate visual identity project takes 4 to 8 weeks from briefing to final delivery, depending on scope and the number of revision rounds. The process includes a discovery and strategy phase, initial concept presentation (typically 3 logo concepts), refinement of the selected concept, full identity system development, and final delivery of all files and guidelines. Larger identity projects with extensive deliverables may take 8 to 12 weeks."
      }
    },
    {
      "@type": "Question",
      "name": "Does the identity system work for Arabic as well as English?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising designs corporate identity systems that work in both Arabic and English — this is essential for the Saudi market. Arabic type in the Saudi business environment must be carefully selected and typeset to match the quality and character of the Latin typefaces in the same system. We develop bilingual logo lockups, bilingual stationery, and guidelines that cover Arabic typography application."
      }
    },
    {
      "@type": "Question",
      "name": "Can Window Advertising redesign an existing identity rather than creating a new one?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Identity refresh and evolution projects are common — the goal is typically to modernize an existing identity while preserving brand equity accumulated over years. Window Advertising conducts a brand audit before beginning a redesign project to understand which elements have recognition value and should be evolved rather than discarded."
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
<p>كل مؤسسة تعمل علنياً في السوق السعودية تتواصل — سواء بقصد أو بشكل تلقائي — من خلال هوية بصرية عبر كل نقطة تماس: من <a href="/ar/services/business-cards">بطاقات العمل</a> إلى لافتات المباني، ومن <a href="/ar/services/websites">المواقع الإلكترونية</a> إلى تغليف المركبات، ومن <a href="/ar/services/profile-design-printing">تصميم البروفيل</a> إلى وسائل التواصل الاجتماعي. تصمم وينوو للإعلان أنظمة هوية بصرية شركاتية متكاملة للشركات في الرياض والمملكة العربية السعودية تجعل هذه الاتصالات متماسكة ومقصودة ومبنية لخدمة أهداف المؤسسة التجارية.</p>

<h2>ما معنى الهوية البصرية الشركاتية</h2>
<p>الهوية البصرية الشركاتية هي النظام المتكامل من العناصر البصرية التي تمثل المؤسسة — الشعار وقواعد استخدامه، ولوحة الألوان ومنطق تطبيقها، والخطوط وتسلسلها الهرمي، والعناصر الرسومية وأنماط استخدامها. تشكل هذه العناصر معاً لغة بصرية تعرّف المؤسسة فورياً وبشكل متسق عبر كل وسيط.</p>
<p>الهوية البصرية المصممة بإتقان لا تبدو جيدة فحسب — بل تعمل كأصل تنظيمي. تمكّن أي مصمم أو مطبعة أو مصنّع لافتات يعمل مع مواد الشركة من إعادة إنتاج العلامة التجارية بشكل صحيح دون انحراف. تضمن أن بطاقة عمل الموظف الجديد تبدو مطابقة لبطاقة المدير التنفيذي، وأن جناح المعرض يتطابق مع الموقع الإلكتروني، وأن تغليف هدايا اليوم الوطني مرتبط بشكل لا لبس فيه بالشركة التي وزعته.</p>

<h2>مراحل تصميم الهوية البصرية</h2>
<p>تتعامل وينوو للإعلان مع الهوية البصرية الشركاتية كمشروع تصميم استراتيجي — وليس مجرد تمرين جمالي. تبدأ العملية بفهم المؤسسة:</p>
<p>مرحلة الاكتشاف تستكشف موقع الشركة في سوقها، وجمهورها المستهدف، وسياقها التنافسي، والقيم والشخصية التي تحتاج إلى إيصالها. بالنسبة للشركات في سوق الرياض التنافسي، فإن فهم ما يميز المؤسسة وما تطمح لأن تصبح عليه يوجه كل قرار تصميمي.</p>
<p>مرحلة تطوير المفهوم تنتج عدة اتجاهات تصميمية مميزة — عادةً ثلاثة مفاهيم للشعار مطورة بمستوى كافٍ من التفصيل لتقييم طابعها وقابليتها للتوسع وملاءمتها للملخص. تُقدَّم هذه المفاهيم مع المبررات، وليس فقط المرئيات.</p>
<p>مرحلة التحسين تطوّر المفهوم المختار إلى نظام هوية متكامل — جميع تنويعات الشعار، ومواصفات الألوان، والخطوط، والعناصر الرسومية الداعمة، وعروض التطبيق على المواد الأساسية التي يستخدمها العميل.</p>
<p>مرحلة التسليم توفر جميع الملفات الجاهزة للإنتاج بالتنسيقات الصحيحة للاستخدام الرقمي والمطبوع والعرض الكبير، إلى جانب وثيقة إرشادات العلامة التجارية التي تمكّن من التطبيق الصحيح من قبل أي طرف يعمل مع الهوية مستقبلاً.</p>

<h2>مكونات نظام الهوية للشركات السعودية</h2>
<p>نظام الهوية البصرية الشركاتية المتكامل للسوق السعودية يشمل:</p>
<p><strong>تصميم الشعار:</strong> الشعار الأساسي، والتكوينات البديلة للسياقات المختلفة (أفقي، مكدس، أيقونة فقط)، والإصدارات الصحيحة للخلفيات الداكنة والفاتحة. للشركات السعودية ثنائية اللغة، يتم تطوير قفلات شعار عربية وإنجليزية منفصلة، إلى جانب نسخة ثنائية اللغة موحدة للمواد التي يظهر فيها كلاهما معاً.</p>
<p><strong>لوحة ألوان العلامة التجارية:</strong> اللون الأساسي للعلامة التجارية، والألوان الثانوية، والدرجات المحايدة مع المواصفات في جميع نماذج الألوان ذات الصلة (HEX للرقمي، RGB للشاشة، CMYK للطباعة، Pantone للطباعة الفاخرة والتصنيع).</p>
<p><strong>نظام الخطوط:</strong> الخطوط المحددة لجميع العناوين والنصوص الأساسية والتعليقات والتطبيقات المميزة — مع اختيار خطوط ثنائية اللغة تضمن أن النص العربي بنفس جودة النص اللاتيني.</p>
<p><strong>وثيقة إرشادات العلامة التجارية:</strong> توثيق جميع عناصر الهوية وتطبيقها الصحيح — بما في ذلك ما لا يجب فعله مع كل عنصر. وثيقة إرشادات واضحة ومكتوبة بشكل جيد لا تقل قيمة عن التصميم نفسه.</p>
<p>للعملاء الذين يحتاجون إلى تصور بصري مكاني وبيئي للعلامة التجارية، نطوّر أيضاً <a href="/ar/services/3d-designs">تصاميم ثلاثية الأبعاد</a> توضح كيف تعمل الهوية على اللافتات والديكورات الداخلية والبيئات المادية.</p>

<h2>تطبيق الهوية في الطباعة والرقمي والبيئة</h2>
<p>الاختبار الحقيقي للهوية الشركاتية هو أداؤها عبر النطاق الكامل من الوسائط التي تظهر فيها الشركة. تصمم وينوو للإعلان الهويات مع وضع التطبيق في الاعتبار — وتنفذ تلك الهويات عبر الطيف الإعلامي الكامل كامتداد طبيعي لعمل التصميم.</p>
<p>تشمل التطبيقات المطبوعة <a href="/ar/services/profile-design-printing">بروفيلات الشركات</a> والكتالوجات والتقارير السنوية و<a href="/ar/services/business-cards">بطاقات العمل</a> والقرطاسية والمواد التسويقية. وتشمل التطبيقات الرقمية أنظمة ملفات التواصل الاجتماعي وقوالب التوقيع الإلكتروني وقوالب العروض التقديمية والتوجيه البصري <a href="/ar/services/websites">للموقع الإلكتروني</a> وأصول <a href="/ar/services/digital-marketing">تصميم الفيديو</a>. وتشمل التطبيقات البيئية أنظمة اللافتات وتصميم أجنحة المعارض وتغليف المركبات والعلامة التجارية للديكور الداخلي.</p>
<p>ميزة العمل مع وينوو للإعلان في تصميم الهوية وتنفيذها هي أن كل تطبيق ينتجه الفريق الذي صمم النظام — مما يضمن دقة الألوان وصحة الخطوط والتنفيذ الأمين للهوية عبر كل وسيط.</p>

<h2>الهوية في سياقات السوق السعودية</h2>
<p>يتميز السوق السعودي بسياقات اتصال بصري محددة يجب أن يعالجها نظام الهوية الشركاتية: العلامة التجارية للمناسبات الوطنية (مواد اليوم الوطني ويوم التأسيس يجب أن تعمل بشكل متماسك مع العلامة التجارية)، والاتصالات الحكومية والمؤسسية (المستندات الرسمية والمراسلات الرسمية)، والاتصالات الأساسية باللغة العربية (حيث يجب أن يعمل نظام الهوية بالعربية بنفس كفاءة عمله بالإنجليزية).</p>
<p>صممت وينوو للإعلان أنظمة هوية لشركات في قطاعات الرياض الرئيسية — البناء والعقارات والخدمات المهنية والتجزئة والضيافة والمنظمات المرتبطة بالحكومة — وتفهم متطلبات كل سياق.</p>

<h2>الأسئلة الشائعة حول تصميم الهوية الشركاتية</h2>

<h3>ما الذي يتضمنه مشروع تصميم الهوية البصرية الشركاتية؟</h3>
<p>يتضمن مشروع الهوية البصرية الشركاتية المتكامل من وينوو للإعلان: تصميم الشعار (إصدارات أساسية وثانوية وأحادية اللون)، ولوحة ألوان العلامة التجارية مع الألوان الأساسية والثانوية ومواصفاتها (HEX، RGB، CMYK، Pantone)، ونظام الخطوط (خطوط أساسية وثانوية للعناوين والنصوص)، ووثيقة إرشادات استخدام العلامة التجارية، وتصميم بطاقات العمل والقرطاسية، وقالب التوقيع الإلكتروني، وقوالب ملفات التواصل الاجتماعي، وتصميم بروفيل الشركة. تتوفر مخرجات إضافية تشمل مواصفات اللافتات وتغليف المركبات ورسوم الفيديو المتحركة كجزء من باقات الهوية الموسعة.</p>

<h3>كم يستغرق مشروع تصميم الهوية الشركاتية؟</h3>
<p>يستغرق مشروع الهوية البصرية الشركاتية القياسي من 4 إلى 8 أسابيع من الملخص إلى التسليم النهائي، حسب النطاق وعدد جولات المراجعة. تتضمن العملية مرحلة اكتشاف واستراتيجية، وعرض المفاهيم الأولية (عادةً 3 مفاهيم للشعار)، وتحسين المفهوم المختار، وتطوير نظام الهوية الكامل، والتسليم النهائي لجميع الملفات والإرشادات. قد تستغرق مشاريع الهوية الأكبر ذات المخرجات الواسعة من 8 إلى 12 أسبوعاً.</p>

<h3>هل يعمل نظام الهوية بالعربية والإنجليزية؟</h3>
<p>نعم. تصمم وينوو للإعلان أنظمة هوية شركاتية تعمل بالعربية والإنجليزية — وهذا أمر أساسي للسوق السعودي. يجب اختيار الخط العربي في بيئة الأعمال السعودية وتنسيقه بعناية ليتطابق مع جودة وطابع الخطوط اللاتينية في نفس النظام. نطوّر قفلات شعار ثنائية اللغة وقرطاسية ثنائية اللغة وإرشادات تغطي تطبيق الخطوط العربية.</p>

<h3>هل يمكن لوينوو للإعلان إعادة تصميم هوية قائمة بدلاً من إنشاء هوية جديدة؟</h3>
<p>نعم. مشاريع تحديث وتطوير الهوية شائعة — الهدف عادةً هو تحديث هوية قائمة مع الحفاظ على قيمة العلامة التجارية المتراكمة على مر السنين. تجري وينوو للإعلان تدقيقاً للعلامة التجارية قبل بدء مشروع إعادة التصميم لفهم العناصر التي تحمل قيمة تعريفية ويجب تطويرها بدلاً من التخلص منها.</p>

<h2>ابدأ مشروع هويتك في الرياض</h2>
<p>أخبرنا عن مؤسستك وسوقك وما تريد أن توصله هويتك. نحدد اجتماع اكتشاف ونقدم عرض مشروع وجدولاً زمنياً خلال 48 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما الذي يتضمنه مشروع تصميم الهوية البصرية الشركاتية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يتضمن مشروع الهوية البصرية الشركاتية المتكامل من وينوو للإعلان: تصميم الشعار (إصدارات أساسية وثانوية وأحادية اللون)، ولوحة ألوان العلامة التجارية مع الألوان الأساسية والثانوية ومواصفاتها (HEX، RGB، CMYK، Pantone)، ونظام الخطوط (خطوط أساسية وثانوية للعناوين والنصوص)، ووثيقة إرشادات استخدام العلامة التجارية، وتصميم بطاقات العمل والقرطاسية، وقالب التوقيع الإلكتروني، وقوالب ملفات التواصل الاجتماعي، وتصميم بروفيل الشركة. تتوفر مخرجات إضافية تشمل مواصفات اللافتات وتغليف المركبات ورسوم الفيديو المتحركة كجزء من باقات الهوية الموسعة."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق مشروع تصميم الهوية الشركاتية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يستغرق مشروع الهوية البصرية الشركاتية القياسي من 4 إلى 8 أسابيع من الملخص إلى التسليم النهائي، حسب النطاق وعدد جولات المراجعة. تتضمن العملية مرحلة اكتشاف واستراتيجية، وعرض المفاهيم الأولية (عادةً 3 مفاهيم للشعار)، وتحسين المفهوم المختار، وتطوير نظام الهوية الكامل، والتسليم النهائي لجميع الملفات والإرشادات. قد تستغرق مشاريع الهوية الأكبر ذات المخرجات الواسعة من 8 إلى 12 أسبوعاً."
      }
    },
    {
      "@type": "Question",
      "name": "هل يعمل نظام الهوية بالعربية والإنجليزية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تصمم وينوو للإعلان أنظمة هوية شركاتية تعمل بالعربية والإنجليزية — وهذا أمر أساسي للسوق السعودي. يجب اختيار الخط العربي في بيئة الأعمال السعودية وتنسيقه بعناية ليتطابق مع جودة وطابع الخطوط اللاتينية في نفس النظام. نطوّر قفلات شعار ثنائية اللغة وقرطاسية ثنائية اللغة وإرشادات تغطي تطبيق الخطوط العربية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن لوينوو للإعلان إعادة تصميم هوية قائمة بدلاً من إنشاء هوية جديدة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. مشاريع تحديث وتطوير الهوية شائعة — الهدف عادةً هو تحديث هوية قائمة مع الحفاظ على قيمة العلامة التجارية المتراكمة على مر السنين. تجري وينوو للإعلان تدقيقاً للعلامة التجارية قبل بدء مشروع إعادة التصميم لفهم العناصر التي تحمل قيمة تعريفية ويجب تطويرها بدلاً من التخلص منها."
      }
    }
  ]
}
</script>
HTML;
    }
};
