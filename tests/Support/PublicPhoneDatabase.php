<?php

namespace Tests\Support;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/** Isolated read-only page fixtures, independent of legacy appointment migrations. */
final class PublicPhoneDatabase
{
    public static function create(): void
    {
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
            'database.connections.sqlite.url' => null,
            'session.driver' => 'array',
            'cache.default' => 'array',
        ]);
        DB::purge('sqlite');

        $columns = [
            'settings' => ['key', 'value', 'group'],
            'pages' => ['title', 'slug'],
            'doctors' => ['name', 'slug', 'designation', 'description', 'image', 'degree', 'emergency_text', 'meta_title', 'meta_description'],
            'services' => ['name', 'slug', 'description', 'image'],
            'slides' => ['title', 'slug', 'subtitle', 'image'],
            'blogs' => ['title', 'slug', 'published_at'],
            'testimonials' => ['doctor_id', 'name', 'type', 'quote'],
            'opd_schedules' => ['doctor_id', 'days', 'start_time', 'end_time'],
        ];
        foreach ($columns as $name => $fields) {
            Schema::create($name, function (Blueprint $table) use ($fields): void {
                $table->id();
                $table->string('status')->default('Active');
                $table->integer('sort_order')->default(0);
                $table->timestamps();
                foreach ($fields as $field) {
                    $table->text($field)->nullable();
                }
            });
        }
    }
}
