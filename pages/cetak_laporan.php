<?php

setlocale(LC_ALL, 'id_id');
setlocale(LC_TIME, 'id_ID.utf8');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Cetak Laporan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

  <h2 class="text-center">DATA LAPORAN TRANSAKSI LAUNDRY</h2>

  <table class="table table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>NO</th>
        <th>KODE INVOICE</th>
        <th>MEMBER</th>
        <th>STATUS CUCIAN</th>
        <th>STATUS PEMBAYARAN</th>
        <th>TOTAL HARGA</th>
    </thead>
    <tbody>
      <?php
      include "../conf/conn.php";
      $no = 1;
      $query = mysqli_query($kon, "SELECT tb_transaksi.*,tb_member.nama , tb_detail_transaksi.id_paket, tb_detail_transaksi.harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi");
      while ($transaksi = mysqli_fetch_array($query)) {
      ?>

        <tr>
          <td><?php echo $no++; ?></td>
          <td><?= $transaksi['kode_invoice'] ?></td>
          <td><?= $transaksi['nama'] ?></td>
          <td><?= $transaksi['status'] ?></td>
          <td><?= $transaksi['dibayar'] ?></td>
          <td><?= $transaksi['harga'] ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <script>
    window.print();
  </script>

</body>

</html>
