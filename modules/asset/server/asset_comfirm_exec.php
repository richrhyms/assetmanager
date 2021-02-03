<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM asset WHERE assetCommit  = 0 ORDER BY assetid DESC";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $assetid = $row['assetid'];
    $assetname = $row['assetname'];
    $assetdesc = $row['assetdesc'];
    $providedby = $row['providedby'];
    $acquiredate = $row['acquiredate'];
    $lifetime = $row['lifetime'];
    $amountpurchased = number_format($row['amountpurchased']);
    $assettagid = $row['assettagid'];
    $ownertype = $row['ownertype'];
    $ownerid = $row['ownerid'];
    $photo = $row['photo'];
    $categoryid = $row['categoryid'];

    if ($ownertype == "faculty") {
        $owner = getFacultyName($ownerid);
    } else {
        $owner = getDepartmentName($ownerid);
    }

    $dataArray[] = array("assetid" => $assetid,
        "assetname" => $assetname,
        "assetdesc" => $assetdesc,
        "providedby" => $providedby,
        "acquiredate" => $acquiredate,
        "lifetime" => $lifetime,
        "amountpurchased" => $amountpurchased,
        "assettagid" => $assettagid,
        "ownertype" => strtoupper($ownertype),
        "owner" => $owner,
        "photo" => $photo,
        "categoryid" => $categoryid);
}

echo json_encode($dataArray);
?>