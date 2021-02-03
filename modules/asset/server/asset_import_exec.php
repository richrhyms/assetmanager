<?php

require_once("../../../connections/connection.php");

function getId($str) {
    $id = "";
    $id_arr = explode("-", $str);
    $id = $id_arr[0];
    return $id;
}

function convertExcelInttoDate($n) {
    $dateTime = new DateTime("1899-12-30 + $n");
    return $dateTime->format("Y-m-d");
}

//Error in Uploading
if ($_FILES["fileToUpload"]["error"] > 0) {
    echo "1"; // 1 represent error code in upload
    exit();
}

require_once '../../../resources/libraries/phpexcel_lib/classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load($_FILES["fileToUpload"]["tmp_name"]);
$dataArray = array();
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $highestRow = $worksheet->getHighestRow();
    for ($row = 1; $row <= $highestRow; ++$row) {
        if ($row > 1) {
            $serial = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
            $assetname = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $assetdesc = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $providedby = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $aquireddate = $worksheet->getCellByColumnAndRow(4, $row)->getFormattedValue();
            $lifetime = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $amountpurchased = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
            $assettagid = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
            $ownertype = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
            $owner = getId($worksheet->getCellByColumnAndRow(9, $row)->getValue());
            $photo = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
            $category = getId($worksheet->getCellByColumnAndRow(11, $row)->getValue());

            $sql = "SELECT * FROM asset WHERE assettagid = '$assettagid'";
            $result = mysql_query($sql);

            if (mysql_num_rows($result) > 0) {
                $dataArray[] = array("serial" => $serial,
                    "serial" => $serial,
                    "assetname" => $assetname,
                    "assetdesc" => $assetdesc,
                    "providedby" => $providedby,
                    "aquireddate" => $aquireddate,
                    "lifetime" => $lifetime,
                    "amountpurchased" => $amountpurchased,
                    "assettagid" => $assettagid,
                    "ownertype" => $ownertype,
                    "owner" => $owner,
                    "photo" => $photo,
                    "category" => $category,
                    "uploadstatus" => "1");
            } else {
                $dataArray[] = array("serial" => $serial,
                    "serial" => $serial,
                    "assetname" => $assetname,
                    "assetdesc" => $assetdesc,
                    "providedby" => $providedby,
                    "aquireddate" => $aquireddate,
                    "lifetime" => $lifetime,
                    "amountpurchased" => $amountpurchased,
                    "assettagid" => $assettagid,
                    "ownertype" => $ownertype,
                    "owner" => $owner,
                    "photo" => $photo,
                    "category" => $category,
                    "uploadstatus" => "0");
                $sql_ = "INSERT INTO asset(assetname,
                            assetdesc,
                            providedby,
                            acquiredate,
                            lifetime,
                            amountpurchased,
                            assettagid,
                            ownertype,
                            ownerid,
                            photo,
                            categoryid)
                VALUES ('$assetname',
                        '$assetdesc',
                        '$providedby',
                        '$aquireddate',
                        '$lifetime',
                        '$amountpurchased',
                        '$assettagid',
                        '$ownertype',
                        '$owner',
                        '$photo',
                        '$category')";
                $result_ = mysql_query($sql_) or die(mysql_error());
            }
        }
    }
    break;
}
echo json_encode($dataArray);
?>
