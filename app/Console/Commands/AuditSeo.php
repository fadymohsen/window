<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Console\Command;

class AuditSeo extends Command
{
    protected $signature = 'audit:seo';
    protected $description = 'Audit services and blogs for missing or duplicate meta titles, descriptions, and short content';

    public function handle()
    {
        $this->info('=== SEO Audit Report ===');
        $this->newLine();

        $this->auditServices();
        $this->newLine();
        $this->auditBlogs();
        $this->newLine();
        $this->auditDuplicates();

        return 0;
    }

    private function auditServices()
    {
        $this->info('--- Services ---');
        $issues = [];

        Service::with('translations')->chunk(50, function ($services) use (&$issues) {
            foreach ($services as $service) {
                foreach (['en', 'ar'] as $locale) {
                    $t = $service->translate($locale);
                    if (!$t) {
                        $issues[] = [$service->id, $service->slug, $locale, 'Missing translation entirely'];
                        continue;
                    }
                    if (empty($t->meta_title)) {
                        $issues[] = [$service->id, $service->slug, $locale, 'Missing meta_title'];
                    } elseif (mb_strlen($t->meta_title) > 65) {
                        $issues[] = [$service->id, $service->slug, $locale, 'meta_title too long (' . mb_strlen($t->meta_title) . ' chars)'];
                    }
                    if (empty($t->meta_description)) {
                        $issues[] = [$service->id, $service->slug, $locale, 'Missing meta_description'];
                    }
                    $wordCount = str_word_count(strip_tags($t->content ?? ''));
                    if ($wordCount < 200) {
                        $issues[] = [$service->id, $service->slug, $locale, "Low word count: {$wordCount} words"];
                    }
                }
            }
        });

        if (empty($issues)) {
            $this->info('No service SEO issues found!');
        } else {
            $this->warn('Found ' . count($issues) . ' service issue(s):');
            $this->table(['ID', 'Slug', 'Locale', 'Issue'], $issues);
        }
    }

    private function auditBlogs()
    {
        $this->info('--- Blogs ---');
        $issues = [];

        Blog::with('translations')->chunk(50, function ($blogs) use (&$issues) {
            foreach ($blogs as $blog) {
                foreach (['en', 'ar'] as $locale) {
                    $t = $blog->translate($locale);
                    if (!$t) {
                        $issues[] = [$blog->id, $blog->slug, $locale, 'Missing translation entirely'];
                        continue;
                    }
                    if (empty($t->meta_title)) {
                        $issues[] = [$blog->id, $blog->slug, $locale, 'Missing meta_title'];
                    } elseif (mb_strlen($t->meta_title) > 65) {
                        $issues[] = [$blog->id, $blog->slug, $locale, 'meta_title too long (' . mb_strlen($t->meta_title) . ' chars)'];
                    }
                    if (empty($t->meta_description)) {
                        $issues[] = [$blog->id, $blog->slug, $locale, 'Missing meta_description'];
                    }
                    $wordCount = str_word_count(strip_tags($t->description ?? ''));
                    if ($wordCount < 200) {
                        $issues[] = [$blog->id, $blog->slug, $locale, "Low word count: {$wordCount} words"];
                    }
                }
            }
        });

        if (empty($issues)) {
            $this->info('No blog SEO issues found!');
        } else {
            $this->warn('Found ' . count($issues) . ' blog issue(s):');
            $this->table(['ID', 'Slug', 'Locale', 'Issue'], $issues);
        }
    }

    private function auditDuplicates()
    {
        $this->info('--- Duplicate Titles & Descriptions ---');

        foreach (['en', 'ar'] as $locale) {
            $titles = [];
            $descriptions = [];

            Service::with('translations')->chunk(50, function ($services) use (&$titles, &$descriptions, $locale) {
                foreach ($services as $service) {
                    $t = $service->translate($locale);
                    if (!$t) continue;
                    $title = $t->meta_title ?: $t->title;
                    if ($title) {
                        $titles[$title][] = "service:{$service->slug}";
                    }
                    $desc = $t->meta_description;
                    if ($desc) {
                        $descriptions[$desc][] = "service:{$service->slug}";
                    }
                }
            });

            Blog::with('translations')->chunk(50, function ($blogs) use (&$titles, &$descriptions, $locale) {
                foreach ($blogs as $blog) {
                    $t = $blog->translate($locale);
                    if (!$t) continue;
                    $title = $t->meta_title ?: $t->title;
                    if ($title) {
                        $titles[$title][] = "blog:{$blog->slug}";
                    }
                    $desc = $t->meta_description;
                    if ($desc) {
                        $descriptions[$desc][] = "blog:{$blog->slug}";
                    }
                }
            });

            $dupTitles = array_filter($titles, fn($items) => count($items) > 1);
            $dupDescs = array_filter($descriptions, fn($items) => count($items) > 1);

            if (!empty($dupTitles)) {
                $this->warn("[{$locale}] Duplicate titles:");
                foreach ($dupTitles as $title => $slugs) {
                    $this->line("  \"{$title}\" => " . implode(', ', $slugs));
                }
            }
            if (!empty($dupDescs)) {
                $this->warn("[{$locale}] Duplicate descriptions:");
                foreach ($dupDescs as $desc => $slugs) {
                    $this->line("  \"" . mb_substr($desc, 0, 60) . "...\" => " . implode(', ', $slugs));
                }
            }
            if (empty($dupTitles) && empty($dupDescs)) {
                $this->info("[{$locale}] No duplicates found.");
            }
        }
    }
}
