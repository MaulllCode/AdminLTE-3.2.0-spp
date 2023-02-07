<?php
include "../../conf/conn.php";
$id = $_GET['id_user'];

$sql = "DELETE FROM tb_user WHERE id_user ='$id'";

$result = mysqli_query($kon, $sql);

if (!$result) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>alert("Data Berhasil Dihapus !!!"); window.location.href="../../index.php?page=data_user"</script>';
}
