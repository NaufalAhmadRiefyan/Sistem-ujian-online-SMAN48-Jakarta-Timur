<?php
session_start();

require "fungsi.php";

if (isset($_POST['submit'])) {
  $NIS = $_POST['NIS'];
  $password = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM siswa WHERE NIS = '$NIS'");

  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $nama_siswa = $row['nama_siswa'];
      $_SESSION['nama_siswa'] = $nama_siswa;
      $_SESSION['NIS'] = $NIS;
      header("location: account/index.php");
      exit;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Sistem Ujian Online</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
  body {
    position: relative;
    background: url(img/knowledge.jpg) no-repeat;
    background-size: 100% 1000px;

  }
</style>

<body>

  <div class="card">

    <div class="row">
      <div class="col-lg">
        <img src="img/hogwart.png" alt="" class="hogwart-pic">
        <h1 class="text-center">Selamat Datang di Ujian Online SMAN48 Jakarta Timur</h1>
        <div class="form-group">
          <form action="" method="POST">
            <h1 class="text-center mt-3">Login</h1>
            <hr>
            <label for="" class="mb-1">NIS:</label>
            <input type="text" name="NIS" class="form-control" placeholder="Masukkan NIS" required="" autofocus="" autocomplete="off" id="inputField">
            <label for="" class="mt-4">Password:</label>
            <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control mt-1" required="" autocomplete="off" id="inputField">
            <button class="btn btn-primary mt-4" type="submit" name="submit" id="submit">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
