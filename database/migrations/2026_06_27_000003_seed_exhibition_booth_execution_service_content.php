<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'exhibition-booth-execution';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/exhibition-booth-execution.webp',
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
            'title' => 'Exhibition Booth Execution',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Exhibition Booth Execution in Riyadh | Window Advertising',
            'meta_description' => 'Professional exhibition booth design and execution in Riyadh. Window Advertising builds custom exhibition stands for trade shows, corporate events, and brand activations across Saudi Arabia. Get a free quote today.',
            'meta_keywords' => 'exhibition booth execution Riyadh, exhibition stand design Saudi Arabia, trade show booth construction Riyadh, booth execution company Riyadh, exhibition booth Saudi Arabia',
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
            'title' => 'تنفيذ أجنحة المعارض',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تنفيذ أجنحة المعارض في الرياض | ويندو للإعلان',
            'meta_description' => 'تصميم وتنفيذ أجنحة معارض احترافية في الرياض — أجنحة مخصصة للمعارض التجارية وفعاليات الشركات والتسويق الميداني. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'تنفيذ أجنحة معارض الرياض, تصميم جناح معرض السعودية, شركة تنفيذ أجنحة الرياض, تجهيز أجنحة المعارض, بناء أجنحة معارض الرياض',
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
        $service = DB::table('services')->where('slug', 'exhibition-booth-execution')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Your exhibition booth is your brand's physical presence on the show floor. Window Advertising designs and builds custom exhibition booths in Riyadh — from compact 9m² display areas to multi-story island stands — delivering every element from first sketch to final dismantling, alongside our <a href="/en/services/event-management">event management</a> expertise.</p>

<h2>What Is Exhibition Booth Execution?</h2>
<p>Exhibition booth execution is the complete process of designing, fabricating, transporting, installing, and dismantling a branded exhibition stand for a trade show or corporate event. A professionally executed booth does more than display your products — it creates an immersive brand environment that attracts visitors, initiates conversations, and leaves a lasting impression long after the event ends.</p>
<p>Window Advertising handles the entire execution chain in-house: concept design, structural fabrication, branded printing, lighting, furniture, and on-site installation. You hand us your brief and brand guidelines — we deliver a finished booth, ready to exhibit.</p>

<h2>Types of Exhibition Booths We Build</h2>
<p>We design and execute every major exhibition booth format:</p>
<p><strong>Custom-Built Booths:</strong> Fully bespoke structures engineered to your specifications. No standard modules — every element is designed specifically for your brand and space.</p>
<p><strong>Modular System Booths:</strong> Reusable aluminum frame systems with custom graphics panels. Ideal for companies that exhibit at multiple events throughout the year.</p>
<p><strong>Shell Scheme Upgrades:</strong> Significant enhancements to the standard venue shell scheme using custom graphic panels, flooring, lighting, and furniture — delivering a premium look within a standard space.</p>
<p><strong>Island Booths:</strong> Open on all sides, designed for maximum floor traffic. Our island booths create destination experiences on the show floor.</p>
<p><strong>Double-Deck Booths:</strong> Two-story structures for large exhibition footprints — featuring a ground-level display area and upper-level meeting space.</p>
<p>All booth types can be paired with our <a href="/en/services/events-conferences">events and conferences</a> services for complete event solutions.</p>

<h2>Our Exhibition Booth Execution Process</h2>
<p>We follow a structured workflow to deliver every booth on time and on brand:</p>
<ol>
<li><strong>Brief &amp; Site Plan</strong> — you provide your exhibition space dimensions, the event name and date, your brand guidelines, and any specific requirements.</li>
<li><strong>Design Concept</strong> — our designers produce a 3D visualization of your booth within 48–72 hours.</li>
<li><strong>Design Approval</strong> — you review and approve the concept. Revisions are included.</li>
<li><strong>Production</strong> — all structural, printing, and electrical elements are fabricated in our Riyadh facility.</li>
<li><strong>Pre-Build</strong> — for large booths, we pre-assemble the structure in our warehouse to check fit and finish before the event.</li>
<li><strong>Installation</strong> — our crew arrives at the venue during the official build period and installs your booth completely.</li>
<li><strong>Event Support</strong> — we remain available throughout the exhibition for any adjustments.</li>
<li><strong>Dismantling</strong> — we return after the event closes, dismantle the booth, and transport everything back. Reusable elements are stored for future exhibitions.</li>
</ol>

<h2>Exhibition Booth Elements We Produce</h2>
<p>Every element of your booth is produced and managed by Window Advertising:</p>
<ul>
<li>Structural framework: aluminum extrusions, custom timber builds, or hybrid systems</li>
<li>Graphic panels: high-resolution printed fabric, PVC, or direct print on rigid boards</li>
<li>Flooring: custom printed carpets, vinyl wraps, raised platforms, or parquet tiles</li>
<li>Lighting: LED spotlights, backlit panels, neon accents, ambient lighting rigs</li>
<li>Furniture: branded counters, reception desks, meeting tables, seating</li>
<li>Displays: monitor mounts, product <a href="/en/services/display-stands">display stands</a>, interactive kiosks</li>
<li>Branded giveaways: <a href="/en/services/promotional-gifts">promotional gifts</a>, bags, and literature for booth visitors</li>
</ul>
<p>For complex structures, we leverage our <a href="/en/services/3d-fabrication">3D fabrication</a> capabilities to create unique architectural elements.</p>

<h2>Why Window Advertising for Exhibition Booths?</h2>
<p>Companies in Riyadh return to Window Advertising for their exhibitions because we eliminate the coordination overhead. There is no managing a designer here, a printer there, and a carpenter somewhere else — we are one contact, one invoice, and one accountable team.</p>
<p>Our in-house production means faster turnaround and no margin added for subcontractors. Our experienced installation crew knows exhibition venue procedures in Riyadh, which means less stress during the exhibition build period.</p>
<p>We have delivered booths for local Saudi companies, regional brands, and international exhibitors entering the Saudi market — always to the standard that earns repeat business.</p>

<h2>Frequently Asked Questions About Exhibition Booths</h2>

<h3>How much does exhibition booth execution cost in Riyadh?</h3>
<p>Exhibition booth costs vary depending on size, materials, and complexity of the design. At Window Advertising, we offer customized solutions for every budget. Contact us for a free quote tailored to your event requirements.</p>

<h3>How long does it take to design and build an exhibition booth?</h3>
<p>The typical timeline is 2–4 weeks for design approval and fabrication. For urgent requests, we offer express turnaround. We recommend contacting us at least 3 weeks before your event date.</p>

<h3>Do you handle booth installation and dismantling?</h3>
<p>Yes. Window Advertising provides full turnkey exhibition booth services including design, printing, fabrication, on-site installation, and post-event dismantling throughout Riyadh and Saudi Arabia.</p>

<h3>What types of exhibition booths do you offer?</h3>
<p>We offer modular booths, custom-built booths, shell scheme upgrades, open-plan island booths, and double-deck booths — tailored for trade shows, government exhibitions, and private corporate events.</p>

<h3>Which exhibitions and trade shows in Riyadh do you support?</h3>
<p>Window Advertising has built booths for exhibitors at Riyadh International Convention Center (RICC), Jax District exhibitions, LEAP tech conference, Cityscape, and various government-organized trade shows and expos across Saudi Arabia.</p>

<h2>Request a Free Exhibition Booth Quote</h2>
<p>Exhibiting soon? Share your exhibition details — venue, dates, booth dimensions, and any design ideas — and our team will respond within 24 hours with a concept direction and cost estimate. We work with all exhibition footprint sizes and budgets.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How much does exhibition booth execution cost in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Exhibition booth costs vary depending on size, materials, and complexity of the design. At Window Advertising, we offer customized solutions for every budget. Contact us for a free quote tailored to your event requirements."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to design and build an exhibition booth?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The typical timeline is 2–4 weeks for design approval and fabrication. For urgent requests, we offer express turnaround. We recommend contacting us at least 3 weeks before your event date."
      }
    },
    {
      "@type": "Question",
      "name": "Do you handle booth installation and dismantling?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising provides full turnkey exhibition booth services including design, printing, fabrication, on-site installation, and post-event dismantling throughout Riyadh and Saudi Arabia."
      }
    },
    {
      "@type": "Question",
      "name": "What types of exhibition booths do you offer?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We offer modular booths, custom-built booths, shell scheme upgrades, open-plan island booths, and double-deck booths — tailored for trade shows, government exhibitions, and private corporate events."
      }
    },
    {
      "@type": "Question",
      "name": "Which exhibitions and trade shows in Riyadh do you support?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising has built booths for exhibitors at Riyadh International Convention Center (RICC), Jax District exhibitions, LEAP tech conference, Cityscape, and various government-organized trade shows and expos across Saudi Arabia."
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
<p>جناح المعرض هو الحضور المادي لعلامتك التجارية في أرض المعرض. تصمم وتبني ويندو للإعلان أجنحة معارض مخصصة في الرياض — من مساحات العرض المدمجة 9 أمتار مربعة إلى الأجنحة الجزيرية متعددة الطوابق — مقدمة كل عنصر من الرسم الأول إلى التفكيك النهائي، إلى جانب خبرتنا في <a href="/ar/services/event-management">إدارة الفعاليات</a>.</p>

<h2>ما هو تنفيذ أجنحة المعارض؟</h2>
<p>تنفيذ أجنحة المعارض هو العملية الكاملة لتصميم وتصنيع ونقل وتركيب وتفكيك جناح معرض يحمل العلامة التجارية لمعرض تجاري أو فعالية مؤسسية. الجناح المنفذ باحترافية يفعل أكثر من عرض منتجاتك — إنه يخلق بيئة علامة تجارية غامرة تجذب الزوار وتبدأ المحادثات وتترك انطباعاً دائماً بعد انتهاء الفعالية بوقت طويل.</p>
<p>تتولى ويندو للإعلان سلسلة التنفيذ بالكامل داخلياً: تصميم المفهوم، والتصنيع الهيكلي، والطباعة المؤسسية، والإضاءة، والأثاث، والتركيب في الموقع. تسلمنا ملخصك وإرشادات علامتك التجارية — ونسلمك جناحاً جاهزاً للعرض.</p>

<h2>أنواع أجنحة المعارض التي ننفذها</h2>
<p>نصمم وننفذ جميع أشكال أجنحة المعارض الرئيسية:</p>
<p><strong>أجنحة مصممة خصيصاً:</strong> هياكل مخصصة بالكامل ومصممة وفق مواصفاتك. لا وحدات قياسية — كل عنصر مصمم خصيصاً لعلامتك التجارية ومساحتك.</p>
<p><strong>أجنحة نظام معياري:</strong> أنظمة إطار ألمنيوم قابلة لإعادة الاستخدام مع لوحات رسومات مخصصة. مثالية للشركات التي تعرض في فعاليات متعددة على مدار العام.</p>
<p><strong>ترقية الهيكل الأساسي:</strong> تحسينات كبيرة على الهيكل الأساسي القياسي للمكان باستخدام لوحات رسومات مخصصة وأرضيات وإضاءة وأثاث — لتقديم مظهر فاخر ضمن مساحة قياسية.</p>
<p><strong>الأجنحة الجزيرية:</strong> مفتوحة من جميع الجوانب، مصممة لأقصى حركة مرور. تخلق أجنحتنا الجزيرية تجارب وجهة في أرض المعرض.</p>
<p><strong>الأجنحة ذات الطابقين:</strong> هياكل من طابقين للمساحات الكبيرة — تتضمن منطقة عرض في الطابق الأرضي ومساحة اجتماعات في الطابق العلوي.</p>
<p>يمكن دمج جميع أنواع الأجنحة مع خدمات <a href="/ar/services/events-conferences">الفعاليات والمؤتمرات</a> لحلول فعاليات شاملة.</p>

<h2>مراحل تنفيذ جناح المعرض</h2>
<p>نتبع سير عمل منظم لتسليم كل جناح في الوقت المحدد وبما يتوافق مع العلامة التجارية:</p>
<ol>
<li><strong>الملخص ومخطط الموقع</strong> — تزودنا بأبعاد مساحة العرض واسم الفعالية وتاريخها وإرشادات علامتك التجارية وأي متطلبات خاصة.</li>
<li><strong>مفهوم التصميم</strong> — ينتج مصممونا تصوراً ثلاثي الأبعاد لجناحك خلال 48-72 ساعة.</li>
<li><strong>اعتماد التصميم</strong> — تراجع وتوافق على المفهوم. التعديلات مشمولة.</li>
<li><strong>الإنتاج</strong> — تُصنع جميع العناصر الهيكلية والطباعية والكهربائية في منشأتنا بالرياض.</li>
<li><strong>التجميع المسبق</strong> — للأجنحة الكبيرة، نجمع الهيكل مسبقاً في مستودعنا للتحقق من الملاءمة والتشطيب قبل الفعالية.</li>
<li><strong>التركيب</strong> — يصل فريقنا إلى المكان خلال فترة البناء الرسمية ويركب جناحك بالكامل.</li>
<li><strong>الدعم أثناء الفعالية</strong> — نبقى متاحين طوال المعرض لأي تعديلات.</li>
<li><strong>التفكيك</strong> — نعود بعد إغلاق الفعالية، ونفكك الجناح، وننقل كل شيء. العناصر القابلة لإعادة الاستخدام تُخزن للمعارض المستقبلية.</li>
</ol>

<h2>عناصر الجناح التي ننتجها</h2>
<p>كل عنصر من جناحك يُنتج ويُدار بواسطة ويندو للإعلان:</p>
<ul>
<li>الإطار الهيكلي: مقاطع ألمنيوم، أو بناء خشبي مخصص، أو أنظمة هجينة</li>
<li>لوحات الرسومات: قماش مطبوع عالي الدقة، أو PVC، أو طباعة مباشرة على ألواح صلبة</li>
<li>الأرضيات: سجاد مطبوع مخصص، أو أغلفة فينيل، أو منصات مرتفعة، أو بلاط باركيه</li>
<li>الإضاءة: أضواء LED موجهة، لوحات مضاءة خلفياً، لمسات نيون، أنظمة إضاءة محيطة</li>
<li>الأثاث: كاونترات ذات علامة تجارية، مكاتب استقبال، طاولات اجتماعات، مقاعد</li>
<li>شاشات العرض: حوامل شاشات، <a href="/ar/services/display-stands">ستاندات عرض</a> المنتجات، أكشاك تفاعلية</li>
<li>الهدايا المؤسسية: <a href="/ar/services/promotional-gifts">هدايا ترويجية</a>، حقائب، ومطبوعات لزوار الجناح</li>
</ul>
<p>للهياكل المعقدة، نستفيد من قدرات <a href="/ar/services/3d-fabrication">التصنيع ثلاثي الأبعاد</a> لإنشاء عناصر معمارية فريدة.</p>

<h2>لماذا ويندو للإعلان لأجنحة المعارض؟</h2>
<p>تعود الشركات في الرياض إلى ويندو للإعلان لمعارضها لأننا نزيل عبء التنسيق. لا إدارة مصمم هنا ومطبعة هناك ونجار في مكان آخر — نحن جهة اتصال واحدة وفاتورة واحدة وفريق واحد مسؤول.</p>
<p>إنتاجنا الداخلي يعني سرعة أكبر في التسليم وعدم إضافة هامش للمقاولين من الباطن. فريق التركيب المتمرس لدينا يعرف إجراءات أماكن المعارض في الرياض، مما يعني ضغطاً أقل خلال فترة بناء المعرض.</p>
<p>قدمنا أجنحة لشركات سعودية محلية وعلامات تجارية إقليمية وعارضين دوليين يدخلون السوق السعودي — دائماً بالمعيار الذي يكسب تكرار الأعمال.</p>

<h2>الأسئلة الشائعة حول أجنحة المعارض</h2>

<h3>كم تكلفة تنفيذ جناح معرض في الرياض؟</h3>
<p>تختلف تكاليف أجنحة المعارض حسب الحجم والمواد وتعقيد التصميم. في ويندو للإعلان، نقدم حلولاً مخصصة لكل ميزانية. تواصل معنا للحصول على عرض سعر مجاني مصمم وفق متطلبات فعاليتك.</p>

<h3>كم يستغرق تصميم وبناء جناح معرض؟</h3>
<p>الجدول الزمني النموذجي هو 2-4 أسابيع لاعتماد التصميم والتصنيع. للطلبات العاجلة، نقدم تسليماً سريعاً. نوصي بالتواصل معنا قبل 3 أسابيع على الأقل من تاريخ فعاليتك.</p>

<h3>هل تتولون تركيب وتفكيك الجناح؟</h3>
<p>نعم. توفر ويندو للإعلان خدمات أجنحة معارض شاملة تشمل التصميم والطباعة والتصنيع والتركيب في الموقع والتفكيك بعد الفعالية في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<h3>ما أنواع أجنحة المعارض التي تقدمونها؟</h3>
<p>نقدم أجنحة معيارية، وأجنحة مبنية خصيصاً، وترقيات الهيكل الأساسي، وأجنحة جزيرية مفتوحة، وأجنحة ذات طابقين — مصممة للمعارض التجارية والمعارض الحكومية والفعاليات المؤسسية الخاصة.</p>

<h3>أي المعارض والمعارض التجارية في الرياض تدعمون؟</h3>
<p>بنت ويندو للإعلان أجنحة للعارضين في مركز الرياض الدولي للمؤتمرات والمعارض، ومعارض حي جاكس، ومؤتمر ليب التقني، وسيتي سكيب، ومعارض تجارية حكومية متنوعة في جميع أنحاء المملكة العربية السعودية.</p>

<h2>احصل على عرض سعر مجاني لجناحك</h2>
<p>تعرض قريباً؟ شاركنا تفاصيل معرضك — المكان والتواريخ وأبعاد الجناح وأي أفكار تصميمية — وسيرد فريقنا خلال 24 ساعة بتوجه مفهومي وتقدير تكلفة. نعمل مع جميع أحجام مساحات العرض والميزانيات.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "كم تكلفة تنفيذ جناح معرض في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تختلف تكاليف أجنحة المعارض حسب الحجم والمواد وتعقيد التصميم. في ويندو للإعلان، نقدم حلولاً مخصصة لكل ميزانية. تواصل معنا للحصول على عرض سعر مجاني مصمم وفق متطلبات فعاليتك."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق تصميم وبناء جناح معرض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الجدول الزمني النموذجي هو 2-4 أسابيع لاعتماد التصميم والتصنيع. للطلبات العاجلة، نقدم تسليماً سريعاً. نوصي بالتواصل معنا قبل 3 أسابيع على الأقل من تاريخ فعاليتك."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولون تركيب وتفكيك الجناح؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توفر ويندو للإعلان خدمات أجنحة معارض شاملة تشمل التصميم والطباعة والتصنيع والتركيب في الموقع والتفكيك بعد الفعالية في جميع أنحاء الرياض والمملكة العربية السعودية."
      }
    },
    {
      "@type": "Question",
      "name": "ما أنواع أجنحة المعارض التي تقدمونها؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نقدم أجنحة معيارية، وأجنحة مبنية خصيصاً، وترقيات الهيكل الأساسي، وأجنحة جزيرية مفتوحة، وأجنحة ذات طابقين — مصممة للمعارض التجارية والمعارض الحكومية والفعاليات المؤسسية الخاصة."
      }
    },
    {
      "@type": "Question",
      "name": "أي المعارض والمعارض التجارية في الرياض تدعمون؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "بنت ويندو للإعلان أجنحة للعارضين في مركز الرياض الدولي للمؤتمرات والمعارض، ومعارض حي جاكس، ومؤتمر ليب التقني، وسيتي سكيب، ومعارض تجارية حكومية متنوعة في جميع أنحاء المملكة العربية السعودية."
      }
    }
  ]
}
</script>
HTML;
    }
};
