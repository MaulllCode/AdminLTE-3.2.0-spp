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
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              include "conf/conn.php";
              $query = mysqli_query($kon, "SELECT * FROM tb_transaksi");
              $row = mysqli_num_rows($query);
              ?>
              <h3><?php echo $row; ?></h3>

              <p>Jumlah Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              include "conf/conn.php";
              $query = mysqli_query($kon, "SELECT * FROM tb_outlet");
              $row = mysqli_num_rows($query);
              ?>
              <h3><?php echo $row; ?></h3>

              <p>Jumlah Outlet</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              include "conf/conn.php";
              $query = mysqli_query($kon, "SELECT * FROM tb_member");
              $row = mysqli_num_rows($query);
              ?>
              <h3><?php echo $row; ?></h3>
              <?php  ?>

              <p>Jumlah Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              include "conf/conn.php";
              $query = mysqli_query($kon, "SELECT * FROM tb_paket");
              $row = mysqli_num_rows($query);
              ?>
              <h3><?php echo $row; ?></h3>

              <p>Jumlah Penghasilan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
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
