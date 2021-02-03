<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$categoryname = clean($_POST['categoryname']);
$categorydesc = clean($_POST['categorydesc']);

$sql = "INSERT INTO assetcategory (categoryname, categorydesc) VALUES('$categoryname', '$categorydesc')";
$result = mysql_query($sql) or die(mysql_error());
$resourceid=  mysql_insert_id();

if ($result) {
    $logoperation="addAssetCategory";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>