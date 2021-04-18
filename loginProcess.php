<?php

session_start();
require('projectDataBase.php'); 

$useremail=filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
$userpassword=filter_input(INPUT_POST, 'userpassword');
$db = new PDO($dsn, $username, $password);
// LOGIN USER
if (isset($_POST['log_in'])) {
  
  	
  	$query = "SELECT * FROM users_information WHERE email=:useremail;";
  	
	$statement = $db->prepare($query);
        
	$statement->bindParam(':useremail', $useremail);
        
    $statement->execute();
	$log=$statement->fetch(PDO::FETCH_ASSOC);
	echo $userpassword;

	if(password_verify($userpassword, $log['password'])){
			$_SESSION['user'] = $log;
		
			header('location: projectLibrary.php');
	}
	else{
		$_SESSION['error'] = 'incorrect username or password!';
		header('location: login.php');
	} 
	
}

?>