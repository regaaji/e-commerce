
<?php 

require  'config/functions.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- start: Meta -->
  <meta charset="utf-8">
  <title>GayaDistro Shop</title> 
  
  
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- end: Mobile Specific -->
  

  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- start: CSS --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
  <link rel="stylesheet" type="text/css" href="admin/font-awesome/css/font-awesome.css">
  <link rel="shortcut icon" href="icon.png">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <!-- end: CSS -->

  <style>
    /* Notice
    ====================================================================== */

    .hero-unit {
      border-left: 4px solid #FF9416;
      padding: 13px 13px 13px 15px;
      font-style: italic;
      margin: 20px auto;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      border-radius: 0px;
      font-size: 14px !important;
    }
      /* Page Title
      =================================================================== */

      #page-title-icon {
        background: #fff;
        height: 48px;
        width: 48px;
        -webkit-border-radius: 50em;
        -moz-border-radius: 50em;
        border-radius: 50em;
        padding: 4px;
        margin-left: -16px;
        margin-top: -18px;
        position: relative;
        z-index: 10;
        float: left;

      }

      #page-title-icon-inner {
        background: #ffd35f;
        height: 48px;
        width: 48px;
        -webkit-border-radius: 50em;
        -moz-border-radius: 50em;
        border-radius: 50em;
        margin-left: -52px;
        margin-top: -14px;
        position: relative;
        z-index: 30;
        float: left;
      }

      #page-title {
        background: url(img/bg-grey2.png);
        display: block;
        margin-top: 50px;
        margin-bottom: 25px;
        position: relative;
        z-index: 20;
        border-bottom: 5px solid #f6f6f6;
      }

      #page-title-inner {
        background: rgba(226, 151, 50, 0.9);
        -webkit-box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);
        -moz-box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);
        box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);
        padding: 10px;
      }

      #page-title i {
        margin: -6px 2px -5px -18px;
        padding: 0px;
      }

      #page-title h2 {
        display: inline-block;
        font-family: "Boogaloo" !important;
        color: #fff;
        padding: 2px 20px 5px 20px;
        font-size: 30px;
      }

      #page-title span {
        color: #555;
      }

      /*popup cart*/
      /* jwpopup box style */
      .jwpopup {
        display: none;
        position: fixed;
        z-index: 999999;
        padding-top: 110px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.7);
      }
      .jwpopup-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        max-width: 500px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
      }

      .jwpopup-head {
        font-size: 11px;
        padding: 1px 16px;
        color: white;
        background: #006faa; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(#006faa, #002c44); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#006faa, #002c44); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#006faa, #002c44); /* For Firefox 3.6 to 15 */
        background: linear-gradient(#006faa, #002c44); /* Standard syntax */
      }
      .jwpopup-main {
        margin-left: 50px;
        margin-right: 50px;
      }
      .jwpopup-foot {
        font-size: 12px;
        padding: .5px 16px;
        color: #ffffff;
        background: #006faa; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(#006faa, #002c44); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#006faa, #002c44); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#006faa, #002c44); /* For Firefox 3.6 to 15 */
        background: linear-gradient(#006faa, #002c44); /* Standard syntax */
      }

      /* tambahkan efek animasi */
      @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
      }

      @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
      }

      /* style untuk tombol close */
      .close {
        margin-top: 7px;
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover, .close:focus {
        color: #999999;
        text-decoration: none;
        cursor: pointer;
      }

      /*FOOTER*/

     .newsletter-follow {
      text-align: center;
      margin-top: -20px;
      margin-left: -80px;
    }

     .newsletter-follow li {
      display: inline-block;
      margin-right: 5px;
    }

    .newsletter-follow li:last-child {
      margin-right: 0px;
    }

     .newsletter-follow li a {
      position: relative;
      display: block;
      width: 40px;
      height: 40px;
      line-height: 40px;
      border: 1px solid #15161D;
      background-color: #E4E7ED;
      -webkit-transition: 0.2s all;
      transition: 0.2s all;
    }


     .newsletter-follow li a:hover,  .newsletter-follow li a:focus {
      background-color: #15161D;
      color: #D10024;
    }
  </style>  
</head>
<body>

   <!-- navbar -->

    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">GayaDistro Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Man<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="baju.php">Baju</a></li>
            <li><a href="celana.php">Celana</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Woman<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="tas.php">Tas</a></li>
            <li><a href="sepatu.php">Sepatu</a></li>
            <li><a href="jaket.php">Jaket</a></li>
          </ul>
        </li>
        <li><a href="article.php">Testimoni</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li>
            <a href="javascript:void(0);" id="jwpopupLink">
                <i class="fa fa-shopping-cart" style="padding-right: 10px"></i>
                Cart

                <?php 
                if(!empty($_SESSION["items"])):
                  $count = $_SESSION["items"];

                  ?>

                <span class="badge" style="margin-left: 10px">
                  <?= count($count); ?>
                    
                  </span>

               <?php endif; ?>

            </a>
          
          </li>
        <li id="show_login">
          <?php 

          if(isset($_SESSION['username'])){

            ?>
            
            <a href="profil.php" class="element place-right">Selamat datang, <?php echo "$_SESSION[username]"; ?></a>

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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
  <!--start: Header -->
  <header>
    
    <!--start: Container -->
  <div class="container">
      
      <!--start: Row -->
      <div class="row">
          
        
          
      </div>
      <!--end: Row -->
      
    </div>
    <!--end: Container-->     
      
  </header>
  <!--end: Header-->
  
  <!-- start: Page Title -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="fa fa-usd" style="padding-right: 10px"></i>Checkout Keranjang</h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
  <!-- end: Page Title -->
  
  <!--start: Wrapper-->
  <div id="wrapper">

    <!-- start: Container -->
    <div class="container">

      <!-- start: Table -->
      <div class="title"><h3>Form Checkout</h3></div>
      <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
      <div class="hero-unit">Total Belanja Anda Rp. <?php echo abs((int)$_GET['total']); 
      ?>,-</div>

      <!-- alert -->
      <div class="alert alert-danger fade in">

        <a href="#" data-dismiss="alert">&times;</a>

        <strong><i class="fa fa-warning" style="padding-right: 5px;"></i>Total Bayar</strong>  <a href="#" class="alert-link"></a> harus diisi di form 

      </div>

      <?php 
    $comot=mysqli_query($conn, "SELECT * FROM tb_hasil");
    $isi_tbl=mysqli_fetch_assoc($comot); 
    

    ?>
      <form id="formku" action="print.php" method="post">
        <table class="table table-condensed">
          <input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>" class="form-control">
          <tr>
            <td><label for="nama">Nama</label></td>
            <td>
                <input name="nama" type="text"  minlength="6" id="nama" required size="40" autofocus />
            </td>
          </tr>
          <tr>
            <td><label for="username">Username</label></td>
            <td><input name="username" type="text" minlength="6" id="username" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="password">Password</label></td>
            <td><input name="password" type="password" class="required" minlength="6" id="password" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="email">Email</label></td>
            <td><input name="email" type="text" id="email" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="alamat">Alamat</label></td>
            <td><input name="alamat" type="text" id="alamat"  required size="40"/></td>
          </tr>
          <tr>
            <td><label for="pos">Kode Pos</label></td>
            <td><input name="pos" type="text" minlength="5" maxlength="5" id="pos" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="kota">Kota</label></td>
            <td><input name="kota" type="text" minlength="6" id="kota" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="tlp">No telepon</label></td>
            <td><input name="tlp" type="text" minlength="12" id="tlp" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="norek">No Rekening</label></td>
            <td><input name="norek" type="text"  minlength="12" id="norek" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="narek">Nama Rekening</label></td>
            <td><input name="narek" type="text"  minlength="6" id="narek" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="bayar">Total Bayar</label></td>
            <td><input name="bayar" type="text" id="bayar" required size="40"/></td>
          </tr>
          <tr>
            <td><label for="bank">Bank</label></td>
            <td><select name="bank" required>
              <option></option>
              <option value="Mandiri">Mandiri</option>
              <option value="BNI">BNI</option>
              <option value="CIMB">CIMB</option>
              <option value="BCA">BCA</option>
              <option value="Bank Jabar">Bank Jatim</option>
              <option value="Danamon">Danamon</option>
              <option value="BRI">BRI</option>
              <option value="Permata">Permata</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" name="finish" class="btn btn-md btn-info">Simpan Data</button>
           <a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
        </tr>
      </table>
    </form>


  </div>
  <!-- end: Container -->

</div>
<!-- end: Wrapper  -->      
  <!-- --------------------------------------------------Akhir Header-------------------------------------------------- -->
    <!-- trigger the jwpopup -->
    <!-- jwpopup box -->
    <div id="jwpopupBox" class="jwpopup">
      <!-- jwpopup content -->
      <div class="jwpopup-content">
        <div class="jwpopup-head">
          <span class="close">×</span>
          <h2>Keranjang Anda</h2>
        </div>
        <table class="table table-hover table-condensed table-bordered">
                    <tr>
                    <th><center>No</center></th>
          <th><center>Nama</center></th>
          <th><center>Quantity</center></th>
          <th><center>Sub Total</center></th>
        </tr>
                    <?php
        //MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($conn, "SELECT id, nama, harga FROM tbl_barang WHERE id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['harga'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                <tr>
                <td><center><?php echo $no ++; ?></center></td>
                <td><center><?php echo $data['nama']; ?></center></td>
                <td><center><?php echo number_format($val); ?> Pcs</center></td>
                <td><center>Rp. <?php echo number_format($jumlah_harga); ?></center></td>
                </tr>
                
          <?php
                    //mysql_free_result($query);      
            }
              //$total += $sub;
            }?>
                        <?php
        if($total == 0){ ?>
          <td colspan="4" align="center"><?php echo "Keranjang Kosong!"; ?></td>
        <?php } else { ?>
          
                        <td colspan="4" style="font-size: 18px;"><b><div class="pull-right">Total Belanja Anda : Rp. <?php echo number_format($total); ?>,- </div> </b></td>
          
      <?php }
        ?>
                </table> 
            </div>

        </div>
      </div>
    </div>
    <!-- end popup cart -->



    <!-- FOOTER -->
    <footer id="footer">
      <!-- top footer -->
      <div class="section">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">About Us</h3>
                <p>GayaDistro adalah toko online yang bergerak di bidang fasion, sasaran kami semua kalangan baik muda maupun tua, mulai dari anak - anak dan orang dewasa..</p>
                <ul class="footer-links">
                  <li><a href="#"><i class="fa fa-map-marker"></i>Karangan, Trenggalek</a></li>
                  <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                  <li><a href="#"><i class="fa fa-envelope-o"></i>regaajiprayogo@email.com</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Categories</h3>
                <ul class="footer-links">
                  <li><a href="#">Baju</a></li>
                  <li><a href="#">Celana</a></li>
                  <li><a href="#">Tas</a></li>
                  <li><a href="#">Sepatu</a></li>
                  <li><a href="#">Jaket</a></li>
                </ul>
              </div>
            </div>

            <div class="clearfix visible-xs"></div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Information</h3>
                <ul class="footer-links">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Orders and Returns</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Follow Us</h3>
                <ul class="footer-links">
                  <center><ul class="newsletter-follow">
                    <li>
                      <a href="#"><i class="fa fa-facebook" style="margin-left: 10px;"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter" style="margin-left: 10px;"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-instagram" style="margin-left: 10px;"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest" style="margin-left: 10px;"></i></a>
                    </li>
                  </ul></center>
                </ul>
              </div>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /top footer -->

      <!-- bottom footer -->
      <div id="bottom-footer" class="section">
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-12 text-center">
              <ul class="footer-payments">
                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
              </ul>
              <span class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" style="color: #f66767;"></i> by <a href="https://facebook.com/regaajiprayogo" target="_blank">Rega Aji Prayogo</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </span>
            </div>
          </div>
            <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->



</body>


    <script>
      function konfirmasiDulu(){
        alert("Barang sudah masuk keranjang");
      }
    </script>

    <!-- javascript popup cart -->
    <script>
      // untuk mendapatkan jwpopup
      var jwpopup = document.getElementById('jwpopupBox');

      // untuk mendapatkan link untuk membuka jwpopup
      var mpLink = document.getElementById("jwpopupLink");

      // untuk mendapatkan aksi elemen close
      var close = document.getElementsByClassName("close")[0];

      // membuka jwpopup ketika link di klik
      mpLink.onclick = function() {
        jwpopup.style.display = "block";
      }

      // membuka jwpopup ketika elemen di klik
      close.onclick = function() {
        jwpopup.style.display = "none";
      }

      // membuka jwpopup ketika user melakukan klik diluar area popup
      window.onclick = function(event) {
        if (event.target == jwpopup) {
          jwpopup.style.display = "none";
        }
      }
    </script>

   

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.12.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>

<script def src="js/custom.js"></script>

<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
<!-- end: Java Script -->

</body>
</html>