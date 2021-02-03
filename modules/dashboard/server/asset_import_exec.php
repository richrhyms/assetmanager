<?php
error_reporting(0);
require_once("../../../connections/connection.php");
require_once("../../../resources/libraries/php/simplexlsx.class.php");

$errflag = false;
$errmsg = "";
if ($_FILES["fileToUpload"]["error"] > 0) {
    $errflag = true;
    $errmsg = $_FILES["fileToUpload"]["error"];
} else {
    $xlsx = new SimpleXLSX($_FILES['fileToUpload']['tmp_name']);
    list($num_cols, $num_rows) = $xlsx->dimension();
    $rowcount = 1;
    $recordaddedcount = 0;
    foreach ($xlsx->rows() as $r) {
        if ($rowcount > 1) {
            $serial = $r[0];
            $category = $r[1];
            $name = $r[2];
            $description = $r[3];
            $idtag = $r[4];
            $acquireddate = $r[5];
            $lifetime = $r[6];
            $amountpurchased = $r[7];            
            $sql = "INSERT INTO asset VALUES('', '$category', '$name', '$description', '$idtag', '$acquireddate', '$lifetime', '$amountpurchased')";
            $result = mysql_query($sql);
            if ($result) {
                $recordaddedcount++;
            }
        }
        $rowcount++;
    }
}
$resultArray = array("errflag" => $errflag, "errormsg" => $errmsg, "successdatacount" => $recordaddedcount);
echo json_encode($resultArray);
?>


