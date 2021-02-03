<?php
//Connection to DB
require_once('../Connections/cnpgdataport.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Manage Groups</title>
        <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../css/site/site.css" rel="stylesheet" type="text/css" />
        <link href="../css/site/managegroup.css" rel="stylesheet" type="text/css" />        
        <style>
            form table {
                width: auto;
                margin: 0px;
            }
            *{
                font-size: 11px;
            }
            #message{
                display: none;
            }

            #errormsg{
                width: 100%;
                height: 30px;
                background-color: red;
                color: white;
                font-size: 15px;
                font-weight: bolder;
                margin: 0px;
                text-align: center;
                display:none;
            }
        </style>
    </head>
    <body>
        <div id="page">
            <div id="main">
                <div id="header">
                    <h1><img height="107" src="../images/banner.png" width="950" /></h1>                    
                </div>                
                <div class ="container">
                    <div class ="span11">
                        <div id ="errormsg"></div>
                        <br />
                        <a href ="coursesection.xlsx">Download Template</a>
                        <br />
                        <table class ="table table-condensed table-striped">
                            <tr>
                                <th>S/N</th>
                                <th>Instructor</th>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Course Code</th>
                                <th>Category</th>
                                <th>Section</th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Venue</th>
                                <th>Class Size</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>p22120</td>
                                <td>2011</td>
                                <td>1</td>
                                <td>COSC101</td>
                                <td>Lecture</td>
                                <td>1</td>
                                <td>Monday</td>
                                <td>1:00 PM</td>
                                <td>3:00 PM</td>
                                <td>M101</td>
                                <td>1000</td>                                    
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>p22120</td>
                                <td>2011</td>
                                <td>1</td>
                                <td>COSC101</td>
                                <td>Lab</td>
                                <td>1</td>
                                <td>Tuesday</td>
                                <td>7:00 AM</td>
                                <td>9:00 AM</td>
                                <td>M102</td>
                                <td>100</td>                                    
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
            </div>
        </div>
        <script src ="../js/jquery/jquery-1.7.2.min.js"></script>
        <script src ="../js/jquery/jquery.form.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    target: '#message', //Div tag where content info will be loaded in
                    url:'coursegroup_import_exec.php', //The php file that handles the file that is uploaded
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
                        var tableheader = "<tr><th>S/N</th><th>Instructor</th><th>Session</th><th>Semester</th><th>Course Code</th><th>Category</th><th>Section</th><th>Day</th><th>Start Time</th><th>End Time</th><th>Venue</th><th>Class Size</th><th></th></tr>";
                        var tablecontent = "";
                        var upload_success_img = "<img src = '../images/icon_success.png' width = '10' height = '10' />";
                        var upload_failure_img = "<img src = '../images/icon_failure.png' width = '10' height = '10' />";
                        $.each(data, function(idx, val){
                            if(val.uploadstatus == 1){
                                tablecontent = tablecontent + "<tr>"+"<td>"+val.serial+"</td>"+"<td>"+val.instructor+"</td>"+"<td>"+val.session+"</td>"+"<td>"+val.semester+"</td>"+"<td>"+val.coursecode+"</td>"+"<td>"+val.category+"</td>"+"<td>"+val.section+"</td>"+"<td>"+val.day+"</td>"+"<td>"+val.starttime+"</td>"+"<td>"+val.endtime+"</td>"+"<td>"+val.venue+"</td>"+"<td>"+val.maxsize+"</td>"+"<td>"+upload_success_img+"</td>"+"</tr>";
                            }
                            else{
                                tablecontent = tablecontent + "<tr>"+"<td>"+val.serial+"</td>"+"<td>"+val.instructor+"</td>"+"<td>"+val.session+"</td>"+"<td>"+val.semester+"</td>"+"<td>"+val.coursecode+"</td>"+"<td>"+val.category+"</td>"+"<td>"+val.section+"</td>"+"<td>"+val.day+"</td>"+"<td>"+val.starttime+"</td>"+"<td>"+val.endtime+"</td>"+"<td>"+val.venue+"</td>"+"<td>"+val.maxsize+"</td>"+"<td>"+upload_failure_img+"</td>"+"</tr>";
                            }
                            
                        });
                        table = "<table >"+tableheader+tablecontent+"</table>";
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
    </body>
</html>
