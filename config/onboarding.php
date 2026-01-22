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
                    'type' => 'Kurzprofil',
                    'duration' => '5 Min',
                    'summary' => 'Kurzprofil, Produktwelt und Kennzahlen auf einen Blick.',
                    'points' => [
                        'Integrierte BSS/OSS Plattform.',
                        '2 Produktsäulen: FTTH und AAX.',
                        'Ca. 60 Mitarbeitende.',
                        'Rund 700 km Glasfaserinfrastruktur.',
                        'Ca. 50.000 Endkunden und mehr als 27 Stadtwerke.',
                        'Hauptsitz: Naila (Oberfranken).',
                        '„Stark in der Region. Nah bei Ihnen.“',
                        'Mission: IT‑Systemhaus der Zukunft mit maßgeschneiderten Produktwelten „powered by AAX“.',
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
            'key' => 'hr-benefits',
            'title' => 'HR & Benefits',
            'badge' => 'Woche 1',
            'description' => 'Ansprechpartner, Prozesse und Benefits – damit du schnell handlungsfähig bist.',
            'locked' => false,
            'estimated_time' => 'ca. 30–45 Min',
            'lessons' => [
                [
                    'key' => 'hr-intro',
                    'title' => 'Willkommen bei HR',
                    'type' => 'Überblick',
                    'duration' => '2 Min',
                    'summary' => 'Die wichtigsten HR-Themen, Tools und Kontaktpunkte für deinen Start.',
                    'points' => [
                        'Dieses Modul bündelt Ansprechpartner, Prozesse (FIORI, AU, Dienstreisen) und Benefits.',
                        'Nutze die Lessons als Nachschlagewerk – du kannst jederzeit zurückspringen.',
                    ],
                ],
                [
                    'key' => 'hr-contacts',
                    'title' => 'HR Ansprechpartner',
                    'type' => 'Kontakte',
                    'duration' => '3 Min',
                    'summary' => 'Wer hilft dir bei welchen HR-Themen?',
                    'contacts' => [
                        [
                            'topic' => 'HR-Leitung & Personalmanagement',
                            'people' => [
                                ['name' => 'Christian Tennert', 'role' => 'Personalleiter'],
                                ['name' => 'Carolin Finke', 'role' => 'Koordinatorin Personalmanagement'],
                            ],
                        ],
                        [
                            'topic' => 'HR-Grundsätze / Arbeitsrecht / Recruiting',
                            'people' => [
                                ['name' => 'Vivien Bauermeister', 'role' => 'Gruppenleiterin HR-Grundsätze & Recruiting / stellv. Personalleitung'],
                                ['name' => 'Marleen Seiffert', 'role' => 'Personalreferentin'],
                                ['name' => 'Vanessa Scheel', 'role' => 'Sachbearbeiterin HR-Grundsätze & Recruiting'],
                            ],
                        ],
                        [
                            'topic' => 'Entgeltabrechnung',
                            'people' => [
                                ['name' => 'Vivien Schissler', 'role' => 'Gruppenleiterin Personalbetreuung & -steuerung'],
                                ['name' => 'Michelle Meier', 'role' => 'Sachbearbeiterin Personalbetreuung'],
                            ],
                        ],
                        [
                            'topic' => 'Personalentwicklung / Weiterbildung',
                            'people' => [
                                ['name' => 'Ullika Wilcke-Kuhnt', 'role' => 'Gruppenleiterin Personalentwicklung & -bindung'],
                                ['name' => 'Annemarie Lahs', 'role' => 'Sachbearbeiterin Personalentwicklung & -bindung'],
                            ],
                        ],
                    ],
                    'points' => [
                        'Bei Fragen: gern direkt an die passenden Ansprechpartner wenden.',
                    ],
                ],
                [
                    'key' => 'fiori',
                    'title' => 'HR-System FIORI (SAP)',
                    'type' => 'How‑To',
                    'duration' => '5 Min',
                    'summary' => 'Adress-/Bankdaten, Zeiterfassung, Entgeltunterlagen und Abwesenheiten in einem System.',
                    'points' => [
                        'In FIORI kannst du u. a. Adress- und Bankdaten pflegen, Zeiten erfassen, Entgelt-Unterlagen abrufen und Abwesenheiten beantragen.',
                        'Du findest FIORI im Intranet „Kiek‑IN“ unter Apps → Mitarbeiterverwaltung.',
                        'Zum Einstieg gibt es ein Handbuch zur Nutzung von SAP FIORI.',
                    ],
                ],
                [
                    'key' => 'urlaub-fiori',
                    'title' => 'Urlaub beantragen',
                    'type' => 'How‑To',
                    'duration' => '3 Min',
                    'summary' => 'Urlaubsanträge laufen über FIORI.',
                    'points' => [
                        'Alle Urlaubstage bitte über FIORI einstellen.',
                        'Urlaubsplanung erfolgt in Absprache mit Führungskraft und Team (betriebliche Erfordernisse beachten).',
                    ],
                ],
                [
                    'key' => 'au',
                    'title' => 'AU-Meldung (Krankmeldung)',
                    'type' => 'Checkliste',
                    'duration' => '5 Min',
                    'summary' => 'So meldest du Arbeitsunfähigkeit korrekt und vollständig.',
                    'points' => [
                        'Arbeitsunfähigkeit unverzüglich melden (Fachbereich/Führungskraft und Personalabteilung).',
                        'Meldung an die Personalabteilung per E‑Mail an kpb@wemag.com mit Betreff: „Arbeitsunfähigkeitsbescheinigung vom tt.mm.jjjj bis tt.mm.jjjj“.',
                        'Arbeitsunfähigkeitsbescheinigung ab dem 4. Krankheitstag erforderlich.',
                        'Privatversichert: aktuell keine eAU – AU weiterhin in Papierform einreichen.',
                        'Sonderfälle: Krankheit im Urlaub (AU ab 1. Tag), Erkrankung des Kindes (Bescheinigung ab 1. Tag), Ausland/Kur/Beschäftigungsverbot ebenfalls per AU nachweisen.',
                    ],
                    'mail' => [
                        'to' => 'kpb@wemag.com',
                        'subject_template' => 'Arbeitsunfähigkeitsbescheinigung vom tt.mm.jjjj bis tt.mm.jjjj',
                    ],
                ],
                [
                    'key' => 'dienstreisen',
                    'title' => 'Dienstreisen beantragen (Bizagi)',
                    'type' => 'How‑To',
                    'duration' => '4 Min',
                    'summary' => 'Dienstreisen werden über Bizagi beantragt.',
                    'points' => [
                        'Bizagi findest du im Intranet „Kiek‑In“ unter Apps → Zentrale Anwendungen.',
                        'Für den Ablauf gibt es ein Anleitungsvideo (Link in dieser Lesson).',
                    ],
                    'links' => [
                        [
                            'label' => 'Anleitungsvideo: Dienstreisen (YouTube)',
                            'url' => 'https://www.youtube.com/watch?v=WRWLsOWgn6k',
                        ],
                    ],
                ],
                [
                    'key' => 'lernbar',
                    'title' => 'WEMAG Lernbar',
                    'type' => 'Lernen',
                    'duration' => '3 Min',
                    'summary' => 'Interne Weiterbildung über die digitale Lernplattform.',
                    'points' => [
                        'Digitale Lernplattform mit vielfältigen eTrainings – speziell für die Energiebranche.',
                        'Richtet sich an alle Mitarbeiterinnen und Mitarbeiter.',
                        'URL: wemag-lernbar.de',
                        'Basiert auf dem Campus One.',
                    ],
                    'links' => [
                        [
                            'label' => 'WEMAG Lernbar öffnen',
                            'url' => 'https://wemag-lernbar.de',
                        ],
                    ],
                ],
                [
                    'key' => 'benefits',
                    'title' => 'Regelungen & Benefits (Überblick)',
                    'type' => 'Übersicht',
                    'duration' => '10 Min',
                    'summary' => 'Die wichtigsten Regelungen und Benefits kompakt.',
                    'accordion' => [
                        [
                            'title' => 'Mobiles Arbeiten (BV)',
                            'bullets' => [
                                'Hybrides Arbeitsmodell: Büro + mobil (i. d. R. 3 Tage/Woche; bis zu 5 Tage mit Vereinbarung).',
                                'Kein Anspruch auf mobiles Arbeiten; Ablehnung durch Führungskraft möglich (Schlichtungsgremium bei Uneinigkeit).',
                                'Nutzung von Firmengeräten; keine Kostenübernahme für Home‑Office‑Ausstattung.',
                                'Mobiles Arbeiten nur innerhalb der BRD gestattet.',
                            ],
                        ],
                        [
                            'title' => 'Vertrauensarbeitszeit (BV)',
                            'bullets' => [
                                'Flexible Arbeitszeitgestaltung unter Berücksichtigung betrieblicher Anforderungen.',
                                'Arbeitszeitrahmen: Mo–Fr, 06:00–20:00 Uhr (individuelle Abstimmung möglich).',
                                'Servicezeiten: Team muss ausreichend besetzt/erreichbar sein.',
                                'Plus-/Minuszeiten eigenverantwortlich ausgleichen; ganztägiger Freizeitausgleich möglich.',
                                'Angeordnete Überstunden: vorherige Genehmigung (Director + BR) und gesonderte Vergütung.',
                                'Zuschläge: Wochenende 50%, Feiertage 100%, Nachtarbeit 30–40%; arbeitsfrei an Heiligabend & Silvester.',
                            ],
                        ],
                        [
                            'title' => 'Urlaub & Sonderurlaub',
                            'bullets' => [
                                'Erholungsurlaub: grundsätzlich im Kalenderjahr nehmen; Übertrag nur bei dringenden Gründen (bis 31.03. im Folgejahr).',
                                'Auf Wunsch: mind. 3 Wochen zusammenhängender Urlaub pro Jahr.',
                                'Sonderurlaub (bezahlt): eigene Eheschließung (1 Tag), Geburt eigenes Kind (1 Tag), Tod Ehepartner/eigenes Kind (2 Tage), Tod Elternteil (1 Tag).',
                                'Arbeitsvertrag: 30 Tage Urlaub bei 5‑Tage‑Woche.',
                            ],
                        ],
                        [
                            'title' => 'Krankmeldung / AU (Kurzüberblick)',
                            'bullets' => [
                                'Krankmeldung per E‑Mail; AU‑Bescheinigung ab dem 4. Krankheitstag erforderlich.',
                                'Krankheit im Urlaub: sofort melden; AU ab dem 1. Tag nötig, damit Urlaubstage gutgeschrieben werden.',
                                'Erkrankung des Kindes: ärztliche Bescheinigung ab dem 1. Krankheitstag des Kindes erforderlich.',
                            ],
                        ],
                        [
                            'title' => 'Gesundheit & Vorsorge',
                            'bullets' => [
                                'Bildschirmarbeitsbrille: Kostenübernahme mit ärztlichem Attest; Vorsorgeuntersuchungen der Augen (G37) auf Arbeitgeberkosten; Rahmenvertrag mit Fielmann (Bestellschein).',
                                'Gesundheitsvorsorge-Angebote (z. B. Grippeschutzimpfung, Diabetes‑Prophylaxe, Darmkrebsvorsorge) meist in Anlehnung an Thüga-Angebote; teilweise über CARE diagnostica.',
                            ],
                        ],
                        [
                            'title' => 'Benefits (Auszug)',
                            'bullets' => [
                                'Hansefit (Leistungstarif BEST).',
                                'JobRad / Bike‑Leasing (36 Monate).',
                                'Corporate Benefits (Thüga-Angebote).',
                                'Betriebliche Altersvorsorge & Berufsunfähigkeitsversicherung (Entgeltumwandlung + Arbeitgeberzuschuss; Abwicklung über Pension Solutions GmbH).',
                                'Kostenfreie Heißgetränke & Wasser; Geburtstag: 60 € Amazon‑Gutschein bei runden Geburtstagen.',
                                'pme Familienservice (Beratung/Vermittlung u. a. Kinderbetreuung, Home-/Eldercare, Coaching).',
                            ],
                        ],
                        [
                            'title' => 'Prämien (GF‑Beschlüsse, Auszug)',
                            'bullets' => [
                                'Dienstjubiläum: 10 Jahre 500 €, 20 Jahre 750 €, 25 Jahre 1.000 €, 30 Jahre 1.250 €, 40 Jahre 1.500 €.',
                                'Mitarbeiter werben Mitarbeiter: 4.500 € brutto nach Probezeit (Azubis 1.000 €).',
                                'Sonderzahlung Geburt: 350 €; Hochzeit: 150 €; sehr guter Abschluss (IHK/Studium): 500 €.',
                                'Mitarbeiterkonditionen digitale Infrastruktur: 50% Rabatt auf die monatliche Grundgebühr des eigengenutzten Anschlusses.',
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
