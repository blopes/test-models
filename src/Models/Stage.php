<?php

namespace Blopes\SharedModels\Models;

use Blopes\SharedModels\Models\DeliverableActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stage extends Model
{
    use HasFactory;

    protected $table = 'stages';

    protected $fillable = ['value', 'name', 'color_code', 'stage_chapter_id', 'framework_id'];

    public function agentActions(): HasMany
    {
        return $this->hasMany(AgentActions::class);
    }

    public function stageChapters(): BelongsTo
    {
        return $this->belongsTo(StageChapters::class, 'stage_chapter_id');
    }

    public function framework(): BelongsTo
    {
        return $this->belongsTo(Framework::class);
    }

}
