<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Organization Roles
        $organization_roles = ['Admin', 'Member','Pending'];
        $organization_permissions = [
            'edit organization',
            'delete organization',
            'manage organization members',
        ];

        // Project Roles
        $project_roles = ['Manager', 'User'];
        // Agent Roles
        $agent_roles = ['Lead', 'Integrator'];

        $project_permissions = [
            'delete project',
            'edit project',
            'create unit',
            'edit unit',
            'delete unit',
            'invite to project',
            'manage roles in project',
            'remove user from project',
            'list members',
            'remove member',
        ];

        $manager_unit_permissions = [
            'change current stage',
            'edit stage details',
            'read stage details complete',
            'read stage logs',
            'create agent',
            'update agent',
            'delete agent',
            'set lod loi'
        ];

        $unit_permissions = [
            'read stage details',
            'edit stage notes',
            'specify element',
        ];

        $unit_agent_permissions = [
            'manage agent stages',
            'invite to agent',
            'manage roles in agent',
            'remove user from agent',
            'create task',
            'update task',
            'delete task',
            'create deliverable',
            'update deliverable',
            'delete deliverable',
            'link element to task',
            'unlink element to task',
            'link deliverable to task',
            'unlink deliverable to task',
            'link deliverable to element',
            'unlink deliverable to element',
        ];

        // Create permissions
        foreach ($manager_unit_permissions as $permission_name) {
            Permission::updateOrCreate(['name' => $permission_name, 'guard_name' => 'project','scope' => 'unit']);
        }
        foreach ($project_permissions as $permission_name) {
            Permission::updateOrCreate(['name' => $permission_name, 'guard_name' => 'project','scope' => 'project']);
        }
        foreach ($organization_permissions as $permission_name) {
            Permission::updateOrCreate(['name' => $permission_name, 'guard_name' => 'web','scope' => 'organization']);
        }
        foreach ($unit_permissions as $permission_name) {
            Permission::updateOrCreate(['name' => $permission_name, 'guard_name' => 'project','scope' => 'unit']);
            Permission::updateOrCreate(['name' => $permission_name, 'guard_name' => 'agent','scope' => 'unit']);
        }

        foreach ($unit_agent_permissions as $permission_name) {
            Permission::updateOrCreate(['name' => $permission_name, 'guard_name' => 'project','scope' => 'agent']);
            Permission::updateOrCreate(['name' => $permission_name, 'guard_name' => 'agent','scope' => 'agent']);
        }

        // Seed Organization Roles
        foreach ($organization_roles as $role) {
            $created_role = Role::updateOrCreate(['name' => $role, 'guard_name' => 'web']);

            if ($role == 'Admin') {
                foreach ($organization_permissions as $permission_name) {
                    $created_role->givePermissionTo($permission_name);
                }
            }
        }

        // Seed Project Roles
        foreach ($project_roles as $role) {
            $created_role = Role::updateOrCreate(['name' => $role, 'guard_name' => 'project']);

            if ($role == 'Manager') {
                foreach ($manager_unit_permissions as $permission_name) {
                    $created_role->givePermissionTo($permission_name);
                }
                foreach ($project_permissions as $permission_name) {
                    $created_role->givePermissionTo($permission_name);
                }
                foreach ($unit_permissions as $permission_name) {
                    $created_role->givePermissionTo($permission_name);
                }
                foreach ($unit_agent_permissions as $permission_name) {
                    $created_role->givePermissionTo($permission_name);
                }
            }
        }

        // Seed Agent Roles
        foreach ($agent_roles as $role) {
            $created_role = Role::updateOrCreate(['name' => $role, 'guard_name' => 'agent']);

            if ($role == 'Lead') {
                foreach ($unit_permissions as $permission_name) {
                    $created_role->givePermissionTo($permission_name);
                }
                foreach ($unit_agent_permissions as $permission_name) {
                    $created_role->givePermissionTo($permission_name);
                }
            }
        }
    }
}
