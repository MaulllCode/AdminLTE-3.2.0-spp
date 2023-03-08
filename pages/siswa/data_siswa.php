<div>
  <?php
  // <!-- session -->
  if ($_SESSION["level"] !== "admin") {
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
          <h1 class="m-0">DATA SISWA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Siswa</li>
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
              <a href="index.php?page=tambah_siswa" class="btn btn-primary" level="button" title="Tambah Data"><i class="fas fa-plus"></i></i> Tambah</a>
            </div>
            <div class="box-body table-responsive">
              <div class="box-body table-responsive">
                <table id="siswa" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NISN</th>
                      <th>NIS</th>
                      <th>NAMA</th>
                      <th>KELAS</th>
                      <th>ALAMAT</th>
                      <th>NO TELEPON</th>
                      <th>SPP</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/function.php";
                    $no = 1;
                    $query = select_db($kon, "SELECT * FROM siswa, spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nama ASC");
                    // while ($data = mysqli_fetch_array($query)) {
                    if (!empty($query)) {
                      foreach ($query as $data) {
                    ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?= $data['nisn'] ?></td>
                          <td><?= $data['nis'] ?></td>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['nama_kelas'] ?></td>
                          <td><?= $data['alamat'] ?></td>
                          <td><?= $data['no_telp'] ?></td>
                          <td><?= $data['tahun'] ?> - <?= 'Rp. ', number_format($data['nominal']); ?></td>
                          <td>
                            <a href="index.php?page=ubah_siswa&nisn=<?= $data['nisn']; ?>" class="btn btn-success" level="button" title="Ubah Data"><i class="fas fa-edit"></i> Ubah</a>
                            <a onclick="return confirm('Apakah yakin menghapus Data')" href="index.php?page=hapus_siswa&nisn=<?= $data['nisn']; ?>" class="btn btn-danger" level="button" title="Hapus Data"><i class="fas fa-trash"></i> Hapus</a>
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
