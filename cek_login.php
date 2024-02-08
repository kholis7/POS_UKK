<?php
include "config/koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['role'];


$login = mysqli_query($koneksi, "SELECT * from user where username='$username' and password='$password' and role='$role' ");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
  $data = mysqli_fetch_assoc($login);
  if ($data['role'] == 'Admin') {
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nm_user'] = $data['nm_user'];
    $_SESSION['role'] = 'Admin';
    header("location:admin/index.php");
  } else if ($data['role'] == 'Kasir') {
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nm_user'] = $data['nm_user'];
    $_SESSION['role'] = 'Kasir';
    header("location:petugas/index.php");
  } else {
    header("location:index.php?pesan=gagal");
  }
} else {
  header("location:index.php?pesan=gagal");
}
