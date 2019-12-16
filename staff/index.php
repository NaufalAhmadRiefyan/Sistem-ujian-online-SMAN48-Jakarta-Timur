<?php
session_start();



require "fungsi.php";


if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$username'");


  // Cek username
  if (mysqli_num_rows($result) === 1) {


    // Cek password
    $row = mysqli_fetch_assoc($result);
    $id_staff = $row['id_staff'];
    if (password_verify($password, $row['password'])) {
      //set seesion

      $_SESSION['id_staff'] = $id_staff and $_SESSION["username"] = $username;




      header("Location: dash.php");
      exit;
    }
  }
}

if (isset($_POST['submit'])) {
  if ($_POST['username'] === 'admin' && ($_POST['password'] === 'naufal')) {
    $_SESSION['admin'] = 'admin';
    header("Location: admin/index.php");
  }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="asset/js/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="asset/js/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="asset/js/bootstrap.min.js"></script>

  <!-- Material Icon Font -->
  <link rel="stylesheet" type="text/css" href="asset/font/css/fontello.css">

  <!-- CSS Style -->
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
    body {
      background-image: none;
      margin-bottom: 530px;
    }
  </style>
</head>

<body>
  <div class="container form-login">
    <div class="row login">
      <div class="col-md-6 ">
        <div class="panel panel-primary">
          <div class="panel-heading col-sm-11" style="font-family: system-ui;">
            <h3 class="text-center" style="color: black"><i class="icon-user"></i>Log in</h3>
          </div>
          <div class="panel-body">
            <form action="" method="POST">
              <hr style="width: 180px; border-top: 2px solid #999; margin-left: 130px;">
              <div class="form-group col-md-11 ">
                <label for="Username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required="" autofocus="" autocomplete="off" style="border-radius: 15px">
              </div>

              <div class="form-group col-md-11 ">
                <label for="Password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required="" autocomplete="off" style="border-radius: 15px">
              </div>

              <div class="form-group col-md-11">
                <button type="submit" name="submit" id="submit" class="btn btn-primary form-control" style="border-radius:15px;">Masuk</button>
                <a href="../index.php" class="back-button btn btn-link">Kembali</a>
              </div>

            </form>
          </div>
        </div>
      </div>
      <a href="index.php" class="navbar-brand"><img src="../img/hogwart.png" style="width: 280px; height: 250px;"></a>
    </div>
  </div>


  <footer class="about" id="about" style="background-image: url(../img/background.jpg); position: absolute; width: 100%; bottom:0; ">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br>
        </div>


        <div class="col-md-6" style="padding-top: 20px;">
          <h5 style="font-family: system-ui; color: #AFA7A7"><b>Online Exam</b></h5>
          <p style="color: #FFFFFF; text-align: justify">adalah sebuah layanan ujian <i>online</i>
            yang mendukung proses belajar mengajar oleh dosen dan siswa serta memberikan kemudahan dalam
            mengerjakan soal-soal ujian.</p>
        </div>

        <div class="col-md-6">
          <h4 style="font-family: 'ABeeZee'; color: #AFA7A7; padding-top: 50%">Hubungi Kami<i class="icon-chat"></i></h4>
          <p style="color: #FFFFFF">Jl. Keramat Pangeran Syarif, Lubang Buaya - Jakarta Timur </p>
          <p style="color: #FFFFFF"><span style="color: #FFFFFF">Email: </span><span style="color: #6B94BC">examonline@gmail.com</span></p>
        </div>
        <br><br>
      </div>
    </div>
  </footer>

</body>

</html>