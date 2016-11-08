<?php
session_start();

include 'dataCon.php';

$dbConn = getDataBaseConnection(Project_1);
$device = array();
$price = array();


    
    $sql = "SELECT * FROM device";
    
    
    if(isset($_GET['Submit'])){
        

        
     if($_GET['manufacturer'] == "apple")
     {
         $sql .= " NATURAL JOIN deviceInfo 
         WHERE manufactName = 'iPhone'";
        
     }
      if($_GET['manufacturer'] == "htc")
     {
         $sql .= " NATURAL JOIN deviceInfo 
         WHERE manufactName = 'HTC'";
        
     }
      if($_GET['manufacturer'] == "LG")
     {
         $sql .= " NATURAL JOIN deviceInfo 
         WHERE manufactName = 'LG'";
        
     }
      if($_GET['manufacturer'] == "Samsung")
     {
         $sql .= " NATURAL JOIN deviceInfo 
         WHERE manufactName = 'Samsung'";
         
     }
     
             if($_GET['priceFilter'] == "high"){

        $sql .= " ORDER BY price DESC";
    }
    
    if($_GET['priceFilter'] == "low"){
        
        $sql .= " ORDER BY price ASC";
      
    }
        
        

        
    }
    
    

$statement = $dbConn->prepare($sql);
$statement->execute();
$record = $statement->fetchAll(PDO::FETCH_ASSOC);

$index = 0;
$id = array();



foreach($record as $records){
    $device[$index] = $records['name'];
    $price[$index] = $records['price'];
    $id[$index] = $records['deviceId'];
    $index++;
}



function makeTable(){
    
    global $device;
    global $price;
    global $id;
    
    $index = 0;

    echo "<table border = '1'>";
    $temp = 1;
    
    for($i=0; $i < 4; $i++){
        
        echo "<tr>";
        
        for($j=0; $j < 5; $j++){
            
            
            echo "<td> <a href='info.php'> <img src='img/sm" .$id[$index]. ".jpg'/> <br />" . 
            $device[$index] . "<br /> $" . $price[$index] . "</a></td>";
            $temp++;
            $index++;
        }
        
        echo " " ;
        
        
    }
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Online Phone Catalog</title>
    </head>
    <body>
        <h1> Smart Phones for Sale! </h1>
         <link rel="stylesheet" href="tp1.css" type="text/css" />
            
            Search <input type="text" name="search"/>
            <br />
            
            <?=makeTable()?>
            
             <form method = "get">  
            
            <fieldset>
            <legend>Sort by:</legend>
            Price     
            <select name ="priceFilter">
                <option value =""> Choose One </option>
                 <option value="high">High to Low</option>
                 <option value="low">Low to High</option>
            </select>
            
                Manufacturer        
            <select name ="manufacturer">
                <option value =""> Choose One </option>
                 <option value="apple">Apple</option>
                 <option value="htc">HTC</option>
                 <option value="LG">LG</option>
                 <option value="Samsung">Samsung</option>
            </select>
                Feature       
            <select name ="feature">
                <option value ="">Choose One </option>
                 <option value="4G_HSPA">4G HSPA</option>
                 <option value="4G_LTE">4G LTE</option>
                 <option value="LTEadvanced">LTE advanced</option>
            </select>
            
            <br />
            <input type="submit" name="Submit" value="Apply" />
        </fieldset>
        
            
            
        </form>

    </body>
</html>