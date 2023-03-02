<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Aplikasi Pengelolaan Laundry | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition login-page">

  <div>
    <?php
    include "../conf/conn.php";
    if (isset($_POST['lgn'])) {
      session_start();
      $username = (htmlentities($_POST['username']));
      $password = (htmlentities($_POST['password']));
      $check    = mysqli_query($kon, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die("Connection failed: " . mysqli_connect_error());
      if (mysqli_num_rows($check) > 0) {
        while ($row = mysqli_fetch_assoc($check)) {
          if ($row['role'] == "Admin") {

            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "Admin";
            $_SESSION['login'] = 1;
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['id_outlet'] = $row['id_outlet'];
            // alihkan ke halaman dashboard admin

            // cek jika user login sebagai pegawai
          } else if ($row['role'] == "Kasir") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "Kasir";
            $_SESSION['login'] = 1;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['id_outlet'] = $row['id_outlet'];
            // alihkan ke halaman dashboard pegawai
          } else if ($row['role'] == "Owner") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "Owner";
            $_SESSION['login'] = 1;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['id_outlet'] = $row['id_outlet'];
            // alihkan ke halaman dashboard pegawai
          }
    ?>
          <script>
            alert("Selamat datang <?= $row['username']; ?> Kamu Telah Login Ke Aplikasi Laundry sebagai <?= $row['role']; ?> !!!");
            window.location.href = "../index.php";
          </script>
    <?php
        }
      } else {
        echo '<script>alert("Masukan Username dan Password dengan Benar !!!"); window.location.href="login.php"</script>';
      }
    }
    ?>
  </div>

  <div class="card">
    <div class="card-header login-box">
      <div class="login-logo">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 mb-3" style="opacity: .8"> <br>
        Aplikasi Laundry
      </div>
      <!-- /.login-logo -->
      <div class="card-body login-box-body">
        <p class="login-box-msg">Log In Untuk Masuk Ke Halaman Aplikasi Laundry.</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <i></i>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col">
              <button type="submit" name="lgn" class="btn btn-primary btn-block btn-flat">Log In</button>
            </div><br>
          </div>
        </form>
      </div>
      <!-- /.login-box-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <!-- jQuery 2.2.3 -->
  <script src="../plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
