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

  <h2 class="text-center">DATA LAPORAN PEMBAYARAN SPP</h2>

  <table class="table table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>NO</th>
        <th>NISN</th>
        <th>NAMA</th>
        <th>KELAS</th>
        <th>SPP</th>
        <th>PEMBAYARAN</th>
        <th>TANGGAL BAYAR</th>
        <th>BULAN BAYAR</th>
        <th>PETUGAS</th>
    </thead>
    <tbody>
      <?php
      $no = 1;
      // $data = mysqli_query($kon, "SELECT tb_pembayaran.*,tb_member.nama , tb_detail_pembayaran.id_paket, tb_detail_pembayaran.harga FROM tb_pembayaran INNER JOIN tb_member ON tb_member.id_member = tb_pembayaran.id_member INNER JOIN tb_detail_pembayaran ON tb_detail_pembayaran.id_pembayaran = tb_pembayaran.id_pembayaran WHERE tb_pembayaran.id_pembayaran");
      require '../conf/conn.php';
      $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER BY nis DESC";
      $dataQ = mysqli_query($kon, $sql);

      while ($data = mysqli_fetch_assoc($dataQ)) {
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?= $data['nisn'] ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['nama_kelas'] ?></td>
          <td>
            <?= $data['tahun'] ?> - <?= 'Rp. ', number_format($data['nominal']); ?>
          </td>
          <td><?= 'Rp. ' .  number_format($data['jumlah_bayar']); ?></td>
          <td><?= $data['tgl_bayar'] ?></td>
          <td><?= $data['bulan_dibayar'] ?></td>
          <td><?= $data['nama_petugas'] ?></td>
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
