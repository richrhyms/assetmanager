<?php

require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$userid = $_POST['userid'];
$roleid = $_POST['roleid'];

$sql = "SELECT * FROM user_role WHERE userid = '$userid'";
$result = mysql_query($sql);

if (mysql_num_rows($result) <= 0) {
    $sql = "INSERT INTO user_role VALUES('', '$userid', '$roleid')";
    $result = mysql_query($sql) or die(mysql_error());
} else {
    $sql = "UPDATE user_role SET roleid = '$roleid' WHERE userid = '$userid'";
    $result = mysql_query($sql) or die(mysql_error());
}

if ($result) {
    echo true;
} else {
    echo false;
}
?>