<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$categoryid = clean($_POST['categoryid']);
$categoryname = clean($_POST['categoryname']);
$categorydesc = clean($_POST['categorydesc']);

$sql = "UPDATE assetcategory SET categoryname = '$categoryname', categorydesc = '$categorydesc' WHERE categoryid = '$categoryid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $categoryid;
    $logoperation="editAssetCategory";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>
