<?php
require_once('connections/conn_db.php');

if (isset($_GET['email'])) {
  $email = $_GET['email'];
  $query = sprintf("SELECT emailid FROM member WHERE email = '%d'", $email);
  $result = $link->query($query);
  $row = $result->rowCount();
  if ($row == 0) {
    echo 'true';
    return;
  }
}

echo 'false';
return;
