<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        foreach (['doctors','specialities','pages','blogs','gallery_items','slides','testimonials'] as $table) DB::table($table)->where('status','Published')->update(['status'=>'Active']);
        foreach (['doctors','specialities','pages','blogs','gallery_items','slides','testimonials'] as $table) DB::table($table)->where('status','Draft')->update(['status'=>'Inactive']);
    }
    public function down(): void {}
};
