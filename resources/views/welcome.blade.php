<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel CRM - Administration</title>

        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🏨 Hotel CRM</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Séjours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clients</a>
                </li>
            </ul>
            <span class="navbar-text text-white-50">
                Administration
            </span>
        </div>
    </nav>

    <div id="app" class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-dark">Gestion des Séjours</h1>

            <a href="#" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> + Nouveau Séjour
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-5 text-center">

                <div class="py-4">
                    <div class="mb-3 text-muted" style="font-size: 3rem;">🛏️</div>
                    <h4 class="text-muted">Aucune réservation</h4>
                    <p class="text-secondary mb-0">
                        La liste des séjours enregistrés apparaîtra ici.
                    </p>
                </div>

            </div>
        </div>

    </div>

    </body>
</html>
