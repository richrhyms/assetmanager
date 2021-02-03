<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("viewFaculty", $_SESSION['PERMISSIONS'])) {
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
<div clas="fluid">
    <div class="span8">
        <div class="portlet">
            <div class="portlet-title">
                <h4><i class=" icon-align-justify"></i> Registered Faculty/Directory</h4>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body" >
                <div id="faculty-list">

                </div>
            </div>
        </div>    
    </div>
</div>

<script>
    $(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/faculty_index_exec.php"
        }).done(function( data ) {
            
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Faculty/Directory Name</th><th></th></tr>";
            var tablecontent = "";
            var count = 1;
            $.each(data, function(idx, val){        
                var edit_link = "<a class='btn mini blue' href = '../faculty/#/edit/"+val.facultyid+"'><i class='icon-edit'></i> Edit</a>";
                var delete_link = "<a class='btn mini red' href = '../faculty/#/delete/"+val.facultyid+"'><i class='icon-trash'></i> Delete</a>";
                tablecontent = tablecontent + "<tr>"+
                    "<td>"+count+"</td>"+"<td>"+val.facultyname+
                    "<td>"+edit_link+" | "+delete_link+"</td>"+
                    "</tr>"
                count++;
            });
            table = "<table class='table table-bordered table-hover table-condensed'>"+tableheader+tablecontent+"</table>";
            if(tablecontent == ""){
                $("#faculty-list").html("No registered faculty was found");            
            }else{
                $("#faculty-list").html(table);
            }          
        }); 

    });
    
    
    
</script>
