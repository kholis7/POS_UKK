<?php
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal pelanggan
$nm_pelanggan = $_POST['nm_pelanggan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];


mysqli_query($koneksi, "INSERT INTO pelanggan values ('', '$nm_pelanggan', '$alamat', '$no_hp')");

header("location:pelanggan_data.php");
