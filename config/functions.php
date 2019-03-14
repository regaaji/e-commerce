<?php  
// koneksi dbms
$conn = mysqli_connect("localhost","root","","gayadistro");

function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows   = [];
  while ($row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}

function hapus($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM tbl_barang WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function hapus1($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM tb_hasil WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function gosok($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM tb_login WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function setep($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM tb_admin WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data){
  global $conn;

  $id     = $data["id"]; 
  $nama     = htmlspecialchars($data["nama"]);
  $harga     = htmlspecialchars($data["harga"]);
  $stock     = htmlspecialchars($data["stock"]);
  $keterangan     = htmlspecialchars($data["keterangan"]);
  $gambar   = htmlspecialchars($data["gambar"]);

  $query  = "UPDATE tbl_barang SET
        nama   = '$nama',
        harga   = '$harga',
        stock   =  '$stock',
        keterangan = '$keterangan',
        gambar = '$gambar' 
      WHERE id = $id;
        ";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);

}

function ganti($data){
  global $conn;

  $id     = $data["id"]; 
  $username     = htmlspecialchars($data["username"]);
  $username2     = htmlspecialchars($data["username2"]);
  $email     = htmlspecialchars($data["email"]);
  $id     = htmlspecialchars($data["id"]);
  $tlp     = htmlspecialchars($data["tlp"]);
  $alamat   = htmlspecialchars($data["alamat"]);

  $query  = "UPDATE tb_login SET
        username   = '$username',
        username2   = '$username2',
        email   = '$email',
        id   =  '$id',
        tlp = '$tlp',
        alamat = '$alamat' 
      WHERE id = $id;
        ";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);

}

function ganti1($data){
  global $conn;

  $id     = $data["id"]; 
  $username     = htmlspecialchars($data["username"]);
  $password     = password_hash($data["password"], PASSWORD_DEFAULT);

  $query  = "UPDATE tb_admin SET
        username   = '$username',
        password   = '$password'
      WHERE id = $id;
        ";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);

}

function tambah($data){
  global $conn;

  $nama = strtolower(stripslashes($data["nama"]));
  $harga = strtolower(stripslashes($data["harga"]));
  $stock = strtolower(stripslashes($data["stock"]));
  $keterangan = strtolower(stripslashes($data["keterangan"]));
  $gambar = strtolower(stripslashes($data["gambar"]));
  

  //cek username sudah ada atau belum
  $result = mysqli_query($conn,"SELECT nama FROM tbl_barang WHERE nama = '$nama'");
  if (mysqli_fetch_assoc($result) ) {
    echo "<script>
        alert('barang sudah terdaftar');
        </script>";
    return false;
  }
  
   //tambahkan userbaru ke database
   mysqli_query($conn,"INSERT INTO tbl_barang VALUES('','$nama','$harga', '$stock', '$keterangan', '$gambar')");
   return mysqli_affected_rows($conn); 

}


function nambah($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $username2 = strtolower(stripslashes($data["username2"]));
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn,$data["password"]);
  $password2 = mysqli_real_escape_string($conn,$data["password2"]);
  $tlp = strtolower(stripslashes($data["tlp"]));
  $alamat = strtolower(stripslashes($data["alamat"]));

  

  //cek username sudah ada atau belum
  $result = mysqli_query($conn,"SELECT username FROM tb_login WHERE username = '$username'");
  if (mysqli_fetch_assoc($result) ) {
    echo "<script>
        alert('member sudah terdaftar');
        </script>";
    return false;
  }
  
   
   //tambahkan userbaru ke database
   mysqli_query($conn,"INSERT INTO tb_login VALUES('','$username', '$username2', '$email', '$password', '$password2', '$tlp', '$alamat')");
   return mysqli_affected_rows($conn); 

}



function nambah1($data){
  global $conn;
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn,$data["password"]);

  // cek username sudah ada atau belum
  $result = mysqli_query($conn,"SELECT * FROM tb_admin WHERE username = '$username'");
  if (mysqli_fetch_assoc($result) ) {
    echo "<script>
        alert('username sudah terdaftar');
        </script>";
    return false;
  }

   // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);


   //tambahkan userbaru ke database
   mysqli_query($conn,"INSERT INTO tb_admin VALUES('', '$username','$password')");
   return mysqli_affected_rows($conn); 

}



  function cari($keyword){
    $query = "SELECT * FROM tbl_barang WHERE nama LIKE '%$keyword%'";

     return query($query);
  } 


  function registrasi($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $username2 = strtolower(stripslashes($data["username2"]));
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn,$data["password"]);
  $password2 = mysqli_real_escape_string($conn,$data["password2"]);
  $tlp = strtolower(stripslashes($data["tlp"]));
  $alamat = strtolower(stripslashes($data["alamat"]));



  // cek username sudah ada atau belum
  $result = mysqli_query($conn,"SELECT username FROM tb_login WHERE username = '$username'");
  if (mysqli_fetch_assoc($result) ) {
    echo "<script>
        alert('username sudah terdaftar');
        </script>";
    return false;
  }

  // cek konfirmasi password
  if ($password !== $password2 ) {
    echo "<script>
        alert('Konfirmasi password tidak sesuai');
       </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // enkripsi password
  $password2 = password_hash($password2, PASSWORD_DEFAULT);

  
   //tambahkan userbaru ke database
   mysqli_query($conn,"INSERT INTO tb_login VALUES('','$username', '$username2', '$email', '$password', '$password2', '$tlp', '$alamat')");
   return mysqli_affected_rows($conn); 

} 
?>