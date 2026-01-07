<?php

return [
    'heygen' => [
        'video_url' => env('HEYGEN_VIDEO_URL'),
        'avatar_url' => env('HEYGEN_AVATAR_URL'),
    ],

    'modules' => [
        [
            'key' => 'grundlagen',
            'title' => 'Grundlagen & Compliance',
            'badge' => 'Woche 1',
            'description' => 'Dein schneller Start: Orientierung, Verhalten, Sicherheit und die wichtigsten Regeln.',
            'locked' => false,
            'estimated_time' => 'ca. 45–60 Min',
            'lessons' => [
                [
                    'key' => 'welcome',
                    'title' => 'Willkommen & Überblick',
                    'type' => 'Video',
                    'duration' => '5 Min',
                    'summary' => 'Was dich im Portal erwartet und wie du am besten startest.',
                    'points' => [
                        'Kurzer Rundgang durch Module, Lessons und Fortschritt.',
                        'So markierst du Lessons als erledigt und behältst den Überblick.',
                        'Platzhalter für HeyGen Video/Avatar – später einfach URLs eintragen.',
                    ],
                    'embed' => 'heygen_video',
                ],
                [
                    'key' => 'company',
                    'title' => 'WEMA in 5 Minuten',
                    'type' => 'Reading',
                    'duration' => '5 Min',
                    'summary' => 'Kurzprofil, Werte, Team und Ansprechpersonen (Demo-Inhalt).',
                    'points' => [
                        'Wofür wir stehen (Werte & Zusammenarbeit).',
                        'Wer hilft dir beim Start (Ansprechpersonen/Teams).',
                        'Wo du Informationen findest (Intranet/Tools – später verlinken).',
                    ],
                ],
                [
                    'key' => 'code-of-conduct',
                    'title' => 'Code of Conduct & Compliance Basics',
                    'type' => 'Interaktiv',
                    'duration' => '10 Min',
                    'summary' => 'Wie wir zusammenarbeiten und was Compliance im Alltag bedeutet.',
                    'points' => [
                        'Respect & Professionalität im Umgang miteinander und mit Kunden.',
                        'Interessenkonflikte erkennen und transparent machen.',
                        'Meldewege: wen du ansprichst, wenn etwas nicht passt.',
                    ],
                    'embed' => 'heygen_avatar',
                ],
                [
                    'key' => 'it-security',
                    'title' => 'IT-Sicherheit: Basics',
                    'type' => 'Checkliste',
                    'duration' => '7 Min',
                    'summary' => 'Passwörter, Phishing, Geräte – die wichtigsten Do’s & Don’ts.',
                    'points' => [
                        'Starke Passwörter + idealerweise Passwortmanager.',
                        'Phishing erkennen: Links prüfen, keine Codes weitergeben.',
                        'Geräte absichern: Updates, Sperrbildschirm, sauberes WLAN.',
                    ],
                ],
                [
                    'key' => 'data-protection',
                    'title' => 'Datenschutz: Kurz & praxisnah',
                    'type' => 'Reading',
                    'duration' => '7 Min',
                    'summary' => 'Personenbezogene Daten, sichere Ablage, Meldewege.',
                    'points' => [
                        'Was sind personenbezogene Daten und wann ist Vorsicht geboten?',
                        'Sichere Ablage & Berechtigungen: „need to know“.',
                        'Vorfall melden: lieber einmal zu viel als zu spät.',
                    ],
                ],
                [
                    'key' => 'safety',
                    'title' => 'Arbeitssicherheit: Erste Schritte',
                    'type' => 'Reading',
                    'duration' => '6 Min',
                    'summary' => 'Sicher arbeiten – egal ob Büro, Homeoffice oder unterwegs.',
                    'points' => [
                        'Ergonomie: Sitzposition, Bildschirmhöhe, Pausen.',
                        'Notfälle: wichtige Kontakte/Wege (später ergänzen).',
                        'Sicherheitsbewusstsein im Alltag (auch unterwegs).',
                    ],
                ],
                [
                    'key' => 'mini-quiz',
                    'title' => 'Mini‑Quiz (Demo)',
                    'type' => 'Quiz',
                    'duration' => '5 Min',
                    'summary' => 'Ein kleiner Check: hast du die wichtigsten Punkte drauf?',
                    'points' => [
                        'Kurze Wiederholung der wichtigsten Regeln.',
                        'Perfekt, um das Modul „abzuschließen“ (Demo).',
                        'Kann später durch ein echtes Quiz ersetzt werden.',
                    ],
                ],
            ],
        ],
        [
            'key' => 'datenschutz-compliance',
            'title' => 'Datenschutz & Compliance',
            'description' => 'Vertiefung zu Datenschutz, Richtlinien und Meldewegen.',
            'locked' => true,
        ],
        [
            'key' => 'arbeitssicherheit',
            'title' => 'Arbeitssicherheit & Gesundheit',
            'description' => 'Sicheres Arbeiten, Ergonomie, Gesundheit und Notfallwege.',
            'locked' => true,
        ],
        [
            'key' => 'tools',
            'title' => 'Tools & digitale Arbeitsumgebung',
            'description' => 'Accounts, Tools, Kommunikationskanäle und Best Practices.',
            'locked' => true,
        ],
        [
            'key' => 'rollen',
            'title' => 'Rollen -& Aufgabenprofil',
            'description' => 'Deine Rolle, Erwartungen, Verantwortlichkeiten und Ziele.',
            'locked' => true,
        ],
        [
            'key' => 'kultur',
            'title' => 'Unternehmenskultur & Zusammenarbeit',
            'description' => 'Werte, Zusammenarbeit, Feedbackkultur und Meeting-Standards.',
            'locked' => true,
        ],
        [
            'key' => 'kunden-produkte',
            'title' => 'Kunden & Produkte',
            'description' => 'Kundengruppen, Produktwelt, Service-Versprechen und Qualität.',
            'locked' => true,
        ],
        [
            'key' => 'entwicklung',
            'title' => 'Persönliche Entwicklung & Lernen',
            'description' => 'Lernpfade, Ziele, Ressourcen und nächste Schritte.',
            'locked' => true,
        ],
    ],
];
