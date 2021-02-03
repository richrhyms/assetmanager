var app = angular.module('core', []);

app.config(function ($routeProvider){
    $routeProvider    
    .when("/", {
        controller: "coreController", 
        templateUrl: "partials/core_index.php"
    }).when("/view/:id", {
        controller: "coreFacilityDetailsController", 
        templateUrl: "partials/core_facility_details.php"
    })
});
    
app.controller('coreController', function($scope){
    return;
});

app.controller('coreFacilityDetailsController', function($scope, $location, $routeParams){ 
    $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/core_facility_details_exec.php",
            data: "assetid="+$routeParams.id
        }).done(function( data ) {
            //alert(data);
            var table = "";
            var tablecontent = "";
            var assetname = "";
            var assetphoto = "";
            $.each(data, function(idx, val){   
                tablecontent += "<tr><td>Description</td><td>"+val.assetdesc+"</td></tr>";
                tablecontent += "<tr><td>Provided By</td><td>"+val.providedby+"</td></tr>";
                tablecontent += "<tr><td>Date Of Purchase</td><td>"+val.acquiredate+"</td></tr>";
                tablecontent += "<tr><td>Life time</td><td>"+val.lifetime+"</td></tr>";
                tablecontent += "<tr><td>Historic Value</td><td>"+val.amountpurchased+"</td></tr>";
                tablecontent += "<tr><td><h2>Book Value</h2></td><td><h2>"+val.currentvalue+"</h2></td></tr>";                
                assetname = val.assetname;
                assetphoto = val.photo;
            });
            table = "<table class = 'table table-bordered table-striped table-condensed'>"+tablecontent+"</table>";
            $("#core-list").html(table);
            $("#asset-name").html(assetname);
            $("#asset-photo").html('<img src ="../asset/uploads/'+assetphoto+'"/>');
        });
    //$("#assetid").val($routeParams.id);
});
