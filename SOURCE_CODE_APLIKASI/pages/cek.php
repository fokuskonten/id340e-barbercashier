<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

	if (!isset($_SESSION)) {
		session_start();
	}else{
		if (!isset($_SESSION['jenengataz'])) {
			session_start();
			header("location:login.php");
			exit;
		}
	}
?>

<?php
/*
if(!isset($_SESSION)) 
{ 
session_start(); 
} 

if (!isset($_SESSION['jenengataz']))
{
    session_start(); 
	header("location:login.html");
	exit;
}
*/
?>