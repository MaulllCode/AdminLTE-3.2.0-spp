<div>
  <?php
  // <!-- session -->
  $nisn = $_GET['nisn'];
  if ($_SESSION["level"] == 'siswa') {
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
            <li class="breadcrumb-item"><a href="index.php?page=data_pembayaran">Home</a></li>
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
            <div class="box-header">
              <!-- <a href="pages/cetak.php" target="_blank" class="btn btn-success" role="button" title="Laporan Transaksi"><i class="fas fa-print"></i></i> Print</a> -->
            </div>
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
                      <th>TANGGAL BAYAR</th>
                      <th>BULAN BAYAR</th>
                      <th>PETUGAS</th>
                      <?php
                      if ($_SESSION["level"] == "admin" or "petugas") { ?>
                        <th>AKSI</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/conn.php";
                    $no = 1;
                    // $data = mysqli_query($kon, "SELECT tb_pembayaran.*,tb_member.nama , tb_detail_pembayaran.id_paket, tb_detail_pembayaran.harga FROM tb_pembayaran INNER JOIN tb_member ON tb_member.id_member = tb_pembayaran.id_member INNER JOIN tb_detail_pembayaran ON tb_detail_pembayaran.id_pembayaran = tb_pembayaran.id_pembayaran WHERE tb_pembayaran.id_pembayaran");
                    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn'";
                    $dataQ = mysqli_query($kon, $sql);

                    while ($data = mysqli_fetch_assoc($dataQ)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nisn'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nama_kelas'] ?></td>
                        <td>
                          <?= $data['tahun'] ?> - <?= 'Rp. ', number_format($data['nominal']); ?>
                        </td>
                        <td><?= 'Rp. ' .  number_format($data['jumlah_bayar']); ?></td>
                        <td><?= $data['tgl_bayar'] ?></td>
                        <td><?= $data['bulan_dibayar'] ?></td>
                        <td><?= $data['nama_petugas'] ?></td>
                        <?php
                        if ($_SESSION["level"] == "admin" or "petugas") { ?>
                          <td>
                            <a onclick="return confirm('Apakah yakin menghapus Data')" onclick="return confirm('Apakah yakin menghapus Data')" href="index.php?page=hapus_pembayaran&id_pembayaran=<?= $data['id_pembayaran'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> HAPUS</a>
                          </td>
                        <?php } ?>
                      </tr>
                    <?php
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
