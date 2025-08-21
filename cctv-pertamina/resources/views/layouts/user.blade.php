<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'User Panel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="flex min-h-screen">
                <aside class="w-64 bg-white/90 dark:bg-gray-800/90 backdrop-blur border-r border-gray-200 dark:border-gray-700 p-4 space-y-6">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/Pertamina.png') }}" alt="Pertamina" class="h-10 w-auto" />
                        <div class="text-xs text-gray-500 dark:text-gray-400">PLATFORM</div>
                    </div>
                    <nav class="space-y-1 text-sm">
                        <a href="{{ route('user.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
                        <a href="{{ route('user.maps') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">Maps</a>
                        <a href="{{ route('user.location') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">Location</a>
                        <a href="{{ route('user.room') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">Room</a>
                        <a href="{{ route('user.cctv') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">CCTV</a>
                        <a href="{{ route('user.contact') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">Contact</a>
                        <a href="{{ route('profile') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">Theme</a>
                    </nav>
                </aside>
                <main class="flex-1 p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
    </html>

