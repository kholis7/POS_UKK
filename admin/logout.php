<?php
// mengaktifkan session
session_start();

// menghapus semua session yang ada
session_destroy();

// mengalihkan ke halaman login dan mengirimkan pesan logout 
header("location:../index.php?pesan=logout");
