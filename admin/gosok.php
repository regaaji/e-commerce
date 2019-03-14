<?php  
require '../config/functions.php';

$id = $_GET["id"];

if (gosok($id) > 0 ) {
	echo "<script>
				alert('Data berhasil dihapus');
				document.location.href = 'beranda.php';
		 </script>";
} else {
	echo "<script>
				alert('Data gagal dihapus');
				document.location.href = 'beranda.php';
		 </script>";
}

?>