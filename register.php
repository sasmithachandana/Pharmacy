<?php
 require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#bdc3c7">

	<div id="main-wrapper">
	  <center>
	  <h2>Registration Form</h2>
	  <img src="imgs/1.png" class="avatar"/>
	  </center>
	 <form class="myform" action="register.php" method="post">
	   <label><b>Username</label><br>
	   <input type="text" name="username"  class="inputvalues" placeholder="Your uesrname" required/ >
	   <label><b>Password</label><br>
	   <input type="password" name="password"  class="inputvalues" placeholder="Your Password" required/>
	   <label><b>Confirm Password</label><br>
	   <input type="password" name="cpassword"  class="inputvalues" placeholder="Confirm Password" required/>
	   <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/>
	   <a href='login.php'><input type="button" id="back_btn" value="Back"/></a>
	 </form>
	 
	 <?php
	  if(isset($_POST['submit_btn'])){
		//echo '<script type="text/javascript">alert("Sign up Button clicked")</script>';  
	   
	   $username=$_POST['username'];
	   $password=$_POST['password'];
	   $cpassword=$_POST['cpassword'];
	  
	    if($password==$cpassword){
		$query="select * from user WHERE username='$username'";
		$query_run=mysqli_query($con,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
		 echo '<script type="text/javascript">alert("User Already exists")</script>'; 
		 }else
		 {
			$query="insert into user values('$username','$password')";
			$query_run=mysqli_query($con,$query);
		 }
		
	  }else{
	      echo '<script type="text/javascript">alert("Password Mismatch")</script>';	  
      }		
	  }
	 ?>
	 
	 
	 </div>
	 
</body> 	 
</html>