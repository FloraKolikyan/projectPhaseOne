<?php
    ob_start(); 
     require('projectHeader.php'); 
    
    $nickname = filter_input(INPUT_POST, 'nickname'); 
    $fname = filter_input(INPUT_POST, 'fname'); 
    $lname = filter_input(INPUT_POST, 'lname'); 
    $useremail = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL); 
    $userpassword = filter_input(INPUT_POST, 'userpassword'); 

    //create final validator
    $finalcheck = true; 

    if(empty($nickname) || empty($fname) || empty($lname) || empty($useremail) || empty($userpassword)){
        echo"<p class='colorerror'>ERROR: one or more boxes are empty!</p>";
        $finalcheck = false; 
    }
    if(!(preg_match('~^[\p{L}\p{Z}]+$~u', $fname)) || !(preg_match('~^[\p{L}\p{Z}]+$~u', $lname))) {
        echo"<p class='colorerror'>ERROR: First or last name cannot contains numbers!</p>";
        $finalcheck = false; 
    }
    if($finalcheck === true) {
        $encrypass = password_hash($userpassword, PASSWORD_DEFAULT);
        require('projectDataBase.php');
            
        $sql = "INSERT INTO users_information (nickname, first_name, last_name, email, password) VALUES (:nickname, :fname, :lname, :useremail, :userpassword);"; 
        
        $statement = $db->prepare($sql);
        
        $statement->bindParam(':nickname', $nickname, PDO::PARAM_STR);
        $statement->bindParam(':fname', $fname, PDO::PARAM_STR); 
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR); 
        $statement->bindParam(':useremail', $useremail, PDO::PARAM_STR); 
        $statement->bindParam(':userpassword', $encrypass); 
        
        $statement->execute();
        
        $info= $statement->fetch(PDO::FETCH_ASSOC);

        $statement->closeCursor(); 
        
        header("Location: login.php");
              
    }
    
    require('projectFooter.php');
    ob_flush(); ?>