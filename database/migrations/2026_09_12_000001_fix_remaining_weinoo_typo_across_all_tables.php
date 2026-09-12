<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The 2026_07_15 migration only fixed service_translations.title/content.
     * Google was still serving "وينوو" in search results from meta_title and
     * meta_description (visible page titles/snippets), which that migration
     * never touched, and from blog_translations and website_settings, which
     * it didn't cover at all.
     */
    private array $targets = [
        'service_translations' => ['title', 'content', 'meta_title', 'meta_description', 'meta_keywords'],
        'blog_translations'    => ['title', 'description', 'keywords', 'meta_title', 'meta_description'],
        'website_settings'     => ['title', 'description', 'keywords'],
    ];

    public function up(): void
    {
        foreach ($this->targets as $table => $columns) {
            if (!Schema::hasTable($table)) {
                continue;
            }

            $columns = array_filter($columns, fn ($column) => Schema::hasColumn($table, $column));
            if (empty($columns)) {
                continue;
            }

            DB::table($table)
                ->where(function ($query) use ($columns) {
                    foreach ($columns as $column) {
                        $query->orWhere($column, 'like', '%وينوو%');
                    }
                })
                ->get()
                ->each(function ($row) use ($table, $columns) {
                    $updates = [];
                    foreach ($columns as $column) {
                        if (isset($row->$column) && str_contains($row->$column, 'وينوو')) {
                            $updates[$column] = str_replace('وينوو', 'ويندو', $row->$column);
                        }
                    }
                    if (!empty($updates)) {
                        DB::table($table)->where('id', $row->id)->update($updates);
                    }
                });
        }
    }

    public function down(): void
    {
        // Not reversible: the original mix of "وينوو"/"ويندو" occurrences is not recorded.
    }
};
