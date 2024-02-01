<?php

$id_penjualan = $_POST['no_trans'];
$id_produk = $_POST['produk'];
$jml_produk = $_POST['jumlah'];

$harga = mysqli_query($koneksi, "SELECT harga from barang where id_produk = $id_produk");
$h = mysqli_fetch_assoc($harga);
$sub_total = $h * $jml_produk;


mysqli_query($koneksi, "INSERT INTO detail_penjualan values ('', '$id_penjualan', '$id_produk', '$jml_produk', '$sub_total')");

header("location:transaksi_data.php");
