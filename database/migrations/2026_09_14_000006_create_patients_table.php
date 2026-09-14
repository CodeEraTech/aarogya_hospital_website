<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id', 32)->unique();
            $table->string('name', 80);
            $table->string('phone', 15)->unique();
            $table->string('email', 120)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('patients'); }
};
