

<?php

if ($_SESSION["role"] == "Owner") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}

include "../../conf/conn.php";

$id = $_GET['id_transaksi'];

$sql1 = "DELETE FROM tb_detail_transaksi WHERE id_transaksi ='$id' LIMIT 1 ";
$result1 = mysqli_query($kon, $sql1);

if ($result1 == 1) {
  $sql2 = "DELETE FROM tb_transaksi WHERE id_transaksi ='$id' LIMIT 1 ";

  $result = mysqli_query($kon, $sql2);

  if (!$result) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="index.php?page=data_transaksi"</script>';
  }
}
