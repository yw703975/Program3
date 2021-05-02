<?php
class UserdataDB {

    public static function getAllUserdate() {
        $db = Database::getDB();

        $query = 'SELECT * FROM userdate';
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        return $users;
    }

    public static function getAllUsersByOrder() {
        $db = Database::getDB();

        $query = 'SELECT * FROM userdate
                           ORDER BY userID';
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();
        return $users;
    }

    public static function getAllUsersByUserID($userID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM userdata
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $userID);
        $statement->execute();
        $users = $statement->fetch();
        $statement->closeCursor();
        return $users;

    }

    public static function check_for_unique_userName($userName) {
        $db = Database::getDB();
        $userQuery = 'SELECT userName FROM userdata WHERE userName = :userName';
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


    public static function insertUserdata($userName, $mydate, $miles, $weight) {
    $db = Database::getDB();
    $query = 'INSERT INTO userdata
                 (userName, mydate, miles, weight)
              VALUES
                 (:userName, :mydate, :miles, :weight)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $userName);
    
    $statement->bindValue(':mydate', $mydate);
    
    $statement->bindValue(':miles', $miles);
    
    $statement->bindValue(':weight', $weight);    
    
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
    public static function delete_user($userName) {
     $db = Database::getDB();
     $query = 'DELETE FROM users
               WHERE userName = :userName';
     $statement = $db->prepare($query);
     $statement->bindValue(':userName', $userName);
     $statement->execute();
     $statement->closeCursor();
    }
}
?>
