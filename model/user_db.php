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

    public static function getAllUsersByUserID($userName) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
                  WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(":userName", $userName);
        $statement->execute();
        $users = $statement->fetch();
        $statement->closeCursor();
        return $users;

    }

    public static function check_for_unique_userName($userName) {
        $db = Database::getDB();
        $userQuery = 'SELECT userName FROM users WHERE userName = :userName';
        $userStatement = $db->prepare($userQuery);
        $userStatement->bindValue(':userName', $userName);
        $userStatement->execute();
        $uniqueUser = $userStatement->fetch();
        $userStatement->closeCursor();
        return $uniqueUser;
    }
    
    public static function check_for_unique_email($email) {
        $db = Database::getDB();
        $emailQuery = 'SELECT email FROM users WHERE email = :email';
        $emailStatement = $db->prepare($emailQuery);
        $emailStatement->bindValue(':email', $email);
        $emailStatement->execute();
        $uniqueEmail = $emailStatement->fetch();
        $emailStatement->closeCursor();
        return $uniqueEmail;
    }


    public static function insertUser($firstName, $lastName, $userName, $passWord, $email, $sex, $birthDay, $height, $userPhoto) {
    $db = Database::getDB();
    $query = 'INSERT INTO users
                 (firstName, lastName,
                  userName, passWord,email, sex, birthDay, height, userPhoto)
              VALUES
                 (:firstName, :lastName,
                 :userName, :passWord,:email, :sex, :birthDay, :height, :userPhoto)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':userName', $userName);
    $statement->bindValue(':passWord', $passWord);    
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
