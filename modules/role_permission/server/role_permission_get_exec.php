<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$roleid = $_POST['roleid'];
$dataArray = array();

function checkRolePermission($roleid, $permissionid) {
    $foundflag = 0;
    $sql = "SELECT * FROM role_permission WHERE roleid = '$roleid' AND permissionid = '$permissionid'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        $foundflag = 1;
    }
    return $foundflag;
}

$sql = "SELECT * FROM permission";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {
    $permissionid = $row['permissionid'];
    $permissionname = $row['permissionname'];
    if (checkRolePermission($roleid, $permissionid) == 1) {
        $dataArray[] = array("permissionid" => $permissionid, "permissionname" => $permissionname, "status" => "1");
    } else {
        $dataArray[] = array("permissionid" => $permissionid, "permissionname" => $permissionname, "status" => "0");
    }
}

echo json_encode($dataArray);
?>