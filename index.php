<!doctype html>
<html class="no-js" lang="en">

<head>
<script src="https://www.google.com/recaptcha/api.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dinas PKPLH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
	     
        
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="login-prosesnya.php" method="post">
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Silahkan Isikan Username Dan Password Anda Untuk Dapat Masuk Ke Dalam Sistem.</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" maxlength="16" id="exampleInputEmail1" name="username" required>
                            <i class="fa fa-user"></i>
                            <div class="text-danger"></div>
                        </div>
						<div class="menghilang" id="show_hide_password">
							<div class="form-gp">
							<label for="exampleInputPassword1">Password</label>
                            <input type="password" maxlength="16" id="show_hide_password" name="password" required autocomplete="current-password">
                            <a href="" ><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            <div class="text-danger"></div>
							</div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Masuk <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Belum punya akun? <a href="register.php">Daftar</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

	<script src="assets/js/jquery-3.5.1.slim.min.js"></script>

<script>
            $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').removeClass( "fa fa-eye" );
					$('#show_hide_password i').addClass( "fa fa-eye-slash" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa fa-eye" );
                }
            });
            });
        </script>

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>