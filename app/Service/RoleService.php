<?php

namespace App\Service;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleService
{
    public function getAllRoles()
    {
        return Role::orderBy('created_at', 'desc')->get();
    }

    public function createRole($data)
    {
        DB::beginTransaction();
        try {
            $role = Role::create([
                'role_name' => $data['role_name'],
                'role_code' => $data['role_code']
            ]);

            foreach ($data['permissions'] as $permissionValue) {
                list($group, $name) = explode('.', $permissionValue);
                $permission = Permission::firstOrCreate([
                    'permission_name' => "Chức năng $permissionValue",
                    'permission_group' => "Nhóm chức năng $group"
                ]);

                $role->permissions()->attach($permission->id);
            }

            DB::commit();
            return $role;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function getRoleById($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $groupedPermissions = $role->permissions->groupBy(function ($permission) {
            preg_match('/Nhóm chức năng (\d+)/', $permission->permission_group, $matches);
            return $matches[1] ?? 1;
        })->sortKeys();

        return [
            'role' => $role,
            'groupedPermissions' => $groupedPermissions
        ];
    }

    public function updateRole($id, $data)
    {
        DB::beginTransaction();
        try {
            $role = Role::findOrFail($id);
            $role->update([
                'role_name' => $data['role_name'],
                'role_code' => $data['role_code']
            ]);

            $currentPermissionIds = $role->permissions()->pluck('permissions.id')->toArray();
            $newPermissions = [];

            foreach ($data['permissions'] as $permissionValue) {
                list($group, $name) = explode('.', $permissionValue);
                $permission = Permission::firstOrCreate([
                    'permission_name' => "Chức năng $permissionValue",
                    'permission_group' => "Nhóm chức năng $group"
                ]);
                $newPermissions[] = $permission->id;
            }

            $role->permissions()->sync($newPermissions);

            DB::commit();
            return $role;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
