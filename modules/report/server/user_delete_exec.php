<?php
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$userid = $_POST['userid'];//clean($_POST['assetname']);
$sql = "DELETE FROM user WHERE userid = '$userid'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
    echo true;
} else {
    echo false;
}
?>