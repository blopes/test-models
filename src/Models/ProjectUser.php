<?php

namespace Blopes\SharedModels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ProjectUser extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'project_users';
    protected $fillable = ['project_id', 'unit_id', 'user_id', 'organization_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
