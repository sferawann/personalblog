<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/all.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css">
    <!--===============================================================================================-->


</head>

<body>

    <!-- Awal Form -->
    <div class="flash-data-username" data-flashdata="<?= $this->session->flashdata('error_username') ?>"></div>
    <div class="flash-data-password" data-flashdata="<?= $this->session->flashdata('error_password') ?>"></div>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" action="<?php echo site_url('Auth') ?>" method="POST">
                <span class="contact100-form-title">
                    Log In
                </span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                    <span class="label-input100"><i class="far fa-user"></i> Username</span>
                    <input class="input100" type="text" name="username_user" placeholder="Type your username">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100"><i class="fas fa-lock"></i> Password</span>
                    <input class="input100" type="password" name="password_user" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn" type="submit">
                            <span>
                                Log In
                                <i class="fas fa-long-arrow-alt-right m-l-7" aria-hidden="true" type="submit"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!-- Akhir Form -->

    <!-- Awal Footer -->
    <!-- <footer class="pt-2 my-md-2 pt-md-2">
        <div class="container">
            <div class="row p-3">
                <div class="col-6 col-md">
                    <a class="mb-2" href="#"><i class="fas fa-lg fa-laptop-code bg-custom"></i></a>
                    <small class="d-block mb-3 text-muted">&copy; Manajemen Proyek 2021</small>
                  </div>
                  <div class="col-6 col-md">
                    <h5>Institut Teknologi Nasional</h5>
                    <p class="text-muted text-small">Jl. PH.H. Mustofa No.23, Neglasari, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40124</p>
                  </div>
                  <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Resource</a></li>
                      <li><a class="text-muted" href="#">Resource name</a></li>
                      <li><a class="text-muted" href="#">Another resource</a></li>
                      <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                  </div>
                  <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Team</a></li>
                      <li><a class="text-muted" href="#">Locations</a></li>
                      <li><a class="text-muted" href="#">Privacy</a></li>
                      <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                  </div>
        </div>
    </footer> -->
    <!-- Akhir Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/js/all.js"></script>
</body>

</html>