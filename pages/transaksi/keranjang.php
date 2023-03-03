<?php
if ($_SESSION["role"] == "Owner") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}


if (isset($_GET['jenis']) && isset($_GET['qty'])) {

  $jenis = $_GET['jenis'];
  $id_member = $_GET['id_member'];
  $qty = $_GET['qty'];

  $query = mysqli_query($kon, "SELECT * FROM tb_paket WHERE jenis = '$jenis'");
  $data = mysqli_fetch_array($query);

  $jenis = $data['jenis'];
  $harga = $data['harga'];
} else {
  $jenis = "";
  $qty = 0;
}

if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
} else {
  $aksi = "";
}


switch ($aksi) {
    //Fungsi untuk menambah penyewaan kedalam cart
  case "tambah_produk":
    $itemArray = array($jenis => array('jenis' => $jenis, 'qty' => $qty, 'harga' => $harga));
    if (!empty($_SESSION["keranjang"])) {
      if (in_array($data['jenis'], array_keys($_SESSION["keranjang"]))) {
        foreach ($_SESSION["keranjang"] as $k => $v) {
          if ($data['jenis'] == $k) {
            $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"], $itemArray);
          }
        }
      } else {
        $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"], $itemArray);
      }
    } else {
      $_SESSION["keranjang"] = $itemArray;
    }
    break;

    //Fungsi untuk menghapus item dalam cart
  case "hapus":
    if (!empty($_SESSION["keranjang"])) {
      foreach ($_SESSION["keranjang"] as $k => $v) {
        if ($_GET["jenis"] == $k)
          unset($_SESSION["keranjang"][$k]);
        if (empty($_SESSION["keranjang"]))
          unset($_SESSION["keranjang"]);
      }
    }
    break;

  case "update":
    echo "anda pilih update jumlah=$qty";
    $itemArray = array($jenis => array('jenis' => $jenis, 'qty' => $qty, 'harga' => $harga));
    if (!empty($_SESSION["keranjang"])) {
      foreach ($_SESSION["keranjang"] as $k => $v) {
        if ($_GET["jenis"] == $k)
          $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"], $itemArray);
      }
    }
    break;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">KERANJANG BELANJA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_transaksi">Home</a></li>
            <li class="breadcrumb-item active">Keranjang Belanja</li>
          </ol>
        </div>
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
            <div class="box-header pb-3 row">
              <div class="col">
                <a href="index.php?page=tambah_transaksi&id_member=<?= $_SESSION['id_member']; ?>" class="btn btn-primary" role="button"><i class="fas fa-plus"></i> Tambah Paket</a>
              </div>
              <div class="col-sm-3 justify-content-end">
                <a href="index.php?page=transaksi_sukses&id_member=<?= $id_member ?>" class="btn btn-primary col" role="button"><i class="fas fa-shopping-cart"></i> Buat Pesanan</a>
              </div>
            </div>
            <!-- form start -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>JENIS CUCIAN</th>
                  <th>HARGA</th>
                  <th>qty</th>
                  <th>TOTAL HARGA</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $sub_total = 0;
                $total = 0;
                $total_berat = 0;
                if (!empty($_SESSION["keranjang"])) :
                  foreach ($_SESSION["keranjang"] as $item) :
                    $no++;
                    $sub_total = $item['qty'] * $item['harga'];
                    $total += $sub_total;
                ?>
                    <input type="hidden" name="jenis[]" class="jenis" value="<?= $item["jenis"]; ?>" />
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $item["jenis"]; ?></td>
                      <td>Rp. <?= number_format($item["harga"]); ?> </td>
                      <td>
                        <input type="number" min="1" value="<?= $item["qty"]; ?>" class="form-control" id="qty<?= $no; ?>" name="qty[]">
                        <script>
                          $("#qty<?= $no; ?>").bind('change', function() {
                            var qty<?= $no; ?> = $("#qty<?= $no; ?>").val();
                            $("#qtya<?= $no; ?>").val(qty<?= $no; ?>);
                          });
                          $("#qty<?= $no; ?>").keydown(function(event) {
                            return false;
                          });
                        </script>
                      </td>
                      <td>Rp. <?= number_format($sub_total); ?> </td>

                      <td>
                        <form method="GET" role="form">
                          <input type="hidden" name="page" value="keranjang" class="form-control">
                          <input type="hidden" name="id_member" value="<?= $id_member ?>" class="form-control">
                          <input type="hidden" name="jenis" value="<?= $item['jenis']; ?>" class="form-control">
                          <input type="hidden" name="aksi" value="update" class="form-control">
                          <input type="hidden" name="qty" value="<?= $item['qty']; ?>" id="qtya<?= $no; ?>" value="qty[]" class="form-control">
                          <button type="submit" class="btn btn-warning"><i class="fas fa-pen"></i> Updates</button>

                          <a href="index.php?page=keranjang&jenis=<?= $item['jenis']; ?>&aksi=hapus" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                        </form>
                      </td>
                    </tr>
                <?php
                  endforeach;
                endif;
                ?>
              </tbody>
            </table>
            <h3>Total Pembayaran Rp. <?= number_format($total, 0, ',', '.');
                                      echo "jumlah=$qty"; ?> </h3>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content-header -->
</div>
