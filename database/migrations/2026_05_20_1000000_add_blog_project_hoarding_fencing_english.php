<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', 'project-hoarding-fencing-riyadh')->first();
        if (!$blog) {
            return;
        }

        $blogId = $blog->id;

        $enTitle = 'Project Hoarding and Fencing in Riyadh: The Complete Guide to Construction Site Enclosures';
        $enMetaTitle = 'Project Hoarding & Fencing Riyadh | Construction Site Enclosures Guide | Window';
        $enMetaDescription = 'Complete guide to project hoarding in Riyadh. Municipality regulations, technical specifications, execution stages, advertising banners, and cost factors with Window Advertising Agency.';
        $enKeywords = 'project hoarding Riyadh,construction fencing Saudi Arabia,site hoarding KSA,hoarding advertising,construction site barriers,project fencing Riyadh';

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
<p>Project hoarding is far more than a barrier around a construction site — it is a mandatory municipality requirement and a smart marketing tool that developers use to transform the project perimeter into a massive advertising platform. This comprehensive guide covers everything about project hoarding in Riyadh: from municipality regulations and technical specifications, to execution stages and advertising strategies, along with a look at Window Advertising Agency's experience delivering large-scale hoarding for leading organizations.</p>
</blockquote>

<h2>What Is Project Hoarding?</h2>

<p>Project hoarding refers to temporary barriers erected around construction and building sites for multiple purposes: protecting pedestrians from site hazards, containing dust and debris, managing traffic flow around the project, and giving the site a professional appearance that reflects the developer's brand identity.</p>

<p>In Saudi Arabia, project hoarding is a mandatory requirement from the municipality for any construction project. Non-compliance exposes the contractor to financial penalties and work stoppages.</p>

<h3>Temporary Fencing vs. Professional Hoarding</h3>

<p>Temporary fencing (metal mesh barriers) is used during early excavation and grading phases. Professional hoarding, by contrast, consists of a robust metal frame clad with plywood or metal panels, finished with high-quality printed banners. The latter is Window's specialty — transforming a simple barrier into an effective advertising platform.</p>

<h2>Municipality Requirements for Project Hoarding in Riyadh</h2>

<p>The Riyadh Region Municipality (Amanah) sets clear requirements for construction site hoarding that must be met before any building work begins. These regulations aim to protect public safety and maintain the urban aesthetic.</p>

<blockquote>
<p><strong>Warning:</strong> Violating municipality hoarding requirements can result in fines of up to SAR 50,000 and suspension of construction activities until the violation is corrected.</p>
</blockquote>

<h3>Key Technical Specifications</h3>

<ul>
<li><strong>Height:</strong> Between 2.5 meters and 4 meters depending on project location and scale</li>
<li><strong>Frame:</strong> Galvanized steel pipes with a minimum diameter of 2 inches</li>
<li><strong>Cladding:</strong> 12–18 mm plywood panels or metal sheets</li>
<li><strong>Foundations:</strong> Concrete bases or ground-cast footings for column anchoring</li>
<li><strong>Lighting:</strong> Warning lights at corners and entry points</li>
<li><strong>Signage:</strong> Identification board with project name, contractor, and license number</li>
<li><strong>Maintenance:</strong> Keeping the hoarding clean and repairing any damage immediately</li>
</ul>

<h2>Stages of Project Hoarding Execution</h2>

<p>Professional project hoarding follows carefully engineered stages to ensure structural integrity, safety, and a polished appearance. Window follows an integrated execution methodology:</p>

<h3>Stage 1: Site Survey and Measurements</h3>

<p>Window's engineering team visits the site for a comprehensive survey covering: full perimeter measurement, identification of entry points and vehicle routes, topographic assessment to determine appropriate foundation types, and coordination with utility providers (electricity, water, telecom) to avoid any conflicts.</p>

<h3>Stage 2: Foundations and Concrete Bases</h3>

<p>Concrete foundations are excavated to a depth of 50–80 cm depending on soil conditions and hoarding height. Reinforced concrete ensures column stability against strong winds that can exceed 80 km/h in Riyadh. Foundations are left to cure for 48–72 hours before frame installation begins.</p>

<h3>Stage 3: Steel Frame Installation</h3>

<p>The frame is assembled from galvanized steel pipes using welding and bolting. Main columns are positioned at 2–3 meter intervals with upper and lower horizontal rails. Diagonal bracing is added at corners and stress points to increase structural resistance.</p>

<h3>Stage 4: Cladding and Finishing</h3>

<p>Plywood or metal panels are secured to the frame using rust-resistant fasteners. Joints between panels are sealed to prevent dust penetration. After installation, the hoarding receives a primer coat followed by a uniform finish coat (typically white or gray) as a base for advertising banners.</p>

<blockquote>
<p><strong>Window's Capacity:</strong> Capable of enclosing projects with perimeters exceeding 5 kilometers within 15–20 working days, with a team of specialized engineers and technicians.</p>
</blockquote>

<h2>Advertising on Project Hoarding: Turning Barriers Into Marketing Platforms</h2>

<p>One of the smartest real estate marketing strategies in Riyadh is leveraging project hoarding as an advertising platform. Instead of a blank white fence, the hoarding is transformed into a giant billboard displaying: project identity and developer branding, post-completion renders, sales contact information, and architectural plans.</p>

<h3>Types of Banners Used</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Banner Type</th>
<th>Material</th>
<th>Application</th>
<th>Lifespan</th>
</tr>
</thead>
<tbody>
<tr>
<td>Standard Flex</td>
<td>PVC Flex 440gsm</td>
<td>General advertising</td>
<td>6–12 months</td>
</tr>
<tr>
<td>Black-back</td>
<td>Black-back Flex</td>
<td>Backlit locations</td>
<td>12–18 months</td>
</tr>
<tr>
<td>Mesh</td>
<td>PVC Mesh (perforated)</td>
<td>High-wind locations</td>
<td>12–24 months</td>
</tr>
<tr>
<td>Vinyl Sticker</td>
<td>Adhesive Vinyl</td>
<td>Smooth metal panels</td>
<td>18–24 months</td>
</tr>
<tr>
<td>Canvas</td>
<td>Canvas Fabric</td>
<td>Premium projects</td>
<td>6–12 months</td>
</tr>
</tbody>
</table>
</figure>

<h3>Professional Print Specifications</h3>

<p>Window uses large-format digital printers at 1,440 DPI with eco-solvent inks that are UV-resistant and waterproof. Every banner is printed in full CMYK+White color to ensure vibrant colors even under direct sunlight.</p>

<blockquote>
<p><strong>Marketing Insight:</strong> Projects with professional banners on their hoarding generate 40% more inquiries compared to projects with plain fences, especially in high-traffic locations.</p>
</blockquote>

<h2>Hoarding in Real Estate Marketing</h2>

<p>The role of project hoarding has evolved from a simple safety barrier to a versatile marketing tool. Real estate developers in Riyadh leverage hoarding in several ways:</p>

<h3>Brand Awareness Building</h3>

<p>Hoarding surrounding a major project can stretch for several kilometers along main roads. This free advertising space functions as a massive billboard seen daily by thousands of drivers and pedestrians, building cumulative awareness of the project before its official launch.</p>

<h3>Off-Plan Sales</h3>

<p>Hoarding is used to display residential or commercial unit plans alongside contact numbers and QR codes linking to booking pages. This approach has proven highly effective, particularly for NHC (National Housing Company) projects where Window delivered the hoarding and banners.</p>

<h3>Progress Documentation</h3>

<p>Some developers periodically update hoarding banners to showcase completion percentages and construction milestones, building confidence with prospective buyers and demonstrating the developer's commitment to the timeline.</p>

<h2>Technical Specifications: Standard vs. Professional</h2>

<p>The difference between basic project fencing and professional hoarding lies in the technical details that ensure durability, safety, and a distinguished appearance:</p>

<figure class="table">
<table>
<thead>
<tr>
<th>Component</th>
<th>Standard Specification</th>
<th>Window Professional Specification</th>
</tr>
</thead>
<tbody>
<tr>
<td>Columns</td>
<td>Black iron 1.5-inch</td>
<td>Galvanized steel 2–3 inch</td>
</tr>
<tr>
<td>Foundations</td>
<td>Surface mounting</td>
<td>Concrete footings 50–80 cm deep</td>
</tr>
<tr>
<td>Cladding</td>
<td>9 mm plywood</td>
<td>12–18 mm treated plywood</td>
</tr>
<tr>
<td>Paint</td>
<td>Single coat</td>
<td>Primer + 2 finish coats</td>
</tr>
<tr>
<td>Banner</td>
<td>Standard flex 280gsm</td>
<td>Black-back 440gsm + UV ink</td>
</tr>
<tr>
<td>Fasteners</td>
<td>Standard screws</td>
<td>Stainless-steel rust-proof screws</td>
</tr>
<tr>
<td>Lifespan</td>
<td>6–12 months</td>
<td>18–36 months</td>
</tr>
</tbody>
</table>
</figure>

<h2>Window's Reference Projects</h2>

<p>Window Advertising Agency has delivered large-scale hoarding projects for leading organizations in Saudi Arabia's real estate development and construction sectors:</p>

<h3>Notable Projects</h3>

<ul>
<li><strong>Diriyah Museums:</strong> Perimeter hoarding for the museum district in the historic Diriyah area, with specifications matching the heritage character of the zone</li>
<li><strong>National Housing Company (NHC):</strong> Hoarding for multiple residential projects with marketing banners for off-plan sales</li>
<li><strong>Al-Bawani Contracting:</strong> Construction site hoarding for major projects across Riyadh</li>
<li><strong>Al-Rashid Contracting:</strong> High-specification hoarding for diverse projects</li>
<li><strong>Government Infrastructure:</strong> Hoarding for infrastructure projects coordinated with government authorities</li>
</ul>

<blockquote>
<p><strong>Window's Track Record:</strong> Over 50 kilometers of project hoarding delivered in Riyadh alone, with an average height of 3 meters and cladding quality rated to withstand 3 full summer seasons.</p>
</blockquote>

<h2>Project Hoarding and Vision 2030</h2>

<p>With the acceleration of mega-projects under Vision 2030 — from NEOM to Qiddiya, Diriyah, and massive housing developments — the hoarding sector is experiencing unprecedented growth. This demand requires specialized companies capable of delivering hoarding with perimeters spanning tens of kilometers to high quality standards and tight schedules.</p>

<p>Window has invested in expanding its production capacity to meet this rising demand through:</p>

<ul>
<li>Increased raw material inventory (galvanized steel, plywood, banner materials)</li>
<li>Expanded field installation team with 30+ specialized technicians</li>
<li>Development of a digital project management system for progress and quality tracking</li>
<li>Strategic partnerships with major contractors and developers</li>
</ul>

<h2>Hoarding Cost Factors</h2>

<p>Project hoarding costs vary based on several key factors:</p>

<ul>
<li><strong>Project Perimeter:</strong> Priced per linear meter — larger perimeters benefit from lower per-meter costs</li>
<li><strong>Height:</strong> A 4-meter hoarding costs 40–60% more than a 2.5-meter installation</li>
<li><strong>Cladding Type:</strong> Plywood is less expensive than metal panels</li>
<li><strong>Advertising Banners:</strong> Banner design, printing, and installation are priced separately</li>
<li><strong>Terrain:</strong> Rocky ground requires deeper, more costly foundations</li>
<li><strong>Project Duration:</strong> Long-term projects may require banner maintenance and replacement</li>
</ul>

<blockquote>
<p><strong>Window's Offer:</strong> Window provides all-inclusive quotations covering design, foundations, frame, cladding, banners, and 6 months of maintenance — in a single integrated package.</p>
</blockquote>

<h2>How to Choose a Reliable Hoarding Company</h2>

<p>Selecting the right company for your project hoarding saves significant headaches and additional costs. Here are the key criteria:</p>

<ol>
<li><strong>Experience and Track Record:</strong> Look for a company with documented reference projects</li>
<li><strong>Execution Capacity:</strong> Verify their ability to meet agreed timelines</li>
<li><strong>Material Quality:</strong> Request material samples before signing a contract</li>
<li><strong>Municipality Compliance:</strong> Confirm they handle all necessary permits</li>
<li><strong>Print Services:</strong> A company offering both hoarding and printing saves time and cost</li>
<li><strong>Maintenance:</strong> Ask about repair and replacement services during the project period</li>
<li><strong>Insurance:</strong> Ensure coverage against storm damage or accidents</li>
</ol>

<h2>Need Project Hoarding in Riyadh?</h2>

<p>Contact Window's specialized team for a free site visit and comprehensive quotation.</p>

<p><a href="https://windowadv.com/en/contact">Request a Quote Now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>What height is required for project hoarding in Riyadh?</h3>

<p>Required height ranges from 2.5 to 4 meters depending on project location, scale, and municipality requirements. Projects on main roads typically require 3–4 meter hoarding.</p>

<h3>How long does it take to fence an entire project?</h3>

<p>Duration depends on the project perimeter. A 500-meter perimeter takes 7–10 working days, while large-scale projects spanning several kilometers may need 3–6 weeks.</p>

<h3>Can you advertise on project hoarding?</h3>

<p>Yes, and it is one of the smartest marketing strategies available. Banners featuring project renders and sales information can be printed and installed on the hoarding. Window provides design, printing, and installation as an integrated package.</p>

<h3>What is the difference between standard flex and black-back?</h3>

<p>Standard flex is semi-transparent and may allow light to pass through from behind, weakening print clarity. Black-back contains a black layer in the center that blocks all light transmission, maintaining vibrant colors in all conditions.</p>

<h3>Does Window execute hoarding projects outside Riyadh?</h3>

<p>Yes. Window delivers hoarding projects across all Saudi cities with mobile installation teams and integrated shipping logistics.</p>

<h3>How long do hoarding banners last?</h3>

<p>Between 6–24 months depending on material type and weather conditions. UV-printed black-back banners last 12–18 months, while mesh banners can last up to 24 months.</p>

<h3>Does Window's service include municipality permits?</h3>

<p>Yes. Window coordinates with the municipality and secures all necessary permits as part of its full-service package, saving clients time and effort.</p>
HTML;
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', 'project-hoarding-fencing-riyadh')->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
