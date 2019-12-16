<?php
session_start();

if(!isset($_SESSION['admin'])){
  header("Location: ../index.php");
  exit;
}


require "../fungsi.php";


if(isset($_POST['submit'])){
	if(tambah_guru($_POST) > 0){
		echo "<script>
			alert('Data guru berhasil ditambah');
			document.location.href='data-guru.php';
			</script>";
	}else{
		echo "<script>
			alert('Data guru gagal ditambah');
			document.location.href='data-guru.php';
			</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tambah Data Siswa</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="../../asset/js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../../asset/js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="../../asset/js/bootstrap.min.js"></script>

    <!-- Material Icon Font -->
    <link rel="stylesheet" type="text/css" href="../asset/font/css/fontello.css">

    
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
    <a class="navbar-brand" href="index.php"><img src="../asset/img/hogwart.png" style="width: 40px; height: 40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            

            <li class="nav-item dropdown active">
              <a href="course.php" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Kelola Data</a>
              <div class="dropdown-menu">
                <a href="data-siswa.php" class="dropdown-item">Data Siswa</a>
                <a href="data-guru.php" class="dropdown-item">Data Guru</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['admin'];?></a>
              <div class="dropdown-menu">
                <a href="logout.php" class="dropdown-item">Logout</a>
              </div>
            </li>

        </ul>
    </div>
</nav>
<br>

<br>








		<div class="container">
      <div class="row">
       <div class="col-md-8 offset-md-2">
          
            <div class="panel-heading col-sm-12 "  style="background-color: rgba(255,255,255,.7); font-family: system-ui;"><h3 class="text-center" style="color: black; padding-left: px  "><i class="icon-user"></i>Tambah Data Guru</h3></div> 
            
              <form method="POST">
                <hr style="width: 180px; border-top: 1px solid #999;">
                <br>
                <div class="form-group col-md-8 offset-md-2">
                  <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required="" autofocus="" autocomplete="off">
                </div>

                <div class="form-group col-md-8 offset-md-2">
                	<input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="form-control" required="" autocomplete="off">
                </div>

                <div class="form-group col-md-8 offset-md-2">
                  <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required="" autocomplete="off" >
                </div>  

                <div class="form-group col-md-8 offset-md-2">
                	<input type="password" name="konfirmasi" placeholder="Konfirmasi Password" autocomplete="off" required="" class="form-control">
                </div>    

                <div class="col-md-6 offset-md-3 form-group">
                	<button class="form-control btn btn-success" name="submit" type="submit" style="border-radius: 50px">Tambah</button>
                </div>	
              
            </div>
              </form>
        </div>
    </div>
    </div>

</body>
</html>