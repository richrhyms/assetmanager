<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("editRole", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>

<div class="row-fluid">
    <div class ="span12">
        <form action ="" method ="" id ="role_form">
            <div class="control-group">
                <label for="" class="control-label">Role Name</label>
                <div class="controls">
                    <input type ="hidden" name ="roleid" id ="roleid">
                    <input type ="text" name ="rolename" id ="rolename" data-required="true">
                </div>
            </div>
            <!-- END Left Side -->
            <div>
                <button type="button" class="btn btn-primary" id ="savebtn"><i class="icon-ok"></i>Save</button>
            </div>
        </form>
    </div>
</div>
<script src ="../../resources/libraries/parsley/parsley.js"></script>
<script>
    $("#savebtn").click(function(){
	if($('#role_form').parsley( 'validate' )){
		$.ajax({
            type: "POST",
            url: "server/role_edit_exec.php",
            data: { roleid: $("#roleid").val(), rolename: $("#rolename").val() }
        }).done(function( data ) {
            if(data == 1){
                document.location.href = "../role/#/";
            }
            else{
                alert("Operation failed!");
            }     
        });
	}
    });
</script>