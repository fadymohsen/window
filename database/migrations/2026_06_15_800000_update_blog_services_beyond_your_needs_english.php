<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug    = 'window-services-beyond-your-needs';
        $oldSlug = 'khdmatna-tmtd-al-ma-ho-abaad-mn-ahtyagk';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('slug', $oldSlug)->first();
        }
        if (!$blog) {
            $blog = DB::table('blogs')->where('id', 17)->first();
        }
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Our Services Extend Beyond Your Needs: Window\'s Complete Advertising Solutions';
        $enMetaTitle       = 'Our Services Extend Beyond Your Needs: Window\'s Complete Advertising Solutions | Window Advertising Agency';
        $enMetaDescription = 'Discover the full range of Window Advertising Agency\'s services — from exhibition design and acrylic signs to luxury gift boxes, restaurant packaging, thermal printing, and directional signage. One agency for every advertising need in Saudi Arabia.';
        $enKeywords        = 'advertising agency services Saudi Arabia,exhibition design,acrylic signs,luxury corporate gifts,restaurant packaging,thermal printing,UV printing,pylon signs,directional signage,car branding,vehicle wraps,Window Advertising Agency';

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
<p>Most businesses know <strong>Window Advertising Agency</strong> for exhibitions, booths, and car stickers. But that barely scratches the surface. With over 25 years of experience in the Saudi advertising market, Window has built a comprehensive service catalog that covers every physical and visual advertising need a business could ever have — from towering mega boards and precision-crafted stainless steel signs to luxury branded chocolate boxes and custom restaurant packaging. This is not a collection of unrelated services bolted together. It is a unified advertising ecosystem where every product, every material, and every design follows your brand identity with absolute consistency. In this guide, we reveal the full scope of what Window delivers — and why having one trusted agency handle everything is the smartest advertising decision you will ever make.</p>
</blockquote>

<h2>Beyond Exhibitions: Why Most Clients Underestimate Window's Capabilities</h2>

<p>When businesses first approach Window Advertising Agency, they usually come with a specific request — an exhibition booth for a trade show, a set of car stickers for their fleet, or a banner for an event. They see Window as a specialist in that one area. What they discover after the first project changes everything.</p>

<p>Window is not a single-service provider. It is a full-spectrum advertising production house that handles the entire lifecycle of physical brand communication. The same team that designs your exhibition booth can produce your corporate gift boxes, print your restaurant packaging, manufacture your storefront signage, and install your directional pylon signs — all while maintaining the exact same brand colors, fonts, and visual language across every single item.</p>

<p>This breadth of capability is not accidental. Over 25 years, Window identified a persistent problem in the Saudi market: businesses were forced to split their advertising production across five, six, sometimes ten different vendors. One vendor for signs, another for printing, a third for gifts, a fourth for packaging, a fifth for exhibitions. The result was predictable — inconsistent brand application, coordination headaches, missed deadlines, and escalating costs from managing multiple relationships.</p>

<blockquote>
<p><strong>the one-agency advantage:</strong> Businesses that consolidate their advertising production with a single full-service agency report up to 40% reduction in coordination time, significantly fewer brand inconsistencies, and lower total costs compared to managing multiple specialist vendors — even when individual vendor prices appear cheaper on paper.</p>
</blockquote>

<p>Window solved this by building every capability in-house or through tightly integrated production partnerships. The result is a one-stop advertising solution where quality, consistency, and timelines are controlled from a single point — your dedicated Window team.</p>

<h2>Exhibition Design and Signage: The Visual Backbone of Your Brand</h2>

<p>Exhibitions and signage remain the most visible expression of a brand in the physical world. A poorly designed exhibition booth or a cheap-looking storefront sign can undo months of digital marketing investment in a single glance. Window approaches exhibition design and signage as brand architecture — every element is engineered to communicate professionalism, quality, and trust.</p>

<h3>Exhibition and Booth Design</h3>

<p>Window designs and builds exhibition booths that command attention in the most competitive trade show environments in Saudi Arabia and the Gulf. From compact shell-scheme booths to sprawling custom-built island exhibits, every booth is designed to maximize visitor engagement, brand visibility, and lead generation. The design process integrates your brand identity from the first sketch, ensuring the booth feels like a natural extension of your entire brand ecosystem.</p>

<h3>Signage Solutions</h3>

<p>Window manufactures a complete range of commercial signage solutions, each crafted to match your brand specifications with precision:</p>

<ul>
<li><strong>Acrylic letter signs:</strong> Clean, modern, and versatile — ideal for indoor reception areas, office lobbies, and retail storefronts. Available in cut-to-shape, back-lit, and front-lit configurations.</li>
<li><strong>Zinc letter signs:</strong> Durable and weather-resistant for outdoor applications. Perfect for building facades, warehouse signage, and industrial branding that must withstand Saudi Arabia's harsh climate.</li>
<li><strong>Stainless steel signs:</strong> The premium choice for luxury brands, hotels, restaurants, and corporate headquarters. Stainless steel delivers an unmistakable quality impression that elevates brand perception instantly.</li>
<li><strong>Mega boards:</strong> Large-format outdoor advertising boards for maximum visibility on highways, commercial streets, and building exteriors. Window handles design, production, and installation of mega boards across Saudi Arabia.</li>
<li><strong>Canvas prints:</strong> High-resolution printed canvases for interior branding, event backdrops, office decoration, and retail displays. Available in custom sizes with museum-quality finishing.</li>
</ul>

<blockquote>
<p><strong>quality standard:</strong> Every sign Window produces undergoes a brand compliance check before manufacturing. Colors are matched to your exact brand specifications using professional color management systems. Fonts are verified against your brand guidelines. The result is signage that looks identical to your digital presence — creating seamless brand recognition across physical and digital touchpoints.</p>
</blockquote>

<h2>Luxury Corporate Gifts: Making Every Impression Unforgettable</h2>

<p>Corporate gifts are one of the most underutilized branding opportunities in the Saudi business landscape. Most companies treat gifts as an afterthought — ordering generic items with a hastily printed logo. Window transforms corporate gifting into a strategic brand experience that recipients remember, display, and talk about.</p>

<p>Window's luxury gift catalog is designed for businesses that understand the power of tangible brand impressions. Every item is customizable to your brand identity, ensuring that your corporate colors, logo, and visual language are applied with the same precision as your most important advertising campaigns.</p>

<ul>
<li><strong>Custom gift boxes:</strong> Premium packaging designed as a brand experience in itself — from the box structure and material to the interior layout and finishing touches. Available in rigid, magnetic closure, and sliding drawer formats.</li>
<li><strong>Branded pens:</strong> High-quality writing instruments with laser-engraved or printed branding. Available in metal, wood, and premium composite materials suitable for executive gifting.</li>
<li><strong>2025 calendars and agendas:</strong> Desk and wall calendars plus leather-bound agendas customized with your brand identity. These items sit on clients' desks for an entire year — 365 days of continuous brand exposure.</li>
<li><strong>Branded chocolate boxes:</strong> Luxury chocolate presentations with custom-designed packaging that reflects your brand. Perfect for Ramadan gifts, Eid celebrations, client appreciation, and VIP events.</li>
<li><strong>Premium business cards:</strong> Beyond standard printing — foil-stamped, embossed, die-cut, and specialty paper business cards that make a physical statement about your brand's quality standards.</li>
</ul>

<blockquote>
<p><strong>gift impact:</strong> Research shows that 79% of recipients can recall the brand on a promotional product they received in the past two years. Luxury corporate gifts with high-quality branding create significantly stronger brand recall than digital advertisements, making them one of the highest-ROI branding investments available.</p>
</blockquote>

<p>Window handles the entire gift production process — concept design, material selection, branding application, quality control, packaging, and delivery. Whether you need 50 VIP gift sets or 5,000 employee appreciation items, every piece leaves Window's facility with brand-perfect execution.</p>

<h2>Restaurant and Cafe Packaging: Brand Every Bite</h2>

<p>For restaurants, cafes, and food businesses, packaging is not just functional — it is the single most frequent physical touchpoint between your brand and your customers. Every burger box, every pizza carton, every paper bag is a branding opportunity that most food businesses waste by using generic, unbranded packaging from wholesale suppliers.</p>

<p>Window provides complete packaging solutions designed specifically for the food and beverage industry. Every item is custom-designed to integrate your brand identity, turning ordinary packaging into a powerful marketing tool that travels with your customers, appears in their social media photos, and reinforces your brand with every meal.</p>

<table>
<tbody>
<tr><td><strong>Burger boxes</strong></td><td>Seen by every dine-in and takeaway customer</td><td>Custom structural design with full-color brand printing, grease-resistant coating, and food-safe materials.</td></tr>
<tr><td><strong>Pizza cartons</strong></td><td>Carried through streets, offices, and homes — mobile advertising</td><td>Bold brand graphics on all surfaces, ventilation engineering, and stackable design for delivery efficiency.</td></tr>
<tr><td><strong>Paper bags</strong></td><td>Walking billboards for your brand in malls, streets, and offices</td><td>Branded paper bags in multiple sizes with reinforced handles, custom colors, and premium paper weight options.</td></tr>
<tr><td><strong>Plastic bags</strong></td><td>High-visibility branded carriers for retail and takeaway</td><td>Custom-printed with brand graphics, available in biodegradable and standard options with multiple handle styles.</td></tr>
<tr><td><strong>Wrapping paper</strong></td><td>Interior presentation branding for deli items, sandwiches, and baked goods</td><td>Food-grade wrapping paper with repeated brand pattern printing, creating an Instagram-worthy unboxing moment.</td></tr>
</tbody>
</table>

<blockquote>
<p><strong>the missed opportunity:</strong> A restaurant serving 200 meals per day with unbranded packaging wastes 73,000 branding impressions per year. Each of those meals could carry your logo, colors, and brand message into homes, offices, and public spaces. Branded packaging costs pennies more per unit but delivers thousands of dollars in equivalent advertising exposure.</p>
</blockquote>

<p>Window's food packaging team works closely with restaurant owners to understand their operational needs — box dimensions, grease resistance, heat tolerance, stacking requirements — while ensuring every piece is a flawless brand ambassador. From concept to bulk delivery, Window handles the entire process.</p>

<h2>Printing Services: From Thermal Receipts to UV-Cured Masterpieces</h2>

<p>Printing remains the backbone of physical advertising, and Window operates one of the most versatile printing capabilities in the Saudi advertising market. Whether you need a thermal-printed receipt roll with your branding, a UV-cured outdoor banner that resists years of sun exposure, or a custom-printed promotional mug, Window has the technology, expertise, and quality control systems to deliver.</p>

<h3>Thermal Printing</h3>

<p>Thermal printing is essential for businesses that issue receipts, labels, tickets, or barcode stickers. Window produces custom thermal rolls with pre-printed branding — your logo, promotional messages, and contact information appear on every receipt or label your business produces. This turns a routine transaction touchpoint into a subtle but persistent brand reinforcement.</p>

<h3>UV Printing</h3>

<p>UV-cured printing delivers exceptional durability and vibrancy for both indoor and outdoor applications. The UV-curing process bonds the ink directly to the substrate using ultraviolet light, creating prints that resist fading, scratching, water, and chemical exposure. Window uses UV printing for rigid substrates including acrylic, glass, metal, wood, forex, and composite panels.</p>

<h3>Custom Mug Printing</h3>

<p>Branded mugs are one of the most effective promotional products — they sit on desks, travel to meetings, and appear in video calls. Window produces custom-printed mugs using sublimation and direct printing technologies, ensuring vibrant, dishwasher-safe branding that does not fade or peel over time. Available in ceramic, stainless steel, and travel mug formats.</p>

<blockquote>
<p><strong>print consistency guarantee:</strong> Window uses professional color management across all printing technologies. Your brand colors on a thermal receipt match your brand colors on a UV-printed sign, which match your brand colors on a sublimation-printed mug. This cross-technology color consistency is virtually impossible to achieve when using separate printing vendors.</p>
</blockquote>

<h2>Directional and Wayfinding Signage: Guiding Customers to Your Door</h2>

<p>Directional signage is the invisible infrastructure of brand experience. When customers can easily find your location, navigate your facility, and identify your departments, they associate that effortless experience with your brand's professionalism. When they struggle with confusing or missing signage, that frustration becomes part of your brand perception — even if your products and services are excellent.</p>

<p>Window designs, manufactures, and installs comprehensive directional signage systems that combine practical wayfinding with consistent brand application:</p>

<ul>
<li><strong>Pylon signs:</strong> Freestanding illuminated signs visible from highways and major roads. Ideal for shopping centers, fuel stations, hotels, hospitals, and commercial complexes that need maximum visibility from a distance. Window handles structural engineering, electrical systems, and brand-consistent design.</li>
<li><strong>Desk signs:</strong> Reception and counter signage that identifies departments, services, and personnel. Available in acrylic, metal, and wood finishes with interchangeable name plates for flexibility.</li>
<li><strong>Acrylic stands:</strong> Freestanding and wall-mounted acrylic displays for menus, directories, regulatory notices, and promotional information. Crystal-clear presentation with professional edge polishing and brand-color accents.</li>
<li><strong>Forex stands:</strong> Lightweight yet rigid PVC foam board displays for indoor wayfinding, event signage, point-of-sale displays, and temporary promotional installations. Full-color printing with durable surface lamination.</li>
</ul>

<blockquote>
<p><strong>navigation impact:</strong> Studies in retail environments show that effective wayfinding signage increases customer dwell time by up to 16% and reduces staff inquiries about directions by over 30%. Professional directional signage does not just guide — it improves the entire customer experience and frees your team to focus on service rather than giving directions.</p>
</blockquote>

<h2>The Complete Window Service Catalog: Every Advertising Need Under One Roof</h2>

<p>The following table provides a comprehensive overview of Window Advertising Agency's service categories and specific offerings. This is the full scope of what a single, integrated agency relationship with Window delivers — eliminating the need for multiple vendors, reducing brand inconsistency risks, and streamlining your entire advertising production process.</p>

<table>
<tbody>
<tr><td><strong>Exhibition Design</strong></td><td>Custom booths, shell-scheme design, island exhibits, event activations, pop-up displays</td><td>Trade shows, conferences, product launches, brand activations</td></tr>
<tr><td><strong>Letter Signs</strong></td><td>Acrylic letters, zinc letters, stainless steel signs, channel letters, illuminated letters</td><td>Storefronts, offices, malls, hotels, corporate headquarters</td></tr>
<tr><td><strong>Large Format</strong></td><td>Mega boards, canvas prints, building wraps, billboard design and production</td><td>Outdoor advertising, highway visibility, building branding</td></tr>
<tr><td><strong>Vehicle Branding</strong></td><td>Full wraps, partial wraps, car stickers, fleet branding, custom graphics</td><td>Delivery fleets, corporate vehicles, promotional campaigns</td></tr>
<tr><td><strong>Luxury Gifts</strong></td><td>Gift boxes, branded pens, calendars, agendas, chocolate boxes, business cards</td><td>Client appreciation, Ramadan/Eid, employee rewards, VIP events</td></tr>
<tr><td><strong>Food Packaging</strong></td><td>Burger boxes, pizza cartons, paper bags, plastic bags, wrapping paper</td><td>Restaurants, cafes, bakeries, cloud kitchens, food delivery</td></tr>
<tr><td><strong>Printing Services</strong></td><td>Thermal printing, UV printing, digital printing, mug printing, sublimation</td><td>Receipts, labels, outdoor signs, promotional products</td></tr>
<tr><td><strong>Directional Signage</strong></td><td>Pylon signs, desk signs, acrylic stands, forex stands, wayfinding systems</td><td>Malls, hospitals, offices, hotels, commercial complexes</td></tr>
</tbody>
</table>

<blockquote>
<p><strong>one brand file, infinite applications:</strong> When Window manages your advertising production, every item in this catalog is produced from a single, centralized brand file. Your colors on a pylon sign match your colors on a chocolate box, which match your colors on a vehicle wrap. This level of cross-medium consistency is what separates amateur advertising from professional brand building.</p>
</blockquote>

<h2>Why One Agency Beats Ten Vendors: The Strategic Advantage</h2>

<p>The temptation to split advertising production across multiple specialist vendors is understandable. A signage specialist might seem better for signs. A packaging specialist might seem better for boxes. A gift company might seem better for corporate gifts. On paper, each specialist appears to offer deeper expertise in their niche.</p>

<p>In practice, the multi-vendor approach creates a chain of problems that silently erodes your brand and inflates your total costs:</p>

<ul>
<li><strong>Brand inconsistency:</strong> Each vendor interprets your brand guidelines differently. Colors shift slightly between vendors. Font choices vary. Layout approaches differ. Over time, your brand fragments into multiple visual dialects that confuse your market.</li>
<li><strong>Coordination overhead:</strong> Managing five separate vendor relationships means five sets of communications, five invoice cycles, five quality control checkpoints, and five different production timelines to synchronize. The management burden alone can consume hours of staff time per week.</li>
<li><strong>Knowledge silos:</strong> Each vendor only sees their piece of your brand. The signage vendor does not know what the packaging vendor produced. The gift company has never seen your exhibition booth. No single vendor has the complete picture of your brand's physical presence.</li>
<li><strong>Pricing inefficiency:</strong> While individual vendor prices may appear competitive, the total cost of managing, coordinating, and correcting work across multiple vendors typically exceeds the cost of a single integrated agency — before even counting the cost of brand inconsistencies.</li>
<li><strong>Accountability gaps:</strong> When something goes wrong — a color mismatch between your sign and your packaging — who is responsible? Each vendor blames the other. With one agency, accountability is absolute and resolution is immediate.</li>
</ul>

<blockquote>
<p><strong>the hidden math:</strong> A business using 5 separate vendors for signage, printing, gifts, packaging, and exhibitions spends an average of 8–12 hours per month on vendor coordination alone. At a manager's hourly cost, that is SAR 3,000 to SAR 5,000 per month in hidden management costs — money that could be invested in actual advertising production instead of administrative overhead.</p>
</blockquote>

<h2>Window as Your One-Stop Advertising Partner: 25+ Years of Proven Results</h2>

<p>Window Advertising Agency did not become a full-service advertising production house overnight. Over 25 years of serving businesses across Riyadh, Jeddah, and the entire Kingdom of Saudi Arabia, Window expanded its capabilities in direct response to what clients needed. Every new service was added because clients asked for it — and because Window refused to let them suffer the quality and consistency problems that come with using outside vendors.</p>

<p>Today, Window operates as a true one-stop advertising solution with the infrastructure, equipment, and expertise to handle every service category under one roof. The advantages for clients are transformative:</p>

<ul>
<li><strong>Single point of contact:</strong> One account manager who understands your entire brand, coordinates all projects, and ensures consistency across every deliverable.</li>
<li><strong>Centralized brand management:</strong> Your brand guidelines are stored, maintained, and enforced from a single system — eliminating the brand drift that occurs when files are shared across multiple vendors.</li>
<li><strong>Integrated production scheduling:</strong> When you need an exhibition booth, matching business cards, branded gifts for attendees, and a pylon sign for the venue — all coordinated to a single deadline — Window delivers as one synchronized operation.</li>
<li><strong>Volume efficiency:</strong> Consolidating your advertising production with one agency creates volume relationships that reduce per-unit costs across all service categories.</li>
<li><strong>Quality consistency:</strong> Every item passes through the same quality control process, ensuring that a branded pen meets the same standard as a mega board — because both carry your brand name.</li>
</ul>

<blockquote>
<p><strong>25+ years of trust:</strong> Hundreds of businesses across Saudi Arabia rely on Window as their sole advertising production partner. From startups building their first brand presence to established corporations maintaining nationwide consistency, Window delivers the breadth, quality, and reliability that makes the one-agency model work — project after project, year after year.</p>
</blockquote>

<h2>Ready to Explore Window's Full Service Catalog?</h2>

<p>If you have been thinking of Window Advertising Agency as "the exhibition company" or "the signage company," this guide has shown you the complete picture. Window is every advertising service your business needs — designed, produced, and delivered with the brand consistency that only a unified agency can guarantee.</p>

<p>Stop splitting your brand across multiple vendors. Stop accepting inconsistency as inevitable. Stop paying hidden coordination costs that eat into your advertising budget. Choose the agency that does it all — and does it all with 25+ years of precision, quality, and brand consistency that your business deserves.</p>

<p><a href="https://windowadv.com/en/contacts">Explore All Our Services</a></p>

<h2>Frequently Asked Questions About Window's Services</h2>

<h3>What services does Window Advertising Agency offer beyond exhibitions?</h3>

<p>Window Advertising Agency offers a comprehensive range of services including exhibition and booth design, acrylic and zinc letter signs, stainless steel signage, mega boards, canvas prints, luxury corporate gifts, restaurant and cafe packaging, thermal and UV printing, custom mug printing, and directional signage such as pylon signs, desk signs, and acrylic stands. Window is a true one-stop advertising production partner.</p>

<h3>Does Window Advertising Agency provide luxury corporate gift services?</h3>

<p>Yes. Window offers a full luxury gift catalog including custom gift boxes, branded pens, 2025 calendars and agendas, branded chocolate boxes, premium business cards, and bespoke corporate gift sets designed to reflect your brand identity and leave a lasting impression on clients and partners.</p>

<h3>Can Window handle restaurant and cafe packaging needs?</h3>

<p>Absolutely. Window provides complete packaging solutions for restaurants and cafes including branded burger boxes, pizza cartons, paper bags, plastic bags, wrapping paper, napkins, and custom food containers — all designed to match your brand identity and enhance the customer dining experience.</p>

<h3>What types of signage does Window Advertising Agency produce?</h3>

<p>Window produces all types of commercial signage including acrylic letter signs, zinc letter signs, stainless steel signs, mega boards, pylon signs, desk signs, acrylic stands, forex stands, directional signage, and illuminated signs. Every sign is manufactured to professional standards with consistent brand application.</p>

<h3>What printing technologies does Window Advertising Agency use?</h3>

<p>Window utilizes multiple printing technologies including thermal printing for receipts and labels, UV printing for durable outdoor and indoor applications, digital printing for short-run marketing materials, large-format printing for banners and billboards, and custom mug printing for promotional merchandise.</p>

<h3>Why should I use one agency for all my advertising needs instead of multiple vendors?</h3>

<p>Using one agency ensures visual consistency across every touchpoint — from signage to packaging to corporate gifts. It eliminates the coordination overhead of managing multiple vendors, reduces errors from miscommunication, maintains brand guidelines automatically, and often costs less than splitting work across separate specialists who each need onboarding.</p>

<h3>Does Window Advertising Agency handle car branding and vehicle wraps?</h3>

<p>Yes. Window provides professional car branding and vehicle wrap services including full vehicle wraps, partial wraps, car stickers, fleet branding, and custom vehicle graphics. Every vehicle wrap is designed to maximize brand visibility on the road while maintaining brand consistency with all other marketing materials.</p>

<h3>How does Window ensure brand consistency across all these different services?</h3>

<p>Window maintains a centralized brand file for each client containing approved colors, fonts, logos, and design guidelines. Every project — whether a mega board, a chocolate box, or a pylon sign — is executed from this single source of truth. This integrated approach, backed by 25+ years of experience, ensures your brand looks identical across every medium and material.</p>
HTML;
    }

    public function down(): void
    {
        $slug    = 'window-services-beyond-your-needs';
        $oldSlug = 'khdmatna-tmtd-al-ma-ho-abaad-mn-ahtyagk';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('slug', $oldSlug)->first();
        }
        if (!$blog) {
            $blog = DB::table('blogs')->where('id', 17)->first();
        }
        if (!$blog) {
            return;
        }

        DB::table('blog_translations')
            ->where('blog_id', $blog->id)
            ->where('locale', 'en')
            ->delete();
    }
};
