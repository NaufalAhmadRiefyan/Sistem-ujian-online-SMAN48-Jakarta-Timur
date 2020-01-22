<?php
session_start();
$conn = mysqli_connect("localhost","root","","ujian_online");

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

if(!isset($_SESSION['nama_siswa'])){
  header("Location:../");
  exit;
}

$nama_siswa = $_SESSION['nama_siswa'];

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

    <!-- Material Icon Font -->
    <link rel="stylesheet" type="text/css" href="../css/material-design-iconic-font.min.css">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

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
    .card-body{
      font-family: nunito sans;

    }
    .input{
        font-family: nunito sans;
    }
    .gambar{
      height: 10%;
    }
  </style>
  <body style="background-color: rgba(0, 90, 20, .4);">
   
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

   

      





   <!-- Start Quiz -->
 <?php 
 if(@$_GET['q']=='quiz' && @$_GET['step']==2){
  $n = @$_GET['n'];
  $eid = @$_GET['eid'];
  $q = mysqli_query($conn, "SELECT * FROM pertanyaan_soal WHERE eid = '$eid' AND sn = '$n'");
  echo '<div class="container mt-3"><div class="card-body col-md-12" style="background-color:#FFFFFF; border: 3px solid black; border-radius: 10px 10px px 5px">';
  while($row = mysqli_fetch_assoc($q))
  {
    $gambar = $row['gambar'];
    $qns = $row['qns'];
    $qid = $row['qid'];
    if(!$gambar){
      echo '<b>Soal Ke &nbsp;'.$n.'&nbsp;</b></br>
     <p style="font-family: nunito sans;">'.$qns.'</p>';
    }else{
    echo '<b>Soal Ke &nbsp;'.$n.'&nbsp;</b></br>
    <img src="../../staff/img/'.$gambar.'" class="rounded gambar" style="width:15%; margin: auto"; >
    <h5><b>Pertanyaan: </b></h5>
     <p style="font-family: nunito sans;">'.$qns.'</p>';
  }
}

  $q1= mysqli_query($conn, "SELECT * FROM ujian WHERE eid = '$eid'");
  $row = mysqli_fetch_assoc($q1);
  $total = $row['total'];

  $q = mysqli_query($conn, "SELECT * FROM pilihan_jawaban WHERE qid = '$qid'");

  echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$n.'&t='.$total.'&qid='.$qid.'" method="POST" class="form-horizontal">';

  while($row = mysqli_fetch_assoc($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" class="input" name="jawaban" id="jawaban" value="'.$optionid.'" style="font-family: nunito sans;">'.$option.'<br /><br />';
}
  echo'<br/><button type="submit" class="btn btn-primary"><span class="zmdi zmdi-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
 }






 // result display
 if(@$_GET['q']== 'result' && @$_GET['eid'])
 {
  $eid = $_GET['eid'];
  /*---------------------------- hasil Jawaban --------------------------------*/
  echo '<br><br><div class="container">
         <div class="row">
           <div class="col-12">
             <div class="card">
                 <div class="card bg-light"> 
                 <div class="card-body text-center">
                 <h3 style="font-family:sash"><b>Hasil Jawaban</b></h3>
                 <hr style="border-top:1px solid #666; " class="col-5">
                 </div>
                 <div class="card-body">';


  $data = mysqli_query($conn, "SELECT * FROM pertanyaan_soal WHERE eid = '$eid' ");
  while($row = mysqli_fetch_assoc($data)){
  $qid = $row['qid'];
  $qns = $row['qns'];
  $sn = $row['sn'];
  echo '<p>'.$sn.'.&nbsp;'.$qns.'</p>';

$answer =  mysqli_query($conn, "SELECT * FROM jawaban_soal WHERE qid = '$qid' ");
while($row = mysqli_fetch_assoc($answer)){
  $ansid = $row['ansid'];
}

$opti = mysqli_query($conn, "SELECT * FROM pilihan_jawaban WHERE optionid = '$ansid' AND '$qid'");
while($row = mysqli_fetch_assoc($opti)){
  $option = $row['option'];
  echo '<p >Jawaban: <i>'.$option.'</i></p><hr style="border: 1px solid #666">';
}

}


/*------------------------------------------ result ------------------------------------------*/

  $eid =@$_GET['eid'];
  $q1 = mysqli_query($conn, "SELECT * FROM ujian WHERE eid = '$eid'");
  while($row = mysqli_fetch_assoc($q1)){
  $id_staff = $row['id_staff'];
  $qa = $row['total'];
}
  $q2 = mysqli_query($conn, "SELECT * FROM nilai");
  while($row = mysqli_fetch_assoc($q2)){
  $NIS = $row['NIS'];
}
  $q = mysqli_query($conn, "SELECT * FROM nilai WHERE eid = '$eid' AND NIS = '$NIS'")or die('Error157');
  while($row = mysqli_fetch_assoc($q))
  {
    $s = $row['score'];
    $w = $row['wrong'];
    $r = $row['right'];
      echo '  
      
                <div class=" text-center"><h3 style="font-family:sash">Ujian Selesai !</h3></div>
                <hr style="border-top: 1px solid #666; width:200px"><br>
                <div class="card-body">
                    <h5 class="text-center" style="font-family:sash">Anda Telah Menyelesaikan Soal !</h5>
                    <h6 class="text-center" style="font-family:sash">Nilai yang diraih     = '.$s.'/'.$qa.'</h6>
                 </div>
                  
                  <form action="../index.php">
                  <div class="form-group">
                    <button class="form-control col-md-6 offset-md-3 btn btn-outline-success" style="font-family:sash">Selesai</button>
                  </div>
                  </form>
              </div>
          </div>
        </div>
      </div></div>';
                  }
       }
 

 ?>
 <!-- Quiz End -->



    </body>
    </html>
