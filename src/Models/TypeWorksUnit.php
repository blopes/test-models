<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeWorksUnit extends Model
{
    use HasFactory;

    protected $table = 'type_works_unit';
    protected $fillable = ['type_works_id', 'unit_id', 'created_at', 'updated_at'];
}
