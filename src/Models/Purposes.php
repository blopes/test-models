<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Purposes extends Model
{
    use HasFactory;

    protected $table = 'purposes';

    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'purpose_unit', 'purpose_id', 'unit_id');
    }
}
