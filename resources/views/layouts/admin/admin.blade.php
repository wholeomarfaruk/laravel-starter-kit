<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Starter Kit</title>
    @vite(['resources/sass/admin.scss', 'resources/css/admin.css', 'resources/js/admin.js'])
    @livewireStyles
    @stack('styles')
</head>

<body x-data class=" mx-auto antialiased flex justify-between">


    <!-- Mobile Menu Toggle -->
    <button @click="$store.sidebar.navOpen = !$store.sidebar.navOpen"
        class="sm:hidden absolute top-5 right-5 focus:outline-none">
        <!-- Menu Icons -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" x-bind:class="$store.sidebar.navOpen ? 'hidden' : ''"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>

        <!-- Close Menu -->
        <svg x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
            x-bind:class="$store.sidebar.navOpen ? '' : 'hidden'" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    {{-- Sidebar --}}
    @include('layouts.admin.partials.sidebar')

    {{-- Page Content --}}


    <div class="min-h-screen flex-1  w-full p-6 bg-gray-100 " comment="Page Content">

        {{ $slot }}
    </div>


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('toast', (data) => {
                Toast.fire({ icon: data[0].type, title: data[0].message });
            });
        });
    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            // Stores variable globally
            Alpine.store('sidebar', {
                full: localStorage.getItem('sidebar_full') === 'true',
                active: 'dashboard',
                navOpen: false,
            });
            Alpine.store('pageName', {
                slug: '',
                name: '',

            });
            // Creating component Dropdown
            Alpine.data('dropdown', () => ({
                open: false,
                init() {
                    // Close children when sidebar collapses
                    this.$watch('$store.sidebar.full', val => {
                        if (!val) this.open = false;
                    });
                },
                toggle(tab) {
                    this.open = !this.open;
                    Alpine.store('sidebar').active = tab;
                },
                activeClass: 'bg-gray-800 text-gray-200',
                expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                shrinkedClass: 'sm:absolute top-0 left-20 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));
            // Creating component Sub Dropdown
            Alpine.data('sub_dropdown', () => ({
                sub_open: false,
                sub_toggle() {
                    this.sub_open = !this.sub_open;
                },
                sub_expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                sub_shrinkedClass: 'sm:absolute top-0 left-28 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));
            // Creating tooltip
            Alpine.data('tooltip', () => ({
                show: false,
                visibleClass: 'block sm:absolute -top-7 sm:border border-gray-800 left-5 sm:text-sm sm:bg-gray-900 sm:px-2 sm:py-1 sm:rounded-md'
            }))

        })
    </script>
    @livewire('admin.file.media-picker')
    @livewireScripts
    @stack('scripts')
</body>

</html>
