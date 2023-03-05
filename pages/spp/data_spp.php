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
          <h1 class="m-0">DATA SPP</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Spp</li>
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
              <a href="index.php?page=tambah_spp" class="btn btn-primary" role="button" title="Tambah Data"><i class="fas fa-plus"></i></i> Tambah</a>
            </div>
            <div class="box-body table-responsive">
              <table id="spp" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>TAHUN</th>
                    <th>NOMINAL</th>
                    <?php
                    if ($_SESSION["level"] == "admin") {
                    ?>
                      <th>AKSI</th>
                    <?php
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  include "conf/conn.php";
                  $no = 1;
                  $query = mysqli_query($kon, "SELECT * FROM spp");
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['tahun']; ?></td>
                      <td><?php echo 'Rp. ', number_format($row['nominal']); ?></td>
                      <?php
                      if ($_SESSION["level"] == "admin") {
                      ?>
                        <td>
                          <a href="index.php?page=ubah_spp&id_spp=<?= $row['id_spp']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="fas fa-edit"></i> Ubah</a>
                          <a onclick="return confirm('Apakah yakin menghapus Data')" href="index.php?page=hapus_spp&id_spp=<?= $row['id_spp']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                      <?php
                      }
                      ?>
                    </tr>
                  <?php } ?>
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
    $('#spp').DataTable();
  });
</script>
