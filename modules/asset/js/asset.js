var app = angular.module('asset', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "assetController", 
        templateUrl: "partials/asset_index.php"
    }).when("/create", {
        controller: "assetCreateController", 
        templateUrl: "partials/asset_create.php"   
    }).when("/edit/:id", {
        controller: "assetEditController", 
        templateUrl: "partials/asset_edit.php"
    }).when("/delete/:id", {
        controller: "assetDeleteController", 
        templateUrl: "partials/asset_delete.php"
    }).when("/import", {
        controller: "assetImportController", 
        templateUrl: "partials/asset_import.php"
    }).when("/export", {
        controller: "assetExportController", 
        templateUrl: "partials/asset_export.php"
    }).when("/comfirm", {
        controller: "assetComfirmController", 
        templateUrl: "partials/asset_comfirm.php"
    })
});



app.controller('assetController', function($scope, $location){
    var asset_list_permission = ["list asset"];     
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../login/server/login_get_permissions.php"
    }).done(function( data ) {
        var count = 0;
        $.each(data, function(idx, val){     
            var permissionname = val.permissionname            
            if(jQuery.inArray(permissionname, asset_list_permission ) != "-1"){
                count++;
            }
        });        
        if(asset_list_permission.length != count){
        //window.location.href = "/assetmanager/resources/common/pages/501.php";
        }        
        
    });
    
});

app.controller('assetCreateController', function($scope, $location){
    var asset_create_permission = new Array();
    asset_create_permission[0] = "create asset";    
});


app.controller('assetEditController', function($scope, $location,$routeParams){  
    //alert($routeParams.id);   
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "server/asset_get_exec.php",
        data: {
            assetid: $routeParams.id
        }
    }).done(function( data ) {
        $("#assetid").val(data.assetid);
        $("#assetname").val(data.assetname);
        $("#assetdesc").html(data.assetdesc);
        $("#providedby").val(data.providedby);
        $("#acquiredate").val(data.acquiredate);
        $("#lifetime").val(data.lifetime);
        $("#amountpurchased").val(data.amountpurchased);
        $("#assettagid").val(data.assettagid);
        $("#imgthumb").html("<img src =./uploads/"+data.photo+">");
        ownertypelabel = data.ownertype;
        ownertypelabel = ownertypelabel.toUpperCase(); 
        $("#ownertype").append("<option selected = 'selected' value = '"+data.ownertype+"'>"+ownertypelabel+"</option>");
        if(data.ownertype == "faculty"){
            $("#owner").append("<option selected = 'selected' value = '"+data.ownername_facid+"'>"+data.ownername+"</option>");
        }
        else{
            $("#owner").append("<option selected = 'selected' value = '"+data.ownerid+"'>"+data.ownername_deptname+" - "+data.ownername_facname+"</option>");
        }
        $("#photo").val(data.photo);
        $("#category").append("<option selected = 'selected' value = '"+data.categoryid+"'>"+data.categoryname+"</option>");
    });
});

app.controller('assetDeleteController', function($scope, $location, $routeParams){  
    var asset_delete_permission = new Array();
    asset_delete_permission[0] = "delete asset";  
    $("#assetid").val($routeParams.id);
});

app.controller('assetImportController', function($scope, $location, $routeParams){    
    var asset_import_permission = new Array();
    asset_import_permission[0] = "import asset"; 
});

app.controller('pageNotFoundController', function($scope){ 
    
    });
    
app.controller('assetExportController', function($scope, $location, $routeParams){    
    
    });
    app.controller('assetComfirmController', function($scope, $location, $routeParams){   
    
         var asset_list_permission = ["list asset"];     
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../login/server/login_get_permissions.php"
    }).done(function( data ) {
        var count = 0;
        $.each(data, function(idx, val){     
            var permissionname = val.permissionname            
            if(jQuery.inArray(permissionname, asset_list_permission ) != "-1"){
                count++;
            }
        });        
        if(asset_list_permission.length != count){
        //window.location.href = "/assetmanager/resources/common/pages/501.php";
        }        
        
    });
    });

    
 
    
    