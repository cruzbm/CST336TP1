<?php

    //Database Connection established
    include "../../Includes/dbConnection.php";
    $dbConn = getDatabaseConnection('tp336');
    
    function getBrands(){
        //Print list of all brands
        $sql = "SELECT name
                FROM shoes";
                
        $stmt = $dbConn->prepare($sql);
        $stmt = execute();
        $records = fetchAll(PDO::FETCH_ASSOC);
        
        echo "Brands Available: <br />";
        $brands = array();
        foreach ($records as $brand){
            for ($i = 0; $i < count($brands); $i++)
            {
                if($brands[$i] == $brand['name']){
                    break;
                }
                else{
                    $brands[] = $brand['name'];
                    echo $brand['name'] . "<br />";
                }
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