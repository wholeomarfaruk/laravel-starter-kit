<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Traits\WithMediaPicker;
use App\Models\Panel;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithMediaPicker;

    public $users;
    public $viewModal  = false;
    public $user;
    public $roles;
    public $role_name;
    public $UserModal  = false;
    public $newUserName, $newUserEmail, $newUserPassword;
    public string $search         = '';
    public string $filterRole     = '';
    public string $filterPanel    = '';
    public string $filterVerified = '';
    public $panels;
    public array  $panelIds    = [];
    public ?int   $avatar_id    = null;
    public string $editName     = '';
    public string $editEmail    = '';
    public string $editPassword = '';
    public string $editGender      = '';
    public string $editPhone       = '';
    public string $editCountryCode = '';
    public string $editAddress     = '';
    public string $editBio         = '';

    public function mount(UserService $userService): void
    {
        $this->users  = $userService->all();
        $this->roles  = Role::all();
        $this->panels = Panel::all();
    }

    // ── Override trait so we can auto-save avatar immediately after selection ──
    public function mediaSelected($field, $id): void
    {
        if (\is_array($id)) {
            $existing     = $this->$field ?? [];
            $this->$field = array_values(array_unique([...$existing, ...$id], SORT_REGULAR));
        } else {
            $this->$field = $id;
        }

        if ($field === 'avatar_id' && $this->user) {
            $this->user->update(['avatar_id' => $this->avatar_id]);
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Profile picture updated']);
        }
    }

    public function updatedRoleName(string $value, UserService $userService): void
    {
        if ($this->user?->hasRole('superadmin')) {
            $this->role_name = 'superadmin';
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Superadmin role cannot be changed']);
            return;
        }

        $userService->assignRole($this->user, $value);

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Role updated']);
    }

    public function togglePanel(int $panelId): void
    {
        if (! $this->user) {
            return;
        }

        $this->user->panels()->toggle($panelId);
        $this->user->load('panels');
        $this->panelIds = $this->user->panels->pluck('id')->toArray();

        $isNowAttached = \in_array($panelId, $this->panelIds, true);

        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => $isNowAttached ? 'Panel assigned' : 'Panel removed',
        ]);
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'filterRole', 'filterPanel', 'filterVerified']);
    }

    public function render(): mixed
    {
        $this->users = User::with('roles', 'panels', 'avatar')
            ->when($this->search, fn($q) => $q
                ->where(fn($s) => $s
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('email', 'LIKE', "%{$this->search}%")
                )
            )
            ->when($this->filterRole, fn($q) => $q->whereHas('roles', fn($r) => $r->where('name', $this->filterRole)))
            ->when($this->filterPanel, fn($q) => $q->whereHas('panels', fn($p) => $p->where('panels.id', (int) $this->filterPanel)))
            ->when($this->filterVerified === 'verified', fn($q) => $q->whereNotNull('email_verified_at'))
            ->when($this->filterVerified === 'unverified', fn($q) => $q->whereNull('email_verified_at'))
            ->latest()
            ->get();

        return view('livewire.admin.users.users')->layout('layouts.admin.admin');
    }

    public function deleteUser(int $id, UserService $userService): void
    {
        $user = $userService->find($id);

        if (! $user) {
            abort(404);
        }

        if (! $userService->delete($user)) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Superadmin cannot be deleted']);
            return;
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'User deleted successfully']);
    }

    public function viewUser(int $id, UserService $userService): void
    {
        $user = User::with('panels', 'roles')->find($id);

        if (! $user) {
            abort(404);
        }

        $this->user         = $user;
        $this->role_name    = $user->roles->first()?->name;
        $this->avatar_id    = $user->avatar_id;
        $this->panelIds     = $user->panels->pluck('id')->toArray();
        $this->editName     = $user->name;
        $this->editEmail    = $user->email;
        $this->editPassword = '';
        $this->editGender      = $user->gender ?? '';
        $this->editPhone       = $user->phone ?? '';
        $this->editCountryCode = $user->country_code ?? '';
        $this->editAddress     = $user->address ?? '';
        $this->editBio         = $user->bio ?? '';
        $this->viewModal    = true;
    }

    public function removeAvatar(): void
    {
        if (! $this->user) {
            return;
        }

        $this->avatar_id = null;
        $this->user->update(['avatar_id' => null]);

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Profile picture removed']);
    }

    public function updateUser(): void
    {
        if (! $this->user) {
            return;
        }

        $this->validate([
            'editName'        => 'required|min:2|max:255',
            'editEmail'       => 'required|email|unique:users,email,' . $this->user->id,
            'editPassword'    => 'nullable|min:8',
            'editGender'      => 'nullable|in:male,female,other,prefer_not_to_say',
            'editPhone'       => 'nullable|string|max:20',
            'editCountryCode' => 'nullable|string|max:5',
            'editAddress'     => 'nullable|max:500',
            'editBio'         => 'nullable|max:1000',
        ]);

        $emailChanged = $this->editEmail !== $this->user->email;
        $phoneChanged = $this->editPhone !== ($this->user->phone ?? '');

        $data = [
            'name'         => $this->editName,
            'email'        => $this->editEmail,
            'gender'       => $this->editGender ?: null,
            'phone'        => $this->editPhone ?: null,
            'country_code' => $this->editCountryCode ?: null,
            'address'      => $this->editAddress ?: null,
            'bio'          => $this->editBio ?: null,
        ];

        if ($emailChanged) {
            $data['email_verified_at'] = null;
        }

        if ($phoneChanged) {
            $data['phone_verified_at'] = null;
        }

        if ($this->editPassword !== '') {
            $data['password'] = $this->editPassword;
        }

        $this->user->update($data);
        $this->user         = $this->user->fresh(['roles', 'panels']);
        $this->editPassword = '';

        $this->dispatch('toast', ['type' => 'success', 'message' => 'User updated successfully']);
        $this->dispatch('user-saved'); // tells Alpine to exit edit mode
    }

    public function sendPasswordResetLink(int $id): void
    {
        $user = User::find($id);
        if (! $user) return;

        Password::sendResetLink(['email' => $user->email]);
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Password reset link sent to ' . $user->email]);
    }

    public function markEmailVerified(int $id): void
    {
        $user = User::find($id);
        if (! $user) return;

        $user->forceFill(['email_verified_at' => now()])->save();

        if ($this->user?->id === $id) {
            $this->user = $user->fresh(['roles', 'panels']);
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Email marked as verified']);
    }

    public function revokeEmailVerification(int $id): void
    {
        $user = User::find($id);
        if (! $user) return;

        $user->forceFill(['email_verified_at' => null])->save();

        if ($this->user?->id === $id) {
            $this->user = $user->fresh(['roles', 'panels']);
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Email verification removed']);
    }

    public function markPhoneVerified(int $id): void
    {
        $user = User::find($id);
        if (! $user) return;

        $user->forceFill(['phone_verified_at' => now()])->save();

        if ($this->user?->id === $id) {
            $this->user = $user->fresh(['roles', 'panels']);
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Phone marked as verified']);
    }

    public function revokePhoneVerification(int $id): void
    {
        $user = User::find($id);
        if (! $user) return;

        $user->forceFill(['phone_verified_at' => null])->save();

        if ($this->user?->id === $id) {
            $this->user = $user->fresh(['roles', 'panels']);
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Phone verification removed']);
    }

    public function registerUser(UserService $userService): void
    {
        $this->validate([
            'newUserName'     => 'required|min:3',
            'newUserEmail'    => 'required|email|unique:users,email',
            'newUserPassword' => 'required|min:8',
        ]);

        $userService->create([
            'name'     => $this->newUserName,
            'email'    => $this->newUserEmail,
            'password' => $this->newUserPassword,
        ]);

        $this->reset(['newUserName', 'newUserEmail', 'newUserPassword']);
        $this->UserModal = false;
        $this->dispatch('toast', ['type' => 'success', 'message' => 'User created successfully']);
    }
}
