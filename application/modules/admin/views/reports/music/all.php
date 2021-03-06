<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin | Report</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?= base_url('assets/admin/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?= base_url('assets/admin/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url('assets/admin/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Semantic UI -->
    <link href="<?= base_url('assets/css/semantic.min.css') ?>" rel="stylesheet" type="text/css" />

</head>
<body class="skin-black fixed">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="../index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Admin
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                     
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Punpun Sak <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="../../assets/img/avatar3.png" class="img-circle" alt="User Image" />
                                <p>
                                    Punpun Sak - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Following</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Favorites</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">                
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
              
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                       
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Report</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url().'admin/reports/band/getNotApprove' ?>"><i class="fa fa-angle-double-right"></i> Band</a></li>
                            <li><a href="<?= base_url().'admin/reports/user/getNotApprove' ?>"><i class="fa fa-angle-double-right"></i> User</a></li>
                            <li><a href="<?= base_url().'admin/reports/music_user/getNotApprove' ?>"><i class="fa fa-angle-double-right"></i> Music</a></li>
                            <li><a href="<?= base_url().'admin/reports/post/getNotApprove' ?>"><i class="fa fa-angle-double-right"></i> Post</a></li>
                        </ul>
                    </li>
                 
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">                
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Report
                    <small>preview of simple tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Simple</li>
                </ol>
            </section>

            <!-- Main content -->                                      
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header" style="margin-top: 20px">
                            <h3 class="box-title">Band</h3>
                            <div class="box-tools">
                                <div class="btn-group" style="margin-left: 820px">
                                    <button type="button" class="btn btn-default">Status</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= base_url().'admin/reports/music/getNotApproved' ?>">Not Approved</a></li>
                                        <li><a href="<?= base_url().'admin/reports/music/getApproved' ?>">Approved</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                        <th>ID</th>
                                        <th>Music</th>
                                        <th>Type</th>
                                        <th>From</th>
                                        <th>Reason</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php foreach($reports as $report): ?>
                                    <tr>
                                        <td><?= $report->id ?></td>
                                        <td><?= $report->musicname ?></td>
                                        <td><?= $report->type ?></td>
                                        <td><?= $report->reporter ?></td>
                                        <td><?= $report->reason ?></td>
                                        <td><?= $report->timestamp ?></td>
                                     <td><span class="label label-danger">Not Approve</span></td>
                                </tr>
                            <?php endforeach; ?>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->                
</aside><!-- /z.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/admin/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/js/AdminLTE/app.js') ?>" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin/js/AdminLTE/demo.js') ?>" type="text/javascript"></script>
<!-- Semantic UI-->
<script src="<?= base_url('assets/js/semantic.min.js') ?>" type="text/javascript"></script>
</body>
</html>