<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("deletePermission", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>

<div class="alert alert-block alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert"></button>
    <h3 class="alert-heading">Warning!</h3>
    <h5>Are you sure you want to delete record</h5>   
    <br>
    <input type ="hidden" name ="permissionid" id ="permissionid">
    <button class="btn black" type="button" id="delbut">Delete</button>
    <a class="btn grey" href="../permission/#">Back</a>
</div>
<script>
    $(document).ready(function(){
        $( "#delbut").click(function(){       
            $.ajax({
                type: "POST",
                url: "server/permission_delete_exec.php",
                data: {
                    permissionid: $("#permissionid").val()
                }
            }).done(function( data ) {
                if(data == 1){
                    document.location.href = "../permission/#/";
                }
                else{
                    alert(data);
                }            
            });
        });
    });    
</script>
