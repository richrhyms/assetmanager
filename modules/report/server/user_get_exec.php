<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$userid = $_POST['userid'];

$sql = "SELECT * FROM user WHERE userid = '$userid'";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
    $userid = $row['userid'];
    $username = $row['username'];
    $password = $row['password'];
    $displayname = $row['displayname'];
    $enabled = $row['enabled'];
    $dataArray = array("userid" => $userid,
        "username" => $username,
        "password" => $password,
        "cpassword" => $password,
        "displayname" => $displayname,
        "status" => $enabled
        );
}

echo json_encode($dataArray);
?>
