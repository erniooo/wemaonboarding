@extends('layouts.app')

@section('content')
    @php
        $activeKey = $activeLesson['key'] ?? null;
        $lessonKeys = array_values(array_filter(array_map(fn ($l) => $l['key'] ?? null, $lessons), 'is_string'));
        $activeIndex = is_string($activeKey) ? array_search($activeKey, $lessonKeys, true) : false;
        $prevKey = ($activeIndex !== false && $activeIndex > 0) ? $lessonKeys[$activeIndex - 1] : null;
        $nextKey = ($activeIndex !== false && isset($lessonKeys[$activeIndex + 1])) ? $lessonKeys[$activeIndex + 1] : null;
        $activeCompleted = collect($lessons)->firstWhere('key', $activeKey)['completed'] ?? false;
    @endphp

    <div class="flex flex-col gap-6">
        <section class="rounded-3xl border border-primary-100 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <a
                        href="{{ route('dashboard') }}"
                        class="inline-flex items-center gap-2 rounded-2xl bg-primary-50 px-3 py-2 text-xs font-semibold text-primary-700 transition hover:bg-primary-100"
                    >
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M15 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Dashboard
                    </a>

                    <div class="mt-4 text-sm font-semibold tracking-wide text-muted">Modul</div>
                    <h1 class="mt-1 text-3xl font-black tracking-tight">{{ $module['title'] ?? 'HR & Benefits' }}</h1>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-muted">
                        {{ $module['description'] ?? '' }}
                    </p>
                </div>

                <div class="shrink-0 rounded-3xl border border-primary-100 bg-primary-50 p-5">
                    <div class="text-xs font-semibold tracking-wide text-muted">Fortschritt</div>
                    <div class="mt-1 text-2xl font-black tracking-tight text-ink">
                        {{ (int) ($progress['percent'] ?? 0) }}%
                    </div>
                    <div class="mt-2 text-xs font-semibold text-muted">
                        {{ (int) ($progress['completed'] ?? 0) }} / {{ (int) ($progress['total'] ?? 0) }} Lessons
                    </div>
                    <div class="mt-3 h-2 w-56 rounded-full bg-primary-100">
                        <div class="h-2 rounded-full bg-primary-500" style="width: {{ (int) ($progress['percent'] ?? 0) }}%"></div>
                    </div>
                </div>
            </div>
        </section>

        @if (session('status'))
            <div class="rounded-2xl border border-primary-100 bg-white px-5 py-4 text-sm font-semibold text-ink shadow-sm">
                {{ session('status') }}
            </div>
        @endif

        <section class="grid gap-6 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <div class="rounded-3xl border border-primary-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-black tracking-tight">Lessons</div>
                        <div class="text-xs font-semibold text-muted">{{ $module['badge'] ?? 'Woche 1' }}</div>
                    </div>

                    <div class="mt-4 space-y-2">
                        @foreach ($lessons as $lesson)
                            @php
                                $isActive = $lesson['active'] ?? false;
                                $isCompleted = $lesson['completed'] ?? false;
                            @endphp

                            <a
                                href="{{ route('modules.hr-benefits', ['lesson' => $lesson['key']]) }}"
                                class="block rounded-2xl border px-4 py-3 transition {{ $isActive ? 'border-primary-500/30 bg-primary-50' : 'border-primary-100 bg-white hover:bg-primary-50/50' }}"
                            >
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <div class="text-sm font-bold text-ink">{{ $lesson['title'] }}</div>
                                            @if ($isCompleted)
                                                <span class="inline-flex items-center gap-1 rounded-xl bg-green-50 px-2 py-0.5 text-[11px] font-semibold text-green-700">
                                                    <svg class="size-3.5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                        <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                    Done
                                                </span>
                                            @endif
                                        </div>
                                        <div class="mt-1 text-xs font-semibold text-muted">
                                            {{ $lesson['type'] ?? 'Lesson' }} · {{ $lesson['duration'] ?? '—' }}
                                        </div>
                                    </div>

                                    <svg class="mt-1 size-4 text-muted/60" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="rounded-3xl border border-primary-100 bg-white p-7 shadow-sm">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <div class="text-xs font-semibold tracking-wide text-muted">Aktive Lesson</div>
                            <h2 class="mt-1 text-2xl font-black tracking-tight">{{ $activeLesson['title'] ?? '' }}</h2>
                            @if (! empty($activeLesson['summary']))
                                <p class="mt-2 text-sm leading-6 text-muted">{{ $activeLesson['summary'] }}</p>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('modules.hr-benefits.lessons.toggle', ['lessonKey' => $activeKey]) }}">
                            @csrf
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-2xl px-4 py-2.5 text-sm font-bold shadow-sm transition focus:outline-none focus:ring-4 focus:ring-primary-500/20 {{ $activeCompleted ? 'border border-primary-100 bg-white text-ink hover:bg-primary-50' : 'bg-primary-500 text-white hover:bg-primary-600' }}"
                            >
                                {{ $activeCompleted ? 'Als offen markieren' : 'Als erledigt markieren' }}
                            </button>
                        </form>
                    </div>

                    <div class="mt-6 space-y-6">
                        @if (! empty($activeLesson['points']) && is_array($activeLesson['points']))
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Inhalt</div>
                                <div class="mt-3 rounded-2xl border border-primary-100 bg-white p-4">
                                    <ul class="list-disc space-y-1 pl-5 text-sm leading-6 text-muted">
                                        @foreach ($activeLesson['points'] as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if (! empty($activeLesson['contacts']) && is_array($activeLesson['contacts']))
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Ansprechpartner</div>
                                <div class="mt-3 space-y-4">
                                    @foreach ($activeLesson['contacts'] as $group)
                                        @php
                                            $topic = is_array($group) ? ($group['topic'] ?? null) : null;
                                            $people = is_array($group) ? ($group['people'] ?? []) : [];
                                            $people = is_array($people) ? $people : [];
                                        @endphp

                                        <div class="rounded-2xl border border-primary-100 bg-white p-4">
                                            @if (is_string($topic) && $topic !== '')
                                                <div class="text-xs font-semibold tracking-wide text-muted">{{ $topic }}</div>
                                            @endif

                                            <div class="mt-3 grid gap-3 sm:grid-cols-2">
                                                @foreach ($people as $person)
                                                    @php
                                                        $name = is_array($person) ? ($person['name'] ?? null) : null;
                                                        $role = is_array($person) ? ($person['role'] ?? null) : null;
                                                    @endphp

                                                    <div class="rounded-2xl border border-primary-100 bg-primary-50/40 p-4">
                                                        <div class="text-sm font-bold text-ink">{{ $name }}</div>
                                                        @if (is_string($role) && $role !== '')
                                                            <div class="mt-1 text-xs font-semibold text-muted">{{ $role }}</div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (! empty($activeLesson['mail']) && is_array($activeLesson['mail']))
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Mail-Vorlage</div>
                                <p class="mt-2 text-sm leading-6 text-muted">
                                    Schnell kopieren: Empfänger & Betreff.
                                </p>
                                <div class="mt-3 rounded-2xl border border-primary-100 bg-white px-4 py-3 font-mono text-xs text-ink">
                                    <div>To: {{ $activeLesson['mail']['to'] ?? '' }}</div>
                                    <div>Betreff: {{ $activeLesson['mail']['subject_template'] ?? '' }}</div>
                                </div>
                            </div>
                        @endif

                        @if (! empty($activeLesson['links']) && is_array($activeLesson['links']))
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Links</div>
                                <div class="mt-3 space-y-2">
                                    @foreach ($activeLesson['links'] as $link)
                                        @php
                                            $label = is_array($link) ? ($link['label'] ?? null) : null;
                                            $url = is_array($link) ? ($link['url'] ?? null) : null;
                                            $url = is_string($url) ? trim($url) : null;
                                        @endphp

                                        @if (is_string($url) && filter_var($url, FILTER_VALIDATE_URL))
                                            <a
                                                href="{{ $url }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="flex items-center justify-between gap-3 rounded-2xl border border-primary-100 bg-white px-4 py-3 text-sm font-semibold text-ink transition hover:bg-primary-50"
                                            >
                                                <span>{{ $label ?? $url }}</span>
                                                <svg class="size-4 text-muted/60" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                    <path d="M14 3h7v7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10 14L21 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M21 14v7h-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3 10V3h7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3 21h7v-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (! empty($activeLesson['accordion']) && is_array($activeLesson['accordion']))
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Details</div>
                                <div class="mt-3 space-y-3">
                                    @foreach ($activeLesson['accordion'] as $item)
                                        @php
                                            $title = is_array($item) ? ($item['title'] ?? null) : null;
                                            $bullets = is_array($item) ? ($item['bullets'] ?? []) : [];
                                            $bullets = is_array($bullets) ? $bullets : [];
                                        @endphp

                                        <details class="group rounded-2xl border border-primary-100 bg-white p-4">
                                            <summary class="flex cursor-pointer list-none items-start justify-between gap-3">
                                                <span class="text-sm font-bold text-ink">{{ $title }}</span>
                                                <svg class="mt-0.5 size-4 text-muted/60 transition group-open:rotate-180" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                    <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </summary>

                                            @if (count($bullets) > 0)
                                                <div class="mt-3 text-sm leading-6 text-muted">
                                                    <ul class="list-disc space-y-1 pl-5">
                                                        @foreach ($bullets as $bullet)
                                                            <li>{{ $bullet }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </details>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (! empty($activeLesson['quiz']) && is_array($activeLesson['quiz']))
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Mini‑Quiz (Demo)</div>
                                <p class="mt-2 text-sm leading-6 text-muted">
                                    Quiz ist in dieser Demo nicht gespeichert – nutze es nur als kurze Wiederholung.
                                </p>

                                <div class="mt-4 space-y-3">
                                    @foreach ($activeLesson['quiz'] as $index => $quizItem)
                                        <div class="rounded-2xl border border-primary-100 bg-white p-4">
                                            <div class="text-sm font-bold text-ink">
                                                {{ $index + 1 }}. {{ $quizItem['question'] ?? '' }}
                                            </div>

                                            <div class="mt-3 space-y-2">
                                                @foreach (($quizItem['options'] ?? []) as $option)
                                                    <label class="flex items-start gap-2 rounded-xl bg-primary-50/40 px-3 py-2 text-sm text-muted">
                                                        <input type="radio" class="mt-0.5" disabled>
                                                        <span>{{ $option }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                            <div class="text-sm font-black tracking-tight">Noch Fragen zu dieser Lesson?</div>
                            <p class="mt-2 text-sm leading-6 text-muted">
                                Jetzt mit unserem KI Live‑Support chatten.
                            </p>
                            <button
                                type="button"
                                data-live-support-open
                                class="mt-3 inline-flex items-center justify-center rounded-2xl bg-primary-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-500/20"
                            >
                                Jetzt chatten
                            </button>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div class="text-xs font-semibold text-muted">
                                {{ $activeLesson['type'] ?? 'Lesson' }} · {{ $activeLesson['duration'] ?? '—' }}
                            </div>

                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ $prevKey ? route('modules.hr-benefits', ['lesson' => $prevKey]) : '#' }}"
                                    class="inline-flex items-center justify-center rounded-2xl border border-primary-100 bg-white px-4 py-2 text-sm font-bold text-ink shadow-sm transition hover:bg-primary-50 {{ $prevKey ? '' : 'pointer-events-none opacity-40' }}"
                                >
                                    Zurück
                                </a>
                                <a
                                    href="{{ $nextKey ? route('modules.hr-benefits', ['lesson' => $nextKey]) : '#' }}"
                                    class="inline-flex items-center justify-center rounded-2xl bg-primary-500 px-4 py-2 text-sm font-bold text-white shadow-sm transition hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-500/20 {{ $nextKey ? '' : 'pointer-events-none opacity-40' }}"
                                >
                                    Nächste Lesson
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

