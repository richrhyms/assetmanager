<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("importAsset", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}

?>

<style>
    #message{
        display: none;
    }
</style>
<div class ="row-fluid">
    <div class ="span12">
        <div id ="errormsg"></div>
        <br />
        <a href ="download/asset.xlsx">Download Template</a>
        <br />
        <table class ="table table-condensed table-striped">
            <tr>
                <th>S/N</th>
                <th>Asset Name</th>
                <th>Asset Desc</th>
                <th>Provided By</th>
                <th>Acquired Date</th>
                <th>Life Time</th>
                <th>Amount</th>
                <th>Asset Tag ID </th>
                <th>Owner Type</th>
                <th>Owner</th>
                <th>Photo</th>
                <th>Category</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Hilux</td>
                <td>Toyota Hilux</td>
                <td>Government</td>
                <td>2013-01-01</td>
                <td>730</td>
                <td>6000000</td>
                <td>VEHICLE_001</td>
                <td>Department</td>
                <td>Mathematics</td>
                <td>Null</td>
                <td>Automobiles</td>                                    
            </tr>
        </table>
        <div id="message"></div> 
        <form name="upload" id="upload" action="#" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" id ="uploadFile" class ="btn btn-primary" value="Upload" />
                    </td>
                </tr>
            </table>
        </form>
        <div id="uploader"></div>
        <hr />
    </div>
</div>
<script src="../../resources/libraries/jqueryform/jquery.form.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var options = {
            target: '#message', //Div tag where content info will be loaded in
            url:'server/asset_import_exec.php', //The php file that handles the file that is uploaded
            beforeSubmit: function() {
                $('#uploader').html("<span style = 'font-size: 20px; color: green'>Uploading...</span>"); //Including a preloader, it loads into the div tag with id uploader
            },
            success:  function(data) {
                if(data == 1){
                    $("#errormsg").html("Error in file upload ! - Please contact server administrator");
                    $("#errormsg").css("display", "block");
                    return false;
                }
                        
                $("#errormsg").css("display", "none");
                var data = $.parseJSON(data);
                var table = "";
                var tableheader = "";
                var tablecontent = "";
                var upload_success_img = "<img src = '../../resources/common/images/icon_success.png' width = '10' height = '10' />";
                var upload_failure_img = "<img src = '../../resources/common/images/icon_failure.png' width = '10' height = '10' />";
                $.each(data, function(idx, val){
                    if(val.uploadstatus == 1){
                        tablecontent = tablecontent + "<tr>"+"<td>"+val.serial+"</td>"+"<td>"+val.assetname+"</td>"+"<td>"+val.assetdesc+"</td>"+"<td>"+val.providedby+"</td>"+"<td>"+val.acquireddate+"</td>"+"<td>"+val.lifetime+"</td>"+"<td>"+val.amountpurchased+"</td>"+"<td>"+val.assettagid+"</td>"+"<td>"+val.ownertype+"</td>"+"<td>"+val.owner+"</td>"+"<td>"+val.photo+"</td>"+"<td>"+val.category+"</td>"+"<td>"+upload_failure_img +"</td>"+"</tr>";
                    }
                    else{
                        tablecontent = tablecontent + "<tr>"+"<td>"+val.serial+"</td>"+"<td>"+val.assetname+"</td>"+"<td>"+val.assetdesc+"</td>"+"<td>"+val.providedby+"</td>"+"<td>"+val.acquireddate+"</td>"+"<td>"+val.lifetime+"</td>"+"<td>"+val.amountpurchased+"</td>"+"<td>"+val.assettagid+"</td>"+"<td>"+val.ownertype+"</td>"+"<td>"+val.owner+"</td>"+"<td>"+val.photo+"</td>"+"<td>"+val.category+"</td>"+"<td>"+upload_success_img +"</td>"+"</tr>";
                    }
                            
                });
                table = "<table class ='table table-condensed table-striped'>"+tableheader+tablecontent+"</table>";
                $("#uploader").html(table);
            }
        };
        $('#upload').submit(function() {
            // get the file name, possibly with path (depends on browser)
            var filename = $("#fileToUpload").val();
            // Use a regular expression to trim everything before final dot
            var extension = filename.replace(/^.*\./, '');
            // Iff there is no dot anywhere in filename, we would have extension == filename,
            // so we account for this possibility now
            if (extension == filename) {
                extension = '';
            } else {
                // if there is an extension, we convert to lower case
                // (N.B. this conversion will not effect the value of the extension
                // on the file upload.)
                extension = extension.toLowerCase();
            }
            if(extension != 'xlsx'){
                // Cancel the form submission
                $("#errormsg").html("Invalid File Format Detected! Allowed file format is .xlsx");
                $("#errormsg").css("display", "block");
                return false;
                //submitEvent.preventDefault();
            }                
            $(this).ajaxSubmit(options);
            return false;
        });
    });
</script>