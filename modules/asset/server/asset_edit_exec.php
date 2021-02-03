<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetid = clean($_POST['assetid']);
$assetname = clean($_POST['assetname']);
$assetdesc = clean($_POST['assetdesc']);
$providedby = clean($_POST['providedby']);
$acquiredate = clean($_POST['acquiredate']);
$lifetime = ($_POST['lifetime']);
$amountpurchased = clean($_POST['amountpurchased']);
$assettagid = clean($_POST['assettagid']);
$ownertype = clean($_POST['ownertype']);
$ownerid = clean($_POST['owner']);
$photo = clean($_POST['photo']);
$categoryid = clean($_POST['category']);


$sql = "UPDATE asset 
        SET assetname='$assetname',
            assetdesc='$assetdesc',
            providedby='$providedby',
            acquiredate='$acquiredate',
            lifetime='$lifetime',
            amountpurchased='$amountpurchased',
            assettagid='$assettagid', 
            ownertype='$ownertype', 
            ownerid='$ownerid',  
            photo='$photo',
            categoryid='$categoryid'
            WHERE assetid = '$assetid'";

$result = mysql_query($sql) or die(mysql_error());



if ($result) {
    $logoperation="assetEdit";
    $userid = $_SESSION['userid'];
    $resourceid=$assetid;
    Logs($logoperation, $userid, $resourceid);

    echo true;
} else {
    echo false;
}
?>