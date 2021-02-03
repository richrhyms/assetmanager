<?php

session_start();
require_once("../../../connections/connection.php");
require_once("../../../resources/functions/php/function.php");

$username = clean($_POST['username']);
$password = clean($_POST['password']);

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysql_query($sql) or die(mysql_error());

$dataArray = array();

if (mysql_num_rows($result) > 0) {
    $login_flag = null;
    $row = mysql_fetch_assoc($result);
    $displayname = $row['displayname'];
    $sql_ = "SELECT * FROM user
            JOIN user_role
            ON user.userid = user_role.userid
            JOIN role_permission
            ON user_role.roleid = role_permission.roleid
            JOIN permission
            ON role_permission.permissionid = permission.permissionid
            WHERE user.username = '$username'";
    $result_ = mysql_query($sql_);
    if (mysql_num_rows($result_) > 0) {
        $login_flag = 1;
        while ($row = mysql_fetch_array($result_)) {
        $permissionname = $row['permissionname'];
        $userid = $row['userid'];
        $dataArray[] = $permissionname;
    }
        $_SESSION['PERMISSIONS'] = $dataArray;
        $_SESSION['userid'] = $userid;
        $_SESSION['DISPLAYNAME'] = $displayname;          
    }else{
        $login_flag = 0;
    }    
} else {
   $login_flag = -1;
}
echo $login_flag;
?>
