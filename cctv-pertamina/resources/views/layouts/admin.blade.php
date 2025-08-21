<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin Panel') }}</title>

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
                        <div class="text-[10px] uppercase tracking-wider text-gray-400">Dashboard</div>
                        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                            SIGNAL ANALISTYC DATA-DATA USER ONLINE DAN OFFLINE, GEDUNG, RUANGAN, CCTV ONLINE DAN CCTV OFFLINE. HARUS BISA DI DOWNLOAD LEWAT MICROSOFT EXCEL HARUS MEMAKAI BUTTON BERWARNA
                        </a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">Table</div>
                        <a href="{{ route('admin.table.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">TABLE USER</a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">User</div>
                        <a href="{{ route('admin.user.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">USER LIST</a>
                        <a href="{{ route('admin.user.create') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">CREATE USER</a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">Maps</div>
                        <a href="{{ route('admin.maps.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">MAPS LIST</a>
                        <a href="{{ route('admin.maps.create') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">CREATE MAPS</a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">Location</div>
                        <a href="{{ route('admin.location.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">LOCATION LIST</a>
                        <a href="{{ route('admin.location.create') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">CREATE LOCATION</a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">Contact</div>
                        <a href="{{ route('admin.contact.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">CONTACT LIST</a>
                        <a href="{{ route('admin.contact.create') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">CREATE CONTACT</a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">Notification</div>
                        <a href="{{ route('admin.notification') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">NOTIFICATION</a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">Message</div>
                        <a href="{{ route('admin.message') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">MESSAGE</a>

                        <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-4">Theme</div>
                        <a href="{{ route('profile') }}" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">THEME LIGHT / DARK / SYSTEM</a>
                    </nav>
                </aside>
                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
    </html>

