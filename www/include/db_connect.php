<?php
$db_host = 'localhost';
$db_user = 'admin';
$db_pass = 'root';
$db_database = 'db_shop';

$link = mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_database,$link) or die ("нет соединения с БД".mysql_error());
mysql_query("SET names UTF-8");
?>