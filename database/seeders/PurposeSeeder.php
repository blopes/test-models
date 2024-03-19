<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purposes')->insertOrIgnore(
            [
            ['id' => 1,'name' => 'Residential Buildings',],
            ['id' => 2,'name' => 'Educational Buildings',],
            ['id' => 3,'name' => 'Institutional Buildings',],
            ['id' => 4,'name' => 'Assembly Buildings',],
            ['id' => 5,'name' => 'Business Buildings',],
            ['id' => 6,'name' => 'Mercantile Buildings',],
            ['id' => 7,'name' => 'Industrial Buildings',],
            ['id' => 8,'name' => 'Storage Buildings',],
            ['id' => 9,'name' => 'Wholesale Establishments',],
            ['id' => 10,'name' => 'Mixed Land Use Buildings',],
            ['id' => 11,'name' => 'Hazardous Buildings',],
            ['id' => 12,'name' => 'Detached Buildings',],
            ]
        );
    }
}
