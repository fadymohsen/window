<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'window-agency-kashta-festival-organization';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('id', 24)->first();
        }
        if (!$blog) { return; }
        $blogId = $blog->id;

        $enTitle           = 'Window Agency Dazzles Everyone with Kashta Festival Organization';
        $enMetaTitle       = 'Window Agency Dazzles Everyone with Kashta Festival Organization | Window Advertising Agency';
        $enMetaDescription = 'Discover how Window Advertising Agency organized the spectacular Kashta Festival in Rumah province for Riyadh Municipality. From royal tents and Saudi folklore shows to laser lighting and children\'s entertainment, Window set new standards in national event organization across Saudi Arabia.';
        $enKeywords        = 'Kashta Festival organization,Window Advertising Agency,festival organization Saudi Arabia,Rumah province festival,Saudi heritage events,Ardah folklore show,royal tents Saudi,event production Riyadh,national event organization,laser lighting festival';

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
<p>When Riyadh Municipality launched the Kashta Festival in Rumah province, they needed more than an event planner — they needed a creative force capable of transforming open desert terrain into an unforgettable national celebration. <strong>Window Advertising Agency</strong> answered that call and became the organizing heart of the entire festival, delivering an experience that dazzled every attendee and set new benchmarks for event production in Saudi Arabia. From custom-designed festival gates and royal tents with traditional Saudi seating to folklore performances, laser-lit night shows, and interactive children's zones, every detail reflected Window's commitment to excellence. This is the story of how one agency raised the bar for national event organization across the Kingdom.</p>
</blockquote>

<h2>The Kashta Festival: A Vision by Riyadh Municipality</h2>

<p>The Kashta Festival was conceived as a celebration of Saudi outdoor culture and heritage — a gathering where families, communities, and visitors could experience the spirit of the traditional Saudi kashta (outdoor trip) in a professionally organized and culturally rich environment. Launched by Riyadh Municipality in Rumah province, the festival aimed to bring together the warmth of Bedouin traditions with the production quality of a world-class event.</p>

<p>Rumah province, located in the Riyadh region, provided the perfect backdrop with its vast landscapes and deep connection to Saudi desert heritage. The municipality's vision was ambitious: create an event that honors the Kingdom's cultural roots while delivering modern entertainment, culinary experiences, and family activities that appeal to all age groups and demographics.</p>

<p>Realizing this vision required a partner with proven expertise in large-scale event production, deep understanding of Saudi cultural sensibilities, and the creative capability to design experiences that resonate emotionally with attendees. Riyadh Municipality chose Window Advertising Agency — and the result exceeded every expectation.</p>

<blockquote>
<p><strong>Festival Scope:</strong> The Kashta Festival spanned multiple zones across the venue in Rumah province, featuring entertainment stages, dining areas, heritage pavilions, children's activity zones, and ceremonial spaces — all designed, produced, and managed by Window Advertising Agency as the organizing heart of the event.</p>
</blockquote>

<h2>Window as the Organizing Heart: End-to-End Festival Production</h2>

<p>Being the organizing heart of a festival of this scale means far more than logistics coordination. Window Advertising Agency took ownership of the entire creative and operational vision — from the moment attendees approached the festival gates to the final laser light show that closed each evening. Every visual element, every entertainment experience, every hospitality touchpoint bore Window's creative signature.</p>

<p>Window's role encompassed conceptual design, spatial planning, infrastructure production, entertainment programming, hospitality coordination, and technical production. The agency assembled specialized teams for each domain while maintaining a unified creative direction that ensured every element contributed to a cohesive festival experience.</p>

<h3>The Scale of Responsibility</h3>

<ul>
<li><strong>Festival gate design and construction:</strong> Custom-designed entrance gates that set the tone for the entire experience from the first moment of arrival.</li>
<li><strong>Garden lighting installations:</strong> Ambient and decorative lighting that transformed the outdoor venue into an enchanting evening destination.</li>
<li><strong>Royal tent installations:</strong> Spacious tents furnished with traditional Saudi seating, creating authentic hospitality spaces for guests.</li>
<li><strong>Food and beverage coordination:</strong> Food trucks and kiosks curated to deliver genuine Saudi hospitality and culinary traditions.</li>
<li><strong>National decoration program:</strong> Saudi flags distributed to attendees and national decorations throughout every zone of the festival.</li>
<li><strong>Main stage production:</strong> A performance stage equipped with the latest sound and lighting technology for headline entertainment.</li>
<li><strong>Cultural programming:</strong> Saudi folklore shows including the traditional Ardah, falcon photography stations, and heritage demonstrations.</li>
<li><strong>Children's entertainment:</strong> Puppet theater, drawing competitions, and interactive cartoon character appearances.</li>
<li><strong>Night show production:</strong> Laser lighting installations creating dramatic visual spectacles after sunset.</li>
</ul>

<blockquote>
<p><strong>Single-Source Excellence:</strong> What made Window's approach exceptional was the integration of all these elements under one creative vision. Rather than subcontracting each component to separate vendors with disconnected styles, Window maintained unified creative direction across every detail — ensuring the festival felt like one seamless, immersive experience rather than a collection of unrelated attractions.</p>
</blockquote>

<h2>Festival Gates and National Decorations: Setting the First Impression</h2>

<p>The experience of any festival begins at the entrance, and Window understood that the festival gates would define attendees' expectations for everything that followed. The gates were custom-designed to reflect both the kashta heritage theme and the grandeur appropriate for a Riyadh Municipality event. Incorporating traditional Saudi architectural motifs with modern structural design, the gates created an immediate sense of arrival at something extraordinary.</p>

<p>Beyond the gates, national decorations transformed the entire venue into a celebration of Saudi identity. Saudi flags were not merely placed at fixed locations — they were distributed directly to attendees, turning every guest into a participant in the national celebration. The visual impact of hundreds of attendees carrying Saudi flags through a beautifully decorated festival ground created an atmosphere of patriotic pride that photographs and social media posts carried far beyond the physical venue.</p>

<p>The decoration program extended to every zone of the festival. Pathways, gathering areas, dining sections, and performance spaces all featured coordinated national decorations that reinforced the cultural theme without overwhelming the natural desert landscape. Window's design team balanced visual impact with environmental sensitivity, ensuring the decorations enhanced rather than competed with the stunning Rumah province setting.</p>

<blockquote>
<p><strong>Design Philosophy:</strong> Window's decoration approach followed a principle of cultural authenticity — every decorative element referenced genuine Saudi heritage motifs, traditional color palettes, and national symbols. Nothing was generic or imported from international event templates. The result was a festival that felt unmistakably Saudi in every visual detail.</p>
</blockquote>

<h2>Royal Tents and Traditional Saudi Hospitality</h2>

<p>At the heart of any authentic kashta experience is the majlis — the traditional gathering space where guests are welcomed with warmth, comfort, and generosity. Window recreated this essential element through royal tent installations that combined the grandeur of formal Saudi hospitality with the comfort needed for extended family enjoyment.</p>

<p>Each royal tent was furnished with traditional Saudi seating arrangements — floor-level cushions, bolsters, and carpets arranged in the authentic majlis configuration that encourages face-to-face conversation and communal relaxation. The furnishings were selected for both aesthetic authenticity and practical comfort, ensuring guests could spend hours in the tents enjoying the festival atmosphere.</p>

<p>Royal carpets were laid throughout the tent areas and key gathering spaces, adding a layer of elegance that elevated the entire venue. The combination of rich carpet textures, traditional seating, and ambient lighting created spaces that felt simultaneously regal and welcoming — a balance that reflects the Saudi hospitality tradition where every guest is treated as honored.</p>

<h3>Food Trucks and Kiosks: Culinary Heritage on Display</h3>

<p>Complementing the tent hospitality, Window coordinated a food truck and kiosk program that brought Saudi culinary traditions to the festival experience. Rather than offering generic event food, the program emphasized authentic Saudi dishes and beverages served in a style consistent with traditional hospitality customs. Arabic coffee, dates, and traditional dishes were presented alongside modern favorites, creating a dining experience that bridged heritage and contemporary taste.</p>

<blockquote>
<p><strong>Hospitality Standard:</strong> Window ensured that every food service point maintained the same level of quality and presentation — from the arrangement of serving stations to the attire of service staff. The goal was to make every dining interaction feel like a personal invitation to a Saudi home, not a commercial transaction at a food court.</p>
</blockquote>

<h2>Saudi Folklore Shows and Cultural Entertainment</h2>

<p>The cultural entertainment program was the soul of the Kashta Festival, and Window designed it to showcase the richness of Saudi heritage in ways that engaged every generation. The centerpiece was the traditional Ardah — the iconic Saudi sword dance that combines rhythmic drumming, poetry recitation, and synchronized movement in a display of cultural pride and unity.</p>

<p>Window's production team ensured the Ardah performances were presented with the reverence and production quality they deserved. Professional sound systems captured every drum beat and vocal verse with clarity, while stage lighting highlighted the performers' movements and traditional attire. The result was an Ardah presentation that honored the tradition while making it accessible and exciting for younger audiences experiencing it for the first time.</p>

<h3>Falcon Photography: Connecting with Bedouin Heritage</h3>

<p>Falconry is one of the most revered traditions in Saudi culture, deeply connected to the Bedouin heritage that the Kashta Festival celebrated. Window created dedicated falcon photography stations where attendees could interact with trained falcons and capture photographs with these magnificent birds. Professional handlers ensured safe and respectful interactions, while photography setups allowed families to take home lasting memories of their connection with this ancient tradition.</p>

<p>The falcon photography experience served a dual purpose: entertainment for visitors and cultural education for younger generations who may have limited direct exposure to falconry traditions. By making the experience interactive and photographic, Window ensured that the cultural connection extended beyond the festival through shared images on social media and family photo collections.</p>

<blockquote>
<p><strong>Cultural Impact:</strong> The combination of Ardah performances and falcon photography created a cultural corridor within the festival that transported attendees from modern entertainment into the heart of Saudi heritage. Families moved naturally between these cultural touchpoints, creating a journey through tradition that felt organic rather than educational or forced.</p>
</blockquote>

<h2>Children's Entertainment: Joy for the Youngest Attendees</h2>

<p>No family festival succeeds without dedicated programming for children, and Window created an entertainment zone specifically designed to captivate young attendees while giving parents the confidence to relax and enjoy the broader festival experience. The children's zone featured three core attractions that kept kids engaged for hours.</p>

<h3>Puppet Theater</h3>

<p>Professional puppet theater performances brought stories to life in a format that transcends age and language barriers. The performances were designed with Saudi cultural themes, incorporating familiar characters and scenarios that resonated with local children while delivering entertainment value that held attention through complete show runs.</p>

<h3>Drawing Competitions</h3>

<p>Interactive drawing competitions gave children the opportunity to express their creativity while engaging with the festival's heritage themes. Supplies were provided, and gentle competition formats encouraged participation from all skill levels. The resulting artwork became additional festival decorations, giving children the pride of seeing their creations displayed publicly.</p>

<h3>Interactive Cartoon Characters</h3>

<p>Costumed cartoon characters roamed the children's zone, creating spontaneous moments of joy and providing photo opportunities that families treasured. The character selection balanced international favorites with culturally appropriate choices, ensuring the entertainment felt welcoming and familiar to Saudi families.</p>

<blockquote>
<p><strong>Family-First Design:</strong> Window designed the children's zone with sightlines that allowed parents in adjacent areas to maintain visual contact with their children. Safety barriers, shaded areas, and rest zones were integrated into the layout, ensuring the entertainment was not only fun but also comfortable and secure for families with young children.</p>
</blockquote>

<h2>The Visual Spectacle: Main Stage, Sound, and Laser Lighting</h2>

<p>When the sun set over Rumah province, the Kashta Festival transformed into a visual spectacle that left audiences breathless. Window's technical production team created a nighttime experience centered on the main stage — equipped with the latest sound and lighting technology available in the Saudi event production market.</p>

<p>The main stage served as the anchor for evening programming, hosting performances, announcements, and special presentations. Professional sound systems delivered crystal-clear audio across the entire venue, ensuring every seat and standing area received the same quality experience. The lighting design combined atmospheric illumination with dynamic show lighting that responded to performances in real time.</p>

<h3>Laser Lighting: Transforming Night into Wonder</h3>

<p>The crown jewel of the evening experience was the laser lighting program. Window deployed professional laser systems that painted the desert sky with patterns, colors, and animated sequences that turned the natural darkness of Rumah province into a canvas of light. The laser shows were choreographed to music, creating synchronized audiovisual experiences that rivaled international festival productions.</p>

<p>The laser installations served multiple purposes beyond entertainment. They created a visible landmark that drew attention from surrounding areas, they provided dramatic backdrops for attendee photography, and they established a climactic moment in the evening program that gave every festival day a memorable conclusion.</p>

<h3>Royal Carpets and Elegant Furnishings</h3>

<p>The visual spectacle was not limited to technology. Throughout the venue, royal carpets and elegant furnishings created a ground-level aesthetic that complemented the overhead light shows. The combination of traditional textile artistry beneath and modern laser technology above created a unique visual layering — heritage at your feet, innovation in the sky — that captured the spirit of modern Saudi Arabia.</p>

<blockquote>
<p><strong>Technical Excellence:</strong> Window's technical team conducted extensive site surveys and testing before the festival to ensure every lighting angle, every speaker placement, and every laser trajectory was optimized for maximum impact while maintaining complete safety compliance. The scale of the technical production required weeks of pre-event preparation that audiences never saw — but absolutely felt in the quality of every evening show.</p>
</blockquote>

<h2>Kashta Festival Elements: A Comprehensive Comparison</h2>

<p>The breadth of what Window delivered for the Kashta Festival becomes clearer when each element is examined alongside its purpose and impact. The following table provides a comprehensive overview of every major festival component and how it contributed to the overall experience:</p>

<table>
<tbody>
<tr><td><strong>Festival Element</strong></td><td><strong>What Window Delivered</strong></td><td><strong>Impact on Attendee Experience</strong></td></tr>
<tr><td>Festival Gates</td><td>Custom-designed entrance structures with heritage motifs</td><td>Set expectations of quality and cultural authenticity from the first moment</td></tr>
<tr><td>Garden Lighting</td><td>Ambient and decorative lighting across all outdoor zones</td><td>Transformed the venue into an enchanting evening destination</td></tr>
<tr><td>Royal Tents</td><td>Spacious tents with traditional Saudi seating and furnishings</td><td>Created authentic majlis hospitality spaces for family gatherings</td></tr>
<tr><td>Food Trucks and Kiosks</td><td>Curated culinary program with Saudi hospitality standards</td><td>Delivered genuine cultural dining experiences beyond generic event food</td></tr>
<tr><td>Saudi Flags</td><td>Flags distributed to all attendees throughout the festival</td><td>Turned every guest into an active participant in the national celebration</td></tr>
<tr><td>National Decorations</td><td>Heritage-themed decorations across every festival zone</td><td>Reinforced Saudi cultural identity in every visual detail</td></tr>
<tr><td>Ardah Performances</td><td>Professional folklore shows with full sound and lighting</td><td>Showcased Saudi heritage with production quality worthy of the tradition</td></tr>
<tr><td>Falcon Photography</td><td>Interactive stations with trained falcons and professional setups</td><td>Connected attendees with Bedouin heritage through personal experience</td></tr>
<tr><td>Children's Zone</td><td>Puppet theater, drawing competitions, cartoon characters</td><td>Ensured family-friendly entertainment for all ages</td></tr>
<tr><td>Main Stage</td><td>Performance stage with latest sound and lighting technology</td><td>Anchored the evening program with world-class production quality</td></tr>
<tr><td>Laser Lighting</td><td>Choreographed laser shows synchronized to music</td><td>Created climactic evening experiences and iconic photo moments</td></tr>
<tr><td>Royal Carpets</td><td>Traditional carpets and elegant furnishings throughout</td><td>Added ground-level elegance that complemented overhead spectacle</td></tr>
</tbody>
</table>

<blockquote>
<p><strong>Integration Advantage:</strong> Managing all twelve elements under one creative direction allowed Window to create transitions and connections between zones that would be impossible with fragmented vendor management. Attendees moved seamlessly from cultural experiences to dining to entertainment to visual spectacle — each transition designed to feel natural and emotionally engaging.</p>
</blockquote>

<h2>Raising the Bar: How Window Set New Standards in National Event Organization</h2>

<p>The Kashta Festival was not just another event on Window's portfolio — it was a demonstration of what becomes possible when a single agency with deep Saudi cultural understanding takes full creative ownership of a national celebration. Window raised expectations across the Saudi event industry by proving that local agencies can deliver production quality, cultural sensitivity, and creative vision at a level that matches or exceeds international standards.</p>

<p>Several aspects of Window's Kashta Festival execution set new benchmarks that the industry has taken notice of:</p>

<ul>
<li><strong>Cultural-technical integration:</strong> Blending traditional Saudi elements (Ardah, falconry, majlis hospitality) with cutting-edge production technology (laser lighting, professional sound systems) in a way that felt organic rather than forced.</li>
<li><strong>End-to-end ownership:</strong> Demonstrating that a Saudi agency can manage every aspect of a large-scale festival — from physical infrastructure to entertainment programming to technical production — without requiring international event management companies.</li>
<li><strong>Audience-centric design:</strong> Creating experiences for every demographic — from children's puppet theater to adult folklore appreciation to family dining — within a single unified festival environment.</li>
<li><strong>Heritage-forward branding:</strong> Proving that Saudi cultural identity can be the foundation of world-class event design, not merely a decorative afterthought.</li>
<li><strong>Municipal-grade execution:</strong> Meeting and exceeding the quality, safety, and operational standards expected by Riyadh Municipality for a public event of this scale.</li>
</ul>

<blockquote>
<p><strong>Industry Impact:</strong> The Kashta Festival established Window Advertising Agency as the reference standard for national event organization in Saudi Arabia. Other festivals, government events, and large-scale celebrations now measure themselves against the benchmark Window set in Rumah province — a benchmark defined by cultural authenticity, creative vision, and flawless execution.</p>
</blockquote>

<h2>Why Window Is the Number One Choice for Festivals, Parties, and Conferences in Saudi Arabia</h2>

<p>The Kashta Festival is one example in a portfolio that spans over 25 years of event production across the Kingdom. Window Advertising Agency has organized festivals, corporate conferences, government ceremonies, product launches, private celebrations, and cultural events in Riyadh, Jeddah, and every major Saudi city. Each event benefits from the same principles that made the Kashta Festival extraordinary: cultural sensitivity, creative excellence, technical precision, and end-to-end ownership.</p>

<p>What separates Window from other event organizers in the Saudi market is the integration of advertising expertise with event production capability. Window does not simply set up venues — it creates branded experiences where every visual element, every guest touchpoint, and every entertainment moment reinforces the event's core message and the client's brand identity.</p>

<h3>Window's Event Production Capabilities</h3>

<ul>
<li><strong>National festivals:</strong> Large-scale public celebrations with cultural programming, entertainment stages, and hospitality infrastructure.</li>
<li><strong>Corporate conferences:</strong> Professional events with branded environments, presentation technology, and delegate management.</li>
<li><strong>Government ceremonies:</strong> Protocol-compliant events with the dignity and production quality that official occasions demand.</li>
<li><strong>Product launches:</strong> High-impact reveal events with multimedia presentations, experiential zones, and media coordination.</li>
<li><strong>Private celebrations:</strong> Weddings, anniversaries, and special occasions with personalized design and premium execution.</li>
<li><strong>Exhibitions and trade shows:</strong> Custom booth design, interactive displays, and visitor experience management.</li>
</ul>

<blockquote>
<p><strong>25+ Years of Trust:</strong> Window Advertising Agency has earned the trust of municipalities, government bodies, corporations, and private clients across Saudi Arabia through consistent delivery of events that exceed expectations. The Kashta Festival is the latest proof of a track record that spans a quarter century of transforming visions into unforgettable experiences.</p>
</blockquote>

<p>Whether you are planning a national festival, a corporate conference, a product launch, or a private celebration, Window Advertising Agency brings the creative vision, technical expertise, cultural understanding, and operational excellence needed to make your event the one that everyone remembers. The Kashta Festival proved it. Over 25 years of clients confirm it. Your event can be the next demonstration.</p>

<h2>Ready to Create an Unforgettable Event?</h2>

<p>From national festivals to corporate conferences, Window Advertising Agency delivers event experiences that dazzle audiences and set new standards. With 25+ years of expertise across Saudi Arabia, we transform your vision into a celebration that attendees will remember for years. Let the organizing heart of the Kashta Festival bring the same excellence to your next event.</p>

<p><a href="https://windowadv.com/en/contacts">Plan Your Event with Window</a></p>

<h2>Frequently Asked Questions About the Kashta Festival and Window's Event Services</h2>

<h3>What is the Kashta Festival and who organized it?</h3>

<p>The Kashta Festival is a national celebration launched by Riyadh Municipality in Rumah province, celebrating Saudi heritage and outdoor culture. Window Advertising Agency served as the organizing heart of the entire event, handling everything from festival gate design and royal tent installations to entertainment programming and visual production.</p>

<h3>What did Window Advertising Agency provide for the Kashta Festival?</h3>

<p>Window provided comprehensive event organization including custom-designed festival gates, garden lighting installations, royal tents with traditional Saudi seating, food truck and kiosk coordination with authentic Saudi hospitality, Saudi flag distribution, national decorations, main stage production with latest sound and lighting technology, laser lighting for night shows, folklore entertainment, falcon photography stations, and children's entertainment zones.</p>

<h3>What entertainment activities were available at the Kashta Festival?</h3>

<p>The festival featured Saudi folklore shows including the traditional Ardah dance, falcon photography experiences, and a dedicated children's entertainment zone with puppet theater performances, drawing competitions, and interactive cartoon character appearances. The main stage hosted performances using the latest sound and lighting technology with laser shows during evening hours.</p>

<h3>How did Window handle the visual production for the Kashta Festival?</h3>

<p>Window created a complete visual spectacle featuring a main stage equipped with the latest sound and lighting technology, laser lighting installations for dramatic night shows, royal carpets throughout the venue, and elegant furnishings that reflected Saudi heritage. Every visual element was designed to create an immersive national celebration atmosphere.</p>

<h3>Why should I choose Window Advertising Agency for festival and event organization in Saudi Arabia?</h3>

<p>Window Advertising Agency brings over 25 years of experience in organizing festivals, conferences, and national events across Saudi Arabia. The Kashta Festival demonstrated Window's ability to handle every aspect of large-scale event production — from conceptual design and infrastructure to entertainment programming and visual spectacle — all while honoring Saudi cultural heritage and exceeding audience expectations.</p>

<h3>What types of events does Window Advertising Agency organize?</h3>

<p>Window Advertising Agency organizes a full range of events including national festivals, corporate conferences, government ceremonies, product launches, exhibitions, private parties, and cultural celebrations. With expertise in stage design, lighting, sound production, hospitality coordination, and cultural programming, Window delivers end-to-end event solutions across all Saudi regions.</p>

<h3>How did the Kashta Festival celebrate Saudi heritage?</h3>

<p>The festival was deeply rooted in Saudi heritage through traditional Ardah folklore performances, falcon photography reflecting Bedouin culture, royal tents with authentic traditional seating arrangements, Saudi flags distributed to every attendee, national decorations throughout the venue, and food kiosks serving traditional Saudi hospitality. Every element was designed to honor and celebrate the Kingdom's rich cultural identity.</p>

<h3>What made the Kashta Festival different from other Saudi festivals?</h3>

<p>The Kashta Festival stood out because of Window's integrated approach — combining traditional Saudi cultural elements with cutting-edge production technology. The fusion of royal tents and laser lighting, Ardah performances and modern sound systems, and heritage decorations with contemporary entertainment created a unique experience that set new standards in national event organization across the Kingdom.</p>
HTML;
    }

    public function down(): void
    {
        $slug = 'window-agency-kashta-festival-organization';

        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            $blog = DB::table('blogs')->where('id', 24)->first();
        }
        if ($blog) {
            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->delete();
        }
    }
};
