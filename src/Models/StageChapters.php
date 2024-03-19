<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StageChapters extends Model
{
    use HasFactory;

    protected $table = 'stage_chapters';

    public function stages(): HasMany
    {
        return $this->hasmany(Stage::class, 'stage_chapter_id');
    }
}
