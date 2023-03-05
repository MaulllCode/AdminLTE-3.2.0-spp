

<?php

if ($_SESSION["level"] == "siswa") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}

$id_pembayaran = $_GET['id_pembayaran'];

$sql1 = "DELETE FROM pembayaran WHERE id_pembayaran ='$id_pembayaran'";
$result = mysqli_query($kon, $sql1);

if (!$result) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>alert("Data Berhasil Dihapus !!!");
  window.location.href="index.php?page=data_pembayaran"</script>';
}
