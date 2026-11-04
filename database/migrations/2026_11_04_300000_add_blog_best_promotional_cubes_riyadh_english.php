<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'best-promotional-cubes-riyadh';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Best Promotional Cubes in Riyadh & Saudi Arabia | Advertising Cubes & Branded Boxes';
        $enMetaTitle       = 'Best Promotional Cubes in Riyadh | Types, Sizes & Printing';
        $enMetaDescription = 'Discover the best promotional cubes in Riyadh and Saudi Arabia. Forex, wood, and acrylic cubes, logo printing, custom sizes, and advertising arrangements for companies, exhibitions, and events.';
        $enKeywords        = 'promotional cubes Riyadh,best promotional cubes,printed advertising cubes,promotional cube manufacturing Riyadh,promotional cube printing,logo cube,forex promotional cubes,exhibition promotional cubes,illuminated promotional cubes,branded boxes,product display cubes';

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
<p>Companies, institutions, and government entities are always looking for creative advertising tools that highlight their brand and catch visitors' attention. Promotional cubes in Riyadh and Saudi Arabia are one of the advertising and decorative solutions that can be customized with a company's logo, colors, and marketing message, fitting exhibitions, conferences, events, official occasions, and promotional corners alike.</p>

<p>Whether you're after a single logo cube, printed advertising cubes, or custom-branded boxes, you can choose the sizes, materials, and layout that fit your project. This guide covers the types, materials, sizes, printing methods, and uses of promotional cubes, how to pick the right one for your company, and what actually drives manufacturing cost.</p>

<h2>1. What Is a Promotional Cube?</h2>

<p>A promotional cube is an advertising and decorative unit made up of six faces, manufactured from a suitable material and customized with a company logo, brand name, or advertising design printed on one or more faces. It's also known as an advertising cube, printed cube, or branded/logo cube, and can be used as a standalone unit or arranged with others, stacked vertically or placed side by side.</p>

<p>Clients often mix up a "promotional cube" with a "promotional box": a cube is a unit with six equal faces in a true geometric cube shape, while a "box" is a looser term for a printed advertising container that may be cube-shaped or rectangular depending on the design. When requesting a quote, it's best to specify the size, material, and number of faces to be printed, since the product name alone doesn't define the technical spec.</p>

<h2>2. Best Materials for Promotional Cubes</h2>

<p>Material choice depends on where the cube will be used, its size, how long it will be displayed, and budget — a cube for a one-off event doesn't need the same material as a unit used repeatedly.</p>

<table>
<thead>
<tr><th>Material</th><th>Key strengths</th><th>Best for</th></tr>
</thead>
<tbody>
<tr><td>Forex (PVC Foam Board)</td><td>Multiple sizes, lightweight, direct print or sticker</td><td>Temporary exhibitions and events</td></tr>
<tr><td>Wood / MDF</td><td>Sturdy frame suited to repeated use</td><td>Permanent corners and company entrances</td></tr>
<tr><td>Foam</td><td>Very lightweight, lower cost</td><td>Short-term, temporary decor</td></tr>
<tr><td>Acrylic</td><td>Elegant look, clear or colored</td><td>Product displays and modern promotional corners</td></tr>
<tr><td>Illuminated cubes</td><td>Internal LED lighting highlights the logo</td><td>Photography areas, exhibitions, evening reception zones</td></tr>
</tbody>
</table>

<p><strong>Why this matters:</strong> No single material wins in every case. Cubes that will be stacked need different thickness and reinforcement than a single standalone unit — decide this before manufacturing, not after.</p>

<p>Forex and wooden cubes differ in material, weight, fabrication method, and finish: Forex is lighter and faster to produce, suiting temporary events, while wood or MDF suits fixed units meant for repeated use at a company entrance or reception area. The right choice depends on size, expected use, and how it will be transported and stored.</p>

<h2>3. Custom Promotional Cube Sizes</h2>

<p>Promotional cubes are manufactured in various sizes to fit an exhibition, event, or promotional corner, with common examples including 30×30, 40×40, 50×50, 60×60, 80×80 cm, and even 1×1 meter for large cubes. A 50×50 cm cube often works as a standalone unit or within a group of branded cubes, while 60×60 cm suits promotional corners needing a larger display area. Larger, meter-sized cubes require careful study of material, assembly, and transport before manufacturing is approved.</p>

<p>Several cubes can also be arranged together — a single cube, two stacked, three stacked vertically, or a group in graduated sizes and colors — to form a complete advertising display, as long as stability and assembly method are considered at the design stage.</p>

<h2>4. Printing Promotional Cubes</h2>

<p>Printing method varies by material and desired result:</p>

<ul>
<li><strong>Printed vinyl sticker:</strong> the design is printed on a suitable sticker then mounted onto the cube's faces, allowing each face to carry a different design.</li>
<li><strong>UV printing:</strong> used on compatible materials depending on size and surface type; suitability is confirmed after reviewing the material and design.</li>
</ul>

<p>The logo can be printed on one face, several faces, or all six, depending on the client's preference — always review print files and dimensions beforehand to confirm logo and color clarity.</p>

<h3>Making Cube Design More Professional</h3>

<p>For professionally printed advertising cubes, use a clear, high-quality logo, stick to brand colors, and distribute elements across the faces in a balanced way without crowding small details. It also helps to define exactly which faces will be printed, double-check dimensions before preparing print files, and coordinate the cubes' design with the surrounding backdrop and stands so the result reads as one cohesive advertising display rather than scattered units.</p>

<h2>5. Uses of Promotional Cubes</h2>

<ul>
<li><strong>Companies and institutions:</strong> entrances, reception areas, and marketing campaigns.</li>
<li><strong>Government entities:</strong> official events, exhibitions, and conferences, per the organizing body's specs.</li>
<li><strong>Real estate projects:</strong> sales office corners and property development exhibitions.</li>
<li><strong>Exhibitions and conferences:</strong> arranged alongside <a href="https://windowadv.com/en/services/display-stands">promotional display stands</a>, backdrops, photo areas, and reception counters.</li>
<li><strong>Events and celebrations:</strong> at entrances or next to photo backdrops.</li>
<li><strong>Retail and points of sale:</strong> organizing products and samples — if a cube will carry actual product weight, define the load and structure before manufacturing.</li>
<li><strong>Product launches and seasonal campaigns:</strong> matching colors and logos across cubes present the campaign cohesively across the exhibition or point of sale.</li>
</ul>

<p><strong>Full booth setups:</strong> many clients order promotional cubes as part of a complete exhibition booth build — see our guide on <a href="https://windowadv.com/en/blogs/exhibition-booth-manufacturing-saudi-arabia-window">designing and manufacturing exhibition booths in Riyadh</a> if your project needs a full booth, not just cubes.</p>

<h2>6. How to Choose the Best Promotional Cubes in Riyadh</h2>

<p>When requesting a quote, define: the cube's purpose (decor, product display, or logo visibility), the size of each cube and number of units, the right material, how many faces need printing, whether lighting is needed, whether cubes will be stacked, and the usage location and delivery date.</p>

<p><strong>Pricing factors:</strong> there's no fixed price for all promotional cubes — cost depends on size, material and thickness, number of cubes and printed faces, printing or sticker type, internal lighting, and delivery/installation if included in scope. For an accurate quote, it's best to send dimensions, quantity, and preferred material along with the delivery date.</p>

<p>At Window Advertising Agency, we offer <a href="https://windowadv.com/en/services/promotional-cubes">promotional and advertising cubes</a> in multiple materials and custom sizes, which can be combined into a complete advertising project alongside <a href="https://windowadv.com/en/blogs/advertising-display-stands-riyadh">promotional display stands</a>, signage, and promotional gifts based on the client's needs.</p>

<h3>Related Articles</h3>
<ul>
<li><a href="https://windowadv.com/en/blogs/advertising-display-stands-riyadh">Best Advertising Display Stands in Riyadh & Saudi Arabia | Roll-Up, Pop-Up & Exhibition Stands</a></li>
<li><a href="https://windowadv.com/en/blogs/exhibition-booth-design-promotional-gifts">Exhibition Booth Design and Promotional Gifts</a></li>
<li><a href="https://windowadv.com/en/blogs/corporate-exhibition-booths-conferences-riyadh">Exhibition Booths for Large Companies, Government Entities and Conferences in Riyadh</a></li>
</ul>

<h2>Looking for promotional cubes in Riyadh?</h2>

<p>Window Advertising Agency — 25+ years of design, manufacturing, and execution experience in Riyadh and Saudi Arabia.</p>

<p><strong><a href="https://windowadv.com/en/contact">Contact us for a quote</a></strong></p>

<h2>Frequently Asked Questions</h2>

<h3>What's the best material for manufacturing promotional cubes?</h3>
<p>It depends on size, purpose, and budget. Forex suits many advertising applications, wood or MDF suits structures needing more durability, foam suits lightweight temporary decor, and acrylic suits designs that call for an elegant look.</p>

<h3>Can a company logo be printed on all six faces?</h3>
<p>Yes — a cube can be designed to carry the logo on one face or several, including all six, as long as the manufacturing and printing method supports it.</p>

<h3>Can three promotional cubes be stacked on top of each other?</h3>
<p>A group of cubes can be designed to stack vertically or sit side by side, including three stacked units, provided stability and frame suitability are confirmed before use.</p>

<h3>Are illuminated promotional cubes available?</h3>
<p>Yes, illuminated designs are possible with the right material and lighting system — clarify the lighting color, power source, and usage location when ordering.</p>

<h3>What information is needed for a quote?</h3>
<p>It's best to provide the number of cubes, each cube's dimensions, preferred material, number of faces to be printed, and the design or logo, plus any lighting, delivery, or installation requirements.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'best-promotional-cubes-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
