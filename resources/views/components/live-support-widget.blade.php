@php
    $avatarUrl = config('onboarding.liveavatar.url');
@endphp

@if (!empty($avatarUrl))
    <div id="live-support-widget" class="fixed bottom-6 right-6 z-[100] flex flex-col items-end gap-3" data-avatar-url="{{ $avatarUrl }}">
        {{-- Chat Window --}}
        <div
            id="live-support-window"
            class="hidden flex-col overflow-hidden rounded-3xl border border-primary-100 bg-white shadow-2xl transition-all duration-300 ease-out"
            data-state="closed"
            data-expanded="false"
        >
            {{-- Header --}}
            <div id="live-support-header" class="flex shrink-0 items-center justify-between border-b border-primary-100 bg-primary-50 px-4 py-3">
                <div class="flex items-center gap-2">
                    <div class="flex h-2 w-2 rounded-full bg-green-500 animate-pulse"></div>
                    <span class="text-sm font-bold text-ink">KI Live‑Support</span>
                </div>
                <div class="flex items-center gap-1">
                    {{-- Close Button --}}
                    <button
                        id="live-support-close-btn"
                        type="button"
                        class="rounded-xl p-2 text-muted transition hover:bg-primary-100 hover:text-ink"
                        title="Schließen"
                    >
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Iframe Container --}}
            <div id="live-support-iframe-container" class="relative flex-1 overflow-hidden bg-white">
                <iframe
                    id="live-support-iframe"
                    src="about:blank"
                    class="h-full w-full border-0"
                    allow="microphone"
                    referrerpolicy="strict-origin-when-cross-origin"
                    title="Live Support Avatar"
                ></iframe>
            </div>
        </div>

        {{-- Floating Button --}}
        <button
            id="live-support-toggle-btn"
            type="button"
            class="group flex items-center gap-2 rounded-full bg-primary-500 px-5 py-3 text-sm font-bold text-white shadow-lg transition-all duration-200 hover:bg-primary-600 hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary-500/30"
        >
            {{-- Headset Icon --}}
            <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M3 18v-6a9 9 0 0118 0v6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>KI Live‑Support</span>
            {{-- Pulse indicator --}}
            <span class="flex h-2 w-2 rounded-full bg-white animate-pulse"></span>
        </button>
    </div>
@endif
