<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$facultyid = clean($_POST['facultyid']);
$facultyname = clean($_POST['facultyname']);


$sql = "UPDATE faculty SET facultyname = '$facultyname' WHERE facultyid = '$facultyid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $facultyid;
    $logoperation="editFaculty";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>