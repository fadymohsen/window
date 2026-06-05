<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $oldSlug = 'afdl-shrk-tsnyaa-agnh-almaaard-fy-alryad';
        $newSlug = 'best-exhibition-booth-manufacturer-riyadh';
        $oldEnSlug = 'afdl-shrk-tsnyaa-agnh-almaaard-fy-alryad';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('slug', $oldSlug)->first();
            if (!$blog) {
                $blog = DB::table('blogs')->where('id', 42)->first();
            }
            if (!$blog) { return; }
            if (!DB::table('blogs')->where('slug', $newSlug)->where('id', '!=', $blog->id)->exists()) {
                DB::table('blogs')->where('id', $blog->id)->update(['slug' => $newSlug]);
            }
        }
        $blogId = $blog->id;

        // Redirect from old slug
        if (!DB::table('slug_redirects')->where('from_slug', $oldSlug)->where('type', 'blog')->exists()) {
            DB::table('slug_redirects')->insert([
                'from_slug' => $oldSlug,
                'to_slug'   => $newSlug,
                'type'      => 'blog',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Redirect from old EN slug
        if (!DB::table('slug_redirects')->where('from_slug', $oldEnSlug)->where('type', 'blog')->exists()) {
            DB::table('slug_redirects')->insert([
                'from_slug' => $oldEnSlug,
                'to_slug'   => $newSlug,
                'type'      => 'blog',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $enTitle           = 'Best Exhibition Booth Manufacturing Company in Riyadh: The Complete Guide to Designing, Building, and Installing a Booth That Wins';
        $enMetaTitle       = 'Best Exhibition Booth Manufacturing Company in Riyadh | Window Advertising Agency 2026';
        $enMetaDescription = 'Comprehensive guide to exhibition booth design, manufacturing, and installation in Riyadh. Discover why Window Advertising Agency is the leading booth manufacturer in Saudi Arabia with end-to-end solutions.';
        $enKeywords        = 'exhibition booth manufacturer Riyadh,exhibition booth design Saudi Arabia,booth manufacturing company,trade show booth Riyadh,exhibition stand builder,custom exhibition booth,booth installation Saudi Arabia,Window Advertising Agency';

        $enExists = DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', 'en')
            ->exists();

        if ($enExists) {
            DB::table('blog_translations')
                ->where('blog_id', $blogId)
                ->where('locale', 'en')
                ->update([
                    'title'            => $enTitle,
                    'description'      => $this->getEnglishContent(),
                    'keywords'         => $enKeywords,
                    'meta_title'       => $enMetaTitle,
                    'meta_description' => $enMetaDescription,
                ]);
        } else {
            DB::table('blog_translations')->insert([
                'blog_id'          => $blogId,
                'locale'           => 'en',
                'title'            => $enTitle,
                'description'      => $this->getEnglishContent(),
                'keywords'         => $enKeywords,
                'meta_title'       => $enMetaTitle,
                'meta_description' => $enMetaDescription,
            ]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<blockquote>
<p>In a Saudi Arabia propelled by Vision 2030, exhibitions have evolved from optional marketing activities into strategic growth platforms. Major events in Riyadh, Jeddah, and Dammam now attract global brands competing for attention in the same exhibition halls. Your booth is no longer just a rented square of floor space — it is a full-scale marketing tool that communicates your brand story, engages your audience, and generates measurable business results. This guide covers everything you need to know about exhibition booth design, manufacturing, and installation in Saudi Arabia, and explains why Window Advertising Agency is the partner companies trust to deliver exceptional booth experiences across the Kingdom.</p>
</blockquote>

<h2>Why Exhibitions Are a Strategic Priority in Vision 2030 Saudi Arabia</h2>

<p>Saudi Arabia's ambitious Vision 2030 has transformed the Kingdom into a global hub for conferences, trade shows, and mega-events. From the Riyadh Season to international industry expos, the events calendar is busier than ever. For businesses operating in this dynamic landscape, exhibitions represent a unique opportunity to meet decision-makers face-to-face, demonstrate products in real time, and establish credibility in a market where personal relationships drive commercial decisions.</p>

<blockquote>
<p><strong>Market Insight:</strong> Saudi Arabia's exhibitions and conferences sector has experienced significant growth under Vision 2030, with Riyadh alone hosting hundreds of major trade shows and events annually across sectors including construction, technology, healthcare, energy, and retail.</p>
</blockquote>

<p>Exhibitions deliver what digital marketing cannot replicate — multisensory brand experiences where visitors see, touch, and interact with your products. A three-day event concentrates months of potential networking into a single venue, placing your brand directly in front of qualified prospects who have actively chosen to attend. For companies looking to expand in Saudi Arabia, a professionally manufactured booth is not an expense — it is a strategic investment that accelerates market entry and builds trust faster than any other channel.</p>

<h3>The Booth Is Your Brand in Physical Form</h3>

<p>Think of your exhibition booth as the three-dimensional embodiment of your entire brand. Every material, color, lighting angle, and graphic panel communicates something to visitors before a single word is exchanged. A poorly constructed booth signals a lack of professionalism and undermines even the strongest product offering. Conversely, a well-designed and expertly manufactured booth commands attention, builds instant credibility, and creates the kind of first impression that converts visitors into leads and leads into long-term clients.</p>

<blockquote>
<p><strong>Key Perspective:</strong> Your booth is not a cost center — it is a marketing tool. Treat it with the same strategic importance as your website, your advertising campaigns, and your sales team. The companies that win at exhibitions are the ones that invest in professional booth design and manufacturing.</p>
</blockquote>

<h2>What Window Advertising Agency Offers: End-to-End Exhibition Solutions</h2>

<p>Window Advertising Agency provides comprehensive exhibition booth services that cover every stage of the process — from initial creative concept through post-event support. With over 25 years of experience in the Saudi advertising and fabrication market, Window combines local expertise with international standards to deliver booths that stand out on any exhibition floor.</p>

<h3>3D Design and Visualization</h3>

<p>Every Window project begins with detailed 3D design and photorealistic visualization. Our design team creates complete digital models of your booth, allowing you to experience every angle, sightline, and visitor pathway before a single piece of material is cut. This process eliminates guesswork, prevents costly revisions during manufacturing, and ensures the final booth matches your approved vision with precision. Clients review multiple design concepts and provide feedback through an iterative process until the design is exactly right.</p>

<h3>Manufacturing with Premium Materials</h3>

<p>Window operates in-house manufacturing facilities equipped to work with the full range of exhibition materials. Our production team fabricates booth structures using lightweight aluminum framing systems for structural integrity, forex (PVC foam board) panels for clean graphic surfaces, premium wood finishes for warm and sophisticated aesthetics, acrylic and glass elements for modern transparency, and high-quality printing substrates for vibrant brand graphics. Every component is manufactured to exacting specifications, with quality control checkpoints at each stage of production.</p>

<figure class="table">
<table>
<thead>
<tr><th>Material</th><th>Application</th><th>Advantages</th></tr>
</thead>
<tbody>
<tr><td>Aluminum Framing</td><td>Structural framework, modular systems</td><td>Lightweight, strong, reusable across multiple events</td></tr>
<tr><td>Forex (PVC Foam Board)</td><td>Wall panels, graphic surfaces, signage</td><td>Smooth finish, easy to print on, cost-effective</td></tr>
<tr><td>Premium Wood</td><td>Feature walls, counters, product displays</td><td>Warm aesthetic, premium feel, versatile finishing</td></tr>
<tr><td>Acrylic &amp; Glass</td><td>Display cases, shelving, backlit elements</td><td>Modern look, transparency, excellent light diffusion</td></tr>
<tr><td>Fabric &amp; Tension Systems</td><td>Backlit walls, ceiling features, curved elements</td><td>Seamless graphics, lightweight, easy to transport</td></tr>
</tbody>
</table>
</figure>

<h3>Professional Installation Across Saudi Arabia</h3>

<p>Window's trained installation teams operate across all major Saudi cities including Riyadh, Jeddah, Dammam, and Makkah. Our crews handle complete booth assembly, electrical and lighting setup, graphic panel installation, technology integration, and final quality inspection — all within the tight timelines that exhibition venues demand. A dedicated project manager oversees every installation to ensure nothing is overlooked and the booth is ready to impress from the moment the exhibition doors open.</p>

<blockquote>
<p><strong>Coverage:</strong> Window delivers exhibition booth installation services across Riyadh, Jeddah, Dammam, Makkah, and other key Saudi cities. Our logistics team manages transportation, setup, and dismantling regardless of venue location.</p>
</blockquote>

<h2>The 6 Steps: How Window Builds Your Exhibition Booth from Vision to Reality</h2>

<p>Window follows a structured six-step process that transforms your exhibition vision into a finished booth. Each step builds upon the previous one, ensuring nothing is missed and the final result meets the highest standards of quality and design.</p>

<h3>Step 1: Listen to Your Vision</h3>

<p>Every project begins with a deep-listening session where our team works to understand your brand, your exhibition objectives, your target audience, and your competitive landscape. What message do you want your booth to communicate? What experience do you want visitors to have? What are your measurable goals for the event? These answers form the strategic foundation upon which everything else is built. We do not start designing until we fully understand what success looks like for you.</p>

<h3>Step 2: Strategic Planning</h3>

<p>With your vision clearly defined, our planning team maps out the practical framework. This includes analyzing the exhibition venue specifications, floor plan positioning, traffic flow patterns, electrical and structural requirements, budget allocation across all elements, and a detailed timeline working backward from the event date. Strategic planning ensures that creative ambition is grounded in practical reality.</p>

<h3>Step 3: 3D Design and Visualization</h3>

<p>Our creative team translates the strategic plan into photorealistic 3D renderings that show exactly what your booth will look like from every angle. Clients can virtually walk through their booth, evaluate sightlines from the exhibition aisle, assess brand visibility from 30 meters away, and approve every detail before manufacturing begins. Revisions at this stage cost nothing compared to changes made during production.</p>

<h3>Step 4: Precision Manufacturing</h3>

<p>Once the design is approved, our manufacturing team begins production using selected materials — aluminum, forex, wood, acrylic, fabric, or any combination required by the design. Every component is fabricated in-house under strict quality control. Structural elements are tested for stability, graphic panels are printed at the highest resolution, and all components are pre-assembled in our workshop to verify fit and finish before shipping to the venue.</p>

<h3>Step 5: On-Site Installation</h3>

<p>Window's experienced installation crews arrive at the venue with all components, tools, and equipment needed for a complete setup. Installation follows a precise sequence: structural framework first, then electrical and lighting, followed by graphic panels, technology integration, furniture placement, and final detailing. Every booth undergoes a comprehensive quality inspection before handover, ensuring every element is perfect.</p>

<h3>Step 6: Post-Event Support</h3>

<p>The work does not end when the exhibition opens — or even when it closes. Window provides on-site technical support throughout the event duration, handling any adjustments, repairs, or issues that arise. After the event, our team manages professional dismantling, careful packing of reusable components, transportation back to storage, and inventory documentation so your booth investment is preserved for future events.</p>

<blockquote>
<p><strong>Window's Promise:</strong> A dedicated project manager is assigned to your booth from Step 1 through Step 6. This single point of accountability means you never have to chase different people for updates — one person owns your project from start to finish.</p>
</blockquote>

<h2>Flexible Packages for Every Budget</h2>

<p>Window understands that exhibition budgets vary significantly. A startup exhibiting for the first time has different financial constraints than a multinational corporation booking an island booth at a major trade show. That is why Window offers flexible booth packages designed to deliver maximum impact at every budget level.</p>

<figure class="table">
<table>
<thead>
<tr><th>Package Tier</th><th>Ideal For</th><th>Includes</th></tr>
</thead>
<tbody>
<tr><td>Essential</td><td>Startups and first-time exhibitors</td><td>Custom 3D design, standard materials, professional installation, basic lighting, branded graphics</td></tr>
<tr><td>Professional</td><td>Mid-sized companies and regular exhibitors</td><td>Premium design, mixed materials (aluminum + forex + wood), advanced lighting, technology integration, on-site support</td></tr>
<tr><td>Premium</td><td>Large enterprises and flagship events</td><td>Bespoke architectural design, premium materials throughout, interactive technology, custom furniture, full event support, post-event storage</td></tr>
<tr><td>Modular</td><td>Companies exhibiting at multiple events annually</td><td>Reusable modular system, interchangeable graphics, scalable footprint, long-term storage and maintenance program</td></tr>
</tbody>
</table>
</figure>

<p>Every package is customizable. Window works with your specific budget to identify where investment delivers the highest return, ensuring you never overspend on elements that do not contribute to your exhibition objectives, and never underspend on the details that make the difference between a good booth and a great one.</p>

<h2>Interactive Booths with Modern Technology</h2>

<p>Today's exhibition visitors expect more than static displays and printed brochures. Interactive technology transforms passive observers into active participants, dramatically increasing engagement time and lead capture rates. Window integrates cutting-edge technology into booth designs to create immersive experiences that visitors remember long after the event ends.</p>

<h3>Technology Integration Options</h3>

<ul>
<li><strong>Touchscreen Product Configurators:</strong> Allow visitors to customize and explore your products in real time, creating a personalized experience that builds emotional investment in your offering.</li>
<li><strong>LED Video Walls:</strong> High-resolution LED displays deliver dynamic content that attracts attention from across the exhibition hall. Rotating presentations, product videos, and live social media feeds keep your booth visually alive.</li>
<li><strong>Augmented Reality (AR) Experiences:</strong> Let visitors visualize your products in their own environment using tablet-based or headset AR applications. Particularly powerful for architecture, interior design, and industrial equipment companies.</li>
<li><strong>Digital Lead Capture Systems:</strong> Replace paper forms with tablet-based registration, QR code scanning, and badge readers that capture visitor data instantly and feed it directly into your CRM system.</li>
<li><strong>Interactive Floor and Wall Projections:</strong> Motion-responsive projections create surprise and delight moments that draw crowds and generate social media buzz around your booth.</li>
</ul>

<blockquote>
<p><strong>Engagement Impact:</strong> Booths with interactive technology elements consistently see higher dwell times and improved lead quality compared to traditional static displays, making technology integration one of the highest-ROI investments in exhibition marketing.</p>
</blockquote>

<h2>Sustainability in Exhibition Booth Manufacturing</h2>

<p>Environmental responsibility is increasingly important to exhibitors and visitors alike. Window is committed to sustainable booth manufacturing practices that minimize waste, reduce environmental impact, and deliver long-term cost savings for clients.</p>

<h3>Eco-Friendly Materials</h3>

<p>Window sources recyclable aluminum framing systems, sustainably produced wood panels, water-based inks for graphic printing, and biodegradable packaging materials. Where possible, we substitute traditional materials with eco-friendly alternatives that deliver the same visual impact with a smaller environmental footprint.</p>

<h3>Reusable and Lightweight Booth Systems</h3>

<p>Our modular booth designs are engineered for repeated use across multiple events. Lightweight aluminum frames and interchangeable graphic panels mean the same core structure can be reconfigured, re-skinned, and redeployed at different exhibitions — dramatically reducing the waste associated with single-use booth constructions. Lighter booths also reduce transportation fuel consumption and lower logistics costs.</p>

<blockquote>
<p><strong>Sustainability Commitment:</strong> Window designs every modular booth to serve a minimum of 10 events before structural components need replacement. Graphic panels and fabric elements can be updated for each event while the core structure remains unchanged, reducing both cost and waste.</p>
</blockquote>

<h3>Waste Reduction in Production</h3>

<p>Our manufacturing process incorporates precise digital cutting technology that optimizes material usage and minimizes offcuts. Production waste is sorted for recycling, and we continuously evaluate our supply chain for opportunities to reduce packaging, eliminate single-use materials, and improve energy efficiency in our workshop operations.</p>

<h2>7 Expert Tips for a Winning Exhibition Booth</h2>

<p>Whether you are exhibiting for the first time or preparing for your fiftieth trade show, these proven tips will help you maximize the impact of your booth investment:</p>

<ol>
<li><strong>Match your booth to your brand identity.</strong> Every color, material, and graphic element should be a direct extension of your brand guidelines. Consistency between your booth, your website, your printed materials, and your team uniforms builds recognition and trust. Visitors should know it is your booth before they read your company name.</li>
<li><strong>Distribute space intelligently.</strong> Resist the temptation to fill every square meter with displays and furniture. Strategic open space creates comfortable entry points, prevents crowding, and allows visitors to engage with your team without feeling trapped. Plan distinct zones for product display, meeting areas, demonstration spaces, and storage.</li>
<li><strong>Invest in interactive technology.</strong> Touchscreens, AR experiences, LED walls, and digital lead capture systems transform visitors from passive observers into active participants. Interactive elements increase dwell time — and the longer a visitor stays at your booth, the more likely they are to convert into a qualified lead.</li>
<li><strong>Never compromise on finish quality.</strong> The details matter. Clean edges, seamless joints, professional lighting, and flawless graphics communicate that your company cares about quality in everything it does. A single loose panel, flickering light, or wrinkled banner undermines the entire investment.</li>
<li><strong>Prioritize lighting design.</strong> Professional lighting elevates an average booth to a premium experience. Use accent lighting to highlight products, backlit graphics for brand visibility from distance, and ambient lighting to create an inviting atmosphere. Dark or flat-lit booths are subconsciously avoided by visitors.</li>
<li><strong>Plan your visitor flow.</strong> Design your booth layout so visitors naturally move through your key messages and product highlights in a logical sequence. Open entrances, clear sightlines, and intuitive pathways ensure visitors experience your booth as you intended, rather than wandering aimlessly.</li>
<li><strong>Work with a local expert.</strong> Exhibition logistics in Saudi Arabia have unique requirements — venue regulations, permit processes, labor coordination, electrical specifications, and cultural considerations. A local partner like Window eliminates the risk of costly surprises and ensures smooth execution from planning through dismantling.</li>
</ol>

<blockquote>
<p><strong>Common Mistake:</strong> Many companies spend their entire budget on the booth structure and neglect the experience inside it. A beautifully built booth with untrained staff, no interactive elements, and no lead capture system is a wasted investment. Allocate budget across structure, technology, staffing, and follow-up for maximum return.</p>
</blockquote>

<h2>Why Window Advertising Agency Is the Right Partner</h2>

<p>Choosing an exhibition booth manufacturer is a decision that directly impacts your brand reputation and your event ROI. Window Advertising Agency has earned the trust of companies across Saudi Arabia for good reason:</p>

<h3>Local Expertise</h3>

<p>With over 25 years in the Saudi market, Window understands the unique requirements of exhibiting in the Kingdom — from venue regulations and permit processes in Riyadh to logistics coordination across Jeddah, Dammam, and Makkah. Local knowledge eliminates the risks that come with working with agencies unfamiliar with Saudi exhibition environments.</p>

<h3>End-to-End Execution</h3>

<p>Window handles every aspect of your exhibition booth under one roof: design, manufacturing, printing, installation, technology integration, on-site support, and post-event dismantling. This eliminates the coordination headaches, communication gaps, and finger-pointing that come from managing multiple vendors. One partner, one contract, one point of accountability.</p>

<h3>Custom Solutions for Every Need</h3>

<p>No two brands are alike, and no two booths should be either. Window designs every booth from scratch based on your specific brand identity, exhibition objectives, and budget parameters. We do not apply templates or recycle old designs — every project receives original creative thinking and purpose-built manufacturing.</p>

<h3>Constant Innovation</h3>

<p>The exhibition industry evolves rapidly. Window invests continuously in new materials, manufacturing techniques, technology integrations, and design approaches to ensure our clients always have access to the latest tools and trends. From sustainable materials to augmented reality experiences, we bring innovation to every project.</p>

<figure class="table">
<table>
<thead>
<tr><th>Advantage</th><th>What It Means for You</th></tr>
</thead>
<tbody>
<tr><td>25+ Years in the Saudi Market</td><td>Deep understanding of local regulations, venues, logistics, and culture</td></tr>
<tr><td>In-House Design Studio</td><td>Faster turnaround, seamless revisions, original creative work</td></tr>
<tr><td>Own Manufacturing Facilities</td><td>Quality control at every stage, no outsourcing delays</td></tr>
<tr><td>Nationwide Installation Teams</td><td>Professional setup in Riyadh, Jeddah, Dammam, Makkah, and beyond</td></tr>
<tr><td>Full Technology Integration</td><td>Interactive experiences that engage visitors and capture leads</td></tr>
<tr><td>Post-Event Support &amp; Storage</td><td>Protect your investment for reuse at future events</td></tr>
</tbody>
</table>
</figure>

<h2>Exhibition Booth Types: Choosing the Right Format</h2>

<p>Understanding the different booth formats available helps you make the right decision for your exhibition objectives and budget. Window designs and manufactures all standard exhibition booth types:</p>

<figure class="table">
<table>
<thead>
<tr><th>Booth Type</th><th>Description</th><th>Best For</th></tr>
</thead>
<tbody>
<tr><td>Linear / Inline Booth</td><td>Open on one side, positioned in a row with neighboring exhibitors</td><td>First-time exhibitors, smaller budgets, focused product displays</td></tr>
<tr><td>Corner Booth</td><td>Open on two sides, positioned at the end of a row</td><td>Mid-level exhibitors seeking better visibility and traffic flow</td></tr>
<tr><td>Peninsula Booth</td><td>Open on three sides, accessible from multiple aisles</td><td>Companies wanting high visibility and multiple entry points</td></tr>
<tr><td>Island Booth</td><td>Open on all four sides, standalone in the exhibition hall</td><td>Major brands making a flagship statement with maximum visibility</td></tr>
<tr><td>Double-Decker Booth</td><td>Two-level structure with upper meeting area or VIP lounge</td><td>Enterprises needing private meeting space above the exhibition floor</td></tr>
</tbody>
</table>
</figure>

<p style="text-align:center;"><strong>Ready to Build the Booth Your Brand Deserves?</strong></p>
<p style="text-align:center;">From first concept to final dismantling, Window Advertising Agency delivers exhibition booths that win attention, generate leads, and elevate your brand. Let our team design and manufacture your next booth.</p>
<p style="text-align:center;"><a href="https://windowadv.com/en/contact">Get Your Free Consultation</a></p>

<h2>Frequently Asked Questions</h2>

<h3>How early should I start planning my exhibition booth with Window?</h3>

<p>For standard booths, we recommend starting at least 8-10 weeks before the event. Custom-designed large or double-decker booths may require 14-20 weeks to allow sufficient time for design development, client approvals, manufacturing, and logistics coordination. Contact us as early as possible to secure the best timeline.</p>

<h3>What materials does Window use for exhibition booth manufacturing?</h3>

<p>We work with a full range of professional exhibition materials including lightweight aluminum framing, forex (PVC foam board) panels, premium wood finishes, acrylic and glass elements, fabric tension systems, and high-resolution printed graphics. Material selection depends on design requirements, budget, and whether the booth is intended for single-use or multiple events.</p>

<h3>Does Window handle booth installation outside of Riyadh?</h3>

<p>Yes. Window provides professional booth installation services across all major Saudi cities including Jeddah, Dammam, Makkah, and other locations. Our logistics team manages transportation, setup, on-site support, and dismantling regardless of venue location within the Kingdom.</p>

<h3>Can my booth be reused at multiple exhibitions?</h3>

<p>Absolutely. Our modular booth systems are specifically engineered for repeated use. The aluminum framework and structural components can serve 10-15 events, while graphic panels and branded elements can be updated for each new event. We also offer storage and maintenance services between exhibitions to keep your booth in perfect condition.</p>

<h3>Does Window integrate technology into exhibition booths?</h3>

<p>Yes. We integrate a wide range of technologies including touchscreen displays, LED video walls, augmented reality experiences, digital lead capture systems, interactive projections, and audio-visual equipment. Our team handles all technical setup, testing, and on-site troubleshooting throughout the event.</p>

<h3>What is included in Window's post-event support?</h3>

<p>Post-event support includes professional booth dismantling, careful packing of all components, transportation to our storage facility, inventory documentation, condition assessment, and maintenance recommendations. For modular booth clients, we offer ongoing storage and refurbishment programs to prepare the booth for its next deployment.</p>

<h3>How does Window ensure sustainable booth manufacturing?</h3>

<p>We prioritize recyclable materials (aluminum, sustainably sourced wood), use water-based printing inks, employ digital cutting to minimize material waste, and design modular systems for multi-event reuse. Our lightweight booth constructions also reduce transportation emissions. We continuously evaluate our supply chain for additional sustainability improvements.</p>
HTML;
    }

    public function down(): void
    {
        $newSlug = 'best-exhibition-booth-manufacturer-riyadh';
        $oldSlug = 'afdl-shrk-tsnyaa-agnh-almaaard-fy-alryad';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if ($blog) {
            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $oldSlug]);

            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }

        DB::table('slug_redirects')
            ->where('from_slug', $oldSlug)
            ->where('type', 'blog')
            ->delete();
    }
};
