<?php
include "../config/koneksi.php";

// menangkap data id yang dikirim
$id_produk = $_GET['id_produk'];
$id_penjualan = $_GET['id_penjualan'];


//Menghitung Stok terbaru
$jml_stok = mysqli_query($koneksi, "SELECT jml_produk from detail_penjualan where id_produk='$id_produk' AND id_penjualan='$id_penjualan' ");
$jml = mysqli_fetch_assoc($jml_stok);
$stok = mysqli_query($koneksi, "SELECT stok from produk where id_produk='$id_produk'");
$s = mysqli_fetch_assoc($stok);
$up_stok = implode($s) + implode($jml);

//Update data stok di tabel produk
mysqli_query($koneksi, "UPDATE produk set stok = '$up_stok' where id_produk='$id_produk'");

// menghapus data produk pembelian
mysqli_query($koneksi, "DELETE FROM detail_penjualan where id_produk = '$id_produk' AND id_penjualan='$id_penjualan'");

// alihkan halaman ke halaman transaksi tambah
header("location:transaksi_tambah.php");
