<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClassificationSystem extends Model
{
    use HasFactory;

    protected $table = 'classification_systems';
    protected $primary_key = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'logo',
    ];

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

}
