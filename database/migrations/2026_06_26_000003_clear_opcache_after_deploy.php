<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        if (function_exists('opcache_reset')) {
            opcache_reset();
        }
    }

    public function down(): void
    {
        //
    }
};
