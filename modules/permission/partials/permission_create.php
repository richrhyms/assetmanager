<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("addPermission", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div class="row-fluid">
    <div class="span12">
       <!-- BEGIN VALIDATION STATES-->
       <div class="portlet">
          <div class="portlet-title">
             <h4><i class="icon-reorder"></i>Add Permission</h4>
          </div>
          <div class="portlet-body form">
             <!-- BEGIN FORM-->
             <form action="#" method="post" class="form-horizontal" id ="permission_form">
                <div class="alert alert-error hide">
                   <button class="close" data-dismiss="alert"></button>
                   You have some form errors. Please check below.
                </div>
                <div class="alert alert-success hide">
                   <button class="close" data-dismiss="alert"></button>
                   Your form validation is successful!
                </div>
                <div class="control-group">
                   <label class="control-label">Permission Name<span class="required">*</span></label>
                   <div class="controls">
                      <input type="text" name ="permissionname" id ="permissionname" data-required="1" class="span6 m-wrap"/>
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

<style>
    ul .permission_form{
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
            if($('#permission_form').parsley( 'validate' )){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "server/permission_create_exec.php",
                    data: $("#permission_form").serialize()
                }).done(function( data ) {
                    if(data == 1){
                        document.location.href = "../permission/#/";
                    }
                    else{
                        alert("Operation failed!");
                    }            
                });
            }
        }); 
    });    
</script>