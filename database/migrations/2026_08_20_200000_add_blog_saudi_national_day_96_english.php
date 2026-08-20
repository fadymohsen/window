<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'saudi-national-day-96-gifts-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Saudi National Day 96 Gifts & Promotional Products: Your Complete Guide with Window Agency\'s "Ezzana Bitabena"';
        $enMetaTitle       = 'Saudi National Day 96 (2026) Gifts & Promotional Products | Window Advertising Agency';
        $enMetaDescription = 'Design and production of Saudi National Day 96 gifts and promotional products under the "Ezzana Bitabena" theme: shirts and hoodies, water bottles, coffee mugs, flags, stickers, office decor, and corporate events with Window Advertising Agency.';
        $enKeywords        = 'Saudi National Day gifts,Ezzana Bitabena,National Day 96,employee gifts,advertising agency,visual identity design,signage and banners,project hoarding,exhibitions and conferences,social media management,website design,annual report design,advertising agency Riyadh';

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
<p>"Ezzana Bitabena" — "Our pride is in our nature" — isn't just a slogan, it's an entire nation's identity renewed every year on Saudi National Day. At <strong>Window Advertising Agency</strong>, we believe the National Day celebration isn't complete until every gift and every promotional product carries the spirit of the nation in its details, and until the entire facility transforms into a space that lives and breathes national pride. We don't just decorate spaces or print logos on products — we build a complete national experience, from the first glance at a facility's façade, through employees, clients and visitors, all the way to the gifts, events, photography, and small details that make the occasion present everywhere.</p>

<blockquote><p><strong>"Ezzana Bitabena — we craft products and experiences that carry the nation's spirit and live up to your organization."</strong></p></blockquote>

<h2>Why Is Saudi National Day a Golden Opportunity for Brands?</h2>

<p>Saudi National Day isn't just an official holiday — it's a unifying emotional moment shared by more than 35 million people, filled with pride, belonging, and love of country. In this exact moment, brands get an exceptional opportunity to strengthen their presence and cement their relationship with their audience through genuine, authentic participation in the national celebrations. Organizations that invest well in this occasion don't just run a successful marketing campaign — they build an emotional connection with their audience that lasts far longer than the celebration season itself.</p>

<blockquote><p><strong>Market fact:</strong> Marketing research shows that consumers during national occasions lean more strongly toward supporting brands that show genuine interest in the moment. An organization that sits out this season misses a visual and marketing opportunity that won't repeat for another full year — and under Vision 2030, Saudi national identity has grown richer, more diverse, and more open, opening new horizons for innovative National Day product design that breaks away from repetitive, traditional templates.</p></blockquote>

<h2>National Day 96's "Ezzana Bitabena" Theme: The Identity Behind Every Design</h2>

<p>The official identity for Saudi National Day 96 (2026) carries the slogan "Ezzana Bitabena," branching into six core expressions that give designers wide creative room — each product can carry a different sub-slogan, allowing a complete, cohesive product range that shares one overall visual identity while standing out in its own details:</p>

<ul>
<li><strong>Ezzana Bishajaatna</strong> — courage in facing challenges and shaping the future</li>
<li><strong>Ezzana Biruyatna</strong> — the ambitious vision leading the Kingdom forward</li>
<li><strong>Ezzana Biasalatna</strong> — drawing on authentic Saudi heritage</li>
<li><strong>Ezzana Bihimmatna</strong> — boundless resolve and ambition</li>
<li><strong>Ezzana Bijoodna</strong> — excellence in everything we make</li>
<li><strong>Ezzana Bikaramna</strong> — the authentic Saudi generosity that knows no bounds</li>
</ul>

<p>Core visual identity elements include the national green in shades from deep to olive, classical and modern Arabic calligraphy, geometric Sadu heritage patterns, national symbols like the twin swords and palm tree, and an extended color palette including purple, blue, and gold as complementary accents. At Window, we've put this diversity to work designing complete product ranges — every product carrying a different sub-slogan and a coordinated color palette, creating a rich, cohesive visual experience.</p>

<h2>1. National-Themed Promotional Clothing</h2>

<p>Clothing is the most impactful promotional product on National Day, because it becomes a walking advertisement moving through streets, offices, and events. At Window, we design oversized dark-green shirts with geometric Sadu patterns, and premium teal hoodies and jackets with embroidered patches carrying the "Ezzana Bitabena" logo, in premium cotton fabrics and sizes from XS to 4XL, using dye sublimation printing or computerized embroidery depending on the level of luxury required.</p>

<blockquote><p><strong>From our portfolio:</strong> We designed and produced a complete national clothing collection for a major government body in Riyadh for National Day, including oversized dark-green shirts and premium teal hoodies carrying the "Ezzana Bitabena" logo and heritage patterns on the sleeves and back. The collection was distributed to more than 1,200 employees across the body's branches nationwide, generating exceptional social media engagement when employees shared photos of themselves in the national attire.</p></blockquote>

<h2>2. Everyday Accessories in the National Identity</h2>

<p>Everyday accessories are gifts the recipient uses daily — meaning continuous, ongoing exposure for your brand. Stainless steel water bottles with laser-engraved Saudi geometric patterns, ceramic and travel coffee mugs in purple and blue tones inspired by the National Day color palette, and green umbrellas with floral and geometric heritage prints are all practical, elegant gifts that quietly work for your brand all year round.</p>

<blockquote><p><strong>Market fact:</strong> Marketing studies show everyday-use promotional products like water bottles and coffee mugs achieve the highest ROI of any promotional gift category, because they generate thousands of brand impressions over their lifespan. A well-designed water bottle used daily for a year delivers more than 365 direct impressions for a cost of just a few riyals.</p></blockquote>

<h2>3. Flags and Banners — the First Symbol of Celebration</h2>

<p>No National Day celebration is complete without flags flying everywhere. At Window, we design and manufacture custom National Day flags in every size, from small desk flags on premium bases to car flags and massive vertical street banners, carrying the "Ezzana Bitabena" logo alongside your organization's own branding, in materials built to withstand Riyadh's scorching September heat without fading or fraying.</p>

<h2>4. Print Materials and Packaging — the Details That Complete the Experience</h2>

<p>Gift bags designed in the national identity, greeting cards in elegant Arabic calligraphy, custom die-cut stickers shaped like the Kingdom's map or the palm-and-swords emblem, metal badges, and cupcake toppers in the colors of the three sub-slogans — these may look small, but their impact is huge, and their low cost makes them ideal for large-scale distribution at any corporate celebration.</p>

<blockquote><p><strong>Why this matters:</strong> A corporate National Day celebration without stickers on the tables, toppers on the desserts, and badges on employees' chests always feels incomplete, no matter how much was spent on the bigger elements. At Window, we always advise clients not to neglect these details — they're what turns an ordinary event into an experience people remember.</p></blockquote>

<h2>5. Turning Your Facility Into a National Space</h2>

<p>Picture an employee arriving at the office on National Day morning — before even entering the building, the façade has transformed into a complete national showcase. Flags fly, the logo appears elegantly, the visual identity extends across the façades, and the entrance carries national messaging. Here, National Day stops being just an occasion and becomes an experience that starts the moment you walk in. At Window, we handle glass-façade stickers, column and elevator wraps, welcome and directional signage, indoor and outdoor banners, photo backdrops, 3D letters and structures, and full reception and office decor — the same <strong>visual identity design</strong> and <strong>signage and banner</strong> services we provide year-round, applied to the National Day identity.</p>

<h2>6. Corporate Events and Photo Areas</h2>

<p>Why should National Day be limited to gifts and decor? Companies can organize a full event for their employees and families, or for clients and partners: indoor celebrations, heritage corners with Saudi coffee, national trivia and interactive games, entertainment, and complete photo and video documentation. Photo booths with backdrops designed in the national identity and 3D installations turn every employee or visitor into part of the organization's own media campaign. Our extensive experience manufacturing exhibition booths and organizing conferences lets us deliver corporate celebrations at a professional level that exceeds expectations — built on the same fundamentals we apply to <strong>exhibitions and conferences</strong> throughout the year.</p>

<blockquote><p><strong>From our portfolio:</strong> We executed a complete corporate National Day celebration for a major tech company in Riyadh, including decorating the entire 3-story headquarters with flags, banners, stickers, and balloons in the national identity, setting up a gift corner with over 500 gift sets, a coffee-and-dessert corner with cupcake toppers, and a photo corner with a giant backdrop featuring Sadu patterns and the "Ezzana Bitabena" logo. The celebration drove unprecedented engagement on the company's social media accounts, and the client asked us to repeat the experience the following year on an even larger scale.</p></blockquote>

<h2>Solutions for Every Size: From Government Bodies to Startups</h2>

<p>A government body's celebration differs from a major corporation's, a bank's differs from an industrial company's, and a small business's differs from a group of companies. Government bodies need a special level of precision and strict adherence to the official identity per the approved guidelines, while large corporations need integrated solutions that handle large numbers and multiple locations (headquarters, branches, employees, clients, vehicles, gifts, events). A company doesn't need to be huge to celebrate in style — solutions can be tailored to any budget, from a 20-employee team to a workforce in the thousands. It's not just about budget size — it's about the strength of the idea and the quality of execution.</p>

<h2>Professional Packaging: From a Simple Wrapper to a Premium Gift Experience</h2>

<p>Packaging isn't just a protective cover — it's the first chapter of the gift's story. At Window, we offer four packaging tiers to fit every budget and audience segment:</p>

<table><tbody><tr><td><strong>Tier</strong></td><td><strong>Contents</strong></td><td><strong>Best for</strong></td></tr><tr><td>Economy</td><td>Printed kraft bag + greeting card</td><td>Wide employee distribution</td></tr><tr><td>Standard</td><td>Designed cardboard box + filler paper + card</td><td>Clients and partners</td></tr><tr><td>Premium</td><td>Luxury magnetic box + satin lining + personal card</td><td>Top clients and VIPs</td></tr><tr><td>Exclusive</td><td>Laser-engraved wooden box + velvet lining + gold card</td><td>Executives and officials</td></tr></tbody></table>

<blockquote><p><strong>Market fact:</strong> Marketing research confirms that 72% of consumers say a product's packaging directly influences their purchase decision or how they judge a gift, and professional packaging raises a gift's perceived value by up to 45%.</p></blockquote>

<h2>How to Plan Your National Day Campaign: A Quick Guide</h2>

<ol>
<li><strong>Strategic planning (3 months out):</strong> define goals, target audience, budget, and choose a specialized advertising partner</li>
<li><strong>Design and creativity (2 months out):</strong> study the official theme, brainstorm with the design team, select products, and prepare and review initial designs</li>
<li><strong>Production and quality control (1 month out):</strong> produce and approve samples, run full production, spot-check quality, and package</li>
<li><strong>Distribution and activation (2 weeks out):</strong> deliver, set up the event, distribute gifts, and document the experience</li>
</ol>

<blockquote><p><strong>Numbers that speak:</strong> Organizations that start planning their National Day campaign 3 months out save 20-30% on total cost on average compared to those who start just a month before. At Window, we advise clients to reach out in June or July to start planning for the September season.</p></blockquote>

<h2>Window's End-to-End Service: One Roof for All Your Organization's Needs</h2>

<p>A successful National Day campaign is rarely a standalone project — it ties into an organization's complete <strong>advertising</strong> ecosystem all year round. At Window, we bring all of these services under one roof:</p>

<ul>
<li><strong>Employee gifts</strong> — from National Day gifts to recognition programs and recurring occasions throughout the year</li>
<li><strong>Visual identity design</strong> — a complete visual identity applied to national products and to every piece of your organization's collateral</li>
<li><strong>Signage and banners</strong> — from National Day decor to permanent advertising signage for your headquarters and branches</li>
<li><strong>Project hoarding</strong> — turning construction site fences into national or permanent promotional displays</li>
<li><strong>Exhibitions and conferences</strong> — from an internal celebration to full exhibition booths and major conference organizing</li>
<li><strong>Social media management</strong> — documenting and covering your National Day campaign and managing your digital presence year-round</li>
<li><strong>Annual report design</strong> — showcasing your organization's achievements with the same level of professionalism</li>
<li><strong>Website design</strong> — a digital presence that reflects your identity with the same quality you see in your printed products</li>
</ul>

<h2>Why Choose Window for Your National Day Products?</h2>

<p>In a market full of options, what sets Window apart as a National Day campaign partner is proven experience in national occasions built over years, local manufacturing in Riyadh with the latest equipment, a wide range of products and techniques under one roof, strict deadline discipline, and competitive pricing without compromising on quality — because we manufacture locally and control the entire production chain without middlemen.</p>

<blockquote><p><strong>Numbers that speak:</strong> In last year's National Day season alone, Window produced more than 15,000 promotional products for over 40 clients, including shirts, hoodies, water bottles, coffee mugs, flags, stickers, toppers, gift bags, and print materials. Client satisfaction reached 97%, and the repeat-engagement rate the following season reached 85%.</p></blockquote>

<h2>Is Your Organization Ready to Celebrate in Style?</h2>

<p>"Ezzana Bitabena" — and your organization's pride shows in how it celebrates. From the green shirt adorned with Sadu patterns to the morning coffee mug, from the building façade to the photo corner, every detail we craft is a message of love for the nation and a message of trust from your organization. Don't wait for the last minute — start planning now.</p>

<p><a href="https://windowadv.com/en/contacts">Contact us now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>What types of promotional products does Window produce for Saudi National Day?</h3>

<p>We design and produce a full range including: promotional clothing (shirts, hoodies, polos, jackets), accessories (water bottles, coffee mugs, umbrellas, premium pens), flags and banners in every size, print materials (stickers, badges, cupcake toppers, greeting cards), premium packaging, and complete facility decor and corporate event organizing.</p>

<h3>What national slogans can be used on promotional products?</h3>

<p>The main slogan "Ezzana Bitabena" is the official theme for National Day 96, branching into: "Ezzana Bijoodna," "Ezzana Bihimmatna," "Ezzana Bishajaatna," "Ezzana Bikaramna," "Ezzana Biruyatna," and "Ezzana Biasalatna." This variety allows a complete product range where each item carries a different sub-slogan.</p>

<h3>When should we start preparing our National Day campaign?</h3>

<p>We strongly recommend starting preparations two to three months ahead — in June or July. Organizations that start early save 20-30% on cost compared to those who wait until the last minute, while also getting the best designs and highest quality.</p>

<h3>Can you design a complete gift set for National Day?</h3>

<p>Absolutely — this is one of our specialties. We design complete gift sets with a unified visual identity spanning multiple products (for example: a shirt + water bottle + coffee mug + stickers) packaged in premium wrapping with a greeting card, and we offer different packaging tiers to fit any budget or target segment.</p>

<h3>Do you also handle National Day corporate events and celebrations?</h3>

<p>Yes. Alongside promotional products, we offer complete corporate event organizing: decorating the facility with flags and banners, setting up coffee and dessert corners, building a photo corner, coordinating gift distribution, and event photography and video production.</p>

<h3>Do you serve clients outside Riyadh across the Kingdom?</h3>

<p>Absolutely. Our office and factory are in Riyadh, and we're one of the leading advertising agencies in Riyadh, but we serve clients across every region of the Kingdom — from Jeddah and Makkah to Dammam, Khobar, and Al-Ahsa, to Abha, Tabuk, Hail, and Qassim. We also offer delivery to multiple addresses if your organization has branches in different cities.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'saudi-national-day-96-gifts-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
