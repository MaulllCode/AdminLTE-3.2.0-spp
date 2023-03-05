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
      $nisn = $_POST['nisn'];
      $nis = $_POST['nis'];

      // include 'koneksi.php';
      $sql = "SELECT * FROM siswa where nisn='$nisn' AND nis='$nis'";
      $query = mysqli_query($kon, $sql);
      if (mysqli_num_rows($query) > 0) {
        session_start();
        $data = mysqli_fetch_array($query);
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['nisn'] = $data['nisn'];
        $_SESSION['level'] = 'siswa';
        // header('location: siswa/siswa.php');
        echo '<script>alert("Selamat datang Kamu Telah Login Ke Aplikasi Pembayaran SPP!!!"); window.location.href="../index.php"</script>';
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
        Aplikasi Laundry
      </div>
      <!-- /.login-logo -->
      <div class="card-body login-box-body">
        <p class="login-box-msg">Log In Untuk Masuk Ke Halaman Aplikasi Laundry.</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="nisn" placeholder="NISN">
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="nis" placeholder="NIS">
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
            <a href="login.php">Login Sebagai Petugas / Admin</a>
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
