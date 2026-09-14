<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) { $table->string('type')->default('Text')->after('designation'); $table->string('video_file')->nullable()->after('video_url'); $table->dropColumn('thumbnail'); });
    }
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) { $table->string('thumbnail')->nullable(); $table->dropColumn(['type','video_file']); });
    }
};
