<?php
if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if(empty($mailuid) || empty($password)){
        header("Location: ../main.php?error=emptyfields");
        exit();
    }else{
        $sql = "SELECT userId, userPwd, userUid, userGmail FROM users WHERE userUid = ? OR userGmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../main.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['userPwd']);
                if($pwdCheck == false){
                    header("Location: ../main.php?error=wrongpassword");
                    exit();
                }else{
                    if($pwdCheck == true){
                        session_start();
                        $_SESSION['userId'] = $row['userId'];
                        $_SESSION['userUid'] = $row['userUid'];
                        header("Location: ../index.php?login=success");
                        exit();
                    }else{
                        header("Location: ../main.php?error=loginfailed");
                        exit();
                    }
                }
            }else{
                header("Location: ../main.php?error=can'tfinduser");
                exit();
            }
        }
    }
}else{
    header("Location: ../main.php");
    exit();
}