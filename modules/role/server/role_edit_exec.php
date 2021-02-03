<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$roleid = clean($_POST['roleid']);
$rolename = clean($_POST['rolename']);

$sql = "UPDATE role SET rolename = '$rolename' WHERE roleid = '$roleid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
     $resourceid= $roleid;
    $logoperation="deleteRole";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
}
?>
