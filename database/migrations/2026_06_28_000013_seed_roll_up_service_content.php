<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'roll-up';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/roll-up.webp',
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
            'title' => 'Roll-up',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Roll-up Banner Stands in Riyadh | Retractable Display Stands | Window Advertising',
            'meta_description' => 'Custom roll-up banner stands in Riyadh. Window Advertising designs and manufactures retractable roll-up banners for exhibitions, events, and corporate promotions across Saudi Arabia. Promotional stands and advertising displays delivered fast. Get a free quote.',
            'meta_keywords' => 'roll-up banner stands Riyadh, retractable banner stands Saudi Arabia, display stands Riyadh, roll-up advertising Saudi Arabia, استندات دعائية الرياض, دعاية واعلان الرياض, دعاية واعلان السعودية, بوثات معارض',
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
            'title' => 'رول أب',
            'content' => $this->getArabicContent(),
            'meta_title' => 'استندات رول أب في الرياض | استندات دعائية قابلة للطي | ويندو للإعلان',
            'meta_description' => 'استندات رول أب مخصصة في الرياض — ويندو للإعلان يصمم وينتج استندات دعائية قابلة للطي للمعارض والفعاليات والترويج للشركات في السعودية. دعاية واعلان الرياض. احصل على عرض سعر.',
            'meta_keywords' => 'استندات رول أب الرياض, استندات دعائية السعودية, دعاية واعلان الرياض, بوثات معارض, دعاية واعلان السعودية, رول أب معارض الرياض',
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
        $service = DB::table('services')->where('slug', 'roll-up')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Roll-up banners are the most widely used portable advertising stand in Saudi Arabia's exhibition and events market. Compact, fast to deploy, and produced in as little as 48 hours, they form the backbone of corporate display setups at trade shows, conferences, retail promotions, and government events. Window Advertising designs and manufactures roll-up banner stands for businesses across Riyadh and the Kingdom — coordinated with pop-up systems, promotional stands, and full <a href="/en/services/display-stands">display stands</a> builds.</p>

<h2>What Is a Roll-up Banner Stand?</h2>
<p>A roll-up banner stand (also called a retractable banner stand or pull-up banner) consists of a printed graphic that winds around a spring-loaded cassette inside an aluminum base unit. To set up the display, the user pulls the graphic upward from the base and secures it to an extended support pole — the stand is fully erected in under a minute with no tools required.</p>
<p>For Saudi companies participating in exhibitions, trade fairs, and corporate events, roll-up banners represent the fastest and most cost-effective way to create a professional branded display in any space. Window Advertising's roll-up banner stands are produced to the display quality standards expected at the Kingdom's leading exhibition venues.</p>

<h2>Roll-up Banner Types and Formats</h2>
<p>Window Advertising supplies roll-up banner stands in three main grades:</p>
<p><strong>Standard Roll-up Banners</strong> use lightweight aluminum base units with an 85cm wide graphic, suitable for most exhibition and conference applications. The spring-loaded cassette mechanism retracts the graphic cleanly for storage. Standard units are the most economical option and are popular for events where multiple banners are needed across a large area.</p>
<p><strong>Premium Roll-up Banners</strong> use a heavier-gauge aluminum base with a smooth cassette mechanism designed for frequent use over multiple events. Premium units accept wider graphics up to 100cm and incorporate a padded carry case. Preferred by companies that attend exhibitions regularly throughout the year.</p>
<p><strong>Wide-Format Roll-up Banners</strong> provide a display width of 120cm to 150cm, creating a larger visual impact than standard units. Used as the primary backdrop stand when a full pop-up system is not required, or as a supplementary element alongside <a href="/en/services/exhibition-booth-execution">exhibition booth</a> structures. For large-format applications, consider also our <a href="/en/services/lama-stand">lama stand</a> and <a href="/en/services/banner-printing-installation">banner printing and installation</a> options.</p>

<h2>Design for Maximum Impact</h2>
<p>The printed graphic is the element that determines how effective a roll-up banner is in an exhibition environment. Window Advertising's design team produces roll-up banner graphics that follow the principles of display advertising — a single dominant visual, a clear hierarchy of information, and a message readable from three to five meters away.</p>
<p>Design work is included with every roll-up banner order. Our designers work from your brand guidelines and exhibition brief to produce a graphic that stands out in a busy exhibition hall. A digital mockup showing the banner in a realistic display context is provided for approval before production begins.</p>

<h2>Roll-up Banners for Exhibition Booths in Riyadh</h2>
<p>Roll-up banners are one of the most flexible elements in an exhibition booth setup. They can serve as a branded side wall alongside a <a href="/en/services/pop-up">pop-up display stands</a> backdrop, a product highlight display at the front of a booth, or a standalone promotional stand at a conference table or reception area.</p>
<p>Window Advertising coordinates roll-up banner production alongside complete <a href="/en/services/exhibition-booth-execution">exhibition booth execution</a> builds — ensuring the roll-up graphics, backdrop system, display counter, and promotional materials all share a consistent visual identity. For companies attending exhibitions and trade shows across Riyadh and the broader Saudi market, we manage the full display system as a single coordinated advertising project.</p>

<h2>How We Handle Large Quantity Orders</h2>
<p>For events requiring ten or more roll-up banners — such as multi-location corporate launches, roadshows, or exhibition campaigns across multiple Saudi cities — Window Advertising manages production, quality control, and delivery coordination for the entire set. Each banner is individually labeled, packed, and delivered in a carry case, with a named inventory list for easy distribution to event teams.</p>
<p>Bulk orders of roll-up banners are priced at a significant discount relative to single-unit production. Contact our team to discuss the pricing and timeline for your specific campaign volume.</p>

<h2>Frequently Asked Questions About Roll-up Banners</h2>

<h3>What size roll-up banner do I need?</h3>
<p>The most common roll-up banner size for exhibitions and events in Saudi Arabia is 85cm wide by 200cm tall. Wide-format roll-up banners range from 100cm to 150cm wide for applications where a larger display surface is needed. Window Advertising advises on the best size based on your booth or display space and viewing distance.</p>

<h3>How long does it take to produce a roll-up banner?</h3>
<p>Standard roll-up banner production takes 2 to 4 business days from design approval. Express production in 24 hours is available for urgent exhibition and event deadlines. Window Advertising manages design, print, and assembly in-house, enabling fast turnaround for last-minute orders.</p>

<h3>Can the print be replaced on an existing roll-up stand?</h3>
<p>Yes. Roll-up banner stands are designed for graphic replacement — the cassette mechanism holds the printed banner, which can be swapped when your campaign or brand message changes. Window Advertising supplies replacement roll-up graphics for existing stands, reducing the cost of updating your display system.</p>

<h3>Are roll-up banners suitable for outdoor use?</h3>
<p>Standard roll-up banners are designed for indoor use. For outdoor use, Window Advertising recommends outdoor-rated retractable banners with weighted bases and UV-resistant print media, or outdoor banner systems specifically engineered for Saudi Arabia's wind and heat conditions.</p>

<h2>Order Roll-up Banner Stands in Riyadh</h2>
<p>Tell us the size, quantity, and your event date. Attach your logo and any images. Our team confirms the design brief, timeline, and pricing within hours. Delivery across Riyadh included.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What size roll-up banner do I need?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The most common roll-up banner size for exhibitions and events in Saudi Arabia is 85cm wide by 200cm tall. Wide-format roll-up banners range from 100cm to 150cm wide for applications where a larger display surface is needed. Window Advertising advises on the best size based on your booth or display space and viewing distance."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to produce a roll-up banner?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard roll-up banner production takes 2 to 4 business days from design approval. Express production in 24 hours is available for urgent exhibition and event deadlines. Window Advertising manages design, print, and assembly in-house, enabling fast turnaround for last-minute orders."
      }
    },
    {
      "@type": "Question",
      "name": "Can the print be replaced on an existing roll-up stand?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Roll-up banner stands are designed for graphic replacement — the cassette mechanism holds the printed banner, which can be swapped when your campaign or brand message changes. Window Advertising supplies replacement roll-up graphics for existing stands, reducing the cost of updating your display system."
      }
    },
    {
      "@type": "Question",
      "name": "Are roll-up banners suitable for outdoor use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard roll-up banners are designed for indoor use. For outdoor use, Window Advertising recommends outdoor-rated retractable banners with weighted bases and UV-resistant print media, or outdoor banner systems specifically engineered for Saudi Arabia's wind and heat conditions."
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
<p>استندات الرول أب هي أكثر الاستندات الدعائية المحمولة استخداماً في سوق المعارض والفعاليات بالمملكة العربية السعودية. مدمجة وسريعة النصب وتُنتج في أقل من 48 ساعة، تشكّل العمود الفقري لعروض الشركات في المعارض التجارية والمؤتمرات والعروض الترويجية والفعاليات الحكومية. ويندو للإعلان يصمم وينتج استندات رول أب للشركات في الرياض والمملكة — بالتنسيق مع أنظمة البوب أب والاستندات الترويجية و<a href="/ar/services/display-stands">الاستندات الدعائية</a> الكاملة.</p>

<h2>ما هو استند الرول أب؟</h2>
<p>استند الرول أب (يُسمى أيضاً استند قابل للطي أو بانر سحب) يتكون من رسم مطبوع يلتف حول كاسيت بنابض داخل قاعدة ألمنيوم. لتركيب العرض، يسحب المستخدم الرسم للأعلى من القاعدة ويثبته على عمود دعم ممتد — يتم نصب الاستند بالكامل في أقل من دقيقة دون الحاجة لأي أدوات.</p>
<p>للشركات السعودية المشاركة في المعارض والمعارض التجارية والفعاليات المؤسسية، تمثل استندات الرول أب أسرع وأوفر طريقة لإنشاء عرض مؤسسي احترافي في أي مساحة. استندات الرول أب من ويندو للإعلان تُنتج وفق معايير جودة العرض المتوقعة في أبرز صالات المعارض بالمملكة.</p>

<h2>أنواع استندات الرول أب وأشكالها</h2>
<p>يوفر ويندو للإعلان استندات رول أب في ثلاث فئات رئيسية:</p>
<p><strong>رول أب عادي</strong> يستخدم قواعد ألمنيوم خفيفة الوزن مع رسم بعرض 85 سم، مناسب لمعظم تطبيقات المعارض والمؤتمرات. آلية الكاسيت النابضية تطوي الرسم بسلاسة للتخزين. الوحدات العادية هي الخيار الأوفر وشائعة في الفعاليات التي تحتاج عدة بانرات في مساحة كبيرة.</p>
<p><strong>رول أب بريميوم</strong> يستخدم قاعدة ألمنيوم أسمك مع آلية كاسيت ناعمة مصممة للاستخدام المتكرر في عدة فعاليات. الوحدات البريميوم تقبل رسومات أعرض حتى 100 سم وتتضمن حقيبة حمل مبطنة. مفضلة لدى الشركات التي تشارك في المعارض بانتظام طوال العام.</p>
<p><strong>رول أب عريض</strong> يوفر عرض عرض من 120 سم إلى 150 سم، مما يخلق تأثيراً بصرياً أكبر من الوحدات العادية. يُستخدم كاستند خلفية رئيسي عندما لا يكون نظام بوب أب كاملاً مطلوباً، أو كعنصر مكمل بجانب هياكل <a href="/ar/services/exhibition-booth-execution">بوثات المعارض</a>. للتطبيقات كبيرة الحجم، اطلع أيضاً على خيارات <a href="/ar/services/lama-stand">لاما ستاند</a> و<a href="/ar/services/banner-printing-installation">طباعة وتركيب البانرات</a> لدينا.</p>

<h2>التصميم لأقصى تأثير بصري</h2>
<p>الرسم المطبوع هو العنصر الذي يحدد مدى فعالية استند الرول أب في بيئة المعرض. فريق التصميم في ويندو للإعلان ينتج رسومات رول أب تتبع مبادئ الإعلان العرضي — صورة مهيمنة واحدة، وتسلسل واضح للمعلومات، ورسالة يمكن قراءتها من مسافة ثلاثة إلى خمسة أمتار.</p>
<p>أعمال التصميم مشمولة مع كل طلب رول أب. يعمل مصممونا انطلاقاً من إرشادات علامتك التجارية وملخص المعرض لإنتاج رسم يبرز في صالة معرض مزدحمة. يتم تقديم نموذج رقمي يعرض البانر في سياق عرض واقعي للموافقة عليه قبل بدء الإنتاج.</p>

<h2>رول أب لبوثات المعارض في الرياض</h2>
<p>استندات الرول أب هي من أكثر العناصر مرونة في تجهيز بوث المعرض. يمكن أن تعمل كجدار جانبي مؤسسي بجانب خلفية <a href="/ar/services/pop-up">استندات بوب أب</a>، أو كعرض لإبراز المنتجات في واجهة البوث، أو كاستند ترويجي مستقل على طاولة مؤتمر أو منطقة استقبال.</p>
<p>ويندو للإعلان ينسق إنتاج استندات الرول أب جنباً إلى جنب مع تنفيذ <a href="/ar/services/exhibition-booth-execution">بوثات المعارض</a> الكاملة — مما يضمن أن رسومات الرول أب ونظام الخلفيات وكاونتر العرض والمواد الترويجية تتشارك جميعها هوية بصرية متسقة. للشركات المشاركة في المعارض والمعارض التجارية في الرياض والسوق السعودي الأوسع، ندير نظام العرض الكامل كمشروع إعلاني منسق واحد.</p>

<h2>كيف ندير الطلبات بالكميات الكبيرة</h2>
<p>للفعاليات التي تتطلب عشرة استندات رول أب أو أكثر — مثل الإطلاقات المؤسسية متعددة المواقع أو الحملات الترويجية المتنقلة أو حملات المعارض عبر عدة مدن سعودية — يدير ويندو للإعلان الإنتاج ومراقبة الجودة وتنسيق التوصيل للمجموعة بأكملها. كل بانر يُعنوَن ويُعبأ ويُسلّم في حقيبة حمل بشكل فردي، مع قائمة جرد مسماة لسهولة التوزيع على فرق الفعاليات.</p>
<p>طلبات الرول أب بالجملة تُسعّر بخصم كبير مقارنة بإنتاج الوحدة الواحدة. تواصل مع فريقنا لمناقشة التسعير والجدول الزمني لحجم حملتك المحدد.</p>

<h2>الأسئلة الشائعة حول استندات الرول أب</h2>

<h3>ما مقاس استند الرول أب الذي أحتاجه؟</h3>
<p>المقاس الأكثر شيوعاً لاستند الرول أب في المعارض والفعاليات بالمملكة العربية السعودية هو 85 سم عرضاً في 200 سم طولاً. استندات الرول أب العريضة تتراوح من 100 سم إلى 150 سم عرضاً للتطبيقات التي تحتاج سطح عرض أكبر. ويندو للإعلان ينصح بالمقاس الأنسب بناءً على مساحة البوث أو العرض ومسافة المشاهدة.</p>

<h3>كم يستغرق إنتاج استند الرول أب؟</h3>
<p>إنتاج استند الرول أب العادي يستغرق من 2 إلى 4 أيام عمل من اعتماد التصميم. الإنتاج السريع خلال 24 ساعة متاح للمواعيد العاجلة للمعارض والفعاليات. ويندو للإعلان يدير التصميم والطباعة والتجميع داخلياً، مما يتيح تسليماً سريعاً للطلبات في اللحظة الأخيرة.</p>

<h3>هل يمكن استبدال الطباعة على استند رول أب موجود؟</h3>
<p>نعم. استندات الرول أب مصممة لاستبدال الرسومات — آلية الكاسيت تحمل البانر المطبوع الذي يمكن تبديله عند تغيير حملتك أو رسالة علامتك التجارية. ويندو للإعلان يوفر رسومات رول أب بديلة للاستندات الموجودة، مما يقلل تكلفة تحديث نظام العرض الخاص بك.</p>

<h3>هل استندات الرول أب مناسبة للاستخدام الخارجي؟</h3>
<p>استندات الرول أب العادية مصممة للاستخدام الداخلي. للاستخدام الخارجي، ينصح ويندو للإعلان بالاستندات القابلة للطي المصنفة للاستخدام الخارجي مع قواعد مثقلة ووسائط طباعة مقاومة للأشعة فوق البنفسجية، أو أنظمة بانرات خارجية مصممة خصيصاً لظروف الرياح والحرارة في المملكة العربية السعودية.</p>

<h2>اطلب استندات الرول أب في الرياض</h2>
<p>أخبرنا بالمقاس والكمية وتاريخ فعاليتك. أرفق شعارك وأي صور. فريقنا يؤكد ملخص التصميم والجدول الزمني والتسعير خلال ساعات. التوصيل في أنحاء الرياض مشمول.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "ما مقاس استند الرول أب الذي أحتاجه؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "المقاس الأكثر شيوعاً لاستند الرول أب في المعارض والفعاليات بالمملكة العربية السعودية هو 85 سم عرضاً في 200 سم طولاً. استندات الرول أب العريضة تتراوح من 100 سم إلى 150 سم عرضاً للتطبيقات التي تحتاج سطح عرض أكبر. ويندو للإعلان ينصح بالمقاس الأنسب بناءً على مساحة البوث أو العرض ومسافة المشاهدة."
      }
    },
    {
      "@type": "Question",
      "name": "كم يستغرق إنتاج استند الرول أب؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "إنتاج استند الرول أب العادي يستغرق من 2 إلى 4 أيام عمل من اعتماد التصميم. الإنتاج السريع خلال 24 ساعة متاح للمواعيد العاجلة للمعارض والفعاليات. ويندو للإعلان يدير التصميم والطباعة والتجميع داخلياً، مما يتيح تسليماً سريعاً للطلبات في اللحظة الأخيرة."
      }
    },
    {
      "@type": "Question",
      "name": "هل يمكن استبدال الطباعة على استند رول أب موجود؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "نعم. استندات الرول أب مصممة لاستبدال الرسومات — آلية الكاسيت تحمل البانر المطبوع الذي يمكن تبديله عند تغيير حملتك أو رسالة علامتك التجارية. ويندو للإعلان يوفر رسومات رول أب بديلة للاستندات الموجودة، مما يقلل تكلفة تحديث نظام العرض الخاص بك."
      }
    },
    {
      "@type": "Question",
      "name": "هل استندات الرول أب مناسبة للاستخدام الخارجي؟",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "استندات الرول أب العادية مصممة للاستخدام الداخلي. للاستخدام الخارجي، ينصح ويندو للإعلان بالاستندات القابلة للطي المصنفة للاستخدام الخارجي مع قواعد مثقلة ووسائط طباعة مقاومة للأشعة فوق البنفسجية، أو أنظمة بانرات خارجية مصممة خصيصاً لظروف الرياح والحرارة في المملكة العربية السعودية."
      }
    }
  ]
}
</script>
HTML;
    }
};
