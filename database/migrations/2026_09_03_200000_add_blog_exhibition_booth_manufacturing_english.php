<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'exhibition-booth-manufacturing-saudi-arabia-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Exhibition Booth Design & Manufacturing in Saudi Arabia: From Framework to Showstopper with Window Agency';
        $enMetaTitle       = 'Exhibition Booth Design & Manufacturing in Saudi Arabia | Window Agency';
        $enMetaDescription = 'Professional exhibition booth design and manufacturing in Saudi Arabia — from aluminum frameworks to 3D channel letters. Window Advertising Agency builds booths that reflect your brand identity and attract visitors.';
        $enKeywords        = 'advertising and marketing,exhibitions and conferences,brand identity design,signs and banners,social media management,website design,employee gifts,annual report design,project fencing,exhibition booth design,exhibition booth manufacturing,exhibition stand,booth builder,Riyadh exhibition booths,exhibition company,channel letters';

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
<p>"Your booth is the first impression of your brand — and it might be the last if it doesn't measure up." That's how we think at <strong>Window Advertising Agency</strong>. In the fast-paced world of exhibitions and conferences across Saudi Arabia — where hundreds of companies compete for visitor attention in a single hall — a booth is no longer just a display space with walls and a table. Today's booth is a complete identity statement — a physical façade that translates your brand personality into a sensory experience visitors see, touch, and remember. At Window Agency — specialists in advertising and marketing and exhibition execution in Riyadh — we don't just design booths, we manufacture and build them from scratch in our fully equipped factory. From cutting and assembling aluminum frames to installing 3D backlit channel letters and polishing glass panels — every detail passes through our team's hands.</p>

<h2>Why Exhibition Booths Are Now a Strategic Investment, Not a Cost</h2>

<p>Saudi Arabia is experiencing an unprecedented boom in the exhibitions and conferences sector — from the Riyadh International Book Fair to LEAP, Saudi Build, and the Food & Hospitality Expo. Participation in exhibitions has become a cornerstone of marketing strategy for any ambitious company. But participation alone isn't enough — it's how you present yourself that makes the difference.</p>

<p>Research indicates that exhibition visitors decide within 3 to 5 seconds whether to stop at your booth or walk past. This means your booth's design — its colors, lighting, and overall shape — acts as a silent advertisement running non-stop throughout the exhibition hours. A professionally designed booth attracts visitors automatically, while a traditional booth with roll-up banners and a white table gets lost in the crowd.</p>

<p>An exhibition isn't just a day or two — it's an opportunity to build business relationships, generate leads, and solidify your brand's position in the market. Companies that invest in professional exhibition booths achieve an ROI of 3 to 5 times the participation cost compared to those settling for basic setups.</p>

<blockquote><p><strong>Market Fact:</strong> The exhibitions and conferences market in Saudi Arabia exceeds SAR 5 billion annually and is expected to grow at 12% per year through 2030. The number of specialized exhibitions in Riyadh alone has increased by more than 40% over the past three years. A standout booth is no longer a luxury but a competitive necessity.</p></blockquote>

<h2>Stages of Exhibition Booth Design & Execution at Window Agency</h2>

<p>What sets Window Agency apart from other exhibitions and conferences companies is that we control every stage of the project — from the initial concept on paper to the moment the booth is delivered ready in the exhibition hall. We don't rely on subcontractors or delegate details to third parties — everything is manufactured by our team.</p>

<h3>Stage 1: Consultation and Needs Assessment</h3>

<p>Every project begins with an in-depth consultation where we understand the exhibition type, participation goals, available space, budget, and brand identity — everything that defines the brand identity design.</p>

<blockquote><p><strong>Why This Matters:</strong> Many companies contact booth builders asking for "a beautiful booth" without defining clear objectives. The result: a booth that may look beautiful but delivers no real business return. At Window Agency, we start from the business objective and design the booth to serve that goal — not the other way around.</p></blockquote>

<h3>Stage 2: 3D Design</h3>

<p>Window's design team creates a complete 3D visualization showing the exterior form, interior layout, lighting types and placements, colors and materials, and signage — 3D backlit channel letters, metallic logos, digital screens. The client sees their complete booth on screen before manufacturing begins, with the ability to request adjustments until the perfect design is achieved.</p>

<h3>Stage 3: Manufacturing at Window's Factory</h3>

<p>This is the stage that truly sets Window Agency apart — in-house manufacturing. In our equipped facility in Riyadh:</p>

<ul>
<li><strong>Cutting and assembling aluminum frames:</strong> our workers cut aluminum bars to precise measurements and assemble them to form the booth's core structure — walls, ceilings, and raised floors</li>
<li><strong>Shaping wooden panels and décor:</strong> natural wood and MDF for wall panels, dividers, shelves, and reception counters, cut, sanded, painted, or veneered by hand</li>
<li><strong>Installing hardware and accessories:</strong> brass door handles, concealed hinges, and metal corners installed with care</li>
<li><strong>Manufacturing 3D backlit channel letters:</strong> fabricated from aluminum and acrylic with internal LED lighting, visible from great distances across the hall</li>
<li><strong>Glass and acrylic installation:</strong> clear and frosted glass for display cases, interior dividers, and illuminated ceilings, cleaned and polished by hand</li>
</ul>

<blockquote><p><strong>From Our Portfolio:</strong> We executed a premium booth for <strong>ADCK</strong> at a major exhibition — featuring a modern design combining vertical wooden slat walls, clear glass panels, and 3D backlit channel letters mounted on elegant wooden backgrounds. Every component — from the aluminum framework to the brass handle on the meeting room door — was manufactured and installed by Window's team.</p></blockquote>

<h3>Stage 4: Transport and On-Site Installation</h3>

<p>After manufacturing is complete, Window's team handles safe transport, professional assembly on-site within the timeframe set by exhibition management, electrical connections for lighting and screens, final cleaning, and on-site support throughout the exhibition for emergency maintenance.</p>

<h3>Stage 5: Dismantling and Storage</h3>

<p>After the exhibition ends, our team dismantles the booth and stores it carefully — either for reuse at an upcoming exhibition or modification for a different event. This saves the client significant costs over the long term.</p>

<h2>Types of Exhibition Booths Designed and Executed by Window Agency</h2>

<table><tbody>
<tr><td><strong>Booth Type</strong></td><td><strong>Description</strong></td><td><strong>Typical Area</strong></td><td><strong>Best For</strong></td></tr>
<tr><td>Inline/Linear</td><td>Open on one side</td><td>9–36 sqm</td><td>Small and medium businesses</td></tr>
<tr><td>Corner</td><td>Open on two sides</td><td>18–72 sqm</td><td>Wider visibility and better flow</td></tr>
<tr><td>End Cap</td><td>Open on three sides</td><td>36–100 sqm</td><td>Strong visual impact</td></tr>
<tr><td>Island</td><td>Open on all four sides</td><td>100–500+ sqm</td><td>Large corporations and government entities</td></tr>
<tr><td>Double-Deck</td><td>Two floors with stairs or elevator</td><td>200–1000+ sqm</td><td>Major sponsors and international companies</td></tr>
</tbody></table>

<h3>The Island Booth: Exhibition Masterpiece</h3>

<p>Island booths are the most impactful at major exhibitions — open from all sides, visible from every angle in the hall, allowing limitless creative designs. Window Agency's projects showcase stunning island booth examples — multi-level booths with suspended ceilings, LED strip lighting, and decorative elements in wood, glass, and marble rivaling the interior design of premium hotels.</p>

<blockquote><p><strong>Numbers That Speak:</strong> Island booths attract 60–80% more visitors than inline booths of the same area. The reason is simple: visibility from four sides doubles the chances of catching attention. Window Agency recommends clients — especially those participating in major exhibitions like LEAP and Saudi Build — invest in island booths even at a smaller size, because visual impact outweighs area.</p></blockquote>

<h3>The Double-Deck Booth: Luxury at Its Peak</h3>

<p>For large corporations, government entities, and major sponsors, we design and build double-deck booths — two-story structures with elegant staircases and upper balconies overlooking the entire exhibition hall. The lower floor is dedicated to display and reception, while the upper floor hosts meetings with VIP guests and investors in a private, premium atmosphere.</p>

<h2>Design Elements That Make Booths Attract Visitors</h2>

<h3>1. Lighting: The Primary Attraction Weapon</h3>

<p>Lighting is the single most impactful element in an exhibition booth — more than colors and more than shape. A professionally lit booth catches attention even from 50 meters away in a crowded hall. Window Agency uses LED strips for edges and suspended ceilings, spotlights to highlight products, backlighting behind panels and illuminated letters, floor lighting to define traffic paths, and pendant lights for a hotel-quality luxury touch.</p>

<h3>2. Materials and Finishes</h3>

<p>Natural wood and wooden slats add warmth and natural elegance, coated aluminum gives a clean modern appearance, clear and frosted glass adds depth and transparency, engineered stone offers a luxurious yet practical look for counters, and illuminated acrylic delivers distinctive lighting effects for display cases and signage.</p>

<h3>3. 3D Backlit Channel Letters</h3>

<table><tbody>
<tr><td><strong>Letter Style</strong></td><td><strong>Technique</strong></td><td><strong>Effect</strong></td><td><strong>Best For</strong></td></tr>
<tr><td>Front-lit</td><td>LED inside translucent acrylic letter</td><td>Bright direct illumination</td><td>Small and medium booths</td></tr>
<tr><td>Back-lit / Halo-lit</td><td>LED behind metallic letter</td><td>Light halo on background wall</td><td>Premium booths and headquarters</td></tr>
<tr><td>Front + Back</td><td>LED front and rear</td><td>Striking dual effect</td><td>Major sponsor booths</td></tr>
</tbody></table>

<blockquote><p><strong>From Our Portfolio:</strong> We manufactured 3D backlit channel letters for the "ADCK" logo, installed on an elegant wooden background — letters fabricated from white-coated aluminum with internal LED lighting delivering a smooth, uniform glow. This type of lettering is manufactured entirely in Window's workshop — from metal cutting to LED installation to final painting.</p></blockquote>

<h3>4. Digital Screens and Interactive Elements</h3>

<p>Large LED screens for promotional videos, interactive touchscreens for self-guided browsing, video walls for massive visual impact, and digital signage for dynamic data and statistics.</p>

<h3>5. Identity Elements and Ornamentation</h3>

<p>Laser-cut Islamic geometric patterns for companies wanting to showcase authentic Saudi and Arabic character, brand colors reflected on every surface, and logos mounted prominently on façades — polished metal, illuminated, or engraved.</p>

<blockquote><p><strong>Window Advantage:</strong> Window Agency doesn't just design exhibition booths — it has the capability to design the complete visual identity for companies that don't have one or need updating. This means the booth emerges perfectly integrated with the logo, colors, fonts, and visual elements — no clashes, no contradictions.</p></blockquote>

<h2>Space Distribution Inside the Exhibition Booth</h2>

<p>Interior layout is just as important as exterior appearance. Window Agency follows the principle of functional distribution: a reception area with an elegant counter reflecting the company's identity, a display area — the largest section — with illuminated shelving and digital screens, an enclosed or semi-enclosed meeting area with a presentation screen, a hospitality lounge with sofas and beverages, and hidden storage space for extra materials and equipment.</p>

<blockquote><p><strong>Market Fact:</strong> The ideal booth space distribution per global best practices: 50% for display and interaction, 20% for reception and corridors, 15% for meetings, 10% for hospitality, 5% for storage. Booths following this distribution achieve 40% higher engagement compared to randomly laid out booths.</p></blockquote>

<h2>Materials and Technologies Used in Window's Booth Manufacturing</h2>

<table><tbody>
<tr><td><strong>Material</strong></td><td><strong>Application</strong></td><td><strong>Advantages</strong></td></tr>
<tr><td>Structural Aluminum</td><td>Core framework and frames</td><td>Lightweight, strong, reusable</td></tr>
<tr><td>MDF and Natural Wood</td><td>Walls, panels, and furniture</td><td>Flexible shaping and finishing</td></tr>
<tr><td>Clear and Opaque Acrylic</td><td>Signage, display cases</td><td>Light, durable, illuminable</td></tr>
<tr><td>Tempered Glass</td><td>Dividers, façades, ceilings</td><td>Elegance and transparency with safety</td></tr>
<tr><td>Engineered Stone</td><td>Counters, raised floors</td><td>Luxury at lower weight than natural marble</td></tr>
<tr><td>Print Fabric</td><td>Backlit backgrounds, flags</td><td>Lightweight, easy to replace</td></tr>
<tr><td>Adhesive Vinyl</td><td>Wall graphics, flooring</td><td>Quick installation, custom designs</td></tr>
</tbody></table>

<p>Wooden slat walls are one of the most prominent trends in modern exhibition booth design — adding natural warmth and three-dimensional texture while also serving as an acoustic element that reduces echo within the space. Window Agency operates CNC laser cutting machines capable of executing any geometric pattern with extreme precision, enabling laser-cut Islamic geometric ornaments on illuminated panels — a design that blends authenticity with modernity.</p>

<blockquote><p><strong>Window Advantage:</strong> In-house manufacturing means complete control over quality, cost, and timeline. While other companies rely on subcontractors — adding extra profit margins, slowing execution, and weakening quality control — Window Agency manufactures everything in its own factory, offering more competitive pricing with higher quality and faster execution.</p></blockquote>

<h2>Exhibition Booths and Digital Marketing: Inseparable Integration</h2>

<p><strong>Before the exhibition — building anticipation:</strong> social media teaser campaigns, website design or a dedicated landing page with a pre-registration form, and customized digital invitations for clients and partners.</p>

<p><strong>During the exhibition — maximizing engagement:</strong> live coverage on social media, marketing materials such as brochures and printed signs and banners, promotional gifts bearing the company logo, and a professional annual report displayed in the booth.</p>

<p><strong>After the exhibition — converting interest to results:</strong> lead follow-up with special offers, converting exhibition videos and photos into social media content, and performance analysis to improve the strategy for the next exhibition.</p>

<blockquote><p><strong>Why This Matters:</strong> Companies that settle for a beautiful booth without a comprehensive marketing strategy before, during, and after the exhibition waste 60–70% of their investment value. The booth is the nucleus — but it needs an integrated ecosystem of social media management, printed materials, promotional gifts, and follow-up. Window Agency provides all these services under one roof.</p></blockquote>

<h2>Exhibition Booths for Different Sectors</h2>

<p><strong>Real Estate and Construction:</strong> booths showcasing projects with 3D models and interactive screens enabling virtual walkthroughs, focused on luxury and trust with marble, glass, and warm lighting.</p>

<p><strong>Technology and Digital:</strong> futuristic designs with dark colors, neon lighting, massive display screens, live product demonstrations, and interactive experience zones for exhibitions like LEAP and GITEX.</p>

<p><strong>Healthcare and Government:</strong> clean, organized designs reflecting professionalism and trust — calm colors, balanced lighting, and dedicated VIP zones.</p>

<blockquote><p><strong>From Our Portfolio:</strong> We executed the <strong>Al-Awn Al-Nukhba</strong> booth at a major exhibition — a premium island booth featuring vertical wooden slats, laser-cut Islamic geometric patterns, large digital screens, LED strip lighting, and circular pendant lights. Every element — from the aluminum framework to the last LED light — was designed and manufactured entirely at Window's factory.</p></blockquote>

<h2>How to Choose the Right Exhibition Booth Company</h2>

<ul>
<li><strong>In-house manufacturing capability:</strong> a company that owns its factory outperforms those relying on subcontractors in quality, price, speed, and flexibility</li>
<li><strong>Portfolio:</strong> request to see previous projects — photos and videos of actually executed booths</li>
<li><strong>End-to-end service:</strong> from design to manufacturing to transport, installation, and dismantling</li>
<li><strong>Local exhibition experience:</strong> knowledge of venues, rules, schedules, and constraints</li>
<li><strong>Post-exhibition services:</strong> dismantling, storage, and the ability to reuse the booth</li>
</ul>

<h2>Common Mistakes in Exhibition Booth Design</h2>

<ul>
<li><strong>Skimping on lighting:</strong> a beautifully designed booth with weak or random lighting loses 70% of its visual impact</li>
<li><strong>Neglecting the back wall:</strong> the most visible surface — don't leave it empty or cluttered</li>
<li><strong>No clear traffic flow:</strong> design a clear entry and exit path that passes through all display zones</li>
<li><strong>Ignoring comfort:</strong> an uncomfortable team reflects in their visitor interactions</li>
<li><strong>Not planning for storage:</strong> without hidden storage, boxes and equipment pile up and destroy the professional impression</li>
</ul>

<blockquote><p><strong>Numbers That Speak:</strong> Companies that engage a specialized exhibition booth agency achieve 3 to 5 times higher ROI compared to those building booths in-house or using non-specialist suppliers — because professional booths attract more visitors and convert them into leads more efficiently.</p></blockquote>

<h2>Why Window Agency Is the Top Choice for Exhibition Booths in Saudi Arabia</h2>

<ul>
<li><strong>Fully equipped factory in Riyadh:</strong> the latest woodworking, aluminum, metalwork, and laser cutting equipment — everything manufactured in-house</li>
<li><strong>Integrated design and execution team:</strong> 3D designers, engineers, technicians, carpenters, metalworkers, and electricians under one roof</li>
<li><strong>Extensive Saudi exhibition experience:</strong> years of executing booths at the Kingdom's premier exhibitions</li>
<li><strong>Integrated marketing services:</strong> brand identity design, social media management, website design, signs and banners, employee gifts, and annual report design</li>
<li><strong>Major project fencing:</strong> branded hoarding and printed barriers for large construction and real estate developments</li>
<li><strong>Competitive pricing:</strong> in-house manufacturing eliminates intermediary profit margins</li>
</ul>

<p style="text-align:center;"><strong>Your booth at the next exhibition deserves to be the best in the hall.</strong></p>
<p style="text-align:center;">Contact us now and get a free 3D design for your next booth.</p>
<p style="text-align:center;"><a href="https://windowadv.com/en/contact">Contact Us Now</a></p>

<h2>Frequently Asked Questions About Exhibition Booth Design & Manufacturing</h2>

<h3>How much does it cost to design and build an exhibition booth in Saudi Arabia?</h3>

<p>Cost depends on area, booth type, finish level, materials, and technical elements. Window Agency offers solutions ranging from economical booths to luxurious double-deck structures. Contact us for a customized quote.</p>

<h3>How long does it take to manufacture an exhibition booth?</h3>

<p>Small to medium booths need 2 to 3 weeks, while large and complex booths need 4 to 6 weeks. We recommend contacting us at least two months before the exhibition.</p>

<h3>Can the booth be reused at another exhibition?</h3>

<p>Yes — our booths are designed with a flexible assembly and disassembly system that allows reuse with the ability to modify certain elements to suit the new exhibition. We also offer booth storage services.</p>

<h3>Do you handle booth installation at the exhibition venue?</h3>

<p>Absolutely — we handle transport, assembly, electrical connections, and final cleaning at the exhibition venue, plus technical support throughout the exhibition days.</p>

<h3>What's the difference between an inline booth and an island booth?</h3>

<p>An inline booth is open on one side only and suits small spaces and limited budgets. An island booth is open on all four sides, delivering stronger visual impact and attracting more visitors but requiring larger space and budget.</p>

<h3>Do you design booths with Saudi or Islamic character?</h3>

<p>Yes — we have extensive experience integrating Islamic architectural elements and Saudi character into booth design: laser-cut geometric patterns, Arabic calligraphy, and heritage-inspired colors.</p>

<h3>Do you offer marketing services alongside the exhibition?</h3>

<p>Yes — as a full-service advertising and marketing agency, we provide comprehensive marketing campaigns before, during, and after the exhibition, including social media management, printed materials, and website design.</p>

<h3>What sectors do you have experience building booths for?</h3>

<p>We execute booths for all sectors — real estate, construction, technology, healthcare, government, food, education, industrial, and more.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'exhibition-booth-manufacturing-saudi-arabia-window';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
