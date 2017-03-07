<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - New Data</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ('theme/css/bootstrap.min.css')?>" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="<?php echo ('theme/css/sb-admin.css')?>" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="<?php echo ('theme/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>

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
                    <li class="active">
                        <a href="<?php echo ('form')?>"><i class="fa fa-fw fa-edit"></i> New Data</a>
                    </li>
                    <li>
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
                            Forms
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo ('listManagement'); ?>">New Data</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-heading">Form Driver</div>
                		<div class="panel-body">                		

                        <form role="form" method="post" action="<?php echo ('fillDriver');?>">
                            <div class="form-group">
                                <label>Nama Pengemudi</label>
                                <input class="form-control" name="nama_driver" placeholder="Enter text" required/>
                            </div>
                            <div class="form-group">
                                <label>No SIM</label>
                                <input class="form-control nosim" name="id_sim" type="number" min="0" max="9999999999999" maxlength="13" placeholder="Enter number" required/><br/>
                                <!-- <input class="form-control" name="id_sim" maxlength="13" autocomplete="on" placeholder="Enter number" required/> -->
                            
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="username" maxlength="20" placeholder="Enter text max 20 characters" required/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Enter text" required/>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" placeholder="Enter text" required/>
                            </div>
                            <div class="form-group">
                                <label>Handphone</label>
                                <input class="hp form-control" maxlength="13" type="number"  min="0" max="9999999999999"  name="handphone" placeholder="Enter number" required/>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>
                    	</div>
                	</div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo ('theme/js/jquery.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo('theme/js/bootstrap.min.js')?>"></script>

</body>

</html>
<script type="text/javascript">
    var inputQuantity = [];
    $(function() {
      $(".nosim").each(function(i) {
        inputQuantity[i]=this.defaultValue;
         $(this).data("idx",i); // save this field's index to access later
      });
      $(".nosim").on("keyup", function (e) {
        var $field = $(this),
            val=this.value,
            $thisIndex=parseInt($field.data("idx"),10); // retrieve the index
//        window.console && console.log($field.is(":invalid"));
          //  $field.is(":invalid") is for Safari, it must be the last to not error in IE8
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            this.value = inputQuantity[$thisIndex];
            return;
        } 
        if (val.length > Number($field.attr("maxlength"))) {
          val=val.slice(0, 5);
          $field.val(val);
        }
        inputQuantity[$thisIndex]=val;
      });      
    });


    var inputQuantity = [];
    $(function() {
      $(".hp").each(function(i) {
        inputQuantity[i]=this.defaultValue;
         $(this).data("idx",i); // save this field's index to access later
      });
      $(".hp").on("keyup", function (e) {
        var $field = $(this),
            val=this.value,
            $thisIndex=parseInt($field.data("idx"),10); // retrieve the index
//        window.console && console.log($field.is(":invalid"));
          //  $field.is(":invalid") is for Safari, it must be the last to not error in IE8
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            this.value = inputQuantity[$thisIndex];
            return;
        } 
        if (val.length > Number($field.attr("maxlength"))) {
          val=val.slice(0, 5);
          $field.val(val);
        }
        inputQuantity[$thisIndex]=val;
      });      
    });
</script>
