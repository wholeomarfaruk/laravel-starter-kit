<?php

namespace App\Livewire\Admin\ActivityLog;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Component
{
    use WithPagination;

    public string $search     = '';
    public string $filterEvent = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $logs = Activity::with('causer')
            ->when($this->search, fn($q) => $q
                ->where('description', 'like', "%{$this->search}%")
                ->orWhere('subject_type', 'like', "%{$this->search}%")
            )
            ->when($this->filterEvent, fn($q) => $q->where('event', $this->filterEvent))
            ->latest()
            ->paginate(20);

        return view('livewire.admin.activity-log.activity-log', compact('logs'))
            ->layout('layouts.admin.admin');
    }
}
