var app = angular.module('user', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "userController", 
        templateUrl: "partials/user_index.php"
    }).when("/create", {
        controller: "userCreateController", 
        templateUrl: "partials/user_create.php"
    }).when("/edit/:id", {
        controller: "userEditController", 
        templateUrl: "partials/user_edit.php"
    }).when("/delete/:id", {
        controller: "userDeleteController", 
        templateUrl: "partials/user_delete.php"
    })
});
app.controller('userController', function($scope){
    //alert($scope.firstname);
});
app.controller('userCreateController', function($scope , $routeParams){
     $("#userid").val($routeParams.id);
});
app.controller('userEditController', function($scope, $location, $routeParams){
    //alert($routeParams.id);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/user_get_exec.php",
        data: {
            userid: $routeParams.id
        }
    }).done(function( data ) {
        $("#userid").val(data.userid);
        $("#username").val(data.username);
        $("#password").val(data.password);
        $("#cpassword").val(data.cpassword);
        $("#displayname").val(data.displayname);
        $("#status").val(data.status);
    });
});
app.controller('userDeleteController', function($scope, $routeParams){
    $("#userid").val($routeParams.id);
});