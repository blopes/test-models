<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Blopes\SharedModels\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\Clock\now;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'admin@email.com',
            'password' => 'password',
            'thumbnail_id' => 1,
            'email_verified_at' => Carbon::now(),
        ]);
    }
}