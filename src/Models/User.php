<?php

namespace Blopes\SharedModels\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticable
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'thumbnail_id', 'picture', 'organization_id', 'phone_number'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'created_at', 'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($user) {
            $user->details()->delete();
        });
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            // Check if thumbnail_id is null and fill it with a default value if so
            if (is_null($user->thumbnail_id)) {
                $user->thumbnail_id = 1;
            }
        });
    }

    /**
     * Get the organization that the user belongs to.
     *
     * @return BelongsTo
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    /**
     * Gets the details of the user.
     *
     * @return HasOne
     */
    public function details(): HasOne
    {
        return $this->hasOne(UserDetails::class, 'user_id');
    }

    public function unitCreator(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function agentActions(): HasMany
    {
        return $this->hasMany(AgentActions::class);
    }

    public function agents(): BelongsToMany
    {
        return $this->belongsToMany(Agent::class, 'agent_actions')
            ->withPivot('stage_id');
    }

    public function stages(): BelongsToMany
    {
        return $this->belongsToMany(Stage::class, 'agent_actions', 'user_id', 'stage_id')
            ->withPivot('agent_id');
    }

    /**
     * Get the organizations details that the user registered.
     *
     * @return HasMany
     */
    public function createdOrganizationDetails(): HasMany
    {
        return $this->hasMany(OrganizationDetails::class, 'creator_id');
    }

    /**
     * Get the organizations that the user registered.
     *
     * @return HasOnThrough
     */
    public function createdOrganization(): HasOneThrough
    {
        return $this->hasOneThrough(Organization::class, OrganizationDetails::class, 'creator_id', 'id', 'id', 'organization_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_users')->distinct('project_id');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'project_users');
    }

    public function stagesInAgentUnit($unit_id, $agent_id)
    {
        return $this->hasManyThrough(
            Stage::class,
            AgentActions::class,
            'user_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'stage_id', // Foreign key on agent_actions table
        )->where('unit_id', $unit_id)
            ->where('agent_id', $agent_id)
            ->distinct('stages.id')  // Assuming 'stages.id' is the primary key of the 'stages' table
            ->get();
    }

    public function agentsUnit($unit_id)
    {
        return $this->hasManyThrough(
            Agent::class,
            AgentActions::class,
            'user_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'agent_id', // Foreign key on agent_actions table
        )->where('unit_id', $unit_id)
            ->distinct('agents.id')  // Assuming 'agents.id' is the primary key of the 'agents' table
            ->get();
    }

    public function getProjectRole($project_id): string
    {
        $project_user = ProjectUser::where('project_id', $project_id)->where('user_id', $this->id)->first();
        if (!$project_user) {
            throw new Exception('User not in that project', 403);
        }

        return $project_user->getRoleNames()->first();
    }

    public function getAgentRole($unit_id, $agent_id): string
    {
        $agent_action = AgentActions::where('unit_id', $unit_id)->where('agent_id', $agent_id)->where('user_id', $this->id)->first();

        if (!$agent_action) {
            throw new Exception('User not in that agent', 403);
        }

        return $agent_action->getRoleNames()->first();
    }

    public function thumbnail(): BelongsTo
    {
        return $this->BelongsTo(Thumbnail::class);
    }

}
