<?php

namespace Blopes\SharedModels\Models;

use Blopes\SharedModels\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class AgentActions extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'agent_actions';
    protected $fillable = ['project_id', 'unit_id', 'agent_id', 'user_id', 'stage_id', 'creator_id', 'is_pending', 'contracted_by'];
    protected $casts = ['is_pending' => 'boolean'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    public function agents(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function stages(): BelongsTo
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function userCreator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
