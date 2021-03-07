<?php 

    require('projectHeader.php'); 

    require('projectDataBase.php'); 
    $name=filter_input(INPUT_GET, 'searchbox');
    
    $sql = "SELECT * FROM reviews_list WHERE nick_name LIKE '%$name%' OR game_name LIKE '%$name%';"; 
    $statement = $db->prepare($sql); 
    $statement->execute(); 

    if(empty($name)){
        echo"<p class='colorerror'>ERROR: Box is empty!</p>";
    }

    else if($statement->rowCount()>=1){
        $result = $statement->fetchAll();
            echo "<table class='table table-dark table-sm'><thead> <tr><td style='width:200px' > Users' nicknames</td><td style='width:200px' > Game name </td>
            <td style='width:100px'> Rate (1-10)</td><td style='width:600px'>Games' review</td></tr> </thead><tbody>"; 
            foreach($result as $results){
                echo "<tr><td >" . $results['nick_name'] . "</td><td>" . $results['game_name'] . "</td><td>" . $results['rate_game'] ."</td><td>". $results['review_game'] . "</td></tr>"; }
            echo "</tbody></table>"; 
        
    }
    else{
        echo "<p class='colorerror'>ERROR:Nothing has been found...</p>";
    }
    $statement->closeCursor(); 
?>