<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'assorted-stamps';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/assorted-stamps.webp',
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
            'title' => 'Assorted Stamps',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Assorted Stamps in Riyadh | Custom Business Stamps Saudi Arabia | Window Advertising',
            'meta_description' => 'Custom stamps and business seals in Riyadh. Window Advertising manufactures assorted corporate stamps including self-inking stamps, date stamps, and custom seal stamps for companies across Saudi Arabia. Corporate identity and advertising solutions. Get a free quote.',
            'meta_keywords' => 'custom stamps Riyadh, business stamps Saudi Arabia, corporate seals Riyadh, self-inking stamps Saudi Arabia, دعاية واعلان الرياض, أختام مخصصة الرياض, تصميم هوية, دعاية واعلان السعودية',
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
            'title' => 'أختام متنوعة',
            'content' => $this->getArabicContent(),
            'meta_title' => 'أختام متنوعة في الرياض | أختام شركاتية مخصصة السعودية | وينوو للإعلان',
            'meta_description' => 'أختام مخصصة وأختام شركاتية في الرياض — وينوو للإعلان يصنع أختاماً متنوعة للشركات تشمل أختاماً ذاتية الحبر وأختام التاريخ والأختام الرسمية. دعاية واعلان الرياض والسعودية. احصل على عرض سعر.',
            'meta_keywords' => 'أختام متنوعة الرياض, أختام شركاتية السعودية, دعاية واعلان الرياض, تصميم هوية, أختام مخصصة الرياض, أختام ذاتية الحبر, دعاية واعلان السعودية',
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
        $service = DB::table('services')->where('slug', 'assorted-stamps')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>A company stamp is one of the most frequently used tools in any Saudi business office. From approving documents to marking received correspondence, stamps are a daily operational tool that also carry the company's visual identity on every impression they make. Window Advertising manufactures assorted custom stamps for businesses across Riyadh and Saudi Arabia — designed and produced as part of a complete corporate identity and advertising solution.</p>

<h2>Stamps as Corporate Identity Tools</h2>
<p>In Saudi Arabia's business environment, the official company stamp carries significant weight. Documents submitted to government agencies, contracts issued to clients, and internal approvals are all authenticated by stamps that carry the company's registered name, logo, and identification details.</p>
<p>The design of a corporate stamp is an extension of the corporate identity system. A well-designed stamp uses the same typefaces, logo treatment, and information hierarchy as the company's letterhead, <a href="/en/services/business-cards">business cards</a>, and printed materials — maintaining brand consistency at every point where the company identity appears. Window Advertising designs stamps as part of the broader <a href="/en/services/corporate-visual-identity-design">corporate visual identity design</a> work it delivers for clients across Riyadh, alongside <a href="/en/services/business-prints">business prints</a> and <a href="/en/services/profile-design-printing">profile design and printing</a>.</p>

<h2>Types of Stamps We Manufacture</h2>
<p>Window Advertising manufactures the full range of stamp types required by Saudi businesses:</p>
<p>Self-inking stamps are the most widely used format for daily office operations. A spring mechanism automatically returns the stamp to the ink pad between impressions, producing clean, consistent marks at high frequency without requiring a separate pad.</p>
<p>Date stamps combine a rotating date dial with the company name or a status word (Received, Approved, Paid). Essential for document processing in finance, administration, and legal departments.</p>
<p>Address stamps apply the company's full contact information — name, address, phone, and email — to outgoing correspondence and documents. These eliminate the need to print letterhead for routine communications.</p>
<p>Official company seals are circular stamp designs in the format recognized by Saudi government bodies and financial institutions. They carry the company's registered Arabic name and commercial registration details in the standard layout.</p>
<p>Logo stamps reproduce the company logo in single-color format for application to documents, packaging, and materials where a printed logo is not practical.</p>
<p>Received, Approved, Confidential, and other status stamps are available in Arabic and English for standard office document processing workflows.</p>

<h2>Bilingual Arabic and English Stamps</h2>
<p>Every stamp produced by Window Advertising for the Saudi market is available in bilingual Arabic and English configuration. For official company seals and government-facing documents, Arabic is the primary language. For international business correspondence and English-language documents, English stamps are used. For general corporate use, bilingual stamps with both languages on a single impression are available.</p>
<p>Our typesetting team handles the Arabic text layout correctly — ensuring that Arabic is not simply mirrored or imported from digital text without proper typographic treatment. All Arabic stamp text is reviewed for correctness before production.</p>

<h2>Self-inking Stamps for High-Volume Office Use</h2>
<p>For finance departments, HR teams, and administration offices in Riyadh that process high volumes of documents daily, self-inking stamps are the practical standard. Window Advertising supplies self-inking stamps in the Trodat and equivalent format with replacement ink pad refills available for all common stamp sizes.</p>
<p>Corporate accounts requiring multiple identical stamps for different office locations or departments can order sets of identical stamps from a single approved design, ensuring consistency across every location.</p>

<h2>Specialty and Embossing Stamps</h2>
<p>Beyond standard office stamps, Window Advertising produces specialty stamp types for specific applications:</p>
<p>Embossing seals press a raised relief impression into paper without ink — used for certificates of authenticity, legal documents, and formal correspondence where a non-copyable validation mark is required.</p>
<p>Wax seal stamps are used with wax for premium correspondence, luxury packaging seals, and formal invitations. The stamp produces the company logo or monogram in the wax impression.</p>
<p>Custom-shaped stamps are available in non-standard shapes — for promotional and creative applications where a standard rectangular or circular stamp design is not appropriate.</p>

<h2>Frequently Asked Questions About Assorted Stamps</h2>

<h3>What types of stamps does Window Advertising manufacture?</h3>
<p>Window Advertising manufactures self-inking stamps, date stamps, address stamps, received and approved stamps, custom text stamps, logo stamps, official company seals, notarial stamps, and specialized stamps for specific industry applications. All stamps are available with Arabic text, English text, or both.</p>

<h3>How quickly can custom stamps be produced?</h3>
<p>Standard custom stamps are produced within 1 to 3 business days from approved artwork. For urgent requirements, same-day or next-day production is available for most standard stamp formats. Specialty seals and embossing stamps with complex artwork may require 3 to 5 business days.</p>

<h3>Can stamps include Arabic text?</h3>
<p>Yes. Window Advertising produces stamps with Arabic text, English text, or fully bilingual layouts with both languages. Arabic calligraphic fonts can be used for formal official stamps and company seals. We typeset the Arabic text correctly and provide a digital proof for approval before producing the stamp.</p>

<h3>What is the difference between a self-inking stamp and a traditional stamp?</h3>
<p>A self-inking stamp has a built-in ink pad mechanism that automatically re-inks the stamp impression between each use. This makes it faster to use, produces more consistent ink coverage, and requires no separate ink pad. Traditional stamps use a separate ink pad and are better suited to specialty inks, embossing applications, or situations where different ink colors are needed on the same stamp design.</p>

<h2>Order Custom Stamps in Riyadh</h2>
<p>Tell us the stamp type, the text or logo to include, and the quantity required. Our team provides a digital proof and pricing within 24 hours. Same-day and next-day production available for urgent requirements.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What types of stamps does Window Advertising manufacture?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Window Advertising manufactures self-inking stamps, date stamps, address stamps, received and approved stamps, custom text stamps, logo stamps, official company seals, notarial stamps, and specialized stamps for specific industry applications. All stamps are available with Arabic text, English text, or both."
      }
    },
    {
      "@type": "Question",
      "name": "How quickly can custom stamps be produced?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard custom stamps are produced within 1 to 3 business days from approved artwork. For urgent requirements, same-day or next-day production is available for most standard stamp formats. Specialty seals and embossing stamps with complex artwork may require 3 to 5 business days."
      }
    },
    {
      "@type": "Question",
      "name": "Can stamps include Arabic text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Window Advertising produces stamps with Arabic text, English text, or fully bilingual layouts with both languages. Arabic calligraphic fonts can be used for formal official stamps and company seals. We typeset the Arabic text correctly and provide a digital proof for approval before producing the stamp."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a self-inking stamp and a traditional stamp?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A self-inking stamp has a built-in ink pad mechanism that automatically re-inks the stamp impression between each use. This makes it faster to use, produces more consistent ink coverage, and requires no separate ink pad. Traditional stamps use a separate ink pad and are better suited to specialty inks, embossing applications, or situations where different ink colors are needed on the same stamp design."
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
<p>يُعد ختم الشركة من أكثر الأدوات استخداماً في أي مكتب تجاري سعودي. من اعتماد المستندات إلى ختم المراسلات الواردة، تُعتبر الأختام أداة تشغيلية يومية تحمل أيضاً الهوية البصرية للشركة في كل بصمة تتركها. وينوو للإعلان يصنع أختاماً مخصصة متنوعة للشركات في جميع أنحاء الرياض والمملكة العربية السعودية — مصممة ومنتجة كجزء من حل متكامل للهوية المؤسسية والدعاية والإعلان.</p>

<h2>الأختام كأدوات للهوية الشركاتية</h2>
<p>في بيئة الأعمال السعودية، يحمل الختم الرسمي للشركة ثقلاً كبيراً. المستندات المقدمة للجهات الحكومية، والعقود الصادرة للعملاء، والموافقات الداخلية — جميعها يتم توثيقها بأختام تحمل الاسم المسجل للشركة وشعارها وبيانات التعريف الخاصة بها.</p>
<p>تصميم الختم المؤسسي هو امتداد لنظام الهوية المؤسسية. الختم المصمم بشكل جيد يستخدم نفس الخطوط ومعالجة الشعار وتسلسل المعلومات الموجود في الأوراق الرسمية و<a href="/ar/services/business-cards">بطاقات العمل</a> والمواد المطبوعة — للحفاظ على اتساق العلامة التجارية في كل نقطة تظهر فيها هوية الشركة. وينوو للإعلان يصمم الأختام كجزء من أعمال <a href="/ar/services/corporate-visual-identity-design">تصميم الهوية البصرية المؤسسية</a> الشاملة التي يقدمها للعملاء في الرياض، إلى جانب <a href="/ar/services/business-prints">المطبوعات التجارية</a> و<a href="/ar/services/profile-design-printing">تصميم وطباعة البروفايل</a>.</p>

<h2>أنواع الأختام التي نصنعها</h2>
<p>يصنع وينوو للإعلان مجموعة كاملة من أنواع الأختام التي تحتاجها الشركات السعودية:</p>
<p>الأختام ذاتية الحبر هي الأكثر استخداماً في العمليات المكتبية اليومية. آلية زنبركية تعيد الختم تلقائياً إلى وسادة الحبر بين كل بصمة، مما ينتج علامات نظيفة ومتسقة بتردد عالٍ دون الحاجة إلى وسادة منفصلة.</p>
<p>أختام التاريخ تجمع بين قرص تاريخ دوار واسم الشركة أو كلمة حالة (وارد، معتمد، مدفوع). أساسية لمعالجة المستندات في أقسام المالية والإدارة والشؤون القانونية.</p>
<p>أختام العنوان تطبع معلومات الاتصال الكاملة للشركة — الاسم والعنوان والهاتف والبريد الإلكتروني — على المراسلات والمستندات الصادرة. تلغي الحاجة لطباعة أوراق رسمية للمراسلات الروتينية.</p>
<p>الأختام الرسمية للشركات هي تصاميم دائرية بالشكل المعترف به من الجهات الحكومية والمؤسسات المالية السعودية. تحمل اسم الشركة المسجل بالعربية وبيانات السجل التجاري بالتصميم القياسي.</p>
<p>أختام الشعار تستنسخ شعار الشركة بلون واحد للتطبيق على المستندات والتغليف والمواد حيث يكون الشعار المطبوع غير عملي.</p>
<p>أختام وارد ومعتمد وسري وغيرها من أختام الحالة متوفرة بالعربية والإنجليزية لسير عمل معالجة المستندات المكتبية القياسية.</p>

<h2>أختام ثنائية اللغة عربي وإنجليزي</h2>
<p>كل ختم ينتجه وينوو للإعلان للسوق السعودي متوفر بتصميم ثنائي اللغة عربي وإنجليزي. للأختام الرسمية والمستندات الموجهة للجهات الحكومية، العربية هي اللغة الأساسية. للمراسلات التجارية الدولية والمستندات الإنجليزية، تُستخدم الأختام الإنجليزية. للاستخدام المؤسسي العام، تتوفر أختام ثنائية اللغة بكلتا اللغتين في بصمة واحدة.</p>
<p>يتعامل فريق التنضيد لدينا مع تخطيط النص العربي بشكل صحيح — لضمان عدم عكس النص العربي أو استيراده من نص رقمي دون معالجة طباعية سليمة. يتم مراجعة جميع نصوص الأختام العربية للتأكد من صحتها قبل الإنتاج.</p>

<h2>أختام ذاتية الحبر للاستخدام المكثف</h2>
<p>لأقسام المالية وفرق الموارد البشرية ومكاتب الإدارة في الرياض التي تعالج كميات كبيرة من المستندات يومياً، الأختام ذاتية الحبر هي المعيار العملي. يوفر وينوو للإعلان أختاماً ذاتية الحبر بصيغة Trodat والصيغ المكافئة مع توفر وسائد حبر بديلة لجميع الأحجام الشائعة.</p>
<p>الحسابات المؤسسية التي تحتاج أختاماً متعددة متطابقة لمواقع مكتبية أو أقسام مختلفة يمكنها طلب مجموعات أختام متطابقة من تصميم واحد معتمد، مما يضمن الاتساق في كل موقع.</p>

<h2>أختام خاصة وأختام النقش</h2>
<p>إلى جانب الأختام المكتبية القياسية، ينتج وينوو للإعلان أنواعاً خاصة من الأختام لتطبيقات محددة:</p>
<p>أختام النقش البارز تضغط بصمة بارزة على الورق بدون حبر — تُستخدم لشهادات المصداقية والمستندات القانونية والمراسلات الرسمية حيث تكون هناك حاجة لعلامة توثيق غير قابلة للنسخ.</p>
<p>أختام الشمع تُستخدم مع الشمع للمراسلات الفاخرة وأختام التغليف الراقي والدعوات الرسمية. ينتج الختم شعار الشركة أو الحروف الأولى في بصمة الشمع.</p>
<p>الأختام ذات الأشكال المخصصة متوفرة بأشكال غير قياسية — للتطبيقات الترويجية والإبداعية حيث لا يكون تصميم الختم المستطيل أو الدائري القياسي مناسباً.</p>

<h2>الأسئلة الشائعة حول الأختام المتنوعة</h2>

<h3>ما أنواع الأختام التي يصنعها وينوو للإعلان؟</h3>
<p>يصنع وينوو للإعلان أختاماً ذاتية الحبر وأختام التاريخ وأختام العنوان وأختام وارد ومعتمد وأختام النصوص المخصصة وأختام الشعار والأختام الرسمية للشركات وأختام التوثيق والأختام المتخصصة لتطبيقات صناعية محددة. جميع الأختام متوفرة بالنص العربي أو الإنجليزي أو كليهما.</p>

<h3>ما سرعة إنتاج الأختام المخصصة؟</h3>
<p>يتم إنتاج الأختام المخصصة القياسية خلال يوم إلى 3 أيام عمل من اعتماد التصميم. للمتطلبات العاجلة، يتوفر الإنتاج في نفس اليوم أو في اليوم التالي لمعظم صيغ الأختام القياسية. الأختام الخاصة وأختام النقش ذات التصاميم المعقدة قد تحتاج من 3 إلى 5 أيام عمل.</p>

<h3>هل يمكن أن تتضمن الأختام نصاً عربياً؟</h3>
<p>نعم. ينتج وينوو للإعلان أختاماً بنص عربي أو إنجليزي أو تخطيطات ثنائية اللغة بالكامل. يمكن استخدام خطوط عربية خطية للأختام الرسمية وأختام الشركات. نقوم بتنضيد النص العربي بشكل صحيح ونوفر نموذجاً رقمياً للموافقة عليه قبل إنتاج الختم.</p>

<h3>ما الفرق بين الختم ذاتي الحبر والختم التقليدي؟</h3>
<p>الختم ذاتي الحبر يحتوي على آلية وسادة حبر مدمجة تعيد تحبير بصمة الختم تلقائياً بين كل استخدام. مما يجعله أسرع في الاستخدام وينتج تغطية حبر أكثر اتساقاً ولا يحتاج وسادة حبر منفصلة. الأختام التقليدية تستخدم وسادة حبر منفصلة وتناسب أكثر الأحبار الخاصة وتطبيقات النقش أو الحالات التي تحتاج ألوان حبر مختلفة على نفس تصميم الختم.</p>

<h2>اطلب أختامك المخصصة في الرياض</h2>
<p>أخبرنا بنوع الختم والنص أو الشعار المطلوب والكمية. يوفر فريقنا نموذجاً رقمياً وتسعيراً خلال 24 ساعة. الإنتاج في نفس اليوم أو اليوم التالي متاح للمتطلبات العاجلة.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما أنواع الأختام التي يصنعها وينوو للإعلان؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يصنع وينوو للإعلان أختاماً ذاتية الحبر وأختام التاريخ وأختام العنوان وأختام وارد ومعتمد وأختام النصوص المخصصة وأختام الشعار والأختام الرسمية للشركات وأختام التوثيق والأختام المتخصصة لتطبيقات صناعية محددة. جميع الأختام متوفرة بالنص العربي أو الإنجليزي أو كليهما."
      }
    },
    {
      "@type": "Question",
      "name": "ما سرعة إنتاج الأختام المخصصة؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "يتم إنتاج الأختام المخصصة القياسية خلال يوم إلى 3 أيام عمل من اعتماد التصميم. للمتطلبات العاجلة، يتوفر الإنتاج في نفس اليوم أو في اليوم التالي لمعظم صيغ الأختام القياسية. الأختام الخاصة وأختام النقش ذات التصاميم المعقدة قد تحتاج من 3 إلى 5 أيام عمل."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن أن تتضمن الأختام نصاً عربياً؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. ينتج وينوو للإعلان أختاماً بنص عربي أو إنجليزي أو تخطيطات ثنائية اللغة بالكامل. يمكن استخدام خطوط عربية خطية للأختام الرسمية وأختام الشركات. نقوم بتنضيد النص العربي بشكل صحيح ونوفر نموذجاً رقمياً للموافقة عليه قبل إنتاج الختم."
      }
    },
    {
      "@type": "Question",
      "name": "ما الفرق بين الختم ذاتي الحبر والختم التقليدي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "الختم ذاتي الحبر يحتوي على آلية وسادة حبر مدمجة تعيد تحبير بصمة الختم تلقائياً بين كل استخدام. مما يجعله أسرع في الاستخدام وينتج تغطية حبر أكثر اتساقاً ولا يحتاج وسادة حبر منفصلة. الأختام التقليدية تستخدم وسادة حبر منفصلة وتناسب أكثر الأحبار الخاصة وتطبيقات النقش أو الحالات التي تحتاج ألوان حبر مختلفة على نفس تصميم الختم."
      }
    }
  ]
}
</script>
HTML;
    }
};
