<?php
session_start();
require "../fungsi.php";

if(!isset($_SESSION['nama_siswa'])){
  header("Location:../index.php");
  exit;
}

/*  Konfigurasi Pagination  */
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM ujian"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$HalamanAktif = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
// halaman = 3, awal data = 
$awalData = ($jumlahDataPerHalaman * $HalamanAktif) - $jumlahDataPerHalaman; 



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
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="../asset/js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../asset/js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="../asset/js/bootstrap.min.js"></script>

   <link rel="stylesheet" type="text/css" href="../asset/font/css/fontello.css">    

    <script src="../asset/js/jquery-3.2.1.slim.min.js"></script>

    <script src="js/style.js"></script>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 <style>
           html,
body {
   margin:0;
   padding:0;
   height: 100px;
}
      .tabel {
        border-collapse: ;
        border-spacing:0;
        width:100%;
        border: 1px solid #ddd;
      }

      footer{
        position: relative;
        bottom: 0;
        margin-top: 100px;
        width: 100%;
        height: 100px;
        background: black;
      }

      .container{
        min-height: 100%;
        position: relative;
      }

      .about{
        position: relative;
        top: 310px
      }
    </style>
  
  </head>
  <body>
   
    <!-- navigation menu -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php"><img src="../asset/img/hogwart.png" style="width: 40px; height: 40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            

            <li class="nav-item active dropdown">
              <a href="course.php" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Course</a>
              <div class="dropdown-menu">
                <a href="ipa.php" class="dropdown-item">IPA</a>
                <a href="ips.php" class="dropdown-item">IPS</a>
              </div>
            </li>

           <li class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['nama_siswa'];?></a>
              <div class="dropdown-menu">
                <a href="../profile.php?q=<?= $_SESSION['NIS'];?>" class="dropdown-item">Ubah Password</a>
                <a href="../logout.php" class="dropdown-item">Logout</a>
              </div>
            </li>

        </ul>
    </div>
</nav>
    <!-- End Navbar -->

    

    <section class="main" id="main">
<div class="container">
  <div class="row">
    <div class="col-md-12" style="padding-left: 0%; ">
      <br><br>
      <p class="size: 2px;">&nbsp;&nbsp;&nbsp;<b>Select Class </b><hr style="width: 150px; border-color: black; border-top: 2px solid #black; margin-left: 10px;"></p>

      <div class="dropdown"  style="">
        &nbsp;&nbsp;&nbsp;<a data-toggle="dropdown" title="Pilih Kelas" href="" style="color: #000; size: 20px;" ><i class="icon-th-list"></i></a>
        <div class="dropdown-menu ">
          <a href="<?php echo'IPS.php?q=10';?>" class="dropdown-item">10-IPS</a>
          <a href="<?php echo'IPS.php?q=11';?>" class="dropdown-item">11-IPS</a>
          <a href="<?php echo'IPS.php?q=12';?>" class="dropdown-item">12-IPS</a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

      <section class="list" id="list">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
          <br>

            <!-- Tabel Kela 10 IPS -->
            <?php
            if(@$_GET['q']==10){
              echo '<div class="container">
               <div class="col-md">
                 <div class="pagination">';?>
                    <?php if($HalamanAktif > 1) : ?>
                        <ul class="pagination">
                        <li class="page-item" ><a class="page-link" href="?q=10&halaman=<?= $HalamanAktif - 1; ?>">Previous</a></li></ul>
                    <?php endif ; ?>
                    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                      <?php if($i == $HalamanAktif) : ?>
                          <ul class="pagination">
                          <li class="page-item active"><a class="page-link" href="?q=10&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                          </ul>
                      <?php else : ?>
                          <li class="page-item"><a class="page-link" href="?q=10&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($HalamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item"><a class="page-link" href="?q=10&halaman=<?= $HalamanAktif + 1; ?>">Next</a></li>
                      </ul>
                    <?php endif ; ?>
                      
                 </div>
               </div>
              <?php
               $result = mysqli_query($conn, "SELECT * FROM ujian WHERE kelas = '10 IPS-1' OR kelas = '10 IPS-2' oR kelas = '10 IPS-3' ORDER BY kelas ASC LIMIT $awalData, $jumlahDataPerHalaman ")or die("Error 1");
               echo '<div class="container tabel" style="overflow-x:auto;"><div class="row"><div class="col"><table class="table">
               <thead class="thead">
                <tr><th>No.</th><th>Mata Pelajaran</th><th>Kelas</th><th>Opsi</th></tr></thead>';
                $x = 1;
                while($row = mysqli_fetch_assoc($result)){
                  $id_staff = $row['id_staff'];
                  $matpel = $row['matpel'];
                  $kelas = $row['kelas'];
                  $eid = $row['eid'];
                  $NIS = $_SESSION['NIS'];
                  $q = mysqli_query($conn, "SELECT score FROM nilai WHERE eid = '$eid' AND NIS = '$NIS'");
                  $rowcount = mysqli_num_rows($q);
                  if($rowcount == 0){
                    echo '<tbody><tr><td>'.$x++.'</td><td>'.$matpel.'</td><td>'.$kelas.'</td><td><b><a href="view.php?q=quiz&step=2&n=1&eid='.$eid.'"class="pull-right btn sub1" style="margin:0px;background:"><span class="icon-login" title="Kerjakan Soal" aria-hidden="true"></span>&nbsp;<b title="Kerjakan Soal">Kerjakan Soal</b></td></tr></tbody>';
                  }
                  else{
                    echo '<tbody><tr><td>'.$x++.'</td><td>'.$matpel.'</td><td>'.$kelas.'</td><td><b><label class="pull-btn sub1" style="margin:0px;background:">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i class="icon-ok" style="color:green"></i></b>&nbsp;| &nbsp;<a href="view.php?q=result&eid='.$eid.'"><i class="icon-eye" title="Lihat Nilai"></i></a></td></tr></tbody>';
                  }
                }
                $x =0;
                echo '</table></div></div></div>';
              }
                  ?>
                  <!-- Akhir tabel kelas 10 IPS -->





                  <!-- Tabel kelas 11 IPS -->
                  <?php
            if(@$_GET['q']==11){
              echo '<div class="container">
               <div class="col-md">
                 <div class="pagination">';?>
                    <?php if($HalamanAktif > 1) : ?>
                        <ul class="pagination">
                        <li class="page-item" ><a class="page-link" href="?q=10&halaman=<?= $HalamanAktif - 1; ?>">Previous</a></li></ul>
                    <?php endif ; ?>
                    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                      <?php if($i == $HalamanAktif) : ?>
                          <ul class="pagination">
                          <li class="page-item active"><a class="page-link" href="?q=10&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                          </ul>
                      <?php else : ?>
                          <li class="page-item"><a class="page-link" href="?q=10&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($HalamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item"><a class="page-link" href="?q=10&halaman=<?= $HalamanAktif + 1; ?>">Next</a></li>
                      </ul>
                    <?php endif ; ?>
                      
                 </div>
               </div>
              <?php
               $result = mysqli_query($conn, "SELECT * FROM ujian WHERE kelas = '11 IPS-1' OR kelas = '11 IPS-2' oR kelas = '11 IPS-3' ORDER BY kelas ASC LIMIT $awalData, $jumlahDataPerHalaman ")or die("Error 1");
               echo '<div class="container tabel" style="overflow-x:auto;"><div class="row"><div class="col"><table class="table">
               <thead class="thead">
                <tr><th>No.</th><th>Mata Pelajaran</th><th>Kelas</th><th>Opsi</th></tr></thead>';
                $x = 1;
                while($row = mysqli_fetch_assoc($result)){
                  $id_staff = $row['id_staff'];
                  $matpel = $row['matpel'];
                  $kelas = $row['kelas'];
                  $eid = $row['eid'];
                  $NIS = $_SESSION['NIS'];
                  $q = mysqli_query($conn, "SELECT score FROM nilai WHERE eid = '$eid' AND NIS = '$NIS'");
                  $rowcount = mysqli_num_rows($q);
                  if($rowcount == 0){
                    echo '<tbody><tr><td>'.$x++.'</td><td>'.$matpel.'</td><td>'.$kelas.'</td><td><b><a href="view.php?q=quiz&step=2&n=1&eid='.$eid.'"class="pull-right btn sub1" style="margin:0px;background:"><span class="icon-login" title="Kerjakan Soal" aria-hidden="true"></span>&nbsp;<b title="Kerjakan Soal">Kerjakan Soal</b></td></tr></tbody>';
                  }
                  else{
                    echo '<tbody><tr><td>'.$x++.'</td><td>'.$matpel.'</td><td>'.$kelas.'</td><td><b><label class="pull-btn sub1" style="margin:0px;background:">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i class="icon-ok" style="color:green"></i></b>&nbsp;| &nbsp;<a href="view.php?q=result&eid='.$eid.'"><i class="icon-eye" title="Lihat Nilai"></i></a></td></tr></tbody>';
                  }
                }
                $x =0;
                echo '</table></div></div></div>';
              }
                  ?>
                  <!-- Akhir Tabel kelas 11 IPS -->






                  <!-- Tabel Kelas 12 IPS -->
                      <?php
            if(@$_GET['q']==12){
               echo '<div class="container">
               <div class="col-md">
                 <div class="pagination">';?>
                    <?php if($HalamanAktif > 1) : ?>
                        <ul class="pagination">
                        <li class="page-item" ><a class="page-link" href="?q=10&halaman=<?= $HalamanAktif - 1; ?>">Previous</a></li></ul>
                    <?php endif ; ?>
                    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                      <?php if($i == $HalamanAktif) : ?>
                          <ul class="pagination">
                          <li class="page-item active"><a class="page-link" href="?q=10&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                          </ul>
                      <?php else : ?>
                          <li class="page-item"><a class="page-link" href="?q=10&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($HalamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item"><a class="page-link" href="?q=10&halaman=<?= $HalamanAktif + 1; ?>">Next</a></li>
                      </ul>
                    <?php endif ; ?>
                      
                 </div>
               </div>
              <?php
               $result = mysqli_query($conn, "SELECT * FROM ujian WHERE kelas = '12 IPS-1' OR kelas = '12 IPS-2' oR kelas = '12 IPS-3' ORDER BY kelas ASC LIMIT $awalData, $jumlahDataPerHalaman ")or die("Error 1");
               echo '<div class="container tabel" style="overflow-x:auto;"><div class="row"><div class="col"><table class="table">
               <thead class="thead">
                <tr><th>No.</th><th>Mata Pelajaran</th><th>Kelas</th><th>Opsi</th></tr></thead>';
                $x = 1;
                while($row = mysqli_fetch_assoc($result)){
                  $id_staff = $row['id_staff'];
                  $matpel = $row['matpel'];
                  $kelas = $row['kelas'];
                  $eid = $row['eid'];
                  $NIS = $_SESSION['NIS'];
                  $q = mysqli_query($conn, "SELECT score FROM nilai WHERE eid = '$eid' AND NIS = '$NIS'");
                  $rowcount = mysqli_num_rows($q);
                  if($rowcount == 0){
                    echo '<tbody><tr><td>'.$x++.'</td><td>'.$matpel.'</td><td>'.$kelas.'</td><td><b><a href="view.php?q=quiz&step=2&n=1&eid='.$eid.'"class="pull-right btn sub1" style="margin:0px;background:"><span class="icon-login" title="Kerjakan Soal" aria-hidden="true"></span>&nbsp;<b title="Kerjakan Soal">Kerjakan Soal</b></td></tr></tbody>';
                  }
                  else{
                    echo '<tbody><tr><td>'.$x++.'</td><td>'.$matpel.'</td><td>'.$kelas.'</td><td><b><label class="pull-btn sub1" style="margin:0px;background:">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i class="icon-ok" style="color:green"></i></b>&nbsp;| &nbsp;<a href="view.php?q=result&eid='.$eid.'"><i class="icon-eye" title="Lihat Nilai"></i></a></td></tr></tbody>';
                  }
                }
                $x =0;
                echo '</table></div></div></div>';
              }
                  ?>
                  <!-- Akhir tabel kelas 12 -->


           <hr>
         </div>
       </div>
     </div>
   </section> 



<section class="about" id="about" style="background-image: url(../asset/img/background.jpg);margin-top: 230px"">
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


    

   
   <script src="../asset/js/jquery-3.3.1.min.js"></script>
    
  </body>
</html>
