<?php
$hostname = "localhost";
$database = "assetmanager";
$username = "root";
$password = "";
$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
$db = mysql_select_db($database, $conn) or die(mysql_error());
if (!$db) {
    die("Unable to select database");
}
?>