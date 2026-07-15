<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'pop-up';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/pop-up.webp',
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
            'title' => 'Pop-up Display',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Pop-up Display Stands in Riyadh | Portable Exhibition Displays | Window Advertising',
            'meta_description' => 'Custom pop-up display stands and portable exhibition backdrops in Riyadh. Window Advertising designs and manufactures pop-up systems for trade shows, events, and retail promotions across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'pop-up display stands Riyadh, portable exhibition display Saudi Arabia, pop-up backdrop Riyadh, exhibition pop-up system, استندات دعائية الرياض, دعاية وإعلان الرياض, بوب أب الرياض',
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
            'title' => 'بوب أب',
            'content' => $this->getArabicContent(),
            'meta_title' => 'بوب أب استندات عرض في الرياض | عارضات دعائية محمولة | ويندو للإعلان',
            'meta_description' => 'استندات بوب أب مخصصة وعارضات دعائية محمولة في الرياض — ويندو للإعلان يصمم وينتج أنظمة بوب أب للمعارض والفعاليات والترويج في المحلات. دعاية وإعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'بوب أب الرياض, استندات دعائية الرياض, عارضات محمولة السعودية, دعاية وإعلان الرياض, بوب أب معارض, استندات معارض الرياض',
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
        $service = DB::table('services')->where('slug', 'pop-up')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Pop-up displays are the smart choice for businesses that exhibit frequently. They set up in minutes, pack into a carry case, and deliver a large, professional branded backdrop wherever you need it. Window Advertising produces custom pop-up <a href="/en/services/display-stands">display stands</a> with high-resolution printed graphics for exhibitions, events, and retail activations across Riyadh and Saudi Arabia.</p>

<h2>What Is a Pop-up Display?</h2>
<p>A pop-up display is a self-expanding branded <a href="/en/services/backdrop">backdrop</a> system consisting of a collapsible frame and a printed graphic surface. The frame compresses flat for transport and storage in a carry case, then expands rapidly on-site by springing into a curved or straight profile. Printed graphic panels or a fabric skin is then attached to the frame to create a seamless, professional exhibition display.</p>
<p>Pop-up displays are among the most popular portable advertising stands in the Saudi exhibitions market because they offer the visual impact of a large backdrop with the convenience of a carry-on travel case. Window Advertising designs and produces pop-up display systems for companies across Riyadh and the Kingdom.</p>

<h2>Types of Pop-up Display Systems We Produce</h2>
<p>Window Advertising supplies three main pop-up display configurations:</p>
<p><strong>Curved Pop-up Systems</strong> produce a gently curved backdrop wall that wraps around the exhibition space. The curved profile is visually distinctive and creates a sense of enclosure around your display area — making your stand feel more like a dedicated space than an open table with a sign behind it.</p>
<p><strong>Straight Pop-up Systems</strong> present a flat backdrop surface in widths ranging from 1.5 meters to over 4 meters for larger exhibition footprints. Straight systems are ideal for conference rooms, seminar backdrops, and retail promotions where a flat display wall is preferred.</p>
<p><strong>Fabric Pop-up Systems</strong> use a dye-sublimation printed fabric skin stretched over the frame using a pillowcase or velcro attachment. The fabric surface is wrinkle-resistant, lightweight, and delivers vivid full-color print quality. These are the most popular format in Riyadh's exhibitions market.</p>
<p><strong>Panel Pop-up Systems</strong> use rigid printed graphic panels that attach to the frame using magnetic or velcro fasteners. Panels deliver extremely sharp print resolution at close viewing distances and are preferred for premium product display environments.</p>

<h2>Advantages of Pop-up Displays for Saudi Exhibitions</h2>
<p>For businesses that participate in multiple trade shows and events throughout the year, pop-up displays offer clear advantages over custom-built <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> structures:</p>
<p><strong>Reusability</strong> makes pop-up systems economical over time. The frame is used repeatedly across many events, and only the graphic panels need to be reprinted when a campaign or brand message changes.</p>
<p><strong>Setup speed</strong> means your team can build the display without specialist tools or installation crews — reducing event setup time and cost.</p>
<p><strong>Portability</strong> means the entire system travels in a wheeled carry case that fits in a car boot or as airline luggage, making it practical for exhibitions across Saudi Arabia and the wider Gulf region.</p>
<p><strong>Scalability</strong> allows pop-up displays to be used as standalone displays at small events or combined with roll-up banners, counters, and additional display systems to create a larger exhibition environment.</p>

<h2>Graphic Design for Pop-up Displays</h2>
<p>The quality of the printed graphic determines the visual impact of your pop-up display. Window Advertising's design team creates full-width, seamless graphics that work across the entire display surface — ensuring there are no awkward joins, misaligned panels, or design elements that disappear into the frame structure.</p>
<p>Our design process begins with your brand guidelines and event brief. We produce a photorealistic mockup showing how the design will appear on the physical display system, allowing you to review the composition before production begins. Revisions are included until you are satisfied with the result.</p>

<h2>Complete Pop-up Packages Available</h2>
<p>Window Advertising supplies pop-up displays as complete packages including the frame system, printed graphic surface, and carry case. Optional additions include a branded counter unit that matches the pop-up design, literature holders and iPad stands for product information display, spotlights that clip to the top of the frame to illuminate the graphic, and additional <a href="/en/services/roll-up">roll-up</a> or <a href="/en/services/lama-stand">lama stand</a> units that complement the pop-up as part of a larger exhibition setup.</p>
<p>Replacement graphics are available separately for existing frames, and we supply replacement hardware for frames that develop faults over time.</p>

<h2>Pop-up Display Portfolio — Riyadh</h2>
<p>Our pop-up display portfolio includes exhibition configurations, conference room setups, retail promotion displays, and branded event environments across Riyadh. Browse the gallery to explore the range of pop-up systems produced and delivered by Window Advertising.</p>

<h2>Frequently Asked Questions About Pop-up Displays</h2>

<h3>What is a pop-up display stand?</h3>
<p>A pop-up display stand is a portable, self-expanding exhibition backdrop that collapses flat for transport and expands rapidly for setup. The frame — typically a magnetic or compression-linked aluminum spine — springs open and locks into a curved or straight profile, onto which printed graphic panels or a fabric skin is attached. Pop-up displays are widely used at trade shows, conferences, and retail events.</p>

<h3>How long does it take to set up a pop-up display?</h3>
<p>Most pop-up display systems can be fully assembled by one person in 5 to 15 minutes without tools. The magnetic or spring-loaded frame expands and clicks into position, and the graphic panels attach via velcro, magnetic strips, or pillowcase sleeve depending on the system type.</p>

<h3>Can the graphic on a pop-up display be replaced?</h3>
<p>Yes. Pop-up display frames are reusable and the printed graphic panels can be replaced independently. This makes pop-up systems a cost-effective long-term investment — you update the graphics for a new campaign or event without replacing the frame. Window Advertising supplies replacement graphic panels for existing pop-up systems.</p>

<h3>Are pop-up displays suitable for outdoor use?</h3>
<p>Pop-up displays are primarily designed for indoor use at exhibitions, conferences, and retail environments. For outdoor use in Saudi Arabia's conditions, we recommend a more robust stand system such as a banner with frame or an outdoor tension fabric display. Contact Window Advertising and we will recommend the most suitable system for your outdoor application.</p>

<h2>Order Your Pop-up Display in Riyadh</h2>
<p>Tell us the display size, the number of panels, and your event or campaign brief. Our team will recommend the most suitable system and provide a complete package quote within 24 hours. Delivery across Riyadh included with every order.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is a pop-up display stand?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A pop-up display stand is a portable, self-expanding exhibition backdrop that collapses flat for transport and expands rapidly for setup. The frame — typically a magnetic or compression-linked aluminum spine — springs open and locks into a curved or straight profile, onto which printed graphic panels or a fabric skin is attached. Pop-up displays are widely used at trade shows, conferences, and retail events."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to set up a pop-up display?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most pop-up display systems can be fully assembled by one person in 5 to 15 minutes without tools. The magnetic or spring-loaded frame expands and clicks into position, and the graphic panels attach via velcro, magnetic strips, or pillowcase sleeve depending on the system type."
      }
    },
    {
      "@type": "Question",
      "name": "Can the graphic on a pop-up display be replaced?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Pop-up display frames are reusable and the printed graphic panels can be replaced independently. This makes pop-up systems a cost-effective long-term investment — you update the graphics for a new campaign or event without replacing the frame. Window Advertising supplies replacement graphic panels for existing pop-up systems."
      }
    },
    {
      "@type": "Question",
      "name": "Are pop-up displays suitable for outdoor use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pop-up displays are primarily designed for indoor use at exhibitions, conferences, and retail environments. For outdoor use in Saudi Arabia's conditions, we recommend a more robust stand system such as a banner with frame or an outdoor tension fabric display. Contact Window Advertising and we will recommend the most suitable system for your outdoor application."
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
<p>استندات البوب أب هي الخيار الذكي للشركات التي تشارك في المعارض بشكل متكرر. تُركّب في دقائق، وتُحفظ في حقيبة حمل، وتوفر خلفية دعائية كبيرة واحترافية أينما احتجتها. ويندو للإعلان ينتج أنظمة بوب أب مخصصة مع رسومات مطبوعة عالية الدقة بأنظمة <a href="/ar/services/display-stands">استندات العرض</a> للمعارض والفعاليات والعروض الترويجية في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<h2>ما هو الاستند البوب أب؟</h2>
<p>البوب أب هو نظام <a href="/ar/services/backdrop">خلفية دعائية</a> ذاتي التمدد يتكون من هيكل قابل للطي وسطح رسومي مطبوع. يُضغط الهيكل بشكل مسطح للنقل والتخزين في حقيبة حمل، ثم يتمدد بسرعة في الموقع ليأخذ شكلاً منحنياً أو مستقيماً. تُثبّت بعد ذلك لوحات الرسومات المطبوعة أو غطاء القماش على الهيكل لإنشاء عرض معرضي احترافي وسلس.</p>
<p>تُعد استندات البوب أب من أكثر الاستندات الدعائية المحمولة شعبية في سوق المعارض السعودي لأنها توفر التأثير البصري لخلفية كبيرة مع سهولة حقيبة سفر محمولة. يصمم ويندو للإعلان وينتج أنظمة بوب أب للشركات في جميع أنحاء الرياض والمملكة.</p>

<h2>أنواع أنظمة البوب أب التي ننتجها</h2>
<p>يوفر ويندو للإعلان ثلاثة تكوينات رئيسية لاستندات البوب أب:</p>
<p><strong>أنظمة البوب أب المنحنية</strong> تُنتج جداراً خلفياً منحنياً بلطف يلتف حول مساحة المعرض. الشكل المنحني مميز بصرياً ويخلق إحساساً بالإحاطة حول منطقة عرضك — مما يجعل جناحك يبدو كمساحة مخصصة وليس مجرد طاولة مفتوحة خلفها لافتة.</p>
<p><strong>أنظمة البوب أب المستقيمة</strong> تقدم سطح خلفية مسطحاً بعرض يتراوح من 1.5 متر إلى أكثر من 4 أمتار للمساحات المعرضية الأكبر. الأنظمة المستقيمة مثالية لقاعات المؤتمرات وخلفيات الندوات والعروض الترويجية في المحلات حيث يُفضّل جدار عرض مسطح.</p>
<p><strong>أنظمة البوب أب القماشية</strong> تستخدم غطاء قماشي مطبوعاً بتقنية الطباعة الحرارية على القماش ومشدوداً على الهيكل باستخدام تثبيت غطاء الوسادة أو الفيلكرو. السطح القماشي مقاوم للتجعد وخفيف الوزن ويوفر جودة طباعة حية بألوان كاملة. هذا هو الشكل الأكثر شعبية في سوق معارض الرياض.</p>
<p><strong>أنظمة البوب أب اللوحية</strong> تستخدم لوحات رسومات صلبة مطبوعة تُثبّت على الهيكل باستخدام مثبتات مغناطيسية أو فيلكرو. توفر اللوحات دقة طباعة عالية جداً عند مسافات المشاهدة القريبة وتُفضّل لبيئات عرض المنتجات الفاخرة.</p>

<h2>مزايا استندات البوب أب للمعارض السعودية</h2>
<p>للشركات التي تشارك في معارض وفعاليات متعددة على مدار العام، توفر استندات البوب أب مزايا واضحة مقارنة بهياكل <a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a> المبنية حسب الطلب:</p>
<p><strong>إعادة الاستخدام</strong> تجعل أنظمة البوب أب اقتصادية بمرور الوقت. يُستخدم الهيكل بشكل متكرر عبر فعاليات عديدة، ولا تحتاج سوى إعادة طباعة لوحات الرسومات عند تغيير الحملة أو الرسالة التسويقية.</p>
<p><strong>سرعة التركيب</strong> تعني أن فريقك يستطيع بناء العرض دون أدوات متخصصة أو طواقم تركيب — مما يقلل وقت وتكلفة تجهيز الفعاليات.</p>
<p><strong>قابلية النقل</strong> تعني أن النظام بالكامل يُنقل في حقيبة حمل بعجلات تسع في صندوق السيارة أو كأمتعة طيران، مما يجعله عملياً للمعارض في جميع أنحاء المملكة العربية السعودية ومنطقة الخليج.</p>
<p><strong>قابلية التوسع</strong> تتيح استخدام استندات البوب أب كعروض مستقلة في الفعاليات الصغيرة أو دمجها مع بانرات رول أب وكاونترات وأنظمة عرض إضافية لإنشاء بيئة معرضية أكبر.</p>

<h2>تصميم الجرافيك للبوب أب</h2>
<p>جودة الرسومات المطبوعة تحدد التأثير البصري لاستند البوب أب. يبتكر فريق التصميم في ويندو للإعلان رسومات بعرض كامل وسلسة تعمل عبر كامل سطح العرض — لضمان عدم وجود وصلات محرجة أو لوحات غير متوازنة أو عناصر تصميم تختفي في هيكل الإطار.</p>
<p>تبدأ عملية التصميم لدينا بإرشادات علامتك التجارية وملخص الفعالية. ننتج نموذجاً واقعياً يوضح كيف سيظهر التصميم على نظام العرض الفعلي، مما يتيح لك مراجعة التكوين قبل بدء الإنتاج. التعديلات مشمولة حتى تكون راضياً عن النتيجة.</p>

<h2>حزم بوب أب كاملة متوفرة</h2>
<p>يوفر ويندو للإعلان استندات البوب أب كحزم كاملة تشمل نظام الهيكل والسطح الرسومي المطبوع وحقيبة الحمل. الإضافات الاختيارية تشمل وحدة كاونتر مؤسسية تتوافق مع تصميم البوب أب، وحاملات المطبوعات وستاندات آيباد لعرض معلومات المنتج، وأضواء تُثبّت في أعلى الهيكل لإنارة الرسومات، ووحدات <a href="/ar/services/roll-up">رول أب</a> أو <a href="/ar/services/lama-stand">لاما ستاند</a> إضافية تُكمّل البوب أب كجزء من تجهيز معرضي أكبر.</p>
<p>الرسومات البديلة متاحة بشكل منفصل للهياكل الموجودة، ونوفر قطع غيار للهياكل التي تطور عيوباً بمرور الوقت.</p>

<h2>أعمالنا في استندات البوب أب بالرياض</h2>
<p>تشمل محفظة أعمالنا في البوب أب تجهيزات المعارض وإعدادات قاعات المؤتمرات وعروض الترويج في المحلات وبيئات الفعاليات المؤسسية في جميع أنحاء الرياض. تصفح المعرض لاستكشاف مجموعة أنظمة البوب أب التي أنتجها وسلّمها ويندو للإعلان.</p>

<h2>الأسئلة الشائعة حول استندات البوب أب</h2>

<h3>ما هو استند البوب أب؟</h3>
<p>استند البوب أب هو خلفية معرضية محمولة وذاتية التمدد تنطوي بشكل مسطح للنقل وتتمدد بسرعة للتركيب. الهيكل — عادةً عمود ألمنيوم بروابط مغناطيسية أو ضغطية — ينفتح ويُقفل في شكل منحنٍ أو مستقيم، تُثبّت عليه لوحات الرسومات المطبوعة أو غطاء القماش. تُستخدم استندات البوب أب على نطاق واسع في المعارض التجارية والمؤتمرات والفعاليات التجارية.</p>

<h3>كم يستغرق تركيب استند البوب أب؟</h3>
<p>يمكن تجميع معظم أنظمة البوب أب بالكامل بواسطة شخص واحد في 5 إلى 15 دقيقة دون أدوات. يتمدد الهيكل ذو النوابض أو المغناطيس ويستقر في مكانه، وتُثبّت لوحات الرسومات عبر الفيلكرو أو الشرائط المغناطيسية أو غطاء الوسادة حسب نوع النظام.</p>

<h3>هل يمكن استبدال الرسومات على استند البوب أب؟</h3>
<p>نعم. هياكل استندات البوب أب قابلة لإعادة الاستخدام ويمكن استبدال لوحات الرسومات المطبوعة بشكل مستقل. هذا يجعل أنظمة البوب أب استثماراً فعالاً من حيث التكلفة على المدى الطويل — تُحدّث الرسومات لحملة أو فعالية جديدة دون استبدال الهيكل. يوفر ويندو للإعلان لوحات رسومات بديلة لأنظمة البوب أب الموجودة.</p>

<h3>هل استندات البوب أب مناسبة للاستخدام الخارجي؟</h3>
<p>استندات البوب أب مصممة بشكل أساسي للاستخدام الداخلي في المعارض والمؤتمرات وبيئات البيع بالتجزئة. للاستخدام الخارجي في ظروف المملكة العربية السعودية، نوصي بنظام استند أكثر متانة مثل بانر مع إطار أو عرض قماش شد خارجي. تواصل مع ويندو للإعلان وسنوصي بالنظام الأنسب لتطبيقك الخارجي.</p>

<h2>اطلب استند البوب أب في الرياض</h2>
<p>أخبرنا بحجم العرض وعدد اللوحات وملخص فعاليتك أو حملتك. سيوصي فريقنا بالنظام الأنسب ويقدم عرض سعر شامل خلال 24 ساعة. التوصيل في جميع أنحاء الرياض مشمول مع كل طلب.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما هو استند البوب أب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "استند البوب أب هو خلفية معرضية محمولة وذاتية التمدد تنطوي بشكل مسطح للنقل وتتمدد بسرعة للتركيب. الهيكل — عادةً عمود ألمنيوم بروابط مغناطيسية أو ضغطية — ينفتح ويُقفل في شكل منحنٍ أو مستقيم، تُثبّت عليه لوحات الرسومات المطبوعة أو غطاء القماش. تُستخدم استندات البوب أب على نطاق واسع في المعارض التجارية والمؤتمرات والفعاليات التجارية."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق تركيب استند البوب أب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يمكن تجميع معظم أنظمة البوب أب بالكامل بواسطة شخص واحد في 5 إلى 15 دقيقة دون أدوات. يتمدد الهيكل ذو النوابض أو المغناطيس ويستقر في مكانه، وتُثبّت لوحات الرسومات عبر الفيلكرو أو الشرائط المغناطيسية أو غطاء الوسادة حسب نوع النظام."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن استبدال الرسومات على استند البوب أب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. هياكل استندات البوب أب قابلة لإعادة الاستخدام ويمكن استبدال لوحات الرسومات المطبوعة بشكل مستقل. هذا يجعل أنظمة البوب أب استثماراً فعالاً من حيث التكلفة على المدى الطويل — تُحدّث الرسومات لحملة أو فعالية جديدة دون استبدال الهيكل. يوفر ويندو للإعلان لوحات رسومات بديلة لأنظمة البوب أب الموجودة."
      }
    },
    {
      "@type": "Question",
      "name": "هل استندات البوب أب مناسبة للاستخدام الخارجي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "استندات البوب أب مصممة بشكل أساسي للاستخدام الداخلي في المعارض والمؤتمرات وبيئات البيع بالتجزئة. للاستخدام الخارجي في ظروف المملكة العربية السعودية، نوصي بنظام استند أكثر متانة مثل بانر مع إطار أو عرض قماش شد خارجي. تواصل مع ويندو للإعلان وسنوصي بالنظام الأنسب لتطبيقك الخارجي."
      }
    }
  ]
}
</script>
HTML;
    }
};
