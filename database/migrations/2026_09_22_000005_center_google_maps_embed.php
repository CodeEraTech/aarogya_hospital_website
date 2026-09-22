<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->where('key', 'google_maps_embed_url')->update([
            'value' => 'https://www.google.com/maps?q=29.140452699652794,75.74460608424278&z=17&output=embed',
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        // Keep the setting available when rolling back this presentation update.
    }
};
