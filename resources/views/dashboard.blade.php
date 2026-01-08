@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-8">
        <section class="rounded-3xl border border-primary-100 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div class="text-sm font-semibold tracking-wide text-muted">Dein Onboarding</div>
                    <h1 class="mt-1 text-3xl font-black tracking-tight">
                        Willkommen, {{ $displayName }}
                    </h1>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-muted">
                        Wähle ein Modul aus. Für die Demo ist nur <span class="font-semibold text-ink">Grundlagen &amp; Compliance</span>
                        aktiv – die anderen Module sind sichtbar, aber noch gesperrt.
                    </p>
                </div>

                <div class="mt-4 flex items-center gap-2 sm:mt-0">
                    <div class="rounded-2xl bg-primary-50 px-3 py-2 text-xs font-semibold text-primary-700">
                        Demo
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-5 md:grid-cols-2">
            @foreach ($modules as $module)
                @php
                    $isLocked = $module['locked'] ?? true;
                    $progress = $module['progress'] ?? ['completed' => 0, 'total' => 0, 'percent' => 0];
                @endphp

                <div
                    class="group rounded-3xl border border-primary-100 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md {{ $isLocked ? 'opacity-70' : '' }}"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2">
                                <h2 class="text-lg font-black tracking-tight">{{ $module['title'] }}</h2>
                                @if (!empty($module['badge']))
                                    <span class="rounded-xl bg-primary-50 px-2 py-1 text-xs font-semibold text-primary-700">
                                        {{ $module['badge'] }}
                                    </span>
                                @endif
                            </div>
                            <p class="mt-2 text-sm leading-6 text-muted">
                                {{ $module['description'] ?? '' }}
                            </p>
                        </div>

                        <div class="shrink-0">
                            @if ($isLocked)
                                <span class="inline-flex items-center gap-2 rounded-2xl bg-gray-100 px-3 py-2 text-xs font-semibold text-gray-600">
                                    <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M7 10V8a5 5 0 0 1 10 0v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M7 10h10a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                    </svg>
                                    Gesperrt
                                </span>
                            @else
                                <span class="inline-flex items-center gap-2 rounded-2xl bg-primary-50 px-3 py-2 text-xs font-semibold text-primary-700">
                                    Aktiv
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="flex items-center justify-between gap-3 text-xs font-semibold text-muted">
                            <span>Fortschritt</span>
                            @if (($progress['total'] ?? 0) > 0)
                                <span>{{ $progress['completed'] }} / {{ $progress['total'] }}</span>
                            @else
                                <span>—</span>
                            @endif
                        </div>

                        <div class="mt-2 h-2 w-full rounded-full bg-primary-100">
                            <div
                                class="h-2 rounded-full {{ $isLocked ? 'bg-gray-300' : 'bg-primary-500' }}"
                                style="width: {{ (int) ($progress['percent'] ?? 0) }}%;"
                            ></div>
                        </div>

                        <div class="mt-5 flex items-center justify-between gap-3">
                            <div class="text-xs text-muted">
                                {{ $module['estimated_time'] ?? 'Bald verfügbar' }}
                            </div>

                            @if (! $isLocked && ! empty($module['href']))
                                <a
                                    href="{{ $module['href'] }}"
                                    class="inline-flex items-center justify-center rounded-2xl bg-primary-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-500/20"
                                >
                                    Starten
                                </a>
                            @else
                                <button
                                    type="button"
                                    class="inline-flex cursor-not-allowed items-center justify-center rounded-2xl bg-gray-200 px-4 py-2.5 text-sm font-bold text-gray-500"
                                    disabled
                                >
                                    Coming soon
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection

