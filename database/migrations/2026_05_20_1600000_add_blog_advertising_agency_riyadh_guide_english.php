<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', 'advertising-agency-riyadh-guide')->first();
        if (!$blog) {
            return;
        }

        $blogId = $blog->id;

        $enTitle = 'The #1 Destination for Advertising in Riyadh: Window Agency\'s Complete Services Guide';
        $enMetaTitle = 'Best Advertising Agency in Riyadh | Complete Services Guide by Window Agency';
        $enMetaDescription = 'Discover why Window Agency is the #1 destination for advertising in Riyadh. Integrated services including signage, printing, exhibitions, events, promotional gifts, visual identity, and digital marketing with 25+ years of experience.';
        $enKeywords = 'advertising agency Riyadh,signage company Riyadh,printing Riyadh,exhibition setup,promotional gifts,visual identity,digital marketing Saudi Arabia';

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
<p>In a city where projects accelerate and brands compete fiercely for visibility and distinction, advertising is no longer a supporting service — it has become a decisive element in building presence, shaping perception, and achieving market reach. From the heart of Riyadh, Window Advertising Agency stands as a comprehensive professional model that unites signage, printing, exhibition setup, event management, digital marketing, and promotional gifts under one roof, backed by over 25 years of experience in the Saudi market.</p>
</blockquote>

<h2>Window: The #1 Destination for Anyone Searching for Advertising in Riyadh</h2>

<p>When you search for "advertising agency in Riyadh" or "advertising company" on Google, you'll find dozens of results. But the difference between a standard service provider and an integrated agency is the difference between temporary work and a business that grows. Window is not an ordinary advertising shop or a company with disconnected services — it is an integrated system managed with strategic thinking.</p>

<h3>What Makes Window Different from Other Advertising Providers?</h3>

<p>The fundamental differentiator is integration. While most advertising shops offer one or two services (printing only, or signage only), Window provides a complete ecosystem starting from understanding the project and its objectives, extending to cover every touchpoint between the brand and its audience. This integration ensures mental image consistency and saves clients the hassle of coordinating between multiple providers.</p>

<blockquote>
<p><strong>By the Numbers:</strong> Window Agency has served hundreds of companies across various sectors — from startups to major enterprises — producing over 10,000 advertising signs and executing more than 50 km of project hoarding across the Kingdom.</p>
</blockquote>

<h2>Professional Signage Company in Riyadh</h2>

<p>Advertising signs are any commercial project's first visual facade. They are what customers see before entering a store or contacting you. Therefore, sign quality is not a luxury but a competitive necessity that determines the first impression — one you may never get a second chance to change.</p>

<h3>Types of Signage Window Produces</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Sign Type</th>
<th>Application</th>
<th>Advantages</th>
</tr>
</thead>
<tbody>
<tr>
<td>Channel Letters (Illuminated)</td>
<td>Storefronts and corporate facades</td>
<td>High elegance, distinctive nighttime visibility</td>
</tr>
<tr>
<td>Light Box</td>
<td>Indoor and outdoor</td>
<td>Uniform illumination, cost-effective</td>
</tr>
<tr>
<td>Pylon Signs</td>
<td>Gas stations, commercial complexes</td>
<td>Height and visibility from long distances</td>
</tr>
<tr>
<td>Cladding</td>
<td>Complete building facades</td>
<td>Comprehensive coverage, protection and aesthetics</td>
</tr>
<tr>
<td>LED Screens</td>
<td>Strategic locations</td>
<td>Dynamic content, changing displays</td>
</tr>
<tr>
<td>Wayfinding Signs</td>
<td>Malls, hospitals, universities</td>
<td>Traffic organization and identity reinforcement</td>
</tr>
</tbody>
</table>
</figure>

<h3>Window's Manufacturing Process</h3>

<p>Every sign undergoes five quality-assured stages: 3D design and approval, CNC cutting and shaping, electrostatic powder coating for weather resistance, high-efficiency LED module installation, and 48-hour quality testing before delivery. All performed in Window's own 2,000m² manufacturing facility.</p>

<blockquote>
<p><strong>Notice:</strong> Advertising signs in Riyadh are subject to strict municipal regulations regarding dimensions, materials, and lighting. Window handles all licensing and compliance procedures to ensure clients face no violations or fines.</p>
</blockquote>

<h2>Project Hoarding and Site Fencing: Advertising and Investment Combined</h2>

<p>Project hoarding is not merely safety barriers around construction sites. In Riyadh, professional project hoarding has become a powerful marketing tool that transforms construction fencing into massive billboards seen by thousands of eyes daily.</p>

<h3>Why Do Major Companies Invest in Project Hoarding?</h3>

<p>Because it achieves three objectives simultaneously: compliance with municipal requirements mandating construction site fencing, site and pedestrian protection, and marketing investment by displaying the project identity, developer, and brand across massive surfaces that the public passes daily.</p>

<blockquote>
<p><strong>Window's Track Record:</strong> Over 50 km of project hoarding executed for clients including Diriyah Museums, National Housing Company (NHC), Al-Bawani, and Al-Rashid. Professional execution encompassing concrete foundations, steel structures, and advertising banners.</p>
</blockquote>

<h2>Printing in Riyadh: Highest Quality at Maximum Speed</h2>

<p>Printing is not merely transferring a design onto paper. Professional printing preserves color accuracy, material quality, and ensures the printing type matches the intended use. At Window, we provide all printing types that any commercial project needs.</p>

<h3>Window's Printing Services</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Print Type</th>
<th>Products</th>
<th>Best For</th>
</tr>
</thead>
<tbody>
<tr>
<td>Digital</td>
<td>Brochures, flyers, posters</td>
<td>Small to medium quantities, fast turnaround</td>
</tr>
<tr>
<td>Offset</td>
<td>Catalogs, magazines, company profiles</td>
<td>Large quantities at exceptional quality</td>
</tr>
<tr>
<td>Large Format</td>
<td>Banners, roll-ups, exhibition backdrops</td>
<td>Oversized materials</td>
</tr>
<tr>
<td>UV</td>
<td>Printing on rigid and varied surfaces</td>
<td>Gifts, indoor signs, decor</td>
</tr>
<tr>
<td>Thermal / DTF</td>
<td>Clothing, uniforms, caps</td>
<td>Fabric printing</td>
</tr>
<tr>
<td>Laser</td>
<td>Business cards, luxury invitations</td>
<td>Fine details and premium finishes</td>
</tr>
</tbody>
</table>
</figure>

<blockquote>
<p><strong>Window Advantage:</strong> Design and printing under one roof. The same design team that created your visual identity oversees printing, ensuring color consistency and quality across all printed materials.</p>
</blockquote>

<h2>Exhibition and Conference Setup</h2>

<p>Exhibitions and conferences in Riyadh are experiencing tremendous growth as Vision 2030 drives the events and business sector. Professional exhibition participation is not a cost — it's a direct opportunity to build relationships, showcase products, and close deals.</p>

<h3>What Window Delivers in Exhibition Setup</h3>

<p>Window provides end-to-end exhibition solutions: 3D booth design aligned with the client's visual identity, booth manufacturing and on-site installation, production of all accompanying promotional materials (roll-ups, brochures, business cards, bags), display screen and professional lighting installation, and interactive elements that attract visitors and engage them in the experience.</p>

<blockquote>
<p><strong>Proven Track Record:</strong> Window has set up booths at the Kingdom's most prominent exhibitions and conferences, from real estate expos to technology and healthcare conferences. Each booth is designed to reflect the client's identity and achieve their marketing objectives.</p>
</blockquote>

<h2>Event Management: Corporate Events, Graduations, and Celebrations</h2>

<p>Events have become an essential part of Saudi companies' marketing and communication strategies. Whether it's a product launch, graduation ceremony, open day, or annual corporate celebration, every event needs professional visual preparation that reflects the organizer's caliber and leaves an unforgettable impression.</p>

<h3>Window's Event Services</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Service</th>
<th>Details</th>
</tr>
</thead>
<tbody>
<tr>
<td>Event Identity Design</td>
<td>Custom logo, colors, integrated graphic elements</td>
</tr>
<tr>
<td>Stage and Backdrops</td>
<td>Stage design and execution with printed and illuminated backdrops</td>
</tr>
<tr>
<td>Signage and Wayfinding</td>
<td>Welcome signs, directional signs, speaker name boards</td>
</tr>
<tr>
<td>Promotional Materials</td>
<td>Invitations, brochures, bags, certificates</td>
</tr>
<tr>
<td>Commemorative Gifts</td>
<td>Custom gifts branded with event logo</td>
</tr>
<tr>
<td>Visual Coverage</td>
<td>Display screens, professional lighting</td>
</tr>
</tbody>
</table>
</figure>

<h2>Promotional Gifts Company in Riyadh: Gifts That Carry Your Identity</h2>

<p>Promotional gifts are not just items distributed at exhibitions and events. A professional promotional gift is a smart marketing tool that carries your brand and stays with the customer for an extended period, meaning repeated exposure to your logo without additional advertising costs.</p>

<h3>Types of Promotional Gifts</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Category</th>
<th>Examples</th>
<th>Best For</th>
</tr>
</thead>
<tbody>
<tr>
<td>Office Gifts</td>
<td>Pens, notebooks, phone stands, mugs</td>
<td>B2B clients, conferences</td>
</tr>
<tr>
<td>Tech Gifts</td>
<td>USB drives, power banks, Bluetooth speakers</td>
<td>Tech companies, exhibitions</td>
</tr>
<tr>
<td>Promotional Apparel</td>
<td>T-shirts, caps, jackets</td>
<td>Events, team building</td>
</tr>
<tr>
<td>Premium Gifts</td>
<td>Pen sets, leather wallets, watches</td>
<td>VIP clients, partnerships</td>
</tr>
<tr>
<td>Seasonal Gifts</td>
<td>Dates, incense, prayer beads, perfumes</td>
<td>Ramadan, National Day, holidays</td>
</tr>
</tbody>
</table>
</figure>

<blockquote>
<p><strong>Full Integration:</strong> Window doesn't just sell ready-made gifts. We design gifts from scratch to match your visual identity, print with high quality, and package professionally to reflect your brand's caliber.</p>
</blockquote>

<h2>Creative Visual Identity Design</h2>

<p>Visual identity is the foundation upon which all advertising services are built. Without a cohesive visual identity, every sign, every printed piece, and every social post is a disconnected fragment that builds nothing cumulative. At Window, we always start with identity.</p>

<h3>Window's Identity Building Process</h3>

<p>Visual identity development follows a structured process: first, a discovery workshop to understand the project, its values, audience, and competitors; then research and visual analysis to determine the creative direction; followed by the design phase covering logo, colors, typography, and graphic elements; then production of the Brand Book ensuring consistency; and finally, identity application across all touchpoints: signs, prints, digital accounts, vehicles, and uniforms.</p>

<blockquote>
<p><strong>The Difference:</strong> Because Window has a production department alongside its design department, the identity we build doesn't remain a computer file — it immediately transforms into visible reality on signs, printed materials, and promotional items.</p>
</blockquote>

<h2>Digital Marketing and Social Media Management</h2>

<p>In a world where everyone is digitally connected, no business can rely solely on traditional presence. Digital marketing is the channel that reaches your customers wherever they are: on their phones, in search engines, and across social media platforms.</p>

<h3>Window's Digital Marketing Services</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Service</th>
<th>What It Includes</th>
<th>Expected Result</th>
</tr>
</thead>
<tbody>
<tr>
<td>Social Media Management</td>
<td>Content plan, design, publishing, engagement</td>
<td>Organic growth and community building</td>
</tr>
<tr>
<td>Paid Advertising</td>
<td>Google Ads, Meta Ads, Snapchat Ads</td>
<td>Targeted reach and conversions</td>
</tr>
<tr>
<td>SEO</td>
<td>Technical audit, content, backlinks</td>
<td>Sustainable organic visibility</td>
</tr>
<tr>
<td>Content Production</td>
<td>Photography, video, motion graphics</td>
<td>Professional content reflecting identity</td>
</tr>
<tr>
<td>Website Design</td>
<td>Responsive sites, landing pages</td>
<td>Professional user experience</td>
</tr>
</tbody>
</table>
</figure>

<blockquote>
<p><strong>True Integration:</strong> What distinguishes Window's digital marketing is its seamless connection with traditional services. The same team that designs your sign designs your Instagram posts, ensuring complete visual consistency across all channels.</p>
</blockquote>

<h2>Why Is Window the Most Comprehensive Choice in Riyadh?</h2>

<p>The question isn't "Is Window good at one service?" but rather "Where can I get everything I need under one roof with high quality and complete consistency?" This is where the real difference lies.</p>

<h3>Comparison: Window vs. Multiple Providers</h3>

<figure class="table">
<table>
<thead>
<tr>
<th>Criteria</th>
<th>Multiple Providers</th>
<th>Window Agency</th>
</tr>
</thead>
<tbody>
<tr>
<td>Visual Consistency</td>
<td>Difficult to achieve, requires constant oversight</td>
<td>Guaranteed — one team manages everything</td>
</tr>
<tr>
<td>Coordination</td>
<td>Client bears coordination burden</td>
<td>Single point of contact for all services</td>
</tr>
<tr>
<td>Quality</td>
<td>Varies from provider to provider</td>
<td>Unified quality standards across all services</td>
</tr>
<tr>
<td>Total Cost</td>
<td>May seem lower but higher due to waste and repetition</td>
<td>More efficient — each service builds on the last</td>
</tr>
<tr>
<td>Speed</td>
<td>Each provider has their own schedule</td>
<td>Internal coordination accelerates execution</td>
</tr>
<tr>
<td>Continuity</td>
<td>Teams and approaches change with each provider</td>
<td>Consistent team that knows your project and grows with you</td>
</tr>
</tbody>
</table>
</figure>

<blockquote>
<p><strong>Bottom Line:</strong> Window isn't the cheapest for every individual service, but it's the most cost-effective and smartest as an integrated system. Every riyal spent builds on what came before instead of starting from scratch.</p>
</blockquote>

<h2>Everything You Need in Advertising Under One Roof</h2>

<p>Contact Window Agency today and receive a free consultation where we build a comprehensive plan for your business.</p>

<p><a href="https://windowadv.com/en/contact">Book Your Free Consultation</a></p>

<h2>Frequently Asked Questions</h2>

<h3>What services does Window Agency offer in Riyadh?</h3>

<p>Window provides an integrated ecosystem including all signage types, project hoarding, full-range printing, exhibition and conference setup, event management, promotional gifts, visual identity design, and digital marketing with social media management.</p>

<h3>Why choose an integrated agency instead of separate providers?</h3>

<p>An integrated agency ensures visual identity consistency across all channels, saves you the burden of coordinating between different providers, and builds cumulative value since each service complements the others instead of starting from scratch.</p>

<h3>Does Window handle municipal sign regulations?</h3>

<p>Yes, Window manages all licensing and compliance procedures for municipal signage and project hoarding regulations, protecting clients from violations and fines.</p>

<h3>What printing types does Window offer?</h3>

<p>We offer digital, offset, large format, UV, thermal, DTF, and laser printing. Each type serves a specific purpose and we help clients choose the best option for their needs.</p>

<h3>Can promotional gifts be custom-designed with my company logo?</h3>

<p>Yes, Window designs and produces fully customized promotional gifts: from design and selection to high-quality printing and professional packaging, aligned with your visual identity and the occasion.</p>

<h3>How long does Window take to set up an exhibition booth?</h3>

<p>It depends on booth size and complexity. Typically, the design process begins 4 to 6 weeks before the exhibition, with expedited execution available for urgent projects thanks to our in-house factory.</p>

<h3>Does Window also offer digital marketing services?</h3>

<p>Yes, Window provides comprehensive digital marketing services including social media management, paid advertising, SEO, content production, and website design. The key advantage is seamless integration between digital and traditional services under unified management.</p>
HTML;
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', 'advertising-agency-riyadh-guide')->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
