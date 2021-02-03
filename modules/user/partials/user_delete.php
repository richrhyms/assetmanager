<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("deleteUser", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div class="alert alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Warning!</h4>
    Are you sure you want to delete record
    <input type ="hidden" name ="userid" id ="userid">
    <input type="button" id="delbut" value="Delete">
</div>

<script>
    $(document).ready(function(){
        $(document).on("click", "#delbut", function(){       
            $.ajax({
                type: "POST",
                url: "server/user_delete_exec.php",
                data: {
                    userid: $("#userid").val()
                }
            }).done(function( data ) {
                if(data == 1){
                    document.location.href = "../user/#/";
                }
                else{
                    alert("Operation failed!");
                }            
            });
        });
    });    
</script>
