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
          <h1 class="m-0">DATA MEMBER</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Member</li>
          </ol>
        </div>
      </div><!-- /.row -->
      <small>Jika Member belum terdaftar maka daftarkan dulu lewat menu Member</small>
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
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>JENIS KELAMIN</th>
                    <th>NO TELEPON</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  include "conf/conn.php";
                  $no = 1;
                  $query = mysqli_query($kon, "SELECT * FROM tb_member");
                  if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                  ?>

                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['jenis_kelamin']; ?></td>
                        <td><?php echo $row['tlp']; ?></td>
                        <td>
                          <a href="index.php?page=tambah_transaksi&id_member=<?= $row['id_member']; ?>" class="btn btn-primary" role="submit" title="Pilih Data"><i class="fas fa-check"></i> Pilih Data</a>
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
