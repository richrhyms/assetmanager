<li>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone"></div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
<li>
    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <!---<form class="sidebar-search" id="searchform">
        <div class="input-box">
            <a href="javascript:;" class="remove"></a>
            <input type="text" placeholder="Search..." name="search" />				
            <input type="submit" class="submit" value=""   />
        </div>
    </form> -->
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
</li>
<li class="start ">
    <a href="../dashboard/#">
        <i class="icon-home"></i> 
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Asset</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li><a href="../asset/#">View Asset</a></li>
        <li><a href="../asset/#/create">Create Asset</a></li>
        <li><a href="../asset/#/comfirm">Comfirm Asset</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Asset Category</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li><a href="../assetcategory/#">View Category</a></li>
        <li><a href="../assetcategory/#/create">Create Category</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Administration</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../user/#/">User Administration</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Faculty</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../faculty/#">View Faculty</a></li>
        <li ><a href="../faculty/#/create">Create Faculty</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Department</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../department/#">View Department</a></li>
        <li ><a href="../department/#/create">Create Department</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Role</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../role/#">View Role</a></li>
        <li ><a href="../role/#/create">Create Role</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Permission</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../permission/#">View Permission</a></li>        
        <!------------------------------------------
        The section commented below is for developer use only.
        -------------------------------------------->
        <!--<li ><a href="../permission/#/create">Create Permission</a></li>-->
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Users</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../user/#">View User</a></li>
        <li ><a href="../user/#/create">Create User</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Core</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../core/#">Evaluate Asset</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Reports</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../report/#/">Parameterized Report</a></li>
    </ul>
</li>
<li class="has-sub ">
    <a href="javascript:;">
        <i class="icon-th-list"></i> 
        <span class="title">Excel Operations</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub">
        <li ><a href="../asset/#/import">Import Facilities</a></li>
        <li ><a href="../asset/#/export">Export Facilities</a></li>
    </ul>
</li>
<script>
    $(document).ready(function(){
        $("#searchform").submit(function(){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../templates/server/search_get_exec.php",
                data: $(this).serialize()              
            }).done(function( data ) {
                var table = "";
                var tableheader = "<tr><th>S/N</th><th>Asset Name</th><th>Asset Desc</th><th>Provided By</th><th>Acquired Date</th><th>Life Time</th><th>Amount Purchased</th><th>Asset ID No</th><th>Owner Type: Owner</th><th>Photo</th><th></th></tr>";
                var tablecontent = "";
                var count = 1;
                $.each(data, function(idx, val){        
                    var core_link = "<a href = '../core/#/view/"+val.assetid+"'>Core</a>";
                    tablecontent = tablecontent + "<tr>"+
                        "<td>"+count+"</td>"+"<td>"+val.assetname+
                        "</td>"+"<td>"+val.assetdesc+"</td>"+
                        "</td>"+"<td>"+val.providedby+"</td>"+
                        "</td>"+"<td>"+val.acquiredate+"</td>"+
                        "</td>"+"<td>"+val.lifetime+"</td>"+
                        "</td>"+"<td>"+val.amountpurchased+"</td>"+
                        "</td>"+"<td>"+val.assettagid+"</td>"+
                        "</td>"+"<td>"+val.ownertype+": "+val.owner+"</td>"+
                        "</td>"+"<td>"+val.photo+"</td>"+
                        "<td>"+core_link+"</td>"+
                        "</tr>"
                    count++;
                });
                table = "<table class = 'table table-bordered table-striped table-condensed'>"+tableheader+tablecontent+"</table>";
                if(data.length > 0)
                    $("ng-view").html(table);
                else{
                    $("ng-view").html("<div class='alert alert-info'>No result was found</div>");
                }
            });
            
            return false;
        });
    });
</script>