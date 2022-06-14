<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .nav-color {
            background-color: #2B303A;
            color: #D8DBE2;
        }
    </style>

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body style="background-color: #D8DBE2">
    <!-- As a link -->
    <nav class="navbar navbar-expand-md fixed-top navbar-dark nav-color">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index">Task App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav justify-content-end">
                    @if(session('userName'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            @if(isset($user_avatar))
                            <img src="{{ $user_avatar }}" class="rounded-circle align-self-center mr-2"
                                style="width: 32px;">
                            @else
                            <i class="far fa-user-circle fa-lg rounded-circle align-self-center mr-2"
                                style="width: 32px;"></i>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h5 class="dropdown-item-text mb-0">{{ session('userName') }}</h5>
                            <p class="dropdown-item-text text-muted mb-0">{{ session('userEmail') }}</p>
                            <div class="dropdown-divider"></div>
                            <a href="/signout" class="dropdown-item">Sign Out</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="/signin" class="nav-link">Sign In</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 6rem">
        @yield("content")
    </div>
</body>

</html>