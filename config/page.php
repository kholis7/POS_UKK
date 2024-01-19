<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];

  switch ($page) {
      //Siswa
    case 'dashboard':
      include 'pages/index.php';
      break;
  }
} else {
  include 'pages/dashboard/dashboard.php';
}
