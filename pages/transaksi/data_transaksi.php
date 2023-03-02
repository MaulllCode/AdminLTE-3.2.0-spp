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
          <h1 class="m-0">DATA TRANSAKSI</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Transaksi</li>
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
            <div class="box-header pb-3 row">
              <div class="col">
                <a href="index.php?page=cari_member" class="btn btn-primary" role="button"><i class="fas fa-plus"></i> Tambah</a>
              </div>
              <div class="col-sm-3 justify-content-end">
                <a href="index.php?page=konfirmasi" class="btn btn-primary col" role="button"><i class="fas fa-shopping-cart"></i> Konfirmasi Pembayaran</a>
              </div>
              </a>
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
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/conn.php";
                    $no = 1;
                    $data = mysqli_query($kon, "SELECT tb_transaksi.*,tb_member.nama , tb_detail_transaksi.id_paket, tb_detail_transaksi.harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi");
                    ?>
                    <?php
                    if (mysqli_num_rows($data) > 0) {
                      while ($transaksi = mysqli_fetch_assoc($data)) { ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?= $transaksi['kode_invoice'] ?></td>
                          <td><?= $transaksi['nama'] ?></td>
                          <td><?= $transaksi['status'] ?></td>
                          <td><?= $transaksi['dibayar'] ?></td>
                          <td><?= 'Rp. ' . number_format($transaksi['harga']) ?></td>
                          <td>
                            <a href="index.php?page=detail&id_transaksi=<?= $transaksi['id_transaksi']; ?>" class="btn btn-success" role="button" title="Detail Data"><i class="fa fa-search"></i> Detail Data</a>
                            <?php
                            if ($_SESSION["role"] == "Admin") {
                            ?>
                              <a onclick="return confirm('Apakah yakin menghapus Data')" href="index.php?page=hapus_transaksi&id_transaksi=<?= $transaksi['id_transaksi']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="fas fa-trash"></i> Hapus</a>
                            <?php }
                            ?>
                          </td>
                        </tr>
                    <?php }
                    } ?>
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