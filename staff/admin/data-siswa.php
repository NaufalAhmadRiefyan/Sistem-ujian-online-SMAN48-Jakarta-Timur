<?php
session_start();

if(!isset($_SESSION['admin'])){
  header("Location: ../index.php");
  exit;
}


require "../fungsi.php";

$siswa = mysqli_query($conn, "SELECT * FROM siswa");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hello admin</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="../../asset/js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../../asset/js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="../../asset/js/bootstrap.min.js"></script>

    <!-- Material Icon Font -->
    <link rel="stylesheet" type="text/css" href="../asset/font/css/fontello.css">

    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   

  </head>
  <body>
<!-- navigation menu -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="../asset/img/hogwart.png" style="width: 40px; height: 40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            

            <li class="nav-item dropdown active">
              <a href="course.php" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Kelola Data</a>
              <div class="dropdown-menu">
                <a href="data-siswa.php" class="dropdown-item">Data Siswa</a>
                <a href="data-guru.php" class="dropdown-item">Data Guru</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['admin'];?></a>
              <div class="dropdown-menu">
                <a href="logout.php" class="dropdown-item">Logout</a>
              </div>
            </li>

        </ul>
    </div>
</nav>
    <!-- End Navbar -->


<br><br>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-header">
        <h4>Kelola Data Siswa</h4>
      </div>
      <div class="card-body">
          <p>Admin dapat melakukan aksi tambah serta hapus data siswa</p>
      </div>
      </div> <!-- End card -->
    </div>
  </div>
</div>

<br>
  
<div class="container">
  <div class="row">
        <form action="tambah-siswa.php" method="POST" class="col-md-2">
         <button class="btn btn-outline-dark" style="border-radius: 100%" data-toggle="tooltip" title="Tambah Data Siswa"><span class="icon-plus"></span></button>
         <script>
           $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
           })
         </script>
        </form>   
  </div>
</div>
<br>

<div class="container">
  <div class="row">
    <div class="table-responsive ">
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Hapus</th>
          </tr>
        </thead>

        <?php $x = 1; ?>
        <?php foreach($siswa as $swa): ?>
        <tbody>
          <tr>
            <td><?= $x++; ?></td>
            <td><?= $swa['nama_siswa']; ?></td>
            <td><?= $swa['NIS']; ?></td>
            <td><a href="hapus-siswa.php?NIS=<?= $swa['NIS'];?>" onclick="return confirm('Anda yakin ingin menghapusnya ?');"><span class="icon-trash"></span></a></td>
          </tr>
        </tbody>
        <?php $x; ?>
      <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>





  </body>
  </html>