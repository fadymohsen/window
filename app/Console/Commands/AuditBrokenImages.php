<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Portofolio;
use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class AuditBrokenImages extends Command
{
    protected $signature = 'audit:broken-images';
    protected $description = 'Find broken internal images across services, blogs, and portfolios';

    public function handle()
    {
        $broken = [];

        $this->info('Checking service images...');
        Service::chunk(50, function ($services) use (&$broken) {
            foreach ($services as $service) {
                if ($service->image && !Storage::disk('public')->exists($service->image)) {
                    $broken[] = [
                        'type' => 'Service',
                        'id' => $service->id,
                        'slug' => $service->slug,
                        'field' => 'image',
                        'path' => $service->image,
                    ];
                }
                foreach (['en', 'ar'] as $locale) {
                    $content = $service->translate($locale)?->content;
                    if ($content) {
                        preg_match_all('/<img[^>]+src="([^"]+)"/i', $content, $matches);
                        foreach ($matches[1] as $src) {
                            if ($this->isInternalBroken($src)) {
                                $broken[] = [
                                    'type' => 'Service',
                                    'id' => $service->id,
                                    'slug' => $service->slug,
                                    'field' => "content ($locale)",
                                    'path' => $src,
                                ];
                            }
                        }
                    }
                }
            }
        });

        $this->info('Checking blog images...');
        Blog::chunk(50, function ($blogs) use (&$broken) {
            foreach ($blogs as $blog) {
                if ($blog->cover && !Storage::disk('public')->exists($blog->cover)) {
                    $broken[] = [
                        'type' => 'Blog',
                        'id' => $blog->id,
                        'slug' => $blog->slug,
                        'field' => 'cover',
                        'path' => $blog->cover,
                    ];
                }
                foreach (['en', 'ar'] as $locale) {
                    $description = $blog->translate($locale)?->description;
                    if ($description) {
                        preg_match_all('/<img[^>]+src="([^"]+)"/i', $description, $matches);
                        foreach ($matches[1] as $src) {
                            if ($this->isInternalBroken($src)) {
                                $broken[] = [
                                    'type' => 'Blog',
                                    'id' => $blog->id,
                                    'slug' => $blog->slug,
                                    'field' => "description ($locale)",
                                    'path' => $src,
                                ];
                            }
                        }
                    }
                }
            }
        });

        $this->info('Checking portfolio images...');
        Portofolio::chunk(100, function ($portofolios) use (&$broken) {
            foreach ($portofolios as $portofolio) {
                if ($portofolio->image && !Storage::disk('public')->exists($portofolio->image)) {
                    $broken[] = [
                        'type' => 'Portfolio',
                        'id' => $portofolio->id,
                        'slug' => 'service_id:' . $portofolio->service_id,
                        'field' => 'image',
                        'path' => $portofolio->image,
                    ];
                }
            }
        });

        if (empty($broken)) {
            $this->info('No broken images found!');
            return 0;
        }

        $this->warn('Found ' . count($broken) . ' broken image(s):');
        $this->table(['Type', 'ID', 'Slug', 'Field', 'Path'], array_map(fn($b) => array_values($b), $broken));

        return 1;
    }

    private function isInternalBroken(string $src): bool
    {
        $appUrl = config('app.url');
        if (!str_starts_with($src, '/') && !str_starts_with($src, $appUrl)) {
            return false;
        }

        $path = parse_url($src, PHP_URL_PATH);
        if (!$path) {
            return false;
        }

        $path = ltrim($path, '/');
        if (str_starts_with($path, 'storage/')) {
            $storagePath = substr($path, 8);
            return !Storage::disk('public')->exists($storagePath);
        }

        $publicPath = public_path($path);
        return !file_exists($publicPath);
    }
}
