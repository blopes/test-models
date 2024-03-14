<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'units';

    protected $fillable = ['project_id', 'title', 'reference', 'code', 'category_id', 'description', 'thumbnail_id', 'image', 'creator_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function project(): BelongsTo
    {
        return $this->BelongsTo(Project::class);
    }

}
