<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'saudi-currency-riyal-evolution';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('id', 29)->first();
        }
        if (!$blog) { return; }
        $blogId = $blog->id;

        $enTitle           = 'The Saudi Currency Witnesses Major Evolution: The Story of the Riyal and Its New Symbol';
        $enMetaTitle       = 'The Saudi Currency Witnesses Major Evolution: The Story of the Riyal and Its New Symbol | Window Advertising Agency';
        $enMetaDescription = 'Explore the full history of the Saudi Riyal from its first issuance in 1346H under King Abdulaziz to the launch of its new symbol. Learn how the Riyal symbol strengthens national identity, supports Vision 2030, and impacts Saudi Arabia\'s position among the world\'s strongest economies.';
        $enKeywords        = 'Saudi Riyal symbol,Saudi currency history,Saudi Riyal evolution,new Riyal symbol,Saudi Arabia G20 economy,Vision 2030 currency,Saudi monetary identity,Saudi Riyal 1346H,Riyal symbol applications,Window Advertising Agency';

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
<p>The Saudi Riyal is far more than a unit of currency. It is a symbol of national sovereignty, economic strength, and a legacy that stretches back to the founding of the Kingdom itself. From its first issuance under King Abdulaziz in 1346H to the recent launch of a distinctive new Riyal symbol, the Saudi currency has undergone a remarkable evolution that mirrors the Kingdom's journey from a young nation to one of the world's most powerful economies and a proud member of the G20. In this comprehensive article, <strong>Window Advertising Agency</strong> explores the full history of the Saudi Riyal, the strategic significance of its new symbol, its wide-ranging applications, and what this evolution means for businesses, investors, and the broader Saudi economy under Vision 2030.</p>
</blockquote>

<h2>The Historical Roots of the Saudi Riyal: From 1346H to a Global Currency</h2>

<p>The story of the Saudi Riyal begins in the early days of the Kingdom's unification. In 1346H (1927 CE), King Abdulaziz bin Abdulrahman Al Saud authorized the issuance of the first Saudi Riyal as a silver coin. This was a foundational act — establishing a unified national currency was essential to consolidating the newly formed Kingdom's economic sovereignty and replacing the fragmented currencies that had circulated across the Arabian Peninsula's various regions.</p>

<p>In those early decades, the Riyal circulated alongside other currencies and was primarily a silver-based coin. As the Kingdom's oil wealth began to transform the economy in the mid-twentieth century, the need for a modern monetary system became clear. The Saudi Arabian Monetary Agency — known today as the Saudi Central Bank (SAMA) — was established in 1952 to oversee the currency, regulate the banking system, and ensure monetary stability.</p>

<p>The introduction of paper banknotes marked a significant milestone. The first official Saudi banknotes were issued in 1961, replacing the pilgrim receipts that had served as a form of paper currency. These banknotes featured Arabic calligraphy, images of the Kingdom's landmarks, and security features that evolved with each successive series.</p>

<blockquote>
<p><strong>Economic Milestone:</strong> Since 1986, the Saudi Riyal has been pegged to the US Dollar at a fixed exchange rate of 3.75 SAR per 1 USD. This peg has provided exceptional monetary stability, making the Riyal one of the most predictable and trusted currencies for international trade and investment in the Middle East and beyond.</p>
</blockquote>

<p>Over the decades, the Riyal has been redesigned multiple times, with each new series incorporating advanced security features, updated imagery reflecting the Kingdom's modernization, and improved durability. Each redesign was not merely aesthetic — it represented the Kingdom's evolving identity and growing confidence on the world stage.</p>

<h2>Saudi Arabia in the G20: One of the World's Strongest Economies</h2>

<p>To understand the significance of the Saudi Riyal's evolution, it is essential to understand the economic context in which it operates. Saudi Arabia is not a developing economy experimenting with monetary policy. It is a G20 member — one of the twenty largest and most influential economies on the planet — with a GDP that consistently ranks among the top worldwide.</p>

<p>The Kingdom's economic strength is built on several pillars that make the Riyal one of the most stable currencies globally:</p>

<ul>
<li><strong>Oil and energy leadership:</strong> Saudi Arabia holds the world's second-largest proven oil reserves and is the largest crude oil exporter, giving the Kingdom unmatched influence in global energy markets.</li>
<li><strong>Sovereign wealth:</strong> The Public Investment Fund (PIF) is one of the world's largest sovereign wealth funds, with assets exceeding $900 billion and investments spanning technology, entertainment, sports, and infrastructure globally.</li>
<li><strong>Economic diversification:</strong> Under Vision 2030, Saudi Arabia is rapidly diversifying beyond oil into tourism, entertainment, technology, renewable energy, manufacturing, and financial services.</li>
<li><strong>Strategic geographic position:</strong> Located at the crossroads of three continents, the Kingdom serves as a natural hub for trade between Asia, Europe, and Africa.</li>
<li><strong>Young and growing population:</strong> With over 70% of the population under 35, Saudi Arabia has a dynamic workforce driving consumption, innovation, and economic growth.</li>
</ul>

<blockquote>
<p><strong>Global Standing:</strong> Saudi Arabia hosted the G20 Summit in 2020, demonstrating its role as a major player in shaping global economic policy. The Kingdom's membership in the G20, the World Trade Organization, and OPEC gives the Saudi Riyal a level of international credibility and recognition that few currencies in the region can match.</p>
</blockquote>

<p>It is within this context of economic strength and global ambition that the launch of a new Riyal symbol becomes not just a design exercise, but a strategic national initiative with far-reaching implications.</p>

<h2>The Launch of the New Saudi Riyal Symbol: A National Monetary Identity</h2>

<p>Major world currencies have long been identified by their symbols — the Dollar sign ($), the Euro sign, the British Pound sign, and the Japanese Yen sign are instantly recognizable across the globe. These symbols do more than abbreviate a currency name. They serve as visual shorthand that communicates economic identity, stability, and global presence.</p>

<p>The Saudi Riyal, despite being one of the most traded and stable currencies in the world, historically lacked a dedicated symbol of this kind. The launch of the new Riyal symbol fills this gap, giving the Kingdom's currency a distinctive visual identity that can be used across all financial, commercial, and digital platforms.</p>

<h3>The Strategic Goals Behind the Symbol</h3>

<p>The introduction of the new Riyal symbol was driven by several interconnected strategic objectives:</p>

<ol>
<li><strong>Strengthening national pride and cultural belonging:</strong> The symbol gives every Saudi citizen a visual mark that represents the Kingdom's economic sovereignty and heritage — a daily reminder of the nation's achievements and global standing.</li>
<li><strong>Enhancing global confidence in the Saudi Riyal:</strong> A dedicated currency symbol signals monetary maturity and stability, reinforcing the Riyal's credibility in international financial markets and foreign exchange.</li>
<li><strong>Showcasing the Kingdom's position among world economies:</strong> By joining the ranks of currencies with internationally recognized symbols, the Saudi Riyal asserts its rightful place alongside the Dollar, Euro, and other major currencies.</li>
<li><strong>Supporting digital economy infrastructure:</strong> A standardized symbol is essential for digital platforms, fintech applications, and electronic payment systems that require consistent currency representation.</li>
<li><strong>Unifying financial communication:</strong> The symbol creates a single, universally understood mark that replaces the various abbreviations (SAR, SR, S.R.) used inconsistently across different contexts.</li>
</ol>

<blockquote>
<p><strong>Symbol Significance:</strong> The launch of the Riyal symbol positions Saudi Arabia among a select group of nations whose currencies are identified by globally recognized visual marks. This is a strategic asset that enhances the currency's visibility and recognition in every financial transaction, digital display, and commercial document worldwide.</p>
</blockquote>

<h2>The Design of the Riyal Symbol: Arabic Calligraphy Meets Modern Identity</h2>

<p>The design of the new Riyal symbol is not arbitrary. It is the product of careful consideration that balances cultural authenticity with modern functionality. The symbol needed to be deeply rooted in Saudi and Islamic heritage while being simple, clear, and reproducible across every medium — from a massive highway billboard to a tiny mobile screen.</p>

<p>The design draws its inspiration from two foundational elements of the Kingdom's cultural identity:</p>

<h3>Arabic Calligraphy</h3>

<p>Arabic calligraphy has been one of the most important art forms in Islamic civilization for over a millennium. The Riyal symbol incorporates calligraphic elements that connect it to this rich tradition, giving the symbol a distinctly Arab visual character that is immediately distinguishable from Western currency symbols. The flowing lines and balanced proportions of the symbol echo the aesthetic principles that have governed Arabic script across centuries of artistic development.</p>

<h3>Islamic Geometric Art</h3>

<p>Islamic geometric patterns — found in mosques, palaces, and manuscripts across the Muslim world — are renowned for their mathematical precision, visual harmony, and infinite repeatability. The Riyal symbol incorporates geometric principles that give it structural stability and visual balance, ensuring it looks consistent and authoritative at any size and in any application.</p>

<blockquote>
<p><strong>Design Philosophy:</strong> The Riyal symbol achieves what the best currency symbols in the world accomplish — it is simple enough to be drawn by hand, distinctive enough to be recognized instantly, and culturally rooted enough to carry the identity of an entire nation. It serves as a bridge between the Kingdom's deep heritage and its forward-looking economic ambitions.</p>
</blockquote>

<p>This fusion of tradition and modernity in the symbol's design mirrors the broader trajectory of Saudi Arabia itself — a nation that honors its heritage while pursuing rapid modernization and global leadership.</p>

<h2>Applications of the New Riyal Symbol Across Industries</h2>

<p>The practical applications of the new Riyal symbol are vast and touch virtually every sector of the Saudi economy. Its adoption is not optional — it represents a standardization that will affect how businesses communicate prices, display financial information, and present commercial documents.</p>

<table>
<tbody>
<tr><td><strong>Application Area</strong></td><td><strong>How the Riyal Symbol Is Used</strong></td><td><strong>Impact on Business Operations</strong></td></tr>
<tr><td>Banking services and ATM interfaces</td><td>Displayed on screens, statements, transfer confirmations, and account summaries</td><td>Creates a unified visual experience across all banking touchpoints for customers</td></tr>
<tr><td>Stock trading platforms</td><td>Shown alongside stock prices, market indices, and portfolio valuations on Tadawul and other platforms</td><td>Enhances clarity and professionalism of financial data presentation</td></tr>
<tr><td>Economic reports and contracts</td><td>Used in official documents, government reports, bilateral agreements, and financial disclosures</td><td>Standardizes currency representation in legal and regulatory documentation</td></tr>
<tr><td>Invoices and receipts</td><td>Printed on all commercial invoices, sales receipts, and billing statements</td><td>Requires businesses to update invoice templates, POS systems, and accounting software</td></tr>
<tr><td>E-commerce applications and websites</td><td>Displayed in product listings, shopping carts, checkout pages, and order confirmations</td><td>Demands updates to digital platforms, payment gateways, and mobile applications</td></tr>
<tr><td>Product price tags in retail stores</td><td>Printed on shelf labels, promotional signage, product packaging, and catalog materials</td><td>Requires redesign of pricing labels, point-of-sale displays, and retail signage</td></tr>
<tr><td>Printed marketing and corporate materials</td><td>Incorporated into brochures, annual reports, corporate presentations, and advertising campaigns</td><td>Necessitates reprinting and redesigning materials to include the updated symbol</td></tr>
</tbody>
</table>

<blockquote>
<p><strong>Business Action Required:</strong> Every business operating in Saudi Arabia will need to update its materials to incorporate the new Riyal symbol. This includes digital platforms, printed documents, signage, packaging, and marketing materials. Businesses that delay this transition risk appearing outdated, non-compliant, or disconnected from the Kingdom's economic modernization.</p>
</blockquote>

<h2>The Impact of the Riyal Symbol on the Saudi Economy</h2>

<p>While a currency symbol may appear to be a small design element, its economic impact is substantial and multifaceted. The new Riyal symbol influences perception, behavior, and infrastructure in ways that ripple across the entire economy.</p>

<h3>Boosting Investment Confidence</h3>

<p>International investors evaluate currencies partly based on their institutional maturity and global recognition. A dedicated currency symbol signals that the Saudi monetary system has reached a level of sophistication comparable to the world's most established economies. This enhances investor confidence and can contribute to increased foreign direct investment flows into the Kingdom.</p>

<h3>Strengthening Saudi Financial Markets</h3>

<p>The Tadawul — Saudi Arabia's stock exchange and the largest in the Middle East — benefits from a recognizable currency symbol that enhances the professionalism and clarity of financial data presentation. For international traders and investors accessing Saudi markets, the symbol provides an immediate visual identifier that reinforces the market's credibility.</p>

<h3>Enabling Global Trade</h3>

<p>In international trade documents, contracts, and invoices, a standardized currency symbol eliminates ambiguity. Trading partners worldwide can instantly recognize the Saudi Riyal in financial documents, reducing errors and increasing the efficiency of cross-border transactions.</p>

<h3>Enhancing the Digital Economy</h3>

<p>As Saudi Arabia rapidly expands its digital economy — with e-commerce, fintech, and digital payment platforms growing at record rates — a standardized currency symbol is essential infrastructure. It ensures consistent representation across apps, websites, APIs, and digital financial services, supporting the Kingdom's ambition to become a regional fintech hub.</p>

<blockquote>
<p><strong>Economic Vision:</strong> The new Riyal symbol is not an isolated initiative. It is part of a comprehensive strategy to position the Saudi Riyal as one of the most recognized and trusted currencies globally, supporting the Kingdom's goals of economic diversification, digital transformation, and global financial leadership under Vision 2030.</p>
</blockquote>

<h2>The Saudi Riyal and Vision 2030: Currency as a Pillar of National Transformation</h2>

<p>Saudi Vision 2030, launched by Crown Prince Mohammed bin Salman, is the most ambitious national transformation program in the Kingdom's history. It aims to diversify the economy, develop public services, create a thriving society, and position Saudi Arabia as a global leader across multiple sectors.</p>

<p>The evolution of the Saudi Riyal — including the launch of its new symbol — aligns directly with several pillars of Vision 2030:</p>

<ul>
<li><strong>A thriving economy:</strong> The Riyal symbol reinforces the Kingdom's economic identity and enhances the currency's global standing, supporting the Vision's goal of making Saudi Arabia a powerhouse economy that attracts investment and drives growth.</li>
<li><strong>A vibrant society:</strong> By strengthening national pride and cultural belonging through a symbol rooted in Arabic calligraphy and Islamic art, the Riyal symbol contributes to the cultural dimension of Vision 2030.</li>
<li><strong>An ambitious nation:</strong> The symbol signals to the world that Saudi Arabia is a modern, confident, and forward-looking economy that operates at the highest international standards.</li>
<li><strong>Digital transformation:</strong> The standardized symbol supports the Kingdom's push toward a digital-first economy, ensuring seamless currency representation across all electronic platforms and fintech ecosystems.</li>
<li><strong>Financial sector development:</strong> As SAMA continues to modernize the financial sector, the Riyal symbol serves as a visible mark of institutional evolution and regulatory maturity.</li>
</ul>

<blockquote>
<p><strong>Vision Alignment:</strong> Every element of the Saudi Riyal's evolution — from monetary policy stability to the design of its new symbol — reflects the Kingdom's determination to achieve the goals of Vision 2030. The currency is both an instrument of economic policy and a symbol of national aspiration, and its modernization sends a clear message to the world about where Saudi Arabia is headed.</p>
</blockquote>

<h2>Timeline of the Saudi Riyal's Evolution: From Foundation to Modern Symbol</h2>

<p>The Saudi Riyal's journey spans nearly a century of economic development, institutional building, and design evolution. The following timeline captures the key milestones that have shaped the currency into what it is today:</p>

<table>
<tbody>
<tr><td><strong>Year / Period</strong></td><td><strong>Milestone</strong></td><td><strong>Significance</strong></td></tr>
<tr><td>1346H (1927 CE)</td><td>First Saudi Riyal issued as a silver coin</td><td>Established the Kingdom's monetary sovereignty under King Abdulaziz</td></tr>
<tr><td>1952</td><td>Saudi Arabian Monetary Agency (SAMA) established</td><td>Created the institutional foundation for modern monetary policy and banking regulation</td></tr>
<tr><td>1953</td><td>Pilgrim receipts introduced as a form of paper money</td><td>First step toward a paper-based monetary system alongside metallic coins</td></tr>
<tr><td>1961</td><td>First official Saudi banknotes issued</td><td>Replaced pilgrim receipts with formal banknotes featuring national imagery and security features</td></tr>
<tr><td>1986</td><td>Riyal pegged to the US Dollar at 3.75 SAR/USD</td><td>Established the fixed exchange rate that has provided decades of monetary stability</td></tr>
<tr><td>2007</td><td>Fifth series of Saudi banknotes released</td><td>Introduced advanced security features and updated designs reflecting modern Saudi Arabia</td></tr>
<tr><td>2016</td><td>Saudi Arabia launches Vision 2030</td><td>Initiated comprehensive economic transformation affecting all sectors including monetary policy</td></tr>
<tr><td>2020</td><td>Saudi Arabia hosts the G20 Summit</td><td>Demonstrated the Kingdom's role as a leading global economic power and policy influencer</td></tr>
<tr><td>2022</td><td>Sixth series of Saudi banknotes released</td><td>Featured enhanced security and designs aligned with the Kingdom's modernization trajectory</td></tr>
<tr><td>2025</td><td>Launch of the new Saudi Riyal symbol</td><td>Gave the currency a distinctive global identity rooted in Arabic calligraphy and Islamic art</td></tr>
</tbody>
</table>

<blockquote>
<p><strong>A Century of Progress:</strong> From a silver coin issued during the Kingdom's founding to a globally recognized currency with its own symbol, the Saudi Riyal's evolution is one of the most remarkable monetary journeys in modern history. Each milestone reflects a nation that has consistently adapted, modernized, and strengthened its economic foundations while honoring its cultural heritage.</p>
</blockquote>

<h2>How Window Advertising Agency Supports Businesses Through This Transition</h2>

<p>The introduction of the new Riyal symbol creates a practical need for every business in Saudi Arabia to update its printed and digital materials. From invoices and contracts to price tags and corporate brochures, the symbol must be integrated accurately and consistently across all touchpoints.</p>

<p>Window Advertising Agency, with over 25 years of experience serving businesses across Riyadh, Jeddah, and the entire Kingdom, is uniquely positioned to help businesses navigate this transition with precision and professionalism:</p>

<ul>
<li><strong>Financial and corporate print materials:</strong> Window produces high-quality printed materials — invoices, letterheads, contracts, receipts, and official documents — that incorporate the new Riyal symbol with exact specifications and consistent positioning.</li>
<li><strong>Brand identity updates:</strong> For businesses that need to update their brand materials to reflect the new symbol, Window ensures the integration is seamless with existing visual identity guidelines, maintaining brand consistency.</li>
<li><strong>Retail signage and price displays:</strong> Window designs and produces retail signage, shelf labels, and point-of-sale materials that feature the new Riyal symbol in clear, professional formats.</li>
<li><strong>Corporate presentations and reports:</strong> Annual reports, investor presentations, and corporate communications are updated to include the new symbol, ensuring the business projects a modern, compliant image.</li>
<li><strong>Packaging and product materials:</strong> For businesses that display prices on product packaging, Window updates designs to incorporate the new Riyal symbol while maintaining the overall brand aesthetic.</li>
<li><strong>Large-format and environmental graphics:</strong> Billboards, exhibition booths, vehicle wraps, and environmental signage that include pricing information are redesigned with the updated symbol.</li>
</ul>

<blockquote>
<p><strong>Window's Commitment:</strong> At Window Advertising Agency, we understand that transitions like the new Riyal symbol are not just about replacing a character on a document. They are about maintaining professionalism, ensuring compliance, and presenting your business as part of the Kingdom's forward momentum. With our expertise in corporate identity, print production, and brand consistency, we ensure every material your business produces reflects the new standard with precision and quality.</p>
</blockquote>

<h2>The Riyal Symbol as a Catalyst for National and Commercial Identity</h2>

<p>Currency symbols are among the most frequently seen design elements in any economy. They appear on every receipt, every price tag, every bank statement, and every digital transaction. This ubiquity means that the design, quality, and consistency of the Riyal symbol's implementation across all touchpoints will shape how people perceive the Kingdom's economic identity for decades to come.</p>

<p>For businesses, this is both an obligation and an opportunity. The obligation is clear — update materials to reflect the new standard. The opportunity is equally significant — the transition is a chance to refresh brand materials, improve the quality of printed documents, and demonstrate alignment with the Kingdom's modernization trajectory.</p>

<p>Businesses that proactively adopt the new Riyal symbol across their materials signal to their customers, partners, and investors that they are current, professional, and aligned with Saudi Arabia's economic vision. Those that delay risk appearing outdated at a time when the entire Kingdom is moving forward with unprecedented momentum.</p>

<blockquote>
<p><strong>The Takeaway:</strong> The Saudi Riyal's evolution — from its founding in 1346H to the launch of its new symbol — is a reflection of the Kingdom's journey from a young nation to a global economic leader. Every business in Saudi Arabia has a role to play in this evolution by ensuring that the new Riyal symbol is represented accurately, consistently, and professionally across every touchpoint they control. The time to act is now.</p>
</blockquote>

<h2>Ready to Update Your Business Materials with the New Riyal Symbol?</h2>

<p>From corporate documents and invoices to retail signage and marketing materials, Window Advertising Agency ensures the new Saudi Riyal symbol is integrated across all your business touchpoints with precision and professionalism. With 25+ years of experience in print production and brand identity, we deliver quality that reflects the Kingdom's standards.</p>

<p><a href="https://windowadv.com/en/contacts">Request a Consultation</a></p>

<h2>Frequently Asked Questions About the Saudi Riyal and Its New Symbol</h2>

<h3>When was the Saudi Riyal first issued?</h3>

<p>The Saudi Riyal was first issued in 1346H (1927 CE) during the reign of King Abdulaziz bin Abdulrahman Al Saud, the founder of the Kingdom of Saudi Arabia. Initially, the Riyal was a silver coin, and it has undergone multiple stages of development to become one of the most stable and recognized currencies in the world.</p>

<h3>What is the new Saudi Riyal symbol and why was it launched?</h3>

<p>The new Saudi Riyal symbol is a distinctive monetary identity mark inspired by Arabic calligraphy and Islamic geometric art. It was launched to give the Saudi Riyal a unique visual identity similar to other global currencies like the Dollar, Euro, and Pound. The symbol strengthens national pride, enhances global confidence in the Riyal, and reflects the Kingdom's advanced economic position.</p>

<h3>How does the new Riyal symbol relate to Saudi Vision 2030?</h3>

<p>The new Riyal symbol is a direct expression of Vision 2030's goals to modernize Saudi Arabia's economic infrastructure, strengthen the national identity on the global stage, and position the Kingdom as a leading financial hub. It supports the Vision's pillars of economic diversification, digital transformation, and cultural pride.</p>

<h3>Where will the new Saudi Riyal symbol be used?</h3>

<p>The new Riyal symbol will be used across all financial and commercial applications including banking services, stock trading platforms, economic reports and contracts, invoices and receipts, e-commerce applications and websites, product price tags in retail stores, and all official financial documentation.</p>

<h3>What impact does the Riyal symbol have on the Saudi economy?</h3>

<p>The new Riyal symbol is expected to boost investor confidence, strengthen Saudi financial markets, facilitate global trade by making the currency instantly recognizable, enhance the digital economy infrastructure, and reinforce the Kingdom's position among the world's top economies as a G20 member.</p>

<h3>Is Saudi Arabia part of the G20 and how strong is its economy?</h3>

<p>Yes, Saudi Arabia is a full member of the G20, the group of the world's twenty largest economies. The Kingdom is one of the strongest economies globally, with the Saudi Riyal pegged to the US Dollar at a fixed rate since 1986, providing exceptional monetary stability. Saudi Arabia's GDP consistently ranks among the top 20 worldwide.</p>

<h3>How does the Riyal symbol design reflect Saudi cultural identity?</h3>

<p>The Riyal symbol's design is deeply rooted in Saudi and Islamic heritage. It draws inspiration from Arabic calligraphy traditions and Islamic geometric art patterns, creating a symbol that is both modern and culturally authentic. This design approach ensures the symbol carries the Kingdom's cultural DNA while meeting contemporary global standards for currency identification.</p>

<h3>How can businesses update their materials with the new Riyal symbol?</h3>

<p>Businesses should update all financial and commercial materials to include the new Riyal symbol, including invoices, contracts, price lists, product tags, e-commerce platforms, and printed marketing materials. Working with a professional advertising agency like Window ensures consistent and accurate implementation of the new symbol across all brand touchpoints and printed materials.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'saudi-currency-riyal-evolution';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('id', 29)->first();
        }
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
