<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>lab 6 Practice</title>
     <link rel="stylesheet" type="text/css" href="../css/admin.css">
     <link rel="stylesheet" type="text/css" href="../css/sign.css">
</head>
<body>
     
     
     <div class="menu">
          <div class="wrapper">
               <ul>
                    <li><a href="index.php">Public Home</a></li>
                    <li><a href="signup.php">Registration</a></li>
                    <li><a href="login.php">Login</a></li>
                    
               </ul>
          </div>
     </div>
   
     <form action="Admin/user.php" method="post">
     	<h2>Log In</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
        
          <?php }?>

          <label>Current Password</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="cpass" 
                      placeholder="Current password"
                      value="<?php echo $_GET['cpass']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="cpass" 
                      placeholder="Current password"><br>
          <?php }?>


     	<label>New Password</label>
     	<input type="password" 
                 name="npassword" 
                 placeholder="New Password"><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="cnpassword" 
                 placeholder="Confirm Password"><br>



     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create An Account</a>
     </form>


     


</body>
</html>