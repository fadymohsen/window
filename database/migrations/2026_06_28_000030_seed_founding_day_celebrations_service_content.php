<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'founding-day-celebrations';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/founding-day-celebrations.webp',
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
            'title' => 'Founding Day Celebrations',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Founding Day Celebrations in Riyadh | Saudi Founding Day Event Production | Window Advertising',
            'meta_description' => 'Founding Day celebrations and event production in Riyadh. Window Advertising organizes and produces branded Saudi Founding Day events, corporate gifts, banners, and advertising materials for companies across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'founding day celebrations Riyadh, Saudi founding day events, founding day advertising Riyadh, founding day gifts Saudi Arabia, يوم التأسيس السعودي, تنظيم حفلات الرياض, دعاية واعلان الرياض, هدايا دعائية, دعاية واعلان السعودية',
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
            'title' => 'احتفالات يوم التأسيس',
            'content' => $this->getArabicContent(),
            'meta_title' => 'احتفالات يوم التأسيس في الرياض | تنظيم حفلات يوم التأسيس السعودي | وينوو للإعلان',
            'meta_description' => 'احتفالات يوم التأسيس السعودي وتنظيم الفعاليات في الرياض — وينوو للإعلان ينظم فعاليات يوم التأسيس المميزة وهدايا ترويجية ولافتات للشركات والجهات. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'احتفالات يوم التأسيس الرياض, تنظيم حفلات السعودية, يوم التأسيس السعودي, دعاية واعلان الرياض, هدايا دعائية يوم التأسيس, دعاية واعلان السعودية',
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
        $service = DB::table('services')->where('slug', 'founding-day-celebrations')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Saudi Founding Day on February 22nd commemorates the establishment of the first Saudi state — an occasion of deep historical significance that Saudi organizations increasingly mark with formal corporate celebrations. Window Advertising produces complete Founding Day celebration packages for companies and government entities across Riyadh: from the branded flags at the building entrance to the gifts in every employee's hands, every element designed, produced, and delivered before the occasion.</p>

<h2>Saudi Founding Day and Corporate Celebration</h2>
<p>Founding Day is Saudi Arabia's newest national occasion, first officially celebrated in 2022 and growing in corporate significance each year. For organizations in Riyadh, the occasion represents an opportunity to connect with the heritage and history of the Saudi state — and to celebrate with employees in a way that demonstrates national pride and organizational values.</p>
<p>The celebration approach for Founding Day differs from National Day. Where <a href="/en/services/national-day-celebrations">national day celebrations</a> tend to be widely festive and high-energy, Founding Day celebrations in the corporate environment often have a more formal, heritage-focused quality — honoring the historical significance of the occasion alongside recognizing the company's own roots and achievements.</p>
<p>Window Advertising designs Founding Day celebration packages that reflect the appropriate tone for each organization — matching the corporate culture and the gravity of the occasion.</p>

<h2>Founding Day Gift Production</h2>
<p>Employee gifts for Founding Day have become an established expectation in the Saudi corporate calendar. Window Advertising produces Founding Day gift boxes and gift sets with branding appropriate to the occasion — heritage-inspired design elements, the company logo, and the Founding Day year on premium packaging.</p>
<p>Gift set contents are curated to match the celebration's character: quality branded items such as premium notebooks, pens, cups, scarves, and chocolates in packaging that communicates the significance of the occasion. For organizations wanting to make a distinctive statement, custom-commissioned items in heritage design are available.</p>
<p>Gift production is available at any scale — from boutique organizations gifting a leadership team to corporations ordering thousands of <a href="/en/services/employee-gift-boxes">employee gift boxes</a> with coordinated delivery across multiple Riyadh locations.</p>

<h2>Founding Day Decorations and Environmental Branding</h2>
<p>The physical environment of the office or celebration venue on Founding Day communicates as much as the gifts. Window Advertising produces Founding Day <a href="/en/services/flags">flags</a>, banners, entrance arches, wall graphics, and window displays that transform the space for the occasion.</p>
<p>The Founding Day color palette and visual language is distinct from National Day — designs incorporate historical motifs, Arabic heritage typography, and patterns inspired by the Kingdom's founding period. Our design team creates <a href="/en/services/founding-day-prints">founding day prints</a> and decorative materials that honor the occasion's historical depth while maintaining the organization's brand identity.</p>
<p>Installation services for Founding Day decorations are available across Riyadh.</p>

<h2>Founding Day Events and Formal Celebrations</h2>
<p>For organizations hosting formal Founding Day events — employee celebration dinners, appreciation ceremonies, or leadership gatherings — Window Advertising produces the complete <a href="/en/services/event-festival">event and festival</a> advertising and decoration set: stage backdrop in Founding Day branding, podium signage, directional signage for the venue, branded table settings, certificate of appreciation design and printing, and event program design.</p>
<p>Events range in scale from intimate leadership ceremonies to large employee celebrations for organizations with hundreds or thousands of staff across Riyadh.</p>

<h2>Founding Day Planning Timeline</h2>
<p>Founding Day falls on February 22nd — historically a period of lower advertising production activity than September, which means production capacity is generally more available than for National Day. However, as Founding Day grows in corporate significance, production demand has increased each year. Window Advertising recommends beginning Founding Day planning in January for February delivery — allowing 3 to 4 weeks for design, approval, production, and delivery.</p>
<p>Organizations that begin planning in December for February celebrations benefit from maximum design flexibility and the longest lead time for custom or large-quantity items.</p>

<h2>Frequently Asked Questions About Founding Day Celebrations</h2>

<h3>When is Saudi Founding Day and when should we start planning?</h3>
<p>Saudi Founding Day falls on February 22nd each year, commemorating the founding of the first Saudi state by Imam Muhammad bin Saud in 1727. Window Advertising recommends beginning Founding Day celebration planning 4 to 6 weeks in advance. Production demand in Riyadh around Founding Day is significant, and early booking ensures your materials are produced and delivered before the celebration date.</p>

<h3>How is Founding Day different from National Day in terms of celebration production?</h3>
<p>While both are major Saudi national occasions, Founding Day (February 22nd) and National Day (September 23rd) have distinct visual identities and growing their own brand aesthetics. Founding Day focuses on heritage, historical depth, and the story of the Saudi state's origins — the visual language tends to incorporate heritage-inspired design elements. National Day is more contemporary and celebratory in its advertising aesthetics. Window Advertising designs appropriate visual identities for each occasion.</p>

<h3>What does a Founding Day corporate celebration package include?</h3>
<p>A complete Founding Day corporate celebration package from Window Advertising includes employee gift boxes with Founding Day branding, office and entrance decoration with flags and banners in the Founding Day visual identity, event photography station with a branded backdrop, printed celebration programs and certificates of appreciation, and staff apparel or gifts in Founding Day-appropriate design.</p>

<h3>Can you produce Founding Day materials for both Arabic and international employees?</h3>
<p>Yes. Window Advertising produces Founding Day celebration materials in bilingual Arabic and English format for organizations with international workforces. Gift boxes, certificates, event programs, and printed materials can be produced with both languages to ensure all employees can engage with and appreciate the occasion.</p>

<h2>Plan Your Founding Day Celebration in Riyadh</h2>
<p>Contact our team to begin your Founding Day celebration planning. Tell us your employee count, event format, and gift budget. We provide a complete package proposal within 48 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "When is Saudi Founding Day and when should we start planning?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Saudi Founding Day falls on February 22nd each year, commemorating the founding of the first Saudi state by Imam Muhammad bin Saud in 1727. Window Advertising recommends beginning Founding Day celebration planning 4 to 6 weeks in advance. Production demand in Riyadh around Founding Day is significant, and early booking ensures your materials are produced and delivered before the celebration date."
      }
    },
    {
      "@type": "Question",
      "name": "How is Founding Day different from National Day in terms of celebration production?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "While both are major Saudi national occasions, Founding Day (February 22nd) and National Day (September 23rd) have distinct visual identities and growing their own brand aesthetics. Founding Day focuses on heritage, historical depth, and the story of the Saudi state's origins — the visual language tends to incorporate heritage-inspired design elements. National Day is more contemporary and celebratory in its advertising aesthetics. Window Advertising designs appropriate visual identities for each occasion."
      }
    },
    {
      "@type": "Question",
      "name": "What does a Founding Day corporate celebration package include?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A complete Founding Day corporate celebration package from Window Advertising includes employee gift boxes with Founding Day branding, office and entrance decoration with flags and banners in the Founding Day visual identity, event photography station with a branded backdrop, printed celebration programs and certificates of appreciation, and staff apparel or gifts in Founding Day-appropriate design."
      }
    },
    {
      "@type": "Question",
      "name": "Can you produce Founding Day materials for both Arabic and international employees?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising produces Founding Day celebration materials in bilingual Arabic and English format for organizations with international workforces. Gift boxes, certificates, event programs, and printed materials can be produced with both languages to ensure all employees can engage with and appreciate the occasion."
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
<p>يوم التأسيس السعودي في 22 فبراير يحيي ذكرى تأسيس الدولة السعودية الأولى — مناسبة ذات أهمية تاريخية عميقة تحتفي بها المؤسسات السعودية بشكل متزايد من خلال احتفالات مؤسسية رسمية. وينوو للإعلان ينتج باقات احتفال كاملة بيوم التأسيس للشركات والجهات الحكومية في جميع أنحاء الرياض: من الأعلام المؤسسية عند مدخل المبنى إلى الهدايا في يد كل موظف، كل عنصر مصمم ومنتج ومسلّم قبل المناسبة.</p>

<h2>يوم التأسيس السعودي والاحتفال الشركاتي</h2>
<p>يوم التأسيس هو أحدث مناسبة وطنية في المملكة العربية السعودية، احتُفل به رسمياً لأول مرة في عام 2022 وتتزايد أهميته المؤسسية كل عام. بالنسبة للمؤسسات في الرياض، تمثل المناسبة فرصة للتواصل مع تراث وتاريخ الدولة السعودية — والاحتفال مع الموظفين بطريقة تعكس الفخر الوطني والقيم المؤسسية.</p>
<p>يختلف نهج الاحتفال بيوم التأسيس عن اليوم الوطني. حيث تميل <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> إلى الطابع الاحتفالي العام والحيوي، فإن احتفالات يوم التأسيس في البيئة المؤسسية غالباً ما تتسم بطابع أكثر رسمية وتركيزاً على التراث — تكريماً للأهمية التاريخية للمناسبة إلى جانب الاعتراف بجذور الشركة وإنجازاتها.</p>
<p>تصمم وينوو للإعلان باقات احتفال بيوم التأسيس تعكس النبرة المناسبة لكل مؤسسة — بما يتوافق مع الثقافة المؤسسية وجلال المناسبة.</p>

<h2>إنتاج هدايا يوم التأسيس</h2>
<p>أصبحت هدايا الموظفين بمناسبة يوم التأسيس توقعاً راسخاً في التقويم المؤسسي السعودي. تنتج وينوو للإعلان صناديق وأطقم هدايا يوم التأسيس بعلامة تجارية مناسبة للمناسبة — عناصر تصميم مستوحاة من التراث، وشعار الشركة، وسنة يوم التأسيس على تغليف فاخر.</p>
<p>يتم اختيار محتويات أطقم الهدايا لتتناسب مع طابع الاحتفال: منتجات مؤسسية عالية الجودة مثل الدفاتر الفاخرة والأقلام والأكواب والأوشحة والشوكولاتة في تغليف يعبر عن أهمية المناسبة. للمؤسسات الراغبة في التميز، تتوفر منتجات مصممة خصيصاً بطابع تراثي.</p>
<p>إنتاج الهدايا متاح بأي حجم — من المؤسسات الصغيرة التي تهدي فريق القيادة إلى الشركات الكبرى التي تطلب آلاف <a href="/ar/services/employee-gift-boxes">صناديق هدايا الموظفين</a> مع التوصيل المنسق عبر مواقع متعددة في الرياض.</p>

<h2>ديكورات يوم التأسيس والعلامة التجارية البيئية</h2>
<p>البيئة المادية للمكتب أو مكان الاحتفال في يوم التأسيس تتحدث بقدر ما تتحدث الهدايا. تنتج وينوو للإعلان <a href="/ar/services/flags">أعلام</a> يوم التأسيس ولافتات وأقواس مداخل ورسومات جدارية وعروض نوافذ تحوّل المساحة للمناسبة.</p>
<p>لوحة ألوان يوم التأسيس ولغته البصرية مميزة عن اليوم الوطني — تتضمن التصاميم زخارف تاريخية وخطوط عربية تراثية وأنماط مستوحاة من فترة تأسيس المملكة. يبتكر فريق التصميم لدينا <a href="/ar/services/founding-day-prints">مطبوعات يوم التأسيس</a> ومواد زخرفية تكرّم العمق التاريخي للمناسبة مع الحفاظ على هوية العلامة التجارية للمؤسسة.</p>
<p>خدمات التركيب لديكورات يوم التأسيس متاحة في جميع أنحاء الرياض.</p>

<h2>فعاليات يوم التأسيس والاحتفالات الرسمية</h2>
<p>للمؤسسات التي تستضيف فعاليات رسمية بيوم التأسيس — حفلات عشاء للموظفين أو حفلات تقدير أو تجمعات قيادية — تنتج وينوو للإعلان مجموعة كاملة من إعلانات وديكورات <a href="/ar/services/event-festival">الفعاليات والمهرجانات</a>: خلفية المسرح بعلامة يوم التأسيس، ولافتات المنصة، واللافتات الإرشادية للمكان، وإعدادات الطاولات المؤسسية، وتصميم وطباعة شهادات التقدير، وتصميم برنامج الفعالية.</p>
<p>تتراوح الفعاليات في حجمها من حفلات القيادة الحميمة إلى الاحتفالات الكبيرة للموظفين في المؤسسات التي تضم مئات أو آلاف الموظفين في الرياض.</p>

<h2>الجدول الزمني لتخطيط يوم التأسيس</h2>
<p>يوافق يوم التأسيس 22 فبراير — وهي فترة تشهد تاريخياً نشاط إنتاج إعلاني أقل من سبتمبر، مما يعني أن الطاقة الإنتاجية متاحة بشكل عام أكثر من اليوم الوطني. ومع ذلك، مع تزايد أهمية يوم التأسيس المؤسسية، زاد الطلب على الإنتاج كل عام. توصي وينوو للإعلان ببدء التخطيط ليوم التأسيس في يناير للتسليم في فبراير — مما يتيح 3 إلى 4 أسابيع للتصميم والموافقة والإنتاج والتسليم.</p>
<p>المؤسسات التي تبدأ التخطيط في ديسمبر لاحتفالات فبراير تستفيد من أقصى مرونة في التصميم وأطول فترة زمنية للمنتجات المخصصة أو ذات الكميات الكبيرة.</p>

<h2>الأسئلة الشائعة حول احتفالات يوم التأسيس</h2>

<h3>متى يوم التأسيس السعودي ومتى يجب أن نبدأ التخطيط؟</h3>
<p>يوافق يوم التأسيس السعودي 22 فبراير من كل عام، إحياءً لذكرى تأسيس الدولة السعودية الأولى على يد الإمام محمد بن سعود عام 1727. توصي وينوو للإعلان ببدء التخطيط لاحتفالات يوم التأسيس قبل 4 إلى 6 أسابيع. الطلب على الإنتاج في الرياض حول يوم التأسيس كبير، والحجز المبكر يضمن إنتاج موادك وتسليمها قبل تاريخ الاحتفال.</p>

<h3>كيف يختلف يوم التأسيس عن اليوم الوطني من حيث إنتاج الاحتفالات؟</h3>
<p>بينما كلاهما مناسبتان وطنيتان سعوديتان كبيرتان، يتمتع يوم التأسيس (22 فبراير) واليوم الوطني (23 سبتمبر) بهويات بصرية مميزة وجماليات علامة تجارية متنامية خاصة بكل منهما. يركز يوم التأسيس على التراث والعمق التاريخي وقصة أصول الدولة السعودية — تميل اللغة البصرية إلى دمج عناصر تصميم مستوحاة من التراث. اليوم الوطني أكثر معاصرة واحتفالية في جمالياته الإعلانية. تصمم وينوو للإعلان هويات بصرية مناسبة لكل مناسبة.</p>

<h3>ماذا تتضمن باقة احتفال يوم التأسيس للشركات؟</h3>
<p>تتضمن باقة احتفال يوم التأسيس الكاملة من وينوو للإعلان صناديق هدايا الموظفين بعلامة يوم التأسيس، وتزيين المكاتب والمداخل بالأعلام واللافتات بالهوية البصرية ليوم التأسيس، ومحطة تصوير مع خلفية مؤسسية، وبرامج احتفال مطبوعة وشهادات تقدير، وملابس أو هدايا للموظفين بتصميم مناسب ليوم التأسيس.</p>

<h3>هل يمكنكم إنتاج مواد يوم التأسيس للموظفين العرب والدوليين معاً؟</h3>
<p>نعم. تنتج وينوو للإعلان مواد احتفالات يوم التأسيس بصيغة ثنائية اللغة عربي وإنجليزي للمؤسسات ذات القوى العاملة الدولية. يمكن إنتاج صناديق الهدايا والشهادات وبرامج الفعاليات والمواد المطبوعة بكلتا اللغتين لضمان تفاعل جميع الموظفين مع المناسبة وتقديرها.</p>

<h2>خطط لاحتفالك بيوم التأسيس في الرياض</h2>
<p>تواصل مع فريقنا لبدء التخطيط لاحتفالك بيوم التأسيس. أخبرنا بعدد موظفيك وشكل الفعالية وميزانية الهدايا. نقدم عرضاً كاملاً للباقة خلال 48 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "متى يوم التأسيس السعودي ومتى يجب أن نبدأ التخطيط؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يوافق يوم التأسيس السعودي 22 فبراير من كل عام، إحياءً لذكرى تأسيس الدولة السعودية الأولى على يد الإمام محمد بن سعود عام 1727. توصي وينوو للإعلان ببدء التخطيط لاحتفالات يوم التأسيس قبل 4 إلى 6 أسابيع. الطلب على الإنتاج في الرياض حول يوم التأسيس كبير، والحجز المبكر يضمن إنتاج موادك وتسليمها قبل تاريخ الاحتفال."
      }
    },
    {
      "@type": "Question",
      "name": "كيف يختلف يوم التأسيس عن اليوم الوطني من حيث إنتاج الاحتفالات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "بينما كلاهما مناسبتان وطنيتان سعوديتان كبيرتان، يتمتع يوم التأسيس (22 فبراير) واليوم الوطني (23 سبتمبر) بهويات بصرية مميزة وجماليات علامة تجارية متنامية خاصة بكل منهما. يركز يوم التأسيس على التراث والعمق التاريخي وقصة أصول الدولة السعودية — تميل اللغة البصرية إلى دمج عناصر تصميم مستوحاة من التراث. اليوم الوطني أكثر معاصرة واحتفالية في جمالياته الإعلانية. تصمم وينوو للإعلان هويات بصرية مناسبة لكل مناسبة."
      }
    },
    {
      "@type": "Question",
      "name": "ماذا تتضمن باقة احتفال يوم التأسيس للشركات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تتضمن باقة احتفال يوم التأسيس الكاملة من وينوو للإعلان صناديق هدايا الموظفين بعلامة يوم التأسيس، وتزيين المكاتب والمداخل بالأعلام واللافتات بالهوية البصرية ليوم التأسيس، ومحطة تصوير مع خلفية مؤسسية، وبرامج احتفال مطبوعة وشهادات تقدير، وملابس أو هدايا للموظفين بتصميم مناسب ليوم التأسيس."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم إنتاج مواد يوم التأسيس للموظفين العرب والدوليين معاً؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تنتج وينوو للإعلان مواد احتفالات يوم التأسيس بصيغة ثنائية اللغة عربي وإنجليزي للمؤسسات ذات القوى العاملة الدولية. يمكن إنتاج صناديق الهدايا والشهادات وبرامج الفعاليات والمواد المطبوعة بكلتا اللغتين لضمان تفاعل جميع الموظفين مع المناسبة وتقديرها."
      }
    }
  ]
}
</script>
HTML;
    }
};
