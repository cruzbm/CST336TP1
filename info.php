<?php
session_start();

include 'dataCon.php';

$dbConn = getDataBaseConnection(Project_1);

function showInfo(){
    
    global $dbConn;
    
    echo $_SESSION['getDevice'];
    
    if ($_SESSION['getDevice'] == 1)
    {
        echo  "<img src='img/sm1.jpg'/>";
        echo $_SESSION['getDevice'];
        echo "<br />";
        echo "Lorem ipsum";
    }
    
    else if ($_SESSION['getDevice'] == 2)
    {
        echo  "<img src='img/sm2.jpg'/>";
        echo $_SESSION['getDevice'];
        echo "<br />";
        echo "Lorem ipsum";
    }
}

function add(){
    
    if(isset($_GET['add'])){
        
        echo "Item added to cart.";
        
        
    }
    
    
    
    
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Online Phone Catalog</title>
         <link rel="stylesheet" href="tp1.css" type="text/css" />
    </head>
    <body>
        <h1> Shopping Cart</h1>
            <?=showInfo()?>
        <form method = "get">
            
            <button type="submit" value="add" name = "add">Add to cart</button>
            <br />
            
            <?=add()?>
            
        </form>

    </body>
</html>