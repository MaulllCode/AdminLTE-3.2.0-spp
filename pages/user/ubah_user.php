<div>
  <?php
  // <!-- proses -->
  if (isset($_POST['ubah'])) {
    $id = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_outlet = $_POST['id_outlet'];
    $role = $_POST['role'];

    $sql = "UPDATE tb_user SET nama='$nama', username='$username', password='$password', id_outlet='$id_outlet', role='$role' WHERE id_user ='$id'";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="index.php?page=data_user"</script>';
    }
  }
  // <!-- session -->
  if ($_SESSION["role"] !== "Admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
  }
  // <!-- ambil data -->
  $query = mysqli_query($kon, "SELECT * FROM tb_user WHERE id_user='" . $_GET['id_user'] . "'");
  $row = mysqli_fetch_array($query);
  ?>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid pb-3">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">UBAH USER</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah User</li>
          </ol>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="card">
        <div class="row">
          <!-- left column -->
          <div class="card-header col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="box-body">
                  <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                  <div class="form-group has-feedback">
                    <label>NAMA</label>
                    <input type="text" class="form-control" name="nama" placeholder="NAMA" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['nama']; ?>">
                  </div>
                  <div class="form-group has-feedback">
                    <label>USERNAME</label>
                    <input type="text" class="form-control" name="username" placeholder="USERNAME" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Username dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['username']; ?>">
                  </div>
                  <div class="form-group has-feedback">
                    <label>PASSWORD</label>
                    <input type="text" class="form-control" name="password" placeholder="PASSWORD" required pattern="[a-zA-Z0-9\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Username dengan benar')" oninput="setCustomValidity('')" value="<?php echo $row['password']; ?>">
                  </div>
                  <div class="form-group">
                    <label>ID OUTLET</label>
                    <select name="id_outlet" class="form-control form-control" placeholder="ID OUTLET" required oninvalid="this.setCustomValidity('Pilih Outlet dengan benar')" oninput="setCustomValidity('')">
                      <?php
                      $query = "SELECT * FROM tb_outlet";
                      $data = mysqli_query($kon, $query);
                      while ($key = mysqli_fetch_array($data)) { ?>
                        <option value="<?= $key['id_outlet']; ?>"><?= $key['nama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group has-feedback">
                    <label>ROLE</label>
                    <select class="form-control" id="" name="role" placeholder="PILIHAN ROLE" required oninvalid="this.setCustomValidity('Pilih Role dengan benar')" oninput="setCustomValidity('')">
                      <option value="<?php echo $row['role']; ?>">-- PILIHAN ROLE --</option>
                      <?php
                      $array_role = array('Admin', 'Owner', 'Kasir');
                      foreach ($array_role as $role) {
                        if ($row['role'] == $role) {
                          echo "<option value='$role' selected>$role</option>";
                        } else {
                          echo "<option value='$role'>$role</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="ubah" title="Simpan Data"><i class="fas fa-save"></i> Simpan</button>
                  <button type="reset" class="btn btn-success" name="tambah" title="Reset Data"><i class="fas fa-retweet"></i> Reset</button>
                </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content-header -->
  </div>
</div>
