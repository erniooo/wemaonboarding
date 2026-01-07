@extends('layouts.guest')

@section('content')
    <div class="w-full max-w-md">
        <div class="rounded-3xl border border-primary-100 bg-white p-8 shadow-sm">
            <div>
                <img
                    src="{{ asset('images/wemaconnect-logo.svg') }}"
                    alt="WEMA Connect"
                    class="h-9 w-auto logo-on-light"
                >
                <div class="mt-3 text-sm font-semibold tracking-wide text-muted">Onboarding Portal</div>
            </div>

            <div class="mt-6">
                <h1 class="text-2xl font-black tracking-tight">Mock Login</h1>
                <p class="mt-2 text-sm leading-6 text-muted">
                    Für die Demo reicht ein Name – du kommst immer rein. Der Name wird später im Portal angezeigt.
                </p>
            </div>

            <form class="mt-6 space-y-4" method="POST" action="{{ route('login.store') }}">
                @csrf

                <div>
                    <label for="name" class="text-sm font-semibold text-ink">Dein Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $suggestedName ?? '') }}"
                        autocomplete="name"
                        class="mt-2 w-full rounded-2xl border border-primary-100 bg-white px-4 py-3 text-base shadow-sm outline-none transition placeholder:text-muted/60 focus:border-primary-500/40 focus:ring-4 focus:ring-primary-500/10"
                        placeholder="z.B. Alex"
                        required
                    >
                    @error('name')
                        <div class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="inline-flex w-full items-center justify-center rounded-2xl bg-primary-500 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-500/20"
                >
                    Weiter ins Portal
                </button>

                <div class="text-center text-xs text-muted">
                    Tipp: Seite neu laden = neuer Zufallsname.
                </div>
            </form>
        </div>
    </div>
@endsection
