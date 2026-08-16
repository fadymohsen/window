<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'flags-design-manufacturing-saudi-arabia-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Flag Design & Manufacturing in Saudi Arabia: From Fabric to a Nation\'s Story';
        $enMetaTitle       = 'Professional Flag Design & Manufacturing in Saudi Arabia | Window Advertising Agency';
        $enMetaDescription = 'Design and manufacturing of every type of flag: desk flags, ceremony flags, street banners, corporate flags, and Saudi national flags at the highest quality. Window Advertising Agency, Riyadh.';
        $enKeywords        = 'flag design and manufacturing,desk flags,ceremony flags,street banners,Saudi national flags,corporate flags,advertising agency Riyadh,advertising agency Saudi Arabia,conference organizing,exhibition booths,promotional flags,flag printing';

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
<p>Every flag that leaves our factory carries a story — a company proud of its identity, a government body raising its emblem with confidence, or a national occasion that deserves to fly over every square. At <strong>Window Advertising Agency</strong>, we don't just print on fabric — we craft identities that fly: from the elegant desk flags that dress up a meeting table, to the ceremony flags standing tall in ministry halls, to the outdoor banners that light up the Kingdom's streets during major national occasions.</p>

<blockquote><p><strong>"A flag isn't just fabric — it's a nation's story."</strong></p></blockquote>

<h2>Why Do Saudi Institutions and Events Need Professional Flags?</h2>

<p>Saudi Arabia is living through a historic transformation under Vision 2030 — an era in which international events are multiplying, government and private institutions are expanding, and the Kingdom is hosting unprecedented global occasions. In this fast-moving landscape, a flag becomes more than a piece of fabric — it becomes an instant visual message that captures an institution's identity in a single glance.</p>

<h3>Flags for National Occasions</h3>

<p>Every year, the Kingdom's streets turn into a sea of green in celebration of Saudi National Day and Founding Day. National flags fly from light poles, decorate government and private building façades, and fill celebration squares.</p>

<h3>Flags for Conferences and Exhibitions</h3>

<p>Saudi Arabia has become a global destination for world-class conferences and exhibitions — from the LEAP tech conference to the World Defense Show and the Riyadh International Book Fair. Elegant desk flags on gold or chrome bases add a formal, professional touch that no other visual element can replace.</p>

<h3>Flags as a Corporate Identity Tool</h3>

<p>Every ministry, every government authority, every major company needs flags carrying its emblem — flags standing at building entrances, hung in meeting rooms, and raised at official occasions. A corporate flag is an extension of the institution's visual identity design — it strengthens presence, builds trust, and reinforces brand recall.</p>

<blockquote><p><strong>Market fact:</strong> The flag and banner market in Saudi Arabia is seeing notable annual growth, driven by the Kingdom hosting more than 500 international events and conferences every year, plus a growing number of government bodies and new companies under Vision 2030.</p></blockquote>

<h2>Types of Flags Window Designs and Manufactures</h2>

<h3>1. Desk Flags / Table Flags</h3>

<p>Small flags mounted on metal or gold-plated bases, placed on meeting tables, executive desks, and reception counters. This category includes Saudi national flags in multiple sizes, foreign country flags for international trade companies, embassies, hotels, and airports, and corporate flags carrying a client's own logo and colors. Desk flags also make one of the most refined promotional gifts you can offer clients, partners, and guests.</p>

<blockquote><p><strong>From our portfolio:</strong> We manufactured custom desk flags for the Saudi Electricity Company in the company's full visual identity, on premium metal bases, distributed to managers and leadership across the company's branches nationwide. We've also produced dozens of desk flags for multiple countries for hotels and hospitality venues hosting international guests.</p></blockquote>

<h3>2. Ceremony / Standing Flags</h3>

<p>Large flags mounted on floor stands, standing tall at government building entrances, official meeting halls, and reception areas. These are typically made from premium fabrics such as elegant satin or high-density polyester, finished with gold fringe and tassels for a formal, luxurious look, high-precision printing or embroidery, and elegant stainless steel or coated wood floor stands.</p>

<blockquote><p><strong>From our portfolio:</strong> We're proud to have produced ceremony flags for leading government bodies in the Kingdom, including the Ministry of Health (flags in the ministry's green and gold visual identity), the Transport General Authority (flags with the authority's new logo following an identity rebrand), and Zenad (corporate flags with a modern design reflecting the tech company's identity).</p></blockquote>

<h3>3. Outdoor Flags & Street Banners</h3>

<p>Large flags and banners mounted on street poles, light poles, and outdoor flagpoles. This category is the most exposed to weather, so it requires special materials and treatments able to withstand strong winds and harsh climate conditions without tearing or fading.</p>

<blockquote><p><strong>From our portfolio:</strong> We produced vertical street banners for the Eastern International Race — large banners hung on street poles across the Eastern Province to inform the public about the event and direct them to the race location. We've also produced large Saudi national flags on light poles with striking night illumination for multiple national occasions.</p></blockquote>

<h3>4. Custom Corporate Flags</h3>

<p>Flags fully designed to an institution's visual identity — logo, colors, and text taglines. Used at facility entrances alongside the national flag, at exhibitions and conferences to distinguish an institution's presence in exhibition booths, and at internal occasions like company celebrations and recognition events.</p>

<h3>5. Promotional Flags</h3>

<p>Flags designed specifically for marketing campaigns, promotions, and product launches, including feather flags — tall, curved flags that move with the wind and catch attention — teardrop flags, lightweight beach flags, and gate flags mounted at entrances.</p>

<h3>6. National & Diplomatic Flags</h3>

<p>Production of Saudi national flags in every size, from small desk flags to large flagpole flags, plus foreign country flags for embassies, consulates, hotels, and diplomatic occasions. This category demands exceptional precision in colors and dimensions to match each country's official specifications.</p>

<blockquote><p><strong>Numbers that speak:</strong> During Saudi National Day and Founding Day seasons alone, the Kingdom's flag consumption is estimated in the millions across every size. Window has the production capacity to meet large orders on schedule — whether the request is 500 desk flags or 10,000 national flags for a major event.</p></blockquote>

<h2>Materials and Fabrics Used in Flag Manufacturing</h2>

<p>Choosing the right fabric is the cornerstone of manufacturing a flag that lasts and keeps its appearance. Every flag type requires a different material suited to its use, environment, and budget.</p>

<table><tbody><tr><td><strong>Criteria</strong></td><td><strong>Polyester</strong></td><td><strong>Satin</strong></td><td><strong>Nylon</strong></td><td><strong>Mesh Fabric</strong></td></tr><tr><td>Durability</td><td>Very high</td><td>Medium-high</td><td>High</td><td>Very high</td></tr><tr><td>Sun resistance</td><td>Excellent</td><td>Good</td><td>Excellent</td><td>Excellent</td></tr><tr><td>Wind resistance</td><td>Very good</td><td>Limited</td><td>Good</td><td>Excellent (perforated)</td></tr><tr><td>Appearance</td><td>Practical and professional</td><td>Luxurious and glossy</td><td>Elegant and flowing</td><td>Functional</td></tr><tr><td>Best use</td><td>Outdoor flags and banners</td><td>Ceremony flags and halls</td><td>Flagpole flags</td><td>Large banners</td></tr></tbody></table>

<blockquote><p><strong>Window's edge:</strong> We don't use one material for every flag — we choose the right fabric for every use. A desk flag needs an elegant satin that suits a boardroom, a street flag needs a durable polyester that withstands Riyadh's scorching sun, and a massive banner needs a mesh fabric that lets air pass through without tearing.</p></blockquote>

<h2>Printing and Execution Techniques for Flags</h2>

<p>True colors aren't painted onto the surface of fabric — they penetrate its fibers to become an inseparable part of it. At Window, we use the latest printing techniques to guarantee the highest quality and durability:</p>

<ul>
<li><strong>Dye Sublimation Printing:</strong> the most advanced technique globally — heat turns the ink into a gas that penetrates the fabric's fibers, producing vivid colors that never peel, crack, or fade easily</li>
<li><strong>Screen Printing:</strong> a very cost-effective technique for large quantities, well suited to designs with a limited color palette</li>
<li><strong>Computerized Embroidery:</strong> a raised, luxurious texture and three-dimensional logos in gold, silver, and colored threads that never fade or peel</li>
<li><strong>Direct Digital Printing:</strong> highly flexible for small quantities and intricate designs</li>
</ul>

<blockquote><p><strong>Why this matters:</strong> The difference between a professionally printed flag and a cheaply printed one shows up within days, not months. Cheap printing uses surface inks that peel with the first exposure to sun or wind. Sublimation printing, which we use at Window, makes colors penetrate the fabric's fibers so they become part of the fabric itself.</p></blockquote>

<h2>Window's Flag Manufacturing Stages: From Concept to Raising the Flag</h2>

<ol>
<li><strong>Design and consultation:</strong> a working session with the client to understand the need, reviewing the visual identity, proposing designs, and review and approval via a digital proof</li>
<li><strong>Choosing the right material:</strong> defining the fabric type, testing samples, and setting density and weight</li>
<li><strong>Cutting and preparation:</strong> cutting fabric to precise dimensions with electronic cutting machines, and preparing the design for printing</li>
<li><strong>Printing or embroidery:</strong> executing the print with the appropriate technique or embroidering on satin fabrics, with careful color inspection</li>
<li><strong>Sewing and finishing:</strong> professional edge stitching with industrial machines, adding fringe and tassels, and attaching hanging mechanisms</li>
<li><strong>Quality control:</strong> checking dimensions, printing, stitching, and bases and stands</li>
<li><strong>Bases, stands, and delivery:</strong> installing the appropriate base, secure packaging, and delivery to the client anywhere in the Kingdom</li>
</ol>

<blockquote><p><strong>Window's edge:</strong> At our factory, every stage of production is overseen by a specialized team. We have dedicated industrial sewing machines built specifically for flag stitching — because sewing a flag is different from any other kind of sewing and needs specialized equipment and expertise.</p></blockquote>

<h2>Flags as Marketing and Promotional Tools</h2>

<p>Many people don't connect flags with marketing, but the truth is a flag is one of the oldest and most powerful advertising tools in history. At any exhibition or conference, a booth carrying promotional flags draws significantly more attention than one relying on a wall panel alone. And a custom desk flag with your company's logo on an elegant base is one of the most refined promotional gifts you can give — one that stays on a client's desk for years.</p>

<blockquote><p><strong>Market fact:</strong> Marketing studies show that outdoor promotional flags increase foot traffic to points of sale by up to 30% compared to stores that don't use them.</p></blockquote>

<h2>Saudi Flag Regulations and Requirements: What You Should Know</h2>

<p>The Saudi flag isn't an ordinary flag — it carries the Shahada and the sword, and holds a special place in citizens' hearts and in official regulations. Among its key official specifications: a rectangular shape with a defined width-to-length ratio (2:3), an officially defined shade of green, the Thuluth script for writing the Shahada according to the approved official template, and double-sided printing so the text reads correctly from both sides. The Saudi flag is also never flown at half-mast, and it must never be used commercially in a way that diminishes its dignity.</p>

<blockquote><p><strong>Why this matters:</strong> Manufacturing the Saudi flag requires absolute adherence to official specifications — any deviation in the shade of green, the shape of the Shahada script, or the proportions exposes the manufacturer and user to accountability. At Window, we adhere to the strictest standards in manufacturing Saudi national flags.</p></blockquote>

<h2>Flags in Non-Traditional Shapes: A Technical Challenge We've Mastered</h2>

<p>Today, flags are manufactured in a variety of shapes serving different purposes: feather flags with a tall, curved shape, teardrop flags in a reverse-drop shape, pennant flags used in celebratory strings, custom die-cut flags that follow the shape of a logo or message, and vertical banners suited to street poles.</p>

<blockquote><p><strong>Window's edge:</strong> Many flag manufacturers limit themselves to standard shapes and turn down custom requests because they require extra equipment and expertise. At Window, we welcome the challenge — we manufacture flags in non-traditional shapes, custom dimensions, and intricate designs including Arabic script and detailed logos.</p></blockquote>

<h2>Window's Services That Complement Flag Manufacturing</h2>

<p>Manufacturing flags isn't a standalone service at Window — it's part of a complete suite of advertising services we provide to institutions and events: complete visual identity design, conference and event organizing, exhibition booth manufacturing, promotional gift manufacturing, promotional stand manufacturing (roll-up, X-banners, and pop-up stands), and promotional video design.</p>

<h2>Why Choose Window to Manufacture Your Flags?</h2>

<ul>
<li><strong>Local manufacturing to global standards:</strong> we have full in-house production lines — from sublimation printing machines to computerized embroidery machines to specialized industrial sewing machines</li>
<li><strong>Proven experience with major institutions:</strong> we've worked with the Ministry of Health, the Transport General Authority, the Saudi Electricity Company, and the Eastern International Race</li>
<li><strong>High production capacity:</strong> from hundreds to tens of thousands of flags with consistent quality and reliable delivery dates</li>
<li><strong>End-to-end service from design to delivery:</strong> consultation → design → material selection → printing/embroidery → sewing → packaging → delivery — all under one roof</li>
<li><strong>Expertise in regulations and specifications:</strong> we understand Saudi flag regulations, official flag specifications, and international standards for foreign country flags</li>
</ul>

<blockquote><p><strong>Numbers that speak:</strong> Window has completed flag projects for more than 50 government bodies and major companies across Saudi Arabia, in every type and size. Our clients don't come back because they can't find an alternative — they come back because they've experienced the quality and won't settle for less.</p></blockquote>

<h2>Contact Window Agency Today</h2>

<p>Is your institution ready for a flag that lives up to its name? Window Advertising Agency is your specialized partner for designing and manufacturing professional flags to the highest quality standards in Saudi Arabia.</p>

<p><a href="https://windowadv.com/en/contacts">Contact us now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>What types of flags does Window manufacture?</h3>

<p>We design and manufacture every type of professional flag: desk and table flags on premium metal bases, ceremony and standing flags in satin fabric with gold fringe, outdoor flags and banners for street poles and flagpoles, custom corporate flags, promotional flags in various shapes (feather, teardrop, beach), and national and diplomatic flags in every size.</p>

<h3>What materials are available for flag manufacturing?</h3>

<p>We offer four main materials: polyester, the most common choice for outdoor flags thanks to its durability and sun resistance; premium satin for ceremony and official flags; nylon for lightweight flags that need flowing movement; and perforated mesh fabric for large banners exposed to strong winds.</p>

<h3>What printing techniques are used on flags?</h3>

<p>We use four main techniques: dye sublimation printing, the most advanced; screen printing, cost-effective for large quantities; computerized embroidery with gold and silver threads for premium flags; and direct digital printing for intricate designs and small quantities.</p>

<h3>What are the manufacturing specifications for the Saudi flag?</h3>

<p>The Saudi flag is manufactured to strict official specifications: a 2:3 width-to-length ratio, an officially approved shade of green, the Thuluth script for the Shahada following the official template, and double-sided printing so the text reads correctly from both sides.</p>

<h3>What's the minimum order quantity?</h3>

<p>We handle orders of every size, from 50 desk flags for a small company to 10,000 national flags for a major event. The minimum depends on the flag type, printing technique, and level of customization.</p>

<h3>How long does a custom flag order take?</h3>

<p>Typically, the design and approval stage takes 3 to 7 business days, and manufacturing takes 7 to 15 business days. Simple desk flags are faster to produce, while embroidered ceremony flags take longer. Standard-size Saudi national flags are available immediately from our ready stock.</p>

<h3>Do you serve clients outside Riyadh?</h3>

<p>Absolutely. Our office and factory are in Riyadh, but we serve clients across every region of the Kingdom — from Jeddah, Dammam, and Khobar to Abha, Tabuk, and Madinah.</p>

<h3>Can I order other services along with flags?</h3>

<p>Yes. Alongside flags, we offer integrated services including: complete visual identity design, conference and event organizing, exhibition booth manufacturing, custom promotional gifts, promotional stands (roll-up and X-banners), and promotional video design.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'flags-design-manufacturing-saudi-arabia-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
