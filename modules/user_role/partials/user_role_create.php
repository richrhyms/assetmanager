<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("addUserRole", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div class ="row-fluid">
    <div class ="span12">
        <h1 id ="displayname"></h1>
        <hr />
    </div>
    <input type ="hidden" ng-model ="userid"  name ="userid" id ="userid" value ="">
</div>
<div clas="row">    
    <div class ="span7" id ="userrole-list">        
        
    </div>
</div>
