<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'units';

    protected $fillable = ['project_id', 'title', 'reference', 'code', 'category_id', 'description', 'thumbnail_id', 'image', 'creator_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected static function booted()
    {
        static::creating(function ($unit) {
            // Check if thumbnail_id is null and fill it with a default value if so
            if (is_null($unit->thumbnail_id)) {
                $unit->thumbnail_id = 4;
            }
        });
    }

    public function unitDetails(): HasOne
    {
        return $this->hasOne(UnitDetails::class, 'unit_id');
    }

    public function project(): BelongsTo
    {
        return $this->BelongsTo(Project::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function typeWorks(): BelongsToMany
    {
        return $this->BelongsToMany(TypeWorks::class, 'type_works_unit');
    }

    public function purposes(): BelongsToMany
    {
        return $this->belongsToMany(Purposes::class, 'purpose_unit', 'unit_id', 'purpose_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_users');
    }

    public function agentActions(): HasMany
    {
        return $this->hasMany(AgentActions::class, 'unit_id');
    }

    public function taskActions(): HasMany
    {
        return $this->hasMany(TaskActions::class, 'unit_id');
    }

    public function elementActions(): HasMany
    {
        return $this->hasMany(ElementActions::class, 'unit_id');
    }

    public function lifecycleDetails(): HasMany
    {
        return $this->hasMany(LifeCycleDetails::class);
    }

    public function deliverables(): HasMany
    {
        return $this->hasMany(DeliverableActions::class, 'unit_id');
    }

    public function currentStage()
    {
        $stage = $this->lifecycleDetails->where('is_current_stage', true)->first();

        return Stage::find($stage->stage_id);
    }

    public function stages()
    {
        return $this->hasManyThrough(
            Stage::class,
            LifeCycleDetails::class,
            'unit_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'stage_id' // Foreign key on agent_actions table
        );
    }

    public function agents()
    {
        return $this->hasManyThrough(
            Agent::class,
            AgentActions::class,
            'unit_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'agent_id' // Foreign key on agent_actions table
        )
            ->distinct('agents.id')
            ->get();
    }

    public function tasks()
    {
        return $this->hasManyThrough(
            Task::class,
            TaskActions::class,
            'unit_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'task_id' // Foreign key on agent_actions table
        );
    }

    public function elements()
    {
        return $this->hasManyThrough(
            Element::class,
            ElementActions::class,
            'unit_id', // Foreign key on agent_actions table
            'id', // Local key on agents table
            'id', // Local key on units table
            'element_id' // Foreign key on agent_actions table
        );
    }

    public function thumbnail(): BelongsTo
    {
        return $this->BelongsTo(Thumbnail::class);
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function (Unit $unit) {
            foreach ($unit->agentActions as $agent_action) {
                $agent_action->delete();
            }
            foreach ($unit->taskActions as $task_action) {
                $task_action->delete();
            }
            foreach ($unit->elementActions as $element_action) {
                $element_action->delete();
            }
            foreach ($unit->deliverables as $deliverable) {
                $deliverable->delete();
            }
        });
    }
}
