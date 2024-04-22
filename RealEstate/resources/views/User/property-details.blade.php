<!DOCTYPE html>
<html lang="en">

<head>
    <title>Homeland &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="site-loader"></div>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->

        {{-- nav bar --}}
        <div class="navbarhome">
            <div class="containertest">
                <div class="logo">
                    <h3>home</h3>
                </div>
                <div class="navhome">
                    <ul>
                        <li><a href="#">home</a></li>
                        <li><a href="/buy">Buy</a></li>
                        <li><a href="/rent">Rent</a></li>
                        <li>
                            <a href="/props" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Properties</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="#">Condo</a></li>
                                <li><a href="#">Property Land</a></li>
                                <li><a href="#">Commercial Building</a></li>
                            </ul>
                        </li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
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
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="/profile">Profile</a>
                                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="/logout" class="dropdown-item">Logout</a>


                                    </div>
                                </div>

                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- en navbar --}}

        @foreach ($props as $prop)
            @foreach ($imgs as $img)
                <div class="site-blocks-cover inner-page-cover overlay"
                    style="background-image: url({{ 'images/' . $img->url }});" @endforeach
                    data-aos="fade" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row align-items-center justify-content-center text-center">
                            <div class="col-md-10">
                                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property
                                    Details of</span>
                                <h1 class="mb-2">{{ $prop->name }}</h1>
                                <p class="mb-5"><strong
                                        class="h2 text-success font-weight-bold">{{ $prop->price . '$' }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="site-section site-section-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div>
                                <div class="slide-one-item home-slider owl-carousel">
                                    <div><img src="images/hero_bg_1.jpg" alt="Image" class="img-fluid"></div>
                                    <div><img src="images/hero_bg_2.jpg" alt="Image" class="img-fluid"></div>
                                    <div><img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid"></div>
                                </div>
                            </div>
                            <div class="bg-white property-body border-bottom border-left border-right">
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <strong class="text-success h1 mb-3">{{ $prop->price . '$' }}</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                            <li>
                                                <span class="property-specs">Beds</span>
                                                <span class="property-specs-number">{{ $prop->num_bedrooms }}</span>

                                            </li>
                                            <li>
                                                <span class="property-specs">Baths</span>
                                                <span class="property-specs-number">{{ $prop->num_bathrooms }}</span>

                                            </li>
                                            <li>
                                                <span class="property-specs">SQ FT</span>
                                                <span
                                                    class="property-specs-number">{{ $prop->size_area . 'm²' }}</span>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                        <span class="d-inline-block text-black mb-0 caption-text">Home Type</span> <br>
                                        @foreach ($props as $prop)
                                            {{-- <strong class="">{{ $propType->first()->name}}</strong> --}}
                                            <strong class="">{{ $prop->PropertyTypes->name }}</strong>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                        <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                        <strong class="d-block">{{ $prop->year_built }}</strong>
                                    </div>
                                    <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                        <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                        <strong class="d-block">$520</strong>
                                    </div>
                                </div>

                                @foreach ($props as $property)
                                    <h2 class="h4 text-black">Listed By</h2>
                                    <p>{{ $property->listedBy->name }}</p>
                                @endforeach
                                <h2 class="h4 text-black">More Info</h2>
                                <p>{{ $prop->description }}</p>


                                <div class="row no-gutters mt-5">
                                    <div class="col-12">
                                        <h2 class="h4 text-black mb-3">Gallery</h2>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_1.jpg" class="image-popup gal-item"><img
                                                src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_2.jpg" class="image-popup gal-item"><img
                                                src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_3.jpg" class="image-popup gal-item"><img
                                                src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_4.jpg" class="image-popup gal-item"><img
                                                src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_5.jpg" class="image-popup gal-item"><img
                                                src="images/img_5.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_6.jpg" class="image-popup gal-item"><img
                                                src="images/img_6.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_7.jpg" class="image-popup gal-item"><img
                                                src="images/img_7.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_8.jpg" class="image-popup gal-item"><img
                                                src="images/img_8.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_1.jpg" class="image-popup gal-item"><img
                                                src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_2.jpg" class="image-popup gal-item"><img
                                                src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_3.jpg" class="image-popup gal-item"><img
                                                src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_4.jpg" class="image-popup gal-item"><img
                                                src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4">

                            <div class="bg-white widget border rounded">

                                <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                                <form action="" class="form-contact-agent">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="phone" class="btn btn-primary"
                                            value="Send Message">
                                    </div>
                                </form>
                            </div>

                            <div class="bg-white widget border rounded">
                                <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                                <div class="px-3" style="margin-left: -15px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=&quote="
                                        class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                                    <a href="https://twitter.com/intent/tweet?text=&url="
                                        class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url="
                                        class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            {{-- props for each agent  --}}
            <div class="site-section site-section-sm bg-light">
                <div class="container">

                    <div class="row">
                        <div class="col-12">
                            <div class="site-section-title mb-5">
                                <h2>Related Properties</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        @foreach ($props as $prop)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="property-entry h-100">
                                    <a href="/details" class="property-thumbnail">

                                        <div class="offer-type-wrap">
                                            <span class="offer-type bg-danger">{{ $prop->status }}</span>

                                        </div>
                                        @foreach ($imgs as $img)
                                            <img src="{{ 'images/' . $img->url }}" alt="Image" class="img-fluid">
                                        @endforeach
                                    </a>
                                    <div class="p-4 property-body">
                                        <a href="#" class="property-favorite"><span
                                                class="icon-heart-o"></span></a>
                                        <h2 class="property-title"><a href="/details">{{ $prop->name }}</a>
                                        </h2>
                                        <span class="property-location d-block mb-3"><span
                                                class="property-icon icon-room"></span> {{ $prop->address }} , <br>

                                            {{ $prop->country }} {{ $prop->city }}</span>
                                        <strong
                                            class="property-price text-primary mb-3 d-block text-success">{{ $prop->price }}$</strong>
                                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                                            <li>
                                                <span class="property-specs">Beds</span>
                                                <span class="property-specs-number">{{ $prop->num_bedrooms }}</span>

                                            </li>
                                            <li>
                                                <span class="property-specs">Baths</span>
                                                <span class="property-specs-number">{{ $prop->num_bathrooms }}</span>

                                            </li>
                                            <li>
                                                <span class="property-specs">SQ FT</span>
                                                <span class="property-specs-number">{{ $prop->size_area . 'm2' }}
                                                </span>

                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <footer class="site-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-5">
                                        <h3 class="footer-heading mb-4">About Homeland</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur
                                            reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa?
                                            Ut
                                            veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
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
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;
                                        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | This template is made with <i
                                            class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                            href="https://colorlib.com" target="_blank">Colorlib</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>

                            </div>
                        </div>
                    </footer>

                </div>

                <script src="js/jquery-3.3.1.min.js"></script>
                <script src="js/jquery-migrate-3.0.1.min.js"></script>
                <script src="js/jquery-ui.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/owl.carousel.min.js"></script>
                <script src="js/mediaelement-and-player.min.js"></script>
                <script src="js/jquery.stellar.min.js"></script>
                <script src="js/jquery.countdown.min.js"></script>
                <script src="js/jquery.magnific-popup.min.js"></script>
                <script src="js/bootstrap-datepicker.min.js"></script>
                <script src="js/aos.js"></script>
                <script src="js/circleaudioplayer.js"></script>

                <script src="js/main.js"></script>

</body>

</html>
