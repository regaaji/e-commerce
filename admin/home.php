<?php
session_start();
require '../config/functions.php';


$query=mysqli_query($conn, "SELECT * FROM tbl_barang WHERE nama LIKE '%baju%'");
$hasil=mysqli_num_rows($query);

$query=mysqli_query($conn, "SELECT * FROM tbl_barang WHERE nama LIKE '%celana%'");
$hasil1=mysqli_num_rows($query);

$query=mysqli_query($conn, "SELECT * FROM tbl_barang WHERE nama LIKE '%tas%'");
$hasil2=mysqli_num_rows($query);

$query=mysqli_query($conn, "SELECT * FROM tbl_barang WHERE nama LIKE '%sepatu%'");
$hasil3=mysqli_num_rows($query);

$query=mysqli_query($conn, "SELECT * FROM tbl_barang WHERE nama LIKE '%jaket%'");
$hasil4=mysqli_num_rows($query);


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

    <!-- chart -->
    <script type="text/javascript" src="js/canvasjs.min.js"></script>



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
                    <li class="active">
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="dropdown-header">Setup Konten</li>
                    <li>
                        <a href="beranda.php"><i class="fa fa-fw fa-home"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-fw fa-male"></i>Man<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul class="collapse list-unstyled" id="pageSubmenu1">
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
                    <li>
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
                            Dashboard Admin
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- page table -->
                <div id="page-wrapper">
                    <div class="row col-lg-12">
                        <div class="panel panel-default" style="margin-bottom: 100px;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-comments" style="padding-right: 10px;"></i>Komentar Terkini</h3>
                            </div>
                            <div class="panel-body">
                            <div id="komen" style="overflow: auto; height: 200px; width: 100%; margin-right: 100px;">
                              <?php
                              require_once '../function.php';


                              $dbconn = mysqli_connect('localhost', 'root', '', 'gayadistro');
                              if(!$dbconn) {
                                  $exitmsg = "There seems to be a problem, sorry for the inconvenience. We should be back shortly.";
                                  exit($exitmsg);
                              }

                              if (isset($_GET['id'])) {
                                  $id = intval($_GET['id']);
                              } else {
                                  $id = 0;
                              }

                              $query = "SELECT * FROM article WHERE id={$id}";
                              $result = mysqli_query($dbconn, $query);
                              $content = mysqli_fetch_array($result);

                              echo "<div>{$content['title']}<br /><br />";
                              echo "{$content['body']}</div><br /><br />";

// komentar
                              $alert = "<center><h2 style=' margin-top: -100px;'><span></span>";

                              if(isset($_POST['kirim'])) {
                                  $error = false;
                                  $nama = trim($_POST['nama']);
                                  $email = $_POST['email'];
                                  $pesan = trim($_POST['pesan']);
                                  $alert .= "<br><br><span style='color:#c00; font-size: 20px;'>";
                                  if (strlen($nama) < 2 || strlen($pesan) < 2) {
                                    $alert .= "Mohon tulis nama dan komentar dengan benar.<br>";
                                    $error = true;
                                }
                                if (!$email) {
                                    $alert .= "Alamat e-mail anda tidak valid.<br>";
                                    $error = true;
                                }
                                if (verify_code($_POST['randomcode'], $_POST['code'])) {
                                    $alert .= "Kode salah.<br>";
                                    $error = true;
                                }
                                if (!$error) {
                                    $nama = strip_tags($nama);
                                    $pesan = strip_tags($pesan);
                                    mysqli_query($dbconn, "INSERT INTO comment (article_id, name, email, comment, date) VALUES ({$id}, '{$nama}', '{$email}', '{$pesan}', NOW() )");

                                    unset($_POST['nama'],$_POST['email'],$_POST['pesan']);

                                    $alert .= "Terima kasih atas komentar anda..";
                                }
                            }

                            $alert .= "</span></h2></center><br>";




                            $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
                            $email = isset($_POST['email']) ? $_POST['email'] : "";
                            $pesan = isset($_POST['pesan']) ? $_POST['pesan'] : "";

                            echo "<a name='postkomentar'></a> {$alert}";

                            $temp = create_code();
                            $code1 = $temp[0];
                            $code2 = $temp[1];
                               
                              $query = mysqli_query($dbconn, "SELECT * FROM comment WHERE article_id={$id} ORDER BY date");
                              while ($row = mysqli_fetch_array($query)) {
                                  $nama = $row['name'];
                                  $komentar = $row['comment'];
                                  $datestamp = $row['date'];

                                  ?>
                                  <div class="well" style="padding-bottom: 0px;">
                                          <?php
                                          echo "<p class='text-info' style='font-size: 20px; font-family: verdana;'><strong>".$nama."</strong> <em>says</em>&nbsp;&nbsp;:";
                                          ?>
                                          <?php
                                          echo "<br><small>".$datestamp."</small></p>";
                                          ?>
                                          <?php
                                          echo "<p class='text-secondary' style='font-size: 15px;'><em>".$komentar."</em></p><br>";
                                          echo "<br />";?>

                                </div>
                                    <?php
                                      }

                                      ?>
                                 
                                     
                            </div>
                        </div>
                        </div>
                    </div>
                    
            </div>
            <!-- /.container-fluid -->
            <br><br><br><br>
              <div class="row">
                      <div class="col-md-12">
                            <div id="chartContainer" style="height: 300px; width: 100%;">
                      </div> 
                  </div>
        </div>

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

      

        <script >
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    exportEnabled: true,
    animationEnabled: true,
    title: {
        text: "Grafik Stock Barang" 
    },
    subtitles: [{
      text: "Pada Tanggal <?= date('Y-m-d h:i:sa') ?>"
    }],
    axisX: {
      title: "States"
    },
    data: [{
        type: "pie",
        startAngle: 25,
        toolTipContent: "<b>{label}</b>: {y}%",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - {y}%",
        dataPoints: [
        { y: <?= $hasil; ?>, label: "Baju" },
        { y: <?= $hasil1; ?>, label: "Celana" },
        { y: <?= $hasil2 ?>, label: "Tas" },
        { y: <?= $hasil3; ?>, label: "Sepatu" },
        { y: <?= $hasil4; ?>, label: "Jaket" }
        ]
    }]
});
            chart.render();

        }

        var d = new Date();
        document.getElementById("demo").innerHTML = d.toUTCString();
    </script>

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/canvasjs.min.js"></script>

        
</body>

</html>
