<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Selamat Datang di Aplikasi Laundry</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              include "conf/conn.php";
              $query = mysqli_query($kon, "SELECT * FROM kelas");
              $row = mysqli_num_rows($query);
              ?>
              <h3><?php echo $row; ?></h3>

              <p>Jumlah Kelas</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              include "conf/conn.php";
              $query = mysqli_query($kon, "SELECT * FROM spp");
              $row = mysqli_num_rows($query);
              ?>
              <h3><?php echo $row; ?></h3>

              <p>Jumlah Spp</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              include "conf/conn.php";
              $query = mysqli_query($kon, "SELECT * FROM siswa");
              $row = mysqli_num_rows($query);
              ?>
              <h3><?php echo $row; ?></h3>
              <?php  ?>

              <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content-header -->
</div>

<div>
