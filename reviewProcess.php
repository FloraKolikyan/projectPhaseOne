<?php
    ob_start(); 
     require('projectHeader.php'); 

    $nickName = filter_input(INPUT_POST, 'nickname');
    $gameName = filter_input(INPUT_POST, 'gamename'); 
    $rateGame = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_INT); 
    $reviewGame = filter_input(INPUT_POST, 'review'); 
    

    $finalcheck = true; 

    
    if(empty($nickName) || empty($gameName) || empty($rateGame) || empty($reviewGame)){
        echo"<p class='colorerror'>ERROR: one or more boxes are empty!</p>";
        $finalcheck = false; 
    }
    if(!($rateGame>0 && $rateGame<11)){ 
        echo"<p class='colorerror'>ERROR: numeric rate should be between 1-10!</p>";
        $finalcheck = false; 
    }
    
    if($finalcheck === true) {
        
         try {
            
            require('projectDataBase.php');
            
            $sql = "INSERT INTO reviews_list (nick_name, game_name, rate_game, review_game) VALUES (:nickname, :gamename, :rategame, :reviewgame);"; 
            
            $statement = $db->prepare($sql);
            
            $statement->bindParam(':nickname', $nickName);
            $statement->bindParam(':gamename', $gameName); 
            $statement->bindParam(':rategame', $rateGame); 
            $statement->bindParam(':reviewgame', $reviewGame); 
            
            
            $statement->execute();
            
            $statement->closeCursor(); 
            header("location:projectLibrary.php");
        }
        catch(PDOException $e) {
            echo "<p> Something went wrong! Sorry :( </p>"; 
            $error_message = $e->getMessage(); 
            echo $error_message; 
        }
       
    }
    
    require('projectFooter.php');
    ob_flush(); ?>