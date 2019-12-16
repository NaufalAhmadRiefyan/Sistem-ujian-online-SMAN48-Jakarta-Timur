<?php
if(!$_SESSION['username']){
  header("location:login.php");
  exit;
}

if(@$_GET['q']== 'quiz' && @$_GET['step'] == 2){
$eid = @$_GET['eid'];
$n = @$_GET['n'];
$total = @$_GET['t'];
$ans = @$_POST['jawaban'];
$qid = @$_GET['qid'];

$q = mysqli_query($conn, "SELECT * FROM answer WHERE qid = '$qid'");
while($row = mysqli_fetch_assoc($q))
{
  $ansid = $row['ansid']
}if($ans == $ansid){
  $q1 = mysqli_query($conn, "SELECT * FROM kuis WHERE eid = '$eid'");
  
}

}



?>