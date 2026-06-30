<?php

namespace App\Livewire\Admin\Permissions;

use App\Services\RoleService;
use Livewire\Component;

class RoleCreate extends Component
{
    public $permissionsGrouped;
    public $name;
    public $permissions = [];
    public $allPermissions;
    public $selectAll = false;

    public function mount(RoleService $roleService)
    {
        if (! auth()->user()->can('role.create')) {
            abort(403, 'Unauthorized action.');
        }

        [$grouped, $all] = $roleService->allPermissionsGrouped();
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
        return view('livewire.admin.permissions.role-create')->layout('layouts.admin.admin');
    }

    public function save(RoleService $roleService)
    {
        $this->validate(['name' => 'required|unique:roles,name']);

        $roleService->create($this->name, $this->permissions);

        return redirect()->route('admin.roles.list')->with('success', 'Role created successfully.');
    }
}
