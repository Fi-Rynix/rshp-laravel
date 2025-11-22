<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


    @stack('styles')
</head>
<body
    x-data="{
        page: 'dashboard',
        loaded: true,
        darkMode: JSON.parse(localStorage.getItem('darkMode')) || false,
        stickyMenu: false,
        sidebarToggle: false,
        scrollTop: false
    }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', JSON.stringify(val)))"
    :class="{ 'dark bg-gray-900': darkMode }"
>

    {{-- Wrapper --}}
    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Content --}}
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">

            {{-- Mobile overlay --}}
            @include('layouts.partials.overlay')

            {{-- Header --}}
            @include('layouts.partials.header')

            {{-- Breadcrumb --}}
            @include('layouts.partials.breadcrumb')

            {{-- Main content --}}
            <main class="p-4 md:p-6 max-w-screen-2xl mx-auto">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Alpine CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('scripts')
</body>
</html>
