var app = angular.module('role_permission', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "role_permissionController", 
        templateUrl: "partials/role_permission_index.php"
    }).when("/create/:id", {
        controller: "role_permissionCreateController", 
        templateUrl: "partials/role_permission_create.php"
    }).when("/edit/:id", {
        controller: "role_permissionEditController", 
        templateUrl: "partials/role_permission_edit.php"
    }).when("/delete/:id", {
        controller: "role_permissionDeleteController", 
        templateUrl: "partials/role_permission_delete.php"
    });
});
    
app.controller('role_permissionController', function($scope){
    return;
});

app.controller('role_permissionCreateController', function($scope, $routeParams){
    $scope.roleid = $routeParams.id
    
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/rolename_get_exec.php",
        data: {
            roleid : $scope.roleid                  
        }
    }).done(function( data ) {
        $("#rolename").html(data.rolename);       
    });    
    
    
    function loadRolePermission(roleid){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/role_permission_get_exec.php",
            data: {
                roleid : roleid
            }
        }).done(function( data ) {
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Permission Name</th><th></th></tr>";
            var tablecontent = "";
            var permissionchkbox = "";
            var count = 1;
            $.each(data, function(idx, val){                
                if(val.status == "1"){
                    permissionchkbox = "<input type = 'checkbox' name = '' id = '' class = 'permission_chkbox' value = '"+val.permissionid+"' checked = 'checked' />";
                }else{
                    permissionchkbox = "<input type = 'checkbox' name = '' id = '' class = 'permission_chkbox' value = '"+val.permissionid+"' />";
                }
                tablecontent = tablecontent + "<tr>"+
                "<td>"+count+"</td>"+"<td>"+val.permissionname+"</td>"+"<td>"+permissionchkbox+"</td>"+"</tr>"
                count++;                 
            }); 
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
            $("#rolepermission-list").html(table);      
        });     
    }
    //    First load of role permission
    loadRolePermission($routeParams.id);
    
    
    $(document).on("click", ".permission_chkbox", function(){
        if($(this).is(":checked") == true){
            //Insert ignore
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "server/role_permission_insertignore_exec.php",
                data: {
                    roleid : $scope.roleid,
                    permissionid: $(this).val()                    
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
                url: "server/role_permission_delete_exec.php",
                data: {
                    roleid : $scope.roleid,
                    permissionid: $(this).val()                    
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
    
//  Click of checkbox for adding and removing permission
     
});

app.controller('role_permissionEditController', function($scope, $location, $routeParams){
    
    });

app.controller('permissionDeleteController', function($scope, $location, $routeParams){
    
    });