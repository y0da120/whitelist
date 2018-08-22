<?php
   include "../core/dbconnect.php";
    $succes =false;
   if($_SERVER["REQUEST_METHOD"] == "POST"){
	//fromDatetime convert to sql datetime
    $fromTime = date("Y-m-d H:i:s", strtotime($_POST['fromTime']));
       
	//toDatetime convert to sql datetime
    $toTime = date("Y-m-d H:i:s", strtotime($_POST['toTime']));
       
    //plates numbers
    $pNumbers = array();
    foreach($_POST['plateNumbers'] as $item) {
            $pNumbers[] = mysqli_real_escape_string($conn, $item); //sql escaping 
        }
    }

    //insert
    $sql = "INSERT INTO `white_plates` (`PlateNumber`, `FromDate`, `ToDate`) VALUES ";
    $valuesArray = array();
    foreach($pNumbers as $item){
        $valuesArray[] = "('$item', '$fromTime', '$toTime')";
    }
    $sql .= implode(',', $valuesArray)."ON DUPLICATE KEY UPDATE FromDate = '".$fromTime."', ToDate = '".$toTime."'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    mysqli_close($conn);
    if($result) 
        header("location: ../szabaly.php?status=1"); 
    else
        header("location: ../szabaly.php?status=0"); 
	exit;
   
    
    
?>