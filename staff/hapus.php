<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: index.php");
  exit;
}
require "fungsi.php";

$id = $_GET['id'];

if(hapus_soal($id) > 0){
	echo "<script>
		alert('Data soal berhasil dihapus !');
		document.location.href='view.php';
		</script>";
}else{
	echo "<script>
		alert('Data soal Gagal dihapus !');
		document.location.href='view.php';
		</script>";
}






?>