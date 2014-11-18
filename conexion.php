<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$hostname_prueba = "localhost";
$database_prueba = "test";
$username_prueba = "root";
$password_prueba = "";
$prueba = mysql_pconnect($hostname_prueba, $username_prueba,$password_prueba) or die(mysql_error());
?>