<?php
    class UserDAO extends Dbh{
        public function getUserProfile(int $userId){
            $sql = "SELECT userFirst, userLast, userPhone, userImage FROM user_infor WHERE userId = ?";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$userId]);
            $result = $stmt->fetchAll();
            if ($result > 0){
                return $result;
            }
        }
    }