<?php
  //PDO SQL connect command
  $dsn = "mysql:host=localhost; dbname=pharmacy; charset=utf8";
  $user = "sales";
  $password = "123456";
  $link = new PDO($dsn, $user, $password);
  date_default_timezone_set ("asia/taipei");
?>


<?php
  $dsn = "mysql:host=localhost; dbname=pharmacy; charset=utf8";
  $user = "sales";
  $password = "ps";

  $link = new PDO($dsn, $user, $password);
  date_default_timezone_set ('asia/taipei');

?>


<?php
  require_once('connections/conn_db.php');
?>

<?php (!isset($_SESSION))?session_start():''; ?>
