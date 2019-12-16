<?php
$conn = mysqli_connect('localhost','root','','ujian_online');
$username = $_SESSION['username'];
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah_data_kuis($data){
	global $conn, $username;
	$id = uniqid();
	$kelas = $data['kelas'];
	$matpel = $data['matpel'];
	$judul = $data['judul'];
	$total = $data['total'];
	$desc = $data['desc'];
	$user = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$username'");
	while($rows = mysqli_fetch_assoc($user)){
		$id_staff = $row['id_staff'];
	}
	mysqli_query($conn, "INSERT INTO kuis VALUES(
		'$id','$id_staff','$kelas','$matpel','$judul','$total','$desc',NOW())");
	return mysqli_affected_rows($conn);
}