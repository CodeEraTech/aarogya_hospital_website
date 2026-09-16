<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('empanelled_sections', function (Blueprint $table): void {
            $table->id();
            $table->unsignedTinyInteger('section_key')->unique();
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empanelled_sections');
    }
};
