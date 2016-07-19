<?php
require_once('connection.php');

if(!isset($_SESSION)){
    session_start();
}
$allowedPages = array('/login.php');
if(!$_SESSION['User']){
	if(!in_array($_SERVER['REQUEST_URI'], $allowedPages))
		header('location:login.php');
}
?>
