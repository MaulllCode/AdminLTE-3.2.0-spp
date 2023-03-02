<div>
  <?php
  // <!-- proses -->
  if (isset($_POST['tambah'])) {
    $id_outlet = $_POST['id_outlet'];
    $jenis = $_POST['jenis'];
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO tb_paket VALUES (NULL, '$id_outlet', '$jenis', '$nama_paket', '$harga')";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="index.php?page=data_paket"</script>';
    }
  }
  ?>

  <?php
  // <!-- session -->
  if ($_SESSION["role"] !== "Admin") {
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
          <h1 class="m-0">TAMBAH PAKET</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Paket</li>
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
                  <select name="id_outlet" class="form-control form-control" placeholder="ID OUTLET" required oninvalid="this.setCustomValidity('Pilih Outlet dengan benar')" oninput="setCustomValidity('')">
                    <option value="">- PILIHAN OUTLET -</option>
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
                  <select class="form-control" name="jenis" required oninvalid="this.setCustomValidity('Pilih Jenis Cucian dengan benar')" oninput="setCustomValidity('')">
                    <option value="">- PILIHAN JENIS CUCIAN -</option>
                    <option value="Kiloan">Kiloan</option>
                    <option value="Selimut">Selimut</option>
                    <option value="Bed_cover">Bed Cover</option>
                    <option value="Kaos">Kaos</option>
                    <option value="Lain">Lain</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>NAMA PAKET</label>
                  <input type="text" name="nama_paket" class="form-control" placeholder="NAMA PAKET" required oninvalid="this.setCustomValidity('Masukan Nama Paket dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>HARGA</label>
                  <input type="NUMBER" name="harga" class="form-control" placeholder="HARGA" required oninvalid="this.setCustomValidity('Masukan Harga dengan benar')" oninput="setCustomValidity('')">
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
