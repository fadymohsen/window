<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'annual-report-design-printing-saudi-arabia';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Annual Report Design, Production and Printing for Companies and Government Entities in Saudi Arabia';
        $enMetaTitle       = 'Annual Report Design & Luxury Printing in Riyadh | Window';
        $enMetaDescription = 'Window Advertising delivers annual report design, art production and printing for major companies and government entities, with cover and page design, infographics, and luxury VIP printing options in Riyadh.';
        $enKeywords        = 'annual report design,annual report printing,annual report design company,luxury annual report printing Riyadh';

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
<p>At the close of every fiscal year, major companies and government entities in Saudi Arabia need a publication that documents their achievements, results and performance indicators in an organized, professional way. This is where <strong>annual report design</strong> comes in — a corporate discipline that combines graphic design, visual identity, visual content organization, table and infographic design, and the selection of appropriate printing and binding materials. An annual report is not just printed pages collecting a year's achievements; it is a corporate publication that reflects an entity's identity, documents its work, and presents its results to boards, partners and stakeholders.</p>

<p>This is why large corporations and government bodies look for a specialized <strong>annual report design company</strong> that can turn approved content into a complete report — from the visual concept and layout to art direction and print quality — while staying true to the entity's visual identity. At Window Advertising, the process runs from receiving finalized content, through cover and interior page design, tables and charts, prototype review and final approval, to file preparation for print.</p>

<p>With over 25 years of experience in design, branding, visual identity and corporate print, we focus on solutions suited to each entity's nature and report requirements, with close attention to the details that make the difference in final quality.</p>

<h2>Why Does Professional Annual Report Design Matter?</h2>

<p>The annual report is one of the most important publications an organization uses to document its achievements and initiatives over the year, and to present information to senior management, boards of directors, partners and stakeholders. Professional design matters most when a report includes many pages, detailed tables, performance indicators, statistics, or project photos — good design doesn't just improve appearance, it organizes information, makes it easier to read, and highlights the results that matter most.</p>

<p>Key benefits of professionally designing an annual report:</p>

<ul>
<li>Presenting achievements and initiatives in an organized way.</li>
<li>Applying the visual identity consistently across the cover and interior pages.</li>
<li>Making information easier to access through clear indexing and structure.</li>
<li>Highlighting indicators and results using tables, charts and infographics.</li>
<li>Improving the clarity of text, images and figures.</li>
<li>Delivering a printed edition that reflects attention to detail, plus an organized digital version when needed for sharing.</li>
</ul>

<h2>Design, Art Production and Printing: What's the Difference?</h2>

<p>When searching for an annual report design company, it's important to define exactly what's needed, since the stages differ in scope.</p>

<p><strong>Annual report design</strong> covers the visual form of the cover and interior pages — colors, fonts, dividers, headings and graphic elements — all applied under the entity's visual identity.</p>

<p><strong>Art production (art direction)</strong> covers organizing content within the pages: arranging text, images and tables, reviewing indexing and page numbering, standardizing formatting, and preparing files for print.</p>

<p><strong>Table and infographic design</strong> covers presenting approved data in a clear visual style, while preserving the accuracy of the figures supplied by the client.</p>

<p><strong>Printing and binding</strong> covers selecting paper, cover material, binding method and finishing, then producing the required quantity to approved specifications.</p>

<p>Writing the report, drafting text and proofreading are separate services. Within the scope described here, Window Advertising receives content already written and proofread by the client, then handles design, art direction and printing as agreed.</p>

<h2>Designing Around the Entity's Visual Identity</h2>

<p>An annual report should be an extension of an organization's identity, not a design detached from it. The logo, colors, fonts and established visual style are carefully respected, along with any visual identity guidelines the entity provides — as we've discussed in <a href="https://windowadv.com/ar/blogs/brand-identity-before-advertising">Brand Identity Before Advertising</a>, a consistent identity is what gives any corporate publication its distinct character. When an organization has a clear visual identity, its elements are applied to the cover, interior pages, dividers, tables and infographics, while keeping content clear and easy to read. If the client has previous report editions, these serve as a reference for developing a design appropriate for the new edition — the goal is always a visually consistent report that presents content professionally without compromising clarity.</p>

<h2>From Content Receipt to Final Approval: How the Process Works</h2>

<p>Producing a large annual report requires a clear methodology, since approving the design before all pages are completed helps unify the visual style and reduce late-stage revisions. At Window Advertising, we begin by understanding the client's requirements, then present initial concepts that let the client choose a direction before the full report is built out.</p>

<ol>
<li><strong>Receive finalized content</strong> — a proofread, approved Word file in Arabic, English, or both, with the logo, brand files and any previous templates to reference.</li>
<li><strong>Determine size and orientation</strong> — portrait or landscape, plus expected page count, number of copies, and binding/finishing level.</li>
<li><strong>Present multiple cover concepts</strong> — so the client can choose the style that fits their identity and the nature of the edition.</li>
<li><strong>Design a sample of interior pages</strong> — a text page, image page, index/divider, and a data or KPI page — to evaluate fonts, colors and spacing before rolling out the full design.</li>
<li><strong>Design tables and infographics</strong> for performance indicators, results and statistics, matching the identity and data type.</li>
<li><strong>Approve concepts before completing the report</strong>, ensuring consistency across sections, headings and charts.</li>
<li><strong>Final review and revisions</strong> — page organization, indexing, numbering, heading consistency, and clarity of tables and images.</li>
<li><strong>Prepare final print-ready files</strong> — size, trim margins, bleed where needed, image resolution, colors, page order and binding.</li>
<li><strong>Print a sample copy before the full run</strong> — a digitally printed sample lets the client review colors, text and image clarity, paper, cover and how the report opens, before committing to the full quantity.</li>
</ol>

<h2>Luxury Annual Report Printing</h2>

<p>Executing an annual report isn't limited to interior design — the cover, paper, binding, finishing and final presentation — covered in our <a href="https://windowadv.com/ar/blogs/complete-guide-best-printing-service">complete guide to choosing an integrated printing service</a> — all affect how the report looks and feels. Large corporations and government entities often need several printing tiers depending on the report's purpose and audience: general editions for institutional distribution, alongside luxury copies for official meetings or VIP presentation.</p>

<h3>Tier One — Luxury VIP Edition</h3>

<p>For boards of directors or official guests — a durable hardcover, premium cover materials, spot UV on selected elements, logo execution via embossing, debossing, foil stamping or laser engraving, and a custom presentation box, optionally with a USB drive holding a digital version.</p>

<h3>Tier Two — Hardcover with Premium Finishing</h3>

<p>An elegant, official report without a custom box — hardcover aligned with the identity, spot UV or embossing for the logo, and interior paper matched to the images, text and tables.</p>

<h3>Tier Three — Practical Institutional Specifications</h3>

<p>For internal distribution or general use, balancing clarity, quality and cost — typically a coated cover around 350gsm and interior paper at 150–180gsm, with binding suited to the page count. These weights are illustrative; final specs depend on page count, image density, size and budget.</p>

<p>Tiers can be combined in one project, provided each is approved before production.</p>

<h2>25+ Years in Design, Branding and Visual Identity</h2>

<p>Window Advertising brings more than 25 years of experience in design, branding, visual identity and corporate print — the same <a href="https://windowadv.com/ar/blogs/innovation-excellence-design-execution">innovation and excellence in design and execution</a> behind the agency's wider work — including logo and identity design, visual identity applied across publications, annual report and interior page design, and <a href="https://windowadv.com/ar/blogs/everything-your-project-needs-advertising">corporate profiles, catalogues and the full range of project services</a> the agency provides, along with knowing <a href="https://windowadv.com/ar/blogs/when-to-update-business-prints">when printed materials need refreshing</a>, art direction, file prep and binding/packaging. Among the projects we've delivered in this space are reports produced for Prince Salman Heart Center, alongside work for a number of major companies.</p>

<h2>How to Request a Quote</h2>

<p>To help define the right scope and specifications, it's useful to prepare:</p>

<ol>
<li>The entity's name and type of annual report.</li>
<li>Finalized content in a Word file, proofread and approved.</li>
<li>The report's language — Arabic, English, or both.</li>
<li>Required size and orientation, if specified.</li>
<li>Expected page count and number of copies.</li>
<li>Approved visual identity, logo, images and tables.</li>
<li>The intended production tier — practical print, hardcover, or a VIP edition with a custom box.</li>
<li>Target delivery date and location.</li>
</ol>

<p>With this information ready, you can contact us to request a quote directly — and if you're still comparing options, our <a href="https://windowadv.com/ar/blogs/15-tips-choose-advertising-agency-riyadh">15 tips for choosing an advertising agency in Riyadh</a> is a useful read for knowing what sets the right partner apart.</p>

<h2>Window Advertising — Annual Report Design in Riyadh</h2>

<p>If your company or entity is looking for annual report design, art production and printing services, Window Advertising offers end-to-end solutions — from receiving finalized, proofread content, through cover, interior page, table and infographic design aligned with your visual identity, to preparing print-ready files and producing the report to specifications suited to institutional use or a luxury VIP presentation.</p>

<p style="text-align:center;"><strong>Ready to design and print your annual report?</strong></p>
<p style="text-align:center;">Contact Window Advertising Agency in Riyadh, Al Fayha District, Exit 15, and get a quote that fits your report.</p>
<p style="text-align:center;"><a href="https://windowadv.com/en/contact">Request a Quote Now: 0592945557</a></p>
HTML;
    }

    public function down(): void
    {
        $slug = 'annual-report-design-printing-saudi-arabia';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
