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
   font-family: 'Open Sans', sans-serif;
}

.carousel-fade
{
  height: 500px;
}

.carousel-caption
{
  margin-bottom: 90px
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
        <a class="nav-link active" href="dash.php">Home</a>
      </li>

      <li class="nav-item">
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


  


   
   
    


    <!-- Caorusel -->
       <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../account/asset/img/4.jpg" alt="First slide" style="background-size: cover">
      <div class="carousel-caption">
        <h4 class="col-xs-12" style="color:White; font-family: system-ui;">Welcome to Online Exam</h4>
        <p style="font-family: system-ui;">Select Your Course</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../account/asset/img/5.png" alt="Second slide">
      <div class="carousel-caption">
        <h4 class="col-xs-12" style="color:White; font-family: system-ui;">Welcome to Online Exam</h4>
        <p style="font-family: system-ui;">Select Your Course</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../account/asset/img/11.jpg" alt="Second slide">
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
