<?php

session_start();
if (!isset($_SESSION["role"]) == "Admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="paket.php"</script>';
    exit;
}

include "../conn.php";

if ($_GET) {
    $id_paket = $_GET['id_paket'];

    $sql = "DELETE FROM tb_paket WHERE id_paket ='$id_paket'";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo '<script>alert("Data Berhasil Dihapus !!!"); window.location.href="paket.php"</script>';
    }
} else {
    echo '<script>alert("Pilih data yang ingin dihapus terlebih dahulu !!!"); window.location.href="paket.php"</script>';
}
