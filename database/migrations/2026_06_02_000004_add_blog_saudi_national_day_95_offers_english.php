<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', 'saudi-national-day-95-offers')->first();
        if (!$blog) {
            return;
        }

        $blogId = $blog->id;

        // Add EN redirect from old EN slug
        $oldEnSlug = 'ako-aarod-alyom-alotny-95-mn-okal-oyndo-lldaaay-oalaaalan';
        DB::table('slug_redirects')->where('from_slug', $oldEnSlug)->where('type', 'blog')->delete();
        DB::table('slug_redirects')->insert([
            'from_slug' => $oldEnSlug,
            'to_slug' => 'saudi-national-day-95-offers',
            'type' => 'blog',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $enTitle = 'Saudi National Day 95 Offers from Window Advertising Agency: Up to 70% Off on Marketing Services';
        $enMetaTitle = 'Saudi National Day 95 Offers | Up to 70% Off Marketing Services – Window Agency';
        $enMetaDescription = 'Celebrate Saudi National Day 95 with exclusive offers from Window Advertising Agency. Up to 70% off social media management, website design, promotional videos, designs, and company profiles. Limited-time deals for the 95th Saudi National Day.';
        $enKeywords = 'Saudi National Day 95 offers,National Day deals,advertising agency Saudi Arabia,social media management offer,website design deal,promotional video Saudi,company profile offer,Window Agency';

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
<p>The Kingdom of Saudi Arabia celebrates its 95th National Day under the inspiring slogan "Our Pride is Our Nature" — and Window Advertising Agency joins the celebration with exceptional offers across all marketing and advertising services. Whether you are launching a new brand, building your digital presence, or seeking professional marketing materials, our National Day 95 packages deliver premium quality at prices reduced by up to 70%. These limited-time offers cover social media management, website design, promotional videos, social media designs, and company profiles — everything your business needs to thrive in the Saudi market.</p>
</blockquote>

<h2>Why Saudi National Day 95 Is a Strategic Opportunity for Your Business</h2>

<p>Saudi National Day is far more than a public holiday. It represents one of the most powerful commercial and emotional moments in the Kingdom's calendar. Consumer spending surges, national pride drives engagement, and businesses that align their marketing with the celebration enjoy significantly higher visibility and customer connection.</p>

<p>The 95th Saudi National Day, themed around the concept of authentic national pride, creates a unique window where businesses can launch campaigns, refresh their brand presence, and invest in marketing infrastructure at a fraction of the regular cost. Window Advertising Agency has designed its National Day 95 offers specifically to help Saudi businesses capitalize on this momentum.</p>

<blockquote>
<p><strong>Market Insight:</strong> Studies show that businesses launching marketing campaigns around Saudi National Day experience up to 40% higher engagement rates compared to regular periods, as national sentiment amplifies brand visibility and consumer receptivity.</p>
</blockquote>

<h2>The National Day 95 Slogan: Our Pride is Our Nature</h2>

<p>The 95th National Day carries the slogan "Our Pride is Our Nature" in Arabic, reflecting the deep-rooted values and authentic identity of the Saudi people. This theme emphasizes that national pride is not performed or manufactured — it is an inherent quality woven into the fabric of Saudi culture. For businesses, aligning marketing materials with this sentiment creates genuine resonance with Saudi audiences.</p>

<p>Window Advertising Agency understands how to weave national themes into professional marketing content that feels authentic rather than opportunistic. Our team designs campaigns that honor the occasion while delivering measurable business results.</p>

<h2>Complete Overview of Window's National Day 95 Offers</h2>

<p>Window Advertising Agency has prepared five distinct service packages, each offered at a significant discount to mark the 95th Saudi National Day. These offers span the full spectrum of marketing needs — from ongoing social media management to one-time assets like websites and company profiles.</p>

<table>
<tbody>
<tr>
<td>Service</td>
<td>Regular Price</td>
<td>National Day Price</td>
<td>Discount</td>
</tr>
<tr>
<td>Social Media Management</td>
<td>3,500 SAR/month</td>
<td>1,400 SAR/month</td>
<td>60%</td>
</tr>
<tr>
<td>Website Design</td>
<td>4,000 SAR</td>
<td>1,500 SAR</td>
<td>62.5%</td>
</tr>
<tr>
<td>Promotional Video</td>
<td>600 SAR</td>
<td>300 SAR</td>
<td>50%</td>
</tr>
<tr>
<td>Social Media Design</td>
<td>200 SAR</td>
<td>100 SAR</td>
<td>50%</td>
</tr>
<tr>
<td>Company Profile</td>
<td>2,000 SAR</td>
<td>500 SAR</td>
<td>75%</td>
</tr>
</tbody>
</table>

<blockquote>
<p><strong>Maximum Savings:</strong> If you combine all five services, you save over 5,900 SAR compared to regular pricing — an average discount exceeding 60% across the board. The company profile offer alone represents a 75% reduction.</p>
</blockquote>

<h2>Offer 1: Social Media Management — Build a Powerful Digital Presence</h2>

<p>Social media is the primary battleground for brand visibility in Saudi Arabia. With one of the highest social media penetration rates globally, Saudi consumers discover, evaluate, and choose businesses based on their social media presence. Window's National Day social media management package gives you everything needed to build and maintain a professional, engaging online presence.</p>

<h3>What Is Included in the Package?</h3>

<ul>
<li><strong>20 posts per month</strong> — a carefully planned mix of 14 professional designs and 6 short-form videos</li>
<li><strong>Free search visibility optimization</strong> — we optimize your social profiles for discoverability</li>
<li><strong>Content calendar planning</strong> — strategic scheduling aligned with your business goals and seasonal trends</li>
<li><strong>Platform management</strong> — posting, scheduling, and basic community management across your key platforms</li>
</ul>

<blockquote>
<p><strong>Offer Price:</strong> 1,400 SAR/month instead of 3,500 SAR/month — a 60% discount. Minimum subscription period: 3 to 6 months to ensure meaningful results and brand consistency.</p>
</blockquote>

<h3>Why a Minimum Subscription Period?</h3>

<p>Social media growth is cumulative. A single month of posting rarely produces transformative results. The 3-to-6-month minimum ensures that your brand builds consistent recognition, develops a content library, and generates the engagement momentum needed for organic growth. Window's experience with hundreds of Saudi businesses confirms that the real ROI of social media management begins to compound after the third month of consistent activity.</p>

<p>The combination of professional designs and video content positions your brand to perform across all major platforms — from Instagram and TikTok where visual content dominates, to X (Twitter) and LinkedIn where strategic messaging builds authority.</p>

<h2>Offer 2: Custom Website Design — Your Digital Headquarters</h2>

<p>In today's Saudi market, a website is not optional — it is the digital foundation of your business credibility. Whether customers find you through search engines, social media, or word of mouth, their next step is almost always visiting your website. A professionally designed website converts curious visitors into paying customers.</p>

<h3>What Makes Window's Website Design Different?</h3>

<p>Window does not use generic templates or cookie-cutter designs. Each website is custom-built to reflect your brand identity, serve your specific business objectives, and perform optimally for the Saudi audience. Our web development team focuses on mobile-first design, fast loading speeds, Arabic-English bilingual support, and seamless user experience.</p>

<table>
<tbody>
<tr>
<td>Website Feature</td>
<td>Standard Package Includes</td>
</tr>
<tr>
<td>Design Approach</td>
<td>Custom design aligned with brand identity</td>
</tr>
<tr>
<td>Responsive Layout</td>
<td>Optimized for mobile, tablet, and desktop</td>
</tr>
<tr>
<td>Language Support</td>
<td>Arabic and English bilingual capability</td>
</tr>
<tr>
<td>SEO Foundation</td>
<td>Basic on-page SEO setup for search visibility</td>
</tr>
<tr>
<td>Performance</td>
<td>Optimized loading speed and modern standards</td>
</tr>
<tr>
<td>Content Management</td>
<td>Easy-to-use CMS for future updates</td>
</tr>
</tbody>
</table>

<blockquote>
<p><strong>Offer Price:</strong> 1,500 SAR instead of 4,000 SAR — a 62.5% discount on professional custom website design.</p>
</blockquote>

<p>This offer is particularly valuable for startups, small businesses, and entrepreneurs who need a professional online presence without the typical high investment. At 1,500 SAR, you receive a website that would normally cost nearly three times as much — built with the same quality standards Window applies to all its projects.</p>

<h2>Offer 3: Professional Promotional Video — Tell Your Story Visually</h2>

<p>Video content dominates digital marketing in Saudi Arabia. Consumers engage with video at rates far exceeding static images or text content. A professional promotional video communicates your brand message, showcases your products or services, and creates an emotional connection with your audience in just seconds.</p>

<h3>Professional Quality at Half the Price</h3>

<p>Window's promotional video offer delivers a complete professional video production for your business at 50% off the regular rate. Our video production team handles concept development, scripting, filming or animation, editing, and final production to deliver a polished asset you can use across all marketing channels.</p>

<blockquote>
<p><strong>Offer Price:</strong> 300 SAR instead of 600 SAR — a 50% discount. Please note that voiceover services are not included in this offer and can be arranged separately if needed.</p>
</blockquote>

<h3>How to Use Your Promotional Video</h3>

<ul>
<li><strong>Social media campaigns:</strong> Use as Instagram Reels, TikTok content, or YouTube shorts</li>
<li><strong>Website hero section:</strong> Embed on your homepage for immediate visitor engagement</li>
<li><strong>Presentations:</strong> Include in sales pitches and client meetings</li>
<li><strong>Digital advertising:</strong> Run as paid ads on social platforms for maximum reach</li>
<li><strong>WhatsApp marketing:</strong> Share directly with potential customers and partners</li>
</ul>

<h2>Offer 4: Social Media Design — Single Professional Design at 100 SAR</h2>

<p>Not every business needs a full monthly management package. Sometimes you need a single, high-quality design for a specific post, campaign, or announcement. Window's National Day offer makes professional social media design accessible to every budget — one expertly crafted design for just 100 SAR.</p>

<p>This offer is ideal for businesses that manage their own social media but want professional-quality visuals for important posts. Whether it is a product launch announcement, a seasonal promotion, or a National Day greeting, Window's design team creates content that stands out in crowded social feeds.</p>

<blockquote>
<p><strong>Offer Price:</strong> 100 SAR per design instead of 200 SAR — a 50% discount on individual social media designs crafted by Window's professional design team.</p>
</blockquote>

<h3>Design Quality Standards</h3>

<p>Every design produced by Window follows strict quality standards: brand color consistency, typography hierarchy, high-resolution output optimized for each platform, and Arabic-English text handling that respects both languages. Even at the discounted rate, you receive the same professional quality that Window delivers to its full-service clients.</p>

<h2>Offer 5: Company Profile — Professional Business Documentation at 75% Off</h2>

<p>A company profile is one of the most important business documents in the Saudi market. It serves as your formal introduction to potential clients, partners, investors, and government entities. In Saudi business culture, a well-designed company profile communicates professionalism, stability, and credibility before a single meeting takes place.</p>

<h3>What Does the Company Profile Include?</h3>

<p>Window's company profile package delivers a 10-to-20-page professionally designed document that covers your company overview, services or products, team, achievements, client portfolio, and contact information. Each profile is custom-designed to reflect your brand identity and structured to make maximum impact on Saudi business audiences.</p>

<table>
<tbody>
<tr>
<td>Profile Component</td>
<td>Details</td>
</tr>
<tr>
<td>Page Count</td>
<td>10 to 20 professionally designed pages</td>
</tr>
<tr>
<td>Design Style</td>
<td>Custom layout matching brand identity</td>
</tr>
<tr>
<td>Content Sections</td>
<td>Company overview, services, portfolio, team, achievements, contact</td>
</tr>
<tr>
<td>Language</td>
<td>Arabic, English, or bilingual</td>
</tr>
<tr>
<td>Output Format</td>
<td>Print-ready PDF and digital version</td>
</tr>
<tr>
<td>Revisions</td>
<td>Included to ensure complete satisfaction</td>
</tr>
</tbody>
</table>

<blockquote>
<p><strong>Offer Price:</strong> 500 SAR instead of 2,000 SAR — a massive 75% discount. This is the largest discount in our National Day 95 package, reflecting our commitment to helping Saudi businesses present themselves professionally.</p>
</blockquote>

<blockquote>
<p><strong>Important:</strong> Company profile offers are subject to availability and production capacity. Due to the significant discount, demand is expected to be high. We recommend placing your order early to secure your spot and ensure timely delivery.</p>
</blockquote>

<h2>Why Choose Window Advertising Agency for Your National Day Marketing?</h2>

<p>Window Advertising Agency is not a newcomer offering untested services at discounted rates. With over 25 years of experience in the Saudi advertising and marketing industry, Window combines deep market knowledge, professional execution, and an in-house production facility that ensures quality control at every stage.</p>

<h3>What Sets Window Apart</h3>

<ul>
<li><strong>25+ years of experience</strong> serving businesses across Saudi Arabia</li>
<li><strong>In-house production:</strong> Design, video, web development, and printing under one roof</li>
<li><strong>Saudi market expertise:</strong> Deep understanding of local culture, consumer behavior, and business practices</li>
<li><strong>Integrated services:</strong> From digital marketing to outdoor advertising, everything is connected</li>
<li><strong>Proven track record:</strong> Hundreds of successful projects across retail, hospitality, corporate, and government sectors</li>
</ul>

<blockquote>
<p><strong>Key Advantage:</strong> Unlike agencies that outsource production, Window handles everything internally. This means faster turnaround, consistent quality, direct communication with the production team, and the ability to adjust quickly based on your feedback.</p>
</blockquote>

<h2>How to Maximize Your National Day 95 Investment</h2>

<p>To get the most value from these offers, consider combining multiple services into an integrated marketing package. Each service amplifies the others — a professionally designed website performs better when supported by active social media, and social media content is more effective when backed by professional video and design assets.</p>

<h3>Recommended Combinations</h3>

<table>
<tbody>
<tr>
<td>Business Stage</td>
<td>Recommended Package</td>
<td>Total Investment</td>
</tr>
<tr>
<td>New Startup</td>
<td>Website + Company Profile + Social Media Management (3 months)</td>
<td>6,200 SAR</td>
</tr>
<tr>
<td>Growing Business</td>
<td>Social Media Management (6 months) + Promotional Video + 5 Designs</td>
<td>9,200 SAR</td>
</tr>
<tr>
<td>Established Brand Refresh</td>
<td>All 5 services combined</td>
<td>3,800 SAR (one-time) + 1,400 SAR/month</td>
</tr>
</tbody>
</table>

<blockquote>
<p><strong>Smart Strategy:</strong> Businesses that invest in at least three complementary marketing services see an average of 2.5 times higher return compared to those using a single service in isolation. The National Day offers make this integrated approach affordable for businesses of all sizes.</p>
</blockquote>

<h2>Terms, Conditions, and How to Book Your Offer</h2>

<p>Window's National Day 95 offers are designed to be straightforward and transparent. Here are the key terms to be aware of before placing your order:</p>

<ul>
<li>All offers are available for a limited time in celebration of Saudi National Day 95</li>
<li>Social media management requires a minimum subscription of 3 to 6 months</li>
<li>Promotional video pricing does not include voiceover services</li>
<li>Company profiles include 10 to 20 pages; additional pages can be arranged at extra cost</li>
<li>All prices are quoted in Saudi Riyals (SAR) and are exclusive of applicable VAT</li>
<li>Offers cannot be combined with other promotions or retroactively applied to existing contracts</li>
</ul>

<h3>How to Place Your Order</h3>

<p>Booking your National Day 95 offer is simple. Contact Window Advertising Agency through any of the following channels to discuss your requirements and secure your discounted package. Our team will guide you through the process, confirm timelines, and begin production promptly.</p>

<p><a href="https://windowadv.com/en/contact">Contact Us Today</a></p>

<h2>Frequently Asked Questions About National Day 95 Offers</h2>

<h3>How long are the National Day 95 offers valid?</h3>

<p>The offers are available for a limited time around the Saudi National Day 95 celebration period. We recommend contacting us as early as possible to secure your preferred services before availability is exhausted.</p>

<h3>Can I combine multiple offers into a single package?</h3>

<p>Yes, you can combine any or all of the five offers. In fact, we recommend combining services for maximum marketing impact. Each service complements the others, creating a more cohesive brand presence.</p>

<h3>Why does social media management require a 3-to-6-month minimum?</h3>

<p>Social media growth is cumulative and requires consistency. A minimum commitment ensures your brand builds meaningful momentum, develops audience recognition, and achieves the engagement levels needed for real business results. One month is rarely sufficient to measure or achieve meaningful impact.</p>

<h3>Is voiceover included in the promotional video offer?</h3>

<p>No, voiceover is not included in the 300 SAR promotional video offer. Voiceover services can be arranged separately if needed. The offer covers video concept, production, editing, and final delivery.</p>

<h3>What if I need more than 20 pages for my company profile?</h3>

<p>The standard offer covers 10 to 20 pages. If your business requires additional pages, we can accommodate this at a modest extra cost. Contact our team to discuss your specific requirements.</p>

<h3>Does Window serve businesses outside Riyadh?</h3>

<p>Yes, Window Advertising Agency serves clients across all regions of Saudi Arabia. While our headquarters and production facility are based in Riyadh, our digital services — including social media management, website design, and video production — are delivered to businesses nationwide.</p>

<h3>How do I get started with my National Day 95 order?</h3>

<p>Simply contact Window Advertising Agency through our website, phone, or WhatsApp. Our team will discuss your requirements, confirm the offer details, and begin the process. We recommend booking early as capacity is limited during the National Day period.</p>
HTML;
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', 'saudi-national-day-95-offers')->first();
        if (!$blog) {
            return;
        }

        DB::table('blog_translations')
            ->where('blog_id', $blog->id)
            ->where('locale', 'en')
            ->delete();
    }
};
