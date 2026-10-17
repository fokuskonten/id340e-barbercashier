<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');
   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:login.php"); //to redirect back to "index.php" after logging out
exit();
?>
