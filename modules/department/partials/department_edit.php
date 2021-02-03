<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("editDepartment", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Edit Department/Unit</h4>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" method="post" class="form-horizontal" id ="department_form">
                    <div class="alert alert-error hide">
                        <button class="close" data-dismiss="alert"></button>
                        You have some form errors. Please check below.
                    </div>
                    <div class="alert alert-success hide">
                        <button class="close" data-dismiss="alert"></button>
                        Your form validation is successful!
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label">Department/Unit Name<span class="required">*</span></label>
                        <div class="controls">
                            <input type ="text" name ="departmentname" id ="departmentname" required data-required="1" class="span6 m-wrap">
                            <input type ="hidden" name ="departmentid" id ="departmentid">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label">Faculty/Directory Name<span class="required">*</span></label>
                        <div class="controls">
                            <select name="facultyid" id="faculty" required data-required="1" class="span6 m-wrap">
                                
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#savebtn").click(function(){  
            if($('#department_form').parsley( 'validate' )){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "server/department_edit_exec.php",
                    data: $("#department_form").serialize()
                }).done(function( data ) {
                    if(data == 1){
                        document.location.href = "../department/#/";
                    }
                    else{
                        alert("Operation failed!");
                    }            
                });
            }
        });
        
        

    });
</script>