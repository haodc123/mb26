<?php
session_start();
// $_SERVER['REQUEST_URI'] = mb26/home.php?name=abc   $uriArray = {mb26;home.php?name=abc}
// $pageParaArray = {home;php?name=abc}
$uriArray = explode("/", $_SERVER['REQUEST_URI']); 
$pageParaArray = explode("\.",$uriArray[sizeof($uriArray)-1]);
$pageWithParam = explode("?",$pageParaArray[0]);
$_SESSION['Page'] = $pageWithParam[0];
require_once("global/func.php");
?>