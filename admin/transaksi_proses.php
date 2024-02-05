<?php
include "../config/koneksi.php";

$id_penjualan = $_POST['id_penjualan'];
$tanggal = $_POST['tanggal'];
// Menghitung sub total
$sub_total_belanja = mysqli_query($koneksi, "SELECT SUM(sub_total) AS sub_total FROM detail_penjualan WHERE id_penjualan='$id_penjualan'");
while ($total_belanja = mysqli_fetch_array($sub_total_belanja)) { ?>
<?php
  $total = +$total_belanja['sub_total'];
}

$jml_total = $total;
$id_pelanggan = $_POST['pelanggan'];
$id_user = $_POST['id_user'];

mysqli_query($koneksi, "INSERT INTO penjualan values ('$id_penjualan', '$tanggal', '$jml_total', '$id_pelanggan', '$id_user')");

header("location:transaksi_data.php");
