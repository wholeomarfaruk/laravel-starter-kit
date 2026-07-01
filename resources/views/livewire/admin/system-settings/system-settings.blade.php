<div x-data x-init="$store.pageName = { name: 'System Settings', slug: 'system-settings' }">

    {{-- ── Page Header ── --}}
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-xl font-bold text-gray-800">System Settings</h1>
            <nav class="mt-1">
                <ol class="flex items-center gap-1.5 text-sm">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600 transition">Dashboard</a></li>
                    <li class="text-gray-300">/</li>
                    <li class="text-gray-600 font-medium">System Settings</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="flex gap-6 items-start">

        {{-- ── Sidebar ── --}}
        <div class="w-56 shrink-0">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-2">
                @php
                    $navItems = [
                        'general'      => ['label' => 'General',      'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>'],
                        'mail'         => ['label' => 'Mail',          'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>'],
                        'social'       => ['label' => 'Social Links',  'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"/>'],
                        'registration' => ['label' => 'Registration',  'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/>'],
                    ];
                @endphp

                @foreach ($navItems as $group => $item)
                    <button wire:click="setGroup('{{ $group }}')" type="button"
                        class="w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                            {{ $activeGroup === $group
                                ? 'bg-indigo-600 text-white shadow-sm'
                                : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ $activeGroup === $group ? 'text-white' : 'text-gray-400' }}"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            {!! $item['icon'] !!}
                        </svg>
                        {{ $item['label'] }}
                    </button>
                @endforeach
            </div>

            {{-- Quick links --}}
            <div class="mt-4 bg-white rounded-2xl shadow-sm border border-gray-200 p-3 space-y-1">
                <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest px-2 mb-2">Quick Links</p>
                <a href="{{ route('admin.settings.countries') }}"
                    class="flex items-center gap-2 px-2 py-1.5 text-xs text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                    </svg>
                    Countries
                </a>
                <a href="{{ route('admin.settings.genders') }}"
                    class="flex items-center gap-2 px-2 py-1.5 text-xs text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                    </svg>
                    Gender List
                </a>
            </div>
        </div>

        {{-- ── Settings Panel ── --}}
        <div class="flex-1 min-w-0">
            <form wire:submit.prevent="save">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

                    {{-- ══════════════════ GENERAL ══════════════════ --}}
                    @if ($activeGroup === 'general')
                        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-indigo-100 flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-900">General Settings</h2>
                                <p class="text-xs text-gray-400">Site identity, locale and display preferences</p>
                            </div>
                        </div>

                        <div class="px-6 py-5 space-y-5">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Site Name <span class="text-red-500">*</span></label>
                                    <input wire:model="site_name" type="text" placeholder="My App"
                                        class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    @error('site_name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Tagline</label>
                                    <input wire:model="site_tagline" type="text" placeholder="Short description"
                                        class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                </div>
                            </div>

                            {{-- Branding --}}
                            <div class="border-t border-gray-100 pt-4">
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Branding</p>
                                <div class="grid grid-cols-2 gap-4">
                                    <x-media-picker-field
                                        field="site_logo"
                                        :value="$site_logo"
                                        label="Logo (Normal)"
                                        type="image"
                                        placeholder="Select logo" />
                                    <x-media-picker-field
                                        field="site_logo_black"
                                        :value="$site_logo_black"
                                        label="Logo (Black)"
                                        type="image"
                                        placeholder="Select black logo" />
                                    <x-media-picker-field
                                        field="site_logo_white"
                                        :value="$site_logo_white"
                                        label="Logo (White)"
                                        type="image"
                                        placeholder="Select white logo" />
                                    <x-media-picker-field
                                        field="site_logo_symbol"
                                        :value="$site_logo_symbol"
                                        label="Logo (Symbol / Icon)"
                                        type="image"
                                        placeholder="Select symbol/icon" />
                                    <x-media-picker-field
                                        field="site_favicon"
                                        :value="$site_favicon"
                                        label="Favicon"
                                        type="image"
                                        placeholder="Select favicon" />
                                </div>
                            </div>

                            <div class="border-t border-gray-100 pt-4">
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Locale</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Timezone</label>
                                        <input wire:model="timezone" type="text" placeholder="UTC"
                                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Date Format</label>
                                        <input wire:model="date_format" type="text" placeholder="d-m-Y"
                                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm font-mono focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Default Language</label>
                                        <input wire:model="language" type="text" placeholder="en"
                                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 pt-4">
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Currency</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Currency Code</label>
                                        <input wire:model="currency" type="text" placeholder="USD"
                                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm font-mono uppercase focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Currency Symbol</label>
                                        <input wire:model="currency_symbol" type="text" placeholder="$"
                                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- ══════════════════ MAIL ══════════════════ --}}
                    @if ($activeGroup === 'mail')
                        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-900">Mail Settings</h2>
                                <p class="text-xs text-gray-400">Configure the sender name and address for outgoing emails</p>
                            </div>
                        </div>

                        <div class="px-6 py-5 space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">From Name <span class="text-red-500">*</span></label>
                                    <input wire:model="mail_from_name" type="text" placeholder="My App"
                                        class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    @error('mail_from_name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">From Address <span class="text-red-500">*</span></label>
                                    <input wire:model="mail_from_address" type="email" placeholder="no-reply@example.com"
                                        class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    @error('mail_from_address') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="rounded-xl bg-blue-50 border border-blue-100 px-4 py-3 flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
                                </svg>
                                <p class="text-xs text-blue-700">SMTP/driver configuration is managed via <code class="bg-blue-100 px-1 rounded">.env</code> — only the sender identity is stored here.</p>
                            </div>
                        </div>
                    @endif

                    {{-- ══════════════════ SOCIAL ══════════════════ --}}
                    @if ($activeGroup === 'social')
                        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-pink-100 flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-900">Social Links</h2>
                                <p class="text-xs text-gray-400">URLs shown in site footer and contact pages</p>
                            </div>
                        </div>

                        <div class="px-6 py-5">
                            @php
                                $socialFields = [
                                    'facebook'  => ['label' => 'Facebook',    'placeholder' => 'https://facebook.com/yourpage',  'color' => 'text-blue-600'],
                                    'twitter'   => ['label' => 'Twitter / X', 'placeholder' => 'https://x.com/yourhandle',        'color' => 'text-gray-900'],
                                    'instagram' => ['label' => 'Instagram',   'placeholder' => 'https://instagram.com/yourhandle','color' => 'text-pink-600'],
                                    'linkedin'  => ['label' => 'LinkedIn',    'placeholder' => 'https://linkedin.com/company/...' ,'color' => 'text-blue-700'],
                                ];
                            @endphp
                            <div class="divide-y divide-gray-100">
                                @foreach ($socialFields as $field => $meta)
                                    <div class="flex items-center gap-4 py-3.5 first:pt-0 last:pb-0">
                                        <span class="w-28 shrink-0 text-sm font-medium text-gray-700">{{ $meta['label'] }}</span>
                                        <input wire:model="{{ $field }}" type="url" placeholder="{{ $meta['placeholder'] }}"
                                            class="flex-1 rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- ══════════════════ REGISTRATION ══════════════════ --}}
                    @if ($activeGroup === 'registration')
                        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-900">Registration Settings</h2>
                                <p class="text-xs text-gray-400">Control who can sign up and what restrictions apply</p>
                            </div>
                        </div>

                        <div class="px-6 py-5 space-y-2">
                            @php
                                $toggles = [
                                    ['field' => 'allow_registration',   'label' => 'Allow Registration',        'desc' => 'Enable or disable public user sign-up globally',                        'color' => 'emerald'],
                                    ['field' => 'restrict_by_country',  'label' => 'Restrict by Country',       'desc' => 'Only users from allowed countries can register',                         'color' => 'amber'],
                                    ['field' => 'require_email_verify', 'label' => 'Require Email Verification','desc' => 'Users must verify their email address before accessing the application',  'color' => 'blue'],
                                ];
                            @endphp

                            @foreach ($toggles as $t)
                                @php
                                    $on = $this->{$t['field']};
                                    $colors = [
                                        'emerald' => ['bg_on' => 'bg-emerald-500', 'ring' => 'ring-emerald-200', 'badge_on' => 'bg-emerald-100 text-emerald-700', 'badge_off' => 'bg-gray-100 text-gray-500'],
                                        'amber'   => ['bg_on' => 'bg-amber-500',   'ring' => 'ring-amber-200',   'badge_on' => 'bg-amber-100 text-amber-700',    'badge_off' => 'bg-gray-100 text-gray-500'],
                                        'blue'    => ['bg_on' => 'bg-blue-500',    'ring' => 'ring-blue-200',    'badge_on' => 'bg-blue-100 text-blue-700',      'badge_off' => 'bg-gray-100 text-gray-500'],
                                    ];
                                    $c = $colors[$t['color']];
                                @endphp
                                <div class="flex items-center justify-between gap-4 rounded-xl border border-gray-200 px-4 py-3.5
                                    {{ $on ? 'bg-gray-50' : 'bg-white' }}">
                                    <div class="flex items-start gap-3">
                                        <span class="inline-flex mt-0.5 text-xs font-semibold px-2 py-0.5 rounded-full {{ $on ? $c['badge_on'] : $c['badge_off'] }}">
                                            {{ $on ? 'ON' : 'OFF' }}
                                        </span>
                                        <div>
                                            <p class="text-sm font-medium text-gray-800">{{ $t['label'] }}</p>
                                            <p class="text-xs text-gray-400 mt-0.5">{{ $t['desc'] }}</p>
                                        </div>
                                    </div>
                                    <button wire:click="$toggle('{{ $t['field'] }}')" type="button"
                                        class="relative inline-flex h-6 w-11 shrink-0 items-center rounded-full transition-all focus:outline-none
                                            {{ $on ? $c['bg_on'] . ' ring-2 ' . $c['ring'] : 'bg-gray-300' }}">
                                        <span class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform
                                            {{ $on ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                    </button>
                                </div>
                            @endforeach

                            {{-- Related links --}}
                            <div class="mt-4 pt-4 border-t border-gray-100 flex flex-wrap gap-3">
                                <a href="{{ route('admin.settings.countries') }}"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                                    </svg>
                                    Manage Countries →
                                </a>
                                <a href="{{ route('admin.settings.genders') }}"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                                    </svg>
                                    Manage Genders →
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- ── Footer / Save ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                        <p class="text-xs text-gray-400">Changes are saved per section.</p>
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7l-4-4Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 3v4H9V3"/>
                            </svg>
                            Save Settings
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>
