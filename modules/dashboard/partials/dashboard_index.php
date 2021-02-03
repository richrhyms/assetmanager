<div id="search-result">
    <div class="span5">
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail">
                    <a href="../asset/#/"><img src="img/new.png" alt="">
                        <span class="align_center">ASSET</span>
                    </a>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <a href="../core/#/"><img src="img/export.png" alt=""></a>
                    <span class="align_center">CORE</span>
                </div>
            </li>

            <li class="span4">
                <div class="thumbnail">
                    <a href="#/excel"><img src="img/excelimport.png" alt=""></a>
                    <span class="align_center">IMPORT/EXPORT</span>
                </div>
            </li>       
        </ul>
    </div>
    <div class="span7" id="asset-list">

    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
                
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "server/assets_get_exec.php"
        }).done(function( data ) {
            var table = "";
            var tableheader = "<tr><th>S/N</th><th>Asset Name</th><th>Date Of Purchase</th><th>Provided By</th><th>Historic Value</th><th>Book Value</th></tr>";
            var tablecontent = "";
            var count = 1;
            $.each(data, function(idx, val){        
                tablecontent = tablecontent + "<tr>"+
                    "<td>"+count+"</td>"+"<td>"+val.assetname+
                    "</td>"+"<td>"+val.acquiredate+"</td>"+
                    "</td>"+"<td>"+val.providedby+"</td>"+
                    "</td>"+"<td>"+val.amountpurchased+"</td>"+
                    "</td>"+"<td>"+val.current+"</td>"+
                    "</tr>"
                count++;
            });
            table = "<table class = 'table table-bordered table-striped table-hover'>"+tableheader+tablecontent+"</table>";
            $("#asset-list").html(table);
        }); 
        
    });
</script>
