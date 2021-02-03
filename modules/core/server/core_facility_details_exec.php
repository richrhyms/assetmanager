<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetid = $_POST['assetid'];

$query = "SELECT * FROM asset WHERE assetid = '$assetid'";
$result = mysql_query($query) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $assetid = $row['assetid'];
    $assetname = $row['assetname'];
    $assetdesc = $row['assetdesc'];
    $providedby = $row['providedby'];
    $acquiredate = $row['acquiredate'];
    $lifetime = $row['lifetime'];
     $amountpurchased = $row['amountpurchased'] ;
    $photo = $row['photo'];
    $currentvalue = number_format(round(assetCurrentValue($lifetime, $acquiredate, $amountpurchased), 2));
     $amountpurchased = number_format($row['amountpurchased']) ;


    $dataArray[] = array("assetid" => $assetid,
        "assetname" => $assetname,
        "assetdesc" => $assetdesc,
        "providedby" => $providedby,
        "acquiredate" => $acquiredate,
        "lifetime" => $lifetime,
        "amountpurchased" => $amountpurchased,
        "currentvalue" => $currentvalue,
        "photo" => $photo);
}
echo json_encode($dataArray);
