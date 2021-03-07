<?php
ob_start();
    require('projectHeader.php'); 
    require_once('projectDataBase.php');
    $id = filter_input(INPUT_GET, 'id');
    
    $sql = "SELECT * FROM reviews_list WHERE post_id = :id;"; 
    

    //prepare 
    $statement = $db->prepare($sql); 
    // :id - parameter where will be new input; $id - value;
    $statement->bindParam(':id',$id);
    $statement->execute();
    //use fetch to store results which should be edited

    $records = $statement->fetch(PDO::FETCH_ASSOC);
    
    ob_flush();
?>
<main>
        <form action="projectFilter.php" method="post">
            <div>
                <ul>
                    <div class="form-group">
                        <label for="id"></label>
                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                    </div>
                                     
                    <div class="form-group">
                        <label for="nick_name"></label>
                        <!--value="php echo $records['']; needs to show previous records and edit them -->
                        <input type="text" id="nick_name" name="nick_name" placeholder="Nickname" class="form-control" value="<?php echo $records['nick_name']; ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="game_name"></label>
                        <input type="text" id="game_name" name="game_name" placeholder="Game's name" class="form-control" value="<?php echo $records['game_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rate_game"></label>
                        <input type="number" id="rate_game" name="rate_game" placeholder="Rate (1-10)" class="form-control" value="<?php echo $records['rate_game']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="review_game"></label>
                        <textarea id="review_game" name="review_game" placeholder="Review" class="form-control  input-lg" rows="10" cols="30" value="<?php echo $records['review_game']; ?>"></textarea>
                    </div>
                    <div id="subBut">
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </div>
                </ul>
            </div>
        </form>
        
    </main>
    <?php
    require('projectFooter.php');
?>