<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$departmentid = clean($_POST['departmentid']);
$sql = "DELETE FROM department WHERE departmentid = $departmentid";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $departmentid;
    $logoperation="deleteDepartment";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>