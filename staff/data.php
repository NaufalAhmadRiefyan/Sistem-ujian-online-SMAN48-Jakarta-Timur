<?php
session_start();

if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}


require "fungsi.php";

$username = $_SESSION['username'];






?>
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

     <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>

  <style>
    body
    {
      font-family: 'Open Sans', sans-serif;
    }
  </style>
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
    <br><br>

<div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
           Mengelola Rekap Nilai
          </div>
          <div class="card-body">
            <p>Halaman ini untuk mengelola data rekap nilai soal yang telah diikuti oleh peserta ujian.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>


  <!-- tampilan Data -->
   <div class="container">
    <div class="row">
      <div class="col">
         <ul>
           
             <?php 
             $eid = $_GET['id'];
             $query = mysqli_query($conn, "SELECT * FROM ujian WHERE eid = '$eid'");
             if($row = mysqli_fetch_assoc($query)){
              $kelas = $row['kelas'];
              $judul = $row['judul'];
              $matpel = $row['matpel'];
              $total = $row['total'];
              $date = date($row['date']);
              echo "Guru &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: ". $username."<br/>";
              echo "Mata Pelajaran : ". $matpel."</br>";
              echo "Kelas  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp: ". $kelas."<br/>";
              echo "Judul Soal &nbsp &nbsp &nbsp &nbsp&nbsp: ".$judul."</br>"; 
              echo "Jumlah Soal &nbsp &nbsp &nbsp: ".$total."</br>";
              echo "Dibuat sejak &nbsp &nbsp&nbsp: ".$date."</br>"; 
             }
            ?>
           
         </ul>
      </div>
    </div>     
   </div>



   
           <?php
           $id = $_GET['id'];
           if(@$_GET['id'] = '$id'){

           $q = mysqli_query($conn, "SELECT * FROM nilai WHERE eid = '$id'");
           $data = mysqli_num_rows($q);

          } 
          ?>


          <?php if($data == 0): ?> 

             <div class="container">
              <div class="row">
                <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama Peserta Ujian </th>
                        <th>Nilai</th>
                      </tr>
                    </thead>
                  
                    <tbody>
                    <tr>
                     <td colspan="10"><h2 class="text-center mt-3">Maaf Data tidak ditemukan !</h2></td>
                    </tr>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>

          <?php else: ?>
         
          <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama Peserta Ujian </th>
                        <th>Nilai</th>
                      </tr>
                    </thead>
                  <?php $x = 1; ?>
                  <?php foreach($q as $nama): ?>
                    <tbody>
                    <tr>
                      <td><?= $x; ?></td>
                      <td><?= $NIS = $nama['NIS'];?></td>
                      <?php 
                      $q1 = mysqli_query($conn, "SELECT * FROM siswa WHERE NIS = $NIS");
                      ?>
                      <?php foreach($q1 as $qq) : ?>
                        <td><?= $qq['nama_siswa']; ?></td>
                      <?php endforeach; ?>
                      <td><?= $nama['score'];?></td>
                    </tr>
                  </tbody>
                  <?php $x++; ?>
                <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>

             <?php endif; ?>

            <br>
            <div class="container" style="min-height:80px">
              <div class="row">
                <div class="col-md-2"> 
                  <?php if($data === 0) : ?>
                    <a href="cetak.php?id=<?= $id;?>" class="btn btn-info disabled" target="blank"><i class="icon-download"></i>Download</a>
                  <?php else: ?>
                    <a href="cetak.php?id=<?= $id;?>" class="btn btn-info" target="blank"><i class="icon-download"></i>Download</a>
                  <?php endif;?>
                </div>
              </div>
            </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
