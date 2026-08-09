<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'right-marketing-integrated-services-saudi-arabia-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Right Marketing: How to Turn a Silent Account into Real Sales';
        $enMetaTitle       = 'Right Marketing: From a Silent Account to Real Sales | Window Advertising Agency';
        $enMetaDescription = 'Your complete guide to integrated advertising services in Saudi Arabia: digital marketing, visual identity, printing, exhibition booths, and event management with Window Advertising Agency.';
        $enKeywords        = 'right marketing,advertising agency Riyadh,advertising agency Saudi Arabia,Window Advertising Agency,digital marketing,visual identity design,SwissQprint,exhibition booths,project hoarding,conference organizing';

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
<p>"Your account is silent... no engagement." That's the nightmare thousands of business owners in Saudi Arabia live with: social accounts stuck under a couple hundred followers, posts with zero comments, and a marketing budget drained every month with nothing to show for it. More often than not, the problem isn't the product or the market — it's the missing strategy behind every post. At <strong>Window Advertising Agency</strong>, we believe results don't happen by accident. They happen when there's a well-thought-out plan, a professional team, and an integrated vision that takes you from zero to the top of the market.</p>

<blockquote><p><strong>"Real results... real strategy."</strong></p></blockquote>

<h2>What's the Difference Between Random Marketing and Right Marketing?</h2>

<p>Many companies confuse "having a digital presence" with "effective marketing" — posting randomly, buying fake followers, and waiting for a miracle. Right Marketing, as we practice it at Window, is something entirely different: it starts with a deep understanding of the target audience, moves through consistent visual identity design, and continues with creative content and ongoing data analysis.</p>

<table><tbody><tr><td><strong>Criteria</strong></td><td><strong>Random Marketing</strong></td><td><strong>Right Marketing with Window</strong></td></tr><tr><td>Strategy</td><td>Random posting with no plan</td><td>Monthly content plan built on data</td></tr><tr><td>Design</td><td>Generic, recycled templates</td><td>A unique visual identity for every client</td></tr><tr><td>Content</td><td>Copied, generic text</td><td>Original content designed for the target audience</td></tr><tr><td>Measurement</td><td>No performance indicators</td><td>Regular reports with clear numbers</td></tr><tr><td>Result</td><td>Your account stays silent</td><td>Your followers grow and engagement rises</td></tr></tbody></table>

<blockquote><p><strong>Market fact:</strong> According to Saudi market studies, more than 68% of small and medium businesses fail to see a return on their digital marketing spend, largely due to the lack of an integrated strategy and reliance on disconnected, piecemeal solutions.</p></blockquote>

<h2>Window's Integrated Services: Everything Your Project Needs in One Place</h2>

<p>What sets Window Advertising Agency apart in the Riyadh advertising market is that we don't hand you one service and leave you to find the rest — we provide a complete ecosystem covering every aspect of marketing and advertising under one roof.</p>

<h3>Digital Marketing and Social Media Management</h3>

<p>This is where turning a "silent account" into "growing followers" begins. Our specialized team builds a monthly content strategy based on audience and competitor analysis, manages social media accounts (Instagram, X, TikTok, Snapchat, LinkedIn), produces creative content combining text, design, and video, manages paid advertising campaigns, and handles search engine optimization (SEO).</p>

<blockquote><p><strong>Numbers that speak:</strong> Window clients see an average 300% growth in engagement within the first three months of working with us — not by chance, but by strategy.</p></blockquote>

<h3>Visual Identity Design</h3>

<p>Visual identity is the foundation every marketing effort is built on. Without it, your message gets lost in a crowded market. At Window, we design your logo with a modern approach, choose colors, typography, and a complete visual identity system, build brand guidelines, and apply the identity consistently across all marketing and digital materials.</p>

<blockquote><p><strong>Why this matters:</strong> Brands with a consistent visual identity generate 23% higher revenue than those lacking visual consistency.</p></blockquote>

<h3>Corporate Profile, Report, and Catalog Design</h3>

<p>Professional print materials remain indispensable in the Saudi business world: company profile design, annual report design, and printed or digital product catalog design — all crafted to reflect your standing in the market.</p>

<h3>Video Design and Production</h3>

<p>Video is the king of content in the digital era. We produce corporate and product videos, professional motion graphics, social media videos designed for maximum engagement, and full on-site video production.</p>

<blockquote><p><strong>Market fact:</strong> Visual content gets 1,200% more engagement than text and images combined.</p></blockquote>

<h3>Printing and Advertising Boards</h3>

<p>At Window, we run some of the most advanced printing technology available, including Swiss SwissQprint printers, widely regarded as among the best in the world for large-format UV printing. We offer stickers in every size, promotional stands (roll-up, X-banner, pop-up), indoor and outdoor advertising boards, and printed marketing materials of every kind.</p>

<blockquote><p><strong>Window's edge:</strong> SwissQprint's UV printing technology guarantees vibrant colors that last for years without fading — even in the harsh Saudi climate, where temperatures exceed 50°C.</p></blockquote>

<h3>Promotional Gifts, Exhibition Booths, and Project Hoarding</h3>

<p>We design office, tech, and premium promotional gifts that keep your brand in front of your clients for months and years. For exhibitions, we build fully customized booths that reflect your brand identity, complete with LED screens, lighting systems, and interactive technology. And for construction sites, we turn hoarding fences from a simple safety barrier into a massive promotional façade seen by thousands of passersby every day.</p>

<blockquote><p><strong>Numbers that speak:</strong> Window's project hoarding fences stretch for hundreds of meters across major Riyadh projects, generating millions of monthly views from passersby.</p></blockquote>

<h3>Event and Conference Organizing</h3>

<p>From concept to full execution: strategic event planning, event visual identity design, venue setup, registration and hospitality management, and complete visual coverage with photography and live streaming.</p>

<h2>Window's Methodology: From "Silent Account" to "Sales That Run Themselves"</h2>

<ol>
<li><strong>Diagnosis and analysis:</strong> An in-depth working session to understand your current situation, analyzing your accounts, website, and visual identity with an expert eye</li>
<li><strong>Building the strategy:</strong> A complete marketing plan defining goals, target audience, and the right marketing channels</li>
<li><strong>Establishing the identity:</strong> Building a complete visual identity if yours is weak or missing</li>
<li><strong>Content production:</strong> Designs, videos, and copy — every post backed by a real strategy</li>
<li><strong>Launch and activation:</strong> Publishing content and managing ad campaigns</li>
<li><strong>Ongoing analysis and optimization:</strong> Daily performance monitoring and data-driven strategy adjustments</li>
<li><strong>Expansion and integration:</strong> Gradually adding new tools — exhibition booths, promotional gifts, print stands, printed campaigns, events</li>
</ol>

<blockquote><p><strong>Window's edge:</strong> Our internal motto "With you from the first step" isn't a slogan — it's a genuine commitment we live out with every client from day one.</p></blockquote>

<h2>Why an Integrated Agency Outperforms Individual Specialists</h2>

<p>Many business owners fall into the trap of splitting their marketing across multiple vendors: one for social media, another for design, a third for printing, a fourth for events. The result is chaos, inconsistency, and wasted budget.</p>

<table><tbody><tr><td><strong>Criteria</strong></td><td><strong>Integrated Agency (Window)</strong></td><td><strong>Multiple Individual Vendors</strong></td></tr><tr><td>Identity consistency</td><td>Unified visual identity across every channel</td><td>Clashing colors and styles between vendors</td></tr><tr><td>Coordination</td><td>One team managing everything in harmony</td><td>Coordination burden falls on the client</td></tr><tr><td>Cost</td><td>Bundled packages at a lower total cost</td><td>Separate costs that pile up unpredictably</td></tr><tr><td>Speed</td><td>Fast execution — all teams under one roof</td><td>Delays from coordinating multiple parties</td></tr><tr><td>Accountability</td><td>One point of contact, clear responsibility</td><td>Finger-pointing when something goes wrong</td></tr></tbody></table>

<h2>Vision 2030 and Saudi Arabia's Marketing Boom</h2>

<p>Saudi Arabia is living through an unprecedented economic transformation under Vision 2030 — a shift that creates enormous opportunity, but also raises the competitive bar.</p>

<blockquote><p><strong>Market fact:</strong> The advertising and marketing sector in Saudi Arabia is growing at 12–15% annually, driven by digital transformation and e-commerce growth. Companies that don't invest in professional marketing today will find themselves out of the market tomorrow.</p></blockquote>

<h2>Why Choose Window?</h2>

<ul>
<li><strong>Accumulated experience in the Saudi market:</strong> Years of working with leading brands across Riyadh and the Kingdom</li>
<li><strong>World-class printing technology:</strong> Swiss SwissQprint printers guarantee exceptional quality that lasts for years</li>
<li><strong>A multidisciplinary team:</strong> Designers, digital marketers, video producers, installation engineers, and event planners under one roof</li>
<li><strong>Measurable results:</strong> Regular performance reports showing your followers growing, your engagement rising, and your sales running themselves</li>
</ul>

<blockquote><p><strong>Our motto:</strong> "Projects that make a difference" — every project we take on, big or small, gets the same professionalism and attention.</p></blockquote>

<h2>Contact Window Agency Today</h2>

<p>Don't let your account stay silent, and don't let your competitors steal your customers. Window Advertising Agency is ready to take you from where you are today to where you deserve to be.</p>

<p><a href="https://windowadv.com/en/contacts">Contact us now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>What services does Window Advertising Agency offer?</h3>

<p>We provide integrated advertising services including: digital marketing and social media management, visual identity design, company profile and annual report and product catalog design, video and motion graphics design, sticker and advertising board printing, promotional stand manufacturing, promotional gifts, exhibition booth execution, project hoarding installation, and event and conference organizing.</p>

<h3>Do you serve clients outside Riyadh?</h3>

<p>Yes. Our main office is in Riyadh, but our services cover every region of the Kingdom — from Jeddah and Dammam to the Eastern and Northern regions and everywhere in between.</p>

<h3>How long does it take to see digital marketing results?</h3>

<p>Initial results typically start showing within 30–60 days of starting work, with noticeable engagement growth over the first three months.</p>

<h3>What sets Window's printing apart?</h3>

<p>We use advanced Swiss SwissQprint printers with UV printing technology that guarantees vibrant, fade-resistant colors for years, whether for small stickers or massive project hoarding fences.</p>

<h3>Can I start with one service and expand later?</h3>

<p>Absolutely. Many of our clients start with a single service like social media management or visual identity design, then gradually expand to take advantage of our other services. We're "with you from the first step" — and we stay with you every step after that.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'right-marketing-integrated-services-saudi-arabia-window';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
