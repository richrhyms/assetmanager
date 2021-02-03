<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("editUser", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Edit User</h4>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" method="post" class="form-horizontal" id ="user_form">
                    <div class="alert alert-error hide">
                        <button class="close" data-dismiss="alert"></button>
                        You have some form errors. Please check below.
                    </div>
                    <div class="alert alert-success hide">
                        <button class="close" data-dismiss="alert"></button>
                        Your form validation is successful!
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label">User Name</label>
                        <div class="controls">
                            <input type ="text" name ="username" id ="username" data-required="true">
                            <input type ="hidden" name ="userid" id ="userid" data-required="true">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="" class="control-label">Password</label>
                        <div class="controls">
                            <input type ="password" name ="password" id ="password" data-required="true">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="" class="control-label">Confirm Password</label>
                        <div class="controls">
                            <input type ="password" name ="cpassword" id ="cpassword" data-required="true" data-equalto="#password">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="" class="control-label">Display Name</label>
                        <div class="controls">
                            <input type ="text" name ="displayname" id ="displayname" data-required="true">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="" class="control-label">Credentials Status</label>
                        <div class="controls" >
                            <select name ="status" id ="status" data-required="true">
                                <option value ="">--Select Status--</option>
                                <option value ="1">Enabled</option>
                                <option value ="0">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn black" id ="savebtn"><i class="icon-ok"> </i> Save</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>
<script src ="../../resources/libraries/parsley/parsley.js"></script>
<script>    
    $("#savebtn").click(function(){
        if($('#user_form').parsley( 'validate' )){
            $.ajax({
                type: "POST",
                url: "server/user_edit_exec.php",
                data: $("#user_form").serialize()
            }).done(function( data ) {
                if(data == 1){
                    document.location.href = "../user/#/";
                }
                else{
                    alert("Operation failed!");
                }            
            });
        }
    });
    
   
</script>