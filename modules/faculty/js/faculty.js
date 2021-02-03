var app = angular.module('faculty', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "facultyController", 
        templateUrl: "partials/faculty_index.php"
    }).when("/create", {
        controller: "facultyCreateController", 
        templateUrl: "partials/faculty_create.php"
    }).when("/edit/:id", {
        controller: "facultyEditController", 
        templateUrl: "partials/faculty_edit.php"
    }).when("/delete/:id", {
        controller: "facultyDeleteController", 
        templateUrl: "partials/faculty_delete.php"
    });
});
    
app.controller('facultyController', function($scope){
    return;
});

app.controller('facultyCreateController', function($scope, $routeParams){
    $("#facultyid").val($routeParams.id);
});

app.controller('facultyEditController', function($scope, $location, $routeParams){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/faculty_get_exec.php",
        data: {
            facultyid: $routeParams.id
        }
    }).done(function( data ) {
        $("#facultyid").val(data.facultyid);
        $("#facultyname").val(data.facultyname);
    });
});

app.controller('facultyDeleteController', function($scope, $location, $routeParams){
    $("#facultyid").val($routeParams.id);
});