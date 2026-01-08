<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MockLoginController extends Controller
{
    public function show(Request $request): View
    {
        $suggestedNames = [
            'Alex',
            'Kim',
            'Sam',
            'Mila',
            'Noah',
            'Lea',
            'Emil',
            'Nina',
        ];

        return view('auth.login', [
            'suggestedName' => $suggestedNames[array_rand($suggestedNames)],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:40'],
        ]);

        $displayName = trim($validated['name']);
        if ($displayName === '') {
            $displayName = 'Demo';
        }

        $request->session()->put('display_name', $displayName);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->forget(['display_name', 'onboarding.completed']);
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

