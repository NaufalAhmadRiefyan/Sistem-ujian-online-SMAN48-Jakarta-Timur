<?php
session_start();

require "../fungsi.php";  


if(!$_SESSION['nama_siswa']){
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
  $NIS = $_SESSION['NIS'];

  

  $q = mysqli_query($conn, "SELECT * FROM jawaban_soal WHERE qid = '$qid' ");
    while($row = mysqli_fetch_assoc($q)){
    $ansid = $row['ansid'];
    }
   
  if($ans == $ansid){

        if($n == 1){
          
          $q = mysqli_query($conn, "INSERT INTO nilai VALUES('','$NIS','$eid','0','0','0') ");
           }

    $q = mysqli_query($conn, "SELECT * FROM nilai WHERE NIS = '$NIS' AND eid = '$eid' ");
      while($rows = mysqli_fetch_assoc($q)){
        $right = $rows['right'];
        $score = $rows['score'];
      }

    $right++;
    $score = $right;
    mysqli_query($conn, "UPDATE `nilai` SET `score` = $score, `right` = $right WHERE NIS = '$NIS' AND eid = '$eid' ");
    }

  else{
          if($n == 1){
          $q = mysqli_query($conn, "INSERT INTO nilai VALUES('','$NIS','$eid','0','0','0') ");
          }

    $q = mysqli_query($conn, "SELECT * FROM nilai WHERE NIS = '$NIS' AND eid = '$eid' ");
    while($row = mysqli_fetch_assoc($q)){
      $score = $row['score'];
      $wrong = $row['wrong'];
    }
    
    $wrong++;
    $score = $score;
    mysqli_query($conn, "UPDATE `nilai` SET `score` = $score, `wrong` = $wrong WHERE NIS = '$NIS' AND eid = '$eid' ");
  }

      if($n !== $total){
        $n++;
        header("location:view.php?q=quiz&step=2&eid=$eid&n=$n&t=$total");
      }
      else if($n == $total){
        header("location:view.php?q=result&eid=$eid");
      }else{
        header("location:view.php?q=result&eid=$eid"); 
      }

}


?>