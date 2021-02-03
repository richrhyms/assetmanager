<?php 
    require_once("../../../connections/connection.php");
    require_once("../../../resources/functions/php/function.php");
?>
<?php require_once '../../../resources/libraries/phpexcel_lib/Classes/PHPExcel.php';  ?>
<?php require_once '../../../resources/libraries/phpexcel_lib/Classes/PHPExcel/IOFactory.php';  ?>
<?php 
/** Error reporting */
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

    date_default_timezone_set('Europe/London');
    
    // Create new PHPExcel object
    //echo date('H:i:s') , " Create new PHPExcel object" , PHP_EOL, '<br>';
    $objPHPExcel = new PHPExcel();

    // Set document properties
    //echo date('H:i:s') , " Set document properties" , PHP_EOL, '<br>';
    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                ->setLastModifiedBy("Maarten Balliauw")
                                ->setTitle("Office 2007 XLSX Test Document")
                                ->setSubject("Office 2007 XLSX Test Document")
                                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                ->setKeywords("office 2007 openxml php")
                                ->setCategory("Test result file");


if(isset($_POST['filename']))
{
   $path = $_POST['filename'];
   
   
   $objPHPExcel = prepareWorkSheet();

    $sql = "SELECT * FROM asset WHERE assetCommit= 1";
    $result = mysql_query($sql) or die(mysql_error());
    
    $row = 2;
    while($asset = mysql_fetch_array($result)){
        
        $category = getVal("categoryname","assetcategory","categoryid", $asset['categoryid'] );
        if ($asset['ownertype'] == "faculty") {
            $owner = getFacultyName($asset['ownerid']);
        } else {
            $owner = getDepartmentName($asset['ownerid']);
        }
        
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $asset['assetname']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $asset['assetdesc']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $asset['providedby']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $asset['acquiredate']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $asset['lifetime']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $row, $asset['amountpurchased']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $row, $asset['ownertype']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $row, $owner);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, $row, $category);
        
        $row++;
    }
    $objPHPExcel->removeSheetByIndex(0);
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save("../download/{$path}.xlsx");
   
    echo "{$path}.xlsx";
}


?>