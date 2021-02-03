<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("evaluateAsset", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>
<div class="row-fluid">
    <div class ="span12">        
        <table>
            <tr>
                <td>
                    <select name ="assetcategory" id ="assetcategory">
                        <option>--Select Category--</option>
                    </select>
                </td>             
            </tr>
            <tr>
                <td>
                    <button class ="btn" id ="searchbtn">Search</button>
                </td>
            </tr>
        </table>
        <hr />
    </div>
</div>

<div class="row-fluid" id ="asset-list">

</div>
<script type ="text/javascript">
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../assetcategory/server/assetcategory_index_exec.php",
            data: {}
        }).done(function( data ) {
            var option = "";
            $.each(data, function(idx, val){
                option = option + "<option value = '"+val.categoryid+"'>"+val.categoryname+"</option>";                
            }); 
            $("#assetcategory").html("<option value = ''>--Select Category--</option>"+"<option value = 'all'>All</option>"+option);               
        });
        
        $("#searchbtn").live("click", function(){
            if($("#assetcategory").val() == ""){
                alert("Select Category");
                return false;
            }
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "server/assets_get_exec.php",
                data: {
                    assetcategory: $("#assetcategory").val()
                }
            }).done(function( data ) {
                var table = "";
                var tableheader = "<tr><th>S/N</th><th>Asset Name</th><th>Asset Desc</th><th>Provided By</th><th>Acquired Date</th><th>Life Time</th><th>Historic Value</th><th>Asset ID No</th><th>User Type: User</th><th>Photo</th><th></th></tr>";
                var tablecontent = "";
                var count = 1;
                $.each(data, function(idx, val){        
                    var core_link = "<a href = '../core/#/view/"+val.assetid+"'>Core</a>";
                    tablecontent = tablecontent + "<tr>"+
                        "<td>"+count+"</td>"+"<td>"+val.assetname+
                        "</td>"+"<td>"+val.assetdesc+"</td>"+
                        "</td>"+"<td>"+val.providedby+"</td>"+
                        "</td>"+"<td>"+val.acquiredate+"</td>"+
                        "</td>"+"<td>"+val.lifetime+"</td>"+
                        "</td>"+"<td>"+val.amountpurchased+"</td>"+
                        "</td>"+"<td>"+val.assettagid+"</td>"+
                        "</td>"+"<td>"+val.ownertype+": "+val.owner+"</td>"+
                        "</td>"+"<td>"+val.photo+"</td>"+
                        "<td>"+core_link+"</td>"+
                        "</tr>"
                    count++;
                });
                table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
                $("#asset-list").html(table);
            });
        });
    });
</script>



