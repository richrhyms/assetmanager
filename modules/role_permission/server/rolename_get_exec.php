<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$roleid = $_POST['roleid'];

$sql = "SELECT * FROM role WHERE roleid = '$roleid'";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $rolename = strtoupper($row['rolename']);
    $dataArray = array("rolename" => $rolename);
}

echo json_encode($dataArray);
?>
