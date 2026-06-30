<?php

namespace App\Livewire\Admin\Permissions;

use App\Services\RoleService;
use Livewire\Component;

class RoleEdit extends Component
{
    public $permissionsGrouped;
    public $name;
    public $permissions = [];
    public $allPermissions;
    public $selectAll = false;
    public $role;

    public function mount(int $id, RoleService $roleService)
    {
        if (! auth()->user()->can('role.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $role = $roleService->find($id);

        if (! $role) {
            abort(404);
        }

        $this->role        = $role;
        $this->name        = $role->name;
        $this->permissions = $role->permissions->pluck('name')->toArray();

        [$grouped, $all]          = $roleService->allPermissionsGrouped();
        $this->permissionsGrouped = $grouped;
        $this->allPermissions     = $all;
    }

    public function updatedSelectAll()
    {
        $this->permissions = $this->selectAll
            ? $this->allPermissions->pluck('name')->toArray()
            : [];
    }

    public function render()
    {
        return view('livewire.admin.permissions.role-edit')->layout('layouts.admin.admin');
    }

    public function save(RoleService $roleService)
    {
        $this->validate(['name' => 'required|unique:roles,name,' . $this->role->id]);

        $roleService->update($this->role, $this->name, $this->permissions);

        return redirect()->route('admin.roles.list')->with('success', 'Role & Permissions updated successfully.');
    }
}
