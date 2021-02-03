<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM faculty";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $facultyid = $row['facultyid'];
    $facultyname = $row['facultyname'];
    
    $dataArray[] = array("facultyid" => $facultyid, "facultyname" => $facultyname);
}

echo json_encode($dataArray);
?>