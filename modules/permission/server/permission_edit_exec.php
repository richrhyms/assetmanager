<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$permissionid = clean($_POST['permissionid']);
$permissionname = clean($_POST['permissionname']);


$sql = "UPDATE permission SET permissionname = '$permissionname' WHERE permissionid = '$permissionid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $permissionid;
    $logoperation="editPermission";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>