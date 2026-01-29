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
        <header class="border-b border-primary-100/80 bg-white/70 backdrop-blur">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5">
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <img
                            src="{{ asset('images/wemaconnect-logo.svg') }}"
                            alt="WEMA Connect"
                            class="h-7 w-auto logo-on-light sm:h-8"
                        >
                    </a>
                    <div class="hidden border-l border-primary-100 pl-4 sm:block">
                        <div class="text-sm font-semibold tracking-wide text-muted">Onboarding Portal</div>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    @if (session('display_name'))
                        <div class="hidden text-sm text-muted sm:block">
                            Hallo, <span class="font-semibold text-ink">{{ session('display_name') }}</span>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="inline-flex items-center rounded-xl border border-primary-100 bg-white px-3 py-2 text-sm font-semibold text-ink shadow-sm transition hover:border-primary-500/30 hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-500/30"
                            >
                                Logout
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-6xl px-6 py-8">
            @yield('content')
        </main>

        @include('components.live-support-widget')
    </body>
</html>
