<div>
  <!-- proses -->
  <?php
  if (isset($_POST['ubah'])) {
    $id = $_POST['id_transaksi'];
    $id_outlet = $_POST['id_outlet'];
    $kode_invoice = $_POST['kode_invoice'];
    $id_member = $_POST['id_member'];
    $tgl = $_POST['tgl'];
    $batas_waktu = $_POST['batas_waktu'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $biaya_tambahan = $_POST['biaya_tambahan'];
    $diskon = $_POST['diskon'];
    $pajak = $_POST['pajak'];
    $status = $_POST['status'];
    $dibayar = $_POST['dibayar'];
    $id_user = $_POST['id_user'];

    $sql = "UPDATE tb_transaksi SET id_outlet='$id_outlet', kode_invoice='$kode_invoice',id_member='$id_member', tgl='$tgl', batas_waktu='$batas_waktu', tgl_bayar='$tgl_bayar', biaya_tambahan='$biaya_tambahan', diskon='$diskon', pajak='$pajak', status='$status', dibayar='$dibayar', id_user='$id_user' WHERE id_transaksi ='$id'";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="index.php?page=data_transaksi"</script>';
    }
  }
  ?>
  <!-- ambil data  -->
  <?php
  $query = mysqli_query($kon, "SELECT * FROM tb_transaksi WHERE id_transaksi='" . $_GET['id_transaksi'] . "'");
  $row = mysqli_fetch_array($query);
  ?>

  <!-- session -->
  <?php
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
          <h1 class="m-0">UBAH TRANSAKSI</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah Transaksi</li>
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
                <input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi']; ?>">
                <div class="form-group">
                  <label>ID OUTLET</label>
                  <input type="text" name="id_outlet" class="form-control" placeholder="ID OUTLET" required value="<?php echo $row['id_outlet']; ?>">
                </div>
                <div class="form-group">
                  <label>KODE INVOICE</label>
                  <input type="text" name="kode_invoice" class="form-control" placeholder="KODE INVOICE" required value="<?php echo $row['kode_invoice']; ?>">
                </div>
                <div class="form-group">
                  <label>ID MEMBER</label>
                  <input type="text" name="id_member" class="form-control" placeholder="ID MEMBER" required value="<?php echo $row['id_member']; ?>">
                </div>
                <div class="form-group">
                  <label>TANGGAL</label>
                  <input type="date" name="tgl" class="form-control" placeholder="TANGGAL" required value="<?php echo $row['tgl']; ?>">
                </div>
                <div class="form-group">
                  <label>BATAS WAKTU</label>
                  <input type="date" name="batas_waktu" class="form-control" placeholder="BATAS WAKTU" required value="<?php echo $row['batas_waktu']; ?>">
                </div>
                <div class="form-group">
                  <label>TANGGAL BAYAR</label>
                  <input type="date" name="tgl_bayar" class="form-control" placeholder="TANGGAL BAYAR" required value="<?php echo $row['tgl_bayar']; ?>">
                </div>
                <div class="form-group">
                  <label>BIAYA TAMBAHAN</label>
                  <input type="text" name="biaya_tambahan" class="form-control" placeholder="BIAYA TAMBAHAN" required value="<?php echo $row['biaya_tambahan']; ?>">
                </div>
                <div class="form-group">
                  <label>DISKON</label>
                  <input type="text" name="diskon" class="form-control" placeholder="DISKON" required value="<?php echo $row['diskon']; ?>">
                </div>
                <div class="form-group">
                  <label>PAJAK</label>
                  <input type="text" name="pajak" class="form-control" placeholder="PAJAK" required value="<?php echo $row['pajak']; ?>">
                </div>
                <div class="form-group">
                  <label>STATUS</label>
                  <select class="form-control" name="status" value="<?php echo $row['status']; ?>">
                    <option value="<?php echo $row['status']; ?>">-- Pilihan Status Cucian --</option>
                    <?php
                    $array_status = array('Baru', 'Proses', 'Selesai', 'Diambil');
                    foreach ($array_status as $status) {
                      if ($row['status'] == $status) {
                        echo "<option value='$status' selected>$status</option>";
                      } else {
                        echo "<option value='$status'>$status</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>DIBAYAR</label>
                  <select class="form-control" name="dibayar">
                    <option value="<?php echo $row['dibayar']; ?>">-- Pilihan Pembayaran--</option>
                    <?php
                    $array_dibayar = array('Dibayar', 'Belum_dibayar');
                    foreach ($array_dibayar as $dibayar) {
                      if ($row['dibayar'] == $dibayar) {
                        echo "<option value='$dibayar' selected>$dibayar</option>";
                      } else {
                        echo "<option value='$dibayar'>$dibayar</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>ID USER</label>
                  <input type="text" name="id_user" class="form-control" placeholder="ID USER" required value="<?php echo $row['id_user']; ?>">
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
  <!-- /.content-header -->
</div>
