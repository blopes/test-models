<?php

namespace Blopes\SharedModels\Database\Seeders;

use Blopes\SharedModels\Models\Framework;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insertOrIgnore(
            [
                ['id' => 1, 'name' => 'Building', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 2, 'name' => 'Bridge', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 3, 'name' => 'Road', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 4, 'name' => 'Tunnel', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 5, 'name' => 'Railroad', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 6, 'name' => 'Airport', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 7, 'name' => 'Coastal Works', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 8, 'name' => 'Power Dam', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 9, 'name' => 'Water Supply Network', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 10, 'name' => 'Gas Supply Network', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 11, 'name' => 'Power Supply Network', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 12, 'name' => 'Comms Network', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
                ['id' => 13, 'name' => 'Landscaping', 'frame_id' => Framework::where('name', 'RIBA')->first()->id],
            ]
        );
    }
}
