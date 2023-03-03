<div>
  <?php

  // <!-- proses -->
  if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tlp = $_POST['tlp'];

    $sql = "INSERT INTO tb_member VALUES (NULL, '$nama', '$alamat', '$jenis_kelamin', '$tlp')";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="index.php?page=data_member"</script>';
    }
  }
  // <!-- session -->
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
          <h1 class="m-0">TAMBAH MEMBER</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_member">Home</a></li>
            <li class="breadcrumb-item active">Tambah Member</li>
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
                  <label>NAMA</label>
                  <input type="text" name="nama" class="form-control" placeholder="NAMA" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama lengkap dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>ALAMAT</label>
                  <input type="text" name="alamat" class="form-control" placeholder="ALAMAT" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Alamat lengkap dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>JENIS KELAMIN</label>
                  <select class="form-control" name="jenis_kelamin" required oninvalid="this.setCustomValidity('Pilih Jenis kelamin dengan benar')" oninput="setCustomValidity('')">
                    <option value="">- PILIHAN JENIS KELAMIN -</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>NO TELEPON</label>
                  <input type="tel" pattern="\d{11,13}" name="tlp" class="form-control" placeholder="NO TELEPON" required oninvalid="this.setCustomValidity('Masukan No telp dengan benar')" oninput="setCustomValidity('')">
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
