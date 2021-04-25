<?php 
//require_once 'member_manager/confirmation.php'; 
include 'view/header.php'; 
$userNameError="";
$passWordError="";

?>
<html>
<head>

       <link rel="stylesheet" type="text/css" href="main.css" />
        <title>User Display</title>
</head>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="login_user">

    <fieldset> 
    <legend>User Login</legend>        

        <label>User Name:  </label>
        <input type="text" name="userName" value="<?php echo htmlspecialchars($userName); ?>">
      <span> <?php echo htmlspecialchars($userNameError) ?></span> 
        <br>
        
        <label>Password: </label>
        <input type="password" name="passWord" value="<?php echo htmlspecialchars($passWord); ?>">
      <span> <?php echo htmlspecialchars($passWordError) ?></span> 
        
    </fieldset>
        <br>
    <input type="submit" value="Submit">
    <br>
    </form>
</html>
<?php include 'view/footer.php'; ?>
