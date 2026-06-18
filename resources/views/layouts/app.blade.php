<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'UMC App') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-white bg-[#0a0a0a] min-h-screen overflow-hidden">
        <div class="flex h-screen w-full overflow-hidden">
            <!-- Sidebar (hidden on mobile, visible on desktop) -->
            <div class="hidden md:block">
                @include('layouts.sidebar')
            </div>

            <!-- Mobile navigation (only on mobile) -->
            <div class="md:hidden">
                @include('layouts.sidebar-mobile')
            </div>

            <!-- Main scrollable panel -->
            <div class="flex-1 flex flex-col md:pl-[200px] overflow-hidden">
                <!-- Top Header -->
                @include('layouts.header')

                <!-- Main content area -->
                <main class="flex-1 overflow-y-auto mt-12 bg-[#0a0a0a]">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
