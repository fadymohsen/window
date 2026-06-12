<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $oldSlug = 'hoy-alyom-alotny-alsaaody-al95-rmz-asal-ofkhr-otmoh';
        $newSlug = 'saudi-national-day-95-identity';
        $oldEnSlug = 'hoy-alyom-alotny-alsaaody-al95-rmz-asal-ofkhr-otmoh';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('slug', $oldSlug)->first();
            if (!$blog) {
                $blog = DB::table('blogs')->where('id', 41)->first();
            }
            if (!$blog) { return; }
            if (!DB::table('blogs')->where('slug', $newSlug)->where('id', '!=', $blog->id)->exists()) {
                DB::table('blogs')->where('id', $blog->id)->update(['slug' => $newSlug]);
            }
        }
        $blogId = $blog->id;

        // Redirect from old slug
        if (!DB::table('slug_redirects')->where('from_slug', $oldSlug)->where('type', 'blog')->exists()) {
            DB::table('slug_redirects')->insert([
                'from_slug' => $oldSlug,
                'to_slug'   => $newSlug,
                'type'      => 'blog',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Redirect from old EN slug
        if (!DB::table('slug_redirects')->where('from_slug', $oldEnSlug)->where('type', 'blog')->exists()) {
            DB::table('slug_redirects')->insert([
                'from_slug' => $oldEnSlug,
                'to_slug'   => $newSlug,
                'type'      => 'blog',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $enTitle           = 'Saudi National Day 95 Identity: A Symbol of Heritage, Pride and Ambition';
        $enMetaTitle       = 'Saudi National Day 95 Identity: Heritage, Pride & Ambition – Window Agency';
        $enMetaDescription = 'Discover the official visual identity of the 95th Saudi National Day under the slogan Pride in Our Nature. Learn about the logo, color palette, fonts, templates, and how Window Advertising Agency helps you apply the identity in designs, prints, and events.';
        $enKeywords        = 'Saudi National Day 95 identity,عزنا بطبعنا,Pride in Our Nature,Saudi National Day logo,Saudi National Day visual identity,Saudi National Day 95 design,national day color palette,GEA identity,Window Agency';

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
<p>On August 4, 2025, Turki Al-Sheikh — Chairman of the General Entertainment Authority (GEA) — officially unveiled the visual identity for the 95th Saudi National Day under the slogan "Pride in Our Nature" (عزّنا بطبعنا). This identity is far more than a logo or a color scheme. It is a comprehensive visual system designed to unite the entire Kingdom under one cohesive look during the national celebration, linking the deep-rooted values of Saudi heritage — generosity, chivalry, and authenticity — with the forward-looking ambition of Vision 2030. In this article, we break down every component of the official identity and explain how <strong>Window Advertising Agency</strong> can help your business apply it professionally across designs, prints, and events.</p>
</blockquote>

<h2>What Is the Official Saudi National Day 95 Identity?</h2>

<p>Every year, the General Entertainment Authority releases an official visual identity for the Saudi National Day. This identity serves as the unified visual language that all government entities, private businesses, and individuals are encouraged to adopt during the celebration period. It ensures that the entire nation projects a consistent, recognizable image — from street banners and government buildings to social media posts and corporate events.</p>

<p>The 95th Saudi National Day identity was announced by Turki Al-Sheikh through official GEA channels and is available for download from the dedicated portal at nd.gea.gov.sa. The identity package includes a verbal and visual logo, an official color palette derived from the national flag, approved Arabic typography, official hashtags, ready-made design templates, illustrations, and video production guidelines.</p>

<blockquote>
<p><strong>Official source:</strong> The complete identity guide, including all assets and usage rules, is available for free download at nd.gea.gov.sa — the official Saudi National Day portal managed by the General Entertainment Authority.</p>
</blockquote>

<h2>The Slogan: "Pride in Our Nature" (عزّنا بطبعنا)</h2>

<p>The Arabic slogan for the 95th Saudi National Day is عزّنا بطبعنا, which translates to "Pride in Our Nature." This phrase carries a powerful message: the pride of the Saudi people is not something imposed or artificial — it is an inherent quality, deeply woven into the national character across generations.</p>

<p>The slogan connects past and present in a single expression. It honors the timeless values that have defined Saudi society — generosity toward guests, chivalry in conduct, loyalty to community, and resilience in the face of challenge — while simultaneously pointing toward the ambitious future the Kingdom is building under Vision 2030. It communicates that the same authentic spirit that shaped the nation's history is now driving its transformation into a global leader.</p>

<blockquote>
<p><strong>Official hashtags:</strong> When posting content related to the 95th Saudi National Day, use the official hashtags #عزنا_بطبعنا and #اليوم_الوطني_السعودي_95 to align with the national conversation and maximize visibility.</p>
</blockquote>

<h3>Why the Slogan Matters for Businesses</h3>

<p>For businesses operating in Saudi Arabia, understanding and respecting the national day slogan is essential. Consumers notice when brands use the official identity correctly — and they also notice when brands get it wrong or use it carelessly. Aligning your marketing materials with the official slogan and visual identity signals respect for the occasion and positions your brand as culturally aware and nationally engaged.</p>

<h2>Components of the Official Visual Identity</h2>

<p>The 95th Saudi National Day identity is a comprehensive visual system with multiple components, each designed to work together and ensure visual consistency across all applications. Below is a breakdown of every element included in the official identity package.</p>

<table>
<tbody>
<tr>
<td>Component</td>
<td>Description</td>
</tr>
<tr>
<td>Verbal Logo</td>
<td>The Arabic calligraphic rendering of the slogan "عزّنا بطبعنا" in the officially approved typographic style</td>
</tr>
<tr>
<td>Visual Logo</td>
<td>The graphic symbol representing the 95th National Day, designed for use across all media and sizes</td>
</tr>
<tr>
<td>Color Palette</td>
<td>Official colors derived from the Saudi national flag, with defined primary and secondary tones for consistent usage</td>
</tr>
<tr>
<td>Arabic Fonts</td>
<td>Approved Arabic typefaces specified for all National Day materials, ensuring typographic unity</td>
</tr>
<tr>
<td>Design Templates</td>
<td>Ready-made templates for social media, banners, posters, and other common formats</td>
</tr>
<tr>
<td>Illustrations</td>
<td>Official illustrations and graphic elements that can be used in designs and decorations</td>
</tr>
<tr>
<td>Video Guidelines</td>
<td>Production guidelines for video content, including motion graphics specifications and visual treatments</td>
</tr>
<tr>
<td>Official Hashtags</td>
<td>#عزنا_بطبعنا and #اليوم_الوطني_السعودي_95</td>
</tr>
</tbody>
</table>

<h3>The Verbal and Visual Logo</h3>

<p>The logo system for the 95th Saudi National Day consists of two integrated elements: the verbal logo (the typographic rendering of the slogan) and the visual logo (the graphic mark). Together, they form the central visual anchor of the entire identity. The official guide specifies clear space requirements, minimum sizes, and approved color variations to ensure the logo always appears with proper clarity and impact, whether on a small social media post or a large outdoor banner.</p>

<h3>The Official Color Palette</h3>

<p>The color palette for the 95th National Day draws directly from the colors of the Saudi national flag — green and white — along with carefully selected complementary tones. Every shade has specific color values defined in the identity guide (CMYK for print, RGB and HEX for digital) to ensure exact reproduction across all media. Using the correct colors is one of the simplest yet most important steps in applying the identity properly.</p>

<blockquote>
<p><strong>Consistency note:</strong> Using colors that merely look similar to the official palette is not sufficient. The identity guide provides exact color codes that must be followed to achieve visual unity. Even slight deviations can make materials look unofficial or inconsistent when placed alongside correctly branded content.</p>
</blockquote>

<h3>Approved Arabic Typography</h3>

<p>Typography is a critical element of any visual identity, and the 95th National Day is no exception. The GEA has specified approved Arabic fonts that must be used in all official and aligned materials. These fonts have been chosen to complement the logo and color palette, creating a cohesive visual experience. The identity guide includes details on font weights, sizes, and hierarchy for headlines, body text, and supporting elements.</p>

<h3>Ready-Made Design Templates</h3>

<p>To make it easy for businesses and individuals to participate in the celebration, the official identity package includes ready-made templates for common design formats. These templates cover social media posts, story formats, horizontal banners, vertical banners, posters, and more. They are designed to be customizable — allowing users to add their own content while maintaining the integrity of the official visual identity.</p>

<h3>Illustrations and Video Production Guidelines</h3>

<p>The identity also includes a set of official illustrations and graphic elements that can be incorporated into designs and physical decorations. For video content, the GEA provides production guidelines covering motion graphics, visual transitions, color grading, and other specifications to ensure that video materials align with the overall identity. These guidelines are particularly valuable for businesses producing promotional or celebratory video content around the National Day.</p>

<h2>Goals Behind the 95th Saudi National Day Identity</h2>

<p>The official visual identity is not created merely for aesthetic purposes. It serves specific strategic goals that reflect the values and direction of the Kingdom. Understanding these goals helps businesses and organizations apply the identity with genuine intention rather than superficial compliance.</p>

<h3>Fostering Unity and National Belonging</h3>

<p>The primary goal of the identity is to create a shared visual experience across the entire Kingdom. When every city, business, and institution uses the same visual language, it creates a powerful sense of unity and collective celebration. Citizens and residents see the same colors, logos, and messages everywhere they go — reinforcing the feeling that the entire nation is celebrating together as one.</p>

<h3>Ensuring Unified Visual Usage</h3>

<p>Without an official identity, National Day celebrations would produce a fragmented visual landscape — every business and entity creating their own interpretation, resulting in inconsistency and diluted impact. The official identity solves this by providing a single, authoritative visual system that everyone can follow, ensuring that the national celebration looks coordinated and professional from coast to coast.</p>

<h3>Showcasing Heritage and Ambition Together</h3>

<p>The 95th National Day identity deliberately bridges the past and the future. It honors the values that have defined Saudi Arabia for generations — including generosity, chivalry, courage, and community — while simultaneously expressing the Kingdom's ambition for the future under Vision 2030. This dual focus makes the identity relevant to all generations, from elders who carry living memory of the nation's founding era to young Saudis who are building its future.</p>

<blockquote>
<p><strong>Vision 2030 connection:</strong> The identity is designed to reflect not only historical pride but also the Kingdom's forward momentum. Businesses that understand this balance — honoring the past while embracing innovation — will find their National Day marketing resonates more deeply with Saudi audiences.</p>
</blockquote>

<h2>How to Download and Use the Official Identity</h2>

<p>The General Entertainment Authority has made the complete identity package freely available through the official Saudi National Day portal. Here is a step-by-step guide to accessing and using the official materials correctly.</p>

<ol>
<li><strong>Visit the official portal:</strong> Go to nd.gea.gov.sa, the dedicated website for the Saudi National Day identity managed by the GEA.</li>
<li><strong>Download the identity guide:</strong> The portal provides a comprehensive PDF guide that covers all usage rules, color specifications, typography guidelines, and clear space requirements.</li>
<li><strong>Download design assets:</strong> Access the logo files, templates, illustrations, and other design elements in various formats suitable for both print and digital applications.</li>
<li><strong>Review the usage rules:</strong> Before applying the identity, carefully read the usage guidelines to understand what is permitted and what must be avoided.</li>
<li><strong>Apply consistently:</strong> Use the official assets as provided, without modifying the logo, altering colors, or deviating from the approved typography.</li>
</ol>

<blockquote>
<p><strong>Important:</strong> The official identity has specific rules about how the logo can and cannot be used. Stretching, rotating, recoloring, or otherwise modifying the logo outside of the approved variations is not permitted. Businesses should follow the guidelines carefully to ensure their materials are compliant and professional.</p>
</blockquote>

<h2>Common Mistakes When Applying the National Day Identity</h2>

<p>Despite the availability of clear guidelines, many businesses make errors when applying the official National Day identity. These mistakes can make your materials look unprofessional and out of alignment with the national celebration. Here are the most common issues to avoid:</p>

<ul>
<li><strong>Using approximate colors:</strong> Choosing green or white shades that look close to the official palette but do not match the exact color codes specified in the guide.</li>
<li><strong>Modifying the logo:</strong> Stretching, compressing, adding effects, or changing the proportions of the official logo.</li>
<li><strong>Using unauthorized fonts:</strong> Substituting the approved Arabic fonts with other typefaces, breaking the visual consistency.</li>
<li><strong>Ignoring clear space:</strong> Placing text, images, or other elements too close to the logo, violating the minimum clear space requirements.</li>
<li><strong>Mixing old and new identities:</strong> Using elements from previous years' National Day identities alongside the current 95th identity.</li>
<li><strong>Low-resolution assets:</strong> Using screenshots or low-quality versions of the logo instead of the official high-resolution files.</li>
<li><strong>Incorrect hashtags:</strong> Using variations of the official hashtags instead of the exact approved versions.</li>
</ul>

<blockquote>
<p><strong>Professional tip:</strong> When in doubt about any aspect of the identity application, refer back to the official guide at nd.gea.gov.sa. If your business needs expert help applying the identity correctly, Window Advertising Agency has extensive experience in implementing national identity guidelines across all media formats.</p>
</blockquote>

<h2>Where to Apply the National Day 95 Identity</h2>

<p>The official identity is designed for use across a wide range of applications. Businesses participating in the National Day celebration should consider applying the identity across all relevant touchpoints to create a comprehensive and impactful presence.</p>

<table>
<tbody>
<tr>
<td>Application Area</td>
<td>Examples</td>
</tr>
<tr>
<td>Social Media</td>
<td>Profile images, cover photos, posts, stories, reels, and video content</td>
</tr>
<tr>
<td>Print Materials</td>
<td>Brochures, flyers, posters, banners, roll-ups, and business cards</td>
</tr>
<tr>
<td>Outdoor Advertising</td>
<td>Billboard designs, building wraps, street banners, and vehicle wraps</td>
</tr>
<tr>
<td>Interior Decoration</td>
<td>Office decorations, reception areas, window displays, and retail spaces</td>
</tr>
<tr>
<td>Events</td>
<td>Stage backdrops, signage, invitations, programs, and giveaway items</td>
</tr>
<tr>
<td>Digital Platforms</td>
<td>Website banners, email signatures, digital ads, and app interfaces</td>
</tr>
<tr>
<td>Corporate Materials</td>
<td>Presentations, internal communications, company profiles, and reports</td>
</tr>
<tr>
<td>Packaging</td>
<td>Limited-edition product packaging, gift boxes, and promotional items</td>
</tr>
</tbody>
</table>

<h2>How Window Advertising Agency Helps You Apply the Identity</h2>

<p>Downloading the official identity is the first step — but applying it professionally across all your business materials requires design expertise, production capability, and understanding of both the guidelines and your brand. This is where Window Advertising Agency provides exceptional value.</p>

<p>With over 25 years of experience in the Saudi advertising industry and a full in-house production facility, Window is uniquely positioned to help businesses implement the National Day 95 identity across every medium — from digital designs and social media content to large-format printing and event production.</p>

<h3>Design Services</h3>

<p>Window's design team creates custom National Day materials that integrate the official identity with your brand. This includes social media posts and campaigns, digital banners, presentation templates, and any other design asset you need. Every design follows the official guidelines precisely while still reflecting your unique business identity.</p>

<h3>Print Production</h3>

<p>Window operates its own printing facility, which means your National Day materials are produced with exact color matching and premium quality. From small-format items like brochures and business cards to large-format banners and building wraps, Window handles the entire process from design to delivery. In-house production also means faster turnaround and direct quality control.</p>

<h3>Event Branding</h3>

<p>If your business is hosting or participating in National Day events, Window provides complete event branding services. This includes stage design, signage, decorations, promotional materials, and giveaway items — all produced with the official identity applied correctly and consistently.</p>

<blockquote>
<p><strong>One-stop solution:</strong> Window Advertising Agency handles design, printing, and event production under one roof. This eliminates the coordination issues that arise when working with multiple vendors and ensures perfect consistency across all your National Day materials.</p>
</blockquote>

<h2>Planning Your National Day 95 Campaign: A Timeline</h2>

<p>Successful National Day campaigns require planning. Here is a recommended timeline to help your business prepare and execute an effective celebration presence.</p>

<table>
<tbody>
<tr>
<td>Timeframe</td>
<td>Action</td>
</tr>
<tr>
<td>6–8 Weeks Before</td>
<td>Download the official identity, review guidelines, and brief your design team or agency</td>
</tr>
<tr>
<td>4–6 Weeks Before</td>
<td>Finalize design concepts, approve social media content calendar, and order print materials</td>
</tr>
<tr>
<td>2–4 Weeks Before</td>
<td>Receive and install physical materials (banners, decorations), schedule social media posts</td>
</tr>
<tr>
<td>1 Week Before</td>
<td>Final review of all materials, test digital assets, prepare event logistics</td>
</tr>
<tr>
<td>National Day Week</td>
<td>Execute the campaign, engage on social media with official hashtags, host or participate in events</td>
</tr>
<tr>
<td>Post–National Day</td>
<td>Share celebration highlights, thank your audience, and archive materials for future reference</td>
</tr>
</tbody>
</table>

<blockquote>
<p><strong>Plan early:</strong> Print production takes time, especially during the National Day period when demand peaks across the Kingdom. Businesses that wait until the last minute often face production delays and limited material availability. Contact Window early to secure your production slot.</p>
</blockquote>

<h2>The Significance of the National Day Identity in Saudi Culture</h2>

<p>The Saudi National Day identity has become an important cultural element in its own right. Each year, millions of Saudis eagerly await the reveal of the new identity, discussing its design, meaning, and how it reflects the current moment in the nation's journey. The identity is worn on clothing, displayed in homes and businesses, shared across social media, and incorporated into everything from food packaging to architectural lighting.</p>

<p>For the 95th National Day, the slogan "Pride in Our Nature" resonates with a generation of Saudis who are proud of their heritage while actively building a new chapter in their nation's story. The identity captures this duality — it is rooted in tradition yet forward-looking, respectful of history yet ambitious about the future. This is the spirit that Turki Al-Sheikh and the GEA have embedded in every element of the visual system.</p>

<p>Businesses that understand this cultural significance and apply the identity thoughtfully — rather than as a mere decorative exercise — create marketing materials that genuinely connect with Saudi audiences. The difference between compliance and connection lies in understanding why the identity matters, not just how it looks.</p>

<h2>Frequently Asked Questions</h2>

<h3>What is the official slogan of the 95th Saudi National Day?</h3>

<p>The official slogan is "عزّنا بطبعنا" which translates to "Pride in Our Nature." It was announced by Turki Al-Sheikh, Chairman of the General Entertainment Authority, on August 4, 2025.</p>

<h3>Where can I download the official National Day 95 identity?</h3>

<p>The complete identity package — including logo files, color palette, fonts, templates, illustrations, and guidelines — is available for free download from the official portal at nd.gea.gov.sa.</p>

<h3>What are the official hashtags for Saudi National Day 95?</h3>

<p>The two official hashtags are #عزنا_بطبعنا and #اليوم_الوطني_السعودي_95. These should be used in all social media content related to the celebration.</p>

<h3>Can I modify the official logo for my business materials?</h3>

<p>No. The official guidelines strictly prohibit modifying the logo in any way — including stretching, recoloring, adding effects, or changing proportions. You must use the logo exactly as provided in the official asset files.</p>

<h3>What colors are included in the official palette?</h3>

<p>The color palette is derived from the Saudi national flag and includes officially defined shades of green and white along with complementary tones. Exact color codes (CMYK, RGB, HEX) are specified in the identity guide to ensure accurate reproduction.</p>

<h3>How can Window Agency help with the National Day identity?</h3>

<p>Window Advertising Agency provides comprehensive services to apply the official identity across all media — including social media designs, print materials, outdoor advertising, event branding, and corporate materials. With in-house design and production capabilities, Window ensures accurate, high-quality implementation.</p>

<h3>When should I start preparing my National Day materials?</h3>

<p>We recommend starting at least 6 to 8 weeks before the National Day. This allows time for design development, approvals, print production, and installation. Demand for print services peaks during this period, so early planning avoids delays.</p>

<h2>Apply the Saudi National Day 95 Identity Professionally with Window Agency</h2>

<p>From designs and prints to event branding — Window Advertising Agency helps your business celebrate the 95th National Day with the official identity applied correctly across every medium.</p>

<p><a href="https://windowadv.com/en/contact">Contact Us Today</a></p>
HTML;
    }

    public function down(): void
    {
        $newSlug = 'saudi-national-day-95-identity';
        $oldSlug = 'hoy-alyom-alotny-alsaaody-al95-rmz-asal-ofkhr-otmoh';

        $blog = DB::table('blogs')->where('slug', $newSlug)->first();
        if ($blog) {
            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $oldSlug]);

            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }

        DB::table('slug_redirects')
            ->where('from_slug', $oldSlug)
            ->where('type', 'blog')
            ->delete();
    }
};
