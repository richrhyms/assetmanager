<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$userid = $_POST['userid'];

$sql = "SELECT * FROM user_role WHERE userid = '$userid'";
$result = mysql_query($sql);

$dataArray = array();

if (mysql_num_rows($result) > 0) {
    $row = mysql_fetch_assoc($result);
    $roleid = $row['roleid'];
    $sql = "SELECT * FROM role";
    $result = mysql_query($sql) or die(mysql_error());
    while ($row = mysql_fetch_array($result)) {
        $roleid_ = $row['roleid'];
        $rolename = $row['rolename'];
        if ($roleid == $roleid_) {
            $dataArray[] = array("roleid" => $roleid_, "rolename" => $rolename, "status" => "1");
        } else {
            $dataArray[] = array("roleid" => $roleid_, "rolename" => $rolename, "status" => "0");
        }
    }
} else {
    $sql = "SELECT * FROM role";
    $result = mysql_query($sql) or die(mysql_error());
    while ($row = mysql_fetch_array($result)) {
        $roleid = $row['roleid'];
        $rolename = $row['rolename'];
        $dataArray[] = array("roleid" => $roleid, "rolename" => $rolename, "status" => "0");
    }
}
echo json_encode($dataArray);
?>