<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_album_conn = "localhost";
$database_album_conn = "album";
$username_album_conn = "root";
$password_album_conn = "";
$album_conn = mysql_pconnect($hostname_album_conn, $username_album_conn, $password_album_conn) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_query("SET NAMES utf8");

?>