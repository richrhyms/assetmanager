<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("deleteFaculty", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>
<div class="alert alert-block alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert"></button>
    <h3 class="alert-heading">Warning!</h3>
    <h5>Are you sure you want to delete record</h5>   
    <br>
    <input type ="hidden" name ="facultyid" id ="facultyid">
    <button class="btn black" type="button" id="delbut">Delete</button>
    <a class="btn grey" href="../faculty/#">Back</a>
</div>
<script>
    $(function(){
        $("#delbut").click(function(){       
            $.ajax({
                type: "POST",
                url: "server/faculty_delete_exec.php",
                data: {
                    facultyid: $("#facultyid").val()
                }
            }).done(function( data ) {
                if(data == 1){
                    document.location.href = "../faculty/#/";
                }else if(data == "stop"){
                    alert ("You Are Not Allowed to Delete This Data");
                }
                else{
                    alert(data);
                }            
            });
        });

    });    
</script>
