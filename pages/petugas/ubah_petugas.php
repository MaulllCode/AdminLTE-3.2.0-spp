<div>
  <?php
  // <!-- proses -->
  include "conf/function.php";

  if (isset($_POST['ubah'])) {
    $id_petugas = $_GET['id_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $sql = "UPDATE petugas SET username='$username', password='$password',nama_petugas='$nama_petugas',level='$level' WHERE id_petugas='$id_petugas'";

    $result = crud($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="index.php?page=data_petugas"</script>';
    }
  }
  // <!-- session -->
  if ($_SESSION["level"] !== "admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
  }
  // <!-- ambil data -->
  $row = select_id($kon, "SELECT * FROM petugas WHERE id_petugas='" . $_GET['id_petugas'] . "'");
  // $row = mysqli_fetch_array($query);
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
            <li class="breadcrumb-item"><a href="index.php?page=data_petugas">Home</a></li>
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
            <form level="form" method="post">
              <div class="box-body">
                <input type="hidden" name="id_petugas" value="<?php echo $row['id_petugas']; ?>">
                <div class="form-group has-feedback">
                  <label>USERNAME</label>
                  <input type="text" class="form-control" name="username" placeholder="USERNAME" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Username dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['username']; ?>">
                </div>
                <div class="form-group has-feedback">
                  <label>PASSWORD</label>
                  <input type="text" class="form-control" name="password" placeholder="PASSWORD" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Username dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['password']; ?>">
                </div>
                <div class="form-group has-feedback">
                  <label>NAMA PETUGAS</label>
                  <input type="text" class="form-control" name="nama_petugas" placeholder="NAMA" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama Petugas dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['nama_petugas']; ?>">
                </div>
                <div class="form-group">
                  <label>PILIHAN LEVEL</label>
                  <select class="form-control" name="level" required oninvalid="this.setCustomValidity('Pilih Level Petugas dengan benar')" oninput="setCustomValidity('')">
                    <option value="<?php echo $row['level']; ?>">- PILIHAN LEVEL PETUGAS -</option>
                    <?php
                    $lvl_array = array('admin', 'petugas');
                    foreach ($lvl_array as $key) {
                      if ($row['level'] == $key) {
                        echo "<option value='$key' selected>$key</option>";
                      } else {
                        echo "<option value='$key'>$key</option>";
                      }
                    }
                    ?>
                  </select>
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
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
