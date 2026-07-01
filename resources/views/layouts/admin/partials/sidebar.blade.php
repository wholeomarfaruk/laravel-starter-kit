    <div class="h-screen z-10 bg-gray-900 transition-all duration-300 space-y-2 fixed sm:sticky flex justify-around flex-col"
        x-bind:class="{
            'w-64': $store.sidebar.full,
            'w-64 sm:w-20': !$store.sidebar.full,
            'top-0 left-0': $store.sidebar.navOpen,
            'top-0 -left-64 sm:left-0': !$store.sidebar.navOpen
        }">

        @php
            $siteName      = \App\Models\Setting::get('site_name', config('app.name'), 'general');
            $logoWhite     = \App\Models\Setting::get('site_logo_white', null, 'general');
            $logoSymbol    = \App\Models\Setting::get('site_logo_symbol', null, 'general');
            $logoWhiteUrl  = $logoWhite  ? file_path($logoWhite)  : null;
            $logoSymbolUrl = $logoSymbol ? file_path($logoSymbol) : null;
            $initial       = strtoupper(mb_substr($siteName, 0, 1));
        @endphp

        <div class="relative flex items-center border-b border-white/5 h-20 shrink-0">

            <div x-show="$store.sidebar.full" x-cloak
                 x-transition:enter="transition-opacity ease-out duration-150"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="flex items-center gap-3 px-4 w-full overflow-hidden">
                @if($logoWhiteUrl)
                    <img src="{{ $logoWhiteUrl }}" alt="{{ $siteName }}"
                         class="h-14 w-full object-contain object-left">
                @else
                    <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center shrink-0 shadow-sm">
                        <span class="text-white font-black text-base leading-none select-none">{{ $initial }}</span>
                    </div>
                    <span class="text-white font-bold text-base tracking-tight truncate leading-none">{{ $siteName }}</span>
                @endif
            </div>

            <div x-show="!$store.sidebar.full" x-cloak
                 class="flex items-center justify-center w-full">
                @if($logoSymbolUrl)
                    <img src="{{ $logoSymbolUrl }}" alt="{{ $siteName }}"
                         class="w-10 h-10 object-contain">
                @else
                    <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center shadow-sm">
                        <span class="text-white font-black text-base leading-none select-none">{{ $initial }}</span>
                    </div>
                @endif
            </div>

            <button @click="$store.sidebar.full = !$store.sidebar.full; localStorage.setItem('sidebar_full', $store.sidebar.full)"
                class="hidden sm:flex items-center justify-center absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-gray-900 border border-gray-700 rounded-full shadow-md focus:outline-none cursor-pointer hover:bg-gray-800 transition">
                <svg class="h-3 w-3 text-gray-400 transition-transform duration-300"
                     :class="$store.sidebar.full ? '' : 'rotate-180'"
                     viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <div class="px-4 space-y-2">
            <div class="h-[70vh] scrollbar scrollbar-thumb-gray-900 scrollbar-thin scrollbar-track-transparent"
                :class="$store.sidebar.full ? 'overflow-y-scroll' : ''">

                <div class="mt-4 mb-1">
                    <h2 class="text-gray-500 text-md font-semibold" :class="{ 'hidden': !$store.sidebar.full }"
                        x-transition>General</h2>
                </div>

                <a href="{{ route('admin.dashboard') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.dashboard' ? 'text-gray-200 bg-gray-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <h1 x-cloak x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ? 'sm:hidden' : ''">
                        Dashboard</h1>
                </a>

                <a href="{{ route('admin.uploads') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.uploads' ? 'text-gray-200 bg-gray-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                    </svg>
                    <h1 x-cloak x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ? 'sm:hidden' : ''">
                        Uploads</h1>
                </a>

                <a href="{{ route('admin.users') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.users' ? 'text-gray-200 bg-gray-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h1 x-cloak x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ? 'sm:hidden' : ''">
                        Users</h1>
                </a>

                <div class="mt-4 mb-1">
                    <h2 class="text-gray-500 text-md font-semibold" :class="{ 'hidden': !$store.sidebar.full }"
                        x-transition>Settings</h2>
                </div>

                @php
                    $permissionsActive = in_array(Route::currentRouteName(), [
                        'admin.roles.list', 'admin.roles.create', 'admin.roles.edit', 'admin.permissions.panels'
                    ]);
                @endphp
                <div x-data="dropdown" x-init="open = {{ $permissionsActive ? 'true' : 'false' }} && $store.sidebar.full" class="relative">
                    <div @click="toggle('permissions')" x-data="tooltip" @mouseover="show = true"
                        @mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer
                        {{ $permissionsActive ? 'text-gray-200 bg-gray-800' : '' }}"
                        :class="{
                            'justify-start': $store.sidebar.full,
                            'sm:justify-center': !$store.sidebar.full
                        }">
                        <div class="relative flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                            <h1 x-cloak :class="!$store.sidebar.full ? (show ? visibleClass : 'sm:hidden') : ''">
                                Permissions
                            </h1>
                        </div>
                        <svg x-cloak :class="$store.sidebar.full ? '' : 'sm:hidden'" xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-cloak x-show="open" @click.outside="open=false"
                        :class="$store.sidebar.full ? expandedClass : shrinkedClass" class="text-gray-400 space-y-3">
                        <a href="{{ route('admin.roles.list') }}"
                            class="block hover:text-gray-200 cursor-pointer {{ in_array(Route::currentRouteName(), ['admin.roles.list', 'admin.roles.create', 'admin.roles.edit']) ? 'text-gray-200' : '' }}">
                            Roles
                        </a>
                        <a href="{{ route('admin.permissions.panels') }}"
                            class="block hover:text-gray-200 cursor-pointer {{ Route::currentRouteName() === 'admin.permissions.panels' ? 'text-gray-200' : '' }}">
                            Panels
                        </a>
                    </div>
                </div>

                <a href="{{ route('admin.activity-log') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.activity-log' ? 'text-gray-200 bg-gray-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <h1 x-cloak x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ? 'sm:hidden' : ''">
                        Activity Log</h1>
                </a>

                <a href="{{ route('admin.system-settings') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.system-settings' ? 'text-gray-200 bg-gray-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h1 x-cloak x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ? 'sm:hidden' : ''">
                        System Settings</h1>
                </a>

            </div>
        </div>

        <div>
            <hr class="border-gray-700">

            <div x-data="{ openProfile: false }" class="relative px-2 py-2">
                <div @click="openProfile = !openProfile"
                    class="flex items-center justify-between rounded-md p-2 cursor-pointer text-gray-300 hover:bg-gray-800 hover:text-white transition"
                    :class="{
                        'justify-center': !$store.sidebar.full,
                        'justify-between': $store.sidebar.full
                    }">
                    <div class="flex items-center gap-3 overflow-hidden">
                        <img src="{{ auth()->user()->profile_photo_path ? file_path(auth()->user()->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=111827&color=ffffff&bold=true' }}"
                            alt="Profile"
                            class="w-10 h-10 rounded-full object-cover border border-gray-700 shrink-0">
                        <div x-cloak x-show="$store.sidebar.full" x-transition class="min-w-0">
                            <h4 class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</h4>
                            <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <svg x-cloak x-show="$store.sidebar.full"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 text-gray-400 transition-transform"
                        :class="{ 'rotate-180': openProfile }"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <div x-cloak x-show="openProfile" x-transition
                    @click.outside="openProfile = false"
                    class="absolute bottom-16 left-2 right-2 bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden z-50">
                    <a href="{{ route('admin.profile') }}"
                        class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                        My Profile
                    </a>
                    <a href="{{ route('admin.settings') }}"
                        class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                        Account Settings
                    </a>
                    <button type="button" @click="$refs.logoutForm.submit()"
                        class="w-full text-left px-4 py-3 text-sm text-red-400 hover:bg-gray-700">
                        Logout
                    </button>
                </div>
            </div>

            <div class="px-4 py-3 flex items-center gap-2"
                :class="$store.sidebar.full ? 'justify-between' : 'sm:justify-center'">
                <span x-cloak x-show="$store.sidebar.full" class="text-xs text-gray-600">
                    {{ config('app.name') }}
                </span>
                <span class="text-xs font-mono text-gray-600">v{{ config('app.version') }}</span>
            </div>
        </div>
    </div>
