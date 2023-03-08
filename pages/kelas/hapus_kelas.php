<?php

if ($_SESSION["level"] !== "admin") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}

include 'conf/function.php';

$id = $_GET['id_kelas'];

$sql = "DELETE FROM kelas WHERE id_kelas = '$id' LIMIT 1 ";

$result = crud($kon, $sql);

if (!$result) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="index.php?page=data_kelas"</script>';
}
