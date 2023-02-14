<?php

if ($_SESSION["role"] !== "Admin") {
  echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index.php"</script>';
}

include "../../conf/conn.php";
$id = $_GET['id_outlet'];

$sql = "DELETE FROM tb_outlet WHERE id_outlet ='$id' LIMIT 1 ";

$result = mysqli_query($kon, $sql);

if (!$result) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="index.php?page=data_outlet"</script>';
}
