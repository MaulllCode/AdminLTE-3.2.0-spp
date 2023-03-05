<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda
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
    case 'laporan':
      include 'pages/pembayaran/laporan.php';
      break;
    case 'data_pembayaran':
      include 'pages/pembayaran/data_pembayaran.php';
      break;
    case 'cari_spp';
      include 'pages/pembayaran/cari_spp.php';
      break;
    case 'hapus_pembayaran';
      include 'pages/pembayaran/hapus_pembayaran.php';
      break;
    case 'tambah_pembayaran':
      include 'pages/pembayaran/tambah_pembayaran.php';
      break;
    case 'tambah_pembayaran2':
      include 'pages/pembayaran/tambah_pembayaran2.php';
      break;
    case 'pembayaran_sukses':
      include 'pages/pembayaran/pembayaran_sukses.php';
      break;
    case 'bayar';
      include 'pages/pembayaran/bayar.php';
      break;
    case 'pembayaran_dibayar';
      include 'pages/pembayaran/pembayaran_dibayar.php';
      break;
    case 'histori';
      include 'pages/pembayaran/histori.php';
      break;
    case 'histori_pembayaran';
      include 'pages/pembayaran/histori_pembayaran.php';
      break;
    case 'keranjang';
      include 'pages/pembayaran/keranjang.php';
      break;
    case 'cetak';
      include 'pages/cetak.php';
      break;
    default:
      echo "<center><h3>Halaman tidak di temukan !</h3></center>";
      break;
  }
} else {
  include "pages/beranda.php";
}
