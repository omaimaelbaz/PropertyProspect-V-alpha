<!DOCTYPE html>
<html lang="zxx">
<head>

    <title> Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">

</head>
<body id="top" class="login-5-bg">

<div class="page_loader"></div>

<!-- Login 5 start -->
<div class="login-5">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 align-self-center pad-0 bg-img">
                <div class="form-section clearfix">
                    <h3>Create an account</h3>
                    <div class="btn-section clearfix">
                        <a href="/login" class="link-btn active btn-1 default-bg">Login</a>
                        <a href="/register" class="link-btn btn-2 active-bg">Register</a>
                    </div>
                    <div class="clearfix"></div>
                        <form action="/register" method="POST">

                        @csrf

                        <div class="form-group form-box">
                            <input type="name" name="name" class="input-text" placeholder="Full Name">
                        </div>
                        <div class="form-group form-box">
                            <input type="email" name="email" class="input-text" placeholder="Email Address">
                        </div>
                        <div class="form-group form-box clearfix">
                            <input type="password" name="password" class="input-text" placeholder="Password">
                        </div>
                        <div class="form-group clearfix mb-0">
                            <button type="submit" class="btn-md btn-theme float-left">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 bg-color-5 align-self-center pad-0 none-992">
                <div class="info clearfix">
                    <div class="logo-2">
                        <a href="login-5.html">
                            <img src="assets/img/logo-2.png" alt="logo">
                        </a>
                    </div>
                    <h3>Welcome to Logee</h3>
                    <div class="social-list">
                        <a href="#" class="facebook-bg">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="twitter-bg">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="google-bg">
                            <i class="fa fa-google"></i>
                        </a>
                        <a href="#" class="linkedin-bg">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 5 end -->

<!-- External JS libraries -->
<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- Custom JS Script -->

</body>
</html>
