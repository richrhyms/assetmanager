<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("viewAssetCategory", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div clas="row">
    <div class ="span12">
        <a href ="#/create" class ="btn btn-primary">Create</a>
        <br /><br />
    </div>
</div>
<div clas="row">
    <div class ="span12" id ="category-list">

    </div>
</div>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/assetcategory_index_exec.php"
        }).done(function( data ) {
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Category ID</th><th>Category Description</th><th></th></tr>";
            var tablecontent = "";
            var count = 1;
            $.each(data, function(idx, val){        
                var edit_link = "<a class='btn mini blue' href = '../assetcategory/#/edit/"+val.categoryid+"'><i class='icon-edit'></i> Edit</a>";
                var delete_link = "<a class='btn mini red' href = '../assetcategory/#/delete/"+val.categoryid+"'><i class='icon-trash'></i> Delete</a>";
                tablecontent = tablecontent + "<tr>"+
                    "<td>"+count+"</td>"+"<td>"+val.categoryname+"</td>"+
                    "<td>"+val.categorydesc+"</td>"+
                    "<td>"+edit_link+" | "+delete_link+"</td>"+
                    "</tr>"
                count++;
            });
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
            $("#category-list").html(table);
        }); 
    });    
</script>