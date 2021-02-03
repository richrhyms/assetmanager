var app = angular.module('user_role', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "user_roleController", 
        templateUrl: "partials/user_role_index.php"
    }).when("/create/:id", {
        controller: "user_roleCreateController", 
        templateUrl: "partials/user_role_create.php"
    }).when("/edit/:id", {
        controller: "user_roleEditController", 
        templateUrl: "partials/user_role_edit.php"
    }).when("/delete/:id", {
        controller: "user_roleDeleteController", 
        templateUrl: "partials/user_role_delete.php"
    });
});
    
app.controller('user_roleController', function($scope){
    return;
});

app.controller('user_roleCreateController', function($scope, $routeParams){
    $scope.userid = $routeParams.id
    
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/user_displayname_get_exec.php",
        data: {
            userid : $scope.userid                  
        }
    }).done(function( data ) {
        $("#displayname").html(data.displayname);       
    });    
    
    
    
    
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/user_role_get_exec.php",
        data: {
            userid : $scope.userid
        }
    }).done(function( data ) {
        var table = "";
        var tableheader = "<tr><th>S/N</th><th>Role Name</th><th></th></tr>";
        var tablecontent = "";
        var roleradio = "";
        var count = 1;
        $.each(data, function(idx, val){                
            if(val.status == "1"){
                roleradio = "<input type = 'radio' name = 'roleoptiongroup' id = '' class = 'role_radio' value = '"+val.roleid+"' checked = 'checked' />";
            }else{
                roleradio = "<input type = 'radio' name = 'roleoptiongroup' id = '' class = 'role_radio' value = '"+val.roleid+"' />";
            }
            tablecontent = tablecontent + "<tr>"+
            "<td>"+count+"</td>"+"<td>"+val.rolename+"</td>"+"<td>"+roleradio+"</td>"+"</tr>"
            count++;                 
        }); 
        table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
        $("#userrole-list").html(table);      
    });     
    
    
    


    $(document).on("click", ".role_radio", function(){
        $.ajax({
            type: "POST",
            url: "server/user_role_update_exec.php",
            data: {
                userid : $scope.userid,
                roleid: $(this).val()                    
            }
        }).done(function( data ) {
            if(data == 1){
                alert("Operation successfull");
            }
            else{
                alert("Oops !!! Operation failed");
            }          
        });     
    }); 
    
    
     
});

app.controller('role_permissionEditController', function($scope, $location, $routeParams){
    
    });

app.controller('permissionDeleteController', function($scope, $location, $routeParams){
    
    });


