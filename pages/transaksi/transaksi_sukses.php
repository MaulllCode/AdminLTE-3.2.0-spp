<div>
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
          <h1 class="m-0">LAPORAN TRANSAKSI</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Laporan Transaksi</li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="card">
      <div class="row">
        <div class="card-header col">
          <div class="box box-primary">
            <div class="box-header">
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-3">
                <div class="white-box">
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center" style="padding-left: 50px;padding-right: 50px;">
                      <div class="bg-success" style="font-size: 30px;border-radius: 30px">
                        <i class="fa fa-check fa-10x text-white"></i>
                      </div>
                    </div>
                    <div class="col-md-4"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center mb-5">
                      <?php

                      include "conf/conn.php";

                      $query = "SELECT tb_transaksi.*, tb_member.nama, tb_detail_transaksi.harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi=" . $_GET['id_transaksi'];
                      $transaksiq = mysqli_query($kon, $query);
                      $data = mysqli_fetch_assoc($transaksiq);
                      ?>
                      <br>
                      <h3>Pesanan Atas Nama</h3>
                      <h2><strong><?= $data['nama']; ?> </strong></h2>
                      <h3>Berhasil Di Simpan</h3>
                      <h3><strong>Kode Invoice <?= $data['kode_invoice']; ?></strong><br></h3>
                      <h3><strong>Total Pembayaran <?= $data['harga']; ?></strong><br><br></h3>
                      <a href="index.php?page=data_transaksi" class="btn btn-primary col-md-4 ml-auto mr-auto"><i class="fas fa-home"></i> Kembali Ke Menu Utama</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content-header -->

  <!-- Content Wrapper. Contains page content -->
</div>
