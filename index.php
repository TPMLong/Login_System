<?php 
    require "header.php";
?>
    <main>
    <?php 
        if(isset($_SESSION['userId'])){
            require "post.php";
        }else{
            echo '<p>You are logout</p>';
        }   
    ?>
    </main>
<?php 
    require "footer.php"
?>