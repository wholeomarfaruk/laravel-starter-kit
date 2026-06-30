<?php

namespace App\Livewire\Admin\Users;

use App\Models\Panel;
use App\Models\User;
use App\Services\UserService;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public $users;
    public $viewModal = false;
    public $user;
    public $roles;
    public $role_name;
    public $UserModal = false;
    public $newUserName, $newUserEmail, $newUserPassword;
    public $search = '';
    public $panels;
    public $panelId;

    public function mount(UserService $userService)
    {
        $this->users  = $userService->all();
        $this->roles  = Role::all();
        $this->panels = Panel::all();
    }

    public function updatedRoleName(string $value, UserService $userService)
    {
        $userService->assignRole($this->user, $value);
    }

    public function updatedPanelId(?string $panelId, UserService $userService)
    {
        $userService->assignPanel($this->user, $panelId ? (int) $panelId : null);

        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => $panelId ? 'User Panel updated successfully' : 'User Panel removed successfully',
        ]);
    }

    public function render(UserService $userService)
    {
        $this->users = $userService->all($this->search);
        return view('livewire.admin.users.users')->layout('layouts.admin.admin');
    }

    public function deleteUser(int $id, UserService $userService)
    {
        $user = $userService->find($id);

        if (! $user) {
            return abort(404);
        }

        if (! $userService->delete($user)) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Superadmin cannot be deleted']);
            return;
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'User deleted successfully']);
    }

    public function viewUser(int $id, UserService $userService)
    {
        $user = $userService->find($id);

        if (! $user) {
            return abort(404);
        }

        $this->user      = $user;
        $this->role_name = $user?->roles?->first()?->name;
        $this->viewModal = true;
    }

    public function registerUser(UserService $userService)
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
