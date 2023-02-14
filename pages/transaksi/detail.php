<div>
  <?php

  require "conf/conn.php";

  $status = [
    'baru',
    'proses',
    'selesai',
    'diambil'
  ];

  $id_transaksi = $_GET['id_transaksi'];

  // ambil data
  $query = mysqli_query($kon, "SELECT tb_transaksi.*, tb_member.nama, tb_detail_transaksi.*, tb_outlet.nama, tb_paket.jenis FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi INNER JOIN tb_outlet ON tb_outlet.id_outlet = tb_transaksi.id_outlet INNER JOIN tb_paket ON tb_paket.id_outlet = tb_transaksi.id_outlet WHERE tb_transaksi.id_transaksi = '$id_transaksi'");
  $data = mysqli_fetch_assoc($query);

  // <!-- proses -->
  if (isset($_POST['tambahan'])) {
    $status = $_POST['status'];

    $query = "UPDATE tb_transaksi SET status = '$status' WHERE id_transaksi = '$id_transaksi'";
    $update = mysqli_query($kon, $query);
    if ($update == 1) {
      echo '<script>alert("Status Cucian Berhasil diubah"); window.location.href="index.php?page=data_transaksi"</script>';
    } else {
      die("Connection failed: " . mysqli_connect_error());
    }
  }
  ?>

  <?php
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
          <h1 class="m-0">DETAIL TRANSAKSI</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Detail Transaksi</li>
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
                  <input type="text" name="" class="form-control" placeholder="ID OUTLET" required value="<?= $data['id_outlet']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>KODE INVOICE</label>
                  <input type="text" name="kode_invoice" value="<?= $data['kode_invoice']; ?>" readonly class="form-control" placeholder="KODE INVOICE" required>
                </div>
                <div class="form-group">
                  <label>ID MEMBER</label>
                  <input type="text" name="" readonly class="form-control" value="<?= $data['id_member']; ?>" placeholder="ID MEMBER" required>
                </div>
                <div class="form-group">
                  <label>Paket cucian</label>
                  <input type="text" name="" readonly class="form-control" value="<?= $data['jenis']; ?>" placeholder="ID MEMBER" required>
                </div>
                <div class="form-group">
                  <label>JUMLAH</label>
                  <input type="text" name="qty" readonly class="form-control" placeholder="JUMLAH" required value="<?= $data['qty']; ?>">
                </div>
                <div class="form-group">
                  <label for="largeInput">Total Harga</label>
                  <input type="text" name="biaya_tambahan" class="form-control form-control" value="<?= $data['harga']; ?>" readonly>
                </div>
                <?php if ($data['bayar'] > 0) : ?>
                  <div class="form-group">
                    <label for="largeInput">Total Bayar</label>
                    <input type="text" name="biaya_tambahan" class="form-control form-control" value="<?= $data['bayar']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="largeInput">Tanggal Dibayar</label>
                    <input type="text" name="biaya_tambahan" class="form-control form-control" value="<?= $data['tgl_bayar']; ?>" readonly>
                  </div>
                <?php else : ?>
                  <div class="form-group">
                    <label for="largeInput">Total Bayar</label>
                    <input type="text" name="biaya_tambahan" class="form-control form-control" value="Belum Melakukan Pembayaran" readonly>
                  </div>
                  <div class="form-group">
                    <label for="largeInput">Batas Waktu Pembayaran</label>
                    <input type="text" name="biaya_tambahan" class="form-control form-control" value="<?= $data['batas_waktu']; ?>" readonly>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <label for="">Status Transaksi</label>
                  <select name="status" class="form-control form-control" id="defaultSelect">
                    <?php foreach ($status as $key) : ?>
                      <?php if ($key == $data['status']) : ?>
                        <option value="<?= $key ?>" selected><?= $key ?></option>
                      <?php endif ?>
                      <option value="<?= $key ?>"><?= $key ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="tambahan" title="Simpan Data"><i class="fas fa-save"></i> Simpan</button>
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
