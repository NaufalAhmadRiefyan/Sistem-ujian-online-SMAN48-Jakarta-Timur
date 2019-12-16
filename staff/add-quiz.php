<?php
session_start();
require "../fungsi.php";
if(!isset($_SESSION['username'])){
  header("Location: index.php");
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   

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
        <a class="nav-link" href="dash.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="view.php">View</a>
      </li>

      <li class="nav-item">
        <a href="course.php" class="nav-link active">Course</a>
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

 <?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="container">
<div class="row">
<div class="col-md-12">
<span style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col"></div><div class="col-md-6 offset-3"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST" enctype="multipart/form-data">
<fieldset style:"padding: 1em; border:1px solid #DDDDDD;">
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="6" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..." required="" style="width: 110%";"></textarea>  
  </div>
  <div class="col-md-12">
  <input type="file" id="file[]" name="file'.$i.'[]" class="form-control input-md" multiple="multiple">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text" required="" autocomplete="off">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text" required="" autocomplete="off">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text" required="" autocomplete="off">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text" required="" autocomplete="off">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" required="">
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div></div></div>';



}
?>


  </body>
  </html>