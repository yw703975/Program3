<?php

    // Get the data from index.php
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $userName = filter_input(INPUT_POST, 'userName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $height = filter_input(INPUT_POST, 'height');

        $userPhoto =  './images';
        $_SESSION['loginMember'] = $userName;

        $firstNameError = '';
        if ($firstName == '') { 
            $firstNameError = 'First name is required.';
        } else if (!preg_match('/^[A-Za-z]/', $firstName)) {
            $firstNameError = 'First name must start with a letter';
        } else {
            $firstNameError = '';
        }
        $lastNameError = '';
        if ($lastName == '') { 
            $lastNameError = 'Last name is required.';
        } else if (!preg_match('/^[A-Za-z]/', $lastName)) {
            $lastNameError = 'First name must start with a letter';
        } else {
            $lastNameError = '';
        }
        $userNameError = '';
        if ($userName == '') { 
            $userNameError = 'userName is required.';
        } else if (strlen($userName) < 4 || strlen($userName) > 30) {
            $userNameError = 'First name must be between 4 and 30 characters';
        } else if (!preg_match('/^[A-Za-z]/', $userName)) {
            $userNameError = 'First name must start with a letter';
        } else {
            $userNameError = '';
        }

        $emailError = '';
        if ($email == '') { 
            $emailError = 'Must be a valid email.';
        }
        //if email is not unique, check database

        $pwdCapital = "Must have a uppercase character";
        $pwdLower = "Must have a lowercase character";
        $pwdNum = "Must include a digit number";
        $pwdNonword = "Must have a special character";
        $pwdLength = "Must be at least 10 characters long";
        $counter = 0;
        $password_valid = true;

        if (preg_match('/[A-Z+]/', $password)) {
            $counter += 1;
            $pwdCapital = "";
        }
        if (preg_match('/[a-z+]/', $password)) {
            $counter += 1;
            $pwdLower = "";
        }
        if (preg_match('/[0-9+]/', $password)) {
            $counter += 1;
            $pwdNum = "";
        }
        if (preg_match('/[\W+]/', $password)) {
            $counter += 1;
            $pwdNonword = "";
        }
        if ($counter < 3) {
            $passwordError = "Must meet at least 3 of the 4 requirements";
            $password_valid = false;
        } else {
            $pwdCapital = "";
            $pwdLower = "";
            $pwdNum = "";
            $pwdNonword = "";
            $passwordError = "";
            $password_valid = true;
        }
        if (strlen($password) < 10) {
            $passwordError = $pwdLength;
            $password_valid = false;
        } else {
            $password_valid = true;
        }

        if ($password_valid) {
            $pwdHash = password_hash($password, PASSWORD_BCRYPT);
        //    var_dump($pwdHash);


        if (password_verify($password, $pwdHash)) {
                 $password= $pwdHash  ;
          } else {
               echo 'Invalid password.';
           }
         
        }
  
       if (!empty(MemberDB::check_for_unique_userName($userName))) {
            $userNameError = "User name already taken.";
        }

       if (!empty(MemberDB::check_for_unique_email($email))) {
           $emailError = "Email already being used.";
        }

        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);
            $userPhoto = "./images/" . $userName ."_". $file_name;

            $extensions = array("jpeg", "jpg", "png", "gif");
            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $image);

            }
        }

   
       

?>
