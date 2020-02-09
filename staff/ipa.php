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
    
    <style>
      body
      {
        font-family: 'Open Sans', sans-serif;
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

      <li class="nav-item">
        <a class="nav-link" href="view.php">View</a>
      </li>

      <li class="nav-item active">
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
           <form method="POST">
             <div class="form-group">
               <button class="btn btn-primary mt-2" name="add-quiz">Add Quiz</button>
             </div>
           </form>
       </div>
     </div>
   </div>
   
    <br><br>




   <!-- Add Quiz -->
   <?php
   if(isset($_POST['add-quiz'])){
   echo ' 
   <div class="container" style="min-height:800px">
     <div class="row">
       <div class="col-md">
         <div class="card">
           <div class="card-body">
              <div class="card-tittle">
                <h3 class="text-center">Masukkan Soal</h3>
                <hr style="border: 1px solid #666; width: 100px;">
               <form action="update.php?q=addquiz" method="POST">
                 <fieldset>

        <!-- text-input --> 
              <div class="form-group">
              <label class="col-md-12 control-label" for="kelas"></label>  
              <div class="col-md">
              
              <select name="kelas" class="form-control" id="kelas">
                  <option>Silahkan Pilih kelas</option>
                  <option disabled>Kelas 10</option>
                  <option value="10 IPA-1">10 IPA-1</option>
                  <option value="10 IPA-2">10 IPA-2</option>
                  <option value="10 IPA-3">10 IPA-3</option>
                  <option disabled>---------------</option>

                   <option disabled>Kelas 11</option>
                  <option value="11 IPA-1">11 IPA-1</option>
                  <option value="11 IPA-2">11 IPA-2</option>
                  <option value="11 IPA-3">11 IPA-3</option>
                  <option disabled>---------------</option>

                  <option disabled>Kelas 12</option>
                  <option value="12 IPA-1">12 IPA-1</option>
                  <option value="12 IPA-2">12 IPA-2</option>
                  <option value="12 IPA-3">12 IPA-3</option>
                  <option disabled>---------------</option>
              </select>
              </div>
              </div>

             
              
        <!-- Text Input -->
              <div class="form-group">
              <label class="col-md-12 control-label" for="matpel"></label>
              <div class="col-md">
              <input type="text" name="matpel" id="matpel" placeholder="masukkan nama mata pelajaran" class="form-control" required="" autocomplete="off">
              </div>
              </div>


        <!-- Text Input -->
              <div class="form-group">  
              <label class="col-md-12 control-label" for="judul"></label>
              <div class="col-md">
                <input type="Text" name="judul" id="judul" placeholder="Masukkan Nama Materi" class="form-control" required="" autocomplete="off">
              </div>
              </div>


        <!-- Text Input -->
              <div class="form-group">
              <label class="col-md-12" for="total"></label>
              <div class="col-md-12">
                <input type="number" name="total" id="total" placeholder="Masukkan Jumlah Banyak Soal" class="form-control" required="" autocomplete="off">
              </div>
              </div>



        <!-- Text Input -->
              <div class="form-group">
              <label class="col-md-12 control-label" for=""></label>
              <div class="col-md-12">
                  <textarea rows="8" cols="8" name="desc" id="desc" class="form-control" placeholder="Masukkan Deskripsi" autocomplete="off"></textarea>
              </div>
              </div>


          <!-- Button -->
              <div class="form-group">
              <label class="col-md-12" for="submit"></label>
              <div class="col-md-12">
                <input type="submit" name="submit" id="submit" style="margin-left: 45%" class="btn btn-primary" value="Submit" class="btn btn-primary"></input>
              </div>
              </div>

                 </fieldset>
               </form>
              </div>
           </div>
         </div>
       </div>
     </div>
   </div>';
 }
   ?>
   <!-- End Add Quiz -->


           </div>
      </div>
    </div>


  </body>
  </html>
