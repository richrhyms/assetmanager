<?php 
    require_once("../../../connections/connection.php");
    require_once("../../../resources/functions/php/function.php");

?>

<?php

$query = "SELECT * FROM asset WHERE assetid = ".$_POST['assetid'];
$result = mysql_query($query) or die(mysql_error());

$dataArray = array();

while ($row = mysql_fetch_array($result)) {
        $assetid = $row['assetid'];
        $assetname = $row['assetname'];
        $assetdesc = $row['assetdesc'];
        $providedby = $row['providedby'];
        $acquiredate = $row['acquiredate'];
        $lifetime = $row['lifetime'];
        $amountpurchased = $row['amountpurchased'];
        $photo = $row['photo'];
        

        $dataArray[] = array("assetid" => $assetid,
            "assetname" => $assetname,
            "assetdesc" => $assetdesc,
            "providedby" => $providedby,
            "acquiredate" => $acquiredate,
            "lifetime" => $lifetime,
            "amountpurchased" => $amountpurchased,
            "currentvalue" => Current_value($lifetime, date_create($acquiredate), $amountpurchased),
            "photo" => $photo);
        
    }
    echo json_encode($dataArray);

function AssetCurrentValueCore($assetid){
        
        $query = "SELECT lifetime,acquiredate,amountpurchased FROM asset WHERE assetid = {$assetid}";
        $result = mysql_query($query) or die(mysql_error());
        
        if(mysql_num_rows($result) > 0){
            $row = mysql_fetch_array($result);
            $lifetime = $row['lifetime'];
            $acquiredate = $row['acquiredate'] ;
            $amountpurchased = $row['amountpurchased'] ;
            
            try {
                $current_date = Date("Y-m-d");
                $actual_worth_per_day = $amountpurchased / $lifetime;                
                $date_diff = date_diff($acquiredate, $current_date,true);               
                $current_worth = $date_diff * $actual_worth_per_day;
                return $current_worth;
                
            } catch (Exception $ex) {
                return 0;
            }           
        }
    }
    
function Current_value($lifetime,$acquiredate,$amountpurchased){
    try {
        
        $current_date = new DateTime(Date("Y-m-d")); 
        
        $diff = date_diff($current_date,$acquiredate);
        
        $date_diff = $diff->format("%a");
        
        $actual_worth_per_day = $amountpurchased / $lifetime;                
        
        $current_worth = $date_diff * $actual_worth_per_day;
        if ($current_worth <= 0) {
            return "valueless";
        }
        return $current_worth;

    } catch (Exception $ex) {
        return "in correct";
    }           
}