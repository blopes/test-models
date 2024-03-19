<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSize extends Model
{
    use HasFactory;

    protected $table = 'organization_size';

    public function organizationDetails()
    {
        return $this->hasMany(OrganizationDetails::class, 'size_id');
    }
}
