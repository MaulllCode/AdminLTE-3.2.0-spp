<div>
  <?php

  // <!-- session -->
  if ($_SESSION["level"] == "siswa") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
  }

  $tgl = date('Y-m-d');
  $nisn = $_GET['nisn'];
  $kekurangan = $_GET['kekurangan'];
  include 'conf/conn.php';
  $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'";
  $query = mysqli_query($kon, $sql);
  $data = mysqli_fetch_array($query);

  if (isset($_POST['pembayaran'])) {
    $id_petugas = $_SESSION['id_petugas'];
    // $nisn = $_POST['nisn'];
    $bulan_dibayar = $_POST['bulan_dibayar'];
    $tahun_dibayar = $_POST['tahun_dibayar'];
    $id_spp = $_POST['id_spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    $sql = "INSERT INTO pembayaran VALUES (NULL, '$id_petugas', '$nisn', '$tgl', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')";
    $query = mysqli_query($kon, $sql);

    if ($query) {
      echo '<script>alert("Pembayaran Berhasil ditambahkan"); window.location.href="index.php?page=data_pembayaran"</script>';
    } else {
      die("Connection failed: " . mysqli_connect_error());
    }
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
          <h1 class="m-0">TAMBAH PEMBAYARAN</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_pembayaran">Home</a></li>
            <li class="breadcrumb-item active">Tambah Pembayaran</li>
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
                <input value="<?= $data['id_spp']; ?>" type="text" class="form-control" name="id_spp" hidden>
                <div class="form-group has-feedback">
                  <label>NAMA PETUGAS</label>
                  <input type="text" class="form-control" placeholder="NAMA" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama Petugas dengan benar')" oninput="setCustomValidity('')" value="<?= $_SESSION['nama_petugas']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>NISN</label>
                  <input type="tel" pattern="\d{1,11}" name="nisn" class="form-control" placeholder="NISN" required oninvalid="this.setCustomValidity('Masukan Nisn dengan benar')" oninput="setCustomValidity('')" value="<?php echo $_GET['nisn']; ?>" disabled>
                </div>
                <div class="form-group has-feedback">
                  <label>NAMA SISWA</label>
                  <input type="text" class="form-control" placeholder="NAMA" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama dengan benar')" oninput="setCustomValidity('')" value="<?php echo $data['nama']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>TANGGAL PEMBAYARAN</label>
                  <input type="date" class="form-control" value="<?= $tgl; ?>" disabled required>
                </div>
                <div class="form-group">
                  <label>PILIH BULAN BAYAR</label>
                  <select name="bulan_dibayar" class="form-control" required oninvalid="this.setCustomValidity('Pilih Bulan dengan benar')" oninput="setCustomValidity('')">
                    <option value="">-- PILIHAN BULAN BAYAR --</option>
                    <?php
                    $nisn = $data['nisn'];
                    $data_bulan = array();
                    $spp = mysqli_query($kon, "SELECT bulan_dibayar FROM pembayaran WHERE nisn = '$nisn'");
                    while ($data = mysqli_fetch_array($spp)) {
                      $data_bulan[] = $data['bulan_dibayar'];
                    }
                    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    $result = array_diff($bulan, $data_bulan);
                    foreach ($result as $key2) {
                    }
                    foreach ($result as $key) { ?>
                      <option value="<?= $key; ?>"><?php echo $key; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>PILIHAN TAHUN BAYAR</label>
                  <select name="tahun_dibayar" class="form-control" required oninvalid="this.setCustomValidity('Pilih Tahun dengan benar')" oninput="setCustomValidity('')">
                    <option value="">-- PILIH TAHUN BAYAR --</option>
                    <?php
                    // include "conf/conn.php";
                    $query = mysqli_query($kon, "SELECT * FROM spp");
                    while ($key = mysqli_fetch_assoc($query)) {
                    ?>
                      <option value="<?= $key['id_spp'] ?>"><?= $key['tahun'];  ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>NOMINAL BAYAR <i>( JUMLAH YANG HARUS DIBAYAR ADALAH <?= 'Rp. ' . number_format($kekurangan) ?></i> )</label>
                  <input type="number" pattern="\d{1,7}" name="jumlah_bayar" class="form-control" min="100000" max="<?= $kekurangan ?>" value="100000" required oninvalid="this.setCustomValidity('Masukan Nominal dengan benar')" oninput="setCustomValidity('')">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="pembayaran" title=" Simpan Data"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-success" title="Reset Data"><i class="fas fa-retweet"></i> Reset</button>
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
