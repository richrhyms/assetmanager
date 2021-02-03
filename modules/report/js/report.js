var app = angular.module('report', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "assetReportController", 
        templateUrl: "partials/asset_report.php"
    })
});

app.service('Report', function($http) {
    return {
        fetchFaculties: function(){
            $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
            return $http.post("./server/getfaculties.php");
        },
        fetchDepartments: function(object){
            $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
            return $http.post("./server/getdepartments.php", object);
        },
        fetchAssetCategories: function(object){
            $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
            return $http.post("./server/getassetcategories.php", object);
        },
        fetchAssets: function(object){
            $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
            return $http.post("./server/getassets.php", object);
        }
    };
});



app.controller('assetReportController', function($scope, Report){
    Report.fetchFaculties().then(function(data){
        $scope.faculties = data.data;
    });
    
    Report.fetchAssetCategories().then(function(data){
        $scope.categories = data.data;
    });   
    
    
    $scope.changeFaculty = function(faculty){
        var object = $.param({
            faculty: faculty
        });
        
        Report.fetchDepartments(object).then(function(data){
            $scope.departments = data.data;
        });
    }
    
    
    $scope.fetchAssets = function(){  
        var object = $.param({
            assetcategory: $scope.assetcategory,
            faculty: $scope.faculty,
            department: $scope.department,
            acquiredate: $("#acquiredate").val(),
            lifetime: $("#lifetime").val(),
            providedby: $scope.providedby
        });
        
               
        Report.fetchAssets(object).then(function(data){
            $scope.assets = data.data;
        });
    }
    
});