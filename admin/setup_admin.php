<?php
session_start();
require '../config/functions.php';
$tb_admin1 = query("SELECT * FROM tb_admin ORDER BY id");

$query=mysqli_query($conn, "SELECT * FROM comment");
$jumlah=mysqli_num_rows($query);

$query=mysqli_query($conn, "SELECT * FROM tb_login");
$asile=mysqli_num_rows($query);

$query=mysqli_query($conn, "SELECT * FROM tb_admin");
$asil=mysqli_num_rows($query);

$query=mysqli_query($conn, "SELECT * FROM tbl_barang");
$hasil=mysqli_num_rows($query);


if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda Harus Login!');</script>";
    header("Location: index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- favicon -->
    <link rel="shortcut icon" href="../icon.png">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">

    <!-- chart -->
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">GayaDistro Shop</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <?php 

          if(isset($_SESSION['username'])){

            ?>
            
            <a href="profil.php" class="element place-right">Selamat datang, <?php echo "$_SESSION[username]"; ?></a>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg" style="margin-right: 10px"></i><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php"><i class="fa fa-sign-out" style="padding-right: 10px"></i>Logout</a></li>
              </ul>
            </li>

            <?php
          }else{
            ?>
            <span class="element-divider"></span>
            <a href="login_form.php"><i class="fa fa-user" style="padding-right: 10px"></i>Login</a>
            <?php
          }
          ?>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="dropdown-header">Setup Konten</li>
                    <li>
                        <a href="beranda.php"><i class="fa fa-fw fa-home"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-male"></i> Man <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="setup_baju.php">Baju</a>
                            </li>
                            <li>
                                <a href="setup_celana.php">Celana</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-fw fa-female"></i>Woman<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="setup_tas.php">Tas</a>
                            </li>
                            <li>
                                <a href="setup_sepatu.php">Sepatu</a>
                            </li>
                            <li>
                                <a href="setup_baju.php">Baju</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-header">Setup Administrator</li>
                    <li class="active">
                        <a href="setup_admin.php"><i class="fa fa-user-circle fa-fw"></i>&nbsp;Admin</a>
                    </li>
                    <li>
                        <a href="setup_member.php"><i class="fa fa-address-book fa-fw"></i>&nbsp;Member</a>
                    </li>
                     <li class="dropdown-header">Setup Pembayaran</li>
                     <li>
                        <a href="transaksi.php"><i class="fa fa-money fa-fw"></i>&nbsp;Pembayaran</a>
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
                Admin
              </h1>
              <ol class="breadcrumb">
                <li>
                  <i class="fa fa-user-circle" style="padding-right: 10px"></i>Admin
                </li>
              </ol>
            </div>
          </div>
          <!-- /.row -->

          <!-- catatan admin -->
             <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $jumlah ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="home.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-address-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $asile ?></div>
                                        <div>Member</div>
                                    </div>
                                </div>
                            </div>
                            <a href="setup_member.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-bag fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $hasil ?></div>
                                        <div>Baggage</div>
                                    </div>
                                </div>
                            </div>
                            <a href="setup_baju.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user-circle fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $asil ?></div>
                                        <div>Admin</div>
                                    </div>
                                </div>
                            </div>
                            <a href="setup_admin.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->        
                <br><br>


                 <div class="row">
              <div class="col-md-12">

                <div class="panel panel-default">

                  <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-user" style="padding-right: 10px;"></i>Data Admin</h3>
                  </div>
                  <div class="panel-body">

                   <table class="table table-hover table-striped table-bordered" id="myTable">
                    <thead>
                    <h1 class="text-success text-center" style="margin-right: 40px;">Data Admin</h1>
                    <br>
                    <tr>
                      <th scope="col" class="text-center">No</th>
                      <th scope="col" class="text-center">Username</th>
                      <th scope="col" class="text-center">Password</th>
                      <th scope="col" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                     <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $tb_admin1 as $row ) : ?>
                    <tr class="text-center">
                        <td><?= $i; ?></td>
                        <td><?= $row["username"] ;?>
                        <td><?= $row["password"] ;?></td>
                      
                         <td>                     
                          <a href="ganti1.php?id=<?= $row["id"]; ?>"><button type="submit" class="btn btn-warning btn-sm" name="ubah">Ubah</button></a>
                      
                          <a href="setep.php?id=<?= $row["id"]; ?>"><button type="submit" class="btn btn-danger btn-sm" name="gosok" style="margin-top: -0px;">Hapus</button></a>

                          <a href="nambah1.php?id=<?= $row["id"]; ?>"><button type="submit" class="btn btn-primary btn-sm" name="nambah" style="float: right; margin-bottom: 20px;"><i class="fa fa-user-plus" style="padding-right: 5px;"></i>Tambah</button></a>
                        </td>
                      </tr>


                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                  </div>
                </div>
              </div>
            </div>



        </div>
        <!-- /#wrapper -->

      


    <!-- jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

      <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/chart.js"></script>

    <!-- datatables -->
    <script src="datatables/datatables.min.js"></script>

    <!-- generate datatable on our table -->
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>

        
</body>

</html>
