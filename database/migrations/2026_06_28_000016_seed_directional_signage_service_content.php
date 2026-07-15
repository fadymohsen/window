<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'directional-signage';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/directional-signage.webp',
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
            'title' => 'Directional Signage',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Directional Signage in Riyadh | Wayfinding Signs Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom directional signage and wayfinding systems in Riyadh. Window Advertising designs and manufactures directional signs for offices, buildings, events, hospitals, and construction sites across Saudi Arabia. Branded advertising signs installed professionally. Get a free quote.',
            'meta_keywords' => 'directional signage Riyadh, wayfinding signs Saudi Arabia, directional signs Riyadh, office signage Riyadh, دعاية واعلان الرياض, لافتات إرشادية الرياض, أسوار مشاريع, دعاية واعلان السعودية',
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
            'title' => 'لافتات إرشادية',
            'content' => $this->getArabicContent(),
            'meta_title' => 'لافتات إرشادية في الرياض | إشارات توجيهية السعودية | ويندو للإعلان',
            'meta_description' => 'لافتات إرشادية وأنظمة توجيهية مخصصة في الرياض — ويندو للإعلان يصمم وينتج لافتات الإرشاد للمكاتب والمباني والفعاليات والمستشفيات ومواقع البناء. دعاية واعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'لافتات إرشادية الرياض, إشارات توجيهية السعودية, دعاية واعلان الرياض, أسوار مشاريع, دعاية واعلان السعودية, لافتات بناء الرياض',
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
        $service = DB::table('services')->where('slug', 'directional-signage')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Directional signage is the silent navigation layer of every well-organized building, campus, and event. When visitors, employees, and clients can find their way without assistance, it reflects positively on the organization that runs the space. Window Advertising designs and manufactures directional signage and wayfinding systems for offices, hospitals, hotels, construction projects, and events across Riyadh and Saudi Arabia — fully bilingual in Arabic and English, professionally installed.</p>

<h2>Why Professional Directional Signage Matters</h2>
<p>A visitor who cannot find the reception, the conference room, or the parking entrance forms a negative impression before the meeting even starts. Directional signage is not decoration — it is a functional system that shapes the experience of everyone who enters your space.</p>
<p>In Riyadh's corporate and institutional environment, professionally designed wayfinding systems signal operational competence and organizational clarity. They reduce the burden on reception staff, improve the experience of first-time visitors, and contribute to the professional advertising image that your organization presents to the outside world. Window Advertising designs directional signage that integrates with your corporate identity and the physical character of your space.</p>

<h2>Types of Directional Signage We Produce</h2>
<p>Window Advertising manufactures the complete range of directional signage formats required by buildings and events across Saudi Arabia:</p>
<p>Overhead suspended signs are mounted from ceilings in corridors, lobbies, and open-plan spaces. They provide visibility from a distance and are the preferred format for high-traffic areas where signs must be legible at the entry point of a corridor.</p>
<p>Wall-mounted directional arrow signs are the most widely used format — a panel with directional text, icons, and an arrow, mounted at eye level on a wall or partition. Available in a range of materials from brushed aluminum and acrylic to backlit LED panels.</p>
<p>Door name plates identify individual rooms, offices, and departments. Window Advertising produces aluminum name plates, acrylic name plates, and LED backlit name plate systems in coordinated designs that match the wider sign system.</p>
<p>Floor directories present the complete building layout on a single large sign panel at the building entrance or elevator lobby, allowing visitors to orientate themselves before moving through the space.</p>
<p>Construction <a href="/en/services/project-signboards-walls">project signboards and walls</a> serve the dual function of marking a construction site boundary and communicating the project identity to the public. These are coordinated with the contractor's corporate advertising identity and often carry project renderings, developer branding, and regulatory information.</p>
<p>Event wayfinding signs are produced for temporary use at conferences, exhibitions, and large-scale events — guiding attendees from parking areas, building entrances, and lobbies to their destinations within the event space. These are often paired with <a href="/en/services/banner-printing-installation">banner printing</a> and <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> for a complete event branding package.</p>

<h2>Bilingual Signage for the Saudi Market</h2>
<p>Every directional sign produced by Window Advertising for the Saudi market is available in bilingual Arabic and English format. Our design team handles Arabic typesetting and layout — not a translated afterthought, but a properly composed, correctly sized Arabic text that functions as the primary language layer for Saudi audiences.</p>
<p>Sign systems for government buildings, hospitals, and educational institutions typically require Arabic as the primary language with English secondary. Corporate and hospitality environments in Riyadh frequently specify equal-weight bilingual presentation. Window Advertising designs for both requirements and advises on the optimal language hierarchy for your specific application.</p>

<h2>Materials and Construction</h2>
<p>The material specification for directional signage depends on the environment, the sign's location relative to light sources, and the desired aesthetic. Window Advertising works with the full range of materials used in professional wayfinding systems:</p>
<p>Brushed aluminum and stainless steel produce a corporate finish that suits premium office environments and institutional settings. These can be used as flat panels, laser-cut letters, or framed sign systems. For standalone dimensional lettering, see our <a href="/en/services/embossed-letters">embossed letters</a> service.</p>
<p>Acrylic panels are lighter than metal and available in a wide range of colors and finishes. Laser engraved acrylic signs are popular for office door name plates and room identification.</p>
<p>Backlit LED sign panels provide illumination and increased visibility in low-light corridors and entrances. Available in slim profiles suitable for wall flush-mounting. For larger digital signage solutions, see our <a href="/en/services/display-screens">display screens</a> service.</p>
<p>High-pressure laminate panels are durable, scratch-resistant, and cost-effective for large sign programs across hospitals and educational campuses.</p>

<h2>Construction Site and Project Signage</h2>
<p>Construction project walls and site signboards are a specialized category of directional and advertising signage in Riyadh. They mark the site boundary, communicate the project's developer and contractor identity to passing traffic, and in many cases present architectural renderings of the completed development.</p>
<p>Window Advertising produces construction site <a href="/en/services/project-signboards-walls">project signboards and walls</a> with printed vinyls, aluminum composite panels, and large-format printed wraps applied to hoarding structures. These serve both a regulatory function — communicating required project information — and an advertising function for the developer. Project walls are among our most requested sign types for construction clients in Riyadh.</p>

<h2>Frequently Asked Questions About Directional Signage</h2>

<h3>What types of directional signage does Window Advertising produce?</h3>
<p>Window Advertising produces the full range of directional signage including overhead suspended signs, wall-mounted directional arrows, door name plates, floor directories, elevator signs, parking signage, construction site project boards, and event wayfinding signs. All signs are available in bilingual Arabic and English for the Saudi market.</p>

<h3>Do you install the directional signs or just supply them?</h3>
<p>Window Advertising provides both supply-only and full supply-and-install options for directional signage. Our installation team handles mounting, alignment, and cable management for overhead suspended signs, wall-mounted systems, and post-mounted outdoor signs. We coordinate installation scheduling to minimize disruption to building operations.</p>

<h3>Can directional signs be bilingual in Arabic and English?</h3>
<p>Yes. Bilingual Arabic and English directional signage is our standard output for the Saudi market. Arabic text is set in approved calligraphic typefaces and sized correctly relative to the English translation. Our design team follows standard wayfinding typography guidelines to ensure both languages are equally legible at the sign's intended viewing distance.</p>

<h3>What is the typical timeline for a directional signage project?</h3>
<p>A complete directional signage project — from site survey and design through to fabrication and installation — typically takes 2 to 4 weeks depending on the number of sign types, complexity of installation, and building access requirements. Simple event or construction site signage can be produced and installed in 3 to 7 business days.</p>

<h2>Get a Directional Signage Quote in Riyadh</h2>
<p>Tell us the type of facility, the number of sign types required, and your installation timeline. Our team performs a site assessment and provides a complete sign program design and pricing proposal. Full fabrication and installation included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of directional signage does Window Advertising produce?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising produces the full range of directional signage including overhead suspended signs, wall-mounted directional arrows, door name plates, floor directories, elevator signs, parking signage, construction site project boards, and event wayfinding signs. All signs are available in bilingual Arabic and English for the Saudi market."
      }
    },
    {
      "@type": "Question",
      "name": "Do you install the directional signs or just supply them?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising provides both supply-only and full supply-and-install options for directional signage. Our installation team handles mounting, alignment, and cable management for overhead suspended signs, wall-mounted systems, and post-mounted outdoor signs. We coordinate installation scheduling to minimize disruption to building operations."
      }
    },
    {
      "@type": "Question",
      "name": "Can directional signs be bilingual in Arabic and English?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Bilingual Arabic and English directional signage is our standard output for the Saudi market. Arabic text is set in approved calligraphic typefaces and sized correctly relative to the English translation. Our design team follows standard wayfinding typography guidelines to ensure both languages are equally legible at the sign's intended viewing distance."
      }
    },
    {
      "@type": "Question",
      "name": "What is the typical timeline for a directional signage project?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A complete directional signage project — from site survey and design through to fabrication and installation — typically takes 2 to 4 weeks depending on the number of sign types, complexity of installation, and building access requirements. Simple event or construction site signage can be produced and installed in 3 to 7 business days."
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
<p>اللافتات الإرشادية هي طبقة التنقل الصامتة في كل مبنى وحرم جامعي وفعالية منظمة بشكل جيد. عندما يتمكن الزوار والموظفون والعملاء من إيجاد طريقهم دون مساعدة، فإن ذلك ينعكس إيجابياً على المنظمة التي تدير المكان. ويندو للإعلان يصمم وينتج اللافتات الإرشادية وأنظمة التوجيه للمكاتب والمستشفيات والفنادق ومشاريع البناء والفعاليات في جميع أنحاء الرياض والمملكة العربية السعودية — ثنائية اللغة بالعربية والإنجليزية، مع تركيب احترافي.</p>

<h2>أهمية اللافتات الإرشادية الاحترافية</h2>
<p>الزائر الذي لا يستطيع إيجاد الاستقبال أو قاعة الاجتماعات أو مدخل المواقف يكوّن انطباعاً سلبياً قبل أن يبدأ الاجتماع. اللافتات الإرشادية ليست ديكوراً — إنها نظام وظيفي يشكل تجربة كل من يدخل مساحتك.</p>
<p>في البيئة المؤسسية والحكومية في الرياض، تعكس أنظمة التوجيه المصممة باحترافية الكفاءة التشغيلية والوضوح التنظيمي. فهي تقلل العبء على موظفي الاستقبال، وتحسّن تجربة الزوار لأول مرة، وتساهم في صورة الدعاية والإعلان المهنية التي تقدمها منظمتك للعالم الخارجي. ويندو للإعلان يصمم لافتات إرشادية تتكامل مع هويتك المؤسسية والطابع المادي لمساحتك.</p>

<h2>أنواع اللافتات الإرشادية التي ننتجها</h2>
<p>ينتج ويندو للإعلان المجموعة الكاملة من أشكال اللافتات الإرشادية المطلوبة للمباني والفعاليات في جميع أنحاء المملكة العربية السعودية:</p>
<p>اللافتات المعلقة من السقف تُثبت في الممرات والردهات والمساحات المفتوحة. توفر رؤية من مسافة بعيدة وهي الشكل المفضل للمناطق ذات الحركة العالية حيث يجب أن تكون اللافتات مقروءة من نقطة دخول الممر.</p>
<p>لافتات الأسهم الاتجاهية المثبتة على الجدران هي الشكل الأكثر استخداماً — لوحة بنص اتجاهي وأيقونات وسهم، مثبتة على مستوى العين على جدار أو قاطع. متوفرة بمجموعة من المواد من الألمنيوم المصقول والأكريليك إلى لوحات LED المضيئة.</p>
<p>لوحات أسماء الأبواب تحدد الغرف والمكاتب والأقسام الفردية. ينتج ويندو للإعلان لوحات أسماء من الألمنيوم والأكريليك وأنظمة لوحات أسماء LED مضيئة بتصاميم متناسقة تتوافق مع نظام اللافتات الأوسع.</p>
<p>أدلة الطوابق تعرض التخطيط الكامل للمبنى على لوحة لافتة كبيرة واحدة عند مدخل المبنى أو ردهة المصعد، مما يتيح للزوار التوجه قبل التحرك عبر المساحة.</p>
<p>جدران مشاريع البناء و<a href="/ar/services/project-signboards-walls">لوحات المشاريع الإعلانية</a> تخدم وظيفة مزدوجة في تحديد حدود موقع البناء وإيصال هوية المشروع للجمهور. يتم تنسيقها مع هوية المقاول المؤسسية وغالباً ما تحمل رسومات المشروع وعلامة المطور والمعلومات التنظيمية.</p>
<p>لافتات التوجيه للفعاليات تُنتج للاستخدام المؤقت في المؤتمرات والمعارض والفعاليات الكبرى — لتوجيه الحضور من مناطق المواقف ومداخل المباني والردهات إلى وجهاتهم داخل مساحة الفعالية. غالباً ما تُقرن مع <a href="/ar/services/banner-printing-installation">طباعة البانرات</a> و<a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a> لحزمة علامة تجارية متكاملة للفعاليات.</p>

<h2>لافتات ثنائية اللغة للسوق السعودية</h2>
<p>كل لافتة إرشادية ينتجها ويندو للإعلان للسوق السعودية متوفرة بتنسيق ثنائي اللغة بالعربية والإنجليزية. يتولى فريق التصميم لدينا التنضيد والتخطيط العربي — ليس ترجمة لاحقة، بل نص عربي مؤلف بشكل صحيح وبحجم مناسب يعمل كطبقة اللغة الأساسية للجمهور السعودي.</p>
<p>تتطلب أنظمة اللافتات للمباني الحكومية والمستشفيات والمؤسسات التعليمية عادةً العربية كلغة أساسية مع الإنجليزية كلغة ثانوية. بينما تحدد البيئات المؤسسية والضيافة في الرياض في كثير من الأحيان عرضاً ثنائي اللغة متساوي الوزن. يصمم ويندو للإعلان لكلا المتطلبين وينصح بالتسلسل اللغوي الأمثل لتطبيقك المحدد.</p>

<h2>المواد والتصنيع</h2>
<p>تعتمد مواصفات المواد للافتات الإرشادية على البيئة وموقع اللافتة بالنسبة لمصادر الإضاءة والجمالية المطلوبة. يعمل ويندو للإعلان مع المجموعة الكاملة من المواد المستخدمة في أنظمة التوجيه الاحترافية:</p>
<p>الألمنيوم المصقول والفولاذ المقاوم للصدأ ينتجان تشطيباً مؤسسياً يناسب بيئات المكاتب الفاخرة والإعدادات المؤسسية. يمكن استخدامها كلوحات مسطحة أو حروف مقطوعة بالليزر أو أنظمة لافتات مؤطرة. للحروف البارزة المستقلة، انظر خدمة <a href="/ar/services/embossed-letters">الحروف البارزة</a> لدينا.</p>
<p>لوحات الأكريليك أخف من المعدن ومتوفرة بمجموعة واسعة من الألوان والتشطيبات. لافتات الأكريليك المنقوشة بالليزر شائعة للوحات أسماء أبواب المكاتب وتحديد الغرف.</p>
<p>لوحات لافتات LED المضيئة توفر إنارة ورؤية متزايدة في الممرات والمداخل منخفضة الإضاءة. متوفرة بملفات تعريف نحيفة مناسبة للتركيب المسطح على الجدار. لحلول اللافتات الرقمية الأكبر، انظر خدمة <a href="/ar/services/display-screens">شاشات العرض</a> لدينا.</p>
<p>لوحات اللامينيت عالي الضغط متينة ومقاومة للخدش وفعالة من حيث التكلفة لبرامج اللافتات الكبيرة في المستشفيات والحرم الجامعي التعليمي.</p>

<h2>لافتات مواقع البناء والمشاريع</h2>
<p>جدران مشاريع البناء ولوحات المواقع هي فئة متخصصة من اللافتات الإرشادية والإعلانية في الرياض. تحدد حدود الموقع وتوصل هوية مطور ومقاول المشروع لحركة المرور، وفي كثير من الحالات تعرض رسومات معمارية للتطوير المكتمل.</p>
<p>ينتج ويندو للإعلان <a href="/ar/services/project-signboards-walls">لوحات مشاريع البناء وأسوار المشاريع</a> بالفينيل المطبوع ولوحات الألمنيوم المركب والأغلفة المطبوعة بالحجم الكبير المطبقة على هياكل السياج. تخدم هذه وظيفة تنظيمية — في إيصال معلومات المشروع المطلوبة — ووظيفة إعلانية للمطور. أسوار المشاريع هي من بين أكثر أنواع اللافتات طلباً لعملاء البناء في الرياض.</p>

<h2>الأسئلة الشائعة حول اللافتات الإرشادية</h2>

<h3>ما أنواع اللافتات الإرشادية التي ينتجها ويندو للإعلان؟</h3>
<p>ينتج ويندو للإعلان المجموعة الكاملة من اللافتات الإرشادية بما في ذلك اللافتات المعلقة من السقف والأسهم الاتجاهية المثبتة على الجدران ولوحات أسماء الأبواب وأدلة الطوابق ولافتات المصاعد ولافتات المواقف ولوحات مشاريع مواقع البناء ولافتات التوجيه للفعاليات. جميع اللافتات متوفرة بالعربية والإنجليزية للسوق السعودية.</p>

<h3>هل تقومون بتركيب اللافتات الإرشادية أم توريدها فقط؟</h3>
<p>يوفر ويندو للإعلان خيارات التوريد فقط والتوريد والتركيب الكامل للافتات الإرشادية. يتولى فريق التركيب لدينا التثبيت والمحاذاة وإدارة الكابلات للافتات المعلقة من السقف والأنظمة المثبتة على الجدران واللافتات الخارجية المثبتة على أعمدة. ننسق جدولة التركيب لتقليل التأثير على عمليات المبنى.</p>

<h3>هل يمكن أن تكون اللافتات الإرشادية ثنائية اللغة بالعربية والإنجليزية؟</h3>
<p>نعم. اللافتات الإرشادية ثنائية اللغة بالعربية والإنجليزية هي إنتاجنا المعتاد للسوق السعودية. يُضبط النص العربي بخطوط خطية معتمدة ويُحجم بشكل صحيح بالنسبة للترجمة الإنجليزية. يتبع فريق التصميم لدينا إرشادات الطباعة التوجيهية القياسية لضمان أن تكون كلتا اللغتين مقروءتين بنفس القدر من مسافة المشاهدة المقصودة للافتة.</p>

<h3>ما هو الجدول الزمني النموذجي لمشروع لافتات إرشادية؟</h3>
<p>مشروع لافتات إرشادية كامل — من المسح الميداني والتصميم حتى التصنيع والتركيب — يستغرق عادةً من أسبوعين إلى 4 أسابيع حسب عدد أنواع اللافتات وتعقيد التركيب ومتطلبات الوصول للمبنى. يمكن إنتاج وتركيب لافتات الفعاليات أو مواقع البناء البسيطة في 3 إلى 7 أيام عمل.</p>

<h2>احصل على عرض سعر للافتات الإرشادية في الرياض</h2>
<p>أخبرنا بنوع المنشأة وعدد أنواع اللافتات المطلوبة والجدول الزمني للتركيب. يقوم فريقنا بتقييم الموقع ويقدم تصميم برنامج لافتات كامل وعرض تسعير. التصنيع والتركيب الكامل مشمولان.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع اللافتات الإرشادية التي ينتجها ويندو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ينتج ويندو للإعلان المجموعة الكاملة من اللافتات الإرشادية بما في ذلك اللافتات المعلقة من السقف والأسهم الاتجاهية المثبتة على الجدران ولوحات أسماء الأبواب وأدلة الطوابق ولافتات المصاعد ولافتات المواقف ولوحات مشاريع مواقع البناء ولافتات التوجيه للفعاليات. جميع اللافتات متوفرة بالعربية والإنجليزية للسوق السعودية."
      }
    },
    {
      "@type": "Question",
      "name": "هل تقومون بتركيب اللافتات الإرشادية أم توريدها فقط؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يوفر ويندو للإعلان خيارات التوريد فقط والتوريد والتركيب الكامل للافتات الإرشادية. يتولى فريق التركيب لدينا التثبيت والمحاذاة وإدارة الكابلات للافتات المعلقة من السقف والأنظمة المثبتة على الجدران واللافتات الخارجية المثبتة على أعمدة. ننسق جدولة التركيب لتقليل التأثير على عمليات المبنى."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن أن تكون اللافتات الإرشادية ثنائية اللغة بالعربية والإنجليزية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. اللافتات الإرشادية ثنائية اللغة بالعربية والإنجليزية هي إنتاجنا المعتاد للسوق السعودية. يُضبط النص العربي بخطوط خطية معتمدة ويُحجم بشكل صحيح بالنسبة للترجمة الإنجليزية. يتبع فريق التصميم لدينا إرشادات الطباعة التوجيهية القياسية لضمان أن تكون كلتا اللغتين مقروءتين بنفس القدر من مسافة المشاهدة المقصودة للافتة."
      }
    },
    {
      "@type": "Question",
      "name": "ما هو الجدول الزمني النموذجي لمشروع لافتات إرشادية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "مشروع لافتات إرشادية كامل — من المسح الميداني والتصميم حتى التصنيع والتركيب — يستغرق عادةً من أسبوعين إلى 4 أسابيع حسب عدد أنواع اللافتات وتعقيد التركيب ومتطلبات الوصول للمبنى. يمكن إنتاج وتركيب لافتات الفعاليات أو مواقع البناء البسيطة في 3 إلى 7 أيام عمل."
      }
    }
  ]
}
</script>
HTML;
    }
};
