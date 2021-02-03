<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM department";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $departmentid = $row['departmentid'];
    $departmentname = $row['departmentname'];
    $facultyid = $row['facultyid'];

    $dataArray[] = array("departmentid" => $departmentid,
        "departmentname" => $departmentname,
        "facultyid" => $facultyid);
}

echo json_encode($dataArray);
?>