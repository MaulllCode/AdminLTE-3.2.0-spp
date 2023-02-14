<div>
  <?php
  // <!-- proses -->
  if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_outlet = $_POST['id_outlet'];
    $role = $_POST['role'];

    $sql = "INSERT INTO tb_user VALUES (NULL, '$nama', '$username', '$password', '$id_outlet', '$role')";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo '<script>alert("Data Berhasil Ditambahkan !!!");
    window.location.href="index.php?page=data_user"</script>';
    }
  }
  ?>

  <?php
  // <!-- session -->
  if ($_SESSION["role"] !== "Admin") {
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
          <h1 class="m-0">TAMBAH USER</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah User</li>
          </ol>
        </div><!-- /.row -->
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
                <div class="form-group has-feedback">
                  <label>NAMA</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
                <div class="form-group has-feedback">
                  <label>USERNAME</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group has-feedback">
                  <label>PASSWORD</label>
                  <input type="text" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label>ID OUTLET</label>
                  <select name="id_outlet" class="form-control form-control" placeholder="ID OUTLET" required>
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
                  <select class="form-control" id="" name="role" placeholder="Masukan Role" required>
                    <option value="">Pilihan Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Owner">Owner</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="tambah" title="Simpan Data"><i class="fas fa-save"></i> Simpan</button>
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
