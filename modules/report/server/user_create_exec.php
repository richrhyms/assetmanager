<?php
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$username = clean($_POST['username']);
$password = clean($_POST['password']);

$displayname = clean($_POST['displayname']);

$datecreated = Date('Y-m-d');

$status = clean($_POST['status']);

$sql = "INSERT INTO user VALUES('', '$username', '$password',  '$displayname', '$datecreated', '$status')";
$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    echo true;
} else {
    echo false;
}
?>