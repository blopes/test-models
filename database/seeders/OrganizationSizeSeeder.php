<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organization_size')->insert(
            [
            ['id' => 1,'name' => '0 - 10 Employees',],
            ['id' => 2,'name' => '10 - 50 Employees',],
            ['id' => 3,'name' => '50 - 100 Employees',],
            ['id' => 4,'name' => '50 - 250 Employees',],
            ['id' => 5,'name' => '+ 250 Employees',],
            ]
        );
    }
}
