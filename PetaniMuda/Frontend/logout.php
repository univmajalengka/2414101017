<?php
session_start();

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke halaman utama (atau login)
header("Location: Home.php");
exit;
?>
