<div x-data x-init="$store.pageName = { name: 'Activity Log', slug: 'activity-log' }">
    {{-- Page Header --}}
    <div class="flex flex-wrap justify-between gap-6 mb-6">
        <h1 class="text-gray-500 text-lg font-bold" x-cloak x-text="$store.pageName?.name ?? ''"></h1>
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500" href="{{ route('admin.dashboard') }}">
                        Dashboard
                        <svg class="stroke-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </li>
                <li class="text-sm text-gray-800">Activity Log</li>
            </ol>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        {{-- Filters --}}
        <div class="flex flex-wrap gap-3 px-4 py-4 border-b border-gray-100">
            <div class="relative flex-1 min-w-48">
                <input wire:model.live.debounce="search" type="text" placeholder="Search description or subject..."
                    class="w-full rounded border-gray-300 px-3 py-2 text-sm shadow-sm pr-8" />
                <span class="absolute inset-y-0 right-2 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
            </div>
            <select wire:model.live="filterEvent" class="rounded border-gray-300 px-3 py-2 text-sm shadow-sm">
                <option value="">All Events</option>
                <option value="created">Created</option>
                <option value="updated">Updated</option>
                <option value="deleted">Deleted</option>
            </select>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr class="*:font-medium *:text-gray-700 *:px-4 *:py-3 *:text-left *:whitespace-nowrap">
                        <th>Event</th>
                        <th>Description</th>
                        <th>Subject</th>
                        <th>Causer</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($logs as $log)
                        <tr class="hover:bg-gray-50 *:px-4 *:py-3 *:text-gray-700">
                            <td>
                                @php
                                    $colors = ['created' => 'bg-green-100 text-green-700', 'updated' => 'bg-blue-100 text-blue-700', 'deleted' => 'bg-red-100 text-red-700'];
                                    $color = $colors[$log->event] ?? 'bg-gray-100 text-gray-600';
                                @endphp
                                <span class="inline-flex items-center rounded px-2 py-0.5 text-xs font-medium {{ $color }}">
                                    {{ ucfirst($log->event ?? 'log') }}
                                </span>
                            </td>
                            <td class="max-w-xs truncate">{{ $log->description }}</td>
                            <td class="text-xs text-gray-500">
                                {{ $log->subject_type ? class_basename($log->subject_type) . ' #' . $log->subject_id : '—' }}
                            </td>
                            <td>
                                {{ $log->causer?->name ?? 'System' }}
                                @if($log->causer?->email)
                                    <br><span class="text-xs text-gray-400">{{ $log->causer->email }}</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap text-xs text-gray-500">
                                {{ $log->created_at->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center gap-2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <span class="text-sm">No activity logs found</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($logs->hasPages())
            <div class="px-4 py-3 border-t border-gray-100">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
</div>
