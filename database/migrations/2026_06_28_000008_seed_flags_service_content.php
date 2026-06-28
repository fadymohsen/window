<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'flags';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/flags.webp',
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
            'title' => 'Flags',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Custom Flag Manufacturing in Riyadh | Advertising Flags Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom flag manufacturing and printing in Riyadh. Window Advertising produces advertising flags, teardrop flags, feather flags, and branded event flags for companies across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'custom flags Riyadh, advertising flags Saudi Arabia, flag manufacturing Riyadh, teardrop flags Saudi Arabia, دعاية وإعلان الرياض, أعلام دعائية الرياض, طباعة أعلام السعودية',
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
            'title' => 'الأعلام',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تصنيع أعلام مخصصة في الرياض | أعلام دعائية السعودية | وينوو للإعلان',
            'meta_description' => 'تصنيع وطباعة أعلام مخصصة في الرياض — أعلام دعائية وأعلام تيردروب وأعلام ريشة وأعلام فعاليات لشركات في المملكة العربية السعودية. دعاية وإعلان الرياض. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'أعلام دعائية الرياض, تصنيع أعلام السعودية, طباعة أعلام الرياض, دعاية وإعلان الرياض, أعلام فعاليات, أعلام تيردروب السعودية',
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
        $service = DB::table('services')->where('slug', 'flags')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Advertising flags are one of the most visible and mobile forms of outdoor branding in Saudi Arabia. They mark your location, define your event perimeter, and carry your brand identity at heights and distances where traditional signs cannot reach. Window Advertising manufactures custom advertising flags for exhibitions, events, retail environments, and corporate campaigns across Riyadh and the Kingdom.</p>

<h2>What Are Advertising Flags?</h2>
<p>Advertising flags are printed fabric flags mounted on poles or frame systems to display brand imagery, logos, messages, or event information. Unlike static signage, flags move with the wind — creating visual dynamism that catches the eye in busy environments. They are used to mark entrances, define event areas, create brand presence along roads, and add height and movement to <a href="/en/services/exhibition-booth-execution">exhibition booths</a>.</p>
<p>In Saudi Arabia's outdoor event and advertising market, flags are deployed at National Day celebrations, Founding Day events, corporate exhibitions, retail store fronts, hospitality venues, and sports events. Window Advertising manufactures flags for all of these applications to the durability standard required by the Saudi climate.</p>

<h2>Types of Flags We Manufacture</h2>
<p>Window Advertising produces the full range of advertising flag formats used in the Saudi market:</p>
<p><strong>Teardrop Flags</strong> are the most popular outdoor advertising flag format — a teardrop-shaped flag mounted on a curved pole that maintains its shape even without wind. They are used extensively at retail frontages, event entrances, and exhibition booth perimeters.</p>
<p><strong>Feather Flags</strong> are tall, narrow flags with a graceful curved profile. Popular for events, openings, and roadside branding where a distinctive silhouette is needed.</p>
<p><strong>Rectangular Pole Flags</strong> are the traditional flag format — a rectangular printed panel mounted on a flagpole. Used for formal branding, national occasions, building facades, and venue perimeter marking.</p>
<p><strong>Table Flags</strong> are small flag sets used for desk displays, reception counters, conference tables, and trade show tables. Available in national flag sets and custom branded formats.</p>
<p><strong>Beach Flags</strong> have a straight profile and are anchored to the ground via a spike base. Widely used at outdoor events, festivals, and roadside campaigns.</p>

<h2>Materials and Print Process</h2>
<p>All Window Advertising flags are printed using dye-sublimation technology on polyester fabric. Dye-sublimation printing infuses color directly into the fabric fibers rather than sitting on the surface — producing vivid, wash-resistant colors that do not peel, crack, or fade as rapidly as surface-applied inks. This process delivers results comparable in vibrancy to our <a href="/en/services/banner-printing-installation">banner printing</a> services.</p>
<p>For outdoor use in Riyadh's climate, we use UV-stabilized polyester fabric that resists color degradation under intense direct sunlight. The fabric is lightweight enough to move attractively in light breeze while being strong enough to withstand higher wind speeds without tearing.</p>
<p>All flag edges are double-stitched for durability, and pole sleeves or attachment systems are reinforced to prevent tearing under tension.</p>

<h2>Flags for Events and National Occasions in Saudi Arabia</h2>
<p>Saudi Arabia's national calendar creates significant demand for themed flags around <a href="/en/services/national-day-celebrations">National Day celebrations</a> in September and <a href="/en/services/founding-day-celebrations">Founding Day celebrations</a> in February. Window Advertising produces themed flag sets for both occasions — incorporating Saudi green and white color schemes, national emblems, and corporate branding into event flag productions for government entities, corporations, and event organizers.</p>
<p>For large events requiring hundreds of flags across a venue or public space, Window Advertising coordinates production and delivery to match the event setup timeline. We have supplied flag sets for corporate events, government celebrations, festival grounds, and commercial outdoor campaigns across Riyadh.</p>

<h2>Pole and Base Systems</h2>
<p>A flag is only as effective as the system it is mounted on. Window Advertising supplies flag pole and base systems suitable for every installation scenario:</p>
<p>Ground spike bases anchor flags directly into soil or sand — ideal for outdoor events and temporary campaigns. Cross base and water-filled base systems provide freestanding stability on hard surfaces like concrete and tile. Wall-mount brackets allow flags to be fixed permanently to building facades. Vehicle-mount bases allow flags to be attached to vehicle exteriors for parade or mobile advertising. Flagpole systems for permanent installations range from 3-meter portable poles to heavy-duty 6-meter flagpoles for building exteriors. For complementary freestanding solutions, explore our <a href="/en/services/display-stands">display stands</a>.</p>

<h2>Flag Manufacturing Portfolio — Riyadh</h2>
<p>Our flag manufacturing portfolio includes advertising flag campaigns, event flag sets, exhibition booth flags, and national occasion flag productions across Riyadh and Saudi Arabia. Browse the gallery to see the range of flag formats and applications delivered by Window Advertising.</p>

<h2>Frequently Asked Questions About Custom Flags</h2>

<h3>What types of advertising flags does Window Advertising produce?</h3>
<p>Window Advertising manufactures teardrop flags, feather flags, rectangular flags on poles, table top flags, beach flags, and custom-shaped flags. All flags are printed using dye-sublimation on polyester fabric with UV-resistant inks for outdoor durability in Saudi Arabia's climate.</p>

<h3>Are advertising flags suitable for outdoor use in Riyadh?</h3>
<p>Yes. Window Advertising uses outdoor-grade polyester fabric and dye-sublimation printing that withstands Saudi Arabia's heat, UV exposure, and wind. Our flag poles and base systems are selected for stability in outdoor conditions. Flags used continuously outdoors may need replacing after 6 to 12 months depending on exposure.</p>

<h3>Can flags be double-sided?</h3>
<p>Yes. Window Advertising produces double-sided flags where each side carries its own printed graphic. Double-sided flags are manufactured using two separately printed flag panels joined with a blocking layer to prevent show-through. They are commonly used for street and event flagpole applications.</p>

<h3>What is the minimum order for custom flags?</h3>
<p>Minimum orders vary by flag type. Most advertising flag formats have a minimum order of 10 to 20 units. For large events and nationwide campaigns, Window Advertising handles bulk orders of hundreds of flags with consistent print quality across every unit.</p>

<h2>Order Custom Advertising Flags in Riyadh</h2>
<p>Tell us the flag type, size, quantity, and your event or installation date. Our team will confirm pricing and production timeline within 24 hours. Pole and base systems are available as part of the complete package.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of advertising flags does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising manufactures teardrop flags, feather flags, rectangular flags on poles, table top flags, beach flags, and custom-shaped flags. All flags are printed using dye-sublimation on polyester fabric with UV-resistant inks for outdoor durability in Saudi Arabia's climate."
      }
    },
    {
      "@type": "Question",
      "name": "Are advertising flags suitable for outdoor use in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising uses outdoor-grade polyester fabric and dye-sublimation printing that withstands Saudi Arabia's heat, UV exposure, and wind. Our flag poles and base systems are selected for stability in outdoor conditions. Flags used continuously outdoors may need replacing after 6 to 12 months depending on exposure."
      }
    },
    {
      "@type": "Question",
      "name": "Can flags be double-sided?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising produces double-sided flags where each side carries its own printed graphic. Double-sided flags are manufactured using two separately printed flag panels joined with a blocking layer to prevent show-through. They are commonly used for street and event flagpole applications."
      }
    },
    {
      "@type": "Question",
      "name": "What is the minimum order for custom flags?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Minimum orders vary by flag type. Most advertising flag formats have a minimum order of 10 to 20 units. For large events and nationwide campaigns, Window Advertising handles bulk orders of hundreds of flags with consistent print quality across every unit."
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
<p>تُعد الأعلام الدعائية من أكثر أشكال العلامات التجارية الخارجية وضوحاً وحركةً في المملكة العربية السعودية. فهي تحدد موقعك، وترسم محيط فعاليتك، وتحمل هوية علامتك التجارية على ارتفاعات ومسافات لا تصل إليها اللافتات التقليدية. تصنّع وينوو للإعلان أعلاماً دعائية مخصصة للمعارض والفعاليات وبيئات البيع بالتجزئة والحملات المؤسسية في جميع أنحاء الرياض والمملكة.</p>

<h2>ما هي الأعلام الدعائية؟</h2>
<p>الأعلام الدعائية هي أعلام قماشية مطبوعة تُثبت على أعمدة أو أنظمة إطارات لعرض صور العلامة التجارية والشعارات والرسائل أو معلومات الفعاليات. على عكس اللافتات الثابتة، تتحرك الأعلام مع الرياح — مما يخلق ديناميكية بصرية تلفت الأنظار في البيئات المزدحمة. تُستخدم لتحديد المداخل وتعريف مناطق الفعاليات وإنشاء حضور للعلامة التجارية على الطرق وإضافة ارتفاع وحركة إلى <a href="/ar/services/exhibition-booth-execution">أجنحة المعارض</a>.</p>
<p>في سوق الفعاليات والإعلانات الخارجية في المملكة العربية السعودية، تُنشر الأعلام في احتفالات اليوم الوطني وفعاليات يوم التأسيس والمعارض المؤسسية وواجهات المتاجر والأماكن الضيافية والفعاليات الرياضية. تصنّع وينوو للإعلان أعلاماً لجميع هذه التطبيقات وفق معايير المتانة التي يتطلبها المناخ السعودي.</p>

<h2>أنواع الأعلام التي نصنعها</h2>
<p>تنتج وينوو للإعلان المجموعة الكاملة من صيغ الأعلام الدعائية المستخدمة في السوق السعودي:</p>
<p><strong>أعلام تيردروب (القطرة)</strong> هي الصيغة الأكثر شيوعاً للأعلام الدعائية الخارجية — علم بشكل القطرة مثبت على عمود منحنٍ يحافظ على شكله حتى بدون رياح. تُستخدم بكثرة في واجهات المتاجر ومداخل الفعاليات ومحيط أجنحة المعارض.</p>
<p><strong>أعلام الريشة</strong> هي أعلام طويلة وضيقة ذات شكل منحنٍ أنيق. شائعة في الفعاليات والافتتاحات والعلامات التجارية على جوانب الطرق حيث يُحتاج إلى صورة ظلية مميزة.</p>
<p><strong>أعلام الأعمدة المستطيلة</strong> هي صيغة العلم التقليدية — لوح مطبوع مستطيل مثبت على سارية علم. تُستخدم للعلامات التجارية الرسمية والمناسبات الوطنية وواجهات المباني وتحديد محيط الأماكن.</p>
<p><strong>أعلام الطاولة</strong> هي مجموعات أعلام صغيرة تُستخدم لعروض المكاتب وكاونترات الاستقبال وطاولات المؤتمرات وطاولات المعارض التجارية. متوفرة بمجموعات أعلام وطنية وصيغ مخصصة بالعلامة التجارية.</p>
<p><strong>أعلام الشاطئ</strong> ذات شكل مستقيم وتُثبت في الأرض عبر قاعدة مسمار. تُستخدم على نطاق واسع في الفعاليات الخارجية والمهرجانات والحملات على جوانب الطرق.</p>

<h2>المواد وعملية الطباعة</h2>
<p>تُطبع جميع أعلام وينوو للإعلان باستخدام تقنية الطباعة بالتسامي الحراري على قماش البوليستر. تدمج طباعة التسامي الحراري اللون مباشرةً في ألياف القماش بدلاً من البقاء على السطح — مما ينتج ألواناً زاهية ومقاومة للغسيل لا تتقشر أو تتشقق أو تبهت بسرعة كالأحبار المطبقة سطحياً. تقدم هذه العملية نتائج مماثلة في الحيوية لخدمات <a href="/ar/services/banner-printing-installation">طباعة البانرات</a> لدينا.</p>
<p>للاستخدام الخارجي في مناخ الرياض، نستخدم قماش بوليستر مثبت ضد الأشعة فوق البنفسجية يقاوم تدهور الألوان تحت أشعة الشمس المباشرة الشديدة. القماش خفيف بما يكفي للتحرك بشكل جذاب في النسيم الخفيف مع كونه قوياً بما يكفي لتحمل سرعات الرياح العالية دون تمزق.</p>
<p>جميع حواف الأعلام مخيطة بخياطة مزدوجة للمتانة، وأكمام الأعمدة أو أنظمة التثبيت معززة لمنع التمزق تحت الشد.</p>

<h2>أعلام الفعاليات والمناسبات الوطنية في السعودية</h2>
<p>يخلق التقويم الوطني السعودي طلباً كبيراً على الأعلام ذات الطابع الخاص حول <a href="/ar/services/national-day-celebrations">احتفالات اليوم الوطني</a> في سبتمبر و<a href="/ar/services/founding-day-celebrations">احتفالات يوم التأسيس</a> في فبراير. تنتج وينوو للإعلان مجموعات أعلام لكلتا المناسبتين — مدمجةً أنظمة الألوان السعودية الأخضر والأبيض والشعارات الوطنية والعلامات التجارية المؤسسية في إنتاج أعلام الفعاليات للجهات الحكومية والشركات ومنظمي الفعاليات.</p>
<p>للفعاليات الكبيرة التي تتطلب مئات الأعلام عبر مكان أو فضاء عام، تنسق وينوو للإعلان الإنتاج والتسليم ليتوافق مع جدول تجهيز الفعالية. لقد زوّدنا مجموعات أعلام لفعاليات مؤسسية واحتفالات حكومية وأراضي مهرجانات وحملات خارجية تجارية في أنحاء الرياض.</p>

<h2>أنظمة الأعمدة والقواعد</h2>
<p>لا يكون العلم فعالاً إلا بقدر فعالية النظام المثبت عليه. توفر وينوو للإعلان أنظمة أعمدة وقواعد أعلام مناسبة لكل سيناريو تركيب:</p>
<p>قواعد المسامير الأرضية تثبت الأعلام مباشرةً في التربة أو الرمل — مثالية للفعاليات الخارجية والحملات المؤقتة. أنظمة القواعد المتقاطعة والمملوءة بالماء توفر ثباتاً قائماً بذاته على الأسطح الصلبة كالخرسانة والبلاط. حوامل الحائط تسمح بتثبيت الأعلام بشكل دائم على واجهات المباني. قواعد تثبيت المركبات تسمح بربط الأعلام بأسطح المركبات الخارجية للمسيرات أو الإعلان المتنقل. أنظمة السواري للتركيبات الدائمة تتراوح من أعمدة محمولة بطول 3 أمتار إلى سواري شديدة التحمل بطول 6 أمتار لواجهات المباني. للحلول القائمة التكميلية، استعرض <a href="/ar/services/display-stands">ستاندات العرض</a> لدينا.</p>

<h2>أعمالنا في تصنيع الأعلام بالرياض</h2>
<p>تشمل محفظة أعمالنا في تصنيع الأعلام حملات الأعلام الدعائية ومجموعات أعلام الفعاليات وأعلام أجنحة المعارض وإنتاج أعلام المناسبات الوطنية في الرياض والمملكة العربية السعودية. تصفح المعرض لرؤية مجموعة صيغ الأعلام والتطبيقات التي تقدمها وينوو للإعلان.</p>

<h2>الأسئلة الشائعة حول الأعلام المخصصة</h2>

<h3>ما أنواع الأعلام الدعائية التي تنتجها وينوو للإعلان؟</h3>
<p>تصنّع وينوو للإعلان أعلام تيردروب وأعلام ريشة وأعلام مستطيلة على أعمدة وأعلام طاولة وأعلام شاطئ وأعلام بأشكال مخصصة. تُطبع جميع الأعلام باستخدام التسامي الحراري على قماش البوليستر بأحبار مقاومة للأشعة فوق البنفسجية لضمان المتانة الخارجية في مناخ المملكة العربية السعودية.</p>

<h3>هل الأعلام الدعائية مناسبة للاستخدام الخارجي في الرياض؟</h3>
<p>نعم. تستخدم وينوو للإعلان قماش بوليستر مخصص للاستخدام الخارجي وطباعة بالتسامي الحراري تتحمل حرارة المملكة العربية السعودية والتعرض للأشعة فوق البنفسجية والرياح. يتم اختيار أعمدة وأنظمة قواعد الأعلام لدينا لضمان الثبات في الظروف الخارجية. قد تحتاج الأعلام المستخدمة باستمرار في الخارج إلى الاستبدال بعد 6 إلى 12 شهراً حسب التعرض.</p>

<h3>هل يمكن أن تكون الأعلام مزدوجة الوجه؟</h3>
<p>نعم. تنتج وينوو للإعلان أعلاماً مزدوجة الوجه حيث يحمل كل جانب رسمه المطبوع الخاص. تُصنع الأعلام مزدوجة الوجه باستخدام لوحين من الأعلام مطبوعين بشكل منفصل ومتصلين بطبقة حجب لمنع الظهور من الجهة الأخرى. تُستخدم عادةً في تطبيقات سواري الشوارع والفعاليات.</p>

<h3>ما هو الحد الأدنى لطلب الأعلام المخصصة؟</h3>
<p>يختلف الحد الأدنى للطلب حسب نوع العلم. معظم صيغ الأعلام الدعائية لها حد أدنى للطلب من 10 إلى 20 وحدة. للفعاليات الكبيرة والحملات على مستوى المملكة، تتولى وينوو للإعلان طلبات بالجملة لمئات الأعلام بجودة طباعة متسقة في كل وحدة.</p>

<h2>اطلب أعلامك الدعائية المخصصة في الرياض</h2>
<p>أخبرنا بنوع العلم والحجم والكمية وتاريخ فعاليتك أو التركيب. سيؤكد فريقنا التسعير والجدول الزمني للإنتاج خلال 24 ساعة. أنظمة الأعمدة والقواعد متوفرة كجزء من الباقة الكاملة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الأعلام الدعائية التي تنتجها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تصنّع وينوو للإعلان أعلام تيردروب وأعلام ريشة وأعلام مستطيلة على أعمدة وأعلام طاولة وأعلام شاطئ وأعلام بأشكال مخصصة. تُطبع جميع الأعلام باستخدام التسامي الحراري على قماش البوليستر بأحبار مقاومة للأشعة فوق البنفسجية لضمان المتانة الخارجية في مناخ المملكة العربية السعودية."
      }
    },
    {
      "@type": "Question",
      "name": "هل الأعلام الدعائية مناسبة للاستخدام الخارجي في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تستخدم وينوو للإعلان قماش بوليستر مخصص للاستخدام الخارجي وطباعة بالتسامي الحراري تتحمل حرارة المملكة العربية السعودية والتعرض للأشعة فوق البنفسجية والرياح. يتم اختيار أعمدة وأنظمة قواعد الأعلام لدينا لضمان الثبات في الظروف الخارجية. قد تحتاج الأعلام المستخدمة باستمرار في الخارج إلى الاستبدال بعد 6 إلى 12 شهراً حسب التعرض."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن أن تكون الأعلام مزدوجة الوجه؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تنتج وينوو للإعلان أعلاماً مزدوجة الوجه حيث يحمل كل جانب رسمه المطبوع الخاص. تُصنع الأعلام مزدوجة الوجه باستخدام لوحين من الأعلام مطبوعين بشكل منفصل ومتصلين بطبقة حجب لمنع الظهور من الجهة الأخرى. تُستخدم عادةً في تطبيقات سواري الشوارع والفعاليات."
      }
    },
    {
      "@type": "Question",
      "name": "ما هو الحد الأدنى لطلب الأعلام المخصصة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يختلف الحد الأدنى للطلب حسب نوع العلم. معظم صيغ الأعلام الدعائية لها حد أدنى للطلب من 10 إلى 20 وحدة. للفعاليات الكبيرة والحملات على مستوى المملكة، تتولى وينوو للإعلان طلبات بالجملة لمئات الأعلام بجودة طباعة متسقة في كل وحدة."
      }
    }
  ]
}
</script>
HTML;
    }
};
