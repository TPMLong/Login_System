<?php
    include 'includes/autoloader.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/post.css">
    <title></title>
</head>
<body>
<?php
    $conn = new Dbh();
    if(isset($_SESSION['userId'])){
        $sqlImg = "SELECT postId, postImage, title, postDescription, userId, postStatusId, dateCreate FROM article WHERE postStatusId = 1" ;
        $stmt = $conn->connection()->prepare($sqlImg);
        $stmt->execute();
        // $result = $stmt->fetchAll();
        echo "<div class='row'> 
                <div class='leftcolumn'>";
        while ($result = $stmt->fetch()){
                if($result['postImage'] == NULL){
                    //echo "<img src='img/defaultprofile.png' class='profileImage'>";                   
                                echo "<div class='card'>
                                    <h2>";echo $result['title'];echo "</h2>
                                    <h5>";echo $result['dateCreate'];echo "</h5>
                                    <p>";echo $result['postDescription'];echo "</p>
                                </div>";
                }else{
                    $img = $result['postImage'];
                                echo "<div class='card'>
                                    <h2>";echo $result['title'];echo "</h2>
                                    <h5>";echo $result['dateCreate'];echo "</h5>";
                                        echo "<img class='fakeimg' src='post_img/$img'>";
                                    $des = $result['postDescription'];
                                    echo "<p>$des</p>
                                </div>
                            </div>
                         </div>";
                }
        }//else{
            // header("Location: main.php");
            // exit();
       //}
    }
    ?>
</body>
</html>