<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    public function viewAny(User $auth): bool
    {
        return $auth->can('role.view');
    }

    public function view(User $auth, Role $role): bool
    {
        return $auth->can('role.view');
    }

    public function create(User $auth): bool
    {
        return $auth->can('role.create');
    }

    public function update(User $auth, Role $role): bool
    {
        return $auth->can('role.edit');
    }

    public function delete(User $auth, Role $role): bool
    {
        if ($role->name === 'superadmin') {
            return false;
        }
        return $auth->can('role.delete');
    }
}
