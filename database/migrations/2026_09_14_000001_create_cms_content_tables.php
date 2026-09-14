<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) { $table->id(); $table->string('name'); $table->string('slug')->unique(); $table->string('designation'); $table->text('bio')->nullable(); $table->string('image')->nullable(); $table->string('status')->default('Published'); $table->unsignedInteger('sort_order')->default(0); $table->timestamps(); });
        Schema::create('specialities', function (Blueprint $table) { $table->id(); $table->string('name'); $table->string('slug')->unique(); $table->string('short_label')->nullable(); $table->text('description')->nullable(); $table->longText('content')->nullable(); $table->string('status')->default('Published'); $table->unsignedInteger('sort_order')->default(0); $table->timestamps(); });
        Schema::create('pages', function (Blueprint $table) { $table->id(); $table->string('title'); $table->string('slug')->unique(); $table->string('template')->default('default'); $table->longText('content')->nullable(); $table->string('meta_title')->nullable(); $table->text('meta_description')->nullable(); $table->string('status')->default('Published'); $table->timestamps(); });
        Schema::create('blogs', function (Blueprint $table) { $table->id(); $table->string('title'); $table->string('slug')->unique(); $table->string('author')->nullable(); $table->string('category')->nullable(); $table->longText('excerpt')->nullable(); $table->longText('content'); $table->string('image')->nullable(); $table->timestamp('published_at')->nullable(); $table->string('status')->default('Draft'); $table->timestamps(); });
        Schema::create('gallery_items', function (Blueprint $table) { $table->id(); $table->string('title'); $table->string('image'); $table->text('description')->nullable(); $table->string('status')->default('Published'); $table->unsignedInteger('sort_order')->default(0); $table->timestamps(); });
        Schema::create('settings', function (Blueprint $table) { $table->id(); $table->string('key')->unique(); $table->text('value')->nullable(); $table->string('group')->default('General'); $table->timestamps(); });
    }

    public function down(): void
    {
        foreach (['settings','gallery_items','blogs','pages','specialities','doctors'] as $table) Schema::dropIfExists($table);
    }
};
