<?php


        $userName = filter_input(INPUT_POST, 'userName');
        $mydate = filter_input(INPUT_POST, 'mydate');
        $miles = filter_input(INPUT_POST, 'miles');
        $weight = filter_input(INPUT_POST, 'weight');

        $_SESSION['loginMember'] = $userName;


        
       $mydateError = '';
        if ($mydate == '') { 
       //     $mydateError = 'Must be a valid date.';
        }

        
        
        $milesError = '';
        if ($miles == '') { 
            $mydateError = 'Must be a valid mile.';
        }
  
         
        $weightError = '';
        if ($weight == '') { 
            $weightError = 'Must be a valid weight.';
        }
  

?>
