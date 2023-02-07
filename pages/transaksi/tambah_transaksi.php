<div>
  <?php
  if (isset($_POST['tambah'])) {
    $id_outlet = $_POST['id_outlet'];
    $kode_invoice = $_POST['kode_invoice'];
    $id_member = $_POST['id_member'];
    $tgl = $_POST['tgl'];
    $batas_waktu = $_POST['batas_waktu'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $id_user = $_POST['id_user'];

    $sql = "INSERT INTO tb_transaksi VALUES (NULL, '$id_outlet', '$kode_invoice', '$id_member', '$tgl', '$batas_waktu', '$tgl_bayar', '0', '0', '0', 'Baru', 'Belum_dibayar', '$id_user')";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      if ($_SESSION["role"] == "Kasir") {
        echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="index.php?page=transaksi"</script>';
      } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!");
  window.location.href="index.php?page=data_transaksi"</script>';
      }
    }
  }
  ?>

  <!-- session -->
  <?php
  if ($_SESSION["role"] == "Owner") {
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
          <h1 class="m-0">TAMBAH TRANSAKSI</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Transaksi</li>
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
                  <label>ID OUTLET</label>
                  <select name="id_outlet" class="form-control form-control" placeholder="ID OUTLET" required id="defaultInput">
                    <option value=""> - Pilihan Outlet - </option>
                    <?php
                    $query = "SELECT * FROM tb_outlet";
                    $data = mysqli_query($kon, $query);
                    while ($key = mysqli_fetch_array($data)) { ?>
                      <option value="<?= $key['id_outlet']; ?>"><?= $key['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>KODE INVOICE</label>
                  <input type="text" id="defaultInput" name="kode_invoice" class="form-control" placeholder="KODE INVOICE" required>
                </div>
                <div class="form-group">
                  <label>ID MEMBER</label>
                  <select name="id_member" class="form-control form-control" placeholder="ID MEMBER" required id="defaultInput">
                    <option value=""> - Pilihan Member - </option>
                    <?php
                    $query = "SELECT * FROM tb_member";
                    $data = mysqli_query($kon, $query);
                    while ($key = mysqli_fetch_array($data)) { ?>
                      <option value="<?= $key['id_member']; ?>"><?= $key['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>TANGGAL</label>
                  <input type="date" name="tgl" id='tanggal' class="form-control" placeholder="TANGGAL" required onchange='cetakTanggal()'>
                </div>
                <script>
                  // set default tanggal saat ini
                  document.querySelector('#tanggal').value = new Date().toISOString().substring(0, 10);

                  // fungsi onchange cetak nilai
                  function cetakTanggal() {
                    var tanggal = document.querySelector('#tanggal').value;
                    document.querySelector('#cetak').innerHTML = tanggal.split('-')[2] + '-' + tanggal.split('-')[1] + '-' + tanggal.split('-')[0];
                  }
                </script>
                <div class="form-group">
                  <label>BATAS WAKTU</label>
                  <input type="date" name="batas_waktu" class="form-control" placeholder="BATAS WAKTU" required>
                </div>
                <div class="form-group">
                  <label>TANGGAL BAYAR</label>
                  <input type="date" name="tgl_bayar" class="form-control" placeholder="TANGGAL BAYAR" required>
                </div>
                <div class="form-group">
                  <label>ID USER</label>
                  <select name="id_user" class="form-control form-control" placeholder="ID USER" required id="defaultInput">
                    <?php
                    $query = "SELECT * FROM tb_user";
                    $data = mysqli_query($kon, $query);
                    $key = mysqli_fetch_assoc($data); { ?>
                      <option value="<?= $key['id_user']; ?>"><?= $key['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="tambah" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                <button type="reset" class="btn btn-success" name="tambah" title="Reset Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Reset</button>
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
