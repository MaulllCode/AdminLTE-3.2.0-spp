<?php

if ($_SESSION["level"] !== "admin") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}

include "../../conf/conn.php";
$nisn = $_GET['nisn'];

$sql = "DELETE FROM siswa WHERE nisn ='$nisn'";

$result = mysqli_query($kon, $sql);

if (!$result) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>alert("Data Berhasil Dihapus !!!"); window.location.href="index.php?page=data_siswa"</script>';
}
