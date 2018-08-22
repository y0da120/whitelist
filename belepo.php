<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="Entry for whitelisted plate-numbers">
<meta name="author" content="Gergely Lenard">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<title>Belépés</title>
</head>
<body class="bg-light">
    <div class="container py-5">
    <div class="col-md-5 ">
          <h4 class="mb-3">Belépő</h4>
          <form name="Form" class="needs-validation" action="controller/findPlateNumber.php" method = "post" >
            
                  <div class="row">
                      <div class="col-md-6">
                        <label for="td">Időpont</label>
                           <input type="datetime-local" id="td" name="inTime" value="<?php echo isset($_GET['date']) ? $_GET['date']: date("Y-m-d\TH:i") ?>" required >
                      </div>

                      <div class="col-md-4">
                        <label for="pl">Rendszám</label>
                        <input type='text' id='pl' name='plateNumber' maxlength='12' size='8'  value="<?php echo isset($_GET['plateNumber']) ? $_GET['plateNumber'] : '' ?>" required>
                      </div>
                </div>
              
              
                <div class="row">
                 <div class="col-md-6 mb-3">
                       <input type="submit" class="btn btn-primary mt-3 px-4"  value="Ok">
                        <div  id="tov" >
                        </div>
                  </div>
                </div>
            </form>
        
            <div class="row">
                 <div class="col-md-6">
                  <h5 class="mb-3 py-3">Engedélyezett:</h5>
                    </div>
              
                
                 <div class="col-md-3 " id="plN">
                    <?php
                    $none = '<div class="alert alert-light text-center" role="alert">&#x2015;</div>';
                    if(isset($_GET['status'])){
                        $status = $_GET['status'];
                        $succes =  '<div class="alert alert-success text-center" role="alert "> <strong>Igen</stroong></div>';
                        $fail =  '<div class="alert alert-danger text-center" role="alert"> <strong>Nem</strong></div>';
                      
                        if($status == 1)
                            echo $succes;
                        else if($status == 0)
                            echo $fail;
                     }
                    else  echo $none;      
                    ?>
                  </div>
            </div>
              
       
            
        </div>
    </div>
    
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>