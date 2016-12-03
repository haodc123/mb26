<?php
session_start();
// $_SERVER['REQUEST_URI'] = mb26/home.php?name=abc   $uriArray = {mb26;home.php?name=abc}
// $pageParaArray = {home;php?name=abc}
$uriArray = explode("/", $_SERVER['REQUEST_URI']); 
$pageParaArray = explode("\.",$uriArray[sizeof($uriArray)-1]);
$pageWithParam = explode("?",$pageParaArray[0]);
$_SESSION['Page'] = $pageWithParam[0];

require_once("../global/func.php");

if ($_SESSION['Page'] == 'login.html' || $_SESSION['Page'] == 'login.php') {
	if (isset($_SESSION['Username']) && strcmp($_SESSION['Username'], "") != 0) { // Already login
		redirectToPage("minad/admin.html");
	}
} else if ($_SESSION['Page'] == 'do_login.html' || $_SESSION['Page'] == 'do_login.php') {
	if ($_GET['do'] != 'logout') {
		if (isset($_SESSION['Username']) && strcmp($_SESSION['Username'], "") != 0) { // Already login
			redirectToPage("minad/admin.html");
		}
	}
} else {
	if (!isset($_SESSION['Username']) || strcmp($_SESSION['Username'], "") == 0) { // Not login
		redirectToPage("minad/login.html");
	}
}
?>