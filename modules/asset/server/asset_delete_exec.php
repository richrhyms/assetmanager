<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetid = $_POST['assetid'];//clean($_POST['assetname']);
$sql = "DELETE FROM asset WHERE assetid = $assetid";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $logoperation="assetDelete";
    $userid = $_SESSION['userid'];
    $resourceid=$assetid;
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>