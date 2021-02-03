<div class="alert alert-block alert-warning fade in">
    <button type="button" class="close"  data-dismiss="alert" ></button>
    <h3 class="alert-heading">Warning!</h3>
    <h5>Are you sure you want to delete record</h5>   
    <br>
    <input type ="hidden" name ="assetcategoryid" id ="assetcategoryid">
    <button class="btn black" type="button" id="delbut">Delete</button>
    <a class="btn grey" href="../assetcategory/#">Back</a>
</div>
<script>
    $(document).ready(function(){
        $("#delbut").click(function(){       
            $.ajax({
                type: "POST",
                url: "server/assetcategory_delete_exec.php",
                data: {
                    assetcategoryid: $("#assetcategoryid").val()
                }
            }).done(function( data ) {
                if(data == 1){
                    document.location.href = "../assetcategory/#/";
                }else if(data == "stop"){
                    alert ("You Are Not Allowed to Delete This Data");
                }
                else{
                    alert("Operation failed!");
                }            
            });
        });
    });    
</script>
