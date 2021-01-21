<?php
    if(isset($_POST['signup-submit'])){

        require 'dbh.inc.php';
        
        $username = $_POST['uid'];
        $userMail = $_POST['mail'];
        $password = $_POST['pwd'];
        $confirmPassword = $_POST['confirm-pwd'];

        if(empty($username) || empty($userMail) || empty($password) || empty($confirmPassword) ){
            header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$userMail);
            exit();
        }else if(!filter_var($userMail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=invalidmailuid");
            exit();
        }else if(!filter_var($userMail, FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=invalidemail&uid=".$username);
            exit();
        }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=invaliduid&mail=".$userMail);
            exit();
        }else if($password !== $confirmPassword ){
            header("Location: ../signup.php?error=wrongconfirmpassword&uid=".$username."&mail=".$userMail);
            exit();
        }else {
            $sql = "SELECT userUid FROM users WHERE userUid = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result =  mysqli_stmt_num_rows($stmt);
                if($result > 0){
                    header("Location: ../signup.php?error=userhadtaken&mail=".$userMail);
                    exit();
                }else{
                    $sql = "INSERT INTO users(userUid, userGmail, userPwd) values (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }else{
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $username, $userMail, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        $sql = "SELECT userId FROM users WHERE userUid = ? OR userGmail = ? AND userPwd = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location: ../signup.php?error=sqlerror");
                            exit();
                        }else{
                            mysqli_stmt_bind_param($stmt, "sss", $username, $userMail, $hashedPwd);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if($row = mysqli_fetch_assoc($result)){
                                $userId = $row['userId'];
                                $sql = "INSERT INTO user_infor(userId) values (?)";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    header("Location: ../signup.php?error=sqlerror");
                                    exit();
                                }else{                                           
                                    mysqli_stmt_bind_param($stmt, "s", $userId);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../signup.php?signup=success");
                                    exit();
                                }
                            }else{
                                header("Location: ../signup.php?error=sqlerror");
                                exit();
                            }
                        }
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($stms);
    }else{
        header("Location: ../signup.php");
        exit();
    }
