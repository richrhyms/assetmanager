<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
    <head>
        <!-- General Metas -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <!-- Stylesheets -->
        <link rel="stylesheet" href="../../resources/common/css/base.css">
        <link rel="stylesheet" href="../../resources/common/css/skeleton.css">
        <link rel="stylesheet" href="../../resources/common/css/layout.css">
    </head>
    <style>
        .notice{
            visibility: hidden;
        }
    </style>
    <body>
        <div class="notice">
            <a href="" class="close">close</a>
            <p class="warn">Whoops! We didn't recognise your username or password. Please try again.</p>
        </div>
        <!-- Primary Page Layout -->
        <div class="container">
            <div class="form-bg">
                <form action ="" method ="" id ="login_form">
                    <h2>Login</h2>
                    <p><input type="text" placeholder="Username" name ="username" id ="username"></p>
                    <p><input type="password" placeholder="Password" name ="password" id ="password"></p>
                    <label for="remember">
                        <!--<input type="checkbox" id="remember" value="remember" /> -->
                        <span>Federal University Dustinma</span>
                    </label>
                    <button type="button" id ="loginbtn"></button>
                </form>
            </div>
           <!-- <p class="forgot">Forgot your password? <a href="">Click here to reset it.</a></p> -->
        </div><!-- container -->
        <!-- JS  -->
        <script src="../../resources/assets/js/jquery-1.8.3.min.js"></script>
        <!-- End Document -->
        <script type ="text/javascript">
            $(document).ready(function() {
                $("#loginbtn").click(function(){
                    $.ajax({
                        type: "POST",
                        url: "server/login_form_exec.php",
                        data: $("#login_form").serialize()
                    }).done(function( data ) {
                        if(data == 1){
                            window.location.href = "../dashboard/#";
                        }
                        else if(data == 0){
                            alert("No User Role Granted");
                        }
                        else if(data == -1){
                            $(".notice").css("visibility", "visible");
                        }       
                    });   
                });	
            });
        </script>
    </body>
</html>
