<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("viewDepartment", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>
<div clas="row-fluid">
    <div class ="span12">
        <a href ="#/create" class ="btn btn-primary">Create</a>
    </div>
    <br /><br />
</div>

<div clas="row-fluid">
    <div class="span8"><div class="portlet">
    <div class="portlet-title">
        <h4><i class=" icon-align-justify"></i> Registered Department/Units</h4>
        <div class="tools">
        </div>
    </div>
    <div class="portlet-body" >
        <div id="department-list">
            
        </div>
    </div>
</div>
</div>

    
</div>
<script>
$(document).ready(function() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/department_index_exec.php"
    }).done(function( data ) {
        var table = "";
        var tableheader = "<tr><th>S/N</th><th>Department/Unit Name</th><th></th></tr>";
        var tablecontent = "";
        var count = 1;
        $.each(data, function(idx, val){        
            var edit_link = "<a class='btn mini blue' href = '../department/#/edit/"+val.departmentid+"'><i class='icon-edit'></i> Edit</a>";
            var delete_link = "<a class='btn mini red' href = '../department/#/delete/"+val.departmentid+"'><i class='icon-trash'></i> Delete</a>";
            tablecontent = tablecontent + "<tr>"+"<td>"+count+"</td>"+"<td>"+val.departmentname+"</td>"+"<td>"+edit_link+" | "+delete_link+"</td>"+"</tr>"
            count++;
        });
        table = "<table class='table table-bordered table-hover table-condensed'>"+tableheader+tablecontent+"</table>";
        if(tablecontent == ""){
                $("#department-list").html("No registered faculty was found");            
            }else{
                $("#department-list").html(table);
            }     
    }); 
    
    
});
    
</script>