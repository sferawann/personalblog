<!DOCTYPE html>
<html>

<head>
    <!-- Title -->
    <title>Sign in</title>

    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="ITENAS" />
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/favicon.png' ?>">
    <!-- Styles -->
    <link href="<?php echo base_url() . 'assets/plugins/pace-master/themes/blue/pace-theme-flash.css' ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'assets/plugins/uniform/css/uniform.default.min.css' ?>" rel="stylesheet" />
    
    
    <link href="<?php echo base_url() . 'assets/plugins/line-icons/simple-line-icons.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/waves/waves.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/switchery/switchery.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/3d-bold-navigation/css/style.css' ?>" rel="stylesheet" type="text/css" />

    <!-- Theme Styles -->
    <link href="<?php echo base_url() . 'assets/css/modern.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/css/themes/green.css' ?>" class="theme-color" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/css/custom.css' ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url() . 'assets/plugins/3d-bold-navigation/js/modernizr.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/offcanvasmenueffects/js/snap.svg-min.js' ?>"></script>

    <!-- From Personal Blog -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/all.css' ?>">

    <!-- Google Font -->
    <link href="<?php echo base_url() . 'https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap' ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'vendor/animate/animate.css' ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'vendor/css-hamburgers/hamburgers.min.css' ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'vendor/animsition/css/animsition.min.css' ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'vendor/select2/select2.min.css' ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'vendor/daterangepicker/daterangepicker.css' ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/util.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/main.css' ?>">

</head>

<body class="page-login">
    <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="<?php echo site_url('backend/login/auth'); ?>" method="post">
				<span class="contact100-form-title">
					Log In
				</span>
                <div class="form-group wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                    <span class="label-input100"><i class="far fa-user"></i> Email</span>
                    <input class="form-control input100" type="email" name="username" placeholder="Type your email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
				<div class="form-group wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100"><i class="fas fa-lock"></i> Password</span>
                    <input class="form-control input100" type="password" name="password" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Log In
                                <i class="fas fa-long-arrow-alt-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

   
        <!-- Javascripts -->
        <script src="<?php echo base_url() . 'assets/plugins/jquery/jquery-2.1.4.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/jquery-ui/jquery-ui.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/pace-master/pace.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/jquery-blockui/jquery.blockui.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/bootstrap/js/bootstrap.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/switchery/switchery.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/uniform/jquery.uniform.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/offcanvasmenueffects/js/classie.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/plugins/waves/waves.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/modern.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery-3.5.1.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/popper.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/all.js' ?>"></script>

</body>

</html>