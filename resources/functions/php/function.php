<?php

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

function getFacultyName($facultyid) {
    $sql = "SELECT * FROM faculty WHERE facultyid = '$facultyid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $facultyname = $row['facultyname'];
    return $facultyname;
}

function getDepartmentName($departmentid) {
    $sql = "SELECT * FROM department WHERE departmentid = '$departmentid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $departmentname = $row['departmentname'];
    return $departmentname;
}

function assetCurrentValue($lifetime, $acquiredate, $amountpurchased) {
    $result = null;
    $current_date = new DateTime(Date("Y-m-d"));
    $acquiredate = new DateTime($acquiredate);
    $diff = date_diff($current_date, $acquiredate);
    $days = $diff->format("%a");
    $daily_value = $amountpurchased / $lifetime;
    $current_value = $days * $daily_value;
    if ($current_value <= $amountpurchased) {
        $result = $amountpurchased - $current_value;
    } else {
        $result = "Asset Maximum Value Exceeded";
    }
    return $result;
}

function prepareWorkSheet() {
    // Create a first sheet, representing sales data
    //echo date('H:i:s') , " Add some data" , PHP_EOL, '<br>';

    global $objPHPExcel;

    $worksheet = new PHPExcel_Worksheet($objPHPExcel, "Report");
    $objPHPExcel->addSheet($worksheet);
    $objPHPExcel->setActiveSheetIndexByName("Report");
    //echo date('H:i:s') , " Set column widths" , PHP_EOL, '<br>';
    for ($i = 0; $i < 15; $i++) {
        // Set fonts
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i, 1)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i, 2)->getFont()->setBold(true);
    }

    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'Asset Name');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'Asset Desc');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, 'Provided By');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 1, 'Acquire date');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, 1, 'lifetime');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, 1, 'amountpurchased');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, 1, 'ownertype');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, 1, 'ownerid');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, 1, 'categoryid');

    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(0)->setWidth(22);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(14);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(14);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(14);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(16);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(14);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(14);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(10);
    return $objPHPExcel;
}

function getVal($value,$table,$val1,$val2)
{
    $sql = "SELECT $value FROM $table WHERE $val1 = $val2";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $d = $row[$value];
    return $d;
}
function Logs($logoperation , $userid , $resourceid){

    $remarks = "";
    $sql = "INSERT INTO logs VALUES (NULL , '$logoperation' , '$userid' , now(), '$remarks' , '$resourceid')";
    $result = mysql_query($sql);
}


?>
