<div>
  <?php
  // <!-- Proses -->
  if (isset($_POST['ubah'])) {
    $id_spp = $_GET['id_spp'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $sql = "UPDATE spp set tahun='$tahun',nominal='$nominal' WHERE id_spp='$id_spp'";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="index.php?page=data_spp"</script>';
    }
  }
  ?>

  <?php
  // <!-- session -->
  if ($_SESSION["level"] !== "admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
  }
  ?>

  <?php
  // <!-- ambil data -->
  $query = mysqli_query($kon, "SELECT * FROM spp WHERE id_spp='" . $_GET['id_spp'] . "'");
  $row = mysqli_fetch_array($query);
  ?>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">UBAH SPP</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_spp">Home</a></li>
            <li class="breadcrumb-item active">Ubah Spp</li>
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
                <input type="hidden" name="id_spp" value="<?php echo $row['id_spp']; ?>">
                <div class="form-group">
                  <label>TAHUN</label>
                  <input type="tel" pattern="\d{4,5}" name="tahun" class="form-control" placeholder="TAHUN" required oninvalid="this.setCustomValidity('Masukan Tahun dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['tahun']; ?>">
                </div>
                <div class="form-group">
                  <label>NOMINAL</label>
                  <input type="tel" pattern="\d{1,8}" name="nominal" class="form-control" placeholder="NOMINAL" required oninvalid="this.setCustomValidity('Masukan Nominal dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['nominal']; ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="ubah" title="Simpan Data"><i class="fas fa-save"></i> Simpan</button>
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
