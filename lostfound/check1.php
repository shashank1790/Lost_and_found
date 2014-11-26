<?php
include("check2.php");
$user = new User();
$uid = $_POST['id'];

 //Checking for user logged in or not
if ($user->get_session())
{
header("location:home.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$register = $user->register($_POST['id'], $_POST['name'],$_POST['email'],$_POST['phone'], $_POST['pswd']);
if ($register) 
{
// Registration Success
echo 'Registration successful <a href="new_login.php">Click here</a> to login';
} else 
{
// Registration Failed
echo 'Registration failed. Email or Username already exits please try again';
}
}
?>
