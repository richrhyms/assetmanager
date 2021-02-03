<?php 
    if(isset($_POST["picture"]))    {
        if(isset($_FILES["picture"])){
            $arr = explode(".", $_FILES["passport"]["name"]);
        }else 
            $arr = "No File";
        if($arr != "No File") {                
            $picture = $_FILES['picture'];
            $bool = uploadFile($picture, "picture", "uploads/");  
            if($bool){
                echo "successful";
            }
        }        
    }
?>