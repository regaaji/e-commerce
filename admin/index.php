<?php 
session_start();

require  '../config/functions.php';
if (isset($_POST["login"]) ) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn,"SELECT * FROM tb_admin WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

      $_SESSION['username']=$username;
      $_SESSION['password']=$password;
    
    // cek password
    $row = mysqli_fetch_assoc($result);
    if ( password_verify($password, $row["password"])){
      header("Location:beranda.php");
      exit;  
    }
    
  }

  $error = true;

}




 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GayaDistro Shop</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../css/custom.css">
  <!-- favicon -->
    <link rel="shortcut icon" href="../icon.png">
</head>
<body>
  <!-- container -->
  <div class="container" style="margin-top: 150px;">
    <!-- row -->
    <div class="row">
      <!--col  -->
      <div class="col-md-4 col-md-offset-4">
        <!-- panel default -->
        <div class="panel panel-default">
          <!-- panel body -->
          <div class="panel-body">

            <?php if(isset($error) ) : ?>
              <p style="color: red";>Username / Password salah</p>
            <?php endif; ?>
            <form action="" method="post">
              <!-- form group -->
              <div class="form-group">
                <input type="text" name="username" class="form-control" autofocus placeholder="Enter Username...">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password...">
              </div>
              <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary btn-lg btn-block" value="Login">
              </div>
            </form>
          </div>
          <!-- gambar kunci -->
          <div class="lock"><i class="fa fa-lock fa-3x"></i></div>
          <!-- label login form -->
          <div class="label">Login Admin</div> 
          <div class="label2">Login Admin</div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>