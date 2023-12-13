<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Noa – Bootstrap 5 Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Quản trị NewPhone</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('./assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('./assets/css/icons.css') }}" rel="stylesheet" />

</head>

<body class="ltr login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="./assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto text-center">
                <a href="index.html" class="text-center">
                    <img src="../assets/images/brand/test_logo.png" class="header-brand-img" alt="">
                </a>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        <form class="login100-form validate-form" method="POST">
                            @csrf
                            <span class="login100-form-title">
                                Login
                            </span>
                            <div class="wrap-input100 validate-input"
                                data-bs-validate = "Valid email is required: ex@abc.xyz">
                                <input class="input100 @error('email') is-invalid @enderror" type="text"
                                    name="email" placeholder="Email" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </span>
                            </div>
							@error('email')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
                            <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                                <input class="input100 @error('password') is-invalid @enderror" type="password"
                                    name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                            </div>
							@error('password')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
                            <div class="text-end pt-1">
                                <p class="mb-0"><a href="#" class="text-primary ms-1">Forgot Password?</a></p>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
                                    Login
                                </button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Not a member?<a href="register.html"
                                        class="text-primary ms-1">Create an Account</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center my-3">
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- End PAGE -->


    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('./assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('./assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('./assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('./assets/js/sticky.js') }}"></script>

    <!-- COLOR THEME JS -->
    <script src="{{ asset('./assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('./assets/js/custom.js') }}"></script>

</body>

</html>
