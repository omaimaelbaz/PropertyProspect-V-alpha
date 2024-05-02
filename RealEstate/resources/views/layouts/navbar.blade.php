<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tegemmi &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fl-bigmug-line.css') }}">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    {{-- @dd(auth()->check(), auth()->check() ? auth()->user()->role_id : null); --}}
    <div class="navbarhome" id="navbarhome">
        <div class="containertest">
            <div class="logo">
                <h5>Tegemmi</h5>
            </div>
            <div class="navhome">
                <ul>
                    <li><a href="#">home</a></li>
                    <li><a href="/buy">Buy</a></li>
                    <li><a href="/rent">Rent</a></li>
                    <li><a href="/rent">Properties</a></li>

                    </li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>

                    {{-- @if(Auth::check() && Auth::user()->role_id == '2')
                    <li>
                        <a href="" class="btn btn-success">Add Listing</a>
                    </li> --}}
                    {{-- @endif --}}
                    <li class="">
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link" href="/login">Login</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="nav-link" href="/register">Register</a>
                            @endif

                        @else
                            <div class="dropdown">
                                <span class="nav-link dropdown-toggle" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </span>
                                @if(auth()->user()->role_id == 3)
                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/myprofile">Profile</a>
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>

                                    <a class="dropdown-item" href="/wishlist">wishlist</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="/logout" class="dropdown-item">Logout</a>
                                @endif





                                </div>
                            </div>

                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </div>


    @yield('content')

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <h3 class="footer-heading mb-4">About Homeland</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero
                            atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis
                            blanditiis, minima minus odio!</p>
                    </div>



                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Navigations</h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Buy</a></li>
                                <li><a href="#">Rent</a></li>
                                <li><a href="#">Properties</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Terms</a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Follow Us</h3>

                    <div>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>



                </div>

            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        Copyright &copy;<a href="">By omaima elbaz</a>
                    </p>
                </div>

            </div>
        </div>
    </footer>

    {{-- <style>
        #navbarhome{
            background: rgba(255, 255, 255, 0.60) !important;
        }
        .navhome ul li a{
            color: black !important;
        }
      </style>
      <script>
        window.addEventListener('scroll', function() {
            document.getElementById('navbarhome').style.background = "red !important";
        });
    </script> --}}
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/circleaudioplayer.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
