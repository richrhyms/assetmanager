<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!in_array("viewParameterizedReport", $_SESSION['PERMISSIONS'])) {
    header("Location: ../../../resources/common/pages/501.php");
    exit();
}
?>
<div clas="row">
    <div class ="span12">
        <table>
            <tr>
                <td>
                    Asset Category
                </td>
                <td>
                    Faculty
                </td>
                <td>
                    Department
                </td>
                <td>
                    Acquire Date
                </td>
                <td>
                    Lifetime (Number Only)
                </td>
                <td>
                    Provided By
                </td>
            </tr>           
            <tr>
                <td>
                    <select ng-model = "assetcategory" ng-options="category.categoryid as category.categoryname for category in categories"  >
                        <option value ="">All</option>
                    </select>
                </td>
                <td>
                    <select ng-model = "faculty" ng-options="faculty.facultyid as faculty.facultyname for faculty in faculties" ng-change ="changeFaculty(faculty)"  >
                        <option value ="">All</option>
                    </select>
                </td>
                <td>
                    <select ng-model = "department" ng-options="department.departmentid as department.departmentname for department in departments"  >
                        <option value ="">All</option>
                    </select>
                </td>
                <td>
                    <input type ="text" id ="acquiredate" style ="width: 50px;" />
                </td>
                <td>
                    <input type ="text" id ="lifetime" class ="lifetime"/>
                </td>
                <td>
                    <select ng-model ="providedby">
                        <option value ="">All</option>
                        <option value ="IGR">IGR</option>
                        <option value ="Government">Government</option>
                        <option value ="Others">Others</option>
                    </select>
                </td>
            </tr>
        </table>



        <input type ="button" value ="fetch" class ="btn btn-primary" ng-click ="fetchAssets()">

        <br />
        <br />
        <div>
            <table class ="table table-bordered table-condensed table-striped" id ="table_data" ng-show ="assets.length != null">
                <tr>
                    <td>S/N</td>
                    <td>Asset Tag ID</td>
                    <td>Asset Name</td>
                    <td>Asset Desc</td>
                    <td>Asset Category</td>
                    <td>Provided By</td>
                    <td>Acquired Date</td>
                    <td>Life Time</td>
                    <td>Historic Cost (NGN)</td>
                    <td>Book Value (NGN)</td>
                    <td>Lost Value (NGN)</td>
                    <td>User Type</td>
                </tr>
                <tr>
                    <td colspan ="12" ng-show ="assets.length == 0">Records not found</td>
                </tr>
                <tr ng-repeat ="asset in assets">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ asset.assettagid }}</td>
                    <td>{{ asset.assetname }}</td>
                    <td>{{ asset.assetdesc }}</td>
                    <td>{{ asset.categoryname }}</td>
                    <td>{{ asset.providedby }}</td>
                    <td>{{ asset.acquiredate }}</td>
                    <td>{{ asset.lifetime }}</td>
                    <td>{{ asset.amountpurchased }}</td>
                    <td>{{ asset.currentvalue }}</td>
                    <td>{{ asset.depreciatedvalue }}</td>
                    <td>{{ asset.ownertype }}</td>                    
                </tr>
            </table>




            
        </div>


    </div>
</div>
<script type="text/javascript" src="../../resources/assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="../../resources/assets/jquery-numeric/jquery-numeric.js"></script>
<script src="../../resources/libraries/jquery-ui-daterangepicker-0.4.0/jquery.comiseo.daterangepicker.js"></script>
<script src="../../resources/libraries/jquery-ui-daterangepicker-0.4.0/moment.min.js"></script>



<script type ="text/javascript">
    $(function() {
        $("input.lifetime").numeric()
    });
    
     
    $(function() { 
        $("#acquiredate").daterangepicker({dateFormat: "yy-mm-dd", rangeSplitter: " / ", applyOnMenuSelect: false});
    });
    
    
        
</script>

<style>
    select, input {
        width: 150px;
    }

</style>