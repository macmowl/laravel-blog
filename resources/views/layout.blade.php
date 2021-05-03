<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Tuto Laravel</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @auth
                    <li class="nav-item {{ request()->is('feed') ? 'active' : '' }}">
                        <a class="nav-link" href="/feed">Feed</a>
                    </li>
                    <li class="nav-item {{ request()->is(auth()->user()->email) ? 'active' : '' }}">
                        <a class="nav-link" href="/{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                    </li>
                    <li class="nav-item {{ request()->is('account') ? 'active' : '' }}">
                        <a class="nav-link" href="/account">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @else
                    <li class="nav-item {{ request()->is('connection') ? 'active' : '' }}">
                        <a class="nav-link" href="/connection">Signin</a>
                    </li>
                    <li class="nav-item {{ request()->is('signup') ? 'active' : '' }}">
                        <a class="nav-link" href="/signup">Signup</a>
                    </li>
                @endauth
                
            </ul>
        </div>
    </nav>
    <div class="container">
        
        @yield('content')
        <div class="fixed-bottom">
            @include('flash::message')
        </div>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>
</html>