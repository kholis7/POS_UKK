<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'pos_ukk');

if (mysqli_connect_errno()) {
  echo "Koneksi Gagal : " . mysqli_connect_errno();
}
