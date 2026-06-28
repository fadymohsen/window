<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'car-stickers';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/car-stickers.webp',
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
            'title' => 'Car Stickers',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Car Stickers & Vehicle Advertising Stickers in Riyadh | Window Advertising',
            'meta_description' => 'Custom car stickers and vehicle advertising stickers in Riyadh. Window Advertising prints and installs car branding stickers, fleet wraps, and vehicle advertising for businesses across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'car stickers Riyadh, vehicle advertising stickers Saudi Arabia, car branding Riyadh, fleet wrap Saudi Arabia, استيكرات سيارات الرياض, دعاية وإعلان الرياض, استيكرات إعلانية',
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
            'title' => 'استيكرات السيارات',
            'content' => $this->getArabicContent(),
            'meta_title' => 'استيكرات سيارات وإعلانات مركبات في الرياض | وينوو للإعلان',
            'meta_description' => 'استيكرات سيارات مخصصة وإعلانات مركبات في الرياض — وينوو للإعلان يطبع ويركب استيكرات الدعاية والإعلان على السيارات والأساطيل التجارية في السعودية. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'استيكرات سيارات الرياض, إعلانات مركبات السعودية, دعاية وإعلان الرياض, استيكرات دعائية, تغليف سيارات الرياض, استيكرات أسطول السعودية',
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
        $service = DB::table('services')->where('slug', 'car-stickers')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A branded vehicle travels through thousands of impressions every day on Riyadh's roads. Car stickers and vehicle advertising transform your company's fleet into a moving outdoor advertising campaign — reaching audiences no billboard or social media post can. Window Advertising designs, prints, and installs car stickers and vehicle graphics for businesses across Saudi Arabia.</p>

<h2>What Are Car Stickers and Vehicle Advertising?</h2>
<p>Car stickers and vehicle advertising are printed vinyl graphics applied to the exterior of cars, vans, trucks, and motorcycles to display brand messaging while the vehicle is in use. From a simple logo and phone number on a car door to a full-vehicle wrap with a vivid branded design, vehicle advertising is one of the most cost-effective and high-reach forms of outdoor advertising available.</p>
<p>In Riyadh, where road usage is high and daily commute times are significant, a fleet of branded vehicles in traffic represents constant advertising exposure across the city. Window Advertising helps businesses turn every journey into a brand impression.</p>

<h2>Types of Car Stickers We Produce</h2>
<p>Window Advertising offers a complete range of vehicle graphics for every application and budget:</p>
<p><strong>Full Vehicle Wraps</strong> cover the entire exterior surface of a vehicle with a seamless branded design. This format delivers maximum visual impact and is the most effective form of vehicle advertising.</p>
<p><strong>Partial Vehicle Graphics</strong> cover specific panels such as the doors, hood, rear, or sides — offering strong brand visibility at a lower cost than a full wrap. Unlike static <a href="/en/services/wall-stickers">wall stickers</a>, vehicle graphics must withstand road conditions and extreme weather.</p>
<p><strong>Door and Panel Stickers</strong> are simple, clean sticker applications with the company name, logo, phone number, and website. Commonly used on delivery vans and service vehicles.</p>
<p><strong>Rear Window Perforated Stickers</strong> apply to the rear glass and are printed on perforated vinyl that allows visibility from inside while displaying full-color branding on the outside.</p>
<p><strong>Fleet Decals</strong> are standardized sticker sets applied consistently across an entire fleet, ensuring every vehicle carries the same design, sizing, and placement.</p>

<h2>Fleet Branding for Saudi Businesses</h2>
<p>Fleet branding is among the highest-return advertising investments available for Saudi businesses with vehicles. A fleet of 10 branded vehicles traveling across Riyadh generates hundreds of thousands of advertising impressions per month — at a cost far below comparable digital or outdoor advertising such as <a href="/en/services/banner-printing-installation">banner printing</a>.</p>
<p>Window Advertising manages fleet branding projects for businesses ranging from small delivery operations to large corporations with vehicles across multiple Saudi cities. Our fleet branding service includes design standardization, consistent production across every vehicle, and coordinated installation scheduling so minimal operational disruption occurs.</p>
<p>Fleet brands we have managed include food delivery companies, construction firms requiring <a href="/en/services/project-signboards-walls">project signboards</a>, healthcare providers, logistics operators, and government contractors — all requiring consistency, durability, and rapid rollout.</p>

<h2>Materials and Print Quality</h2>
<p>Car sticker quality depends entirely on the vinyl film and ink used. Window Advertising uses internationally certified cast vinyl films with UV-resistant solvent inks that are specifically tested for Saudi Arabia's climate — high temperatures, intense direct sunlight, and occasional rain.</p>
<p>Our cast vinyl films conform smoothly to complex vehicle contours, resist lifting at edges and seams, and maintain color vibrancy for 3 to 5 years under normal outdoor conditions. Cheaper films sold in the market use calendered vinyl with standard inks, which fade within months and begin peeling at edges in high-heat environments. We do not use these materials.</p>

<h2>Design and Visualization Before Production</h2>
<p>Every car sticker order begins with a design phase. Our design team — which also handles <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> — produces a vehicle-specific mockup showing exactly how the branding will look on your model of vehicle. You review the design in context — seeing the colors, logo placement, and overall composition on a realistic vehicle representation — before a single sheet of vinyl is printed.</p>
<p>This process eliminates surprises on installation day and ensures the finished vehicle matches your brand identity as intended. Revisions are included until you are satisfied with the design.</p>

<h2>Car Stickers Portfolio — Riyadh</h2>
<p>Explore our portfolio of car sticker and vehicle advertising projects across Riyadh. From single-vehicle personal branding to multi-vehicle fleet campaigns, our gallery shows the range of vehicle graphics produced and installed by Window Advertising.</p>

<h2>Frequently Asked Questions About Car Stickers</h2>

<h3>What types of car stickers does Window Advertising produce?</h3>
<p>Window Advertising produces full vehicle wraps, partial vehicle graphics, door and panel stickers, rear window perforated stickers, bonnet graphics, and fleet decals. All car stickers use high-quality vinyl films with UV-resistant inks rated for the Saudi outdoor climate.</p>

<h3>Can car stickers be removed without damaging the vehicle paint?</h3>
<p>Yes. Window Advertising uses premium removable vinyl films that protect the original vehicle paint and can be cleanly removed without leaving residue or causing paint damage. We recommend professional removal by our team to ensure the best result.</p>

<h3>How much does vehicle branding cost in Riyadh?</h3>
<p>Vehicle branding costs depend on the size of the vehicle, the percentage of coverage (partial or full wrap), and the number of vehicles. Window Advertising provides transparent, itemized quotes. Contact us with your vehicle type and fleet size for a free estimate.</p>

<h3>How long do car stickers last in Saudi Arabia's climate?</h3>
<p>When properly installed using quality vinyl films and UV-resistant inks, car stickers from Window Advertising last 3 to 5 years in Saudi Arabia's outdoor conditions. We use materials specifically rated for high-temperature environments to prevent fading and peeling.</p>

<h3>Do you handle fleet branding for multiple vehicles?</h3>
<p>Yes. Fleet branding is one of our most requested services. Window Advertising provides end-to-end fleet branding for companies with 2 to 200+ vehicles — consistent design across every vehicle, coordinated scheduling, and installation across Riyadh and Saudi Arabia.</p>

<h2>Get a Quote for Car Stickers in Riyadh</h2>
<p>Tell us your vehicle type, the number of vehicles, and your branding requirements. Our team will arrange a consultation, provide a vehicle-specific design mockup, and confirm pricing within 48 hours. Installation across Riyadh is included in our supply service.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of car stickers does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces full vehicle wraps, partial vehicle graphics, door and panel stickers, rear window perforated stickers, bonnet graphics, and fleet decals. All car stickers use high-quality vinyl films with UV-resistant inks rated for the Saudi outdoor climate."
      }
    },
    {
      "@type": "Question",
      "name": "Can car stickers be removed without damaging the vehicle paint?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising uses premium removable vinyl films that protect the original vehicle paint and can be cleanly removed without leaving residue or causing paint damage. We recommend professional removal by our team to ensure the best result."
      }
    },
    {
      "@type": "Question",
      "name": "How much does vehicle branding cost in Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Vehicle branding costs depend on the size of the vehicle, the percentage of coverage (partial or full wrap), and the number of vehicles. Window Advertising provides transparent, itemized quotes. Contact us with your vehicle type and fleet size for a free estimate."
      }
    },
    {
      "@type": "Question",
      "name": "How long do car stickers last in Saudi Arabia's climate?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "When properly installed using quality vinyl films and UV-resistant inks, car stickers from Window Advertising last 3 to 5 years in Saudi Arabia's outdoor conditions. We use materials specifically rated for high-temperature environments to prevent fading and peeling."
      }
    },
    {
      "@type": "Question",
      "name": "Do you handle fleet branding for multiple vehicles?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Fleet branding is one of our most requested services. Window Advertising provides end-to-end fleet branding for companies with 2 to 200+ vehicles — consistent design across every vehicle, coordinated scheduling, and installation across Riyadh and Saudi Arabia."
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
<p>تسافر المركبة ذات العلامة التجارية عبر آلاف المشاهدات يومياً على طرقات الرياض. استيكرات السيارات وإعلانات المركبات تحوّل أسطول شركتك إلى حملة إعلانية خارجية متنقلة — تصل إلى جمهور لا تصله أي لوحة إعلانية أو منشور على وسائل التواصل الاجتماعي. وينوو للإعلان يصمم ويطبع ويركّب استيكرات السيارات والرسومات البصرية للمركبات للشركات في جميع أنحاء المملكة العربية السعودية.</p>

<h2>ما هي استيكرات السيارات وإعلانات المركبات؟</h2>
<p>استيكرات السيارات وإعلانات المركبات هي رسومات فينيل مطبوعة تُلصق على السطح الخارجي للسيارات والشاحنات والدراجات النارية لعرض رسائل العلامة التجارية أثناء استخدام المركبة. من شعار بسيط ورقم هاتف على باب السيارة إلى تغليف كامل للمركبة بتصميم مميز، يُعد إعلان المركبات من أكثر أشكال الإعلان الخارجي فعالية من حيث التكلفة والوصول.</p>
<p>في الرياض، حيث الاستخدام المروري مرتفع وأوقات التنقل اليومية كبيرة، يمثل أسطول من المركبات ذات العلامة التجارية في حركة المرور تعرضاً إعلانياً مستمراً عبر المدينة. وينوو للإعلان يساعد الشركات على تحويل كل رحلة إلى انطباع عن علامتها التجارية.</p>

<h2>أنواع استيكرات السيارات التي ننتجها</h2>
<p>يقدم وينوو للإعلان مجموعة كاملة من رسومات المركبات لكل تطبيق وميزانية:</p>
<p><strong>التغليف الكامل للمركبة</strong> يغطي كامل السطح الخارجي للمركبة بتصميم مؤسسي متكامل. يقدم هذا الشكل أقصى تأثير بصري وهو الشكل الأكثر فعالية لإعلانات المركبات.</p>
<p><strong>الرسومات الجزئية للمركبة</strong> تغطي لوحات محددة مثل الأبواب أو غطاء المحرك أو الخلفية أو الجوانب — وتوفر حضوراً قوياً للعلامة التجارية بتكلفة أقل من التغليف الكامل. على عكس <a href="/ar/services/wall-stickers">استيكرات الجدران</a> الثابتة، يجب أن تتحمل رسومات المركبات ظروف الطريق والطقس القاسي.</p>
<p><strong>استيكرات الأبواب واللوحات</strong> هي تطبيقات ملصقات بسيطة ونظيفة تحمل اسم الشركة والشعار ورقم الهاتف والموقع الإلكتروني. تُستخدم عادةً على شاحنات التوصيل ومركبات الخدمة.</p>
<p><strong>استيكرات الزجاج الخلفي المثقبة</strong> تُطبق على الزجاج الخلفي وتُطبع على فينيل مثقب يسمح بالرؤية من الداخل مع عرض العلامة التجارية بالألوان الكاملة من الخارج.</p>
<p><strong>ملصقات الأسطول</strong> هي مجموعات ملصقات موحدة تُطبق بشكل متسق على الأسطول بأكمله، مما يضمن أن كل مركبة تحمل نفس التصميم والحجم والموضع.</p>

<h2>تصميم هوية الأسطول للشركات السعودية</h2>
<p>تصميم هوية الأسطول من أعلى الاستثمارات الإعلانية عائداً للشركات السعودية التي تمتلك مركبات. أسطول من 10 مركبات ذات علامة تجارية يتنقل عبر الرياض يولّد مئات الآلاف من المشاهدات الإعلانية شهرياً — بتكلفة أقل بكثير من الإعلانات الرقمية أو الخارجية المماثلة مثل <a href="/ar/services/banner-printing-installation">طباعة البانرات</a>.</p>
<p>يدير وينوو للإعلان مشاريع تصميم هوية الأسطول للشركات بدءاً من عمليات التوصيل الصغيرة وصولاً إلى الشركات الكبرى التي تمتلك مركبات في عدة مدن سعودية. تشمل خدمة تصميم هوية الأسطول لدينا توحيد التصميم والإنتاج المتسق عبر كل مركبة وجدولة التركيب المنسقة لتقليل الاضطراب التشغيلي.</p>
<p>من بين العلامات التجارية للأساطيل التي أدرناها شركات توصيل الطعام وشركات البناء التي تحتاج <a href="/ar/services/project-signboards-walls">لوحات المشاريع</a> ومقدمو الرعاية الصحية ومشغلو الخدمات اللوجستية والمقاولون الحكوميون — وجميعهم يتطلبون الاتساق والمتانة والنشر السريع.</p>

<h2>المواد وجودة الطباعة</h2>
<p>تعتمد جودة استيكرات السيارات كلياً على فيلم الفينيل والحبر المستخدم. يستخدم وينوو للإعلان أفلام فينيل كاست معتمدة دولياً مع أحبار مذيبات مقاومة للأشعة فوق البنفسجية مُختبرة خصيصاً لمناخ المملكة العربية السعودية — درجات حرارة عالية وأشعة شمس مباشرة شديدة وأمطار عرضية.</p>
<p>تتوافق أفلام الفينيل الكاست لدينا بسلاسة مع خطوط المركبة المعقدة، وتقاوم الرفع عند الحواف والوصلات، وتحافظ على حيوية الألوان لمدة 3 إلى 5 سنوات في ظروف الاستخدام الخارجي العادية. الأفلام الرخيصة المتوفرة في السوق تستخدم فينيل كالندرد بأحبار عادية تبهت خلال أشهر وتبدأ بالتقشر عند الحواف في بيئات الحرارة العالية. نحن لا نستخدم هذه المواد.</p>

<h2>التصميم والتصور قبل الإنتاج</h2>
<p>يبدأ كل طلب استيكرات سيارات بمرحلة تصميم. ينتج فريق التصميم لدينا — الذي يتولى أيضاً <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> — نموذجاً بصرياً خاصاً بالمركبة يُظهر بالضبط كيف ستبدو العلامة التجارية على طراز مركبتك. تراجع التصميم في سياقه — ترى الألوان وموضع الشعار والتكوين العام على تمثيل واقعي للمركبة — قبل طباعة ورقة فينيل واحدة.</p>
<p>تُزيل هذه العملية المفاجآت يوم التركيب وتضمن أن المركبة النهائية تتوافق مع هوية علامتك التجارية كما هو مقصود. المراجعات مشمولة حتى تكون راضياً عن التصميم.</p>

<h2>أعمالنا في استيكرات السيارات بالرياض</h2>
<p>استكشف معرض أعمالنا في مشاريع استيكرات السيارات وإعلانات المركبات في الرياض. من العلامة التجارية الشخصية لمركبة واحدة إلى حملات الأسطول متعددة المركبات، يعرض معرضنا نطاق رسومات المركبات التي أنتجها وركّبها وينوو للإعلان.</p>

<h2>الأسئلة الشائعة حول استيكرات السيارات</h2>

<h3>ما أنواع استيكرات السيارات التي ينتجها وينوو للإعلان؟</h3>
<p>ينتج وينوو للإعلان تغليف المركبات الكامل والرسومات الجزئية للمركبات واستيكرات الأبواب واللوحات واستيكرات الزجاج الخلفي المثقبة ورسومات غطاء المحرك وملصقات الأسطول. تستخدم جميع استيكرات السيارات أفلام فينيل عالية الجودة مع أحبار مقاومة للأشعة فوق البنفسجية مصنفة لمناخ السعودية الخارجي.</p>

<h3>هل يمكن إزالة استيكرات السيارات دون إتلاف طلاء المركبة؟</h3>
<p>نعم. يستخدم وينوو للإعلان أفلام فينيل قابلة للإزالة عالية الجودة تحمي طلاء المركبة الأصلي ويمكن إزالتها بنظافة دون ترك بقايا أو التسبب في تلف الطلاء. ننصح بالإزالة الاحترافية بواسطة فريقنا لضمان أفضل نتيجة.</p>

<h3>كم تكلفة تصميم هوية المركبة في الرياض؟</h3>
<p>تعتمد تكاليف تصميم هوية المركبة على حجم المركبة ونسبة التغطية (جزئية أو كاملة) وعدد المركبات. يقدم وينوو للإعلان عروض أسعار شفافة ومفصلة. تواصل معنا بنوع مركبتك وحجم أسطولك للحصول على تقدير مجاني.</p>

<h3>كم تدوم استيكرات السيارات في مناخ المملكة العربية السعودية؟</h3>
<p>عند التركيب الصحيح باستخدام أفلام فينيل عالية الجودة وأحبار مقاومة للأشعة فوق البنفسجية، تدوم استيكرات السيارات من وينوو للإعلان من 3 إلى 5 سنوات في ظروف المملكة العربية السعودية الخارجية. نستخدم مواد مصنفة خصيصاً لبيئات الحرارة العالية لمنع البهتان والتقشر.</p>

<h3>هل تتولون تصميم هوية الأسطول لعدة مركبات؟</h3>
<p>نعم. تصميم هوية الأسطول من أكثر خدماتنا طلباً. يقدم وينوو للإعلان خدمة تصميم هوية أسطول متكاملة للشركات التي تمتلك من 2 إلى أكثر من 200 مركبة — تصميم متسق عبر كل مركبة وجدولة منسقة وتركيب في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<h2>احصل على عرض سعر لاستيكرات سيارتك</h2>
<p>أخبرنا بنوع مركبتك وعدد المركبات ومتطلبات علامتك التجارية. سيرتب فريقنا استشارة ويقدم نموذجاً بصرياً خاصاً بمركبتك ويؤكد التسعير خلال 48 ساعة. التركيب في جميع أنحاء الرياض مشمول في خدمة التوريد لدينا.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع استيكرات السيارات التي ينتجها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ينتج وينوو للإعلان تغليف المركبات الكامل والرسومات الجزئية للمركبات واستيكرات الأبواب واللوحات واستيكرات الزجاج الخلفي المثقبة ورسومات غطاء المحرك وملصقات الأسطول. تستخدم جميع استيكرات السيارات أفلام فينيل عالية الجودة مع أحبار مقاومة للأشعة فوق البنفسجية مصنفة لمناخ السعودية الخارجي."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن إزالة استيكرات السيارات دون إتلاف طلاء المركبة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. يستخدم وينوو للإعلان أفلام فينيل قابلة للإزالة عالية الجودة تحمي طلاء المركبة الأصلي ويمكن إزالتها بنظافة دون ترك بقايا أو التسبب في تلف الطلاء. ننصح بالإزالة الاحترافية بواسطة فريقنا لضمان أفضل نتيجة."
      }
    },
    {
      "@type": "Question",
      "name": "كم تكلفة تصميم هوية المركبة في الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تعتمد تكاليف تصميم هوية المركبة على حجم المركبة ونسبة التغطية (جزئية أو كاملة) وعدد المركبات. يقدم وينوو للإعلان عروض أسعار شفافة ومفصلة. تواصل معنا بنوع مركبتك وحجم أسطولك للحصول على تقدير مجاني."
      }
    },
    {
      "@type": "Question",
      "name": "كم تدوم استيكرات السيارات في مناخ المملكة العربية السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "عند التركيب الصحيح باستخدام أفلام فينيل عالية الجودة وأحبار مقاومة للأشعة فوق البنفسجية، تدوم استيكرات السيارات من وينوو للإعلان من 3 إلى 5 سنوات في ظروف المملكة العربية السعودية الخارجية. نستخدم مواد مصنفة خصيصاً لبيئات الحرارة العالية لمنع البهتان والتقشر."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولون تصميم هوية الأسطول لعدة مركبات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تصميم هوية الأسطول من أكثر خدماتنا طلباً. يقدم وينوو للإعلان خدمة تصميم هوية أسطول متكاملة للشركات التي تمتلك من 2 إلى أكثر من 200 مركبة — تصميم متسق عبر كل مركبة وجدولة منسقة وتركيب في جميع أنحاء الرياض والمملكة العربية السعودية."
      }
    }
  ]
}
</script>
HTML;
    }
};
