<?php
session_start();

if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}


require "fungsi.php";

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

     <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
   
  </head>

  <style>
    body
    {
      font-family: 'Open Sans', sans-serif;
    }
  </style>
  <body style="min-height: 500%;">
   
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

      <li class="nav-item">
        <a class="nav-link" href="view.php">View</a>
      </li>

      <li class="nav-item active">
        <a href="course.php" class="nav-link">Course</a>
      </li>


        <li class="nav-item dropdown">
         <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['username'];?></a>
              <div class="dropdown-menu">
                <a href="profile.php?q=<?= $_SESSION['username'];?>" class="dropdown-item">Ubah Password</a>
         <a href="logout.php" class="dropdown-item">Logout</a>
              </div>
      </li>
      
    </ul>
  </div>

   </nav>
    <!-- End Navbar -->



<div class="container">
     <div class="row">
       <div class="col-md">
        <br><br>
         <div class="card">
           <div class="card-header">
             Penambahan quiz
           </div>
           <div class="card-body">
             Add Quiz/menambah soal quiz berguna untuk memberikan materi ataupun soal kepada para siswa, anda bisa memasukkan beberapa soal ataupun materi sesuai ketentuan.
           </div>
         </div>
       </div>
     </div>
   </div>

   

   <br><br>
   <div class="container">
     <div class="row">
       <div class="col">
         <div>
           <h4>Silahkan pilih kelas</h4>
           <p>pilih kelas untuk menambah soal</p>
           <hr> 
         </div>
       </div>

       <div class="col-md">
         <div class="card">
           <div class="card-body">
             <h5><a href="ipa.php" style="color: black">IPA </a></h5>
           </div>
         </div>
         <br>
         <div class="card">
           <div class="card-body">
             <h5><a href="ips.php" style="color: black">IPS</a></h5>
           </div>
         </div>
       </div>
     </div>
   </div>



     
   <br>
   <br>

  

   
   <br><br> <br><br> <br><br> <br><br>




    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
