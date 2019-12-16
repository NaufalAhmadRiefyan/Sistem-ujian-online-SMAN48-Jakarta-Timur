<?php
session_start();
require "fungsi.php";


if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}

$username = $_SESSION['username'];

$data = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$username' ");
$row = mysqli_fetch_assoc($data);
$nama = $row['nama_guru'];
$username = $row['username'];

if(isset($_POST['submit'])){
  if(ubah($_POST) > 0 ){
    echo "<script>
      alert('Password Berhasil Diubah');
      document.location.href='dash.php';
      </script>";
  }else{
    echo "<script>
       alert('Password Gagal Diubah');
       </script>";
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
    <link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.min.css">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   

  </head>
  <body style="min-height: 700px;">

     <!-- Navbar -->
   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
     <a href="dash.php" class="navbar-brand"><img src="asset/img/hogwart.png" style="width: 40px; height: 40px;"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dash.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="view.php">View</a>
      </li>

      <li class="nav-item">
        <a href="course.php" class="nav-link">Course</a>
      </li>


     <li class="nav-item dropdown active">
         <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['username'];?></a>
              <div class="dropdown-menu">
                <a href="profile.php?q=<?= $_SESSION['id_staff'];?>" class="dropdown-item">Ubah Password</a>
         <a href="logout.php" class="dropdown-item">Logout</a>
              </div>
      </li>
      
    </ul>
  </div>

   </nav>
    <!-- End Navbar -->

    <br><br><br>

      
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                      <div class="form-group col-md-5 offset-md-4" style="background-color: rgba(255,255,255,.7); font-family: system-ui;">
                      <h1 class="text-center" style="background-color: rgba(255,255,255,.8); font-family: system-ui;">Ubah Password</h1>
                      <hr style="width: 300px; border-radius: 2px; border-color: black">

                      <h5 style="width: 100%;background-color: rgba(255,255,255,.8);font-family: system-ui;">Nama:</h5>
                      <input type="text" disabled="" class="form-control" style="width: 100%;" value="<?= $nama; ?>"><br>


                      <h5 style="width: 100%;background-color: rgba(255,255,255,.8);font-family: system-ui;">username:</h5>
                      <input type="text" disabled="" class="form-control" style="width: 100%;" value="<?= $username; ?>"><br>


                     <input type="password" name="PasswordLama" class="form-control" style="width: 100%;" placeholder="Masukkan Password Lama" required=""><br>

                     <input type="password" name="PasswordBaru" class="form-control" style="width: 100%;" placeholder="Masukkan Password Baru" required=""><br>

                     <input type="password" name="KonfirmasiPassword" class="form-control" style="width: 100%;" placeholder="Masukkan Konfirmasi Password Baru" required=""><br>
                     <button class="form-control btn btn-success" name="submit" style="width: 100%; color: white;">Ubah Password</button>
                     </div>
                     
                    </form>
                </div>
              </div>
            </div>
</body>
</html>