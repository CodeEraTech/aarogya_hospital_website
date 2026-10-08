<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('doctors', 'degree')) {
            Schema::table('doctors', function (Blueprint $table): void {
                $table->string('degree')->nullable()->after('designation');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('doctors', 'degree')) {
            Schema::table('doctors', function (Blueprint $table): void {
                $table->dropColumn('degree');
            });
        }
    }
};
