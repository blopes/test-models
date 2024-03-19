<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'logo', 'frame_id'];

    public function unit(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function framework(): BelongsTo
    {
        return $this->belongsTo(Framework::class, 'frame_id');
    }
}
