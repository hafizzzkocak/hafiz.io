<?php
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain setelah logout
header("Location: form_login.php");
exit;
?>