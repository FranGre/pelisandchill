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

<body class="font-sans antialiased">
    <div
        class="min-h-screen 
    py-6 px-6
    sm:py-10 sm:px-14
    md:py-12 md:px-20
    lg:py-12 lg:px-36
    bg-gray-100 
    dark:bg-neutral-900 dark:text-slate-100">
        <!-- Page Content -->
        <main>
            <div
                class="grid grid-cols-1 gap-6
            sm:grid-cols-2 sm:gap-10
            md:grid-cols-3 md:gap-12
            lg:grid-cols-4 lg:gap-20">
                @foreach ($films as $film)
                    <a href="{{ route('film.show', ['film_id' => $film->id]) }}" wire:navigate>
                        <div
                            class="items-center text-center rounded border border-black shadow
                        bg-gray-300
                        dark:bg-neutral-800">
                            <img src="{{ asset('storage/' . $film->poster) }}" alt="Cover {{ $film->title }}"
                                class="rounded">
                            <div class="p-3">
                                <h2 class="text-xl font-bold">{{ $film->title }}</h2>
                                <p class="text-left">{{ $film->director }}</p>
                                <p class="text-left">{{ $film->year }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </div>
</body>

</html>
