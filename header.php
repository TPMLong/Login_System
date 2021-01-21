<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title></title>
</head>
<body>
    <header>
        <nav class="header">
        <a href="index.php" class="header-logo">LoginSystem
            <!-- <img src="img/logo.png" alt="logo"> -->
        </a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="article.php">Post article</a></li>
            <li><a href="">About me</a></li>
            <li><a href="">Contact</a></li>
            
            
            <!-- <div class = "header">
            <form action="includes/login.inc.php" method = "post">
                <input type="text" name="mailuid" placeholder="Username/Email...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="login-submit">Login</button>
            </form>
            <li><a href="signup.php">SignUp</a></li>
            <form action="includes/logout.inc.php" method = "post">                
                <button type="submit" name="logout-submit">Logout</button>
            </form>
        </div> -->
        </ul>
        <ul class="header-login">
            <?php 
                if(isset($_SESSION['userId'])){
                    echo '<li><a href="profile.php">Profile</a></li>';
                    echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                }else{
                    echo '<li><a href="main.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>';
                }   
            ?>
        </ul>
        </nav>
    </header>
</body>
</html>