<?php
session_start();


if(!$_SESSION['username']){
	header("location:index.php");
	exit;
}

require "fungsi.php";

$username = $_SESSION['username'];
 //addquiz


if(@$_GET['q']=='addquiz'){
	$id = uniqid();
	$kelas = $_POST['kelas'];
	$matpel = $_POST['matpel'];
	$name = $_POST['judul'];
	$name = ucwords(strtolower($name));
	$total = $_POST['total'];
	$desc = $_POST['desc'];
	$q = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$username'");
	while($row = mysqli_fetch_assoc($q)){
	$id_staff = $row['id_staff'];
}
	$q3 = mysqli_query($conn, "INSERT INTO ujian VALUES('$id','$id_staff','$kelas','$matpel','$name','$total','$desc',NOW())");
	header("Location:add-quiz.php?q=4&step=2&eid=$id&n=$total");
}




 //Masukkan Pertanyaan
 //Masukkan Pertanyaan
 			// $qs = mysqli_query($conn, "UPDATE `question` SET `qns` = '$qns', `choice` = '$ch', ")

if(@$_GET['q']=='addqns'){
	$n = @$_GET['n'];
	$eid = @$_GET['eid'];
	$ch = @$_GET['ch'];	
for($i=1; $i<=$n; $i++)
{
	if($_FILES['file'.$i]){
		$name_array = $_FILES['file'.$i]['name'];
		$tmp_name_array = $_FILES['file'.$i]['tmp_name'];
		$type_array = $_FILES['file'.$i]['type'];
		$size_array = $_FILES['file'.$i]['size'];
		$error_array = $_FILES['file'.$i]['error'];

 		for($y=0; $y < count($tmp_name_array); $y++){
 				
 			
 			$ekstensiGambarValid = ['jpg','jpeg','png'];
 			$ekstensiGambar = explode('.', $name_array[$y]);
 			$ekstensiGambar = strtolower(end($ekstensiGambar));

 			$namaFile = uniqid();
 			$namaFile .= '.';
 			$namaFile .= $ekstensiGambar;
 			if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
 				$namaFile = null;
 			} 
 			

 			move_uploaded_file($tmp_name_array[$y], 'img/'. $namaFile);
			$qid = uniqid();
	 		$qns = $_POST['qns'.$i]; 
	  		$qs = mysqli_query($conn, "INSERT INTO pertanyaan_soal VALUES('$qid', '$eid', '$qns', '$ch', '$i', '$namaFile')");
 	
  		}
 

 		
	}


   $oaid=uniqid();
   $obid=uniqid();
   $ocid=uniqid();
   $odid=uniqid();

 $a=$_POST[$i.'1'];
 $b=$_POST[$i.'2'];
 $c=$_POST[$i.'3'];
 $d=$_POST[$i.'4'];

 $qa=mysqli_query($conn,"INSERT INTO pilihan_jawaban VALUES  ('$oaid','$qid','$a')") or die('Error61');
 $qb=mysqli_query($conn,"INSERT INTO pilihan_jawaban VALUES  ('$obid','$qid','$b')") or die('Error62');
 $qc=mysqli_query($conn,"INSERT INTO pilihan_jawaban VALUES  ('$ocid','$qid','$c')") or die('Error63');
 $qd=mysqli_query($conn,"INSERT INTO pilihan_jawaban VALUES  ('$odid','$qid','$d')") or die('Error64');	

 $e = $_POST['ans'.$i];

 switch($e)
 {
 case 'a':
 $ansid = $oaid;
 break;
 case 'b':
 $ansid = $obid;
 break;
 case 'c':
 $ansid = $ocid;
 break;
 case 'd':
 $ansid = $odid;
 break;
 default:
 $ansid = $oaid;
 }

 mysqli_query($conn,"INSERT INTO jawaban_soal VALUES  ('$ansid','$qid')");

		
 }



	 header("location:view.php");
}





?>