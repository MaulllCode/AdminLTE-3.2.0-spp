<div>
  <!-- session -->

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
              <a href="pages\cetak_laporan.php" target="_blank" class="btn btn-success" role="button" title="Laporan Transaksi"><i class="fas fa-print"></i></i> Print</a>
            </div>
            <div class="box-body table-responsive">
              <div class="box-body table-responsive">
                <table id="transaksi" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>ID OUTLET</th>
                      <th>KODE INVOICE</th>
                      <th>ID MEMBER</th>
                      <th>TANGGAL</th>
                      <th>BATAS WAKTU</th>
                      <th>TANGGAL BAYAR</th>
                      <th>BIAYA TAMBAHAN</th>
                      <th>DISKON</th>
                      <th>PAJAK</th>
                      <th>STATUS</th>
                      <th>DIBAYAR</th>
                      <th>ID USER</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/conn.php";
                    $no = 1;
                    $query = mysqli_query($kon, "SELECT * FROM tb_transaksi");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['id_outlet']; ?></td>
                        <td><?php echo $row['kode_invoice']; ?></td>
                        <td><?php echo $row['id_member']; ?></td>
                        <td><?php echo $row['tgl']; ?></td>
                        <td><?php echo $row['batas_waktu']; ?></td>
                        <td><?php echo $row['tgl_bayar']; ?></td>
                        <td><?php echo $row['biaya_tambahan']; ?></td>
                        <td><?php echo $row['diskon']; ?>%</td>
                        <td><?php echo $row['pajak']; ?>%</td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['dibayar']; ?></td>
                        <td><?php echo $row['id_user']; ?></td>
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
