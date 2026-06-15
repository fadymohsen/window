<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $oldSlug = 'almotmr-alsaaod-llmhaka-alshy-btnthym-mn-okal-oyndo';
        $newSlug = 'saudi-health-simulation-conference-window';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('slug', $oldSlug)->first();
            if (!$blog) {
                $blog = DB::table('blogs')->where('id', 23)->first();
            }
            if (!$blog) { return; }
            if (!DB::table('blogs')->where('slug', $newSlug)->where('id', '!=', $blog->id)->exists()) {
                DB::table('blogs')->where('id', $blog->id)->update(['slug' => $newSlug]);
            }
        }
        $blogId = $blog->id;

        $enTitle           = 'Saudi Health Simulation Conference Organized by Window Agency: Full Event Services from Design to Execution';
        $enMetaTitle       = 'Saudi Health Simulation Conference Organized by Window Agency: Full Event Services in Riyadh | Window Advertising Agency';
        $enMetaDescription = 'Discover how Window Advertising Agency organized the 5th Saudi Health Simulation Conference (SHSC22) in Riyadh with the Ministry of Health. From innovative backdrops and LED screens to branded awards, exhibition booths, and printed materials — learn how Window delivers end-to-end conference event services.';
        $enKeywords        = 'Saudi Health Simulation Conference,SHSC22,conference event services Riyadh,medical conference organization,Window Advertising Agency,conference backdrops,LED screens conferences,conference awards Saudi Arabia,exhibition booths Riyadh,event branding health sector';

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
<p>When the 5th Saudi Health Simulation Conference (SHSC22) was held in Riyadh in collaboration with the Ministry of Health, every visual detail needed to reflect the prestige and professionalism of the Kingdom's healthcare sector. <strong>Window Advertising Agency</strong> was entrusted with delivering the complete event identity and production — from innovative backdrops and LED screens to laser-engraved awards and professional exhibition booths. This article takes you behind the scenes of how Window handled every element of one of Saudi Arabia's most important medical conferences, demonstrating why a single experienced agency is the key to flawless event execution.</p>
</blockquote>

<h2>The Saudi Health Simulation Conference: A Premier Medical Event</h2>

<p>The Saudi Health Simulation Conference (SHSC) is one of the most significant gatherings in the Kingdom's healthcare landscape. Organized in partnership with the Ministry of Health, the conference brings together medical professionals, simulation specialists, healthcare educators, and institutional leaders to advance the practice of health simulation across Saudi Arabia and the broader region.</p>

<p>The 5th edition — SHSC22 — was held in Riyadh, drawing hundreds of attendees from hospitals, medical colleges, simulation centers, and government health agencies. The conference featured keynote presentations, interactive workshops, panel discussions, live simulation demonstrations, and an exhibition showcasing the latest in medical simulation technology.</p>

<p>An event of this caliber demands more than logistical coordination. It demands a visual environment that communicates authority, innovation, and institutional excellence at every touchpoint — from the moment an attendee walks through the entrance to the awards ceremony that closes the event.</p>

<blockquote>
<p><strong>Event Scale:</strong> The 5th Saudi Health Simulation Conference brought together healthcare professionals from across the Kingdom, featuring multiple presentation stages, interactive workshop areas, an exhibition hall, and formal award ceremonies — all requiring cohesive, professional visual branding from a single trusted agency.</p>
</blockquote>

<p><strong>Window Advertising Agency</strong> was selected to deliver the entire visual and production scope of SHSC22, providing a unified brand experience across every element of the conference. This single-source approach ensured that every backdrop, screen, printed piece, and branded item worked together as one coherent identity — reflecting the professionalism the health sector demands.</p>

<h2>Innovative Backdrops and Photography Backgrounds</h2>

<p>The first impression at any conference is shaped by its physical environment. For SHSC22, Window designed and produced innovative backdrops that served both as stage backgrounds for presentations and as photography stations for attendees, speakers, and VIP guests.</p>

<p>Conference backdrops are not merely decorative panels. They are strategic branding surfaces that appear in every photograph, every social media post, and every media coverage shot taken during the event. A poorly designed or inconsistent backdrop undermines the entire conference image, while a professionally executed one amplifies the event's prestige across every channel where those images appear.</p>

<h3>What Window Delivered for SHSC22 Backdrops</h3>

<ul>
<li><strong>Main stage backdrop:</strong> A large-format, high-resolution printed backdrop featuring the SHSC22 identity, Ministry of Health branding, and conference theme — engineered for optimal visibility from every seat in the auditorium.</li>
<li><strong>Photography backgrounds:</strong> Dedicated photo opportunity stations with branded step-and-repeat backdrops, designed for clean, professional photos that attendees and speakers could share on social media and professional platforms.</li>
<li><strong>Workshop and breakout room backdrops:</strong> Smaller-scale branded panels for workshop spaces, ensuring consistent visual identity even in secondary event areas.</li>
<li><strong>Material quality:</strong> Premium fabric and rigid panel materials selected for wrinkle-free presentation, even lighting performance, and durability throughout the multi-day conference.</li>
</ul>

<blockquote>
<p><strong>Design Principle:</strong> Every backdrop was designed with photography in mind — contrast ratios, logo placement, and text sizing were calibrated so that the conference brand would remain legible and professional whether the image was viewed on a large screen, a social media feed, or a printed publication.</p>
</blockquote>

<h2>LED Screens for Interactive and Dynamic Content</h2>

<p>Modern medical conferences require more than static visuals. The audience expects dynamic, engaging content delivered through high-quality LED screens that enhance presentations, display real-time information, and create an immersive event atmosphere. Window provided comprehensive LED screen solutions for SHSC22, covering both content creation and technical deployment.</p>

<p>LED screens at a conference serve multiple critical functions simultaneously. They display presentation slides for speakers, show sponsor and partner logos in rotation, present agenda and scheduling information, run branded motion graphics during transitions, and can even display live social media feeds or audience polling results.</p>

<h3>Window's LED Screen Services for SHSC22</h3>

<ul>
<li><strong>Screen selection and placement:</strong> Window specified the optimal screen sizes, resolutions, and positions for the main stage, breakout rooms, and exhibition areas based on venue dimensions and sightline analysis.</li>
<li><strong>Interactive content design:</strong> Custom-designed motion graphics, animated speaker introductions, session transition sequences, and branded lower-thirds that maintained the SHSC22 visual identity throughout every presentation.</li>
<li><strong>Sponsor and partner rotations:</strong> Professionally designed sponsor recognition loops that honored partner contributions while maintaining visual consistency with the conference brand.</li>
<li><strong>Agenda and wayfinding displays:</strong> Real-time schedule displays at key locations, helping attendees navigate sessions and workshops efficiently.</li>
<li><strong>Technical coordination:</strong> On-site technical support to ensure seamless content switching, resolution matching, and color accuracy throughout the event.</li>
</ul>

<blockquote>
<p><strong>Impact:</strong> Well-executed LED screen content transforms a conference from a series of static presentations into a dynamic, immersive experience. For SHSC22, Window's screen content reinforced the conference identity in every session, creating a cohesive visual narrative that attendees experienced from opening to closing ceremonies.</p>
</blockquote>

<h2>Printed Brochures and Conference Materials</h2>

<p>Despite the digital age, printed materials remain essential at professional conferences. Brochures, programs, agendas, and informational booklets provide attendees with tangible reference materials they can review during sessions, annotate with notes, and take back to their institutions. For a medical conference of SHSC22's caliber, the quality of printed materials directly reflects the quality of the event itself.</p>

<p>Window produced the full range of printed conference materials for SHSC22, ensuring that every piece — from the main conference program to individual session handouts — maintained the same visual standard and brand consistency.</p>

<ul>
<li><strong>Conference program booklets:</strong> Comprehensive multi-page programs with session schedules, speaker biographies, workshop descriptions, and sponsor recognition — all formatted in the SHSC22 visual identity.</li>
<li><strong>Informational brochures:</strong> Topic-specific brochures covering key conference themes, health simulation methodologies, and institutional resources.</li>
<li><strong>Registration and welcome packets:</strong> Branded folders containing attendee credentials, venue maps, WiFi information, and emergency contacts.</li>
<li><strong>Premium paper stock and finishing:</strong> Professional-grade paper with appropriate coating, binding, and finishing to ensure durability and visual impact throughout the conference.</li>
</ul>

<blockquote>
<p><strong>Quality Standard:</strong> Printed materials for medical conferences must meet a higher bar than typical event collateral. Healthcare professionals expect precision, clarity, and institutional quality. Window's printing team ensured that every color was accurate to the conference identity, every text element was sharp, and every piece felt substantial enough to represent a Ministry of Health-affiliated event.</p>
</blockquote>

<h2>Awards, Shields, and Certificates of Appreciation</h2>

<p>Recognition is a cornerstone of professional conferences. Awards ceremonies honor speakers, researchers, sponsors, and contributors who have advanced the field. The physical awards themselves — their design, materials, and craftsmanship — communicate the value the conference places on these contributions. Cheap or generic awards undermine the recognition moment, while custom-crafted, premium awards create lasting pride and professional prestige.</p>

<p>Window designed and produced the complete awards program for SHSC22, delivering a range of recognition pieces that matched the conference's institutional prestige.</p>

<h3>Types of Awards Produced</h3>

<table>
<tbody>
<tr><td><strong>Award Type</strong></td><td><strong>Description</strong></td><td><strong>Use Case at SHSC22</strong></td></tr>
<tr><td>Laser-engraved awards</td><td>Precision-engraved wooden and metal awards with custom text, logos, and conference identity elements</td><td>Keynote speaker recognition, lifetime achievement honors</td></tr>
<tr><td>Glass trophies</td><td>Premium crystal and glass trophies with etched details and polished edges</td><td>Best research presentation, outstanding simulation center awards</td></tr>
<tr><td>Acrylic shields</td><td>Custom-shaped acrylic shields with full-color UV printing and dimensional layering</td><td>Sponsor appreciation, institutional partnership recognition</td></tr>
<tr><td>Certificates of appreciation</td><td>Formally designed certificates with professional calligraphy, conference seal, and premium paper stock</td><td>Workshop facilitators, session moderators, volunteer recognition</td></tr>
</tbody>
</table>

<p>Every award was custom-designed to incorporate the SHSC22 conference identity — colors, typography, and logo placement — ensuring that the recognition pieces were not generic trophies but branded extensions of the conference itself. Recipients received an award that visually connected to the event where they earned it, creating a lasting professional keepsake.</p>

<blockquote>
<p><strong>Craftsmanship Detail:</strong> Window's awards production team handled the entire process from initial design concepts through material selection, engraving, printing, quality inspection, and individual packaging — delivering each piece ready for presentation at the awards ceremony with zero last-minute complications.</p>
</blockquote>

<h2>Roll-Up Stands, Pop-Up Stands, and Exhibition Booths</h2>

<p>The exhibition component of SHSC22 was a critical element of the conference experience. Exhibition areas allow sponsors, technology providers, simulation equipment manufacturers, and institutional partners to showcase their offerings directly to attendees. The quality of exhibition booths and display stands determines whether exhibitors look professional and credible — or forgettable.</p>

<p>Window provided complete exhibition solutions for SHSC22, covering both the conference's own branded presence and individual exhibitor requirements.</p>

<h3>Roll-Up and Pop-Up Stands</h3>

<p>Roll-up and pop-up stands are essential conference display tools. They are portable, quick to deploy, and provide high-impact visual messaging in compact footprints. Window produced custom-designed stands for SHSC22 that served multiple purposes across the event venue:</p>

<ul>
<li><strong>Directional and wayfinding stands:</strong> Branded stands placed at key navigation points to guide attendees between sessions, exhibition areas, and facilities.</li>
<li><strong>Session and speaker announcement stands:</strong> Stands positioned at room entrances displaying session topics, speaker names, and timing information.</li>
<li><strong>Sponsor recognition stands:</strong> Dedicated stands showcasing sponsor logos and partnership messages in high-traffic areas.</li>
<li><strong>Informational stands:</strong> Content-rich stands providing details about health simulation resources, training programs, and institutional initiatives.</li>
</ul>

<h3>Professional Exhibition Booths</h3>

<p>Exhibition booths at medical conferences must balance visual impact with functional design. Attendees need space to interact with products and demonstrations, exhibitors need storage and meeting areas, and the overall aesthetic must align with the conference's professional standards. Window designed and built exhibition booths for SHSC22 that achieved all three objectives.</p>

<ul>
<li><strong>Custom booth structures:</strong> Purpose-built booth frameworks designed to maximize exhibitor visibility while maintaining clean sightlines across the exhibition floor.</li>
<li><strong>Branded graphics and panels:</strong> High-resolution printed panels, backlit displays, and mounted graphics that transformed each booth into a professional brand environment.</li>
<li><strong>Functional elements:</strong> Counter surfaces, product display shelving, literature racks, and seating areas integrated into the booth design.</li>
<li><strong>Consistent event identity:</strong> While each exhibitor had unique branding, Window ensured that the overall booth framework and exhibition infrastructure maintained the SHSC22 visual standard.</li>
</ul>

<blockquote>
<p><strong>Common Mistake:</strong> Many conference organizers hire separate vendors for stands, booths, and signage — resulting in mismatched materials, inconsistent colors, and varying quality levels across the exhibition floor. Window's single-source approach for SHSC22 eliminated this problem entirely, delivering a unified exhibition environment where every element complemented the others.</p>
</blockquote>

<h2>Branded Cups and Conference Merchandise</h2>

<p>Branded merchandise may seem like a minor detail, but at professional conferences it serves a surprisingly important function. Every branded cup, notebook, or lanyard that an attendee uses during the event reinforces the conference identity. These items also extend the brand beyond the venue — attendees take them back to their offices, hospitals, and institutions, continuing the brand exposure long after the conference ends.</p>

<p>Window produced a range of branded cups and merchandise for SHSC22, each designed to align with the conference visual identity and meet the quality expectations of healthcare professionals.</p>

<h3>Branded Cup Options Delivered</h3>

<ul>
<li><strong>Paper cups:</strong> Custom-printed paper cups with the SHSC22 identity for general refreshment areas, coffee stations, and session breaks — eco-friendly and professionally branded.</li>
<li><strong>Plastic cups:</strong> Durable branded plastic cups for extended-use scenarios, designed with clear conference branding and comfortable handling.</li>
<li><strong>Thermal cups:</strong> Premium insulated thermal cups with the SHSC22 logo and conference theme — a high-value keepsake that attendees use for months or years after the event, providing ongoing brand visibility.</li>
</ul>

<blockquote>
<p><strong>Brand Extension:</strong> A branded thermal cup from SHSC22 sitting on a doctor's desk at King Faisal Specialist Hospital is not just a cup — it is a daily reminder of the conference, the knowledge gained, and the professional connections made. This passive brand reinforcement is one of the most cost-effective marketing outcomes a conference can achieve, and it starts with quality merchandise design and production.</p>
</blockquote>

<h2>Why One Agency Should Handle Every Conference Detail</h2>

<p>The SHSC22 project illustrates a principle that applies to every professional conference: the best results come when a single, experienced agency handles the complete visual and production scope. Here is why this approach consistently outperforms the alternative of splitting work across multiple vendors.</p>

<table>
<tbody>
<tr><td><strong>Single Agency Approach</strong></td><td><strong>Multi-Vendor Approach</strong></td></tr>
<tr><td>Unified visual identity across all elements</td><td>Each vendor interprets the brand differently, creating visual inconsistency</td></tr>
<tr><td>One point of contact for all coordination</td><td>Organizer must manage communications with multiple vendors simultaneously</td></tr>
<tr><td>Color consistency guaranteed across print, digital, and physical materials</td><td>Different printing equipment and processes produce color variations between vendors</td></tr>
<tr><td>Integrated timeline management</td><td>Delays from one vendor can cascade to others, with no single party accountable</td></tr>
<tr><td>Quality standard maintained across all deliverables</td><td>Quality varies from vendor to vendor, creating an uneven attendee experience</td></tr>
<tr><td>Cost efficiency through bundled production</td><td>Individual vendor margins add up, often exceeding the cost of a single comprehensive provider</td></tr>
<tr><td>On-site problem solving from one team that understands the entire event</td><td>On-site issues require tracking down specific vendors who may not be available</td></tr>
</tbody>
</table>

<p>Window's single-source approach for SHSC22 meant that the conference organizers had one partner responsible for every visual element. From the first design concept to the final on-site installation, Window managed the entire production chain — ensuring that every backdrop, screen, brochure, award, stand, booth, and branded cup worked together as a single, cohesive conference experience.</p>

<blockquote>
<p><strong>Operational Advantage:</strong> When one agency handles everything, last-minute changes become manageable instead of catastrophic. A venue layout change that affects backdrop dimensions, screen positions, and booth placement can be resolved in one conversation with one team — instead of a cascade of calls to five different vendors, each with different lead times and change-order processes.</p>
</blockquote>

<h2>Window's Expertise in Riyadh Conference Event Services</h2>

<p><strong>Window Advertising Agency</strong>'s work on SHSC22 is one example of a deep portfolio in conference and event production across Riyadh and Saudi Arabia. With over 25 years of experience, Window has supported government entities, healthcare organizations, corporate clients, and academic institutions in producing conferences that meet the highest professional standards.</p>

<h3>What Sets Window Apart in Conference Services</h3>

<ul>
<li><strong>End-to-end capability:</strong> Window handles concept design, graphic design, content creation, print production, fabrication, LED screen solutions, awards manufacturing, merchandise production, and on-site installation — all under one roof.</li>
<li><strong>Health sector experience:</strong> Having worked with the Ministry of Health and medical organizations, Window understands the specific quality, accuracy, and institutional tone requirements of healthcare events.</li>
<li><strong>Government entity standards:</strong> Window is experienced in meeting the branding guidelines, approval workflows, and quality benchmarks required by Saudi government-affiliated events.</li>
<li><strong>Riyadh venue knowledge:</strong> Years of executing events across Riyadh's major conference venues means Window's team understands the logistical, dimensional, and technical requirements of each facility.</li>
<li><strong>Scalable capacity:</strong> Whether the event requires 50 branded items or 5,000, Window's production infrastructure scales to meet demand without compromising quality or timelines.</li>
</ul>

<blockquote>
<p><strong>25+ Years of Trust:</strong> The Ministry of Health and SHSC organizers chose Window because the agency's track record demonstrates consistent delivery at the quality level that government and healthcare events demand. This trust is not built in a single project — it is earned over decades of reliable, professional execution across hundreds of events.</p>
</blockquote>

<h2>From Design to Execution: How Window Manages Conference Projects</h2>

<p>Understanding how Window manages a project like SHSC22 from start to finish reveals why the results are consistently professional and cohesive. The process is systematic, thorough, and designed to eliminate the surprises that derail conferences when production is left to chance or fragmented across vendors.</p>

<h3>Phase 1: Discovery and Concept</h3>

<p>Window begins every conference project with a comprehensive discovery phase — understanding the event's purpose, audience, scale, venue, timeline, and branding requirements. For SHSC22, this meant working closely with the conference organizers and Ministry of Health representatives to understand the institutional standards, the specific deliverables required, and the visual tone that would communicate authority and innovation.</p>

<h3>Phase 2: Design and Approval</h3>

<p>The design team creates a unified visual concept that spans every deliverable — backdrops, screens, print materials, awards, stands, booths, and merchandise. Every element is designed as part of a single visual system, ensuring consistency before any production begins. Organizers review and approve the complete visual package, so there are no disconnects between individual items.</p>

<h3>Phase 3: Production and Quality Control</h3>

<p>Once approved, production begins across all workstreams simultaneously. Window's in-house and trusted partner facilities handle printing, fabrication, engraving, and assembly with strict quality control checkpoints at every stage. Materials are inspected for color accuracy, finish quality, structural integrity, and brand compliance before being cleared for delivery.</p>

<h3>Phase 4: On-Site Installation and Support</h3>

<p>Window's team arrives at the venue ahead of the event to install all physical elements — backdrops, screens, stands, booths, and signage. On-site support continues throughout the event to handle any adjustments, replacements, or last-minute needs. When the conference concludes, the team manages teardown and removal, leaving the venue clean and clear.</p>

<blockquote>
<p><strong>Zero-Surprise Delivery:</strong> Window's four-phase process ensures that conference organizers know exactly what they will receive, well before the event date. There are no last-minute substitutions, no color mismatches on the day of the event, and no missing items discovered during setup. Every detail is planned, produced, inspected, and installed by one accountable team.</p>
</blockquote>

<h2>Planning a Conference or Professional Event in Riyadh?</h2>

<p>Whether it is a medical conference, a government summit, a corporate event, or an industry exhibition, <strong>Window Advertising Agency</strong> delivers the complete visual and production package — from concept design to on-site execution. One agency. One standard. Zero gaps. With 25+ years of experience, we make conferences look the way they should.</p>

<p><a href="https://windowadv.com/en/contact">Request a Conference Services Consultation</a></p>

<h2>Frequently Asked Questions About Conference Event Services</h2>

<h3>What services did Window Advertising Agency provide for the Saudi Health Simulation Conference?</h3>

<p>Window provided comprehensive event services including innovative backdrops, photography backgrounds, LED screens for interactive content, printed brochures, laser-engraved and glass awards, certificates of appreciation, roll-up and pop-up stands, professional exhibition booths, and branded cups in paper, plastic, and thermal formats. Every element was designed as part of a unified conference visual identity.</p>

<h3>What is the Saudi Health Simulation Conference (SHSC)?</h3>

<p>The Saudi Health Simulation Conference (SHSC) is a premier medical event organized in collaboration with the Ministry of Health in Saudi Arabia. The 5th edition (SHSC22) was held in Riyadh and brought together healthcare professionals, simulation experts, and medical educators to advance health simulation practices across the Kingdom.</p>

<h3>Why is professional event branding important for medical conferences?</h3>

<p>Professional event branding ensures that a medical conference projects credibility, authority, and institutional quality. Every visual element — from backdrops and LED screens to awards and printed materials — reinforces the conference's professional image, enhances attendee experience, and strengthens sponsor and partner confidence in the event.</p>

<h3>Can Window Advertising Agency handle all aspects of conference event services?</h3>

<p>Yes. Window operates as a single-source provider for conference events, handling everything from initial concept design through final on-site execution. This includes backdrops, stage design, LED screens, printed materials, awards, exhibition booths, branded merchandise, and signage — eliminating the need to coordinate multiple vendors and ensuring visual consistency.</p>

<h3>What types of awards does Window produce for conferences?</h3>

<p>Window produces a range of premium conference awards including laser-engraved wooden and metal awards, crystal and glass trophies, acrylic shields with custom printing and dimensional layering, and formal certificates of appreciation with professional calligraphy and finishing. All awards are custom-designed to match the conference identity.</p>

<h3>How does Window handle LED screen content for conferences?</h3>

<p>Window provides end-to-end LED screen solutions — from selecting the right screen size and resolution for the venue, to designing interactive and dynamic content including speaker introductions, session transitions, sponsor rotations, agenda displays, and branded motion graphics that engage attendees throughout the event.</p>

<h3>What makes Window the right choice for health sector conferences in Riyadh?</h3>

<p>Window combines over 25 years of advertising and event production experience with deep understanding of the health sector's professional standards. The agency has worked with government entities and medical organizations, ensuring every deliverable meets the quality, accuracy, and institutional tone required by healthcare conferences in Riyadh and across Saudi Arabia.</p>

<h3>Does Window provide branded merchandise for conference attendees?</h3>

<p>Yes. Window provides a full range of branded conference merchandise including paper cups, plastic cups, thermal cups, branded notebooks, lanyards, badges, bags, and other customized items. Every piece is designed to align with the conference visual identity and reinforce the event brand throughout the attendee experience and beyond.</p>
HTML;
    }

    public function down(): void
    {
        $newSlug = 'saudi-health-simulation-conference-window';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
