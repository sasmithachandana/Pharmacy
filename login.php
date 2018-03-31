<?php
 require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#bdc3c7">

	<div id="main-wrapper">
	  <center>
	  <h2>Login Form</h2>
	  <img src="imgs/1.png" class="avatar"/>
	  </center>
	 <form class="myform" action="login.php" method="post">
	   <label><b>Username</label><br>
	   <input name="username" type="text" class="inputvalues" placeholder="Type your uesrname" required/>
	   <label><b>Password</label><br>
	   <input name="password" type="password" class="inputvalues" placeholder="Type your username" required/>
	   <input name="login" type="submit" id="login_btn" value="Login"/>
	   <a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
	 </form>
	 
	 <?php
	   if(isset($_POST['login']))
	   {
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="select * from user WHERE username='$username' AND password='$password'";
			
			$query_run=mysqli_query($con,$query);
			
			if(mysqli_num_rows($query_run)>0){
			  header('Location: Home.html'); 
			}
             else
			 {
				 echo '<script type="text/javascript">alert("Invalid User Data")</script>';
			 }
	   }		
	 ?>
	 </div>
</body> 	 
</html>
