<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$facultyname = clean($_POST['facultyname']);

$sql = "INSERT INTO faculty(facultyname) VALUES ('$facultyname')";

$result = mysql_query($sql) or die(mysql_error());
 $resourceid= mysql_insert_id();
if ($result) {
    $logoperation="addFaculty";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>