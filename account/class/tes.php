<?php
session_start();
require "../fungsi.php";

if(!isset($_SESSION['nama_siswa'])){
  header("Location:../index.php");
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
    <title>Bootstrap 101 Template</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="../asset/js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../asset/js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="../asset/js/bootstrap.min.js"></script>

    <!-- Material Icon Font -->
    <link rel="stylesheet" type="text/css" href="../css/material-design-iconic-font.min.css">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <script src="../asset/js/jquery-3.2.1.slim.min.js"></script>

    <script src="js/style.js"></script>
    

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
    <a class="navbar-brand" href="../index.php">Navbar</a>
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
      <p class="size: 2px;">&nbsp;&nbsp;&nbsp;<b><i class="zmdi zmdi-delicious"></i>Select Class </b><hr style="width: 150px; border-color: black; border-top: 2px solid #black; margin-left: 10px;"></p>

      <div class="dropdown"  style="">
        &nbsp;&nbsp;&nbsp;<a data-toggle="dropdown" title="Pilih Kelas" href="" style="color: #000; size: 20px;" ><i class="zmdi zmdi-more"></i></a>
          <script>
            $(document).ready(function(){
                $('[data-toggle="dropdown"]').tooltip();
            });
          </script>
        <div class="dropdown-menu ">
          <a href="<?php echo'tes.php?q=10';?>" class="dropdown-item">10-IPA</a>
          <a href="<?php echo'tes.php?q=11';?>" class="dropdown-item">11-IPA</a>
          <a href="<?php echo'tes.php?q=12';?>" class="dropdown-item">12-IPA</a>
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

          <?php
          $i = 5;
          for($a=1; $a<=$i; $a++){
            echo"Hallo <br>";
          }
          ?>






         













   
   <script src="../asset/js/jquery-3.3.1.min.js"></script>
    
  </body>
</html>