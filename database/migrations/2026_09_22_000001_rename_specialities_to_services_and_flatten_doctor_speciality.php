<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('doctors') && ! Schema::hasColumn('doctors', 'speciality')) {
            Schema::table('doctors', function (Blueprint $table) {
                $table->string('speciality')->nullable()->after('designation');
            });
        }

        if (Schema::hasTable('doctors') && Schema::hasColumn('doctors', 'speciality_id') && Schema::hasTable('specialities')) {
            $doctors = DB::table('doctors')
                ->leftJoin('specialities', 'doctors.speciality_id', '=', 'specialities.id')
                ->select('doctors.id', 'specialities.name')
                ->get();

            foreach ($doctors as $doctor) {
                if ($doctor->name) {
                    DB::table('doctors')->where('id', $doctor->id)->update(['speciality' => $doctor->name]);
                }
            }

            Schema::table('doctors', function (Blueprint $table) {
                $table->dropForeign(['speciality_id']);
                $table->dropColumn('speciality_id');
            });
        }

        if (Schema::hasTable('specialities') && ! Schema::hasTable('services')) {
            Schema::rename('specialities', 'services');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('services') && ! Schema::hasTable('specialities')) {
            Schema::rename('services', 'specialities');
        }

        if (Schema::hasTable('doctors') && Schema::hasColumn('doctors', 'speciality') && ! Schema::hasColumn('doctors', 'speciality_id')) {
            Schema::table('doctors', function (Blueprint $table) {
                $table->foreignId('speciality_id')->nullable()->after('designation')->constrained('specialities')->nullOnDelete();
            });

            if (Schema::hasTable('specialities')) {
                $doctors = DB::table('doctors')->select('id', 'speciality')->get();
                foreach ($doctors as $doctor) {
                    $serviceId = DB::table('specialities')->where('name', $doctor->speciality)->value('id');
                    if ($serviceId) {
                        DB::table('doctors')->where('id', $doctor->id)->update(['speciality_id' => $serviceId]);
                    }
                }
            }

            Schema::table('doctors', function (Blueprint $table) {
                $table->dropColumn('speciality');
            });
        }
    }
};
