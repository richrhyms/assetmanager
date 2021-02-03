<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("editAssetCategory", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Add Faculty</h4>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" method="post" class="form-horizontal" id ="category_form">
                    <div class="control-group">
                        <label for="" class="control-label">Category Name</label>
                        <div class="controls">
                            <input type ="hidden" name ="categoryid" id ="categoryid">
                            <input type ="text" name ="categoryname" id ="categoryname" data-required="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label">Category Description</label>
                        <div class="controls">
                            <textarea name="categorydesc" id="categorydesc" rows="" class="" data-required="true"></textarea>
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
    $(document).ready(function(){
        $("#savebtn").click(function(){
            if($('#category_form').parsley( 'validate' )){
                $.ajax({
                    type: "POST",
                    url: "server/assetcategory_edit_exec.php",
                    data: $("#category_form").serialize()
                }).done(function( data ) {
                    if(data == 1){
                        document.location.href = "../assetcategory/#/";
                    }
                    else{
                        alert("Operation failed!");
                    }     
                });
            }
            
        });
    });           
</script>