<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixSeoTitles extends Command
{
    protected $signature = 'fix:seo-titles {--dry-run : Show changes without applying them}';
    protected $description = 'Truncate all meta_titles longer than 65 characters in services and blogs';

    public function handle()
    {
        $dryRun = $this->option('dry-run');
        $fixed = 0;

        if ($dryRun) {
            $this->warn('DRY RUN — no changes will be saved.');
        }

        $this->info('Fixing service meta_titles...');
        $fixed += $this->fixModel('service_translations', 'service_id');

        $this->info('Fixing blog meta_titles...');
        $fixed += $this->fixModel('blog_translations', 'blog_id');

        if ($fixed === 0) {
            $this->info('No meta_titles needed truncation.');
        } else {
            $this->info("Total fixed: {$fixed} meta_titles.");
        }

        return 0;
    }

    private function fixModel(string $table, string $foreignKey): int
    {
        $dryRun = $this->option('dry-run');
        $fixed = 0;

        $rows = DB::table($table)
            ->whereNotNull('meta_title')
            ->where(DB::raw('CHAR_LENGTH(meta_title)'), '>', 65)
            ->get();

        foreach ($rows as $row) {
            $original = $row->meta_title;
            $truncated = $this->smartTruncate($original, 65);

            $id = $row->{$foreignKey};
            $locale = $row->locale;

            $this->line("  [{$locale}] ID {$id}: \"{$original}\"");
            $this->line("       => \"{$truncated}\"");

            if (!$dryRun) {
                DB::table($table)
                    ->where('id', $row->id)
                    ->update(['meta_title' => $truncated]);
            }

            $fixed++;
        }

        return $fixed;
    }

    private function smartTruncate(string $text, int $maxLength): string
    {
        if (mb_strlen($text) <= $maxLength) {
            return $text;
        }

        // Try to find a separator to cut at
        $separators = [' | ', ' - ', ' — ', ' – '];
        foreach ($separators as $sep) {
            $lastPos = mb_strrpos(mb_substr($text, 0, $maxLength), $sep);
            if ($lastPos !== false && $lastPos > 20) {
                return mb_substr($text, 0, $lastPos);
            }
        }

        // Fall back to word boundary
        $truncated = mb_substr($text, 0, $maxLength - 3);
        $lastSpace = mb_strrpos($truncated, ' ');
        if ($lastSpace !== false && $lastSpace > 20) {
            return mb_substr($truncated, 0, $lastSpace) . '...';
        }

        return $truncated . '...';
    }
}
