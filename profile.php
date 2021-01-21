<?php 
    declare(strict_types = 1);
    include 'includes/autoloader.inc.php';
    // include 'includes/profile.inc.php';
    require "header.php";
?>

<style>
    <?php
        include "css/profile_body.css";
    ?>
</style>
<body>
    <?php
        $conn = new Dbh();
        if(isset($_SESSION['userId'])){
            $sqlImg = "SELECT userImage FROM user_infor WHERE userId = ?" ;
            $stmt = $conn->connection()->prepare($sqlImg);
            $stmt->execute([$_SESSION['userId']]);
            $result = $stmt->fetch();
            $flag = $result['userImage'];
            if ($result > 0){
                echo "<div id='profile-container'>";
                    echo "<div class='image-container'>";
                    if($result['userImage'] == NULL){
                        echo "<img src='img/defaultprofile.png' class='profileImage'>";
                    }else{
                        $img = $result['userImage'];
                        echo "<img src='img/$img' class='profileImage'>";
                    }
               
            }else{
                header("Location: main.php");
                exit();
            }
            echo "<div class='image-button'>";
            echo '<form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">';
                    
                    if($flag != null){
                        echo   "<input type='hidden' name ='imageName' value='$flag'>";
                    }    
                        // echo   '<br/><button type="submit" name="submit">UPLOAD</button>
                        echo "<br/>";
                        echo "<br/>";
                        echo   '<button type="submit" name="submit">UPLOAD</button>
                 </form>';
                
            if($flag != null){
            echo "<form action='delete.php' method='post'>
                    <input type='hidden' name ='imageName' value='$flag'>
                    <button type='submit' name='submit'>DELETE AVATAR</button>
                  </form>";
            }
            echo "</div>";
            echo "</div>";
            $userInfor = new UserDAO();
            $datas = $userInfor->getUserProfile(2);
            foreach($datas as $data){
                // echo "<div class='infor-container'>";
                echo '<div class="infor-container"><form action="includes/uploadInfor.inc.php" method="POST">
                        First name<br/>
                        <td><input  type="text" name="firstName" value="' . $data["userFirst"] . '" ></td><br/>
                        Last name<br/>
                        <td><input  type="text" name="lastName" value="' . $data["userLast"] . '" ></td><br/>
                        Phone number<br/>
                        <td><input  type="text" name="phoneNumber" value="' . $data["userPhone"] . '" ></td><br/>';
                        echo "<br/>";
                        echo '<button type="submit" name="submit">UPDATE PROFILE</button>
                     </form></div>';  
                echo "</div>";
                // echo "</div>";  
            }
        }else{
            echo "hmm";
        }
    ?>
</body>
<?php 
    require "footer.php";
?>