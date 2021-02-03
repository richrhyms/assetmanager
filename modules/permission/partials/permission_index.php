<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("viewPermission", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div clas="row-fliud">
    <div class ="span12">
        <!------------------------------------------
            The section commented below is for developer use only.
        -------------------------------------------->
        <!--<a href ="#/create" class ="btn btn-primary">Create New</a>-->
        <br /><br />
    </div>
</div>
<div clas="row-fliud">
    <div class="span8">
        <h4><i class=" icon-align-justify"></i> Registered Permission</h4>
        <div id="permission-list">

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/permission_index_exec.php"
        }).done(function( data ) {
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Permission Name</th></tr>";
            var tablecontent = "";
            var count = 1;
            $.each(data, function(idx, val){   
                /**<!------------------------------------------
                 The section commented below is for developer use only.
                -------------------------------------------->*/
                //var edit_link = "<a class='btn mini blue' href = '../permission/#/edit/"+val.permissionid+"'><i class='icon-edit'></i> Edit</a>";
                //var delete_link = "<a class='btn mini red' href = '../permission/#/delete/"+val.permissionid+"'><i class='icon-trash'></i> Delete</a>";
                tablecontent = tablecontent + "<tr>"+
                    "<td>"+count+"</td>"+"<td>"+val.permissionname+
                    /**"<td>"+edit_link+" | "+delete_link+"</td>"+*/
                    "</tr>"
                count++;
            });
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
            $("#permission-list").html(table);
        }); 
    });
</script>
