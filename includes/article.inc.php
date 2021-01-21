<?php
    include 'autoloader.inc.php';;
    session_start();
    if(isset($_SESSION['userId'])){
    if(isset($_POST['post-submit'])){
        
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $title = $_POST['postTitle'];
        $description = $_POST['postDesc'];
        date_default_timezone_set('asia/ho_chi_minh');
        $date = date('d-m-y h:i:s');
        $conn = new Dbh();
        $sql = "Insert into article(postImage, title, postDescription, userId, postStatusId, dateCreate) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->connection()->prepare($sql);

    if(strcmp($fileTmpName, "") != 0){    
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'png', 'jpeg', 'pdf');
        if(strcmp($fileTmpName, "") != 0){
            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0 ){
                    if($fileSize < 1000000){
                        $fileNewName = uniqid('', true).".".$fileActualExt;
                        $fileDestination = '../post_img/'.$fileNewName;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $stmt->execute(array($fileNewName, $title, $description, $_SESSION['userId'], 1, $date));
                        
                // $sqlImg = "UPDATE user_infor SET userImage = ? WHERE userId = ?" ;
                // $conn = new Dbh();
                // $stmt = $conn->connection()->prepare($sqlImg);
                // $val1 = $fileNewName;
                // $val2 = $_SESSION['userId'];
                // $stmt->bindParam("?" ,$val1 , $val2);
                // $stmt->execute(array($val1, $val2));
                header("Location: ../index.php?postsuccess");
                exit();
            }else{
                echo "The image size is too big";
            }
        }else{
                echo "There was an error for upload your image!";
            }
            }else{
                echo "You cannot upload image because it don't have one of those extension: jpg, png, jpeg, pdf";
            }
        }else{
            echo "You have not choose an image";
        }
    }else{
        $stmt->execute(array(NULL, $title, $description, $_SESSION['userId'], 1, $date));
        header("Location: ../index.php?postsuccess");
        
        exit();
    }
}
}else{
    header("Location: ../index.php?you have not login");     
    exit();
}
      