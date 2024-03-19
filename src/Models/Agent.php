<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'agents';
    protected $fillable = ['title', 'is_custom'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = ['is_custom' => 'boolean'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    public function agentActions(): HasMany
    {
        return $this->hasMany(AgentActions::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'agent_actions')
            ->withPivot('stage_id');
        ;
    }

    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'agent_actions');
    }

    public function usersInUnit($unit_id)
    {
        return $this->hasManyThrough(
            User::class,
            AgentActions::class,
            'agent_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'user_id', // Foreign key on agent_actions table
            'unit_id'    // Additional condition for the unit_id
        )->where('unit_id', $unit_id)
            ->distinct('users.id')  // Assuming 'stages.id' is the primary key of the 'stages' table
            ->get();
    }

    public function stagesInUnit($unit_id)
    {
        return $this->hasManyThrough(
            Stage::class,
            AgentActions::class,
            'agent_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'stage_id', // Foreign key on agent_actions table
            'unit_id'    // Additional condition for the unit_id
        )->where('unit_id', $unit_id)
            ->distinct('stages.id')  // Assuming 'stages.id' is the primary key of the 'stages' table
            ->get();
    }

    public function contractedByInUnit($unit_id)
    {
        return AgentActions::where('agent_id', $this->id)->where('unit_id', $unit_id)->first()->contracted_by;
    }

}
