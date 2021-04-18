<?php

require('projectHeader.php'); 
//create empty vars for new rows

if(isset($_SESSION['unauthorizedAccess']))
    {
        echo "<div class='container d-flex justify-content-center' id='unauthorizedAccessMessage'>".$_SESSION['unauthorizedAccess']."</div>";
    }
if(isset($_SESSION['error']))
{
    echo "<div class='container d-flex justify-content-center' id='unauthorizedAccessMessage'>".$_SESSION['error']."</div>";
}
    $useremail=null;
    $userpassword=null;

?>


    <main>

        <form action="loginProcess.php" method="post">
            <div>
                <ul>
                    <div class="form-group">
                        <label for="useremail"></label>
                        <input type="email" name="useremail" id="useremail" placeholder="Email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <?php 
                            if(isset($_SESSION['error']) || !empty($_SESSION['error'])) {
                                echo "<div class='container'>".$_SESSION['error']."</div>";
                            }
                        ?>
                        <label for="userpassword"></label>
                        <input type="password" name="userpassword" id="userpassword" placeholder="Password" class="form-control" >
                    </div>
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    <div id="subBut" >
                        <input type="submit" value="submit" name="log_in" class="btn btn-primary">
                    </div>
                </ul>
            </div>
        </form>
        
    </main>
<?php
    include_once('configcaptcha.php');
    require('projectFooter.php');
?>