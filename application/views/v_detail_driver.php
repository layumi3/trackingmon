<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Location</title>
	<?php echo $map['js']; ?>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ('theme/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo ('theme/css/sb-admin.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo ('theme/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="<?php echo ('listManagement'); ?>"><i class="fa fa-car" aria-hidden="true"></i> TRACKING POLBAN</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('ses_username'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo ('logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <li >
                    <a href="<?php echo ('listManagement')?>"><i class="fa fa-fw fa-table"></i> List Management Tracking</a>
                  </li>
                    <li >
                        <a href="<?php echo ('form')?>"><i class="fa fa-fw fa-edit"></i> New Data</a>
                    </li>
                    <li class="active">
                        <a href="<?php echo ('location')?>"><i class="fa fa-fw fa-desktop"></i> Location</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Location
                            <small>Detail Driver</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo ('listManagement'); ?>">Location</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Maps
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-table"></i>  Tabel Location
                            </li>
                        </ol>
                             <div class="panel-body">
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hover table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Posisi # </th>
                                                <th>Nama Sopir</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($location as $keys) {?>
                                            <tr>
                                                <td><?php echo($keys->id_order);?></td>
                                                <td><?php echo($keys->id_position);?></td>
                                                <td><?php echo($keys->username);?></td>
                                                <td><?php echo($keys->latitude);?></td>
                                                <td><?php echo($keys->longitude);?></td>
                                                <td><?php echo $keys->waktu;?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                    
                  <!--   <div class="col-lg-5">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               <h3 class="panel-title"><i class="fa fa-clipboard" aria-hidden="true"></i>Preview Supir</h3>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($onedriver as $keys) {?>
                                <p><?php echo $keys->id_sim;?> </p>
                                <p> <?php echo $keys->nama_driver; ?></p>
                                <p> <?php echo $keys->alamat; ?></p>
                                <p> <?php echo $keys->handphone; ?></p>
                                <?php } ?>
                            </div>      
                        </div>
                    </div> -->

                    <div class="col-lg-7">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clipboard" aria-hidden="true"></i>Preview Maps</h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $map['html']; ?>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo ('theme/js/jquery.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo ('theme/js/bootstrap.min.js')?>"></script>

</body>

</html>
