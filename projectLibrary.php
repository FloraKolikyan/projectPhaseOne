<?php
    require('projectHeader.php'); 

    
    require('projectDataBase.php'); 

    
    $sql = "SELECT * FROM reviews_list;"; 

    $statement = $db->prepare($sql); 

    $statement->execute(); 

    $records = $statement->fetchAll();
    ?>
    <main>
    <div class="container">
    <form  action="projectSearch.php">
        <div class="form-group w-50">
            <div class="form-inline">
                <input type="search" id="searchbox" name="searchbox" placeholder="Search" class="form-control">
                <input type="submit" value="submit" name="submit" class="btn btn-dark">
            </div>
        </div>
    </form>
    </div>
</main>
<?php
    //creating the top of the table 
    echo "<table class='table table-dark table-sm'><thead> <tr><td style='width:200px' > Users' nicknames</td><td style='width:200px' > Game name </td><td style='width:100px'> Rate (1-10)</td><td style='width:600px'>Games' review</td></tr> </thead><tbody>"; 
    if(isset($_SESSION['user'])){
    foreach($records as $record) {
        echo "<tr><td >" . $record['nick_name'] . "</td><td>" . $record['game_name'] . "</td><td>" . $record['rate_game'] 
        ."</td><td>". $record['review_game'] . "</td>'<td><a id='delBut' href='projectDelete.php?id=". $record['post_id'] .
         "'> Delete</a></td>'<td><a id='editBut' href='projectEdit.php?id=". $record['post_id'] . "'> Edit</a></td>'</tr>"; 
         }
    }
    else{
        foreach($records as $record){
        echo "<tr><td >" . $record['nick_name'] . "</td><td>" . $record['game_name'] . "</td><td>" . $record['rate_game'] 
        ."</td><td>". $record['review_game'] . "</td>'</tr>";
        }
    }
    echo "</tbody></table>"; 

    $statement->closeCursor(); 

    require('projectFooter.php');
?>
