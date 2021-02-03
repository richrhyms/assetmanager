<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$rolename = clean($_POST['rolename']);

$sql = "INSERT INTO role(rolename) VALUES ('$rolename')";

$result = mysql_query($sql) or die(mysql_error());

$resourceid= mysql_insert_id();
if ($result) {
    $logoperation="addRole";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>