<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Siswa
    case 'data_siswa':
      include 'pages/siswa/data_siswa.php';
      break;
    case 'tambah_siswa':
      include 'pages/siswa/tambah_siswa.php';
      break;
    case 'ubah_siswa';
      include 'pages/siswa/ubah_siswa.php';
      break;
    case 'hapus_siswa';
      include 'pages/siswa/hapus_siswa.php';
      break;
      // Spp
    case 'data_spp':
      include 'pages/spp/data_spp.php';
      break;
    case 'tambah_spp':
      include 'pages/spp/tambah_spp.php';
      break;
    case 'ubah_spp';
      include 'pages/spp/ubah_spp.php';
      break;
    case 'hapus_spp';
      include 'pages/spp/hapus_spp.php';
      break;
      // Kelas
    case 'data_kelas':
      include 'pages/kelas/data_kelas.php';
      break;
    case 'tambah_kelas':
      include 'pages/kelas/tambah_kelas.php';
      break;
    case 'ubah_kelas';
      include 'pages/kelas/ubah_kelas.php';
      break;
    case 'hapus_kelas';
      include 'pages/kelas/hapus_kelas.php';
      break;
      // Petugas
    case 'data_petugas':
      include 'pages/petugas/data_petugas.php';
      break;
    case 'tambah_petugas':
      include 'pages/petugas/tambah_petugas.php';
      break;
    case 'ubah_petugas';
      include 'pages/petugas/ubah_petugas.php';
      break;
    case 'hapus_petugas';
      include 'pages/petugas/hapus_petugas.php';
      break;
      // Pembayaran
    case 'data_pembayaran':
      include 'pages/pembayaran/data_pembayaran.php';
      break;
    case 'hapus_pembayaran';
      include 'pages/pembayaran/hapus_pembayaran.php';
      break;
    case 'tambah_pembayaran':
      include 'pages/pembayaran/tambah_pembayaran.php';
      break;
    case 'histori';
      include 'pages/pembayaran/histori.php';
      break;
    case 'histori_pembayaran';
      include 'pages/pembayaran/histori_pembayaran.php';
      break;
    case 'cetak';
      include 'pages/cetak.php';
      break;
    default:
      echo "<center><h3>Halaman tidak di temukan !</h3></center>";
      break;
  }
} else {
  // Beranda
  include "pages/beranda.php";
}
