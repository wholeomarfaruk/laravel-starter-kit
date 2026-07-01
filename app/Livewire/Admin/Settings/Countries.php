<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class Countries extends Component
{
    use WithPagination;

    public string $search        = '';
    public string $filterAllowed = '';
    public string $filterActive  = '';

    public bool   $createModal     = false;
    public string $newName         = '';
    public string $newCode         = '';
    public string $newPhoneCode    = '';
    public string $newCurrencyCode = '';
    public string $newEmojiFlag    = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch(): void        { $this->resetPage(); }
    public function updatingFilterAllowed(): void { $this->resetPage(); }
    public function updatingFilterActive(): void  { $this->resetPage(); }

    public function toggleRegisterAllowed(int $id): void
    {
        $country = Country::findOrFail($id);
        $country->update(['is_register_allowed' => ! $country->is_register_allowed]);
        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => $country->name . ' registration ' . ($country->is_register_allowed ? 'enabled' : 'disabled'),
        ]);
    }

    public function toggleActive(int $id): void
    {
        $country = Country::findOrFail($id);
        $country->update(['is_active' => ! $country->is_active]);
        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => $country->name . ' ' . ($country->is_active ? 'activated' : 'deactivated'),
        ]);
    }

    public function createCountry(): void
    {
        $this->validate([
            'newName'         => 'required|string|max:100',
            'newCode'         => 'required|string|size:2|unique:countries,code',
            'newPhoneCode'    => 'required|string|max:10',
            'newCurrencyCode' => 'nullable|string|max:10',
            'newEmojiFlag'    => 'nullable|string|max:10',
        ]);

        Country::create([
            'name'                => $this->newName,
            'code'                => strtoupper($this->newCode),
            'phone_code'          => $this->newPhoneCode,
            'currency_code'       => $this->newCurrencyCode ?: null,
            'emoji_flag'          => $this->newEmojiFlag ?: null,
            'is_register_allowed' => false,
            'is_active'           => true,
        ]);

        $this->reset(['newName', 'newCode', 'newPhoneCode', 'newCurrencyCode', 'newEmojiFlag', 'createModal']);
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Country added successfully']);
    }

    public function deleteCountry(int $id): void
    {
        Country::findOrFail($id)->delete();
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Country deleted']);
    }

    public function render(): mixed
    {
        $countries = Country::query()
            ->when($this->search, fn($q) => $q->where(fn($s) => $s
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('code', 'like', "%{$this->search}%")
                ->orWhere('phone_code', 'like', "%{$this->search}%")
            ))
            ->when($this->filterAllowed !== '', fn($q) => $q->where('is_register_allowed', (bool) $this->filterAllowed))
            ->when($this->filterActive  !== '', fn($q) => $q->where('is_active',           (bool) $this->filterActive))
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(20);

        return view('livewire.admin.settings.countries', compact('countries'))
            ->layout('layouts.admin.admin');
    }
}
