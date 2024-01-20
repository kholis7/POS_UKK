<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];

  switch ($page) {
      //Kasir
    case 'data_kasir':
      include 'kasir/data_kasir.php';
      break;

      //Pelanggan
    case 'data_pelanggan':
      include 'pelanggan/data_pelanggan.php';
      break;
  }
} else {
  include 'dashboard/dashboard.php';
}
