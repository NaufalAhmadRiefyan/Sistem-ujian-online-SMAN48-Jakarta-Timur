<?php


if(!isset($_SESSION['nama_siswa'])){
	header("Location: ../login.php");
	exit;
}

$conn = mysqli_connect("localhost","root","","ujian_online");

function query($query){
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function ubah($data){
	global $conn;
	
	$nama = $_SESSION['nama_siswa'];
	$PasswordLama = mysqli_real_escape_string($conn, $data['PasswordLama']);
	$PasswordBaru = mysqli_real_escape_string($conn, $data['PasswordBaru']);
	$KonfirmasiPassword = mysqli_real_escape_string($conn, $data['KonfirmasiPassword']);

	$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nama_siswa = '$nama' ");
	$row = mysqli_fetch_assoc($result);
	if(!password_verify($PasswordLama, $row['password'])){
		echo "<script>
			alert('Password Salah');
			</script>";
			return false;
		
	}

	if($PasswordBaru !== $KonfirmasiPassword){
		echo "<script>
			alert('Konfirmasi Password Tidak Sesuai');
			</script>";
		return false;
	}

	$Password = password_hash($PasswordBaru, PASSWORD_DEFAULT);

	 mysqli_query($conn, "UPDATE siswa SET password = '$Password' WHERE nama_siswa = '$nama' ");

	return mysqli_affected_rows($conn);
	
}




?>