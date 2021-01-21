<?php
    session_start();
    include 'includes/autoloader.inc.php';
    $conn = new Dbh();
    $image = $_POST['imageName'];
        if(isset($_SESSION['userId'])){
            $filePath = "img/$image";
            if(!unlink($filePath)){
                echo "File was not deleted!";
            }else{
                $sqlImg = "UPDATE user_infor SET userImage = NULL WHERE userId = ?" ;
                $conn = new Dbh();
                $stmt = $conn->connection()->prepare($sqlImg);
                //$val2 = $_SESSION['userId'];
                // $stmt->bindParam("?" ,$val1 , $val2);
                $stmt->execute(array($_SESSION['userId']));
                header("Location: profile.php?deletesuccess");
                exit();
                echo "File delete success";
            }
            
        }