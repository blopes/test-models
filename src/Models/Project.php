<?php

namespace Blopes\SharedModels\Models;

use Blopes\SharedModels\Models\AgentActions;
use Blopes\SharedModels\Models\ClassificationSystem;
use Blopes\SharedModels\Models\Framework;
use Blopes\SharedModels\Models\ProjectDetails;
use Blopes\SharedModels\Models\Stage;
use Blopes\SharedModels\Models\StageChapters;
use Blopes\SharedModels\Models\Thumbnail;
use Blopes\SharedModels\Models\Unit;
use Blopes\SharedModels\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title', 'reference', 'code', 'thumbnail_id', 'image', 'country', 'city', 'framework_id', 'classification_system_id', 'creator_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function boot()
    {
        parent::boot();

        self::deleting(function (Project $project) {
            foreach ($project->units as $unit) {
                $unit->delete();
            }
        });
    }

    protected static function booted()
    {
        static::creating(function ($project) {
            // Check if thumbnail_id is null and fill it with a default value if so
            if (is_null($project->thumbnail_id)) {
                $project->thumbnail_id = 3;
            }
        });
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, 'project_id');
    }

    public function projectDetails(): HasOne
    {
        return $this->hasOne(ProjectDetails::class);
    }

    public function framework(): BelongsTo
    {
        return $this->belongsTo(Framework::class);
    }

    public function classificationSystem(): BelongsTo
    {
        return $this->belongsTo(ClassificationSystem::class);
    }

    public function projectCreator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_users');
    }

    public function stages()
    {
        return $this->hasManyThrough(
            Stage::class,
            Framework::class,
            'id',           // Foreign key on frameworks table
            'framework_id', // Foreign key on stages table
            'framework_id', // Local key on units table
            'id'            // Local key on frameworks table
        );
    }

    public function stageChapters()
    {
        $stages = $this->stages()->get();
        $stage_chapter_ids = $stages->pluck('stage_chapter_id')->unique();

        return StageChapters::whereIn('id', $stage_chapter_ids)->get();
    }

    public function agentActions(): HasMany
    {
        return $this->hasMany(AgentActions::class);
    }

    public function thumbnail()
    {
        return $this->belongsTo(Thumbnail::class);
    }

}