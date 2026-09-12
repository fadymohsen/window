<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Fix the Arabic brand name typo "وينوو" → "ويندو" across all database tables.
     *
     * The previous migration (2026_07_15_000001) only covered service_translations.title
     * and service_translations.content. This migration covers ALL text columns in all
     * relevant tables including meta_title, meta_description, meta_keywords, and
     * blog_translations.
     */
    public function up(): void
    {
        $old = 'وينوو';
        $new = 'ويندو';

        // ── 1. service_translations ──────────────────────────────────────────
        $serviceColumns = ['title', 'content', 'meta_title', 'meta_description', 'meta_keywords'];

        DB::table('service_translations')
            ->where('locale', 'ar')
            ->where(function ($q) use ($old, $serviceColumns) {
                foreach ($serviceColumns as $i => $col) {
                    if ($i === 0) {
                        $q->where($col, 'like', "%{$old}%");
                    } else {
                        $q->orWhere($col, 'like', "%{$old}%");
                    }
                }
            })
            ->get()
            ->each(function ($row) use ($old, $new, $serviceColumns) {
                $updates = [];
                foreach ($serviceColumns as $col) {
                    if (!empty($row->$col) && str_contains($row->$col, $old)) {
                        $updates[$col] = str_replace($old, $new, $row->$col);
                    }
                }
                if (!empty($updates)) {
                    DB::table('service_translations')->where('id', $row->id)->update($updates);
                }
            });

        // ── 2. blog_translations ─────────────────────────────────────────────
        $blogColumns = ['title', 'description', 'keywords', 'meta_title', 'meta_description'];

        DB::table('blog_translations')
            ->where('locale', 'ar')
            ->where(function ($q) use ($old, $blogColumns) {
                foreach ($blogColumns as $i => $col) {
                    if ($i === 0) {
                        $q->where($col, 'like', "%{$old}%");
                    } else {
                        $q->orWhere($col, 'like', "%{$old}%");
                    }
                }
            })
            ->get()
            ->each(function ($row) use ($old, $new, $blogColumns) {
                $updates = [];
                foreach ($blogColumns as $col) {
                    if (!empty($row->$col) && str_contains($row->$col, $old)) {
                        $updates[$col] = str_replace($old, $new, $row->$col);
                    }
                }
                if (!empty($updates)) {
                    DB::table('blog_translations')->where('id', $row->id)->update($updates);
                }
            });

        // ── 3. website_settings ──────────────────────────────────────────────
        $settingsColumns = ['title', 'description', 'keywords', 'location'];

        DB::table('website_settings')
            ->where(function ($q) use ($old, $settingsColumns) {
                foreach ($settingsColumns as $i => $col) {
                    if ($i === 0) {
                        $q->where($col, 'like', "%{$old}%");
                    } else {
                        $q->orWhere($col, 'like', "%{$old}%");
                    }
                }
            })
            ->get()
            ->each(function ($row) use ($old, $new, $settingsColumns) {
                $updates = [];
                foreach ($settingsColumns as $col) {
                    if (!empty($row->$col) && str_contains($row->$col, $old)) {
                        $updates[$col] = str_replace($old, $new, $row->$col);
                    }
                }
                if (!empty($updates)) {
                    DB::table('website_settings')->where('id', $row->id)->update($updates);
                }
            });
    }

    public function down(): void
    {
        // Not reversible — brand name fix
    }
};
