<?php
include "../config/koneksi.php";

// menangkap data id yang dikirim
$id_pelanggan = $_GET['id_pelanggan'];

// menghapus pelanggan
mysqli_query($koneksi, "DELETE from pelanggan where id_pelanggan='$id_pelanggan'");

// alihkan halaman ke halaman pelanggan
header("location:pelanggan_data.php");
