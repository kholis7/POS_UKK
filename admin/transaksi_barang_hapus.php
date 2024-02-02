<?php
include "../config/koneksi.php";

$id_produk = $_GET['id_produk'];
$id_penjualan = $_GET['id_penjualan'];

mysqli_query($koneksi, "DELETE FROM detail_penjualan where id_produk = '$id_produk' AND id_penjualan='$id_penjualan'");

header("location:transaksi_tambah.php");
