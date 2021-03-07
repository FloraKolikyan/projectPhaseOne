<?php
ob_start();
    $id = filter_input(INPUT_GET, 'id'); 
    require('projectDataBase.php');
    $sql = "DELETE FROM reviews_list WHERE post_id = :post_id;"; 
    $statement = $db->prepare($sql); 
    $statement->bindParam(':post_id', $id); 
    $statement->execute(); 
    $statement->closeCursor();
    header('location:projectLibrary.php'); 

ob_flush();
?>