<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function all(string $search = '')
    {
        return Role::with('permissions')
            ->when($search, fn($q) => $q
                ->where('name', 'like', "%{$search}%")
                ->orWhereHas('permissions', fn($pq) => $pq->where('name', 'like', "%{$search}%"))
            )
            ->get();
    }

    public function find(int $id): ?Role
    {
        return Role::with('permissions')->find($id);
    }

    public function allPermissionsGrouped(): array
    {
        $permissions = Permission::all()->map(function ($item) {
            $item->group_name = explode('.', $item->name)[0];
            return $item;
        })->groupBy('group_name');

        return [$permissions, Permission::all()];
    }

    public function create(string $name, array $permissions): Role
    {
        $role = Role::create(['name' => $name]);
        $role->syncPermissions($permissions);
        return $role;
    }

    public function update(Role $role, string $name, array $permissions): Role
    {
        $role->name = $name;
        $role->save();
        $role->syncPermissions($permissions);
        return $role;
    }

    public function delete(Role $role): void
    {
        $role->permissions()->detach();
        $role->delete();
    }
}
