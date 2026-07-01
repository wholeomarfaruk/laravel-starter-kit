<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Gender;
use Illuminate\Support\Str;
use Livewire\Component;

class Genders extends Component
{
    public bool   $createModal  = false;
    public string $newName      = '';
    public string $newSlug      = '';

    public function updatedNewName(string $value): void
    {
        $this->newSlug = Str::slug($value, '_');
    }

    public function toggleActive(int $id): void
    {
        $gender = Gender::findOrFail($id);
        $gender->update(['is_active' => ! $gender->is_active]);
        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => $gender->name . ' ' . ($gender->is_active ? 'enabled' : 'disabled'),
        ]);
    }

    public function createGender(): void
    {
        $this->validate([
            'newName' => 'required|string|max:50',
            'newSlug' => 'required|string|max:50|unique:genders,slug',
        ]);

        $maxOrder = Gender::max('sort_order') ?? 0;

        Gender::create([
            'name'       => $this->newName,
            'slug'       => $this->newSlug,
            'is_active'  => true,
            'sort_order' => $maxOrder + 1,
        ]);

        $this->reset(['newName', 'newSlug', 'createModal']);
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Gender added successfully']);
    }

    public function deleteGender(int $id): void
    {
        Gender::findOrFail($id)->delete();
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Gender deleted']);
    }

    public function render(): mixed
    {
        return view('livewire.admin.settings.genders', [
            'genders' => Gender::orderBy('sort_order')->orderBy('name')->get(),
        ])->layout('layouts.admin.admin');
    }
}
