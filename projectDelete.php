<?php
ob_start();
    $id = filter_input(INPUT_GET, 'id'); 
    //connect to db 
    require('projectDataBase.php');
    //set up query 
    $sql = "DELETE FROM reviews_list WHERE post_id = :post_id;"; 
    //prepare 
    $statement = $db->prepare($sql); 
    //bind
    $statement->bindParam(':post_id', $id); 
    //execute
    $statement->execute(); 
    //close DB connection 
    $statement->closeCursor();
    header('location:projectLibrary.php'); 

ob_flush();
?>