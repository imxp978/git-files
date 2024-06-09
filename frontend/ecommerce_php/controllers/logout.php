<?php (session_status() == PHP_SESSION_NONE) ? session_start() : '';

$_SESSION['login'] = null;
$_SESSION['id'] = null;
$_SESSION['email'] = null;
unset($_SESSION['login']);
unset($_SESSION['id']);
unset($_SESSION['email']);
$sPath = "../member.php";
header(sprintf("Location:%s", $sPath));
