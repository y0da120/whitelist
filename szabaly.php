<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="Add new plate-numbers to the whitelist">
<meta name="author" content="Gergely Lenard">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<title>Szabályok</title>
</head>
<body class="bg-light">
    <div class="container py-5">
    <div class="col-md-5 ">
          <h4 class="mb-3">Új szabály</h4>
          <form name="Form" class="needs-validation" action="controller/uploadRule.php" method = "post" >
            
              <div class="row">
                  <div class="col-md-6">
                    <label for="fd">Mettől</label>
                       <input type="datetime-local" id="fd" name="fromTime" value="<?php echo date("Y-m-d\TH:i")?>" required >
                    <div id="fvalid"> </div>
                  </div>
                
                  <div class="col-md-6">
                    <label for="td">Meddig</label>
                    <input type="datetime-local" id="td" name="toTime" value="<?php echo 
							date("Y-m-d\TH:i",strtotime('+1 hour'))?>"  required >
                    <div id="tvalid"> </div>
                  </div>
            </div>
              
            <div class="row py-3">
              <div class="col-md-6 mb-3">
                  <label for="quantity">Rendszám darab</label>
                  <input type="number" class="form-control" id="quantity" min="1"  value="1" size="1">
                  <div id="pvalid"> </div>
              </div>
            </div>
              
            <div class="row">
             <div class="col-md-6 mb-3">
                   <input type="button" class="btn btn-secondary" onclick="showPlates()" value="Tovább">
                    <div  id="tov" >
                    </div>
              </div>
            </div>
              
            <div class="row">
             <div class="col-md-6 mb-3" id="plN">
                   
              </div>
            </div>
              
        </form>
            
    </div>
    </div>
    
    
<?php
if(isset($_GET['status'])){
    $status = $_GET['status'];
    if($status == 1){
        echo "<script >alert('Sikeres szabály feltöltés!')</script>";
    }else if($status == 0){
        echo "<script >alert('Sikertelen feltöltés!')</script>";
    }
 }
?>
<script>
//check input is valid
function validField(obj,id){
     if (!obj.checkValidity()){
        document.getElementById(id).innerHTML = obj.validationMessage;
         return false;
    }
    document.getElementById(id).innerHTML = "";
    return true;
}
//tovabb button 
function showPlates() {
    if(!validField(document.getElementById("fd"),"fvalid") ||
       !validField(document.getElementById("td"),"tvalid") || !validField(document.getElementById("quantity"),"pvalid"))
        return;
    var n = document.getElementById("quantity").value;
    var field  = [];
    for(var i=0; i<n; ++i){     
        field.push("Rendszám: <input type='text' name='plateNumbers[]' maxlength='12' size='8' required> <br>");
    }
    field.push("<input type='submit' class='btn btn-primary mt-3 px-4' value='Feltölt'>");
    document.getElementById("plN").innerHTML =field.join('');

}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>