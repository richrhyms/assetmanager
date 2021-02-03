<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("viewRole", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div class="span8"><div class="portlet">
        <div class="portlet-title">
            <a href ="#/create" class ="btn btn-primary">Create New</a>
            <br />
            <br />  
            
            <h4><i class=" icon-align-justify"></i> Registered Role</h4>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body" >
            <div id="role-list">

            </div>
        </div>
    </div>

</div>
<div clas="row">
    <div id ="role-list"></div>   
</div>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/role_index_exec.php"
        }).done(function( data ) {
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Role Name</th><th></th></tr>";
            var tablecontent = "";
            var count = 1;
            $.each(data, function(idx, val){        
                var edit_link = "<a class='btn mini blue' href = '../role/#/edit/"+val.roleid+"'><i class='icon-edit'></i> Edit</a>";;
                var delete_link = "<a class='btn mini red' href = '../role/#/delete/"+val.roleid+"'><i class='icon-trash'></i> Delete</a>";
                var manage_link = "<a class='btn mini black' href = '../role_permission/#/create/"+val.roleid+"'><i class='icon-wrench'></i> Manage</a>";
                tablecontent = tablecontent + "<tr>"+
                    "<td>"+count+"</td>"+"<td>"+val.rolename+
                    "<td>"+edit_link+" | "+delete_link+ " | " +manage_link+"</td>"+
                    "</tr>"
                count++;
            });
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
            $("#role-list").html(table);
        }); 
    });
</script>
