<?php
try {
    $dsn = 'mysql:host=localhost;dbname=project_php'; 
    $username = 'root'; 
    $password = ''; 
    
    $db = new PDO($dsn, $username, $password); 
    
}
catch(PDOException $e){
    echo "<p> Something went wrong :( </p>"; 
    $error_message = $e->getMessage(); 
    echo $error_message; 
}
?>