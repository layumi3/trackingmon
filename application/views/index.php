<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin</title>

 <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="true"></script>
    <script src="<?php echo ('theme/js/jquery.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo ('theme/js/bootstrap.min.js')?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo ('theme/js/plugins/morris/raphael.min.js')?>"></script>
    <script src="<?php echo ('theme/js/plugins/morris/morris.min.js')?>"></script>
    <script src="<?php echo ('theme/js/plugins/morris/morris-data.js')?>"></script>
    <script type="text/javascript">
function hitung(){
    alert("ada banyak");
}

function hapuss(id) {
$.ajax({
      type: 'POST',
     data: {id:id},
     dataType:'html',
     crossDomain : true,
      url: "<?php echo site_url('delOrder')?>",
      success: function(result) {
alert("ada banyak");
        var response = JSON.parse(result);
        if(response.status){     
          alert('berhasil');
        }else{                 
          alert('gagal');
        }
      }
    });
}

    </script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ('theme/css/bootstrap.min.css')?>" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="<?php echo ('theme/css/sb-admin.css')?>" rel="stylesheet"/>

    <!-- Morris Charts CSS -->
    <link href="<?php echo ('theme/css/plugins/morris.css')?>" rel="stylesheet"/>

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
                  <li class="active">
                    <a href="<?php echo ('listManagement')?>"><i class="fa fa-fw fa-table"></i> List Management Tracking</a>
                  </li>
                    <li>
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
                            Dashboard <small>List Management Tracking</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">

                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clipboard" aria-hidden="true"></i>Panel List Sopir</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hover table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>SIM #</th>
                                                <th>Nama Sopir</th>
                                                <th>Alamat</th>
                                                <th>Handphone</th>
                                                
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($driver as $keys) {?>
                                            <tr>
                                                <td><?php echo($keys->id_sim);?></td>
                                                <td><?php echo($keys->nama_driver);?></td>
                                                <td><?php echo($keys->alamat);?></td>
                                                <td><?php echo($keys->handphone);?></td>
                                                <td>
                                                    <form role="form" method="get" action="<?php echo ('detailDriver');?>">
                                                         <input type="hidden" name="username" value="<?php echo $keys->username?>" />
                                                        <button type="submit" class="btn btn-default">Get Detail</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- untuk order -->
                    <div class="col-lg-12">
                        <div class="panel panel-info">

                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clipboard" aria-hidden="true"></i> Order Queue Panel</h3>
                            </div>
                        <div class="panel-body">
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hover table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Pengemudi</th>
                                                <th>Mobil</th>
                                                <th>Nopol</th>
                                                <th>Tgl Masuk</th>
                                                <th>Asal</th>
                                                <th>Tujuan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($order as $keys) {
                                            $id= $keys->id_order;
                                             ?>
                                            <tr>
                                                <td><?php echo($keys->id_order);?></td>
                                                <td><?php echo($keys->username);?></td>
                                                <td><?php echo($keys->nama_mobil);?></td>
                                                <td><?php echo($keys->nopol);?></td>
                                                <td><?php echo($keys->tanggal);?></td>
                                                <td><?php echo($keys->asal);?></td>
                                                <td><?php echo($keys->tujuan);?></td>
                                                <td>
                                                     <form role="form" method="get" action="<?php echo ('deleteOrder');?>">
                                                         <input type="hidden" name="id" value="<?php echo $id ?>" />
                                                        <button type="submit" class="btn btn-default">Delete</button>
                                                     </form>
                                                </td>
                                            </tr>
                                            <?php }?>
                                           
                                        </tbody>
                                    </table>
                                </div>
<!-- halaman jika paerlu -->
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
   
<!-- 
<script type="text/javascript">
function hitung(){
    alert("ada banyak");
}

/*

function hapuss(id) {
$.ajax({
      type: 'POST',
     data: {id:id},
      url: "<?php echo ('delOrder')?>",
      success: function(result) {

        var response = JSON.parse(result);
        if(response.status){     
          alert('berhasil');
        }else{                 
          alert('gagal');
        }
      }
    });
}


function delenquiry(id) {
        $.ajax({
            type: 'post',
           url: "<?php echo ('delOrder')?>",
             data: {id:id},
            success: function () {
                alert('ajax success');
            },
            error: function () {
                alert('ajax failure');
            }
        });

}*/

/*   function hapus(id) {
        $.ajax({
            type: "POST",
            cache: false,
            url: "<?php echo ('delOrder')?>",
            data: {id: id},
            success: function (data) {
                alert(data),
             'content' : data
            }
        });
    }*/

</script>
 -->