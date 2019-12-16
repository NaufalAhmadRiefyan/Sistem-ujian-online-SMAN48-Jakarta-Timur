<?php

$conn = mysqli_connect("localhost","root","","ujian_online");

function query ($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}


function ubah($data){
	global $conn;
	
	$nama = $_SESSION['username'];
	$PasswordLama = mysqli_real_escape_string($conn, $data['PasswordLama']);
	$PasswordBaru = mysqli_real_escape_string($conn, $data['PasswordBaru']);
	$KonfirmasiPassword = mysqli_real_escape_string($conn, $data['KonfirmasiPassword']);

	$result = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$nama' ");
	$row = mysqli_fetch_assoc($result);
	if(!password_verify($PasswordLama, $row['password'])){
		echo "<script>
			alert('Password Salah');
			</script>";
		return false;
	}

	if($PasswordBaru !== $KonfirmasiPassword){
		echo "<script>
			alert('Konfirmasi Password tidak sesuai');
			</script>";
		return false;
	}

	$Password = password_hash($PasswordBaru, PASSWORD_DEFAULT);

	mysqli_query($conn, "UPDATE guru set password = '$Password' WHERE username = '$nama' ");
	return mysqli_affected_rows($conn);

}





function daftar($data){
	global $conn;

	$nama = strtolower(stripslashes($data['nama']));
	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password1 = mysqli_real_escape_string($conn, $data['password1']);

	// cek username sudah tersedia atau belum ?
	$result = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo"<script>
			alert('Username telah tersedia !');
			</script>";
		return false;
	}

	// cek konfirmasi password
	if($password !== $password1){
		echo "<script>
			alert('konfirmasi password tidak sesuai');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// masukkan data registrasi ke database
	mysqli_query($conn, "INSERT INTO guru VALUES ('','$username','$nama','$password')");
	return mysqli_affected_rows($conn);

}


function tambah_siswa($data){
	global $conn;

	$username = htmlspecialchars(stripslashes(strtolower($data['username'])));
	$NIS = htmlspecialchars(stripslashes($data['NIS']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$konfirmasi = mysqli_real_escape_string($conn, $data['konfirmasi']);

	// cek NIS
	$cek_NIS = mysqli_query($conn, "SELECT * FROM siswa WHERE NIS = $NIS");
	if(mysqli_fetch_assoc($cek_NIS)){
		echo "<script>
			alert('NIS sudah tersedia');
			</script>";
		return false;
	}


	// cek konfirmasi password
	if($password !== $konfirmasi){
		echo "<script>
			alert('Konfirmasi password tidak sesuai');
			</script>";
			return false;
	}

	//enkripsi Password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//masukkan data
	mysqli_query($conn, "INSERT INTO siswa VALUES('$NIS','$username','$password')");
	return mysqli_affected_rows($conn);

}




function tambah_guru($data){
	global $conn;

	$username = htmlspecialchars(stripslashes(strtolower($data['username'])));
	$nama = htmlspecialchars(stripslashes(strtolower($data['nama'])));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$konfirmasi = mysqli_real_escape_string($conn, $data['konfirmasi']);

	//cek username
	$result = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$username' ");
	if(mysqli_fetch_assoc($result)){
		echo "<script>
			alert('Username sudah tersedia');
			</script>";
		return false;
	}


	// cek konfirmasi 
	if($password !== $konfirmasi){
		echo "<script>
			alert('Konfirmasi password tidak sesuai');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// Masukkan Data
	mysqli_query($conn, "INSERT INTO guru VALUES('','$username','$nama','$password')");
	return mysqli_affected_rows($conn);
}





function hapus_siswa($NIS){
	global $conn;
	mysqli_query($conn, "DELETE FROM siswa WHERE NIS = $NIS ");
	return mysqli_affected_rows($conn);
}

function hapus_guru($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM guru WHERE id_staff = $id");
	return mysqli_affected_rows($conn);
}




function hapus_soal($id){
	global $conn;


	$question = mysqli_query($conn, "SELECT * FROM pertanyaan_soal WHERE eid = '$id' ");
	while($row = mysqli_fetch_assoc($question)){
		$qid = $row['qid'];
		mysqli_query($conn, "DELETE FROM jawaban_soal WHERE qid = '$qid' ");
		mysqli_query($conn, "DELETE FROM pilihan_jawaban WHERE qid = '$qid' ");
		mysqli_query($conn, "DELETE FROM pertanyaan_soal WHERE qid = '$qid' ");
	}
	mysqli_query($conn, "DELETE FROM ujian WHERE eid = '$id' ");

	return mysqli_affected_rows($conn);
}

?>