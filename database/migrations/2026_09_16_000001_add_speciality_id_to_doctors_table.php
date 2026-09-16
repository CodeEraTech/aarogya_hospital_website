<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table): void {
            $table->foreignId('speciality_id')->nullable()->after('designation')->constrained('specialities')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table): void {
            $table->dropForeign(['speciality_id']);
            $table->dropColumn('speciality_id');
        });
    }
};
