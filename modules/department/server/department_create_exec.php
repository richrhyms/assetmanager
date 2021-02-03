<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$departmentname = clean($_POST['departmentname']);
$facultyid = clean($_POST['facultyid']); 

$sql = "INSERT INTO department (departmentname,facultyid) VALUES('$departmentname','$facultyid')";
$result = mysql_query($sql) or die(mysql_error());
$resourceid=  mysql_insert_id();

if ($result) {
    $logoperation="addDepartment";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>