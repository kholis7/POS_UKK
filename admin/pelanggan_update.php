<?php
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal pelanggan
$id_pelanggan = $_POST['id_pelanggan'];
$nm_pelanggan = $_POST['nm_pelanggan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];


// Update data Pelanggan
mysqli_query($koneksi, "UPDATE pelanggan set nm_pelanggan='$nm_pelanggan', alamat='$alamat', no_telp='$no_hp' where id_pelanggan='$id_pelanggan'");

header("location:pelanggan_data.php");
