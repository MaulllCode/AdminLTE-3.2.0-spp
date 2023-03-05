<?php
include '../conf/conn.php';
session_start();
if (isset($_SESSION['level'])) {
  session_destroy();
  echo '<script>alert("Anda Telah Logout !!!"); window.location.href="login.php"</script>';
}
