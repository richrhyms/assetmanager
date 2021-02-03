<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("addRolePermission", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div class ="row-fluid">
    <div class ="span12">
        <h1 id ="rolename"></h1>
        <br />
    </div>
    <input type ="hidden" ng-model ="roleid"  name ="roleid" id ="roleid" value ="">
</div>
<div clas="row">    
    <div class ="span7" id ="rolepermission-list">        
        
    </div>
</div>

