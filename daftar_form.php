<?php 
require  'config/functions.php';

if (isset($_POST["register"]) ) {
  if (registrasi($_POST) > 0 ) {
    echo "<script>
        alert('User baru ditambahkan');
        document.location.href = 'login_form.php';
       </script>";
  } else {
    echo mysqli_error($conn);
  }
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

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> --> 

    <link rel="stylesheet" type="text/css" href="admin/font-awesome/css/font-awesome.css">
    <link rel="shortcut icon" href="icon.png">

   

  </head>
  <body>

      <div class="container-fluid" style="margin-top: 50px;">


        <!-- page table -->
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
              <div class="panel-heading"><h4 class="text-center"><i class="fa fa-user" style="padding-right: 10px"></i>Customer Signup Form</h4></div>
              <div class="panel-body">
                <form action="" method="post">
                  <fieldset>
                    <div class="row">
                      <!-- <div class="col-md-4">
                        <div class="form-group">
                          <label>No.</label>
                          <input class="form-control" name="id" type="text" value="">
                        </div>
                      </div> -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name :</label>
                          <input class="form-control" name="username" type="text" value="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Last Name :</label>
                          <input class="form-control" name="username2" type="text" value="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email :</label>
                          <input class="form-control" name="email" type="email" value="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Password :</label>
                          <input class="form-control" name="password" type="password" value=""required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Re-Password :</label>
                          <input class="form-control" name="password2" type="password" value="" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Telepon :</label>
                          <input class="form-control" name="tlp" type="text" value="" minlength="12" required="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat :</label>
                          <input class="form-control" name="alamat" type="text" value="" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="btn-group btn-group-justified">
                          <div class="btn-group">
                            <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
                          </div>
                        </div>
                      </div>

                    </fieldset>

                </form>

              </div>



            </div>
          </div>

        </div>



      </div>
      <!-- /#page-wrapper -->

  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>