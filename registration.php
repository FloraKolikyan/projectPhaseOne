<?php
require('projectHeader.php'); 
//create empty vars for new rows
    $id=null;
    $nickname=null;
    $fname=null;
    $lname=null;
    $useremail=null;
    $userpassword=null;

?>


    <main>
        <form action="registrationProcess.php" method="post">
            <div>
                <ul>
                    <div class="form-group">
                        <label for="post_id"></label>
                        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                    </div>
                                     
                    <div class="form-group">
                        <label for="nickname"></label>
                        <input type="text" name="nickname" id="nickname" placeholder="Nickname" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="fname"></label>
                        <input type="text" name="fname" id="fname" placeholder="First name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lname"></label>
                        <input type="text" name="lname" id="lname" placeholder="Last name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="useremail"></label>
                        <input type="email" name="useremail" id="useremail" placeholder="Email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="userpassword"></label>
                        <input type="password" name="userpassword" id="userpassword" placeholder="Password" class="form-control" >
                    </div>
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    <div id="subBut" >
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </div>
                </ul>
            </div>
        </form>
        
    </main>
<?php
    include_once('configcaptcha.php');
    require('projectFooter.php');
?>