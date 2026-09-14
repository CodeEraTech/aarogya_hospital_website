<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        foreach ([
            'Dr. Amit Bhutani' => 'dr-amit-bhutani.jpg',
            'Dr. Puja Bhutani' => 'dr-puja-bhutani.jpg',
            'Dr. Deepak Gupta & Dr. Gunjan Gupta' => 'dr-deepak-gunjan-gupta.jpg',
            'Dr. Sachin Thakral' => 'dr-sachin-thakral.jpg',
        ] as $name => $file) DB::table('doctors')->where('name', $name)->update(['image' => 'uploads/doctors/'.$file]);
    }

    public function down(): void
    {
        foreach (['dr-amit-bhutani.jpg','dr-puja-bhutani.jpg','dr-deepak-gunjan-gupta.jpg','dr-sachin-thakral.jpg'] as $file) DB::table('doctors')->where('image', 'uploads/doctors/'.$file)->update(['image' => null]);
    }
};
