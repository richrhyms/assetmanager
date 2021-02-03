var app = angular.module('dashboard', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "dashboardController", 
        templateUrl: "partials/dashboard_index.php"
    }).when("/excel", {
        controller: "excelController", 
        templateUrl: "partials/excel_importexport.php"
    })
});



app.controller('assetController', function($scope){
        
});

app.controller('assetCreateController', function($scope){
        
});

app.controller('excelController', function($scope){
        
});


    
 
    
    