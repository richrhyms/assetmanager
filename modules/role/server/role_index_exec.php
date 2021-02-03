<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM role";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $roleid = $row['roleid'];
    $rolename = $row['rolename'];    
    $dataArray[] = array("roleid" => $roleid, "rolename" => $rolename);
}
echo json_encode($dataArray);
?>
