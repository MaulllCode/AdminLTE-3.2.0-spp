<div>
  <?php
  // <!-- Proses -->
  if (isset($_POST['ubah'])) {
    $id_kelas = $_GET['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    $sql = "UPDATE kelas SET nama_kelas='$nama_kelas',kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="index.php?page=data_kelas"</script>';
    }
  }
  // <!-- session -->
  if ($_SESSION["level"] !== "admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
  }

  // <!-- ambil data -->
  $query = mysqli_query($kon, "SELECT * FROM kelas WHERE id_kelas='" . $_GET['id_kelas'] . "'");
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
          <h1 class="m-0">UBAH KELAS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_kelas">Home</a></li>
            <li class="breadcrumb-item active">Ubah Kelas</li>
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
            <form level="form" method="post">
              <div class="box-body">
                <input type="hidden" name="id_kelas" value="<?php echo $row['id_kelas']; ?>">
                <div class="form-group">
                  <label>NAMA KELAS</label>
                  <input type="text" name="nama_kelas" class="form-control" placeholder="NAMA KELAS" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama Kelas dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['nama_kelas']; ?>">
                </div>
                <div class="form-group">
                  <label>KOMPETENSI KEAHLIAN</label>
                  <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="KOMPETENSI KEAHLIAN" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Kompetensi Keahlian dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['kompetensi_keahlian']; ?>">
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
