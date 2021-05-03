<?php include 'view/header.php'; 
       $mydateError = '';
       $milesError = '';
      $weightError = '';

  
  ?>

<!DOCTYPE html>

<html>

<!-- the head section -->
<head>

  
     <link rel="stylesheet" type="text/css" href="./main.css">
 </head>
 
    <main>
        
    <h1>Welcome to add user <?php echo htmlspecialchars( $_SESSION['loginUser']). "  "; ?>data </h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_userdata">

    <fieldset> 
    <legend>User Registration</legend>
        <label>Workout Date: </label>
        <input type="date" name="mydate" value="<?php echo htmlspecialchars($mydate); ?>">
        <span> <?php echo htmlspecialchars($mydateError) ?></span> 
        <br>

        <label>miles: </label>
        <input type="text" name="miles" value="<?php echo htmlspecialchars($miles); ?>">
        <span> <?php echo htmlspecialchars($milesError) ?></span> 
        <br>
        
        <label>Today your weight: </label>
        <input type="text" name="weight" value="<?php echo htmlspecialchars($weight); ?>">
        <span> <?php echo htmlspecialchars($weightError) ?></span> 
        <br>
    <br>
   
        
    </fieldset>
  
    <input type="submit" value="Your data input">
    <br>

    </form>

<p><a href="index.php?action=login_member">User Login</a></p>


    </main>			





<?php include 'view/footer.php'; ?>
