<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$permissionid = $_POST['permissionid'];//clean($_POST['assetname']);
$sql = "DELETE FROM permission WHERE permissionid = '$permissionid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $permissionid;
    $logoperation="deletePermission";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>