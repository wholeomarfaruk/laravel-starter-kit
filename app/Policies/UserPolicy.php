<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $auth): bool
    {
        return $auth->can('user.view');
    }

    public function view(User $auth, User $target): bool
    {
        return $auth->can('user.view');
    }

    public function create(User $auth): bool
    {
        return $auth->can('user.create');
    }

    public function update(User $auth, User $target): bool
    {
        if ($target->hasRole('superadmin') && ! $auth->hasRole('superadmin')) {
            return false;
        }
        return $auth->can('user.edit');
    }

    public function delete(User $auth, User $target): bool
    {
        if ($target->hasRole('superadmin')) {
            return false;
        }
        return $auth->can('user.delete');
    }
}
