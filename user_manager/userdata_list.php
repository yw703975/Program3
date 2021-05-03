<?php
include 'view/header.php';

?>
<!DOCTYPE html>
<html>
<head>

       <link rel="stylesheet" type="text/css" href="main.css" />
        <title>User Data Display</title>
</head>
  
<body>
      <main>
           <!-- display a table of users --> 
     <h1><?php echo htmlspecialchars($_SESSION['loginUser']).'  input Data' ?></h1>

        <table>
        <tr>


    
            <th>userName </th>
            <th>mydate </th>
            <th>miles </th>
            <th>weight </th>


<!--            <th>&nbsp;</th>  -->
        </tr>
            <?php foreach ($userdatas as $userdata) : ?>  
  
            <tr>

      
            <td><?php echo htmlspecialchars($userdata['userName'])?></td>
            <td><?php echo htmlspecialchars($userdata['mydate'])?></td>
            <td><?php echo htmlspecialchars($userdata['miles']) ?></td>
            <td><?php echo htmlspecialchars($userdata['weight']) ?></td>


          
<!--           <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_userdata">
                <input type="hidden" name="userName"
                       value="<?php echo htmlspecialchars($users['userName']) ?>">  
                <input type="submit" value="Delete"> -->
            </form></td>
        </tr>
       <?php endforeach; ?>  
    </table>
           
            <p><a href="index.php?action=register_user">Registration</a></p>
       </main>
</body>
    
    
</html>
