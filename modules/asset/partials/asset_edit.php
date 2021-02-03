<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("editAsset", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>


<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Edit Asset</h4>
            </div>
            <div class="span12">
                <div class="span6">
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="" class="form-horizontal" id ="asset_form">
                            <div class="control-group">
                                <label for="" class="control-label">Asset Name</label>
                                <div class="controls">
                                    <input type ="hidden" name ="assetid" id ="assetid">
                                    <input type ="text" name ="assetname" id ="assetname" data-required="true">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="" class="control-label">Asset Description</label>
                                <div class="controls">
                                    <textarea name="assetdesc" id="assetdesc" rows="" class="" ></textarea>
                                </div>
                            </div> 
                            <div class="control-group">
                                <label for="" class="control-label">Provided By</label>
                               <div class="controls">
                                    <select name ="providedby" id ="providedby" data-required="true">
                                       <option value ="">--select--</option>
                                         <option value ="IGR">IGR</option>
                                            <option value ="Government">Government</option>
                                            <option value ="Others">Others</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="control-group">
                                <label for="" class="control-label">Acquired Date(yyyy-mm-dd)</label>
                                <div class="controls">
                                    <input type ="text" name ="acquiredate" id ="acquiredate" data-required="true">
                                </div>
                            </div> 
                            <div class="control-group">
                                <label for="" class="control-label">Life Time (No. of Days)</label>
                                <div class="controls">
                                    <input type ="text" name ="lifetime" id ="lifetime" data-required="true" data-type ="number">
                                </div>
                            </div>                            
                            <div class="control-group">
                                <label for="" class="control-label">Amount Purchased</label>
                                <div class="controls">
                                    <input type ="text" name ="amountpurchased" id ="amountpurchased" data-type ="number">
                                </div>
                            </div>                            
                            <div class="control-group">
                                <label for="" class="control-label">Asset ID No</label>
                                <div class="controls">
                                    <textarea name="assettagid" id="assettagid" rows="" class="" data-required="true"></textarea>
                                </div>
                            </div> 
                            <div class="control-group">
                                <label for="" class="control-label">Category</label>
                                <div class="controls">
                                    <select name="category" id="category" data-required="true">

                                    </select>
                                </div>
                            </div> 
                            <div class="control-group">
                                <label for="" class="control-label">User Type</label>
                                <div class="controls">
                                    <select name="ownertype" id="ownertype" data-required="true">
                                        <option value ="">Select User Type</option>
                                        <option value ="faculty">Faculty/Directory</option>
                                        <option value ="department">Department/Units</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="control-group">
                                <label for="" class="control-label">User</label>
                                <div class="controls">
                                    <select name="owner" id="owner" data-required="true">
                                        <option value ="">--Select Owner--</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="control-group">                           
                                <div class="controls">
                                    <input type="hidden" name="photo" id ="photo"/>
                                    <a href ="#" id ="imageupload-link">Upload Picture</a>
                                </div>
                            </div> 
                            <!-- END Left Side -->
                            <div class="form-actions">
                                <button type="button" class="btn btn-primary" id ="savebtn"><i class="icon-ok"></i>Save</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <div class="span5">
                    <div class="thumbnails" id="imgthumb">
                        <img src ="../../resources/common/images/photo_thumbnail.png">
                    </div>
                </div>
            </div>

        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>

<div title ="Upload Image" id ="imageupload-dialog">
    <h4>Photo Upload</h4>    
    <div id="fileuploader">
        <br />
        <button class ="btn">Upload</button> 
    </div>
    <div>
        <a href ="#" id ="closedialog" style ="color: blue; ">Close</a>
    </div>
    <hr/>
</div>
<link href="../../resources/libraries/jqueryui/jquery-ui.css" rel="stylesheet">
<style>
    #imageupload-dialog{
        display: none;
    }
</style>
<script src="../../resources/libraries/jqueryui/jquery-ui.custom.js"></script>
<script src="../../resources/libraries/photouploadmaster/js/jquery.uploadfile.js"></script>
<script src ="../../resources/libraries/parsley/parsley.js"></script>
<script>
    $(document).ready(function(){       
        
        if($("#ownertype").val() == "faculty"){
            //Quer for faculty
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../faculty/server/faculty_index_exec.php"
            }).done(function( data ) {
                var options = "";
                $.each(data, function(idx, val){        
                    options += "<option value='"+val.facultyid+"'>"+val.facultyname+"</option>";
                });
                $("#owner").html(options);
            });
        }   else{
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "server/departments_get_exec.php"
            }).done(function( data ) {
                var options = "";
                $.each(data, function(idx, val){        
                    options += "<option value='"+val.departmentid+"'>"+val.departmentname+" - "+val.facultyname+"</option>";
                });
                $("#owner").html(options);
            });
            //Query for department
        }     
        
        $("#fileuploader").uploadFile({
            url:"server/photoupload_exec.php",
            fileName:"myfile",
            showStatusAfterSuccess:false,
            onSuccess:function(files,data,xhr)
            {
                $("#photo").attr("value", data   );                 
                
                $("#imgthumb").html("<img src='uploads/"+data+"' />");
            }
        });
        
        $("#closedialog").click(function(){
            $("#imageupload-dialog").dialog("close");
            $("#image").html('<img src ="../../resources/common/images/photo_thumbnail.png" width ="150" height ="150">')
            return false;
        });
        
        //Load Date Picker
        $("#acquiredate").datepicker({ dateFormat: 'yy-mm-dd' });
        
        //Loads Asset Category
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../assetcategory/server/assetcategory_index_exec.php"
        }).done(function( data ) {
            var options = "";
            $.each(data, function(idx, val){        
                options += "<option value='"+val.categoryid+"'>"+val.categoryname+"</option>";
            });
            $("#category").html(options);
        }); 
        
        //Save to DB
        $("#savebtn").click(function(){
            if($('#asset_form').parsley( 'validate' )){
                $.ajax({
                    type: "POST",
                    url: "server/asset_edit_exec.php",
                    data: $("#asset_form").serialize()
                }).done(function( data ) {
                    if(data == 1){
                        document.location.href = "../asset/#/";
                    }
                    else{
                        alert(data);
                    }           
                }); 
            }
        });
        
        $(document).on("change", "#ownertype", function(){             
            if($(this).val() == "faculty"){
                //Quer for faculty
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../faculty/server/faculty_index_exec.php"
                }).done(function( data ) {
                    var options = "";
                    $.each(data, function(idx, val){        
                        options += "<option value='"+val.facultyid+"'>"+val.facultyname+"</option>";
                    });
                    $("#owner").html(options);
                });
            }   else{
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "server/departments_get_exec.php"
                }).done(function( data ) {
                    var options = "";
                    $.each(data, function(idx, val){        
                        options += "<option value='"+val.departmentid+"'>"+val.departmentname+" - "+val.facultyname+"</option>";
                    });
                    $("#owner").html(options);
                });
                //Query for department
            }                  
        });

        
        
        $(document).on("click", "#imageupload-link", function(){
            $("#imageupload-dialog").dialog(); 
            return false;
        });      
               
    });        
</script>





























</script>