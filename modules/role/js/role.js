var app = angular.module('role', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "roleController", 
        templateUrl: "partials/role_index.php"
    }).when("/create", {
        controller: "roleCreateController", 
        templateUrl: "partials/role_create.php"
    }).when("/edit/:id", {
        controller: "roleEditController", 
        templateUrl: "partials/role_edit.php"
    }).when("/delete/:id", {
        controller: "roleDeleteController", 
        templateUrl: "partials/role_delete.php"
    });
});
    
app.controller('roleController', function($scope){
    return;
});

app.controller('roleCreateController', function($scope, $routeParams){
    
});

app.controller('roleEditController', function($scope, $location, $routeParams){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/role_get_exec.php",
        data: {
            roleid: $routeParams.id
        }
    }).done(function( data ) {
        $("#roleid").val(data.roleid);
        $("#rolename").val(data.rolename);
    });
});


app.controller('roleDeleteController', function($scope, $location, $routeParams){
    $("#roleid").val($routeParams.id);
});