<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("addUser", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div clas="row">
    <div class ="span12">
        <form action ="" method ="" id ="user_form" data-validate="parsley">
            <div class="control-group">
                <label for="" class="control-label">User Name</label>
                <div class="controls">
                    <input type ="text" name ="username" id ="username" data-required="true">
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
            <!-- END Left Side -->
            <div>
                <button type="button" class="btn btn-primary" id ="savebtn"><i class="icon-ok"></i>Save</button>
            </div>
        </form>
    </div>
</div>
<style>
    ul .user_form{
        list-style-type: none;
        margin: 0px;
        color: red;
        font-style: italic;
    }
</style>
<script src ="../../resources/libraries/parsley/parsley.js"></script>
<script>
    $(document).ready(function(){
        $("#savebtn").click(function(){
            if($('#user_form').parsley( 'validate' )){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "server/user_create_exec.php",
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
    });    
</script>