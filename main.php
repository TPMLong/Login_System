<?php 
    require "header.php";
?>
<style>
    <?php
        include "css/main.css";
    ?>
</style>
    <main>
        <div class="container">
        <form action="includes/login.inc.php" method = "POST">
        <ul class = "login-form">
            <li>LOGIN</li>
            <li><input type="text" name="mailuid" placeholder="Username/Email..."><br/></li>
            <li><input type="password" name="pwd" placeholder="Password..."><br/></li>
            <li><button type="submit" name="login-submit">Login</button><br/></li>
        </ul>     
        </form>
        </div>
    </main>
<?php 
    require "footer.php"
?>

