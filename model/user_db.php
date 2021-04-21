<?php
class UserDB {

    public static function getAllUsers() {
        $db = Database::getDB();

        $query = 'SELECT * FROM users';
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        return $users;
    }

    public static function getAllUsersByOrder() {
        $db = Database::getDB();

        $query = 'SELECT * FROM users
                           ORDER BY userID';
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();
        return $users;
    }

    public static function getAllUsersByUserID($userID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $userID);
        $statement->execute();
        $users = $statement->fetch();
        $statement->closeCursor();
        return $users;

    }


  

    public static function insertUser($firstName, $lastName, $userName, $passWord, $email, $sex, $birthDay, $height, $userPhoto) {
    $db = Database::getDB();
    $query = 'INSERT INTO users
                 (firstName, lastName,
                  userName, password,email, sex, birthDay, height, userPhoto)
              VALUES
                 (:firstName, :lastName,
                 :userName, :password,:email, :sex, :birthDay, :height, :userPhoto)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':userName', $userName);
    $statement->bindValue(':password', $password);    
    $statement->bindValue(':email', $email);
    $statement->bindValue(':sex', $sex);    
    $statement->bindValue(':birthDay', $birthDay);    
    $statement->bindValue(':height', $height);    
    $statement->bindValue(':userPhoto', $userPhoto);    
    $statement->execute();
    $statement->closeCursor();
    }
    public static function get_password_by_userName($userName) {
        $db = Database::getDB();
        $query = 'SELECT password FROM users
                  WHERE username = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(":userName", $userName);
        $statement->execute();
        $password = $statement->fetch();
        $statement->closeCursor();
        if ($password === false) {
            return false;
        }
        return $password[0];
    }
   
}
?>
