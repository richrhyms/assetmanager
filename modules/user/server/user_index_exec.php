<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$sql = "SELECT * FROM user";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $userid = $row['userid'];
    $username = $row['username'];
    $password = $row['password'];
    $displayname = $row['displayname'];
    $datecreated = $row['datecreated'];
    $enabled = $row['enabled'];   
    
    $dataArray[] = array("userid" => $userid,
        "username" => $username,
        "password" => $password,
        "displayname" => $displayname,
        "datecreated" => $datecreated,
        "enabled" => $enabled);
}

echo json_encode($dataArray);
?>
