<?php

namespace Blopes\SharedModels\Database\Seeders;

use Blopes\SharedModels\Models\Framework;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stages')->insertOrIgnore(
            [
                [
                    'id' => 1, 'value' => 0, 'name' => 'Strategic Definition', 'color_code' => '#f79c33', 'stage_chapter_id' => 1, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
                [
                    'id' => 2, 'value' => 1, 'name' => 'Preparation and Brief', 'color_code' => '#eda3c6', 'stage_chapter_id' => 1, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
                [
                    'id' => 3, 'value' => 2, 'name' => 'Concept Design', 'color_code' => '#73ccd2', 'stage_chapter_id' => 2, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
                [
                    'id' => 4, 'value' => 3, 'name' => 'Spatial Coordination', 'color_code' => '#ffd322', 'stage_chapter_id' => 2, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
                [
                    'id' => 5, 'value' => 4, 'name' => 'Technical Design', 'color_code' => '#83bf9b', 'stage_chapter_id' => 2, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
                [
                    'id' => 6, 'value' => 5, 'name' => 'Manufacturing and Construction', 'color_code' => '#a4a8d7', 'stage_chapter_id' => 3, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
                [
                    'id' => 7, 'value' => 6, 'name' => 'Handover', 'color_code' => '#eed39b', 'stage_chapter_id' => 3, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
                [
                    'id' => 8, 'value' => 7, 'name' => 'Use', 'color_code' => '#5caad8', 'stage_chapter_id' => 4, 'framework_id' => Framework::where('name', 'RIBA')->first()->id
                ],
            ]
        );
    }
}
