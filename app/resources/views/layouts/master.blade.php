<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Big+Shoulders+Stencil+Display&family=Dela+Gothic+One&family=Jomhuria&family=Lobster&family=Lobster+Two:ital@1&family=Open+Sans&family=Oswald&family=Poppins&family=Roboto&family=Teko&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="{{ url('images/favicon.png') }}"/>
    <link href="{{ url('fontawesome/css/all.css') }}" rel="stylesheet">

    <style>
        .title {
            color: #e3d222;
            font-size: 150px;
            font-family: 'Lobster', cursive;
        }

        .subtitle {
            color: white;
            font-size: 50px;
            font-family: 'Oswald', sans-serif;
        }

        .paragraphs {
            color: white;
            font-size: 16px;
        }

        .cursive {
            font-family: 'Lobster', cursive;
        }

        .sans {
            font-family: 'Oswald', sans-serif;
        }

        .popps {
            font-family: 'Poppins', sans-serif;
        }

        .nav-link {
            color: rgba(255, 255, 255, .55);;
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
        }

        .navbar-expand-md .navbar-nav .nav-link {
            padding-right: .8rem;
            padding-left: .8rem;
        }

        .nav-link:focus, .nav-link:hover {
            color: #c9c9c9;
        }

        .hero-button {
            color: white;
            background-color: transparent;
            border-color: white;
            border-radius: 50px;
        }

        .hero-button:hover {
            color: white;
            background-color: rgba(229, 229, 229, 0.23);
            border-color: rgba(255, 255, 255, 0);
        }

        .landing {
            min-height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.80), rgba(0, 0, 0, 0.80)), url('{{ url('images/'. $image->content) }}');
            /*background: url('images/bg1.jpg');*/
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .dropdown-menu.show {
            background: rgba(0, 0, 0, 0.34) !important;
        }

        .dropdown-item {
            color: white;
            font-family: 'Oswald', sans-serif;
        }

        .dropdown-item.active, .dropdown-item:active {
            color: black;
            text-decoration: none;
            background-color: white;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                padding-left: 20px;
                background: rgba(0, 0, 0, 0.58);
            }

            .landing {
                height: unset;
            }

            .title {
                font-size: 80px;
                line-height: 100%;
            }

            .center-on-md {
                text-align: center;
            }

            .welcome-text {
                height: 100vh
            }
        }

        @media (max-width: 1199.98px) {
            .landing {
                height: unset;
            }

            .title {
                font-size: 120px;
                line-height: 100%;
            }

            .welcome-text {
                height: 100vh
            }

            .hero-text {
                color: #525252;
                font-size: 30px;
            }
        }

        @media (max-width: 575.98px) {
            .landing {
                height: unset;
            }

            .title {
                font-size: 50px;
                line-height: 100%;
            }

            .welcome-text {
                height: 100vh
            }

            .hero-text {
                color: #525252;
                font-size: 18px;
            }
        }

    </style>
    @yield("css")

    <title>@yield("title")</title>
</head>
<body>
<nav class="navbar fixed-top navbar-dark navbar-expand-md">
    <div class="container" id="nav">
        <a class="navbar-brand" href="{{ url("/") }}">
            <img src="{{ url('images/logo.png') }}" alt="" height="80">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dining-and-buffet') }}">Dining & Buffet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
            <ul class="navbar-nav">
                @guest('user')
                    <li class="nav-item dropdown">
                        <a class="nav-link btn hero-button" href="{{ url('join') }}"><b>Login / Register</b></a>
                    </li>
                @endguest
                @if (Auth::guard("user")->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown">{{ Auth::guard("user")->user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ url('history') }}">History</a></li>
                            <li><a class="dropdown-item" href="{{ url('update') }}">Update Profile</a></li>
                            <li><a class="dropdown-item" href="{{ url("logout") }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield("body")

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{ url("bootstrap/js/bootstrap.bundle.min.js") }}"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src="{{ url("bootstrap/js/jquery.min.js") }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ url("fontawesome/js/all.js") }}"></script>
@yield("js")
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            console.log(scroll)
            if (scroll == 0) {
                $(".fixed-top").css("background-color", "rgba(255,255,255,0)");
            }
            else if(scroll + "px" > $(".landing").css("height"))
            {
                $(".fixed-top").css("background-color", "rgba(0,0,0,0.62)");
            }
        })
    })
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->
</body>
</html>
