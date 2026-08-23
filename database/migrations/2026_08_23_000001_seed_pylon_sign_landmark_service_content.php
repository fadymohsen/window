<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'pylon-sign-landmark';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/pylon-sign-landmark.webp',
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
            'title' => 'Pylon Sign & Landmark',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Pylon Sign & Landmark Sign Riyadh | Outdoor Signage Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom pylon signs and landmark signs in Riyadh. Window Advertising designs, manufactures, and installs pylon signage and landmark signs for corporate headquarters, real estate, malls, hospitals, and more. 25+ years of experience in Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'pylon sign Riyadh, landmark sign Saudi Arabia, monument sign Riyadh, freestanding sign Riyadh, outdoor signage Riyadh, دعاية واعلان الرياض, بايلون الرياض, لاند مارك السعودية, لوحات خارجية الرياض',
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
            'title' => 'لوحات بايلون ولاند مارك',
            'content' => $this->getArabicContent(),
            'meta_title' => 'بايلون ولاند مارك الرياض | لوحات خارجية السعودية | ويندو للدعاية والإعلان',
            'meta_description' => 'لوحات بايلون ولاند مارك في الرياض — ويندو للدعاية والإعلان يصمم وينتج ويركب البايلون والـLandmark للشركات والمشاريع العقارية والمولات والمستشفيات وغيرها. أكثر من 25 عامًا من الخبرة في الدعاية والإعلان. احصل على عرض سعر.',
            'meta_keywords' => 'بايلون الرياض, لاند مارك السعودية, لوحات خارجية الرياض, بايلون سعودية, دعاية واعلان الرياض, Pylon Sign Riyadh, Monument Sign Saudi Arabia, لوحات إعلانية الرياض',
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
        $service = DB::table('services')->where('slug', 'pylon-sign-landmark')->first();
        if ($service) {
            DB::table('service_translations')->where('service_id', $service->id)->delete();
            DB::table('services')->where('id', $service->id)->delete();
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A project's first impression begins before the client walks through the door — it starts at the gate, the facade, and the way the project name appears from the street. Pylon Signs and Landmark Signs are advanced outdoor identity and advertising solutions that combine design, engineering, fabrication, and lighting to give companies, projects, and institutions a powerful and distinctive visual presence.</p>

<p>At Window Advertising in Riyadh, we do not treat pylon signs and landmark signs as simple boards carrying a name. We work to transform them into a distinctive visual landmark that identifies the place, attracts attention, and reflects the identity and value of the project. With over 25 years of experience in advertising, signage, and execution, we deliver integrated solutions — from concept and design through fabrication, material selection, and on-site installation.</p>

<h2>What Is a Pylon Sign?</h2>
<p>A Pylon Sign is a self-standing advertising or identification sign, typically elevated for clear visibility from a distance. Pylons are used at the entrances of companies, real estate developments, commercial complexes, hotels, hospitals, factories, industrial zones, universities, and major destinations.</p>
<p>They can be designed in many forms and sizes — from a simple, elegant identification panel to a large multi-face, multi-level structure — and may include the project name, logo, identification elements, and lighting. A pylon simultaneously functions as identification, wayfinding, advertising, and a visual identity builder.</p>
<p>Pylon signs are also known by several names depending on the country and format: Monument Sign, Freestanding Sign, Entrance Sign, Totem Sign, and Directory Pylon. These terms can all be used when searching for this type of outdoor signage.</p>

<h2>What Is a Landmark Sign?</h2>
<p>A Landmark Sign is a distinctive visual marker designed to become part of the project's identity and overall appearance. Unlike a traditional sign board, a landmark can be an integrated architectural and advertising composition combining metal structures, cladding, dimensional letters, lighting, and various materials.</p>
<p>It is typically positioned at a strategic point or at the project entrance so that it becomes a clear reference point by which visitors recognize the location. Over time, a landmark may become part of the project's memory and visual image — simply seeing the design can be enough to identify the place or brand.</p>

<h2>Design First — Then Fabrication</h2>
<p>A distinctive sign does not begin on a fabrication machine — it begins with a considered idea. At Window Advertising we study the project identity, site characteristics, sign dimensions, viewing distance, and the direction of vehicle and pedestrian traffic. We then translate these inputs into a design that combines creativity, elegance, clarity, visual impact, and brand recognition. The goal is a result that does not look like a conventional sign, but rather like an integral part of the project's architecture and visual identity.</p>

<h2>Materials and Finishes</h2>
<p>Selecting the right materials is among the most important factors in the success of a pylon or landmark sign. Multiple materials and techniques can be combined to achieve the desired final appearance.</p>

<p>Steel sections and metal structures are used to fabricate the internal frame of pylons and landmark signs, especially for large and tall works. Section sizes and fabrication methods are determined according to the design dimensions, project requirements, loads, and site conditions.</p>

<p>Cladding is applied to cover structures and exterior surfaces, giving the sign a modern, elegant appearance with the ability to select colors and finishes that align with the project's visual identity. Cladding can be shaped, cut, and prepared to match the required design.</p>

<p>CNC cutting and engraving enables precise execution of cuts, engravings, perforations, logos, geometric forms, decorative elements, and light apertures. CNC can be combined with cladding, acrylic, and stainless steel to produce precise and distinctive designs that add an element of visual impact to the sign.</p>

<p>Acrylic is used in letters, logos, and illuminated faces, and can be combined with internal LED lighting to achieve a clear and attractive visual effect. A popular premium finish combines acrylic with a gold or silver stainless steel face, producing a luxurious, contemporary appearance.</p>

<p>Stainless steel can be used for letters, logos, and decorative elements, with various finish options: gold, silver, mirror, and brushed. Combined with acrylic and internal lighting, it presents letters and logos in a more refined, premium manner.</p>

<h2>Lighting — When the Brand Continues After Sunset</h2>
<p>Lighting is a core element in many pylon and landmark sign designs. Internal LED lighting can be applied to letters or sign faces, with the option of front, back, or halo lighting depending on the design. When lighting is combined with acrylic, stainless steel, or cladding, distinctive visual effects are achievable that make the sign clear and prominent during nighttime hours. The landmark transitions from a daytime identification element into an illuminated visual presence that works around the clock.</p>

<h2>Fabrication and Installation Process</h2>
<p>Execution passes through several integrated stages: site study covering the sign's location, area, viewing directions, and surrounding factors; concept and design development aligned with the project identity; steel frame fabrication and preparation of fixing points and cladding; application of cladding, aluminum, acrylic, or stainless steel per design; fabrication of dimensional letters and logos in the appropriate materials with integrated lighting; CNC cutting, engraving, and fine detail work; LED installation within letters or across the sign face for uniform illumination; and final assembly, preparation for transport, and on-site installation.</p>

<p>Large and tall signs require an appropriate anchoring system. The standard method uses a concrete foundation with steel flanges and anchor bolts. The concrete base is prepared to match the sign design and site requirements, the steel flanges are fixed, and the frame is secured with anchor bolts before the cladding, letters, and lighting are installed. Base dimensions, flange specifications, and anchor bolt quantities vary per project depending on sign size, height, loads, site conditions, and applicable engineering requirements.</p>

<h2>Where Are Pylon and Landmark Signs Used?</h2>
<p>These solutions serve a wide range of sectors and project types: corporate headquarters and main offices, real estate developments, residential compounds, shopping malls and commercial complexes, hotels and resorts, hospitals and medical centers, factories and industrial zones, universities and schools, administrative centers and government projects, exhibitions and entertainment destinations, tourism projects, fuel stations, and primary entrances to major developments.</p>

<h2>Frequently Asked Questions About Pylon & Landmark Signs</h2>

<h3>What is the difference between a pylon sign and a landmark sign?</h3>
<p>A pylon sign is a freestanding elevated sign used primarily for identification and visibility from a distance. A landmark sign is a broader concept — it is an architectural and advertising composition designed to become an iconic visual marker for the project, often combining structural, decorative, and lighting elements in a more elaborate format than a standard pylon.</p>

<h3>What materials are used in pylon and landmark sign fabrication?</h3>
<p>Window Advertising works with steel structural sections, aluminum cladding, acrylic panels, stainless steel (mirror, brushed, gold, silver), CNC-cut elements, and integrated LED lighting systems. Materials are selected and combined based on the design, environment, and desired finish.</p>

<h3>Do you handle both design and installation?</h3>
<p>Yes. Window Advertising provides a fully integrated service covering concept design, material selection, steel frame fabrication, cladding and letter production, CNC work, LED lighting, concrete foundation preparation, and on-site installation. Everything from the idea to the finished landmark.</p>

<h3>How long does fabrication and installation take?</h3>
<p>Timeline depends on the sign's size, complexity, and site conditions. Standard pylon signs typically take 2 to 4 weeks from approved design to installation. Large or complex landmark signs with custom architectural elements may require additional time. A site visit and design brief allow us to provide a precise project schedule.</p>

<h2>Get a Pylon Sign or Landmark Sign Quote in Riyadh</h2>
<p>Tell us about your project, the intended location, approximate dimensions, and your visual identity requirements. Our team visits the site, studies the environment, and provides a full design and pricing proposal — covering fabrication, materials, lighting, foundation, and installation.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is the difference between a pylon sign and a landmark sign?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A pylon sign is a freestanding elevated sign used primarily for identification and visibility from a distance. A landmark sign is a broader concept — an architectural and advertising composition designed to become an iconic visual marker for the project, often combining structural, decorative, and lighting elements in a more elaborate format than a standard pylon."
      }
    },
    {
      "@type": "Question",
      "name": "What materials are used in pylon and landmark sign fabrication?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising works with steel structural sections, aluminum cladding, acrylic panels, stainless steel (mirror, brushed, gold, silver), CNC-cut elements, and integrated LED lighting systems. Materials are selected and combined based on the design, environment, and desired finish."
      }
    },
    {
      "@type": "Question",
      "name": "Do you handle both design and installation?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising provides a fully integrated service covering concept design, material selection, steel frame fabrication, cladding and letter production, CNC work, LED lighting, concrete foundation preparation, and on-site installation."
      }
    },
    {
      "@type": "Question",
      "name": "How long does fabrication and installation take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard pylon signs typically take 2 to 4 weeks from approved design to installation. Large or complex landmark signs may require additional time. A site visit and design brief allow us to provide a precise project schedule."
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
<p>في المشاريع الكبرى، الانطباع الأول يبدأ قبل دخول العميل إلى المكان؛ من البوابة، والواجهة، وطريقة ظهور اسم المشروع. وهنا يأتي دور Pylon Sign والـLandmark Sign كحلول متقدمة في الهوية والإعلان الخارجي، تجمع بين التصميم والهندسة والتصنيع والإضاءة، لتمنح الشركات والمشاريع والجهات حضورًا بصريًا قويًا ومميزًا.</p>

<p>في وكالة ويندو للدعاية والإعلان بالرياض لا نتعامل مع البايلون والـLandmark باعتبارهما مجرد لوحات تحمل اسمًا، بل نعمل على تحويلهما إلى علامة بصرية مميزة تعرّف بالمكان، تجذب الانتباه، وتعكس هوية وقيمة المشروع. بخبرة تتجاوز 25 عامًا في مجال الدعاية والإعلان والتنفيذ، نقدم حلولًا متكاملة تبدأ من الفكرة والتصميم، مرورًا بالتصنيع واختيار الخامات، وصولًا إلى التركيب والتنفيذ في الموقع.</p>

<h2>ما هو الـPylon Sign – البايلون؟</h2>
<p>Pylon Sign – بايلون هو لوحة إعلانية أو تعريفية قائمة بذاتها، غالبًا ما تكون مرتفعة وذات حضور واضح من مسافات بعيدة. يُستخدم البايلون في مداخل الشركات والمشاريع العقارية والمجمعات التجارية والفنادق والمستشفيات والمصانع والمناطق الصناعية والجامعات والوجهات الكبرى وغيرها.</p>
<p>ويمكن تصميمه بأشكال وأحجام متعددة، من لوحة تعريفية بسيطة وأنيقة إلى تصميم كبير متعدد الأوجه والمستويات، وقد يتضمن اسم المشروع والشعار والعناصر التعريفية والإضاءة. ويتميز البايلون بأنه يعمل في الوقت نفسه كوسيلة تعريف وإرشاد وإعلان وبناء للهوية البصرية.</p>
<p>يُعرف البايلون في بعض الدول والأسواق بمصطلحات مختلفة منها: Monument Sign، وFreestanding Sign، وEntrance Sign، وTotem Sign، وDirectory Pylon. ولا تعني هذه المصطلحات بالضرورة نفس الشكل؛ فالاسم المستخدم يعتمد على تصميم اللوحة وحجمها وطريقة استخدامها.</p>

<h2>ما هو الـLandmark Sign – لاند مارك؟</h2>
<p>Landmark Sign – لاند مارك هو معلم أو علامة بصرية مميزة يتم تصميمها لتكون جزءًا من هوية المشروع ومظهره العام. والـLandmark يختلف عن اللوحة التقليدية؛ لأنه يمكن أن يكون تكوينًا هندسيًا أو معماريًا وإعلانيًا متكاملًا يجمع بين الهيكل المعدني والكسوة والحروف المجسمة والإضاءة والخامات المختلفة.</p>
<p>وغالبًا يتم وضعه في موقع استراتيجي أو عند مدخل المشروع، بحيث يصبح نقطة واضحة يمكن للزائر التعرف على المكان من خلالها. وقد يتحول الـLandmark مع الوقت إلى جزء من ذاكرة المشروع وصورته البصرية؛ فمجرد رؤية التصميم قد تكون كافية للتعرف على المكان أو العلامة التجارية.</p>

<h2>التصميم أولًا… ثم يأتي التصنيع</h2>
<p>اللوحة المميزة لا تبدأ من ماكينة التصنيع، بل تبدأ من فكرة مدروسة. في وكالة ويندو نعمل على دراسة هوية المشروع وطبيعة الموقع وحجم اللوحة ومسافة الرؤية واتجاه حركة السيارات والمشاة، ثم نحول هذه المعطيات إلى تصميم يجمع بين الإبداع والفخامة والوضوح والقوة البصرية وسهولة التعرف على العلامة التجارية. والهدف هو الوصول إلى تصميم لا يبدو كلوحة تقليدية، وإنما كجزء من العمارة والهوية البصرية للمشروع.</p>

<h2>خامات متعددة… وتصميم بلا حدود</h2>
<p>من أهم عوامل نجاح الـPylon والـLandmark اختيار الخامات المناسبة، لذلك يمكن دمج أكثر من خامة وتقنية للحصول على الشكل النهائي المطلوب.</p>

<p>يُستخدم الحديد والقطاعات المعدنية في تصنيع الهيكل الداخلي للبايلون والـLandmark، خصوصًا في الأعمال الكبيرة والمرتفعة. ويتم تحديد القطاعات وطريقة التصنيع وفق أبعاد التصميم ومتطلبات المشروع والأحمال وظروف الموقع.</p>

<p>يُستخدم الكلادينج في كسوة الهياكل والواجهات الخارجية، ويمنح اللوحة مظهرًا عصريًا وأنيقًا، مع إمكانية اختيار الألوان والتشطيبات بما يتناسب مع الهوية البصرية للمشروع. ويمكن تشكيل الكلادينج وقصه وتجهيزه وفق التصميم المطلوب.</p>

<p>تتيح تقنية CNC تنفيذ القص والحفر والتفريغ بدقة عالية، ويمكن استخدامها في الشعارات والأشكال الهندسية والزخارف والفتحات الخاصة بالإضاءة. كما يمكن دمج الـCNC مع الكلادينج والأكريليك والاستانلس ستيل لإنتاج تصميمات دقيقة ومميزة.</p>

<p>يُستخدم الأكريليك في الحروف والشعارات والواجهات المضيئة، ويمكن دمجه مع الإضاءة الداخلية للحصول على تأثير بصري واضح وجذاب. ومن الحلول الجمالية المميزة استخدام الأكريليك مع وجه من الاستانلس ستيل الذهبي أو الفضي، ليظهر التصميم بمظهر فاخر وعصري.</p>

<p>يمكن استخدام الاستانلس ستيل في الحروف والشعارات والعناصر الديكورية، مع إمكانية تنفيذ تشطيبات مختلفة مثل الذهبي والفضي والـMirror والـBrushed. ويمكن دمجه مع الأكريليك والإضاءة الداخلية لإظهار الحروف والشعارات بطريقة أكثر فخامة.</p>

<h2>الإضاءة… عندما يستمر حضور العلامة بعد غروب الشمس</h2>
<p>الإضاءة عنصر أساسي في كثير من تصاميم الـPylon والـLandmark. يمكن استخدام إضاءة LED داخلية في الحروف أو الواجهات، مع إمكانية تنفيذ إضاءة أمامية أو خلفية أو Halo Lighting حسب طبيعة التصميم. وعند دمج الإضاءة مع الأكريليك أو الاستانلس أو الكلادينج، يمكن الوصول إلى تأثيرات بصرية مميزة تجعل اللوحة واضحة وبارزة خلال ساعات الليل. وهنا يتحول الـLandmark من عنصر تعريفي نهاري إلى عنصر بصري مضيء يعمل على مدار اليوم.</p>

<h2>كيف يتم تصنيع وتنفيذ الـPylon والـLandmark؟</h2>
<p>تمر عملية التنفيذ بعدة مراحل متكاملة: دراسة موقع اللوحة ومساحته واتجاهات الرؤية وحركة السيارات والمشاة والعوامل المحيطة؛ ثم تطوير التصميم بما يتناسب مع هوية المشروع مع تحديد الأبعاد والخامات والحروف والإضاءة والتفاصيل الجمالية؛ فتصنيع الهيكل المعدني والقطاعات وتجهيز نقاط التثبيت والكسوة؛ ثم تركيب الكلادينج أو الألمنيوم أو الأكريليك أو الاستانلس ستيل وغيرها من الخامات؛ وتنفيذ الحروف المجسمة والشعارات مع دمج الأكريليك والاستانلس والإضاءة؛ وتنفيذ أعمال القص والحفر والتفريغ بتقنية CNC؛ وتوزيع وحدات LED داخل الحروف أو اللوحة؛ وأخيرًا التجميع والتجهيز للنقل والتركيب في الموقع.</p>

<p>اللوحات الكبيرة والمرتفعة تحتاج إلى نظام تثبيت مناسب. من طرق التثبيت المستخدمة: قاعدة خرسانية مع فلانشات معدنية ومسامير Anchor Bolts. يتم تجهيز القاعدة الخرسانية بما يتناسب مع تصميم اللوحة ومتطلبات الموقع، ثم تثبيت الفلانشات المعدنية وربط الهيكل باستخدام مسامير الـAnchor Bolts، وبعدها يتم تركيب الهيكل والكسوة والحروف والإضاءة. وتختلف أبعاد القاعدة ومقاسات الفلانشات وعدد ومقاسات الـAnchor Bolts من مشروع إلى آخر حسب حجم وارتفاع اللوحة والأحمال وظروف الموقع.</p>

<h2>أين تستخدم لوحات البايلون والـLandmark؟</h2>
<p>تُستخدم هذه الحلول في العديد من القطاعات والمشاريع، منها: الشركات والمقرات الرئيسية، والمشاريع العقارية، والمجمعات السكنية، والمولات والمجمعات التجارية، والفنادق والمنتجعات، والمستشفيات والمراكز الطبية، والمصانع والمناطق الصناعية، والجامعات والمدارس، والمراكز والمجمعات الإدارية، والجهات والمشاريع الحكومية، والمعارض والوجهات الترفيهية، والمشاريع السياحية، ومحطات الوقود، والمداخل الرئيسية للمشاريع الكبرى.</p>

<h2>الأسئلة الشائعة حول البايلون والـLandmark</h2>

<h3>ما الفرق بين البايلون والـLandmark؟</h3>
<p>البايلون هو لوحة قائمة مرتفعة تُستخدم أساسًا للتعريف والرؤية من مسافة بعيدة. أما الـLandmark فهو مفهوم أشمل — تكوين معماري وإعلاني متكامل يُصمم ليكون علامة بصرية مميزة للمشروع، يجمع في الغالب بين عناصر هيكلية وديكورية وإضاءة بشكل أكثر تفصيلًا من البايلون التقليدي.</p>

<h3>ما الخامات المستخدمة في تصنيع البايلون والـLandmark؟</h3>
<p>تعمل ويندو للدعاية والإعلان مع قطاعات الحديد الهيكلية، وكلادينج الألمنيوم، ولوحات الأكريليك، والاستانلس ستيل بتشطيبات متعددة (Mirror وBrushed وذهبي وفضي)، وعناصر CNC، وأنظمة إضاءة LED متكاملة. يتم اختيار الخامات ودمجها بحسب التصميم والبيئة والمظهر المطلوب.</p>

<h3>هل تتولون التصميم والتركيب معًا؟</h3>
<p>نعم. تقدم ويندو للدعاية والإعلان خدمة متكاملة تشمل التصميم المفاهيمي واختيار الخامات وتصنيع الهيكل المعدني وإنتاج الكسوة والحروف وأعمال CNC وتركيب إضاءة LED وتجهيز القاعدة الخرسانية والتركيب في الموقع. من الفكرة إلى المعلم.</p>

<h3>كم يستغرق التصنيع والتركيب؟</h3>
<p>تعتمد المدة على حجم اللوحة وتعقيدها وظروف الموقع. تستغرق لوحات البايلون القياسية عادةً من أسبوعين إلى 4 أسابيع من التصميم المعتمد حتى التركيب. أما لوحات الـLandmark الكبيرة أو ذات العناصر المعمارية المخصصة فقد تحتاج إلى وقت إضافي. تتيح زيارة الموقع وموجز التصميم تقديم جدول زمني دقيق للمشروع.</p>

<h2>احصل على عرض سعر للبايلون أو الـLandmark في الرياض</h2>
<p>أخبرنا عن مشروعك وموقعه المقصود والأبعاد التقريبية ومتطلبات هويتك البصرية. يقوم فريقنا بزيارة الموقع ودراسة البيئة المحيطة وتقديم تصميم متكامل وعرض تسعير شامل — يغطي التصنيع والخامات والإضاءة والأساس والتركيب.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما الفرق بين البايلون والـLandmark؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "البايلون هو لوحة قائمة مرتفعة تُستخدم أساسًا للتعريف والرؤية من مسافة بعيدة. أما الـLandmark فهو مفهوم أشمل — تكوين معماري وإعلاني متكامل يُصمم ليكون علامة بصرية مميزة للمشروع، يجمع في الغالب بين عناصر هيكلية وديكورية وإضاءة بشكل أكثر تفصيلًا من البايلون التقليدي."
      }
    },
    {
      "@type": "Question",
      "name": "ما الخامات المستخدمة في تصنيع البايلون والـLandmark؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تعمل ويندو للدعاية والإعلان مع قطاعات الحديد الهيكلية وكلادينج الألمنيوم ولوحات الأكريليك والاستانلس ستيل بتشطيبات متعددة وعناصر CNC وأنظمة إضاءة LED متكاملة. يتم اختيار الخامات ودمجها بحسب التصميم والبيئة والمظهر المطلوب."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولون التصميم والتركيب معًا؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تقدم ويندو للدعاية والإعلان خدمة متكاملة تشمل التصميم المفاهيمي واختيار الخامات وتصنيع الهيكل المعدني وإنتاج الكسوة والحروف وأعمال CNC وتركيب إضاءة LED وتجهيز القاعدة الخرسانية والتركيب في الموقع."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق التصنيع والتركيب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تستغرق لوحات البايلون القياسية عادةً من أسبوعين إلى 4 أسابيع من التصميم المعتمد حتى التركيب. أما لوحات الـLandmark الكبيرة فقد تحتاج إلى وقت إضافي. تتيح زيارة الموقع وموجز التصميم تقديم جدول زمني دقيق للمشروع."
      }
    }
  ]
}
</script>
HTML;
    }
};
