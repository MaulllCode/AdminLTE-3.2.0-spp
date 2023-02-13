<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda
    case 'data_user':
      include 'pages/user/data_user.php';
      break;
    case 'tambah_user':
      include 'pages/user/tambah_user.php';
      break;
    case 'ubah_user';
      include 'pages/user/ubah_user.php';
      break;
    case 'data_member':
      include 'pages/member/data_member.php';
      break;
    case 'tambah_member':
      include 'pages/member/tambah_member.php';
      break;
    case 'ubah_member';
      include 'pages/member/ubah_member.php';
      break;
    case 'data_outlet':
      include 'pages/outlet/data_outlet.php';
      break;
    case 'tambah_outlet':
      include 'pages/outlet/tambah_outlet.php';
      break;
    case 'ubah_outlet';
      include 'pages/outlet/ubah_outlet.php';
      break;
    case 'data_paket':
      include 'pages/paket/data_paket.php';
      break;
    case 'tambah_paket':
      include 'pages/paket/tambah_paket.php';
      break;
    case 'ubah_paket';
      include 'pages/paket/ubah_paket.php';
      break;
    case 'laporan':
      include 'pages/transaksi/laporan.php';
      break;
    case 'data_transaksi':
      include 'pages/transaksi/data_transaksi.php';
      break;
    case 'cari_member';
      include 'pages/transaksi/cari_member.php';
      break;
    case 'tambah_transaksi':
      include 'pages/transaksi/tambah_transaksi.php';
      break;
    case 'transaksi_sukses':
      include 'pages/transaksi/transaksi_sukses.php';
      break;
    case 'bayar';
      include 'pages/transaksi/bayar.php';
      break;
    case 'transaksi_dibayar';
      include 'pages/transaksi/transaksi_dibayar.php';
      break;
    case 'konfirmasi';
      include 'pages/transaksi/konfirmasi.php';
      break;
    case 'detail';
      include 'pages/transaksi/detail.php';
      break;
    case 'cetak_laporan';
      include 'pages/cetak_laporan.php';
      break;
  }
} else {
  include "pages/beranda.php";
}
