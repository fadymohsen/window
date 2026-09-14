<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'advertising-industry-journey-riyadh';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }
        $blogId = $blog->id;

        $enTitle           = 'Advertising & Marketing Companies in Riyadh: How to Choose the Right Agency for Your Project in 2026';
        $enMetaTitle       = 'Advertising Companies in Riyadh — How to Choose the Right Agency 2026 | Window Advertising';
        $enMetaDescription = 'Discover the advertising industry as a complete ecosystem from concept to execution, how its tools evolved from calligraphy to AI, and why a true professional looks for solutions — not just order fulfillment.';
        $enKeywords        = 'advertising companies in Riyadh,advertising agency Riyadh,best advertising company Saudi Arabia,advertising industry,Window Agency,advertising and marketing Saudi Arabia,signage design and execution,billboards Riyadh,brand identity,digital marketing Riyadh';

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
<p>There are professions where you can work for years repeating the same product, the same method, and the same tools. But the advertising and marketing industry is different — it never stops changing. Every period brings new materials, newer techniques, and more advanced machinery. That's why anyone who goes deep into this field eventually discovers it's no longer just a job — it becomes a passion for the craft itself. In this article, we explore: what the advertising industry really is, how its tools evolved from calligraphy to artificial intelligence, and why a true professional searches for solutions rather than simply fulfilling orders.</p>

<div style="max-width: 360px; margin: 24px auto;">
    <div style="position: relative; padding-bottom: 177.78%; height: 0; border-radius: 12px; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/Kc1H5w3BviQ" title="Window Advertising Agency"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
    </div>
</div>

<h2>Part One: What Is the Advertising Industry, Really?</h2>

<p>Advertising and marketing is not just an ad that appears in front of an audience. It's a complete ecosystem that starts with an idea, then design, then selecting the right materials and techniques, all the way through to printing or manufacturing, installation, and delivery. The end result could be a billboard, a storefront, a brand identity, an exhibition booth, a full-scale event, a promotional gift, or a digital campaign that reaches millions. That's why professional advertising companies don't sell just one product — they offer different solutions based on the nature of the business, the audience, the location, and the objective.</p>

<p>Behind every piece that looks simple on the street — a sign, a booth, or a printed piece — lies an entire world of specializations: Backdrops, Roll-ups, Signage, Light Boxes, 3D Channel Letters, Vehicle Branding, Corporate Gifts, and POSM. Each of these elements involves completely different details in terms of material, dimensions, structure, printing technique, assembly, lighting, final finishing, transport, and on-site installation.</p>

<blockquote><p><strong>Why This Matters to the Client:</strong> When the public sees a billboard or an illuminated storefront, they only see the final result. But behind it lies material selection, dimension studies, artwork preparation, manufacturing, assembly, and finishing. In some projects, the actual dimensions don't exactly match what was approved on paper — and this is where field experience in execution, not just design, becomes critical.</p></blockquote>

<blockquote><p><strong>The Window Advantage:</strong> Window Agency combines design, printing, manufacturing, marketing, and execution under one roof, making it capable of delivering a complete solution to the client rather than a single standalone product — from small shops all the way to major corporations and government entities.</p></blockquote>

<h2>Part Two: From Calligraphy and Brushes to Artificial Intelligence — Tools Change but the Idea Remains</h2>

<p>The history of the advertising industry is, in truth, the history of how humans communicate. Messages began with symbols and writing, then came the calligrapher, the brush, and hand-painted signs, followed by printing presses, newspaper advertising, photography, radio, and television. Then computers and design software completely transformed the industry, and digital printing, UV printing, plotters, CNC, laser cutting, and modern manufacturing techniques emerged — making it possible to execute ideas that were previously more difficult and costly. Then came the internet and social media, and today artificial intelligence and Digital Out-of-Home (DOOH) screens are ushering in new stages of the industry.</p>

<table><tbody>
<tr><td><strong>Era</strong></td><td><strong>Primary Tool</strong></td><td><strong>The Goal That Never Changed</strong></td></tr>
<tr><td>The Beginning</td><td>Calligraphy and hand drawing</td><td>Understanding the message and converting it into a visual form</td></tr>
<tr><td>Mid-Century</td><td>Printing press, photography, and television</td><td>Delivering the idea with better quality and wider reach</td></tr>
<tr><td>Computer Age</td><td>Computers and design software</td><td>Evolving the design process itself</td></tr>
<tr><td>Digital Age</td><td>Digital printing, CNC, UV, Laser</td><td>Executing harder ideas at better cost and speed</td></tr>
<tr><td>Today</td><td>Artificial Intelligence and DOOH screens</td><td>Capturing attention, delivering the message, and creating lasting impact</td></tr>
</tbody></table>

<blockquote><p><strong>Note:</strong> The tools have changed, the speed of execution has changed, and the way we reach audiences has changed. But the core goal remains the same: capture attention, deliver the message, and create a real impact on everyone who sees it.</p></blockquote>

<blockquote><p><strong>Numbers That Speak:</strong> Window Agency operates with over 25 years of experience in design, execution, and manufacturing. It owns a dedicated factory with integrated production lines (carpentry, aluminum, metalwork, digital printing, CNC, UV) that executes everything under one roof — from the first idea to the finished piece ready for installation.</p></blockquote>

<h2>Part Three: A Professional Doesn't Just Fulfill Orders… They Find Solutions</h2>

<p>There's a difference between someone who executes what the client asked for, and someone who thinks with the client. The executor asks: "What do you want?" The professional asks: "What are you trying to achieve?" Then they start thinking about design, material, dimensions, manufacturing method, usage location, audience experience, cost, and installation method. They may discover that the material the client chose isn't the best option, or that the dimensions need adjustment, or that the best solution isn't even the product the client originally requested. This is where advertising transforms from execution into consultation and solution-making.</p>

<p>One of the most exciting moments in this profession is when a client comes with an unconventional idea and says: "I searched for someone who could execute this and couldn't find anyone." For a professional, this is a challenge worth taking on: Should it be made from Acrylic or MDF? Do we need CNC or Laser Cutting? UV Printing or Vinyl? Do we need a metal structure, and how will assembly and finishing work, and do we need a prototype before production? This is how an idea evolves from a concept to a study, then a design, then a model, then manufacturing.</p>

<p>True impressiveness isn't about size. You could have a massive Mega Sign that leaves no impact, and you could have a simple idea that makes the audience stop and stare. Real impact comes from the combination of a smart idea, strong design, the right material, the correct technique, and precise execution.</p>

<table><tbody>
<tr><td><strong>#</strong></td><td><strong>The Sign</strong></td><td><strong>Why It Matters</strong></td></tr>
<tr><td>1</td><td>Asks about the project's goal, not just specifications</td><td>Delivers a real solution instead of literal execution</td></tr>
<tr><td>2</td><td>Suggests better alternatives in material or technique</td><td>Protects the quality of the final result</td></tr>
<tr><td>3</td><td>Capable of manufacturing unconventional ideas</td><td>Opens the door to solutions that didn't exist in the market</td></tr>
<tr><td>4</td><td>Follows up on field execution, not just design</td><td>Ensures the result matches actual dimensions and reality</td></tr>
<tr><td>5</td><td>Keeps up with new tools and techniques continuously</td><td>Maintains competitiveness and quality over time</td></tr>
</tbody></table>

<p>Ultimately, advertising and marketing is not just a sign, a printed piece, a booth, or an ad on a screen — it's an industry that combines creativity, design, printing, manufacturing, technology, marketing, and visual communication. It's a journey that starts with a small idea and may end with work seen by thousands or millions. That's why anyone who goes deep into this field finds it hard to see it as just a regular job — every project is a lesson, every challenge is experience, and every new idea is another space to discover in this vast world.</p>

<h2>Frequently Asked Questions</h2>

<h3>What exactly is the advertising industry?</h3>

<p>It's a complete ecosystem that starts from an idea and passes through design, material and technique selection, all the way to manufacturing or printing, installation, and delivery. It includes diverse products such as signage, brand identity, exhibition booths, and digital campaigns.</p>

<h3>Why does it matter to work with an agency that owns its own factory?</h3>

<p>Because it controls quality entirely from design to execution to finishing, without a middleman adding costs or reducing quality oversight and deadline control.</p>

<h3>What's the difference between an agency that fulfills orders and one that finds solutions?</h3>

<p>An order-fulfilling agency only asks "What do you want?" while a solution-finding agency asks "What are you trying to achieve?" and suggests better alternatives in material, design, and execution — even if the client didn't ask for them.</p>

<h3>Will artificial intelligence eliminate the need for professional designers or executors?</h3>

<p>No. AI accelerates some stages of design and production, but it still needs a human who understands the idea and steers it toward the right outcome — just as every previous tool needed someone to guide it.</p>

<h3>Can an idea that doesn't exist in the market be executed?</h3>

<p>Yes, and this is one of the most exciting challenges in the industry. It starts with studying the right material and technique, then design, then a prototype if necessary, then actual manufacturing.</p>

<h3>How do I know an advertising agency has real experience and not just years of operation?</h3>

<p>Ask about the types of projects they've actually executed, their diversity, their scale, and whether they have actual manufacturing capability or rely on subcontracting.</p>

<p style="text-align:center;"><strong>Looking for an advertising agency that turns your idea into a real solution?</strong></p>
<p style="text-align:center;">Window Agency — 25+ years of experience in design, execution, and manufacturing</p>
<p style="text-align:center;"><a href="https://windowadv.com/en/contact">Contact us now</a></p>
HTML;
    }

    public function down(): void
    {
        $slug = 'advertising-industry-journey-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blog_translations')->where('blog_id', $blog->id)->where('locale', 'en')->delete();
        }
    }
};
