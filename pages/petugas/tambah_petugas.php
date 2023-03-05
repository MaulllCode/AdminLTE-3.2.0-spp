<div>
  <?php
  // <!-- proses -->
  if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $sql = "INSERT INTO petugas VALUES (NULL, '$username', '$password', '$nama_petugas', '$level')";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="index.php?page=data_petugas"</script>';
    }
  }
  ?>

  <?php
  // <!-- session -->
  if ($_SESSION["level"] !== "admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
  }
  ?>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">TAMBAH PETUGAS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_petugas">Home</a></li>
            <li class="breadcrumb-item active">Tambah Petugas</li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="card">
      <div class="row">
        <!-- left column -->
        <div class="card-header col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group has-feedback">
                  <label>USERNAME</label>
                  <input type="text" class="form-control" name="username" placeholder="USERNAME" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Username dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group has-feedback">
                  <label>PASSWORD</label>
                  <input type="text" class="form-control" name="password" placeholder="PASSWORD" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Username dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group has-feedback">
                  <label>NAMA PETUGAS</label>
                  <input type="text" class="form-control" name="nama_petugas" placeholder="NAMA" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama Petugas dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>PILIHAN LEVEL</label>
                  <select class="form-control" name="level" required oninvalid="this.setCustomValidity('Pilih Level Petugas dengan benar')" oninput="setCustomValidity('')">
                    <option value="">- PILIHAN LEVEL PETUGAS -</option>
                    <option value="admin">ADMIN</option>
                    <option value="petugas">PETUGAS</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="tambah" title="Simpan Data"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-success" name="tambah" title="Reset Data"><i class="fas fa-retweet"></i> Reset</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->
