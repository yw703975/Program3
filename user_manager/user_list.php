<?php
include 'view/header.php';

?>
<!DOCTYPE html>
<html>
<head>

       <link rel="stylesheet" type="text/css" href="main.css" />
        <title>Member Display</title>
</head>
  
<body>
      <main>
           <!-- display a table of users --> 
    
        <table>
        <tr>

            <th>First Name</th>
            <th>Last Name</th>
            <th>User Name</th>

            <th>Email </th>
            <th>Sex </th>
            <th>BirthDay </th>
            <th>Height </th>

            <th>&nbsp;</th>
        </tr>
            <?php foreach ($users as $user) : ?>  
  
            <tr>
            <td><?php echo htmlspecialchars($user['firstName']) ?></td>
            <td><?php echo htmlspecialchars($user['lastName']) ?></td>
            <td><?php echo htmlspecialchars($user['userName']) ?></td>

            <td><?php echo htmlspecialchars($user['email']) ?></td>
            <td><?php echo htmlspecialchars($user['sex']) ?></td>
            <td><?php echo htmlspecialchars($user['birthDay']) ?></td>
            <td><?php echo htmlspecialchars($user['height']) ?></td>

          
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_user">
                <input type="hidden" name="userName"
                       value="<?php echo htmlspecialchars($user['userName']) ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
       <?php endforeach; ?>  
    </table>
           
            <p><a href="index.php?action=register_user">Registration</a></p>
           <p><a href="index.php?action=line">line</a></p>
       </main>
    
    
</body>
    
    
</html>
