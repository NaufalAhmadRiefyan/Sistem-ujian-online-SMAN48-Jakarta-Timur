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


if(!$_SESSION['username']){
	header("location:login.php");
	exit;
}




//Start
if(@$_GET['q']=='quiz' && @$_GET['step'] == 2){
  $eid =$_GET['eid'];
  $n = $_GET['n'];
  $total = $_GET['t'];
  $ans = @$_POST['jawaban'];
  $qid = $_GET['qid'];
  $username = $_SESSION['username'];
  $NIS = $_SESSION['NIS'];
  

    $q = mysqli_query($conn, "SELECT * FROM answer WHERE qid = '$qid'");
    while($row = mysqli_fetch_assoc($q)){
      $ansid = $row['ansid'];
    }
    $q = mysqli_query($conn, "SELECT * FROM kuis WHERE eid = '$eid'");
      while($row = mysqli_fetch_assoc($q)){
        $email = $row['email'];
      }
    if($ans == $ansid){
      
      if($n == 1){
        $q = mysqli_query($conn, "INSERT INTO history VALUES('$NIS','$eid','$email','$username','0','0','0','0',NOW())");
      }
      $q = mysqli_query($conn, "SELECT * FROM history WHERE NIS = '$NIS' AND username = '$username'");
      
      $row = mysqli_fetch_assoc($q);
      $score = $row['score'];
      $right = $row['right'];

      $right++;
      $score =  $right;
      $q = mysqli_query($conn, "UPDATE `history` SET `score` = $score, `banyak_soal` = $total, `right` = $right, date = NOW() WHERE NIS = '$NIS' AND eid = '$eid'");
      
    }else{
      if($n == 1){
        $q = mysqli_query($conn, "INSERT INTO history VALUES('$NIS','$eid','$email','$username','0','0','0','0',NOW())");
      }
      $q = mysqli_query($conn, "SELECT * FROM history WHERE NIS = '$NIS' AND username = '$username'");

      $row = mysqli_fetch_assoc($q);
      $score = $row['score'];
      $wrong = $row['wrong'];

      $wrong++;
      $score = $score;
      $q = mysqli_query($conn, "UPDATE `history` SET `score` = $score, `banyak_soal` = $total, `wrong` = $wrong, date = NOW() WHERE NIS = '$NIS' AND eid = '$eid'");
      
    }
    if($n != $total){
      $n++;
      header("location:view.php?q=quiz&step=2&eid=$eid&n=$n&t=$total");
    }
}





?>