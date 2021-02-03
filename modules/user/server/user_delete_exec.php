<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$userid = $_POST['userid'];//clean($_POST['assetname']);
$sql = "DELETE FROM user WHERE userid = '$userid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $userid;
    $logoperation="deleteUser";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>