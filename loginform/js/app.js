$(document).ready(function() {
    $("#loginbtn").click(function(){
        if(($("#username").val() == "admin") && ($("#password").val() == "admin")){
            window.location.href = "../modules/dashboard/#";
        }
        else{
            $(".notice").css("visibility", "visible")
            //alert("Invalid Username/Password");
        }        
    });	
});