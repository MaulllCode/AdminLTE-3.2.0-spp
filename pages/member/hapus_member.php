

<?php
include "../../conf/conn.php";

$id = $_GET['id_member'];

$sql = "DELETE FROM tb_member WHERE id_member ='$id' LIMIT 1 ";

$result = mysqli_query($kon, $sql);

if (!$result) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_member"</script>';
}
