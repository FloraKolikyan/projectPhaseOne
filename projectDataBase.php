<?php
try {
    $dsn = 'mysql:host=172.31.22.43;dbname=Flora200455023'; 
    $username = 'Flora200455023'; 
    $password = 'YRhrWg8MDL'; 
    
    $db = new PDO($dsn, $username, $password); 
    
}
catch(PDOException $e){
    echo "<p> ERROR: No connection! </p>"; 
    $error_message = $e->getMessage(); 
    echo $error_message; 
}
?>