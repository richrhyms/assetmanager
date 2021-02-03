<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$departmentid = clean($_POST['departmentid']); 
$departmentname = clean($_POST['departmentname']); 
$facultyid = clean($_POST['facultyid']); 

$sql = "UPDATE department SET departmentname = '$departmentname', facultyid = '$facultyid'  WHERE departmentid = $departmentid";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $departmentid;
    $logoperation="editDepartment";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>