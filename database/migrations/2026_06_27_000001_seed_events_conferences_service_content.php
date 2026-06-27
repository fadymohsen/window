<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'events-conferences';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/events-conferences.webp',
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
            'title' => 'Events & Conferences',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Events & Conferences Organization in Riyadh | Window Advertising',
            'meta_description' => 'Professional events and conferences organization in Riyadh. Window Advertising delivers full-service conference setups, stage design, AV coordination, and branded environments for corporate clients across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'conference organization Riyadh, events and conferences Saudi Arabia, corporate conference company Riyadh, conference setup Riyadh, event organizer Saudi Arabia',
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
            'title' => 'الفعاليات والمؤتمرات',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تنظيم الفعاليات والمؤتمرات في الرياض | وينوو للإعلان',
            'meta_description' => 'تنظيم احترافي للفعاليات والمؤتمرات في الرياض — تجهيز قاعات المؤتمرات، تصميم المسارح، تنسيق الصوت والصورة، والبيئات المؤسسية المميزة. تواصل معنا للحصول على عرض سعر مجاني.',
            'meta_keywords' => 'تنظيم مؤتمرات الرياض, فعاليات ومؤتمرات السعودية, شركة تنظيم مؤتمرات الرياض, تجهيز قاعات مؤتمرات, تنظيم ندوات الرياض',
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
        $service = DB::table('services')->where('slug', 'events-conferences')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>From intimate executive roundtables to city-wide public conferences, Window Advertising delivers polished, professionally managed <a href="/en/services/event-management">events and conferences</a> for corporate clients throughout Riyadh and Saudi Arabia. We combine creative design with operational precision — ensuring your conference runs flawlessly from setup to final applause.</p>

<h2>What We Mean by Events & Conferences</h2>
<p>Events and conferences encompass a broad spectrum of professional gatherings: corporate seminars, industry summits, government symposiums, shareholder meetings, academic conferences, and multi-day expos. What connects them is the need for professional staging, branded environments, seamless coordination, and a team that handles every moving part behind the scenes.</p>
<p>Window Advertising has organized events ranging from 50-person boardroom workshops to multi-thousand-attendee public conferences. Our team brings the same discipline to every format.</p>

<h2>Types of Events & Conferences We Organize</h2>
<p>Our conference and events portfolio covers:</p>
<ul>
<li>Corporate conferences and industry summits</li>
<li>Government and public sector forums</li>
<li>Product launch events and press conferences</li>
<li>Annual general meetings (AGMs) and shareholder assemblies</li>
<li>Seminars, workshops, and training days</li>
<li>Award ceremonies and employee recognition galas</li>
<li>Networking events and business expos</li>
<li>Outdoor festivals and public activations</li>
</ul>
<p>Each event type demands a different approach — including <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> for trade shows. We tailor our services to match the specific tone, scale, and audience of your occasion.</p>

<h2>Full-Service Conference Production</h2>
<p>Window Advertising delivers every production element required for a world-class conference:</p>
<p><strong>Stage &amp; Podium Design:</strong> Custom-built stages and podiums aligned to your brand colors and identity. We handle everything from small presentation risers to full theatrical stages with LED backdrops.</p>
<p><strong>Backdrop &amp; Signage:</strong> High-resolution <a href="/en/services/backdrop">branded backdrop printing</a>, branded step-and-repeat walls, <a href="/en/services/directional-signage">directional signage</a>, and <a href="/en/services/roll-up">pull-up stands</a> — all produced in our in-house print facility.</p>
<p><strong>Branded Materials:</strong> Conference programs, name badges, lanyards, notepads, pens, and branded welcome kits for every attendee.</p>
<p><strong>Registration Desks:</strong> Fully branded reception and registration setups with your event identity applied across every surface.</p>
<p><strong>AV Coordination:</strong> We coordinate with trusted AV partners for sound systems, screens, projectors, and live-streaming setups.</p>

<h2>Why Riyadh Companies Choose Window Advertising</h2>
<p>Our clients return to us because we solve the three biggest pain points in conference organization: quality consistency, deadline pressure, and cost transparency.</p>
<p><strong>Quality consistency:</strong> We produce all printed and built elements in-house. No third-party print quality surprises on event day.</p>
<p><strong>Deadline pressure:</strong> We work with fixed delivery schedules and built-in contingency time. You receive your conference environment on time, every time.</p>
<p><strong>Cost transparency:</strong> Our quotes are itemized. You know exactly what you're paying for and there are no hidden fees at final invoice.</p>
<p>Our team has worked with clients across healthcare, banking, education, technology, retail, and government — covering the full breadth of corporate Saudi Arabia.</p>

<h2>Our Conference Organization Process</h2>
<ol>
<li><strong>Initial Brief</strong> — you share event type, date, expected attendance, and budget range.</li>
<li><strong>Proposal &amp; Concept</strong> — within 48 hours, we present a concept deck with design direction and cost estimate.</li>
<li><strong>Design Approval</strong> — we refine the visual concept and get your sign-off before production begins.</li>
<li><strong>Production &amp; Logistics</strong> — printing, fabrication, equipment booking, and transport planning happen simultaneously.</li>
<li><strong>Setup</strong> — our crew arrives well before your event opens. We build, test, and style every element.</li>
<li><strong>Live Event Support</strong> — our team stays on-site throughout the event to handle any adjustments.</li>
<li><strong>Breakdown &amp; Report</strong> — we dismantle, clear the venue, and provide a post-event summary.</li>
</ol>

<h2>Frequently Asked Questions</h2>

<h3>What is included in a full conference organization package?</h3>
<p>Window Advertising's full conference organization package includes venue coordination, stage and podium design, branded backdrop printing, registration desk setup, directional signage, AV and lighting coordination, branded stationery, attendee gift boxes, and full on-site management team.</p>

<h3>How much does it cost to organize a conference in Riyadh?</h3>
<p>Conference organization costs in Riyadh vary based on the number of attendees, venue requirements, branding scope, and duration. Window Advertising offers scalable packages to fit all budgets. Contact us with your event brief for a free, itemized quote.</p>

<h3>Can Window Advertising handle the branding and printed materials for our conference?</h3>
<p>Yes. We produce all branded elements in-house — banners, backdrops, directional signs, pull-up stands, lanyards, programs, name badges, and gift boxes. Everything is designed to match your brand identity and conference theme.</p>

<h3>Do you organize outdoor events and festivals?</h3>
<p>Yes. In addition to indoor conferences, Window Advertising organizes outdoor events, festivals, and public activations. We handle weather-resilient structures, outdoor branding, crowd management planning, and full production for outdoor settings.</p>

<h2>Request a Conference Organization Quote</h2>
<p>Tell us about your event. Our team reviews every brief and responds within 24 hours with an initial consultation and pricing. Whether you need full production or just branded elements, we have a package that fits.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is included in a full conference organization package?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising's full conference organization package includes venue coordination, stage and podium design, branded backdrop printing, registration desk setup, directional signage, AV and lighting coordination, branded stationery, attendee gift boxes, and full on-site management team."
      }
    },
    {
      "@type": "Question",
      "name": "How much does it cost to organize a conference in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Conference organization costs in Riyadh vary based on the number of attendees, venue requirements, branding scope, and duration. Window Advertising offers scalable packages to fit all budgets. Contact us with your event brief for a free, itemized quote."
      }
    },
    {
      "@type": "Question",
      "name": "Can Window Advertising handle the branding and printed materials for our conference?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. We produce all branded elements in-house — banners, backdrops, directional signs, pull-up stands, lanyards, programs, name badges, and gift boxes. Everything is designed to match your brand identity and conference theme."
      }
    },
    {
      "@type": "Question",
      "name": "Do you organize outdoor events and festivals?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. In addition to indoor conferences, Window Advertising organizes outdoor events, festivals, and public activations. We handle weather-resilient structures, outdoor branding, crowd management planning, and full production for outdoor settings."
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
<p>من الموائد المستديرة التنفيذية الحميمة إلى المؤتمرات العامة الكبرى، تقدم وينوو للإعلان <a href="/ar/services/event-management">فعاليات ومؤتمرات</a> احترافية ومدارة بعناية للعملاء من الشركات في جميع أنحاء الرياض والمملكة العربية السعودية. نجمع بين التصميم الإبداعي والدقة التشغيلية — لضمان سير مؤتمرك بسلاسة من التجهيز حتى آخر تصفيق.</p>

<h2>ما المقصود بالفعاليات والمؤتمرات؟</h2>
<p>تشمل الفعاليات والمؤتمرات طيفاً واسعاً من التجمعات المهنية: الندوات المؤسسية، والقمم الصناعية، والمؤتمرات الحكومية، واجتماعات المساهمين، والمؤتمرات الأكاديمية، والمعارض متعددة الأيام. ما يجمعها هو الحاجة إلى مسارح احترافية، وبيئات ذات علامة تجارية، وتنسيق سلس، وفريق يتولى كل التفاصيل خلف الكواليس.</p>
<p>نظمت وينوو للإعلان فعاليات تتراوح من ورش عمل لـ 50 شخصاً إلى مؤتمرات عامة بآلاف الحضور. يقدم فريقنا نفس الانضباط لكل صيغة.</p>

<h2>أنواع الفعاليات والمؤتمرات التي ننظمها</h2>
<p>تغطي محفظة أعمالنا في المؤتمرات والفعاليات:</p>
<ul>
<li>المؤتمرات المؤسسية والقمم الصناعية</li>
<li>منتديات القطاع الحكومي والعام</li>
<li>فعاليات إطلاق المنتجات والمؤتمرات الصحفية</li>
<li>الاجتماعات العمومية السنوية واجتماعات المساهمين</li>
<li>الندوات وورش العمل وأيام التدريب</li>
<li>حفلات التكريم وتقدير الموظفين</li>
<li>فعاليات التواصل والمعارض التجارية</li>
<li>المهرجانات الخارجية والفعاليات العامة</li>
</ul>
<p>يتطلب كل نوع من الفعاليات نهجاً مختلفاً — بما في ذلك <a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a> للمعارض التجارية. نصمم خدماتنا لتتناسب مع النبرة والحجم والجمهور المحدد لمناسبتك.</p>

<h2>خدمات الإنتاج الكامل للمؤتمرات</h2>
<p>تقدم وينوو للإعلان كل عنصر إنتاجي مطلوب لمؤتمر عالمي المستوى:</p>
<p><strong>تصميم المسرح والمنصة:</strong> مسارح ومنصات مصممة خصيصاً ومتوافقة مع ألوان وهوية علامتك التجارية. نتولى كل شيء من منصات العرض الصغيرة إلى المسارح المسرحية الكاملة مع خلفيات LED.</p>
<p><strong>الخلفيات واللافتات:</strong> <a href="/ar/services/backdrop">طباعة خلفيات مؤسسية</a> عالية الدقة، وجدران تصوير ذات علامة تجارية، و<a href="/ar/services/directional-signage">لافتات إرشادية</a>، و<a href="/ar/services/roll-up">ستاندات رول أب</a> — جميعها منتجة في منشأة الطباعة الداخلية لدينا.</p>
<p><strong>المواد المؤسسية:</strong> برامج المؤتمرات، وبطاقات الأسماء، والحبال، والدفاتر، والأقلام، وحقائب الترحيب لكل حاضر.</p>
<p><strong>مكاتب التسجيل:</strong> إعدادات استقبال وتسجيل كاملة العلامة التجارية مع تطبيق هوية فعاليتك على كل سطح.</p>
<p><strong>تنسيق الصوت والصورة:</strong> ننسق مع شركاء موثوقين لأنظمة الصوت والشاشات وأجهزة العرض وإعدادات البث المباشر.</p>

<h2>لماذا تختار شركات الرياض وينوو للإعلان؟</h2>
<p>يعود عملاؤنا إلينا لأننا نحل أكبر ثلاث مشكلات في تنظيم المؤتمرات: ثبات الجودة، وضغط المواعيد، وشفافية التكاليف.</p>
<p><strong>ثبات الجودة:</strong> ننتج جميع العناصر المطبوعة والمصنعة داخلياً. لا مفاجآت في جودة الطباعة من أطراف ثالثة يوم الفعالية.</p>
<p><strong>ضغط المواعيد:</strong> نعمل بجداول تسليم ثابتة ووقت احتياطي مدمج. تستلم بيئة مؤتمرك في الوقت المحدد، في كل مرة.</p>
<p><strong>شفافية التكاليف:</strong> عروض أسعارنا مفصلة بنداً بنداً. تعرف بالضبط ما تدفع مقابله ولا توجد رسوم مخفية في الفاتورة النهائية.</p>
<p>عمل فريقنا مع عملاء في قطاعات الرعاية الصحية والبنوك والتعليم والتكنولوجيا والتجزئة والحكومة — مغطياً النطاق الكامل لقطاع الشركات في المملكة العربية السعودية.</p>

<h2>مراحل تنظيم مؤتمرك</h2>
<ol>
<li><strong>الملخص الأولي</strong> — تشاركنا نوع الفعالية وتاريخها والحضور المتوقع ونطاق الميزانية.</li>
<li><strong>العرض والمفهوم</strong> — خلال 48 ساعة، نقدم عرضاً تقديمياً بالتوجه التصميمي وتقدير التكلفة.</li>
<li><strong>اعتماد التصميم</strong> — نحسّن المفهوم البصري ونحصل على موافقتك قبل بدء الإنتاج.</li>
<li><strong>الإنتاج والخدمات اللوجستية</strong> — تتم الطباعة والتصنيع وحجز المعدات والتخطيط اللوجستي بشكل متزامن.</li>
<li><strong>التجهيز</strong> — يصل فريقنا قبل افتتاح فعاليتك بوقت كافٍ. نبني ونختبر ونرتب كل عنصر.</li>
<li><strong>الدعم أثناء الفعالية</strong> — يبقى فريقنا في الموقع طوال الفعالية للتعامل مع أي تعديلات.</li>
<li><strong>التفكيك والتقرير</strong> — نفكك، وننظف المكان، ونقدم ملخصاً بعد الفعالية.</li>
</ol>

<h2>الأسئلة الشائعة</h2>

<h3>ما الذي تتضمنه باقة تنظيم المؤتمرات الكاملة؟</h3>
<p>تتضمن باقة تنظيم المؤتمرات الكاملة من وينوو للإعلان تنسيق المكان، وتصميم المسرح والمنصة، وطباعة الخلفيات المؤسسية، وإعداد مكتب التسجيل، واللافتات الإرشادية، وتنسيق الصوت والإضاءة، والقرطاسية المؤسسية، وصناديق هدايا الحضور، وفريق إدارة كامل في الموقع.</p>

<h3>كم تكلفة تنظيم مؤتمر في الرياض؟</h3>
<p>تختلف تكاليف تنظيم المؤتمرات في الرياض بناءً على عدد الحضور ومتطلبات المكان ونطاق العلامة التجارية والمدة. تقدم وينوو للإعلان باقات قابلة للتوسع لتناسب جميع الميزانيات. تواصل معنا بملخص فعاليتك للحصول على عرض سعر مفصل ومجاني.</p>

<h3>هل تتولى وينوو للإعلان العلامة التجارية والمواد المطبوعة لمؤتمرنا؟</h3>
<p>نعم. ننتج جميع العناصر المؤسسية داخلياً — البانرات والخلفيات واللافتات الإرشادية وستاندات الرول أب والحبال والبرامج وبطاقات الأسماء وصناديق الهدايا. كل شيء مصمم ليتوافق مع هوية علامتك التجارية وموضوع المؤتمر.</p>

<h3>هل تنظمون فعاليات خارجية ومهرجانات؟</h3>
<p>نعم. بالإضافة إلى المؤتمرات الداخلية، تنظم وينوو للإعلان فعاليات خارجية ومهرجانات وفعاليات عامة. نتولى الهياكل المقاومة للطقس والعلامة التجارية الخارجية وتخطيط إدارة الحشود والإنتاج الكامل للبيئات الخارجية.</p>

<h2>احصل على عرض سعر لمؤتمرك</h2>
<p>أخبرنا عن فعاليتك. يراجع فريقنا كل ملخص ويرد خلال 24 ساعة باستشارة أولية وتسعير. سواء كنت بحاجة إلى إنتاج كامل أو مجرد عناصر مؤسسية، لدينا الباقة المناسبة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما الذي تتضمنه باقة تنظيم المؤتمرات الكاملة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تتضمن باقة تنظيم المؤتمرات الكاملة من وينوو للإعلان تنسيق المكان، وتصميم المسرح والمنصة، وطباعة الخلفيات المؤسسية، وإعداد مكتب التسجيل، واللافتات الإرشادية، وتنسيق الصوت والإضاءة، والقرطاسية المؤسسية، وصناديق هدايا الحضور، وفريق إدارة كامل في الموقع."
      }
    },
    {
      "@type": "Question",
      "name": "كم تكلفة تنظيم مؤتمر في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تختلف تكاليف تنظيم المؤتمرات في الرياض بناءً على عدد الحضور ومتطلبات المكان ونطاق العلامة التجارية والمدة. تقدم وينوو للإعلان باقات قابلة للتوسع لتناسب جميع الميزانيات. تواصل معنا بملخص فعاليتك للحصول على عرض سعر مفصل ومجاني."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولى وينوو للإعلان العلامة التجارية والمواد المطبوعة لمؤتمرنا؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. ننتج جميع العناصر المؤسسية داخلياً — البانرات والخلفيات واللافتات الإرشادية وستاندات الرول أب والحبال والبرامج وبطاقات الأسماء وصناديق الهدايا. كل شيء مصمم ليتوافق مع هوية علامتك التجارية وموضوع المؤتمر."
      }
    },
    {
      "@type": "Question",
      "name": "هل تنظمون فعاليات خارجية ومهرجانات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. بالإضافة إلى المؤتمرات الداخلية، تنظم وينوو للإعلان فعاليات خارجية ومهرجانات وفعاليات عامة. نتولى الهياكل المقاومة للطقس والعلامة التجارية الخارجية وتخطيط إدارة الحشود والإنتاج الكامل للبيئات الخارجية."
      }
    }
  ]
}
</script>
HTML;
    }
};
