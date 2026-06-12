<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $oldSlug = 'alyom-alotny-alsaaody-95-alhoy-alkym-oaltsmymat-alty-tsnaa-alfrk';
        $newSlug = 'saudi-national-day-95-values-designs';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('slug', $oldSlug)->first();
            if (!$blog) {
                $blog = DB::table('blogs')->where('id', 43)->first();
            }
            if (!$blog) { return; }
            if (!DB::table('blogs')->where('slug', $newSlug)->where('id', '!=', $blog->id)->exists()) {
                DB::table('blogs')->where('id', $blog->id)->update(['slug' => $newSlug]);
            }
        }
        $blogId = $blog->id;

        if (!DB::table('slug_redirects')->where('from_slug', $oldSlug)->where('type', 'blog')->exists()) {
            DB::table('slug_redirects')->insert([
                'from_slug' => $oldSlug,
                'to_slug'   => $newSlug,
                'type'      => 'blog',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $enTitle           = 'Saudi National Day 95 – Identity, Values, and Designs That Make the Difference';
        $enMetaTitle       = 'Saudi National Day 95 – Identity, Values, and Designs That Make the Difference | Window Agency';
        $enMetaDescription = 'Explore the Saudi National Day 95 identity, its five core values, visual design elements, and how Window Advertising Agency helps brands celebrate with commemorative products, corporate gifts, and national day designs aligned with the official identity guide.';
        $enKeywords        = 'Saudi National Day 95,National Day identity,pride in our nature,Saudi National Day values,National Day 95 design,commemorative gifts Saudi,National Day products,Window Agency,Saudi National Day 95 identity guide,corporate National Day celebration';

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
<p>The 95th Saudi National Day is not merely a date on the calendar — it is the culmination of 95 years of unity, sovereignty, and relentless progress. Under the powerful slogan "Pride in Our Nature" (Arabic: عزّنا بطبعنا), the Kingdom celebrates an identity built on five enduring values: generosity, ambition, heritage, benevolence, and solidarity. This article takes you deep inside the National Day 95 identity — its meaning, its visual language, its design components, and how businesses can apply it authentically across every medium. Whether you are designing commemorative products, planning a corporate celebration, or aligning your brand with the national spirit, this guide from <strong>Window Advertising Agency</strong> covers everything you need to know.</p>
</blockquote>

<h2>1. Understanding the National Day 95 Identity: 95 Years of Pride</h2>

<p>Saudi National Day marks September 23, 1932, when King Abdulaziz bin Abdulrahman Al Saud unified the regions of the Arabian Peninsula into the Kingdom of Saudi Arabia. Each year since, the celebration has grown in scale and significance. The 95th edition carries particular weight — it represents nearly a century of nation-building, transformation, and cultural continuity.</p>

<p>The National Day 95 identity was developed by the Saudi National Day Authority to provide a unified visual and conceptual framework for celebrations across the Kingdom. Unlike generic holiday branding, this identity is carefully crafted to reflect the authentic character of the Saudi people and the values that have sustained the nation through decades of change.</p>

<blockquote>
<p><strong>95 years of achievement:</strong> From the unification in 1932 to the mega-projects of 2025, Saudi Arabia has transformed from a desert kingdom into a global economic powerhouse — and the National Day 95 identity encapsulates this journey in a single, powerful visual system.</p>
</blockquote>

<p>The identity is not merely decorative. It serves as a national communication tool — a shared visual language that connects government institutions, private corporations, small businesses, and individual citizens in a unified celebration. Understanding this identity deeply is the first step toward using it effectively.</p>

<h2>2. The Slogan Decoded: "Pride in Our Nature" (عزّنا بطبعنا)</h2>

<p>The Arabic slogan "عزّنا بطبعنا" translates to "Pride in Our Nature" — a statement that carries layered meaning. The word "عزّنا" (our pride/dignity) speaks to the deep sense of honor and self-respect that defines Saudi character. The phrase "بطبعنا" (in our nature) emphasizes that this pride is innate, organic, and authentic — not manufactured or performed for external audiences.</p>

<p>This slogan was chosen to communicate that the qualities celebrated during National Day are not seasonal sentiments. They are permanent traits embedded in the Saudi identity — traits that have been passed down through generations and continue to shape the nation's trajectory. For brands engaging with National Day 95, understanding this nuance is critical: campaigns should reflect genuine values, not superficial patriotism.</p>

<h3>Verbal Logo vs. Visual Logo</h3>

<p>The official identity includes both a verbal logo — the calligraphic rendering of the slogan — and a visual logo — the geometric symbol incorporating Saudi heritage motifs and the number 95. The verbal logo must be reproduced exactly as designed, with no modifications to letterforms, spacing, or proportions. The visual logo follows similar strict guidelines regarding clear space, minimum size, and approved color backgrounds.</p>

<blockquote>
<p><strong>Design rule:</strong> The verbal and visual logos must never be separated in official applications. They form a unified identity mark that communicates both the emotional message (the slogan) and the visual recognition (the symbol) simultaneously. Altering either component compromises the integrity of the identity.</p>
</blockquote>

<h2>3. The Five Core Values Behind the National Day 95 Identity</h2>

<p>The National Day 95 identity is anchored by five core values that define the Saudi character. These values are not abstract concepts — they are lived experiences that shape daily life, business culture, and national aspirations across the Kingdom.</p>

<table>
<tbody>
<tr>
<td>Value</td>
<td>Arabic</td>
<td>Meaning in Context</td>
</tr>
<tr>
<td><strong>Generosity</strong></td>
<td>الكرم</td>
<td>The deeply rooted tradition of hospitality and giving that defines Saudi culture — from welcoming guests to supporting communities and investing in humanitarian causes worldwide.</td>
</tr>
<tr>
<td><strong>Ambition</strong></td>
<td>الطموح</td>
<td>The forward-looking drive that fuels Vision 2030, mega-projects like NEOM and The Line, and the Kingdom's transformation into a diversified global economy.</td>
</tr>
<tr>
<td><strong>Heritage</strong></td>
<td>الإرث</td>
<td>The preservation and celebration of 95 years of cultural legacy, architectural traditions, craftsmanship, and the stories that connect past generations to the present.</td>
</tr>
<tr>
<td><strong>Benevolence</strong></td>
<td>الخير</td>
<td>The spirit of goodwill, compassion, and positive impact that extends from individual kindness to the Kingdom's global humanitarian and development initiatives.</td>
</tr>
<tr>
<td><strong>Solidarity</strong></td>
<td>التلاحم</td>
<td>The unity of the Saudi people under one banner — transcending regional, tribal, and social differences to stand together in shared purpose and national pride.</td>
</tr>
</tbody>
</table>

<p>Each of these values informs the visual identity. The color choices, geometric patterns, and typographic decisions all trace back to one or more of these foundational principles. Brands that understand these values can create National Day campaigns that resonate on a deeper level than surface-level green-and-white decorations.</p>

<blockquote>
<p><strong>Brand alignment tip:</strong> When developing National Day 95 campaigns, select the value most aligned with your brand's mission. A hospitality brand might emphasize generosity; a tech startup might lean into ambition; a heritage brand might highlight cultural legacy. This targeted approach creates authentic connections rather than generic celebrations.</p>
</blockquote>

<h2>4. Visual Design Elements: Color Palette, Fonts, and Patterns</h2>

<p>The National Day 95 identity guide provides a comprehensive visual toolkit that ensures consistency across all applications — from government buildings to corporate social media posts. Understanding each component is essential for compliant and impactful design work.</p>

<h3>The Official Color Palette</h3>

<p>The approved color palette extends beyond the traditional Saudi green and white. It includes carefully selected shades that evoke the values of the identity — earth tones representing heritage, vibrant accents representing ambition, and balanced neutrals providing versatility across media. Each color has specific CMYK, RGB, and HEX values defined in the identity guide to ensure reproduction accuracy across print and digital formats.</p>

<h3>Approved Typography</h3>

<p>The identity specifies approved fonts for both Arabic and English text. These typefaces were selected for their ability to convey authority, modernity, and cultural authenticity simultaneously. The guide defines font weights, sizes, and hierarchy rules for headings, body text, and captions — ensuring that every piece of National Day 95 content maintains typographic consistency.</p>

<h3>Geometric Patterns and Motifs</h3>

<p>Drawing from traditional Saudi architectural and textile patterns, the identity includes a library of geometric motifs that can be applied as backgrounds, borders, and decorative elements. These patterns are not generic Islamic geometry — they are specifically derived from Saudi heritage, creating a visual connection to the Kingdom's unique artistic traditions.</p>

<table>
<tbody>
<tr>
<td>Design Element</td>
<td>Purpose</td>
<td>Application Guidelines</td>
</tr>
<tr>
<td>Primary Color Palette</td>
<td>Core identity recognition</td>
<td>Use as dominant colors in all National Day materials; exact HEX/RGB/CMYK values in guide</td>
</tr>
<tr>
<td>Secondary Color Palette</td>
<td>Supporting visual variety</td>
<td>Use for accents, backgrounds, and secondary elements; never as primary identity colors</td>
</tr>
<tr>
<td>Arabic Typography</td>
<td>Verbal identity and body text</td>
<td>Approved typeface with defined weights and hierarchy; no substitutions permitted</td>
</tr>
<tr>
<td>English Typography</td>
<td>Bilingual applications</td>
<td>Complementary typeface for English text; follows same hierarchy rules</td>
</tr>
<tr>
<td>Geometric Patterns</td>
<td>Heritage connection and decoration</td>
<td>Apply as backgrounds at approved opacity levels; do not modify pattern geometry</td>
</tr>
<tr>
<td>Logo Clear Space</td>
<td>Visual breathing room</td>
<td>Minimum clear space equal to the height of the "95" numeral on all sides</td>
</tr>
<tr>
<td>Ready Templates</td>
<td>Quick compliant application</td>
<td>Pre-designed layouts for social media, print, and signage — available in the identity guide</td>
</tr>
<tr>
<td>Video Guidelines</td>
<td>Motion and animation standards</td>
<td>Approved animation sequences, transitions, and audio identity for video content</td>
</tr>
</tbody>
</table>

<blockquote>
<p><strong>Compliance warning:</strong> Using unauthorized colors, modifying the logo proportions, substituting fonts, or altering geometric patterns constitutes a violation of the identity guidelines. All materials should be reviewed against the official guide before production to ensure full compliance.</p>
</blockquote>

<h2>5. Applying the Identity Across Print and Digital Media</h2>

<p>The true power of the National Day 95 identity emerges when it is applied consistently across every touchpoint — from massive outdoor banners to smartphone screens. The identity guide provides specific templates and specifications for a wide range of media formats.</p>

<h3>Print Applications</h3>

<p>For printed materials, the identity guide addresses banners, roll-up stands, brochures, flyers, posters, and large-format signage. Each format has defined layout grids, logo placement zones, and color application rules. Print materials require particular attention to color accuracy — the approved Pantone and CMYK values ensure that the identity looks consistent whether printed on a business card or a building wrap.</p>

<h3>Digital and Screen Applications</h3>

<p>Digital applications include social media posts, stories, website banners, email headers, and digital signage. The guide provides pixel-perfect templates for major social media platforms, ensuring that the identity adapts properly to each platform's aspect ratios and safe zones. RGB and HEX color values are specified for screen accuracy.</p>

<h3>Environmental and Experiential Applications</h3>

<p>For physical spaces — offices, event venues, retail stores, and public areas — the identity extends to environmental graphics, stage backdrops, directional signage, and decorative installations. These applications require careful consideration of viewing distance, material durability, and lighting conditions to maintain the identity's visual impact.</p>

<blockquote>
<p><strong>Pro tip:</strong> Download the official identity guide before beginning any design work. It contains ready-to-use templates in multiple formats (AI, PSD, PDF) that dramatically reduce production time while ensuring compliance. Working from templates is faster and safer than building designs from scratch.</p>
</blockquote>

<h2>6. Commemorative Products: Flags, Gifts, Scarves, and More</h2>

<p>National Day 95 is one of the most significant purchasing periods for commemorative products in Saudi Arabia. Citizens, companies, and institutions invest heavily in items that express national pride — from flags displayed on buildings and vehicles to wearable items and corporate gifts. The range of commemorative products includes:</p>

<ul>
<li><strong>Saudi Flags (All Sizes):</strong> From small desk flags for office reception areas to massive building-mounted flags visible from kilometers away — all produced with the correct shade of green, proper calligraphy, and durable materials suited to Saudi Arabia's climate.</li>
<li><strong>Commemorative Scarves:</strong> Traditional and modern designs featuring the National Day 95 identity, worn during celebrations and retained as keepsakes.</li>
<li><strong>Brooches and Medals:</strong> Metal and enamel accessories featuring the National Day 95 logo — popular as corporate gifts, employee recognition items, and personal accessories.</li>
<li><strong>Stickers and Decals:</strong> Vehicle stickers, laptop decals, and wall stickers featuring approved National Day 95 designs — high-demand items with broad appeal across all demographics.</li>
<li><strong>Gift Boxes:</strong> Curated collections of National Day items presented in branded packaging — ideal for corporate gifting, VIP client appreciation, and employee celebrations.</li>
<li><strong>Printed Bags:</strong> Custom bags featuring the National Day 95 identity — used for retail packaging, event giveaways, and corporate distributions.</li>
<li><strong>Balloons:</strong> Branded balloons in the official color palette — essential for event decoration, retail displays, and public celebrations.</li>
<li><strong>Custom T-Shirts:</strong> Printed and embroidered t-shirts featuring the National Day 95 identity — popular for team events, corporate celebrations, and public sale.</li>
</ul>

<blockquote>
<p><strong>Market demand:</strong> Commemorative products see a dramatic surge in demand during the weeks leading up to September 23. Companies that plan their orders early secure better pricing, production quality, and delivery timelines. Last-minute orders often face premium pricing and limited material availability.</p>
</blockquote>

<h2>7. Official Hashtags and Social Media Strategy for National Day 95</h2>

<p>Social media plays a central role in National Day celebrations. The official hashtag #SaudiNationalDay95 (and its Arabic equivalents) unifies millions of posts across platforms, creating a massive wave of national conversation that brands can participate in authentically.</p>

<h3>Why Official Hashtags Matter</h3>

<p>Using the approved hashtags connects your content to the trending national conversation. During National Day, these hashtags consistently rank among the top trending topics on X (formerly Twitter), Instagram, TikTok, and Snapchat in Saudi Arabia. Brands that use official hashtags benefit from organic amplification — their content appears alongside millions of celebratory posts without additional advertising investment.</p>

<h3>Social Media Content Strategy</h3>

<p>Effective National Day 95 social media content goes beyond simply posting a green-themed graphic. The most impactful content connects the five core values to your brand's story, features employees participating in celebrations, showcases National Day products, and invites audience participation through interactive formats like polls, quizzes, and user-generated content campaigns.</p>

<table>
<tbody>
<tr>
<td>Platform</td>
<td>Recommended Content Format</td>
<td>Best Practice</td>
</tr>
<tr>
<td>X (Twitter)</td>
<td>Short text + image or short video</td>
<td>Use official hashtags; post during peak hours (evening); engage with trending conversations</td>
</tr>
<tr>
<td>Instagram</td>
<td>Carousel posts, Reels, Stories</td>
<td>Use identity colors in templates; share behind-the-scenes celebration prep; use location tags</td>
</tr>
<tr>
<td>TikTok</td>
<td>Short-form video (15-60 seconds)</td>
<td>Trending audio + National Day themes; employee participation videos; product showcases</td>
</tr>
<tr>
<td>Snapchat</td>
<td>Stories, Filters, Lenses</td>
<td>Leverage Saudi Arabia's massive Snapchat user base; create AR experiences with National Day elements</td>
</tr>
<tr>
<td>LinkedIn</td>
<td>Long-form posts, articles</td>
<td>Focus on corporate celebrations, employee recognition, and business-oriented National Day content</td>
</tr>
</tbody>
</table>

<blockquote>
<p><strong>Timing strategy:</strong> Begin posting National Day 95 content at least two weeks before September 23 to build anticipation. Intensify posting frequency during the celebration week, and follow up with recap content in the days after. This extended campaign window maximizes reach and engagement across the full celebration period.</p>
</blockquote>

<h2>8. The Official Identity Guide: Your Essential Download</h2>

<p>The Saudi National Day Authority publishes a comprehensive identity guide that serves as the definitive reference for all National Day 95 visual applications. This guide is freely available for download and should be the starting point for every designer, marketer, and business planning National Day content or products.</p>

<h3>What the Identity Guide Contains</h3>

<ul>
<li><strong>Logo Files:</strong> Vector and raster versions of the verbal and visual logos in all approved color variations.</li>
<li><strong>Color Specifications:</strong> Complete color palette with Pantone, CMYK, RGB, and HEX values for every approved color.</li>
<li><strong>Typography Package:</strong> Approved font files and usage guidelines for Arabic and English text.</li>
<li><strong>Pattern Library:</strong> Geometric patterns and motifs in scalable vector format with application rules.</li>
<li><strong>Ready Templates:</strong> Pre-designed layouts for social media, print, signage, and digital applications.</li>
<li><strong>Video Guidelines:</strong> Animation standards, approved transitions, and audio identity specifications.</li>
<li><strong>Usage Rules:</strong> Detailed do's and don'ts covering logo placement, clear space, color usage, and prohibited modifications.</li>
<li><strong>Application Examples:</strong> Real-world examples showing correct identity application across various media.</li>
</ul>

<blockquote>
<p><strong>Critical reminder:</strong> Always download the official identity guide from the authorized source. Using unofficial or outdated identity assets can result in non-compliant materials that may need to be reprinted or redesigned — costing time and money. The official guide ensures your work meets the national standard from the start.</p>
</blockquote>

<h2>9. Window Advertising Agency's National Day 95 Products and Services</h2>

<p>Window Advertising Agency is your complete partner for Saudi National Day 95 celebrations. With years of experience producing commemorative products and organizing corporate celebrations, Window delivers professional-quality results that fully comply with the official identity guide while reflecting your unique brand personality.</p>

<h3>Our National Day 95 Product Range</h3>

<table>
<tbody>
<tr>
<td>Product Category</td>
<td>Items Available</td>
<td>Customization Options</td>
</tr>
<tr>
<td>Flags</td>
<td>Desk flags, car flags, building flags, giant flags</td>
<td>All standard sizes; custom sizes available; indoor and outdoor materials</td>
</tr>
<tr>
<td>Wearables</td>
<td>Scarves, t-shirts, brooches, medals</td>
<td>Custom designs; company logo integration; bulk orders with tiered pricing</td>
</tr>
<tr>
<td>Stationery &amp; Gifts</td>
<td>Stickers, gift boxes, printed bags</td>
<td>Branded packaging; corporate gift sets; VIP premium options</td>
</tr>
<tr>
<td>Display Materials</td>
<td>Roll-ups, pop-up banners, balloons</td>
<td>Custom sizes; single or double-sided; indoor and outdoor grade</td>
</tr>
<tr>
<td>Corporate Celebrations</td>
<td>Full event organization</td>
<td>Venue decoration; employee gifts; branded activities; photography/videography</td>
</tr>
</tbody>
</table>

<h3>Why Choose Window for Your National Day 95 Needs</h3>

<ul>
<li><strong>Identity compliance:</strong> Every product is designed strictly according to the official National Day 95 identity guide — no guesswork, no compliance risks.</li>
<li><strong>Production quality:</strong> We use premium materials and professional printing processes that ensure your National Day products look exceptional and last.</li>
<li><strong>Full-service approach:</strong> From initial design to final delivery, Window handles the entire production chain — you focus on celebrating while we handle the logistics.</li>
<li><strong>Bulk order capability:</strong> Whether you need 50 gift boxes for VIP clients or 5,000 flags for a public event, our production capacity scales to meet your requirements.</li>
<li><strong>Corporate celebration expertise:</strong> Window organizes complete National Day events for businesses — including venue decoration, themed activities, employee gift distribution, and professional documentation through photography and videography.</li>
</ul>

<h2>Frequently Asked Questions</h2>

<h3>What does the Saudi National Day 95 slogan mean?</h3>

<p>The slogan "Pride in Our Nature" (عزّنا بطبعنا) communicates that the pride Saudi citizens feel is deeply rooted and innate — not performed or manufactured. It celebrates the authentic national identity that has been cultivated over 95 years of unity, sovereignty, and continuous development.</p>

<h3>How does the National Day 95 identity align with Saudi Vision 2030?</h3>

<p>The identity directly supports Vision 2030 by emphasizing ambition, solidarity, and heritage — core pillars of the Kingdom's transformation strategy. It reinforces the message that progress and modernization are built upon authentic Saudi values, not at their expense.</p>

<h3>What is the difference between the verbal and visual logo?</h3>

<p>The verbal logo is the calligraphic rendering of the slogan "عزّنا بطبعنا," designed with specific typographic rules. The visual logo is the geometric symbol incorporating Saudi heritage patterns and the number 95. Both components must be used together as defined in the official identity guide.</p>

<h3>Can companies and private businesses use the National Day 95 identity?</h3>

<p>Yes. The identity is available for use by companies, government entities, educational institutions, and individuals. All usage must comply with the official identity guide — including approved colors, fonts, logo placement, and clear space requirements. The identity must not be altered, distorted, or combined with unauthorized elements.</p>

<h3>Why are official hashtags important for National Day 95 campaigns?</h3>

<p>Official hashtags like #SaudiNationalDay95 unify the national conversation across social platforms, ensuring maximum visibility during the celebration period. Your content appears alongside millions of celebratory posts, dramatically increasing organic reach and engagement without additional advertising spend.</p>

<h3>What are the five core values of the National Day 95 identity?</h3>

<p>The five values are: Generosity (الكرم) — the tradition of hospitality and giving; Ambition (الطموح) — the drive toward Vision 2030; Heritage (الإرث) — honoring 95 years of legacy; Benevolence (الخير) — goodwill and compassion; and Solidarity (التلاحم) — the unity of the Saudi people under one banner.</p>

<h3>How can I integrate the National Day 95 identity into my products and marketing?</h3>

<p>Start by downloading the official identity guide, which contains the approved color palette, fonts, geometric patterns, and templates. Apply the identity to print materials, digital content, and physical products. Working with a professional agency like Window ensures compliance with the guide while creating unique, branded applications that stand out.</p>

<h3>What National Day 95 products and services does Window Advertising Agency offer?</h3>

<p>Window offers a full range of National Day 95 products: commemorative gifts and gift boxes, Saudi flags in all sizes, scarves and brooches, medals and stickers, printed bags, roll-up and pop-up banners, balloons, custom t-shirts, and complete corporate celebration organization. All products are designed in strict compliance with the official identity guide.</p>

<h2>Ready to Celebrate National Day 95 with Window?</h2>

<p>From commemorative gifts to full corporate celebrations — Window Advertising Agency delivers National Day 95 products and services that honor the identity, reflect your brand, and create lasting impressions.</p>

<p><a href="https://windowadv.com/en/contact">Request Your National Day 95 Quote</a></p>
HTML;
    }

    public function down(): void
    {
        $newSlug = 'saudi-national-day-95-values-designs';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
