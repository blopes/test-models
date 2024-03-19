<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stage_chapters')->insertOrIgnore(
            [
            ['id' => 1,'name' => 'Preparation'],
            ['id' => 2,'name' => 'Design'],
            ['id' => 3,'name' => 'Construction'],
            ['id' => 4,'name' => 'Operation']
            ]
        );
    }
}
