<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetname = clean($_POST['assetname']);
$assetdesc = clean($_POST['assetdesc']);
$providedby = clean($_POST['providedby']);
$acquiredate = clean($_POST['acquiredate']);
$lifetime = clean($_POST['lifetime']);
$amountpurchased = clean($_POST['amountpurchased']);
$assettagid = clean($_POST['assettagid']);
$ownertype = clean($_POST['ownertype']);
$owner = clean($_POST['owner']);
$photo = clean($_POST['photo']);
$categoryid = clean($_POST['category']);

if(empty($photo)){
    $picture = null;
}else{
    $picture = $photo;
}

$sql = "INSERT INTO asset(assetname,
                            assetdesc,
                            providedby,
                            acquiredate,
                            lifetime,
                            amountpurchased,
                            assettagid,
                            ownertype,
                            ownerid,
                            photo,
                            categoryid)
        VALUES ('$assetname',
                '$assetdesc',
                '$providedby',
                '$acquiredate',
                '$lifetime',
                '$amountpurchased',
                '$assettagid',
                '$ownertype',
                '$owner',
                '$picture',
                '$categoryid')";

$result = mysql_query($sql) or die(mysql_error());
$resourceid=  mysql_insert_id();

if ($result) {
    $logoperation="assetCreate";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>