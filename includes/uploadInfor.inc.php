<?php
    session_start();
    include 'autoloader.inc.php';
    if(isset($_SESSION['userId'])){
        if(isset($_POST['submit'])){
            $first = $_POST['firstName'];
            $last = $_POST['lastName'];
            $phone = $_POST['phoneNumber'];
            $conn = new Dbh();
            $sql = "UPDATE user_infor SET userFirst = ?, userLast = ?, userPhone = ? WHERE userId = ?";
            $stmt = $conn->connection()->prepare($sql);
            if(strcmp($first, "") == 0){
                $first = null;
            }
            if(strcmp($last, "") == 0){
                $last = null;
            }
            if(strcmp($phone, "") == 0){
                $phone = null;
            }
            $stmt->execute(array($first, $last, $phone, $_SESSION['userId']));
            header("Location: ../profile.php?uploadsuccess");
    }
}