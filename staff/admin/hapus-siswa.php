<?php
session_start();
require "../fungsi.php";

if(!isset($_SESSION['admin'])){
  header("Location: ../index.php");
  exit;
}


$NIS = $_GET['NIS'];


if(hapus_siswa($NIS) > 0){
	echo "<script>
		alert('Data siswa berhasil dihapus !');
		document.location.href='data-siswa.php';
		</script>";
}else{
	echo "<script>
		alert('Data siswa Gagal dihapus !');
		document.location.href='data-siswa.php';
		</script>";
}




?>