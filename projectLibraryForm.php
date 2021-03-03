<?php
require('projectHeader.php'); 
    $id=null;
    $nickname=null;
    $gamename=null;
    $rate=null;
    $review=null;

    if(!empty($_GET['id']) && (is_numeric($_GET['id']))) {
        
        $id = filter_input(INPUT_GET, 'id');
        
        require('projectDataBase.php'); 
        
        $sql = "SELECT * FROM reviews_list WHERE post_id = :post_id;"; 
        
        $statement = $db->prepare($sql); 
        
        $statement->bindParam(':post_id', $id); 
        
        $statement->execute(); 
        
        $records = $statement->fetchAll(); 
        foreach($records as $record) :
            $nickname = $record['nname']; 
            $gamename = $record['gname']; 
            $rate = $record['rate']; 
            $review = $record['review']; 
            
         endforeach; 
         $statement->closeCursor(); 
        }


?>


    <main>
        <form action="reviewProcess.php" method="post">
            <div>
                <ul>
                    <div class="form-group">
                        <label for="post_id"></label>
                        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                    </div>
                                     
                    <div class="form-group">
                        <label for="nickname"></label>
                        <input type="text" name="nickname" placeholder="Nickname" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="gamename"></label>
                        <input type="text" name="gamename" placeholder="Game's name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rate"></label>
                        <input type="number" name="rate" placeholder="Rate (1-10)" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Review"></label>
                        <textarea name="review" placeholder="Review" class="form-control  input-lg" rows="10" cols="30" ></textarea>
                    </div>
                    <div>
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </div>
                </ul>
            </div>
        </form>
        
    </main>
<?php
    require('projectFooter.php');
?>