<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'national-day-celebrations';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/national-day-celebrations.webp',
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
            'title' => 'National Day Celebrations',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'National Day Celebrations in Riyadh | Saudi National Day Event Production | Window Advertising',
            'meta_description' => 'National Day celebrations and event production in Riyadh. Window Advertising organizes and produces branded Saudi National Day events, gifts, flags, and advertising materials for companies and government entities across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'national day celebrations Riyadh, Saudi National Day events, national day advertising Riyadh, national day gifts Saudi Arabia, تنظيم حفلات الرياض, دعاية واعلان الرياض, اليوم الوطني السعودي, هدايا دعائية, دعاية واعلان السعودية',
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
            'title' => 'احتفالات اليوم الوطني',
            'content' => $this->getArabicContent(),
            'meta_title' => 'احتفالات اليوم الوطني في الرياض | تنظيم حفلات اليوم الوطني السعودي | وينوو للإعلان',
            'meta_description' => 'احتفالات اليوم الوطني السعودي وتنظيم الفعاليات في الرياض — وينوو للإعلان ينظم ويُنتج فعاليات اليوم الوطني المميزة والهدايا الترويجية واللافتات للشركات والجهات الحكومية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'احتفالات اليوم الوطني الرياض, تنظيم حفلات السعودية, دعاية واعلان الرياض, هدايا دعائية اليوم الوطني, دعاية واعلان السعودية, اليوم الوطني السعودي',
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
        $service = DB::table('services')->where('slug', 'national-day-celebrations')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Saudi National Day on September 23rd is the most significant celebration in the Kingdom's annual calendar — and for businesses and organizations across Riyadh, it is the most important event in the advertising and gift production year. Window Advertising produces complete National Day celebration packages for companies and government entities: from the <a href="/en/services/flags">flags</a> that line the building entrance to the gift boxes distributed to every employee, every element branded, coordinated, and delivered on time.</p>

<h2>Saudi National Day and the Corporate Opportunity</h2>
<p>For Saudi businesses, National Day is more than a public holiday — it is an expression of national pride that organizations demonstrate through how they celebrate and recognize their teams. A company that invests in a well-organized National Day celebration, with quality gifts, branded decorations, and a genuine sense of occasion, communicates to its employees that it values both their work and their national identity.</p>
<p>Window Advertising manages National Day production as a coordinated advertising campaign — not a collection of disconnected items from different suppliers, but a complete, visually unified celebration package where every element shares the same design language and quality standard.</p>

<h2>What a Complete National Day Package Includes</h2>
<p>A comprehensive National Day celebration package from Window Advertising covers every visual and physical element of the celebration:</p>
<p><a href="/en/services/employee-gift-boxes">Employee gift boxes</a> are the centerpiece of most corporate National Day celebrations. Window Advertising designs and assembles gift boxes with themed packaging in Saudi green and white, containing a curated selection of branded items — scarves, cups, T-shirts, chocolates, notebooks, and other <a href="/en/services/promotional-gifts">promotional gifts</a> chosen to reflect the occasion and the company's standard.</p>
<p><a href="/en/services/flags">Flags</a> and banners in Saudi national colors are produced and installed across the office entrance, reception, and common areas. Teardrop flags, rectangular flags, and hanging banner sets create a visual celebration atmosphere throughout the space.</p>
<p>Office and venue decoration including wall stickers, balloon arrangements, step-and-repeat photo backdrops, and themed signage transforms the workspace for the celebration day.</p>
<p><a href="/en/services/national-day-prints">National day prints</a> including National Day-themed brochures, certificates of appreciation for employees, and branded programs for formal celebration events.</p>
<p>Staff apparel including branded National Day T-shirts and scarves for employees to wear during the celebration.</p>

<h2>National Day Gift Production at Scale</h2>
<p>For organizations with hundreds or thousands of employees in Riyadh, the logistics of National Day gift production is as important as the gift design itself. Window Advertising manages bulk <a href="/en/services/promotional-gifts">promotional gifts</a> production, individual packaging, labeling, and delivery coordination for large corporate gift orders.</p>
<p>Every gift box in a large order receives the same quality of production as a single premium gift — consistent assembly, correct content, and damage-free delivery. For organizations with multiple offices across Saudi Arabia, we coordinate nationwide delivery to each location in advance of the celebration date.</p>

<h2>National Day Advertising and Decorations</h2>
<p>Beyond gifts, the physical advertising environment of an office or public space on National Day creates a shared celebration experience. Window Advertising produces National Day advertising displays — branded flags at entrances, window vinyl in national colors, wall graphic installations, and themed display stands that create a festive environment throughout the celebration day.</p>
<p>For companies hosting formal National Day events or employee celebrations, we produce the complete event advertising material set: stage backdrops, directional signage, branded table settings, and photography station setups that create memorable moments for employees and leadership.</p>

<h2>Coordinating National Day Production Across Riyadh</h2>
<p>September in Riyadh is the busiest production period in the advertising calendar. Window Advertising plans its production capacity and material sourcing in advance to ensure clients who book early receive their National Day materials in full and on time. Early booking secures preferred production slots and allows adequate time for design revision, sample approval, and large-quantity production.</p>
<p>Clients who have worked with Window Advertising on previous National Day campaigns are given early booking priority and benefit from existing design templates that reduce the time from brief to production. We also support clients with broader <a href="/en/services/event-festival">event and festival</a> production needs beyond National Day.</p>

<h2>Frequently Asked Questions About National Day Celebrations</h2>

<h3>When is Saudi National Day and when should we start planning?</h3>
<p>Saudi National Day falls on September 23rd each year. Window Advertising recommends beginning National Day planning at least 6 to 8 weeks before the event — production demand across Riyadh is extremely high in September and early bookings secure priority production slots. For large organizations requiring extensive event production and bulk gifts, 8 to 12 weeks lead time is advised.</p>

<h3>What advertising materials does Window Advertising produce for National Day?</h3>
<p>Window Advertising produces the full range of National Day advertising and event materials: themed banners and flags in Saudi green and white, employee gift boxes with National Day branding, promotional T-shirts and scarves, branded decorations for office and venue environments, step-and-repeat backdrops for photography stations, and complete corporate celebration packages coordinating all elements.</p>

<h3>Can you produce National Day gifts for large workforces in Riyadh?</h3>
<p>Yes. Window Advertising handles National Day gift production at scale — from small organizations of 50 employees to corporations requiring thousands of individually packaged gift sets. We manage the complete production, packaging, and logistics of large gift orders and coordinate delivery to one or multiple locations across Riyadh and Saudi Arabia.</p>

<h3>Do you design National Day branding from scratch or work with existing brand guidelines?</h3>
<p>Window Advertising works both ways. For organizations with existing brand guidelines, we apply the National Day theme within those guidelines — ensuring the celebration materials look branded rather than generic. For organizations that want a completely designed National Day visual identity, our team develops the design concept, color palette, and graphic language for the full celebration package.</p>

<h2>Plan Your National Day Celebration in Riyadh</h2>
<p>Contact our team as early as possible — production slots fill quickly as September approaches. Tell us your employee count, celebration plan, and gift budget. We provide a complete package proposal within 48 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "When is Saudi National Day and when should we start planning?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Saudi National Day falls on September 23rd each year. Window Advertising recommends beginning National Day planning at least 6 to 8 weeks before the event — production demand across Riyadh is extremely high in September and early bookings secure priority production slots. For large organizations requiring extensive event production and bulk gifts, 8 to 12 weeks lead time is advised."
      }
    },
    {
      "@type": "Question",
      "name": "What advertising materials does Window Advertising produce for National Day?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces the full range of National Day advertising and event materials: themed banners and flags in Saudi green and white, employee gift boxes with National Day branding, promotional T-shirts and scarves, branded decorations for office and venue environments, step-and-repeat backdrops for photography stations, and complete corporate celebration packages coordinating all elements."
      }
    },
    {
      "@type": "Question",
      "name": "Can you produce National Day gifts for large workforces in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising handles National Day gift production at scale — from small organizations of 50 employees to corporations requiring thousands of individually packaged gift sets. We manage the complete production, packaging, and logistics of large gift orders and coordinate delivery to one or multiple locations across Riyadh and Saudi Arabia."
      }
    },
    {
      "@type": "Question",
      "name": "Do you design National Day branding from scratch or work with existing brand guidelines?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising works both ways. For organizations with existing brand guidelines, we apply the National Day theme within those guidelines — ensuring the celebration materials look branded rather than generic. For organizations that want a completely designed National Day visual identity, our team develops the design concept, color palette, and graphic language for the full celebration package."
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
<p>اليوم الوطني السعودي في 23 سبتمبر هو أهم احتفال في التقويم السنوي للمملكة — وبالنسبة للشركات والمؤسسات في جميع أنحاء الرياض، فهو أهم حدث في عام إنتاج الإعلانات والهدايا. تنتج وينوو للإعلان باقات احتفال كاملة باليوم الوطني للشركات والجهات الحكومية: من <a href="/ar/services/flags">الأعلام</a> التي تصطف عند مدخل المبنى إلى صناديق الهدايا الموزعة على كل موظف، كل عنصر يحمل العلامة التجارية ومنسق ويُسلّم في الوقت المحدد.</p>

<h2>اليوم الوطني السعودي وفرصة الشركات</h2>
<p>بالنسبة للشركات السعودية، اليوم الوطني أكثر من مجرد عطلة رسمية — إنه تعبير عن الفخر الوطني الذي تُظهره المؤسسات من خلال طريقة احتفالها وتقديرها لفرقها. الشركة التي تستثمر في احتفال يوم وطني منظم جيداً، بهدايا عالية الجودة وديكورات مؤسسية وإحساس حقيقي بالمناسبة، توصل لموظفيها أنها تقدر عملهم وهويتهم الوطنية.</p>
<p>تدير وينوو للإعلان إنتاج اليوم الوطني كحملة إعلانية منسقة — ليس مجموعة من العناصر المنفصلة من موردين مختلفين، بل باقة احتفال كاملة وموحدة بصرياً حيث يشترك كل عنصر في نفس لغة التصميم ومعيار الجودة.</p>

<h2>ما يتضمنه الباقة الكاملة لليوم الوطني</h2>
<p>تغطي باقة احتفال اليوم الوطني الشاملة من وينوو للإعلان كل عنصر بصري ومادي للاحتفال:</p>
<p><a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> هي محور معظم احتفالات اليوم الوطني المؤسسية. تصمم وينوو للإعلان وتجمع صناديق الهدايا بتغليف مميز بالأخضر والأبيض السعودي، تحتوي على مجموعة مختارة من العناصر المؤسسية — الأوشحة والأكواب والتيشيرتات والشوكولاتة والدفاتر وغيرها من <a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> المختارة لتعكس المناسبة ومعايير الشركة.</p>
<p><a href="/ar/services/flags">الأعلام</a> واللافتات بالألوان الوطنية السعودية تُنتج وتُركب في مدخل المكتب والاستقبال والمناطق المشتركة. أعلام القطرة وأعلام مستطيلة ومجموعات لافتات معلقة تخلق أجواء احتفالية بصرية في جميع أنحاء المكان.</p>
<p>ديكور المكاتب والأماكن بما في ذلك ملصقات الجدران وترتيبات البالونات وخلفيات التصوير وال لافتات المميزة يحوّل مكان العمل ليوم الاحتفال.</p>
<p><a href="/ar/services/national-day-prints">مطبوعات اليوم الوطني</a> بما في ذلك كتيبات بتصميم اليوم الوطني وشهادات تقدير للموظفين وبرامج مؤسسية لفعاليات الاحتفال الرسمية.</p>
<p>ملابس الموظفين بما في ذلك تيشيرتات وأوشحة اليوم الوطني المؤسسية ليرتديها الموظفون أثناء الاحتفال.</p>

<h2>إنتاج هدايا اليوم الوطني بالكميات الكبيرة</h2>
<p>للمؤسسات التي تضم مئات أو آلاف الموظفين في الرياض، تعد لوجستيات إنتاج هدايا اليوم الوطني بنفس أهمية تصميم الهدية نفسها. تدير وينوو للإعلان إنتاج <a href="/ar/services/promotional-gifts">الهدايا الدعائية</a> بالجملة والتغليف الفردي والتوسيم وتنسيق التوصيل لطلبات هدايا الشركات الكبيرة.</p>
<p>كل صندوق هدايا في طلب كبير يحصل على نفس جودة الإنتاج كهدية فاخرة واحدة — تجميع متسق ومحتوى صحيح وتوصيل بدون أضرار. للمؤسسات ذات المكاتب المتعددة في المملكة العربية السعودية، ننسق التوصيل على مستوى المملكة لكل موقع قبل تاريخ الاحتفال.</p>

<h2>الإعلانات والديكورات لليوم الوطني</h2>
<p>بجانب الهدايا، تخلق البيئة الإعلانية المادية للمكتب أو المكان العام في اليوم الوطني تجربة احتفال مشتركة. تنتج وينوو للإعلان عروض إعلانية لليوم الوطني — أعلام مؤسسية عند المداخل وفينيل النوافذ بالألوان الوطنية وتركيبات جرافيك الجدران وستاندات عرض مميزة تخلق بيئة احتفالية طوال يوم الاحتفال.</p>
<p>للشركات التي تستضيف فعاليات يوم وطني رسمية أو احتفالات للموظفين، ننتج مجموعة مواد الإعلان الكاملة للفعالية: خلفيات المسرح ولافتات إرشادية وإعدادات طاولات مؤسسية ومحطات تصوير تخلق لحظات لا تُنسى للموظفين والإدارة.</p>

<h2>تنسيق إنتاج اليوم الوطني في الرياض</h2>
<p>سبتمبر في الرياض هو أكثر فترات الإنتاج ازدحاماً في التقويم الإعلاني. تخطط وينوو للإعلان لطاقتها الإنتاجية وتوفير المواد مسبقاً لضمان حصول العملاء الذين يحجزون مبكراً على مواد اليوم الوطني كاملة وفي الوقت المحدد. الحجز المبكر يضمن فترات إنتاج مفضلة ويتيح وقتاً كافياً لمراجعة التصميم واعتماد العينات والإنتاج بالكميات الكبيرة.</p>
<p>العملاء الذين عملوا مع وينوو للإعلان في حملات يوم وطني سابقة يحصلون على أولوية الحجز المبكر ويستفيدون من قوالب تصميم موجودة تقلل الوقت من الملخص إلى الإنتاج. كما ندعم العملاء في احتياجات إنتاج <a href="/ar/services/event-festival">الفعاليات والمهرجانات</a> الأوسع بجانب اليوم الوطني.</p>

<h2>الأسئلة الشائعة حول احتفالات اليوم الوطني</h2>

<h3>متى يحل اليوم الوطني السعودي ومتى يجب أن نبدأ التخطيط؟</h3>
<p>يحل اليوم الوطني السعودي في 23 سبتمبر من كل عام. توصي وينوو للإعلان ببدء التخطيط لليوم الوطني قبل 6 إلى 8 أسابيع على الأقل من الحدث — الطلب على الإنتاج في الرياض مرتفع للغاية في سبتمبر والحجوزات المبكرة تضمن فترات إنتاج ذات أولوية. للمؤسسات الكبيرة التي تحتاج إنتاج فعاليات واسع وهدايا بالجملة، يُنصح بفترة تحضير من 8 إلى 12 أسبوعاً.</p>

<h3>ما المواد الإعلانية التي تنتجها وينوو للإعلان لليوم الوطني؟</h3>
<p>تنتج وينوو للإعلان المجموعة الكاملة من المواد الإعلانية وفعاليات اليوم الوطني: لافتات وأعلام مميزة بالأخضر والأبيض السعودي، وصناديق هدايا الموظفين بتصميم اليوم الوطني، وتيشيرتات وأوشحة ترويجية، وديكورات مؤسسية لبيئات المكاتب والأماكن، وخلفيات تصوير، وباقات احتفال مؤسسية كاملة تنسق جميع العناصر.</p>

<h3>هل يمكنكم إنتاج هدايا اليوم الوطني لأعداد كبيرة من الموظفين في الرياض؟</h3>
<p>نعم. تتولى وينوو للإعلان إنتاج هدايا اليوم الوطني بالكميات — من المؤسسات الصغيرة بـ 50 موظفاً إلى الشركات التي تحتاج آلاف مجموعات الهدايا المغلفة فردياً. ندير الإنتاج الكامل والتغليف والخدمات اللوجستية للطلبات الكبيرة وننسق التوصيل لموقع واحد أو مواقع متعددة في الرياض والمملكة العربية السعودية.</p>

<h3>هل تصممون هوية اليوم الوطني من الصفر أم تعملون وفق إرشادات العلامة التجارية الموجودة؟</h3>
<p>تعمل وينوو للإعلان بكلا الطريقتين. للمؤسسات التي لديها إرشادات علامة تجارية موجودة، نطبق موضوع اليوم الوطني ضمن تلك الإرشادات — لضمان أن مواد الاحتفال تبدو مؤسسية وليست عامة. للمؤسسات التي تريد هوية بصرية مصممة بالكامل لليوم الوطني، يطور فريقنا مفهوم التصميم ولوحة الألوان واللغة الجرافيكية لباقة الاحتفال الكاملة.</p>

<h2>خطط لاحتفالك باليوم الوطني في الرياض</h2>
<p>تواصل مع فريقنا في أقرب وقت ممكن — فترات الإنتاج تمتلئ بسرعة مع اقتراب سبتمبر. أخبرنا بعدد موظفيك وخطة الاحتفال وميزانية الهدايا. نقدم عرض باقة كاملة خلال 48 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "متى يحل اليوم الوطني السعودي ومتى يجب أن نبدأ التخطيط؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يحل اليوم الوطني السعودي في 23 سبتمبر من كل عام. توصي وينوو للإعلان ببدء التخطيط لليوم الوطني قبل 6 إلى 8 أسابيع على الأقل من الحدث — الطلب على الإنتاج في الرياض مرتفع للغاية في سبتمبر والحجوزات المبكرة تضمن فترات إنتاج ذات أولوية. للمؤسسات الكبيرة التي تحتاج إنتاج فعاليات واسع وهدايا بالجملة، يُنصح بفترة تحضير من 8 إلى 12 أسبوعاً."
      }
    },
    {
      "@type": "Question",
      "name": "ما المواد الإعلانية التي تنتجها وينوو للإعلان لليوم الوطني؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تنتج وينوو للإعلان المجموعة الكاملة من المواد الإعلانية وفعاليات اليوم الوطني: لافتات وأعلام مميزة بالأخضر والأبيض السعودي، وصناديق هدايا الموظفين بتصميم اليوم الوطني، وتيشيرتات وأوشحة ترويجية، وديكورات مؤسسية لبيئات المكاتب والأماكن، وخلفيات تصوير، وباقات احتفال مؤسسية كاملة تنسق جميع العناصر."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم إنتاج هدايا اليوم الوطني لأعداد كبيرة من الموظفين في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تتولى وينوو للإعلان إنتاج هدايا اليوم الوطني بالكميات — من المؤسسات الصغيرة بـ 50 موظفاً إلى الشركات التي تحتاج آلاف مجموعات الهدايا المغلفة فردياً. ندير الإنتاج الكامل والتغليف والخدمات اللوجستية للطلبات الكبيرة وننسق التوصيل لموقع واحد أو مواقع متعددة في الرياض والمملكة العربية السعودية."
      }
    },
    {
      "@type": "Question",
      "name": "هل تصممون هوية اليوم الوطني من الصفر أم تعملون وفق إرشادات العلامة التجارية الموجودة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تعمل وينوو للإعلان بكلا الطريقتين. للمؤسسات التي لديها إرشادات علامة تجارية موجودة، نطبق موضوع اليوم الوطني ضمن تلك الإرشادات — لضمان أن مواد الاحتفال تبدو مؤسسية وليست عامة. للمؤسسات التي تريد هوية بصرية مصممة بالكامل لليوم الوطني، يطور فريقنا مفهوم التصميم ولوحة الألوان واللغة الجرافيكية لباقة الاحتفال الكاملة."
      }
    }
  ]
}
</script>
HTML;
    }
};
