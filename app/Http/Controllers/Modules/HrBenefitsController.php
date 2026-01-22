<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HrBenefitsController extends Controller
{
    public function show(Request $request): View
    {
        $module = collect(config('onboarding.modules', []))->firstWhere('key', 'hr-benefits');
        abort_unless(is_array($module), 404);

        $lessons = $module['lessons'] ?? [];
        abort_unless(is_array($lessons) && count($lessons) > 0, 404);

        $lessonIndex = [];
        foreach ($lessons as $lesson) {
            if (is_array($lesson) && isset($lesson['key'])) {
                $lessonIndex[$lesson['key']] = $lesson;
            }
        }

        $activeLessonKey = $request->query('lesson');
        $activeLesson = (is_string($activeLessonKey) && isset($lessonIndex[$activeLessonKey]))
            ? $lessonIndex[$activeLessonKey]
            : $lessons[0];

        $completedLessonKeys = $request->session()->get("onboarding.completed.{$module['key']}", []);
        $completedLessonKeys = is_array($completedLessonKeys) ? $completedLessonKeys : [];
        $completedLessonKeys = array_values(array_unique(array_filter($completedLessonKeys, 'is_string')));
        $completedSet = array_fill_keys($completedLessonKeys, true);

        $lessons = array_map(function (array $lesson) use ($completedSet, $activeLesson) {
            $key = $lesson['key'] ?? null;
            $lesson['completed'] = is_string($key) && isset($completedSet[$key]);
            $lesson['active'] = ($key === ($activeLesson['key'] ?? null));

            return $lesson;
        }, $lessons);

        $lessonKeys = array_map(fn (array $lesson) => $lesson['key'] ?? '', $lessons);
        $lessonKeys = array_values(array_filter($lessonKeys, 'is_string'));

        $completedCount = count(array_intersect($lessonKeys, $completedLessonKeys));
        $totalCount = count($lessonKeys);
        $percent = $totalCount > 0 ? (int) round(($completedCount / $totalCount) * 100) : 0;

        $heygenVideoUrl = $this->validatedEmbedUrl(config('onboarding.heygen.video_url'));
        $heygenAvatarUrl = $this->validatedEmbedUrl(config('onboarding.heygen.avatar_url'));
        $liveavatarUrl = $this->validatedEmbedUrl(config('onboarding.liveavatar.url'));

        return view('modules.hr-benefits', [
            'module' => $module,
            'lessons' => $lessons,
            'activeLesson' => $activeLesson,
            'progress' => [
                'completed' => $completedCount,
                'total' => $totalCount,
                'percent' => $percent,
            ],
            'heygen' => [
                'video_url' => $heygenVideoUrl,
                'avatar_url' => $heygenAvatarUrl,
            ],
            'liveavatar' => [
                'url' => $liveavatarUrl,
            ],
        ]);
    }

    public function toggle(Request $request, string $lessonKey): RedirectResponse
    {
        $module = collect(config('onboarding.modules', []))->firstWhere('key', 'hr-benefits');
        abort_unless(is_array($module), 404);

        $lessons = $module['lessons'] ?? [];
        abort_unless(is_array($lessons), 404);

        $validLessonKeys = array_values(array_filter(array_map(fn (array $lesson) => $lesson['key'] ?? null, $lessons), 'is_string'));
        abort_unless(in_array($lessonKey, $validLessonKeys, true), 404);

        $path = "onboarding.completed.{$module['key']}";
        $completedLessonKeys = $request->session()->get($path, []);
        $completedLessonKeys = is_array($completedLessonKeys) ? $completedLessonKeys : [];
        $completedLessonKeys = array_values(array_unique(array_filter($completedLessonKeys, 'is_string')));

        if (in_array($lessonKey, $completedLessonKeys, true)) {
            $completedLessonKeys = array_values(array_filter(
                $completedLessonKeys,
                fn (string $key) => $key !== $lessonKey
            ));
            $message = 'Lesson als offen markiert.';
        } else {
            $completedLessonKeys[] = $lessonKey;
            $message = 'Lesson als erledigt markiert.';
        }

        $request->session()->put($path, $completedLessonKeys);

        return redirect()
            ->route('modules.hr-benefits', ['lesson' => $lessonKey])
            ->with('status', $message);
    }

    private function validatedEmbedUrl(mixed $url): ?string
    {
        if (! is_string($url) || trim($url) === '') {
            return null;
        }

        $url = trim($url);

        return filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }
}

