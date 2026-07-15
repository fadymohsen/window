<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Fix "وينوو" typo to "ويندو" in all Arabic service translations
        DB::table('service_translations')
            ->where('locale', 'ar')
            ->where('content', 'like', '%وينوو%')
            ->orWhere(function ($query) {
                $query->where('locale', 'ar')
                      ->where('title', 'like', '%وينوو%');
            })
            ->orWhere(function ($query) {
                $query->where('locale', 'ar')
                      ->where('description', 'like', '%وينوو%');
            })
            ->get()
            ->each(function ($row) {
                $updates = [];
                foreach (['title', 'description', 'content'] as $col) {
                    if (!empty($row->$col) && str_contains($row->$col, 'وينوو')) {
                        $updates[$col] = str_replace('وينوو', 'ويندو', $row->$col);
                    }
                }
                if (!empty($updates)) {
                    DB::table('service_translations')
                        ->where('id', $row->id)
                        ->update($updates);
                }
            });
    }

    public function down(): void
    {
        // Not reversible
    }
};
