var app = angular.module('department', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "departmentController", 
        templateUrl: "partials/department_index.php"
    }).when("/create", {
        controller: "departmentCreateController", 
        templateUrl: "partials/department_create.php"   
    }).when("/edit/:id", {
        controller: "departmentEditController", 
        templateUrl: "partials/department_edit.php"
    }).when("/delete/:id", {
        controller: "departmentDeleteController", 
        templateUrl: "partials/department_delete.php"
    }).otherwise({
        redirectTo: "/error"
    });
    
});

app.controller('departmentController', function($scope, $location){
    
    
    });

app.controller('departmentCreateController', function($scope, $location){
    
    });


app.controller('departmentEditController', function($scope, $location, $routeParams){
      
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/department_get_exec.php",
        data: {
            departmentid: $routeParams.id
        }
    }).done(function( data_ ) {
        $("#departmentid").val(data_.departmentid);
        $("#departmentname").val(data_.departmentname);
        $("#faculty").val(data_.facultyid);        
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../faculty/server/faculty_index_exec.php"
        }).done(function( data ) {
            
            var options = "";
            $.each(data, function(idx, val){  
                if(data_.facultyid == val.facultyid){
                    options += "<option value='"+val.facultyid+"' selected = 'selected'>"+val.facultyname+"</option>";
                }else{
                    options += "<option value='"+val.facultyid+"'>"+val.facultyname+"</option>";
                }
            });
            $("#faculty").html(options);
        });
        
        
        
        
        
    });
});

app.controller('departmentDeleteController', function($scope, $location, $routeParams){
    $("#departmentid").val($routeParams.id);
});


    
 
    
    