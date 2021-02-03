<?php
session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");
$facultyid = $_POST['facultyid'];//clean($_POST['assetname']);


    $fetch = "SELECT * FROM department WHERE facultyid = '$facultyid'"; 
    $check = mysql_query($fetch);
    if(mysql_affected_rows() > 0){
        echo "stop";
        exit();
    }else{
       $sql = "DELETE FROM faculty WHERE facultyid = '$facultyid'";

    $result = mysql_query($sql) or die(mysql_error());

if ($result) {
    $resourceid= $facultyid;
    $logoperation="deleteFaculty";
    $userid = $_SESSION['userid'];
    Logs($logoperation, $userid, $resourceid);
    echo true;
} else {
    echo false;
} 
    }

?>