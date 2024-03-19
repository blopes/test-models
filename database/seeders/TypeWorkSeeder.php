<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_works')->insertOrIgnore(
            [
            ['id' => 1,'name' => 'New Construction',],
            ['id' => 2,'name' => 'Demolition',],
            ['id' => 3,'name' => 'Rehabilitation',],
            ['id' => 4,'name' => 'Expansions',],
            ['id' => 5,'name' => 'Reconstruction',],
            ['id' => 6,'name' => 'Remodeling (Alteration)',],
            ['id' => 7,'name' => 'Repairing',],
            ]
        );
    }
}
