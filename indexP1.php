<?php

    //Database Connection established
    include "../../Includes/dbConnection.php";
    $dbConn = getDatabaseConnection('tp336');
    
    function getBrands(){
        global $dbConn;
        
        //Print list of all brands
        $sql = "SELECT name, brand
                FROM Shoes";
                
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "Brands Available: <br />";
        $brands = array();
        foreach($records as $brand){
            $brands[] = $brand['brand'];
        }
        
        for ($i = 1; $i < count($brands); $i++){
            if ($brands[$i] != $brands[$i-1]){
                echo $brands[$i-1] . "<br />";
                echo $brands[$i] . "<br />";
            }
        }
    }
    
    
?>


<!DOCTYPE html>
<html>
    //Include css here
    
    <head>
        <title>ShoeShopper Main Page</title>
    </head>
    <body>
        <h1>ShoeShopper Online</h1>
        
        <!-- initial print of available brands -->
        <?=getBrands()?>
        
    </body>
</html>