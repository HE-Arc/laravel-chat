<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-light bg-faded">
        <div class="container">
        <a href="{{ url('/') }}">
            <h1 class="navbar-brand mb-0">{{ config('app.name', 'Laravel') }}</h1>
        </a>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav float-xs-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ url('/register') }}">Register</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" id="supportedContentDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
                        <form class="form-inline" id="logout-form" action="{{ url('/logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="dropdown-item">
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
            @endif
        </ul>
        </div>
    </nav>

    <main>
    @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('socket.io/socket.io.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
