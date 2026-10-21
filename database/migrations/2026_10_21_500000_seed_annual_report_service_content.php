<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'annual-report';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image'      => 'services/annual-report.webp',
                'slug'       => $slug,
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
            'title'            => 'Corporate Annual Report Design',
            'content'          => $this->getEnglishContent(),
            'meta_title'       => 'Annual Report Design in Riyadh | Corporate Report Design | Window',
            'meta_description' => 'Professional annual report design in Riyadh — corporate reports, sustainability reports, and shareholder publications. Data visualization, infographics, bilingual Arabic-English layout. Window Advertising.',
            'meta_keywords'    => 'annual report design Riyadh, corporate report design Saudi Arabia, annual report design company, تصميم تقرير سنوي, sustainability report design, shareholder report design, bilingual annual report, infographic design Riyadh',
        ];

        if ($enExists) {
            DB::table('service_translations')
                ->where('service_id', $serviceId)
                ->where('locale', 'en')
                ->update($enData);
        } else {
            DB::table('service_translations')->insert(array_merge($enData, [
                'service_id' => $serviceId,
                'locale'     => 'en',
            ]));
        }

        // Arabic translation
        $arExists = DB::table('service_translations')
            ->where('service_id', $serviceId)
            ->where('locale', 'ar')
            ->exists();

        $arData = [
            'title'            => 'تصميم التقارير السنوية للشركات',
            'content'          => $this->getArabicContent(),
            'meta_title'       => 'تصميم تقرير سنوي في الرياض | تصميم تقارير الشركات | ويندو',
            'meta_description' => 'تصميم تقارير سنوية احترافية في الرياض — تقارير الشركات وتقارير الاستدامة ومنشورات المساهمين. تصور بيانات وإنفوجرافيك وتخطيط ثنائي اللغة. وكالة ويندو للدعاية والإعلان.',
            'meta_keywords'    => 'تصميم تقرير سنوي الرياض, تصميم تقارير الشركات, تصميم تقرير سنوي السعودية, شركة تصميم تقارير سنوية, تصميم إنفوجرافيك, تصميم تقرير استدامة, تصميم تقرير مساهمين, طباعة تقرير سنوي الرياض',
        ];

        if ($arExists) {
            DB::table('service_translations')
                ->where('service_id', $serviceId)
                ->where('locale', 'ar')
                ->update($arData);
        } else {
            DB::table('service_translations')->insert(array_merge($arData, [
                'service_id' => $serviceId,
                'locale'     => 'ar',
            ]));
        }
    }

    public function down(): void
    {
        $service = DB::table('services')->where('slug', 'annual-report')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>An annual report is the most important document a company publishes each year. It tells shareholders, regulators, clients, and the public what the organization achieved, where it stands financially, and where it's headed. When that document is poorly designed — cluttered layouts, inconsistent data presentation, hard-to-read tables — it undermines the credibility it's supposed to build. Window Advertising designs annual reports and corporate reports for companies across Riyadh and Saudi Arabia, handling everything from data visualization and infographic design to bilingual layout and print production.</p>

<h2>Why Annual Report Design Matters</h2>
<p>An annual report carries financial statements, strategic narratives, governance disclosures, and operational highlights — often across 50 to 200+ pages. The design challenge is not decoration; it's clarity. Readers need to find information quickly, understand complex data at a glance, and trust that the document reflects the professionalism of the organization behind it.</p>
<p>In Saudi Arabia, listed companies, government entities, and large private-sector organizations are increasingly expected to produce annual reports that meet international standards of design and disclosure. A well-designed report communicates transparency and competence — two qualities that directly affect investor confidence and stakeholder trust.</p>

<h2>What We Design</h2>
<p>Window Advertising's annual report design service covers the full range of corporate publications:</p>
<ul>
<li><strong>Annual reports:</strong> the flagship yearly publication covering financial performance, strategic review, governance, and outlook.</li>
<li><strong>Sustainability and ESG reports:</strong> environmental, social, and governance reporting with data visualization suited to non-financial metrics.</li>
<li><strong>Quarterly and interim reports:</strong> shorter-format publications covering mid-year performance updates.</li>
<li><strong>Board of directors reports:</strong> formal governance documents with structured layout for resolutions, attendance records, and committee summaries.</li>
<li><strong>Shareholder and investor publications:</strong> documents designed for distribution at AGMs, investor roadshows, and stakeholder meetings.</li>
</ul>

<h2>Our Design Process</h2>
<p>Annual report design requires a structured process — the content is complex, the stakeholders are many, and the deadline is usually fixed. Our process is built around corporate review cycles:</p>
<ol>
<li><strong>Brief and content audit:</strong> we review the raw content — financials, narratives, photography, charts — and assess what needs to be designed, restructured, or visualized.</li>
<li><strong>Design concept:</strong> we develop a visual direction — cover design, internal layout grid, typography, color palette, and infographic style — aligned with the company's brand identity.</li>
<li><strong>Layout and data visualization:</strong> content is flowed into the approved layout. Financial tables, charts, KPI dashboards, and infographics are designed to communicate data clearly and consistently.</li>
<li><strong>Bilingual production:</strong> Arabic and English versions are produced in parallel, with each language receiving a native layout — not a mirrored translation. Right-to-left Arabic and left-to-right English layouts are both designed to read naturally.</li>
<li><strong>Review cycles:</strong> we build in structured review rounds with the client's finance, communications, and executive teams — changes are tracked and implemented across both language versions simultaneously.</li>
<li><strong>Print and digital delivery:</strong> the final report is delivered as a print-ready PDF and, where required, as an interactive digital version or web-ready format.</li>
</ol>

<h2>Data Visualization and Infographics</h2>
<p>The difference between an average annual report and an excellent one is often in the data visualization. Raw financial tables and dense paragraphs of text don't communicate performance effectively. Window Advertising designs custom infographics, charts, KPI dashboards, and visual summaries that turn numbers into stories:</p>
<ul>
<li>Revenue and growth charts with clear year-over-year comparisons.</li>
<li>Geographic and segment breakdowns using maps and proportional graphics.</li>
<li>KPI highlight pages that give executives and board members a one-page performance summary.</li>
<li>Sustainability metrics visualized for ESG reporting requirements.</li>
<li>Organizational charts and governance structures presented clearly.</li>
</ul>

<h2>Bilingual Arabic-English Annual Reports</h2>
<p>Most corporate annual reports in Saudi Arabia are published in both Arabic and English. This is not simply a matter of translating text and flipping the layout. Arabic and English have fundamentally different reading directions, typographic conventions, and spacing requirements. A bilingual annual report done properly requires two native layouts — each designed to read naturally in its language while maintaining visual consistency across both versions.</p>
<p>Window Advertising's design team is experienced in producing bilingual corporate documents where both language versions look equally polished and professional. Our work on <a href="/en/services/business-prints">business prints</a> and <a href="/en/services/profile-design-printing">company profile design</a> follows the same bilingual design standards.</p>

<h2>Print Production and Premium Finishes</h2>
<p>Annual reports are often the highest-specification print document a company produces. Window Advertising manages print production with finishes that match the document's importance:</p>
<ul>
<li>Premium paper stocks — coated and uncoated options suited to the design and reading experience.</li>
<li>Soft-touch lamination for covers that feel premium to handle.</li>
<li>Spot UV and foil stamping for logo and title treatments.</li>
<li>Perfect binding, saddle stitching, or case binding depending on page count and presentation requirements.</li>
<li>Packaging and delivery to AGM venues, board offices, and distribution lists.</li>
</ul>

<h2>Frequently Asked Questions</h2>

<h3>How early should we start the annual report design process?</h3>
<p>Ideally 6 to 8 weeks before the publication deadline. This allows time for content review, design development, two to three review rounds with stakeholders, and print production. Tighter timelines are possible with early planning and parallel workstreams.</p>

<h3>Can you work with our existing brand guidelines?</h3>
<p>Yes. We design within your brand guidelines — fonts, colors, logo usage, and visual style — to ensure the annual report is consistent with your corporate identity. If guidelines need updating, our <a href="/en/services/corporate-visual-identity-design">corporate identity design</a> team can assist.</p>

<h3>Do you handle the content writing or just the design?</h3>
<p>Our core service is design and layout. We work with the content your team provides — financial statements, narrative sections, photography, and data. If you need content support, we can coordinate with copywriters to ensure the text works within the design structure.</p>

<h3>Can you produce both a printed and digital version?</h3>
<p>Yes. We deliver the annual report as a press-ready PDF for print production and can also produce an interactive PDF or web-optimized version for digital distribution.</p>

<h3>What if our content changes after design has started?</h3>
<p>Content changes are normal in annual report production — financial figures are often finalized late. Our process includes structured revision rounds, and we manage version control to ensure changes are reflected accurately across both language versions.</p>

<h2>Request an Annual Report Design Quote</h2>
<p>Tell us the approximate page count, language requirements, publication deadline, and any premium finishing needs. Our team will provide a detailed proposal covering design, data visualization, bilingual layout, and print production. <a href="/en/contact">Get in touch</a> to discuss your report.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How early should we start the annual report design process?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ideally 6 to 8 weeks before the publication deadline. This allows time for content review, design development, two to three review rounds with stakeholders, and print production. Tighter timelines are possible with early planning and parallel workstreams."
      }
    },
    {
      "@type": "Question",
      "name": "Can you work with our existing brand guidelines?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. We design within your brand guidelines — fonts, colors, logo usage, and visual style — to ensure the annual report is consistent with your corporate identity."
      }
    },
    {
      "@type": "Question",
      "name": "Do you handle the content writing or just the design?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our core service is design and layout. We work with the content your team provides — financial statements, narrative sections, photography, and data. If you need content support, we can coordinate with copywriters to ensure the text works within the design structure."
      }
    },
    {
      "@type": "Question",
      "name": "Can you produce both a printed and digital version?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. We deliver the annual report as a press-ready PDF for print production and can also produce an interactive PDF or web-optimized version for digital distribution."
      }
    },
    {
      "@type": "Question",
      "name": "What if our content changes after design has started?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Content changes are normal in annual report production — financial figures are often finalized late. Our process includes structured revision rounds, and we manage version control to ensure changes are reflected accurately across both language versions."
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
<p>التقرير السنوي هو أهم وثيقة تصدرها الشركة كل عام. يخبر المساهمين والجهات التنظيمية والعملاء والجمهور بما حققته المؤسسة، وأين تقف ماليًا، وإلى أين تتجه. عندما يكون تصميم هذه الوثيقة ضعيفًا — تخطيطات مزدحمة وعرض بيانات غير متسق وجداول صعبة القراءة — فإنه يقوّض المصداقية التي يُفترض أن يبنيها. تصمم وكالة ويندو للدعاية والإعلان التقارير السنوية وتقارير الشركات للمؤسسات في الرياض والمملكة العربية السعودية، وتتولى كل شيء من تصور البيانات وتصميم الإنفوجرافيك إلى التخطيط ثنائي اللغة والإنتاج الطباعي.</p>

<h2>لماذا يهم تصميم التقرير السنوي؟</h2>
<p>يحمل التقرير السنوي القوائم المالية والسرد الاستراتيجي وإفصاحات الحوكمة وأبرز الإنجازات التشغيلية — غالبًا عبر 50 إلى أكثر من 200 صفحة. التحدي في التصميم ليس الزخرفة، بل الوضوح. يحتاج القارئ إلى العثور على المعلومات بسرعة، وفهم البيانات المعقدة بنظرة واحدة، والثقة بأن الوثيقة تعكس احترافية المؤسسة التي أصدرتها.</p>
<p>في المملكة العربية السعودية، يُتوقع بشكل متزايد من الشركات المدرجة والجهات الحكومية ومؤسسات القطاع الخاص الكبرى إنتاج تقارير سنوية تلبي المعايير الدولية في التصميم والإفصاح. التقرير المصمم جيدًا ينقل الشفافية والكفاءة — صفتان تؤثران مباشرة في ثقة المستثمرين وأصحاب المصلحة.</p>

<h2>ما الذي نصممه؟</h2>
<p>تغطي خدمة تصميم التقارير السنوية من وكالة ويندو المجموعة الكاملة من المنشورات المؤسسية:</p>
<ul>
<li><strong>التقارير السنوية:</strong> المنشور السنوي الرئيسي الذي يغطي الأداء المالي والمراجعة الاستراتيجية والحوكمة والتوقعات المستقبلية.</li>
<li><strong>تقارير الاستدامة وتقارير ESG:</strong> تقارير البيئة والمجتمع والحوكمة مع تصور بيانات مناسب للمقاييس غير المالية.</li>
<li><strong>التقارير الربعية والمرحلية:</strong> منشورات أقصر تغطي تحديثات الأداء نصف السنوية.</li>
<li><strong>تقارير مجلس الإدارة:</strong> وثائق حوكمة رسمية بتخطيط منظم للقرارات وسجلات الحضور وملخصات اللجان.</li>
<li><strong>منشورات المساهمين والمستثمرين:</strong> وثائق مصممة للتوزيع في الجمعيات العمومية وجولات المستثمرين واجتماعات أصحاب المصلحة.</li>
</ul>

<h2>مراحل التصميم</h2>
<p>تصميم التقرير السنوي يتطلب عملية منظمة — المحتوى معقد، وأصحاب المصلحة كثيرون، والموعد النهائي عادةً ثابت. عمليتنا مبنية حول دورات المراجعة المؤسسية:</p>
<ol>
<li><strong>الملخص ومراجعة المحتوى:</strong> نراجع المحتوى الخام — القوائم المالية والنصوص والصور والرسوم البيانية — ونقيّم ما يحتاج إلى تصميم أو إعادة هيكلة أو تصور بصري.</li>
<li><strong>مفهوم التصميم:</strong> نطور التوجه البصري — تصميم الغلاف وشبكة التخطيط الداخلي والطباعة والألوان وأسلوب الإنفوجرافيك — بما يتوافق مع هوية الشركة.</li>
<li><strong>التخطيط وتصور البيانات:</strong> يُدرج المحتوى في التخطيط المعتمد. تُصمم الجداول المالية والرسوم البيانية ولوحات المؤشرات والإنفوجرافيك لتوصيل البيانات بوضوح واتساق.</li>
<li><strong>الإنتاج ثنائي اللغة:</strong> تُنتج النسختان العربية والإنجليزية بالتوازي، بحيث تحصل كل لغة على تخطيط أصلي — وليس ترجمة معكوسة. التخطيط العربي من اليمين لليسار والإنجليزي من اليسار لليمين كلاهما مصمم ليُقرأ بشكل طبيعي.</li>
<li><strong>دورات المراجعة:</strong> نبني جولات مراجعة منظمة مع فرق المالية والتواصل المؤسسي والإدارة التنفيذية — تُتتبع التعديلات وتُنفذ في كلتا نسختي اللغة بالتزامن.</li>
<li><strong>التسليم المطبوع والرقمي:</strong> يُسلم التقرير النهائي كملف PDF جاهز للطباعة، وعند الحاجة كنسخة رقمية تفاعلية أو بتنسيق مناسب للويب.</li>
</ol>

<h2>تصور البيانات والإنفوجرافيك</h2>
<p>الفرق بين تقرير سنوي متوسط وتقرير ممتاز غالبًا يكمن في تصور البيانات. الجداول المالية الخام والفقرات النصية الكثيفة لا توصل الأداء بفعالية. تصمم وكالة ويندو إنفوجرافيك ورسومًا بيانية ولوحات مؤشرات وملخصات بصرية مخصصة تحوّل الأرقام إلى قصص:</p>
<ul>
<li>رسوم بيانية للإيرادات والنمو مع مقارنات سنوية واضحة.</li>
<li>تحليلات جغرافية وقطاعية باستخدام الخرائط والرسوم النسبية.</li>
<li>صفحات مؤشرات الأداء الرئيسية التي تمنح المديرين التنفيذيين وأعضاء مجلس الإدارة ملخص أداء في صفحة واحدة.</li>
<li>تصور مقاييس الاستدامة لمتطلبات تقارير ESG.</li>
<li>الهياكل التنظيمية وهياكل الحوكمة مقدمة بوضوح.</li>
</ul>

<h2>التقارير السنوية ثنائية اللغة عربي-إنجليزي</h2>
<p>معظم التقارير السنوية للشركات في المملكة العربية السعودية تُنشر بالعربية والإنجليزية. الأمر لا يقتصر على ترجمة النص وعكس التخطيط. العربية والإنجليزية لهما اتجاهات قراءة مختلفة جوهريًا واصطلاحات طباعية ومتطلبات تباعد مختلفة. التقرير السنوي ثنائي اللغة المنفذ بشكل صحيح يتطلب تخطيطين أصليين — كل منهما مصمم ليُقرأ بشكل طبيعي في لغته مع الحفاظ على الاتساق البصري بين النسختين.</p>
<p>يتمتع فريق التصميم في وكالة ويندو بخبرة في إنتاج الوثائق المؤسسية ثنائية اللغة حيث تبدو كلتا نسختي اللغة مصقولة واحترافية بنفس الدرجة. عملنا في <a href="/ar/services/business-prints">المطبوعات التجارية</a> و<a href="/ar/services/profile-design-printing">تصميم البروفيل</a> يتبع نفس معايير التصميم ثنائي اللغة.</p>

<h2>الإنتاج الطباعي والتشطيبات الفاخرة</h2>
<p>التقارير السنوية غالبًا ما تكون أعلى وثيقة مطبوعة من حيث المواصفات تنتجها الشركة. تدير وكالة ويندو الإنتاج الطباعي بتشطيبات تليق بأهمية الوثيقة:</p>
<ul>
<li>ورق فاخر — خيارات مطلية وغير مطلية تناسب التصميم وتجربة القراءة.</li>
<li>تغليف ناعم للأغلفة يمنح إحساسًا فاخرًا عند الإمساك.</li>
<li>أشعة فوق بنفسجية موضعية وختم رقائق لمعالجات الشعار والعنوان.</li>
<li>تجليد مثالي أو تدبيس سرج أو تجليد غلاف صلب حسب عدد الصفحات ومتطلبات العرض.</li>
<li>تغليف وتوصيل لمقرات الجمعيات العمومية ومكاتب مجلس الإدارة وقوائم التوزيع.</li>
</ul>

<h2>الأسئلة الشائعة</h2>

<h3>متى يجب أن نبدأ عملية تصميم التقرير السنوي؟</h3>
<p>المثالي هو قبل 6 إلى 8 أسابيع من موعد النشر. يتيح ذلك وقتًا لمراجعة المحتوى وتطوير التصميم وجولتين إلى ثلاث جولات مراجعة مع أصحاب المصلحة والإنتاج الطباعي. الجداول الأضيق ممكنة مع التخطيط المبكر ومسارات العمل المتوازية.</p>

<h3>هل يمكنكم العمل مع دليل هويتنا البصرية الحالي؟</h3>
<p>نعم. نصمم ضمن إرشادات هويتك البصرية — الخطوط والألوان واستخدام الشعار والأسلوب البصري — لضمان اتساق التقرير السنوي مع هويتك المؤسسية. إذا احتاجت الإرشادات إلى تحديث، يمكن لفريق <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية المؤسسية</a> لدينا المساعدة.</p>

<h3>هل تتولون كتابة المحتوى أم التصميم فقط؟</h3>
<p>خدمتنا الأساسية هي التصميم والتخطيط. نعمل مع المحتوى الذي يقدمه فريقكم — القوائم المالية والأقسام السردية والصور والبيانات. إذا احتجتم دعمًا في المحتوى، يمكننا التنسيق مع كتّاب محتوى لضمان توافق النص مع هيكل التصميم.</p>

<h3>هل يمكنكم إنتاج نسخة مطبوعة ورقمية؟</h3>
<p>نعم. نسلم التقرير السنوي كملف PDF جاهز للطباعة ويمكننا أيضًا إنتاج نسخة PDF تفاعلية أو نسخة محسنة للويب للتوزيع الرقمي.</p>

<h3>ماذا لو تغير المحتوى بعد بدء التصميم؟</h3>
<p>تغييرات المحتوى أمر طبيعي في إنتاج التقارير السنوية — الأرقام المالية غالبًا تُعتمد متأخرًا. تتضمن عمليتنا جولات مراجعة منظمة، وندير التحكم في الإصدارات لضمان انعكاس التغييرات بدقة في كلتا نسختي اللغة.</p>

<h2>اطلب عرض سعر لتصميم التقرير السنوي</h2>
<p>أخبرنا بعدد الصفحات التقريبي ومتطلبات اللغة وموعد النشر وأي احتياجات تشطيب فاخرة. سيقدم فريقنا عرضًا تفصيليًا يغطي التصميم وتصور البيانات والتخطيط ثنائي اللغة والإنتاج الطباعي. <a href="/ar/contact">تواصل معنا</a> لمناقشة تقريركم.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "متى يجب أن نبدأ عملية تصميم التقرير السنوي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "المثالي هو قبل 6 إلى 8 أسابيع من موعد النشر. يتيح ذلك وقتًا لمراجعة المحتوى وتطوير التصميم وجولتين إلى ثلاث جولات مراجعة مع أصحاب المصلحة والإنتاج الطباعي."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم العمل مع دليل هويتنا البصرية الحالي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. نصمم ضمن إرشادات هويتك البصرية — الخطوط والألوان واستخدام الشعار والأسلوب البصري — لضمان اتساق التقرير السنوي مع هويتك المؤسسية."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولون كتابة المحتوى أم التصميم فقط؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "خدمتنا الأساسية هي التصميم والتخطيط. نعمل مع المحتوى الذي يقدمه فريقكم — القوائم المالية والأقسام السردية والصور والبيانات."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم إنتاج نسخة مطبوعة ورقمية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. نسلم التقرير السنوي كملف PDF جاهز للطباعة ويمكننا أيضًا إنتاج نسخة PDF تفاعلية أو نسخة محسنة للويب للتوزيع الرقمي."
      }
    },
    {
      "@type": "Question",
      "name": "ماذا لو تغير المحتوى بعد بدء التصميم؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تغييرات المحتوى أمر طبيعي في إنتاج التقارير السنوية — الأرقام المالية غالبًا تُعتمد متأخرًا. تتضمن عمليتنا جولات مراجعة منظمة، وندير التحكم في الإصدارات لضمان انعكاس التغييرات بدقة في كلتا نسختي اللغة."
      }
    }
  ]
}
</script>
HTML;
    }
};
