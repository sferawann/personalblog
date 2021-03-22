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
                    <li class="nav-item active dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Course</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($Post as $p) : ?>
                                <a class="dropdown-item" href="<?= site_url('Course_post'); ?>"><?php echo $p->tittle_post; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('Tamyiz'); ?>">Tamyiz</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('Research'); ?>">Research</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('PKM'); ?>">PKM</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('About'); ?>">About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('Contact'); ?>">Contact</a>
                    </li>
                </ul>
                <a href="login.html" class="nav-link"><i class="fas fa-sign-in-alt"></i> Log In</a>
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
                <!-- Page Content -->
                <div class="container">
                    <center>
                        <h1 class="my-3">Tamyiz</h1>
                    </center>
                    <div class="row mt-3">

                        <!-- Blog Entries Column -->
                        <div class="col">
                            <!-- Blog Post -->
                            <?php foreach ($Tamyiz as $t) : ?>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- judul course -->
                                        <h2 class="card-title" style="color: #697194;"><?= $t->tittle_tamyiz ?></h2>
                                        <!-- paragraf pertama isi preview course -->
                                        <p class="card-text"><?= $t->contents_tamyiz ?></p>
                                        <a href="<?php echo site_url('Tamyiz-post'); ?>" type="button" class="btn btn-custom mt-2">Read More<i class="fas fa-long-arrow-alt-right m-l-7" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <!-- ini tanggal course di post -->
                                        <?php echo date('d F Y', strtotime(str_replace('/', '-', $t->postdate_tamyiz))) ?>
                                        <!-- ini yg bawah di ganti nama bu dewi nya, nama dari username -->
                                        <!-- <a href="about.html">Start Bootstrap</a> -->
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Pagination -->
                            <ul class="pagination justify-content-center mb-4">
                                <li class="page-item">
                                    <a class="page-link btn-custom" href="#">&larr; Older</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link btn-custom" href="#">Newer &rarr;</a>
                                </li>
                            </ul>

                        </div>


                    </div>
                    <!-- /.row -->

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
                    <h5>Find Me</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="https://scholar.google.com/citations?user=zJuf-CAAAAAJ&hl=en&oi=sra">Google Scholar</a></li>
                        <li><a class="text-muted" href="https://id.linkedin.com/in/dewi-rosmala-43171528">LinkedIn</a></li>
                        <li><a class="text-muted" href="https://sinta.ristekbrin.go.id/authors/detail?id=6650264&view=overview">Sinta</a></li>
                    </ul>
                </div>
                <!-- <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div> -->
            </div>
    </footer>
    <!-- Akhir Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/js/modal.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/all.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>