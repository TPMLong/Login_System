    <?php 
    require "header.php";
    ?>
    <main>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "emptyfields"){
                echo '<p>Please fill in all the field</p>';
            }else{
                if($_GET['error'] == "invalidmailuid"){
                    echo '<p>Invalid input</p>';
                }else{
                    if($_GET['error'] == "invalidemail"){
                        echo '<p>Invalid email</p>';
                    }else{
                        if($_GET['error'] == "invaliduid"){
                            echo '<p>Invalid username</p>';
                        }else{
                            if($_GET['error'] == "wrongconfirmpassword"){
                                echo '<p>Invalid confirm password</p>';
                            }else{
                                if($_GET['error'] == "sqlerror"){
                                    echo '<p> cannot connect</p>';
                                }else{
                                    if($_GET['error'] == "userhadtaken"){
                                        echo '<p>username had already exist</p>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }else{
            if(isset($_GET['signup'])){             
                if(($_GET['signup'] == "success")){
                    echo '<p>signup successfull</p>';
                }
            }
        }
    ?>
        <form action="includes/signup.inc.php" method = "post">
            <input type="text" name="uid" placeholder="Username...">
            <input type="text" name="mail" placeholder="Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="confirm-pwd" placeholder="Confirm Password...">
            <button type="submit" name="signup-submit">Login</button>
        </form>
    </main>
<?php 
    require "footer.php"
?>