<?php
include "../config/koneksi.php";

$id_penjualan = $_POST['id_penjualan'];
$tanggal = $_POST['tanggal'];
$total = $_POST['total'];
$pelanggan = $_POST['pelanggan'];
$id_user = $_POST['id_user'];

mysqli_query($koneksi, "INSERT INTO penjualan values ('$id_penjualan', '$tanggal', '$total', '$pelanggan', '$id_user')");

header("location:transaksi_tambah.php");
