<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>



<body>

    <div class="container">

        <!-- <hr><a name='komentar'></a> Komentar<br><br> -->
        <br><hr><br>

      <div id="wrapper" style="overflow: scroll;  width: 100%;
    height: 200px;">  
                <?php 
                $query = mysqli_query($dbconn, "SELECT * FROM comment WHERE article_id={$id} ORDER BY date");
                while ($row = mysqli_fetch_array($query)) {
                  $nama = $row['name'];
                  $komentar = $row['comment'];
                  $datestamp = $row['date'];

                  echo "<p class='text-info' style='font-size: 15px; font-family: verdana;'><strong>".$nama."</strong> <em>says</em>&nbsp;&nbsp;:<br>";
                echo "<br><small>".$datestamp."</small></p>";
                echo "<p class='text-secondary' style='font-size: 15px;'><em>".$komentar."</em></p><br>";
                echo "<br />";


              }


                 ?>

       </div>

    </div>

</body>