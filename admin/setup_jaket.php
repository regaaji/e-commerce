<?php
session_start();

require '../config/functions.php';


// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM tbl_barang WHERE nama LIKE '%jaket%'"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); 
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;



$tlb_barang = query("SELECT * FROM tbl_barang WHERE nama LIKE '%jaket%' LIMIT $awalData, $jumlahDataPerHalaman");


$jmbarang = query("SELECT SUM(harga) as harga FROM tbl_barang WHERE nama LIKE '%tas%'");

$jmbarang1 = query("SELECT SUM(harga) as harga FROM tbl_barang WHERE nama LIKE '%sepatu%'");

$jmbarang2 = query("SELECT SUM(harga) as harga FROM tbl_barang WHERE nama LIKE '%jaket%'");


// jika tombol cari ditekan
if (isset($_POST["cari"])) {
	$tlb_barang = cari($_POST["keyword"]);
}

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
	

	<title>Halaman Admin</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/sb-admin.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="css/plugins/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Page-Level Plugin CSS - Tables -->
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="../icon.png">

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
				<a class="navbar-brand" href="index.html">Admin Page</a>
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
                    <li class="active">
                    	<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-fw fa-female"></i>Woman<i class="fa fa-fw fa-caret-down"></i></a>
                    	<ul class="collapse list-unstyled" id="pageSubmenu">
                    		<li>
                    			<a href="setup_tas.php">Tas</a>
                    		</li>
                    		<li>
                    			<a href="setup_sepatu.php">Sepatu</a>
                    		</li>
                    		<li class="active">
                    			<a href="setup_jaket.php">Jaket</a>
                    		</li>
                    	</ul>
                    </li>
                    <li class="dropdown-header">Setup Administrator</li>
                    <li>
                        <a href="setup_admin.php"><i class="fa fa-user-circle fa-fw"></i>&nbsp;Admin</a>
                    </li>
                    <li>
                        <a href="setup_member.php"><i class="fa fa-address-book fa-fw"></i>&nbsp;Member</a>
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
							Jaket
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-female" style="padding-right: 10px"></i>Woman
							</li>
							<li class="active">
								Jaket
							</li>
						</ol>


								<!-- catatan admin -->
             <br><br>
             <div class="row">
             		<?php foreach( $jmbarang as $row ) :?>
                     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     	<div class="thumbnail" style="background-color: light; border: 1px solid light; padding: 10px; box-shadow: 5px 10px 8px #CFCFCF; ">
                            <div class="col-in row">
                                <div class="col-md-12 col-sm-12 col-xs-12"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-center text-muted vb">Total Dana Tas</h5>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="counter text-center m-t-15 text-danger fs" style="margin-top: -5px;">Rp.<?= number_format($row["harga"]) ;?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>


                    <?php foreach( $jmbarang1 as $row ) :?>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     	<div class="thumbnail" style="background-color: light; border: 1px solid light; padding: 10px; box-shadow: 5px 10px 8px #CFCFCF; ">
                            <div class="col-in row">
                                <div class="col-md-12 col-sm-12 col-xs-12"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-center text-muted vb">Total Dana Sepatu</h5>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="counter text-center m-t-15 text-danger fs" style="margin-top: -5px;">Rp.<?= number_format($row["harga"]) ;?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


                <?php foreach( $jmbarang2 as $row ) :?>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     	<div class="thumbnail" style="background-color: light; border: 1px solid light; padding: 10px; box-shadow: 5px 10px 8px #CFCFCF; ">
                            <div class="col-in row">
                                <div class="col-md-12 col-sm-12 col-xs-12"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-center text-muted vb">Total Dana Jaket</h5>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="counter text-center m-t-15 text-danger fs" style="margin-top: -5px;">Rp.<?= number_format($row["harga"]) ;?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


                </div>
                <br><br><br>
                <!-- /.row -->
					</div>
				</div>
				<!-- /.row -->

				<!-- page table -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading"><h3>Jaket</h3></div>

							<div class="panel-body">
								<center><h2 style="color: red;">Produk Jaket</h2></center><br>
								<div class="table-responsive">

									<form method="post" action="" class="form-inline" style="float: right;">
										<div class="form-group">
											<input type="text" name="keyword" class="form-control" placeholder="Masukkan Pencarian..." autofocus autocomplete="off"  size="30" /> 
											<button type="submit" name="cari" class="btn btn-primary">Cari...</button>
										</div>
									</form>
									<br><br><br>
									
								<table id="myTable" class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th scope="col" class="text-center">No.</th>
											<th scope="col" class="text-center">Nama Produk</th>
											<th scope="col" class="text-center">Harga</th>
											<th scope="col" class="text-center">Stock</th>
											<th scope="col" class="text-center">Keterangan</th>
											<th scope="col" class="text-center">Gambar</th>
											<th scope="col" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbdy>

										<?php $i = 1; ?>
										<?php foreach( $tlb_barang as $row ) : ?>
											<tr class="text-center">
												<td><?= $i; ?></td>
												<td><?= $row["nama"] ;?></td>
												<td>Rp.<?= number_format($row["harga"]) ;?></td>
												<td><?= $row["stock"] ;?></td>
												<td><?= $row["keterangan"] ;?></td>
												<td><img src="../img/<?= $row["gambar"] ;?>" width="90px"></td>
												<td>
													<a href="tambah.php?id=<?= $row["id"]; ?>"><button type="submit" class="btn btn-primary btn-sm" name="submit">Tambah</button></a>
																							
													<a href="ubah.php?id=<?= $row["id"]; ?>"><button type="submit" class="btn btn-warning btn-sm" name="ubah">Ubah</button></a>
	
													<a href="hapus.php?id=<?= $row["id"]; ?>"><button type="submit" class="btn btn-danger btn-sm" name="hapus" style="margin-top: 4px;">Hapus</button></a>
												</td>
											</tr>
											<?php $i++; ?>
										<?php endforeach; ?>

									</tbody>
									
								</table>
								<!-- navigasi -->
										<ul class="pagination">

											<?php if( $halamanAktif > 1 ) : ?>
											<li><a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a></li>
											<?php endif; ?>

											<?php for($i = 1; $i <= $jumlahHalaman; $i++) :?>
												<?php if( $i == $halamanAktif ) : ?>
											<li class="active"><a href="?halaman=<?= $i;  ?>"><?= $i; ?></a></li>
												<?php else: ?>
													<li><a href="?halaman=<?= $i;  ?>"><?= $i; ?></a></li>

												<?php endif; ?>
											<?php endfor; ?>

											<?php if( $halamanAktif < $jumlahHalaman ) : ?>
											<li><a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a></li>
											<?php endif; ?>

											<a href="print2.php" style="margin-left: 20px;"><button class="btn btn-danger"><i class="fa fa-print" style="padding-right: 5px;"></i>Cetak</button></a>

											<form method="post" action="excel2.php" style="margin-left: 270px; margin-top: -34px;">
												<button type="submit" name="export" class="btn btn-success"><i class="fa fa-file-excel-o" style="padding-right: 5px;"></i>Export</button>
											</form>
											
										</ul>
								<!-- tutup navigasi -->

							</div>
						</div>

						</div>
					</div>

				</div>



			</div>
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="js/plugins/morris/raphael.min.js"></script>
		<script src="js/plugins/morris/morris.min.js"></script>
		<script src="js/plugins/morris/morris-data.js"></script>

		<!-- Flot Charts JavaScript -->
		<!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
		<script src="js/plugins/flot/jquery.flot.js"></script>
		<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
		<script src="js/plugins/flot/jquery.flot.resize.js"></script>
		<script src="js/plugins/flot/jquery.flot.pie.js"></script>
		<script src="js/plugins/flot/flot-data.js"></script>

		<!-- Page-Level Plugin Scripts - Tables -->
		<script src="datatable/jquery.dataTables.min.js"></script>
		<script src="datatable/dataTable.bootstrap.min.js"></script>
		<!-- tooltip -->
		<script>
			$('.tooltip-demo').tooltip({
				selector: "[data-toggle=tooltip]",
				container: "body"
			})
		</script>

			<!-- generate datatable on our table -->
			<script>
				$(document).ready(function(){
		//inialize datatable
		$('#myTable').DataTable();

	    //hide alert
	    $(document).on('click', '.close', function(){
	    	$('.alert').hide();
	    })
	});
	</script>

	</body>

	</html>

