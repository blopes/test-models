<?php

namespace Blopes\SharedModels\Models;

use Blopes\SharedModels\Database\Factories\OrganizationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'sector',
        'thumbnail_id',
        'logo',
        'description',
        'is_registered',
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

    protected $casts = ['is_registered' => 'boolean'];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($organization) {
            $organization->details()->delete();
        });
    }

    protected static function booted()
    {
        static::creating(function ($organization) {
            // Check if thumbnail_id is null and fill it with a default value if so
            if (is_null($organization->thumbnail_id)) {
                $organization->thumbnail_id = 2;
            }
        });
    }

    /**
     * Get the users of the organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'organization_id');
    }

    /**
     * Gets the details of the Organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function details()
    {
        return $this->hasOne(OrganizationDetails::class, 'organization_id');
    }

    /**
     * Get the creator of the organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->hasOneThrough(User::class, OrganizationDetails::class, 'organization_id', 'id', 'id', 'creator_id');
    }


    /**
     * Get the size of the organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function size()
    {
        return $this->hasOneThrough(OrganizationSize::class, OrganizationDetails::class, 'organization_id', 'id', 'id', 'size_id');
    }

    public function usersVerified()
    {
        return User::role(['Admin', 'Member'])->where('organization_id', $this->id)->get();
    }

    public function thumbnail(): BelongsTo
    {
        return $this->BelongsTo(Thumbnail::class);
    }

    protected static function newFactory()
    {
        return OrganizationFactory::new();
    }
}
