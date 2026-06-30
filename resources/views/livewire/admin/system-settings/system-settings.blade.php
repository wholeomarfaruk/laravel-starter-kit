<div x-data x-init="$store.pageName = { name: 'System Settings', slug: 'system-settings' }">
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
                <li class="text-sm text-gray-800">System Settings</li>
            </ol>
        </nav>
    </div>

    <div class="flex gap-6">
        {{-- Sidebar Tabs --}}
        <div class="w-48 shrink-0">
            <ul class="space-y-1">
                @foreach (['general' => 'General', 'mail' => 'Mail', 'social' => 'Social'] as $group => $label)
                    <li>
                        <button wire:click="setGroup('{{ $group }}')"
                            class="w-full text-left px-3 py-2 rounded text-sm font-medium transition-colors
                            {{ $activeGroup === $group ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                            {{ $label }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Settings Panel --}}
        <div class="flex-1 bg-white rounded-lg p-6 shadow-sm">
            <form wire:submit.prevent="save" class="space-y-5">

                {{-- General --}}
                @if ($activeGroup === 'general')
                    <h2 class="text-base font-semibold text-gray-800 border-b pb-2">General Settings</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Site Name <span class="text-red-500">*</span></label>
                            <input wire:model="site_name" type="text" class="w-full rounded border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border" />
                            @error('site_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Site Tagline</label>
                            <input wire:model="site_tagline" type="text" class="w-full rounded border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
                            <input wire:model="timezone" type="text" placeholder="UTC" class="w-full rounded border-gray-300 text-sm p-2 border" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date Format</label>
                            <input wire:model="date_format" type="text" placeholder="d-m-Y" class="w-full rounded border-gray-300 text-sm p-2 border" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Default Currency</label>
                            <input wire:model="currency" type="text" placeholder="USD" class="w-full rounded border-gray-300 text-sm p-2 border" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Currency Symbol</label>
                            <input wire:model="currency_symbol" type="text" placeholder="$" class="w-full rounded border-gray-300 text-sm p-2 border" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Default Language</label>
                            <input wire:model="language" type="text" placeholder="en" class="w-full rounded border-gray-300 text-sm p-2 border" />
                        </div>
                    </div>
                @endif

                {{-- Mail --}}
                @if ($activeGroup === 'mail')
                    <h2 class="text-base font-semibold text-gray-800 border-b pb-2">Mail Settings</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">From Name <span class="text-red-500">*</span></label>
                            <input wire:model="mail_from_name" type="text" class="w-full rounded border-gray-300 text-sm p-2 border" />
                            @error('mail_from_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">From Address <span class="text-red-500">*</span></label>
                            <input wire:model="mail_from_address" type="email" class="w-full rounded border-gray-300 text-sm p-2 border" />
                            @error('mail_from_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                @endif

                {{-- Social --}}
                @if ($activeGroup === 'social')
                    <h2 class="text-base font-semibold text-gray-800 border-b pb-2">Social Links</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach (['facebook' => 'Facebook', 'twitter' => 'Twitter / X', 'instagram' => 'Instagram', 'linkedin' => 'LinkedIn'] as $field => $label)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
                                <input wire:model="{{ $field }}" type="url" placeholder="https://" class="w-full rounded border-gray-300 text-sm p-2 border" />
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="pt-2">
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded bg-gray-900 px-5 py-2 text-sm font-medium text-white hover:bg-gray-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                        </svg>
                        Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
