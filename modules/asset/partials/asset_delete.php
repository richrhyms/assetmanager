<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("deleteAsset", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>

<div class="alert alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Warning!</h4>
    Are you sure you want to delete record
    <input type ="hidden" name ="assetid" id ="assetid">
    <input type="button" class ="btn" id="delbut" value="Delete">
</div>

<script>
    $(document).ready(function(){
        $("#delbut").click(function(){
            $.ajax({
                type: "POST",
                url: "server/asset_delete_exec.php",
                data: {
                    assetid: $("#assetid").val()
                }
            }).done(function( data ) {
                if(data == 1){
                    document.location.href = "../asset/#/";
                }
                else{
                    alert("Operation failed!");
                }            
            });
        });
    });    
</script>
