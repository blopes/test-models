<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('frameworks')->insertOrIgnore(
            [
                [
                    'name' => 'RIBA'
                ],

            ]
        );
    }
}
