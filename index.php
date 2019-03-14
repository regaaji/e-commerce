<?php 
require  'config/functions.php';
$tbl_barang = query("SELECT * FROM tbl_barang ORDER BY id LIMIT 3");
$tb_barang = query("SELECT * FROM tbl_barang WHERE stock LIKE '%10%'");
$tl_barang = query("SELECT * FROM tbl_barang WHERE stock LIKE '%40%' LIMIT 3");
$t_barang = query("SELECT * FROM tbl_barang WHERE stock LIKE '%50%' LIMIT 3");
$tlb_barang = query("SELECT * FROM tbl_barang WHERE stock LIKE '%60%' LIMIT 3");



if (!isset($_SESSION)) {
        session_start();
    }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GayaDistro Shop</title>


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style1.css"/>

    <link rel="stylesheet" type="text/css" href="admin/font-awesome/css/font-awesome.css">
   

   <link rel="stylesheet" type="text/css" href="css/style.css">

   <link rel="shortcut icon" href="icon.png">
   <style>

   /*parallax*/
     .rubypedia-parallax { 
  background-image: url("img/baju.jpg");
  height: 500px; 
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }


  /*label baru*/

 .product-label {
  position: absolute;
  top: 15px;
  right: 15px;
}

 .product-label>span {
  border: 2px solid;
  padding: 2px 10px;
  font-size: 12px;
}

 .product-label>span.new {
  background-color: #CAD100;
  border-color: #CAD100;
  color: #FFF;
}



/*popup cart*/
/* jwpopup box style */
.jwpopup {
    display: none;
    position: fixed;
    z-index: 10;
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
  font-size: 5px;
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

  /*man*/
    .man{
      margin-top: -15%;
      margin-bottom: -140px;
    }

    .man hr{
      width: 250px;
      border-top: 3px solid #999;
    }


    /*woman*/
    .woman{
      margin-top: 15px;
    }

    .woman hr{
      width: 250px;
      border-top: 3px solid #999;
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

    /*go to top*/
    .to_top{
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid #000;
    position: fixed;
    right: 10px;
    background-color: red;
    color: #fff;
    cursor: pointer;
    bottom: 10px;
    font-weight: bold;
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

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-lg" style="margin-right: 10px"></i><span class="caret"></span></a>
              <ul class="dropdown-menu">
                                
               <li><a href="profil.php"><i class="fa fa-user" style="padding-right: 10px"></i>Profil</a></li>

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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <!-- parallax -->
    <div class="rubypedia-parallax">
      <div class="container" style="text-align: center;padding-top: 160px">
        <div class="row">
          <span class="border" style="margin-left: 300px; color: white;padding: 18px;font-weight: bold; font-family: verdana; font-size: 25px;letter-spacing: 5px;">Shop</span><br>
          <span class="border" style="font-weight: bold; color: white; padding: 18px;font-size: 60px;letter-spacing: 10px;">GayaDistro</span><br><br><br>
          <span class="border" style="background-color: #111;color: #fff;padding: 18px;font-size: 25px;letter-spacing: 10px;">Berkualitas dan Murah</span>
        </div>
      </div>
    </div>

    <div class="bs-callout bs-callout-primary">
      <h4>GayaDistro Shop</h4>
      <p>
          Kami adalah distro online terlengkap dan terpercaya, dengan harga terjangkau anda sudah dapat memiliki produk kami. Selamat Berbelanja Customer..
        </p>
            <p><a class="btn btn-primary btn-large" href="baju.php">Mulai Berbelanja &raquo;</a></p>
    </div>


    


    <!-- Home -->
    <section class="home" id="home">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Produk Terbaru</h2>
            <hr>
          </div>
        </div>
        <br>


        <?php $i = 1; ?>
        <?php foreach( $tbl_barang as $row ) : ?>

      <div class="col-md-4">
          <div class="span4">
            <div class="icons-box">
              <div class="title"><h3><?php echo $row['nama']; ?></h3></div>
              <img src="img/<?php echo $row['gambar']; ?>" />
              <div class="product-label">
                          <span class="new">BARU</span>
                        </div>
              <div><h4 class="product-price" style="margin-top: 10px;">Rp.<?php echo number_format($row['harga']);?></h4></div>
          <!--  <p>
            
          </p> -->
          <div class="clear"><a href="detailproduk.php?kd=<?php echo $row['id'];?>" class="btn btn-md btn-warning">Detail</a> <a href="detailproduk.php?kd=<?php echo $row['id'];?>" class="btn btn-md btn-info">Beli &raquo;</a></div>
          
        </div>
      </div>        
        
    </div>
         

        
        

        <?php $i++; ?>
      <?php endforeach; ?>


       
      </div>
    </section>



     <!-- Man -->
    <section class="man" id="man">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Man</h2>
            <hr>
          </div>
        </div>

        <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-2">


                    <?php $i = 1; ?>
                    <?php foreach( $tb_barang as $row ) : ?>
                    <!-- product -->
                    <div class="product" >
                      <div class="product-img">
                        <img src="img/<?php echo $row['gambar']; ?>" alt="" style="width: 70%; margin-left: 50px;">
                      </div>
                      <div class="product-body">
                        <p class="product-category">Man</p>
                        <h3 class="product-name"><a href="detailproduk.php?kd=<?php echo $row['id'];?>"><?php echo $row['nama']; ?></a></h3>
                        <h4 class="product-price">Rp.<?php echo number_format($row['harga']);?></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                      </div>
                     
                    </div>
                    <!-- /product -->



                    <?php $i++; ?>
                  <?php endforeach; ?>

                    
                  </div>
                  <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        
      </div>
    </section>
    <br>

    <!-- woman -->
    <div class="woman" id="woman">
        <div class="section">
          <!-- container -->
          <div class="container">

            <div class="col-md-12">
                <h2 class="text-center">Woman</h2>
                <hr>
                <br>
              </div>
            <!-- row -->
            <!-- <div class="row"> -->
              <div class="col-md-4">
                <div class="section-title">
                  <h4 class="title">Jaket</h4>
                  <div class="section-nav">
                    <a href="jaket.php">Lihat Jaket...</a>
                  </div>
                </div>

                    <?php $i = 1; ?>
                    <?php foreach( $tlb_barang as $row ) : ?>
                    <!-- product widget -->
                    <div class="product-widget">
                      <div class="product-img">
                        <img src="img/<?php echo $row['gambar']; ?>" style="width: 100%; margin-right: 50px;">
                      </div>
                      <div class="product-body">
                        <p class="product-category">Woman</p>
                        <h3 class="product-name"><a href="detailproduk.php?kd=<?php echo $row['id'];?>"><?php echo $row['nama']; ?></a></h3>
                        <h4 class="product-price">Rp.<?php echo number_format($row['harga']);?></h4>
                      </div>
                    </div>
                    <!-- product widget -->
                     <?php $i++; ?>
                      <?php endforeach; ?>
              </div>

              <div class="col-md-4">
                <div class="section-title">
                  <h4 class="title">Sepatu</h4>
                  <div class="section-nav">
                    <a href="sepatu.php">Lihat Sepatu...</a>
                  </div>
                </div>

                
                
                   <?php $i = 1; ?>
                    <?php foreach( $t_barang as $row ) : ?>
                    <!-- product widget -->
                    <div class="product-widget">
                      <div class="product-img">
                        <img src="img/<?php echo $row['gambar']; ?>" style="width: 100%; margin-right: 50px;">
                      </div>
                      <div class="product-body">
                        <p class="product-category">Woman</p>
                        <h3 class="product-name"><a href="detailproduk.php?kd=<?php echo $row['id'];?>"><?php echo $row['nama']; ?></a></h3>
                        <h4 class="product-price">Rp.<?php echo number_format($row['harga']);?></h4>
                      </div>
                    </div>
                    <!-- product widget -->
                     <?php $i++; ?>
                      <?php endforeach; ?>
                               
              </div>


              <div class="col-md-4">
                <div class="section-title">
                  <h4 class="title">tas</h4>
                  <div class="section-nav">
                    <a href="tas.php">Lihat Tas...</a>
                  </div>
                </div>

                    <?php $i = 1; ?>
                    <?php foreach( $tl_barang as $row ) : ?>
                    <!-- product widget -->
                    <div class="product-widget">
                      <div class="product-img">
                        <img src="img/<?php echo $row['gambar']; ?>" style="width: 100%; margin-right: 40px;">
                      </div>
                      <div class="product-body">
                        <p class="product-category">Woman</p>
                        <h3 class="product-name"><a href="detailproduk.php?kd=<?php echo $row['id'];?>"><?php echo $row['nama']; ?></a></h3>
                        <h4 class="product-price">Rp.<?php echo number_format($row['harga']);?></h4>
                      </div>
                    </div>
                    <!-- product widget -->
                     <?php $i++; ?>
                      <?php endforeach; ?>            
                
              </div>

            <!-- </div> -->
            <!-- /row -->
          </div>
          <!-- /container -->
        </div>
    </div>
    <!-- /SECTION -->


     <!-- --------------------------------------------------Akhir Header-------------------------------------------------- -->
    <!-- trigger the jwpopup -->
    <!-- jwpopup box -->
    <div id="jwpopupBox" class="jwpopup">
      <!-- jwpopup content -->
      <div class="jwpopup-content">
        <div class="jwpopup-head">
          <span class="close">×</span>
          <p style="font-size:25px;">Keranjang Belanja</p>
        </div>
        <table class="table table-hover table-condensed table-bordered">
          <tr>
            <th><center>No</center></th>
            <th><center>Item</center></th>
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
                <p><div align="right">
            <a href="detail.php" class="btn btn-primary">&raquo Details Keranjang &laquo</a>
            </div></p>
            </div>

        </div>
      </div>
    </div>
    <!-- end popup cart -->

    <!-- go to top -->
    <span class="to_top"><i class="fa fa-arrow-up"></i></span>
    <!-- end go to top -->

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


 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>

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


    <!-- scroll top -->

    <script type="text/javascript">
      $(function(){
        $('.to_top').hide().on('click', function(){
          $('body,html').animate({scrollTop : 0}, 800);
        });
        $(window).on('scroll', function(){
          if($(this).scrollTop() > 500){
            $('.to_top').show();
          }else{
            $('.to_top').hide();
          }
        });
      });
    </script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>