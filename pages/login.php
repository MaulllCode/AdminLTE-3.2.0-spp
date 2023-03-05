<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Aplikasi Pengelolaan SPP | Login</title>

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
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM petugas where username='$username' AND password = '$password'";
      $query = mysqli_query($kon, $sql);
      if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        session_start();
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['level'] = $data['level'];
        if ($data['level'] == 'admin') {
    ?>
          <script>
            alert("Selamat datang <?= $data['nama_petugas']; ?> Kamu Telah Login Ke Aplikasi Laundry sebagai <?= $data['level']; ?> !!!");
            window.location.href = "../index.php";
          </script>
        <?php
        } else if ($data['level'] == 'petugas') {
        ?>
          <script>
            alert("Selamat datang <?= $data['nama_petugas']; ?> Kamu Telah Login Ke Aplikasi Laundry sebagai <?= $data['level']; ?> !!!");
            window.location.href = "../index.php";
          </script>
    <?php
        }
      } else {
        echo '<script>alert("Masukan Username dan Password dengan Benar !!!"); window.location.href="login-siswa.php"</script>';
      }
    }
    ?>
  </div>

  <div class="card">
    <div class="card-header login-box">
      <div class="login-logo">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 mb-3" style="opacity: .8"> <br>
        Aplikasi Pembayaran SPP
      </div>
      <!-- /.login-logo -->
      <div class="card-body login-box-body">
        <p class="login-box-msg">Log In Untuk Masuk Ke Halaman Aplikasi Pembayaran SPP.</p>
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
          <hr>
          <div class="d-flex justify-content-center ">
            <a href="login-siswa.php">Login Sebagai Siswa</a>
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
