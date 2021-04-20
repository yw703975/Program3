<?php

$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();


require_once './model/database.php';
require_once './model/user.php';
require_once './model/user_db.php';

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
      
      
      
    case 'add_members':
       


        break;
       
        

}      
?>
