<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];

  switch ($page) {
      //Dashboard
    case 'dashboard':
      include 'pages/index.php';
      break;
  }
} else {
  include 'dashboard/dashboard.php';
}
