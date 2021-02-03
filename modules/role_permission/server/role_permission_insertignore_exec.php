<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$roleid = $_POST['roleid'];
$permissionid = $_POST['permissionid'];

$sql = "SELECT * FROM role_permission WHERE roleid = '$roleid' AND permissionid = '$permissionid'";
$result = mysql_query($sql);

if (mysql_num_rows($result) <= 0) {
    $sql = "INSERT INTO role_permission VALUES('', '$roleid', '$permissionid')";
    $result = mysql_query($sql) or die(mysql_error());
}

if ($result) {
    echo true;
} else {
    echo false;
}
?>