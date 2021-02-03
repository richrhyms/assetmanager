<?php
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM asset ORDER BY acquiredate DESC LIMIT 10";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $assetid = $row['assetid'];
    $assetname = $row['assetname'];
    $assetdesc = $row['assetdesc'];
    $providedby = $row['providedby'];
    $acquiredate = $row['acquiredate'];
    $lifetime = $row['lifetime'];
    $amountpurchased = $row['amountpurchased'];
    $photo = $row['photo'];
    $categoryid = $row['categoryid'];
    $currentvalue = round(assetCurrentValue($lifetime, $acquiredate, $amountpurchased), 2);
     $amountpurchased = number_format($row['amountpurchased']);
    $dataArray[] = array("assetid" => $assetid,
        "assetname" => $assetname,
        "assetdesc" => $assetdesc,
        "providedby" => $providedby,
        "acquiredate" => $acquiredate,
        "lifetime" => $lifetime,
        "amountpurchased" => $amountpurchased,
        "photo" => $photo,
        "current" => $currentvalue,
        "categoryid" => $categoryid);
}
echo json_encode($dataArray);
?>
