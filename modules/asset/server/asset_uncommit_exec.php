<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetid = $_POST['assetid'];

$sql = "UPDATE asset SET assetcommit = 0 WHERE assetid = '$assetid'";
$result = mysql_query($sql) or die(mysql_error());

$logoperation="assetUncommit";
    $userid = $_SESSION['userid'];
    $resourceid=$assetid;
    Logs($logoperation, $userid, $resourceid);

if ($result) {
    echo true;
} else {
    echo false;
}
?>