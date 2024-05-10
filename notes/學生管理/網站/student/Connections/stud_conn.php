<?php
  //PDO SQL connect command
  $dsn = "mysql:host=localhost; dbname=student; charset=utf8";
  $user = "root";
  $password = "";
  $link = new PDO($dsn, $user, $password);
  date_default_timezone_set ("asia/taipei");
?>