<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 80);
            $table->string('mobile_number', 15)->index();
            $table->string('email', 120)->nullable();
            $table->string('speciality', 80)->index();
            $table->string('preferred_doctor', 100)->nullable();
            $table->date('preferred_date')->nullable()->index();
            $table->string('preferred_time', 80)->nullable();
            $table->text('message')->nullable();
            $table->string('source', 40)->default('Website');
            $table->string('status', 30)->default('New')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
