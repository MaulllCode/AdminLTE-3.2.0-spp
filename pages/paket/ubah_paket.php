<div>
  <?php
  // <!-- proses -->
  if (isset($_POST['ubah'])) {
    $id = $_POST['id_paket'];
    $id_outlet = $_POST['id_outlet'];
    $jenis = $_POST['jenis'];
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];

    $sql = "UPDATE tb_paket SET id_outlet='$id_outlet', jenis='$jenis', nama_paket='$nama_paket', harga='$harga' WHERE id_paket ='$id'";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="index.php?page=data_paket"</script>';
    }
  }
  // <!-- session -->
  if ($_SESSION["role"] !== "Admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
  }
  // <!-- ambil data -->
  $query = mysqli_query($kon, "SELECT * FROM tb_paket WHERE id_paket='" . $_GET['id_paket'] . "'");
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
          <h1 class="m-0">UBAH PAKET</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah Paket</li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
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
                <input type="hidden" name="id_paket" value="<?php echo $row['id_paket']; ?>">
                <div class="form-group">
                  <label>ID OUTLET</label>
                  <select name="id_outlet" class="form-control form-control" placeholder="ID OUTLET" required>
                    <?php
                    $query = "SELECT * FROM tb_outlet";
                    $data = mysqli_query($kon, $query);
                    while ($key = mysqli_fetch_array($data)) { ?>
                      <option value="<?= $key['id_outlet']; ?>"><?= $key['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>JENIS CUCIAN</label>
                  <select class="form-control" name="jenis" required>
                    <option value="<?php echo $row['jenis']; ?>">-- Pilihan Jenis Cucian --</option>
                    <?php
                    $array_jenis = array('Kiloan', 'Selimut', 'Bed_cover', 'Kaos', 'Lain');
                    foreach ($array_jenis as $jenis) {
                      if ($row['jenis'] == $jenis) {
                        echo "<option value='$jenis' selected>$jenis</option>";
                      } else {
                        echo "<option value='$jenis'>$jenis</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>NAMA PAKET</label>
                  <input type="text" name="nama_paket" class="form-control" placeholder="NAMA PAKET" required value="<?php echo $row['nama_paket']; ?>">
                </div>
                <div class="form-group">
                  <label>HARGA</label>
                  <input type="NUMBER" name="harga" class="form-control" placeholder="HARGA" required value="<?php echo $row['harga']; ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="ubah" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                <button type="reset" class="btn btn-success" name="tambah" title="Reset Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Reset</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
