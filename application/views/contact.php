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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap" rel="stylesheet">
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

    <!-- Navbar -->
    <div class="flash-data-username" data-flashdata="<?= $this->session->flashdata('error_username_user') ?>"></div>
    <div class="flash-data-password" data-flashdata="<?= $this->session->flashdata('error_password_user') ?>"></div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-lg fa-laptop-code bg-custom"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-uppercase mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Home'); ?>">Home</a>
                    </li>
                    <?php foreach ($Course as $c) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Course</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><?php echo $c->tittle_course ?></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('Research'); ?>">Research</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('About'); ?>">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('Contact'); ?>">Contact</a>
                    </li>
                </ul>
                <a href="<?php echo site_url('Auth/logout') ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

</head>

<body>

    <!-- Awal Form -->

    <div class="container-contact100 mt-3">
        <div class="wrap-contact1000 mt-5">
            <div class="row">
                <span class="contact100-form-title">
                    Contact Us
                </span>
                <div class="col">
                    <form class="contact100-form validate-form">
                        <div class="wrap-description100 validate-input" data-validate="Name is required">
                            <span class="label-input100"><i class="fas fa-map-marker-alt"></i> Address</span>
                            <ul class="description100" type="text" name="contact_address">Jl. PH.H. Mustofa No.23, Neglasari, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40124</ul>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-description100 validate-input" data-validate="Name is required">
                            <span class="label-input100"><i class="fas fa-phone-alt"></i> Phone</span>
                            <ul class="description100" type="text" name="contact_phone">+62-888-8888-8888</ul>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-description100 validate-input" data-validate="Name is required">
                            <span class="label-input100"><i class="fas fa-envelope"></i> Email</span>
                            <ul class="description100" type="text" name="contact_email">email@gmail.com</ul>
                            <span class="focus-input100"></span>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <form class="contact100-form validate-form">
                        <div class="wrap-input100 validate-input" data-validate="Name is required">
                            <span class="label-input100">Your Name</span>
                            <input class="input100" type="text" name="name" placeholder="Enter your name">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="text" name="email" placeholder="Enter your email addess">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Subject is required">
                            <span class="label-input100">Subject</span>
                            <input class="input100" type="text" name="subject" placeholder="Your subject here...">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Message is required">
                            <span class="label-input100">Message</span>
                            <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-contact100-form-btn">
                            <div class="wrap-contact100-form-btn">
                                <div class="contact100-form-bgbtn"></div>
                                <button class="contact100-form-btn">
                                    <span>
                                        Submit
                                        <i class="fas fa-long-arrow-alt-right m-l-7" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!-- Akhir Form -->
    <!-- Awal Footer -->
    <footer class="pt-2 my-md-2 pt-md-2">
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
    </footer>
    <!-- Akhir Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/js/all.js"></script>
</body>

</html>