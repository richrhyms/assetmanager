<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("assetCommit", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>
<div clas="row">
    <div class ="span12" id ="asset-list">

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        //Create an event and a handler to fetch assets from asset table
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/asset_comfirm_exec.php"
        }).done(function( data ) {
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Asset Name</th><th>Asset Desc</th><th>Provided By</th><th>Acquired Date</th><th>Life Time</th><th>Amount Purchased</th><th>Asset ID No</th><th>User Type: User</th><th>Photo</th><th></th></tr>";
            var tablecontent = "";
            var count = 1;
            $.each(data, function(idx, val){  
                var check = "<input type='checkbox' value='"+val.assetid+"' class= 'chkbox' name='checkbox'/>";
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
                    "<td>"+check+"</td>"+
                    "</tr>"
                count++;
            });
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
            $("#asset-list").html(table);
        }); 
        
        $(document).on("click", ".chkbox", function(){
        if($(this).is(":checked") == true){
            //Insert ignore
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "server/asset_commit_exec.php",
                data: {
                    assetid: $(this).val()                    
                }
            }).done(function( data ) {
                if(data == 1){
                    alert("Operation successfull");
                }
                else{
                    alert("Oops !!! Operation failed");
                }                   
            });    
        }
        else{
            //Delete
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "server/asset_uncommit_exec.php",
                data: {
                    assetid: $(this).val()                    
                }
            }).done(function( data ) {
                if(data == 1){
                    alert("Operation successfull");
                }
                else{
                    alert("Oops !!! Operation failed");
                }                
            }); 
        }
    }); 
    });
</script>

