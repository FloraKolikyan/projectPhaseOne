<?php
require('projectHeader.php'); 
require_once('projectDataBase.php');
    $finalcheck = true; 
    $id = filter_input(INPUT_POST, 'id');
    $nickname=filter_input(INPUT_POST, 'nick_name');
    $gamename=filter_input(INPUT_POST, 'game_name');
    $rate=filter_input(INPUT_POST, 'rate_game');
    $review=filter_input(INPUT_POST, 'review_game');

    if(empty($nickname) || empty($gamename) || empty($rate) || empty($review)){
        echo"<p class='colorerror'>ERROR: one or more boxes are empty!</p>";
        $finalcheck = false; 
    }
    if(!($rate>0 && $rate<11)){ 
        echo"<p class='colorerror'>ERROR: numeric rate should be between 1-10!</p>";
        $finalcheck = false; 
    }
    
    if($finalcheck === true){
     $edit = "UPDATE reviews_list SET nick_name=:nickname, game_name=:gamename, rate_game=:rate, review_game=:review WHERE post_id=:id;";
     

     $editstate = $db->prepare($edit);
     $editstate->bindParam(':id',$id);
     $editstate->bindParam(':nickname', $nickname);
     $editstate->bindParam(':gamename', $gamename);
     $editstate->bindParam(':rate', $rate);
     $editstate->bindParam(':review', $review);

     $editstate->execute();

    header("location:projectLibrary.php"); // redirects to all records page
    exit;}
?>