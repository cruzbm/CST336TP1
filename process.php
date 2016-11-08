<?php

include 'dataCon.php';

$conn = getDataBaseConnection("Project_1");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * 
        FROM user WHERE username = :username
        AND password = :password";
          
$namedParameters = array();          
$namedParameters[':username'] = $username;  
$namedParameters[':password'] = $password;  

$statement = $conn->prepare($sql);
$statement->execute($namedParameters);
$record = $statement->fetch(PDO::FETCH_ASSOC);
print_r($record);

    if (empty($record)) {  //it didn't find any record
        
        echo "Wrong username or password!";
        echo "<a href='login.php'> Try again </a>";
        
    } else {
        
       $_SESSION['username'] = $record['username'];
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header('Location: main.php');  //redirects to another program        
        
    }
          



?>