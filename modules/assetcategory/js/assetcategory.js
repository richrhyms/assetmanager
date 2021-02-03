var app = angular.module('assetcategory', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "assetCategoryController", 
        templateUrl: "partials/assetcategory_index.php"
    }).when("/create", {
        controller: "assetCategoryCreateController", 
        templateUrl: "partials/assetcategory_create.php"
    }).when("/edit/:id", {
        controller: "assetCategoryEditController", 
        templateUrl: "partials/assetcategory_edit.php"
    }).when("/delete/:id", {
        controller: "assetCategoryDeleteController", 
        templateUrl: "partials/assetcategory_delete.php"
    })
});
app.controller('assetCategoryController', function($scope){
    //alert($scope.firstname);
    });

app.controller('assetCategoryCreateController', function($scope){
    //alert($scope.firstname);
    });

app.controller('assetCategoryEditController', function($scope, $location, $routeParams){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/assetcategory_get_exec.php",
        data: {
            categoryid: $routeParams.id
        }
    }).done(function( data ) {
        $("#categoryid").val(data.categoryid);
        $("#categoryname").val(data.categoryname);
        $("#categorydesc").html(data.categorydesc);
    });
});

app.controller('assetCategoryDeleteController', function($scope, $routeParams){
    $("#assetcategoryid").val($routeParams.id);
});