<?php

include 'connect.php';



if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['user-email-login'];
	$password=$_POST['user-password-login'];
	$email=stripcslashes($email);
	$password=stripcslashes($password);

	$password=mysqli_real_escape_string($mysql_link,$password);
	$email=mysqli_real_escape_string($mysql_link,$email);

	$passwordDataBase=mysqli_query($mysql_link,"select password from users where email='$email'")
	or die("failed to connect to database".mysqli_error());
	while($row=mysqli_fetch_array($passwordDataBase,MYSQLI_ASSOC))
	{
		if(mysqli_num_rows($passwordDataBase)==1)
		{
			$storedPassword=$row["password"];
			if (password_verify($password,$storedPassword))
			 {
				$_SESSION['login_user']=$email;
				header("location:feed.php");
				
			 }
			else 
			{
				echo "fail";
			}



		}

	}
}
	?>