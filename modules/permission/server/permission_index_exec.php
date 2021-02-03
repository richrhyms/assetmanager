<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM permission";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $permissionid = $row['permissionid'];
    $permissionname = $row['permissionname'];
    
    $dataArray[] = array("permissionid" => $permissionid, "permissionname" => $permissionname);
}

echo json_encode($dataArray);
?>