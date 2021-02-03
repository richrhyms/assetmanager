<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$userid = $_POST['userid'];

$sql = "SELECT * FROM user WHERE userid = '$userid'";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $displayname = strtoupper($row['displayname']);
    $dataArray = array("displayname" => $displayname);
}

echo json_encode($dataArray);
?>
