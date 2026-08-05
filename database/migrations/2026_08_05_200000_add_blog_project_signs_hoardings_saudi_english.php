<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'project-signs-hoarding-boards-saudi-arabia-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Project Signs and Hoarding Boards in Saudi Arabia: A Complete Guide from Design to Installation';
        $enMetaTitle       = 'Project Signs and Hoarding Boards in Saudi Arabia: Design to Installation | Window Advertising Agency';
        $enMetaDescription = 'A complete guide to construction site information boards and hoarding fences in Saudi Arabia: types, materials, municipal requirements, and execution stages from design to installation with Window Advertising Agency.';
        $enKeywords        = 'project signs Saudi Arabia,hoarding fences,project information boards,construction site fencing,cylindrical signs,directional signage,SwissQprint printing,Window Advertising Agency,project sign permits,Vision 2030';

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
<p>On every project under construction, there is a decisive moment that precedes handover by years — the moment an investor or prospective buyer passes the site for the first time. That moment shapes the first impression and either builds trust or breaks it. At <strong>Window Advertising Agency</strong>, we understand that project boards and hoarding fences are not temporary signage — they are your project's first visual face and voice before construction is even complete. We deliver end-to-end solutions, from design in our studios to printing with Swiss SwissQprint technology, through to professional on-site installation.</p>

<blockquote><p><strong>"We don't just make a sign — we build the first impression that lasts."</strong></p></blockquote>

<h2>What Types of Project Signs Exist in the Saudi Market?</h2>

<p>Project signs and construction-site fencing come in many forms, depending on purpose, location, and target audience. At Window Agency, we handle every type with accumulated expertise in the Saudi market that guarantees results beyond expectations.</p>

<h3>Project Information Boards</h3>

<p>These are the official boards installed at the entrance of any project under construction. They display core data: project name, owner, developer, architect, lead consultant, and general contractor. These boards are not just a regulatory requirement — they are the project's identity card to the world.</p>

<blockquote><p><strong>From our portfolio:</strong> We are proud to have executed the project information board for Burj Fallah, featuring all stakeholder data in an elegant design that reflects the project's stature and demonstrates the developer's professionalism from the very first moment.</p></blockquote>

<h3>Project Hoarding Fences</h3>

<p>Hoarding fences are the extended barriers surrounding a construction site that transform into massive advertising boards carrying the project's visual identity. They can stretch for hundreds of meters, becoming a promotional façade seen by thousands of passersby daily.</p>

<blockquote><p><strong>From our portfolio:</strong> We executed the hoarding fences for the Mustaqbal Riyadh project, where our designs covered vast areas with exceptional print quality reflecting the project's future vision and introducing the public to its details.</p></blockquote>

<h3>Cylindrical Signs</h3>

<p>Used in locations with limited space or at intersections and roundabouts. Their circular shape allows visibility from every direction, making them ideal for sites with heavy traffic flow.</p>

<blockquote><p><strong>From our portfolio:</strong> We executed cylindrical signage for Al-Jouf University using materials resistant to the region's harsh weather conditions, with a design that ensures legibility from different distances and multiple angles.</p></blockquote>

<h3>Directional and Wayfinding Signs</h3>

<p>Installed inside large facilities and complexes to guide visitors and staff. They require a design that prioritizes ease of reading and clarity from varying distances while maintaining a unified visual identity.</p>

<blockquote><p><strong>From our portfolio:</strong> We executed a comprehensive wayfinding sign system for King Fahd Medical City, including directional boards designed to ease navigation inside the massive medical facility and achieve the highest standards of clarity.</p></blockquote>

<h3>Large Advertising Boards</h3>

<p>Massive boards used to promote real estate projects before launch or during sales phases. They carry strong marketing messages targeting prospective buyers and investors.</p>

<blockquote><p><strong>From our portfolio:</strong> We designed and executed promotional boards for Arkan Real Estate under the slogan "An elegant community for an exceptional life," achieving a strong visual presence at strategic locations across Riyadh.</p></blockquote>

<h2>How Does Your Board Move From Idea to Site?</h2>

<p>At Window Agency, we follow an integrated workflow guided by our internal motto, "Projects That Make a Difference." Every project passes through clear stages that guarantee the highest quality standards:</p>

<h3>Stage One: Design in the Studio</h3>

<ol>
<li>A working session with the client to understand requirements and project identity</li>
<li>Studying site dimensions, viewing angles, and lighting conditions</li>
<li>Reviewing municipal requirements and applicable local regulations</li>
<li>Preparing initial designs in Arabic and English</li>
<li>Approving the final design after review rounds with the client</li>
</ol>

<blockquote><p><strong>Window's Edge:</strong> A specialized design team combining creative sense with technical knowledge of large-format print requirements, ensuring the design looks exactly as good in reality as it does on screen.</p></blockquote>

<h3>Stage Two: Printing with SwissQprint Technology</h3>

<p>We rely on advanced Swiss SwissQprint printers, among the best large-format printing technologies in the world. UV printing technology guarantees:</p>

<ul>
<li>Exceptional print resolution reaching 1350 DPI</li>
<li>Direct printing on diverse materials without intermediate layers</li>
<li>UV-resistant colors that last for years without fading</li>
<li>High production speed suited to tight-deadline projects</li>
</ul>

<blockquote><p><strong>Why this matters:</strong> In the Saudi environment, where temperatures exceed 50°C and UV radiation is intense, regular printing fades within months. SwissQprint's UV technology preserves color vibrancy for years — which is exactly what our slogan means: "Quality that lasts."</p></blockquote>

<h3>Stage Three: On-Site Installation and Execution</h3>

<ol>
<li>Transporting manufactured materials to the site with full care</li>
<li>Installing metal structures and bases under specialized engineering supervision</li>
<li>Mounting the boards with attention to safety standards and wind-resistant installation stability</li>
<li>Electrical connections for illuminated boards</li>
<li>Final quality inspection and handover with a comprehensive warranty</li>
</ol>

<blockquote><p><strong>Window's Edge:</strong> A professional field team operating under direct engineering supervision, committed to a clear timeline agreed with the client from the start. "We don't just make a sign — we build the first impression that lasts."</p></blockquote>

<h2>Materials: What We Use and Why</h2>

<p>Choosing the right material is half the battle for a successful sign. In the harsh Saudi environment, materials must withstand high heat, intense UV radiation, and dust-laden winds.</p>

<table><tbody><tr><td><strong>Material</strong></td><td><strong>Optimal Use</strong></td><td><strong>Features</strong></td><td><strong>Expected Lifespan</strong></td></tr><tr><td>Aluminum Composite Panels (ACM)</td><td>Information boards and large fences</td><td>Lightweight, durable, corrosion-resistant</td><td>5-10 years</td></tr><tr><td>High-quality printed vinyl</td><td>Hoarding fences and covers</td><td>Flexible, UV-resistant</td><td>2-4 years</td></tr><tr><td>Clear and colored acrylic</td><td>Indoor directional signage</td><td>Elegant, easy to clean, allows backlighting</td><td>5-8 years</td></tr><tr><td>PVC foam board</td><td>Temporary signs and exhibitions</td><td>Very lightweight, moisture-resistant</td><td>1-3 years</td></tr><tr><td>Stainless steel</td><td>Premium, permanent signage</td><td>Luxurious appearance, rust-resistant</td><td>10+ years</td></tr></tbody></table>

<blockquote><p><strong>Market fact:</strong> Over 70% of project signs in Saudi Arabia are made from aluminum composite panels due to their ideal balance of weight, durability, and cost — and it's also the most requested material across our own projects.</p></blockquote>

<h2>Municipal Regulations and Requirements: What You Need to Know</h2>

<p>Saudi Arabia is one of the most regulated countries when it comes to project signage. Municipalities and amanahs require a set of conditions to be met before installing any board:</p>

<ul>
<li><strong>Board permit:</strong> Obtaining an official permit from the relevant amanah or municipality</li>
<li><strong>Defined dimensions:</strong> Adhering to permitted dimensions based on street type and site classification</li>
<li><strong>Content controls:</strong> Compliance with content, language, and official logo regulations</li>
<li><strong>Structural safety:</strong> Submitting engineering plans proving installation durability and wind resistance</li>
<li><strong>Display period:</strong> Defining the board's validity period with periodic renewal options</li>
<li><strong>Removal upon completion:</strong> Committing to remove the board immediately once the project or permit ends</li>
</ul>

<blockquote><p><strong>Window's Edge:</strong> We manage the entire permit and approval process on behalf of our clients. Our experience dealing with Riyadh Municipality and other relevant authorities saves clients time and effort while ensuring full compliance without delays.</p></blockquote>

<h2>Vision 2030 and Giant Projects: Why Demand Is at Its Peak</h2>

<p>The Kingdom is living through a historic transformation under Saudi Vision 2030. The giant projects currently under execution have created unprecedented demand for professional project signs and hoarding fences:</p>

<ul>
<li><strong>NEOM:</strong> The city of the future, with hundreds of construction sites requiring identification and directional signage to global standards</li>
<li><strong>The Red Sea Project:</strong> A world-class tourism destination requiring signage with international specifications reflecting the project's luxury</li>
<li><strong>Qiddiya:</strong> The entertainment, sports, and culture city with an integrated visual experience</li>
<li><strong>Diriyah:</strong> Heritage revival with signage combining authenticity and modernity</li>
<li><strong>Riyadh development projects:</strong> The capital is expanding with massive residential and commercial projects in every direction</li>
</ul>

<blockquote><p><strong>The numbers speak:</strong> The Kingdom is investing more than one trillion dollars in infrastructure and urban development projects under Vision 2030. Every one of these projects needs professional information boards and hoarding fences — meaning massive opportunities and higher quality standards than ever before.</p></blockquote>

<h2>Why Does the First Impression on a Construction Site Make the Difference?</h2>

<p>Some may wonder: why invest so much in a project sign or a temporary construction fence? The truth is the return far outweighs the cost:</p>

<ul>
<li><strong>Instant trust building:</strong> A professional board sends a clear message about the developer's seriousness and project quality before a single floor is built</li>
<li><strong>Continuous marketing:</strong> Hoarding fences are advertising boards working 24 hours a day, seen by thousands of passersby for free</li>
<li><strong>Legal compliance:</strong> Saudi regulations require clear information boards, and violations mean fines and work stoppages</li>
<li><strong>Site protection:</strong> Professional fences prevent unauthorized entry and protect against vandalism</li>
<li><strong>Brand reinforcement:</strong> Every project is an opportunity to establish the developer's name in the target audience's mind</li>
</ul>

<blockquote><p><strong>Why this matters:</strong> Real estate market studies show that projects with a strong visual presence during construction achieve higher off-plan sales rates compared to projects that neglect signage and fencing. The first impression isn't a luxury — it's an investment.</p></blockquote>

<h2>Comprehensive Comparison Table of Project Sign Types</h2>

<table><tbody><tr><td><strong>Sign Type</strong></td><td><strong>Main Use</strong></td><td><strong>Common Materials</strong></td><td><strong>Expected Lifespan</strong></td><td><strong>Cost Level</strong></td></tr><tr><td>Project information boards</td><td>Displaying project and stakeholder data</td><td>Composite aluminum, stainless steel</td><td>3-5 years</td><td>Medium</td></tr><tr><td>Hoarding fences</td><td>Covering the entire construction site perimeter</td><td>Printed vinyl on a metal frame</td><td>1-3 years</td><td>High (depends on area)</td></tr><tr><td>Cylindrical signs</td><td>Intersections, roundabouts, and entrances</td><td>Composite aluminum with lighting</td><td>3-5 years</td><td>Medium to high</td></tr><tr><td>Directional signage</td><td>Wayfinding inside facilities and complexes</td><td>Acrylic, aluminum, PVC</td><td>5-10 years</td><td>Low to medium</td></tr><tr><td>Large advertising boards</td><td>Promoting real estate projects</td><td>Stretched vinyl, printed fabric</td><td>1-2 years</td><td>High</td></tr></tbody></table>

<h2>Why Choose Window Agency for Your Next Project?</h2>

<p>In a market full of options, what sets Window Advertising Agency apart is its integrated methodology and advanced technologies:</p>

<ul>
<li><strong>End-to-end service:</strong> Design, printing, manufacturing, installation, and maintenance — everything under one roof</li>
<li><strong>World-class printing technology:</strong> Swiss SwissQprint printers guarantee the highest UV print quality in the Saudi market</li>
<li><strong>Specialized team:</strong> Designers, engineers, and technicians with extensive experience in major Saudi projects</li>
<li><strong>Strict deadline commitment:</strong> We understand that construction projects run on timelines that don't tolerate delays</li>
<li><strong>Permit management:</strong> Experience dealing with amanahs and municipalities ensures smooth procedures</li>
<li><strong>Quality guarantee:</strong> Our slogan "Quality that lasts" is a commitment we prove in every project we execute</li>
</ul>

<blockquote><p><strong>Window's Edge:</strong> We don't just sell boards — we build the first lasting impression for your project. From residential tower projects to giant government developments, our experience in the Saudi market gives us a deep understanding of every project's requirements, regardless of its size or location.</p></blockquote>

<h2>Contact Window Agency Today</h2>

<p><strong>Window Advertising Agency</strong> — your specialized partner for project signs and hoarding fences with the highest standards of quality and professionalism in the Kingdom of Saudi Arabia. Integrated solutions from design to installation using advanced Swiss SwissQprint printing technology. Full-cycle service: design ← printing ← manufacturing ← installation ← maintenance.</p>

<p><a href="https://windowadv.com/en/contacts">Contact us now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>How long does it take to execute a complete sign project from design to installation?</h3>

<p>The timeline ranges from 7 to 21 working days depending on project size and complexity. Small information boards can be completed within a week, while large hoarding projects covering hundreds of meters may take three weeks. At Window Agency, we commit to a clear timeline agreed with the client from the start and ensure on-time delivery.</p>

<h3>Can the boards withstand Saudi Arabia's harsh climate conditions?</h3>

<p>Absolutely, yes. We use materials specifically engineered to withstand temperatures exceeding 50°C, intense UV radiation, and sand- and dust-laden winds. SwissQprint's UV printing technology ensures color stability for years without fading or peeling, even in the harshest climate conditions.</p>

<h3>What permits are required to install project signs in Riyadh?</h3>

<p>Installation requires obtaining a permit from Riyadh Municipality, including submission of engineering plans and the sign design for approval. At Window Agency, we handle the entire permit-extraction process on behalf of our clients to ensure full compliance and speed up execution without bureaucratic obstacles.</p>

<h3>What is the difference between hoarding and project information boards?</h3>

<p>Project information boards are fixed-size boards at the project entrance displaying core data such as project name, owner, developer, and contractor. Hoarding, on the other hand, is the extended fencing surrounding the entire construction site perimeter, used as a large advertising space to display attractive promotional designs and detailed project information.</p>

<h3>What are the most suitable materials for project signs in the Saudi climate?</h3>

<p>Aluminum composite panels (ACM) are the most common choice thanks to their light weight, durability, and corrosion resistance. For long fences, high-quality printed vinyl on metal frames offers an excellent balance of quality and cost. For premium, permanent signage, stainless steel is the ideal choice. We help you select the right material for your project's requirements and budget.</p>

<h3>Does Window Agency provide maintenance service after installation?</h3>

<p>Yes. We offer periodic maintenance contracts including sign cleaning, metal structure inspection, replacement of damaged parts, and content updates when needed. We ensure our clients' signs stay in the best condition throughout the project's duration, keeping the first impression strong from day one until handover.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'project-signs-hoarding-boards-saudi-arabia-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
