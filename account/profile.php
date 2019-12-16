<?php
session_start();
require "fungsi.php";

if(!isset($_SESSION['nama_siswa'])){
  header("Location: ../login.php");
  exit;
}



if(isset($_POST['submit'])){
  if(ubah($_POST) > 0){
    echo "<script>
      alert('Password Berhasil Diubah');
      document.location.href='index.php';
      </script>";
  }else{
   echo "<script>
      alert('Password Gagal Diubah');
      </script>";

  }
}


$NIS = $_SESSION['NIS'];

$data = mysqli_query($conn, "SELECT * FROM siswa WHERE NIS = '$NIS' "); 
$row = mysqli_fetch_assoc($data);
$NIS = $row['NIS'];
$nama = $row['nama_siswa'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online-Exam</title>

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
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Bootrstrap CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>


   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
 
  <body style="min-height: 100px; background-color: #AECAC9">
     <!-- navigation menu -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="asset/img/hogwart.png" style="width: 40px; height: 40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            

            <li class="nav-item dropdown">
              <a href="course.php" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Course</a>
              <div class="dropdown-menu">
                <a href="class/ipa.php" class="dropdown-item">IPA</a>
                <a href="class/ips.php" class="dropdown-item">IPS</a>
              </div>
            </li>


            <li class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle active" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['nama_siswa'];?></a>
              <div class="dropdown-menu">
                <a href="profile.php?q=<?= $_SESSION['NIS'];?>" class="dropdown-item">Ubah Password</a>
                <a href="logout.php" class="dropdown-item">Logout</a>
              </div>
            </li>

        </ul>
    </div>
</nav>



<br><br><br>

      
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                      <div class="form-group col-md-5 offset-md-4" style="background-color: rgba(255,255,255,.7); font-family: system-ui;">
                      <h1 class="text-center" style="font-family: system-ui;">Ubah Password</h1>
                      <hr style="width: 300px; border-radius: 2px; border-color: black">

                      <h5 style="width: 100%;font-family: system-ui;">Nama:</h5>
                      <input type="text" disabled="" class="form-control" style="width: 100%;" value="<?= $nama; ?>"><br>
                      <input type="hidden" name="id" value="">

                      <h5 style="width: 100%;font-family: system-ui;">NIS:</h5>
                      <input type="text" disabled="" class="form-control" style="width: 100%;" value="<?= $NIS; ?>"><br>


                     <input type="password" name="PasswordLama" id="PasswordLama" class="form-control" style="width: 100%;" placeholder="Masukkan Password Lama" required=""><br>

                     <input type="password" name="PasswordBaru" id="PasswordBaru" class="form-control" style="width: 100%;" placeholder="Masukkan Password Baru" required=""><br>

                     <input type="password" name="KonfirmasiPassword" id="KonfirmasiPassword" class="form-control" style="width: 100%;" placeholder="Masukkan Konfirmasi Password Baru" required=""><br>
                     <button type="submit" class="form-control btn btn-success" name="submit" id="submit" style="width: 100%; color: white;">Ubah Password</button>
                     </div>
                     
                    </form>
                </div>
              </div>
            </div>

          





     <footer style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <p style="color: white; margin-top: 10px;" class="text-center" >Copyright <i class="glyphicon glyphicon-copyright-mark"></i>
          2018 - V-School</p>
        </div>
      </div>
    </div>
  </footer>


   
   <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script type="asset/js/script.js"></script>
  </body>
</html>