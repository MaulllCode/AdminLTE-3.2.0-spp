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
        <div class="col-lg-4 col-6">
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
        <div class="col-lg-4 col-6">
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
        <?php if ($_SESSION["role"] !== "Owner") { ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                include "conf/conn.php";
                $query = mysqli_query($kon, "SELECT * FROM tb_transaksi where dibayar = 'Dibayar'");
                $row = mysqli_num_rows($query);
                ?>
                <h3><?php echo $row; ?></h3>

                <p>Jumlah Transaksi yang telah dibayar</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
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
                $query = mysqli_query($kon, "SELECT * FROM tb_transaksi where dibayar = 'Belum_dibayar'");
                $row = mysqli_num_rows($query);
                ?>
                <h3><?php echo $row; ?></h3>

                <p>Jumlah Transaksi yang belum dibayar</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                include "conf/conn.php";
                $query = mysqli_query($kon, "SELECT SUM(harga) FROM tb_detail_transaksi where keterangan = 'dibayar'");
                $row = mysqli_fetch_column($query);
                ?>
                <h3><?php echo $row; ?></h3>

                <p>Jumlah total penghasilan Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content-header -->
</div>

<div>
