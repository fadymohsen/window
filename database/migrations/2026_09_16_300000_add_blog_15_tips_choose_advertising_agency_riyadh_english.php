<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = '15-tips-choose-advertising-agency-riyadh';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = '15 Secrets to Choosing an Advertising Agency in Riyadh: How to Know This Agency Is Right for Your Project';
        $enMetaTitle       = '15 Tips to Choose an Advertising Agency in Riyadh | Practical Guide 2026';
        $enMetaDescription = 'A practical 15-point guide to choosing the best advertising agency in Riyadh — how to compare experience, materials, design, execution, and pricing before signing a contract.';
        $enKeywords        = 'advertising agencies in Riyadh,choose advertising agency,advertising company Riyadh,tips for choosing ad agency,comparing advertising companies,best advertising agency Riyadh,sign manufacturing,illuminated 3D letters,digital printing,brand identity design,exhibitions and booths,promotional gifts';

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
<p><strong>Before you sign with any advertising agency in Riyadh, make sure you've reviewed these 15 points.</strong> Don't rely on price alone — advertising is a broad industry that combines concept, design, Artwork, printing, manufacturing, finishing, and installation, and you may receive similar quotes for the same request while the actual specifications are completely different. In this guide, we take you step by step inside the secrets of choosing the right agency.</p>

<div style="max-width: 360px; margin: 24px auto;">
    <div style="position: relative; padding-bottom: 177.78%; height: 0; border-radius: 12px; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/Kc1H5w3BviQ" title="Window Advertising Agency"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
    </div>
</div>

<h2>The 15 Points at a Glance</h2>

<table><tbody>
<tr><td><strong>#</strong></td><td><strong>Point</strong></td></tr>
<tr><td>1</td><td>First impression and organization</td></tr>
<tr><td>2</td><td>Account manager's questions and understanding of your request</td></tr>
<tr><td>3</td><td>Has the agency executed this product before?</td></tr>
<tr><td>4</td><td>Verifying portfolio source and authenticity</td></tr>
<tr><td>5</td><td>Knowing who will actually execute the project</td></tr>
<tr><td>6</td><td>Type of experience, not just number of years</td></tr>
<tr><td>7</td><td>Comparing specifications and materials before price</td></tr>
<tr><td>8</td><td>Don't be fooled by appearance alone</td></tr>
<tr><td>9</td><td>Design and brand identity</td></tr>
<tr><td>10</td><td>Setting execution and delivery timelines</td></tr>
<tr><td>11</td><td>Follow-up during Production</td></tr>
<tr><td>12</td><td>Product review before installation</td></tr>
<tr><td>13</td><td>Requesting samples for large print runs</td></tr>
<tr><td>14</td><td>Verifying quantity, not just quality</td></tr>
<tr><td>15</td><td>Long-term value and partnership</td></tr>
</tbody></table>

<h2>First: First Impression and Understanding the Request (Points 1–2)</h2>

<p>Choosing an agency starts from the first contact, whether by phone, WhatsApp, or visiting their office. Observe the work environment: Is there clear organization in receiving and following up on requests, or randomness? Does the representative actually listen, or do they try to end the conversation quickly?</p>

<p>Then move to a more important stage: how does the account manager handle your request? A professional doesn't just ask "What quantity and size?" — they ask about the goal, location of use, duration, lighting conditions and sun/dust exposure, and the need for future maintenance. This is where you see the difference between someone taking an order and someone who understands the industry, and they may suggest modifications to your idea — not to upsell, but because a better technical or operational solution exists.</p>

<blockquote><p><strong>Why This Matters:</strong> A professional agency doesn't just sell you a product — it manages a complete process starting from understanding your real needs through to delivery. How they handle your first request is the <strong>most accurate indicator</strong> of how they'll manage your project later.</p></blockquote>

<h2>Second: Actual Experience, Portfolio, and Who Will Execute (Points 3–6)</h2>

<p>Ask the agency directly: <strong>Have you executed this specific product before?</strong> Whether it's a billboard, 3D letters, Light Box, Booth, Stand, or any other product — don't settle for just an answer. Request to see actual samples similar to your project in size, material, and finishing level.</p>

<p>A portfolio alone isn't enough either; <strong>verify its source</strong>. Some agencies show projects they participated in while the actual execution was done by a different manufacturer or supplier — this isn't necessarily a flaw as long as you know who's responsible for each stage. Ask: Do you have in-house Production, a workshop, or a factory, or do you rely on subcontractors? Understanding the execution chain gives you a clearer picture of responsibility, quality, and cost.</p>

<p>Real experience isn't years written on a website, but the <strong>type of work actually executed</strong>. Today's industry spans multiple specializations from Graphic Design and Branding to Digital Printing, CNC, Laser Cutting, Metal Fabrication, and Installation — and real experience is the ability to handle all of this as a single integrated system.</p>

<blockquote><p><strong>Window Advantage:</strong> Window Agency owns a fully equipped factory with integrated production lines in Riyadh, handling every project from concept to installation without relying on middlemen — giving you <strong>complete control over quality, timelines, and execution source</strong>.</p></blockquote>

<h2>Third: Compare Specifications Before Comparing Prices (Points 7–9)</h2>

<p>You might receive three quotes at completely different prices for the same request and assume the cheapest is best. But in advertising, <strong>price cannot be separated from material, manufacturing method, finishing, and expected lifespan</strong>. Always ask about material, thickness, lighting and paint type, delivery method and structure, finishing level, and warranty duration.</p>

<p>For example, with 3D illuminated letters, asking "What's the price per meter?" isn't enough. Ask whether it's calculated by linear or square meter, then look inside the letter itself: material thickness, acrylic type, LED type and source and electrical transformer, insulation and connection method, and paint type. Two letters may look identical from the outside while the real difference lies in materials and internal details invisible in photos.</p>

<p>Don't overlook an element that's often neglected: <strong>design</strong>. No matter how excellent the material and manufacturing, a weak design or inconsistent brand identity makes the customer judge your company from their first glance at the sign, catalog, or even your social media pages. Design isn't just a nice look — it's a company's <strong>visual language</strong> applied consistently across all customer touchpoints.</p>

<table><tbody>
<tr><td><strong>#</strong></td><td><strong>Comparison Point</strong></td><td><strong>What to Ask About</strong></td></tr>
<tr><td>1</td><td>Material and thickness</td><td>Material type and suitability for indoor or outdoor use</td></tr>
<tr><td>2</td><td>Lighting or printing technology</td><td>LED or ink type, source, and quality</td></tr>
<tr><td>3</td><td>Manufacturing and finishing</td><td>Welding method, insulation, paint, and assembly</td></tr>
<tr><td>4</td><td>Warranty and lifespan</td><td>Warranty duration and product behavior after years of use</td></tr>
<tr><td>5</td><td>Design and brand identity</td><td>Brand consistency across all project elements</td></tr>
</tbody></table>

<blockquote><p><strong>Market Fact:</strong> Two 3D letters may look virtually identical from the outside, while the real difference lies in <strong>materials, internal details, and manufacturing methods</strong>. Acrylic thickness, LED type, electrical transformer, insulation, internal paint — <strong>all these details make the difference between a product that lasts years and one that deteriorates within months</strong>.</p></blockquote>

<h2>Fourth: Execution, Follow-Up, and Long-Term Value (Points 10–15)</h2>

<p>Before approving any project, clearly define <strong>execution start date and delivery date</strong>, especially if tied to an event, exhibition, or grand opening — a product that arrives after the occasion is worthless regardless of quality. Follow up on the project during Production without hesitation — Artwork approval, printing or manufacturing start, Finishing completion, and installation date — this follow-up prevents last-minute surprises.</p>

<p>Before installation, <strong>review the product yourself</strong> whenever possible: dimensions, color, print resolution, material, finishing, lighting, logos, and quantity. For large-quantity print jobs, request a Proof or digital sample for review before full production, noting that digital printing may produce slight color differences compared to offset.</p>

<p>Finally, remember that the right question isn't "Who's cheapest?" but "<strong>What will I get for what I'm paying?</strong>" If you find an agency that understands your brand identity and delivers consistent quality, don't switch just for a minor price difference. Frequent agency changes mean starting from scratch every time, and may lead to <strong>visual inconsistency</strong> in your company's colors, materials, and identity over time. A reliable agency transforms from a mere supplier into a <strong>long-term marketing partner</strong>.</p>

<table><tbody>
<tr><td><strong>#</strong></td><td><strong>Evaluation Point</strong></td><td><strong>Why It Matters</strong></td></tr>
<tr><td>1</td><td>First impression and organization</td><td>Reflects how your project will be managed</td></tr>
<tr><td>2</td><td>Request understanding and account manager questions</td><td>Reveals the difference between order-taking and industry understanding</td></tr>
<tr><td>3</td><td>Actual experience and who will execute</td><td>Determines responsibility for quality and timelines</td></tr>
<tr><td>4</td><td>Comparing specifications before price</td><td>Prevents surprises in material and finishing</td></tr>
<tr><td>5</td><td>Follow-up and review before installation</td><td>Ensures results match what was agreed upon</td></tr>
<tr><td>6</td><td>Continuity with a reliable agency</td><td>Preserves brand identity consistency and quality</td></tr>
</tbody></table>

<h2>Related Articles from This Series</h2>

<ul>
<li>How to Evaluate an Advertising Agency Before Signing a Contract</li>
<li>Advertising &amp; Marketing — A Journey from Industry Evolution to Professional Passion</li>
<li>Comparing Materials and Specifications in the Advertising Industry</li>
<li>Why Weak Design Destroys Your Company's Image</li>
<li>Managing Your Advertising Project from Execution to Delivery</li>
<li>What Does a Full-Service Advertising Agency Offer? The Complete Services Guide</li>
</ul>

<p style="text-align:center;"><strong>Looking for an advertising agency in Riyadh that understands your project from the first call?</strong></p>
<p style="text-align:center;">Window Agency — 25+ years of design, execution, and manufacturing experience in Riyadh</p>
<p style="text-align:center;"><a href="https://windowadv.com/en/contact">Contact Us Now</a></p>

<h2>Frequently Asked Questions</h2>

<h3>Why isn't the lowest price always the best choice?</h3>

<p>Because price in this industry is directly tied to material, manufacturing method, finishing, and warranty. You might pay less today only to need remanufacturing or maintenance quickly, while the higher-quality product is more cost-effective long-term.</p>

<h3>How can I verify that the agency will actually execute the project and isn't just a middleman?</h3>

<p>Ask directly about in-house Production, a factory, or private workshop, and whether the agency relies on subcontractors for execution. Understanding the execution chain clarifies who's responsible for quality and timelines.</p>

<h3>Is design really as important as manufacturing?</h3>

<p>Yes — even with the best material and manufacturing, weak design or inconsistent branding makes the customer judge your company negatively at first glance. Design is the visual language that represents your company at every audience touchpoint.</p>

<h3>Should I request a sample before printing large quantities?</h3>

<p>Yes, whenever possible — especially for large projects. Request a Proof or digital sample for review before full production, noting that digital printing may differ slightly in color from offset printing.</p>

<h3>Does changing agencies frequently affect my company's identity?</h3>

<p>Yes — each new agency needs to start from scratch understanding your identity, and colors, materials, and finishing methods may vary, causing gradual visual inconsistency in your company's image.</p>

<h3>What's the most important thing to compare between agencies besides price?</h3>

<p>Compare actual specifications: material type and thickness, printing or lighting technology, finishing level, and warranty duration — these determine real value, not the number on a quote alone.</p>

<h3>What distinguishes an agency that owns its own factory?</h3>

<p>An in-house factory means direct control over material quality, production schedule, and delivery without middlemen, reducing costs and giving you complete transparency at every stage.</p>

<h3>How many points should I review before choosing an advertising agency?</h3>

<p>This guide identifies 15 practical points covering every aspect of the decision — from first impression to long-term partnership — protecting you from decisions based solely on price.</p>
HTML;
    }

    public function down(): void
    {
        $slug = '15-tips-choose-advertising-agency-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
