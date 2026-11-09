<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'company-profile-design-riyadh';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Professional Company Profile Design in Riyadh & Saudi Arabia | A Complete Guide';
        $enMetaTitle       = 'Company Profile Design in Riyadh | A Complete Guide';
        $enMetaDescription = 'A complete guide to professional company profile design in Riyadh and Saudi Arabia: what the file should include, design stages, the best sizes, and common mistakes to avoid.';
        $enKeywords        = 'company profile design,professional company profile,company profile design Riyadh,company profile elements,profile cover design,company profile size,profile design mistakes,construction company profile,tech company profile,company profile printing';

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
<p>When a new client contacts a company via WhatsApp, phone, or email, or visits its website, they usually need to know the nature of its business, the services it offers, its experience, and its past projects. That's where professional company profile design comes in — one of the most important tools for introducing companies and presenting them in an organized way to clients, partners, and government and private entities.</p>

<p>A company profile isn't just a file of text and images — it's a complete introductory interface reflecting the company's character and presenting its background, vision, services, and portfolio. A company may have years of experience, but if that capacity isn't presented in a clear, professional file, the client may not grasp it.</p>

<div style="max-width: 360px; margin: 24px auto;">
    <div style="position: relative; padding-bottom: 177.78%; height: 0; border-radius: 12px; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/d3AbxDt3zTg" title="Window Advertising Agency"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
    </div>
</div>

<h2>1. What Is a Company Profile?</h2>

<p>A company profile is an introductory file presenting organized information about an organization: who it is, how it started, what services it offers, and what experience and projects it has completed, along with how to reach it. The process of designing and producing it is known as Company Profile Design.</p>

<p>Its elements vary by activity and purpose: a construction company's profile needs to highlight projects and technical expertise, a tech company's profile needs to clarify its technical solutions, and a consulting firm's profile needs to highlight professional specializations and team experience. The goal isn't more pages — it's presenting the right information in the right order, in a visual style that's easy to read.</p>

<h2>2. Why Is a Company Profile One of the Most Important Marketing Tools?</h2>

<ul>
<li><strong>Understanding capabilities:</strong> the more organized the file, the easier it is for clients to recognize work areas and available services from first contact.</li>
<li><strong>A complete view of services:</strong> a common mistake is presenting only the core activity, leading clients to assume the company doesn't offer services it actually provides.</li>
<li><strong>Showcasing a track record:</strong> project photos alone aren't enough — they need organizing to show scope of work, with permission secured before using client names or logos.</li>
<li><strong>Supporting sales and marketing:</strong> used on WhatsApp Business, email, meetings, exhibitions, and proposals, unifying the information presented to clients.</li>
<li><strong>Consistent visual identity:</strong> colors, fonts, and layout reflect the company's character — but an attractive design alone isn't enough if information is incomplete.</li>
</ul>

<p><strong>Can a weak profile hurt the company?</strong> Yes — when a profile doesn't reflect the organization's real capabilities, or uses weak images or crowded text, the client doesn't get the full picture needed to properly evaluate the company. Improving a profile isn't just a color change — it's a full review of content and how services are presented.</p>

<h2>3. Which Sectors Need a Professional Profile?</h2>

<p>A <strong>construction company's profile</strong> needs a clear view of its work areas (construction, finishing, infrastructure, electrical and mechanical) with each project's actual role clarified. An <strong>engineering & consulting profile</strong> focuses on specializations and team qualifications, while an <strong>industrial/manufacturing profile</strong> shows products, production lines, and quality standards.</p>

<p><strong>Tech companies</strong> need to clarify their digital solutions and practical value, <strong>facility management companies</strong> need to highlight service scope and coverage, and <strong>trading & supply companies</strong> need to show products and supply capabilities. <strong>Real estate</strong> profiles focus on projects and development stages, while <strong>healthcare</strong> profiles present services and accreditations per disclosed information. <strong>Logistics</strong>, <strong>marketing agencies</strong>, <strong>professional services</strong> (accounting, law, training), and <strong>government entities & associations</strong> also need profiles suited to their nature. Other sectors include startups, hotels, restaurants, and event companies.</p>

<h2>4. What Essential Information Should a Company Profile Include?</h2>

<p>Content is built per the activity, and can include: a cover with the logo, a company overview and background, vision/mission/values, services and expertise, capabilities, a portfolio, clients and partners (with permission), certifications, coverage, and contact information. Not every element needs to appear in every profile — choose what serves the purpose and reflects the organization honestly.</p>

<p><strong>What Saudi companies may need:</strong> it may help to include basic company data, the commercial registration, and a tax number when relevant. But when preparing a profile for registration with a government entity, review that entity's own requirements — a profile doesn't replace official documents.</p>

<h2>5. How Is a Company Profile Professionally Designed?</h2>

<ol>
<li><strong>Understanding the activity and purpose:</strong> general introduction, presenting to large companies, government entities, or exhibitions? The answer shapes design style and content volume.</li>
<li><strong>Receiving and reviewing content:</strong> collecting the overview, history, services, projects, and images, then checking for gaps or conflicts before design begins.</li>
<li><strong>Organizing content and page structure:</strong> distributing content by priority — intro, services, capabilities, portfolio, then contact information.</li>
<li><strong>Cover design:</strong> the first thing a reader sees; best to prepare more than one concept before finishing the rest.</li>
<li><strong>Interior page design:</strong> arranging elements, choosing images, and maintaining identity consistency while varying pages by content type.</li>
<li><strong>Selecting images:</strong> using real, suitable-quality images tied to actual projects — not every available photo.</li>
<li><strong>Reviewing design and content:</strong> confirming text, names, numbers, and contact details before delivery.</li>
<li><strong>Final output:</strong> a Digital version, a PDF for sharing, a Print-Ready PDF, or Editable Source Files if included in the agreement.</li>
</ol>

<h2>6. What's the Best Size for a Company Profile?</h2>

<table>
<thead>
<tr><th>Size</th><th>Best For</th></tr>
</thead>
<tbody>
<tr><td>A4 Landscape</td><td>Files relying on wide images and architectural projects</td></tr>
<tr><td>A4 Portrait</td><td>Official introductory files; a common choice for reading and printing</td></tr>
<tr><td>A5</td><td>Short files or booklets presenting key information</td></tr>
<tr><td>Custom sizes</td><td>Per presentation, printing, or brand requirements</td></tr>
</tbody>
</table>

<p>There's no single answer that fits everyone — the best size is the one that serves the content and keeps information clear, without cramming text or shrinking it uncomfortably.</p>

<p><strong>From our work:</strong> if your company needs a broader annual issue beyond an introductory profile — such as a performance and achievements report — see our guide on <a href="https://windowadv.com/en/blogs/annual-report-design-printing-saudi-arabia">annual report design & printing in Saudi Arabia</a>. You can also check our <a href="https://windowadv.com/en/services/business-prints">business printing</a> service for preparing the profile's final print version.</p>

<h2>7. Common Company Profile Design Mistakes & How to Avoid Them</h2>

<ul>
<li><strong>Choosing a design company on price alone:</strong> without reviewing its portfolio — the lowest price doesn't mean weak service, and the highest doesn't guarantee quality.</li>
<li><strong>Unsuitable brand colors:</strong> clashing or excessive colors without a clear system scatter the pages.</li>
<li><strong>Unsuitable fonts:</strong> too many fonts without a unified system, or decorative fonts for long text, hurt readability.</li>
<li><strong>Unbalanced font sizes:</strong> too small is tiring on a phone; too large causes crowding.</li>
<li><strong>Overcrowded pages:</strong> stacking text without breaks or subheadings hides the information readers need.</li>
<li><strong>Imbalance between headings and content:</strong> no clear visual difference between heading levels weakens page structure.</li>
<li><strong>Low-quality images:</strong> unclear or over-enlarged images showing pixelation reduce the overall impression.</li>
<li><strong>Inconsistent visual identity:</strong> changing colors and fonts without reason between pages breaks the file's unity.</li>
<li><strong>Neglecting services the company can do:</strong> focusing on one activity makes clients assume the company's scope is limited.</li>
<li><strong>Showing projects without clarifying the company's role:</strong> listing a project without its actual scope of work can misrepresent real experience.</li>
</ul>

<p><strong>Practical tip:</strong> before requesting a quote, define the expected page count, required languages, output type (digital, print, or both), and the allowed revision scope — this makes comparing quotes and estimating the timeline easier.</p>

<p>At Window Advertising Agency, we help companies design a professional profile that reflects their real identity — from reviewing content and organizing services through to final design and file preparation for printing or digital sharing.</p>

<h3>Related Articles</h3>
<ul>
<li><a href="https://windowadv.com/en/blogs/annual-report-design-printing-saudi-arabia">Annual Report Design & Printing for Companies and Government Entities in Saudi Arabia</a></li>
<li><a href="https://windowadv.com/en/blogs/15-tips-choose-advertising-agency-riyadh">15 Tips for Choosing an Advertising Agency in Riyadh</a></li>
<li><a href="https://windowadv.com/en/blogs/promotional-gifts-guide-riyadh">Best Promotional Gifts Company in Riyadh & Saudi Arabia</a></li>
</ul>

<h2>Need a professional company profile designed?</h2>

<p>Window Advertising Agency — 25+ years of design, manufacturing, and execution experience in Riyadh and Saudi Arabia.</p>

<p><strong><a href="https://windowadv.com/en/contact">Contact us for a quote</a></strong></p>

<h2>Frequently Asked Questions About Company Profile Design</h2>

<h3>What's the difference between a company profile and an annual report?</h3>
<p>A profile is a relatively stable file presenting identity, services, and experience, while an annual report documents a specific fiscal year's achievements, usually with more detailed performance data.</p>

<h3>How many pages does a company profile need?</h3>
<p>There's no fixed number — it depends on the scope of services and the file's purpose. What matters is including necessary information in a clear order without padding.</p>

<h3>Can a profile be designed in both Arabic and English?</h3>
<p>Yes, either as one bilingual version or two separate versions, depending on the target audience.</p>

<h3>What's the best size for a construction company's profile?</h3>
<p>Often A4 landscape or portrait, depending on image volume; wide architectural photos may suit landscape better.</p>

<h3>Does the design include editable files?</h3>
<p>It depends on the agreement's scope — some projects include editable source files, others are limited to the final PDF.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'company-profile-design-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
