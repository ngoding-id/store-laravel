<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('page_title')</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.svg" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rewards</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success nav-link px-4 text-white" href="{{ route('login') }}">Sign In</a>
                        </li>
                    @endguest
                </ul>
                @auth


                    <!-- Desktop Menu -->
                    <ul class="navbar-nav d-none d-lg-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="/images/icon-user.png" alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                                Hi, {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <a class="dropdown-item" href="/dashboard-account.html">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block mt-2" href="#">
                                <img src="/images/icon-cart-empty.svg" alt="" />
                            </a>
                        </li>
                    </ul>

                    <!-- Mobile Menu -->
                    <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Hi, {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block" href="#">
                                Cart
                            </a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="pt-4 pb-2">
                        2019 Copyright Store. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('/vendor/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('/script/navbar-scroll.js') }}"></script>
</body>

</html>
