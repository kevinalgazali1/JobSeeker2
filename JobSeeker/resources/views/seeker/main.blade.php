<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Vite Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
            color: #2d3748;
            margin: 0;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #ffffff;
        }

        nav {
            background-color: #007BFF;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            margin-left: 50px;
        }

        .navbar-toggler {
            border: none;
            color: #ffffff;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #dcdcdc;
        }

        .dropdown-menu {
            background-color: #007BFF;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #0056b3;
        }

        .py-4 {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8fafc;
        }

        footer {
            background-color: #007BFF;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            font-size: 0.9rem;
        }

        footer a {
            color: #dcdcdc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    Jobly<span>.</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('homeSeeker') }}">Home</a>
                                    <a class="dropdown-item" href="{{ route('seeker.job') }}">Job Post Management</a>
                                    <a class="dropdown-item" href="{{ route('seeker.applications') }}">My Application</a>
                                    <a class="dropdown-item" href="{{ route('seeker.profile') }}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Jobly. All rights reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of
                    Service</a></p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
