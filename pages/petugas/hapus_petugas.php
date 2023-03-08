<?php

if ($_SESSION["level"] !== "admin") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}

include "conf/function.php";

$id_petugas = $_GET['id_petugas'];

$sql = "DELETE FROM petugas WHERE id_petugas ='$id_petugas'";

$result = crud($kon, $sql);

if (!$result) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="index.php?page=data_petugas"</script>';
}
