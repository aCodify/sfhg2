<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_select1 = "localhost";
$database_select1 = "sfhg";
$username_select1 = "root";
$password_select1 = "root";
$select1 = mysql_pconnect($hostname_select1, $username_select1, $password_select1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>