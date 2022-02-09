<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>
            @section('title')
                {{ config('app.name', 'Laravel') }}
            @show
        </title>
    </head>

    <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>

    <body>
        {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> --}}
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top border-bottom">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/storage/images/logo.png" alt="logo" style="width:150px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(App\Models\KeyboardCategory::all() as $category)
                                <a class="dropdown-item" href="{{ route('category.show', ['category' => $category->id]) }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->is_manager)
                                <a class="dropdown-item" href="{{ route('keyboard.create') }}">Add Keyboard</a>
                                <a class="dropdown-item" href="{{ route('category.index') }}">Manage Categories</a>
                            @else
                                <a class="dropdown-item" href="{{ route('transaction.cart') }}">My Cart</a>
                                <a class="dropdown-item" href="{{ route('transaction.index') }}">Transaction History</a>
                            @endif
                                <a class="dropdown-item" href="{{ route('user.password') }}">Change Password</a>
                                <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                        </div>
                    </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                        </li>
                    @endauth
                </ul>

                <span class="navbar-text ml-2">
                    {{ date("D, d-M-Y") }}
                </span>
            </div>
        </nav>


        @yield('content')

        <nav class="navbar navbar-expand-lg navbar-light mt-5">
            <span class="navbar-text mx-auto">
                Copyright &copy; 2022 by {{ config('app.name', 'Laravel') }} - Felicia Limanta (2301947281)
            </span>
        </nav>
    </body>
</html>
