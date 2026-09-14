<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) { $table->id(); $table->string('name'); $table->string('designation')->nullable(); $table->text('quote'); $table->string('video_url')->nullable(); $table->string('thumbnail')->nullable(); $table->string('status')->default('Published'); $table->unsignedInteger('sort_order')->default(0); $table->timestamps(); });
        Schema::create('slides', function (Blueprint $table) { $table->id(); $table->string('title'); $table->string('slug')->unique(); $table->text('subtitle')->nullable(); $table->string('image')->nullable(); $table->string('button_text')->nullable(); $table->string('button_url')->nullable(); $table->string('status')->default('Published'); $table->unsignedInteger('sort_order')->default(0); $table->timestamps(); });
    }
    public function down(): void { Schema::dropIfExists('slides'); Schema::dropIfExists('testimonials'); }
};
