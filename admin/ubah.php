<?php
session_start();
require '../config/functions.php';

// ambil data di url
$id = $_GET["id"];

// query data berdasarkan id
$mhs = query("SELECT * FROM tbl_barang WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0  ) {
		echo "
			   <script>
			   	alert('Data berhasil diubah');
			   	document.location.href = 'beranda.php';
			   </script>
			   ";
	} else {
		echo "
			   <script>
			   	alert('Data gagal diubah');
			   	document.location.href = 'beranda.php';
			   </script>
			   ";
	}

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

	 <!-- Page-Level Plugin CSS - Tables -->
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="../icon.png">

    <style>
    	form{
    		height: 200vh;
    	}
    </style>
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
					<li class="active">
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

				
				<!-- page table -->
				<form method="post">
					<center><h2 style="color: green;">Ubah Produk</h2></center><br>
                  <fieldset>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                        	<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                          <label>Nama Produk:</label>
                          <input class="form-control" name="nama" type="text" value="<?= $mhs["nama"] ?>">
                          <br>
                           <label>Harga:</label>
                          <input class="form-control" name="harga" type="text" value="<?=$mhs["harga"]?>">
                          <br>
                          	<label>Stock:</label>
                          <input class="form-control" name="stock" type="text" value="<?= $mhs["stock"] ?>">
                          <br>
                          	<label>Keterangan:</label>
                          <div class="form-group">
                          	<textarea name="keterangan"  id="ckeditor"><?= $mhs["keterangan"] ?></textarea>
                          </div>
                          <br>
                          <label>Gambar:</label>
                          <input class="form-control" name="gambar" type="file" value="<?= $mhs["gambar"] ?>">
                          <br>
                          <div class="btn-group">
                            <button type="submit" name="submit" class="btn btn-warning">Ubah</button>
                          </div>
                        </div>
                      </div>
                    

                    </fieldset>

                </form>
					
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

		<script src="ckeditor/ckeditor.js"></script>


		<!-- tooltip -->
		<script>
			$('.tooltip-demo').tooltip({
				selector: "[data-toggle=tooltip]",
				container: "body"
			})
		</script>
		<script>
			window.onload = function(){
				CKEDITOR.replace( 'ckeditor' );
			}
		</script>
	</body>

	</html>

