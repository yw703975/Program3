<?php

$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();


require_once './model/database.php';
require_once './model/user.php';
require_once './model/user_db.php';
require_once './model/userdata.php';
require_once './model/userdata_db.php';

if (empty($_SESSION['loginUser'])) {
    $_SESSION['loginUser'] = 'defaultUser';
}


$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === null) {
        $action = 'welcome_user';
    }
}

switch ($action) {
    case 'welcome_user':
        
        include('./view/welcome_user.php');

         break;
      
        
    case 'login_user':

        $userName = filter_input(INPUT_POST, 'userName');
        $passWord = filter_input(INPUT_POST, 'passWord');
        $pwdHash = UserDB::get_password_by_userName($userName);

        if($_SESSION['loginUser'] ==  'defaultUser'){
                var_dump(1);
            $userName = $_SESSION['loginUser'];
            $user = UserDB::getAllUsersByUserID($userName);
         include('./user_manager/user_login.php');
         break;
        } else{
        if (password_verify($passWord, $pwdHash))
        {   $passwordError = "";
            $_SESSION['loginUser'] = $userName;

            $user = UserDB::getAllUsersByUserID($userName);
            include("./view/showUser.php");
         
  
        }else 
        {

            include('./user_manager/user_login.php');
        } 
        }
    break;  
       
   

    case 'register_user':
       
        include('./user_manager/user_register.php');

         break;    
      
    case 'add_user':
        
               include("./user_manager/validation.php");

        if ($firstNameError !== '' || $lastNameError !== '' || $userNameError !== '' || $emailError !== '' || $passWordError !== '') {
            include("./user_manager/user_add.php");
            die();
        } else {
          //  $userPhoto ='./userPhotos/1.png';

       //     $user = new User($firstName, $lastName, $userName, $passWord, $email, $sex, $birthDay, $height, $userPhoto);
           $user=UserDB::insertUser($firstName, $lastName, $userName, $passWord, $email, $sex, $birthDay, $height, $userPhoto);
            include("./view/showUser.php");
            die();
        }        
        

        break;
       

      

    case 'list_user':
        $userName = filter_input(INPUT_POST, 'userName');
      //      $user=UserDB::insertUser($firstName, $lastName, $userName, $passWord, $email, $sex, $birthDay, $height, $userPhoto);
           $users= UserDB::getAllUsers(); 
          

       
        if ($_SESSION['loginMember'] !== 'defaultUser') {
    
             include('./user_manager/user_list.php');
        } else {
          include('./view/welcome_user.php');
        }     

        break;
        
     case 'add_userdata':
         $mydateError = '';
              $milesError = '';
             $weightError = '';
         
        
               include("./user_manager/userdata_validation.php");
           $userName = $_SESSION['loginUser'];
                var_dump($userName);              
               var_dump($mydate);
               var_dump($miles);
               var_dump($weight);
        if ($mydateError !== '' || $milesError !== '' || $weightError !== '') {
            include("./user_manager/userdata_add.php");
            die();
        } else {


           
           UserdataDB::insertUserdata($userName, $mydate, $miles, $weight);
            include("./view/showUser.php");
            die();
        }        
        

        break;
       
        
        
        
        case 'delete_user':
        $userName = filter_input(INPUT_POST, 'userName');
        UserDB::delete_user($userName);
         $users= UserDB::getAllUsers(); 
             include('./user_manager/user_list.php');
   

        break;

}   

?>
