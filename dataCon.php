<?php

function getDataBaseConnection($dbname){
    
    $host = "localhost";
    $dbname = "Project_1";
    $username = "root";
    $password = "s3cr3t";

    //Creates a database connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Setting Errorhandling to Exception
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    return $dbConn;
}


?>