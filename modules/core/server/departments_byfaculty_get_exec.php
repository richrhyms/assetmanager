<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$facultyid = $_POST['faculty'];

$sql = "SELECT * FROM department WHERE facultyid = '$facultyid'";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $departmentid = $row['departmentid'];
    $departmentname = $row['departmentname'];
    $dataArray[] = array("departmentid" => $departmentid, "departmentname" => $departmentname);
}

echo json_encode($dataArray);
?>

