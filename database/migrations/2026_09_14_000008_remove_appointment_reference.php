<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) { $table->dropUnique('appointments_reference_unique'); $table->dropColumn('reference'); });
    }
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) { $table->string('reference',32)->nullable()->unique(); });
    }
};
