<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Framework extends Model
{
    use HasFactory;

    protected $table = 'frameworks';
    protected $fillable = ['name', 'logo'];
    protected $casts = ['created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }
}
