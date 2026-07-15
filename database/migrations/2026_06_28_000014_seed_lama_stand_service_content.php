<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'lama-stand';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/lama-stand.webp',
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
            'title' => 'Lama Stand',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Lama Stand in Riyadh | Fabric Tension Display Stands | Window Advertising',
            'meta_description' => 'Custom Lama stands and fabric tension display systems in Riyadh. Window Advertising produces Lama stands for exhibitions, events, and promotional advertising in Saudi Arabia. Promotional advertising stands with full-color fabric printing. Get a free quote.',
            'meta_keywords' => 'lama stand Riyadh, fabric tension display Saudi Arabia, lama display stand Riyadh, advertising stands Riyadh, استندات دعائية الرياض, دعاية واعلان الرياض, دعاية واعلان السعودية, بوثات معارض',
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
            'title' => 'لاما ستاند',
            'content' => $this->getArabicContent(),
            'meta_title' => 'لاما ستاند في الرياض | استندات دعائية بتوتر القماش | ويندو للإعلان',
            'meta_description' => 'استندات لاما وأنظمة العرض بتوتر القماش المخصصة في الرياض — ويندو للإعلان ينتج استندات لاما للمعارض والفعاليات والإعلان الترويجي في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'لاما ستاند الرياض, استندات دعائية السعودية, دعاية واعلان الرياض, دعاية واعلان السعودية, بوثات معارض, استندات قماش الرياض',
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
        $service = DB::table('services')->where('slug', 'lama-stand')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Lama stands represent the premium tier of portable promotional advertising stands in the Saudi exhibitions and events market. Their seamless fabric surface, clean aluminum frame, and option for backlighting set them apart from <a href="/en/services/roll-up">roll-up banner stands</a> and pop-up systems at trade shows, product launches, and corporate events. Window Advertising designs and manufactures Lama stands for companies across Riyadh and Saudi Arabia as part of a full exhibition <a href="/en/services/display-stands">display stands</a> and advertising solution.</p>

<h2>What Makes a Lama Stand Different</h2>
<p>The defining characteristic of a Lama stand is its visual finish. Where a standard advertising stand uses a printed vinyl or polyester graphic attached to a frame, the Lama system stretches a dye-sublimation printed fabric across an aluminum channel frame using a silicone edge gasket pressed into the channel groove. The result is a display surface with no visible fasteners, no wrinkles, and no gaps — a seamless, flat graphic wall that looks more like a permanent installation than a portable stand.</p>
<p>For companies that use exhibition booths and promotional advertising at high-profile events in Riyadh, the visual quality of a Lama stand communicates a higher standard of brand presentation than most portable systems can achieve.</p>

<h2>Standard and Backlit Lama Stand Configurations</h2>
<p>Window Advertising produces Lama stands in two main configurations:</p>
<p><strong>Standard Lama stands</strong> use the aluminum channel frame system with a dye-sublimation printed fabric skin in normal ambient light. These are the most widely used configuration in Riyadh's exhibition and event market — clean, professional, and reusable across multiple events.</p>
<p><strong>Backlit Lama stands</strong> incorporate an internal LED lighting array behind the fabric. The backlighting illuminates the printed graphic from within, producing vivid, saturated colors that are visible from across an exhibition hall. Backlit configurations are particularly effective for product launches, premium exhibition booths, and any environment where the display needs to command attention at a distance.</p>
<p>Custom shapes and configurations including curved frames, stepped heights, L-shape and U-shape arrangements, and wall-mounted versions are available for clients with specific installation requirements.</p>

<h2>Lama Stands for Exhibition Booths in Riyadh</h2>
<p>Exhibition booth design in Saudi Arabia increasingly uses Lama stands as the primary branded wall element. Their seamless fabric surface creates the visual impression of a custom-built backdrop while maintaining the portability and reusability of a stand system. When coordinated with <a href="/en/services/promotional-cubes">promotional cubes</a>, a counter unit, and <a href="/en/services/pop-up">pop-up display stands</a>, a Lama stand forms the visual centerpiece of a complete <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a>.</p>
<p>Window Advertising designs exhibition booth display packages that combine Lama stands with complementary elements — ensuring the entire booth carries a unified visual identity. We have supplied Lama stand systems for exhibition booths at venues across Riyadh and wider Saudi Arabia.</p>

<h2>Fabric Printing Quality for Lama Stands</h2>
<p>The fabric used in Lama stand systems is printed using dye-sublimation technology, which infuses color into the polyester fabric fibers rather than sitting on the surface. This produces colors that are vibrant, resistant to UV fading, and accurate across the full display width without the color shift that can affect vinyl banner printing at large sizes.</p>
<p>Window Advertising uses high-resolution print output on fabric engineered for Lama frame systems — ensuring proper gasket fit, correct fabric tension, and print quality that holds up at close viewing distances as well as from across an exhibition space.</p>

<h2>Lama Stand Sizing and Setup</h2>
<p>Lama stands are available in standard widths from 85cm to 4 meters wide and heights from 200cm to 250cm for freestanding configurations. Custom sizes are available for wall-mounted and built-in applications.</p>
<p>Assembly requires inserting the aluminum frame sections together and pressing the fabric gasket into the channel groove — a process that takes 10 to 20 minutes for a standard freestanding unit. No tools are required. The disassembled frame packs into a compact carry bag for transport.</p>
<p>Window Advertising provides setup instructions and optional on-site installation service for large or complex Lama stand configurations.</p>

<h2>Frequently Asked Questions About Lama Stands</h2>

<h3>What is a Lama stand?</h3>
<p>A Lama stand (also known as a fabric tension display or SEG display) is a display system that uses an aluminum channel frame to hold a dye-sublimation printed fabric skin under tension. The fabric is fitted with a silicone edge gasket that locks into the channel, creating a perfectly flat, seamless display surface with no visible frame on the front face. Lama stands are used for high-quality exhibition displays, retail environments, and event backdrops.</p>

<h3>What is the difference between a Lama stand and a roll-up banner?</h3>
<p>A Lama stand uses a rigid aluminum frame with a fabric skin stretched over it, creating a flat, seamless display surface similar to a tension fabric wall. A roll-up banner uses a retractable cassette base with a printed vinyl or polyester graphic. Lama stands offer a more premium visual finish and are available in larger and more complex configurations. Roll-up banners are more portable and suited to single-person setup.</p>

<h3>Can a Lama stand be backlit?</h3>
<p>Yes. Lama stands are available in backlit configurations where LED lighting panels are installed inside the frame to illuminate the fabric graphic from behind, producing a vivid, luminous display that stands out in exhibition hall environments. Backlit Lama stands are particularly effective in dimly lit exhibition settings and for premium product launches.</p>

<h3>How is the fabric changed on a Lama stand?</h3>
<p>The silicone edge gasket on the Lama stand fabric is pressed into and pulled from the frame channel, allowing the fabric skin to be removed and replaced without tools. Replacement fabrics can be ordered for the same frame when your campaign or message changes, making Lama stands a reusable long-term advertising investment.</p>

<h2>Order a Lama Stand in Riyadh</h2>
<p>Share your required dimensions, any backlighting requirement, and your event or installation date. Our team provides a design proof and full pricing within 24 hours. Delivery across Riyadh included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is a Lama stand?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A Lama stand (also known as a fabric tension display or SEG display) is a display system that uses an aluminum channel frame to hold a dye-sublimation printed fabric skin under tension. The fabric is fitted with a silicone edge gasket that locks into the channel, creating a perfectly flat, seamless display surface with no visible frame on the front face. Lama stands are used for high-quality exhibition displays, retail environments, and event backdrops."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a Lama stand and a roll-up banner?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A Lama stand uses a rigid aluminum frame with a fabric skin stretched over it, creating a flat, seamless display surface similar to a tension fabric wall. A roll-up banner uses a retractable cassette base with a printed vinyl or polyester graphic. Lama stands offer a more premium visual finish and are available in larger and more complex configurations. Roll-up banners are more portable and suited to single-person setup."
      }
    },
    {
      "@type": "Question",
      "name": "Can a Lama stand be backlit?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Lama stands are available in backlit configurations where LED lighting panels are installed inside the frame to illuminate the fabric graphic from behind, producing a vivid, luminous display that stands out in exhibition hall environments. Backlit Lama stands are particularly effective in dimly lit exhibition settings and for premium product launches."
      }
    },
    {
      "@type": "Question",
      "name": "How is the fabric changed on a Lama stand?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The silicone edge gasket on the Lama stand fabric is pressed into and pulled from the frame channel, allowing the fabric skin to be removed and replaced without tools. Replacement fabrics can be ordered for the same frame when your campaign or message changes, making Lama stands a reusable long-term advertising investment."
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
<p>تمثل استندات اللاما الفئة المتميزة من الاستندات الدعائية المحمولة في سوق المعارض والفعاليات السعودي. سطحها القماشي السلس وإطارها الألمنيوم الأنيق وخيار الإضاءة الخلفية تميزها عن <a href="/ar/services/roll-up">ستاندات الرول أب</a> وأنظمة البوب أب في المعارض التجارية وإطلاقات المنتجات والفعاليات المؤسسية. تصمم وتصنع ويندو للإعلان استندات اللاما للشركات في جميع أنحاء الرياض والمملكة العربية السعودية كجزء من حل متكامل لـ<a href="/ar/services/display-stands">الاستندات الدعائية</a> والإعلان في المعارض.</p>

<h2>ما الذي يميز استند اللاما؟</h2>
<p>السمة المميزة لاستند اللاما هي مظهره النهائي. بينما يستخدم الاستند الإعلاني العادي رسوماً مطبوعة من الفينيل أو البوليستر مثبتة على إطار، يقوم نظام اللاما بشد قماش مطبوع بتقنية التسامي الحراري على إطار ألمنيوم ذي قنوات باستخدام حشية سيليكون تُضغط في أخدود القناة. النتيجة هي سطح عرض بدون مثبتات مرئية، بدون تجاعيد، وبدون فجوات — جدار رسومي سلس ومسطح يبدو كتركيب دائم أكثر من كونه استنداً محمولاً.</p>
<p>بالنسبة للشركات التي تستخدم بوثات المعارض والإعلان الترويجي في الفعاليات البارزة في الرياض، فإن الجودة البصرية لاستند اللاما تعكس معياراً أعلى لتقديم العلامة التجارية مما يمكن لمعظم الأنظمة المحمولة تحقيقه.</p>

<h2>أنواع استندات اللاما: عادي ومضيء</h2>
<p>تنتج ويندو للإعلان استندات اللاما في تكوينين رئيسيين:</p>
<p><strong>استندات اللاما العادية</strong> تستخدم نظام الإطار الألمنيوم ذي القنوات مع قماش مطبوع بتقنية التسامي الحراري في الإضاءة المحيطة العادية. وهي التكوين الأكثر استخداماً في سوق المعارض والفعاليات بالرياض — أنيقة واحترافية وقابلة لإعادة الاستخدام عبر فعاليات متعددة.</p>
<p><strong>استندات اللاما المضيئة</strong> تتضمن مصفوفة إضاءة LED داخلية خلف القماش. تضيء الإضاءة الخلفية الرسم المطبوع من الداخل، مما ينتج ألواناً حية ومشبعة تكون مرئية من جميع أنحاء قاعة المعرض. التكوينات المضيئة فعالة بشكل خاص لإطلاقات المنتجات وبوثات المعارض المتميزة وأي بيئة يحتاج فيها العرض إلى جذب الانتباه من مسافة بعيدة.</p>
<p>تتوفر أشكال وتكوينات مخصصة تشمل الإطارات المنحنية والارتفاعات المتدرجة وترتيبات الشكل L وU والنسخ المثبتة على الجدران للعملاء ذوي متطلبات التركيب الخاصة.</p>

<h2>استندات لاما لبوثات المعارض في الرياض</h2>
<p>يعتمد تصميم بوثات المعارض في المملكة العربية السعودية بشكل متزايد على استندات اللاما كعنصر الجدار الرئيسي ذي العلامة التجارية. يخلق سطحها القماشي السلس انطباعاً بصرياً بخلفية مبنية خصيصاً مع الحفاظ على قابلية النقل وإعادة الاستخدام لنظام الاستندات. عند تنسيقها مع <a href="/ar/services/promotional-cubes">المكعبات الترويجية</a> ووحدة كاونتر و<a href="/ar/services/pop-up">استندات البوب أب</a>، يشكل استند اللاما المحور البصري لـ<a href="/ar/services/exhibition-booth-execution">تنفيذ بوث معرض</a> متكامل.</p>
<p>تصمم ويندو للإعلان حزم عرض بوثات المعارض التي تجمع بين استندات اللاما والعناصر التكميلية — لضمان أن البوث بالكامل يحمل هوية بصرية موحدة. لقد زودنا أنظمة استندات اللاما لبوثات المعارض في أماكن متعددة عبر الرياض والمملكة العربية السعودية.</p>

<h2>جودة طباعة القماش لاستندات اللاما</h2>
<p>يُطبع القماش المستخدم في أنظمة استندات اللاما باستخدام تقنية التسامي الحراري التي تدمج اللون في ألياف القماش البوليستر بدلاً من وضعه على السطح. ينتج عن ذلك ألوان نابضة بالحياة ومقاومة لبهتان الأشعة فوق البنفسجية ودقيقة عبر عرض العرض الكامل دون انحراف اللون الذي يمكن أن يؤثر على طباعة البانرات الفينيل بالأحجام الكبيرة.</p>
<p>تستخدم ويندو للإعلان مخرجات طباعة عالية الدقة على قماش مصمم خصيصاً لأنظمة إطارات اللاما — مما يضمن ملاءمة الحشية المناسبة وشد القماش الصحيح وجودة طباعة تصمد عند مسافات المشاهدة القريبة وكذلك من جميع أنحاء مساحة المعرض.</p>

<h2>مقاسات استند اللاما وطريقة التركيب</h2>
<p>تتوفر استندات اللاما بعروض قياسية من 85 سم إلى 4 أمتار وارتفاعات من 200 سم إلى 250 سم للتكوينات القائمة بذاتها. تتوفر مقاسات مخصصة للتطبيقات المثبتة على الجدران والمدمجة.</p>
<p>يتطلب التجميع إدخال أقسام الإطار الألمنيوم معاً وضغط حشية القماش في أخدود القناة — وهي عملية تستغرق من 10 إلى 20 دقيقة للوحدة القائمة القياسية. لا حاجة لأدوات. يُعبأ الإطار المفكك في حقيبة حمل مدمجة للنقل.</p>
<p>توفر ويندو للإعلان تعليمات التركيب وخدمة التركيب في الموقع الاختيارية لتكوينات استندات اللاما الكبيرة أو المعقدة.</p>

<h2>الأسئلة الشائعة حول استندات اللاما</h2>

<h3>ما هو استند اللاما؟</h3>
<p>استند اللاما (المعروف أيضاً بشاشة العرض بتوتر القماش أو شاشة SEG) هو نظام عرض يستخدم إطاراً ألمنيوم ذا قنوات لتثبيت قماش مطبوع بتقنية التسامي الحراري تحت الشد. يُجهز القماش بحشية حافة سيليكون تُقفل في القناة، مما يخلق سطح عرض مسطحاً وسلساً تماماً بدون إطار مرئي على الوجه الأمامي. تُستخدم استندات اللاما لعروض المعارض عالية الجودة وبيئات البيع بالتجزئة وخلفيات الفعاليات.</p>

<h3>ما الفرق بين استند اللاما وبانر الرول أب؟</h3>
<p>يستخدم استند اللاما إطاراً ألمنيوم صلباً مع قماش مشدود عليه، مما يخلق سطح عرض مسطحاً وسلساً مشابهاً لجدار القماش المشدود. يستخدم بانر الرول أب قاعدة كاسيت قابلة للسحب مع رسم مطبوع من الفينيل أو البوليستر. توفر استندات اللاما مظهراً بصرياً أكثر تميزاً وتتوفر في تكوينات أكبر وأكثر تعقيداً. بانرات الرول أب أكثر قابلية للنقل ومناسبة للإعداد بشخص واحد.</p>

<h3>هل يمكن إضاءة استند اللاما من الخلف؟</h3>
<p>نعم. تتوفر استندات اللاما في تكوينات مضيئة حيث تُثبت لوحات إضاءة LED داخل الإطار لإضاءة الرسم القماشي من الخلف، مما ينتج عرضاً حياً ومضيئاً يبرز في بيئات قاعات المعارض. استندات اللاما المضيئة فعالة بشكل خاص في بيئات المعارض ذات الإضاءة الخافتة ولإطلاقات المنتجات المتميزة.</p>

<h3>كيف يتم تغيير القماش على استند اللاما؟</h3>
<p>تُضغط حشية حافة السيليكون على قماش استند اللاما في قناة الإطار وتُسحب منها، مما يسمح بإزالة القماش واستبداله بدون أدوات. يمكن طلب أقمشة بديلة لنفس الإطار عندما تتغير حملتك أو رسالتك، مما يجعل استندات اللاما استثماراً إعلانياً قابلاً لإعادة الاستخدام على المدى الطويل.</p>

<h2>اطلب استند لاما في الرياض</h2>
<p>شاركنا المقاسات المطلوبة وأي متطلبات للإضاءة الخلفية وتاريخ فعاليتك أو التركيب. يقدم فريقنا إثبات تصميم وتسعيراً كاملاً خلال 24 ساعة. التوصيل في جميع أنحاء الرياض مشمول.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما هو استند اللاما؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "استند اللاما (المعروف أيضاً بشاشة العرض بتوتر القماش أو شاشة SEG) هو نظام عرض يستخدم إطاراً ألمنيوم ذا قنوات لتثبيت قماش مطبوع بتقنية التسامي الحراري تحت الشد. يُجهز القماش بحشية حافة سيليكون تُقفل في القناة، مما يخلق سطح عرض مسطحاً وسلساً تماماً بدون إطار مرئي على الوجه الأمامي. تُستخدم استندات اللاما لعروض المعارض عالية الجودة وبيئات البيع بالتجزئة وخلفيات الفعاليات."
      }
    },
    {
      "@type": "Question",
      "name": "ما الفرق بين استند اللاما وبانر الرول أب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يستخدم استند اللاما إطاراً ألمنيوم صلباً مع قماش مشدود عليه، مما يخلق سطح عرض مسطحاً وسلساً مشابهاً لجدار القماش المشدود. يستخدم بانر الرول أب قاعدة كاسيت قابلة للسحب مع رسم مطبوع من الفينيل أو البوليستر. توفر استندات اللاما مظهراً بصرياً أكثر تميزاً وتتوفر في تكوينات أكبر وأكثر تعقيداً. بانرات الرول أب أكثر قابلية للنقل ومناسبة للإعداد بشخص واحد."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن إضاءة استند اللاما من الخلف؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تتوفر استندات اللاما في تكوينات مضيئة حيث تُثبت لوحات إضاءة LED داخل الإطار لإضاءة الرسم القماشي من الخلف، مما ينتج عرضاً حياً ومضيئاً يبرز في بيئات قاعات المعارض. استندات اللاما المضيئة فعالة بشكل خاص في بيئات المعارض ذات الإضاءة الخافتة ولإطلاقات المنتجات المتميزة."
      }
    },
    {
      "@type": "Question",
      "name": "كيف يتم تغيير القماش على استند اللاما؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُضغط حشية حافة السيليكون على قماش استند اللاما في قناة الإطار وتُسحب منها، مما يسمح بإزالة القماش واستبداله بدون أدوات. يمكن طلب أقمشة بديلة لنفس الإطار عندما تتغير حملتك أو رسالتك، مما يجعل استندات اللاما استثماراً إعلانياً قابلاً لإعادة الاستخدام على المدى الطويل."
      }
    }
  ]
}
</script>
HTML;
    }
};
