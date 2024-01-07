<?php
// Mulai sesi
session_start();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: index.php");
exit();
?>