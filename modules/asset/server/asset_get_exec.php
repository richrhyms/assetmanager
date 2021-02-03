<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

function getFacultyId($departmentid) {
    $sql = "SELECT * FROM department WHERE departmentid = '$departmentid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $facultyid = $row['facultyid'];
    return $facultyid;
}

function getCategoryName($categoryid) {
    $sql = "SELECT * FROM assetcategory WHERE categoryid = '$categoryid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $categoryname = $row['categoryname'];
    return $categoryname;
}

$assetid = $_POST['assetid'];

$sql = "SELECT * FROM asset WHERE assetid = '$assetid'";
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
    $assettagid = $row['assettagid'];
    $ownertype = $row['ownertype'];
    $ownerid = $row['ownerid'];
    $photo = $row['photo'];
    $categoryid_ = $row['categoryid'];
    $categoryname_ = getCategoryName($categoryid_);
    
    $ownername_facid = null;
    $ownername_facname = null;
    $ownername_deptname = null;    

    if (strtolower($ownertype) == "faculty") {
        $ownername_facid = $ownerid;
        $ownername_facname = getFacultyName($ownerid);
        $ownername = $ownername_facname;
    } if (strtolower($ownertype) == "department") {
        $ownername_facid = getFacultyId($ownerid);
        $ownername_facname = getFacultyName($ownername_facid);
        $ownername_deptname = getDepartmentName($ownerid);
        $ownername = $ownername_deptname;
    }

    $dataArray = array("assetid" => $assetid,
        "assetname" => $assetname,
        "assetdesc" => $assetdesc,
        "providedby" => $providedby,
        "acquiredate" => $acquiredate,
        "lifetime" => $lifetime,
        "amountpurchased" => $amountpurchased,
        "assettagid" => $assettagid,
        "ownertype" => strtolower($ownertype),
        "ownerid" => $ownerid,
        "ownername" => $ownername,
        "ownername_facid"=>$ownername_facid,
        "ownername_facname"=>$ownername_facname,
        "ownername_deptname"=>$ownername_deptname,
        "photo" => $photo,
        "categoryid" => $categoryid_,
        "categoryname" => $categoryname_);
}

echo json_encode($dataArray);
?>
