<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$userid = clean($_POST['userid']);
$username = clean($_POST['username']);
$password = clean($_POST['password']);
$displayname = clean($_POST['displayname']);
$status = clean($_POST['status']);


$sql = "UPDATE user SET username = '$username', password= '$password', displayname='$displayname', enabled='$status' WHERE userid = '$userid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    echo true;
} else {
    echo false;
}
?>