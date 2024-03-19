<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'project_details';

    protected $fillable = ['project_id', 'description', 'address', 'budget', 'asset_owner', 'user_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function projectCreator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
