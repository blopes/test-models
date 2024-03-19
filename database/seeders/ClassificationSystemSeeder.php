<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificationSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classification_systems')->insertOrIgnore(
            [
                [
                    'name' => 'Uniclass'
                ],
            ]
        );
    }
}
