<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->where('key', 'google_maps_embed_url')->delete();
    }

    public function down(): void
    {
        // The map is derived from the Contact address; no separate setting is restored.
    }
};
