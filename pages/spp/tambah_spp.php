<div>
  <?php

  // <!-- proses -->
  if (isset($_POST['tambah'])) {
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $sql = "INSERT INTO spp VALUES (NULL,'$tahun', '$nominal')";
    $query = mysqli_query($kon, $sql);
    if ($query) {
      header('location:?url=spp');
      echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="index.php?page=data_spp"</script>';
    } else {
      die("Connection failed: " . mysqli_connect_error());
    }
  }
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
          <h1 class="m-0">TAMBAH SPP</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_spp">Home</a></li>
            <li class="breadcrumb-item active">Tambah Spp</li>
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
                <div class="form-group">
                  <label>TAHUN</label>
                  <input type="tel" pattern="\d{4,5}" name="tahun" class="form-control" placeholder="TAHUN" required oninvalid="this.setCustomValidity('Masukan Tahun dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>NOMINAL</label>
                  <input type="tel" pattern="\d{1,8}" name="nominal" class="form-control" placeholder="NOMINAL" required oninvalid="this.setCustomValidity('Masukan Nominal dengan benar')" oninput="setCustomValidity('')">
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
