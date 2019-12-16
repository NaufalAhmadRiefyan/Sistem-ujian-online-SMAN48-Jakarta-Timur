<?php
session_start();

require "fungsi.php";

if (!isset($_SESSION['nama_siswa'])) {
  header("Location: ../login.php");
  exit;
}

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
  <link rel="stylesheet" type="text/css" href="asset/font/css/fontello.css">

  <!-- CSS Style -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Bootrstrap CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
  p {
    font-family: nunito sans;
  }
</style>

<body style="max-height: 100px">
  <!-- navigation menu -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top" style="color: white">
    <a class="navbar-brand" href="index.php"><img src="asset/img/hogwart.png" style="width: 40px; height: 40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
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
          <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['nama_siswa']; ?></a>
          <div class="dropdown-menu">
            <a href="profile.php?q=<?= $_SESSION['NIS']; ?>" class="dropdown-item">Ubah Password</a>
            <a href="logout.php" class="dropdown-item">Logout</a>
          </div>
        </li>

      </ul>
    </div>
  </nav>



  <!-- Caorusel -->
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="asset/img/4.jpg" alt="First slide" style="background-size: cover">
        <div class="carousel-caption">
          <h4 class="col-xs-12" style="color:White; font-family: system-ui;">Welcome to Online Exam</h4>
          <p style="font-family: system-ui;">Select Your Course</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="asset/img/11.jpg" alt="Second slide">
        <div class="carousel-caption">
          <h4 class="col-xs-12" style="color:White; font-family: system-ui;">Welcome to Online Exam</h4>
          <p style="font-family: system-ui;">Select Your Course</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- end Carousel -->


  <section class="about" id="about" style="background-image: url(../img/background.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br>
          <hr style="border-top: 2px solid #666; width: 150px">
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
          <p style="color: #FFFFFF">Email: <span style="color: #6B94BC">examonline@gmail.com</span></p>
        </div>
        <br><br>
      </div>
    </div>
  </section>

  <script src="asset/js/jquery-3.3.1.min.js"></script>
  <script type="asset/js/script.js"></script>
</body>

</html>