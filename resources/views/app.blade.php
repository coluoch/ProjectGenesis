<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Add the Profile link -->
                @auth
                <ul class="navbar-nav justify-content-start">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patients.index') }}">View Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patients.create') }}">Add Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appointments.index') }}">View Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appointments.create') }}">Add Appointments</a>
                    </li>
                </ul>
                @endauth
            </div>
        </nav>
    
        <!-- Main content -->
        @inertia
    </body>
    
</html>
