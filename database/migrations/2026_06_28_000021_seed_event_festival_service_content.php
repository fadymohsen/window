<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'event-festival';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/event-festival.webp',
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
            'title' => 'Event and Festival Production',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Event and Festival Production in Riyadh | Event Advertising Saudi Arabia | Window Advertising',
            'meta_description' => 'Event and festival production services in Riyadh. Window Advertising manages corporate events, public festivals, and advertising activations for companies and government entities across Saudi Arabia. Complete event production with branding and advertising. Get a free quote.',
            'meta_keywords' => 'event production Riyadh, festival management Saudi Arabia, corporate events Riyadh, public event advertising Saudi Arabia, تنظيم حفلات الرياض, دعاية واعلان الرياض, تنظيم مؤتمرات, دعاية واعلان السعودية',
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
            'title' => 'تنظيم حفلات ومهرجانات',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تنظيم حفلات ومهرجانات في الرياض | فعاليات وإعلانات السعودية | وينوو للإعلان',
            'meta_description' => 'تنظيم حفلات ومهرجانات في الرياض — وينوو للإعلان يدير الفعاليات الشركاتية والمهرجانات العامة وتشغيل الحملات الإعلانية للشركات والجهات الحكومية في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'تنظيم حفلات الرياض, تنظيم مهرجانات السعودية, دعاية واعلان الرياض, تنظيم مؤتمرات, دعاية واعلان السعودية, تنظيم فعاليات الرياض',
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
        $service = DB::table('services')->where('slug', 'event-festival')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Festivals and events in Saudi Arabia have grown significantly in scale and ambition since Vision 2030 accelerated the Kingdom's entertainment and cultural calendar. Window Advertising produces the advertising and brand environment for corporate events, public festivals, and branded activations in Riyadh and across Saudi Arabia — handling every visual element from the entry signage to the stage backdrop, the promotional gifts to the post-event digital content. We deliver complete <a href="/en/services/event-management">event management</a> with full advertising production.</p>

<h2>The Scale of Events in Saudi Arabia</h2>
<p>Saudi Arabia's events calendar now encompasses international festivals, national celebration events, corporate conferences, entertainment activations, and brand campaigns that rival the scale of events in any major global city. Riyadh hosts concerts, sports events, public festivals, and corporate gatherings that require professional advertising production at a correspondingly large scale.</p>
<p>Window Advertising works with corporations, government entities, event management companies, and hospitality brands to produce the advertising materials and branded environments that these events require. Our strength is in the production of the visual advertising layer — the elements that visitors encounter at every point of an event, from the perimeter banners to the reception counter and the gift bag they take home.</p>

<h2>Event Advertising and Brand Production</h2>
<p>Every event is an advertising opportunity. The banners at the entrance, the backdrop on the stage, the flags lining the venue perimeter, the gifts distributed to guests, the directional signage guiding visitors through the space — each of these is a branded advertising element that carries your organization's identity through the event environment.</p>
<p>Window Advertising produces coordinated event advertising packages where every element shares the same design language. Rather than assembling mismatched pieces from different suppliers, a single creative brief from our team generates every branded piece the event requires — from the largest stage backdrop to the smallest branded gift.</p>

<h2>Festival Production Services</h2>
<p>For public festivals and large-scale entertainment events in Riyadh, Window Advertising provides festival advertising production services:</p>
<p>Entry archways and gate banners mark the perimeter and entry points of the festival space with large-format branded structures visible to approaching visitors from a distance.</p>
<p>Perimeter banners and fence wraps cover the festival boundary with advertising messages, sponsor branding, and event graphics that create a complete branded environment from the outside in.</p>
<p>Stage <a href="/en/services/backdrop">backdrops</a> and LED panel graphics for performance stages are produced and installed by our team, coordinated with the technical requirements of the stage production company.</p>
<p>Zone signage and wayfinding systems guide visitors through complex multi-area festival environments, identifying food zones, entertainment areas, sponsor activations, and exit points.</p>
<p>Branded merchandise and promotional gifts are produced and distributed within the festival environment — from water bottles and fans to branded tote bags and event-specific gift items.</p>

<h2>Corporate Event and Celebration Production</h2>
<p>Corporate events in Riyadh — annual galas, employee appreciation days, product launches, and national occasion celebrations — require the same level of advertising production quality as larger public events, focused on a more defined audience.</p>
<p>Window Advertising coordinates the full advertising material set for corporate events: venue branding, table centerpieces, stage and backdrop systems, branded gifts and awards, photography backdrops, and printed event collateral. We work within the corporate identity guidelines of the organizing company, ensuring the event reflects the brand's standards rather than having a generic event appearance. Our <a href="/en/services/events-conferences">events and conferences</a> team ensures seamless coordination across all production elements.</p>

<h2>National Day and Founding Day Event Production</h2>
<p>Saudi Arabia's National Day in September and Founding Day in February are the two highest-demand periods in Riyadh's events and advertising calendar. Window Advertising plans its production calendar in advance to ensure capacity for the volume of event branding, flags, banners, gifts, and promotional materials required in these periods.</p>
<p>For <a href="/en/services/national-day-celebrations">National Day celebrations</a> and <a href="/en/services/founding-day-celebrations">Founding Day celebrations</a>, our designs incorporate the Saudi green and white color scheme, national iconography, and the specific visual language of the occasion alongside the organizational branding of the company or government entity we are producing for.</p>

<h2>Event and Festival Portfolio — Riyadh</h2>
<p>Browse the portfolio to see event and festival advertising production completed for clients across Riyadh and Saudi Arabia. The gallery includes festival perimeter branding, corporate event environments, national occasion setups, and complete event advertising packages.</p>

<h2>Frequently Asked Questions About Event and Festival Production</h2>

<h3>What types of events does Window Advertising produce?</h3>
<p>Window Advertising produces corporate celebrations, employee appreciation events, product launches, brand activations, public festivals, National Day and Founding Day events, hospitality events, and entertainment festivals. Our strength is in the advertising and brand production side of events — signage, branding materials, promotional gifts, stage graphics, and the full visual identity of the event environment.</p>

<h3>What advertising materials do you produce for events?</h3>
<p>For events, Window Advertising produces the complete advertising material set: stage backdrops and step-and-repeat banners, directional signage, entry banners and archways, branded flags, promotional stands and counters, printed programs and materials, branded gifts and giveaways, wall graphics, and any other branded element the event requires. All materials are designed with a unified visual identity for the event.</p>

<h3>Do you organize events outside Riyadh?</h3>
<p>Yes. Window Advertising organizes and produces advertising materials for events across Saudi Arabia including Jeddah, Al-Khobar, Dammam, and Mecca. For events outside Riyadh, we coordinate production and logistics from our Riyadh base, with experienced teams available for nationwide event installation and setup.</p>

<h3>How far in advance should we contact you for event production?</h3>
<p>For large-scale events and festivals, we recommend contacting Window Advertising at least 4 to 6 weeks before the event date. Corporate events with standard advertising material requirements can be accommodated with 2 to 3 weeks notice. For National Day and Founding Day events where demand across Riyadh is high, we recommend booking 6 to 8 weeks in advance.</p>

<h2>Plan Your Event Production in Riyadh</h2>
<p>Tell us the event type, expected scale, date, and venue. Our team provides an event advertising production proposal covering all required materials and pricing within 48 hours. Full production and installation coordination included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of events does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces corporate celebrations, employee appreciation events, product launches, brand activations, public festivals, National Day and Founding Day events, hospitality events, and entertainment festivals. Our strength is in the advertising and brand production side of events — signage, branding materials, promotional gifts, stage graphics, and the full visual identity of the event environment."
      }
    },
    {
      "@type": "Question",
      "name": "What advertising materials do you produce for events?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For events, Window Advertising produces the complete advertising material set: stage backdrops and step-and-repeat banners, directional signage, entry banners and archways, branded flags, promotional stands and counters, printed programs and materials, branded gifts and giveaways, wall graphics, and any other branded element the event requires. All materials are designed with a unified visual identity for the event."
      }
    },
    {
      "@type": "Question",
      "name": "Do you organize events outside Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising organizes and produces advertising materials for events across Saudi Arabia including Jeddah, Al-Khobar, Dammam, and Mecca. For events outside Riyadh, we coordinate production and logistics from our Riyadh base, with experienced teams available for nationwide event installation and setup."
      }
    },
    {
      "@type": "Question",
      "name": "How far in advance should we contact you for event production?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For large-scale events and festivals, we recommend contacting Window Advertising at least 4 to 6 weeks before the event date. Corporate events with standard advertising material requirements can be accommodated with 2 to 3 weeks notice. For National Day and Founding Day events where demand across Riyadh is high, we recommend booking 6 to 8 weeks in advance."
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
<p>نمت الفعاليات والمهرجانات في المملكة العربية السعودية بشكل كبير في الحجم والطموح منذ أن سرّعت رؤية 2030 التقويم الترفيهي والثقافي للمملكة. تنتج وينوو للإعلان البيئة الإعلانية والعلامة التجارية للفعاليات الشركاتية والمهرجانات العامة والتنشيطات الإعلانية في الرياض وعبر المملكة العربية السعودية — نتولى كل عنصر بصري من لافتات المدخل إلى خلفية المسرح، ومن الهدايا الترويجية إلى المحتوى الرقمي بعد الفعالية. نقدم <a href="/ar/services/event-management">إدارة فعاليات</a> متكاملة مع إنتاج إعلاني شامل.</p>

<h2>حجم الفعاليات في المملكة العربية السعودية</h2>
<p>يشمل تقويم الفعاليات في المملكة العربية السعودية الآن المهرجانات الدولية وفعاليات الاحتفالات الوطنية والمؤتمرات المؤسسية والتنشيطات الترفيهية والحملات الإعلانية التي تنافس حجم الفعاليات في أي مدينة عالمية كبرى. تستضيف الرياض حفلات موسيقية وفعاليات رياضية ومهرجانات عامة وتجمعات مؤسسية تتطلب إنتاجاً إعلانياً احترافياً بحجم مماثل.</p>
<p>تعمل وينوو للإعلان مع الشركات والجهات الحكومية وشركات إدارة الفعاليات والعلامات التجارية في قطاع الضيافة لإنتاج المواد الإعلانية والبيئات ذات العلامة التجارية التي تتطلبها هذه الفعاليات. قوتنا في إنتاج الطبقة الإعلانية البصرية — العناصر التي يصادفها الزوار في كل نقطة من الفعالية، من بانرات المحيط إلى كاونتر الاستقبال وحقيبة الهدايا التي يأخذونها معهم.</p>

<h2>إنتاج الإعلانات والهوية للفعاليات</h2>
<p>كل فعالية هي فرصة إعلانية. البانرات عند المدخل، والخلفية على المسرح، والأعلام على محيط المكان، والهدايا الموزعة على الضيوف، واللافتات الإرشادية التي توجه الزوار عبر المساحة — كل عنصر من هذه هو قطعة إعلانية تحمل هوية مؤسستك عبر بيئة الفعالية.</p>
<p>تنتج وينوو للإعلان حزم إعلانية منسقة للفعاليات حيث يشترك كل عنصر في نفس اللغة التصميمية. بدلاً من تجميع قطع غير متناسقة من موردين مختلفين، ينتج ملخص إبداعي واحد من فريقنا كل قطعة تحمل علامة تجارية تحتاجها الفعالية — من أكبر خلفية مسرح إلى أصغر هدية ترويجية.</p>

<h2>خدمات إنتاج المهرجانات</h2>
<p>للمهرجانات العامة والفعاليات الترفيهية الكبيرة في الرياض، تقدم وينوو للإعلان خدمات إنتاج إعلاني للمهرجانات:</p>
<p>أقواس المداخل وبانرات البوابات تحدد محيط ونقاط دخول مساحة المهرجان بهياكل كبيرة الحجم تحمل العلامة التجارية وتكون مرئية للزوار القادمين من مسافة بعيدة.</p>
<p>بانرات المحيط وأغلفة الأسوار تغطي حدود المهرجان برسائل إعلانية وعلامات الرعاة ورسومات الفعالية التي تخلق بيئة متكاملة العلامة التجارية من الخارج إلى الداخل.</p>
<p><a href="/ar/services/backdrop">خلفيات</a> المسرح ورسومات شاشات LED لمسارح الأداء يتم إنتاجها وتركيبها من قبل فريقنا، بالتنسيق مع المتطلبات الفنية لشركة إنتاج المسرح.</p>
<p>لافتات المناطق وأنظمة التوجيه ترشد الزوار عبر بيئات المهرجان المعقدة متعددة المناطق، وتحدد مناطق الطعام والمناطق الترفيهية وتنشيطات الرعاة ونقاط الخروج.</p>
<p>البضائع ذات العلامة التجارية والهدايا الترويجية يتم إنتاجها وتوزيعها داخل بيئة المهرجان — من زجاجات المياه والمراوح إلى الحقائب ذات العلامة التجارية والهدايا الخاصة بالفعالية.</p>

<h2>إنتاج فعاليات الشركات والاحتفالات</h2>
<p>تتطلب فعاليات الشركات في الرياض — الحفلات السنوية وأيام تكريم الموظفين وإطلاق المنتجات واحتفالات المناسبات الوطنية — نفس مستوى جودة الإنتاج الإعلاني مثل الفعاليات العامة الأكبر، مع التركيز على جمهور أكثر تحديداً.</p>
<p>تنسق وينوو للإعلان مجموعة المواد الإعلانية الكاملة لفعاليات الشركات: هوية المكان، وقطع الوسط للطاولات، وأنظمة المسرح والخلفيات، والهدايا والجوائز ذات العلامة التجارية، وخلفيات التصوير، والمطبوعات الخاصة بالفعالية. نعمل ضمن إرشادات الهوية المؤسسية للشركة المنظمة، لضمان أن تعكس الفعالية معايير العلامة التجارية بدلاً من مظهر فعالية عام. يضمن فريق <a href="/ar/services/events-conferences">الفعاليات والمؤتمرات</a> لدينا تنسيقاً سلساً عبر جميع عناصر الإنتاج.</p>

<h2>إنتاج فعاليات اليوم الوطني ويوم التأسيس</h2>
<p>يُعد اليوم الوطني السعودي في سبتمبر ويوم التأسيس في فبراير أعلى فترتين طلباً في تقويم الفعاليات والإعلان في الرياض. تخطط وينوو للإعلان تقويم إنتاجها مسبقاً لضمان القدرة الاستيعابية لحجم هوية الفعاليات والأعلام والبانرات والهدايا والمواد الترويجية المطلوبة في هذه الفترات.</p>
<p>لفعاليات <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> و<a href="/ar/services/founding-day-celebrations">احتفالات يوم التأسيس</a>، تتضمن تصاميمنا نظام ألوان الأخضر والأبيض السعودي والرموز الوطنية واللغة البصرية الخاصة بالمناسبة إلى جانب العلامة التجارية المؤسسية للشركة أو الجهة الحكومية التي ننتج لها.</p>

<h2>أعمالنا في الفعاليات والمهرجانات بالرياض</h2>
<p>تصفح معرض الأعمال لمشاهدة إنتاج الإعلانات للفعاليات والمهرجانات المنجزة لعملاء عبر الرياض والمملكة العربية السعودية. يتضمن المعرض هوية محيط المهرجانات وبيئات الفعاليات المؤسسية وإعدادات المناسبات الوطنية وحزم الإعلانات الكاملة للفعاليات.</p>

<h2>الأسئلة الشائعة حول إنتاج الفعاليات والمهرجانات</h2>

<h3>ما أنواع الفعاليات التي تنتجها وينوو للإعلان؟</h3>
<p>تنتج وينوو للإعلان الاحتفالات المؤسسية وفعاليات تكريم الموظفين وإطلاق المنتجات والتنشيطات الإعلانية والمهرجانات العامة وفعاليات اليوم الوطني ويوم التأسيس وفعاليات الضيافة والمهرجانات الترفيهية. قوتنا في الجانب الإعلاني وإنتاج العلامة التجارية للفعاليات — اللافتات ومواد الهوية والهدايا الترويجية ورسومات المسرح والهوية البصرية الكاملة لبيئة الفعالية.</p>

<h3>ما المواد الإعلانية التي تنتجونها للفعاليات؟</h3>
<p>للفعاليات، تنتج وينوو للإعلان مجموعة المواد الإعلانية الكاملة: خلفيات المسرح وبانرات التصوير، واللافتات الإرشادية، وبانرات المداخل والأقواس، والأعلام ذات العلامة التجارية، والستاندات والكاونترات الترويجية، والبرامج والمطبوعات، والهدايا والتوزيعات ذات العلامة التجارية، ورسومات الجدران، وأي عنصر آخر تتطلبه الفعالية. جميع المواد مصممة بهوية بصرية موحدة للفعالية.</p>

<h3>هل تنظمون فعاليات خارج الرياض؟</h3>
<p>نعم. تنظم وينوو للإعلان وتنتج المواد الإعلانية للفعاليات عبر المملكة العربية السعودية بما في ذلك جدة والخبر والدمام ومكة المكرمة. للفعاليات خارج الرياض، ننسق الإنتاج والخدمات اللوجستية من قاعدتنا في الرياض، مع فرق ذات خبرة متاحة لتركيب وتجهيز الفعاليات على مستوى المملكة.</p>

<h3>قبل كم من الوقت يجب التواصل معكم لإنتاج فعالية؟</h3>
<p>للفعاليات والمهرجانات الكبيرة، نوصي بالتواصل مع وينوو للإعلان قبل 4 إلى 6 أسابيع على الأقل من تاريخ الفعالية. يمكن استيعاب فعاليات الشركات ذات متطلبات المواد الإعلانية القياسية بإشعار مسبق من 2 إلى 3 أسابيع. لفعاليات اليوم الوطني ويوم التأسيس حيث يكون الطلب مرتفعاً عبر الرياض، نوصي بالحجز قبل 6 إلى 8 أسابيع مسبقاً.</p>

<h2>خطط لإنتاج فعاليتك في الرياض</h2>
<p>أخبرنا بنوع الفعالية والحجم المتوقع والتاريخ والمكان. يقدم فريقنا عرض إنتاج إعلاني للفعالية يغطي جميع المواد المطلوبة والتسعير خلال 48 ساعة. تنسيق الإنتاج والتركيب الكامل مشمول.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الفعاليات التي تنتجها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج وينوو للإعلان الاحتفالات المؤسسية وفعاليات تكريم الموظفين وإطلاق المنتجات والتنشيطات الإعلانية والمهرجانات العامة وفعاليات اليوم الوطني ويوم التأسيس وفعاليات الضيافة والمهرجانات الترفيهية. قوتنا في الجانب الإعلاني وإنتاج العلامة التجارية للفعاليات — اللافتات ومواد الهوية والهدايا الترويجية ورسومات المسرح والهوية البصرية الكاملة لبيئة الفعالية."
      }
    },
    {
      "@type": "Question",
      "name": "ما المواد الإعلانية التي تنتجونها للفعاليات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "للفعاليات، تنتج وينوو للإعلان مجموعة المواد الإعلانية الكاملة: خلفيات المسرح وبانرات التصوير، واللافتات الإرشادية، وبانرات المداخل والأقواس، والأعلام ذات العلامة التجارية، والستاندات والكاونترات الترويجية، والبرامج والمطبوعات، والهدايا والتوزيعات ذات العلامة التجارية، ورسومات الجدران، وأي عنصر آخر تتطلبه الفعالية. جميع المواد مصممة بهوية بصرية موحدة للفعالية."
      }
    },
    {
      "@type": "Question",
      "name": "هل تنظمون فعاليات خارج الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تنظم وينوو للإعلان وتنتج المواد الإعلانية للفعاليات عبر المملكة العربية السعودية بما في ذلك جدة والخبر والدمام ومكة المكرمة. للفعاليات خارج الرياض، ننسق الإنتاج والخدمات اللوجستية من قاعدتنا في الرياض، مع فرق ذات خبرة متاحة لتركيب وتجهيز الفعاليات على مستوى المملكة."
      }
    },
    {
      "@type": "Question",
      "name": "قبل كم من الوقت يجب التواصل معكم لإنتاج فعالية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "للفعاليات والمهرجانات الكبيرة، نوصي بالتواصل مع وينوو للإعلان قبل 4 إلى 6 أسابيع على الأقل من تاريخ الفعالية. يمكن استيعاب فعاليات الشركات ذات متطلبات المواد الإعلانية القياسية بإشعار مسبق من 2 إلى 3 أسابيع. لفعاليات اليوم الوطني ويوم التأسيس حيث يكون الطلب مرتفعاً عبر الرياض، نوصي بالحجز قبل 6 إلى 8 أسابيع مسبقاً."
      }
    }
  ]
}
</script>
HTML;
    }
};
