<?php

namespace Blopes\SharedModels\Database\Seeders;

use Blopes\SharedModels\Models\Thumbnail;
use Illuminate\Database\Seeder;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createOrUpdateThumbnail(1, 'User', 'userImages/user.gif');
        $this->createOrUpdateThumbnail(2, 'Organization', 'organizationImages/organization.gif');
        $this->createOrUpdateThumbnail(3, 'Project', 'projectImages/project.gif');
        $this->createOrUpdateThumbnail(4, 'Unit', 'unitImages/unit.gif');
    }

    private function createOrUpdateThumbnail($id, $context, $path): void
    {
        Thumbnail::updateOrCreate(
            ['id' => $id],
            ['context' => $context, 'path' => $path]
        );
    }
}
