<?php
    include 'includes/autoloader.inc.php';;
    session_start();
    if(isset($_POST['submit'])){
        
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'jpeg', 'pdf');
    if(strcmp($fileTmpName, "") != 0){
        if(in_array($fileActualExt, $allowed)){
        if($fileError === 0 ){
            if($fileSize < 1000000){
                $fileNewName = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'img/'.$fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sqlImg = "UPDATE user_infor SET userImage = ? WHERE userId = ?" ;
                $conn = new Dbh();
                $stmt = $conn->connection()->prepare($sqlImg);
                $val1 = $fileNewName;
                $val2 = $_SESSION['userId'];
                // $stmt->bindParam("?" ,$val1 , $val2);
                $stmt->execute(array($val1, $val2));
                $image = $_POST['imageName'];
                if($image != NULL){
                    unlink("img/$image");
                }
                header("Location: profile.php?uploadsuccess");
                exit();
            }else{
                echo "The image size is too big";
            }
        }else{
            echo "There was an error for upload your file!";
        }
    }else{
        echo "You cannot upload files because it don't have one of those extension: jpg, png, jpeg, pdf";
    }
}else{
    echo "You have not choose an image";
}
}