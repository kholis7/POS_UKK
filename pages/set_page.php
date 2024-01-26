<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];

  switch ($page) {
      //Kasir
    case 'data_kasir':
      include 'kasir/data_kasir.php';
      break;

      //Pelanggan
    case 'pelanggan_data':
      include 'pelanggan/pelanggan_data.php';
      break;

      //Produk
    case 'barang_data':
      include 'barang/barang_data.php';
      break;

      //kategori
    case 'kategori_data':
      include 'kategori/kategori_data.php';
      break;

      //Transaksi
    case 'transaksi_data':
      include 'transaksi/transaksi_data.php';
      break;

    case 'transaksi_tambah':
      include 'transaksi/transaksi_tambah.php';
      break;
  }
} else {
  include 'dashboard/dashboard.php';
}
