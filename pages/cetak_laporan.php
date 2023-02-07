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
        <th>ID</th>
        <th>ID OUTLET</th>
        <th>KODE INVOICE</th>
        <th>ID MEMBER</th>
        <th>TANGGAL</th>
        <th>BATAS WAKTU</th>
        <th>TANGGAL BAYAR</th>
        <th>BIAYA TAMBAHAN</th>
        <th>DISKON</th>
        <th>PAJAK</th>
        <th>STATUS</th>
        <th>DIBAYAR</th>
        <th>ID USER</th>
    </thead>
    <tbody>
      <?php
      include "../conf/conn.php";
      $no = 1;
      $query = mysqli_query($kon, "SELECT * FROM tb_transaksi");
      while ($row = mysqli_fetch_array($query)) {
      ?>

        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['id_outlet']; ?></td>
          <td><?php echo $row['kode_invoice']; ?></td>
          <td><?php echo $row['id_member']; ?></td>
          <td><?php echo $row['tgl']; ?></td>
          <td><?php echo $row['batas_waktu']; ?></td>
          <td><?php echo $row['tgl_bayar']; ?></td>
          <td><?php echo $row['biaya_tambahan']; ?></td>
          <td><?php echo $row['diskon']; ?>%</td>
          <td><?php echo $row['pajak']; ?>%</td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['dibayar']; ?></td>
          <td><?php echo $row['id_user']; ?></td>
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
