<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetcategoryid = $_POST['assetcategoryid'];

  $fetch = "SELECT * FROM asset WHERE categoryid = '$assetcategoryid'"; 
    $check = mysql_query($fetch);
    if(mysql_affected_rows() > 0){
        echo "stop";
        exit();
    }  else {
        $sql = "DELETE FROM assetcategory WHERE categoryid = '$assetcategoryid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $assetcategoryid;
    $logoperation="deleteAssetCategory";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
}

?>