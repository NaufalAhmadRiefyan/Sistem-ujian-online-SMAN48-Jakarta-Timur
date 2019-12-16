<?php
session_start();
require "../fungsi.php";

if(!isset($_SESSION['admin'])){
  header("Location: ../index.php");
  exit;
}


$id = $_GET['id'];


if(hapus_guru($id) > 0){
	echo "<script>
		alert('Data guru berhasil dihapus !');
		document.location.href='data-guru.php';
		</script>";
}else{
	echo "<script>
		alert('Data guru Gagal dihapus !');
		document.location.href='data-guru.php';
		</script>";
}



?>