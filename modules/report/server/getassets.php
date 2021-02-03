<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$assetcategory = $_POST['assetcategory'];
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$acquiredate = json_decode($_POST['acquiredate'], true);
$lifetime = $_POST['lifetime'];
$providedby = $_POST['providedby'];

$acquiredate_from = $acquiredate['start'];
$acquiredate_to = $acquiredate['end'];


$assetcategory_sql = "";
$faculty_sql = "";
$department_sql = "";
$acquiredate_sql = "";
$lifetime_sql = "";
$providedby_sql = "";

if ($department != "") {
    $ownertype_sql = "JOIN department T2 ON T1.ownerid = T2.departmentid";
} else {
    $ownertype_sql = "JOIN faculty T2 ON T1.ownerid = T2.facultyid";
}

$sql = "SELECT * 
         FROM asset T1 
         $ownertype_sql
         JOIN assetcategory T3
         ON T1.categoryid = T3.categoryid AND assetCommit = 1";

$assetcategory_sql = ($assetcategory != "") ? "T1.categoryid = '$assetcategory' AND " : "";
$faculty_sql = ($faculty != "") ? "T2.facultyid = '$faculty' AND " : "";
$department_sql = ($department != "") ? "T2.departmentid = '$department' AND " : "";
$acquiredate_sql = ($acquiredate != "") ? "T1.acquiredate BETWEEN '$acquiredate_from' AND '$acquiredate_to' AND " : "";
$lifetime_sql = ($lifetime != "") ? "T1.lifetime = '$lifetime' AND " : "";
$providedby_sql = ($providedby != "") ? "T1.providedby = '$providedby' AND " : "";

$tempstr01 = $assetcategory_sql . $faculty_sql . $department_sql . $acquiredate_sql . $lifetime_sql . $providedby_sql;
$tempstr02 = ($tempstr01 != "") ? "WHERE " : "";

$sql = $sql . " " . $tempstr02 . " " . $tempstr01;
$sql = rtrim(trim($sql), 'AND');

$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();
$dataArray_ = array();
while ($row = mysql_fetch_array($result)) {    
    $dataArray["assettagid"] = $row["assettagid"];
    $dataArray["assetname"] = $row["assetname"];
    $dataArray["assetdesc"] = $row["assetdesc"];
    $dataArray["categoryname"] = $row["categoryname"];
    $dataArray["providedby"] = $row["providedby"];
    $dataArray["acquiredate"] = $row["acquiredate"];    
    $dataArray["lifetime"] = $row["lifetime"];
    $dataArray["amountpurchased"] = $row["amountpurchased"];
    $dataArray["ownertype"] = $row["ownertype"];
    $currentValue = assetCurrentValue($dataArray["lifetime"], $dataArray["acquiredate"], $dataArray["amountpurchased"]);
    $dataArray["currentvalue"] = number_format(round($currentValue , 2));
    $dataArray["depreciatedvalue"] = number_format(round($dataArray["amountpurchased"] - $currentValue, 2)); 
    $dataArray["amountpurchased"] = number_format($row["amountpurchased"]);
    $dataArray_[] = $dataArray;
}

echo json_encode($dataArray_);

?>