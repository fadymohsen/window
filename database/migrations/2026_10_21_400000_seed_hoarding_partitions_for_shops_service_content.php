<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'hoarding-partitions-for-shops';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image'      => 'services/hoarding-partitions-for-shops.webp',
                'slug'       => $slug,
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
            'title'            => 'Hoarding & Partitions for Shops',
            'content'          => $this->getEnglishContent(),
            'meta_title'       => 'Shop Hoarding & Partitions in Riyadh | Store Renovation Barriers | Window',
            'meta_description' => 'Professional shop hoarding and partition installation in Riyadh — branded renovation barriers, store remodeling partitions, and mall hoarding solutions. Window Advertising designs, prints, and installs shop hoardings across Saudi Arabia.',
            'meta_keywords'    => 'shop hoarding Riyadh, store partitions Riyadh, mall hoarding Saudi Arabia, renovation barriers shops, shop remodeling hoarding, branded hoarding installation, هوردنج محلات, ساتر محلات الرياض',
        ];

        if ($enExists) {
            DB::table('service_translations')
                ->where('service_id', $serviceId)
                ->where('locale', 'en')
                ->update($enData);
        } else {
            DB::table('service_translations')->insert(array_merge($enData, [
                'service_id' => $serviceId,
                'locale'     => 'en',
            ]));
        }

        // Arabic translation
        $arExists = DB::table('service_translations')
            ->where('service_id', $serviceId)
            ->where('locale', 'ar')
            ->exists();

        $arData = [
            'title'            => 'هوردنج وساتر للمحلات',
            'content'          => $this->getArabicContent(),
            'meta_title'       => 'هوردنج وساتر محلات في الرياض | تنفيذ سواتر تجديد المحلات | ويندو',
            'meta_description' => 'تنفيذ هوردنج وساتر للمحلات في الرياض — سواتر إعلانية لتجديد المحلات والمعارض ومراكز التسوق. تصميم وطباعة وتركيب من وكالة ويندو للدعاية والإعلان.',
            'meta_keywords'    => 'هوردنج محلات الرياض, ساتر محلات الرياض, هوردنج تجديد محل, ساتر تجديد محلات, هوردنج مول, سواتر محلات تجارية, تركيب هوردنج محلات السعودية, هوردنج إعلاني للمحلات',
        ];

        if ($arExists) {
            DB::table('service_translations')
                ->where('service_id', $serviceId)
                ->where('locale', 'ar')
                ->update($arData);
        } else {
            DB::table('service_translations')->insert(array_merge($arData, [
                'service_id' => $serviceId,
                'locale'     => 'ar',
            ]));
        }
    }

    public function down(): void
    {
        $service = DB::table('services')->where('slug', 'hoarding-partitions-for-shops')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>When a shop closes temporarily for renovation, refitting, or rebranding, the barrier around it becomes the most visible surface in the mall or street. A blank plywood wall signals disruption — a professionally designed hoarding turns that same space into a brand statement that builds anticipation for what's coming next. Window Advertising designs, prints, and installs shop hoarding and partitions for retailers, restaurants, and commercial brands across Riyadh and Saudi Arabia.</p>

<h2>What Is Shop Hoarding?</h2>
<p>Shop hoarding is a temporary barrier installed around a retail unit during renovation, fit-out, or remodeling. In malls and commercial streets, the hoarding conceals the construction activity behind it and presents a clean, branded surface to the public. A well-executed hoarding serves two purposes simultaneously: it meets the mall or municipality's requirement for a safe, neat barrier, and it turns that barrier into an advertising opportunity — announcing the upcoming opening, reinforcing the brand identity, and maintaining the store's presence even while it's closed.</p>
<p>Shop partitions serve a similar function inside operating stores, separating an active retail area from a section undergoing work — allowing the business to continue serving customers while renovation happens behind the partition.</p>

<h2>When Do You Need Shop Hoarding?</h2>
<ul>
<li><strong>New store fit-out:</strong> covering the unit from handover until opening day while the interior is being built.</li>
<li><strong>Store renovation or rebranding:</strong> concealing construction work during a refresh of the interior, fixtures, or brand identity.</li>
<li><strong>Partial remodeling:</strong> installing an internal partition to separate the work zone from the trading floor so the store can remain open.</li>
<li><strong>Temporary closure:</strong> maintaining a professional branded presence during a seasonal closure or relocation transition.</li>
<li><strong>Mall common-area work:</strong> branded barriers around escalator refurbishment, corridor upgrades, or shared-space construction.</li>
</ul>

<h2>What Does the Service Include?</h2>
<p>Window Advertising handles the full process from site survey to final installation:</p>
<ul>
<li><strong>Site survey and measurement:</strong> confirming dimensions, structural fixing options, and mall or landlord requirements before any design work begins.</li>
<li><strong>Design:</strong> creating the hoarding artwork — the brand's logo, coming-soon messaging, opening date, architectural renders, and contact details — laid out to the exact panel dimensions and suited to the viewing distance and foot traffic direction.</li>
<li><strong>Printing:</strong> high-resolution large-format printing on materials suited to the location — whether indoor mall hoarding or outdoor street-facing barriers.</li>
<li><strong>Structure and installation:</strong> building the frame, fixing the panels, and installing the printed surface — coordinated with mall management schedules and contractor access windows.</li>
<li><strong>Removal:</strong> dismantling the hoarding cleanly when the renovation is complete and the store is ready to open.</li>
</ul>

<h2>Mall Hoarding Requirements in Riyadh</h2>
<p>Malls in Riyadh typically enforce specific hoarding standards for tenants undergoing fit-out or renovation. These may include minimum finish quality, approved materials, fire-rating requirements, height restrictions, and design approval by mall management before installation. Some malls also require hoarding artwork to follow a specific template or include mall branding alongside the tenant's design.</p>
<p>Window Advertising is experienced in working within these requirements. We coordinate with mall management teams to ensure the hoarding meets all technical and aesthetic standards before fabrication begins — avoiding costly rejections and delays.</p>

<h2>Street-Facing and Outdoor Shop Hoarding</h2>
<p>For shops on commercial streets or stand-alone locations, outdoor hoarding needs to withstand weather exposure while maintaining print quality. Window Advertising uses weather-resistant materials and UV-stable inks for outdoor installations, with structural fixing suited to the site conditions — whether mounting to an existing facade, freestanding frames, or temporary anchoring systems.</p>
<p>Outdoor shop hoarding may also need to comply with municipal signage regulations. We verify the applicable requirements before design and installation to avoid compliance issues. For projects that include <a href="/en/services/project-signboards-walls">project signboards and hoarding walls</a> around larger construction sites, our team handles both the retail hoarding and the site-perimeter hoarding as a coordinated project.</p>

<h2>Design That Works at Retail Scale</h2>
<p>Shop hoarding design is not the same as billboard design or event backdrop design. The viewing distance is short — often just a few meters — and the audience is walking past at a pace that gives the hoarding only a few seconds to communicate. Effective shop hoarding design prioritizes:</p>
<ul>
<li>Clear brand identification — logo, name, and visual identity recognizable at a glance.</li>
<li>A concise message — "Opening Soon," a date, or a teaser — not a wall of text.</li>
<li>High-quality imagery — architectural renders, product shots, or lifestyle images at print resolution.</li>
<li>Contact information or a QR code for customers who want updates.</li>
<li>Panel-aware layout — ensuring key elements aren't split across joints or obscured by structural columns.</li>
</ul>
<p>Our design team works with your <a href="/en/services/corporate-visual-identity-design">brand identity guidelines</a> to produce hoarding artwork that is consistent with the rest of your brand presence.</p>

<h2>Frequently Asked Questions</h2>

<h3>How long does it take to design and install shop hoarding?</h3>
<p>Typical turnaround is 5 to 10 business days from confirmed design brief to installation, depending on hoarding size, mall approval timelines, and print complexity. Rush production is available for urgent fit-out schedules.</p>

<h3>Can you install hoarding inside a mall during operating hours?</h3>
<p>Yes. Most mall installations are scheduled during off-peak hours or overnight to minimize disruption. We coordinate installation timing with mall management and work within their access policies.</p>

<h3>Do you handle the structural frame or just the printed panels?</h3>
<p>We handle both. Window Advertising supplies and installs the full hoarding system — structural frame, panel substrate, and printed surface — as a turnkey service.</p>

<h3>Can I update the hoarding design during the renovation period?</h3>
<p>Yes. If your opening date changes or you want to update the messaging partway through, we can produce and install replacement panels without rebuilding the frame.</p>

<h3>Do you provide hoarding for restaurant and F&B fit-outs?</h3>
<p>Yes. Restaurant and F&B hoarding often includes menu teasers, brand storytelling, and appetite-driven imagery. We design and install hoarding specifically for food and beverage concepts across malls and standalone locations in Riyadh.</p>

<h2>Request a Shop Hoarding Quote</h2>
<p>Tell us the location, unit dimensions, and your timeline. Our team will survey the site, confirm the requirements, and provide a detailed quote covering design, print, structure, and installation. <a href="/en/contact">Get in touch</a> to discuss your project.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How long does it take to design and install shop hoarding?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Typical turnaround is 5 to 10 business days from confirmed design brief to installation, depending on hoarding size, mall approval timelines, and print complexity. Rush production is available for urgent fit-out schedules."
      }
    },
    {
      "@type": "Question",
      "name": "Can you install hoarding inside a mall during operating hours?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Most mall installations are scheduled during off-peak hours or overnight to minimize disruption. We coordinate installation timing with mall management and work within their access policies."
      }
    },
    {
      "@type": "Question",
      "name": "Do you handle the structural frame or just the printed panels?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We handle both. Window Advertising supplies and installs the full hoarding system — structural frame, panel substrate, and printed surface — as a turnkey service."
      }
    },
    {
      "@type": "Question",
      "name": "Can I update the hoarding design during the renovation period?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. If your opening date changes or you want to update the messaging partway through, we can produce and install replacement panels without rebuilding the frame."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide hoarding for restaurant and F&B fit-outs?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Restaurant and F&B hoarding often includes menu teasers, brand storytelling, and appetite-driven imagery. We design and install hoarding specifically for food and beverage concepts across malls and standalone locations in Riyadh."
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
<p>عندما يُغلق محل تجاري مؤقتًا للتجديد أو إعادة التأهيل أو تغيير الهوية، يصبح الساتر المحيط به أكثر سطح مرئي في المول أو الشارع التجاري. جدار خشبي فارغ يوحي بالفوضى — أما هوردنج مصمم باحترافية فيحوّل نفس المساحة إلى واجهة إعلانية تبني التشوق لما هو قادم. تصمم وكالة ويندو للدعاية والإعلان وتطبع وتركب هوردنج وسواتر المحلات للعلامات التجارية والمطاعم والمتاجر في الرياض والمملكة العربية السعودية.</p>

<h2>ما هو هوردنج المحلات؟</h2>
<p>هوردنج المحلات هو حاجز مؤقت يُركب حول الوحدة التجارية أثناء أعمال التجديد أو التأهيل أو إعادة التصميم. في مراكز التسوق والشوارع التجارية، يحجب الهوردنج أعمال البناء خلفه ويقدم سطحًا نظيفًا يحمل هوية العلامة التجارية للجمهور. الهوردنج المنفذ باحترافية يؤدي وظيفتين في آن واحد: يلبي اشتراطات المول أو الجهة البلدية من حيث السلامة والمظهر، ويحوّل هذا الحاجز إلى فرصة إعلانية — للإعلان عن الافتتاح القادم، وتعزيز الهوية البصرية، والحفاظ على حضور المتجر حتى أثناء إغلاقه.</p>
<p>أما سواتر المحلات الداخلية فتؤدي وظيفة مشابهة داخل المتاجر العاملة، حيث تفصل منطقة البيع النشطة عن الجزء الذي يخضع لأعمال التجديد — مما يسمح للمحل بمواصلة خدمة العملاء بينما تجري الأعمال خلف الساتر.</p>

<h2>متى تحتاج إلى هوردنج للمحل؟</h2>
<ul>
<li><strong>تأهيل محل جديد:</strong> تغطية الوحدة من لحظة الاستلام حتى يوم الافتتاح أثناء بناء التصميم الداخلي.</li>
<li><strong>تجديد المحل أو تغيير الهوية:</strong> حجب أعمال البناء أثناء تحديث الديكور الداخلي أو التركيبات أو العلامة التجارية.</li>
<li><strong>تعديل جزئي:</strong> تركيب ساتر داخلي لفصل منطقة العمل عن صالة البيع حتى يبقى المحل مفتوحًا.</li>
<li><strong>إغلاق مؤقت:</strong> الحفاظ على واجهة احترافية تحمل العلامة التجارية أثناء إغلاق موسمي أو انتقال.</li>
<li><strong>أعمال في المناطق المشتركة بالمول:</strong> سواتر إعلانية حول صيانة السلالم المتحركة أو ترقية الممرات أو أعمال البناء في المساحات المشتركة.</li>
</ul>

<h2>ماذا تشمل الخدمة؟</h2>
<p>تتولى وكالة ويندو للدعاية والإعلان العملية الكاملة من المعاينة حتى التركيب النهائي:</p>
<ul>
<li><strong>معاينة الموقع والقياس:</strong> التأكد من الأبعاد وخيارات التثبيت ومتطلبات إدارة المول أو المالك قبل بدء التصميم.</li>
<li><strong>التصميم:</strong> إعداد تصميم الهوردنج — شعار العلامة التجارية، ورسالة "قريبًا"، وتاريخ الافتتاح، والتصميمات المعمارية، ومعلومات التواصل — بتوزيع يتناسب مع أبعاد الألواح ومسافة المشاهدة واتجاه حركة الزوار.</li>
<li><strong>الطباعة:</strong> طباعة عالية الدقة بأحجام كبيرة على خامات تناسب الموقع — سواء هوردنج داخلي في مول أو سواتر خارجية مطلة على الشارع.</li>
<li><strong>الهيكل والتركيب:</strong> بناء الإطار وتثبيت الألواح وتركيب السطح المطبوع — بالتنسيق مع جداول إدارة المول ونوافذ دخول المقاولين.</li>
<li><strong>الإزالة:</strong> فك الهوردنج بشكل نظيف عند اكتمال التجديد وجاهزية المحل للافتتاح.</li>
</ul>

<h2>اشتراطات الهوردنج في مولات الرياض</h2>
<p>تفرض مراكز التسوق في الرياض عادةً معايير محددة للهوردنج على المستأجرين أثناء التأهيل أو التجديد. قد تشمل هذه المعايير الحد الأدنى من جودة التشطيب، والخامات المعتمدة، ومتطلبات مقاومة الحريق، وقيود الارتفاع، وموافقة إدارة المول على التصميم قبل التركيب. بعض المولات تشترط أيضًا أن يتبع تصميم الهوردنج قالبًا محددًا أو يتضمن شعار المول إلى جانب تصميم المستأجر.</p>
<p>تتمتع وكالة ويندو بخبرة في العمل ضمن هذه الاشتراطات. ننسق مع فرق إدارة المولات لضمان توافق الهوردنج مع جميع المعايير الفنية والجمالية قبل بدء التصنيع — لتجنب الرفض والتأخير المكلف.</p>

<h2>هوردنج المحلات الخارجية والمطلة على الشارع</h2>
<p>بالنسبة للمحلات الواقعة على الشوارع التجارية أو المواقع المستقلة، يحتاج الهوردنج الخارجي إلى تحمّل العوامل الجوية مع الحفاظ على جودة الطباعة. تستخدم وكالة ويندو خامات مقاومة للعوامل الجوية وأحبارًا ثابتة ضد الأشعة فوق البنفسجية للتركيبات الخارجية، مع نظام تثبيت هيكلي يناسب ظروف الموقع — سواء التركيب على واجهة قائمة أو إطارات مستقلة أو أنظمة تثبيت مؤقتة.</p>
<p>قد يحتاج هوردنج المحلات الخارجي أيضًا إلى الامتثال للوائح اللوحات البلدية. نتحقق من المتطلبات المعمول بها قبل التصميم والتركيب لتجنب أي مشكلات تنظيمية. وللمشاريع التي تشمل <a href="/ar/services/project-signboards-walls">أسوار ولوحات المشاريع</a> حول مواقع البناء الأكبر، يتولى فريقنا تنفيذ هوردنج المحل وسور الموقع كمشروع متكامل.</p>

<h2>تصميم يعمل على مقياس التجزئة</h2>
<p>تصميم هوردنج المحلات يختلف عن تصميم اللوحات الإعلانية الكبيرة أو خلفيات الفعاليات. مسافة المشاهدة قصيرة — غالبًا أمتار قليلة فقط — والجمهور يمر بسرعة تمنح الهوردنج ثوانٍ معدودة للتواصل. التصميم الفعال لهوردنج المحلات يركز على:</p>
<ul>
<li>وضوح هوية العلامة التجارية — الشعار والاسم والهوية البصرية واضحة من النظرة الأولى.</li>
<li>رسالة مختصرة — "قريبًا" أو تاريخ أو تشويق — وليس جدارًا من النصوص.</li>
<li>صور عالية الجودة — تصميمات معمارية أو صور منتجات أو صور بدقة طباعة مناسبة.</li>
<li>معلومات التواصل أو رمز QR للعملاء الراغبين بمتابعة المستجدات.</li>
<li>تصميم يراعي الألواح — بحيث لا تنقسم العناصر الرئيسية على الوصلات أو تُحجب بأعمدة هيكلية.</li>
</ul>
<p>يعمل فريق التصميم لدينا وفق <a href="/ar/services/corporate-visual-identity-design">إرشادات هويتك البصرية</a> لإنتاج تصميم هوردنج متسق مع باقي حضور علامتك التجارية.</p>

<h2>الأسئلة الشائعة</h2>

<h3>كم يستغرق تصميم وتركيب هوردنج المحل؟</h3>
<p>المدة النموذجية من 5 إلى 10 أيام عمل من اعتماد ملخص التصميم حتى التركيب، حسب حجم الهوردنج ومدة موافقة المول ومتطلبات الطباعة. يتوفر إنتاج سريع لجداول التأهيل العاجلة.</p>

<h3>هل يمكنكم تركيب الهوردنج داخل المول أثناء ساعات العمل؟</h3>
<p>نعم. معظم تركيبات المولات تُجدول خارج أوقات الذروة أو خلال الليل لتقليل الإزعاج. ننسق توقيت التركيب مع إدارة المول ونعمل ضمن سياسات الدخول الخاصة بهم.</p>

<h3>هل تتولون الهيكل أم الألواح المطبوعة فقط؟</h3>
<p>نتولى الاثنين معًا. وكالة ويندو توفر وتركب نظام الهوردنج الكامل — الإطار الهيكلي وألواح التركيب والسطح المطبوع — كخدمة متكاملة.</p>

<h3>هل يمكن تحديث تصميم الهوردنج أثناء فترة التجديد؟</h3>
<p>نعم. إذا تغير تاريخ الافتتاح أو أردت تحديث الرسالة في منتصف الفترة، يمكننا إنتاج وتركيب ألواح بديلة دون إعادة بناء الإطار.</p>

<h3>هل تقدمون هوردنج لتأهيل المطاعم والمقاهي؟</h3>
<p>نعم. هوردنج المطاعم والمقاهي غالبًا يتضمن تشويقات القائمة وقصة العلامة التجارية وصورًا تفتح الشهية. نصمم ونركب هوردنج مخصص لمفاهيم الأغذية والمشروبات في المولات والمواقع المستقلة بالرياض.</p>

<h2>اطلب عرض سعر لهوردنج المحلات</h2>
<p>أخبرنا بالموقع وأبعاد الوحدة والجدول الزمني. سيعاين فريقنا الموقع ويؤكد المتطلبات ويقدم عرض سعر تفصيلي يشمل التصميم والطباعة والهيكل والتركيب. <a href="/ar/contact">تواصل معنا</a> لمناقشة مشروعك.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "كم يستغرق تصميم وتركيب هوردنج المحل؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "المدة النموذجية من 5 إلى 10 أيام عمل من اعتماد ملخص التصميم حتى التركيب، حسب حجم الهوردنج ومدة موافقة المول ومتطلبات الطباعة. يتوفر إنتاج سريع لجداول التأهيل العاجلة."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم تركيب الهوردنج داخل المول أثناء ساعات العمل؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. معظم تركيبات المولات تُجدول خارج أوقات الذروة أو خلال الليل لتقليل الإزعاج. ننسق توقيت التركيب مع إدارة المول ونعمل ضمن سياسات الدخول الخاصة بهم."
      }
    },
    {
      "@type": "Question",
      "name": "هل تتولون الهيكل أم الألواح المطبوعة فقط؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نتولى الاثنين معًا. وكالة ويندو توفر وتركب نظام الهوردنج الكامل — الإطار الهيكلي وألواح التركيب والسطح المطبوع — كخدمة متكاملة."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن تحديث تصميم الهوردنج أثناء فترة التجديد؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. إذا تغير تاريخ الافتتاح أو أردت تحديث الرسالة في منتصف الفترة، يمكننا إنتاج وتركيب ألواح بديلة دون إعادة بناء الإطار."
      }
    },
    {
      "@type": "Question",
      "name": "هل تقدمون هوردنج لتأهيل المطاعم والمقاهي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. هوردنج المطاعم والمقاهي غالبًا يتضمن تشويقات القائمة وقصة العلامة التجارية وصورًا تفتح الشهية. نصمم ونركب هوردنج مخصص لمفاهيم الأغذية والمشروبات في المولات والمواقع المستقلة بالرياض."
      }
    }
  ]
}
</script>
HTML;
    }
};
