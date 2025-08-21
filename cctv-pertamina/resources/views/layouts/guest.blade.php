<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="absolute inset-0 bg-cover bg-center opacity-25 dark:opacity-20" style="background-image: url('{{ asset('images/kilang.png') }}')"></div>

            <div class="absolute top-6 right-6 z-10">
                <livewire:welcome.navigation />
            </div>

            <div class="z-10">
                <a href="/" wire:navigate>
                    <img src="{{ asset('images/Pertamina.png') }}" alt="Pertamina" class="w-24 h-auto" />
                </a>
            </div>

            <div class="z-10 w-full sm:max-w-md mt-6 px-6 py-4 bg-white/90 dark:bg-gray-800/90 backdrop-blur shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
                <div class="mt-4">
                    <a href="{{ route('oauth.google.redirect') }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
                        <svg class="w-5 h-5" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.4 0 6.4 1.2 8.8 3.2l6.6-6.6C35.9 2.3 30.3 0 24 0 14.6 0 6.5 5.4 2.6 13.2l7.7 6c1.8-5.4 6.9-9.7 13.7-9.7z"/><path fill="#34A853" d="M46.5 24.5c0-1.6-.1-3.2-.4-4.7H24v9h12.7c-.6 3-2.4 5.6-5.1 7.4l7.8 6c4.5-4.1 7.1-10.2 7.1-17.7z"/><path fill="#4A90E2" d="M10.3 28.9c-.5-1.5-.8-3.1-.8-4.9s.3-3.4.8-4.9l-7.7-6C.9 16 0 19.4 0 24s.9 8 2.6 11.9l7.7-6z"/><path fill="#FBBC05" d="M24 48c6.3 0 11.6-2.1 15.5-5.7l-7.8-6c-2.2 1.5-5 2.4-7.7 2.4-6.8 0-11.9-4.6-13.7-10l-7.7 6C6.5 42.6 14.6 48 24 48z"/></svg>
                        <span>Lanjut dengan Gmail</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
