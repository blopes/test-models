<?php

namespace Blopes\SharedModels\Models;

use Blopes\SharedModels\Database\Factories\OrganizationDetailsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_id',
        'areas_experience',
        'website',
        'address',
        'country',
        'city',
        'size_id',
        'creator_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Gets the organization that the details belong to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    /**
     * Gets the size of the organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function size()
    {
        return $this->hasOne(OrganizationSize::class, 'id', 'size_id');
    }

    /**
     * Gets the user that the created the organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    protected static function newFactory()
    {
        return OrganizationDetailsFactory::new();
    }
}
