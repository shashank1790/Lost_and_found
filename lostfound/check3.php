<?php
session_start();
include("check2.php");
$user = new User();
if ($user->get_session())
{
header("location:home.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	$flag = 0;
	$uid = $pswd = '';
	$uid_err = $pswd_err = '';
	if(empty($_POST['uid']))
	{
		$uid_err = "User id Required";
		$flag = 1;
	}
	else
	{
		$uid = $_POST['uid'];
	}
	if(empty($_POST['pswd']))
	{
		$pswd_err = "Password Required";
		$flag = 1;
	}
	else
	{
		$pswd = $_POST['pswd'];
	}
	if($flag == 0)
	{
		$login = $user->check_login($uid,$pswd );
		if ($login) 
		{
		// Login Success
			header("location:check3.php");
		} 
		else 
		{
			// Login Failed
			$msg= 'Userid / password wrong';
			echo $msg;
			echo "<br>";
			echo "<a href = new_login.php>BACK</a>";
		}
	}
	if($flag == 1)
	{
		$msg = "Both User Id and Password Required";
		echo $msg;
			echo "<br>";
			echo "<a href = new_login.php>BACK</a>";
		
	}
}
?>
