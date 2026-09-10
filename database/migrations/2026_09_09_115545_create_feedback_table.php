<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('phone', 18)->nullable();
            $table->string('email', 120)->nullable();
            $table->string('department', 80)->nullable();
            $table->unsignedTinyInteger('rating');
            $table->text('message');
            $table->string('status', 30)->default('New');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
