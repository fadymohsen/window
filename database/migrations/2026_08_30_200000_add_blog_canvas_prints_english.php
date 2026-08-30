<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', 'canvas-prints-frames-saudi-arabia-window-agency')->first();
        if (!$blog) {
            return;
        }

        $blogId = $blog->id;

        $enTitle           = 'Canvas Prints & Frames in Saudi Arabia: From Design to Reality with Window Agency';
        $enMetaTitle       = 'Professional Canvas Prints & Frames in Saudi Arabia | Window Advertising Agency';
        $enMetaDescription = 'Window Agency designs and prints premium canvas prints and frames in Riyadh — single canvas, multi-panel art, gold and wooden frames, and architectural plan printing. Professional execution from design to hanging.';
        $enKeywords        = 'advertising and marketing,canvas prints,frames,large format printing,brand identity design,signs and banners,employee gifts,annual report design,project fencing,exhibitions and conferences,social media management,website design,architectural plan printing,wall art,printed canvas';

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
<p><strong>"A canvas print isn't just a picture on a wall — it's a first impression that never gets a second chance."</strong> That's what we believe at <strong>Window Advertising Agency</strong>. Every canvas print that leaves our facility carries a story — a story of a real estate developer wanting to showcase their vision in the most stunning way, a corporation decorating its headquarters with artistic touches that reflect its identity, or a consulting firm aiming to build a professional impression from the moment visitors walk through the door. We don't just print images on canvas — we <strong>create visual experiences that stay in memory</strong>. From premium <strong>canvas prints</strong> with gold and wooden frames, to sleek <strong>metal frames</strong>, to <strong>large-format architectural plan printing</strong> for major projects — Window Agency is your go-to partner for designing and producing <strong>signs and banners</strong> at the highest quality standards in Riyadh and across Saudi Arabia.</p>
</blockquote>

<h2>Why Canvas Prints Have Become a Necessity, Not a Luxury</h2>

<p>In the age of visual communication, an empty wall in a corporate office or showroom sends a negative message — a message of neglect and lack of attention to detail. Leading organizations in Saudi Arabia have realized that <strong>brand identity design</strong> doesn't stop at the logo and business card — it extends to every surface and every corner of the work environment, including the walls.</p>

<h3>Canvas Prints in Real Estate Projects</h3>

<p>Major real estate projects in the Kingdom — from residential towers to commercial complexes and smart cities under <strong>Saudi Vision 2030</strong> — need professional visual displays of their architectural designs and future vision. High-resolution canvas prints in premium frames are hung in showrooms and sales offices to impress visitors and investors and convince them of the project's quality before a single brick is laid.</p>

<h3>Canvas Prints in the Workplace</h3>

<p>Studies confirm that a thoughtfully designed work environment increases employee productivity and improves morale. Artwork on the walls — whether stunning landscape photographs, abstract art pieces, or even images of the company's previous projects — transforms the office from a mere workspace into an inspiring environment that reflects the organization's culture and values.</p>

<h3>Canvas Prints in Hospitality</h3>

<p>Hotels, upscale restaurants, and resorts across the Kingdom invest heavily in art prints to create distinctive atmospheres for their guests. The right canvas in a lobby, meeting room, or hotel suite completes the guest experience and reinforces a positive impression of the venue.</p>

<blockquote>
<p><strong>Market Fact:</strong> The large-format printing market in Saudi Arabia is valued at billions of riyals annually, driven by the real estate and tourism boom under Vision 2030. Demand for professional canvas prints and frames is growing at over <strong>25% annually</strong> as the hospitality, real estate, and corporate office sectors expand. Organizations that invest in high-quality prints build a significantly stronger brand image than those that settle for empty walls or cheap prints that quickly fade.</p>
</blockquote>

<h2>Types of Canvas Prints & Frames Produced by Window Agency</h2>

<p>At Window Agency — one of Riyadh's leading <strong>advertising and marketing</strong> firms specializing in professional printing and manufacturing — we design and produce a wide range of prints and frames to meet every need, from single art pieces to complete visual furnishing projects.</p>

<h3>1. Single Canvas Prints</h3>

<p>High-resolution prints on premium canvas fabric, stretched over internal wooden stretcher bars, ready to hang. This is the most popular type and is used in:</p>

<ul>
<li><strong>Real estate showrooms:</strong> Large architectural renders up to 150×100 cm and beyond</li>
<li><strong>Executive offices and reception areas:</strong> Elegant art pieces reflecting the organization's taste</li>
<li><strong>Hotels and restaurants:</strong> Artwork that complements interior design</li>
<li><strong>Homes and villas:</strong> Custom prints with exclusive designs</li>
</ul>

<p>Every print is produced using the latest wide-format printing technology with UV-resistant inks that ensure color stability for years.</p>

<blockquote>
<p><strong>Window Advantage:</strong> At Window Agency, we use the latest <strong>Eco-Solvent</strong> and <strong>UV-Curable</strong> inks globally — environmentally friendly inks that resist fading, moisture, and scratching. Our prints retain their color vibrancy for over <strong>7 years</strong> even under direct lighting, while prints made with traditional inks begin fading within months.</p>
</blockquote>

<h3>2. Multi-Panel Canvas Art</h3>

<p>Prints divided into two, three, four, or even five panels (Diptych / Triptych / Polyptych) hung side by side to form a single cohesive visual scene. This style has become one of the most popular trends in contemporary interior design for several reasons:</p>

<ul>
<li><strong>Enhanced visual impact:</strong> A split canvas attracts more attention than a single piece because it creates visual movement across the wall</li>
<li><strong>Size flexibility:</strong> Large wall areas can be covered without needing a single oversized piece that's difficult to transport and install</li>
<li><strong>Sophisticated artistic effect:</strong> The division adds a contemporary artistic dimension to any image — even simple photos appear more engaging and deeper when split</li>
</ul>

<p>In Window Agency's promotional video, we see a live example — a triptych of a stunning sunset scene through tree branches, split across three adjacent canvas panels that together create a cinematic scene that captures every viewer's attention.</p>

<blockquote>
<p><strong>From Our Portfolio:</strong> We produced triptych canvas prints for <strong>major real estate companies'</strong> offices in Riyadh — prints displaying their architectural project renders (3D Renders) in an elegant three-panel split covering an entire reception wall. The result: every visitor entering the headquarters sees the project at its finest before sitting down for the meeting.</p>
</blockquote>

<h3>3. Framed Prints</h3>

<p>Prints on photographic paper or canvas, enclosed in professional frames of various shapes and materials. Window Agency has a fully equipped framing workshop with cutting and assembly machines for all frame types:</p>

<table>
<thead>
<tr><th>Frame Type</th><th>Material</th><th>Best Use</th><th>Appearance</th></tr>
</thead>
<tbody>
<tr><td>Natural wood frames</td><td>Beech or pine wood</td><td>Classic offices, homes</td><td>Warm and elegant</td></tr>
<tr><td>Gold frames</td><td>Gold-plated wood</td><td>Formal halls, hotels</td><td>Luxurious and traditional</td></tr>
<tr><td>Silver / Chrome frames</td><td>Metal or plated wood</td><td>Modern offices, galleries</td><td>Contemporary and sleek</td></tr>
<tr><td>Matte black frames</td><td>Wood or aluminum</td><td>Art galleries, studios</td><td>Simple and neutral</td></tr>
<tr><td>Frameless (Floating)</td><td>Glass with rear mounts</td><td>Modern decor, open spaces</td><td>Clean and contemporary</td></tr>
</tbody>
</table>

<p>Our framing workshop features a professional corner-cutting machine that cuts frames at a precise 45-degree angle — no gaps, no flaws in the corners — then assembles the pieces and secures the print with protective glass and a sturdy backing, ready to hang.</p>

<blockquote>
<p><strong>Window Advantage:</strong> Our framing workshop houses a vast collection of frame samples — over <strong>200 shapes, colors, and materials</strong> — giving clients the ability to choose the perfect frame that matches their space's decor and personal taste. We never limit clients to a narrow selection — we present a full spectrum of options for the perfect fit.</p>
</blockquote>

<h3>4. Architectural & Engineering Plan Printing</h3>

<p>A specialized service Window Agency offers to engineering firms, construction companies, and real estate developers — printing project plans in large formats at exceptional resolution on engineering paper, canvas, or vinyl. In the video, we see the industrial printer producing floor plans for massive projects (Ground Floor Area: 5,898 m² and First Floor Area: 5,971 m²) — detailed plans with every dimension and measurement precisely reproduced.</p>

<p>These plans are used in:</p>

<ul>
<li><strong>Meeting rooms:</strong> For reviewing designs with clients and investors</li>
<li><strong>Construction sites:</strong> As field references for engineers and contractors</li>
<li><strong>Showrooms:</strong> To display project details in a clear visual format</li>
<li><strong>Presentations:</strong> As impactful visual aids in stakeholder meetings</li>
</ul>

<blockquote>
<p><strong>Why This Matters:</strong> An engineering plan printed on regular paper with a desktop printer loses fine details and fades quickly. A professionally printed plan on a wide-format printer shows every line, number, and detail with perfect clarity — which is exactly what the engineer on-site and the developer in the boardroom need.</p>
</blockquote>

<h3>5. Art Prints & Poster Prints</h3>

<p>Printing artworks — whether digital oil paintings, graphic illustrations, or professional photography — in large formats on high-quality photographic paper or canvas. In the video, we see a detailed art print with rich colors (a warrior scene against a mountain backdrop) — a print that preserves every detail of the original work, from color gradients to the finest lines.</p>

<p>This type serves:</p>

<ul>
<li><strong>Artists and photographers:</strong> Limited edition prints of their works for sale or exhibition</li>
<li><strong>Interior designers:</strong> Custom art pieces tailored to each space's design</li>
<li><strong>Corporations:</strong> Custom prints reflecting the organization's values and culture</li>
<li><strong>Art enthusiasts:</strong> High-quality prints of digital artwork or personal photos at gallery standard</li>
</ul>

<h2>The Canvas Print Journey from Design to Hanging: Window Agency's Process</h2>

<p>Every canvas print goes through a meticulous journey from concept to wall. Here are the stages we follow at Window Agency to ensure exceptional results every time:</p>

<h3>Step 1: Consultation & Needs Assessment</h3>

<p>Every project begins with a consultative session with the client to understand their needs precisely — What's the purpose of the prints? Where will they hang? What space is available? What style is preferred (classic, modern, artistic)? What's the budget? These questions define the entire project path.</p>

<h3>Step 2: Graphic Design</h3>

<p>Window Agency's design team — specialists in <strong>brand identity design</strong>, <strong>social media management</strong>, and promotional materials — prepares designs that align with the client's identity and taste. We use the latest design software (Adobe Photoshop, Illustrator, InDesign) to prepare files at the resolution required for large-format printing (300 DPI minimum).</p>

<h3>Step 3: Material & Size Selection</h3>

<p>We present clients with actual samples of canvas fabrics and frame types to choose between:</p>

<ul>
<li>Cotton Canvas — natural, luxurious texture</li>
<li>Polyester Canvas — high durability, vibrant colors</li>
<li>Glossy or Matte Photo Paper</li>
<li>Available frame types (wooden, gold, silver, black)</li>
</ul>

<h3>Step 4: Printing with Latest Technology</h3>

<p>We use wide-format printers with the latest technology — printers up to 3.2 meters wide capable of producing massive prints at resolutions exceeding 1440×1440 DPI. The inks used are UV-resistant, moisture-proof, and scratch-resistant.</p>

<h3>Step 5: Stretching & Framing</h3>

<p>After printing, the canvas moves to the framing workshop where:</p>

<ul>
<li><strong>Canvas prints:</strong> Are stretched over internal wooden stretcher bars by hand with meticulous care to ensure even tension without wrinkles or sagging</li>
<li><strong>Framed prints:</strong> Frames are cut using a 45-degree corner cutting machine and assembled around the print with protective glass and a sturdy backing</li>
</ul>

<h3>Step 6: Quality Control & Delivery</h3>

<p>Every print undergoes rigorous quality inspection — verifying color accuracy, print quality, frame integrity, and hanging readiness. Then it's carefully packaged and delivered to the client or installed on-site by our team.</p>

<blockquote>
<p><strong>Numbers That Speak:</strong> At Window Agency, we produce over <strong>500 canvas prints and frames monthly</strong> for clients across various sectors — from major real estate projects to corporate offices and luxury homes. Our high production capacity enables us to deliver large projects in record time without compromising quality.</p>
</blockquote>

<h2>The Difference Between Professional and Cheap Canvas Prints</h2>

<p>The market is flooded with "cheap canvas print" offers — but the difference between a professional print and a cheap one is vast and becomes evident over time:</p>

<table>
<thead>
<tr><th>Criteria</th><th>Professional Canvas (Window)</th><th>Cheap Canvas</th></tr>
</thead>
<tbody>
<tr><td>Fabric</td><td>High-density cotton or polyester canvas</td><td>Thin, low-quality fabric</td></tr>
<tr><td>Inks</td><td>UV/Eco-Solvent, fade-resistant</td><td>Water-based inks that fade quickly</td></tr>
<tr><td>Stretcher bars</td><td>Kiln-dried, moisture-treated wood</td><td>Untreated wood that warps over time</td></tr>
<tr><td>Stretching</td><td>Professional hand-stretching with even tension</td><td>Machine stretching with uneven tension</td></tr>
<tr><td>Color longevity</td><td>7+ years</td><td>6-12 months</td></tr>
<tr><td>Corners</td><td>Neatly folded with hidden staples</td><td>Messy and visible</td></tr>
<tr><td>Packaging</td><td>Professional with corner protection</td><td>Basic, may damage the print</td></tr>
</tbody>
</table>

<blockquote>
<p><strong>Why This Matters:</strong> A cheap print may save you a few hundred riyals today — but it will cost you your reputation tomorrow. Imagine an important client visiting your headquarters and seeing faded prints, sagging canvases, or cracked corners — the impression they take away can't be compensated by any presentation, no matter how impressive.</p>
</blockquote>

<h2>Canvas Print Applications Across Different Sectors</h2>

<h3>Real Estate & Major Projects</h3>

<p>Canvas prints are the go-to tool for <strong>project fencing</strong> and real estate showrooms. Architectural renders printed at large sizes on premium canvas with gold frames create a visual experience that makes buyers see the project as if it were already completed. Many real estate developers in the Kingdom prefer canvas prints over electronic screens because they're more elegant and require no maintenance or electricity.</p>

<blockquote>
<p><strong>From Our Portfolio:</strong> We produced a canvas print collection for a <strong>major real estate project showroom</strong> in Riyadh — 12 prints of various sizes showcasing the project's facades, interior layouts, and lifestyle renders. Each framed in elegant gold with spotlight lighting against exposed concrete walls — the result: a showroom that looks like a world-class art gallery.</p>
</blockquote>

<h3>Hospitality & Hotels</h3>

<p>Hotels, resorts, and upscale cafés rely on art prints to create distinctive visual identities. Window Agency provides comprehensive consultancy — from selecting appropriate artworks to printing, framing, and on-site installation. In the video, we see elegant floral canvas art with a dark background and warm tones — this type of print is widely used in hotel suites and fine dining establishments.</p>

<h3>Corporate & Office Sector</h3>

<p>Corporate offices use canvas prints to strengthen <strong>brand identity design</strong> within the work environment. Prints featuring the company's values and vision, images of its achievements and projects, or even inspirational artwork — all contribute to building a strong corporate culture and motivating work environment.</p>

<h3>Exhibitions & Conferences</h3>

<p>At <strong>exhibitions and conferences</strong> across the Kingdom, canvas prints serve as an elegant alternative to traditional banners in booth design. A framed print looks more prestigious than a standard banner and gives the booth a professional appeal that attracts visitors.</p>

<h2>Canvas Prints as Corporate & Personal Gifts</h2>

<p>Canvas prints aren't just for hanging on walls — they're among the finest <strong>employee gifts</strong> and client appreciation items. Imagine gifting a valued client a premium canvas print with a custom image — perhaps a photo of a project you completed together, or an exclusive art piece in their brand colors. This gift:</p>

<ul>
<li>Stays on their office or home wall for years</li>
<li>Reminds them of your brand every day</li>
<li>Reflects your attention to detail and quality</li>
<li>Outperforms traditional gifts (pens and notebooks) that are quickly forgotten</li>
</ul>

<p>Window Agency offers custom gift canvas design, printing, framing, and luxury packaging with personalized greeting cards. This service falls under our comprehensive <strong>employee gifts</strong> and promotional gifts solutions.</p>

<blockquote>
<p><strong>Window Advantage:</strong> We offer a "Ready Gift Canvas" service — a printed, framed, and packaged canvas in a luxury gift box with a personalized greeting card, ready for direct delivery. This service is perfect for organizations wanting to present distinctive gifts on occasions — from National Day to awards ceremonies and year-end celebrations.</p>
</blockquote>

<h2>Printing Technologies Used at Window Agency</h2>

<p>Window Agency continuously invests in the latest global printing technologies to ensure the highest possible quality:</p>

<h3>Wide/Large Format Printers</h3>

<p>Industrial printers with print widths up to 3.2 meters — capable of producing massive prints in a single piece without any joins or seams. These printers feature:</p>

<ul>
<li><strong>Precision print heads:</strong> Producing droplets as small as 3.5 picoliters for ultra-fine detail</li>
<li><strong>Extended color system:</strong> CMYK + Light Cyan + Light Magenta + White for smooth color gradients</li>
<li><strong>High production speed:</strong> Capable of printing multiple canvases daily without compromising quality</li>
</ul>

<h3>Specialized Inks</h3>

<table>
<thead>
<tr><th>Ink Type</th><th>Advantage</th><th>Application</th></tr>
</thead>
<tbody>
<tr><td>Eco-Solvent</td><td>Eco-friendly, waterproof</td><td>Indoor and outdoor prints</td></tr>
<tr><td>UV-Curable</td><td>Instant drying, scratch-resistant</td><td>Glossy finish prints</td></tr>
<tr><td>Latex</td><td>Odorless, flexible</td><td>Hospital and school prints</td></tr>
<tr><td>Dye-Sublimation</td><td>Extremely vibrant colors, smooth texture</td><td>Premium polyester canvas</td></tr>
</tbody>
</table>

<h3>Cutting & Framing Machines</h3>

<p>The framing workshop is equipped with professional corner-cutting machines and assembly presses — cutting frames with extreme precision and assembling them with strength that ensures long-lasting durability.</p>

<h2>Why Choose Window Agency for Your Canvas Prints?</h2>

<p>Window Agency isn't just a print shop — it's a <strong>full-service advertising and marketing agency</strong> that combines creativity and manufacturing under one roof. What sets us apart:</p>

<ol>
<li><strong>In-house design team:</strong> You don't need to bring a ready design — our team designs from scratch to match your identity and space</li>
<li><strong>Integrated factory and workshop:</strong> Printing, stretching, framing, and packaging — everything happens in-house for complete quality control</li>
<li><strong>Latest technology:</strong> We invest in the newest printers and machines globally</li>
<li><strong>Extensive experience:</strong> Years of experience serving government and private sectors across the Kingdom</li>
<li><strong>Comprehensive service:</strong> From consultation and design to on-site installation — we handle everything</li>
<li><strong>Competitive pricing:</strong> High quality at competitive prices thanks to our large production capacity</li>
</ol>

<p>Beyond canvas prints and frames, Window Agency offers integrated services including professional <strong>annual report design</strong>, responsive <strong>website design</strong>, indoor and outdoor <strong>signs and banners</strong>, <strong>exhibitions and conferences</strong> organization, and <strong>social media management</strong> — everything your organization needs under one roof.</p>

<blockquote>
<p><strong>From Our Portfolio:</strong> We've partnered with government entities and major private companies to execute comprehensive canvas and framing projects — from furnishing entire new headquarters with custom prints to building complete real estate showroom experiences. Every project we take on is an opportunity to prove that excellence in details is what makes the difference.</p>
</blockquote>

<h2>How to Order Canvas Prints & Frames from Window Agency</h2>

<p>Getting professional canvas prints and frames from Window Agency is easier than you think:</p>

<ol>
<li><strong>Contact us:</strong> Call, WhatsApp, or visit our headquarters in Riyadh</li>
<li><strong>Define your needs:</strong> Tell us the purpose, location, quantity, and sizes required</li>
<li><strong>Receive a quote:</strong> We provide a detailed quote with material samples</li>
<li><strong>Approve and go:</strong> Upon approval, we begin designing and printing immediately</li>
<li><strong>Receive your prints:</strong> We deliver ready prints or install them at your location</li>
</ol>

<h2>Frequently Asked Questions About Canvas Prints & Frames</h2>

<p><strong>Q: What's the difference between a canvas print and a framed print?</strong></p>
<p>A canvas print is printed on fabric and stretched over internal wooden stretcher bars — it looks modern, lightweight, and doesn't need glass. A framed print is printed on paper or canvas and surrounded by an external frame with protective glass — it looks classic and luxurious. The choice depends on taste and the nature of the space.</p>

<p><strong>Q: What's the largest size you can print?</strong></p>
<p>Our printers handle widths up to 3.2 meters with unlimited length. We can print massive pieces covering an entire wall in a single sheet without any joins.</p>

<p><strong>Q: How long do canvas print colors last?</strong></p>
<p>Our prints using Eco-Solvent and UV inks retain their colors for over 7 years under normal indoor conditions. We recommend avoiding prolonged direct sunlight exposure to maximize color longevity.</p>

<p><strong>Q: Can I print my own photo on canvas?</strong></p>
<p>Absolutely! We print any image the client provides — whether personal, family, project, or artwork photos. The only requirement is that the image be high enough resolution (300 DPI for the desired size) to ensure print quality.</p>

<p><strong>Q: What's the turnaround time?</strong></p>
<p>Individual prints are completed within 2-3 business days. Large projects (10+ prints) require 5-7 business days depending on complexity and sizes. For urgent cases, we offer 24-hour rush service.</p>

<p><strong>Q: Do you offer on-site installation?</strong></p>
<p>Yes. Our team handles installing prints at the client's location at the proper height and spacing with secure mounting that ensures the prints' safety. This is especially important for large projects requiring precise coordination between multiple prints.</p>

<p><strong>Q: How much does a professional canvas print cost?</strong></p>
<p>Pricing depends on size, canvas type, and frame type. We provide detailed quotes after understanding the client's needs. Generally, our prices are very competitive for the quality delivered — and we offer special discounts for bulk orders.</p>

<p><strong>Q: Do you print engineering and architectural plans?</strong></p>
<p>Yes, we offer large-format engineering and architectural plan printing on engineering paper or canvas. This service is designed for engineering firms, construction companies, and real estate developers who need high-resolution plans for meetings and field sites.</p>

<h2>Contact Window Agency Today</h2>

<p>A professional canvas print isn't a cost — it's an <strong>investment in the first impression</strong> that everyone who enters your headquarters, showroom, or office takes away. <strong>Window Advertising Agency</strong> transforms any image or design into an art piece that catches eyes and highlights your brand — from design to reality, with complete professionalism.</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What's the difference between a canvas print and a framed print?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A canvas print is printed on fabric and stretched over internal wooden stretcher bars — it looks modern, lightweight, and doesn't need glass. A framed print is printed on paper or canvas and surrounded by an external frame with protective glass — it looks classic and luxurious."
      }
    },
    {
      "@type": "Question",
      "name": "What's the largest size you can print on canvas?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our printers handle widths up to 3.2 meters with unlimited length. We can print massive pieces covering an entire wall in a single sheet without any joins."
      }
    },
    {
      "@type": "Question",
      "name": "How long do canvas print colors last?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our prints using Eco-Solvent and UV inks retain their colors for over 7 years under normal indoor conditions."
      }
    },
    {
      "@type": "Question",
      "name": "Can I print my own photo on canvas?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely! We print any image the client provides — whether personal, family, project, or artwork photos. The only requirement is that the image be high enough resolution (300 DPI for the desired size)."
      }
    },
    {
      "@type": "Question",
      "name": "What's the turnaround time for canvas prints?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Individual prints are completed within 2-3 business days. Large projects (10+ prints) require 5-7 business days. For urgent cases, we offer 24-hour rush service."
      }
    },
    {
      "@type": "Question",
      "name": "Do you offer on-site installation?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Our team handles installing prints at the client's location at the proper height and spacing with secure mounting that ensures the prints' safety."
      }
    },
    {
      "@type": "Question",
      "name": "How much does a professional canvas print cost?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pricing depends on size, canvas type, and frame type. We provide detailed quotes after understanding the client's needs, and we offer special discounts for bulk orders."
      }
    },
    {
      "@type": "Question",
      "name": "Do you print engineering and architectural plans?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we offer large-format engineering and architectural plan printing on engineering paper or canvas. This service is designed for engineering firms, construction companies, and real estate developers."
      }
    }
  ]
}
</script>
HTML;
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', 'canvas-prints-frames-saudi-arabia-window-agency')->first();
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
