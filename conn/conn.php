<?php

$dbhost = 'server';
$dbuser = 'database_username';
$dbpass = 'database_password';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('database_name');
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);
?>
