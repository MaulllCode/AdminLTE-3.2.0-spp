<div>
  <?php

  // <!-- session -->
  if (!$_SESSION["role"]) {
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
            <div class="box-header pb-3">
              <a href="pages/cetak_laporan.php" target="_blank" class="btn btn-success" role="button" title="Laporan Transaksi"><i class="fas fa-print"></i></i> Print</a>
            </div>
            <div class="box-body table-responsive">
              <div class="box-body table-responsive">
                <table id="transaksi" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>KODE INVOICE</th>
                      <th>MEMBER</th>
                      <th>STATUS CUCIAN</th>
                      <th>STATUS PEMBAYARAN</th>
                      <th>TOTAL HARGA</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/conn.php";
                    $no = 1;
                    $query = mysqli_query($kon, "SELECT tb_transaksi.*,tb_member.nama , tb_detail_transaksi.id_paket, tb_detail_transaksi.harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi");
                    while ($transaksi = mysqli_fetch_array($query)) {
                    ?>

                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $transaksi['kode_invoice'] ?></td>
                        <td><?= $transaksi['nama'] ?></td>
                        <td><?= $transaksi['status'] ?></td>
                        <td><?= $transaksi['dibayar'] ?></td>
                        <td><?= $transaksi['harga'] ?></td>
                      </tr>

                    <?php } ?>

                  </tbody>
                </table>
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
