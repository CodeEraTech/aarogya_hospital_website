<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->updateOrInsert(
            ['key' => 'google_maps_embed_url'],
            [
                'value' => 'https://www.google.com/maps?q=29.140452699652794,75.74460608424278&z=17&output=embed',
                'group' => 'Contact',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }

    public function down(): void
    {
        DB::table('settings')->where('key', 'google_maps_embed_url')->delete();
    }
};
