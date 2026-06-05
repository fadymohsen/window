<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', '25-years-advertising-industry-evolution')->first();
        if (!$blog) {
            return;
        }

        $blogId = $blog->id;

        $oldEnSlug = 'khbr-25-sn-oakthr-rhl-ttor-snaaa-aldaaay-oalaaalan';
        if (!DB::table('slug_redirects')->where('from_slug', $oldEnSlug)->where('type', 'blog')->exists()) {
            DB::table('slug_redirects')->insert([
                'from_slug' => $oldEnSlug,
                'to_slug' => '25-years-advertising-industry-evolution',
                'type' => 'blog',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $enTitle = '25+ Years of Experience: The Evolution Journey of the Advertising Industry — From Arabic Calligraphy to Digital Transformation';
        $enMetaTitle = '25+ Years of Experience: The Evolution Journey of the Advertising Industry | Window Advertising Agency';
        $enMetaDescription = 'Discover how the advertising industry evolved from Arabic calligraphy and neon signs to digital printing and brand building. Window Advertising Agency shares 25+ years of firsthand experience navigating every era of transformation in Saudi Arabia.';
        $enKeywords = 'advertising industry evolution,25 years advertising experience,Arabic calligraphy signs,neon signs Saudi Arabia,digital printing evolution,cutter plotter advertising,vinyl acrylic signs,advertising agency history,Window Advertising Agency,brand building Saudi Arabia,outdoor advertising evolution';

        $enExists = DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', 'en')
            ->exists();

        if ($enExists) {
            DB::table('blog_translations')
                ->where('blog_id', $blogId)
                ->where('locale', 'en')
                ->update([
                    'title' => $enTitle,
                    'description' => $this->getEnglishContent(),
                    'keywords' => $enKeywords,
                    'meta_title' => $enMetaTitle,
                    'meta_description' => $enMetaDescription,
                ]);
        } else {
            DB::table('blog_translations')->insert([
                'blog_id' => $blogId,
                'locale' => 'en',
                'title' => $enTitle,
                'description' => $this->getEnglishContent(),
                'keywords' => $enKeywords,
                'meta_title' => $enMetaTitle,
                'meta_description' => $enMetaDescription,
            ]);
        }
    }

    private function getEnglishContent(): string
    {
        return <<<'HTML'
<blockquote>
<p>The advertising industry has undergone a remarkable transformation over the past quarter century. What began with skilled Arabic calligraphers hand-painting shop signs has evolved into a sophisticated ecosystem of digital design, precision printing, and integrated brand building. Window Advertising Agency has been present through every phase of this evolution — not as observers, but as active participants who adapted, invested, and grew with each technological and creative shift. This article traces the complete journey of the advertising industry from its traditional roots to its modern-day complexity, and explains why real experience across every era is the true differentiator in choosing an advertising partner.</p>
</blockquote>

<h2>The Foundation Era: Arabic Calligraphers as the Heart of Advertising</h2>

<p>Before design software, digital printers, or automated cutting machines existed, the advertising industry in Saudi Arabia and the Arab world was built on the shoulders of skilled Arabic calligraphers. These artisans were the original advertising professionals — their hand, their brush, and their mastery of letterforms were the tools that created every shop sign, every banner, and every commercial display visible in the marketplace.</p>

<p>Calligraphers did not simply write words. They understood visual balance, spatial composition, and the art of making text communicate beyond its literal meaning. A well-executed hand-lettered sign conveyed permanence, trust, and craftsmanship — qualities that directly reflected the business it represented. The calligrapher was designer, production specialist, and brand consultant all in one.</p>

<blockquote>
<p><strong>Historical Context:</strong> In the 1980s and early 1990s, an estimated 90% of commercial signage across Saudi Arabia was produced by hand. A single skilled calligrapher could produce 3-5 signs per week, with each sign representing hours of meticulous work that combined artistry with commercial understanding.</p>
</blockquote>

<p>Window Advertising Agency's earliest roots are embedded in this era. The foundational understanding of Arabic letterforms, visual communication, and the relationship between signage and business identity that was developed during this period continues to inform every project the agency undertakes today. This is not nostalgic history — it is operational DNA.</p>

<h2>The Neon and Raised Letters Era: When Advertising Gained a Third Dimension</h2>

<p>As the Saudi market expanded through the 1990s, flat painted signs were no longer sufficient to capture attention in increasingly competitive commercial districts. The arrival of neon tube lighting and raised three-dimensional letters marked the first major technological leap in the advertising industry. Signs were no longer flat surfaces — they became illuminated, dimensional objects that demanded attention day and night.</p>

<p>Neon signs required an entirely different set of skills. Glass tube bending, gas filling, electrical wiring, and structural engineering replaced brushes and paint. Raised letters — fabricated from metal, wood, or early plastics — introduced manufacturing processes that transformed advertising workshops from art studios into light fabrication facilities.</p>

<figure class="table">
<table>
<thead>
<tr>
<th>Element</th>
<th>Hand-Painted Era</th>
<th>Neon &amp; Raised Letters Era</th>
</tr>
</thead>
<tbody>
<tr>
<td>Primary skill</td>
<td>Calligraphy and brush technique</td>
<td>Metal fabrication and electrical work</td>
</tr>
<tr>
<td>Visibility</td>
<td>Daylight hours only</td>
<td>24-hour illuminated presence</td>
</tr>
<tr>
<td>Production time</td>
<td>1-3 days per sign</td>
<td>3-7 days per sign</td>
</tr>
<tr>
<td>Durability</td>
<td>1-3 years before repainting</td>
<td>5-10 years with maintenance</td>
</tr>
<tr>
<td>Cost level</td>
<td>Low to moderate</td>
<td>Moderate to high</td>
</tr>
<tr>
<td>Visual impact</td>
<td>Artistic and traditional</td>
<td>Modern and attention-grabbing</td>
</tr>
</tbody>
</table>
</figure>

<blockquote>
<p><strong>Industry Shift:</strong> The transition to neon and dimensional signage forced many traditional calligraphy workshops to either adapt or close. Agencies that survived this era — like Window — did so by embracing new technologies while retaining the design sensibility that calligraphic training provided. The ability to combine artistic judgment with technical execution became the defining trait of resilient advertising firms.</p>
</blockquote>

<h2>Modern Materials Revolution: Vinyl, Acrylic, and the New Visual Language</h2>

<p>The introduction of vinyl adhesive films and acrylic panels in the late 1990s and early 2000s fundamentally changed how advertising materials were produced. Vinyl offered unprecedented versatility — it could be cut into precise shapes, applied to virtually any surface, and produced in any color. Acrylic provided a clean, modern substrate that could be backlit, laser-cut, and formed into complex shapes that were impossible with traditional materials.</p>

<p>This era democratized professional-looking signage. What previously required a master calligrapher or a specialized metal fabricator could now be achieved through material selection and basic cutting techniques. However, this accessibility also created a quality divide. Businesses that understood material science, adhesive technology, and proper installation techniques produced results that lasted years. Those that cut corners produced signs that faded, peeled, and bubbled within months.</p>

<ul>
<li><strong>Cast vinyl:</strong> Premium-grade material with 7-12 year outdoor durability, conformable to curved surfaces, ideal for vehicle wraps and long-term signage applications.</li>
<li><strong>Calendered vinyl:</strong> Cost-effective option suitable for flat surfaces and shorter-term applications, typically lasting 3-5 years outdoors.</li>
<li><strong>Acrylic sheeting:</strong> Available in clear, colored, and frosted variants, acrylic became the standard for illuminated channel letters, lightbox faces, and premium interior signage.</li>
<li><strong>Composite panels (ACM):</strong> Aluminum composite material provided lightweight, rigid substrates for large-format outdoor signs and building facades.</li>
</ul>

<blockquote>
<p><strong>Material Impact:</strong> The shift to vinyl and acrylic reduced average sign production time by approximately 60% compared to traditional methods while increasing durability by a factor of 3-4x. Agencies that mastered these materials gained significant competitive advantages in both pricing and quality.</p>
</blockquote>

<h2>The Digital Design Revolution: Photoshop, Illustrator, and the End of Manual Layout</h2>

<p>Perhaps no single change impacted the advertising industry more profoundly than the adoption of digital design software. Adobe Photoshop and Adobe Illustrator transformed the creative process from physical layout boards and hand-drawn artwork into screen-based design workflows that were faster, more precise, and infinitely editable.</p>

<p>Before digital design tools, creating a logo required hand sketching, manual typesetting, and physical paste-up. Changes meant starting over. Color matching was done by eye against printed swatches. Scaling a design for different applications required manual redrawing at each size. Digital software eliminated all of these constraints simultaneously.</p>

<p>However, the transition was not smooth for everyone. Experienced calligraphers and manual designers faced a steep learning curve. Agencies that invested in training their existing teams — combining traditional design knowledge with new digital capabilities — emerged stronger than those that simply replaced experienced designers with young software operators who lacked foundational design understanding.</p>

<blockquote>
<p><strong>Critical Lesson:</strong> The digital revolution exposed a fundamental truth: software proficiency is not the same as design expertise. An operator who knows every Illustrator shortcut but lacks understanding of visual hierarchy, typography, and brand communication produces technically clean files that fail as effective advertising. Window Advertising Agency invested in bridging both worlds — training traditional designers on digital tools while ensuring that every digital designer understood foundational design principles.</p>
</blockquote>

<figure class="table">
<table>
<thead>
<tr>
<th>Capability</th>
<th>Manual Era</th>
<th>Digital Design Era</th>
</tr>
</thead>
<tbody>
<tr>
<td>Design revision speed</td>
<td>Hours to days</td>
<td>Minutes to hours</td>
</tr>
<tr>
<td>Color accuracy</td>
<td>Approximate (visual matching)</td>
<td>Precise (Pantone/CMYK/RGB values)</td>
</tr>
<tr>
<td>Scalability</td>
<td>Manual redrawing required</td>
<td>Infinite scaling from vector files</td>
</tr>
<tr>
<td>File storage</td>
<td>Physical archives</td>
<td>Digital libraries with instant access</td>
</tr>
<tr>
<td>Client collaboration</td>
<td>Physical meetings with printed proofs</td>
<td>Digital proofs via email, instant feedback</td>
</tr>
<tr>
<td>Production handoff</td>
<td>Manual specification sheets</td>
<td>Print-ready digital files</td>
</tr>
</tbody>
</table>
</figure>

<h2>Cutter Plotters: The Machine That Replaced the Calligrapher's Hand</h2>

<p>If digital design software changed how advertising was conceived, the cutter plotter changed how it was produced. These computer-controlled cutting machines could trace any digital design and cut it precisely from vinyl, paper, or other sheet materials — executing in minutes what took a calligrapher hours to produce by hand.</p>

<p>The cutter plotter was the first true automation technology to enter the advertising production workflow. It accepted vector files directly from design software and translated them into physical cuts with sub-millimeter accuracy. Complex Arabic letterforms that required years of calligraphic training to execute by hand could now be cut from vinyl by anyone who could operate the machine and prepare the digital file.</p>

<p>This technology marked a definitive turning point. Traditional calligraphers who had been the backbone of the industry found their core skill set mechanized. The emotional and cultural weight of this shift cannot be overstated — an entire generation of artisans saw their craft become a machine operation. Yet the knowledge these calligraphers possessed about letterform quality, spacing, and visual balance remained invaluable. The best agencies — Window among them — retained this human expertise and channeled it into quality control, design direction, and client consultation rather than discarding it entirely.</p>

<blockquote>
<p><strong>Productivity Leap:</strong> A single cutter plotter could produce the equivalent output of 8-10 calligraphers working full-time. Production costs dropped by an estimated 40-50%, while precision and consistency improved dramatically. Agencies that adopted this technology early gained decisive market advantages in both speed and pricing.</p>
</blockquote>

<h2>The Printing Revolution: From Offset to UV, Digital, Thermal, and DTF</h2>

<p>Printing technology has undergone its own parallel revolution. The advertising industry today operates with a diverse arsenal of printing methods, each suited to specific applications, materials, and quality requirements. Understanding when to use which technology is itself a form of expertise that separates knowledgeable agencies from those that apply a single solution to every problem.</p>

<figure class="table">
<table>
<thead>
<tr>
<th>Printing Technology</th>
<th>Best Applications</th>
<th>Key Advantages</th>
</tr>
</thead>
<tbody>
<tr>
<td>Offset printing</td>
<td>High-volume brochures, catalogs, packaging</td>
<td>Superior color fidelity, lowest per-unit cost at scale</td>
</tr>
<tr>
<td>Digital printing</td>
<td>Short runs, variable data, rapid turnaround</td>
<td>No plate costs, fast setup, economical for small quantities</td>
</tr>
<tr>
<td>UV printing</td>
<td>Rigid substrates, direct-to-object printing</td>
<td>Instant curing, vibrant colors on any surface, outdoor durability</td>
</tr>
<tr>
<td>Thermal transfer</td>
<td>Labels, barcodes, industrial marking</td>
<td>Precision, durability, resistance to harsh environments</td>
</tr>
<tr>
<td>DTF (Direct to Film)</td>
<td>Textile and fabric printing, apparel, promotional items</td>
<td>Full-color transfers on any fabric, no minimum order</td>
</tr>
<tr>
<td>Large-format inkjet</td>
<td>Banners, vehicle wraps, wall graphics, exhibition displays</td>
<td>Massive scale output, photographic quality at billboard sizes</td>
</tr>
</tbody>
</table>
</figure>

<p>Each technology carries specific requirements for file preparation, color management, material selection, and finishing. An agency with genuine experience across all these methods can recommend the optimal approach for each project rather than defaulting to whatever equipment happens to be available in-house.</p>

<blockquote>
<p><strong>Speed and Scale:</strong> Modern digital and UV printers can produce in one hour what took an entire day using offset setups just fifteen years ago. A large-format printer today outputs a 3x5 meter banner in under 20 minutes with photographic quality — a task that was simply impossible before the year 2000.</p>
</blockquote>

<p>Window Advertising Agency maintains expertise across all major printing technologies, either through in-house capabilities or through vetted production partnerships. This comprehensive knowledge ensures clients receive recommendations based on what produces the best result — not on what equipment the agency happens to own.</p>

<h2>Outdoor Advertising: From Simple Signs to Strategic Brand Presence</h2>

<p>Outdoor advertising has undergone perhaps the most visible transformation of any segment. The industry evolved from hand-painted shop facades and basic directional signs to a sophisticated ecosystem of illuminated structures, digital displays, vehicle fleet wraps, and large-scale architectural graphics that transform entire building exteriors.</p>

<p>In the past, outdoor advertising meant a flat sign above a shop door. Today, it encompasses an entire strategic discipline that considers viewing distance, traffic patterns, illumination conditions, material durability under extreme Saudi weather, municipal regulations, and integration with the client's overall brand architecture.</p>

<ul>
<li><strong>Building wraps and facade graphics:</strong> Full-building vinyl applications that transform commercial structures into brand statements visible from hundreds of meters away.</li>
<li><strong>Illuminated channel letters:</strong> Individual fabricated letters with internal LED illumination, producing crisp, professional frontage that operates 24 hours.</li>
<li><strong>Pylon and monument signs:</strong> Freestanding structures engineered for visibility, structural integrity, and municipal compliance at commercial and industrial sites.</li>
<li><strong>Vehicle fleet branding:</strong> Coordinated wraps across company vehicles that convert transportation assets into mobile advertising platforms reaching thousands of viewers daily.</li>
<li><strong>Wayfinding and directional systems:</strong> Integrated signage programs for malls, hospitals, campuses, and commercial complexes that guide visitors while reinforcing brand identity.</li>
</ul>

<blockquote>
<p><strong>Common Misconception:</strong> Many businesses still view outdoor advertising as simply placing a sign. In reality, effective outdoor advertising today requires structural engineering, electrical planning, material science knowledge, regulatory compliance, and strategic brand thinking. An agency without depth across all these disciplines produces signs that either fail physically, underperform visually, or create regulatory problems.</p>
</blockquote>

<h2>From Execution to Brand Building: The Evolution of the Agency Concept</h2>

<p>The most profound transformation in the advertising industry over the past 25 years is not technological — it is conceptual. The role of an advertising agency has evolved from a production house that executes client instructions into a strategic partner that shapes brand identity, communication strategy, and market positioning.</p>

<p>In the traditional model, a client would arrive with a specific request: make me a sign, print these brochures, produce this banner. The agency's role was purely executional — receive the order, produce the item, deliver it. There was little strategic input, brand analysis, or creative consultation involved.</p>

<p>Today, leading agencies operate as brand architects. The conversation begins not with production specifications but with questions about business objectives, target audience, competitive landscape, and brand positioning. The sign, brochure, or banner is the output of a strategic process — not the starting point.</p>

<figure class="table">
<table>
<thead>
<tr>
<th>Dimension</th>
<th>Traditional Agency Model</th>
<th>Modern Brand-Building Model</th>
</tr>
</thead>
<tbody>
<tr>
<td>Client relationship</td>
<td>Vendor/supplier</td>
<td>Strategic partner</td>
</tr>
<tr>
<td>Starting point</td>
<td>Production specifications</td>
<td>Business objectives and brand strategy</td>
</tr>
<tr>
<td>Core deliverable</td>
<td>Physical products (signs, prints)</td>
<td>Brand systems and communication strategy</td>
</tr>
<tr>
<td>Value proposition</td>
<td>Production quality and price</td>
<td>Strategic insight and integrated execution</td>
</tr>
<tr>
<td>Client engagement</td>
<td>Transactional (per-project)</td>
<td>Ongoing (brand stewardship)</td>
</tr>
<tr>
<td>Success metric</td>
<td>Delivered on time and budget</td>
<td>Brand growth and market impact</td>
</tr>
</tbody>
</table>
</figure>

<blockquote>
<p><strong>Key Insight:</strong> Advertising is no longer just a sign. It is a comprehensive system of visual, verbal, and experiential elements that communicate who a business is, what it stands for, and why it matters. Agencies that still operate in pure execution mode — however skilled their production may be — are delivering only a fraction of the value that modern businesses need.</p>
</blockquote>

<h2>Why Real Experience Equals the Ability to Adapt</h2>

<p>Any agency can claim years of experience. What matters is not duration but depth — specifically, whether an agency has actually lived through industry transitions and emerged from each one with expanded capabilities rather than obsolete ones. Real experience is measured by the ability to adapt, not merely the ability to survive.</p>

<p>An agency that was founded in the calligraphy era and still operates today has navigated at least five major industry transitions: manual to mechanical production, analog to digital design, single-technology to multi-technology printing, sign-making to brand building, and local execution to integrated marketing systems. Each transition required investment, retraining, and often a fundamental rethinking of business models and service offerings.</p>

<blockquote>
<p><strong>Industry Survival Rate:</strong> Research into advertising firms in the Saudi market indicates that fewer than 15% of agencies operating in the mid-1990s still exist today. The vast majority were unable to navigate the technological and conceptual transitions that reshaped the industry. Longevity in this field is not accidental — it is evidence of genuine adaptability and strategic foresight.</p>
</blockquote>

<p>Window Advertising Agency's 25+ year journey is defined by continuous adaptation. From calligraphic roots through every technological wave to today's integrated brand services, the agency has not merely kept pace with industry change — it has anticipated it, invested in it, and used each transition as an opportunity to expand what it can offer clients. This accumulated, multi-era experience is something that cannot be replicated by agencies born into a single technological generation.</p>

<ul>
<li><strong>Calligraphy era:</strong> Built foundational understanding of Arabic letterforms, visual balance, and the relationship between signage and business identity.</li>
<li><strong>Neon and fabrication era:</strong> Developed manufacturing capabilities, electrical expertise, and dimensional design thinking.</li>
<li><strong>Materials revolution:</strong> Mastered vinyl, acrylic, and composite technologies that became the backbone of modern signage production.</li>
<li><strong>Digital design era:</strong> Integrated software-based workflows while retaining traditional design principles and quality standards.</li>
<li><strong>Automated production era:</strong> Deployed cutter plotters and CNC equipment while redirecting human expertise toward design quality and client service.</li>
<li><strong>Multi-technology printing era:</strong> Built expertise across offset, digital, UV, thermal, and DTF printing to offer clients the optimal solution for every application.</li>
<li><strong>Brand building era:</strong> Evolved from production-focused execution to strategic brand partnership, integrating all technical capabilities under a unified brand strategy approach.</li>
</ul>

<h2>Window Advertising Agency: 25+ Years of Evolution in Action</h2>

<p>Window Advertising Agency's story is not separate from the story of the advertising industry — it is woven directly into it. Every era described in this article represents a chapter that Window has lived through, invested in, and mastered. The agency's ability to serve today's clients with a comprehensive range of services — from brand strategy and visual identity to large-format printing and outdoor installations — is the direct result of accumulating capability through every industry transition over more than two and a half decades.</p>

<p>This breadth of experience delivers tangible benefits to every client. When Window recommends a specific material, printing technology, or design approach, that recommendation comes from having tested, compared, and validated options across decades of real-world projects. When a problem arises during production, the team draws on institutional knowledge that spans every technology generation to find solutions quickly. When a client needs a partner who understands both the artistic heritage and the technological future of advertising, Window brings both perspectives to the table.</p>

<p>The Saudi market is entering a new phase of growth driven by Vision 2030 and accelerating economic diversification. Businesses across every sector need advertising partners who combine deep local experience with modern capabilities. They need partners who understand the cultural significance of Arabic visual communication and the technical demands of contemporary brand systems. They need agencies that have proven their ability to adapt — not once, but repeatedly, across every era of industry evolution.</p>

<p>Window Advertising Agency is that partner. Twenty-five years of continuous adaptation, investment, and growth have produced an agency equipped to handle any advertising challenge — from a single business card to a complete brand identity system spanning print, signage, digital, and environmental applications.</p>

<p style="text-align:center;"><strong>Partner With 25+ Years of Proven Advertising Experience</strong></p>
<p style="text-align:center;">Whether you need a complete brand identity, professional printing, outdoor signage, or an integrated advertising solution — Window Advertising Agency brings a quarter century of expertise to every project. Contact us today to discuss how our experience can serve your vision.</p>
<p style="text-align:center;"><a href="https://windowadv.com/en/contact">Start Your Project With Window</a></p>

<h2>Frequently Asked Questions About Advertising Industry Evolution</h2>

<h3>Why does an advertising agency's years of experience matter?</h3>

<p>Genuine experience across multiple industry eras means the agency has successfully adapted to fundamental changes in technology, materials, and strategy. This adaptability translates into better recommendations, more reliable production, and deeper problem-solving capability than agencies with only single-era experience.</p>

<h3>How has the role of Arabic calligraphy changed in modern advertising?</h3>

<p>While hand calligraphy is no longer the primary production method, its principles — letterform quality, visual balance, and cultural authenticity — remain foundational to effective Arabic-language advertising. Agencies with calligraphic heritage produce Arabic designs that are culturally resonant and typographically superior.</p>

<h3>What printing technologies should a modern advertising agency offer?</h3>

<p>A comprehensive agency should have expertise across offset, digital, UV, large-format, thermal, and DTF printing technologies. Each serves different applications, and the ability to recommend the right technology for each project is a key indicator of genuine production expertise.</p>

<h3>Is outdoor advertising still effective in the digital age?</h3>

<p>Absolutely. Outdoor advertising remains one of the most impactful marketing channels, particularly in Saudi Arabia where commercial signage, vehicle branding, and large-format displays reach millions of consumers daily. The difference is that modern outdoor advertising is far more strategic, durable, and visually sophisticated than it was in previous decades.</p>

<h3>What is the difference between a sign-making company and a modern advertising agency?</h3>

<p>A sign-making company executes production orders. A modern advertising agency begins with brand strategy and business objectives, then determines the optimal combination of design, materials, and production methods to achieve measurable results. Window Advertising Agency operates as the latter — a strategic brand partner with full production capabilities.</p>

<h3>How has Window Advertising Agency adapted over its 25+ year history?</h3>

<p>Window has navigated every major industry transition — from calligraphic roots through neon and fabrication, modern materials, digital design, automated production, multi-technology printing, and strategic brand building. Each era added new capabilities while retaining the foundational expertise developed in previous phases.</p>

<h3>Does Window Advertising Agency serve clients across all of Saudi Arabia?</h3>

<p>Yes. Window serves businesses in Riyadh, Jeddah, and throughout the Kingdom. The agency's integrated capabilities — from design consultation through production and installation — are available to clients in every region, with project management adapted to each client's location and requirements.</p>
HTML;
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', '25-years-advertising-industry-evolution')->first();
        if (!$blog) {
            return;
        }

        DB::table('blog_translations')
            ->where('blog_id', $blog->id)
            ->where('locale', 'en')
            ->delete();
    }
};
