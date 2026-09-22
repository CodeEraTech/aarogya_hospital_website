<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->updateOrInsert(
            ['key' => 'footer_about'],
            ['value' => 'Advanced orthopaedic, trauma and fertility care with modern technology and a human touch.', 'group' => 'Footer', 'updated_at' => now(), 'created_at' => now()]
        );
    }

    public function down(): void
    {
        DB::table('settings')->where('key', 'footer_about')->delete();
    }
};
