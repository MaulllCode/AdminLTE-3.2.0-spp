<div>
  <?php

  require "conf/conn.php";

  // <!-- ambil data -->
  $query = mysqli_query($kon, "SELECT tb_transaksi.*, tb_member.nama, tb_detail_transaksi.harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi = " . $_GET['id_transaksi']);
  $data = mysqli_fetch_assoc($query);


  // <!-- proses -->
  if (isset($_POST['bayars'])) {
    $bayar = $_POST['bayar'];
    if ($bayar >= $data['harga']) {
      $tgl_bayar = date('Y-m-d h:i:s');

      $insert = mysqli_query($kon, $query = "UPDATE tb_transaksi SET tgl_bayar = '$tgl_bayar', dibayar = 'Dibayar' WHERE id_transaksi = " . $_GET['id_transaksi']);

      $insert2 = mysqli_query($kon, $query2 = "UPDATE tb_detail_transaksi SET bayar = '$bayar' WHERE id_transaksi = " . $_GET['id_transaksi']);

      if ($insert == 1 && $insert2 == 1) {
        echo '<script>window.location.href="index.php?page=transaksi_dibayar&id_transaksi=' . $_GET['id_transaksi'], '"</script>';
      } else {
        echo "gagal";
        die("Connection failed: " . mysqli_connect_error());
      }
    } else {
      echo '<script>alert("Jumlah Uang Pembayaran Kurang !!!"); window.location.href="index.php?page=bayar&id_transaksi=' . $_GET['id_transaksi'], '"</script>';
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
    <div class="container-fluid pb-3">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">BAYAR TRANSAKSI</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Bayar Transaksi</li>
          </ol>
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
              <form role="form" action="" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>KODE INVOICE</label>
                    <input type="text" name="kode_invoice" value="<?= $data['kode_invoice']; ?>" readonly class="form-control" placeholder="KODE INVOICE" required>
                  </div>
                  <div class="form-group">
                    <label>ID MEMBER</label>
                    <input type="text" name="nama" readonly class="form-control" value="<?= $data['nama']; ?>" placeholder="ID MEMBER" required>
                  </div>
                  <div class="form-group">
                    <label for="largeInput">Total Yang Harus Dibayarkan</label>
                    <input type="text" name="harga" class="form-control" value="<?= 'Rp ' . number_format($data['harga']); ?>" placeholder="TOTAL YANG HARUS DIBAYARKAN" readonly>
                  </div>
                  <div class="form-group">
                    <label for="largeInput">Masukan Jumlah Pembayaran</label>
                    <input type="number" name="bayar" class="form-control" value="">
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="bayars" title="Simpan Data">Simpan</button>
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
</div>
