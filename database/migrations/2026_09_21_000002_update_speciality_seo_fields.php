<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('specialities', function (Blueprint $table) {
            $table->dropColumn('short_label');
            $table->string('meta_title')->nullable()->after('sort_order');
            $table->string('meta_tags')->nullable()->after('meta_title');
            $table->text('meta_description')->nullable()->after('meta_tags');
        });
    }

    public function down(): void
    {
        Schema::table('specialities', function (Blueprint $table) {
            $table->string('short_label')->nullable()->after('slug');
            $table->dropColumn(['meta_title', 'meta_tags', 'meta_description']);
        });
    }
};
