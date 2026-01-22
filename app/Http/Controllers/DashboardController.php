<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $completedByModule = $request->session()->get('onboarding.completed', []);

        $modules = array_map(function (array $module) use ($completedByModule) {
            $moduleKey = $module['key'];
            $lessons = $module['lessons'] ?? [];
            $lessonKeys = array_map(fn (array $lesson) => $lesson['key'], $lessons);

            $completedLessonKeys = $completedByModule[$moduleKey] ?? [];
            $completedCount = count(array_intersect($lessonKeys, $completedLessonKeys));
            $totalCount = count($lessonKeys);
            $percent = $totalCount > 0 ? (int) round(($completedCount / $totalCount) * 100) : 0;

            $module['progress'] = [
                'completed' => $completedCount,
                'total' => $totalCount,
                'percent' => $percent,
            ];

            $module['href'] = null;
            if (! ($module['locked'] ?? true)) {
                $module['href'] = match ($moduleKey) {
                    'grundlagen' => route('modules.grundlagen'),
                    'hr-benefits' => route('modules.hr-benefits'),
                    default => null,
                };
            }

            return $module;
        }, config('onboarding.modules', []));

        return view('dashboard', [
            'displayName' => $request->session()->get('display_name'),
            'modules' => $modules,
        ]);
    }
}
