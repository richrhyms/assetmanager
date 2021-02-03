<?php
$output_dir = "../uploads/";
if (isset($_FILES["myfile"])) {
    $ret = array();

    $error = $_FILES["myfile"]["error"];
    if (!is_array($_FILES["myfile"]["name"])) { //single file
        $fileName = $_FILES["myfile"]["name"];
        $ctime = time();
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $ctime. $fileName);
        $filename = $ctime.$fileName;
    } else {
        $fileCount = count($_FILES["myfile"]["name"]);
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES["myfile"]["name"][$i];
            $ctime = time();
            move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $output_dir . $ctime . $fileName);
            $filename = $ctime.$fileName;
        }
    }
    echo $filename;
}
?>