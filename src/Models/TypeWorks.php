<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TypeWorks extends Model
{
    use HasFactory;

    protected $table = 'type_works';
    protected $fillable = ['type_works_id', 'unit_id'];


    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'type_works_unit');
    }
}
