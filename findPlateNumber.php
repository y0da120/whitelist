<?php
   include "../core/dbconnect.php";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
	//Post Datetime convert to sql datetime
    $date = $_POST['inTime'];
    $inTime = date("Y-m-d H:i:s", strtotime($_POST['inTime']));
        
    //plates number
    $pNumber = mysqli_real_escape_string($conn, $_POST['plateNumber']); //sql escaping
    //select
    $sql = "SELECT PlateNumber FROM white_plates WHERE  PlateNumber ='".$pNumber."' AND '".$inTime."' BETWEEN FromDate AND ToDate";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $countRow = mysqli_num_rows($result);
    mysqli_close($conn);
    if($result && $countRow == 1) 
       header("location: ../belepo.php?status=1&plateNumber=".$pNumber."&date=".$_POST['inTime']); 
    else
       header("location: ../belepo.php?status=0&plateNumber=".$pNumber."&date=".$_POST['inTime']); 
    exit;
	
   }
    
    
?>