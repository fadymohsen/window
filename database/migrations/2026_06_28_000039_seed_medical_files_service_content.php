<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'medical-files';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/medical-files.webp',
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
            'title' => 'Medical Files',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Medical Files in Riyadh | Branded Healthcare Files Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom medical files and branded healthcare document folders in Riyadh. Window Advertising manufactures medical files, patient document folders, and branded healthcare stationery for hospitals, clinics, and pharmaceutical companies across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'medical files Riyadh, healthcare document folders Saudi Arabia, hospital files Riyadh, branded medical folders Saudi Arabia, patient document files Riyadh, دعاية واعلان الرياض, ملفات طبية الرياض, تصميم هوية, دعاية واعلان السعودية, ملفات مستشفيات السعودية',
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
            'title' => 'الملفات الطبية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'ملفات طبية في الرياض | ملفات رعاية صحية مخصصة السعودية | ويندو للإعلان',
            'meta_description' => 'ملفات طبية مخصصة وملفات وثائق رعاية صحية في الرياض — ويندو للإعلان يصنع ملفات طبية وملفات مرضى وقرطاسية رعاية صحية للمستشفيات والعيادات وشركات الأدوية في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'ملفات طبية الرياض, ملفات رعاية صحية السعودية, دعاية واعلان الرياض, تصميم هوية, دعاية واعلان السعودية, ملفات مستشفيات الرياض',
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
        $service = DB::table('services')->where('slug', 'medical-files')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Saudi Arabia's expanding healthcare sector — from Riyadh's major private hospital groups to the network of specialist clinics, medical centers, and pharmaceutical operations across the city — generates constant demand for professionally produced medical document files. A branded medical file communicates the healthcare organization's standards at every patient contact point. Window Advertising manufactures medical files and branded healthcare document folders for hospitals, clinics, medical centers, and pharmaceutical companies across Riyadh and Saudi Arabia.</p>

<h2>The Role of Branded Medical Files</h2>
<p>In a healthcare environment, the materials patients handle communicate as much as the clinical staff and facilities do. A patient who receives a medical record folder from a premium private hospital expects that folder to reflect the quality of the care they are receiving. A poorly printed, generic folder communicates a gap between the facility's standards and its presentation.</p>
<p>Window Advertising designs medical files that are aligned with the healthcare organization's <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> — the correct logo, colors, typography, and bilingual Arabic-English layout. For Riyadh's private healthcare market, where patient experience is a key differentiator, consistent, quality branded materials across every document touchpoint — including <a href="/en/services/business-cards">business cards</a> for physicians and staff — contribute to the overall care perception.</p>

<h2>Patient Document Files and Folders</h2>
<p>Patient-facing document files are among the highest-volume branded items a healthcare organization produces. Window Advertising manufactures:</p>
<p><strong>Patient record folders</strong> in card or PVC hold the patient's clinical documentation and are used across every visit — branded with the hospital or clinic logo and bilingual patient information on the cover.</p>
<p><strong>Prescription document envelopes and folders</strong> package the physician's prescription for handover to the patient at the clinic or to the pharmacy. Branded prescription folders communicate the prescribing organization's identity at the pharmacy counter.</p>
<p><strong>Medical report folders</strong> present diagnostic reports, imaging results, and clinical documents in a professional format appropriate for patient retention and referral to other healthcare providers.</p>
<p><strong>Consultation and follow-up folders</strong> organize the patient's ongoing care materials — appointment cards, treatment plans, and specialist referrals — in a branded file that keeps all documents together.</p>

<h2>Clinical and Administrative Files</h2>
<p>Beyond patient-facing materials, healthcare organizations require branded administrative files for clinical staff use. Window Advertising produces:</p>
<p><strong>Clipboard files</strong> for clinical staff conducting rounds, taking vitals, or managing patient documentation in clinical settings. Healthcare-grade <a href="/en/services/pvc-file-with-clip-manufacturing">pvc file with clip</a> files with easy-clean surfaces and durable spring clips are standard for nursing and clinical administration use.</p>
<p><strong>Department-specific document folders</strong> for radiology, pharmacy, laboratory, and other clinical departments — branded to the hospital identity with department-specific labeling and color coding.</p>
<p><strong>HR and administrative document folders</strong> for hospital administration, including staff personnel files, training record folders, and employee documentation. Branded with <a href="/en/services/assorted-stamps">assorted stamps</a> and official identifiers where required.</p>

<h2>Pharmaceutical Promotional Files</h2>
<p>For pharmaceutical companies operating in Riyadh's active pharmaceutical market, medical representative presentation materials are a specialized category of branded file production. Window Advertising produces:</p>
<p><strong>Detail aid folders</strong> for pharmaceutical representatives — the primary presentation tool used in physician detailing visits. These folders hold printed product information cards, clinical data summaries, and branded materials in a format designed for face-to-face presentation across a desk.</p>
<p><strong>Clinical study and product monograph presentation folders</strong> for medical education events, hospital committee presentations, and formulary submissions. Professional <a href="/en/services/profile-design-printing">profile design and printing</a> ensures pharmaceutical materials meet the highest standards.</p>
<p><strong>Congress and conference branded files</strong> for pharmaceutical company symposia and medical conferences in Riyadh — coordinated with the company's medical affairs branding.</p>

<h2>Bilingual Design for Saudi Healthcare</h2>
<p>Saudi Arabia's healthcare environment is genuinely bilingual — Saudi and Arab patients communicate in Arabic, while a significant proportion of healthcare staff and expatriate patients require English. Every medical document file produced by Window Advertising is available in bilingual Arabic-English format, with both languages typeset correctly and given equal visual weight appropriate to the document function.</p>
<p>For government and semi-government healthcare entities in Saudi Arabia, Arabic text takes precedence in the design hierarchy. For internationally affiliated private hospitals, both languages may be given equal visual presence. Window Advertising develops the bilingual layout according to the specific requirements of each healthcare client.</p>

<h2>Frequently Asked Questions About Medical Files</h2>

<h3>What types of medical files does Window Advertising produce?</h3>
<p>Window Advertising produces patient record folders in card and PVC, prescription and consultation document folders, medical clipboard files with spring clips for clinical use, pharmacy prescription envelopes and document holders, pharmaceutical company representative files and presentation folders, and hospital and clinic branded stationery folders in bilingual Arabic-English design.</p>

<h3>Can medical files be produced in bilingual Arabic and English?</h3>
<p>Yes. All medical files and healthcare document folders produced by Window Advertising can be designed and printed in bilingual Arabic and English format — essential for Riyadh's healthcare environment where both expatriate and Saudi patients require documents they can read. Bilingual design is handled in-house, with Arabic typesetting appropriate for clinical document applications.</p>

<h3>Do you produce pharmaceutical promotional files for medical representatives?</h3>
<p>Yes. Pharmaceutical companies operating in Saudi Arabia use branded presentation folders and detail aid files as part of the medical representative's product detailing toolkit. Window Advertising produces pharmaceutical detail aid folders, product information files, clinical study presentation folders, and branded document organizers for pharmaceutical marketing and sales teams.</p>

<h3>What is the minimum order for medical files?</h3>
<p>Minimum orders depend on the file type and material. Cardboard medical folders with full-color printing start at 100 units. PVC clipboard medical files start at 50 units. Pharmaceutical branded folders and detail aid files typically require a minimum of 100 to 200 units. Volume pricing is available for healthcare organizations requiring large recurring quantities.</p>

<h2>Order Medical Files in Riyadh</h2>
<p>Tell us the file type, quantity required, and your brand or clinical requirements. Our team provides a product recommendation and pricing within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of medical files does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces patient record folders in card and PVC, prescription and consultation document folders, medical clipboard files with spring clips for clinical use, pharmacy prescription envelopes and document holders, pharmaceutical company representative files and presentation folders, and hospital and clinic branded stationery folders in bilingual Arabic-English design."
      }
    },
    {
      "@type": "Question",
      "name": "Can medical files be produced in bilingual Arabic and English?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. All medical files and healthcare document folders produced by Window Advertising can be designed and printed in bilingual Arabic and English format — essential for Riyadh's healthcare environment where both expatriate and Saudi patients require documents they can read. Bilingual design is handled in-house, with Arabic typesetting appropriate for clinical document applications."
      }
    },
    {
      "@type": "Question",
      "name": "Do you produce pharmaceutical promotional files for medical representatives?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Pharmaceutical companies operating in Saudi Arabia use branded presentation folders and detail aid files as part of the medical representative's product detailing toolkit. Window Advertising produces pharmaceutical detail aid folders, product information files, clinical study presentation folders, and branded document organizers for pharmaceutical marketing and sales teams."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for medical files?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum orders depend on the file type and material. Cardboard medical folders with full-color printing start at 100 units. PVC clipboard medical files start at 50 units. Pharmaceutical branded folders and detail aid files typically require a minimum of 100 to 200 units. Volume pricing is available for healthcare organizations requiring large recurring quantities."
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
<p>يولّد قطاع الرعاية الصحية المتنامي في المملكة العربية السعودية — من مجموعات المستشفيات الخاصة الكبرى في الرياض إلى شبكة العيادات المتخصصة والمراكز الطبية وشركات الأدوية في المدينة — طلباً مستمراً على ملفات الوثائق الطبية المنتجة باحترافية. الملف الطبي المميز بالعلامة التجارية ينقل معايير المؤسسة الصحية في كل نقطة تواصل مع المريض. ويندو للإعلان يصنع الملفات الطبية وملفات الوثائق الصحية للمستشفيات والعيادات والمراكز الطبية وشركات الأدوية في الرياض والمملكة العربية السعودية.</p>

<h2>دور الملفات الطبية المميزة</h2>
<p>في بيئة الرعاية الصحية، تتواصل المواد التي يتعامل معها المرضى بقدر ما يتواصل الطاقم الطبي والمرافق. المريض الذي يتلقى ملف سجل طبي من مستشفى خاص متميز يتوقع أن يعكس هذا الملف جودة الرعاية التي يتلقاها. الملف المطبوع بشكل سيئ والعام يوصل فجوة بين معايير المنشأة وتقديمها.</p>
<p>ويندو للإعلان يصمم ملفات طبية متوافقة مع <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> للمؤسسة الصحية — الشعار الصحيح والألوان والخطوط والتخطيط ثنائي اللغة عربي-إنجليزي. في سوق الرعاية الصحية الخاصة بالرياض، حيث تجربة المريض عامل تمييز رئيسي، تساهم المواد المؤسسية المتسقة وعالية الجودة في كل نقطة تواصل — بما في ذلك <a href="/ar/services/business-cards">بطاقات العمل</a> للأطباء والموظفين — في تصور الرعاية العام.</p>

<h2>ملفات ووثائق المرضى</h2>
<p>ملفات الوثائق الموجهة للمرضى هي من أكثر العناصر المؤسسية إنتاجاً في المؤسسات الصحية. ويندو للإعلان يصنع:</p>
<p><strong>ملفات سجلات المرضى</strong> من الورق المقوى أو PVC تحفظ الوثائق السريرية للمريض وتُستخدم في كل زيارة — مطبوعة بشعار المستشفى أو العيادة ومعلومات المريض ثنائية اللغة على الغلاف.</p>
<p><strong>أظرف وملفات الوصفات الطبية</strong> تغلف وصفة الطبيب لتسليمها للمريض في العيادة أو الصيدلية. ملفات الوصفات المؤسسية توصل هوية المؤسسة الواصفة عند كاونتر الصيدلية.</p>
<p><strong>ملفات التقارير الطبية</strong> تقدم تقارير التشخيص ونتائج التصوير والوثائق السريرية بتنسيق احترافي مناسب لاحتفاظ المريض والإحالة إلى مقدمي رعاية صحية آخرين.</p>
<p><strong>ملفات الاستشارة والمتابعة</strong> تنظم مواد الرعاية المستمرة للمريض — بطاقات المواعيد وخطط العلاج والإحالات التخصصية — في ملف مؤسسي يحفظ جميع الوثائق معاً.</p>

<h2>الملفات السريرية والإدارية</h2>
<p>بالإضافة إلى المواد الموجهة للمرضى، تحتاج المؤسسات الصحية إلى ملفات إدارية مؤسسية لاستخدام الطاقم السريري. ويندو للإعلان ينتج:</p>
<p><strong>ملفات الحافظة</strong> للطاقم السريري أثناء الجولات وقياس العلامات الحيوية أو إدارة وثائق المرضى في البيئات السريرية. <a href="/ar/services/pvc-file-with-clip-manufacturing">ملفات PVC بمشبك</a> بأسطح سهلة التنظيف ومشابك زنبركية متينة هي المعيار لاستخدام التمريض والإدارة السريرية.</p>
<p><strong>ملفات وثائق الأقسام</strong> للأشعة والصيدلة والمختبر والأقسام السريرية الأخرى — مميزة بهوية المستشفى مع ملصقات وترميز لوني خاص بكل قسم.</p>
<p><strong>ملفات الموارد البشرية والوثائق الإدارية</strong> لإدارة المستشفى، بما في ذلك ملفات الموظفين وملفات سجلات التدريب ووثائق الموظفين. مميزة بـ<a href="/ar/services/assorted-stamps">أختام متنوعة</a> ومعرفات رسمية حسب الحاجة.</p>

<h2>الملفات الترويجية للشركات الدوائية</h2>
<p>لشركات الأدوية العاملة في سوق الأدوية النشط بالرياض، مواد عرض المندوبين الطبيين هي فئة متخصصة من إنتاج الملفات المؤسسية. ويندو للإعلان ينتج:</p>
<p><strong>ملفات المساعدات التفصيلية</strong> للمندوبين الصيدلانيين — أداة العرض الأساسية المستخدمة في زيارات تفصيل المنتجات للأطباء. تحمل هذه الملفات بطاقات معلومات المنتج المطبوعة وملخصات البيانات السريرية والمواد المؤسسية بتنسيق مصمم للعرض وجهاً لوجه عبر المكتب.</p>
<p><strong>ملفات عرض الدراسات السريرية ودراسات المنتجات</strong> لفعاليات التعليم الطبي وعروض لجان المستشفيات وتقديمات قوائم الأدوية. <a href="/ar/services/profile-design-printing">تصميم وطباعة البروفايل</a> الاحترافي يضمن أن المواد الصيدلانية تلبي أعلى المعايير.</p>
<p><strong>ملفات المؤتمرات</strong> لندوات شركات الأدوية والمؤتمرات الطبية في الرياض — منسقة مع علامة الشؤون الطبية للشركة.</p>

<h2>التصميم ثنائي اللغة لقطاع الرعاية الصحية السعودي</h2>
<p>بيئة الرعاية الصحية في المملكة العربية السعودية ثنائية اللغة حقاً — يتواصل المرضى السعوديون والعرب بالعربية، بينما تتطلب نسبة كبيرة من الطاقم الطبي والمرضى المغتربين اللغة الإنجليزية. كل ملف وثائق طبي ينتجه ويندو للإعلان متاح بتنسيق ثنائي اللغة عربي-إنجليزي، مع تنضيد كلتا اللغتين بشكل صحيح وإعطائهما وزناً بصرياً متساوياً مناسباً لوظيفة الوثيقة.</p>
<p>للجهات الصحية الحكومية وشبه الحكومية في المملكة العربية السعودية، يأخذ النص العربي الأولوية في التسلسل التصميمي. للمستشفيات الخاصة المنتسبة دولياً، قد تُعطى كلتا اللغتين حضوراً بصرياً متساوياً. يطور ويندو للإعلان التخطيط ثنائي اللغة وفقاً للمتطلبات المحددة لكل عميل صحي.</p>

<h2>الأسئلة الشائعة حول الملفات الطبية</h2>

<h3>ما أنواع الملفات الطبية التي ينتجها ويندو للإعلان؟</h3>
<p>ينتج ويندو للإعلان ملفات سجلات المرضى من الورق المقوى وPVC، وملفات وثائق الوصفات والاستشارات، وملفات الحافظة الطبية بمشابك زنبركية للاستخدام السريري، وأظرف وصفات الصيدلية وحافظات الوثائق، وملفات مندوبي شركات الأدوية وملفات العروض التقديمية، وملفات القرطاسية المؤسسية للمستشفيات والعيادات بتصميم ثنائي اللغة عربي-إنجليزي.</p>

<h3>هل يمكن إنتاج الملفات الطبية بتصميم ثنائي اللغة عربي وإنجليزي؟</h3>
<p>نعم. جميع الملفات الطبية وملفات الوثائق الصحية التي ينتجها ويندو للإعلان يمكن تصميمها وطباعتها بتنسيق ثنائي اللغة عربي وإنجليزي — وهو أمر أساسي لبيئة الرعاية الصحية في الرياض حيث يحتاج كل من المرضى المغتربين والسعوديين إلى وثائق يمكنهم قراءتها. يُتعامل مع التصميم ثنائي اللغة داخلياً، مع تنضيد عربي مناسب لتطبيقات الوثائق السريرية.</p>

<h3>هل تنتجون ملفات ترويجية صيدلانية للمندوبين الطبيين؟</h3>
<p>نعم. تستخدم شركات الأدوية العاملة في المملكة العربية السعودية ملفات العروض التقديمية المؤسسية وملفات المساعدات التفصيلية كجزء من مجموعة أدوات تفصيل منتجات المندوب الطبي. ينتج ويندو للإعلان ملفات المساعدات التفصيلية الصيدلانية وملفات معلومات المنتجات وملفات عروض الدراسات السريرية والمنظمات المؤسسية للوثائق لفرق التسويق والمبيعات الصيدلانية.</p>

<h3>ما الحد الأدنى لطلب الملفات الطبية؟</h3>
<p>يعتمد الحد الأدنى للطلب على نوع الملف والمادة. ملفات الورق المقوى الطبية بطباعة كاملة الألوان تبدأ من 100 وحدة. ملفات PVC الطبية بمشبك تبدأ من 50 وحدة. ملفات شركات الأدوية المؤسسية وملفات المساعدات التفصيلية تتطلب عادة حداً أدنى من 100 إلى 200 وحدة. تتوفر أسعار الكميات للمؤسسات الصحية التي تحتاج كميات كبيرة متكررة.</p>

<h2>اطلب ملفاتك الطبية في الرياض</h2>
<p>أخبرنا بنوع الملف والكمية المطلوبة ومتطلبات علامتك التجارية أو السريرية. يقدم فريقنا توصية بالمنتج والتسعير خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الملفات الطبية التي ينتجها ويندو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ينتج ويندو للإعلان ملفات سجلات المرضى من الورق المقوى وPVC، وملفات وثائق الوصفات والاستشارات، وملفات الحافظة الطبية بمشابك زنبركية للاستخدام السريري، وأظرف وصفات الصيدلية وحافظات الوثائق، وملفات مندوبي شركات الأدوية وملفات العروض التقديمية، وملفات القرطاسية المؤسسية للمستشفيات والعيادات بتصميم ثنائي اللغة عربي-إنجليزي."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن إنتاج الملفات الطبية بتصميم ثنائي اللغة عربي وإنجليزي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. جميع الملفات الطبية وملفات الوثائق الصحية التي ينتجها ويندو للإعلان يمكن تصميمها وطباعتها بتنسيق ثنائي اللغة عربي وإنجليزي — وهو أمر أساسي لبيئة الرعاية الصحية في الرياض حيث يحتاج كل من المرضى المغتربين والسعوديين إلى وثائق يمكنهم قراءتها. يُتعامل مع التصميم ثنائي اللغة داخلياً، مع تنضيد عربي مناسب لتطبيقات الوثائق السريرية."
      }
    },
    {
      "@type": "Question",
      "name": "هل تنتجون ملفات ترويجية صيدلانية للمندوبين الطبيين؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تستخدم شركات الأدوية العاملة في المملكة العربية السعودية ملفات العروض التقديمية المؤسسية وملفات المساعدات التفصيلية كجزء من مجموعة أدوات تفصيل منتجات المندوب الطبي. ينتج ويندو للإعلان ملفات المساعدات التفصيلية الصيدلانية وملفات معلومات المنتجات وملفات عروض الدراسات السريرية والمنظمات المؤسسية للوثائق لفرق التسويق والمبيعات الصيدلانية."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لطلب الملفات الطبية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يعتمد الحد الأدنى للطلب على نوع الملف والمادة. ملفات الورق المقوى الطبية بطباعة كاملة الألوان تبدأ من 100 وحدة. ملفات PVC الطبية بمشبك تبدأ من 50 وحدة. ملفات شركات الأدوية المؤسسية وملفات المساعدات التفصيلية تتطلب عادة حداً أدنى من 100 إلى 200 وحدة. تتوفر أسعار الكميات للمؤسسات الصحية التي تحتاج كميات كبيرة متكررة."
      }
    }
  ]
}
</script>
HTML;
    }
};
