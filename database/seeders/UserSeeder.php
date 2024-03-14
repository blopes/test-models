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
        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'), // Replace 'password123' with the desired password
            'thumbnail_id' => 1, // Replace with the desired thumbnail_id
            'picture' => 'path_to_picture.jpg', // Replace 'path_to_picture.jpg' with the actual path to the picture
            'phone_number' => '1234567890', // Replace '1234567890' with the desired phone number
            'email_verified_at' => Carbon::now(),
            'remember_token' => null, // It will be automatically generated when needed
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}