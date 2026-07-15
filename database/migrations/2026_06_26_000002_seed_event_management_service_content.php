<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'event-management';

        $service = DB::table('services')->where('slug', $slug)->first();

        if (!$service) {
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'services/event-management.webp',
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
            'title' => 'Event Management',
            'content' => $this->getEnglishContent(),
            'meta_title' => 'Event Management Company in Riyadh | Window Advertising',
            'meta_description' => 'Window Advertising is a full-service event management company in Riyadh. We plan and execute corporate events, product launches, award ceremonies, and private occasions across Saudi Arabia. Request a free consultation.',
            'meta_keywords' => 'event management company Riyadh, event planning Saudi Arabia, corporate event organizer Riyadh, event management services Riyadh',
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
            'title' => 'إدارة الفعاليات',
            'content' => $this->getArabicContent(),
            'meta_title' => 'شركة إدارة فعاليات في الرياض | ويندو للإعلان',
            'meta_description' => 'ويندو للإعلان شركة إدارة فعاليات متكاملة في الرياض — نخطط وننفذ فعاليات الشركات وإطلاق المنتجات وحفلات التكريم والمناسبات الخاصة في جميع أنحاء المملكة. تواصل معنا للحصول على استشارة مجانية.',
            'meta_keywords' => 'شركة إدارة فعاليات الرياض, تنظيم فعاليات شركات السعودية, إدارة الفعاليات الرياض, تنظيم حفلات الشركات, فعاليات الرياض',
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
        $service = DB::table('services')->where('slug', 'event-management')->first();
        if ($service) {
            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->update(['content' => null, 'meta_title' => null, 'meta_description' => null, 'meta_keywords' => null]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<p>Window Advertising is Riyadh's full-service event management company, trusted by corporations, government entities, and brands across Saudi Arabia. From intimate executive dinners to large-scale national day celebrations, we manage every detail — so you can focus on your guests.</p>

<h2>What Is Professional Event Management?</h2>
<p>Professional event management is more than booking a venue and sending invitations. It is the end-to-end planning, coordination, and execution of an experience that represents your brand or organization. A professional event management company handles concept development, vendor sourcing, logistics, design, technical setup, on-site coordination, and post-event breakdown — turning your vision into a seamless reality.</p>
<p>At Window Advertising, we treat every event as a branding opportunity. Every detail, from the entrance backdrop to the branded stage and the takeaway gifts, communicates who you are.</p>

<h2>Our Event Management Services in Riyadh</h2>
<p>We offer end-to-end event management services for corporate and private clients:</p>
<ul>
<li>Corporate events and annual galas</li>
<li>Product launches and brand activations</li>
<li>Award ceremonies and employee recognition events</li>
<li>National Day and Founding Day celebrations</li>
<li>Shareholder meetings and investor days</li>
<li>Team-building activities and company retreats</li>
<li>Government and public sector events</li>
<li>Private occasions and VIP experiences</li>
</ul>
<p>Every service is delivered with a dedicated project manager assigned from day one to final handover.</p>

<h2>Why Choose Window Advertising for Event Management?</h2>
<p>Companies across Saudi Arabia choose Window Advertising because we own the entire production chain in-house. We do not outsource your event — our design team, print production, fabrication, and logistics crew all work under one roof. This gives us direct control over quality and timeline at every stage.</p>
<p>Our work spans hundreds of events in Riyadh and beyond. Our portfolio demonstrates consistent delivery for clients in healthcare, finance, retail, hospitality, technology, and government. We understand the cultural standards expected at Saudi corporate events and bring the precision and attention to detail those standards demand.</p>

<h2>Our Event Management Process</h2>
<p>We follow a structured process to ensure nothing is left to chance:</p>
<ol>
<li><strong>Briefing &amp; Discovery</strong> — we understand your event objectives, audience, budget, and brand.</li>
<li><strong>Concept &amp; Design</strong> — our creative team develops the event concept, floor plan, and visual identity.</li>
<li><strong>Planning &amp; Coordination</strong> — we source venues, vendors, equipment, and manage all logistics.</li>
<li><strong>Production</strong> — we fabricate all printed and built elements: stages, backdrops, signage, and decor.</li>
<li><strong>On-Site Execution</strong> — our team arrives early, sets up, manages the event live, and resolves any issues in real time.</li>
<li><strong>Post-Event</strong> — dismantling, waste management, and a full post-event report.</li>
</ol>

<h2>Types of Corporate Events We Manage</h2>
<p>Our most in-demand event types in Riyadh include:</p>
<p><strong>Product Launches:</strong> We design immersive launch environments that generate buzz and media coverage. From projection mapping to custom branded installations, we make your launch unforgettable.</p>
<p><strong>Award Ceremonies:</strong> Bespoke stage designs, honor shields, personalized trophies, printed programs, and branded photo walls — every element crafted to celebrate your team.</p>
<p><strong>National Day Events:</strong> We specialize in Saudi National Day (September 23) and Founding Day (February 22) celebrations with fully themed decor, patriotic branding, and large-scale outdoor setups.</p>
<p><strong>Annual Corporate Galas:</strong> Elegant venue styling, branded materials, entertainment coordination, and seamless logistics for your most important company event of the year.</p>

<h2>Frequently Asked Questions About Event Management</h2>

<h3>How much does corporate event management cost in Riyadh?</h3>
<p>Event management costs depend on the size, type, and complexity of your event. Window Advertising provides tailored pricing for every budget. Contact us with your event brief and we will provide a detailed, itemized quote at no charge.</p>

<h3>What types of events does Window Advertising manage?</h3>
<p>Window Advertising manages a full range of corporate and private events including product launches, award ceremonies, annual galas, shareholder meetings, national day celebrations, brand activations, and team-building events across Riyadh and Saudi Arabia.</p>

<h3>How far in advance should I book event management services?</h3>
<p>We recommend contacting us at least 4–6 weeks before your event date for standard events, and 8–12 weeks for large-scale or multi-day events. For urgent requests, we can accommodate shorter timelines depending on availability.</p>

<h3>Does Window Advertising handle event design and decoration?</h3>
<p>Yes. Our event management service is fully integrated — we handle concept design, stage setup, backdrop printing, branded signage, floral arrangements, lighting, AV equipment, furniture, and overall event decor as part of our turnkey solution.</p>

<h3>Do you manage events outside of Riyadh?</h3>
<p>Yes. Window Advertising manages events across Saudi Arabia including Jeddah, Dammam, NEOM, and other cities. Our team travels nationwide to deliver the same standard of quality regardless of location.</p>

<h2>Request a Free Event Management Consultation</h2>
<p>Ready to start planning your event? Contact Window Advertising today. Share your event brief and our team will respond within 24 hours with ideas and an initial quote. We manage events of all sizes — from 50 to 5,000 guests.</p>
HTML;
    }

    private function getArabicContent(): string
    {
        return <<<'HTML'
<p>ويندو للإعلان هي شركة إدارة فعاليات متكاملة في الرياض، موثوقة من قبل الشركات والجهات الحكومية والعلامات التجارية في جميع أنحاء المملكة العربية السعودية. من العشاء التنفيذي الحميم إلى احتفالات اليوم الوطني الكبرى، ندير كل التفاصيل — حتى تتمكن من التركيز على ضيوفك.</p>

<h2>ما هي إدارة الفعاليات الاحترافية؟</h2>
<p>إدارة الفعاليات الاحترافية هي أكثر من مجرد حجز مكان وإرسال دعوات. إنها التخطيط والتنسيق والتنفيذ الشامل لتجربة تمثل علامتك التجارية أو مؤسستك. تتولى شركة إدارة الفعاليات المحترفة تطوير المفهوم، والبحث عن الموردين، والخدمات اللوجستية، والتصميم، والإعداد الفني، والتنسيق في الموقع، والتفكيك بعد الحدث — لتحويل رؤيتك إلى واقع سلس.</p>
<p>في ويندو للإعلان، نعامل كل فعالية كفرصة للعلامة التجارية. كل تفصيل، من خلفية المدخل إلى المسرح ذي العلامة التجارية وهدايا الضيوف، يعبر عن هويتك.</p>

<h2>خدمات إدارة الفعاليات لدينا في الرياض</h2>
<p>نقدم خدمات إدارة فعاليات شاملة للعملاء من الشركات والأفراد:</p>
<ul>
<li>فعاليات الشركات والحفلات السنوية</li>
<li>إطلاق المنتجات وتفعيل العلامات التجارية</li>
<li>حفلات التكريم وتقدير الموظفين</li>
<li>احتفالات اليوم الوطني ويوم التأسيس</li>
<li>اجتماعات المساهمين وأيام المستثمرين</li>
<li>أنشطة بناء الفريق ورحلات الشركات</li>
<li>فعاليات القطاع الحكومي والعام</li>
<li>المناسبات الخاصة وتجارب كبار الشخصيات</li>
</ul>
<p>يتم تقديم كل خدمة مع مدير مشروع مخصص من اليوم الأول حتى التسليم النهائي.</p>

<h2>لماذا تختار ويندو للإعلان؟</h2>
<p>تختار الشركات في جميع أنحاء المملكة العربية السعودية ويندو للإعلان لأننا نمتلك سلسلة الإنتاج بالكامل داخلياً. لا نستعين بمصادر خارجية لفعاليتك — فريق التصميم والطباعة والتصنيع والخدمات اللوجستية يعملون جميعاً تحت سقف واحد. هذا يمنحنا سيطرة مباشرة على الجودة والجدول الزمني في كل مرحلة.</p>
<p>يمتد عملنا عبر مئات الفعاليات في الرياض وخارجها. تُظهر محفظة أعمالنا تقديماً مستمراً للعملاء في قطاعات الرعاية الصحية والمالية والتجزئة والضيافة والتكنولوجيا والحكومة. نفهم المعايير الثقافية المتوقعة في فعاليات الشركات السعودية ونقدم الدقة والاهتمام بالتفاصيل التي تتطلبها تلك المعايير.</p>

<h2>مراحل إدارة فعاليتك</h2>
<p>نتبع عملية منظمة لضمان عدم ترك شيء للصدفة:</p>
<ol>
<li><strong>الإحاطة والاكتشاف</strong> — نفهم أهداف فعاليتك وجمهورك وميزانيتك وعلامتك التجارية.</li>
<li><strong>المفهوم والتصميم</strong> — يطور فريقنا الإبداعي مفهوم الفعالية ومخطط الطابق والهوية البصرية.</li>
<li><strong>التخطيط والتنسيق</strong> — نبحث عن الأماكن والموردين والمعدات وندير جميع الخدمات اللوجستية.</li>
<li><strong>الإنتاج</strong> — نصنع جميع العناصر المطبوعة والمبنية: المسارح والخلفيات واللافتات والديكور.</li>
<li><strong>التنفيذ في الموقع</strong> — يصل فريقنا مبكراً، ويجهز، ويدير الفعالية مباشرة، ويحل أي مشكلات في الوقت الفعلي.</li>
<li><strong>ما بعد الفعالية</strong> — التفكيك وإدارة النفايات وتقرير شامل بعد الفعالية.</li>
</ol>

<h2>أنواع الفعاليات الشركاتية التي ندير</h2>
<p>أكثر أنواع الفعاليات طلباً لدينا في الرياض تشمل:</p>
<p><strong>إطلاق المنتجات:</strong> نصمم بيئات إطلاق غامرة تولد ضجة وتغطية إعلامية. من الإسقاط الضوئي إلى التركيبات المخصصة ذات العلامة التجارية، نجعل إطلاقك لا يُنسى.</p>
<p><strong>حفلات التكريم:</strong> تصاميم مسرح مخصصة، ودروع تكريم، وجوائز شخصية، وبرامج مطبوعة، وجدران تصوير ذات علامة تجارية — كل عنصر مصمم للاحتفاء بفريقك.</p>
<p><strong>فعاليات اليوم الوطني:</strong> نتخصص في احتفالات اليوم الوطني السعودي (23 سبتمبر) ويوم التأسيس (22 فبراير) مع ديكور كامل بالطابع الوطني وعلامات تجارية وطنية وإعدادات خارجية واسعة النطاق.</p>
<p><strong>الحفلات السنوية للشركات:</strong> تنسيق أنيق للأماكن، ومواد ذات علامة تجارية، وتنسيق الترفيه، وخدمات لوجستية سلسة لأهم فعالية في شركتك خلال العام.</p>

<h2>الأسئلة الشائعة حول إدارة الفعاليات</h2>

<h3>كم تكلفة إدارة فعاليات الشركات في الرياض؟</h3>
<p>تعتمد تكاليف إدارة الفعاليات على حجم ونوع وتعقيد فعاليتك. توفر ويندو للإعلان أسعاراً مخصصة لكل ميزانية. تواصل معنا بملخص فعاليتك وسنقدم لك عرض سعر مفصل ومفصّل مجاناً.</p>

<h3>ما أنواع الفعاليات التي تديرها ويندو للإعلان؟</h3>
<p>تدير ويندو للإعلان مجموعة كاملة من الفعاليات المؤسسية والخاصة بما في ذلك إطلاق المنتجات وحفلات التكريم والحفلات السنوية واجتماعات المساهمين واحتفالات اليوم الوطني وتفعيل العلامات التجارية وفعاليات بناء الفريق في الرياض والمملكة العربية السعودية.</p>

<h3>قبل كم من الوقت يجب حجز خدمات إدارة الفعاليات؟</h3>
<p>نوصي بالتواصل معنا قبل 4-6 أسابيع على الأقل من تاريخ فعاليتك للفعاليات العادية، و8-12 أسبوعاً للفعاليات الكبيرة أو متعددة الأيام. للطلبات العاجلة، يمكننا استيعاب جداول زمنية أقصر حسب التوفر.</p>

<h3>هل تتولى ويندو للإعلان تصميم وديكور الفعاليات؟</h3>
<p>نعم. خدمة إدارة الفعاليات لدينا متكاملة بالكامل — نتولى تصميم المفهوم وإعداد المسرح وطباعة الخلفيات واللافتات ذات العلامة التجارية وترتيبات الزهور والإضاءة ومعدات الصوت والمرئيات والأثاث وديكور الفعالية بالكامل كجزء من حلنا الشامل.</p>

<h3>هل تديرون فعاليات خارج الرياض؟</h3>
<p>نعم. تدير ويندو للإعلان فعاليات في جميع أنحاء المملكة العربية السعودية بما في ذلك جدة والدمام ونيوم ومدن أخرى. يسافر فريقنا على مستوى المملكة لتقديم نفس مستوى الجودة بغض النظر عن الموقع.</p>

<h2>احصل على استشارة مجانية لفعاليتك</h2>
<p>هل أنت مستعد لبدء التخطيط لفعاليتك؟ تواصل مع ويندو للإعلان اليوم. شارك ملخص فعاليتك وسيرد فريقنا خلال 24 ساعة بالأفكار وعرض سعر مبدئي. ندير فعاليات بجميع الأحجام — من 50 إلى 5,000 ضيف.</p>
HTML;
    }
};
