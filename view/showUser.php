<?php include 'view/header.php';

?>
<!DOCTYPE html>

<main>
    <h1>Member Registration Successful</h1>
    
    <h4><?php echo "Thank you " . $userName  ?></br>
        <?php echo  htmlspecialchars("You have been registered.") ?></h4>

    
    
    
    <!-- add code for the form here -->
    
    <br>
<!--    Passing the info to the controller.-->
    <p><a href="index.php?action=add_userdata" >Input  Your  Data</a></p>
    <p><a href="index.php?action=list_user" >List User</a></p>
        <p><a href="index.php?action=list_userdata" >List Userdata</a></p>
    <p><a href="index.php?action=register_user">Register New User</a></p>
    <p><a href="index.php?action=logout_user">Log out</a></p>
    <br> 
    </main>

<?php include 'view/footer.php'; ?>
