<?php 

    require "header.php";

    if(isset($_SESSION['userId'])){
?>
<style>
    <?php
        include "css/main.css";
    ?>
</style>
    <div class="post-main">
        <main>
            <div class="container">
                <form action="includes/article.inc.php" method = "POST" enctype="multipart/form-data">
                    <ul class = "post-form">
                        <li>POST ARTICLE</li>                           
                        <li><label>Title:</label><input type="text" name="postTitle" placeholder="Title"><br/></li>
                        <li><label>Desciption:</label>  <textarea name="postDesc" id="" cols="33" rows="10"></textarea><br/></li>
                        <li><label>Image:</label>  <input type="file" name="file"><br/></li>
                        <li><button type="submit" name="post-submit">Post</button></li>
                    </ul>
                </form>      
            </div>  
        </main>
    </div>
<?php 
    }else{
        header("Location: index.php");
        exit();
    }
    require "footer.php"
?>