<?php

namespace Blopes\SharedModels\Models;

use Blopes\SharedModels\Database\Factories\UnitDetailsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitDetails extends Model
{
    use HasFactory;

    protected $table = 'unit_details';

    protected $fillable = ['unit_id', 'address', 'country', 'city', 'creator_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'

    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    protected static function newFactory()
    {
        return UnitDetailsFactory::new();
    }
}
