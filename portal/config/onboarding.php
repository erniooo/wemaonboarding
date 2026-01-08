<?php

return [
    'heygen' => [
        'video_url' => env('HEYGEN_VIDEO_URL'),
        'avatar_url' => env('HEYGEN_AVATAR_URL'),
    ],

    'liveavatar' => [
        'url' => env('LIVEAVATAR_URL', 'https://embed.liveavatar.com/v1/2ec52c89-68df-4f67-b9c5-b62743a371f5'),
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
                        'Video kann als lokale Datei oder via HeyGen eingebunden werden.',
                    ],
                    'embed' => 'local_video',
                    'video' => 'videos/Begruessung.mp4',
                ],
                [
                    'key' => 'company',
                    'title' => 'WEMA in 5 Minuten',
                    'type' => 'Video (Platzhalter)',
                    'duration' => '5 Min',
                    'summary' => 'Kurzprofil, Werte, Team und Ansprechpersonen (Demo-Inhalt).',
                    'points' => [
                        'Wofür wir stehen (Werte & Zusammenarbeit).',
                        'Wer hilft dir beim Start (Ansprechpersonen/Teams).',
                        'Wo du Informationen findest (Intranet/Tools – später verlinken).',
                    ],
                    'embed' => 'local_video',
                    'video' => 'videos/Begruessung.mp4',
                ],
                [
                    'key' => 'code-of-conduct',
                    'title' => 'Code of Conduct & Compliance Basics',
                    'type' => 'Video (Platzhalter)',
                    'duration' => '10 Min',
                    'summary' => 'Wie wir zusammenarbeiten und was Compliance im Alltag bedeutet.',
                    'points' => [
                        'Respect & Professionalität im Umgang miteinander und mit Kunden.',
                        'Interessenkonflikte erkennen und transparent machen.',
                        'Meldewege: wen du ansprichst, wenn etwas nicht passt.',
                    ],
                    'embed' => 'local_video',
                    'video' => 'videos/Begruessung.mp4',
                ],
                [
                    'key' => 'it-security',
                    'title' => 'IT-Sicherheit: Basics',
                    'type' => 'Video (Platzhalter)',
                    'duration' => '7 Min',
                    'summary' => 'Passwörter, Phishing, Geräte – die wichtigsten Do’s & Don’ts.',
                    'points' => [
                        'Starke Passwörter + idealerweise Passwortmanager.',
                        'Phishing erkennen: Links prüfen, keine Codes weitergeben.',
                        'Geräte absichern: Updates, Sperrbildschirm, sauberes WLAN.',
                    ],
                    'embed' => 'local_video',
                    'video' => 'videos/Begruessung.mp4',
                ],
                [
                    'key' => 'data-protection',
                    'title' => 'Datenschutz: Kurz & praxisnah',
                    'type' => 'Video (Platzhalter)',
                    'duration' => '7 Min',
                    'summary' => 'Personenbezogene Daten, sichere Ablage, Meldewege.',
                    'points' => [
                        'Was sind personenbezogene Daten und wann ist Vorsicht geboten?',
                        'Sichere Ablage & Berechtigungen: „need to know“.',
                        'Vorfall melden: lieber einmal zu viel als zu spät.',
                    ],
                    'embed' => 'local_video',
                    'video' => 'videos/Begruessung.mp4',
                ],
                [
                    'key' => 'safety',
                    'title' => 'Arbeitssicherheit: Erste Schritte',
                    'type' => 'Video',
                    'duration' => '6 Min',
                    'summary' => 'Sicher arbeiten – egal ob Büro, Homeoffice oder unterwegs.',
                    'points' => [
                        'Ergonomie: Sitzposition, Bildschirmhöhe, Pausen.',
                        'Notfälle: wichtige Kontakte/Wege (später ergänzen).',
                        'Sicherheitsbewusstsein im Alltag (auch unterwegs).',
                    ],
                    'embed' => 'local_video',
                    'video' => 'videos/Arbeitssicherheit-und-Gesundheit.mp4',
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
                    'embed' => 'local_video',
                    'video' => 'videos/Begruessung.mp4',
                    'quiz' => [
                        [
                            'question' => 'Was ist der beste erste Schritt bei einer verdächtigen E‑Mail?',
                            'options' => [
                                'Anhänge öffnen, um zu prüfen was drin ist',
                                'Link anklicken und „zur Sicherheit“ das Passwort ändern',
                                'Nicht interagieren, melden (oder Rückfrage stellen) und löschen',
                                'An Kolleg:innen weiterleiten, damit sie auch gewarnt sind',
                            ],
                        ],
                        [
                            'question' => 'Was bedeutet „Need‑to‑know“ im Datenschutz-Kontext am ehesten?',
                            'options' => [
                                'Alle im Team haben Zugriff, damit es schneller geht',
                                'Zugriff nur für Personen, die es für die Aufgabe wirklich brauchen',
                                'Daten immer lokal speichern, dann ist es sicher',
                                'Passwörter im Team teilen, um Zugriff zu ermöglichen',
                            ],
                        ],
                        [
                            'question' => 'Welche Aussage passt am besten zu „Compliance im Alltag“?',
                            'options' => [
                                'Regeln gelten nur für Management oder Legal',
                                'Wenn es gut gemeint ist, sind Regeln egal',
                                'Regeln helfen, fair, sicher und verlässlich zu arbeiten',
                                'Compliance betrifft nur Verträge, nicht den Alltag',
                            ],
                        ],
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
