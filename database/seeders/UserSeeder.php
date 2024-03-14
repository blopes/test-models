<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Blopes\SharedModels\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
    }
}