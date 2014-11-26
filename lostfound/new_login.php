<html>
<head>
<link href='style1.css' rel='stylesheet' type='text/css' />
</head>
<body >

<div class=templateholder>
	<div class=Layout2_header>
	
	</div>
	<div class=Layout2_1 >
	<br />
	<br />
	
	<center><b><u>LOGIN</u></b></center><br/>
	 
	<form name="login" action="" method="post">
                        
                            <div class="field">
                                <label>&nbsp&nbsp&nbspUser Id: &nbsp&nbsp&nbsp</label><input type="text" name="uid" value="" />
                                <br>
                            </div>
                            <div class="field">
                                <label>&nbsp&nbsp&nbspPassword:</label><input type="password" name="pswd" value="" />
                            </div><div class="field">
                                <label></label>
                               &nbsp&nbsp&nbsp <input type="submit" value="Login" name="login" class="submit" />
								
                            </div>
                       
                    </form>
					<center><h4> Not Registered?? </h4>
					<h5><a href="register.php">Click here</a> to Register</h5></center>
					<?php
session_start();
include("check2.php");
$user = new User();
if(isset($_POST['login']))
{
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
			
		}
	}
	if($flag == 1)
	{
		$msg = "Both User Id and Password Required";
		echo $msg;
		
		
	}
}
}
?>

	</div>
	
	<div  class=Layout2_2 >
	<br />
	<center><img src="lost.jpg" width=350" height="200"><b><u><h3>Note:</u></b> If you find any of the Items Posted below, Please Post on the Website!!</h3></center>
	
	<?php
	//	include("check2.php");
		//session_start();
		$user = new ticket();
		$user->display();
		$user->jewellery_display();
		$user->atm_display();
		$user->mobile_display();
		$user->watch_display();
		
		
	?>
	</div>

	
</div>
</body>
</html>
