<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_members_conn = "localhost";
$database_members_conn = "members";
$username_members_conn = "root";
$password_members_conn = "";
$members_conn = mysql_pconnect($hostname_members_conn, $username_members_conn, $password_members_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>