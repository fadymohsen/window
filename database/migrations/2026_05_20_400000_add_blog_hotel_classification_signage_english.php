<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', 'hotel-classification-signage')->first();
        if (!$blog) {
            return;
        }

        $blogId = $blog->id;

        $enTitle = 'Hotel Classification Signs & Serviced Apartment Signage: The Complete Specifications and Compliance Guide';
        $enMetaTitle = 'Hotel Classification Signs & Serviced Apartment Signage | Specifications Guide 2026 | Window';
        $enMetaDescription = 'Complete guide to hotel classification signs and serviced apartment signage in Saudi Arabia. Technical specifications, Ministry of Tourism requirements, materials, and professional execution by Window Agency.';
        $enKeywords = 'hotel classification signs,serviced apartment signage,hotel star rating sign,Ministry of Tourism,stainless steel signage,hospitality signage,advertising agency Riyadh,hotel wayfinding';

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
<p>In Saudi Arabia's rapidly growing hospitality sector under Vision 2030, <strong>hotel classification signs</strong> and <strong>serviced apartment signage</strong> have become far more than simple placards — they are an essential part of the regulatory, governance, and official visual identity framework for tourism establishments. The Ministry of Tourism mandates precise specifications for these signs covering dimensions, materials, colors, and installation location. In this comprehensive guide, we cover everything a hotel or serviced apartment owner needs to know about classification signage: from definitions and importance, to exact technical specifications, official requirements, and the stages of professional execution.</p>
</blockquote>

<h2>What Are Hotel Classification Signs and Serviced Apartment Signs?</h2>

<p>Hotel classification signs are <strong>officially certified plaques</strong> mounted on the exterior facades of hotels and serviced apartments, displaying the classification rating approved by the Ministry of Tourism. These ratings range from one star to five stars for hotels, and from first class to premium class for serviced apartments.</p>

<p>The sign is not merely decorative — it is an official visual document declaring the establishment's approved service level to the public. Falsifying a classification or displaying a non-certified sign exposes the establishment to severe legal penalties. Therefore, these signs must be fabricated to exact, approved specifications.</p>

<h3>Classification Sign vs. Name Sign</h3>

<p><strong>Classification sign:</strong> Displays the classification rating (stars or category) and carries the Ministry of Tourism logo. Subject to strict specifications regarding dimensions, materials, and colors.</p>

<p><strong>Name sign:</strong> Carries the establishment's name, logo, and brand identity. Subject to general municipality requirements regarding size, protrusion, and language.</p>

<p>Both signs are essential: the classification sign establishes official accreditation, while the name sign builds brand recognition. Together, they create a cohesive visual identity for the establishment.</p>

<blockquote>
<p><strong>Market context:</strong> Saudi Arabia's hospitality sector targets over 150 million tourism visits by 2030, with a massive expansion in hotel and serviced apartment supply. This growth translates to increasing demand for certified classification signs that meet official specifications.</p>
</blockquote>

<h2>Why Classification Signs Matter in the Hospitality Sector</h2>

<p>Classification signs serve multiple roles that extend far beyond announcing an establishment's category:</p>

<ul>
<li><strong>Unified sector appearance:</strong> Standardized specifications ensure a professional, consistent look across all tourism establishments in the Kingdom, enhancing the overall image for international visitors.</li>
<li><strong>Trust and transparency:</strong> Guests know the expected service level at a glance from the classification displayed on the facade. This transparency reduces complaints and improves customer satisfaction.</li>
<li><strong>Regulatory compliance:</strong> Displaying an approved classification sign is a mandatory requirement for maintaining the establishment's tourism license. Its absence or non-compliance triggers regulatory action.</li>
<li><strong>Institutional identity support:</strong> A professionally executed classification sign complements the establishment's visual identity and adds a layer of credibility and officiality.</li>
<li><strong>Competitive advantage:</strong> In a crowded hospitality market, a high-quality classification sign distinguishes the establishment visually and creates a first impression of quality and attention to detail.</li>
</ul>

<h2>Approved Technical Specifications for Classification Signs</h2>

<p>The Ministry of Tourism defines precise technical specifications for classification signs to ensure uniformity and quality. Any deviation from these specifications results in sign rejection. Here are the essential requirements:</p>

<h3>Approved Dimensions</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Value</th>
</tr>
</thead>
<tbody>
<tr>
<td>Sign width</td>
<td>60 cm</td>
</tr>
<tr>
<td>Sign height</td>
<td>40 cm</td>
</tr>
<tr>
<td>Wooden base thickness</td>
<td>Minimum 2.5 cm</td>
</tr>
</tbody>
</table>
</figure>

<h3>Approved Materials</h3>

<ul>
<li><strong>Primary metal:</strong> Stainless steel grade SS 316 or SS 304. These grades offer high corrosion and weather resistance, ensuring the sign remains in excellent condition for years.</li>
<li><strong>Wooden base:</strong> High-quality wood with a minimum thickness of 2.5 cm, treated against moisture and insects.</li>
<li><strong>Printing:</strong> UV-resistant vinyl sticker with high-resolution printing that ensures clarity of details and colors.</li>
</ul>

<h3>Approved Color</h3>

<p>The mandatory color is <strong>Pearl Gold (RAL 1036)</strong> — a lustrous gold tone that conveys the luxury appropriate for the hospitality sector. This color is applied using powder coating technology to ensure color stability and fade resistance over time.</p>

<h3>Required Visual Elements</h3>

<ul>
<li>Ministry of Tourism logo</li>
<li>Classification symbol (stars for hotels / category for serviced apartments)</li>
<li>Establishment name in both Arabic and English</li>
<li>License number</li>
</ul>

<blockquote>
<p><strong>Important note:</strong> Specifications may be updated periodically. Always verify the latest Ministry of Tourism requirements before manufacturing. Window Agency continuously monitors these updates to ensure every sign we produce is fully compliant.</p>
</blockquote>

<h2>Usage and Installation Requirements for Classification Signs</h2>

<p>The Ministry of Tourism doesn't just define the sign's appearance — it sets strict requirements for how it is used and where it is installed:</p>

<h3>Usage Requirements</h3>

<ul>
<li><strong>Approved classification only:</strong> The sign must reflect only the official classification approved by the Ministry. Displaying a higher or different classification is a serious violation.</li>
<li><strong>Update upon reclassification:</strong> When a classification is upgraded or downgraded, the sign must be replaced immediately with one reflecting the new rating.</li>
<li><strong>No modifications:</strong> The sign may not be altered or have unapproved elements added after manufacturing.</li>
<li><strong>Good condition:</strong> The sign must be maintained in clean, undamaged condition. A damaged or faded sign constitutes a violation.</li>
</ul>

<h3>Installation Requirements</h3>

<ul>
<li><strong>Location:</strong> Mounted on the establishment's main facade in a clearly visible location.</li>
<li><strong>Height:</strong> At an appropriate height for easy reading, typically between 1.5 and 2.5 meters from ground level.</li>
<li><strong>Secure mounting:</strong> The sign must be securely fixed to prevent falling or movement in wind. Fasteners must be made of the same material (stainless steel) to prevent electrochemical reaction and corrosion.</li>
<li><strong>Unobstructed view:</strong> Nothing may partially or fully obstruct the sign — no other signs, plants, or decorative elements.</li>
</ul>

<blockquote>
<p><strong>Warning:</strong> Installing a non-compliant classification sign or displaying an unauthorized rating exposes the establishment to fines that can reach tens of thousands of riyals, plus potential suspension of the tourism license.</p>
</blockquote>

<h2>Stages of Professional Classification Sign Execution</h2>

<p>Producing a certified classification sign requires a precise, organized process that ensures full specification compliance:</p>

<ol>
<li><strong>Requirements definition:</strong> Confirming the approved classification category, obtaining official documentation (classification certificate, license number), and reviewing the latest Ministry requirements.</li>
<li><strong>Design:</strong> Preparing a preliminary design incorporating all required elements (Ministry logo, stars/category, establishment name, license number) while adhering to approved dimensions and colors. The design is presented to the client for review and approval.</li>
<li><strong>Material preparation:</strong> Sourcing and preparing the stainless steel plate (SS 316 or SS 304), treated wooden base, and UV-resistant vinyl.</li>
<li><strong>Manufacturing and coating:</strong> Cutting the metal plate to exact dimensions, then applying Pearl Gold (RAL 1036) coating using powder coating technology for durability and color stability.</li>
<li><strong>Printing and assembly:</strong> High-resolution printing of visual elements on vinyl, followed by precise application onto the metal plate. Mounting the plate onto the wooden base.</li>
<li><strong>Inspection and quality check:</strong> Comprehensive inspection verifying specification compliance: dimensions, color accuracy, print clarity, and material integrity.</li>
<li><strong>On-site installation:</strong> Mounting the sign on the establishment's main facade per installation requirements, ensuring stability and unobstructed visibility.</li>
</ol>

<h2>Types of Hospitality Signage Beyond Classification</h2>

<p>Beyond the official classification sign, hospitality establishments require a comprehensive set of name and directional signage:</p>

<ul>
<li><strong>Main name sign:</strong> Bearing the hotel or serviced apartment's name and logo, designed to align with the brand's visual identity while complying with municipality requirements.</li>
<li><strong>Exterior directional signage:</strong> Wayfinding signs for the main entrance, parking, VIP entrance, and outdoor amenities.</li>
<li><strong>Interior wayfinding system:</strong> A comprehensive indoor signage system covering: room numbers, elevator and stairway directions, reception, restaurant, pool, spa, and meeting rooms.</li>
<li><strong>Safety and emergency signage:</strong> Emergency exit signs, fire extinguisher locations, and assembly points — mandatory under Civil Defense regulations.</li>
<li><strong>Informational signs:</strong> Room rate displays, establishment policies, and in-room safety instructions.</li>
<li><strong>Digital signage:</strong> Lobby digital displays for variable information: event schedules, exchange rates, and weather updates.</li>
</ul>

<blockquote>
<p><strong>Integrated solutions:</strong> A mid-sized hotel (100–200 rooms) typically requires 300–500 signs of various types. Executing this volume across multiple vendors causes quality and color inconsistencies. The optimal approach is working with a single full-service agency that ensures uniformity.</p>
</blockquote>

<h2>Design Standards for a Successful Classification Sign</h2>

<p>A successful sign combines full specification compliance with premium visual execution befitting a hospitality establishment:</p>

<ul>
<li><strong>Clarity and legibility:</strong> Every element must be clear and readable from a reasonable distance — the classification rating above all.</li>
<li><strong>Color consistency:</strong> The Pearl Gold (RAL 1036) finish must be uniform across the entire surface, with no patches or variation.</li>
<li><strong>Logo precision:</strong> The Ministry of Tourism logo and classification symbols must be high-resolution with sharp edges — any blurriness or pixelation undermines credibility.</li>
<li><strong>Finish quality:</strong> Polished edges, flawless surfaces, and concealed mounting (invisible front-facing fasteners) for a clean appearance.</li>
<li><strong>Environmental durability:</strong> The design must account for site-specific climate conditions — extreme heat, coastal humidity, or sandstorms.</li>
</ul>

<h2>SS 304 vs. SS 316 Stainless Steel: Which Should You Choose?</h2>

<p>The choice of stainless steel grade depends on the establishment's location and climate conditions:</p>

<figure class="table">
<table>
<thead>
<tr>
<th>Criterion</th>
<th>SS 304</th>
<th>SS 316</th>
</tr>
</thead>
<tbody>
<tr>
<td>Corrosion resistance</td>
<td>Good — suitable for dry climates</td>
<td>Excellent — high resistance for coastal and humid climates</td>
</tr>
<tr>
<td>Salt resistance</td>
<td>Limited</td>
<td>Very high (contains molybdenum)</td>
</tr>
<tr>
<td>Cost</td>
<td>Lower</td>
<td>15–20% higher</td>
</tr>
<tr>
<td>Ideal use</td>
<td>Riyadh, inland regions</td>
<td>Jeddah, Dammam, coastal areas</td>
</tr>
<tr>
<td>Lifespan</td>
<td>15–20 years</td>
<td>25–30 years</td>
</tr>
</tbody>
</table>
</figure>

<blockquote>
<p><strong>Window's recommendation:</strong> For hotels in coastal areas (Jeddah, Dammam, Yanbu, Jubail), we exclusively recommend SS 316. For inland locations (Riyadh, Qassim, Hail), SS 304 is an excellent and cost-effective choice.</p>
</blockquote>

<h2>Window Agency's Role in Classification Sign Execution</h2>

<p><strong>Window Advertising Agency</strong>, with over 25 years of experience in the Saudi market, delivers an end-to-end service for hotel classification and serviced apartment signage:</p>

<ul>
<li><strong>Specification-compliant design:</strong> A specialized design team intimately familiar with Ministry of Tourism requirements, producing designs that pass approval on the first submission.</li>
<li><strong>Professional manufacturing:</strong> A fully equipped factory in Riyadh for cutting and shaping stainless steel, with powder coating ovens for applying RAL 1036 to factory-grade quality.</li>
<li><strong>Durable printing:</strong> High-resolution vinyl printing with UV-resistant inks ensuring color and detail clarity for years.</li>
<li><strong>Secure installation:</strong> A professional installation team that mounts the sign per all installation requirements, ensuring stability and safety.</li>
<li><strong>Integrated solutions:</strong> We execute classification sign + name sign + interior wayfinding + safety signage as a single integrated project — with unified visual identity and consistent quality.</li>
</ul>

<p>Our goal is for the establishment owner to receive a classification sign that requires zero Ministry revisions, along with a complete internal and external signage system worthy of their hospitality standards.</p>

<h2>Need a Certified Hotel Classification Sign Built to the Highest Standards?</h2>

<p>Window Advertising Agency — 25+ years executing classification signs for hotels and serviced apartments across Saudi Arabia. Specification-compliant design, professional fabrication, and secure installation.</p>

<p><a href="https://windowadv.com/en/contact">Request a Quote Now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>Q: What is a hotel classification sign?</h3>

<p>It is an officially certified plaque approved by the Ministry of Tourism, mounted on a hotel or serviced apartment's facade, displaying the approved classification rating (star count for hotels or category for serviced apartments). It is fabricated from stainless steel in Pearl Gold color (RAL 1036) and includes the Ministry logo and license number.</p>

<h3>Q: What material is required for the classification sign?</h3>

<p>The approved material is stainless steel grade SS 304 or SS 316. SS 304 suits dry inland climates, while SS 316 is preferred for coastal locations due to its superior salt resistance. The coating is Pearl Gold (RAL 1036) applied via powder coating.</p>

<h3>Q: What are the approved dimensions?</h3>

<p>The approved dimensions are: 60 cm width × 40 cm height. The wooden base must have a minimum thickness of 2.5 cm. These dimensions are set by the Ministry of Tourism and cannot be altered.</p>

<h3>Q: Where should the classification sign be installed?</h3>

<p>It must be mounted on the establishment's main facade in a clearly visible location, typically at a height between 1.5 and 2.5 meters from ground level. It must not be obstructed by any other element — no other signs, plants, or decorative features.</p>

<h3>Q: What happens if the sign doesn't meet specifications?</h3>

<p>Displaying a non-compliant sign or an unauthorized classification rating exposes the establishment to financial penalties and regulatory action, potentially including suspension of the tourism license. Full specification compliance must be verified before installation.</p>

<h3>Q: Can Window handle all of a hotel's signage, not just classification?</h3>

<p>Yes. Window delivers integrated solutions including: the official classification sign, main name sign, interior and exterior wayfinding system, room number signs, and safety signage. Everything under one management with a unified visual identity.</p>

<h3>Q: How long does classification sign production take?</h3>

<p>A single classification sign typically requires 5 to 10 working days from design approval to delivery and installation. Integrated projects (classification + name signs + wayfinding system) take 3 to 6 weeks depending on scope.</p>
HTML;
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', 'hotel-classification-signage')->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
