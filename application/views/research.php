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
                    <li class="nav-item ">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('Research'); ?>">Research</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('About'); ?>">About</a>
                    </li>
                    <li class="nav-item ">
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

    <div class="container-about100 mt-3">
        <div class="wrap-about1000 mt-5">
            <div class="row">
                <span class="contact100-form-title">
                    Research
                </span>
                <?php
                foreach ($Research as $r) : ?>
                    <div class="card">
                        <div class="card-header" style="color:#697194; font-size:20px;">
                            <?= $r->tittle_research; ?>
                        </div>
                        <a class="list-group list-group-flush" style="font-size: 15px;" target="_blank" href="<?= $r->link_research; ?>">
                            <li class="list-group-item"><?= $r->link_research; ?></li>
                        </a>
                    </div>
                    <!-- <div class="card">
                        <div class="card-header" style="color:#697194; font-size:20px;">
                            Komparasi Framework MVC (Codeigniter, Dan Cakephp) Pada Aplikasi Berbasis Web
                        </div>
                        <a class="list-group list-group-flush" style="font-size: 15px;" target="_blank" href="https://scholar.google.com/scholar?cluster=1222166045411965942&hl=en&oi=scholarr">
                            <li class="list-group-item">https://scholar.google.com/scholar?cluster=1222166045411965942&hl=en&oi=scholarr</li>
                        </a>
                    </div> -->
                    <!-- COURSE START-->

                    <hr>


                    <!-- <p>    
                    <button type="button" class="btn btn-custom ">Older</button>
                    <button type="button" class="btn disabled btn-custom">Newer</button>
                </p> -->

                <?php
                endforeach; ?>
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