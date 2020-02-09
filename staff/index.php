<?php
session_start();



require "fungsi.php";


if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM guru WHERE username = '$username'");


  // Cek username
  if (mysqli_num_rows($result) === 1) {


    // Cek password
    $row = mysqli_fetch_assoc($result);
    $id_staff = $row['id_staff'];
    if (password_verify($password, $row['password'])) {
      //set seesion

      $_SESSION['id_staff'] = $id_staff and $_SESSION["username"] = $username;




      header("Location: dash.php");
      exit;
    }
  }
}

if (isset($_POST['submit'])) {
  if ($_POST['username'] === 'admin' && ($_POST['password'] === 'naufal')) {
    $_SESSION['admin'] = 'admin';
    header("Location: admin/index.php");
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
  <link rel="stylesheet" type="text/css" href="asset/font/css/fontello.css">

  <!-- CSS Style -->
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
    body {
      height: 50px;
      background-image: none;
      margin-bottom: 530px;
      font-family: 'Open Sans', sans-serif;
    }

    label
    {
      font-size: 16px;
    }

    .form-login
    {
      margin-top: 150px;
      margin-left: 150px;
      border-radius: 15px;
      width: 1000px;
      height: 350px;
      margin-bottom: 100px;
      background-color: rgb(255, 255, 255);
      transition: .6s;
    }

    .form-login:hover
    {
      box-shadow: -9px 9px 6px rgb(221, 216, 209);  
    }


  </style>
</head>

<body>
  
<div class="container form-login">
    <div class="row login">
      <div class="col-md-6 ">
        <div class="panel panel-primary">
          <div class="panel-heading col" style="font-family: system-ui;">
            <h3 class="text-center" style="color: black; font-size: 28px"><i class="icon-user"></i>Log in</h3>
          </div>
          <div class="panel-body">
            <form action="" method="POST" style="font-size: 18px">
              <hr style="width: 180px; border-top: 2px solid #999; margin-left: 130px;">
              <div class="form-group col">
                <label for="Username" class="mb-1">Username:</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required="" autofocus="" autocomplete="off" style="border-radius: 15px">
              </div>

              <div class="form-group col">
                <label for="Password" class="mb-1">Password:</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required="" autocomplete="off" style="border-radius: 15px">
              </div>

              <div class="form-group col">
                <button type="submit" name="submit" id="submit" class="btn btn-primary form-control" style="border-radius:15px;">Masuk</button>
                <a href="../index.php" class="back-button btn btn-link" style="text-decoration: none">Kembali</a>
              </div>

            </form>
          </div>
        </div>
      </div>
      <a href="index.php" class="navbar-brand"><img src="../img/hogwart.png" style="width: 280px; height: 250px;"></a>
    </div>
  </div>

  

</body>

</html>

