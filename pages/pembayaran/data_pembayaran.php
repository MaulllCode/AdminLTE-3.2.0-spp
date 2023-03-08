<div>
  <?php
  // <!-- session -->
  if ($_SESSION["level"] == "siswa") {
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
          <h1 class="m-0">DATA PEMBAYARAN</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pembayaran</li>
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
            <?php
            if ($_SESSION["level"] == "admin") {
            ?>
              <div class="box-header pb-3">
                <a href="pages/cetak.php" target="_blank" class="btn btn-success" role="button" title="Laporan Transaksi"><i class="fas fa-print"></i> Print</a>
              </div>
            <?php
            }
            ?>
            <div class="box-body table-responsive">
              <div class="box-body table-responsive">
                <table id="pembayaran" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NISN</th>
                      <th>NAMA</th>
                      <th>KELAS</th>
                      <th>SPP</th>
                      <th>PEMBAYARAN</th>
                      <th>KEKURANGAN</th>
                      <th>STATUS</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/function.php";
                    $no = 1;
                    // $data = mysqli_query($kon, "SELECT tb_pembayaran.*,tb_member.nama , tb_detail_pembayaran.id_paket, tb_detail_pembayaran.harga FROM tb_pembayaran INNER JOIN tb_member ON tb_member.id_member = tb_pembayaran.id_member INNER JOIN tb_detail_pembayaran ON tb_detail_pembayaran.id_pembayaran = tb_pembayaran.id_pembayaran WHERE tb_pembayaran.id_pembayaran");
                    $dataQ = mysqli_query($kon, "SELECT * FROM siswa, spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nama ASC");
                    if (mysqli_num_rows($dataQ) > 0) {
                      while ($data = mysqli_fetch_assoc($dataQ)) {
                        $data_pembayaran = mysqli_query($kon, "SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]'");
                        $data_pembayaran = mysqli_fetch_array($data_pembayaran);
                        $sudah_bayar = $data_pembayaran['jumlah_bayar'];
                        $kekurangan = $data['nominal'] - $data_pembayaran['jumlah_bayar']; ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?= $data['nisn'] ?></td>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['nama_kelas'] ?></td>
                          <td>
                            <?= $data['tahun'] ?> - <?= 'Rp. ', number_format($data['nominal']); ?>
                          </td>
                          <td>
                            <?php
                            if ($sudah_bayar == 0) {
                              echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                            } else {
                              echo 'Rp. ' . number_format($sudah_bayar);
                            } ?>
                          </td>
                          <td>
                            <?php
                            if ($kekurangan == 0) {
                              echo "<span class='badge badge-primary'>Sudah Lunas</span>";
                            } else {
                              echo 'Rp. ' . number_format($kekurangan);
                            } ?>
                          <td>
                            <?php
                            if ($kekurangan == 0) {
                              echo "<span class='badge badge-success'>Sudah Lunas</span>";
                            } else { ?>
                              <a href="index.php?page=tambah_pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>" class="btn btn-success"><i class="fas fa-check"></i> Pilih & Bayar</a>
                            <?php } ?>
                          </td>
                          <td>
                            <a href="index.php?page=histori&nisn=<?= $data['nisn'] ?>" class="btn btn-warning"><i class="fas fa-search"></i> History</a>
                          </td>
                        </tr>
                    <?php }
                    }
                    ?>
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
