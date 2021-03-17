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
                            <a class="nav-link active dropdown-toggle" href="<?= site_url('Course'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Course</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= site_url('Course_post'); ?>"><?php echo $c->tittle_course ?></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <!-- BELUM ADA PHPNYA SAMAIN KAYAK COURSE -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('Tamyiz'); ?>">Tamyiz</a>
                    </li>
                    <!-- END TAMIEZ -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('Research'); ?>">Research</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('PKM'); ?>">PKM</a>
                    </li>
                    <li class="nav-item active">
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
                    About
                </span>
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        <img src="<?= base_url(); ?>assets/img/homepage/pp.png" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

                        <h4 class="mb-0">Dewi Rosmala</h4>
                        <p class="text-muted">Dosen</p>

                        <div class="text-left mt-3">
                            <h6 class="font-13 text-uppercase">About Me :</h6>
                            <p class="text-muted font-13 mb-3">
                                Lorem ipsum lorem ipsum lorem ipsum
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Dewi Rosmala</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">+62-888-8888-8888</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">email@email.com</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">Bandung, Indonesia</span></p>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fab fa-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fab fa-github"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-box -->
                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card-box">

                        <div class="tab-content">

                            <div class="tab-pane show active" id="about-me">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                                    Experience</h5>

                                <ul class="list-unstyled timeline-sm">
                                    <li class="timeline-sm-item">
                                        <span class="mt-0 mb-1">2015 - 19</span>
                                        <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                        <p>websitename.com</p>
                                        <p class="text-muted mt-2">Everyone realizes why a new common language
                                            would be desirable: one could refuse to pay expensive translators.
                                            To achieve this, it would be necessary to have uniform grammar,
                                            pronunciation and more common words.</p>
                                    </li>
                                    <li class="timeline-sm-item">
                                        <span class="mt-0 mb-1">2012 - 15</span>
                                        <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                        <p>Software Inc.</p>
                                        <p class="text-muted mt-2">If several languages coalesce, the grammar
                                            of the resulting language is more simple and regular than that of
                                            the individual languages. The new common language will be more
                                            simple and regular than the existing European languages.</p>
                                    </li>
                                    <li class="timeline-sm-item">
                                        <span class="mt-0 mb-1">2010 - 12</span>
                                        <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                        <p>Coderthemes LLP</p>
                                        <p class="text-muted mt-2 mb-0">The European languages are members of
                                            the same family. Their separate existence is a myth. For science
                                            music sport etc, Europe uses the same vocabulary. The languages
                                            only differ in their grammar their pronunciation.</p>
                                    </li>
                                </ul>
                            </div>
                            <!-- end timeline content-->
                        </div> <!-- end tab-content -->
                    </div> <!-- end card-box-->
                </div> <!-- end col -->
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
                    <h5>Find Me</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="https://scholar.google.com/citations?user=zJuf-CAAAAAJ&hl=en&oi=sra">Google Scholar</a></li>
                        <li><a class="text-muted" href="#">LinkedIn</a></li>
                        <li><a class="text-muted" href="#">YouTube</a></li>
                        <li><a class="text-muted" href="#">SINTA</a></li>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>