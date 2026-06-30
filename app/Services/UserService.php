<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function all(string $search = '')
    {
        return User::when($search, fn($q) => $q
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
        )->latest()->get();
    }

    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function assignRole(User $user, string $role): void
    {
        $user->syncRoles([$role]);
    }

    public function assignPanel(User $user, ?int $panelId): void
    {
        if ($panelId === null) {
            $user->panels()->detach();
            return;
        }
        $user->panels()->sync($panelId);
    }

    public function delete(User $user): bool
    {
        if ($user->hasRole('superadmin')) {
            return false;
        }

        if ($user->profile_photo_path && file_exists($user->profile_photo_path)) {
            unlink($user->profile_photo_path);
        }

        $user->delete();
        return true;
    }
}
