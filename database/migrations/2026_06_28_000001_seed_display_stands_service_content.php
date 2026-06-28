<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'display-stands';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/display-stands.webp',
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
            'title' => 'Display Stands',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Display Stands & Promotional Stands in Riyadh | Window Advertising',
            'meta_description' => 'Custom display stands and promotional stands for exhibitions, retail, and corporate events in Riyadh. Window Advertising designs and manufactures advertising stands across Saudi Arabia. Request a free quote.',
            'meta_keywords' => 'display stands Riyadh, promotional stands Saudi Arabia, advertising stands Riyadh, exhibition display stands, استندات دعائية الرياض, دعاية وإعلان الرياض',
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
            'title' => 'الاستندات الدعائية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'استندات دعائية وعارضات عرض في الرياض | وينوو للإعلان',
            'meta_description' => 'استندات دعائية مخصصة وعارضات عرض للمعارض والمحلات التجارية والفعاليات في الرياض — وينوو للإعلان للدعاية والإعلان في السعودية. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'استندات دعائية الرياض, عارضات عرض السعودية, دعاية وإعلان الرياض, استندات معارض, دعاية وإعلان السعودية, استندات ترويجية الرياض',
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
        $service = DB::table('services')->where('slug', 'display-stands')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Display stands are the frontline tools of advertising in Saudi Arabia. Whether you need a single roll-up for a conference, a full exhibition system for a trade show, or a branded display unit for your retail floor, Window Advertising manufactures and delivers every type of promotional stand across Riyadh and the Kingdom.</p>

<h2>What Are Display Stands and Promotional Stands?</h2>
<p>Display stands and promotional stands are portable, branded advertising structures used at exhibitions, conferences, retail environments, and corporate events. They present your brand message at eye level, direct attention to a product or service, and create a professional branded environment wherever you place them.</p>
<p>As one of Riyadh's leading advertising companies, Window Advertising produces display stands used at trade shows, shopping malls, hotel lobbies, government events, and corporate offices across Saudi Arabia. Every stand is designed to be easy to assemble, transport, and reuse across multiple events.</p>

<h2>Types of Display Stands We Produce</h2>
<p>Window Advertising manufactures the full spectrum of display stands used in the Saudi advertising market:</p>
<p><strong><a href="/en/services/roll-up">Roll-up Banners</a>:</strong> The most widely used portable display in advertising and promotions. The graphic rolls into the base for protection during transport. Available in standard, wide, and premium formats.</p>
<p><strong><a href="/en/services/pop-up">Pop-up Display Systems</a>:</strong> Curved or straight fabric or panel systems that expand to create a large backdrop or exhibition wall. Ideal for conferences and exhibition booths.</p>
<p><strong><a href="/en/services/lama-stand">Lama Stands</a>:</strong> A popular stand format in the Saudi market featuring a wide base and tall display area. Used extensively in retail stores, malls, and event lobbies.</p>
<p><strong><a href="/en/services/promotional-cubes">Promotional Cubes</a>:</strong> Branded cube-shaped display units that double as product pedestals or seating in exhibition environments.</p>
<p><strong>X-Banners and L-Banners:</strong> Lightweight, low-cost portable displays that use a spring-tension frame to hold the printed graphic. Popular for outdoor and indoor promotional use.</p>
<p><strong>Exhibition Display Walls:</strong> Modular fabric or panel systems that assemble into full exhibition backdrops and feature walls for trade shows and conferences.</p>

<h2>Where Display Stands Are Used in Riyadh</h2>
<p>Our clients in Riyadh use promotional stands across a wide range of advertising and corporate environments:</p>
<p>Exhibitions and trade shows at Riyadh International Convention Center, LEAP, and Cityscape require portable, impactful display systems that can be built and removed quickly. Corporate offices and bank branches use promotional stands in their lobbies to communicate current offers and seasonal campaigns. Shopping malls deploy lama stands and display units near entrances and escalators to direct foot traffic. Government and healthcare facilities use informational display stands to communicate patient or visitor guidance. Outdoor events and festivals use X-banners and flag stands as lightweight perimeter branding.</p>
<p>Every application calls for a different stand specification, and Window Advertising supplies all of them — including full <a href="/en/services/exhibition-booth-execution">exhibition booth</a> setups — with the same quality standard.</p>

<h2>Design and Print Quality</h2>
<p>The visual quality of your display stand determines how professionally your brand is perceived. Window Advertising uses high-resolution large-format digital printing on premium substrates — producing vivid colors, sharp text, and photographs that hold up at close viewing distances.</p>
<p>Our print materials are selected for the Saudi environment: UV-resistant inks prevent fading under direct sunlight, and our substrate choices are tested for indoor and outdoor performance across Saudi Arabia's temperature range.</p>
<p>Every order includes a digital proof for your approval. You see exactly how your stand will look before a single sheet is printed.</p>

<h2>Why Businesses in Riyadh Choose Window Advertising for Display Stands</h2>
<p>Window Advertising is a full-service advertising company in Riyadh — not just a print shop. When you order a display stand from us, you receive design support, production expertise, and delivery coordination from one team under one roof.</p>
<p>Our clients range from small local businesses running their first exhibition to large corporations and government agencies managing multi-event advertising campaigns. We scale to fit your needs: one stand or one hundred, simple roll-ups or complex exhibition systems.</p>
<p>Our turnaround times are among the fastest in Riyadh's advertising market, and our pricing is transparent with no surprise additions at invoicing.</p>

<h2>Display Stands Portfolio</h2>
<p>Browse our project gallery to see the range of display stands and promotional stands produced by Window Advertising for clients across Riyadh and Saudi Arabia. Our portfolio includes roll-ups, lama stands, exhibition systems, pop-up displays, and retail display units across dozens of sectors.</p>

<h2>Frequently Asked Questions About Display Stands</h2>

<h3>What types of display stands does Window Advertising offer in Riyadh?</h3>
<p>Window Advertising offers a complete range of promotional display stands including roll-up banners, pop-up displays, lama stands, promotional cubes, X-banners, L-banners, tabletop displays, and custom-built exhibition stand systems. All stands are produced with full-color high-resolution printing.</p>

<h3>Can display stands be customized with our brand design?</h3>
<p>Yes. Every display stand from Window Advertising is fully customized with your brand design, colors, logo, and messaging. Our design team can create the artwork from scratch or work from your existing brand guidelines. A digital proof is provided for approval before production.</p>

<h3>How long does it take to produce a display stand in Riyadh?</h3>
<p>Standard display stands such as roll-ups and X-banners are produced within 1 to 3 business days. Custom-built or larger display systems may require 5 to 10 business days depending on complexity. Express production is available for urgent orders.</p>

<h3>Are your display stands reusable?</h3>
<p>Yes. Most of our display stand hardware is reusable. The printed graphic panels can be replaced with updated artwork while keeping the same stand frame, making them a cost-effective long-term advertising investment for businesses in Riyadh.</p>

<h3>What is the difference between a display stand and a roll-up banner?</h3>
<p>A roll-up banner is one type of display stand where the printed graphic rolls up into the base for compact storage and transport. Display stands is a broader category that includes pop-up systems, lama stands, promotional cubes, and modular exhibition displays. Window Advertising supplies all formats.</p>

<h2>Order Your Display Stands in Riyadh</h2>
<p>Ready to order? Share your stand type, size requirements, quantity, and event date. Our team will confirm availability and pricing within the same business day. Production and delivery across Riyadh typically completed within 2 to 5 business days.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of display stands does Window Advertising offer in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising offers a complete range of promotional display stands including roll-up banners, pop-up displays, lama stands, promotional cubes, X-banners, L-banners, tabletop displays, and custom-built exhibition stand systems. All stands are produced with full-color high-resolution printing."
      }
    },
    {
      "@type": "Question",
      "name": "Can display stands be customized with our brand design?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Every display stand from Window Advertising is fully customized with your brand design, colors, logo, and messaging. Our design team can create the artwork from scratch or work from your existing brand guidelines. A digital proof is provided for approval before production."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to produce a display stand in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard display stands such as roll-ups and X-banners are produced within 1 to 3 business days. Custom-built or larger display systems may require 5 to 10 business days depending on complexity. Express production is available for urgent orders."
      }
    },
    {
      "@type": "Question",
      "name": "Are your display stands reusable?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Most of our display stand hardware is reusable. The printed graphic panels can be replaced with updated artwork while keeping the same stand frame, making them a cost-effective long-term advertising investment for businesses in Riyadh."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a display stand and a roll-up banner?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A roll-up banner is one type of display stand where the printed graphic rolls up into the base for compact storage and transport. Display stands is a broader category that includes pop-up systems, lama stands, promotional cubes, and modular exhibition displays. Window Advertising supplies all formats."
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
<p>الاستندات الدعائية هي أدوات الإعلان الأمامية في المملكة العربية السعودية. سواء كنت بحاجة إلى رول أب واحد لمؤتمر، أو نظام عرض كامل لمعرض تجاري، أو وحدة عرض تحمل علامتك التجارية لمتجرك، فإن وينوو للإعلان تصنع وتسلم كل أنواع الاستندات الترويجية في الرياض والمملكة.</p>

<h2>ما هي الاستندات الدعائية وعارضات العرض؟</h2>
<p>الاستندات الدعائية وعارضات العرض هي هياكل إعلانية محمولة تحمل علامتك التجارية، وتُستخدم في المعارض والمؤتمرات والبيئات التجارية والفعاليات المؤسسية. تعرض رسالة علامتك التجارية على مستوى العين، وتوجه الانتباه إلى منتج أو خدمة، وتخلق بيئة احترافية ذات علامة تجارية أينما وُضعت.</p>
<p>بصفتها إحدى شركات الإعلان الرائدة في الرياض، تنتج وينوو للإعلان استندات دعائية تُستخدم في المعارض التجارية ومراكز التسوق وردهات الفنادق والفعاليات الحكومية والمكاتب المؤسسية في جميع أنحاء المملكة العربية السعودية. كل استند مصمم ليكون سهل التجميع والنقل وإعادة الاستخدام عبر فعاليات متعددة.</p>

<h2>أنواع الاستندات الدعائية التي ننتجها</h2>
<p>تصنع وينوو للإعلان الطيف الكامل من الاستندات الدعائية المستخدمة في سوق الإعلان السعودي:</p>
<p><strong><a href="/ar/services/roll-up">بانرات الرول أب</a>:</strong> أكثر عارضات العرض المحمولة استخداماً في الإعلان والعروض الترويجية. يُطوى التصميم المطبوع داخل القاعدة للحماية أثناء النقل. متوفرة بأحجام قياسية وعريضة ومميزة.</p>
<p><strong><a href="/ar/services/pop-up">أنظمة البوب أب</a>:</strong> أنظمة قماشية أو لوحية منحنية أو مستقيمة تتمدد لتشكل خلفية كبيرة أو جدار معرض. مثالية للمؤتمرات وأجنحة المعارض.</p>
<p><strong><a href="/ar/services/lama-stand">استندات لاما</a>:</strong> نموذج استند شائع في السوق السعودي يتميز بقاعدة عريضة ومساحة عرض طويلة. يُستخدم بكثرة في المتاجر ومراكز التسوق وردهات الفعاليات.</p>
<p><strong><a href="/ar/services/promotional-cubes">المكعبات الترويجية</a>:</strong> وحدات عرض مكعبة الشكل تحمل علامتك التجارية وتعمل كقواعد عرض منتجات أو مقاعد في بيئات المعارض.</p>
<p><strong>بانرات X وبانرات L:</strong> عارضات عرض محمولة خفيفة الوزن ومنخفضة التكلفة تستخدم إطاراً بنظام الشد الزنبركي لتثبيت التصميم المطبوع. شائعة للاستخدام الترويجي الداخلي والخارجي.</p>
<p><strong>جدران عرض المعارض:</strong> أنظمة قماشية أو لوحية معيارية تُجمّع لتشكل خلفيات معارض كاملة وجدران مميزة للمعارض التجارية والمؤتمرات.</p>

<h2>أين تُستخدم الاستندات الدعائية في الرياض؟</h2>
<p>يستخدم عملاؤنا في الرياض الاستندات الترويجية في مجموعة واسعة من البيئات الإعلانية والمؤسسية:</p>
<p>تتطلب المعارض والمعارض التجارية في مركز الرياض الدولي للمعارض والمؤتمرات وLEAP وسيتي سكيب أنظمة عرض محمولة ومؤثرة يمكن تركيبها وإزالتها بسرعة. تستخدم المكاتب المؤسسية وفروع البنوك الاستندات الترويجية في ردهاتها للترويج للعروض الحالية والحملات الموسمية. تنشر مراكز التسوق استندات لاما ووحدات العرض بالقرب من المداخل والسلالم المتحركة لتوجيه حركة الزوار. تستخدم المرافق الحكومية والصحية استندات عرض معلوماتية للتواصل مع المرضى أو الزوار. تستخدم الفعاليات والمهرجانات الخارجية بانرات X والأعلام كعلامات تجارية خفيفة الوزن على المحيط.</p>
<p>يتطلب كل تطبيق مواصفات استند مختلفة، وتوفرها وينوو للإعلان جميعاً — بما في ذلك تجهيزات <a href="/ar/services/exhibition-booth-execution">أجنحة المعارض</a> الكاملة — بنفس معيار الجودة.</p>

<h2>جودة التصميم والطباعة</h2>
<p>تحدد الجودة البصرية لاستندك الدعائي مدى احترافية نظرة الجمهور لعلامتك التجارية. تستخدم وينوو للإعلان الطباعة الرقمية عالية الدقة بالحجم الكبير على ركائز مميزة — لإنتاج ألوان زاهية ونصوص حادة وصور فوتوغرافية تصمد عند مسافات المشاهدة القريبة.</p>
<p>موادنا المطبوعة مختارة للبيئة السعودية: أحبار مقاومة للأشعة فوق البنفسجية تمنع البهتان تحت أشعة الشمس المباشرة، وخيارات الركائز لدينا مختبرة للأداء الداخلي والخارجي عبر نطاق درجات الحرارة في المملكة العربية السعودية.</p>
<p>يتضمن كل طلب نموذجاً رقمياً لموافقتك. ترى بالضبط كيف سيبدو استندك قبل طباعة ورقة واحدة.</p>

<h2>لماذا تختار شركات الرياض وينوو للإعلان؟</h2>
<p>وينوو للإعلان شركة إعلان متكاملة الخدمات في الرياض — وليست مجرد مطبعة. عندما تطلب استنداً دعائياً منا، تحصل على دعم التصميم وخبرة الإنتاج وتنسيق التسليم من فريق واحد تحت سقف واحد.</p>
<p>يتراوح عملاؤنا من الشركات المحلية الصغيرة التي تشارك في معرضها الأول إلى الشركات الكبرى والجهات الحكومية التي تدير حملات إعلانية متعددة الفعاليات. نتوسع لنلبي احتياجاتك: استند واحد أو مائة، رول أب بسيط أو أنظمة معارض معقدة.</p>
<p>أوقات التسليم لدينا من بين الأسرع في سوق الإعلان بالرياض، وأسعارنا شفافة بدون إضافات مفاجئة عند الفوترة.</p>

<h2>أعمالنا في الاستندات الدعائية</h2>
<p>تصفح معرض مشاريعنا لمشاهدة مجموعة الاستندات الدعائية وعارضات العرض التي أنتجتها وينوو للإعلان لعملاء في جميع أنحاء الرياض والمملكة العربية السعودية. يتضمن معرض أعمالنا رول أب واستندات لاما وأنظمة معارض وعارضات بوب أب ووحدات عرض تجزئة عبر عشرات القطاعات.</p>

<h2>الأسئلة الشائعة حول الاستندات الدعائية</h2>

<h3>ما أنواع الاستندات الدعائية التي تقدمها وينوو للإعلان في الرياض؟</h3>
<p>تقدم وينوو للإعلان مجموعة كاملة من الاستندات الدعائية الترويجية تشمل بانرات الرول أب وعارضات البوب أب واستندات لاما والمكعبات الترويجية وبانرات X وبانرات L وعارضات الطاولة وأنظمة استندات المعارض المصممة خصيصاً. جميع الاستندات تُنتج بطباعة ملونة عالية الدقة.</p>

<h3>هل يمكن تخصيص الاستندات الدعائية بتصميم علامتنا التجارية؟</h3>
<p>نعم. كل استند دعائي من وينوو للإعلان مخصص بالكامل بتصميم علامتك التجارية وألوانها وشعارها ورسائلها. يمكن لفريق التصميم لدينا إنشاء العمل الفني من الصفر أو العمل من إرشادات علامتك التجارية الحالية. يُقدَّم نموذج رقمي للموافقة قبل الإنتاج.</p>

<h3>كم يستغرق إنتاج استند دعائي في الرياض؟</h3>
<p>تُنتج الاستندات الدعائية القياسية مثل الرول أب وبانرات X خلال يوم إلى 3 أيام عمل. قد تتطلب الأنظمة المصممة خصيصاً أو الأكبر حجماً من 5 إلى 10 أيام عمل حسب التعقيد. الإنتاج السريع متاح للطلبات العاجلة.</p>

<h3>هل استنداتكم الدعائية قابلة لإعادة الاستخدام؟</h3>
<p>نعم. معظم أجهزة الاستندات الدعائية لدينا قابلة لإعادة الاستخدام. يمكن استبدال اللوحات المطبوعة بتصاميم محدثة مع الحفاظ على نفس إطار الاستند، مما يجعلها استثماراً إعلانياً فعالاً من حيث التكلفة على المدى الطويل للشركات في الرياض.</p>

<h3>ما الفرق بين الاستند الدعائي وبانر الرول أب؟</h3>
<p>بانر الرول أب هو نوع واحد من الاستندات الدعائية حيث يُطوى التصميم المطبوع داخل القاعدة للتخزين والنقل المدمج. الاستندات الدعائية فئة أوسع تشمل أنظمة البوب أب واستندات لاما والمكعبات الترويجية وعارضات المعارض المعيارية. توفر وينوو للإعلان جميع الأشكال.</p>

<h2>اطلب استنداتك الدعائية في الرياض</h2>
<p>مستعد للطلب؟ شاركنا نوع الاستند ومتطلبات الحجم والكمية وتاريخ الفعالية. سيؤكد فريقنا التوفر والتسعير خلال نفس يوم العمل. يُنجز الإنتاج والتسليم في الرياض عادةً خلال 2 إلى 5 أيام عمل.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الاستندات الدعائية التي تقدمها وينوو للإعلان في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تقدم وينوو للإعلان مجموعة كاملة من الاستندات الدعائية الترويجية تشمل بانرات الرول أب وعارضات البوب أب واستندات لاما والمكعبات الترويجية وبانرات X وبانرات L وعارضات الطاولة وأنظمة استندات المعارض المصممة خصيصاً. جميع الاستندات تُنتج بطباعة ملونة عالية الدقة."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن تخصيص الاستندات الدعائية بتصميم علامتنا التجارية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. كل استند دعائي من وينوو للإعلان مخصص بالكامل بتصميم علامتك التجارية وألوانها وشعارها ورسائلها. يمكن لفريق التصميم لدينا إنشاء العمل الفني من الصفر أو العمل من إرشادات علامتك التجارية الحالية. يُقدَّم نموذج رقمي للموافقة قبل الإنتاج."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق إنتاج استند دعائي في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تُنتج الاستندات الدعائية القياسية مثل الرول أب وبانرات X خلال يوم إلى 3 أيام عمل. قد تتطلب الأنظمة المصممة خصيصاً أو الأكبر حجماً من 5 إلى 10 أيام عمل حسب التعقيد. الإنتاج السريع متاح للطلبات العاجلة."
      }
    },
    {
      "@type": "Question",
      "name": "هل استنداتكم الدعائية قابلة لإعادة الاستخدام؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. معظم أجهزة الاستندات الدعائية لدينا قابلة لإعادة الاستخدام. يمكن استبدال اللوحات المطبوعة بتصاميم محدثة مع الحفاظ على نفس إطار الاستند، مما يجعلها استثماراً إعلانياً فعالاً من حيث التكلفة على المدى الطويل للشركات في الرياض."
      }
    },
    {
      "@type": "Question",
      "name": "ما الفرق بين الاستند الدعائي وبانر الرول أب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "بانر الرول أب هو نوع واحد من الاستندات الدعائية حيث يُطوى التصميم المطبوع داخل القاعدة للتخزين والنقل المدمج. الاستندات الدعائية فئة أوسع تشمل أنظمة البوب أب واستندات لاما والمكعبات الترويجية وعارضات المعارض المعيارية. توفر وينوو للإعلان جميع الأشكال."
      }
    }
  ]
}
</script>
HTML;
    }
};
