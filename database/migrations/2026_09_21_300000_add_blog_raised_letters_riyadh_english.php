<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'raised-letters-riyadh';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Raised Letters | How to Build a Facade That Gets Seen and Remembered';
        $enMetaTitle       = 'Raised Letters in Riyadh | Materials, Lighting & Installation Guide';
        $enMetaDescription = 'A practical guide to raised letters in Riyadh: stainless steel vs acrylic vs aluminum, lighting types, and how to choose, design, and install letters that last.';
        $enKeywords        = 'raised letters,raised letters Riyadh,3D letters signage,illuminated raised letters,stainless steel letters,embossed letters Riyadh,signage manufacturing,storefront signs,Branding,Signage';

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
<div class="intro-box">
<h3>A Flat Sign Gets Read, but a Raised Letter Gets Noticed</h3>
<p>Your facade is the first thing a customer sees of your company, and their impression can be settled in seconds before they walk in. Raised letters, individually cut characters mounted on the wall with real depth, give a name a presence, permanence, and prestige that a printed sign can't. But their quality isn't judged by how they look in a photo; it's judged by material, lighting, design, and installation. This guide walks you through those details so you can choose letters that last, whether for a new storefront, an office entrance, or an entire building.</p>
</div>

<div style="max-width: 360px; margin: 24px auto;">
    <div style="position: relative; padding-bottom: 177.78%; height: 0; border-radius: 12px; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/H3PpB9pC9Hk" title="Window Advertising Agency"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
    </div>
</div>

<h2>First: What Are Raised Letters, and When Are They the Right Choice?</h2>

<p>Raised letters, also called 3D letters, are characters cut and formed one by one, then mounted on a wall or panel so they stand out from the surface, casting shadow and depth. They are used on storefront facades, reception walls, and the entrances of buildings, hotels, clinics, and malls, wherever a name should communicate confidence and continuity.</p>

<p>Sizes and depths vary with the setting, from slim letters for an indoor reception wall to deep, large letters for a building facade, each with its own structural needs. A letter that works at 30 cm high may need extra reinforcement at a meter or more.</p>

<p>They are the best fit when the identity is long-term. For a temporary need, such as a short event, printing or lighter solutions may be more economical, and a good supplier will tell you so plainly.</p>

<p>One detail many people overlook is that Arabic letters aren't like Latin ones. They connect to each other, change shape depending on their position in the word, and carry dots and fine details. When a word is cut into separate pieces, you can end up with thin, fragile joins, dots that sit too far or too close, or uneven stroke thickness. Arabic lettering needs the eye of a designer who understands calligraphy, an expertise that traces back to Window's beginnings in Arabic calligraphy.</p>

<blockquote><p><strong>Why This Matters:</strong> A raised letter is judged from a distance, not up close. That's why success starts with design: stroke thickness, spacing, and letter height, not with the material alone.</p></blockquote>

<h2>Second: Materials: Which Suits Your Project?</h2>

<p><strong>Stainless Steel:</strong> The most popular choice for outdoor facades and high-end properties, available in mirror-polished, brushed, or painted finishes, and it handles outdoor conditions well. Stainless grades differ, so ask which grade is used.</p>

<p><strong>Acrylic:</strong> Lightweight and versatile, available in any color, clear, or mirrored. Ideal for indoor reception walls and retail environments.</p>

<p><strong>Aluminum:</strong> Lightweight, rust-resistant, and suitable for indoors and outdoors, and a favorite for large building signage.</p>

<p><strong>Brass:</strong> A classic premium option for law firms, financial institutions, and hotels, conveying heritage and authority.</p>

<p><strong>PVC Foam:</strong> An economical solution for indoor use and temporary displays where durability isn't the priority.</p>

<p>Also pay attention to what the photo doesn't show: letter depth, plate thickness, weld quality, and the finish on edges and sides. Two letters can look identical from the front while the real difference lies in material thickness and the paint on the sides and back.</p>

<p>In Riyadh, comparing materials isn't only about looks, since intense heat, direct sun, and dust test the paint and finish. Ask about UV-resistant coatings, how the letters are sealed, and how they keep their color after years of exposure.</p>

<blockquote><p><strong>Window Advantage:</strong> Window Agency runs its own factory with integrated production lines in Riyadh, controlling cutting, forming, painting, and LED installation itself, showing you a digital proof for approval before any material is cut, then handling installation without middlemen.</p></blockquote>

<h2>Third: Lighting: How Will Your Letters Look After Sunset?</h2>

<p>Unlit letters are enough in well-lit places, but storefronts, hotels, and shops that need to be seen at night need illuminated letters. The types differ in how the light is distributed:</p>

<table><tbody>
<tr><td><strong>#</strong></td><td><strong>Lighting Type</strong></td><td><strong>How It Works</strong></td><td><strong>Best For</strong></td></tr>
<tr><td>1</td><td>Front-Lit</td><td>LEDs inside the letter face make it clear at night</td><td>Commercial facades and shops</td></tr>
<tr><td>2</td><td>Halo / Back-Lit</td><td>LEDs behind the letter cast a soft glow on the wall</td><td>Luxury brands and hotels</td></tr>
<tr><td>3</td><td>Edge-Lit</td><td>Subtle light from the letter edges</td><td>Modern, minimalist designs</td></tr>
</tbody></table>

<p>Don't stop at asking about the lighting type; ask what's inside it: the LED type and source, the power driver, the water and dust protection rating for outdoor letters, the wiring and insulation, and how easy it is to reach and replace modules. For halo lighting, a proper gap between letter and wall is needed for the glow to look right, and that is decided in design, before manufacturing.</p>

<p>Consider the surroundings too: neighboring shop lights can weaken your letters' visibility, and the wall color behind them strongly affects the halo and contrast. A designer should ideally see the site day and night before approving the lighting.</p>

<p>Finally, ask how pricing is calculated: per letter, per linear meter, or per square meter? Two quotes may look close while the material, thickness, and lighting inside them differ widely.</p>

<h2>Fourth: Design, Installation, and Maintenance</h2>

<p>Good execution starts with design. Decide the distance the letter will be viewed from; a common rule of thumb says every inch (about 2.5 cm) of letter height allows reading from roughly 3 meters, which is only a starting point. Check the contrast between letter color and wall color, and confirm the stroke thickness suits both the material and the lighting. Always ask for a digital visualization on a photo of your facade before cutting.</p>

<p>Then comes installation, which is half the quality. Mounting differs by wall: concrete, aluminum composite panels, glass, and gypsum each have their own method. A good installer uses a template to set spacing and alignment, hides the wiring, and leaves the site clean. For exterior signs, check Amanah or municipal requirements before manufacturing to avoid rework.</p>

<p>Set the start and installation dates clearly, especially if the facade is tied to an opening, since letters arriving after it serve no purpose however good they are. Follow the stages: design approval, cutting, painting and lighting, then installation.</p>

<p>After handover, letters need periodic cleaning with a soft cloth and a non-abrasive cleaner, and occasional lighting checks. Ask about the warranty and how illuminated units are serviced. And remember the right question isn't "how much is a letter?" but "what am I getting for what I'm paying, and how long will it stay in shape?" A good letter works for your brand for years; a cheap one may fade or lose its lighting after a season.</p>

<table><tbody>
<tr><td><strong>#</strong></td><td><strong>Final Evaluation Point</strong></td><td><strong>Why It Matters</strong></td></tr>
<tr><td>1</td><td>Material suited to the place and climate</td><td>Determines lifespan and color stability</td></tr>
<tr><td>2</td><td>Arabic letter design and stroke thickness</td><td>Ensures a clear name and sound manufacturing</td></tr>
<tr><td>3</td><td>Lighting quality and components</td><td>Determines night visibility and maintenance cost</td></tr>
<tr><td>4</td><td>Installation and finishing</td><td>Gives the facade a precise, polished look</td></tr>
<tr><td>5</td><td>Warranty and maintenance</td><td>Defines real long-term value</td></tr>
</tbody></table>

<h2>Related Articles From This Series</h2>

<ul>
<li>Office Privacy: How to Protect Your Workspace Without Losing Light</li>
<li>Illuminated Raised Letters: Choosing Between Front-Lit and Halo Lighting</li>
<li>Stainless Steel or Acrylic? A Signage Materials Comparison Guide</li>
<li>Why Weak Design Can Damage Your Company's Image</li>
<li>How to Evaluate an Advertising Agency Before Signing a Contract</li>
<li>Managing Your Advertising Project From Execution to Delivery</li>
</ul>

<p style="text-align:center;"><strong>Looking for Raised Letters That Present Your Brand at Its Best in Riyadh?</strong></p>
<p style="text-align:center;">Window Agency — 25+ years of experience in design, execution, and manufacturing in Riyadh</p>
<p style="text-align:center;"><a href="https://windowadv.com/en/contact">Contact Us Now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>What is the best material for raised letters in Riyadh's outdoor climate?</h3>

<p>Stainless steel and aluminum are among the best suited to harsh outdoor conditions, with UV-resistant coatings. Acrylic suits indoor use better.</p>

<h3>Can raised letters be illuminated?</h3>

<p>Yes, with front, back, or edge lighting using LED modules, ideal for facades, hotels, and buildings that need to be seen after dark.</p>

<h3>How long does manufacturing take?</h3>

<p>It depends on size, material, and lighting. Standard orders usually take a matter of days, while large or complex projects can take weeks. Ask for a clear schedule before approving.</p>

<h3>Does the agency handle installation or only manufacturing?</h3>

<p>Window offers both, including mounting, connecting the lighting, and leveling, so you receive a sign ready to use.</p>

<h3>Can raised letters be mounted on any wall?</h3>

<p>On most surfaces, such as concrete, composite panels, glass, and gypsum, but the method depends on the wall and letter weight, so the installer should inspect the site first.</p>

<h3>Why does Arabic lettering need special care in design?</h3>

<p>Because its letters connect, change shape, and carry fine dots, so careless cutting leaves fragile joins and uneven spacing that weaken how the name reads.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'raised-letters-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
