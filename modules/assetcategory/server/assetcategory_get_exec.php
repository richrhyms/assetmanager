<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$categoryid = $_POST['categoryid'];

$sql = "SELECT * FROM assetcategory WHERE categoryid = '$categoryid'";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $categoryid = $row['categoryid'];
    $categoryname = $row['categoryname'];
    $categorydesc = $row['categorydesc'];
    $dataArray = array("categoryid" => $categoryid,
        "categoryname" => $categoryname,
        "categorydesc" => $categorydesc);
}

echo json_encode($dataArray);
?>
