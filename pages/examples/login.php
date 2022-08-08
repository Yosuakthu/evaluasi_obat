<?php
  require '../../koneksi.php';
  session_start();

  if (isset($_SESSION["login"])) {
    header("location:../../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="img/logo.png" alt="" width="150px">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <center>
        <p class="login-box-msg"><h4>Slamat datang</h4> Silakan Login</p>
      </center>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="form-group">
            <button name="login" type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

</div>
<!-- /.login-box -->

<?php 


if (isset($_POST["login"])) {
$username = $_POST["username"];
$pass = $_POST["pass"];
$query = "SELECT * FROM pengguna INNER JOIN tingkatan ON pengguna.id_tingkatan = tingkatan.id_tingkatan WHERE pengguna.username = '$username'";
$r = mysqli_query($conn,$query) or die('gagal');



if (mysqli_num_rows($r) === 1) {
    $s = mysqli_fetch_assoc($r);
    $us = $s["username"];
    $user = $s["nama"];
    $pas = $s["pass"];
    $level = $s["id_tingkatan"];
    $level1 = $s["tingkatan"];
    $id = $s["id_pengguna"];

    if (($pass == $pas)) {
        $_SESSION["username"] = $us;
        $_SESSION["nama"] = $user;
        $_SESSION["tingkatan"] = $level;
        $_SESSION["nama2"] = $level1;
        $_SESSION["id"] = $id;
        $_SESSION["login"] = true;
        header('location:../../index.php');
    }
}else {
    echo "
    <script>
        alert('Username dan Password Tidak Ditemukan')
        document.location.href = 'login.php';
    </script>
    ";
}


}


?>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
