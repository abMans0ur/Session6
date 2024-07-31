<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "php-113-online";
$conn = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$conn) {
    die("Connection Failed!! ".mysqli_connect_error());
}
$error=array();
session_start();