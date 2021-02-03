<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetid = $_POST['assetid'];

$sql = "UPDATE asset  SET assetCommit = 1 WHERE assetid = '$assetid'";
$result = mysql_query($sql);
if ($result) {
    $resourceid = $assetid; 
   $userid = $_SESSION['userid'];
   $logoperation = "assetCommit";
   Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
   
?>