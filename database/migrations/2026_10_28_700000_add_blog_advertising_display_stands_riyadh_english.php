<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'advertising-display-stands-riyadh';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Best Advertising Display Stands in Riyadh & Saudi Arabia | Roll-Up, Pop-Up & Exhibition Stands';
        $enMetaTitle       = 'Advertising Display Stands Riyadh | Roll-Up, Pop-Up & Exhibition Stands';
        $enMetaDescription = 'Explore the main types of advertising display stands in Riyadh and Saudi Arabia: roll-up, pop-up, counter, backdrop, flags and exhibition stands. Learn their uses, specs, and request a quote from Window.';
        $enKeywords        = 'advertising display stands Riyadh,roll-up banner Saudi Arabia,pop-up display stand,exhibition stands Riyadh,backdrop events,display stands Saudi';

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
<p>Every exhibition, conference, or promotional corner in Riyadh starts with the same question: how do you catch a visitor's attention in the first few seconds? For most companies and entities in Saudi Arabia, the answer is almost always the same — a well-chosen display stand, in the right spot, at the right size.</p>

<p>Advertising display stands are used at trade exhibitions, conferences, product launches, government events, and promotional corners inside malls and offices. Each occasion calls for a different type of stand; what works for a reception desk isn't necessarily what works for a large conference backdrop or an exhibition booth.</p>

<p>In this guide, we walk through the most common types of advertising display stands used in Riyadh and across the Kingdom, with their main uses, specs, and the differences between systems, so you can choose what fits your event without trial and error. Window Advertising Agency offers complete solutions in <a href="https://windowadv.com/en/services/banner-printing-installation">banner printing and installation</a>, alongside a dedicated <a href="https://windowadv.com/en/services/display-stands">promotional & display stands</a> service.</p>

<h2>What Are Advertising Display Stands?</h2>

<p>Advertising display stands are display fixtures used to showcase a brand or marketing message wherever customers gather. Their shapes and materials vary by purpose: some are light and portable, some are built for large exhibition or conference backdrops, and others are designed to display products or hold brochures.</p>

<p>Among the most commonly searched terms by clients in Riyadh and Saudi Arabia: exhibition stands, roll-up banners, pop-up displays, pop-up counters, backdrops, X-banner stands, advertising flags, and product display stands — each covered in detail below.</p>

<h2>The Most Common Types of Advertising Display Stands</h2>

<h3>1. Roll-Up Banner</h3>

<p>The roll-up banner is one of the most widely used advertising display stands at exhibitions, conferences, and meetings. It consists of a base that retracts the printed material inside it, with a support pole that holds the design upright, and it rolls back into the base after use for easy transport and storage.</p>

<p>Roll-up banners work well for showcasing a company's logo and services next to reception desks, or for companies attending multiple events thanks to their light weight and quick setup. Common widths include 80, 85, or 100 cm, and the final artwork size should always follow the specific base system's actual dimensions, not just the desired display area, to avoid print or installation issues. If you're looking for roll-up banner printing in Riyadh, start by confirming the size, quantity, and intended use through Window's <a href="https://windowadv.com/en/services/banner-printing-installation">banner printing and installation</a> service.</p>

<h3>2. Pop-Up Display Stand</h3>

<p>A pop-up display is a good fit when you need a larger backdrop than a roll-up can offer, especially at exhibitions, conferences, promotional corners, and product launches. It relies on a foldable frame onto which printed panels are mounted to form a wide backdrop, available in a curved design for a flowing look, or a straight design for an organized layout of logo, images, and information.</p>

<p>Before ordering, confirm the frame type, the panel dimensions, and how the print is mounted — a name like "3x3 pop-up" usually refers to the number of panels, not actual meters. This type is typically part of Window's <a href="https://windowadv.com/en/services/exhibition-booth-execution">exhibition booth design & execution</a> service, and our guide on <a href="https://windowadv.com/en/blogs/exhibition-booth-manufacturing-saudi-arabia-window">designing, manufacturing, and building exhibition booths in Riyadh</a> is a useful read if you're planning a full booth.</p>

<h3>3. Pop-Up Counter</h3>

<p>A pop-up counter serves as a reception point or brand introduction desk, often paired with a backdrop pop-up display for a cohesive look at exhibitions and conferences. It helps organize visitor reception, attendee registration, brochure distribution, and initial conversations with clients.</p>

<p>Before ordering, define the worktop dimensions and overall height, and whether you need internal shelving or a carry bag — dimensions vary between systems, and there's no single standard size for all counters.</p>

<h3>4. Promotion Table</h3>

<p>A promotion table is used for product sampling campaigns, giveaways, and new-product promotion inside malls, retail stores, and field activities. It typically consists of a base with a printable front panel and a usable tabletop, and may include a header board carrying the brand logo.</p>

<p>When ordering, specify the front panel and tabletop dimensions, the frame type, and the number of tables needed along with where they'll be used, since dimensions vary from one model to another.</p>

<h3>5. Backdrop for Events & Conferences</h3>

<p>A backdrop — also known as a media wall or event backdrop — is one of the most important printing solutions for creating a background carrying a company logo or event identity, used at conferences, photo areas, product launches, and government events. It comes either as a collapsible, reusable frame structure, or as a custom backdrop sized to a stage's dimensions and platform height.</p>

<p>For a professional result, take the actual site measurements, determine the audience's viewing distance, and lay out sponsor logos clearly when there's more than one sponsor — a point we cover in our article on <a href="https://windowadv.com/en/blogs/corporate-exhibition-booths-conferences-riyadh">exhibition booths for large companies and government entities</a>. Window offers a full <a href="https://windowadv.com/en/services/backdrop">backdrop for events & conferences</a> service covering design, manufacturing, and installation.</p>

<h3>6. Expandable Display Stand</h3>

<p>An expandable display stand is a foldable, extendable display system used in some exhibitions and promotional corners when a company needs display space that's quick to set up, disassemble, and transport. Before ordering, confirm the system's shape and dimensions when expanded, how the graphics are mounted, and that the specific product actually matches the required brand name and specifications.</p>

<h3>7. Brochure Stand</h3>

<p>A brochure stand is a practical way to organize and display booklets and leaflets at companies, exhibitions, reception areas, clinics, and hotels. It's available as a floor stand or countertop holder, in metal or acrylic, and in foldable models for easy transport at mobile exhibitions.</p>

<p>Choosing the right type depends on the brochure size (A4 or A5), the number of pockets, and where it will be used — fixed in an office or mobile between events.</p>

<h3>8. X-Banner Stand</h3>

<p>An X-banner stand relies on a crossing rear frame to hold the printed design in place, and is used at promotional events, retail stores, small exhibitions, and reception areas. It's lightweight and quick to set up, making it a budget-friendly alternative to the roll-up banner for temporary use.</p>

<p>The key difference from a roll-up is that a roll-up has a base that retracts the print inside it, while an X-banner relies on fixed rear arms — the choice between them comes down to project budget, usage frequency, and the finish level required.</p>

<h3>9. Poster Stand</h3>

<p>A poster stand displays posters and advertising materials at points of sale, reception areas, and events, available as a floor stand or display frame depending on the product. When ordering, specify the poster size, orientation (portrait or landscape), frame type, and how often the content will need to change.</p>

<h3>10. Advertising Flags</h3>

<p>Advertising flags help highlight a brand in outdoor and indoor spaces, including feather flags, beach flags, and teardrop flags. They're used in front of stores and exhibitions, at company entrances, and at sporting and promotional events.</p>

<p>When ordering, consider the flag's shape and dimensions, the fabric type, and whether the base is suitable for outdoor wind conditions — never assume every base can withstand strong wind.</p>

<h3>11. Product Display Stands</h3>

<p>Product display stands are used to showcase products in an organized, attractive way inside stores, exhibitions, and points of sale. Unlike stands designed just to display a logo, they often require engineering tailored to the product's weight and dimensions. They're available in acrylic, metal, or wood, as floor units or multi-shelf countertop units.</p>

<p>Choosing the right stand depends on the product's weight, the number of items displayed, and the display location, and some cases call for a custom design rather than an off-the-shelf holder. Window offers <a href="https://windowadv.com/en/services/display-stands">promotional & display stands</a> built specifically for this kind of requirement.</p>

<h2>How to Choose the Right Display Stand for Your Event</h2>

<p>No single stand fits every occasion; the right choice depends on the event type (exhibition, conference, promotional corner, or point of sale), the space available, how often it's used, and whether the design needs to change between events. Companies attending recurring events often combine more than one type — a roll-up for quick meetings, a pop-up or backdrop for larger exhibitions — rather than relying on one system for everything.</p>

<p>It's also worth reviewing your overall advertising budget before ordering several systems for multiple branches or events; we cover practical ways to manage this without hurting brand visibility in <a href="https://windowadv.com/en/blogs/reduce-advertising-costs-large-companies">how large companies can reduce advertising costs</a>. Comparing suppliers? Our <a href="https://windowadv.com/en/blogs/15-tips-choose-advertising-agency-riyadh">15 tips for choosing an advertising agency in Riyadh</a> is worth a read before signing any proposal.</p>

<h2>Order Your Display Stand from Window</h2>

<p>Whether you're looking for advertising display stands in Riyadh or anywhere in Saudi Arabia — for a single exhibition or ongoing supply across several branches — Window Advertising Agency brings over 25 years of experience in designing, manufacturing, and installing display stands and advertising prints. <a href="https://windowadv.com/en/contact">Contact us</a> for a quote tailored to your event type and available space.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'advertising-display-stands-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
