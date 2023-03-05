<?php
include '../conf/conn.php';
session_start();
if (isset($_SESSION['level'])) {
  session_destroy();
  echo '<script>alert("Anda Telah Logout !!!"); window.location.href="login.php"</script>';
} else {
  echo '<script>alert("Anda Belum melakukan Login !!!"); window.location.href="login.php"</script>';
}
