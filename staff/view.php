<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: index.php");
  exit;
}


require "fungsi.php";

$id_staff = $_SESSION['id_staff'];
$data = mysqli_query($conn, "SELECT * FROM ujian WHERE id_staff = '$id_staff' ");

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
  <link rel="stylesheet" type="text/css" href="asset/data/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="asset/js/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="asset/js/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="asset/data/js/bootstrap.min.js"></script>

  <!-- Material Icon Font -->
  <link rel="stylesheet" type="text/css" href="asset/font/css/fontello.css">



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
  .tombol
  {
    width: 80px;

  }
</style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a href="dash.php" class="navbar-brand"><img src="asset/img/hogwart.png" style="width: 40px; height: 40px;"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="dash.php">Home</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="view.php">View</a>
        </li>

        <li class="nav-item">
          <a href="course.php" class="nav-link">Course</a>
        </li>

        <li class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['username']; ?></a>
          <div class="dropdown-menu">
            <a href="profile.php?q=<?= $_SESSION['id_staff']; ?>" class="dropdown-item">Ubah Password</a>
            <a href="logout.php" class="dropdown-item">Logout</a>
          </div>
        </li>

      </ul>
    </div>

  </nav>
  <!-- End Navbar -->


  <br><br>



  <!-- List Quiz -->
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Mengelola Soal
          </div>
          <div class="card-body">
            <p>Halaman ini untuk mengelola data soal yang telah dibuat dan untuk melihat peserta yang mengikuti ujian serta dapat
              menghapus data soal.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>



  <div class="container">
    <div class="row">
      <div class="col-lg">
        <div class="table-responsive-lg">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Mata Pelajaran</th>
                <th>Nama kuis</th>
                <th>Kelas</th>
                <th>opsi</th>
              </tr>
            </thead>
            <?php $x = 1; ?>
            <?php foreach ($data as $dt) : ?>


              <tbody>
                <tr>
                  <td><?= $x; ?></td>
                  <td><?= $dt["matpel"]; ?></td>
                  <td><?= $dt["judul"]; ?></td>
                  <td><?= $dt["kelas"]; ?></td>
                  <td><a href="hapus.php?id=<?= $dt['eid']; ?>" class="btn btn-danger tombol" onclick="return confirm('Yakin anda ingin menghapusnya');"><i class="icon-trash" title="Hapus Data"></i></a>&nbsp;|&nbsp;
                    <a href="data.php?id=<?= $dt['eid']; ?>" class="btn btn-info tombol" title="Lihat Data Kelola"><i class="icon-eye"></i></a></td>
                </tr>
              </tbody>
              <?php $x++; ?>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>







  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
