<!doctype html>
<html lang="de" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'WEMA Onboarding' }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

        @if (! app()->environment('testing'))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="min-h-full bg-background text-ink antialiased">
        <main class="mx-auto flex min-h-screen max-w-6xl items-center justify-center px-6 py-10">
            @yield('content')
        </main>
    </body>
</html>
