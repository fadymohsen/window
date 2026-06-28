<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'banner-printing-installation';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/banner-printing-installation.webp',
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
            'title' => 'Banner Printing & Installation',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Banner Printing & Installation in Riyadh | Window Advertising',
            'meta_description' => 'Professional banner printing and installation in Riyadh. Window Advertising prints and installs outdoor and indoor banners, street banners, and advertising banners for events, retail, and corporate campaigns across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'banner printing Riyadh, banner installation Saudi Arabia, outdoor banner printing Riyadh, advertising banners Riyadh, دعاية وإعلان الرياض, طباعة بنر الرياض, دعاية وإعلان السعودية',
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
            'title' => 'طباعة وتركيب البنرات',
            'content' => $this->getArabicContent(),
            'meta_title' => 'طباعة وتركيب البنرات في الرياض | وينوو للإعلان',
            'meta_description' => 'طباعة وتركيب بنرات احترافية في الرياض — بنرات خارجية وداخلية وبنرات شوارع وإعلانات تجارية للفعاليات والمحلات والحملات الشركاتية. دعاية وإعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'طباعة بنر الرياض, تركيب بنرات السعودية, بنرات إعلانية الرياض, طباعة بنرات خارجية, دعاية وإعلان الرياض, بنرات فعاليات الرياض, دعاية وإعلان السعودية',
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
        $service = DB::table('services')->where('slug', 'banner-printing-installation')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Banners are the most flexible and cost-effective large-format advertising tool in the Saudi market. Whether you need a single indoor event <a href="/en/services/backdrop">backdrop</a>, a street-spanning outdoor advertising banner, or a full building facade print, Window Advertising prints and installs banners of every format and scale across Riyadh and the Kingdom. From <a href="/en/services/roll-up">roll-up stands</a> to massive scaffolding wraps, we handle every step from design to installation.</p>

<h2>Why Banners Remain the Foundation of Outdoor Advertising</h2>
<p>In Saudi Arabia's fast-paced advertising market, banners continue to be the highest-volume printed advertising product — and for good reason. They are fast to produce, affordable at any scale, and visually impactful at the sizes where outdoor advertising works best.</p>
<p>Banners communicate your brand across road frontages, construction sites, event venues, retail environments, and public spaces. Unlike digital advertising, a well-positioned outdoor banner works 24 hours a day, 7 days a week, without a recurring cost. Window Advertising has been producing banners for advertising campaigns, events, retail launches, and corporate projects across Riyadh since the company's founding.</p>

<h2>Types of Banners We Print and Install</h2>
<p>Window Advertising produces every format of advertising banner used in the Saudi market:</p>
<p><strong>Outdoor PVC Banners</strong> are the standard for street, fence, and building-mounted advertising. Printed on heavy-duty PVC flex material with UV-resistant inks, these are the core product of large-format outdoor advertising.</p>
<p><strong>Mesh Banners</strong> are printed on perforated fabric that allows wind to pass through — essential for elevated, exposed, or large-format installations where wind load is a safety consideration. Mesh is the standard material for scaffolding banners on construction sites and large building wraps.</p>
<p><strong>Indoor Event Banners</strong> are printed on lighter fabric or vinyl substrates for indoor use — exhibitions, conferences, retail stores, offices, and event venues. These prioritize print clarity and visual sharpness at close viewing distances.</p>
<p><strong>Backlit Banners</strong> are printed on translucent film designed for lightbox frames. Used in airport advertising, mall signage, and premium retail environments where illuminated signage is required.</p>
<p><strong>Scaffolding Banners</strong> are large printed banners mounted to construction scaffolding to cover building facades during renovation or construction. They simultaneously conceal construction activity and serve as a large-scale advertising canvas — similar in function to <a href="/en/services/project-signboards-walls">project signboards</a> used on development sites.</p>

<h2>Large-Format Printing Capabilities</h2>
<p>Window Advertising operates large-format digital printing equipment capable of producing banners to any dimension required by a campaign. Our standard printing width handles up to 5 meters in a single pass. For banners wider than this, we produce seamless joins using precision alignment that is invisible at normal viewing distances.</p>
<p>Our color management process ensures that banner colors match your brand specifications accurately across every panel. We maintain calibrated color profiles for all common brand color standards, and we provide digital proofs for approval before production begins on any order.</p>

<h2>Professional Installation Across Riyadh</h2>
<p>Printing a banner is only half the service. Professional installation ensures the banner is mounted safely, tensioned correctly, and positioned for maximum visibility. Window Advertising provides complete installation services across Riyadh for every banner format.</p>
<p>Our installation team handles all required mounting hardware, structural fixings, tensioning systems, and rigging for elevated installations. For large installations requiring access equipment, we coordinate scaffolding or lift platforms as part of the installation service.</p>
<p>We also manage the removal and disposal of banners at campaign end — leaving the mounting location clean and ready for the next installation.</p>

<h2>Banners for Events and Advertising Campaigns</h2>
<p>Event organizers across Riyadh rely on Window Advertising for fast, high-quality banner production and installation coordinated with their event timeline. We produce banners for <a href="/en/services/national-day-celebrations">national day events</a>, Founding Day events, product launch campaigns, exhibition halls, sports events, and outdoor festivals.</p>
<p>For advertising campaigns running across multiple locations in Riyadh, we manage the full production and installation roll-out — consistent print quality across every banner, coordinated installation scheduling, and a single point of contact for the entire campaign. We also supply <a href="/en/services/display-stands">display stands</a> for indoor event environments where portable banner solutions are needed.</p>

<h2>Banner Printing Portfolio — Riyadh</h2>
<p>Our banner printing and installation portfolio includes outdoor advertising campaigns, event installations, retail launch banners, and construction site scaffolding banners across Riyadh and Saudi Arabia. Browse the gallery below to see the scale and range of work delivered by Window Advertising.</p>

<h2>Frequently Asked Questions About Banner Printing</h2>

<h3>What banner materials does Window Advertising use for outdoor printing?</h3>
<p>Window Advertising prints outdoor banners on PVC flex materials, mesh banner fabric, and backlit film depending on the application. All outdoor materials use UV-resistant solvent inks that maintain color vibrancy in Riyadh's high-temperature outdoor conditions. Standard banner materials are reinforced with hemmed edges and metal eyelets for secure mounting.</p>

<h3>What sizes of banners can Window Advertising print?</h3>
<p>Window Advertising prints banners in any size from small event signs to very large outdoor advertising banners. Our large-format printing equipment handles widths up to 5 meters. For larger installations, panels are printed in sections and seamed together on-site. Contact us with your required dimensions for a specific quote.</p>

<h3>Does Window Advertising handle both printing and installation?</h3>
<p>Yes. Window Advertising provides a complete supply-and-install service. Our installation team handles the mounting hardware, rigging, scaffolding coordination, and physical installation at your site across Riyadh and Saudi Arabia. You receive a ready-installed banner without managing separate contractors.</p>

<h3>How quickly can banners be printed in Riyadh?</h3>
<p>Standard banner orders with approved designs are printed within 1 to 3 business days. Large format or high-quantity orders may require 3 to 5 business days. For urgent event or campaign needs, same-day and next-day production is available depending on current capacity.</p>

<h3>Can banners be used for outdoor advertising in Riyadh?</h3>
<p>Yes. Window Advertising produces outdoor advertising banners for street installation, building facades, fencing, scaffolding, and event perimeters across Riyadh. We use materials and finishing methods that withstand Riyadh's outdoor climate, including wind-resistant mesh options for exposed locations.</p>

<h2>Get a Banner Printing Quote in Riyadh</h2>
<p>Tell us your banner dimensions, quantity, material preference, and whether you need installation. Our team provides a complete quote within the same business day for standard orders. Urgent production is available for event deadlines.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What banner materials does Window Advertising use for outdoor printing?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising prints outdoor banners on PVC flex materials, mesh banner fabric, and backlit film depending on the application. All outdoor materials use UV-resistant solvent inks that maintain color vibrancy in Riyadh's high-temperature outdoor conditions. Standard banner materials are reinforced with hemmed edges and metal eyelets for secure mounting."
      }
    },
    {
      "@type": "Question",
      "name": "What sizes of banners can Window Advertising print?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising prints banners in any size from small event signs to very large outdoor advertising banners. Our large-format printing equipment handles widths up to 5 meters. For larger installations, panels are printed in sections and seamed together on-site. Contact us with your required dimensions for a specific quote."
      }
    },
    {
      "@type": "Question",
      "name": "Does Window Advertising handle both printing and installation?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising provides a complete supply-and-install service. Our installation team handles the mounting hardware, rigging, scaffolding coordination, and physical installation at your site across Riyadh and Saudi Arabia. You receive a ready-installed banner without managing separate contractors."
      }
    },
    {
      "@type": "Question",
      "name": "How quickly can banners be printed in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard banner orders with approved designs are printed within 1 to 3 business days. Large format or high-quantity orders may require 3 to 5 business days. For urgent event or campaign needs, same-day and next-day production is available depending on current capacity."
      }
    },
    {
      "@type": "Question",
      "name": "Can banners be used for outdoor advertising in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising produces outdoor advertising banners for street installation, building facades, fencing, scaffolding, and event perimeters across Riyadh. We use materials and finishing methods that withstand Riyadh's outdoor climate, including wind-resistant mesh options for exposed locations."
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
<p>البنرات هي أكثر أدوات الإعلان كبيرة الحجم مرونة وفعالية من حيث التكلفة في السوق السعودي. سواء كنت بحاجة إلى <a href="/ar/services/backdrop">خلفية</a> لفعالية داخلية، أو بنر إعلاني خارجي يمتد عبر الشارع، أو طباعة واجهة مبنى كاملة، تقوم وينوو للإعلان بطباعة وتركيب البنرات بجميع الأشكال والأحجام في جميع أنحاء الرياض والمملكة. من <a href="/ar/services/roll-up">ستاندات الرول أب</a> إلى أغلفة السقالات الضخمة، نتولى كل خطوة من التصميم إلى التركيب.</p>

<h2>لماذا تظل البنرات أساس الإعلان الخارجي؟</h2>
<p>في سوق الإعلان السعودي سريع الإيقاع، تظل البنرات المنتج الإعلاني المطبوع الأكثر انتشاراً — ولسبب وجيه. إنتاجها سريع، وبأسعار معقولة بأي حجم، ومؤثرة بصرياً في الأحجام التي يعمل فيها الإعلان الخارجي بأفضل شكل.</p>
<p>تنقل البنرات علامتك التجارية عبر واجهات الطرق ومواقع البناء وأماكن الفعاليات وبيئات البيع بالتجزئة والأماكن العامة. على عكس الإعلان الرقمي، يعمل البنر الخارجي الموضوع بشكل جيد 24 ساعة في اليوم، 7 أيام في الأسبوع، دون تكلفة متكررة. تقوم وينوو للإعلان بإنتاج البنرات للحملات الإعلانية والفعاليات وإطلاق المتاجر والمشاريع المؤسسية في جميع أنحاء الرياض منذ تأسيس الشركة.</p>

<h2>أنواع البنرات التي نطبعها ونركبها</h2>
<p>تنتج وينوو للإعلان كل أشكال البنرات الإعلانية المستخدمة في السوق السعودي:</p>
<p><strong>بنرات PVC الخارجية</strong> هي المعيار للإعلان على الشوارع والأسوار والمباني. تُطبع على مواد PVC فلكس شديدة التحمل بأحبار مقاومة للأشعة فوق البنفسجية، وهي المنتج الأساسي للإعلان الخارجي كبير الحجم.</p>
<p><strong>بنرات الشبك (Mesh)</strong> تُطبع على قماش مثقب يسمح بمرور الرياح — وهو أمر ضروري للتركيبات المرتفعة أو المكشوفة أو كبيرة الحجم حيث يكون حمل الرياح اعتباراً أمنياً. الشبك هو المادة القياسية لبنرات السقالات في مواقع البناء وأغلفة المباني الكبيرة.</p>
<p><strong>بنرات الفعاليات الداخلية</strong> تُطبع على قماش أخف أو ركائز فينيل للاستخدام الداخلي — المعارض والمؤتمرات ومتاجر التجزئة والمكاتب وأماكن الفعاليات. تركز هذه على وضوح الطباعة والحدة البصرية عند مسافات المشاهدة القريبة.</p>
<p><strong>البنرات المضاءة من الخلف (Backlit)</strong> تُطبع على فيلم شفاف مصمم لإطارات صناديق الإضاءة. تُستخدم في إعلانات المطارات ولافتات المولات وبيئات التجزئة الراقية حيث تكون اللافتات المضيئة مطلوبة.</p>
<p><strong>بنرات السقالات</strong> هي بنرات مطبوعة كبيرة تُثبت على سقالات البناء لتغطية واجهات المباني أثناء التجديد أو البناء. تخفي نشاط البناء وتعمل في نفس الوقت كلوحة إعلانية كبيرة — مشابهة في وظيفتها لـ<a href="/ar/services/project-signboards-walls">لوحات المشاريع</a> المستخدمة في مواقع التطوير.</p>

<h2>إمكانيات الطباعة بالحجم الكبير</h2>
<p>تشغّل وينوو للإعلان معدات طباعة رقمية كبيرة الحجم قادرة على إنتاج بنرات بأي أبعاد تتطلبها الحملة. يتعامل عرض الطباعة القياسي لدينا مع ما يصل إلى 5 أمتار في تمريرة واحدة. للبنرات الأعرض من ذلك، ننتج وصلات سلسة باستخدام محاذاة دقيقة غير مرئية على مسافات المشاهدة العادية.</p>
<p>تضمن عملية إدارة الألوان لدينا أن ألوان البنر تطابق مواصفات علامتك التجارية بدقة عبر كل لوحة. نحتفظ بملفات ألوان معايرة لجميع معايير ألوان العلامات التجارية الشائعة، ونقدم بروفات رقمية للموافقة قبل بدء الإنتاج في أي طلب.</p>

<h2>التركيب الاحترافي في الرياض</h2>
<p>طباعة البنر هي نصف الخدمة فقط. التركيب الاحترافي يضمن تثبيت البنر بأمان وشده بشكل صحيح ووضعه لتحقيق أقصى قدر من الرؤية. توفر وينوو للإعلان خدمات تركيب كاملة في جميع أنحاء الرياض لكل أشكال البنرات.</p>
<p>يتولى فريق التركيب لدينا جميع أجهزة التثبيت المطلوبة والتثبيتات الهيكلية وأنظمة الشد والتعليق للتركيبات المرتفعة. للتركيبات الكبيرة التي تتطلب معدات وصول، ننسق السقالات أو منصات الرفع كجزء من خدمة التركيب.</p>
<p>نتولى أيضاً إزالة البنرات والتخلص منها عند انتهاء الحملة — تاركين موقع التثبيت نظيفاً وجاهزاً للتركيب التالي.</p>

<h2>بنرات الفعاليات والحملات الإعلانية</h2>
<p>يعتمد منظمو الفعاليات في جميع أنحاء الرياض على وينوو للإعلان لإنتاج وتركيب بنرات سريعة وعالية الجودة منسقة مع الجدول الزمني لفعالياتهم. ننتج بنرات لـ<a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> وفعاليات يوم التأسيس وحملات إطلاق المنتجات وقاعات المعارض والفعاليات الرياضية والمهرجانات الخارجية.</p>
<p>للحملات الإعلانية التي تعمل عبر مواقع متعددة في الرياض، ندير الإنتاج الكامل وتنفيذ التركيب — جودة طباعة متسقة عبر كل بنر، وجدولة تركيب منسقة، ونقطة اتصال واحدة للحملة بأكملها. كما نوفر <a href="/ar/services/display-stands">ستاندات العرض</a> لبيئات الفعاليات الداخلية حيث تكون حلول البنرات المحمولة مطلوبة.</p>

<h2>أعمالنا في طباعة البنرات بالرياض</h2>
<p>تتضمن محفظة أعمالنا في طباعة وتركيب البنرات حملات إعلانية خارجية وتركيبات فعاليات وبنرات إطلاق متاجر وبنرات سقالات مواقع البناء في جميع أنحاء الرياض والمملكة العربية السعودية. تصفح المعرض أدناه لمشاهدة حجم ونطاق الأعمال المنجزة من وينوو للإعلان.</p>

<h2>الأسئلة الشائعة حول طباعة البنرات</h2>

<h3>ما المواد التي تستخدمها وينوو للإعلان لطباعة البنرات الخارجية؟</h3>
<p>تطبع وينوو للإعلان البنرات الخارجية على مواد PVC فلكس وقماش بنر شبكي وفيلم إضاءة خلفية حسب التطبيق. تستخدم جميع المواد الخارجية أحبار مذيبة مقاومة للأشعة فوق البنفسجية تحافظ على حيوية الألوان في ظروف الرياض الخارجية ذات الحرارة العالية. تُعزز مواد البنر القياسية بحواف مطوية وثقوب معدنية للتثبيت الآمن.</p>

<h3>ما أحجام البنرات التي يمكن لوينوو للإعلان طباعتها؟</h3>
<p>تطبع وينوو للإعلان بنرات بأي حجم من لافتات الفعاليات الصغيرة إلى بنرات الإعلان الخارجي الكبيرة جداً. تتعامل معدات الطباعة كبيرة الحجم لدينا مع عروض تصل إلى 5 أمتار. للتركيبات الأكبر، تُطبع اللوحات على أقسام وتُوصل معاً في الموقع. تواصل معنا بالأبعاد المطلوبة للحصول على عرض سعر محدد.</p>

<h3>هل تتولى وينوو للإعلان الطباعة والتركيب معاً؟</h3>
<p>نعم. توفر وينوو للإعلان خدمة توريد وتركيب كاملة. يتولى فريق التركيب لدينا أجهزة التثبيت والتعليق وتنسيق السقالات والتركيب الفعلي في موقعك في جميع أنحاء الرياض والمملكة العربية السعودية. تحصل على بنر مركب جاهز دون إدارة مقاولين منفصلين.</p>

<h3>ما سرعة طباعة البنرات في الرياض؟</h3>
<p>تُطبع طلبات البنرات القياسية بتصاميم معتمدة خلال يوم إلى 3 أيام عمل. قد تتطلب الطلبات كبيرة الحجم أو عالية الكمية من 3 إلى 5 أيام عمل. لاحتياجات الفعاليات أو الحملات العاجلة، يتوفر الإنتاج في نفس اليوم أو اليوم التالي حسب السعة الحالية.</p>

<h3>هل يمكن استخدام البنرات للإعلان الخارجي في الرياض؟</h3>
<p>نعم. تنتج وينوو للإعلان بنرات إعلانية خارجية للتركيب في الشوارع وواجهات المباني والأسوار والسقالات ومحيطات الفعاليات في جميع أنحاء الرياض. نستخدم مواد وطرق تشطيب تتحمل مناخ الرياض الخارجي، بما في ذلك خيارات الشبك المقاوم للرياح للمواقع المكشوفة.</p>

<h2>احصل على عرض سعر للبنرات في الرياض</h2>
<p>أخبرنا بأبعاد البنر والكمية وتفضيل المادة وما إذا كنت بحاجة إلى تركيب. يقدم فريقنا عرض سعر كامل خلال نفس يوم العمل للطلبات القياسية. الإنتاج العاجل متاح لمواعيد الفعاليات النهائية.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما المواد التي تستخدمها وينوو للإعلان لطباعة البنرات الخارجية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تطبع وينوو للإعلان البنرات الخارجية على مواد PVC فلكس وقماش بنر شبكي وفيلم إضاءة خلفية حسب التطبيق. تستخدم جميع المواد الخارجية أحبار مذيبة مقاومة للأشعة فوق البنفسجية تحافظ على حيوية الألوان في ظروف الرياض الخارجية ذات الحرارة العالية. تُعزز مواد البنر القياسية بحواف مطوية وثقوب معدنية للتثبيت الآمن."
      }
    },
    {
      "@type": "Question",
      "name": "ما أحجام البنرات التي يمكن لوينوو للإعلان طباعتها؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تطبع وينوو للإعلان بنرات بأي حجم من لافتات الفعاليات الصغيرة إلى بنرات الإعلان الخارجي الكبيرة جداً. تتعامل معدات الطباعة كبيرة الحجم لدينا مع عروض تصل إلى 5 أمتار. للتركيبات الأكبر، تُطبع اللوحات على أقسام وتُوصل معاً في الموقع. تواصل معنا بالأبعاد المطلوبة للحصول على عرض سعر محدد."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولى وينوو للإعلان الطباعة والتركيب معاً؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توفر وينوو للإعلان خدمة توريد وتركيب كاملة. يتولى فريق التركيب لدينا أجهزة التثبيت والتعليق وتنسيق السقالات والتركيب الفعلي في موقعك في جميع أنحاء الرياض والمملكة العربية السعودية. تحصل على بنر مركب جاهز دون إدارة مقاولين منفصلين."
      }
    },
    {
      "@type": "Question",
      "name": "ما سرعة طباعة البنرات في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُطبع طلبات البنرات القياسية بتصاميم معتمدة خلال يوم إلى 3 أيام عمل. قد تتطلب الطلبات كبيرة الحجم أو عالية الكمية من 3 إلى 5 أيام عمل. لاحتياجات الفعاليات أو الحملات العاجلة، يتوفر الإنتاج في نفس اليوم أو اليوم التالي حسب السعة الحالية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن استخدام البنرات للإعلان الخارجي في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تنتج وينوو للإعلان بنرات إعلانية خارجية للتركيب في الشوارع وواجهات المباني والأسوار والسقالات ومحيطات الفعاليات في جميع أنحاء الرياض. نستخدم مواد وطرق تشطيب تتحمل مناخ الرياض الخارجي، بما في ذلك خيارات الشبك المقاوم للرياح للمواقع المكشوفة."
      }
    }
  ]
}
</script>
HTML;
    }
};
