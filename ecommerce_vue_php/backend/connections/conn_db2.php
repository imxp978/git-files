<?php
    $dsn = "mysql:host=localhost; dbname=ecommerce_php; charset=utf8";
    $user = "sales";
    $password = "123456";
    $link = new PDO($dsn, $user, $password);
    date_default_timezone_set ("asia/taipei");
?>