<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('doctors', 'emergency_text')) {
            Schema::table('doctors', function (Blueprint $table): void {
                $table->string('emergency_text')->nullable()->after('description');
            });
        }

        if (! Schema::hasColumn('testimonials', 'doctor_id')) {
            Schema::table('testimonials', function (Blueprint $table): void {
                $table->foreignId('doctor_id')->nullable()->after('name')->constrained('doctors')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('testimonials', 'doctor_id')) {
            Schema::table('testimonials', function (Blueprint $table): void {
                $table->dropForeign(['doctor_id']);
                $table->dropColumn('doctor_id');
            });
        }
        if (Schema::hasColumn('doctors', 'emergency_text')) {
            Schema::table('doctors', function (Blueprint $table): void {
                $table->dropColumn('emergency_text');
            });
        }
    }
};
