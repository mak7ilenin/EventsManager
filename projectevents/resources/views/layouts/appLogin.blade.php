<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href='{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}' rel="stylesheet">

    <link href='{{ asset('components/js/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}'
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href='{{ asset('components/css/font-awesome/css/font-awesome.min.css') }}' rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href='{{ asset('components/css/custom.min.css') }}' rel="stylesheet">
</head>

<body class="login">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Events Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/events">Events</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/login') }}">Login <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Admin panel</a></li>
                    <div class="dropdown ms-5">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->name }} </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            <li><a class="dropdown-item" href={{ url('/profile/' . Auth::user()->id) }}>Profile</a></li>
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
    </nav>

    @yield('content')


</body>

</html>
