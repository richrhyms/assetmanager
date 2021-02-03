<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM department JOIN faculty ON department.facultyid = faculty.facultyid ORDER BY faculty.facultyid";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $departmentid = $row['departmentid'];
    $departmentname = $row['departmentname'];
    $facultyid = $row['facultyid'];
    $facultyname = $row['facultyname'];
    $dataArray[] = array("departmentid" => $departmentid,
        "departmentname" => $departmentname,
        "facultyname" => $facultyname);
}

echo json_encode($dataArray);
?>

