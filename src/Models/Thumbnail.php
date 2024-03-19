<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thumbnail extends Model
{
    use HasFactory;

    protected $table = 'thumbnails';
    protected $fillable = ['context', 'path'];
    public $timestamps = false;

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function organization(): HasMany
    {
        return $this->hasMany(Organization::class);
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function unit(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
