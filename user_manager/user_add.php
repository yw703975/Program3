<?php include 'view/header.php'; 
  if (strlen($passWord) >50) {
    $passWord=''  ;
  }
  ?>

<!DOCTYPE html>

<html>

<!-- the head section -->
<head>

  
     <link rel="stylesheet" type="text/css" href="./main.css">
 </head>
 
    <main>
        
    <h1>Welcome to user profile Registration </h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_user">

    <fieldset> 
    <legend>User Registration</legend>
        <label>First name: </label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">
        <span> <?php echo htmlspecialchars($firstNameError) ?></span> 
        <br>

        <label>Last name: </label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">
        <span> <?php echo htmlspecialchars($lastNameError) ?></span> 
        <br>
        
        <label>Email: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span> <?php echo htmlspecialchars($emailError) ?></span> 
        <br>
        
        <label>User Name:  </label>
        <input type="text" name="userName" value="<?php echo htmlspecialchars($userName); ?>">
        <span> <?php echo htmlspecialchars($userNameError) ?></span> 
        <br>
        

        
                
        <label>Sex:  </label>
        <input type="text" name="sex" value="<?php echo htmlspecialchars($sex); ?>">
        <span> <?php echo htmlspecialchars($sexError) ?></span> 
        <br>
        
        
        <label>BirthDay:  </label>
        <input type="text" name="birthDay" value="<?php echo htmlspecialchars($birthDay); ?>">
        <span> <?php echo htmlspecialchars($birthDayError) ?></span> 
        <br>
        

             
        <label>Height:  </label>
        <input type="text" name="height" value="<?php echo htmlspecialchars($height); ?>">
        <span> <?php echo htmlspecialchars($heightError) ?></span> 
        <br>
        
  
        
        <label>PassWord: </label>
        <input type="password" name="passWord" value="<?php echo htmlspecialchars($passWord); ?>">
        <span> <?php echo htmlspecialchars($passWordError) ?></span> 
        <br><span><?php echo htmlspecialchars($pwdCapital)?></span>
        <br><span><?php echo htmlspecialchars($pwdLower)?></span>
        <br><span><?php echo htmlspecialchars($pwdNum)?></span>
        <br><span><?php echo htmlspecialchars($pwdNonword)?></span>   
        <br>  
   
            <label>User Photo:</label>
            <input type='file' name='userPhoto' value='<?php echo htmlspecialchars($userPhoto); ?>'><br>        
        
    </fieldset>
  
    <input type="submit" value="Create Your Account!">
    <br>

    </form>

<p><a href="index.php?action=login_member">User Login</a></p>


    </main>			





<?php include 'view/footer.php'; ?>
