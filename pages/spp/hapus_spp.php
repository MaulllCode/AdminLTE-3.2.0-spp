

<?php

if ($_SESSION["level"] !== "admin") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}

include "../../conf/conn.php";

$id = $_GET['id_spp'];

$sql = "DELETE FROM spp WHERE id_spp ='$id' LIMIT 1 ";

$result = mysqli_query($kon, $sql);

if (!$result) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="index.php?page=data_spp"</script>';
}
