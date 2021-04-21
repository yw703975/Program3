<?php
  if (!isset($firstName)) {
            $firstName = '';
        }
        if (!isset($lastName)) {
            $lastName = '';
        }
        if (!isset($userName)) {
            $userName = '';
        }
        if (!isset($email)) {
            $email = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        if (!isset($sex)) {
            $sex = '';
        }
        if (!isset($birthDay)) {
            $birthDay = '';
        }
        if (!isset($height)) {
            $height = '';
        }

        
        if (!isset($firstNameError)) {
            $firstNameError = '';
        }
        if (!isset($lastNameError)) {
            $lastNameError = '';
        }
        if (!isset($userNameError)) {
            $userNameError = '';
        }
        if (!isset($emailError)) {
            $emailError = '';
        }
        if (!isset($passwordError)) {
            $passwordError = '';
        }
        if (!isset($pwdCapital)) {
            $pwdCapital = '';
        }
        if (!isset($pwdLower)) {
            $pwdLower = '';
        }
        if (!isset($pwdNum)) {
            $pwdNum = '';
        }
        if (!isset($pwdNonword)) {
            $pwdNonword = '';
        }
        if (!isset($sexError)) {
            $sexError = '';
        }  
        if (!isset($birthDayError)) {
            $birthDayError = '';
        } 
        if (!isset($heightError)) {
            $heightError = '';
        } 
        
        include 'user_manager/user_add.php';
  ?>