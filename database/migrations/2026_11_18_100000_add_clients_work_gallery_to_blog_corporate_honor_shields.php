<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'corporate-honor-shields-trophies-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) { return; }

        $galleryHtml = $this->getGalleryHtml();

        // --- Arabic ---
        $arTranslation = DB::table('blog_translations')
            ->where('blog_id', $blog->id)
            ->where('locale', 'ar')
            ->first();

        if ($arTranslation) {
            $arContent = $arTranslation->description;
            $arGallerySection = '<h2>من أعمالنا: دروع تذكارية وجوائز تكريم</h2>' . "\n" . $galleryHtml;
            // Insert before the FAQ section
            $arContent = str_replace(
                '<h2>الأسئلة الشائعة حول الدروع التذكارية وجوائز التكريم</h2>',
                $arGallerySection . "\n\n" . '<h2>الأسئلة الشائعة حول الدروع التذكارية وجوائز التكريم</h2>',
                $arContent
            );

            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'ar')
                ->update(['description' => $arContent]);
        }

        // --- English ---
        $enTranslation = DB::table('blog_translations')
            ->where('blog_id', $blog->id)
            ->where('locale', 'en')
            ->first();

        if ($enTranslation) {
            $enContent = $enTranslation->description;
            $enGallerySection = '<h2>From Our Work: Honor Shields & Recognition Trophies</h2>' . "\n" . $galleryHtml;
            // Insert before the FAQ section
            $enContent = str_replace(
                '<h2>Frequently Asked Questions About Honor Shields &amp; Recognition Trophies</h2>',
                $enGallerySection . "\n\n" . '<h2>Frequently Asked Questions About Honor Shields &amp; Recognition Trophies</h2>',
                $enContent
            );
            // Also try without &amp;
            $enContent = str_replace(
                '<h2>Frequently Asked Questions About Honor Shields & Recognition Trophies</h2>',
                $enGallerySection . "\n\n" . '<h2>Frequently Asked Questions About Honor Shields & Recognition Trophies</h2>',
                $enContent
            );

            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', 'en')
                ->update(['description' => $enContent]);
        }
    }

    private function getGalleryHtml(): string
    {
        $basePath = '/storage/blogs/shields-trophies-gallery';

        return <<<HTML
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 16px; margin: 24px 0;">
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-01.jpg" alt="درع تكريم أكريليك مخصص - جمعية الرحالة" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-02.jpg" alt="دروع كريستال بقاعدة خشبية - تصنيع وكالة ويندو" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-03.jpg" alt="دروع كريستال فاخرة بقواعد سوداء - جوائز تكريم" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-04.jpg" alt="دروع زجاجية بقاعدة خشبية طبيعية" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-05.jpg" alt="مجموعة دروع كريستال متنوعة الأشكال" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-06.jpg" alt="دروع كريستال وأكريليك متنوعة التصاميم" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-07.jpg" alt="دروع كريستال شفافة بأشكال هندسية متعددة" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-08.jpg" alt="دروع خشبية وكريستال بقواعد ذهبية فاخرة" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-09.jpg" alt="دروع كريستال ورقية بنقش دقيق" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-10.jpg" alt="درع تكريم أكريليك - معرض الامتياز التجاري الدولي" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-11.jpg" alt="دروع كريستال متنوعة بقواعد شفافة وخشبية" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
        <img loading="lazy" src="{$basePath}/shield-trophy-12.jpg" alt="درع كريستال دائري بقاعدة خشبية طبيعية" style="width:100%; height:260px; object-fit:cover; display:block;">
    </div>
</div>
HTML;
    }
};
