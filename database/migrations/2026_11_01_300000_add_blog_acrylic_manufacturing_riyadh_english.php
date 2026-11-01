<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'acrylic-manufacturing-riyadh';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Acrylic Manufacturing in Riyadh: A Complete Guide to Stands, Signs, Laser Cutting & UV Printing';
        $enMetaTitle       = 'Acrylic Manufacturing in Riyadh | Stands, Signs, Laser Cutting & UV Printing';
        $enMetaDescription = 'Complete guide to custom acrylic manufacturing in Riyadh: acrylic vs PVC, sheet types and sizes, stands, signs, boxes and awards, and the main factors behind pricing.';
        $enKeywords        = 'acrylic manufacturing Riyadh,acrylic stands,acrylic signs,laser cutting acrylic,UV printing acrylic,acrylic vs PVC,acrylic boxes,custom acrylic,acrylic awards,acrylic logos,acrylic manufacturing Saudi Arabia';

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
<p>Looking for a company that manufactures custom acrylic products in Riyadh? Whether you need a display stand, a sign carrying your logo, a clear box, raised letters, or a custom piece, acrylic executes a wide range of ideas combining an elegant look with manufacturing precision.</p>

<p>In advertising, materials are no longer limited to traditional signs and printed pieces; cuttable, formable, printable materials are now central to promotional product design and display solutions in shops, offices, exhibitions, and events. That's where custom acrylic manufacturing comes in — turning an idea or visual identity into an actual product with sizes, colors, and finishes suited to the client's needs.</p>

<p>At Window Advertising Agency, we apply acrylic across advertising and manufacturing solutions — from stands and holders to signs, logos, display boxes, and custom pieces — depending on each project's requirements.</p>

<h2>1. What Is Acrylic?</h2>

<p>Acrylic, technically known as Polymethyl Methacrylate (PMMA), is an engineering plastic known for its ability to be produced with a high degree of transparency, alongside availability in multiple colors and finishes. Its key properties include high transparency, a range of colors and finishes (clear, colored, white, black, frosted, mirror), precise laser-cutting capability, heat-forming potential, print and engraving compatibility, and a professional look suited to display inside companies, offices, and stores.</p>

<p><strong>Why this matters:</strong> Scratch, impact, and heat resistance vary by acrylic type, thickness, and how it's used — choose the right spec for the actual purpose rather than assuming all acrylic sheets perform the same.</p>

<h2>2. Why Has Acrylic Become Important in Advertising?</h2>

<p>Acrylic offers solutions beyond the traditional sign — it can manufacture a complete product that serves a practical function while presenting the brand professionally:</p>

<ul>
<li><strong>Turning a design into a product:</strong> preparing a custom design, then cutting and assembling parts into a stand, holder, box, or sign.</li>
<li><strong>Highlighting brand identity:</strong> adding the logo, name, or colors through printing, engraving, or layering.</li>
<li><strong>Organizing product displays:</strong> stands and holders that arrange products, cards, and printed material in shops and exhibitions.</li>
<li><strong>Custom solutions:</strong> designing to specific dimensions and use, instead of settling for an off-the-shelf size.</li>
</ul>

<h2>3. What's the Difference Between Acrylic and PVC?</h2>

<p>Acrylic and PVC are not the same material.</p>

<table>
<thead>
<tr><th>Comparison</th><th>Acrylic (PMMA)</th><th>PVC</th></tr>
</thead>
<tbody>
<tr><td>Transparency</td><td>High-quality clear</td><td>Usually opaque</td></tr>
<tr><td>Look</td><td>Clear, colored, varied finishes</td><td>Varies by sheet type</td></tr>
<tr><td>Common use</td><td>Stands, display boxes, signs</td><td>Signs and setups</td></tr>
<tr><td>Forming</td><td>Laser-cut, heat-formable</td><td>Varies by formulation</td></tr>
</tbody>
</table>

<p><strong>Which fits your project?</strong> If your goal is a clear box or a holder that displays the product visibly, acrylic is a good fit. If you need an opaque sign or a piece made from foam PVC, PVC may suit better. The right call depends on actual use, not the material's name alone.</p>

<h2>4. Types and Finishes of Acrylic</h2>

<p>Acrylic sheets vary by manufacturing method and appearance: <strong>clear</strong> for display boxes and holders; <strong>white and black</strong> for signs and bases needing a solid color; <strong>colored</strong> for products matching brand identity; <strong>frosted</strong> for a non-glossy look; <strong>mirror</strong> for decorative pieces needing a reflective surface; and <strong>cast or extruded</strong> for applications with specific cutting and finishing needs. The choice depends on cutting, printing, and thickness requirements — not one type being universally "best."</p>

<h2>5. Acrylic Sheet Sizes and Thicknesses</h2>

<p>A common market size is roughly 122×244 cm, though availability should be confirmed before finalizing the design. Common thicknesses include 2, 3, 5, 6, 8, and 10 mm, with thicker sheets available depending on supply. Thickness shouldn't be chosen by size alone — consider the product's weight, mounting method, and whether it needs bending or repeated use.</p>

<h2>6. Acrylic Stands & Display Holders</h2>

<p><a href="https://windowadv.com/en/services/display-stands">Display stands</a> are among the most prominent uses of acrylic in advertising, helping organize products and information while allowing custom sizes, shapes, and logo placement. Examples include product display stands, brochure holders, business card holders, menu holders, QR code stands, and multi-tier stands.</p>

<h2>7. Acrylic Signs, Logos & Letters</h2>

<p>Acrylic suits signs, logos, and raised letters for offices, companies, and stores — company name signs, reception signs, directional signage, and multi-layer logos. Signs can be clear or colored, with printing or engraving, and lighting added where the design calls for it.</p>

<p><strong>From our work:</strong> if your project centers on a storefront or company name letters, see our full guide on <a href="https://windowadv.com/en/blogs/raised-letters-riyadh">raised letters in Riyadh</a>, which weighs acrylic against stainless steel, aluminum, and brass. You can also check our <a href="https://windowadv.com/en/services/embossed-letters">embossed letters & illuminated letter signs</a> service directly.</p>

<h2>8. Acrylic Boxes & Display Cases</h2>

<p>Custom-sized display boxes and cases offer clear practical value when the goal is visible content with organized pieces: product display boxes, memorabilia cases, suggestion/donation boxes, and custom gift boxes. Define whether the box is for display only or for repeated use, since that affects thickness and design.</p>

<h2>9. Awards, Gifts & Memorabilia</h2>

<p>Acrylic suits recognition pieces and gifts needing a distinctive design and customized names, logos, and dates — recognition awards, conference memorabilia, and company models. Result quality depends on design consistency, cutting precision, and print or engraving quality.</p>

<h2>10. How Is Acrylic Manufactured? Key Techniques</h2>

<p>Professional acrylic manufacturing moves through sequential technical stages:</p>

<ol>
<li><strong>Design & technical drawing:</strong> defining dimensions, function, and final shape, then preparing the cutting or printing file.</li>
<li><strong>Laser cutting:</strong> executing letters, logos, and stand parts with high precision.</li>
<li><strong>Heat bending & forming:</strong> shaping holders and boxes with angles and curves.</li>
<li><strong>Laser engraving:</strong> adding names, logos, or numbers onto suitable surfaces.</li>
<li><strong>UV printing:</strong> printing colored logos and text directly onto surfaces — clear acrylic may need a white ink layer underneath.</li>
<li><strong>Bonding, assembly & edge finishing:</strong> completing the product with a consistent, stable look.</li>
</ol>

<p>Multiple techniques can be combined in one product — for example, a laser-cut stand with a UV-printed logo, or an award combining cutting, engraving, and printing.</p>

<h2>11. Choosing the Right Acrylic for Your Project</h2>

<p>Material choice isn't just about color or thickness — consider function, use location, dimensions, required transparency and color, design details, and quantity needed.</p>

<p><strong>Pricing factors:</strong> there's no fixed price for all acrylic products; cost depends on material type, thickness and size, design complexity, cutting/printing/finishing, and quantity. For an accurate quote, send a reference image or draft design with dimensions and quantity.</p>

<h2>12. Acrylic Is a Practical Alternative — Not a Replacement for Everything</h2>

<p>Acrylic enables transparent or colored products with cutting, forming, printing, and engraving capability, and can suit as an alternative to glass or some wood and metal products. But that doesn't mean it replaces these materials in every situation — another material may suit better when a project needs high heat or load resistance. Acrylic is also a plastic, so not every acrylic product is automatically eco-friendly.</p>

<h2>13. Why You Need an Advertising Agency, Not Just a Plastics Shop</h2>

<p>When a product is tied to a brand identity, a campaign, or an exhibition setup, it's not just about manufacturing a piece of plastic — it requires understanding the final use, logo placement, and coordination with other promotional materials. This is where a specialized agency matters, one that studies the product within its marketing context.</p>

<p>At Window Advertising Agency, we apply acrylic and manufacturing techniques to advertising solutions for companies, stores, and exhibitions — from design through cutting, printing, and finishing.</p>

<h3>Related Articles</h3>
<ul>
<li><a href="https://windowadv.com/en/blogs/raised-letters-riyadh">Raised Letters in Riyadh | A Guide to Materials, Lighting & Installation</a></li>
<li><a href="https://windowadv.com/en/blogs/advertising-display-stands-riyadh">Best Advertising Display Stands in Riyadh & Saudi Arabia</a></li>
<li><a href="https://windowadv.com/en/blogs/best-promotional-cubes-riyadh">Best Promotional Cubes in Riyadh & Saudi Arabia</a></li>
</ul>

<h2>Need a custom acrylic product manufactured?</h2>

<p>Window Advertising Agency — 25+ years of design, manufacturing, and execution experience in Riyadh and Saudi Arabia.</p>

<p><strong><a href="https://windowadv.com/en/contact">Contact us for a quote</a></strong></p>

<h2>Frequently Asked Questions About Acrylic Manufacturing</h2>

<h3>What's the difference between acrylic and PVC?</h3>
<p>Acrylic (PMMA) and PVC are different materials. Clear acrylic is known for its clarity, while PVC sheets vary between solid and foam types, each with suitable uses depending on the product's function.</p>

<h3>Can a custom acrylic stand be manufactured to order?</h3>
<p>Yes — a stand can be designed to the size and display function needed, with the logo added by printing or engraving and thickness chosen based on size and use.</p>

<h3>What thickness is right for an acrylic display box?</h3>
<p>It depends on the box's dimensions, the weight it carries, and how often it's used; smaller boxes need less thickness than large or repeatedly-used display boxes.</p>

<h3>Can a logo be printed on clear acrylic?</h3>
<p>Yes, through direct UV printing — some designs need a white ink layer underneath the colors for the logo to read clearly against the transparent background.</p>

<h3>What factors determine the price of an acrylic product?</h3>
<p>Price is affected by material type, thickness and size, design complexity, cutting or printing method, and quantity needed, plus packaging and delivery if included.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'acrylic-manufacturing-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
