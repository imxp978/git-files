<?php (!isset($_SESSION)) ? session_start() : ''; 

$_SESSION['login']=null;
$_SESSION['emailid']=null;
$_SESSION['email']=null;
$_SESSION['cname']=null;
unset($_SESSION['login']);
unset($_SESSION['emailid']);
unset($_SESSION['cname']);
unset($_SESSION['email']);
$sPath="index.php";
header(sprintf("Location:%s", $sPath));

?>
