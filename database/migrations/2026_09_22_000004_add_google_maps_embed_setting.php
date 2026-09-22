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
                'value' => 'https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d13935.490045281294!2d75.72551870000001!3d29.168428900000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3912333e2e8398e9%3A0xfd51beb076eff54c!2sAAROGYA%20HOSPITAL%2C%20Aarogya%20hospital%2C%20opposite%20VISHWAS%20SCHOOL%2C%20near%20LIC%20OFFICE%2C%20Urban%20Estate%20II%2C%20Hisar%2C%20Haryana%20125001!3m2!1d29.1403505!2d75.7446133!5e0!3m2!1sen!2sin!4v1790071762328!5m2!1sen!2sin',
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
