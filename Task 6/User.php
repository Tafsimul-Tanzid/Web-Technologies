<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" type="text/css" href="../css/user.css">
</head>
<body>
	
	<!-- Menu section Starts -->
			<div class="welcome">
				<img src="https://cdn-icons-png.flaticon.com/512/456/456212.png">	
				<h1>Welcome ,<?php echo $_SESSION['name']; ?></h1>
				
			</div>

	<div class="menu">
		<div class="wrapper">
			<ul>
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">View Profile</a></li>
				<li><a href="#">Edit Profile</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
				<li><a href="../index.php">Logout</a></li>
				
			</ul>
		</div>
	</div>

</body>
</html>

<?php 
}else{
     header("Location: Login.php");
     exit();
}
 ?>
