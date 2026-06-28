<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = '3d-fabrication';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/3d-fabrication.webp',
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
            'title' => '3D Fabrication',
            'content' => $this->getEnglishContent(),
            'meta_title' => '3D Fabrication in Riyadh | 3D Signage and Letters Saudi Arabia | Window Advertising',
            'meta_description' => '3D fabrication and signage in Riyadh. Window Advertising fabricates 3D letters, logo signs, raised signage, exhibition structures, and custom 3D advertising elements for companies across Saudi Arabia. Premium fabrication for retail, corporate, and exhibition applications. Get a free quote.',
            'meta_keywords' => '3D fabrication Riyadh, 3D letters signage Saudi Arabia, 3D logo signs Riyadh, raised signage Saudi Arabia, exhibition structures Riyadh, دعاية واعلان الرياض, حروف ثلاثية الأبعاد الرياض, بوثات معارض, أسوار مشاريع, دعاية واعلان السعودية',
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
            'title' => 'التصنيع ثلاثي الأبعاد',
            'content' => $this->getArabicContent(),
            'meta_title' => 'تصنيع ثلاثي الأبعاد في الرياض | حروف وعلامات ثلاثية الأبعاد السعودية | وينوو للإعلان',
            'meta_description' => 'تصنيع وتركيب عناصر ثلاثية الأبعاد في الرياض — وينوو للإعلان يصنع حروفاً وشعارات وعلامات ثلاثية الأبعاد وهياكل معارض وعناصر إعلانية مخصصة للشركات في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'تصنيع ثلاثي الأبعاد الرياض, حروف ثلاثية الأبعاد السعودية, دعاية واعلان الرياض, بوثات معارض, أسوار مشاريع, دعاية واعلان السعودية, علامات ثلاثية الأبعاد الرياض',
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
        $service = DB::table('services')->where('slug', '3d-fabrication')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Three-dimensional signage and fabricated advertising elements occupy the premium tier of the physical brand environment — they communicate weight, permanence, and investment in a way that printed flat graphics alone cannot. Window Advertising fabricates custom 3D letters, logos, signage, exhibition structures, and advertising elements for companies across Riyadh and Saudi Arabia, from reception wall logos to full exhibition booth structural builds.</p>

<h2>Why 3D Fabrication Transforms Brand Environments</h2>
<p>The visual impact of a three-dimensional fabricated logo on a reception wall versus a flat printed version is not a matter of degree — it is a categorical difference in how the brand registers with visitors. A raised, brushed aluminum or backlit acrylic logo communicates that the organization has invested in its physical environment and values the impression it makes on clients and partners.</p>
<p>In Saudi Arabia's corporate culture, where first impressions at client meetings carry significant weight, a premium reception environment with quality fabricated <a href="/en/services/directional-signage">directional signage</a> is a business asset. Window Advertising advises clients on the specification of 3D signage that matches their brand's positioning and the environment where it will be installed.</p>

<h2>3D Letters and Logo Signs</h2>
<p>Three-dimensional letter and logo signs are the most common application of 3D fabrication in the corporate environment. Window Advertising fabricates:</p>
<p><strong>Acrylic 3D Letters:</strong> The most versatile option — available in any color through paint or vinyl, capable of illumination from the front or back, and suitable for indoor reception walls, office entrance doors, and retail storefronts. Acrylic letters can be front-printed or edge-lit to create a glowing effect without visible light sources. Our <a href="/en/services/3d-designs">3D designs</a> team works with you to select the optimal finish and configuration.</p>
<p><strong>Brushed Aluminum 3D Letters:</strong> A premium, contemporary finish appropriate for professional services firms, financial organizations, and companies that want to communicate precision and quality. Aluminum letters are durable, light-weight for large-format applications, and age well in indoor environments.</p>
<p><strong>Stainless Steel Letters:</strong> In brushed or mirror finish, the most premium specification for corporate reception signage — used in flagship locations, headquarters lobbies, and environments where the signage is expected to make a definitive statement. These are often paired with a refined <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> to ensure brand consistency.</p>
<p><strong>Backlit Halo Letters:</strong> These create a glow effect against the wall surface behind the sign — the letters themselves are solid, but LED lighting installed behind them produces a perimeter light halo. This effect is visually striking in reception environments and hotel lobbies.</p>

<h2>Exhibition Structures and Booth Fabrication</h2>
<p>Beyond signage, 3D fabrication enables the structural elements of exhibition booth environments: the branded reception counter, the product display podium, the overhead arch that frames the booth entrance, the feature wall that anchors the display. Window Advertising fabricates these structural booth elements as part of a complete <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> for clients exhibiting at trade shows and events across Riyadh and Saudi Arabia.</p>
<p>Fabricated booth elements are designed to be assembled and disassembled for repeated use across multiple events — reducing the per-event cost of exhibiting compared to fabricating new elements for each exhibition.</p>

<h2>Construction Site Hoardings and Outdoor Structures</h2>
<p>For construction projects and development sites across Riyadh, three-dimensional fabricated elements on <a href="/en/services/signage">project hoardings</a> create an advertising presence that elevates the site's perception while construction is underway. Large-format 3D logo installations, branded architectural elements on hoardings, and fabricated signage totems create a distinctive presence for major construction and real estate projects in Saudi Arabia's development market.</p>
<p>Window Advertising fabricates outdoor 3D advertising elements rated for Riyadh's outdoor climate conditions — materials and fixings specified for heat, dust, and UV exposure.</p>

<h2>Frequently Asked Questions About 3D Fabrication</h2>

<h3>What materials does Window Advertising use for 3D fabrication?</h3>
<p>Window Advertising fabricates 3D elements in acrylic (available in clear, colored, and mirror finishes), brushed and polished aluminum, stainless steel (brushed, mirror, and powder-coated), high-density foam with painted or vinyl-covered finish, ABS plastic, and composite panel materials. The material specification depends on the installation environment, lighting requirements, and the finish required by the brand identity.</p>

<h3>Can you fabricate illuminated 3D signs with LED lighting?</h3>
<p>Yes. Window Advertising fabricates illuminated 3D signage with integrated LED lighting in several configurations: front-lit (light emits from the face of the letter or sign), backlit / halo-lit (light emits from behind the sign against the wall, creating a glow effect), and edge-lit acrylic (light travels through the acrylic from the edges). Illuminated 3D signs are particularly effective for building facades, reception areas, and retail storefronts.</p>

<h3>Do you fabricate exhibition structures and booth elements?</h3>
<p>Yes. Window Advertising fabricates custom 3D exhibition booth elements — branded podiums, reception counters, product display plinths, overhead arches, and structural framework elements. 3D fabricated elements are used alongside printed graphics to create exhibition environments that are architecturally distinctive and physically substantial.</p>

<h3>Do you install the 3D signage after fabrication?</h3>
<p>Yes. Window Advertising provides full installation of all 3D fabricated signage and structural elements across Riyadh. Our installation team handles wall mounting, structural fixing, electrical connection for illuminated signs, and finishing. We coordinate with building management for installation access and timing.</p>

<h2>Get a 3D Fabrication Quote in Riyadh</h2>
<p>Tell us the application, material preference, dimensions, and installation environment. Our team provides fabrication specifications and pricing within 48 hours.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What materials does Window Advertising use for 3D fabrication?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising fabricates 3D elements in acrylic (available in clear, colored, and mirror finishes), brushed and polished aluminum, stainless steel (brushed, mirror, and powder-coated), high-density foam with painted or vinyl-covered finish, ABS plastic, and composite panel materials. The material specification depends on the installation environment, lighting requirements, and the finish required by the brand identity."
      }
    },
    {
      "@type": "Question",
      "name": "Can you fabricate illuminated 3D signs with LED lighting?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising fabricates illuminated 3D signage with integrated LED lighting in several configurations: front-lit (light emits from the face of the letter or sign), backlit / halo-lit (light emits from behind the sign against the wall, creating a glow effect), and edge-lit acrylic (light travels through the acrylic from the edges). Illuminated 3D signs are particularly effective for building facades, reception areas, and retail storefronts."
      }
    },
    {
      "@type": "Question",
      "name": "Do you fabricate exhibition structures and booth elements?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising fabricates custom 3D exhibition booth elements — branded podiums, reception counters, product display plinths, overhead arches, and structural framework elements. 3D fabricated elements are used alongside printed graphics to create exhibition environments that are architecturally distinctive and physically substantial."
      }
    },
    {
      "@type": "Question",
      "name": "Do you install the 3D signage after fabrication?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising provides full installation of all 3D fabricated signage and structural elements across Riyadh. Our installation team handles wall mounting, structural fixing, electrical connection for illuminated signs, and finishing. We coordinate with building management for installation access and timing."
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
<p>تحتل اللافتات ثلاثية الأبعاد والعناصر الإعلانية المصنعة المستوى الأعلى في بيئة العلامة التجارية المادية — فهي توصل الثقل والديمومة والاستثمار بطريقة لا تستطيع الرسوم المسطحة المطبوعة وحدها تحقيقها. تصنع وينوو للإعلان حروفاً وشعارات ولافتات ثلاثية الأبعاد وهياكل معارض وعناصر إعلانية مخصصة للشركات في جميع أنحاء الرياض والمملكة العربية السعودية، من شعارات جدران الاستقبال إلى البناء الهيكلي الكامل لأجنحة المعارض.</p>

<h2>لماذا يُحول التصنيع ثلاثي الأبعاد بيئات العلامات التجارية</h2>
<p>التأثير البصري لشعار مصنع ثلاثي الأبعاد على جدار الاستقبال مقارنة بنسخة مسطحة مطبوعة ليس مسألة درجة — بل هو فرق جوهري في كيفية تسجيل العلامة التجارية لدى الزوار. الشعار البارز من الألمنيوم المصقول أو الأكريليك المضيء من الخلف يوصل أن المؤسسة استثمرت في بيئتها المادية وتقدر الانطباع الذي تتركه لدى العملاء والشركاء.</p>
<p>في ثقافة الأعمال السعودية، حيث تحمل الانطباعات الأولى في اجتماعات العملاء وزناً كبيراً، تعد بيئة الاستقبال المتميزة مع <a href="/ar/services/directional-signage">لافتات إرشادية</a> مصنعة بجودة عالية أصلاً تجارياً. تقدم وينوو للإعلان استشارات للعملاء حول مواصفات اللافتات ثلاثية الأبعاد التي تتوافق مع موقع علامتهم التجارية والبيئة التي ستُركب فيها.</p>

<h2>الحروف والشعارات ثلاثية الأبعاد</h2>
<p>تعد الحروف والشعارات ثلاثية الأبعاد التطبيق الأكثر شيوعاً للتصنيع ثلاثي الأبعاد في البيئة المؤسسية. تصنع وينوو للإعلان:</p>
<p><strong>حروف أكريليك ثلاثية الأبعاد:</strong> الخيار الأكثر تنوعاً — متوفرة بأي لون من خلال الطلاء أو الفينيل، وقابلة للإضاءة من الأمام أو الخلف، ومناسبة لجدران الاستقبال الداخلية وأبواب مداخل المكاتب وواجهات المتاجر. يمكن طباعة الحروف الأكريليك من الأمام أو إضاءتها من الحواف لإنشاء تأثير متوهج بدون مصادر إضاءة مرئية. يعمل فريق <a href="/ar/services/3d-designs">التصاميم ثلاثية الأبعاد</a> لدينا معك لاختيار التشطيب والتكوين الأمثل.</p>
<p><strong>حروف ألمنيوم مصقول ثلاثية الأبعاد:</strong> تشطيب متميز وعصري مناسب لشركات الخدمات المهنية والمؤسسات المالية والشركات التي تريد إيصال الدقة والجودة. حروف الألمنيوم متينة وخفيفة الوزن للتطبيقات كبيرة الحجم وتتقادم بشكل جيد في البيئات الداخلية.</p>
<p><strong>حروف ستانلس ستيل:</strong> بتشطيب مصقول أو مرآوي، وهي المواصفة الأكثر تميزاً للافتات الاستقبال المؤسسية — تُستخدم في المواقع الرئيسية وردهات المقرات الرئيسية والبيئات التي يُتوقع فيها أن تترك اللافتة بياناً حاسماً. غالباً ما تُقترن هذه مع <a href="/ar/services/corporate-visual-identity-design">تصميم هوية بصرية مؤسسية</a> متقن لضمان اتساق العلامة التجارية.</p>
<p><strong>حروف هالو المضيئة من الخلف:</strong> تخلق تأثير توهج على سطح الجدار خلف اللافتة — الحروف نفسها صلبة، لكن إضاءة LED المثبتة خلفها تنتج هالة ضوئية محيطية. هذا التأثير لافت بصرياً في بيئات الاستقبال وردهات الفنادق.</p>

<h2>هياكل المعارض وتصنيع البوثات</h2>
<p>إلى جانب اللافتات، يتيح التصنيع ثلاثي الأبعاد العناصر الهيكلية لبيئات أجنحة المعارض: كاونتر الاستقبال المؤسسي، ومنصة عرض المنتجات، والقوس العلوي الذي يؤطر مدخل الجناح، وجدار العرض الرئيسي. تصنع وينوو للإعلان هذه العناصر الهيكلية كجزء من <a href="/ar/services/exhibition-booth-execution">تنفيذ أجنحة المعارض</a> الكامل للعملاء المشاركين في المعارض والفعاليات التجارية في جميع أنحاء الرياض والمملكة العربية السعودية.</p>
<p>صُممت عناصر البوثات المصنعة لتُجمع وتُفكك للاستخدام المتكرر عبر فعاليات متعددة — مما يقلل تكلفة المشاركة لكل فعالية مقارنة بتصنيع عناصر جديدة لكل معرض.</p>

<h2>أسوار مشاريع البناء والهياكل الخارجية</h2>
<p>لمشاريع البناء ومواقع التطوير في جميع أنحاء الرياض، تخلق العناصر المصنعة ثلاثية الأبعاد على <a href="/ar/services/signage">أسوار المشاريع</a> حضوراً إعلانياً يرفع من تصور الموقع أثناء سير البناء. تركيبات الشعارات ثلاثية الأبعاد كبيرة الحجم، والعناصر المعمارية المؤسسية على الأسوار، وأبراج اللافتات المصنعة تخلق حضوراً مميزاً لمشاريع البناء والعقارات الكبرى في سوق التطوير السعودي.</p>
<p>تصنع وينوو للإعلان عناصر إعلانية ثلاثية الأبعاد خارجية مصنفة لظروف المناخ الخارجي في الرياض — مواد وتثبيتات محددة لمقاومة الحرارة والغبار والأشعة فوق البنفسجية.</p>

<h2>الأسئلة الشائعة حول التصنيع ثلاثي الأبعاد</h2>

<h3>ما المواد التي تستخدمها وينوو للإعلان في التصنيع ثلاثي الأبعاد؟</h3>
<p>تصنع وينوو للإعلان العناصر ثلاثية الأبعاد من الأكريليك (متوفر بتشطيبات شفافة وملونة ومرآوية)، والألمنيوم المصقول واللامع، والستانلس ستيل (مصقول ومرآوي ومطلي بالبودرة)، والفوم عالي الكثافة بتشطيب مطلي أو مغطى بالفينيل، وبلاستيك ABS، ومواد الألواح المركبة. تعتمد مواصفات المواد على بيئة التركيب ومتطلبات الإضاءة والتشطيب المطلوب من هوية العلامة التجارية.</p>

<h3>هل يمكنكم تصنيع لافتات ثلاثية الأبعاد مضيئة بإضاءة LED؟</h3>
<p>نعم. تصنع وينوو للإعلان لافتات ثلاثية الأبعاد مضيئة بإضاءة LED مدمجة في عدة تكوينات: إضاءة أمامية (ينبعث الضوء من وجه الحرف أو اللافتة)، إضاءة خلفية / هالو (ينبعث الضوء من خلف اللافتة باتجاه الجدار مما يخلق تأثير توهج)، وأكريليك مضاء من الحواف (ينتقل الضوء عبر الأكريليك من الحواف). اللافتات ثلاثية الأبعاد المضيئة فعالة بشكل خاص لواجهات المباني ومناطق الاستقبال وواجهات المتاجر.</p>

<h3>هل تصنعون هياكل معارض وعناصر بوثات؟</h3>
<p>نعم. تصنع وينوو للإعلان عناصر بوثات معارض ثلاثية الأبعاد مخصصة — منصات مؤسسية وكاونترات استقبال ومنصات عرض منتجات وأقواس علوية وعناصر إطار هيكلي. تُستخدم العناصر المصنعة ثلاثياً إلى جانب الرسوم المطبوعة لإنشاء بيئات معرضية متميزة معمارياً وذات حضور مادي ملموس.</p>

<h3>هل تقومون بتركيب اللافتات ثلاثية الأبعاد بعد التصنيع؟</h3>
<p>نعم. توفر وينوو للإعلان تركيباً كاملاً لجميع اللافتات والعناصر الهيكلية المصنعة ثلاثياً في جميع أنحاء الرياض. يتولى فريق التركيب لدينا التثبيت على الجدران والتثبيت الهيكلي والتوصيل الكهربائي للافتات المضيئة والتشطيب. ننسق مع إدارة المبنى للوصول للتركيب والتوقيت.</p>

<h2>احصل على عرض سعر للتصنيع ثلاثي الأبعاد في الرياض</h2>
<p>أخبرنا بالتطبيق وتفضيل المواد والأبعاد وبيئة التركيب. يقدم فريقنا مواصفات التصنيع والتسعير خلال 48 ساعة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما المواد التي تستخدمها وينوو للإعلان في التصنيع ثلاثي الأبعاد؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "تصنع وينوو للإعلان العناصر ثلاثية الأبعاد من الأكريليك (متوفر بتشطيبات شفافة وملونة ومرآوية)، والألمنيوم المصقول واللامع، والستانلس ستيل (مصقول ومرآوي ومطلي بالبودرة)، والفوم عالي الكثافة بتشطيب مطلي أو مغطى بالفينيل، وبلاستيك ABS، ومواد الألواح المركبة. تعتمد مواصفات المواد على بيئة التركيب ومتطلبات الإضاءة والتشطيب المطلوب من هوية العلامة التجارية."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكنكم تصنيع لافتات ثلاثية الأبعاد مضيئة بإضاءة LED؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تصنع وينوو للإعلان لافتات ثلاثية الأبعاد مضيئة بإضاءة LED مدمجة في عدة تكوينات: إضاءة أمامية (ينبعث الضوء من وجه الحرف أو اللافتة)، إضاءة خلفية / هالو (ينبعث الضوء من خلف اللافتة باتجاه الجدار مما يخلق تأثير توهج)، وأكريليك مضاء من الحواف (ينتقل الضوء عبر الأكريليك من الحواف). اللافتات ثلاثية الأبعاد المضيئة فعالة بشكل خاص لواجهات المباني ومناطق الاستقبال وواجهات المتاجر."
      }
    },
    {
      "@type": "Question",
      "name": "هل تصنعون هياكل معارض وعناصر بوثات؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. تصنع وينوو للإعلان عناصر بوثات معارض ثلاثية الأبعاد مخصصة — منصات مؤسسية وكاونترات استقبال ومنصات عرض منتجات وأقواس علوية وعناصر إطار هيكلي. تُستخدم العناصر المصنعة ثلاثياً إلى جانب الرسوم المطبوعة لإنشاء بيئات معرضية متميزة معمارياً وذات حضور مادي ملموس."
      }
    },
    {
      "@type": "Question",
      "name": "هل تقومون بتركيب اللافتات ثلاثية الأبعاد بعد التصنيع؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. توفر وينوو للإعلان تركيباً كاملاً لجميع اللافتات والعناصر الهيكلية المصنعة ثلاثياً في جميع أنحاء الرياض. يتولى فريق التركيب لدينا التثبيت على الجدران والتثبيت الهيكلي والتوصيل الكهربائي للافتات المضيئة والتشطيب. ننسق مع إدارة المبنى للوصول للتركيب والتوقيت."
      }
    }
  ]
}
</script>
HTML;
    }
};
