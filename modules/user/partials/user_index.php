<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("viewUser", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div clas="row">
    <div class ="span12" id ="user-list">

    </div>
</div>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/user_index_exec.php"
        }).done(function( data ) {
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Username</th><th>Password</th><th>Display Name</th><th>Date Created</th><th>Enabled</th><th></th></tr>";
            var tablecontent = "";
            var createBtn = '<a href ="#/create" class ="btn btn-primary">Create</a> <br /><br />';
            var count = 1;
            $.each(data, function(idx, val){        
                var edit_link = "<a href = '../user/#/edit/"+val.userid+"'>Edit</a>";
                var delete_link = "<a href = '../user/#/delete/"+val.userid+"'>Delete</a>";
                var assignrole_link = "<a href = '../user_role/#/create/"+val.userid+"'>Assign Role</a>";
                tablecontent = tablecontent + "<tr>"+"<td>"+count+"</td>"+"<td>"+val.username+"</td>"+"<td>"+"**********"+"</td>"+"<td>"+val.displayname+"</td>"+"<td>"+val.datecreated+"</td>"+"<td>"+val.enabled+"</td>"+"<td>"+edit_link+" | "+delete_link+" | "+assignrole_link+"</td>"+"</tr>"
                count++;
            });
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
            $("#user-list").html(createBtn + table);
        }); 
    });    
</script>