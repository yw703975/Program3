<?php

    // Get the data from index.php
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $userName = filter_input(INPUT_POST, 'userName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $passWord = filter_input(INPUT_POST, 'passWord');
        $sex = filter_input(INPUT_POST, 'sex');
        $birthDay = filter_input(INPUT_POST, 'birthDay');
        $height = filter_input(INPUT_POST, 'height');
        $userPhoto =  '.image/1.png';
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
  
        $sexError="";
     //   var_dump($sex);
        if ($sex == '') { 
            $sexError = 'Sex is required.';
        }  else {
            $sexError = '';
        }
        
        $birthDayError="";
        if ($birthDay == '') { 
            $birthDayError = 'Birth Day is required.';
//        } else if (!preg_match('/^[A-Za-z]/', $birthDay)) {
//            $birthDayError = 'First name must start with a letter';
        } else {
            $birthDayError = '';
        }
 
        $heightError="";
        if ($height == '') { 
            $heightError = 'Heighte is required.';
//        } else if (!preg_match('/^[A-Za-z]/', $height)) {
//            $heightError = 'First name must start with a letter';
        } else {
            $heightError = '';
        }
        
        $pwdCapital = "Must have a uppercase character";
        $pwdLower = "Must have a lowercase character";
        $pwdNum = "Must include a digit number";
        $pwdNonword = "Must have a special character";
        $pwdLength = "Must be at least 10 characters long";
        $counter = 0;
        $password_valid = true;

        if (preg_match('/[A-Z+]/', $passWord)) {
            $counter += 1;
            $pwdCapital = "";
        }
        if (preg_match('/[a-z+]/', $passWord)) {
            $counter += 1;
            $pwdLower = "";
        }
        if (preg_match('/[0-9+]/', $passWord)) {
            $counter += 1;
            $pwdNum = "";
        }
        if (preg_match('/[\W+]/', $passWord)) {
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
            $passWordError = "";
            $password_valid = true;
        }
        if (strlen($passWord) < 10) {
            $passWordError = $pwdLength;
            $password_valid = false;
        } else {
            $password_valid = true;
        }

        if ($password_valid) {
            $pwdHash = password_hash($passWord, PASSWORD_BCRYPT);
        //    var_dump($pwdHash);


        if (password_verify($passWord, $pwdHash)) {
                 $passWord= $pwdHash  ;
          } else {
               echo 'Invalid password.';
           }
         
        }
  
       if (!empty(UserDB::check_for_unique_userName($userName))) {
            $userNameError = "User name already taken.";
        }

       if (!empty(UserDB::check_for_unique_email($email))) {
           $emailError = "Email already being used.";
        }

    if(isset($_FILES['userPhoto'])){
      $errors= array();
      $file_name = $_FILES['userPhoto']['name'];
      $file_size =$_FILES['userPhoto']['size'];
      $file_tmp =$_FILES['userPhoto']['tmp_name'];
      $file_type=$_FILES['userPhoto']['type'];
      $temp = $_FILES['userPhoto']['name'];
      $temp = explode('.', $temp);
      $temp = end($temp);
      $file_ext = strtolower($temp);
      $userPhoto = "./images/" ."_".$userName ."_". $file_name;
     
      $extensions= array("jpeg","jpg","png", "gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="file extension not in whitelist: " . join(',',$extensions);
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$userPhoto);
         echo htmlspecialchars("Success");
      }else{

      }
   }

   
       

?>
