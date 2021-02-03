<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("deleteRole", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div class="alert alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Warning!</h4>
    Are you sure you want to delete record
    <input type ="hidden" name ="roleid" id ="roleid">
    <input type="button" id="delbut" value="Delete">
</div>

<script>
    $(document).ready(function(){
        $( "#delbut").click(function(){       
            $.ajax({
                type: "POST",
                url: "server/role_delete_exec.php",
                data: {
                    roleid: $("#roleid").val()
                }
            }).done(function( data ) {
                if(data == 1){
                    document.location.href = "../role/#/";
                }
                else{
                    alert("Operation Failed");
                }            
            });
        });
    });    
</script>
