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
                    <h1 class="mt-1 text-3xl font-black tracking-tight">{{ $module['title'] ?? 'Grundlagen & Compliance' }}</h1>
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
                                href="{{ route('modules.grundlagen', ['lesson' => $lesson['key']]) }}"
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

                        <form method="POST" action="{{ route('modules.grundlagen.lessons.toggle', ['lessonKey' => $activeKey]) }}">
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
                        @if (($activeLesson['embed'] ?? null) === 'local_video')
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Video</div>
                                <div class="mt-3 overflow-hidden rounded-2xl border border-primary-100 bg-white">
                                    @if (!empty($activeLesson['video']))
                                        <div class="aspect-video">
                                            <video
                                                class="h-full w-full"
                                                controls
                                                playsinline
                                                preload="metadata"
                                            >
                                                <source src="{{ asset($activeLesson['video']) }}" type="video/mp4">
                                            </video>
                                        </div>
                                    @else
                                        <div class="p-6 text-sm leading-6 text-muted">
                                            Video ist noch nicht hinterlegt.
                                        </div>
                                    @endif
                                </div>

                                @if (! empty($activeLesson['points']) && is_array($activeLesson['points']))
                                    <div class="mt-5 rounded-2xl border border-primary-100 bg-white p-4">
                                        <div class="text-xs font-semibold tracking-wide text-muted">Key Points</div>
                                        <ul class="mt-2 list-disc space-y-1 pl-5 text-sm leading-6 text-muted">
                                            @foreach ($activeLesson['points'] as $point)
                                                <li>{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        @elseif (($activeLesson['embed'] ?? null) === 'heygen_video')
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Video (HeyGen)</div>
                                <div class="mt-3 overflow-hidden rounded-2xl border border-primary-100 bg-white">
                                    @if (!empty($heygen['video_url']))
                                        <div class="aspect-video">
                                            <iframe
                                                src="{{ $heygen['video_url'] }}"
                                                class="h-full w-full"
                                                allow="camera; microphone; autoplay; encrypted-media; fullscreen; picture-in-picture"
                                                allowfullscreen
                                                referrerpolicy="strict-origin-when-cross-origin"
                                            ></iframe>
                                        </div>
                                    @else
                                        <div class="p-6 text-sm leading-6 text-muted">
                                            HeyGen Video ist noch nicht konfiguriert.
                                            <div class="mt-2 rounded-2xl bg-white px-4 py-3 font-mono text-xs text-ink">
                                                HEYGEN_VIDEO_URL=&quot;https://...&quot;
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @elseif (($activeLesson['embed'] ?? null) === 'heygen_avatar')
                            <div class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                                <div class="text-sm font-black tracking-tight">Interaktiver Avatar (HeyGen)</div>
                                <div class="mt-3 overflow-hidden rounded-2xl border border-primary-100 bg-white">
                                    @if (!empty($heygen['avatar_url']))
                                        <div class="aspect-[9/12]">
                                            <iframe
                                                src="{{ $heygen['avatar_url'] }}"
                                                class="h-full w-full"
                                                allow="camera; microphone; autoplay; encrypted-media; fullscreen; picture-in-picture"
                                                allowfullscreen
                                                referrerpolicy="strict-origin-when-cross-origin"
                                            ></iframe>
                                        </div>
                                    @else
                                        <div class="p-6 text-sm leading-6 text-muted">
                                            HeyGen Avatar ist noch nicht konfiguriert.
                                            <div class="mt-2 rounded-2xl bg-white px-4 py-3 font-mono text-xs text-ink">
                                                HEYGEN_AVATAR_URL=&quot;https://...&quot;
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="rounded-3xl border border-primary-100 bg-white p-5">
                                <div class="text-sm font-black tracking-tight">Inhalt (Demo)</div>
                                <div class="mt-3 space-y-3 text-sm leading-6 text-muted">
                                    <p>
                                        Diese Lesson ist bewusst „leicht“ gehalten – du kannst später Inhalte, Links, Videos oder interne Richtlinien ergänzen.
                                    </p>
                                    @if (! empty($activeLesson['points']) && is_array($activeLesson['points']))
                                        <ul class="list-disc space-y-1 pl-5">
                                            @foreach ($activeLesson['points'] as $point)
                                                <li>{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if (! empty($activeLesson['quiz']) && is_array($activeLesson['quiz']))
                            <div class="rounded-3xl border border-primary-100 bg-white p-5">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="text-sm font-black tracking-tight">Mini-Quiz (Demo)</div>
                                    <span class="rounded-xl bg-primary-50 px-2 py-1 text-xs font-semibold text-primary-700">Platzhalter</span>
                                </div>
                                <p class="mt-2 text-sm leading-6 text-muted">
                                    Demo-Inhalt: Antworten werden nicht gespeichert – nutze es nur als kurze Wiederholung.
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

                        <div id="faq" class="rounded-3xl border border-primary-100 bg-primary-50 p-5">
                            <div class="text-sm font-black tracking-tight">Fragen & Hilfe (LiveAvatar)</div>
                            <p class="mt-2 text-sm leading-6 text-muted">
                                Stell dem Avatar Fragen zum Onboarding oder zu dieser Lesson.
                            </p>

                            <div class="mt-3 overflow-hidden rounded-2xl border border-primary-100 bg-white">
                                @if (! empty($liveavatar['url']))
                                    <div class="aspect-video">
                                        <iframe
                                            src="{{ $liveavatar['url'] }}"
                                            class="h-full w-full"
                                            allow="microphone"
                                            title="LiveAvatar Embed"
                                            referrerpolicy="strict-origin-when-cross-origin"
                                        ></iframe>
                                    </div>
                                @else
                                    <div class="p-6 text-sm leading-6 text-muted">
                                        LiveAvatar ist noch nicht konfiguriert.
                                        <div class="mt-2 rounded-2xl bg-white px-4 py-3 font-mono text-xs text-ink">
                                            LIVEAVATAR_URL=&quot;https://...&quot;
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div class="text-xs font-semibold text-muted">
                                {{ $activeLesson['type'] ?? 'Lesson' }} · {{ $activeLesson['duration'] ?? '—' }}
                            </div>

                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ $prevKey ? route('modules.grundlagen', ['lesson' => $prevKey]) : '#' }}"
                                    class="inline-flex items-center justify-center rounded-2xl border border-primary-100 bg-white px-4 py-2 text-sm font-bold text-ink shadow-sm transition hover:bg-primary-50 {{ $prevKey ? '' : 'pointer-events-none opacity-40' }}"
                                >
                                    Zurück
                                </a>
                                <a
                                    href="{{ $nextKey ? route('modules.grundlagen', ['lesson' => $nextKey]) : '#' }}"
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
