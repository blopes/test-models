<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurposeUnit extends Model
{
    use HasFactory;

    protected $table = 'purpose_unit';
    protected $fillable = ['purpose_id', 'unit_id', 'creator_id'];
}
