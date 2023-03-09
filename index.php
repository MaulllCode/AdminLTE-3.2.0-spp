<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pengelolaan SPP | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Session login -->
    <?php
    session_start();
    include "conf/conn.php";
    if (!isset($_SESSION['level'])) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu !!!"); window.location.href="pages/login.php"</script>';
    }
    ?>

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi Spp</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/avatar.png" class="img-fluid" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Maulana Adji Sentosa</a>
          </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="fas fa-home nav-icon"></i>
                <p>Beranda</p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Kelolah Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php if ($_SESSION["level"] == "admin") { ?>
                  <li class="nav-item">
                    <a href="index.php?page=data_spp" class="nav-link">
                      <i class="fas fa-gift nav-icon"></i>
                      <p>Data SPP</p>
                    </a>
                  </li>
                <?php } ?>
                <?php if ($_SESSION["level"] == "admin") { ?>
                  <li class="nav-item">
                    <a href="index.php?page=data_kelas" class="nav-link">
                      <i class="fas fa-store nav-icon"></i>
                      <p>Data Kelas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=data_siswa" class="nav-link">
                      <i class="far fa-user-circle nav-icon"></i>
                      <p>Data Siswa</p>
                    </a>
                  </li>
                <?php } ?>
                <?php if ($_SESSION["level"] == "admin") { ?>
                  <li class="nav-item">
                    <a href="index.php?page=data_petugas" class="nav-link">
                      <i class="far fa-user nav-icon"></i>
                      <p>Data Petugas</p>
                    </a>
                  </li>
                <?php } ?>
                <?php if ($_SESSION["level"] !== "siswa") { ?>
                  <li class="nav-item">
                    <a href="index.php?page=data_pembayaran" class="nav-link">
                      <i class="fas fa-shopping-cart nav-icon"></i>
                      <p>Data Pembayaran</p>
                    </a>
                  </li>
                <?php } ?>
                <?php if ($_SESSION["level"] == "siswa") { ?>
                  <li class="nav-item">
                    <a href="index.php?page=histori_pembayaran" class="nav-link">
                      <i class="fas fa-print nav-icon"></i>
                      <p>Histori Pembayaran</p>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>
            <li class="nav-item menu">
              <a href="#" class="nav-link active">
                <i class="fas fa-wrench nav-icon"></i>
                <p>
                  Setting
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/logout.php" class="nav-link active">
                    <i class="fas fa-arrow-left nav-icon"></i>
                    <p>Logout</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content -->
    <?php include "conf/page.php"; ?>
    <!-- /Content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>

  <!-- Javascript Datatable -->
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript">
    function printData() {
      var divToPrint = document.getElementById("pembayaran");
      var newWin = window.open("");
      newWin.document.write('<html><head><title>DATA LAPORAN PEMBAYARAN SPP</title>');
      newWin.document.write('<style>');
      newWin.document.write('table { border-collapse: collapse; width: 100%; }');
      newWin.document.write('th, td { text-align: left; padding: 8px; }');
      newWin.document.write('tr:nth-child(even) { background-color: #f2f2f2; }');
      newWin.document.write('th { background-color: #E5F0FF; color: white; }');
      newWin.document.write('</style>');
      newWin.document.write('</head><body>');
      newWin.document.write(divToPrint.outerHTML);
      newWin.document.write('</body></html>');
      newWin.print();
      newWin.close();
    }

    $(document).ready(function() {
      $('#spp').DataTable();
      scrollX: true
    });

    $(document).ready(function() {
      $('#kelas').DataTable();
      scrollX: true
    });

    $(document).ready(function() {
      $('#siswa').DataTable();
      scrollX: true
    });

    $(document).ready(function() {
      $('#petugas').DataTable();
      scrollX: true
    });

    // $(document).ready(function() {
    //   $('#pembayaran').DataTable();
    // });

    // $(document).ready(function() {
    //   $('#pembayaran').DataTable({
    //     scrollX: true,
    //   });
    // });

    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#pembayaran thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#pembayaran thead');

      var table = $('#pembayaran').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        scrollX: true,
        responsive: true,
        initComplete: function() {
          var api = this.api();

          // For each column
          api
            .columns()
            .eq(0)
            .each(function(colIdx) {
              // Set the header cell to contain the input element
              var cell = $('.filters th').eq(
                $(api.column(colIdx).header()).index()
              );
              var title = $(cell).text();
              $(cell).html('<input type="text" placeholder="' + title + '" />');

              // On every keypress in this input
              $(
                  'input',
                  $('.filters th').eq($(api.column(colIdx).header()).index())
                )
                .off('keyup change')
                .on('change', function(e) {
                  // Get the search value
                  $(this).attr('title', $(this).val());
                  var regexr = '({search})'; //$(this).parents('th').find('select').val();

                  var cursorPosition = this.selectionStart;
                  // Search the column for that value
                  api
                    .column(colIdx)
                    .search(
                      this.value != '' ?
                      regexr.replace('{search}', '(((' + this.value + ')))') :
                      '',
                      this.value != '',
                      this.value == ''
                    )
                    .draw();
                })
                .on('keyup', function(e) {
                  e.stopPropagation();

                  $(this).trigger('change');
                  $(this)
                    .focus()[0]
                    .setSelectionRange(cursorPosition, cursorPosition);
                });
            });
        },
      });
    });
  </script>

</body>


</html>
