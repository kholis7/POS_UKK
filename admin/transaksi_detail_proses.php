<?php
include "../config/koneksi.php";

//id_detail, id_penjualan, id_produk, jml_produk, sub_total
$id_penjualan = $_POST['id_penjualan'];
$id_produk = $_POST['produk'];
$jml_produk = $_POST['jumlah'];

//Menghitung subtotal
$h = mysqli_query($koneksi, "SELECT harga from produk where id_produk='$id_produk'");
$harga = mysqli_fetch_assoc($h);
$sub_total = implode($harga) * $jml_produk;
// $sub_total = 10000;

//Insert data ke tabel detail penjualan
mysqli_query($koneksi, "INSERT INTO detail_penjualan values ('', '$id_penjualan', '$id_produk', '$jml_produk', '$sub_total')");

//Menghitung Stok terbaru
$stok = mysqli_query($koneksi, "SELECT stok from produk where id_produk='$id_produk'");
$s = mysqli_fetch_assoc($stok);
$up_stok = implode($s) - $jml_produk;

//Update data stok di tabel produk
mysqli_query($koneksi, "UPDATE produk set stok = '$up_stok' where id_produk='$id_produk'");


header("location:transaksi_tambah.php");
