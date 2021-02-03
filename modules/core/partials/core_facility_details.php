<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("evaluateAsset", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>
<div class ="row-fluid">
    <input type="hidden" name="" value="" id="assetid" />
   <div class ="span12" >    
        <div class ="span5" >
            <h1 id="asset-name"></h1>
            <div id="core-list">
            </div>
        </div>
        <div class ="span7" id ="asset-photo">
            
        </div>
    </div>
</div>
<script type ="text/javascript">
    $(document).ready(function(){
        
    });
</script>