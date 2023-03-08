<div>
  <?php
  // <!-- proses -->
  include "conf/function.php";

  if (isset($_POST['tambah'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];

    $sql = "INSERT INTO siswa VALUES ('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')";

    $result = crud($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Ditambahkan !!!");
    window.location.href="index.php?page=data_siswa"</script>';
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
          <h1 class="m-0">TAMBAH SISWA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_siswa">Home</a></li>
            <li class="breadcrumb-item active">Tambah Siswa</li>
          </ol>
        </div><!-- /.row -->
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
                <div class="form-group">
                  <label>NISN</label>
                  <input type="tel" pattern="\d{1,11}" name="nisn" class="form-control" placeholder="NISN" required oninvalid="this.setCustomValidity('Masukan Nisn dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>NIS</label>
                  <input type="tel" pattern="\d{1,11}" name="nis" class="form-control" placeholder="NIS" required oninvalid="this.setCustomValidity('Masukan Nis dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group has-feedback">
                  <label>NAMA</label>
                  <input type="text" class="form-control" name="nama" placeholder="NAMA" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>KELAS</label>
                  <select name="id_kelas" class="form-control form-control" placeholder="KELAS" required oninvalid="this.setCustomValidity('Pilih Kelas dengan benar')" oninput="setCustomValidity('')">
                    <option value="">-- PILIHAN KELAS --</option>
                    <?php
                    $query = "SELECT * FROM kelas";
                    $data = mysqli_query($kon, $query);
                    while ($key = mysqli_fetch_array($data)) { ?>
                      <option value="<?= $key['id_kelas']; ?>"><?= $key['nama_kelas']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>ALAMAT</label>
                  <input type="text" name="alamat" class="form-control" placeholder="ALAMAT" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Alamat dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>NO TELEPON</label>
                  <input type="tel" pattern="\d{11,13}" name="no_telp" class="form-control" placeholder="NO TELEPON" required oninvalid="this.setCustomValidity('Masukan No Telepon dengan benar')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>SPP</label>
                  <select name="id_spp" class="form-control form-control" placeholder="SPP" required oninvalid="this.setCustomValidity('Pilih Spp dengan benar')" oninput="setCustomValidity('')">
                    <option value="">-- PILIHAN SPP --</option>
                    <?php
                    $query = "SELECT * FROM spp";
                    $data = mysqli_query($kon, $query);
                    while ($key = mysqli_fetch_array($data)) { ?>
                      <option value="<?= $key['id_spp']; ?>"><?= $key['tahun'] . ' | Rp. ' . $key['nominal']; ?></option>
                    <?php } ?>
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
