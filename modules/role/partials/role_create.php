<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("addRole", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div clas="row">
    <div class ="span12">        
        <form action ="" method ="" id ="role_form" data-validate="parsley">
            <div class="control-group">
                <label for="" class="control-label">Role Name</label>
                <div class="controls">
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
<style>
    ul .role_form{
        list-style-type: none;
        margin: 0px;
        color: red;
        font-style: italic;
    }
</style>
<script src ="../../resources/libraries/parsley/parsley.js"></script>
<script>
    $(document).ready(function(){
        $( "#savebtn").click( function(){  
            if($('#role_form').parsley( 'validate' )){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "server/role_create_exec.php",
                    data: $("#role_form").serialize()
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
    });    
</script>
