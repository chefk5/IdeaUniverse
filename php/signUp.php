<?php 
include 'connect.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{

$username=$_POST['user-name-signup'];
$email=$_POST['user-email-signup'];
$password=$_POST['user-password-signup'];

$username=stripcslashes($username);
$email=stripcslashes($email);
$password=stripcslashes($password);

$username=mysqli_real_escape_string($mysql_link,$username);
$email=mysqli_real_escape_string($mysql_link,$email);
$password=mysqli_real_escape_string($mysql_link,$password);

$hash = password_hash($password, PASSWORD_DEFAULT);




$sql="INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$hash')";
$result=mysqli_query($mysql_link,$sql) or die("noo");
}
 ?>