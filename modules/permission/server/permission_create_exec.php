<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$permissionname = clean($_POST['permissionname']);

$sql = "INSERT INTO permission(permissionname) VALUES ('$permissionname')";

$result = mysql_query($sql) or die(mysql_error());

$resourceid= mysql_insert_id();
if ($result) {
    $logoperation="addPermission";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>