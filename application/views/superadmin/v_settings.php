<!DOCTYPE html>
<html>

<head>
    <!-- Title -->
    <title>Site Settings</title>

    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="ITENAS" />
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/favicon.png' ?>">

    <!-- Styles -->
    <link href="<?php echo base_url() . 'assets/plugins/pace-master/themes/blue/pace-theme-flash.css' ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'assets/plugins/uniform/css/uniform.default.min.css' ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'assets/plugins/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/fontawesome/css/font-awesome.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/line-icons/simple-line-icons.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/waves/waves.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/switchery/switchery.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/3d-bold-navigation/css/style.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/slidepushmenus/css/component.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/datatables/css/jquery.datatables.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/datatables/css/jquery.datatables_themeroller.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/plugins/toastr/jquery.toast.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Theme Styles -->
    <link href="<?php echo base_url() . 'assets/css/modern.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/css/themes/green.css' ?>" class="theme-color" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/css/custom.css' ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url() . 'assets/plugins/3d-bold-navigation/js/modernizr.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/offcanvasmenueffects/js/snap.svg-min.js' ?>"></script>


</head>

<body class="page-header-fixed  compact-menu  pace-done page-sidebar-fixed">
    <div class="overlay"></div>
    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box" style="background: linear-gradient(to right,#e8b38c, #697194)">
                    <a href="<?php echo site_url('backend/dashboard'); ?>" style="color: white;" class="logo-text"><span>Blog</span></a>
                </div><!-- Logo Box -->
                <div class="search-button">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                </div>
                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            $count_inbox = $this->db->get_where('tbl_inbox', array('inbox_status' => '0'));
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success pull-right"><?php echo $count_inbox->num_rows(); ?></span></a>
                                <ul class="dropdown-menu title-caret dropdown-lg" role="menu">

                                    <li>
                                        <p class="drop-title">Anda memiliki <?php echo $count_inbox->num_rows(); ?> pesan baru !</p>
                                    </li>
                                    <li class="dropdown-menu-list slimscroll messages">
                                        <ul class="list-unstyled">
                                            <?php
                                            $query_msg = $this->db->get_where('tbl_inbox', array('inbox_status' => '0'), 6);
                                            foreach ($query_msg->result() as $row) :
                                            ?>
                                                <li>
                                                    <a href="<?php echo site_url('backend/inbox'); ?>">
                                                        <div class="msg-img">
                                                            <div class="online on"></div><img class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>" alt="">
                                                        </div>
                                                        <p class="msg-name"><?php echo $row->inbox_name; ?></p>
                                                        <p class="msg-text"><?php echo word_limiter($row->inbox_message, 5); ?></p>
                                                        <p class="msg-time"><?php echo date('d-m-Y H:i:s', strtotime($row->inbox_created_at)); ?></p>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>

                                        </ul>
                                    </li>
                                    <li class="drop-all"><a href="<?php echo site_url('backend/inbox'); ?>" class="text-center">All Messages</a></li>
                                </ul>
                            </li>
                            <?php
                            $count_comment = $this->db->get_where('tbl_comment', array('comment_status' => '0'));
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-comment"></i><span class="badge badge-success pull-right"><?php echo $count_comment->num_rows(); ?></span></a>
                                <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                    <li>
                                        <p class="drop-title">Anda memiliki <?php echo $count_comment->num_rows(); ?> komentar baru !</p>
                                    </li>
                                    <li class="dropdown-menu-list slimscroll messages">
                                        <ul class="list-unstyled">
                                            <?php
                                            $query_cmt = $this->db->get_where('tbl_comment', array('comment_status' => '0'), 6);
                                            foreach ($query_cmt->result() as $row) :
                                            ?>
                                                <li>
                                                    <a href="<?php echo site_url('backend/comment/unpublish'); ?>">
                                                        <div class="msg-img">
                                                            <div class="online on"></div><img class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>" alt="">
                                                        </div>
                                                        <p class="msg-name"><?php echo $row->comment_name; ?></p>
                                                        <p class="msg-text"><?php echo word_limiter($row->comment_message, 5); ?></p>
                                                        <p class="msg-time"><?php echo date('d-m-Y H:i:s', strtotime($row->comment_date)); ?></p>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>

                                        </ul>
                                    </li>
                                    <li class="drop-all"><a href="<?php echo site_url('backend/comment/unpublish'); ?>" class="text-center">All Comments</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                    <span class="user-name"><?php echo $this->session->userdata('name'); ?><i class="fa fa-angle-down"></i></span>
                                    <?php
                                    $user_id = $this->session->userdata('id');
                                    $query = $this->db->get_where('tbl_user', array('user_id' => $user_id));
                                    if ($query->num_rows() > 0) :
                                        $row = $query->row_array();
                                    ?>
                                        <img class="img-circle avatar" src="<?php echo base_url() . 'assets/images/' . $row['user_photo']; ?>" width="40" height="40" alt="">
                                    <?php else : ?>
                                        <img class="img-circle avatar" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>" width="40" height="40" alt="">
                                    <?php endif; ?>
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a href="<?php echo site_url('backend/change_pass'); ?>"><i class="fa fa-key"></i>Change Password</a></li>
                                    <li role="presentation"><a href="<?php echo site_url('backend/comment/unpublish'); ?>"><i class="fa fa-comment"></i>Comments<span class="badge badge-success pull-right"><?php echo $count_comment->num_rows(); ?></span></a></li>
                                    <li role="presentation"><a href="<?php echo site_url('backend/inbox'); ?>"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right"><?php echo $count_inbox->num_rows(); ?></span></a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation"><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                </ul>
                            </li>
                        </ul><!-- Nav -->
                    </div><!-- Top Menu -->
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <div class="page-sidebar sidebar" style="background: linear-gradient(to right,#e8b38c, #697194);">
            <div class="page-sidebar-inner slimscroll" style="background: linear-gradient(to right,#e8b38c, #697194);">
                <div class="sidebar-header" style="background: linear-gradient(to right,#e8b38c, #697194)">
                    <div class="sidebar-profile">
                        <?php
                        $user_id = $this->session->userdata('id');
                        $query = $this->db->get_where('tbl_user', array('user_id' => $user_id));
                        if ($query->num_rows() > 0) :
                            $row = $query->row_array();
                        ?>
                            <a href="javascript:void(0);">
                                <div class="sidebar-profile-image">
                                    <img src="<?php echo base_url() . 'assets/images/' . $row['user_photo']; ?>" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $this->session->userdata('name'); ?><br>
                                        <?php if ($row['user_level'] == '1') : ?>
                                            <small style="color: white;">Administrator</small>
                                        <?php else : ?>
                                            <small>Author</small>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </a>
                        <?php else : ?>
                            <a href="javascript:void(0);">
                                <div class="sidebar-profile-image">
                                    <img src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $this->session->userdata('name'); ?><br>
                                        <?php if ($row['user_level'] == '1') : ?>
                                            <small>Administrator</small>
                                        <?php else : ?>
                                            <small>Author</small>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <ul class="menu accordion-menu" style="background: linear-gradient(to right,#e8b38c, #697194)">
                    <li class="active"><a href="<?php echo site_url('superadmin/dashboard'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194)" class="waves-effect waves-button" class="waves-effect waves-button"><span style="color: white;" class="menu-icon icon-home"></span>
                            <p>Dashboard</p>
                        </a></li>
                    <li class="droplink"><a href="#" class="waves-effect waves-button" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;"><span class="menu-icon icon-pin"></span>
                            <p>Course</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="background: linear-gradient(to right,#e8b38c, #697194)">
                            <li><a href="<?php echo site_url('superadmin/post/add_new'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Add New</a></li>
                            <li><a href="<?php echo site_url('superadmin/post'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Course List</a></li>
                            <li><a href="<?php echo site_url('superadmin/category'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Category</a></li>
                            <li><a href="<?php echo site_url('superadmin/tag'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Tag</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#" class="waves-effect waves-button" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;"><span class="menu-icon icon-pin"></span>
                            <p>Tamyiz</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="background: linear-gradient(to right,#e8b38c, #697194)">
                            <li><a href="<?php echo site_url('superadmin/tamyiz/add_new'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Add New</a></li>
                            <li><a href="<?php echo site_url('superadmin/tamyiz'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Tamyiz List</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#" class="waves-effect waves-button" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;"><span class="menu-icon icon-pin"></span>
                            <p>Research</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="background: linear-gradient(to right,#e8b38c, #697194)">
                            <li><a href="<?php echo site_url('superadmin/research/add_new'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Add New</a></li>
                            <li><a href="<?php echo site_url('superadmin/research'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Research List</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#" class="waves-effect waves-button" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;"><span class="menu-icon icon-pin"></span>
                            <p>PKM</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="background: linear-gradient(to right,#e8b38c, #697194)">
                            <li><a href="<?php echo site_url('superadmin/PKM/add_new'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Add New</a></li>
                            <li><a href="<?php echo site_url('superadmin/PKM'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">PKM List</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#" class="waves-effect waves-button" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;"><span class="menu-icon icon-pin"></span>
                            <p>Home</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="background: linear-gradient(to right,#e8b38c, #697194)">
                            <li><a href="<?php echo site_url('superadmin/Home/add_new'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Add New</a></li>
                            <li><a href="<?php echo site_url('superadmin/Home'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Home List</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#" class="waves-effect waves-button" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;"><span class="menu-icon icon-pin"></span>
                            <p>Experience</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="background: linear-gradient(to right,#e8b38c, #697194)">
                            <li><a href="<?php echo site_url('superadmin/Experience/add_new'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Add New</a></li>
                            <li><a href="<?php echo site_url('superadmin/Experience'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;">Experience List</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('superadmin/About'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;" class="waves-effect waves-button"><span class="menu-icon icon-info"></span>
                            <p>About</p>
                        </a></li>
                    <li><a href="<?php echo site_url('superadmin/inbox'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;" class="waves-effect waves-button"><span class="menu-icon icon-envelope"></span>
                            <p>Inbox</p>
                        </a></li>
                    <li><a href="<?php echo site_url('superadmin/comment'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;" class="waves-effect waves-button"><span class="menu-icon icon-bubbles"></span>
                            <p>Comments</p>
                        </a></li>

                    </a></li>
                    <li><a href="<?php echo site_url('superadmin/users'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;" class="waves-effect waves-button"><span class="menu-icon icon-user"></span>
                            <p>Users</p>
                        </a></li>
                    <li><a href="<?php echo site_url('superadmin/login/logout'); ?>" style="background: linear-gradient(to right,#e8b38c, #697194);color: white;" class="waves-effect waves-button"><span class="menu-icon icon-logout"></span>
                            <p>Log Out</p>
                        </a>
                    </li>

                </ul>
            </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->
        <div class="page-inner">
            <div class="page-title">
                <h3>Site Information</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend/dashboard'); ?>">Dashboard</a></li>
                        <li><a href="#">Site</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <form class="form-horizontal" action="<?php echo base_url() . 'backend/settings/update' ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="panel panel-white">

                                <div class="panel-body">

                                    <div class="form-group">
                                        <label for="input1" class="col-sm-2 control-label">Site Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="input1" value="<?php echo $site_name; ?>" placeholder="Site Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="input1" class="col-sm-2 control-label">Site Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="input1" value="<?php echo $site_title; ?>" placeholder="Site Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input1" class="col-sm-2 control-label">Site Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control" rows="6"><?php echo $site_description; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="input1" class="col-sm-2 control-label">Favicon</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="logo_icon" class="form-control" id="input1">
                                            <!-- <p class="help-block">Favicon harus beresolusi 32 x 32 Pixels.</p> -->
                                            <img src="<?php echo base_url() . 'theme/images/' . $site_favicon; ?>" class="thumbnail">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="input1" class="col-sm-2 control-label">Logo Header</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="logo_header" class="form-control" id="input1">
                                            <!-- <p class="help-block">Logo harus beresolusi 248 x 54 Pixels.</p> -->
                                            <img src="<?php echo base_url() . 'theme/images/' . $site_logo_header; ?>" class="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
            <div class="page-footer">
                <p class="no-s"><?php echo date('Y'); ?> &copy; IF ITENAS</p>
            </div>
        </div><!-- Page Inner -->
    </main><!-- Page Content -->

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
    <script src="<?php echo base_url() . 'assets/plugins/offcanvasmenueffects/js/main.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/waves/waves.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/3d-bold-navigation/js/main.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/jquery-mockjax-master/jquery.mockjax.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/moment/moment.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/datatables/js/jquery.datatables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/modern.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/toastr/jquery.toast.min.js' ?>"></script>
    <!--Toast Message-->
    <?php if ($this->session->flashdata('msg') == 'success') : ?>
        <script type="text/javascript">
            $.toast({
                heading: 'Success',
                text: "Site Information Saved!",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
        </script>
    <?php else : ?>

    <?php endif; ?>

</body>

</html>