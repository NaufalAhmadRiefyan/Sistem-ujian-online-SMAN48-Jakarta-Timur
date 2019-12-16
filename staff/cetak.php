<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

require "fungsi.php";
if(!isset($_SESSION['username'])){
  header("Location: index.php");
  exit;
}



$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
	zebra-table {
width: 100%;
border-collapse: collapse;
box-shadow: 0 2px 3px 1px #ddd;
overflow: hidden;
border:10px solid #fff;
}
	</style>
</head>
<body>';
	$id = $_GET['id'];
           if(@$_GET['id'] = '$id')
           {
           $q = mysqli_query($conn, "SELECT * FROM nilai WHERE eid = '$id'");
		   }
		             
	
$html .= '<table class="zebra-table">
			<thead>
				<tr>
					<th>No.</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Nilai</th>
				</tr>
				</thead>';

	$x = 1;
	foreach($q as $nama) {
		$NIS = $nama['NIS'];
		$q1 = mysqli_query($conn, "SELECT * FROM siswa WHERE NIS = $NIS ");
		foreach($q1 as $qq) {
		$html .= 
		'<tbody>
			<tr>
				<td>'. $x++ .'</td>
				<td>'. $nama["NIS"] .'</td>
				<td>'. $qq["nama_siswa"] .'</td>
				<td>'. $nama["score"] .'</td>
			</tr>
		</tbody>
		';
	}}



$html .= '</table>
</div>
</div>
</div>
</body>
</html>';



$mpdf->WriteHTML($html);
$mpdf->Output("daftar-peserta-ujian-$id.pdf",\Mpdf\Output\Destination::DOWNLOAD);
?>