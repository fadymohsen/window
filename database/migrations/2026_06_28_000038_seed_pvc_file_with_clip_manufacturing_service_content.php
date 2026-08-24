<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'pvc-file-with-clip-manufacturing';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/pvc-file-with-clip-manufacturing.webp',
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
            'title' => 'PVC Clip Files',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'PVC File with Clip in Riyadh | Custom Branded Document Files Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom PVC files with clip and branded document folders in Riyadh. Window Advertising manufactures custom PVC files, clipboard folders, and branded document holders for companies across Saudi Arabia. Corporate gifts and stationery with full-color custom printing. Get a free quote.',
            'meta_keywords' => 'PVC file Riyadh, branded files Saudi Arabia, clipboard folders Riyadh, document folders Saudi Arabia, custom PVC folders Riyadh, تصميم هوية الرياض, دعاية واعلان الرياض, هدايا دعائية, دعاية واعلان السعودية, ملفات PVC الرياض',
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
            'title' => 'ملفات PVC',
            'content' => $this->getArabicContent(),
            'meta_title' => 'ملفات PVC مع مشبك في الرياض | ملفات وثائق مخصصة السعودية | ويندو للإعلان',
            'meta_description' => 'تصنيع ملفات PVC مع مشبك وملفات وثائق مخصصة في الرياض — ويندو للإعلان يصنع ملفات PVC وكلبسات وثائق وأكواد مخصصة للشركات في السعودية. دعاية واعلان الرياض وهدايا دعائية. احصل على عرض سعر.',
            'meta_keywords' => 'ملفات PVC الرياض, ملفات مخصصة السعودية, دعاية واعلان الرياض, هدايا دعائية, تصميم هوية, دعاية واعلان السعودية, ملفات شركاتية الرياض',
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
        $service = DB::table('services')->where('slug', 'pvc-file-with-clip-manufacturing')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Branded PVC files with clip are a staple of Saudi Arabia's corporate stationery and promotional gift market — practical, durable, and used daily in meeting rooms, offices, and medical environments. Window Advertising manufactures custom PVC clipboard files and document folders for companies across Riyadh and Saudi Arabia: branded with <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> for use as business stationery, distributed as conference gifts, or supplied as part of an employee stationery set.</p>

<h2>PVC Files in the Saudi Corporate Market</h2>
<p>In Saudi Arabia's business culture, meeting documentation and proposal presentation carry significant weight — the way documents are organized and presented at a client meeting reflects on the organization's professionalism. A quality branded PVC file containing a proposal or agenda communicates attention to detail in a way that loose papers or a standard folder does not.</p>
<p>Government entities, law firms, healthcare organizations, financial services companies, and corporate offices across Riyadh use branded PVC files as part of their standard business stationery set. Window Advertising manufactures PVC files that match the corporate identity of the organization — the logo, colors, and visual language consistent with the full stationery system, including <a href="/en/services/profile-design-printing">profile design and printing</a>.</p>

<h2>PVC File Types and Specifications</h2>
<p>Window Advertising manufactures PVC files and document holders across a range of specifications:</p>
<p>The rigid PVC clipboard file with spring metal clip is the most commonly used format in Saudi Arabia's corporate and medical environments. The standard A4 size accommodates most document requirements. The clip mechanism secures documents for writing or presentation use, while the rigid backing provides a stable writing surface. Available in solid colors with screen-printed logo or with a clear front pocket for printed inserts.</p>
<p>Soft PVC folder files with velcro or zip closure are appropriate for document filing and organization rather than active document presentation. These files are popular in conference gift sets for their slim profile and capacity.</p>
<p>Multi-section document organizer files provide multiple compartments for organizing different document categories — suitable for professional environments that require organized document management at meetings or site visits.</p>
<p>Custom-specification PVC files with non-standard sizes, specific hardware, additional pockets, or special materials are manufactured to project-specific briefs for organizations with particular requirements.</p>

<h2>Branded PVC Files as Promotional Gifts</h2>
<p>A branded PVC file is a <a href="/en/services/promotional-gifts">promotional gift</a> that earns its place in the recipient's daily routine. Unlike consumable promotional items, a quality PVC file used every working day provides ongoing brand impressions across months or years of use.</p>
<p>For conference gift sets across Riyadh, a branded PVC file containing the event program, speaker notes, and a branded pen creates a professional gift set that communicates the organizer's attention to detail. For corporate gift campaigns, a PVC file paired with a branded notebook and pen creates a practical stationery gift with sustained advertising impact.</p>
<p>Window Advertising produces PVC file promotional gift sets coordinated with other branded stationery items — notebooks, pens, USB drives, and <a href="/en/services/business-cards">business cards</a> — as unified gift set packages.</p>

<h2>Medical and Healthcare PVC Files</h2>
<p>Healthcare environments across Riyadh use PVC clipboard files extensively for patient documentation, medical records management, and clinical administration. Window Advertising manufactures healthcare-grade PVC clipboard files with easy-clean surfaces, durable spring clips rated for heavy daily use, and branding appropriate to the medical or healthcare organization. See also our dedicated <a href="/en/services/medical-files">medical files</a> service.</p>
<p>For private hospitals, clinics, pharmacies, and healthcare companies in Saudi Arabia, a quality branded clipboard file at every patient contact point communicates organizational standards and creates a consistent professional environment.</p>

<h2>Frequently Asked Questions About PVC File Manufacturing</h2>

<h3>What types of PVC files does Window Advertising manufacture?</h3>
<p>Window Advertising manufactures rigid PVC clipboard files with spring metal clips (the standard type used across corporate and medical environments in Saudi Arabia), soft PVC folder files with velcro or zip closure, A4 and foolscap size document files with front pocket and clip, custom-size PVC files to specific project requirements, and multi-section document organizer files. All types are available with full-color exterior printing or screen-printed logo application.</p>

<h3>How is branding applied to PVC files?</h3>
<p>Branding on PVC files can be applied through several methods: direct screen printing (one to four spot colors applied directly to the PVC surface — the most cost-effective method for large quantities), full-color digital printing on an insert card behind a clear PVC front pocket (allowing photographic quality branding at lower minimum quantities), UV printing directly on the PVC surface for premium full-color applications, and embossing or debossing the logo into the PVC surface for a tactile premium finish.</p>

<h3>Are PVC files suitable as corporate promotional gifts?</h3>
<p>Yes. Branded PVC files are a practical and well-received corporate promotional gift — they are used daily in office and meeting environments, keeping the brand visible throughout the working day. For government tenders, business meetings, and corporate presentations in Saudi Arabia, a quality branded document file containing the proposal or meeting agenda creates a professional first impression. PVC files also work well as part of employee welcome kits and conference gift sets.</p>

<h3>What is the minimum order for branded PVC files?</h3>
<p>Minimum order for screen-printed PVC files is typically 100 units. For full-color digitally printed insert files, the minimum is 50 units. Custom-manufactured PVC files with specific dimensions or hardware requirements typically require a minimum of 200 to 500 units. Contact Window Advertising for specific quantity pricing.</p>

<h2>Order PVC Files in Riyadh</h2>
<p>Tell us the file type, size specification, quantity, and your brand files. Our team provides a product sample recommendation and pricing within 24 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of PVC files does Window Advertising manufacture?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising manufactures rigid PVC clipboard files with spring metal clips (the standard type used across corporate and medical environments in Saudi Arabia), soft PVC folder files with velcro or zip closure, A4 and foolscap size document files with front pocket and clip, custom-size PVC files to specific project requirements, and multi-section document organizer files. All types are available with full-color exterior printing or screen-printed logo application."
      }
    },
    {
      "@type": "Question",
      "name": "How is branding applied to PVC files?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Branding on PVC files can be applied through several methods: direct screen printing (one to four spot colors applied directly to the PVC surface — the most cost-effective method for large quantities), full-color digital printing on an insert card behind a clear PVC front pocket (allowing photographic quality branding at lower minimum quantities), UV printing directly on the PVC surface for premium full-color applications, and embossing or debossing the logo into the PVC surface for a tactile premium finish."
      }
    },
    {
      "@type": "Question",
      "name": "Are PVC files suitable as corporate promotional gifts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Branded PVC files are a practical and well-received corporate promotional gift — they are used daily in office and meeting environments, keeping the brand visible throughout the working day. For government tenders, business meetings, and corporate presentations in Saudi Arabia, a quality branded document file containing the proposal or meeting agenda creates a professional first impression. PVC files also work well as part of employee welcome kits and conference gift sets."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for branded PVC files?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum order for screen-printed PVC files is typically 100 units. For full-color digitally printed insert files, the minimum is 50 units. Custom-manufactured PVC files with specific dimensions or hardware requirements typically require a minimum of 200 to 500 units. Contact Window Advertising for specific quantity pricing."
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
<p>تُعد ملفات PVC مع مشبك من العناصر الأساسية في سوق القرطاسية المؤسسية والهدايا الدعائية في المملكة العربية السعودية — عملية ومتينة وتُستخدم يومياً في قاعات الاجتماعات والمكاتب والبيئات الطبية. تصنّع ويندو للإعلان ملفات PVC مخصصة وملفات وثائق للشركات في جميع أنحاء الرياض والمملكة العربية السعودية: مطبوعة بـ<a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> للاستخدام كقرطاسية أعمال، أو توزيعها كهدايا مؤتمرات، أو تزويدها كجزء من طقم قرطاسية الموظفين.</p>

<h2>ملفات PVC في بيئة الأعمال السعودية</h2>
<p>في ثقافة الأعمال السعودية، تحمل وثائق الاجتماعات وتقديم العروض وزناً كبيراً — فطريقة تنظيم الوثائق وتقديمها في اجتماع العميل تعكس احترافية المنظمة. ملف PVC مؤسسي عالي الجودة يحتوي على عرض أو جدول أعمال ينقل الاهتمام بالتفاصيل بطريقة لا تحققها الأوراق المفكوكة أو الملفات العادية.</p>
<p>تستخدم الجهات الحكومية ومكاتب المحاماة ومنظمات الرعاية الصحية وشركات الخدمات المالية والمكاتب المؤسسية في جميع أنحاء الرياض ملفات PVC المؤسسية كجزء من طقم القرطاسية القياسي. تصنّع ويندو للإعلان ملفات PVC تتطابق مع الهوية المؤسسية للمنظمة — الشعار والألوان واللغة البصرية المتسقة مع نظام القرطاسية الكامل، بما في ذلك <a href="/ar/services/profile-design-printing">تصميم وطباعة البروفايل</a>.</p>

<h2>أنواع ومواصفات ملفات PVC</h2>
<p>تصنّع ويندو للإعلان ملفات PVC وحوافظ وثائق بمجموعة متنوعة من المواصفات:</p>
<p>ملف PVC الصلب مع مشبك معدني زنبركي هو الشكل الأكثر استخداماً في البيئات المؤسسية والطبية في المملكة العربية السعودية. يستوعب المقاس القياسي A4 معظم متطلبات الوثائق. تثبت آلية المشبك الوثائق للكتابة أو العرض، بينما توفر القاعدة الصلبة سطح كتابة مستقر. متوفر بألوان موحدة مع طباعة شعار بالشاشة الحريرية أو بجيب أمامي شفاف لبطاقات مطبوعة.</p>
<p>ملفات PVC المرنة مع إغلاق فيلكرو أو سحاب مناسبة لحفظ وتنظيم الوثائق بدلاً من تقديم الوثائق النشط. تحظى هذه الملفات بشعبية في أطقم هدايا المؤتمرات لملاءمتها النحيفة وسعتها.</p>
<p>ملفات تنظيم الوثائق متعددة الأقسام توفر حجرات متعددة لتنظيم فئات مختلفة من الوثائق — مناسبة للبيئات المهنية التي تتطلب إدارة منظمة للوثائق في الاجتماعات أو الزيارات الميدانية.</p>
<p>ملفات PVC بمواصفات خاصة بأحجام غير قياسية أو أدوات محددة أو جيوب إضافية أو مواد خاصة تُصنع وفق ملخصات مشاريع محددة للمنظمات ذات المتطلبات الخاصة.</p>

<h2>ملفات PVC كهدايا دعائية مخصصة</h2>
<p>ملف PVC المؤسسي هو <a href="/ar/services/promotional-gifts">هدية دعائية</a> تكسب مكانها في الروتين اليومي للمتلقي. على عكس الهدايا الدعائية الاستهلاكية، يوفر ملف PVC عالي الجودة المستخدم يومياً انطباعات مستمرة للعلامة التجارية على مدار أشهر أو سنوات من الاستخدام.</p>
<p>لأطقم هدايا المؤتمرات في الرياض، يُنشئ ملف PVC مؤسسي يحتوي على برنامج الفعالية وملاحظات المتحدثين وقلم مؤسسي طقم هدايا احترافي يعكس اهتمام المنظم بالتفاصيل. لحملات الهدايا المؤسسية، يُنشئ ملف PVC مقترن بدفتر وقلم مؤسسيين هدية قرطاسية عملية ذات تأثير إعلاني مستدام.</p>
<p>تنتج ويندو للإعلان أطقم هدايا ملفات PVC الدعائية المنسقة مع عناصر قرطاسية مؤسسية أخرى — الدفاتر والأقلام ومحركات USB و<a href="/ar/services/business-cards">بطاقات الأعمال</a> — كأطقم هدايا موحدة.</p>

<h2>ملفات PVC للبيئات الطبية والصحية</h2>
<p>تستخدم البيئات الصحية في جميع أنحاء الرياض ملفات PVC مع مشبك على نطاق واسع لتوثيق المرضى وإدارة السجلات الطبية والإدارة السريرية. تصنّع ويندو للإعلان ملفات PVC بدرجة طبية بأسطح سهلة التنظيف ومشابك زنبركية متينة مصممة للاستخدام اليومي المكثف وعلامة تجارية مناسبة للمنظمة الطبية أو الصحية. اطلع أيضاً على خدمة <a href="/ar/services/medical-files">الملفات الطبية</a> المخصصة لدينا.</p>
<p>للمستشفيات الخاصة والعيادات والصيدليات وشركات الرعاية الصحية في المملكة العربية السعودية، يُوصل ملف مشبك مؤسسي عالي الجودة في كل نقطة تواصل مع المريض المعايير التنظيمية ويخلق بيئة مهنية متسقة.</p>

<h2>الأسئلة الشائعة حول تصنيع ملفات PVC</h2>

<h3>ما أنواع ملفات PVC التي تصنعها ويندو للإعلان؟</h3>
<p>تصنّع ويندو للإعلان ملفات PVC الصلبة مع مشابك معدنية زنبركية (النوع القياسي المستخدم في البيئات المؤسسية والطبية في المملكة العربية السعودية)، وملفات PVC المرنة مع إغلاق فيلكرو أو سحاب، وملفات وثائق بمقاس A4 وفولسكاب مع جيب أمامي ومشبك، وملفات PVC بأحجام مخصصة وفق متطلبات المشروع، وملفات تنظيم وثائق متعددة الأقسام. جميع الأنواع متوفرة بطباعة خارجية كاملة الألوان أو طباعة شعار بالشاشة الحريرية.</p>

<h3>كيف يتم تطبيق العلامة التجارية على ملفات PVC؟</h3>
<p>يمكن تطبيق العلامة التجارية على ملفات PVC من خلال عدة طرق: الطباعة بالشاشة الحريرية المباشرة (من لون إلى أربعة ألوان مطبقة مباشرة على سطح PVC — الطريقة الأكثر فعالية من حيث التكلفة للكميات الكبيرة)، والطباعة الرقمية الكاملة الألوان على بطاقة داخلية خلف جيب PVC أمامي شفاف (تسمح بجودة تصوير فوتوغرافي بحد أدنى أقل من الكميات)، والطباعة بالأشعة فوق البنفسجية مباشرة على سطح PVC للتطبيقات الفاخرة كاملة الألوان، والنقش البارز أو الغائر للشعار في سطح PVC للحصول على لمسة نهائية فاخرة ملموسة.</p>

<h3>هل ملفات PVC مناسبة كهدايا دعائية مؤسسية؟</h3>
<p>نعم. ملفات PVC المؤسسية هي هدية دعائية عملية ومقبولة — تُستخدم يومياً في بيئات المكاتب والاجتماعات، مما يبقي العلامة التجارية مرئية طوال يوم العمل. للمناقصات الحكومية واجتماعات الأعمال والعروض التقديمية المؤسسية في المملكة العربية السعودية، يخلق ملف وثائق مؤسسي عالي الجودة يحتوي على العرض أو جدول أعمال الاجتماع انطباعاً أولياً احترافياً. تعمل ملفات PVC أيضاً بشكل جيد كجزء من أطقم ترحيب الموظفين وأطقم هدايا المؤتمرات.</p>

<h3>ما الحد الأدنى لطلب ملفات PVC المؤسسية؟</h3>
<p>الحد الأدنى لطلب ملفات PVC المطبوعة بالشاشة الحريرية هو عادة 100 وحدة. لملفات البطاقات الداخلية المطبوعة رقمياً بالألوان الكاملة، الحد الأدنى هو 50 وحدة. ملفات PVC المصنعة حسب الطلب بأبعاد أو متطلبات أدوات محددة تتطلب عادة حداً أدنى من 200 إلى 500 وحدة. تواصل مع ويندو للإعلان لأسعار الكميات المحددة.</p>

<h2>اطلب ملفات PVC في الرياض</h2>
<p>أخبرنا بنوع الملف ومواصفات الحجم والكمية وملفات علامتك التجارية. يقدم فريقنا توصية بعينة المنتج والأسعار خلال 24 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع ملفات PVC التي تصنعها ويندو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تصنّع ويندو للإعلان ملفات PVC الصلبة مع مشابك معدنية زنبركية (النوع القياسي المستخدم في البيئات المؤسسية والطبية في المملكة العربية السعودية)، وملفات PVC المرنة مع إغلاق فيلكرو أو سحاب، وملفات وثائق بمقاس A4 وفولسكاب مع جيب أمامي ومشبك، وملفات PVC بأحجام مخصصة وفق متطلبات المشروع، وملفات تنظيم وثائق متعددة الأقسام. جميع الأنواع متوفرة بطباعة خارجية كاملة الألوان أو طباعة شعار بالشاشة الحريرية."
      }
    },
    {
      "@type": "Question",
      "name": "كيف يتم تطبيق العلامة التجارية على ملفات PVC؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يمكن تطبيق العلامة التجارية على ملفات PVC من خلال عدة طرق: الطباعة بالشاشة الحريرية المباشرة (من لون إلى أربعة ألوان مطبقة مباشرة على سطح PVC — الطريقة الأكثر فعالية من حيث التكلفة للكميات الكبيرة)، والطباعة الرقمية الكاملة الألوان على بطاقة داخلية خلف جيب PVC أمامي شفاف، والطباعة بالأشعة فوق البنفسجية مباشرة على سطح PVC للتطبيقات الفاخرة، والنقش البارز أو الغائر للشعار في سطح PVC للحصول على لمسة نهائية فاخرة ملموسة."
      }
    },
    {
      "@type": "Question",
      "name": "هل ملفات PVC مناسبة كهدايا دعائية مؤسسية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. ملفات PVC المؤسسية هي هدية دعائية عملية ومقبولة — تُستخدم يومياً في بيئات المكاتب والاجتماعات، مما يبقي العلامة التجارية مرئية طوال يوم العمل. للمناقصات الحكومية واجتماعات الأعمال والعروض التقديمية المؤسسية في المملكة العربية السعودية، يخلق ملف وثائق مؤسسي عالي الجودة انطباعاً أولياً احترافياً. تعمل ملفات PVC أيضاً كجزء من أطقم ترحيب الموظفين وأطقم هدايا المؤتمرات."
      }
    },
    {
      "@type": "Question",
      "name": "ما الحد الأدنى لطلب ملفات PVC المؤسسية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الحد الأدنى لطلب ملفات PVC المطبوعة بالشاشة الحريرية هو عادة 100 وحدة. لملفات البطاقات الداخلية المطبوعة رقمياً بالألوان الكاملة، الحد الأدنى هو 50 وحدة. ملفات PVC المصنعة حسب الطلب بأبعاد أو متطلبات أدوات محددة تتطلب عادة حداً أدنى من 200 إلى 500 وحدة. تواصل مع ويندو للإعلان لأسعار الكميات المحددة."
      }
    }
  ]
}
</script>
HTML;
    }
};
