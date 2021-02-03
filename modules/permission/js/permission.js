var app = angular.module('permission', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "permissionController", 
        templateUrl: "partials/permission_index.php"
    }).when("/create", {
        controller: "permissionCreateController", 
        templateUrl: "partials/permission_create.php"
    }).when("/edit/:id", {
        controller: "permissionEditController", 
        templateUrl: "partials/permission_edit.php"
    }).when("/delete/:id", {
        controller: "permissionDeleteController", 
        templateUrl: "partials/permission_delete.php"
    });
});
    
app.controller('permissionController', function($scope){
    return;
});

app.controller('permissionCreateController', function($scope, $routeParams){
    $("#permissionid").val($routeParams.id);
});

app.controller('permissionEditController', function($scope, $location, $routeParams){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/permission_get_exec.php",
        data: {
            permissionid: $routeParams.id
        }
    }).done(function( data ) {
        $("#permissionid").val(data.permissionid);
        $("#permissionname").val(data.permissionname);
    });
});

app.controller('permissionDeleteController', function($scope, $location, $routeParams){
    $("#permissionid").val($routeParams.id);
});