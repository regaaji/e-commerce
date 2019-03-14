<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    	.row{
    		margin-left: 50px;
    	}
    </style>



</head>



<body>

  


    </div>

    <div class="row">
    	<div class="container">
    		
		<form method="post" action="article.php?id=<?php $id ?>#postkomentar">
			<div class="form-group">
				<div class="col-md-7 col-md-offset-2">
				<label for="emailAdress">Nama :</label>
				
					<input type="text" name="nama" size="30" class="form-control"value="<?php $nama ?>" placeholder="Nama Anda" autocomplete="off" autofocus><br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-2">
				<label for="exampleInputPassword1">Email :</label>
				<input type="text" name="email" size="30" class="form-control" placeholder="Alamat Email" value="<?php $email ?>" autocomplete="off"><br>
			</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-2">
				<label for="area">Komentar :</label>
				<textarea cols="45" rows="5" name="pesan" class="form-control"><?php $pesan ?></textarea><br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3 col-md-offset-2">
				<label for="exampleInputPassword1">Kode :</label><?php echo "<p class='text-danger lead'><code>".$code2."</code></p>"; ?>

				<input type='hidden' id='randomcode' name='randomcode' value='<?php $code1 ?>' />
				
				<input type="text" class="form-control" id="emailAdress" placeholder="Masukkan kode berikut" maxlength="6" size="10" name="code" autocomplete="off"><br>
			</div>
			</div>
			<div class="col-md-7 col-md-offset-2">
			<button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
			</div>
		</form>
    	</div>
    </div>

</body>



