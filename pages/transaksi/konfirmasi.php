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
          <h1 class="m-0">KONFIRMASI TRANSAKSI</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Konfirmasi Transaksi</li>
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
            <div class="box-body table-responsive">
              <table id="member" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>KODE INVOICE</th>
                    <th>MEMBER</th>
                    <th>STATUS CUCIAN</th>
                    <th>STATUS PEMBAYARAN</th>
                    <th>TOTAL HARGA</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  include "conf/conn.php";
                  $no = 1;
                  $query = mysqli_query($kon, "SELECT tb_transaksi.*, tb_member.nama, tb_detail_transaksi.harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.dibayar = 'Belum_dibayar'");
                  if (mysqli_num_rows($query) > 0) {
                    while ($rowe = mysqli_fetch_assoc($query)) {
                  ?>

                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $rowe['kode_invoice'] ?></td>
                        <td><?= $rowe['nama'] ?></td>
                        <td><?= $rowe['status'] ?></td>
                        <td><?= $rowe['dibayar'] ?></td>
                        <td><?= $rowe['harga'] ?></td>
                        <td>
                          <a href="index.php?page=bayar&id_transaksi=<?= $rowe['id_transaksi']; ?>" class="btn btn-primary" role="submit" title="Pilih Data"><i class="fas fa-check"></i> Pilih Data</a>
                        </td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>
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



<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#member').DataTable();
  });
</script>
