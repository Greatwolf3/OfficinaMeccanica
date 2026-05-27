<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OfficinaMeccanica - Sistema di Gestione</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f9fafb;
            min-height: 100vh;
        }
        .header {
            background: linear-gradient(135deg, #1e3a5f 0%, #2d5a87 50%, #3d7ab5 100%);
            color: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .logo h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .nav a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
        }
        .nav a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .nav a.btn-primary {
            background-color: white;
            color: #1e3a5f;
        }
        .nav a.btn-primary:hover {
            background-color: #e5e7eb;
        }
        .hero {
            background: linear-gradient(135deg, #1e3a5f 0%, #2d5a87 50%, #3d7ab5 100%);
            color: white;
            padding: 5rem 2rem;
            text-align: center;
        }
        .hero-content {
            max-width: 1280px;
            margin: 0 auto;
        }
        .hero h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
        }
        .hero p {
            font-size: 1.25rem;
            color: #bfdbfe;
            margin-bottom: 2rem;
            max-width: 768px;
            margin-left: auto;
            margin-right: auto;
        }
        .hero .btn {
            display: inline-block;
            background-color: white;
            color: #1e3a5f;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            font-weight: bold;
            font-size: 1.125rem;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .hero .btn:hover {
            background-color: #e5e7eb;
        }
        .features {
            padding: 5rem 2rem;
            background-color: white;
        }
        .features-content {
            max-width: 1280px;
            margin: 0 auto;
        }
        .features h3 {
            font-size: 1.875rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 3rem;
            color: #111827;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .feature-card {
            background-color: #f9fafb;
            border-radius: 0.75rem;
            padding: 2rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .feature-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }
        .feature-icon.blue { background-color: #dbeafe; color: #2563eb; }
        .feature-icon.green { background-color: #dcfce7; color: #16a34a; }
        .feature-icon.orange { background-color: #fed7aa; color: #ea580c; }
        .feature-card h4 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.75rem;
            color: #111827;
        }
        .feature-card p {
            color: #6b7280;
            line-height: 1.6;
        }
        .stats {
            padding: 5rem 2rem;
            background-color: #f9fafb;
        }
        .stats-content {
            max-width: 1280px;
            margin: 0 auto;
        }
        .stats h3 {
            font-size: 1.875rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
            color: #111827;
        }
        .stats p {
            text-align: center;
            color: #6b7280;
            margin-bottom: 3rem;
            font-size: 1.125rem;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        .stat-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .stat-card .icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .stat-card h4 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #111827;
            margin-bottom: 0.25rem;
        }
        .stat-card p {
            color: #6b7280;
            font-size: 0.875rem;
            margin: 0;
        }
        .cta {
            background: linear-gradient(135deg, #1e3a5f 0%, #2d5a87 50%, #3d7ab5 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }
        .cta-content {
            max-width: 1280px;
            margin: 0 auto;
        }
        .cta h3 {
            font-size: 1.875rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .cta p {
            color: #bfdbfe;
            margin-bottom: 2rem;
            font-size: 1.125rem;
        }
        .footer {
            background-color: #111827;
            color: white;
            padding: 2rem;
            text-align: center;
        }
        .footer p {
            color: #9ca3af;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <span style="font-size: 2.5rem;">🔧</span>
                <h1>OfficinaMeccanica</h1>
            </div>
            <nav class="nav">
                @auth
                    <a href="/admin">Dashboard</a>
                @else
                    <a href="/admin/login">Accedi</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Sistema di Gestione Officina</h2>
            <p>Gestisci clienti, veicoli e servizi in modo semplice ed efficiente. Tutto ciò che serve per la tua officina meccanica in un'unica piattaforma.</p>
            @guest
                <a href="/admin/login" class="btn">Inizia Ora</a>
            @endguest
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-content">
            <h3>Funzionalità Principali</h3>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon blue">👥</div>
                    <h4>Gestione Clienti</h4>
                    <p>Registra e gestisci tutti i tuoi clienti con informazioni complete: nome, telefono, email e indirizzo.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon green">🚗</div>
                    <h4>Gestione Veicoli</h4>
                    <p>Traccia tutti i veicoli dei tuoi clienti: marca, modello, anno e targa. Collegati ai rispettivi proprietari.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon orange">⚙️</div>
                    <h4>Gestione Servizi</h4>
                    <p>Registra tutti gli interventi effettuati: descrizione, costo e data. Monitora lo storico dei servizi per veicolo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview -->
    <section class="stats">
        <div class="stats-content">
            <h3>Dashboard Intelligente</h3>
            <p>Visualizza le statistiche della tua officina in tempo reale</p>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="icon">👥</div>
                    <h4>Clienti</h4>
                    <p>Gestione completa</p>
                </div>
                <div class="stat-card">
                    <div class="icon">🚗</div>
                    <h4>Veicoli</h4>
                    <p>Parco auto</p>
                </div>
                <div class="stat-card">
                    <div class="icon">⚙️</div>
                    <h4>Servizi</h4>
                    <p>Interventi</p>
                </div>
                <div class="stat-card">
                    <div class="icon">💰</div>
                    <h4>Ricavi</h4>
                    <p>Analisi mensile</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-content">
            <h3>Pronto a gestire la tua officina?</h3>
            <p>Inizia subito a utilizzare OfficinaMeccanica per ottimizzare il tuo lavoro.</p>
            @guest
                <a href="/admin/login" class="btn">Accedi al Pannello</a>
            @endguest
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} OfficinaMeccanica. Sistema di gestione per officine meccaniche.</p>
    </footer>
</body>
</html>
