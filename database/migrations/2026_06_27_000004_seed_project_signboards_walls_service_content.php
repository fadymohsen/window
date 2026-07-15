<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'project-signboards-walls';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/project-signboards-walls.webp',
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
            'title' => 'Project Signboards & Walls',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Project Signboards & Wall Printing in Riyadh | Window Advertising',
            'meta_description' => 'Custom project signboards and construction wall printing in Riyadh. Window Advertising manufactures and installs project identity signs, hoarding walls, and branded boundary walls for developers and contractors across Saudi Arabia. Get a free quote.',
            'meta_keywords' => 'project signboards Riyadh, construction hoarding Saudi Arabia, project wall printing Riyadh, construction site signs Saudi Arabia, developer hoarding Riyadh',
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
            'title' => 'لوحات المشاريع والأسوار',
            'content' => $this->getArabicContent(),
            'meta_title' => 'لوحات المشاريع وطباعة الأسوار في الرياض | ويندو للإعلان',
            'meta_description' => 'تصنيع وتركيب لوحات المشاريع وطباعة الأسوار في الرياض — لوحات هوية المشاريع وأسوار البناء والإعلانات الخارجية للمطورين والمقاولين في المملكة العربية السعودية. احصل على عرض سعر مجاني.',
            'meta_keywords' => 'لوحات مشاريع الرياض, أسوار دعائية مطبوعة السعودية, طباعة أسوار البناء الرياض, لافتات مواقع البناء, لوحات التطوير العقاري الرياض',
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
        $service = DB::table('services')->where('slug', 'project-signboards-walls')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Construction sites are high-visibility real estate. Window Advertising turns project boundaries and development sites into powerful brand statements — designing, printing, and installing project identity signboards and hoarding walls for developers, contractors, and government projects across Riyadh and Saudi Arabia.</p>

<h2>What Are Project Signboards &amp; Hoarding Walls?</h2>
<p>Project signboards are large, professionally designed identity signs installed at real estate, infrastructure, and construction sites. They communicate the project name, developer brand, architect, and timeline to passersby — and are often required by Saudi municipal regulations on active construction sites.</p>
<p>Hoarding walls (also called project hoarding or boundary hoarding) are the continuous printed barriers that surround a construction site perimeter. They protect the public, define the site boundary, and act as a long-running outdoor advertising canvas for the project brand — visible to thousands of people daily.</p>
<p>Together, project signboards and hoarding walls are the primary branding tool for any development project before a building is complete. They work alongside <a href="/en/services/embossed-letters">embossed letters</a> and other signage to establish a complete project identity.</p>

<h2>Types of Project Signboards We Produce</h2>
<p>Window Advertising produces and installs a full range of project signboards for the Saudi construction and real estate market:</p>
<p><strong>Main Project Identity Boards:</strong> The flagship sign for your project — large format, branded with the project name, developer logo, architect, and render. Typically mounted at the main site entrance.</p>
<p><strong>Regulatory and Permit Boards:</strong> Required by most Saudi municipalities — displaying municipality-required information including permit number, contractor name, and project duration.</p>
<p><strong>Directional Site Signs:</strong> Wayfinding signs within and around a large development — directing visitors, suppliers, and workers to the correct entrances, offices, or zones. See our <a href="/en/services/directional-signage">directional signage</a> services for more.</p>
<p><strong>Sales Center Signage:</strong> Branded signage around temporary sales offices and showrooms attached to large real estate developments.</p>
<p><strong>Infrastructure Project Boards:</strong> Large-format identification boards for road, utility, and infrastructure projects — compliant with government project branding requirements.</p>

<h2>Construction Hoarding Walls — Design &amp; Printing</h2>
<p>Our hoarding wall service covers everything from design to final installation:</p>
<p><strong>Design:</strong> Our creative team develops the hoarding artwork using your project brand identity — incorporating the project name, renders, developer branding, and any regulatory messaging. We provide a full digital proof before production.</p>
<p><strong>Printing:</strong> We print on large-format fabric, PVC, or rigid panel substrates using UV-resistant inks engineered for outdoor use in Saudi Arabia's climate. Colors remain vivid despite intense sun exposure.</p>
<p><strong>Substrate Options:</strong></p>
<ul>
<li>Mesh banner fabric: allows wind through — ideal for high-wind or exposed locations</li>
<li>Solid PVC-coated fabric: full-color, opaque, weatherproof</li>
<li>Dibond aluminum composite panels: rigid, premium finish for permanent or semi-permanent installations</li>
<li>Corrugated polycarbonate: translucent panels for perimeter lighting applications</li>
</ul>
<p><strong>Structural Mounting:</strong> We design and install the metal frame structure that holds the hoarding. Frames are engineered for the wind load requirements of Riyadh's climate.</p>
<p>For additional wall branding options, explore our <a href="/en/services/banner-printing-installation">banner printing &amp; installation</a> and <a href="/en/services/wall-stickers">wall stickers</a> services.</p>

<h2>Why Quality Project Signboards Matter</h2>
<p>In Saudi Arabia's competitive real estate market, a well-executed project board does more than meet a regulatory requirement — it builds market confidence. Buyers, investors, and the public form an impression of your project's quality from the first visual contact with your hoarding.</p>
<p>A poorly printed, faded, or structurally compromised hoarding communicates neglect. A crisp, professionally designed and maintained hoarding communicates a developer who delivers on quality — before a single unit is sold.</p>
<p>Window Advertising understands this. We apply the same design and production standards to a hoarding wall as we do to any major brand campaign — because your project's reputation starts at the perimeter fence.</p>

<h2>Our Project Signboard &amp; Hoarding Process</h2>
<ol>
<li><strong>Site Assessment</strong> — we visit the site (or work from your site plan) to measure and assess the installation environment.</li>
<li><strong>Design</strong> — our team develops artwork based on your brand identity and project information.</li>
<li><strong>Proof Approval</strong> — you review and approve the digital proof before production.</li>
<li><strong>Print Production</strong> — all materials are produced at our Riyadh facility.</li>
<li><strong>Delivery &amp; Installation</strong> — our structural crew delivers and installs on your timeline.</li>
<li><strong>Maintenance</strong> — for long-duration projects, we offer periodic inspection and replacement of worn panels.</li>
</ol>

<h2>Frequently Asked Questions About Project Signboards</h2>

<h3>What are project signboards used for in Saudi Arabia?</h3>
<p>Project signboards are large-format identity signs installed at real estate development sites, construction projects, infrastructure works, and government projects. They display the project name, developer branding, architect credits, and project timeline. In Saudi Arabia, project signboards are also required by most municipalities on active construction sites.</p>

<h3>What is the difference between project signboards and hoarding walls?</h3>
<p>Project signboards are standalone identification signs — typically a single large panel displaying the project identity. Hoarding walls (also called hoarding boards or boundary walls) are continuous printed barriers that wrap around the perimeter of a construction site, combining safety boundary with brand communications. Window Advertising provides both.</p>

<h3>What materials do you use for construction hoarding walls?</h3>
<p>We use weather-resistant materials suited to Saudi Arabia's climate: mesh banner fabric (for wind-permeable applications), solid PVC-coated fabric, dibond aluminum composite panels, and corrugated polycarbonate. All materials use UV-resistant inks to prevent fading in direct sunlight.</p>

<h3>Do you handle large-scale project signboard installations across Riyadh?</h3>
<p>Yes. Window Advertising installs project signboards and hoarding walls across Riyadh, with projects handled citywide. Our installation crew manages the full site visit, structural mounting, and all hardware required for a complete, weatherproof installation.</p>

<h3>Can you match our developer's brand guidelines for the hoarding design?</h3>
<p>Absolutely. We work from your brand guidelines, project identity documents, or any visual reference you provide. Our design team produces a digital proof for your approval before printing begins — ensuring the final hoarding matches your corporate standards exactly.</p>

<h2>Get a Quote for Your Project Signboards</h2>
<p>Tell us your project name, site location, approximate dimensions, and timeline. We'll visit the site if needed and provide a complete supply-and-install quote within 48 hours. We work with developers, main contractors, and government project offices.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What are project signboards used for in Saudi Arabia?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Project signboards are large-format identity signs installed at real estate development sites, construction projects, infrastructure works, and government projects. They display the project name, developer branding, architect credits, and project timeline. In Saudi Arabia, project signboards are also required by most municipalities on active construction sites."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between project signboards and hoarding walls?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Project signboards are standalone identification signs — typically a single large panel displaying the project identity. Hoarding walls (also called hoarding boards or boundary walls) are continuous printed barriers that wrap around the perimeter of a construction site, combining safety boundary with brand communications. Window Advertising provides both."
      }
    },
    {
      "@type": "Question",
      "name": "What materials do you use for construction hoarding walls?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We use weather-resistant materials suited to Saudi Arabia's climate: mesh banner fabric (for wind-permeable applications), solid PVC-coated fabric, dibond aluminum composite panels, and corrugated polycarbonate. All materials use UV-resistant inks to prevent fading in direct sunlight."
      }
    },
    {
      "@type": "Question",
      "name": "Do you handle large-scale project signboard installations across Riyadh?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising installs project signboards and hoarding walls across Riyadh, with projects handled citywide. Our installation crew manages the full site visit, structural mounting, and all hardware required for a complete, weatherproof installation."
      }
    },
    {
      "@type": "Question",
      "name": "Can you match our developer's brand guidelines for the hoarding design?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely. We work from your brand guidelines, project identity documents, or any visual reference you provide. Our design team produces a digital proof for your approval before printing begins — ensuring the final hoarding matches your corporate standards exactly."
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
<p>مواقع البناء هي عقارات عالية الرؤية. تحوّل ويندو للإعلان حدود المشاريع ومواقع التطوير إلى بيانات علامة تجارية قوية — تصميم وطباعة وتركيب لوحات هوية المشاريع وأسوار البناء للمطورين والمقاولين والمشاريع الحكومية في جميع أنحاء الرياض والمملكة العربية السعودية.</p>

<h2>ما هي لوحات المشاريع وأسوار البناء؟</h2>
<p>لوحات المشاريع هي لافتات هوية كبيرة مصممة باحترافية تُركب في مواقع التطوير العقاري والبنية التحتية والبناء. تعرض اسم المشروع وعلامة المطور التجارية والمهندس المعماري والجدول الزمني للمارة — وغالباً ما تكون مطلوبة من قبل الأنظمة البلدية السعودية في مواقع البناء النشطة.</p>
<p>أسوار البناء (وتُسمى أيضاً الحواجز الإعلانية أو الأسوار المحيطة) هي حواجز مطبوعة متصلة تحيط بمحيط موقع البناء. تحمي الجمهور وتحدد حدود الموقع وتعمل كلوحة إعلانية خارجية طويلة الأمد للعلامة التجارية للمشروع — مرئية لآلاف الأشخاص يومياً.</p>
<p>معاً، تعد لوحات المشاريع وأسوار البناء أداة العلامة التجارية الأساسية لأي مشروع تطوير قبل اكتمال المبنى. تعمل جنباً إلى جنب مع <a href="/ar/services/embossed-letters">الأحرف البارزة</a> ولافتات أخرى لإنشاء هوية مشروع كاملة.</p>

<h2>أنواع لوحات المشاريع التي ننتجها</h2>
<p>تنتج وتركب ويندو للإعلان مجموعة كاملة من لوحات المشاريع لسوق البناء والعقارات السعودي:</p>
<p><strong>لوحات هوية المشروع الرئيسية:</strong> اللافتة الرئيسية لمشروعك — كبيرة الحجم، تحمل اسم المشروع وشعار المطور والمهندس المعماري والتصور. عادةً ما تُثبت عند المدخل الرئيسي للموقع.</p>
<p><strong>لوحات التنظيم والتصاريح:</strong> مطلوبة من معظم البلديات السعودية — تعرض المعلومات المطلوبة بلدياً بما في ذلك رقم التصريح واسم المقاول ومدة المشروع.</p>
<p><strong>لافتات التوجيه:</strong> لافتات إرشادية داخل وحول التطوير الكبير — توجه الزوار والموردين والعمال إلى المداخل أو المكاتب أو المناطق الصحيحة. اطلع على خدمات <a href="/ar/services/directional-signage">اللافتات الإرشادية</a> لدينا لمزيد من المعلومات.</p>
<p><strong>لافتات مركز المبيعات:</strong> لافتات ذات علامة تجارية حول مكاتب المبيعات المؤقتة وصالات العرض المرتبطة بالتطويرات العقارية الكبيرة.</p>
<p><strong>لوحات مشاريع البنية التحتية:</strong> لوحات تعريف كبيرة الحجم لمشاريع الطرق والمرافق والبنية التحتية — متوافقة مع متطلبات العلامة التجارية للمشاريع الحكومية.</p>

<h2>أسوار البناء الإعلانية — التصميم والطباعة</h2>
<p>تغطي خدمة أسوار البناء لدينا كل شيء من التصميم إلى التركيب النهائي:</p>
<p><strong>التصميم:</strong> يطور فريقنا الإبداعي أعمال السور الفنية باستخدام هوية مشروعك — مدمجاً اسم المشروع والتصورات والعلامة التجارية للمطور وأي رسائل تنظيمية. نقدم نموذجاً رقمياً كاملاً قبل الإنتاج.</p>
<p><strong>الطباعة:</strong> نطبع على قماش كبير الحجم أو PVC أو ألواح صلبة باستخدام أحبار مقاومة للأشعة فوق البنفسجية مصممة للاستخدام الخارجي في مناخ المملكة العربية السعودية. تبقى الألوان زاهية رغم التعرض المكثف لأشعة الشمس.</p>
<p><strong>خيارات الركائز:</strong></p>
<ul>
<li>قماش بانر شبكي: يسمح بمرور الهواء — مثالي للمواقع المعرضة للرياح</li>
<li>قماش PVC صلب: ملون بالكامل، معتم، مقاوم للطقس</li>
<li>ألواح ألمنيوم مركبة (ديبوند): صلبة، تشطيب فاخر للتركيبات الدائمة أو شبه الدائمة</li>
<li>بولي كربونات مموج: ألواح شفافة لتطبيقات الإضاءة المحيطة</li>
</ul>
<p><strong>التثبيت الهيكلي:</strong> نصمم ونركب الهيكل المعدني الذي يحمل السور. الهياكل مصممة لمتطلبات حمل الرياح في مناخ الرياض.</p>
<p>لخيارات إضافية لعلامة الجدران التجارية، استكشف خدمات <a href="/ar/services/banner-printing-installation">طباعة وتركيب البانرات</a> و<a href="/ar/services/wall-stickers">ملصقات الجدران</a>.</p>

<h2>لماذا تهم جودة لوحات المشاريع؟</h2>
<p>في سوق العقارات التنافسي في المملكة العربية السعودية، لوحة المشروع المنفذة بإتقان تفعل أكثر من تلبية متطلب تنظيمي — إنها تبني الثقة في السوق. يشكل المشترون والمستثمرون والجمهور انطباعاً عن جودة مشروعك من أول اتصال بصري مع السور.</p>
<p>السور المطبوع بشكل سيء أو الباهت أو المتضرر هيكلياً يعبر عن الإهمال. السور الواضح والمصمم باحترافية والمُعتنى به يعبر عن مطور يلتزم بالجودة — قبل بيع وحدة واحدة.</p>
<p>تدرك ويندو للإعلان هذا. نطبق نفس معايير التصميم والإنتاج على سور البناء كما نفعل مع أي حملة علامة تجارية كبرى — لأن سمعة مشروعك تبدأ من السور المحيط.</p>

<h2>مراحل تنفيذ لوحات مشروعك</h2>
<ol>
<li><strong>تقييم الموقع</strong> — نزور الموقع (أو نعمل من مخطط موقعك) لقياس وتقييم بيئة التركيب.</li>
<li><strong>التصميم</strong> — يطور فريقنا الأعمال الفنية بناءً على هوية علامتك التجارية ومعلومات المشروع.</li>
<li><strong>اعتماد النموذج</strong> — تراجع وتوافق على النموذج الرقمي قبل الإنتاج.</li>
<li><strong>الإنتاج الطباعي</strong> — تُنتج جميع المواد في منشأتنا بالرياض.</li>
<li><strong>التسليم والتركيب</strong> — يسلم فريقنا الهيكلي ويركب وفق جدولك الزمني.</li>
<li><strong>الصيانة</strong> — للمشاريع طويلة المدة، نقدم فحصاً دورياً واستبدال الألواح البالية.</li>
</ol>

<h2>الأسئلة الشائعة حول لوحات المشاريع</h2>

<h3>ما استخدامات لوحات المشاريع في المملكة العربية السعودية؟</h3>
<p>لوحات المشاريع هي لافتات هوية كبيرة الحجم تُركب في مواقع التطوير العقاري ومشاريع البناء وأعمال البنية التحتية والمشاريع الحكومية. تعرض اسم المشروع والعلامة التجارية للمطور وتقدير المهندس المعماري والجدول الزمني للمشروع. في المملكة العربية السعودية، تُطلب لوحات المشاريع أيضاً من معظم البلديات في مواقع البناء النشطة.</p>

<h3>ما الفرق بين لوحات المشاريع وأسوار البناء؟</h3>
<p>لوحات المشاريع هي لافتات تعريف مستقلة — عادةً لوحة كبيرة واحدة تعرض هوية المشروع. أسوار البناء (وتُسمى أيضاً ألواح الحواجز أو الأسوار المحيطة) هي حواجز مطبوعة متصلة تلتف حول محيط موقع البناء، تجمع بين الحاجز الأمني والاتصالات التجارية. توفر ويندو للإعلان كليهما.</p>

<h3>ما المواد التي تستخدمونها لأسوار البناء؟</h3>
<p>نستخدم مواد مقاومة للطقس مناسبة لمناخ المملكة العربية السعودية: قماش بانر شبكي (للتطبيقات المنفذة للرياح)، وقماش PVC صلب، وألواح ألمنيوم مركبة (ديبوند)، وبولي كربونات مموج. جميع المواد تستخدم أحباراً مقاومة للأشعة فوق البنفسجية لمنع البهتان تحت أشعة الشمس المباشرة.</p>

<h3>هل تتولون تركيب لوحات المشاريع الكبيرة في جميع أنحاء الرياض؟</h3>
<p>نعم. تركب ويندو للإعلان لوحات المشاريع وأسوار البناء في جميع أنحاء الرياض، مع مشاريع تُنفذ على مستوى المدينة. يدير فريق التركيب لدينا الزيارة الميدانية الكاملة والتثبيت الهيكلي وجميع المعدات المطلوبة لتركيب كامل ومقاوم للطقس.</p>

<h3>هل يمكنكم مطابقة إرشادات العلامة التجارية لمطورنا في تصميم السور؟</h3>
<p>بالتأكيد. نعمل من إرشادات علامتك التجارية أو وثائق هوية المشروع أو أي مرجع بصري تقدمه. ينتج فريق التصميم لدينا نموذجاً رقمياً لموافقتك قبل بدء الطباعة — لضمان مطابقة السور النهائي لمعاييرك المؤسسية بدقة.</p>

<h2>احصل على عرض سعر للوحات مشروعك</h2>
<p>أخبرنا باسم مشروعك وموقعه والأبعاد التقريبية والجدول الزمني. سنزور الموقع إذا لزم الأمر ونقدم عرض سعر شامل للتوريد والتركيب خلال 48 ساعة. نعمل مع المطورين والمقاولين الرئيسيين ومكاتب المشاريع الحكومية.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما استخدامات لوحات المشاريع في المملكة العربية السعودية؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "لوحات المشاريع هي لافتات هوية كبيرة الحجم تُركب في مواقع التطوير العقاري ومشاريع البناء وأعمال البنية التحتية والمشاريع الحكومية. تعرض اسم المشروع والعلامة التجارية للمطور وتقدير المهندس المعماري والجدول الزمني للمشروع. في المملكة العربية السعودية، تُطلب لوحات المشاريع أيضاً من معظم البلديات في مواقع البناء النشطة."
      }
    },
    {
      "@type": "Question",
      "name": "ما الفرق بين لوحات المشاريع وأسوار البناء؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "لوحات المشاريع هي لافتات تعريف مستقلة — عادةً لوحة كبيرة واحدة تعرض هوية المشروع. أسوار البناء (وتُسمى أيضاً ألواح الحواجز أو الأسوار المحيطة) هي حواجز مطبوعة متصلة تلتف حول محيط موقع البناء، تجمع بين الحاجز الأمني والاتصالات التجارية. توفر ويندو للإعلان كليهما."
      }
    },
    {
      "@type": "Question",
      "name": "ما المواد التي تستخدمونها لأسوار البناء؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نستخدم مواد مقاومة للطقس مناسبة لمناخ المملكة العربية السعودية: قماش بانر شبكي (للتطبيقات المنفذة للرياح)، وقماش PVC صلب، وألواح ألمنيوم مركبة (ديبوند)، وبولي كربونات مموج. جميع المواد تستخدم أحباراً مقاومة للأشعة فوق البنفسجية لمنع البهتان تحت أشعة الشمس المباشرة."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولون تركيب لوحات المشاريع الكبيرة في جميع أنحاء الرياض؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تركب ويندو للإعلان لوحات المشاريع وأسوار البناء في جميع أنحاء الرياض، مع مشاريع تُنفذ على مستوى المدينة. يدير فريق التركيب لدينا الزيارة الميدانية الكاملة والتثبيت الهيكلي وجميع المعدات المطلوبة لتركيب كامل ومقاوم للطقس."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم مطابقة إرشادات العلامة التجارية لمطورنا في تصميم السور؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "بالتأكيد. نعمل من إرشادات علامتك التجارية أو وثائق هوية المشروع أو أي مرجع بصري تقدمه. ينتج فريق التصميم لدينا نموذجاً رقمياً لموافقتك قبل بدء الطباعة — لضمان مطابقة السور النهائي لمعاييرك المؤسسية بدقة."
      }
    }
  ]
}
</script>
HTML;
    }
};
