<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $fillable = [
        'title', 'reference', 'code', 'thumbnail_id', 'image', 'country', 'city', 'framework_id', 'classification_system_id', 'creator_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, 'project_id');
    }

    

}