<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("exportAsset", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>


<div clas="row">
    <div class ="span12">
        <form action="" class="form-horizontal" id ="export_form">
            <div class="control-group">
                <label for="" class="control-label">File Name</label>
                <div class="controls">
                    <input type ="text" name ="filename" id ="filename" data-required="true">
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" id ="savebtn"><i class="icon-ok"></i>Export</button>
            </div>
        </form>
        <br /><br />
    </div>
</div>
<div clas="row">
    <div class ="span12" id ="asset-list">
        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../asset/server/asset_index_exec.php"
        }).done(function( data ) {
//            alert(data);
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Asset Name</th><th>Asset Desc</th><th>Provided By</th><th>Acquired Date</th><th>Life Time</th><th>Amount Purchased</th><th>Asset ID No</th><th>Owner Type: Owner</th><th>Photo</th></tr>";
            var tablecontent = "";
            var count = 1;
            $.each(data, function(idx, val){        
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
                    "</tr>"
                count++;
            });
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
            $("#asset-list").html(table);
        });
        
        $("#export_form").submit(function(){
            $.ajax({
                type: "POST",
                url: "server/asset_export_exec.php",
                data: $(this).serialize()
            }).done(function( result ) {
                if(result != null){
                    document.location.href = "../asset/download/"+result;
                }
            });
            return false;
        });
    });
</script>

