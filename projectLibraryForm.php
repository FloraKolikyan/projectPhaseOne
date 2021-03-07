<?php
require('projectHeader.php'); 
//create empty vars for new rows
    $id=null;
    $nickname=null;
    $gamename=null;
    $rate=null;
    $review=null;

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
                    <div id="subBut" >
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </div>
                </ul>
            </div>
        </form>
        
    </main>
<?php
    require('projectFooter.php');
?>