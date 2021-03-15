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
                    <?php foreach ($Course as $c) : ?>
                        <li class="nav-item active dropdown">
                            <a class="nav-link active dropdown-toggle" href="<?= site_url('Course'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Course</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><?php echo $c->tittle_course ?></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('Tamyiz'); ?>">Tamyiz</a>
                    </li>
                    <!-- END TAMIEZ -->
                    <li class="nav-item">
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
                <!-- Page Content -->
                <div class="container">
                    <h1 class="my-1">Judul Course</h1>
                    <div class="row">
                        <!-- Post Content Column -->
                        <div class="col-lg-12">
                            <!-- Author -->
                            <hr>
                            <!-- Date/Time -->
                            <p>Posted on January 1, 2019 at 12:00 PM</p>
                            <hr>
                            <!-- Preview Image -->
                            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

                            <hr>

                            <!-- Post Content -->
                            <!-- di tampilin pas buka course.html, dari preview course -->
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                            <!-- isi course biasa -->
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                            <hr>

                            <div class="col col-lg-8 justify-content-center align-items-center container">
                                <!-- Comments Form -->
                                <div class="card my-4">
                                    <h5 class="card-header">Leave a Comment:</h5>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
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
                                                <div class="wrap-input100 validate-input" data-validate="Comment is required">
                                                    <span class="label-input100">Comment</span>
                                                    <textarea class="input100" name=comment" placeholder="Your comment here..."></textarea>
                                                    <span class="focus-input100"></span>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-custom">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Comment -->
                            <div class="col col-lg-8 justify-content-center align-items-center container" style="border:1px solid ;">
                                <ul class="list-unstyled border p-3">
                                    <li class="media mb-3 ">
                                        <img class="d-flex mr-3 rounded-circle" src="img/homepage/pp-mini.png" alt="">
                                        <div class="media-body">
                                            <!-- nama komentar -->
                                            <h5 class="mt-0">Commenter Name</h5>
                                            <!-- isi komentar -->
                                            la. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </li>
                                    <hr>
                                    <li class="media mb-3">
                                        <img class="d-flex mr-3 rounded-circle" src="img/homepage/pp-mini.png" alt="">
                                        <div class="media-body">
                                            <!-- nama komentar -->
                                            <h5 class="mt-0">Commenter Name</h5>
                                            <!-- isi komentar -->
                                            la. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- <div class="col-md-4">-->
                        <!-- Categories Widget -->
                        <!-- <div class="card my-4">
                              <h5 class="card-header">Categories</h5>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                      <li>
                                        <a href="#">Web Design</a>
                                      </li>
                                      <li>
                                        <a href="#">HTML</a>
                                      </li>
                                      <li>
                                        <a href="#">Freebies</a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                      <li>
                                        <a href="#">JavaScript</a>
                                      </li>
                                      <li>
                                        <a href="#">CSS</a>
                                      </li>
                                      <li>
                                        <a href="#">Tutorials</a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div> -->
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
                        <li><a class="text-muted" href="#">LinkedIn</a></li>
                        <li><a class="text-muted" href="#">YouTube</a></li>
                        <li><a class="text-muted" href="#">SINTA</a></li>
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